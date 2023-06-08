<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>

<style>
	img#cimg1{
		height: 50vh;
		width: 100%;
		object-fit: contain;
		/* border-radius: 100% 100%; */
	}
	img#cimg2{
		height: 50vh;
		width: 100%;
		object-fit: contain;
		/* border-radius: 100% 100%; */
	}
	img#cimg3{
		height: 50vh;
		width: 100%;
		object-fit: contain;
		/* border-radius: 100% 100%; */
	}
</style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<h5 class="card-title">Officer Information</h5>
			<!-- <div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_department" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
			</div> -->
		</div>
		<div class="card-body">
			<form action="" id="system-frm">
				<div id="msg" class="form-group"></div>
				<h5 style="color:yellow;"><b>Donate Settings</b></h5>
				<div class="row row-cols-1 row-cols-sm-1 row-cols-lg-3 row-cols-md-3 gx-3">
					<!-- G-Cash -->
					<div class="form-group col-12">
						<label for="GCash">G-Cash</label>
						<div class="form-group">
							<div class="custom-file">
							<input type="file" class="custom-file-input rounded-circle" id="customFile" name="GCash" onchange="displayImg(this,$(this))">
							<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image($_settings->info('GCash')) ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<br>
					</div>
					<!-- Paymaya -->
					<div class="form-group col-12">
						<label for="Paymaya">Paymaya</label>
						<div class="form-group">
							<div class="custom-file">
							<input type="file" class="custom-file-input rounded-circle" id="customFile" name="Paymaya" onchange="displayImg2(this,$(this))">
							<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image($_settings->info('Paymaya')) ?>" alt="" id="cimg2" class="img-fluid img-thumbnail">
						</div>
						<br>
					</div>
					<!-- Shopee Pay -->
					<div class="form-group col-12">
						<label for="Shopee_Pay">Shopee Pay</label>
						<div class="form-group">
							<div class="custom-file">
							<input type="file" class="custom-file-input rounded-circle" id="customFile" name="Shopee_Pay" onchange="displayImg3(this,$(this))">
							<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image($_settings->info('Shopee_Pay')) ?>" alt="" id="cimg3" class="img-fluid img-thumbnail">
						</div>
						<br>
					</div>
				</div>
			</form>
		</div>
		<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn btn-sm btn-primary" form="system-frm">Update</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function showDiv(select){
       if(select.value==0){
        document.getElementById('hidden_div').style.display = "none";
       } else if (select.value==1){
        document.getElementById('hidden_div').style.display = "none";
		document.getElementById("remarks").required = false;
       } else{
        document.getElementById('hidden_div').style.display = "block";
		document.getElementById("remarks").required = true;
       }
    }
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg1').attr('src', e.target.result);
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