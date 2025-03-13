<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\paymentreq;
use App\Http\Controllers\PaymentController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\massrequest;
use App\Models\massList;
use App\Models\ScheduleList;
use App\Models\Requestlist;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendRecipt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use DB;


class massrequestController extends Controller
{
 
    public function massrequest(){
      // dd('massrequest');
       $daywise = ScheduleList::where('Status', 1)->get();
       $massrequestlist = Requestlist::where('status', 1)->get();
       $radiobuttons = Requestlist::where('Type', 3)->get();
      //  dd($daywise);
      
         
        return view('massrequest',compact('massrequestlist','daywise','radiobuttons'));
    }
   
    public function massrequestsave(Request $request){
      //  dd($request);
     if(auth()->user()->usertype == 'admin'){
      try{
        $paymentid = $request->paymentid;
        if (empty($paymentid)) {
          // Generate a random ID consisting of numbers only
          $randomId =  $this->generateRandomId();
          // Use $randomId for further processing
          $paymentid = $randomId;
      }else{
        $paymentid = $request->paymentid;
      }
     
        $today_date =  date('Y-m-d H:i:s');
        $amount = 10;
        $user_id = auth()->user()->id;
        $merchant_id = rand(1, 100);
        $transaction_id = rand(1, 100);
        $status = 'COMPLETED';
        DB::beginTransaction();
         $massreq = new massrequest;
         $massreq->user_id= $user_id;
         $massreq->fname= $request->fname;
         $massreq->lname= $request->lname;
         $massreq->from_address= $request->from_address;
         $massreq->Spouse= $request->Spouse;
         $massreq->date= $today_date;
         $massreq->request_date= $request->mass_date;
         $massreq->day_type= $request->day_type;
         $massreq->mobile_no= $request->mobile_no;
         $massreq->merchant_id= $merchant_id;
         $massreq->transaction_id= $transaction_id;
         $massreq->status = $status;
         $massreq->Payment_TranId = $paymentid;
         $massreq->Payment_Type = $request->paymentmethod;
         $massreq->amount = $request->amount;
         $massreq->save();
         $massid = $massreq->id;
          $selectedCheckboxes = $request->input('massrequestcheckbox');
          $selectedoptions = $request->input('massrequest');
          $response = $request->input('response');
          foreach ((array)$selectedCheckboxes as $key => $data) {
            $sql = new massList;
            $sql->mass_id = $massid;
            $sql->mass_info = $data;
            $sql->save();
         }
            foreach ($selectedoptions as $key => $data) {
              // dd($data);
              $sql = new massList;
              $sql->mass_id = $massid;
              $sql->mass_info = $data;
              $sql->mass_info_data = $response[$key];
              $sql->save();
          
            }
            
      DB::commit();
      if($sql){
        toastr()->success('Registerd Successfully');
        return redirect()->route('getRegisteredList');
      }else{
        toastr()->warning('something went wrong');
        return redirect()->route('getRegisteredList');
      }

    }catch(Exception $e){
    DB::rollback();
      dd('failed');
    }
     }
     //user request
     elseif(auth()->user()->usertype == 'user'){
    
      try{
        $today_date =  date('Y-m-d H:i:s');
        $amount = 10;
        $user_id = auth()->user()->id;
        $merchant_id = rand(1, 100);
        $transaction_id = rand(1, 100);
        $status = 'not_verified';
        DB::beginTransaction();
         $massreq = new massrequest;
         $massreq->user_id= $user_id;
         $massreq->fname= $request->fname;
         $massreq->lname= $request->lname;
         $massreq->from_address= $request->from_address;
         $massreq->Spouse= $request->Spouse;
         $massreq->date= $today_date;
         $massreq->request_date= $request->mass_date;
         $massreq->day_type= $request->day_type;
         $massreq->mobile_no= $request->mobile_no;
         $massreq->merchant_id= $merchant_id;
         $massreq->transaction_id= $transaction_id;
         $massreq->status = $status;
         $massreq->save();

         $massid = $massreq->id;

          $selectedCheckboxes = $request->input('massrequestcheckbox');
          $selectedoptions = $request->input('massrequest');
          $response = $request->input('response');
          foreach ((array)$selectedCheckboxes as $key => $data) {
            $sql = new massList;
            $sql->mass_id = $massid;
            $sql->mass_info = $data;
          
            $sql->save();
          }
          foreach ($selectedoptions as $key => $data) {
            // dd($data);
            $sql = new massList;
            $sql->mass_id = $massid;
            $sql->mass_info = $data;
            $sql->mass_info_data = $response[$key];
          
            $sql->save();
          }

          session(['massid' => $massid]);
          DB::commit();

          // send mail to user
          // $masslistdata = massrequest::where('id','=',$massid)->first();
          // $recipientEmail = 'vidyasagar8374@gmail.com';
          // Mail::to($recipientEmail)->send(new SendRecipt($masslistdata));
          // dd($sql);
          if($sql){
            return redirect('/phonepe/payment/'.$amount.'/'.$merchant_id.'/'.$transaction_id.'/massrequest');
          
          }
    }catch(Exception $e){
    DB::rollback();
      dd('failed');
      }

  }

}
public function generateRandomId($length = 8) {
  $characters = '0123456789';
  $randomId = '';
  for ($i = 0; $i < $length; $i++) {
      $randomId .= $characters[rand(0, strlen($characters) - 1)];
  }
  return $randomId;
}
public function getlistofrequest(Request $request){
  $today = Carbon::now()->format('Y-m-d');

  // Initialize the query to get mass requests
  $masslist = massrequest::with(['massrequestlist.masslistname']);
  
  // Check if the request has a 'date' parameter
  if ($request->has('date')) {
    // dd($request);

      $date = $request->input('date');
      \Log::info('Date parameter received: ' . $date);
      // Use the provided date to filter the requests
      $masslist->whereDate('request_date', $date);
  } else {
      // Default to today's date
      $masslist->whereDate('request_date', $today);
  }
  
  // Check if the request has a 'day_type' parameter
  if ($request->has('day_type')) {
      $day_type = $request->input('day_type');
      \Log::info('Day type parameter received: ' . $day_type);
      $masslist->where('day_type', $day_type);
  }
  
  // Log the SQL query
  \Log::info('SQL Query: ' . $masslist->toSql());
  
  // Paginate the results
  $masslist = $masslist->paginate(5);
  
  // Get the daywise schedule list
  $daywise = ScheduleList::where('Status', 1)->get();
  
  // Return the view with the results
  return view('admin.massrequestresults', compact('masslist', 'daywise'));
}

public function massrequestlistdatalist(Request $request){

  $masslist = massrequest::with(['massrequestlist.masslistname'])
  ->whereDate('request_date',Carbon::now());
  $daywise = ScheduleList::where('Status', 1)->get();
  if (!empty($request->has('date'))) {
    $date = $request->input('date');
    $masslist->whereDate('request_date', $date);
  }

    if (!empty($request->has('day_type'))) {
      $day_type = $request->input('day_type');
      $masslist->where('day_type', $day_type);
    }
  $masslist = $masslist->paginate(5);
  
  return view('admin.massrequestresults',compact('masslist','daywise'));
}



public function getRegisteredList(Request $request){
  $user_id = auth()->user()->id;
  $masslistdata = '';
  if($user_id){
    $masslistdata = massrequest::where('user_id','=',$user_id)
    ->orderBy('id', 'desc')
    ->paginate(5);
    // dd($masslistdata);
    return view('registerdata.registerddata', compact('masslistdata'));
  }else{
    return view('registerdata.registerddata', compact('masslistdata'));
  }
}
public function isReadMass(Request $request){
    $reqid = $request->id;
    $updated_isread= 1;
    $sql = massrequest::find($reqid);
    $sql->is_read = $updated_isread;
    $sql->update();

    if($sql){
      toastr()->success('Updated Successfully');
      return redirect()->route('massrequests');
    }else{
      toastr()->warning('something went wrong');
      return redirect()->route('massrequests');
    }


}
}