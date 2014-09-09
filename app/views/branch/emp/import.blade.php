@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
		<!-- heading -->
			<div class="single-head">
				<!-- Heading -->
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Employee Details </h3>
				<div class="clearfix"></div>
			</div><!-- end single head -->
			<div class="page-users">
			{{Form::open(array('url'=>'branch/employee/import','class'=>'form-horizontal','method'=>'post','enctype'=>'multipart/form-data','id'=>'excelForm'))}}
				<div class="status"></div>		
				<div class="form-group">
					<label for="" class="col-lg-2 control-label">Select File</label>
					<div class="col-lg-7">
						<input type="file" name="excelfile" id="excelfile">

					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-lg-2"></label>
					<div class="col-lg-7">
						<button type="submit" id="btnSubmit" class="btn btn-info" data-loading-text="Loading...">Upload</button>
					</div>
				</div>
			{{Form::close()}}
			</div>
		</div>
	</div>
</div>
@stop
@section('script')


<script type="text/javascript" >
$(document).ready(function() {
	$('#excelForm').on('submit', function() {
		var file     = document.getElementById('excelfile');
		var fd = new FormData();
		fd.append('upload',file.files[0]);
		//Size of file
		if(!file.value)
		{
			$('.status').html("<div class='alert alert-danger'>Please select File </div>");
			fadeOut();
			return false;
		}
		if(file.files[0].size > '200000')
		{
			$('.status').html("<div class='alert alert-danger'>File size exceeds more than 2mb </div>");
			fadeOut();
			return false;
		}
	
		
		// end size file
		$.ajax({
			url : "<?php echo URL::to('branch/employee/import'); ?>",
			type:'post',
			data : fd,
			processData: false,
			contentType: false, 
			beforeSend: function()
			{
				$('#btnSubmit').button('loading');
			},
			success : function(data)
			{
				var status = $.parseJSON(data);
				if(status.error)
				{
					$('.status').html("<div class='alert alert-danger'>"+status.error+"</div>");
					fadeOut();
				}
				if(status.success)
				{
					$('.status').html("<div class='alert alert-success'>"+status.success+"</div>");
					fadeOut();
				}
			},
			complete : function()
			{
				$('#btnSubmit').button('reset');
			},
			 error: function(jqXHR, textStatus, errorThrown)
			{
			// Handle errors here
			console.log('ERRORS: ' + textStatus);
			console.log(errorThrown);

			// STOP LOADING SPINNER
			}
		});
		return false;

	});
});
function fadeOut()
{
	$(".alert").fadeTo(2000, 10).slideUp(1000, function(){
					            $(this).remove();
					        });
}
</script>
@stop