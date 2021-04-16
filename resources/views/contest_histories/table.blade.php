<div class="table-responsive">
    <table class="table" id="contestHistories-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Question Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contestHistories as $contestHistories)
            <tr>
                <td>{{ $contestHistories->user_id }}</td>
            <td>{{ $contestHistories->question_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contestHistories.destroy', $contestHistories->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contestHistories.show', [$contestHistories->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contestHistories.edit', [$contestHistories->id]) }}" class='btn btn-default btn-xs'>
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
