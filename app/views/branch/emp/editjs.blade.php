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
			return "Image size must lessthan 2 mb"
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
		$('#image').change( function(event) {
		var file=$('#image').prop('files')[0];
		console.log(file);
		
		console.log(event.target);
		var g=docvalidation($(this).val()); 
		if(g)
			{ alert(g); 
				$(this).val('');
				$('#rmphoto').hide();
				$('#armphoto').hide();
			}
			else
				{
				 var val='<img src='+file.mozFullPath+' style="width:100px;height:50px">'; 
				 var span='<span class="load">Uploading......</span>';
				 $('#rmphoto').html(val+span);
				 $('#rmphoto').show();
				 $('#armphoto').show();
				 var vals=$('#imageForm').serializeArray();
				   form_data = new FormData($(this)[0]);
				 
				
				// var form_data = new FormData('file',file);
				// form_data.append('file',file);
				// form_data.append('name','ff');
				// console.log(form_data);
				 $.ajax({
				 	type:"PUT",
					data:form_data,
					url:"<?php echo URL::route('branch.employee.update','"+tableId+"') ?>",
               		contentType:false,
					processData: false,
					
					
					success:function(data)
					{
						alert(data);
					},
					fail:function()
					{
						alert('errpr');
					}
				 });
				}
    
		});

	});
</script>