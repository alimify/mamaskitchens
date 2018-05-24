@extends('layouts.app')

@section('title','Categories')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endpush


@section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('category.create')}}" class="btn btn-info">Add New</a>
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Categories</h4>
                                    <p class="card-category"> All Categories list are here. you can add , edit , delete categories from here.</p>
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
                                                Slug
                                                </th>
                                                <th>
                                                    Created AT
                                                </th>
                                                <th>Updated AT</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $key=>$category)
                                                <tr>
                                                    <td class="text-primary">
                                                        {{$key+1}}
                                                    </td>
                                                    <td>
                                                        {{$category->name}}
                                                    </td>
                                                    <td>
                                                    {{$category->slug}}
                                                    </td>
                                                    <td>{{$category->created_at}}</td>
                                                    <td>{{$category->updated_at}}</td>
                                                    <td>
                                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></i></a>
                                                    <form method="POST" id="delete-form-{{$category->id}}" action="{{route('category.destroy',$category->id)}}" style="display:none">
                                                    @csrf 
                                                    @method('DELETE')
                                                    </form>
                                                    <button class="btn btn-danger btn-sm" onclick="
                                                    event.preventDefault();
                                                    if(confirm('Are you sure to delete ?')){
                                                       document.getElementById('delete-form-{{$category->id}}').submit()
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