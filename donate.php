<?php
require_once('config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $user = $conn->query("SELECT * FROM users where id ='{$_GET['id']}'");
    foreach($user->fetch_array() as $k =>$v){
        $meta[$k] = $v;
    }
}
?>

<div class="container-fluid text-center">
    <div class="text-center" for="info"><i>You can donate by scanning QR Code </i><i class='fas fa-qrcode'></i></div>
    <div class="row row-cols-lg-3 gx-3">
        <!-- G-Cash -->
		<div class="form-group col-12">
			<div class="text-center" for="G-Cash"><b>G-Cash</b></div>
			<br>
            <?php if ($_settings->info('GCash') == !null){ ?>
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image($_settings->info('GCash')) ?>" alt="G-Cash" id="cim1" class="img-fluid img-thumbnail">
                </div>
            <?php } else { ?>
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image(isset($meta['avatar'])) ?>" alt="No-Image" id="cim1" class="img-fluid img-thumbnail">
                </div>
            <?php } ?>
		</div>
        <!-- Paymaya -->
		<div class="form-group col-12">
			<div class="text-center" for="Paymaya"><b>Paymaya</b></div>
			<br>
            <?php if ($_settings->info('Paymaya') == !null){ ?>
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image($_settings->info('Paymaya')) ?>" alt="Paymaya" id="cim1" class="img-fluid img-thumbnail">
                </div>
            <?php } else { ?>
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image(isset($meta['avatar'])) ?>" alt="No-Image" id="cim1" class="img-fluid img-thumbnail">
                </div>
            <?php } ?>
		</div>
        <!-- Shopee Pay -->
		<div class="form-group col-12">
			<div class="text-center" for="Shopee_Pay"><b>Shopee Pay</b></div>
			<br>
            <?php if ($_settings->info('Shopee_Pay') == !null){ ?>
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image($_settings->info('Shopee_Pay')) ?>" alt="Shopee_Pay" id="cim1" class="img-fluid img-thumbnail">
                </div>
            <?php } else { ?>
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image(isset($meta['avatar'])) ?>" alt="No-Image" id="cim1" class="img-fluid img-thumbnail">
                </div>
            <?php } ?>
		</div>
    </div>
    <div class="text-center" for="down-info"><i>Thank you for donating.</i></div>
</div>
<style>
	img#cim1{
		height: 8rem;
		width: 8rem;
		object-fit: cover;
		margin-bottom: 0.2rem;
	}
</style>