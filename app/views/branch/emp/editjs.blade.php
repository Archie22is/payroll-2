<script>
	function docvalidation(data)
	{
		var filename=data;
		var indexno= filename.lastIndexOf('.');
		var ext    = filename.substr(indexno+1);
		var size   =  $('#image')[0].files[0].size;
		var valid=('jpg|JPG|png|PNG|gif|GIF');
		
		if(!ext.match(valid))
		{
			return 'Upload only jpg or png or jpeg or gif ';
			
		}
		if(size >= 2000000)

		{
			return "Image size must be less than 2 mb"
		}
	}
	function formUpdate(ids,tableId)
	{
		var datas=$('#'+ids).serializeArray();
		
		$.ajax({
			type:"PUT",
			data:datas,
			url:"<?php echo URL::route('branch.employee.update','"+tableId+"') ?>",
			success: function(data){
				window.location="<?php echo URL::route('branch.employee.index'); ?>";
			}
		});
	}
	$(document).ready(function(){
		$('.date').datepicker({
			changeYear:true,
			changeMonth:true,
			dateFormat:'dd/mm/yy'	
		});
		
		$('#addDoc').click(function(){
			var i=0;
				$.ajax({
					type:"GET",
					url:"<?php echo URL::to('home/template/addDoc') ?>",
					beforeSend: function() {
					        // setting a timeout
					       $('.loader').show();
					    },
					complete: function(){
							$('.loader').hide();
					},
					success:function(data){
						$('#docappend').append(data);
					}
				});
		});
		$('#addCompany').click(function(){
				var i=0;
				$.ajax({
					type:"GET",
					url:"<?php echo URL::to('home/template/addCompany') ?>",
					beforeSend: function() {
					        // setting a timeout
					       $('.loader').show();
					    },
					complete: function(){
								$('.loader').hide();
					},
					success:function(data){
						$('#workexpappend').append(data);
					}
				});
				
		});
		$('#imageDel').click(function(){
			var val=$('#imageForm').serializeArray();
			console.log(val);
		});
		// Image File editing
		$('#image').change( function() {
			var file     = document.getElementById('image');
			var fd = new FormData();
			fd.append('upload',file.files[0]);
			$.ajax({
				type:'post',
				processData: false,
				contentType: false, 
				url:"<?php echo URL::to('branch/employee/upload-image'); ?>",
				data:fd,
				
				success:function(data){
					$('#img-target').html("<img src='"+data+"'/>");
				}
			});
		});

	});
	function changeImage()
	{
		alert('ff');
	}
</script>