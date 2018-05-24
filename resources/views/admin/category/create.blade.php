@extends('layouts.app')

@section('title','Add Category')

@push('css')

@endpush


@section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Add Category</h4>
                                    <p class="card-category">add new category you want..</p>
                                </div>
                                <div class="card-body">
                                    <div class="">


    <form method="post" action="{{route('category.store')}}">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="form-group">
      <label class="bmd-label-floating">Name</label>
      <input type="text" class="form-control" name="name">
    </div>
</div>
</div>

<a href="{{route('category.index')}}" class="btn btn-primary btn-danger">Back</a>
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