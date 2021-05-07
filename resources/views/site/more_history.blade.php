@extends('layouts.site.layout')
<head>
    <style>
        .bolt{
            font-weight: bold;
        }
    </style>
</head>
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
                        @foreach($more_data as $more)
                        <table class="table table-bordered">
                          <tr>
                              <td class="bolt">Nomi</td>
                              <td>{{$more->user->name}}</td>
                          </tr>
                            <tr>
                                <td class="bolt">Guruhi</td>
                                <td>{{$more->user->group->name}}</td>
                            </tr>
                            <tr>
                                <td class="bolt">Contest</td>
                                <td>{{$more->getContest->title}}</td>
                            </tr>
                            <tr>
                                <td class="bolt">Mavzular</td>
                                <td>
                                    @foreach($more->getContest->ContestParsed as $item)
                                        {{\Illuminate\Support\Facades\DB::table('subjects')->where('id',$item)->pluck('name')->implode(' ')}}
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="bolt">Savol</td>
                                <td>{!! $more->getQuestions->questions !!}</td>
                            </tr>
                            <tr>
                                <td class="bolt">Javob</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Javobni Ko'rish</button>
                                </td>
                            </tr>
                        </table>
                        @endforeach
                    </div>
                    <!-- /row -->

                    <!-- Button trigger modal -->


                    <!-- Button trigger modal -->


                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Sizning javobingiz</h4>
                                </div>
                                <div class="modal-body">
                                    <p>{{$more->answer}}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /main blog -->

                <!-- aside blog -->
                <div id="aside" class="col-md-4" style="background-color: rgba(91,91,91,0.05)">
                    <!-- category widget -->
                    <div class="widget category-widget">
                        <h3>Contestlar</h3>
                        <a style="color: #2D2D2D;padding: 3%;padding-bottom: 8%;font-size: 15px" href="http://127.0.0.1:8000/start/1">Bugun soat 19-00 da Urganch shaxrida dronlar shousi bo'lib o'tadi... </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
