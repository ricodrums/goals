@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0">

        @if (sizeof($completed))
        <div class="justify-content-center row my-2 mx-2 py-2 px-2 border border-success">
            <p class="col-6 pt-3">Has alcanzado el tiempo límite de algunas metas...</p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success col-6" data-toggle="modal" data-target="#completedModal">
                ¡Ver!
            </button>
        </div>
        @endif

        <!-- Cards container -->
        <div class="row justify-content-center">

            <!-- New Goal card -->
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 my-auto">
                <div class="card mb-4">
                    <div class="card-header text-center font-weight-bold">{{ __('Nueva Meta') }}</div>

                    <div class="card-body text-center">
                        <p class="p-3">Aquí puede agregar nuevas metas en tu vida.<br>¡VAMOS!</p>
                        <a href="{{ url('goals/create') }}" class="btn btn-success rounded d-block">Crear nueva Meta</a>
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
                                <div class="col-6 font-weight-bold">Meta:</div>
                                <div class="col-6 text-right">$&nbsp;{{ number_format($goal->goal) }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 font-weight-bold">Pago Diario:</div>
                                <div class="col-6 text-right">$&nbsp;{{ number_format($goal->daily_pay) }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 font-weight-bold">Ahorrado:</div>
                                <div class="col-6 text-right">$&nbsp;{{ number_format($goal->saved) }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 font-weight-bold">Deberías tener:</div>
                                <div class="col-6 text-right">$&nbsp;{{  number_format($goal->supposed) }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 font-weight-bold">Ult. pago:</div>
                                <div class="col-6 text-right">$&nbsp;{{ number_format($goal->last) }}</div>
                            </div>
                            <hr>
                            <div class="row 
                            @if($goal->difference >= 0)
                            {{ "text-success" }}        
                            @else
                            {{ "text-danger" }}                                
                            @endif">
                                <div class="col-6 font-weight-bold">Diferencia:</div>
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
        @include('forms.completed')
    </div>
    <script src="{{asset('js/script.js')}}"></script>
@endsection
