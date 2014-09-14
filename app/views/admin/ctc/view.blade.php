<div class="table-responsive">
		<table class="table table-bordered" style="border-left:none">
			<tr class="active">
			<th>SNo</th>
				<th>Component Name</th>
				<th>Component Code</th>
				<th>Effective Date</th>
				<th>Component Type</th>
				<th>Action</th>
			</tr>
				<?php $i=$list->getFrom(); ?>
				@forelse( $list as $comp)	
				
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $comp->component_name}}</td>
				<td>{{ $comp->component_code }}</td>
				<td>{{ date('d-M-Y',strtotime($comp->effective_date))  }}</td>
				<td>{{ $comp->component_type or '' }}</td>
				<td>
					<table style="border-left:none!important">
						<tr>
							<td style="padding: 0px!important;border-left:none!important;">
								{{Form::open(array('route'=>array('admin.ctc.edit',$comp->id),'method'=>'get')) }}
									<button class="btn btn-info btn-xs" title="Edit" type="submit"><i class="fa fa-pencil"></i></button>
								{{Form::close()}}
							</td>
							<td style="padding: 0px!important;border-left:none!important;">|</td>
							<td style="padding: 0px!important;border-left:none!important;">
								{{Form::open(array('route'=>array('admin.ctc.destroy',$comp->id),'method'=>'delete')) }}
									<button class="btn btn-danger btn-xs" title="Delete" type="submit" onclick="return confirm('Are you sure you want to delete')"><i class="fa fa-trash-o"></i></button>
								{{Form::close()}}													
							</td>
						</tr>
					</table>
				</td>
			</tr>	
			@empty
			<tr>
				<td colspan="6">No list</td>
			</tr>
			
			@endforelse
									
		</table><!-- end table -->
		@if($list)
		{{$list->links()}}
		@endif
	</div><!-- end table-responsive -->
	<div class="clearfix"></div>
