<div class="table-responsive">
    <table class="table" id="contestQuestions-table">
        <thead>
            <tr>
                <th>Contest Id</th>
        <th>Users Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contestUsers as $item)
            <tr>
                <td>{{ $item->contest->title}}</td>
            <td>
                @foreach( json_decode($item->user_id ) as $items)
                  {{$items}}
                @endforeach
            </td>
                <td width="120">
                    {!! Form::open(['route' => ['contestUsers.destroy', $item->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contestUsers.show', [$item->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contestUsers.edit', [$item->id]) }}" class='btn btn-default btn-xs'>
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
