@extends('layout.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form method="POST" action="{{route('post.update',$posts->id)}}" enctype="multipart/form-data" >
				{{ method_field('PUT') }}
              {{csrf_field()}}
  <fieldset>
    <legend>Update</legend>
    


    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="{{$posts->title}}" placeholder="Enter Post Title">
      <small id="emailHelp" class="form-text text-muted">Title of the post.</small>
    </div>
    
    <div class="form-group">
      <label for="exampleTextarea">Body of post</label>
      <textarea class="form-control" id="body" name="body" rows="3">{{$posts->body}}</textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file" class="form-control-file" name="image" required id="image" value="{{$posts->image}}" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Image Caption</label>
      <input type="text" class="form-control" id="description" name="description" required value="{{$posts->description}}"placeholder="Image Caption">
    </div>

    <fieldset class="form-group">
      <legend>Active Post?</legend>
      <div class="form-check">
        <lebel> Active or not ? </lebel><br>
     <label class="radio-inline"> 
     <input type="radio" id="active" value="1" name="active">active</label>
     
    <label class="radio-inline">
    <input type="radio" id="active" value="0" name="active">inactive</label>
      </div>
      
      
    </fieldset>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>

		</div>
	</div>

</div>
@endsection