@extends('layouts.app')


@section('title','Dashboard')


@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

@endpush


@section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">content_copy</i>
                                    </div>
                                    <p class="card-category">Category / Item</p>
                                    <h3 class="card-title">{{$categoryCount}}/{{$itemCount}}
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-danger">warning</i>
                                        <a href="#pablo">All categories and items</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">slideshow</i>
                                    </div>
                                    <p class="card-category">Sliders</p>
                                    <h3 class="card-title">{{$sliderCount}}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> <a href="{{route('slider.index')}}">See More Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">info_outline</i>
                                    </div>
                                    <p class="card-category">Reservations</p>
                                    <h3 class="card-title">{{$reservations->count()}}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> All Non-confirm reservations
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                    <p class="card-category">Contacts</p>
                                    <h3 class="card-title">{{$contactCount}}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> 
                                        <a href="{{route('contact.index')}}">See More Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Reservations</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table" class="table table-striped table-bordered">
                                            <thead class=" text-primary">
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                Email
                                                </th>
                                                <th>
                                                Phone
                                                </th>
                                                <th>
                                                Time
                                                </th>

                                                <th>Created AT</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                            @foreach($reservations as $key=>$reservation)
                                                <tr>
                                                    <td class="text-primary">
                                                        {{$key+1}}
                                                    </td>
                                                    <td>
                                                        {{$reservation->name}}
                                                    </td>
                                                    <td>
                                                    {{$reservation->email}}
                                                    </td>
                                                    <td>
                                                    {{$reservation->phone}}
                                                    </td>
                                                    <td>
                                                    {{$reservation->dateTime}}
                                                    </td>

                                                    <td>
                                                    {{$reservation->created_at}}                                                   
                                                    </td>
                                                    <td>
                                                    @if($reservation->status)
                                                    <button class="btn btn-success btn-sm">
                                                    <i class="material-icons">check_circle</i>
                                                    </button>
                                                    @else
                                                    <form method="POST" id="confirm-form-{{$reservation->id}}" action="{{route('reservation.confirm',$reservation->id)}}" style="display:none">
                                                    @csrf 
                                                    @method('PUT')
                                                    </form>
                                                    <button class="btn btn-success btn-sm" onclick="
                                                    event.preventDefault();
                                                    if(confirm('Are you sure to confirm ?')){
                                                       document.getElementById('confirm-form-{{$reservation->id}}').submit()
                                                    }"><i class="material-icons">check</i></button>



                                                    <form method="POST" id="delete-form-{{$reservation->id}}" action="{{route('reservation.destroy',$reservation->id)}}" style="display:none">
                                                    @csrf 
                                                    @method('DELETE')
                                                    </form>
                                                    <button class="btn btn-info btn-sm" onclick="
                                                    event.preventDefault();
                                                    if(confirm('Are you sure to Reject ?')){
                                                       document.getElementById('delete-form-{{$reservation->id}}').submit()
                                                    }"><i class="material-icons">clear</i></button>

                                                    @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>




                </div>
            </div>
@endsection


@push('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#table').DataTable();
} );
</script>
@endpush