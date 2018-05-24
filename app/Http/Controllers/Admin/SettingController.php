<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingController extends Controller
{
  public function index(){
      $title = Setting::find(1);
      $logo = Setting::find(2);
      $stickyLogo = Setting::find(3);

      return view('admin.setting.index',compact('title','logo','stickyLogo'));
  }

  public function edit($id){

  }

  public function logo(){

}

public function about(){
    
}


}
