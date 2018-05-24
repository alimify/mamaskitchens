@extends('layouts.app')

@section('title','Items')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endpush


@section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('item.create')}}" class="btn btn-info">Add New</a>
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Items</h4>
                                    <p class="card-category"> All Items list are here. you can upload , edit , delete items from here.</p>
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
                                                    Price
                                                </th>
                                                <th>
                                                    Category
                                                </th>
                                                <th>
                                                Description
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
                                            @foreach($items as $key=>$item)
                                                <tr>
                                                    <td class="text-primary">
                                                        {{$key+1}}
                                                    </td>
                                                    <td>
                                                        {{$item->name}}
                                                    </td>
                                                    <td>
                                                        {{$item->price}}
                                                    </td>
                                                    <td>
                                                    {{$item->category->name}}
                                                    </td>
                                                    <td>
                                                    {{$item->description}}
                                                    </td>
                                                    <td>
                                                    <img width="120px" src="{{asset('uploads/items/'.$item->image)}}" alt="No Image">
                                                    </td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>{{$item->updated_at}}</td>
                                                    <td>
                                                    <a href="{{route('item.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></i></a>
                                                    <form method="POST" id="delete-form-{{$item->id}}" action="{{route('item.destroy',$item->id)}}" style="display:none">
                                                    @csrf 
                                                    @method('DELETE')
                                                    </form>
                                                    <button class="btn btn-danger btn-sm" onclick="
                                                    event.preventDefault();
                                                    if(confirm('Are you sure to delete ?')){
                                                       document.getElementById('delete-form-{{$item->id}}').submit()
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