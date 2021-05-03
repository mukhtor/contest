@extends('sayt.layout.layout')

@section('main_content')
    <body class="test">
    <h1>Тест</h1>
    <div class="timer">
        <div id="ten-countdown" class="timer"></div>
    </div>
    @foreach($model as $index)
    <!--Вопрос-->
    <div class="question">
        <h2>Вопрос</h2>
            {!! $index['questions'] !!}
    </div>
    <!--Редактор-->
    <div class="editor-container">
        <h2>Редактор</h2>
        <div class="editor">
        </div>
        <button class="btn btn-primary" id="result-btn"> Показать результат</button>
    </div>
    <!--Окно для отоброжения -->
    <div class="result">
        <h2>Результат</h2>
        <iframe src="" frameborder="1" id="frame"></iframe>
    </div>
@endforeach
    <!--Кнопки для перехода по вопросам-->
    <div class="nav-ber">
        <ul class="pagination">
            {{$model->links()}}
        </ul>
    </div>

    <!--Кнопка для отправки формы-->
    <div class="submit">
        <a href="" class="btn btn-success"> Закончить тест</a>
    </div>
    </body>

@endsection
