<!-- Questions Field -->
<div class="col-sm-12">
    {!! Form::label('questions', 'Questions:') !!}
    <p>{{ $questions->questions }}</p>
</div>

<!-- Editor Field -->
<div class="col-sm-12">
    {!! Form::label('editor', 'Editor:') !!}
    <p>{{ $questions->editor }}</p>
</div>

<!-- Subject Id Field -->
<div class="col-sm-12">
    {!! Form::label('subject_id', 'Subject Id:') !!}
    <p>{{ $questions->subject_id }}</p>
</div>

