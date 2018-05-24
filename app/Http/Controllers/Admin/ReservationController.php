<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;

/*Email Notification*/
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReservationConfirmed;
/*End Email Notification */

class ReservationController extends Controller
{

public function index(){
    $reservations = Reservation::all();
    return view('admin.reservation.index',compact('reservations'));
}

public function confirm($id){
    $reservation = Reservation::find($id);
    $reservation->status = true;
    $save = $reservation->save();
    if($save){
        Notification::route('mail', $reservation->email)->notify(new ReservationConfirmed());
    }
    $result = $save ? 
    Toastr::success('Reservation confirm successfully.','Success',["positionClass" => "toast-top-right"])
            :
            Toastr::error('Reservation confirm fail. please try again later.','Failed',["positionClass" => "toast-top-right"]);
    return redirect()->back();
}

public function destroy($id){
    $reservation = Reservation::find($id);
    $result = $reservation->delete() ? 
    Toastr::success('Reservation rejected successfully.','Success',["positionClass" => "toast-top-right"])
            :
            Toastr::error('Reservation reject fail. please try again later.','Failed',["positionClass" => "toast-top-right"]);
    return redirect()->back();
}



}
