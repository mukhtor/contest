<div class="form-group col-sm-6">
    <label>User Id</label>
    {{--    <select class="form-control" multiple name="user_id[]">--}}
    {{--        @foreach($group as $item)--}}
    {{--            <option value="{{\Illuminate\Support\Facades\DB::table('users')->where('group_id',$item->id)->pluck('id')->implode(',')}}" style="color: black;font-family: Algerian">{{$item->name}}</option>--}}
    {{--            @foreach(\Illuminate\Support\Facades\DB::table('users')->where('group_id',$item->id)->get() as $itemUser)--}}
    {{--                <option value="{{$itemUser->id}}">--{{$itemUser->username}}--</option>--}}
    {{--            @endforeach--}}
    {{--        @endforeach--}}
    {{--    </select>--}}
    @foreach($group as $item)
        <div class="form-check checkbox-group">
            <input class="form-check-input parent" type="checkbox" value="" id="{{$item->id}}">
            <label class="form-check-label parent-label" for="defaultCheck1">
                {{$item->name}}
            </label>
            <div class="checkbox-list" style="height: 0; display: none">
                @foreach(\Illuminate\Support\Facades\DB::table('users')->where('group_id',$item->id)->get() as $itemUser)
                    <div class="form-check">
                        <input class="form-check-input child" name="user_id[]" type="checkbox" value="{{$itemUser->id}}"
                               id="child-{{$item->id}}">
                        <label class="form-check-label" for="defaultCheck1">
                            {{$itemUser->username}}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

<div class="form-group col-sm-4">
    {!! Form::label('contest_id', 'Contest Id:') !!}
    {!! Form::select('contest_id', $contest, null, ['class' => 'form-control']) !!}
</div>

<script>
    var parentLabel = document.querySelectorAll('.parent-label');
    console.log(parentLabel)

    var paret = document.querySelectorAll('.parent');

    function changeCheckbox(id, paret) {
        var childId = '#child-' + id;
        return function (event) {
            console.log(childId)
            if (paret.checked) {
                var children = document.querySelectorAll(childId);
                children.forEach(function (item) {
                    children.checked = true;
                    item.setAttribute('checked', true)
                })
            }
            if (!paret.checked) {
                var children = document.querySelectorAll(childId);
                children.forEach(function (item) {
                    children.checked = false;
                    item.removeAttribute('checked')
                })
            }
        }
    }

    paret.forEach(function (value) {
        var id = value.getAttribute('id')
        value.addEventListener('change', changeCheckbox(id, value))
    })
    parentLabel.forEach(function (value) {
        value.addEventListener('click', function (event) {
            var group = event.target.closest('.checkbox-group').querySelector('.checkbox-list');
            if (group.style.display === 'none') {
                group.style.height = 'auto'
                group.style.display = 'block';
            } else {
                group.style.height = 0
                group.style.display = 'none';
            }


        })
    })


</script>
