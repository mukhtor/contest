@extends('layouts.site.layout')

@section('main_content')
    <div id="blog" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- main blog -->
                <div id="main" class="col-md-8">

                    <!-- row -->
                    <div class="row">
                        <table class="table ">
                            <tr>
                                <th>#</th>
                                <th>Ismi</th>
                                <th>Guruh</th>
                                <th>Contest</th>

                                <th></th>

                            </tr>
                            @foreach($history as $key=>$item)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->user->group->name}}</td>
                                <td>{!! $item->getContest->title!!}</td>
{{--                                <td>{{$item->question->getSubject->name}}</td>--}}
                                <td>
                                    <a class="btn btn-primary" href="{{route('more',$item->getContest->id)}}">Batafsil</a>
                                </td>
                            </tr>
                           @endforeach
                        </table>
                    </div>
                    <!-- /row -->

                    <!-- row -->
                    <div class="row">

                        <!-- pagination -->
                        <div class="col-md-12">
                            <div class="post-pagination">
                                    {{$history->links()}}
                            </div>
                        </div>
                        <!-- pagination -->

                    </div>
                    <!-- /row -->
                </div>
                <!-- /main blog -->

                <!-- aside blog -->
                <div id="aside" class="col-md-4" style="background-color: rgba(91,91,91,0.05)">
                    <!-- category widget -->
                    <div class="widget category-widget" >
                        <h3>Contestlar</h3>
                        @foreach($contest as $item)
                            <a  style="color: #2D2D2D;padding: 3%;padding-bottom: 8%;font-size: 15px" href="{{route('start',$item->id)}}">{{substr($item->contest->title,0)}}... </a>

                        @endforeach
                    </div>
                    <!-- /category widget -->

                    <!-- tags widget -->
                {{--                    <div class="widget tags-widget">--}}
                {{--                        <h3>Tags</h3>--}}
                {{--                        <a class="tag" href="#">Web</a>--}}
                {{--                        <a class="tag" href="#">Photography</a>--}}
                {{--                        <a class="tag" href="#">Css</a>--}}
                {{--                        <a class="tag" href="#">Responsive</a>--}}
                {{--                        <a class="tag" href="#">Wordpress</a>--}}
                {{--                        <a class="tag" href="#">Html</a>--}}
                {{--                        <a class="tag" href="#">Website</a>--}}
                {{--                        <a class="tag" href="#">Business</a>--}}
                {{--                    </div>--}}
                <!-- /tags widget -->

                </div>
                <!-- /aside blog -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>

@endsection
