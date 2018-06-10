<!doctype html/>
<html>
<head>
	<meta charset="utf-8">
	<title> Laravel CRUD App. </title>
	<link rel="stylesheet" type="text/css" href="{{url("css/bootstrap.min.css")}}">
	<link rel="stylesheet" type="text/css" href="{{url("css/style.css")}}">
	<link rel="stylesheet" type="text/css" href="{{url("css/bootstrap.css")}}">
	<script type="text/javascript" href="{{url("js/jquery.js")}}"></script>


	  <link rel="stylesheet" href="{{url("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css")}}">
   <script href="{{url("https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js")}}"></script>
    <script src="{{url("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js")}}"></script>


</head>

<body>
	@include('layout.navbar')
	@if(session()->has('notify'))
	<div class="row">
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Notification:</strong>  {{session()->get('notify')}}
		</div>
	</div>
	@endif

	@yield('content')



@include('layout.footer')

</body>
</html>