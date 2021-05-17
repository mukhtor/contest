@extends('layouts.site.layout')
@section('main_content')
    <div id="contact-cta" class="section">
        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <div class="m-auto text-center">
                    <h2 class="contest-title">{{$start->title}}</h2>

                    @if(strtotime($start->begin_date) > time())
                        <p class="countdown" data-status="start" data-time="{{strtotime($start->begin_date) - time()}}"></p>
                        <a class="main-button icon-button" href="{{route('begin')}}">Bosh Sahifa</a>
                    @else
                        <p class="countdown" data-status="finish" data-time="0" data-callback-url=""></p>
                        <a class="main-button icon-button" href="{{route('start_contest',$start->id)}}">Boshlash</a>
                    @endif
                </div>

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
@endsection
@push('child-scripts')
    <script>
        $(document).ready(function (){

            $('.countdown').each(function (){
                let countdown = $(this);
                let dist = parseInt(countdown.attr('data-time')) * 1000;
                let interval = setInterval(fun, 1000);
                let status = countdown.attr('data-status');
                function fun(){

                    let numOfDays = Math.floor(dist / (1000 * 60 * 60 * 24));

                    let hr = Math.floor((dist % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                    let min = Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60));

                    let sec = Math.floor((dist % (1000 * 60)) / 1000);

                    countdown.html(numOfDays + "d " + hr + "h " + min + "m " + sec + "s ");

                    if (dist <= 0){
                        clearInterval(interval);
                        if (status !== 'finish'){
                            location.reload();
                        }
                    }else{
                        dist -= 1000;
                    }
                }

            })
        })
    </script>
@endpush
