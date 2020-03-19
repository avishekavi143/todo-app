@extends('theme.main')

	@section('content')
	<div class="row">
		<div class="col-md-12 text-center">
			<h2 align="">Todo Task Add</h2>
		</div>
	</div>

	@if(Session::has('success'))
		<div class="alert alert-success">
			<strong>Success:</strong>
			 {{Session::get('success')}}
		</div>
	@endif
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
		<div class="col-md-12 col-sm-12" align="right">
			<a href="{{route('task')}}" title="Back">
				<button type="button" class="btn btn-primary btn-sm">Back</button>
			</a>
		</div>

		<div class="col-md-12">
			<form action="{{route('task.store')}}" method="post">
				{{csrf_field()}}
			  <div class="form-group">
			    <label for="exampleInputEmail1">Todo Task *</label>
			    <input type="text" name="taskTitle" value="{{ old('taskTitle') }}" placeholder="Enter New Todo Task" class="form-control" required="">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Detail</label>
			    <textarea class="form-control" id="taskdetail" rows="3" name="taskDetail" placeholder="Todo Task detail">{{ old('taskDetail') }}</textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
	@endsection