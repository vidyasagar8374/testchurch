<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\massrequestController; 
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Models\massrequest;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendRecipt;
use Illuminate\Support\Facades\Session;


class PaymentController extends Controller
{
     public function makePhonePePayment($amount,$merchant_id,$transaction_id,$requestype)
    {
      // dd($requestype);
        $data = array (
          'merchantId' => 'PGTESTPAYUAT86',
          'merchantTransactionId' => $merchant_id,
          'merchantUserId' => 'MUID123',
          'requestype' => $requestype,
          'amount' => $amount * 100,
          'redirectUrl' => route('phonepe.payment.callback',['requestype' => $requestype]),
          'redirectMode' => 'POST',
          'callbackUrl' => route('phonepe.payment.callback',['requestype' => $requestype]),
          'mobileNumber' => '9999999999',
          'bankId' => 'SBIN',
          'paymentInstrument' => 
          array (
            'type' => 'PAY_PAGE',
          ),
        );

        $encode = base64_encode(json_encode($data));
        //  dd($data);

        $saltKey = '96434309-7796-489d-8924-ab56988a6076';
        $saltIndex = 1;

        $string = $encode.'/pg/v1/pay'.$saltKey;
        $sha256 = hash('sha256',$string);
      // dd($sha256);
        $finalXHeader = $sha256.'###'.$saltIndex;

     
        $curl = curl_init();
        // dd($curl);

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/pay',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => false,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode(['request' => $encode]),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'X-VERIFY: '.$finalXHeader
          ),
        ));
      //  dd($curl);
        $response = curl_exec($curl);
        // dd($response);
        if(curl_exec($curl) === false) {
          echo 'Curl error: ' . curl_error($curl);
         exit(1);
      }
        // dd($response);
        curl_close($curl);
        // dd($response);

        $rData = json_decode($response);
      //  if($rData->success == false){
      //   dd('smoething went wron ');
      //   };
       
      //  dd($rData);
        $url = $rData->data->instrumentResponse->redirectInfo->url;
          
     
      return redirect()->to($url);
      return $rData;
       
    
   }

    public function phonePeCallback(Request $request)
    {
      //  dd($request);
      
        $input = $request->all();

        $saltKey = '96434309-7796-489d-8924-ab56988a6076';
        $saltIndex = 1;

        $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'],
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => false,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'accept: application/json',
            'X-VERIFY: '.$finalXHeader,
            'X-MERCHANT-ID: '.$input['transactionId']
          ),
        ));
       $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
      //   echo "cURL Error #:" . $err;
      echo " " . $err;
  } else {
  $responseData = json_decode($response, true);
  //  dd($responseData);
   $success = $responseData['success'];
   $code = $responseData['code'];
   $message = $responseData['message'];
   $merchantId = $responseData['data']['merchantId'];
   $merchantTransactionId = $responseData['data']["merchantTransactionId"];
   $mertrntxid = $responseData['data']["transactionId"];
   $amount = $responseData['data']['amount'];
   $status = $responseData['data']["state"];
   $responseCode = $responseData['data']['responseCode'];
   $type = $responseData['data']['paymentInstrument']['type'];
   $cardtype = $responseData['data']['paymentInstrument']['cardType'] ?? '';
   $pgTransactionId = $responseData['data']['paymentInstrument']['pgTransactionId'] ?? '';
   $pgServiceTransactionId = $responseData['data']['paymentInstrument']['pgServiceTransactionId'] ??'';
   $pgAuthorizationCode = $responseData['data']['paymentInstrument']['pgAuthorizationCode'] ?? '';
   $arn = $responseData['data']['paymentInstrument']['arn'] ?? '';
   $brn = $responseData['data']['paymentInstrument']['brn'] ?? '';
   $bankTransactionId = $responseData['data']['paymentInstrument']['bankTransactionId'] ?? '';
   $bankId = $responseData['data']['paymentInstrument']['bankId'] ?? '';
     $data = array(
          'success_mode'=>$success,
          'code'=>$code,
          'message'=>$message,
          'merchantId'=>$merchantId,
          //merchant transaction id
          'merchantTransactionId'=>$merchantTransactionId,
          //mer transaction id
          'mertransactionId'=>$mertrntxid,
          'amount'=>$amount,
           'state'=>$status,
          'responseCode'=>$responseCode,
          'payment_mode'=>$type,
          'cardType'=>$cardtype,
          'pgTransactionId'=>$pgTransactionId,
          'pgServiceTransactionId'=>$pgServiceTransactionId,
          'pgAuthorizationCode'=>$pgAuthorizationCode,
          'bankTransactionId'=>$bankTransactionId,
          'arn'=>$arn,
          'bankId'=>$bankId,
          'brn'=>$brn,
     );
       $result = DB::table('payments')->insert($data);

    $requestype = $request->requestype;
   if($requestype == 'massrequest'){
        $sql = DB::table('massrequests')
        ->where('merchant_id', $merchantTransactionId)
        ->update([
          'status'=>$status,
          'Payment_TranId'=>$mertrntxid,
          'Payment_Type'=>$type,
          'amount'=>$amount,

        ]);
       

        if ($sql) {
          $massid = session('massid');
          $masslistdata = massrequest::where('id','=',$massid)->first();
          $recipientEmail = 'vidyasagar8374@gmail.com';
          Mail::to($recipientEmail)->send(new SendRecipt($masslistdata));
          session()->forget('massid');
          toastr()->success('Request was successfully Added.');
          return redirect()->route('getRegisteredList');
         
         } else {
          toastr()->warning('Something went wrong');
          return redirect()->route('getRegisteredList');
         }
   }elseif($requestype == 'familysubscription'){
    dd('success');
   }else{
    dd('something went wrong');
   }
  
   



    // session()->flash('responseData', $responseData);

    //   return redirect('/save-massrequest/phonepereq');



      // return $responseData;
      //dd($responseData);
    //    $value1 = $responseData["success"];
    //    $value2 = $responseData["code"];
    //   $merchantId = $responseData['data']['merchantId'];
    //   dd($value1,$value2,$merchantId);
      }
     
}
public function invoice(Request $request){
  $massid = $request->id;
  $masslistdata = massrequest::where('id','=',$massid)->first();
  // dd($masslistdata); 
  return view('invoice',compact('masslistdata'));
}
}
