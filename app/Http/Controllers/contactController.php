<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\Parishprist;
use App\Models\YoutubePost;
use DB;

class contactController extends Controller
{
   public function contact(Request $request){
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->mobile = $request->mobile;
        $contact->save();
        if($contact){
            toastr()->success('your request has been Completed');
            return redirect('/');
        }else{
            toastr()->warning('something went wrong');
            return redirect('/');
        }

   }
   public function enquiry(){
        $enquirys = Contact::orderBy('id', 'desc')->paginate(5);
        if($enquirys){
            return view('contacts.contactdata',compact('enquirys'));
        }

   }
   public function contactus(){
        return view('contact');
   }
   public function aboutus(){
    $parishlists = Parishprist::where('is_present', 0)
    ->orderBy(DB::raw('YEAR(end_year)'), 'desc')
    ->get();
        return view('about' ,compact('parishlists'));
   }
   public function gallery(){
        return view('gallery');
   }
   public function youtubelist(){
    $listdata = YoutubePost::orderBy(DB::raw('YEAR(date)'), 'desc')
        ->orderBy(DB::raw('MONTH(date)'), 'desc')
        ->paginate(5);
     
     //    dd($listdata)
        return view('youtube.youtubetemp',compact('listdata'));
   }
}
