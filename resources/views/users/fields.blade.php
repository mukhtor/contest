<!-- Group Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('group_id', 'Group Id:') !!}
    {!! Form::select('group_id', $group ?? '', null, ['class' => 'form-control']) !!}
</div>
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::textarea('name', null, ['class' => 'form-control']) !!}
</div>




