<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Item;
use App\Reservation;
use App\Contact;
use App\Setting;
use Brian2694\Toastr\Facades\Toastr;

class FrontController extends Controller
{


public function index(){
    $sliders = Slider::all();
    $categories = Category::all();
    $items = Item::all();
    $title = Setting::find(1)->value;

    return view('front',compact('sliders','categories','items','title'));
}


public function reservation(Request $request){

    $this->validate($request,[
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'datepicker' => 'required'
    ]);
$reservation = new Reservation;
$reservation->name = $request->name;
$reservation->email = $request->email;
$reservation->phone = $request->phone;
$reservation->dateTime = $request->datepicker;
$reservation->message = $request->message;
$reservation->status = false;
$save = $reservation->save();
$save ? Toastr::success('Reservation request sent successfully. we will confirm to you shortly','Success',["positionClass" => "toast-top-right"]) : 
Toastr::error('Reservation request sent fail. please try again later.','Failed',["positionClass" => "toast-top-right"]);
return redirect()->back();
}


public function contact(Request $request){
   $this->validate($request,[
'name' => 'required',
'email' => 'required',
'subject' => 'required',
'message' => 'required'
   ]);
   $contact = new Contact;
   $contact->name = $request->name;
   $contact->email = $request->email;
   $contact->subject = $request->subject;
   $contact->message = $request->message;
   $save = $contact->save();
   $save ? Toastr::success('Message successfully sent, we will shortly connect with you..','Success',["positionClass" => "toast-top-right"]) : 
   Toastr::error('Contact message sent fail. please try again later.','Failed',["positionClass" => "toast-top-right"]);
   return redirect()->back();
}



}
