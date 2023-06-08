<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>

<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
	img#cimg2{
		height: 50vh;
		width: 100%;
		object-fit: contain;
		/* border-radius: 100% 100%; */
	}
</style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<h5 class="card-title">API Information</h5>
			<!-- <div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_department" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
			</div> -->
		</div>
		<form action="" id="system-frm">
			<div class="card-body">
				<div id="msg" class="form-group"></div>
				<h4 style="color:yellow;"><b>Facebook Chat Page API</b> <i><?php if($_settings->info('enable_fb') == 1){ ?> "Enabled" <?php } else { ?> "Disabled" <?php } ?> </i></h4>
				<select type="text" id="enable_fb" onchange="showDiv(this)" name="enable_fb" class="form-control form-control-sm form-control-border select2" required>
					<option value="" selected disabled>Enable Facebook Chat?</option>
					<option value="1">Enable</option>
					<option value="0">Disable</option>
                </select>
				<br>
				<div class="form-group" id="hidden_div" style="display: none;">
					<label for="facebook" class="control-label"><li class="fab fa-facebook-square"></li> Facebook API ID</label>
					<input type="number" class="form-control form-control-sm" name="FBmsgAPI" id="FBmsgAPI" value="<?php echo  $_settings->info('FBmsgAPI') ?>">
					<small><b>Example:</b> 0123456789</small><br>
					<small><b style="color:red;">Warning!</b><i> Do not change unless you don't know what is API. Contact admistrator for guide.</i></small>
				</div>
			</div>
			<div class="card-body">
				<div id="msg" class="form-group"></div>
				<h4 style="color:yellow;"><b>Telegram Chat API</b> <i><?php if($_settings->info('enable_teleg') == 1){ ?> "Enabled" <?php } else { ?> "Disabled" <?php } ?> </i></h4>
				<select type="text" id="enable_teleg" onchange="showDiv1(this)" name="enable_teleg" class="form-control form-control-sm form-control-border select2" required>
					<option value="" selected disabled>Enable Telegram Chat?</option>
                    <option value="1">Enable</option>
					<option value="0">Disable</option>
                </select>
				<br>
				<div class="form-group" id="hidden_div1" style="display: none;">
					<label for="TelegmsgAPI" class="control-label"><li class="fab fa-telegram"></li> Telegram API ID</label>
					<input type="number" class="form-control form-control-sm" name="TelegmsgAPI" id="TelegmsgAPI" value="<?php echo  $_settings->info('TelegmsgAPI') ?>">
					<small><b>Example:</b> 0123456789</small><br>
					<small><b style="color:red;">Warning!</b><i> Do not change unless you don't know what is API. Contact admistrator for guide.</i></small>
				</div>
			</div>
		</form>
		<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn btn-sm btn-primary" form="system-frm">Update</button>
				</div>
			</div>
		</div>

	</div>
</div>
<script type="text/javascript">
	function showDiv(select){
		if(select.value==0){
			document.getElementById('hidden_div').style.display = "none";
		}
		else if (select.value==1){
			document.getElementById('hidden_div').style.display = "block";
			document.getElementById("FBmsgAPI").required = true;
		}
		else{
			document.getElementById('hidden_div').style.display = "none";
		}
	}
	function showDiv1(select){
		if(select.value==0){
			document.getElementById('hidden_div1').style.display = "none";
		}
		else if (select.value==1){
			document.getElementById('hidden_div1').style.display = "block";
			document.getElementById("TelegmsgAPI").required = true;
		}
		else{
			document.getElementById('hidden_div1').style.display = "none";
		}
	}
</script>
<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        	_this.siblings('.custom-file-label').html(input.files[0].name)
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	function displayImg2(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	_this.siblings('.custom-file-label').html(input.files[0].name)
	        	$('#cimg2').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	function displayImg3(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	_this.siblings('.custom-file-label').html(input.files[0].name)
	        	$('#cimg3').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$(document).ready(function(){
		 $('.summernote').summernote({
		        height: 200,
		        toolbar: [
		            [ 'style', [ 'style' ] ],
		            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
		            [ 'fontname', [ 'fontname' ] ],
		            [ 'fontsize', [ 'fontsize' ] ],
		            [ 'color', [ 'color' ] ],
		            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
		            [ 'table', [ 'table' ] ],
		            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
		        ]
		    })
	})
</script>