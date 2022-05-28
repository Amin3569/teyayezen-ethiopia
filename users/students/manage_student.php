<?php

require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `student_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
	<form action="" id="type-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="fullname" class="control-label">FullName</label>
			<input type="text" name="fullname" id="fullname" class="form-control form-control-sm rounded-0" value="<?php echo isset($fullname) ? $fullname : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="sex" class="control-label">Sex</label>
			<input type="text" name="sex" id="sex" class="form-control form-control-sm rounded-0" value="<?php echo isset($sex) ? $sex : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="age" class="control-label">Age</label>
			<input type="text" name="age" id="age" class="form-control form-control-sm rounded-0" value="<?php echo isset($age) ? $age : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="grade" class="control-label">Grade</label>
			<input type="text" name="grade" id="grade" class="form-control form-control-sm rounded-0" value="<?php echo isset($grade) ? $grade : ''; ?>"  required/>
		</div>
		
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#type-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_student",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.reload()
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>