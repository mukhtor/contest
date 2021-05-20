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

<div class="col-sm-12">
    <iframe width="100%" height="300px" id="frame" src="" frameborder="0"></iframe>
</div>

<!-- Subject Id Field -->
<div class="col-sm-12">
    {!! Form::label('subject_id', 'Subject Id:') !!}
    <p>{{ $questions->subject_id }}</p>
</div>
<script>
    let iframe = document.querySelector('#frame')
    const iframePage = iframe.contentDocument ||  iframe.contentWindow.document;
    iframePage.open();
    iframePage.write(`{!! $questions->editor !!}`);
    iframePage.close();
</script>
