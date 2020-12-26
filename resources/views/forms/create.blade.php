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
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Goal title:</label>
                            <input class="col-sm-7 form-control" type="text" name="title" placeholder="Set the title for the goal" required>
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Goal description:</label>
                            <input class="col-sm-7 form-control" type="text" name="description" placeholder="Set a description for the goal" required>
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Goal:</label>
                            <input class="col-sm-7 form-control" type="number" name="goal" placeholder="Set the goal amount" min="0" required>
                        </div>
                        <div class="container-fluid form-group px-0 mx-0 pb-2 row">
                            <label class="col-sm-5 d-block d-sm-inline" for="goal title">Limit Day:</label>
                            <input class="col-sm-7 form-control" type="date" name="limit_day" min="{{ date('Y-m-d') }}" placeholder="What is the limit of the goal reach" required>
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
