<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\massrequestController;
use App\Models\paymentreq;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\donationsController;
use App\Http\Controllers\contactController
;
 

// test
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/contactus', function () {
//     return view('contactus');
// });massrequestdata
Route::controller(Authcontroller::class)->group(function(){
    Route::get('/','indexPage')->name('indexPage');
});

Route::get('/clear-cache', function() {
  Artisan::call('cache:clear');
  Artisan::call('route:clear');
  Artisan::call('config:clear');
  Artisan::call('view:clear');
  return "Cache Cleared Successfully!";
});
Route::controller(contactController::class)->group(function(){
    Route::post('/contact','contact')->name('contact');
    Route::get('/contactus','contactus')->name('contactus');
    Route::get('/aboutus','aboutus')->name('aboutus');
    Route::get('/youtubelist','youtubelist')->name('youtubelist');
    Route::get('/gallery','gallery')->name('gallery');
});

Route::controller(massrequestController::class)->group(function(){
Route::get('/massreq', 'massrequest')->name('massrequest');
Route::post('/save-massrequest',  'massrequestsave')->name('massrequestsave');
Route::get('/retriveDataMass',  'RetriveDataMass');
Route::any('/massrequestdata',  'getlistofrequest')->name('massrequests');
// this is for pagination purposes
Route::any('/massrequestlistdatalist',  'massrequestlistdatalist')->name('massrequestlistdatalist');
// Route::get('/phonepe/payment/{amount}', 'makePhonePePayment');
// Route::any('/phonepe/payment/callback', 'phonePeCallback')->name('phonepe.payment.callback');
});
Route::controller(PaymentController::class)->group(function(){
    Route::get('/phonepe/payment/{amount}/{merchant_id}/{transaction_id}/{requestype}', 'makePhonePePayment');
    Route::any('/phonepe/payment/callback/{requestype}', 'phonePeCallback')->name('phonepe.payment.callback');
    Route::get('/invoice/{id}', 'invoice')->name('invoice');
});
Route::controller(RegistrationController::class)->group(function(){
     Route::get('/registration', 'registration')->name('registration');
     Route::get('/passwordupdate/{token}/{id}', 'passwordupdate')->name('passwordupdate');
     Route::get('/registration/{registration}', 'registrationsave');
     Route::post('/registration/{registration}', 'registrationsave');
     Route::get('/verification/{token}/{id}', 'mailverification')->name('verification.verify');
     Route::post('/newpasswordupdate', 'newpasswordupdate')->name('newpasswordupdate');

});

Route::controller(Authcontroller::class)->group(function(){
   Route::get('/login', 'loginindex')->name('login');
   Route::post('/admin/dashboard', 'loaddashboard')->name('loaddashboard');
   
   Route::get('/registeration', 'registeration')->name('registeration');
   Route::post('/registerationsave', 'registerationsave')->name('registerationsave');
    
});
Route::middleware(['web','adminauth','auth'])->group(function () {
      Route::get('/admin/dashboard', [Authcontroller::class, 'loaddashboard']); 
      Route::controller(PostController::class)->group(function(){
      Route::get('/post', 'post')->name('post');
      Route::post('/postsave', 'postsave')->name('postsave');
      Route::get('/postindex', 'index')->name('postindex');
      Route::get('/editpost/{id}', 'editpost');
      Route::post('/postupdate/{id}', 'postupdate')->name('postupdate');
      Route::post('/destroypost/{id}', 'destroypost');
      Route::get('/destroypost/{id}', 'destroypost');
      //youtube
      Route::get('/youtube', 'youtubeview')->name('addyoutube');  
      Route::post('/youtubepost', 'youtubepost')->name('youtubepost');  
      Route::get('/youtubeindex', 'youtubeindex')->name('youtubeindex');
      Route::get('/edityoutubepost/{id}', 'edityoutubepost');
      Route::post('/updateyoutubepost', 'updateyoutubepost')->name('updateyoutubepost');
      Route::post('/destroyoutubepost/{id}', 'destroyoutubepost');
      Route::get('/destroyoutubepost/{id}', 'destroyoutubepost');
      //massrequest lists
      Route::get('/massrequestList', 'massrequestList')->name('addmassrequest');
      Route::post('/massrequestListin', 'massrequestListin')->name('massrequestListin');
      Route::get('/massrequestListindex', 'massrequestListindex')->name('massrequestListindex');
      Route::get('/massrequestedit/{id}', 'massrequestedit');
      Route::post('/massrequesteditin', 'massrequesteditin')->name('massrequesteditin');
      Route::get('/destroymasslist/{id}', 'destroymasslist');
      //daywise list
      Route::get('/schedulelist', 'schedulelist')->name('schedulelist');
      Route::post('/schedulepost', 'schedulepost')->name('schedulepost');
      Route::get('/scheduleindex', 'scheduleindex')->name('scheduleindex');
      Route::get('/scheduledit/{id}', 'scheduledit');
      Route::post('/scheduleditpost', 'scheduleditpost')->name('scheduleditpost');
    //   Route::post('/updatestatusdaywise/{id}/{status}', 'updatestatusdaywise');
    //   Route::get('/updatestatusdaywise/{id}/{status}', 'updatestatusdaywise');
      Route::get('/scheduledelete/{id}', 'scheduledelete');

      Route::get('/parishprists', 'parishprists')->name('parishprists');
      Route::post('/parishpost', 'parishpost')->name('parishpost');
      Route::get('/parishlist', 'parishlist')->name('parishlist');
      Route::get('/editparish/{id}', 'editparish')->name('editparish');
      Route::post('/updateparish', 'updateparish')->name('updateparish');


    // banners
      Route::get('/createbanners',  'createbanners')->name('admin.createbanners'); // create banner
      Route::post('/savebanner',  'savebanner')->name('admin.savebanner'); // save banner
      Route::get('/getbanners',  'getbanners')->name('admin.getbanners');  // get banner 
      Route::post('/updatebanner',  'updatebanner')->name('admin.banners.update');  // update banner
      Route::get('/bannerview/{id}',  'bannerview')->name('admin.banners.view');  // update banner
      Route::delete('/banners/delete/{id}', 'destroybanner')->name('admin.banners.delete');  // delete banner

    // post 
    Route::get('/createpost', 'createpost')->name('admin.createpost'); 
    Route::post('/savepost', 'savepost')->name('admin.savepost'); 
    Route::get('/getposts',  'getposts')->name('admin.getposts');  
    Route::get('/viewpost/{id}',  'viewpost')->name('admin.viewpost');  
    Route::post('/updatepost',  'updatepost')->name('admin.updatepost');  
    Route::delete('/posts/delete/{id}',  'destroypost')->name('admin.destroypost');  


    //create youtube 
    Route::get('/createyoutube', 'createyoutube')->name('admin.createyoutube'); 
    Route::post('/saveyoutube', 'saveyoutube')->name('admin.saveyoutube'); 
    Route::get('/getyoutube',  'getyoutube')->name('admin.getyoutube'); 
    Route::get('/viewyoutube/{id}',  'viewyoutube')->name('admin.viewyoutube');  
    Route::post('/updateyoutube',  'updateyoutube')->name('admin.updateyoutube');  
    Route::delete('/youtube/delete/{id}',  'destroyotube')->name('admin.destroyotube'); 
    
    
      //create ParishPrist
      Route::get('/createparishprist', 'createparishprist')->name('admin.createparishprist'); 
      Route::post('/saveparishprist', 'saveparishprist')->name('admin.saveparishprist'); 
      Route::get('/parishpristlist',  'parishpristlist')->name('admin.parishpristlist'); 
      Route::get('/viewprists/{id}',  'viewprists')->name('admin.viewprists');
      Route::post('/updateprist',  'updateprist')->name('admin.updateprist'); 
      
    });
    Route::controller(Authcontroller::class)->group(function(){
        Route::get('/admindashboard','admindashboard')->name('admindashboard');
        Route::get('/userlist','userlist')->name('userlist');
        Route::get('/edituser/{id}','edituser')->name('edituser');
        Route::post('/updateuser','updateuser')->name('updateuser');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/userlist', 'userlist')->name('userlist');

        // family

        Route::get('/familylist', 'familylist')->name('familylist');
        Route::get('/addfamily', 'addfamily')->name('addfamily');
        Route::post('/savefamily', 'savefamily')->name('savefamily');
        Route::get('/familydata/{id}', 'familydata')->name('familydata');


    });
    Route::controller(donationsController::class)->group(function(){
        Route::get('/donation', 'donation')->name('donation');
        Route::post('/donationSave', 'donationSave')->name('donationSave');
        Route::get('/donationindex', 'donationindex')->name('donationindex');
        Route::get('/donation_invoice/{id}', 'donationInvoice')->name('donation_invoice');
       

    });
    Route::controller(massrequestController::class)->group(function(){
        Route::get('/getRegisteredList',  'getRegisteredList')->name('getRegisteredList'); 
        Route::get('/isreadmass/{id}',  'isReadMass')->name('isreadmass'); 
    });
    Route::controller(contactController::class)->group(function(){
        Route::get('/enquiry','enquiry')->name('enquiry');
    });
});

   Route::middleware(['web','userauth'])->group(function () {
    Route::get('/user/userdashboard', [Authcontroller::class, 'userdashboard']);   
  });
  

