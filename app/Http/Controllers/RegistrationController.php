<?php

namespace App\Http\Controllers;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class RegistrationController extends Controller
{
   public function registration(){
     if(session('usertype') == 'admin') {
         return redirect('/admin/dashboard');
      }elseif(session('usertype') == 'user') {
         return redirect('/user/userdashboard');
      }else {
        return view('registration');
      }
    
   }
   public function registrationsave(Request $request){  
   
  $validated = $request->validate([
    
   'email' => 'required|unique:users'
   
]);
    $token = Str::random(40);
    $password = str::random(20);
    $date = date('Y-m-d H:i:s');
    $token = md5($token);
    
      $data = array(
      "firstname" => $request->firstname,
      "lastname" =>$request->lastname,
      "fathername" => $request->fathername,
      "dob" => $request->dob,
      "mobile" => $request->mobile,
      "address" =>$request->address,
      "address" =>$request->address,
      "dob" => $request->dob,
      "gender" => $request->gender,
      "familymember" =>$request->familymember,
      "registernumber" => $request->registernumber,
      'email'=>$request->email,
      'send_token_date'=>$date,
      'mail_send_token'=>$token,
      'password'=> $password
      );
     $result = DB::table('users')->insert($data);
      $lastInsertedId = DB::getPdo()->lastInsertId();
    $mail = $request->email;
     $mailsent = Mail::to($mail)->send(new VerificationMail($token,$lastInsertedId));
     if($mailsent){
      echo 'sent mail';
      exit;
     }

}
public function mailverification(Request $request){
  //dd($request);
  $token = $request->token;
  $id = $request->id;
$sql = DB::table('users')
    ->select('*')
    ->where('mail_send_token', $token)
    ->first();
$sendmaildate = $sql->send_token_date; 

$carbonDate = Carbon::parse($sendmaildate);
$carbonDate->addMinutes(2);
$newDate = $carbonDate->format('Y-m-d H:i:s');
$currentDate = Carbon::now();
$difference = $carbonDate->diffInMinutes($currentDate);

if ($difference > 0) {

return redirect()->route('passwordupdate', ['token' => $token, 'id' => $id]);
    
} else {
    dd('expired');
}      
}
 public function passwordupdate($token,$id){
    return view('passwordupate',['token' => $token, 'id' => $id]);
   }

   public function newpasswordupdate(Request $request){
       $date = date('Y-m-d H:i:s');
    $sql = DB::table('users')
    ->where('id', '=', $request->id)
    ->where('mail_send_token', '=', $request->token)
            ->update([
                'password' => $request->password,
                'is_mailverify'=> 'Y',
                'verify_email_date'=>$date,
                'active'=>'Y'
            ]
            );
       if($sql > 0){
        return redirect('/login');
       }
   }
}
