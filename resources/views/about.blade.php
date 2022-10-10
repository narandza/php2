@extends('main_layouts.master')

@section('title', 'TravelBlog | About')

@section('content')

    <div id="colorlib-counter" class="colorlib-counters">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="about-desc">
                        <div class="about-img-1 animate-box" style="background-image: url({{ asset('storage/' . $setting->about_first_image) }})"></div>
                        <div class="about-img-2 animate-box" style="background-image: url({{ asset('storage/' . $setting->about_second_image) }})"></div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 colorlib-heading animate-box">
                            <h1 class="heading-big">Who are we</h1>
                            <h2>Who are we</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 animate-box">
                            <p>{{ $setting->about_first_text }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>How can this blog help you?</h3>
                    <p>{{ $setting->about_second_text }}</p>
                </div>
                <div class="col-md-6">
                    <div class="fancy-collapse-panel">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Our Mission
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="row">
                                            {!! $setting->about_our_mission !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Our Vision
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        {!! $setting->about_our_vision !!}
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Services
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        {!! $setting->about_services !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
