@extends('layouts.site.layout')
@section('main_content')
   <div class="container">
       <div class="row">
           @foreach($questions as $item)
               <label>Savol</label>
               <textarea class="form-control" disabled>{!! $item->questions !!}</textarea>
               <label>Javob</label>
               <textarea rows="10" class="form-control" >{!! $item->editor !!}</textarea>
           @endforeach

       </div>
   </div>
@endsection
