@extends('layouts.site.layout')
@section('main_content')
    <div id="contact-cta" class="section">
        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2 class="">{{$start->title}}</h2>
                    <div class="col-md-6">
                        <label>Boshlanish vaxti</label>
                        <p class="lead">{{$start->begin_date}}</p>
                    </div>
                    <div class="col-md-6">
                        <label>Davomiyligi</label>
                        <p class="lead">{{$start->duration}}</p>
                    </div>
                    @if(strtotime($start->begin_date) > time())

                    <a class="main-button icon-button" href="{{route('begin')}}">Bosh Sahifa</a>
                    @else
                    <a class="main-button icon-button" href="{{route('start_contest',$start->id)}}">Boshlash</a>
                    @endif
                </div>

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
@endsection
