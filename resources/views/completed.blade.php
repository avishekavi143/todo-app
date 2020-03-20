@extends('theme.main')

@section('content')
<div class="row">
	<div class="col-md-12 text-center">
		<h2 align="">Completed Todo Task List</h2>
	</div>
</div>
	@if(Session::has('success'))
		<div class="alert alert-success">
			<strong>Success:</strong>
			 {{Session::get('success')}}
		</div>
	@endif
<div class="row">
	<div class="col-md-12 col-sm-12" align="right">
		<a href="{{route('task')}}" title="completed task">
			<button type="button" class="btn btn-primary btn-sm">Back</button>
		</a>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-md-12 text">
		<table class="tbl-responsive table">
			<thead>
				<tr>
					<th>Todo Task</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@if(count($tasksCompleted) > 0)
					@foreach($tasksCompleted as $key=>$tas)
					<tr>
						<td width="50%">{{$tas->task_title}}</td>
						<td width="15%">{{($tas->status == 0)?'Pending':'Completed'}} </td>
						<td width="15%">
							<div class="row">
								<div class="col-md-3">
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" id="{{$tas->id}}" onclick="showDetails(this)" title="view">
											<i class="fa fa-eye"></i>
										</button>
									</div>
									<div class="col-md-3">
										<a href="{{route('task.setincompleted',[$tas->id])}}" title="Mark as Pending">
											<button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-circle"></i></button>
										</a>
									</div>
								<div class="col-md-6">
									<form action="{{ route('task.destroy',[$tas->id])}}" method="POST">
										{{ csrf_field() }}
	        							{{ method_field('DELETE') }}
	        							<input type="hidden" name="hidden" value="completedlist">
								        <div class="form-group">
								            <button class="btn btn-danger btn-sm delete-task" type="submit" title="Delete"><i class="fa fa-trash"></i></button>
								        </div>
									</form>
								</div>
							</div>
						</td>
					</tr>
					@endforeach
					@else
                       <tr>
                           <td align="center" colspan="10">
                               Completed Todo Task not found.
                           </td>
                       </tr>

				@endif
			</tbody>
		</table>
		<!--pagination part-->
         @if( count($tasksCompleted) > 0 )
            <div class="tableBottomPagination">
                {{ $tasksCompleted->render() }}
            </div>
         @endif		
	</div>
</div>

<!-- Modal for detail-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content" id="detail">
	      
	    </div>
	  </div>
	</div>
@endsection
<!-- script -->
@push('scripts')
		<script>
			function showDetails(button){
				var taskid = button.id;
	                if(taskid != '') {
	                    jQuery.ajax({
	                        url   : '{{route('task.getdetail')}}',
	                        type  : 'POST',
	                        data: {
	                            '_token': "{{ csrf_token() }}",
	                            'task_id': taskid,
	                        },
	                        success : function(res){
	                            $('#detail').html(res);
	                        }
	                    });
	                }
				}

		    $('.delete-task').click(function(e){
		        e.preventDefault()
		        if (confirm('Are you sure?')) {
		            // IF True Post the form
		            $(e.target).closest('form').submit() 
		            // Post the surrounding form
		        }
		    });
		</script>
	@endpush