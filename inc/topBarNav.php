<?php 
  if(isset($_SESSION['userdata'])){
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
<?php } else { } ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-navy">
            <div class="container px-4 px-lg-5 ">
                <button class="navbar-toggler btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand" style="font-size: 1rem;" href="<?php echo base_url ?>">
                <img src="<?php echo validate_image($_settings->info('logo')) ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                <?php echo $_settings->info('short_name') ?>
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-0">
                      <?php if (isset($_SESSION['userdata'])){ ?>
                        <?php if ($status == 1){ ?>
                          <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url ?>">Home</a></li>
                          <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url ?>?p=view_events">Events</a></li>
                          <li class="nav-item  dropdown">
                            <a class="nav-link" aria-current="page" href="<?php echo base_url ?>?p=view_topics">Topics</a>
                          </li>
                          <li class="nav-item"><a class="nav-link" href="<?php echo base_url ?>?p=schedule">Schedule</a></li>
                          <?php if (isset($_SESSION['userdata'])){ ?>
                          <li class="nav-item"><a class="nav-link" href="<?php echo base_url ?>?p=church_officers">Officers</a></li>
                          <?php } else { } ?>
                          <li class="nav-item"><a class="nav-link" href="<?php echo base_url ?>?p=about">About</a></li>
                        <?php } else { } ?>
                      <?php } else { ?>
                          <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url ?>">Home</a></li>
                          <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url ?>?p=view_events">Events</a></li>
                          <li class="nav-item  dropdown">
                            <a class="nav-link" aria-current="page" href="<?php echo base_url ?>?p=view_topics">Topics</a>
                          </li>
                          <li class="nav-item"><a class="nav-link" href="<?php echo base_url ?>?p=schedule">Schedule</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?php echo base_url ?>?p=about">About</a></li>
                      <?php } ?>
                    </ul>
                    <div class="d-flex align-items-center">
                    </div>
                </div>
                <?php if (isset($_SESSION['userdata'])){ ?>
                  <?php if ($status == 1){ ?>
                    <button class="btn-small btn-primary" type="button" id="donation">Donation</button>
                    <form id="search-form">
                      <div class="input-group col-md-10">
                        <input class="form-control form-control-sm form" type="search" placeholder="Search" aria-label="Search" name="search"  value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>"  aria-describedby="button-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-outline-success btn-sm m-0" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  <?php } else { } ?>
                <?php } else { ?>
                  <button class="btn-small btn-primary" type="button" id="donation">Donation</button>
                  <form id="search-form">
                    <div class="input-group col-md-10">
                      <input class="form-control form-control-sm form" type="search" placeholder="Search" aria-label="Search" name="search"  value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>"  aria-describedby="button-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-outline-success btn-sm m-0" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                <?php } ?>
                <?php if(!isset($_SESSION['userdata'])){ ?>
                <div class="form-inline ml-4 mr-2 pl-2" id="search-form">
                  <div class="nav-item dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle text-reset text-decoration-none" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="mx-2"><img src="<?php echo base_url ?>uploads/avatar-guest.png" class="img-thumbnail-small rounded-circle" style="width:2rem; height:2rem;" alt="User Avatar" id="client-img-avatar">  <span class="mx-2">Hi, Guest</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a href="<?php echo base_url ?>login" class="dropdown-item"><span class="fa fa-sign-in-alt" aria-hidden="true"> Login</span></a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php echo base_url ?>register" class="dropdown-item"><span class="fas fa-user-edit"> Sign up</span></a>
                    </div>
                  </div>
                </div>
              <?php } else { ?>
                  <?php if ($status == 2 || $status == 3 || $status == 4 || $type == 9){ ?>
                    <div class="nav-item dropdown">
                      <a href="javascript:void(0)" class="dropdown-toggle text-reset text-decoration-none" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mx-0"><img id="cimg" class="img-fluid" src="<?= validate_image($_settings->userdata('avatar')) ?>" alt="User Avatar" id="client-img-avatar">  <span class="mx-0">Hi, <?= !empty($_settings->userdata('firstname')) ? $_settings->userdata('firstname') : $_settings->userdata('firstname') ?></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url.'classes/Login.php?f=flogout' ?>"><span class="fas fa-sign-out-alt"> Logout</span></a>
                      </div>
                    </div>
                  <?php } else{ ?>
                <div class="nav-item dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle text-reset text-decoration-none" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mx-0"><img id="cimg" class="img-fluid" src="<?= validate_image($_settings->userdata('avatar')) ?>" alt="User Avatar" id="client-img-avatar">  <span class="mx-0">Hi, <?= !empty($_settings->userdata('firstname')) ? $_settings->userdata('firstname') : $_settings->userdata('firstname') ?></span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url ?>?p=my_user"><span class="fas fa-user-cog"> My Account</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url.'classes/Login.php?f=flogout' ?>"><span class="fas fa-sign-out-alt"> Logout</span></a>
                  </div>
                </div>
              <?php } } ?>
            </div>
        </nav>
  <style>
    .nav-item.dropdown:hover .dropdown-menu{
      display:block;
    }
      img#cimg{
      text-align: center;
      height: 2.3rem;
      width: 2.3rem;
      object-fit: cover;
      border-radius: 100% 100%;
      padding: 0.1rem;
      background-color: #fff;
      max-width: 100%;
    }
    img#cimg2{
      height: 50vh;
      width: 100%;
      object-fit: contain;
      /* border-radius: 100% 100%; */
    }
  </style>
<script>
  $(function(){
    $('#login-btn').click(function(){
      uni_modal("","login.php")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })

    $('#search-form').submit(function(e){
      e.preventDefault()
      var sTxt = $('[name="search"]').val()
      if(sTxt != '')
        location.href = './?p=search&search='+sTxt;
    })
    $('#donation').click(function(){
      uni_modal_small('<h4 class="fas fa-donate"> Donation','donate.php')
    })
  })
</script>