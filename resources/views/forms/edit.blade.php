@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0">
        <!-- Modal for the form -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header row mx-0">
                    <h5 class="modal-title col-6">Edit Goal</h5>
                    <h5 class="modal-title col-6 text-right">{{ $goal->title }}</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ url('goals/' . $goal->id) }}" method="POST">
                        <div class="container-fluid form-group row">
                            @method('PUT')
                            @csrf
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Título:</label>
                            <input class="col-sm-7 form-control" type="text" name="title" value="{{ $goal->title }}"
                                maxlength="20" required>
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal description">Descripción:</label>
                            <input class="col-sm-7 form-control" type="text" name="description"
                                value="{{ $goal->description }}" maxlength="64" required>
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal">Meta:</label>
                            <input class="col-sm-7 form-control" type="number" name="goal" value="{{ $goal->goal }}"
                                required>
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 pb-2 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal limit day">Fecha límite:</label>
                            <input class="col-sm-7 form-control" type="date" name="limit_day" min="{{ date('Y-m-d') }}"
                                value="{{ $goal->limit_day }}" required>
                        </div>
                        <div class="modal-footer pt-4 pb-0 mb-0">
                            <a href="{{ url('/home') }}" class="btn btn-warning">Atrás</a>
                            <input type="submit" class="btn btn-success" value="Guardar">
                        </div>
                    </form>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger m-0 p-2">
                        <h5>Hay uno o más errores:</h5>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div> <!-- Modal End -->
    </div>
@endsection
