@extends('layouts.app')

@section('title','Add Slider')

@push('css')

@endpush


@section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Add Slider</h4>
                                    <p class="card-category">add new slider you want..</p>
                                </div>
                                <div class="card-body">
                                    <div class="">


    <form method="post" action="{{route('slider.store')}}" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Title</label>
      <input type="text" class="form-control" name="title">
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Sub Title</label>
      <input type="text" class="form-control" name="sub_title">
    </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
  <label class="control-label">Image</label><br/>
  <input type="file" name="image">
</div>
</div>
<a href="{{route('slider.index')}}" class="btn btn-primary btn-danger">Back</a>
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