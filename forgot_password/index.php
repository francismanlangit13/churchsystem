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
			include("../initialize.php");
			if(isset($_POST["email"]) && (!empty($_POST["email"]))){
			$email = $_POST["email"];
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
			if (!$email) {
				$error = "<p>Invalid email address please type a valid email address!</p>";
			} else{
				$sel_query = "SELECT * FROM `users` WHERE email='".$email."'";
				$results = mysqli_query($conn,$sel_query);
				$row = mysqli_num_rows($results);
				if ($row==""){
					echo "
					<div class='card card-outline card-primary'>
						<div class='card-header text-center'>
						<a href='../' style='text-decoration:none;' class='h3'><b>Password Recovery</b></a>
						</div>
						<div class='card-body'>
						<p class='login-box-msg h6' style='font-size:0.9rem;'>No user is registered with this email address.</p>
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
				} else{
					$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
					$expDate = date("Y-m-d H:i:s",$expFormat);
					$key = md5(2418*2+$email);
					$addKey = substr(md5(uniqid(rand(),1)),3,10);
					$key = $key . $addKey;
				// Insert Temp Table
				mysqli_query($conn,"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('".$email."', '".$key."', '".$expDate."');");
				$output='<p>Dear user,</p>';
				$output.='<p>Please click on the following link to reset your password.</p>';
				$output.='<p>-------------------------------------------------------------</p>';
				$output.='<p><a href="http://localhost/church/forgot_password/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">http://localhost/church/forgot_password/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
				$output.='<p>-------------------------------------------------------------</p>';
				$output.='<p>Please be sure to copy the entire link into your browser.
				The link will expire after 1 day for security reason.</p>';
				$output.='<p>If you did not request this forgotten password email, no action 
				is needed, your password will not be reset. However, you may want to log into 
				your account and change your security password as someone may have guessed it.</p>';   	
				$output.='<p>Thanks,</p>';
				$output.='<p>Jimenez Grace Gospel Church</p>';
				$body = $output; 
				$subject = "Password Recovery - jggc.ueuo.com";
	
				$email_to = $email;
				$fromserver = "jggc.ueuo@gmail.com"; 
				require("../PHPMailer/PHPMailerAutoload.php");
				require ("../PHPMailer/class.phpmailer.php");
				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = 'ssl';
				$mail->Host = 'smtp.gmail.com'; // Enter your host here
				$mail->Port = '465';
				$mail->IsHTML();
				$mail->Username = 'jggc.ueuo@gmail.com'; // Enter your email here
				$mail->Password = 'puarqwlblqskifus'; //Enter your passwrod here
				$mail->SetFrom('jggc.ueuo@gmail.com', 'noreply@jggc.ueuo.com - Reset your password');
				//$mail->FromName = "AllPHPTricks";
				//$mail->Sender = $fromserver; // indicates ReturnPath header
				$mail->Subject = $subject;
				$mail->Body = $body;
				$mail->AddAddress($email_to);
				if(!$mail->Send()){
				echo "Mailer Error: " . $mail->ErrorInfo;
				} else{
				echo "
						<div class='card card-outline card-primary'>
							<div class='card-header text-center'>
							<a href='../' style='text-decoration:none;' class='h3'><b>Password Recovery</b></a>
							</div>
							<div class='card-body'>
							<p class='login-box-msg h6' style='font-size:0.9rem;'>An email has been sent to you with instructions on how to reset your password.</p>
							<p class='login-box-msg h6' style='font-size:0.8rem;'>If your email not received check on <b>spam folder</b>.</p>
							<form action='' name='reset' method='post'>
								<div class='row align-item-end'>
								
								<div class='col-6'>
									<a style='text-decoration:none;' href='../'>Back to Site</a>
								</div>
								<!-- /.col -->
								</div>
							</form>
							<!-- /.social-auth-links -->
							
							</div>
							<!-- /.card-body -->
						</div>
					";
					}
	
						}
			}	

			} else{
		?>
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
			<a href="../" style="text-decoration:none;" class="h3"><b>Password Recovery</b></a>
			</div>
			<div class="card-body">
			<p class="login-box-msg h6" style="font-size:0.9rem;">Lost your password? Enter email to recover.</p>

			<form action="" name="reset" method="post">
				<div class="input-group mb-3">
				<input type="email" class="form-control" name="email" placeholder="Enter your email" required>
				<div class="input-group-append">
					<div class="input-group-text">
					<span class="fas fa fa-envelope"></span>
					</div>
				</div>
				</div>
				<div class="row align-item-end">
				<!-- /.col -->
				<div class="col-12">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
				</div>
				
				<div class="col-6">
					<a style="text-decoration:none;" href="<?= base_url ?>">Back to Site</a>
				</div>
				<!-- /.col -->
				</div>
			</form>
			<!-- /.social-auth-links -->
			
			</div>
			<!-- /.card-body -->
		</div>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<?php } ?>
		<!-- Removed Ads -->
		<script src="<?php echo base_url ?>assets/js/fwhabannerfix.js"></script>
		<!-- jQuery -->
		<script src="../plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="../dist/js/adminlte.min.js"></script>
	</body>
</html>