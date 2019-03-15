@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                
                @foreach($allPlans as $plans)
                <form class="form-horizontal" method="POST" action="{{ route('transaction.store') }}">
                        {{ csrf_field() }}

                   
                    <div class="card-body row">
                        <div class="col col-lg-3">
                            <input name="id"type="hidden" value="{{$plans->id}}">
                            <input name="name" readonly value="{{$plans->name}}" class="form-control">
                            <input name="amount" readonly value="{{$plans->amount}}"class="form-control">
                            <input name="period" readonly value="{{$plans->period}}"class="form-control">
                            <input name="currency" readonly value="{{$plans->currency}}"class="form-control">
                        </div>
                     
                     <div class="form-group mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('choose') }}
                                </button>
                            </div>
                        </div>
                    </div>    
                </form>
                @endforeach       
            </div>
        </div>
    </div>
</div>
@endsection