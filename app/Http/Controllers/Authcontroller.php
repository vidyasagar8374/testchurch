<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use DB;
use Carbon\Carbon;
use App\Models\massrequest;
use App\Models\payments;
use App\Models\Parishprist;
use App\Models\Post;
use App\Models\youtube;
use App\Models\familylist;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\donation;
use App\Models\Banner;
use App\Models\ContactList;
use App\Models\YoutubePost;
class Authcontroller extends Controller
{
   public function indexPage(){
      $posts = Post::where('is_active',1)->orderBy('date', 'asc')->get();
      $banners = Banner::where('is_active',1)->orderBy('id', 'asc')->get();
      $parishlists = Parishprist::whereIn('is_present', [1, 2, 3,4])
      ->orderBy('is_present', 'asc')
      ->get();
      return view('index',compact('posts','banners','parishlists'));
   }

   public function loginindex(){
      if(Auth::check()) {
         if( auth()->user()->Active == 1) {
            return redirect()->route('admindashboard');
          }
      }
       else {
      return view('login');
      }
   }
public function loaddashboard(Request $request){
      $credentials = $request->only('username', 'password');
      $user = User::where('email', $credentials['username'])->first();
             if($user) {
               if  (Hash::check($credentials['password'], $user->password)) {
                    Auth::login($user);
                    \Log::info('Credentials: ' . print_r($credentials, true));
                    Log::info('User logged in successfully: '.auth()->user()->Active);
                    
                     // $data = $this->userdata($user);
                     // session()->put($data);                     
                    if( auth()->user()->Active  == 1) {
                     
                     toastr()->success('Login success');
                        return redirect()->route('admindashboard');
                    }
                    else {
                     toastr()->warning('something went wrong');
                       return back();
                    }  
                 }

               else {
                  toastr()->warning('incorrect password');
                 return back();

                  
               }
            }else {
               toastr()->warning('email not found');
               return back();
            }
}

public function userdashboard() {
   return view('user.userdashboard');
}
public function userdata($sql){
      //dd($sql);
      $user_array = array();
      $user_array['email'] = $sql->email;
      $user_array['id'] = $sql->id;
      $user_array['active'] = $sql->Active;
      $user_array['is_mailverify'] = $sql->is_mailverify;
      $user_array['usertype'] = $sql->usertype;
    
      return $user_array;
}
public function logout() {
   Auth::logout();
   toastr()->success('logout successful');
             
   return redirect('/');
}
public function username($username){
   $sql =    DB::table('users')
                 ->select('*')
                  ->where('email', $username)
                  ->first();
              return $sql;    
}

public function admindashboard(){
   // dd('adminindashboard');
   $today = date('Y-m-d');
   $massreqcount = '';
         $paymensts = ''; 
         $lastSixUsers = '';   
         $userscount = ''; 
         $posts = '';
         $donations = ''; 
         $users= '';
   if(Auth::check()) {
      if( auth()->user()->usertype == 'admin') {
         $massreqcount = massrequest::whereDate('request_date', Carbon::today())->count();
         $paymensts = payments::whereDate('payment_date', Carbon::today())->count();
         $lastSixUsers = User::latest()->take(6)->get();   
         $userscount = User::count(); 
         $donations =  donation::whereDate('created_at', Carbon::today())->count();
         $users = User::orderBy('id','desc')->get();
         // dd($users);

      }

      elseif( auth()->user()->usertype == 'user') {
        //today events(post)  
        $posts = Post::all();
      }
   }
   return view('admin.admindashboard',compact('massreqcount','paymensts','lastSixUsers','userscount','posts','donations','users'));
}

public function userlist(){
   $users = User::where('Active', '1')->paginate(5);
   return view('userlist', compact('users'));
}
public function registeration(){
   return view('registers.register');
}
public function registerationsave(Request $request){
//  dd($request);
   $user = User::where('email', $request->email)->first();
   // dd($findemail);
   if($user){
      toastr()->warning('Already registered with this email address please login.');
     return redirect()->route('login');
   }else{
      $password = Hash::make($request->password);
      $registration = new user;
      $registration->name = $request->name;
      $registration->email = $request->email;
      $registration->password = $password;
      $registration->usertype = 'user';
      $registration->Active = 1;
      $registration->save();
      if($registration){
         $reqid = $registration->id;
         $user_id = 'INFYAM1114'.$reqid;
            $updated_isread= 1;
            $sql = User::find($reqid);
            $sql->user_id = $user_id;
            $sql->update();

      }
      if($sql){
         toastr()->success('Account registered successfully');
         return redirect()->route('login');
      }
     

   }
  
   // return view('register.register');
}

public function edituser(Request $request){
   $id = $request->id;

   $useredits = User::where('user_id', $id)->first();
   // dd($useredits);

   if($useredits){
      return view('user.edituser', compact('useredits'));
   
   }


}

public function updateuser(Request $request){
   $today_date = date("Y-m-d H:i:s");
   try {
      $sql = User::where("user_id", $request->id)->update([
          "is_member" => $request->is_member,
          "Updated_at" => $today_date,
      ]);
      if ($sql) {
          toastr()->success("Udated successfully");
          return redirect()->route("userlist");
      } else {
          toastr()->warning("Something went wrong");
          return redirect()->route("userlist");
      }
  } catch (\Exception $e) {
   toastr()->warning("Something went wrong");
   return redirect()->route("userlist");


  }

}

public function familylist() {
   // dd(auth());
   if(auth()->user()->usertype == 'admin') {
      $familylist = User::where('is_member', '1')->paginate(5);
   }else {
      $familylist = familylist::where('header_id',auth()->user()->user_id)->get();
   }
   
   return view('familydata.familydata',compact('familylist'));
}
public function addfamily() {
   return view('familydata.addfamily');
}

public function savefamily(Request $request){
   $family = new familylist;
   $family->user_id = $request->user_id;
   $family->header_id = auth()->user()->user_id;
   $family->name = $request->name;
   $family->email = $request->email;
   $family->mobileno = $request->mobile;
   $family->dob = $request->dob;
   $family->relation = $request->relation;
   $family->save();
   if($family){
      toastr()->success("Added successfully");
      return redirect()->route("familylist");
  } else {
      toastr()->warning("Something went wrong");
      return redirect()->route("familylist");
  }

}

public function familydata(Request $request){
   $id = $request->id;
   $userDetails = User::where('id', $request->id)->first();
   $familydetails = familylist::where('header_id', $userDetails->user_id)->get();
   return view('familydata.familydetails',compact('familydetails','userDetails'));
}

  
 
  


}
