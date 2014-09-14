{{Form::open(array('class'=>'form-inline','id'=>'selectAttendance','onsubmit'=>'return validateAttend()','method'=>'get'))}}
	
		<div class="form-group">
			<label for="" class="col-lg-8 control-label">Attandance for the Month</label>
			<div class="col-lg-2">
				<select name="month" id="month" class="form-control" onchange="getDates()">
					<?php $mons = array('01' => "Jan", '02' => "Feb", '03' => "Mar", '04' => "Apr", '05' => "May", '06' => "Jun", '07' => "Jul", '08' => "Aug", '09' => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");  ?>
					<option value="">Month</option>
					@foreach($mons as $key=>$val)
					<option value="{{$key}}" @if(Input::old('month') == $key) selected @endif>{{$val}}</option>
					@endforeach
				</select>
			</div>
		</div> 
		<div class="form-group">
			<div class="col-lg-3">
				<select name="year" id="year" class="form-control" onchange="getDates()">
				<option value="">Year</option>
				<?php $year=sprintf(2000); ?>
					@while($year < 2100)
					<option value="{{$year}}" @if(Input::old('year') == $year ) selected @endif>{{$year}}</option>
					<?php $year++; ?>
					@endwhile
				</select>
			</div>
		</div>
	
		<div class="form-group">
			<label for="" class="col-lg-6 control-label">Employee type</label>
			<div class=" col-lg-2">
				<select name="emp_type" id="emp_typeSelect" class="form-control">
					<option value="inhouse" @if(Input::old('emp_type') == 'inhouse') selected @endif>In House</option>
					<option value="outsource" @if(Input::old('emp_type') == 'outsource') selected @endif>Out Source</option>
				</select>
			</div>
		</div> 
		<div class="form-group" style="display:none" id="clientHide">
			<label for="" class="col-lg-offset-2 col-lg-6 control-label">Client Name</label>
			<div class="col-lg-4">
				<?php $client = App\Lib\libEmp::clientByBranch(Auth::user()->id); ?>
				<select name="clientId" id="clientSelect" class="col-sm-12 form-control">
					@forelse($client as $clients)
					<option value="{{ $clients->user->id }}" @if(Input::old('clientId') == $clients->user->id) selected @endif>{{$clients->user->company->company_name or ''}}</option>
					@endforeach
				</select>
			</div>
		</div> 
		<div class="form-group">
			<label for="" class="col-lg-offset-2 col-lg-6 control-label"></label>
			<div class="col-lg-4">
				<button type="submit" class="btn btn-success">Proceed</button>
			</div>
		</div> 
{{Form::close()}}
<hr>
	<!-- Display attendance details -->
{{Form::open(array('id'=>'listForm','method'=>'post','onsubmit'=>'return validateList()','name'=>'listForm'))}}

<h5><span id="date-data"> </span> <button type="submit" class="btn btn-danger pull-right" id="btnSubmit">Update</button>
<div class="clearfix"></div></h5>
<br>
	<div class="table-responsive">
		<table class="table table-bordered" style="border-left:none">
			<tr class="active">
			<th>SNo</th>
				<th>Emp ID</th>
				<th>Emp Name</th>
				<th>Pay Days</th>
				<th>Present Days</th>
				<th>Leave</th>
				<th>LWP</th>
			</tr>
				<?php $i = $list->getFrom(); ?>
				@forelse( $list as $emp)
			<tr>
				<input type="hidden" name="id[]" value="{{$emp->id}}">
				<td>{{$i++}}</td>
				<td>{{$emp->user->username or ''}}</td>
				<td>{{$emp->emp->firstname or ''}}</td>
				<td><input type="text" class="pay_days form-control" style="text-align:right" name="pay_days[]" value="{{ $emp->pay_days or '0'}}" readonly></td>
				<td><input type="text" class="present_days form-control" maxlength="2" style="text-align:right" name="present_days[]" value="{{ $emp->present_days or '0'}}"></td>
				<td><input type="text" class="leave_days form-control" maxlength="2" style="text-align:right" name="leave_days[]" value="{{ $emp->leave_days or '0'}}"></td>
				<td><input type="text" class="lwp form-control" maxlength="2" style="text-align:right" name="lwp[]" value="{{ $emp->lwp or '0'}}"></td>
			</tr>	
			@empty
			<tr>
				<td colspan="6">No Employee</td>
			</tr>
			@endforelse
		</table><!-- end table -->
		@if($list)		
		{{ $list->appends(Input::all())->links()}}
		@endif
	</div><!-- end table-responsive -->
{{Form::close()}}
	<!-- End Display attendance details -->

@section('script')
<script type="text/javascript">
	var mon = {'01': "Jan", '02': "Feb", '03': "Mar", '04': "Apr", '05': "May", '06': "Jun", '07': "Jul", '08': "Aug", '09': "Sep", 10: "Oct", 11: "Nov", 12: "Dec"};
	var company ='';
	$(function(){
		var empType = $('#emp_typeSelect').val();
		var month = $('#month').val();
		var year  = $('#year').val();
		
		if(empType == 'outsource')
		{
			company = $('#clientSelect').find(":selected").text();
			$('#clientHide').show();
		}
		else
		{
			company = 'In house';
			$('#clientHide').hide();
		}
		$('#emp_typeSelect').change(function(){
			var empType = $(this).val();
			if(empType == 'outsource')
			{
				company = $('#clientSelect').find(":selected").text();
				$('#clientHide').show();
			}
			else
			{
				company = 'In house';
				$('#clientHide').hide();
			}
			$('#date-data').text('Attendance of '+company+' Employees for '+mon[month]+' '+year);
		});
		$('#clientSelect').change(function(){
			company = $('#clientSelect').find(":selected").text();
			$('#date-data').text('Attendance of '+company+' Employees for '+mon[month]+' '+year);
		});
		// dynamic month year
		if( month && year)
		{   
			var days = new Date(year, month, 0).getDate();
			$('.pay_days').val(days);
			$('#date-data').text('Attendance of '+company+' Employees for '+mon[month]+' '+year);
		}

	});
	function validateAttend()
	{
		var month = $('#month').val();
		var year  = $('#year').val();
		if(!month)
		{
			alert('Please select Month');
			return false;
		}
		if(!year)
		{
			alert('Please select Year');
			return false;
		}

	}
	function validateList()
	{
		var list = $('#listForm').serialize();
		var pdays = document.listForm.elements["present_days[]"];
		var ldays = document.listForm.elements["leave_days[]"];
		var lwp   = document.listForm.elements["lwp[]"];
		var i= 0;
		$('input[name^="pay_days"]').each(function(k,v){
			var payDays=$(this).val();
			var present=pdays[k].value;
			var leave  = ldays[k].value;
			var lw     = lwp[k].value;
			var total  = parseInt(leave)+parseInt(lw)+parseInt(present);
			if(!leave || !lw || !present)
			{
				alert('empty field not allowed');
				pdays[k].focus();
				return false;
			}
			if(isNaN(present))
			{
				
				alert('Present days must be numeric')
				pdays[k].focus();
				return false;
			}
			if(isNaN(leave))
			{
				
				alert('Leave days must be numeric')
				leave[k].focus();
				return false;
			}
			if(isNaN(lw))
			{
				
				alert('LWP days must be numeric')
				lw[k].focus();
				return false;
			}
			if(payDays < total)
			{
				alert('Pay Days not less then Presentand leave days');
				pdays[k].focus();
				return false;
			}
			
		});
		$.ajax({
			type:'put',
			url:"<?php echo URL::to('branch/employee-attendance/1'); ?>",
			data:list,
			beforeSend:function(){
				$('#btnSubmit').button('loading');
			},
			complete:function(){
				$('#btnSubmit').button('reset');
			},
			success:function(data){
				var status = $.parseJSON(data);

				if(status.success)
				{
					
					$('#status').html("<div class='alert alert-success'>Successfully updated</div>");
					$('.alert').fadeOut(3000);

				}
			}
		});
		return false;
	}
	function getDates() 
	{
		var month = $('#month').val();
		var year  = $('#year').val();
		var days = new Date(year, month, 0).getDate();
		$('.pay_days').val(days);
		$('#date-data').text('Attendance of '+company+' Employees for '+mon[month]+' '+year);
	}
</script>
@stop
