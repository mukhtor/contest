<!-- Title Field -->
<div class="form-group col-sm-12">
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
            format: 'YYYY-MM-DD HH:mm',
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

@foreach($subjects as $index => $subject)
    <div class="form-group col-sm-2">
        {!! Form::label("subjects[$index]", "$subject:") !!}
        {!! Form::number(
            "subjects[$index]",
            $subjects_count[$index] ?? 0,
            [
                'class' => 'form-control',
                'max' => \App\Models\Questions::where(
                    ['subject_id' => $index]
                    )->count(),
                'min' => 0
            ])
        !!}
    </div>
@endforeach


