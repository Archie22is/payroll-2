
@if($data =='addDoc')

<span><hr>
	<div class="form-group">
		<label class="col-lg-2 control-label" for="docname[]">Doucment Name</label>
		<div class="col-lg-5">
			<input type="text" name="docname[]" id="docname[]" placeholder="Document Name" class="form-control required">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label" for="doc">Upload Document</label>
			<div class="col-lg-5">

				<input type="file" name="doc[]"  onchange="var g=docvalidation($(this).val()); if(g){ alert(g); $(this).val('');};">
				
			</div>
			<a href="javascript:void(0);" style="color:red" class="removeDoc" onclick="$(this).parent().parent().remove()">Remove</a>
	</div>
	
</span>
@elseif($data == 'addCompany')

<span>
<hr>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="companyname">Company Name</label>
				<div class="col-lg-5">
					<input type="text" name="companyname[]"  placeholder="Company Name" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="location">Location</label>
				<div class="col-lg-5">
					<input type="text" name="location[]"  placeholder="Location" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="designation">Designation</label>
				<div class="col-lg-5">
					<input type="text" name="designation[]"  placeholder="Designation" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="lastctc">Last CTC</label>
				<div class="col-lg-5">
					<input type="text" name="lastctc[]"  placeholder="Last CTC" class="form-control required">
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="joindate">Join Date</label>
				<div class="col-lg-5">
					<input type="text" name="joindate[]"  placeholder="Join Date" class="date form-control required" >
				</div><!-- end input-form  -->
			</div><!-- end form-group -->
			<div class="form-group">
				<label class="col-lg-2 control-label" for="leavingdate">Leaving Date</label>
				<div class="col-lg-5">
					<input type="text" name="leavingdate[]"  placeholder="Leaving Date" class="date form-control required">
				</div><!-- end input-form  -->
				<a href="javascript:void(0);" style="color:red" class="removeDoc" onclick="$(this).parent().parent().remove()">Remove</a>
			</div><!-- end form-group -->

		</span>
		<script>
		$(function(){
			$('.date').datepicker({
			changeYear:true,
			changeMonth:true,
			dateFormat:'dd/mm/yy'	
		});
		})
		</script>
@endif