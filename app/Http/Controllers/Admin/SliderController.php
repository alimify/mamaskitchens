<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   $silders = Slider::all();
   return view('admin.slider.index',compact('silders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $this->validate($request,[
         'title' => 'required',
         'sub_title' => 'required',
         'image' => 'required|mimes:png,bmp,gif,jpg,jpeg'
     ]);
     $image = $request->file('image');
     $slug = str_slug($request->title);
     $upload =  true;
     $currentDate = Carbon::now()->toDateString();
     $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
     $imageDir = 'uploads/sliders';
if(!isset($image)){
    $upload =  false;
}
if(!file_exists($imageDir)){
    $upload = false;
    if(mkdir($imageDir,0777,true)){
    $upload = true;
    }
}

if($upload){
 $upload = $image->move($imageDir,$imageName);
}

if($upload){
    $slider = new Slider();
    $slider->title = $request->title;
    $slider->sub_title = $request->sub_title;
    $slider->image = $imageName;
$upload = $slider->save();
}
$result = $upload ? 'Slider Successfully Added ' : 'Fail to added slider';
return redirect()->route('slider.create')->with('status', $result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
      return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:png,bmp,gif,jpg,jpeg'
        ]);
        $slider = Slider::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $upload =  true;
        $currentDate = Carbon::now()->toDateString();
        $imageName = isset($image) ? $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension() : $slider->image;
        $imageDir = 'uploads/sliders';
        
 
   if(!file_exists($imageDir)){
       $upload = false;
       if(mkdir($imageDir,0777,true)){
       $upload = true;
       }
   }
   
   if($upload && isset($image)){
    $upload = $image->move($imageDir,$imageName);
    if(file_exists($imageDir.'/'.$slider->image)){
        unlink($imageDir.'/'.$slider->image);
    }
   }
   
   if($upload){
       $slider->title = $request->title;
       $slider->sub_title = $request->sub_title;
       $slider->image = $imageName;
   $upload = $slider->save();
   }
   $result = $upload ? 'Slider Successfully Updated ' : 'Fail to update slider';
   return redirect()->route('slider.edit',$slider->id)->with('status', $result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $slider = Slider::find($id);
     $image = $slider->image;
     $img = 'uploads/sliders/'.$image;
     $delete = false;
     $fileEx = file_exists($img);
     if($fileEx && unlink($img)){
     $delete = true;
     }elseif(!$fileEx){
         $delete = true;
     }
     $delete = $delete ? $slider->delete() : false;
     $result = $delete ? 'Slider Successfully Deleted..' : 'Fail to delete';
     return redirect()->route('slider.index')->with('status',$result);
    }
}
