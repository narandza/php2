@extends('main_layouts.master')

@section('title', 'TravelBlog | Author')

@section('content')

    <div id="colorlib-counter" class="colorlib-counters">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="about-desc">
                        <div class="about-img-1 animate-box" style="background-image: url({{ asset('storage/author.jpg') }})"></div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 colorlib-heading animate-box">
                            <h1 class="heading-big">Dimitrije Jovanović</h1>
                            <h2>35-19</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 animate-box">
                            <p>Zdravo! Ja sam Dimitrije Jovanović, trenutno sam student Visoke ICT akademije u Beogradu. Dolazim iz Pirota, gde sam završio gimanziju.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-about">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <h3>Dokumentacija</h3>
                    <p><a href="{{ asset('storage/documentation.pdf')}}">Documentation.pdf</a></p>
                </div>

            </div>
        </div>
    </div>

@endsection
