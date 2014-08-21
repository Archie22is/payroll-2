
	<!-- Client table -->
	<div class="table-responsive">
		<table class="table table-bordered" style="border-left:none">
			<tr class="active">
			<th>SNo</th>
				<th>Client Name</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Phone</th>
				<th>Action</th>
			</tr>
				<?php $i=$client->getFrom(); ?>
				@forelse( $client as $clients)	
				
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $clients->user->company->company_name}}</td>
				<td>{{ $clients->user->email }}</td>
				<td>{{ $clients->user->contact->mobile or '' }}</td>
				<td>{{ $clients->user->contact->phone or '' }}</td>
				<td>
					<table style="border-left:none!important">
						<tr>
							<td style="padding: 0px!important;border-left:none!important;">
								{{Form::open(array('route'=>array('branch.client.edit',$clients->user->id),'method'=>'get')) }}
									<button class="btn btn-info btn-xs" title="Edit" type="submit"><i class="fa fa-pencil"></i></button>
								{{Form::close()}}
							</td>
							<td style="padding: 0px!important;border-left:none!important;">|</td>
							<td style="padding: 0px!important;border-left:none!important;">
								{{Form::open(array('route'=>array('branch.client.destroy',$clients->user->id),'method'=>'delete')) }}
									<button class="btn btn-danger btn-xs" title="Delete" type="submit" onclick="return confirm('Are you want to delete')"><i class="fa fa-trash-o"></i></button>
								{{Form::close()}}													
							</td>
						</tr>
					</table>
				</td>
			</tr>	
			@empty
			<tr>
				<td colspan="6">No client</td>
			</tr>
			
			@endforelse
									
		</table><!-- end table -->
		@if($client)
		{{$client->links()}}
		@endif
	</div><!-- end table-responsive -->
	<div class="clearfix"></div>
