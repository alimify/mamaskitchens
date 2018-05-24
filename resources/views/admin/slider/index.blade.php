@extends('layouts.app')

@section('title','Slider')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endpush


@section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('slider.create')}}" class="btn btn-info">Add New</a>
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Sliders</h4>
                                    <p class="card-category"> All Sliders list are here. you can upload , edit , delete sliders from here.</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table" class="table table-striped table-bordered">
                                            <thead class=" text-primary">
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Title
                                                </th>
                                                <th>
                                                    Sub title
                                                </th>
                                                <th>
                                                    Image
                                                </th>
                                                <th>
                                                    Created AT
                                                </th>
                                                <th>Updated AT</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                            @foreach($silders as $key=>$slider)
                                                <tr>
                                                    <td class="text-primary">
                                                        {{$key+1}}
                                                    </td>
                                                    <td>
                                                        {{$slider->title}}
                                                    </td>
                                                    <td>
                                                        {{$slider->sub_title}}
                                                    </td>
                                                    <td>
                                                    <img width="120px" src="/uploads/sliders/{{$slider->image}}" alt="No Image">
                                                    </td>
                                                    <td>{{$slider->created_at}}</td>
                                                    <td>{{$slider->updated_at}}</td>
                                                    <td>
                                                    <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></i></a>
                                                    <form method="POST" id="delete-form-{{$slider->id}}" action="{{route('slider.destroy',$slider->id)}}" style="display:none">
                                                    @csrf 
                                                    @method('DELETE')
                                                    </form>
                                                    <button class="btn btn-danger btn-sm" onclick="
                                                    event.preventDefault();
                                                    if(confirm('Are you sure to delete ?')){
                                                       document.getElementById('delete-form-{{$slider->id}}').submit()
                                                    }"><i class="material-icons">delete</i></button>
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