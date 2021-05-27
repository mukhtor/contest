<!-- Group Id Field -->
<div class="col-sm-12">
    {!! Form::label('group_id', 'Group Id:') !!}
    <p>{{ $users->group_id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $users->name }}</p>
</div>

<!-- Role Field -->
<div class="col-sm-12">
    {!! Form::label('role', 'Role:') !!}
    <p>{{ $users->role }}</p>
</div>

<!-- Username Field -->
<div class="col-sm-12">
    {!! Form::label('username', 'Username:') !!}
    <p>{{ $users->username }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $users->password_deHash}}</p>
</div>

<!-- Remember Token Field -->
<div class="col-sm-12">
    {!! Form::label('ip', 'IP:') !!}
    <p>{{ $users->ip }}</p>
</div>

