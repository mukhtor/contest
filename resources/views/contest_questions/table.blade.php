<div class="table-responsive">
    <table class="table" id="contestQuestions-table">
        <thead>
            <tr>
                <th>Contest Id</th>
        <th>Question Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contestQuestions as $contestQuestions)
            <tr>
                <td>{{ $contestQuestions->contest_id }}</td>
            <td>{{ $contestQuestions->question_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contestQuestions.destroy', $contestQuestions->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contestQuestions.show', [$contestQuestions->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contestQuestions.edit', [$contestQuestions->id]) }}" class='btn btn-default btn-xs'>
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
