<div class="table-responsive">
    <table class="table" id="contests-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Begin Date</th>
        <th>Duration</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contests as $contest)
            <tr>
                <td>{{ $contest->title }}</td>
            <td>{{ $contest->begin_date }}</td>
            <td>{{ $contest->duration }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contests.destroy', $contest->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contests.show', [$contest->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contests.edit', [$contest->id]) }}" class='btn btn-default btn-xs'>
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
