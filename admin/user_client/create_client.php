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
			<form action="" id="manage-user">
				<div class="row">
					<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
					<input type="hidden" name="status" value="1">
					<input type="hidden" name="type" value="2">
					<div class="form-group col-md-4">
						<label for="firstname" class="required-field">First Name</label>
						<input type="text" name="firstname" id="firstname" class="form-control" required>
					</div>
					<div class="form-group col-md-3">
						<label for="middlename" class="required-field">Middle Name</label>
						<input type="text" name="middlename" id="middlename" class="form-control" required>
					</div>
					<div class="form-group col-md-3">
						<label for="lastname" class="required-field">Last Name</label>
						<input type="text" name="lastname" id="lastname" class="form-control" required>
					</div>
					<div class="form-group col-md-2">
						<label for="extname">Extension Name</label>
						<input type="text" name="extname" id="extname" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label for="gender" class="required-field">Gender</label>
						<select type="text" id="gender" name="gender" class="form-control form-control-sm form-control-border select2" required>
							<option value="" disabled selected>Select Gender</option>
							<option value="1">Male</option>
                            <option value="2">Female</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="civil_status" class="required-field">Civil Status</label>
						<select type="text" id="civil_status" name="civil_status" class="form-control form-control-sm form-control-border select2" required>
							<option value="" disabled selected>Select Civil Status</option>
							<option value="1">Single</option>
                            <option value="2">Married</option>
							<option value="3">Separated</option>
							<option value="4">Divorced</option>
							<option value="5">Widowed</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="phone" class="required-field">Phone Number</label>
						<input type="text" name="phone" id="phone" class="form-control" pattern="^(09|\+639)\d{9}$" required>
					</div>
					<div class="form-group col-md-4">
                        <label for="birthday" class="control-label required-field">Birthday</label>
                        <input type="date" name="birthday" id="birthday" class="form-control rounded-0" required>
                    </div>
					<div class="form-group col-md-4">
						<label for="username" class="required-field">Username</label>
						<input type="text" name="username" id="username" class="form-control" required>
					</div>
					<div class="form-group col-md-4">
						<label for="email" class="required-field">Email</label>
						<input type="email" name="email" id="email" class="form-control" required>
					</div>
					<div class="form-group col-md-4">
						<label for="password" class="required-field">Password</label>
						<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" <?php echo isset($meta['id']) ? "": 'required' ?>>
						<?php if(isset($_GET['id'])): ?>
						<small><i>Leave this blank if you dont want to change the password.</i></small>
						<?php endif; ?>
					</div>
					<div class="form-group col-md-8">
						<label for="address" class="required-field">Address</label>
						<input name="address" id="address" class="form-control" required>
					</div>
					<div class="form-group col-md-4">
						<label for="" class="control-label required-field">Profile</label>
						<div class="custom-file">
						<input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
						<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
					<div class="form-group d-flex justify-content-center" style="padding-left: 0.5rem;">
						<img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn btn-sm btn-primary mr-2" form="manage-user">Add</button>
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
	        	$('#cimg').attr('src', e.target.result);
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
			url:_base_url_+'classes/Users.php?f=saveaduser',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					setTimeout("location.href = './?page=user_client';",1500);
				} else if(resp == 2){
					el.addClass('alert-danger text-white small').text("Username already exist.");
					_this.prepend(el)
					el.show('.modal')
					end_loader();
				} else if(resp == 3){
					el.addClass('alert-danger text-white small').text("Email already exist.");
					_this.prepend(el)
					el.show('.modal')
					end_loader();
				} else if(resp == 4){
					el.addClass('alert-danger text-white small').text("Phone already exist.");
					_this.prepend(el)
					el.show('.modal')
					end_loader();
				} else{
					el.addClass('alert-danger text-white small').text("An error occured.");
					_this.prepend(el)
					el.show('.modal')
					end_loader();
				}
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