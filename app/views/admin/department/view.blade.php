
	<!-- Client table -->
	<div class="table-responsive">
		<table class="table table-bordered" style="border-left:none">
			<tr class="active">
			<th>SNo</th>
				<th>Department Name</th>
				<th>Department Code</th>
				<th>Action</th>
			</tr>
				<?php $i=$depart->getFrom(); ?>
				@forelse( $depart as $departs)	
				
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $departs->name}}</td>
				<td>{{ $departs->code }}</td>
				<td>
					<table style="border-left:none!important">
						<tr>
							<td style="padding: 0px!important;border-left:none!important;">
								{{Form::open(array('route'=>array('admin.dept.edit',$departs->id),'method'=>'get')) }}
									<button class="btn btn-info btn-xs" title="Edit" type="submit"><i class="fa fa-pencil"></i></button>
								{{Form::close()}}
							</td>
							<td style="padding: 0px!important;border-left:none!important;">|</td>
							<td style="padding: 0px!important;border-left:none!important;">
								{{Form::open(array('route'=>array('admin.dept.destroy',$departs->id),'method'=>'delete')) }}
									<button class="btn btn-danger btn-xs" title="Delete" type="submit" onclick="return confirm('Are you want to delete')"><i class="fa fa-trash-o"></i></button>
								{{Form::close()}}													
							</td>
						</tr>
					</table>
				</td>
			</tr>	
			@empty
			<tr>
				<td colspan="6">No Department</td>
			</tr>
			
			@endforelse
									
		</table><!-- end table -->
		@if($depart)
		{{$depart->links()}}
		@endif
	</div><!-- end table-responsive -->
	<div class="clearfix"></div>
