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
                            <h5>{{$questions[0]->getContest->title ?? "Empty"}}</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>
                                <div id="ten-countdown" class="timer text-right"></div>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="accordion">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <p class="text-center">Savollar</p>
                        @foreach($questions as $index => $question)
                            <button id="heading{{ $index + 1 }}" class="btn btn-link m-auto" data-toggle="collapse"
                                    data-target="#collapse{{$index + 1}}" aria-expanded="true"
                                    aria-controls="collapse{{$index + 1}}">
                                Question #{{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        @foreach($questions as $index => $question)
                            <div id="collapse{{$index + 1}}" class="collapse {{!$index ? "show": ""}}"
                                 aria-labelledby="heading{{ $index + 1 }}" data-parent="#accordion">
                                <div class="card-body">
                                    <h6>Question #{{ $index + 1 }}</h6>
                                    <p>{!! $question->question->questions  !!}</p>
                                </div>
                                <textarea id="editor{{$index + 1}}">
                                </textarea>
                                <div class="result">
                                    <h2>Результат</h2>
                                    <iframe src="" frameborder="1" id="frame{{$index + 1}}"></iframe>
                                </div>
                                @push("child2-scripts")
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
                                        var editor = CodeMirror.fromTextArea(document.getElementById('editor{{$index + 1}}'), {
                                            mode: mixedMode,
                                            selectionPointer: true,
                                            autoCloseTags: true,
                                            lineNumbers: true
                                        });
                                        editor.setOption("theme", "darcula");
                                        editor.getDoc().setValue(`{!! $question->answer !!}`);

                                        function showResult(iframe, editorRoot) {
                                            console.log(editorRoot.getValue());
                                            const iframePage = iframe.contentDocument ||  iframe.contentWindow.document;
                                            iframePage.open();
                                            iframePage.write(editorRoot.getValue());
                                            iframePage.close();
                                        }
                                        // let delay;
                                        editor.on("change", function() {
                                            // clearTimeout(delay);
                                            // delay = setTimeout(() => {
                                                showResult(document.querySelector('#frame{{$index+1}}'), editor)
                                            // }, 500);
                                        });
                                    </script>
                                @endpush

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('child-scripts')
        <script src="{{asset('vendor/codemirror/lib/codemirror.js')}}"></script>
        <script src="{{asset('vendor/codemirror/addon/selection/selection-pointer.js')}}"></script>
        <script src="{{asset('vendor/codemirror/addon/edit/closetag.js')}}"></script>
        <script src="{{asset('vendor/codemirror/addon/fold/xml-fold.js')}}"></script>
        <script src="{{asset('vendor/codemirror/mode/xml/xml.js')}}"></script>
        <script src="{{asset('vendor/codemirror/mode/javascript/javascript.js')}}"></script>
        <script src="{{asset('vendor/codemirror/mode/css/css.js')}}"></script>
        <script src="{{asset('vendor/codemirror/mode/vbscript/vbscript.js')}}"></script>
        <script src="{{asset('vendor/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>

    @endpush

@endsection
