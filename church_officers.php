<style>
    .img-thumb {
        width:13.5vw !important;
        height:31.5vh !important;
        object-fit:cover;
        object-position:center top;
        min-width: 180px;
    }
    .schedule-holder {
        position: absolute;
        padding: 5px 15px;
        top: 43%;
        font-size: 1.5em;
        font-weight: 700;
        background-color: #21252970 !important;
    }
    .read-holder{
        position: absolute;
        bottom:3px;
        left:-1px;
    }
	img#cimg1{
		height: 12rem;
		width: 12rem;
		object-fit: contain;
		/* border-radius: 100% 100%; */
	}
</style>
<section class="py-5">
    <div class="container">
        <h4 class='text-center'>Set of Officers in Jimenez Grace Gospel Church of Christ</h4>
        <hr>

    <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-3 row-cols-md-3 gx-3">
					<!-- President -->
					<div class="form-group col-12">
						<div class="text-center h4" for="president"><b>President</b></div>
						<br>
						<?php
						$newimg = $_settings->info('president');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
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
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Vice President -->
					<div class="form-group col-12">
                        <div class="text-center h4" for="vice_president"><b>Vice President</b></div>
						<br>
						<?php
						$newimg = $_settings->info('vice_president');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
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
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Secretary -->
					<div class="form-group col-12">
                        <div class="text-center h4" for="secretary"><b>Secretary</b></div>
						<br>
						<?php
						$newimg = $_settings->info('secretary');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
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
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Tresurer -->
					<div class="form-group col-12">
                        <div class="text-center h4" for="tresurer"><b>Tresurer</b></div>
						<br>
						<?php
						$newimg = $_settings->info('tresurer');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
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
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Auditor -->
					<div class="form-group col-12">
                        <div class="text-center h4" for="auditor"><b>Auditor</b></div>
						<br>
						<?php
						$newimg = $_settings->info('auditor');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
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
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Committee -->
					<div class="form-group col-12">
                        <div class="text-center h4" for="committee"><b>Committee</b></div>
						<br>
						<?php
						$newimg = $_settings->info('committee');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
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
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
				</div>
    </div>
    </div>
    <br><br>
    <div class="container">
        <h4 class='text-center'>Set of Young People Officers in Jimenez Grace Gospel Church of Christ</h4>
        <hr>

    <div class="w-100 row row-cols-1 row-cols-sm-1 row-cols-lg-3 row-cols-md-3 gx-3">
					<!-- President -->
					<div class="form-group col-12">
						<div class="text-center h4" for="yp_president"><b>President</b></div>
						<br>
						<?php
						$newimg = $_settings->info('yp_president');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
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
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Vice President -->
					<div class="form-group col-12">
                        <div class="text-center h4" for="yp_vice_president"><b>Vice President</b></div>
						<br>
						<?php
						$newimg = $_settings->info('yp_vice_president');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
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
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Secretary -->
					<div class="form-group col-12">
                        <div class="text-center h4" for="yp_secretary"><b>Secretary</b></div>
						<br>
						<?php
						$newimg = $_settings->info('yp_secretary');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
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
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Tresurer -->
					<div class="form-group col-12">
                        <div class="text-center h4" for="yp_tresurer"><b>Tresurer</b></div>
						<br>
						<?php
						$newimg = $_settings->info('yp_tresurer');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
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
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Auditor -->
					<div class="form-group col-12">
                        <div class="text-center h4" for="yp_auditor"><b>Auditor</b></div>
						<br>
						<?php
						$newimg = $_settings->info('yp_auditor');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
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
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
					<!-- Committee -->
					<div class="form-group col-12">
                        <div class="text-center h4" for="yp_committee"><b>Committee</b></div>
						<br>
						<?php
						$newimg = $_settings->info('yp_committee');
							$res=mysqli_query($conn,"SELECT * FROM users where id = $newimg");
								if(!$res){ ?>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
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
							<img src="<?php echo validate_image(isset($row['avatar']) ? $row['avatar'] :'') ?>" alt="" id="cimg1" class="img-fluid img-thumbnail">
						</div>
						<div class="form-group d-flex justify-content-center">
							<label for="name" class="control-label"><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></label>
						</div>
						<?php } }?>
					</div>
				</div>
    </div>
    </div>
</section>