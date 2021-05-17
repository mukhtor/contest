@extends('layouts.site.layout')

@section('main_content')
    <div class="card">
        <div class="card-body">
            <div id="blog" class="section">
                <div class="row">
                    <table class="table">
                        <tr>
                            <th>Nomi</th>
                            <th>Boshlash</th>
                            <th>Davomiyligi</th>
                            <th></th>
                        </tr>
                        @foreach($contest as $item)
                            <tr>
                                <td><a href="#">{{$item->contest->title}}</a></td>
                                <td>{{$item->contest->begin_date}}</td>
                                <td>{{$item->contest->duration}} min</td>
                                <td><a href="{{route('start',$item->contest_id)}}" class="btn btn-success">Kirish</a></td>
                            </tr>
                        @endforeach
                    </table>

                </div>

            </div>
        </div>
    </div>

@endsection
