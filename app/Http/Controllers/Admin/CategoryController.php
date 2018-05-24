<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $categories = Category::all();
     return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.category.create');
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
           'name' => 'required|max:30'
       ]);
       $category = new Category;
       $category->name = $request->name;
       $category->slug = str_slug($request->name);
       $result = $category->save() ? 'Category Successfully Added' : 'Fail to add category';
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
    $category = Category::find($id);
    return view('admin.category.edit',compact('category'));
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
        'name' => 'required|max:30'
    ]);
    $category = Category::find($id);
    $category->name = $request->name;
    $category->slug = str_slug($request->name);
    $result = $category->save() ? 'Category Successfully Updated..' : 'Fail to update category';
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
    $delete = Category::find($id)->delete();
    $result = $delete ? 'Category Successfully Deleted..' : 'Fail to Delete Category...';
    return redirect()->back()->with('status',$result);
    }
}
