@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
			<!-- Heading -->
			<div class="single-head">
			<!-- Heading -->
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Edit CTC Component</h3>
				
				<button type="submit" id="btnSubmit" data-loading-text="Loading..." class="btn btn-danger pull-right" onclick="$('#CtcEditForm').submit();">Update</button>
				
				<div class="clearfix"></div>
			</div><!-- end single-head -->
			<div class="page-users">
				{{Form::open(array('class'=>'form-horizontal','id'=>'CtcEditForm','onsubmit'=>'return validateCTC();'))}}
					<input type="hidden" name="id" value="{{$comp->id}}">
					<div class="form-group">
						<label class="col-lg-2 control-label" for="component_name">Component Name</label>
						<div class="col-lg-5">
							<input type="text" id="component_name" name="component_name" placeholder="Component Name" class="form-control" value="{{$comp->component_name or ''}}">
							<span style="color: red"><!-- error message -->
	                        @if($errors->has('component_name'))
	                        {{$errors->first('component_name')}}
	                        @endif
	                     </span><!-- end error message -->
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label class="col-lg-2 control-label" for="component_code">Component Code</label>
						<div class="col-lg-5">
							<input type="text" id="component_code" name="component_code" placeholder="Component Code" class="form-control" value="{{$comp->component_code or ''}}">
							<span style="color: red"><!-- error message -->
	                        @if($errors->has('component_code'))
	                        {{$errors->first('component_code')}}
	                        @endif
	                     </span><!-- end error message -->
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label class="col-lg-2 control-label" for="effective_date">Effective Date</label>
						<div class="col-lg-5">
							<input type="text" id="effective_date" name="effective_date" placeholder="dd\mm\yyyy" class="form-control date" value="{{ date('d/m/Y',strtotime($comp->effective_date))}}">
							<span style="color: red"><!-- error message -->
	                        @if($errors->has('effective_date'))
	                        {{$errors->first('effective_date')}}
	                        @endif
	                     </span><!-- end error message -->
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label for="component_type" class="col-lg-2 control-label">Component Type</label>
						<div class="col-lg-5">
							<select name="component_type" id="component_type" class="form-control">
								<option value="earning" @if($comp->component_type == 'earning') selected @endif>Earning</option>
								<option value="deduction" @if($comp->component_type == 'deduction') selected @endif>Deduction</option>
							</select>
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label for="calculation_type" class="col-lg-2 control-label">Calculation Type</label>
						<div class="col-lg-5">
							<select name="calculation_type" id="calculation_type" class="form-control" onchange="var val=$(this).val(); if(val == 'formula'){ $('#formulaDiv').show(); }else{ $('#formulaDiv').hide();$('#formula').val(''); }">
								<option value="flat" @if($comp->calculation_type == 'flat') selected @elseif(Input::old('calculation_type') == 'flat') selected @endif>Flat</option> 
								<option value="formula" @if($comp->calculation_type == 'formula') selected  @elseif(Input::old('calculation_type') == 'formula') selected @endif>Formula</option>
							</select>
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group" id="formulaDiv" style="display:none">
						<label class="col-lg-2 control-label" for="formula">Formula</label>
						<div class="col-lg-5">
							<input type="text" id="formula" name="formula" placeholder="Formula" class="form-control date" value="{{$comp->formula or ''}}">
							<span style="color: red"><!-- error message -->
	                        @if($errors->has('formula'))
	                        	{{$errors->first('formula')}}
	                        @endif
	                     </span><!-- end error message -->
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label for="show_pay_slip" class="col-lg-2 control-label">Show in pay slip</label>
						<div class="col-lg-5">
							<select name="show_pay_slip" id="show_pay_slip" class="form-control">
								<option value="yes" @if($comp->show_pay_slip == 'yes') selected @endif>YES</option>
								<option value="no" @if($comp->show_pay_slip == 'no') selected @endif>NO</option>
							</select>
						</div><!--  end input -->
					</div><!-- end form-group -->
					<div class="form-group">
						<label for="attendance_dependant" class="col-lg-2 control-label">Attendance Dependant</label>
						<div class="col-lg-5">
							<select name="attendance_dependant" id="attendance_dependant" class="form-control">
								<option value="yes" @if($comp->attendance_dependant == 'yes') selected @endif>YES</option>
								<option value="no" @if($comp->attendance_dependant == 'no') selected @endif>NO</option>
							</select>
						</div><!--  end input -->
					</div><!-- end form-group -->
	
				{{Form::close()}}
			</div><!-- single-head -->
		</div> <!-- end page-content -->
	</div> <!-- end container -->
</div><!-- end main-content -->
@stop
@section('script')
{{HTML::style('public/css/jquery-ui-1.10.4.custom.min.css')}}
{{HTML::script('public/js/jquery-ui-1.10.4.custom.min.js')}}
<script type="text/javascript">
	$(function(){
		$('#effective_date').datepicker({
			dateFormat:'dd/mm/yy',
			changeYear:true,
			changeMonth:true
		});
		var calType = $('#calculation_type').val();
		if(calType == 'formula')
		{
			$('#formulaDiv').show();
		}
		else
		{
			$('#formulaDiv').hide();
			$('#formula').val('');
		}
	});
	function validateCTC()
	{
		var cName =  $('#component_name').val();
		var cCode = $('#component_code').val();
		var date  = $('#effective_date').val();
		var formula = $('#formula').val();
		var calType = $('#calculation_type').val();
		if(!cName)
		{
			alert('Please enter Component name');
			return false;

		}
		if(!cCode)
		{
			alert('Please enter component Code');
			return false;
		}
		if(!date)
		{
			alert('Please enter effective date');
			return false;
		}
		if(calType == 'formula')
		{
			if(!formula)
			{
				alert('Please enter Formula');
				return false;
			}
		}
		$.ajax({
			type:'put',
			url:"<?php echo URL::to('admin/ctc/1'); ?>",
			data:$('#CtcEditForm').serialize(),
			success:function(data){
				var status = $.parseJSON(data);
				console.log(status.success);
				if(status.success)
				{
					
					 window.location="<?php echo URL::to('admin/ctc'); ?>";
				}
				else if(status.error)
				{
					alert('Failed to update try again or refresh the browser ');

				}

				
				
			}
		});
		return false;
	}
	
	</script>
@stop