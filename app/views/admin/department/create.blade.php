{{Form::open(array('route'=>array('admin.dept.store'),'class'=>'form-horizontal','onsubmit'=>'return validate()','method'=>'post'))}}
 <!-- error message -->
     <span style="color: red"><!-- error message -->
        @if($errors->has('error'))
         <div class="alert alert-danger"> {{$errors->first('error')}} </div>
        @endif
       
     </span><!-- end error message -->
	<div class="form-group">
		<label for="name" class="control-label col-lg-3">Department Name</label>
		<div class="col-lg-5">
			<input type="text" name="name" id="name" class="form-control" placeholder="Department Name">
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
			<input type="text" name="code" class="form-control" id="code" placeholder="Department Code">
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
			<button type="submit" class="btn btn-info">Create</button>
			<button type="reset" class="btn btn-danger">Reset</button>
		</div>
	</div>

{{Form::close()}}
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
	$(function(){
        var tab="<?php echo $tab; ?>";
        if(tab)
        {
        	
            $('#li-pro').removeClass('active').addClass('');
            $('#li-ch').addClass('active');
            $('#alldepartment').removeClass('tab-pane active fade in').addClass('tab-pane fade in');
            $('#'+tab).removeClass('tab-pane fade in').addClass('tab-pane active fade in');
        }
    });
</script>
@stop