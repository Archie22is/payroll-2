<!-- Client table -->
	<div class="table-responsive">
		<table class="table table-bordered" style="border-left:none">
			<tr class="active">
			<th>SNo</th>
				<th>Emp ID</th>
				<th>Emp Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
				<?php $i = $list->getFrom(); ?>
				@forelse( $list as $emp)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$emp->emp->username or ''}}</td>
				<td>{{$emp->emp->displayname or ''}}</td>
				<td>{{ $emp->emp->contact->phone or ''}}</td>
				<td>{{ $emp->emp->email}}</td>
				<td>
				<!-- Action table starts here -->
					<table style="border-left:none!important">
						<tr>
							<td style="padding: 0px!important;border-left:none!important;">
							{{Form::open(array('route'=>array('client.emps.show',$emp->emp->id),'method'=>'get'))}}
								<button class="btn btn-info btn-xs" title="View" type="submit"><i class="fa fa-eye"></i></button>
							{{Form::close()}}	
							</td>
							
						</tr>
					</table>
					<!-- end Action starts end -->
				</td>
			</tr>	
			@empty
			<tr>
				<td colspan="6">No client</td>
			</tr>
			@endforelse
		</table><!-- end table -->
		@if($list)		
		{{ $list->links()}}
		@endif
	</div><!-- end table-responsive -->
	<div class="clearfix"></div>
