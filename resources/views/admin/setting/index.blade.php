@extends('layouts.app')

@section('title','Settings')

@push('css')

@endpush


@section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Settings</h4>
                                    <p class="card-category">edit logo,title,about etc you want..</p>
                                </div>
                                <div class="card-body">
                                    <div class="">


    <form method="post" action="{{route('setting.edit',$title->id)}}">
@csrf
@method('PUT')
<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Website Title</label>
      <input type="text" class="form-control" name="name" value="{{$title->value}}">
    </div>
</div>
</div>

<button type="submit" class="btn btn-primary pull-right">Save</button>
<div class="clearfix"></div>

    </form>


    <form method="post" action="{{route('setting.logo')}}" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="row">
<div class="col-md-12">
  <label class="control-label">Main Logo</label><br/>
  <div><img width="120px" src="/uploads/settings/{{$logo->value}}" alt="No Image"></div>
  <input type="file" name="mainLogo">
</div>
<div class="col-md-12">
  <label class="control-label">Sticky Logo</label><br/>
  <div><img width="120px" src="/uploads/settings/{{$stickyLogo->value}}" alt="No Image"></div>
  <input type="file" name="stickyLogo">
</div>
</div>
<button type="submit" class="btn btn-primary pull-right">Save</button>
<div class="clearfix"></div>

    </form>


    <form method="post" action="{{route('setting.about')}}" enctype="multipart/form-data">
    <h4>About US</h4>
@csrf
@method('PUT')
<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">About US Text</label>
      <textarea class="form-control" name="name">{{$title->value}}</textarea>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12">
  <label class="control-label">About US Image</label><br/>
  <div><img width="120px" src="/uploads/settings/{{$stickyLogo->value}}" alt="No Image"></div>
  <input type="file" name="image">
</div>
</div>
</div>
<button type="submit" class="btn btn-primary pull-right">Save</button>
<div class="clearfix"></div>

    </form>



    <form method="post" action="{{route('setting.edit',$title->id)}}">
    <h4>Reservation Allow Time</h4>
@csrf
@method('PUT')
<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Hours</label>
      <input type="text" class="form-control" name="name" value="{{$title->value}}">
    </div>
</div>

<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Lunch</label>
      <input type="text" class="form-control" name="name" value="{{$title->value}}">
    </div>
</div>

<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Dinner</label>
      <input type="text" class="form-control" name="name" value="{{$title->value}}">
    </div>
</div>
</div>

<button type="submit" class="btn btn-primary pull-right">Save</button>
<div class="clearfix"></div>

    </form>




    <form method="post" action="{{route('setting.edit',$title->id)}}">
    <h4>Contact US SideBox</h4>
@csrf
@method('PUT')
<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Address</label>
      <input type="text" class="form-control" name="name" value="{{$title->value}}">
    </div>
</div>

<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Phone</label>
      <input type="text" class="form-control" name="name" value="{{$title->value}}">
    </div>
</div>

<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Email</label>
      <input type="text" class="form-control" name="name" value="{{$title->value}}">
    </div>
</div>
</div>

<button type="submit" class="btn btn-primary pull-right">Save</button>
<div class="clearfix"></div>

    </form>




    <form method="post" action="{{route('setting.edit',$title->id)}}">
    <h4>Social Network Link</h4>
@csrf
@method('PUT')
<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Facebook</label>
      <input type="text" class="form-control" name="name" value="{{$title->value}}">
    </div>
</div>

<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Twitter</label>
      <input type="text" class="form-control" name="name" value="{{$title->value}}">
    </div>
</div>

<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Google Plus</label>
      <input type="text" class="form-control" name="name" value="{{$title->value}}">
    </div>
</div>

<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">LinkedIn</label>
      <input type="text" class="form-control" name="name" value="{{$title->value}}">
    </div>
</div>

</div>
<button type="submit" class="btn btn-primary pull-right">Save</button>
<div class="clearfix"></div>

    </form>



    <form method="post" action="{{route('setting.edit',$title->id)}}">
@csrf
@method('PUT')
<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Footer</label>
      <input type="text" class="form-control" name="name" value="{{$title->value}}">
    </div>
</div>
</div>

<button type="submit" class="btn btn-primary pull-right">Save</button>
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