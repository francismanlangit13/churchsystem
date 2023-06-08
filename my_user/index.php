<?php 
$user = $conn->query("SELECT * FROM users where id ='".$_settings->userdata('id')."'");
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
?>
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-body">
		<div class="container-fluid">
			<div id="msg"></div>
			<form action="" id="manage-user">
				<div class="row">	
					<input type="hidden" name="id" value="<?php echo $_settings->userdata('id') ?>">
					<input type="hidden" name="status" value="3">
					<div class="form-group col-md-4">
						<label for="firstname" class="required-field">First Name</label>
						<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
					</div>
					<div class="form-group col-md-3">
						<label for="middlename" class="required-field">Middle Name</label>
						<input type="text" name="middlename" id="middlename" class="form-control" value="<?php echo isset($meta['middlename']) ? $meta['middlename']: '' ?>">
					</div>
					<div class="form-group col-md-3">
						<label for="lastname" class="required-field">Last Name</label>
						<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" required>
					</div>
					<div class="form-group col-md-2">
						<label for="extname">Extension Name</label>
						<input type="text" name="extname" id="extname" class="form-control" value="<?php echo isset($meta['extname']) ? $meta['extname']: '' ?>">
					</div>
					<div class="form-group col-md-4">
						<?php	
							if(!isset($_GET['id'])){
								$user = $conn->query("SELECT * FROM users where id ='".$_settings->userdata('id')."'");
								if($user->num_rows > 0){
									$res = $user->fetch_array();
									foreach($res as $k =>$v){
										$$k = $v;
									}
								}else{
								}
							} else{
							}
						?>
						<label for="gender" class="required-field">Gender</label>
						<select type="text" id="gender" name="gender" class="form-control form-control-sm form-control-border select2" required>
							<option value="" disabled>Select Gender</option>
							<option value="1" <?= isset($gender) && $gender == 1 ? 'selected' : '' ?>>Male</option>
                            <option value="2" <?= isset($gender) && $gender == 2 ? 'selected' : '' ?>>Female</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<?php	
							if(!isset($_GET['id'])){
								$user = $conn->query("SELECT * FROM users where id ='".$_settings->userdata('id')."'");
								if($user->num_rows > 0){
									$res = $user->fetch_array();
									foreach($res as $k =>$v){
										$$k = $v;
									}
								}else{
								}
							}else{
							}
						?>
						<label for="civil_status" class="required-field">Civil Status</label>
						<select type="text" id="civil_status" name="civil_status" class="form-control form-control-sm form-control-border select2" required>
							<option value="" disabled>Select Civil Status</option>
							<option value="1" <?= isset($civil_status) && $civil_status == 1 ? 'selected' : '' ?>>Single</option>
                            <option value="2" <?= isset($civil_status) && $civil_status == 2 ? 'selected' : '' ?>>Married</option>
							<option value="3" <?= isset($civil_status) && $civil_status == 3 ? 'selected' : '' ?>>Separated</option>
							<option value="4" <?= isset($civil_status) && $civil_status == 4 ? 'selected' : '' ?>>Divorced</option>
							<option value="5" <?= isset($civil_status) && $civil_status == 5 ? 'selected' : '' ?>>Widowed</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="phone" class="required-field">Phone Number</label>
						<input type="text" name="phone" id="phone" class="form-control" pattern="^(09|\+639)\d{9}$" value="<?php echo isset($meta['phone']) ? $meta['phone']: '' ?>" required>
					</div>
					<div class="form-group col-md-4">
                        <label for="birthday" class="control-label required-field">Birthday</label>
                        <input type="date" name="birthday" id="birthday" class="form-control rounded-0" value="<?php echo isset($meta['birthday']) ? $meta['birthday']: '' ?>" required>
                    </div>
					<div class="form-group col-md-4">
						<label for="username" class="required-field">Username</label>
						<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required>
					</div>
					<div class="form-group col-md-4">
						<label for="email" class="required-field">Email</label>
						<input type="email" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" disabled>
					</div>
					<div class="form-group col-md-12">
						<label for="address" class="required-field">Address</label>
						<input name="address" id="address" class="form-control" value="<?php echo isset($meta['address']) ? $meta['address']: '' ?>" required>
					</div>
					<div class="form-group">
						<label for="" class="control-label required-field">Profile</label>
						<div class="custom-file">
						<input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
						<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
					<div class="form-group d-flex justify-content-center">
						<img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn btn-sm btn-primary" form="manage-user">Update</button>
				</div>
			</div>
		</div>
</div>
<style>
	img#cimg1{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
	.required-field::after {
		content: "*";
		color: red;
	}
</style>
<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg1').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage-user').submit(function(e){
		e.preventDefault();
		var _this = $(this)
            $('.err-msg').remove();
        var el = $('<div>')
            el.addClass("alert err-msg")
            el.hide()
        if(_this[0].checkValidity() == false){
            _this[0].reportValidity();
            return false;
        }
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Users.php?f=save',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					location.reload()
				} else if(resp == 2){
					el.addClass('alert-danger text-white small').text("Username already exist.");
					_this.append(el)
					el.show('.modal')
					end_loader();
				} else if(resp == 3){
					el.addClass('alert-danger text-white small').text("Email already exist.");
					_this.append(el)
					el.show('.modal')
					end_loader();
				} else if(resp == 4){
					el.addClass('alert-danger text-white small').text("Phone already exist.");
					_this.append(el)
					el.show('.modal')
					end_loader();
				} else{
					el.addClass('alert-danger text-white small').text("An error occured.");
					_this.append(el)
					el.show('.modal')
					end_loader();
				}
			}
		})
	})

</script>