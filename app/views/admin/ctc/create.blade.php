@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
			<!-- Heading -->
			<div class="single-head">
			<!-- Heading -->
			<div id="status"></div>
			<?php $error=false; ?>
				@if(Session::has('success'))
					<div class="alert alert-success">{{Session::get('success')}}</div>
					<?php $error=false; ?>
				@endif
				@if(Session::has('error'))
					<?php $error=true; ?>
					<div class="alert alert-danger">{{Session::get('error')}}</div>
				@endif
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Create CTC Components</h3>
				<div class="clearfix"></div>
			</div><!-- end single-head -->
			<!-- Form page -->
			<div class="page-users">
				<div class="page-tabs">
					<ul class="nav nav-tabs">
						<li @if(!$error) class="active" @endif id="liViewAll"><a href="#viewAll" class="br-blue" data-toggle="tab"> CTC Component</a></li>
						<li @if($error) class="active" @endif id="liAddNew"><a href="#addNew" class="br-red" data-toggle="tab"><i class="fa fa-plus red" ></i>Add New</a></li>
					</ul>
					<div class="tab-content">
						<div  @if(!$error) class="tab-pane fade active in" @else class="tab-pane fade in" @endif id="viewAll">
							@include('admin/ctc.view')
						</div>
						<div @if($error) class="tab-pane fade active in" @else class="tab-pane fade in" @endif id="addNew">
						<h4>Add New Component</h4>
							{{Form::open(array('url'=>'admin/ctc','class'=>'form-horizontal','method'=>'post','role'=>'form','onsubmit'=>'return validateCTC()'))}}
								<div class="form-group">
									<label class="col-lg-2 control-label" for="component_name">Component Name</label>
									<div class="col-lg-5">
										<input type="text" id="component_name" name="component_name" placeholder="Component Name" class="form-control" value="{{Input::old('component_name') ?Input::old('component_name'): ''}}">
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
										<input type="text" id="component_code" name="component_code" placeholder="Component Code" class="form-control" value="{{Input::old('component_code') ? Input::old('component_code'):''}}">
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
										<input type="text" id="effective_date" name="effective_date" placeholder="dd\mm\yyyy" class="form-control date">
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
											<option value="earning">Earning</option>
											<option value="deduction">Deduction</option>
										</select>
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label for="calculation_type" class="col-lg-2 control-label">Calculation Type</label>
									<div class="col-lg-5">
										<select name="calculation_type" id="calculation_type" class="form-control" onchange="var val=$(this).val(); if(val == 'formula'){ $('#formulaDiv').show(); }else{ $('#formulaDiv').hide();$('#formula').val(''); }">
											<option value="flat" @if(Input::old('calculation_type') == 'flat') selected @endif>Flat</option> 
											<option value="formula" @if(Input::old('calculation_type') == 'formula') selected @endif>Formula</option>
										</select>
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group" id="formulaDiv" style="display:none">
									<label class="col-lg-2 control-label" for="formula">Formula</label>
									<div class="col-lg-5">
										<input type="text" id="formula" name="formula" placeholder="Formula" class="form-control date">
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
											<option value="yes">YES</option>
											<option value="no">NO</option>
										</select>
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label for="attendance_dependant" class="col-lg-2 control-label">Attendance Dependant</label>
									<div class="col-lg-5">
										<select name="attendance_dependant" id="attendance_dependant" class="form-control">
											<option value="yes">YES</option>
											<option value="no">NO</option>
										</select>
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<label for="ctc_show" class="col-lg-2 control-label">CTC Default</label>
									<div class="col-lg-5">
										<select name="ctc_show" id="ctc_show" class="form-control">
											<option value="yes">YES</option>
											<option value="no">NO</option>
										</select>
									</div><!--  end input -->
								</div><!-- end form-group -->
								<div class="form-group">
									<div class="col-md-offset-2 col-md-10">
										<button type="submit" class="btn btn-info">Add</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</div>
								</div>
							{{Form::close()}}
						</div><!-- tab-pane -->
					</div><!-- tab-content -->
				</div><!-- page-tabs -->
			</div><!-- page-users -->
		</div><!-- end page-content -->
	</div><!-- end container -->
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
	}

</script>
@stop