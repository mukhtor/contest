<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>FIO</th>
            <th>GROUP</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($contest->users as $index => $userId)
            <tr>
                <td><?=$index + 1?></td>
                <?php $user = \App\Models\User::find($userId);?>
                <td><?=$user->name?></td>
                <td><?=$user->group->name?></td>
                <td> <a href="{{route('result',['id' => $contest->id, 'user_id' => $userId])}}" class="btn btn-success">Result</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
