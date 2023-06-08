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
			<h5 class="card-title">Officer Information</h5>
			<!-- <div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_department" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
			</div> -->
		</div>
		<div class="card-body">
			<form action="" id="system-frm">
				<div id="msg" class="form-group"></div>
				<h5 style="color:yellow;"><b>Church Officer Settings</b></h5>
				<div class="row row-cols-1 row-cols-sm-1 row-cols-lg-3 row-cols-md-3 gx-3">
					<!-- President -->
					<div class="form-group col-12">
						<label for="president">President</label>
						<select id="president" name="president" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select President</option>
							<option value="">Clear President</option>
								<?php
									$res=mysqli_query($conn,"SELECT * FROM users ");
									while($row=mysqli_fetch_assoc($res)){
								?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
							<?php } ?>
						</select>
						<br>
						<?php
						$newimg = $_settings->info('president');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group d-flex justify-content-center">
										<label for="name" class="control-label"><?php echo "No President Selected" ?></label>
									</div>
								<?php }
								// Check is result set le grater then 0
								else if (mysqli_num_rows($res) > 0) {
									while($row = mysqli_fetch_assoc($res)){
									
						?>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Vice President -->
					<div class="form-group col-12">
						<label for="vice_president">Vice President</label>
						<select id="vice_president" name="vice_president" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select Vice President</option>
							<option value="">Clear Vice President</option>
								<?php
									$res=mysqli_query($conn,"SELECT * FROM users ");
									while($row=mysqli_fetch_assoc($res)){
								?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
							<?php } ?>
						</select>
						<br>
						<?php
						$newimg = $_settings->info('vice_president');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group d-flex justify-content-center">
										<label for="name" class="control-label"><?php echo "No Vice President Selected" ?></label>
									</div>
								<?php }
								// Check is result set le grater then 0
								else if (mysqli_num_rows($res) > 0) {
									while($row = mysqli_fetch_assoc($res)){
									
						?>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Secretary -->
					<div class="form-group col-12">
						<label for="secretary">Secretary</label>
						<select id="secretary" name="secretary" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select Secretary</option>
							<option value="">Clear Secretary</option>
								<?php
									$res=mysqli_query($conn,"SELECT * FROM users ");
									while($row=mysqli_fetch_assoc($res)){
								?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
							<?php } ?>
						</select>
						<br>
						<?php
						$newimg = $_settings->info('secretary');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group d-flex justify-content-center">
										<label for="name" class="control-label"><?php echo "No Secretary Selected" ?></label>
									</div>
								<?php }
								// Check is result set le grater then 0
								else if (mysqli_num_rows($res) > 0) {
									while($row = mysqli_fetch_assoc($res)){
									
						?>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Tresurer -->
					<div class="form-group col-12">
						<label for="tresurer">Tresurer</label>
						<select id="tresurer" name="tresurer" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select Tresurer</option>
							<option value="">Clear Tresurer</option>
								<?php
									$res=mysqli_query($conn,"SELECT * FROM users ");
									while($row=mysqli_fetch_assoc($res)){
								?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
							<?php } ?>
						</select>
						<br>
						<?php
						$newimg = $_settings->info('tresurer');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group d-flex justify-content-center">
										<label for="name" class="control-label"><?php echo "No Tresurer Selected" ?></label>
									</div>
								<?php }
								// Check is result set le grater then 0
								else if (mysqli_num_rows($res) > 0) {
									while($row = mysqli_fetch_assoc($res)){
									
						?>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Auditor -->
					<div class="form-group col-12">
						<label for="auditor">Auditor</label>
						<select id="auditor" name="auditor" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select Auditor</option>
							<option value="">Clear Auditor</option>
								<?php
									$res=mysqli_query($conn,"SELECT * FROM users ");
									while($row=mysqli_fetch_assoc($res)){
								?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
							<?php } ?>
						</select>
						<br>
						<?php
						$newimg = $_settings->info('auditor');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group d-flex justify-content-center">
										<label for="name" class="control-label"><?php echo "No Auditor Selected" ?></label>
									</div>
								<?php }
								// Check is result set le grater then 0
								else if (mysqli_num_rows($res) > 0) {
									while($row = mysqli_fetch_assoc($res)){
									
						?>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Committee -->
					<div class="form-group col-12">
						<label for="committee">Committee</label>
						<select id="committee" name="committee" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select Committee</option>
							<option value="">Clear Committee</option>
								<?php
									$res=mysqli_query($conn,"SELECT * FROM users ");
									while($row=mysqli_fetch_assoc($res)){
								?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
							<?php } ?>
						</select>
						<br>
						<?php
						$newimg = $_settings->info('committee');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group d-flex justify-content-center">
										<label for="name" class="control-label"><?php echo "No Committee Selected" ?></label>
									</div>
								<?php }
								// Check is result set le grater then 0
								else if (mysqli_num_rows($res) > 0) {
									while($row = mysqli_fetch_assoc($res)){
									
						?>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
				</div>
				<hr style="border-top: 1px solid rgb(255 255 255 / 55%);">
				<br>
				<div id="msg" class="form-group"></div>
				<h5 style="color:yellow;"><b>Young People Officer Settings</b></h5>
				<div class="row row-cols-1 row-cols-sm-1 row-cols-lg-3 row-cols-md-3 gx-3">
					<!-- Young People President -->
					<div class="form-group col-12">
						<label for="yp_president">President</label>
						<select id="yp_president" name="yp_president" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select President</option>
							<option value="">Clear President</option>
								<?php
									$res=mysqli_query($conn,"SELECT * FROM users ");
									while($row=mysqli_fetch_assoc($res)){
								?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
							<?php } ?>
						</select>
						<br>
						<?php
						$newimg = $_settings->info('yp_president');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group d-flex justify-content-center">
										<label for="name" class="control-label"><?php echo "No President Selected" ?></label>
									</div>
								<?php }
								// Check is result set le grater then 0
								else if (mysqli_num_rows($res) > 0) {
									while($row = mysqli_fetch_assoc($res)){
									
						?>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Young People Vice President -->
					<div class="form-group col-12">
						<label for="yp_vice_president">Vice President</label>
						<select id="yp_vice_president" name="yp_vice_president" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select Vice President</option>
							<option value="">Clear Vice President</option>
								<?php
									$res=mysqli_query($conn,"SELECT * FROM users ");
									while($row=mysqli_fetch_assoc($res)){
								?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
							<?php } ?>
						</select>
						<br>
						<?php
						$newimg = $_settings->info('yp_vice_president');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group d-flex justify-content-center">
										<label for="name" class="control-label"><?php echo "No Vice President Selected" ?></label>
									</div>
								<?php }
								// Check is result set le grater then 0
								else if (mysqli_num_rows($res) > 0) {
									while($row = mysqli_fetch_assoc($res)){
									
						?>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Young People Secretary -->
					<div class="form-group col-12">
						<label for="yp_secretary">Secretary</label>
						<select id="yp_secretary" name="yp_secretary" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select Secretary</option>
							<option value="">Clear Secretary</option>
								<?php
									$res=mysqli_query($conn,"SELECT * FROM users ");
									while($row=mysqli_fetch_assoc($res)){
								?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
							<?php } ?>
						</select>
						<br>
						<?php
						$newimg = $_settings->info('yp_secretary');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group d-flex justify-content-center">
										<label for="name" class="control-label"><?php echo "No Secretary Selected" ?></label>
									</div>
								<?php }
								// Check is result set le grater then 0
								else if (mysqli_num_rows($res) > 0) {
									while($row = mysqli_fetch_assoc($res)){
									
						?>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Young People Tresurer -->
					<div class="form-group col-12">
						<label for="yp_tresurer">Tresurer</label>
						<select id="yp_tresurer" name="yp_tresurer" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select Tresurer</option>
							<option value="">Clear Tresurer</option>
								<?php
									$res=mysqli_query($conn,"SELECT * FROM users ");
									while($row=mysqli_fetch_assoc($res)){
								?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
							<?php } ?>
						</select>
						<br>
						<?php
						$newimg = $_settings->info('yp_tresurer');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group d-flex justify-content-center">
										<label for="name" class="control-label"><?php echo "No Tresurer Selected" ?></label>
									</div>
								<?php }
								// Check is result set le grater then 0
								else if (mysqli_num_rows($res) > 0) {
									while($row = mysqli_fetch_assoc($res)){
									
						?>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Young People Auditor -->
					<div class="form-group col-12">
						<label for="yp_auditor">Auditor</label>
						<select id="yp_auditor" name="yp_auditor" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select Auditor</option>
							<option value="">Clear Auditor</option>
								<?php
									$res=mysqli_query($conn,"SELECT * FROM users ");
									while($row=mysqli_fetch_assoc($res)){
								?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
							<?php } ?>
						</select>
						<br>
						<?php
						$newimg = $_settings->info('yp_auditor');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group d-flex justify-content-center">
										<label for="name" class="control-label"><?php echo "No Auditor Selected" ?></label>
									</div>
								<?php }
								// Check is result set le grater then 0
								else if (mysqli_num_rows($res) > 0) {
									while($row = mysqli_fetch_assoc($res)){
									
						?>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Young People Committee -->
					<div class="form-group col-12">
						<label for="yp_committee">Committee</label>
						<select id="yp_committee" name="yp_committee" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select Committee</option>
							<option value="">Clear Committee</option>
								<?php
									$res=mysqli_query($conn,"SELECT * FROM users ");
									while($row=mysqli_fetch_assoc($res)){
								?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></option>
							<?php } ?>
						</select>
						<br>
						<?php
						$newimg = $_settings->info('yp_committee');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group d-flex justify-content-center">
										<label for="name" class="control-label"><?php echo "No Committee Selected" ?></label>
									</div>
								<?php }
								// Check is result set le grater then 0
								else if (mysqli_num_rows($res) > 0) {
									while($row = mysqli_fetch_assoc($res)){
									
						?>
						<div class="form-group d-flex justify-content-center">
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
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