@extends('layouts.app')

@section('content')
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
               
                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div><br />
                                    @endif
                                    @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <p>{{ \Session::get('success') }}</p>
                                    </div><br />
                            @endif
                <form class="form-horizontal" method="POST" action="{{route('curr',[$plans->id])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                       
                            <div class="form-group row">
                           

                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="currency" value="{{$plans->currency}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
                                 </div>
                            <div class="col col-lg-4">
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('change Currency') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                      
                </form>
               
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection