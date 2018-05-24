@extends('layouts.app')

@section('title','Show Contact Message')

@push('css')

@endpush


@section('content')
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">{{$contact->subject}}</h4>
                                    <p class="card-category">{{$contact->created_at}}</p>
                                </div>
                                <div class="card-body">

<div class="row"><b>Name :</b> <span>{{$contact->name}}</span></div>
<div class="row"><b>Email : </b> <span>{{$contact->email}}</span></div>
<div class="row"><b>Message :</b><br/>
<span>
{{$contact->message}}
</span></div>



<a href="{{route('contact.index')}}" class="btn btn-primary btn-danger">Back</a>
<div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
@endsection


@push('scripts')

@endpush