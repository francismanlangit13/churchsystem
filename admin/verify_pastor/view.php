
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
						<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" disabled>
					</div>
					<div class="form-group col-md-3">
						<label for="middlename">Middle Name</label>
						<input type="text" name="middlename" id="middlename" class="form-control" value="<?php echo isset($meta['middlename']) ? $meta['middlename']: '' ?>" disabled>
					</div>
					<div class="form-group col-md-3">
						<label for="lastname">Last Name</label>
						<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" disabled>
					</div>
					<div class="form-group col-md-2">
						<label for="extname">Extension Name</label>
						<input type="text" name="extname" id="extname" class="form-control" value="<?php echo isset($meta['extname']) ? $meta['extname']: '' ?>" disabled>
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
						<?php if ($gender == 1){ ?>
							<input type="text" class="form-control" value="Male" disabled>
						<?php } else if ($gender == 2) { ?>
							<input type="text" class="form-control" value="Female" disabled>
						<?php } else { ?>
							<input type="text" class="form-control" value="NULL" disabled>
						<?php } ?>
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
						<label for="civil_status">Civil status</label>
						<?php if($civil_status == 1){ ?>
							<input type="text" class="form-control" value="Single" disabled>
						<?php } else if ($civil_status == 2){ ?>
							<input type="text" class="form-control" value="Married" disabled>
						<?php } else if ($civil_status == 3){ ?>
							<input type="text" class="form-control" value="Separated" disabled>
						<?php } else if ($civil_status == 4){ ?>
							<input type="text" class="form-control" value="Divorced" disabled>
						<?php } else if ($civil_status == 5){ ?>
							<input type="text" class="form-control" value="Widowed" disabled>
						<?php } else { ?>
							<input type="text" class="form-control" value="NULL" disabled>
						<?php } ?>
					</div>
					<div class="form-group col-md-4">
						<label for="phone">Phone Number</label>
						<input type="text" name="phone" id="phone" class="form-control" value="<?php echo isset($meta['phone']) ? $meta['phone']: '' ?>" disabled>
					</div>
					<div class="form-group col-md-4">
                        <label for="birthday" class="control-label">Birthday</label>
                        <input type="date" name="birthday" id="birthday" class="form-control rounded-0" value="<?php echo isset($meta['birthday']) ? $meta['birthday']: '' ?>" disabled>
                    </div>
					<div class="form-group col-md-4">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" disabled  autocomplete="off">
					</div>
					<div class="form-group col-md-4">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" disabled  autocomplete="off">
					</div>
					<div class="form-group col-md-6">
						<label for="address">Address</label>
						<input  name="address" id="address" class="form-control" value="<?php echo isset($meta['address']) ? $meta['address']: '' ?>" disabled></input>
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
								}
							}else{
							}
						?>
						<label for="status">Account Status</label>
						<select type="text" id="status" onchange="showDiv(this)" name="status" class="form-control form-control-sm form-control-border select2" required>
							<option value="" selected disabled>Pastor Approval</option>
                            <option value="1">Approved</option>
                            <option value="3">Reject</option>
                        </select>
					</div>
					<div class="form-group" hidden="true">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" <?php echo isset($meta['id']) ? "": 'disabled' ?>disabled>
						<?php if(isset($_GET['id'])): ?>
						<small><i>Leave this blank if you dont want to change the password.</i></small>
						<?php endif; ?>
					</div>
					<div class="form-group">
						<label for="profile" class="control-label">Profile</label>
					</div>
					<div class="form-group col-md-2">
						<center>
							<img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail"><br>
							<button class="formButton" onclick="myFunctionSL()" data-user-action="view" id="cim1" type="button"><a href="javascript:void(0)" class="sched-item" data-name="<?php echo  $meta['firstname'] ?>" data-name1="<?php echo  $meta['lastname'] ?>" data-id="<?php echo  $meta['id'] ?>">View</a></button>
						</center>
						
					</div>
					<div class="form-group col-md-12" id="hidden_div" style="display: none;">
						<label for="remarks">Remarks</label>
						<input type="text" name="remarks" id="remarks" class="form-control" placeholder="Incase of Rejection add comments."  autocomplete="off">
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
		margin-bottom: 0.2rem;
	}
	img#cim1{
		height: 65vh;
		width: 65vh;
		object-fit: cover;
	}
</style>
<script type="text/javascript">
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
</script>
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
					location.href = './?page=verify_pastor';
				}else{
					$('#msg').html('<div class="alert alert-danger">An error occured.</div>')
				}
                end_loader()
			}
		})
	})
	$(function(){
        $('.sched-item').click(function(){
            var name = $(this).attr('data-name')
			var name1 = $(this).attr('data-name1')
            var id = $(this).attr('data-id')
            uni_modal_small("Profile for <i>"+name+" "+name1+"</i>","verify_pastor/view_img.php?id="+id,"mid-large")
        })
    })

function myFunctionSL() {

}

var element = document.getElementById('back-link');

// Provide a standard href to facilitate standard browser features such as 
//  - Hover to see link
//  - Right click and copy link
//  - Right click and open in new tab
element.setAttribute('href', document.referrer);

// We can't let the browser use the above href for navigation. If it does, 
// the browser will think that it is a regular link, and place the current 
// page on the browser history, so that if the user clicks "back" again,
// it'll actually return to this page. We need to perform a native back to
// integrate properly into the browser's history behavior
element.onclick = function() {
  history.back();
  return false;
}

</script>