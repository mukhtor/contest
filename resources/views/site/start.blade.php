@extends('layouts.site.layout')
@section('main_content')
    <div id="contact-cta" class="section">
        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2 class="">{{$start->contest->title}}</h2>
                    <div class="col-md-6">
                        <label>Boshlanish vaxti</label>
                        <p class="lead">{{$start->contest->begin_date}}</p>
                    </div>
                    <div class="col-md-6">
                        <label>Davomiyligi</label>
                        <p class="lead">{{$start->contest->duration}}</p>
                    </div>
                    @if($start->contest->begin_date < strtotime('Y-m-d H:i:s',time()))
                    <a class="main-button icon-button" href="#">Bosh Sahifa</a>
                    @else
                    <a class="main-button icon-button" href="#">Boshlash</a>
                    @endif
                </div>

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
@endsection
