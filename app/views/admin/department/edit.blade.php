@extends('layout.main')
@section('content')
<div class="main-content">
	<div class="container">
		<div class="page-content">
		<!-- heading -->
			<div class="single-head">
				<h3 class="pull-left"><i class="fa fa-credit-card red"></i>Edit Department</h3>
				<div class="clearfix"></div>
			</div>
			{{Form::open(array('route'=>array('admin.dept.update',$dept->id),'class'=>'form-horizontal','onsubmit'=>'return validate()','method'=>'put'))}}
			 <!-- error message -->
			     <span style="color: red"><!-- error message -->
			        @if($errors->has('error'))
			         <div class="alert alert-danger"> {{$errors->first('error')}} </div>
			        @endif
			       
			     </span><!-- end error message -->
				<div class="form-group">
					<label for="name" class="control-label col-lg-3">Department Name</label>
					<div class="col-lg-5">
						<input type="text" name="name" id="name" class="form-control" placeholder="Department Name" value="{{$dept->name or ''}}">
						<span style="color: red">
			                @if($errors->has('name'))
			                {{$errors->first('name')}}
			                @endif
			            </span>
					</div>
				</div>
				<div class="form-group">
					<label for="code" class="control-label col-lg-3">Department Code</label>
					<div class="col-lg-5">
						<input type="text" name="code" class="form-control" id="code" placeholder="Department Code" value="{{$dept->code or ''}}">
						<span style="color: red">
			                @if($errors->has('code'))
			                {{$errors->first('code')}}
			                @endif
			            </span>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-lg-3"></label>
					<div class="col-lg-5">
						<button type="submit" class="btn btn-info">Update</button>
						<button type="reset" class="btn btn-danger">Reset</button>
					</div>
				</div>

			{{Form::close()}}
		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript">
	function validate()
	{
		var name=$('#name').val();
		var code=$('#code').val();
		if(!name)
		{
			alert('Department name is required');
			return false;
		}
		if(!code)
		{
			alert('Department code is required');
			return false;
		}
	}
</script>

@stop