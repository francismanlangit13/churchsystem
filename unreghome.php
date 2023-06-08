<?php 
$user = $conn->query("SELECT * FROM users where id ='".$_settings->userdata('id')."'");
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
?>
<?php	
	if(!isset($_GET['id'])){
		$user = $conn->query("SELECT * FROM users where id ='".$_settings->userdata('id')."'");
			if($user->num_rows > 0){
				$res = $user->fetch_array();
					foreach($res as $k =>$v){
						$$k = $v;
					}
				} else{
			}
		} else{
	}
?>
<style>
    #main-header:before{
        background-image:url("<?php echo validate_image((isset($dv['image_path']) && !empty($dv['image_path']))? $dv['image_path'] : $_settings->info('cover')) ?>");
    }
    #main-header {
        height: 83vh;
        font-family: Brush Script MT, Brush Script Std, cursive;
        text-shadow: 5px 5px #9e73734d;
    }
</style>
<!-- Section-->
<style>
   
</style>
<?php if($status == 2){ ?>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Your account has been created and is not yet completed. Please complete your account information.</h5>
                            <br>
                            <div class="col-md-2">
                                <div class="row">
                                    <a href="<?php echo base_url ?>?p=new"><button class="btn btn-sm btn-primary" form="manage-user">Edit Profile</button></a>
                                </div>
                            </div>
                            <hr>
                            <?php include('welcome_content.html') ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php } else { ?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <h5> Error please close your browser and open again.</h5>
                        <br>
                        <hr>
                        <?php include('welcome_content.html') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>