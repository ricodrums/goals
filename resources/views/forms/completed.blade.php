    <!-- Modal -->
    <div class="modal fade" id="completedModal" tabindex="-1" role="dialog" aria-labelledby="completedModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="completedModalLabel">Limit day reached</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($completed as $goal)
                                <div class="carousel-item @if($loop->first) {{"active"}} @endif">
                                <div class="my-auto mx-4">
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
                                                <div class="col-6 pt-1"><a class="text-primary btn btn-link"
                                                        href="{{ url('goal/'.$goal->id.'/renew') }}"><i
                                                            class="fas fa-pen-alt fa-2x"></i></a></div>
                                                <div class="col-6 pt-1"><button class="text-danger btn btn-link" href="" onclick="deleteGoal({{$goal}})"><i
                                                            class="fas fa-trash-alt fa-2x"></i></button></div>
                                            </div>
                                        </div> <!-- Card Footer end -->
                                    </div> <!-- Card end -->
                                </div> <!-- Goal Card end -->
                                <div class="text-muted">
                                    You can edit the goal to give it a new value or new limit day or just delete it from your goals.
                                </div>
                            </div>
                            @endforeach
                        </div class="text-primary">
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
