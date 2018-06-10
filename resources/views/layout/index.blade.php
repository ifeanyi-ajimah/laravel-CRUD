@extends('layout.master')
@section('content')
<div class="container">

	<div class="row">
		
		<table class="table table-striped table-condensed table-hover table-sm">
  <thead>
    <tr>
      <th>ID</th>
      <th>Image</th>
      <th>Title</th>
      <th>Body of text</th>
      <th>Action &nbsp &nbsp <a href="{{route('post.create')}}" class="btn btn-sm btn-primary" role="button"> <i class="	glyphicon glyphicon-plus"></i></a></th>
    </tr>
  </thead>
  <tbody>
  	
  	@forelse($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td><img style="max-height:60px; max-width:80px;" src="{{url('images', $post->image)}}"/><br><small>{{$post->description}} </small></td>
      <td>{{$post->title}} </td>
      <td>{{$post->body}}</td>
      <td>
       
       <a href="{{route('post.show',$post->id)}}" class="btn btn-sm btn-info" role="button"><i class="	glyphicon glyphicon-zoom-in"></i></a>

        <form action="{{route('post.edit', $post->id)}}" method="GET"  style="display:inline" >  <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"><button type="submit" class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-pencil"></i></button> </form>


        <form action="{{route('post.destroy',$post->id)}}" method="POST" style="display:inline">  <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"><button type="submit" class="btn btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"></i></button> </form>
         </td>
      
    </tr>
    @empty
<tr>
      <td>{{"No Data"}}</td>
      <td>{{"No Data"}}</td>
      <td>{{"No Data"}}</td>
      <td>{{"No Data"}}</td>
      <td>{{"No Data"}}</td>
     
      </tr>

    @endforelse 
  </tbody>

</table>

</div>

	
</div>

@endsection