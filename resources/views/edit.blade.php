@extends('theme.main')

@section('content')
<div class="row">
	<div class="col-md-offset-4 col-md-8">
		<h2 align="text-center">Todo Task Edit</h1>
	</div>
</div>
@if(count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Error:</strong>
		<ol>
			@foreach($errors->all() as $error)
				{{$error}}
			@endforeach
		</ol>
	</div>
@endif
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12 col-sm-12" align="right">
			<a href="{{route('task')}}" title="Back">
				<button type="button" class="btn btn-primary btn-sm">Back</button>
			</a>
		</div>
		<form action="{{route('task.update',[$taskToEdit->id])}}" method="POST">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PUT">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Todo Task *</label>
			    <input type="text" name="updatedTask" value="{{$taskToEdit->task}}" class="form-control" required="">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Detail</label>
			    <textarea class="form-control" id="updatedTaskDetail" rows="3" name="updatedTaskDetail" placeholder="Todo task detail">{{$taskToEdit->taskdetail}}</textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Update</button>
			</form>
	</div>
</div>
<hr/>
@endsection