<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $user = $conn->query("SELECT * FROM users where id ='{$_GET['id']}'");
    foreach($user->fetch_array() as $k =>$v){
        $meta[$k] = $v;
    }
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
				<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
				<div class="row">
					<div class="form-group col-md-4">
						<label for="firstname">First Name</label>
						<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
					</div>
					<div class="form-group col-md-3">
						<label for="middlename">Middle Name</label>
						<input type="text" name="middlename" id="middlename" class="form-control" value="<?php echo isset($meta['middlename']) ? $meta['middlename']: '' ?>" required>
					</div>
					<div class="form-group col-md-3">
						<label for="lastname">Last Name</label>
						<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" required>
					</div>
					<div class="form-group col-md-2">
						<label for="extname">Extension Name</label>
						<input type="text" name="extname" id="extname" class="form-control" value="<?php echo isset($meta['extname']) ? $meta['extname']: '' ?>">
					</div>
					<div class="form-group col-md-4">
						<?php	
							if(isset($_GET['id'])){
								$user = $conn->query("SELECT * FROM users where id ='".$_GET['id']."'");
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
						<label for="gender">Gender</label>
						<select type="text" id="gender" name="gender" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select Gender</option>
							<option value="1" <?= isset($gender) && $gender == 1 ? 'selected' : '' ?>>Male</option>
                            <option value="2" <?= isset($gender) && $gender == 2 ? 'selected' : '' ?>>Female</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<?php	
							if(isset($_GET['id'])){
								$user = $conn->query("SELECT * FROM users where id ='".$_GET['id']."'");
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
						<label for="civil_status">Civil Status</label>
						<select type="text" id="civil_status" name="civil_status" class="form-control form-control-sm form-control-border select2">
							<option value="" disabled selected>Select Civil Status</option>
							<option value="1" <?= isset($civil_status) && $civil_status == 1 ? 'selected' : '' ?>>Single</option>
                            <option value="2" <?= isset($civil_status) && $civil_status == 2 ? 'selected' : '' ?>>Married</option>
							<option value="3" <?= isset($civil_status) && $civil_status == 3 ? 'selected' : '' ?>>Separated</option>
							<option value="4" <?= isset($civil_status) && $civil_status == 4 ? 'selected' : '' ?>>Divorced</option>
							<option value="5" <?= isset($civil_status) && $civil_status == 5 ? 'selected' : '' ?>>Widowed</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="phone">Phone Number</label>
						<input type="number" name="phone" id="phone" class="form-control" value="<?php echo isset($meta['phone']) ? $meta['phone']: '' ?>" required>
					</div>
					<div class="form-group col-md-4">
                        <label for="birthday" class="control-label">Birthday</label>
                        <input type="date" name="birthday" id="birthday" class="form-control rounded-0" value="<?php echo isset($meta['birthday']) ? $meta['birthday']: '' ?>" required>
                    </div>
					<div class="form-group col-md-4">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required  autocomplete="off">
					</div>
					<div class="form-group col-md-4">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required  autocomplete="off">
					</div>
					<div class="form-group col-md-6">
						<label for="address">Address</label>
						<input name="address" id="address" class="form-control" value="<?php echo isset($meta['address']) ? $meta['address']: '' ?>" required></input>
					</div>
					<div class="form-group col-md-2">
					<?php	
						if(isset($_GET['id'])){
							$user = $conn->query("SELECT * FROM users where id ='".$_GET['id']."'");
							if($user->num_rows > 0){
								$res = $user->fetch_array();
								foreach($res as $k =>$v){
									$$k = $v;
								}
							}else{
								echo '<script> alert("Unknown Vendor"); location.replace("./?page=mvendors")</script>';
							}

						}else{
							echo '<script> alert("Unknown Vendor"); location.replace("./?page=mvendors")</script>';
						}
					?>
						<label for="status">Account Status</label>
						<select type="text" id="status" name="status" class="form-control form-control-sm form-control-border select2">
                            <option value="1" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
                            <option value="0" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
                        </select>
					</div>
					<div class="form-group col-md-4">
					<label for="password">Password</label>
					<div class="input-group mb-3">
						<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" <?php echo isset($meta['id']) ? "": 'required' ?>>
						<div class="input-group-append">
							<div class="input-group-text">
								<a href="javascript:void(0)" class="text-reset text-decoration-none pass_view"> <i class="fa fa-eye-slash"></i></a>
							</div>
						</div>
						<?php if(isset($_GET['id'])): ?>
						<small><i>Leave this blank if you dont want to change the password.</i></small>
						<?php endif; ?>
					</div>
					</div>
					<div class="form-group">
						<label for="profile" class="control-label">Profile</label>
						<div class="custom-file">
						<input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
						<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
					<div class="form-group col-md-2">
						<img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail"><br>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn btn-sm btn-primary mr-2" form="manage-user">Update</button>
					<a class="btn btn-sm btn-secondary" id="back-link">Back</a>
				</div>
			</div>
		</div>
	</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage-user').submit(function(e){
		e.preventDefault();
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
				if(resp ==1){
					location.href = './?page=user_client';
				}else{
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
				}
                end_loader()
			}
		})
	})
	$('.pass_view').click(function(){
        var _el = $(this).closest('.input-group')
        var type = _el.find('input').attr('type')
        if(type == 'password'){
            _el.find('input').attr('type','text').focus()
            $(this).find('i.fa').removeClass('fa-eye-slash').addClass('fa-eye')
        }else{
            _el.find('input').attr('type','password').focus()
            $(this).find('i.fa').addClass('fa-eye-slash').removeClass('fa-eye')

        }
    })

var element = document.getElementById('back-link');
element.setAttribute('href', document.referrer);

element.onclick = function() {
  history.back();
  return false;
}
</script>