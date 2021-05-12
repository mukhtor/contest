<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $contest->title }}</p>
</div>

<!-- Begin Date Field -->
<div class="col-sm-12">
    {!! Form::label('begin_date', 'Begin Date:') !!}
    <p>{{ $contest->begin_date }}</p>
</div>

<!-- Duration Field -->
<div class="col-sm-12">
    {!! Form::label('duration', 'Duration:') !!}
    <p>{{ $contest->duration }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('question_count', 'Question Count:') !!}
    <p>{{ $contest->question_count }}</p>
</div>

