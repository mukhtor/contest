<?php
/**
 * @var $questions \App\Models\ContestHistories[]
 */
?>
@extends('layouts.site.layout')
@push('page-css')
    <link href="{{ asset('vendor/codemirror/lib/codemirror.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/codemirror/theme/darcula.css') }}" rel="stylesheet">
@endpush
@section('main_content')
    <div>
        <div class="card">
            <div class="card-body">
                <div class="pl-3 pr-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>{{$questions[$number - 1]->getContest->title ?? "Empty"}}</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>
                                @if(!$questions[$number - 1]->getContest->isFinish())
                                    <p id="countdown" class="text-right" data-status="start" data-time="{{$questions[$number - 1]->getContest->toFinish()}}">
                                        {{ date("h:i:s", strtotime("today") + $questions[$number - 1]->getContest->toFinish()) }}
                                    </p>
                                @else
                                    <p id="countdown" class="text-right" data-status="finish" data-time="0" data-callback-url="">
                                        00:00:00
                                    </p>
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::model($questions[$number - 1], ['route' => ['site.answer', $questions[$number - 1]->contest_id], 'method' => 'patch']) !!}
            <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <p class="text-center">Savollar</p>
                        @foreach($questions as $index => $question)
                            {!! Form::submit('Question #'.($index + 1), ['class' => 'btn btn-link', 'name' => 'submit']) !!}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        @include('flash::message')
                        <input type="submit" value="Saqlash" name="submit" class="float-right btn btn-success btn-sm"></input>
                        <h6><b>Question #{{ $number }}</b></h6>
                        <p>{!! $questions[$number - 1]->question->questions  !!}</p>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="number" value="{{ $number }}">
                                <textarea id="editor" name="answer"></textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="result">
                                    <iframe class="border" width="100%" height="300px" src="" frameborder="1" id="frame"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
    @push('child-scripts')
        <script>
            let countdown = $('#countdown');
            let dist = parseInt(countdown.attr('data-time')) * 1000;
            let interval = setInterval(fun, 1000);
            let status = countdown.attr('data-status');
            function fun(){

                let addZero = (x) => {
                    if (x < 10) x = "0" + x;
                    return x;
                }
                let numOfDays = Math.floor(dist / (1000 * 60 * 60 * 24));

                let hr = Math.floor((dist % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                let min = Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60));

                let sec = Math.floor((dist % (1000 * 60)) / 1000);

                hr = addZero(hr);
                min = addZero(min);
                sec = addZero(sec);

                let ans = "";
                if (numOfDays)
                    ans += numOfDays + "d ";

                countdown.html(ans + hr + ":" + min + ":" + sec);

                if (dist <= 0){
                    countdown.html("Finished!");
                    clearInterval(interval);
                    if (status !== 'finish'){
                        location.reload();
                    }
                }else{
                    dist -= 1000;
                }
            }
        </script>
        <script src="{{asset('vendor/codemirror/lib/codemirror.js')}}"></script>
        <script src="{{asset('vendor/codemirror/addon/selection/selection-pointer.js')}}"></script>
        <script src="{{asset('vendor/codemirror/addon/edit/closetag.js')}}"></script>
        <script src="{{asset('vendor/codemirror/addon/fold/xml-fold.js')}}"></script>
        <script src="{{asset('vendor/codemirror/mode/xml/xml.js')}}"></script>
        <script src="{{asset('vendor/codemirror/mode/javascript/javascript.js')}}"></script>
        <script src="{{asset('vendor/codemirror/mode/css/css.js')}}"></script>
        <script src="{{asset('vendor/codemirror/mode/vbscript/vbscript.js')}}"></script>
        <script src="{{asset('vendor/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
        <script>
            var mixedMode = {
                name: "htmlmixed",
                scriptTypes: [{
                    matches: /\/x-handlebars-template|\/x-mustache/i,
                    mode: null
                },
                    {
                        matches: /(text|application)\/(x-)?vb(a|script)/i,
                        mode: "vbscript"
                    }]
            };
            var editor = CodeMirror.fromTextArea(document.getElementById('editor'), {
                mode: mixedMode,
                selectionPointer: true,
                autoCloseTags: true,
                lineNumbers: true
            });
            editor.getDoc().setValue(`{!! $questions[$number - 1]->answer !!}`);

            function showResult(iframe, editorRoot) {
                console.log(editorRoot.getValue());
                const iframePage = iframe.contentDocument ||  iframe.contentWindow.document;
                iframePage.open();
                iframePage.write(editorRoot.getValue());
                iframePage.close();
            }
            showResult(document.querySelector('#frame'), editor)
            // let delay;
            editor.on("change", function() {
                // clearTimeout(delay);
                // delay = setTimeout(() => {
                showResult(document.querySelector('#frame'), editor)
                // }, 500);
            });
        </script>

    @endpush

@endsection
