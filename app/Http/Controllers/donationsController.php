<?php

namespace App\Http\Controllers;
use App\Models\donation;
use Illuminate\Http\Request;

class donationsController extends Controller
{
    public function donation(){
        return view('donation.donation');
    }
    public function donationSave(Request $request){
            $user_id = auth()->user()->id;
            $donation = new donation();
            $donation->user_id = $user_id;
            $donation->name = $request->name;
            $donation->mobile = $request->mobile;
            $donation->address = $request->address;
            $donation->donation_type = $request->donation_type;
            $donation->amount = $request->amount;
            $donation->save();
            if($donation){
                toastr()->success('your request has been Completed');
                return redirect()->route('donationindex');
            }else{
                toastr()->warning('something went wrong');
                return redirect()->route('donationindex');
            }
    }
    public function donationIndex(){
        $user_id = auth()->user()->id;
        if( auth()->user()->usertype == 'admin' ){
        $donations = donation::orderBy('id', 'desc')->paginate(5);
        return view('donation.donationindex', compact('donations'));
        }else{
        $donations = donation::where('user_id','=',$user_id)->paginate(8);
        return view('donation.donationindex', compact('donations'));
        }
    }
    public function donationInvoice(Request $request){
        $id = $request->id;
        $donations = donation::where('id','=',$id)->first();
        // dd($donations);
        return view('donation.invoice',compact('donations'));
        }   
}
