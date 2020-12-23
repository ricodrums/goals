@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0">
        <!-- Modal for the form -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header row mx-0">
                    <h5 class="modal-title col-6">Edit Goal</h5>
                    <h5 class="modal-title col-6 text-right">{{__('Goal Title')}}</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/goals/1') }}" method="POST">
                        <div class="container-fluid form-group row">
                            @method('put')
                            @csrf
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Goal title:</label>
                            <input class="col-sm-7 form-control" type="text">
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Goal description:</label>
                            <input class="col-sm-7 form-control" type="text">
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Goal:</label>
                            <input class="col-sm-7 form-control" type="text">
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 pb-2 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Limit Day:</label>
                            <input class="col-sm-7 form-control" type="date" min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="modal-footer pt-4">
                            <a href="{{ url('/home') }}" class="btn btn-warning">Back</a>
                            <input type="submit" class="btn btn-success" value="Save Changes">
                        </div>
                    </form>
                </div>

            </div>
        </div> <!-- Modal End -->
    </div>
@endsection
