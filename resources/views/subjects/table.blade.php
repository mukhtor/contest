<div class="table-responsive">
    <table class="table" id="subjects-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($subjects as $subjects)
            <tr>
                <td>{{ $subjects->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['subjects.destroy', $subjects->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('subjects.show', [$subjects->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('subjects.edit', [$subjects->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
