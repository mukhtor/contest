@extends('layouts.app')
@section('content')
    @if(sizeof($contestHistories) > 0)
        <button class="btn btn-success float-right" onclick="printDiv()">  print </button>
        <div id="print">
            <table  class="table table-bordered mt-2">
                <tr>
                    <th>Musobaqa</th>
                    <th>Guruh</th>
                    <th>FIO</th>
                    <th>Baho</th>
                    <th>Imzo</th>
                </tr>
                <tr>
                    <td>{{ $contestHistories[0]->contest->title }}</td>
                    <td>{{ $contestHistories[0]->user->group->name }}</td>
                    <td>{{ $contestHistories[0]->user->name }}</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            @foreach($contestHistories as $index => $history)
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2">{!!$history->question->questions !!}</td>
                    </tr>
                    <tr>
                        <td style="width: 50%">
                            <code style="white-space: break-spaces; color: black; -moz-tab-size: 2; tab-size: 2">{{ $history->answer }}</code>
                        </td>
                        <td style="width: 50%">
                            {!! $history->compile['result'] !!}
                        </td>
                    </tr>
                </table>
            @endforeach
        </div>
        @push("page_scripts")
            <script>
                function printDiv(divName = 'print'){
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
                }
                window.printDiv = printDiv
            </script>
        @endpush
    @else
        <h4>User natijalari topilmadi</h4>
    @endif
@endsection
