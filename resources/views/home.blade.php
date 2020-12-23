@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0">
        <div class="row justify-content-center">

            <!-- New Goal card -->
            <div class="col-md-6 col-sm-6 col-12 col-lg-3 my-auto">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">{{ __('New Goal') }}</div>

                    <div class="card-body text-center">
                        <p class="p-3">Here you can add a new Goal to your life. <br> GO AHEAD!</p>
                        <a href="{{ url('goals/create')}}" class="btn btn-success rounded d-block">Create new goal</a>
                    </div> <!-- Card Body end -->
                </div> <!-- Card end -->
            </div> <!-- New Goal Card end -->


            <!-- Goal card -->
            <div class="col-md-6 col-sm-6 col-12 col-lg-3 my-auto">
                <div class="card mb-4">
                    <div class="card-header text-center font-weight-bold">{{ __('Goal Title') }}</div>

                    <div class="card-body">
                        <div class="row mx-1" style="height: 3rem">
                            <p class="pb-0 mb-0 line-clamp">Here goes the description of the goal, maybe there is a big text
                                then I have to break the text!</p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">Data:</div>
                            <div class="col-6 text-right">Value</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">Data:</div>
                            <div class="col-6 text-right">Value</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">Data:</div>
                            <div class="col-6 text-right">Value</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">Data:</div>
                            <div class="col-6 text-right">Value</div>
                        </div>
                    </div> <!-- Card Body end -->
                    <div class="card-footer">
                        <div class="container-fluid p-0 m-0 text-center row">
                            <div class="col-4"><a href="#" class="btn btn-success rounded">V</a></div>
                            <div class="col-4"><a href="{{ url('goals/1/edit') }}" class="btn btn-warning rounded">E</a></div>
                            <div class="col-4"><a href="#" class="btn btn-danger rounded">D</a></div>
                        </div>
                    </div> <!-- Card Footer end -->
                </div> <!-- Card end -->
            </div> <!-- Goal Card end -->

            <!-- New Goal card -->
            <div class="col-md-6 col-sm-6 col-12 col-lg-3 my-auto">
                <div class="card mb-4">
                    <div class="card-header text-center font-weight-bold">{{ __('Goal Title') }}</div>

                    <div class="card-body">
                        <div class="row mx-1" style="height: 3rem">
                            <p class="pb-0 mb-0 line-clamp">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
                                dolor facilis harum distinctio placeat rem fugiat ut, ullam blanditiis eveniet corporis
                                quaerat at maxime, porro consequatur, provident earum eos doloremque!</p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">Data:</div>
                            <div class="col-6 text-right">Value</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">Data:</div>
                            <div class="col-6 text-right">Value</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">Data:</div>
                            <div class="col-6 text-right">Value</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">Data:</div>
                            <div class="col-6 text-right">Value</div>
                        </div>
                    </div> <!-- Card Body end -->
                    <div class="card-footer">
                        <div class="container-fluid p-0 m-0 text-center row">
                            <div class="col-4"><a href="#" class="btn btn-success rounded">V</a></div>
                            <div class="col-4"><a href="#" class="btn btn-warning rounded">E</a></div>
                            <div class="col-4"><a href="#" class="btn btn-danger rounded">D</a></div>
                        </div>
                    </div> <!-- Card Footer end -->
                </div> <!-- Card end -->
            </div> <!-- Goal Card end -->

        </div> <!-- Row end -->

    </div>
@endsection
