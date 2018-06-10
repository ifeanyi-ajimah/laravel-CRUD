@extends('layout.master')
@section('content')

<div class="row">
	<div class="col-md-6 offset-3">
        <div class="panel panel-info ">
<div class="panel panel-heading"> Title: {{$posts->title}}</div>
<div class="panel panel-body"> <p class="pull-left"><img style="max-height:100px; max-width:80px;" src="{{url('images', $posts->image)}}"/> <br><small>{{$posts->description}}</small></p>&nbsp &nbsp
<p> {{$posts->body}}</p>
</div>
<div class="panel panel-footer"> Post Number: {{$posts->id}}</div>


</div>


	</div>
</div>


@endsection