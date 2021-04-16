<div class="table-responsive">
    <table class="table" id="questions-table">
        <thead>
            <tr>
                <th>Questions</th>
        <th>Editor</th>
        <th>Subject Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($questions as $questions)
            <tr>
                <td>{{ $questions->questions }}</td>
            <td>{{ $questions->editor }}</td>
            <td>{{ $questions->subject_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['questions.destroy', $questions->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('questions.show', [$questions->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('questions.edit', [$questions->id]) }}" class='btn btn-default btn-xs'>
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
