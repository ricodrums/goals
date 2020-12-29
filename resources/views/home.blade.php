@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0">

        <!-- Cards container -->
        <div class="row justify-content-center">

            <!-- New Goal card -->
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 my-auto">
                <div class="card mb-4">
                    <div class="card-header text-center font-weight-bold">{{ __('New Goal') }}</div>

                    <div class="card-body text-center">
                        <p class="p-3">Here you can add a new Goal to your life. <br> GO AHEAD!</p>
                        <a href="{{ url('goals/create') }}" class="btn btn-success rounded d-block">Create new goal</a>
                    </div> <!-- Card Body end -->
                </div> <!-- Card end -->
            </div> <!-- New Goal Card end -->

            @foreach ($goals as $goal)
                <!-- Goal card -->
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 my-auto">
                    <div class="card mb-4 @if ($goal->difference >= 0)
                        {{ "border-success" }}
                    @else
                        {{ "border-danger" }}
                    @endif">
                        <div class="card-header m-0 px-2 py-2 row">
                            <div class="col-lg-6 col-md-12 px-1 text-left font-weight-bold">{{$goal->title}}</div>
                            <div class="col-lg-6 col-md-12 px-1 text-right">{{$goal->limit_day}}</div>    
                        </div>

                        <div class="card-body p-3">
                            <div class="row mx-1" style="height: 2.6rem">
                                <p class="line-clamp">{{ $goal->description }}</p>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 font-weight-bold">Goal:</div>
                                <div class="col-6 text-right">$&nbsp;{{ number_format($goal->goal) }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 font-weight-bold">Daily Pay:</div>
                                <div class="col-6 text-right">$&nbsp;{{ number_format($goal->daily_pay) }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 font-weight-bold">Saved:</div>
                                <div class="col-6 text-right">$&nbsp;{{ number_format($goal->saved) }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 font-weight-bold">Supposed:</div>
                                <div class="col-6 text-right">$&nbsp;{{  number_format($goal->supposed) }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 font-weight-bold">L. Update:</div>
                                <div class="col-6 text-right">$&nbsp;{{ number_format($goal->last) }}</div>
                            </div>
                            <hr>
                            <div class="row 
                            @if($goal->difference >= 0)
                            {{ "text-success" }}        
                            @else
                            {{ "text-danger" }}                                
                            @endif">
                                <div class="col-6 font-weight-bold">Difference:</div>
                                <div class="col-6 text-right">$&nbsp;{{ number_format($goal->difference) }}</div>
                            </div>
                        </div> <!-- Card Body end -->
                        <div class="card-footer py-0">
                            <div class="container-fluid p-0 m-0 text-center row">
                                <div class="col-4 pt-1"><a class="text-success btn btn-link" href="" data-toggle="modal" data-target="#save-modal" onclick="showModal({{$goal->id}})"><i
                                            class="fas fa-piggy-bank fa-2x"></i></a></div>
                                <div class="col-4 pt-1"><a class="text-primary btn btn-link"
                                        href="{{ url('goals/' . $goal->id . '/edit') }}"><i
                                            class="fas fa-pen-alt fa-2x"></i></a></div>
                                <div class="col-4 pt-1"><button class="text-danger btn btn-link" href="" onclick="deleteGoal({{$goal}})"><i
                                            class="fas fa-trash-alt fa-2x"></i></button></div>
                            </div>
                        </div> <!-- Card Footer end -->
                    </div> <!-- Card end -->
                </div> <!-- Goal Card end -->
            @endforeach
        </div> <!-- Cards Container end -->

        <!-- Pagination links -->
        <div class="row justify-content-center">
            {{ $goals->links() }}
        </div>
        @include('forms.save-modal')
    </div>
    <script src="{{asset('js/script.js')}}"></script>
@endsection
