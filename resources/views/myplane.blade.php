@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                
                @foreach($plan as $plans )
                <div class="row">
                    @if($plans->name == 'Free')    
                        <div class="col col-lg-4">
                            <h3>{{$plans->name}}</h3>
                        </div>
                        <div  class="col col-lg-6">    
                            <a href="transaction/{{$plans->id}}/edit">Edit Name</a>
                        </div>    
                    @elseif($plans->name == 'Basic' OR $plans->name == 'Professional' ) 
                    <div class="col col-lg-4">

                            <h3>{{$plans->name}}</h3>
                    </div>
                    <div  class="col col-lg-6">        
                            <a href="transaction/{{$plans->id}}/edit">Edit Name</a>
                            <a href="{{route('curr',[$plans->id])}}">Change Currency</a>
                            <a href="transaction/{{$plans->id}}/upgrade">Upgrade</a>
                    </div>        
                    @endif 
                 </div>    
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection