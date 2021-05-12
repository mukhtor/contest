<?php
/**
 * @var $questions \App\Models\Questions[]
 */
?>
@extends('layouts.site.layout')
@section('main_content')
   <div class="container">
       <div class="row">

           @foreach($questions as $item)
               <h1 class="text-center ">{{$item->getContest->title}}</h1>
          <div class="col-md-4">
              <label>Savol</label>
              <h4 style="padding: 5%;background-color: rgba(45,45,45,0.29);text-align: center;width: 100%">{!!  $item->getQuestions->questions!!}</h4>
              <label>Mavzu</label>
              <h4 style="padding: 5%;background-color: rgba(45,45,45,0.29);text-align: center;width: 100%">{!!  $item->getQuestions->getSubject->name!!}</h4>
              <label>Timer</label>
              <div class="timer" style="padding: 5%;background-color: rgba(45,45,45,0.29);text-align: center;width: 100%">
                  <div id="ten-countdown" class="timer"></div>
              </div>

          </div>
          <div class="col-md-8">
              <label>Sizning javobingiz</label>
              <textarea id="myTextarea" class="form-control" rows="10">{{$item->answer}}</textarea>
          </div>

           @endforeach
           {!! $questions->links()!!}
       </div>
   </div>
    <script>
        function countdown( elementName, minutes, seconds ) {
            var element, endTime, hours, mins, msLeft, time;

            function twoDigits( n )
            {
                return (n <= 9 ? "0" + n : n);
            }

            function updateTimer()
            {
                msLeft = endTime - (+new Date);
                if ( msLeft < 1000 ) {
                    element.innerHTML = "Time is up!";
                } else {
                    time = new Date( msLeft );
                    hours = time.getUTCHours();
                    mins = time.getUTCMinutes();
                    element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
                    setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
                }
            }

            element = document.getElementById( elementName );
            endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
            updateTimer();
        }

        countdown( "ten-countdown", 40,0, 0 );

        const resultBtn = document.querySelector('#result-btn');
        const iframe = document.querySelector('#frame')
        const editor = document.querySelector('.editor')

        const myCodeMirror = CodeMirror(editor, {
            theme: 'darcula',
            lineNumbers: true,
            autoCloseTags: true,
            keyMap: "sublime",
            scrollbarStyle: "overlay",
            autoCloseBrackets: true,
            extraKeys: {
                "F11": function(cm) {
                    cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                },
                "Esc": function(cm) {
                    if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                },
                "F1": function (cm) {
                    cm.setValue(
                        `<!doctype html>
<html lang="en">
<head>
   <style>

    </style>
	<title>Document</title>
</head>
<body>

</body>
</html>`)
                }
            }
        });
        function showResult(iframe, editorRoot) {
            const iframePage = iframe.contentDocument ||  iframe.contentWindow.document;
            iframePage.open();
            iframePage.write(editorRoot.getValue());
            iframePage.close();
        }


        resultBtn.addEventListener('click', () =>  {
            showResult(iframe, myCodeMirror)
        })


        let delay;
        myCodeMirror.on("change", function() {
            clearTimeout(delay);
            delay = setTimeout(() => {
                showResult(iframe, myCodeMirror)
            }, 500);
        });


    </script>
@endsection
