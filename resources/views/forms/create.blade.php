@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0">
        <!-- Modal for the form -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Goal</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/goals') }}" method="POST">
                        <div class="container-fluid form-group row">
                            @method('post')
                            @csrf
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Título para tu meta:</label>
                            <input class="col-sm-7 form-control" type="text" name="title"
                                placeholder="Asigna un titulo a tu meta" maxlength="20" value="{{old('title')}}" required>
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Descripción:</label>
                            <input class="col-sm-7 form-control" type="text" name="description"
                                placeholder="Describe brevemente tu meta" maxlength="64" value="{{old('description')}}" required>
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Meta:</label>
                            <input class="col-sm-7 form-control" type="number" name="goal" placeholder="Monto al que deseas llegar"
                                min="0" value="{{old('goal')}}" required>
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 pb-0 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Fecha límite:</label>
                            <input class="col-sm-7 form-control" type="date" name="limit_day" min="{{ date('Y-m-d') }}"
                                placeholder="Día final de la meta" value="{{old('limit_day')}}" required>
                        </div>
                        <div class="modal-footer pt-4 pb-0 mb-0">
                            <a href="{{ url('/home') }}" class="btn btn-warning">Atrás</a>
                            <input type="submit" class="btn btn-success" value="Guardar">
                        </div>
                    </form>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger m-0 p-2">
                        <h5>Hay uno o varios errores:</h5>
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
