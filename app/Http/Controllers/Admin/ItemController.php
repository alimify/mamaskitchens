<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $items = Item::all();
     return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $categories = Category::all();
     return view('admin.item.create',compact('categories'));
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
        'category_id' => 'required',
        'name' => 'required|max:50',
        'price' => 'required|numeric',
        'description' => 'required|max:150',
        'image' => 'required|mimes:jpg,jpeg,png,bmp,gif'
        ]);
        $image = $request->file('image');
        $imageDir = 'uploads/items';
        $currentDate = Carbon::now()->toDateString();
        $slug = str_slug($request->name);
        $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        $upload = file_exists($imageDir);
        $upload = $upload ? true : mkdir($imageDir,0777,true);
        $upload = $upload && $image->move($imageDir,$imageName);
        $item = new Item;
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->image = $imageName;
        $save = $item->save();
        $result = $save ? 'Item Succesfully Saved..' : 'Fail to save item';
        return redirect()->back()->with('status',$result);
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
     $categories = Category::all();
     $item = Item::find($id);

     return view('admin.item.edit',compact('categories','item'));
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
            'category_id' => 'required',
            'name' => 'required|max:50',
            'price' => 'required|numeric',
            'description' => 'required|max:150',
            'image' => 'mimes:jpg,jpeg,png,bmp,gif'
            ]);
            $item = Item::find($id);
            $image = $request->file('image');
            if(isset($image)){
            $imageDir = 'uploads/items';
            $currentDate = Carbon::now()->toDateString();
            $slug = str_slug($request->name);
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $upload = file_exists($imageDir) && $image->move($imageDir,$imageName) && file_exists($imageDir.'/'.$item->image) ? unlink($imageDir.'/'.$item->image) : true;
            }else{
                $imageName = $item->image;
            }
            $item->category_id = $request->category_id;
            $item->name = $request->name;
            $item->price = $request->price;
            $item->description = $request->description;
            $item->image = $imageName;
            $save = $item->save();
            $result = $save ? 'Item Succesfully Saved..' : 'Fail to save item';
            return redirect()->back()->with('status',$result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $item = Item::find($id);
    $image = 'uploads/items/'.$item->image;
    $delete = file_exists($image) && unlink($image) ? $item->delete() : $item->delete();
    $result = $delete ? 'Item Successfully Deleted..' : 'Fail to delete item..';
    return redirect()->back()->with('status',$result);
    }
}
