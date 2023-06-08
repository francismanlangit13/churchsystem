<?php require_once('../config.php'); ?>
<!DOCTYPE html>
<?php require_once('../inc/header.php'); ?>
<html lang="en" class="" style="height: auto;">
	<body class="hold-transition login-page  dark-mode">
		<style>
			body{
				width:calc(100%);
				height:calc(100%);
				background-image:url('<?= validate_image($_settings->info('cover')) ?>');
				background-repeat: no-repeat;
				background-size:cover;
			}
			#system_name{
				color:#fff;
				text-shadow: 3px 3px 3px #000;
			}
		</style>
		<center><img src="<?= validate_image($_settings->info('logo')) ?>" alt="System Logo" class="img-thumbnail rounded-circle" style="width:8rem; height:8rem;" id="logo-img"></center>
		<h2 class="text-center h4" id="system_name"><?= $_settings->info('short_name') ?></h2>
		<div class="clear-fix my-2"></div>
		<div class="login-box">
<?php
include('../initialize.php');
if (isset($_GET["key"]) && isset($_GET["email"])
&& isset($_GET["action"]) && ($_GET["action"]=="reset")
&& !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($conn,"SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';");
$row = mysqli_num_rows($query);
if ($row==""){
	echo "
		<div class='card card-outline card-primary'>
			<div class='card-header text-center'>
				<a href='../' style='text-decoration:none;' class='h3'><b>Invalid Link</b></a>
			</div>
			<div class='card-body'>
				<p class='login-box-msg h6' style='font-size:0.9rem;'>The link is invalid/expired. Either you did not copy the correct link from the email, 
				or you have already used the key in which case it is deactivated.</p>
				<form action='' name='reset' method='post'>
					<div class='row align-item-end'>
						<div class='col-12 text-center'>
							<p>To request a new password click<a style='text-decoration:none;' href='../forgot_password'> here</a>.</p>
						</div>
					</div>
				</form>
			</div>
		</div>
	";
	} else{
	$row = mysqli_fetch_assoc($query);
	$expDate = $row['expDate'];
	if ($expDate >= $curDate){
	?>
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
			<a href="../" style="text-decoration:none;" class="h3"><b>Password Recovery</b></a>
			</div>
			<div class="card-body">
			<p class="login-box-msg h6" style="font-size:0.9rem;">You can now change your password.</p>

			<form action="" name="update" method="post">
				<input type="hidden" name="action" value="update" />
				<div class="input-group mb-3">
					<input type="password" class="form-control" name="password" id="password" placeholder="New Password" required>
					<div class="input-group-text">
						<a href="javascript:void(0)" class="text-reset text-decoration-none pass_view"> <i class="fa fa-eye-slash"></i></a>
					</div>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm New Password" required>
					<div class="input-group-text">
						<a href="javascript:void(0)" class="text-reset text-decoration-none pass_view"> <i class="fa fa-eye-slash"></i></a>
					</div>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa fa-lock"></span>
						</div>
					</div>
				</div>
				<input type="hidden" name="email" value = "<?php echo $email; ?>"/>
				<div class="row align-item-end">
					<div class="col-12">
						<button type="submit" id="reset" class="btn btn-primary btn-block btn-flat">Reset Password</button>
					</div>
					<div class="col-6">
						<a style="text-decoration:none;" href="<?= base_url ?>">Back to Site</a>
					</div>
				</div>
			</form>
			<!-- /.social-auth-links -->
			
			</div>
			<!-- /.card-body -->
		</div>
<?php
} else{
	echo "
		<div class='card card-outline card-primary'>
			<div class='card-header text-center'>
				<a href='../' style='text-decoration:none;' class='h3'><b>Password Recovery</b></a>
			</div>
			<div class='card-body'>
				<p class='login-box-msg h6' style='font-size:0.9rem;'>The link is expired. You are trying to use the expired link which as valid only 24 hours (1 days after request).</p>
				<form action='' name='reset' method='post'>
					<div class='row align-item-end'>
						<div class='col-6'>
							<a style='text-decoration:none;' href='javascript:history.go(-1)'>Go Back</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	";
}
		}
}  // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$error="";
$password = mysqli_real_escape_string($conn,$_POST["password"]);
$cpassword = mysqli_real_escape_string($conn,$_POST["cpassword"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($password!=$cpassword){
		$error .= "
			<div class='card card-outline card-primary'>
				<div class='card-header text-center'>
				<a href='../' style='text-decoration:none;' class='h3'><b>Password Recovery</b></a>
				</div>
				<div class='card-body'>
				<p class='login-box-msg h6' style='font-size:0.9rem;'>Password do not match, both password should be same.</p>

				<form action='' name='reset' method='post'>
					<div class='row align-item-end'>
						<div class='col-6'>
							<a style='text-decoration:none;' href='javascript:history.go(-1)'>Go Back</a>
						</div>
					</div>
				</form>
				<!-- /.social-auth-links -->
				
				</div>
				<!-- /.card-body -->
			</div>
		";
		}
	if($error!=""){
		echo "<div class='error'>".$error."</div><br />";
		}else{

$password = md5($password);
mysqli_query($conn,"UPDATE `users` SET `password`='".$password."' WHERE `email`='".$email."';");	

mysqli_query($conn,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");		
	
echo "
	<div class='card card-outline card-primary'>
		<div class='card-header text-center'>
			<a href='../' style='text-decoration:none;' class='h3'><b>Password Recovery</b></a>
		</div>
		<div class='card-body'>
			<p class='login-box-msg h6' style='font-size:0.9rem;'>Your password has been updated successfully.</p>
			<form action='' name='reset' method='post'>
				<div class='row align-item-end'>
					<div class='col-9'>
						<a style='text-decoration:none;' href='../'>Back to Site</a>
					</div>
					<div class='col-3'>
						<a style='text-decoration:none;' href='../login'>Login</a>
					</div>
				</div>
			</form>
		</div>
	</div>
";
		}		
}
?>
</div>
</body>
<script>
		$(document).ready(function(){
				end_loader();
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
</script>
</html>