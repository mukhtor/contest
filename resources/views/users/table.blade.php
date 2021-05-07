<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr>
            <th>Group Id</th>
            <th>Name</th>
            <th>Role</th>
            <th>Username</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $users)
            <tr>
                <td>{{ $users->group->name}}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->role }}</td>
                <td>{{ $users->username }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['users.destroy', $users->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$users->id]) }}" class='btn btn-info '>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('users.edit', [$users->id]) }}" class='btn btn-warning'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
