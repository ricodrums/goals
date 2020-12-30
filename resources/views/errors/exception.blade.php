@extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
    <h1>There is tremendo error...</h1>
</div>
<div class="container card">
    <div class="card-body">
        {{$exception}}
    </div>
</div>
<div class="container-fluid text-center text-muted">
    <p>I really want to find all errors and the necesary strength to solve them!</p>
</div>
    
@endsection