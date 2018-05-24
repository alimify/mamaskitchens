@extends('layouts.app')

@section('title','Edit Item')

@push('css')

@endpush


@section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Edit Item</h4>
                                    <p class="card-category">Edit item you want..</p>
                                </div>
                                <div class="card-body">
                                    <div class="">


    <form method="post" action="{{route('item.update',$item->id)}}" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Category</label>
      <select name="category_id" class="form-control">
      @foreach($categories as $category)
      <option value="{{$category->id}}" {{$item->category_id == $category->id ? 'selected' : ''}}>
      {{$category->name}}
      </option>
      @endforeach
      </select>
    </div>
</div>
</div>


<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Name</label>
      <input type="text" class="form-control" name="name" value="{{$item->name}}">
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Price</label>
      <input type="number" class="form-control" name="price" value="{{$item->price}}">
    </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Description</label>
      <textarea class="form-control" name="description"> {{$item->description}}</textarea>
    </div>
</div>
</div>


<div class="row">
<div class="col-md-12">
  <label class="control-label">Image</label>
  <div><img src="{{asset('uploads/items/'.$item->image)}}" alt="No Image" width="120"></div>
  <input type="file" name="image">
</div>
</div>
<a href="{{route('item.index')}}" class="btn btn-primary btn-danger">Back</a>
<button type="submit" class="btn btn-primary">Save</button>
<div class="clearfix"></div>

    </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
@endsection


@push('scripts')

@endpush