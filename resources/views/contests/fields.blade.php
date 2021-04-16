<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Begin Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('begin_date', 'Begin Date:') !!}
    {!! Form::text('begin_date', null, ['class' => 'form-control','id'=>'begin_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#begin_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Duration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duration', 'Duration:') !!}
    {!! Form::number('duration', null, ['class' => 'form-control']) !!}
</div>