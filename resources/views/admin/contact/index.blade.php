@extends('layouts.app')

@section('title','Contact Messages')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endpush


@section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">All Contact Messages</h4>
                                    <p class="card-category"> All Contact Messages are here , read and delete them from here..</p>
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
                                                Subject
                                                </th>
                                                <th>
                                                Time
                                                </th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                            @foreach($contacts as $key=>$contact)
                                                <tr>
                                                    <td class="text-primary">
                                                        {{$key+1}}
                                                    </td>
                                                    <td>
                                                        {{$contact->name}}
                                                    </td>
                                                    <td>
                                                    {{$contact->email}}
                                                    </td>
                                                    <td>
                                                    {{$contact->subject}}
                                                    </td>
                                                    <td>
                                                    {{$contact->created_at}}
                                                    </td>
                                                    <td>
                                                    <a class="btn btn-info btn-sm" href="{{route('contact.show',$contact->id)}}"><i class="material-icons">visibility</i></a>
                                                    <form method="POST" id="delete-form-{{$contact->id}}" action="{{route('contact.destroy',$contact->id)}}" style="display:none">
                                                    @csrf 
                                                    @method('DELETE')
                                                    </form>
                                                    <button class="btn btn-info btn-sm" onclick="
                                                    event.preventDefault();
                                                    if(confirm('Are you sure to Reject ?')){
                                                       document.getElementById('delete-form-{{$contact->id}}').submit()
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