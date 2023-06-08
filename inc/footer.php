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
<script>
  $(document).ready(function(){
    $('#p_use').click(function(){
      uni_modal("Privacy Policy","policy.php","mid-large")
    })
     window.viewer_modal = function($src = ''){
      start_loader()
      var t = $src.split('.')
      t = t[1]
      if(t =='mp4'){
        var view = $("<video src='"+$src+"' controls autoplay></video>")
      }else{
        var view = $("<img src='"+$src+"' />")
      }
      $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
      $('#viewer_modal .modal-content').append(view)
      $('#viewer_modal').modal({
              show:true,
              backdrop:'static',
              keyboard:false,
              focus:true
            })
            end_loader()  

  }
    window.uni_modal = function($title = '' , $url='',$size=""){
        start_loader()
        $.ajax({
            url:$url,
            error:err=>{
                console.log()
                alert("An error occured")
            },
            success:function(resp){
                if(resp){
                    $('#uni_modal .modal-title').html($title)
                    $('#uni_modal .modal-body').html(resp)
                    if($size != ''){
                        $('#uni_modal .modal-dialog').addClass($size+'  modal-dialog-centered')
                    }else{
                        $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
                    }
                    $('#uni_modal').modal({
                      show:true,
                      backdrop:'static',
                      keyboard:false,
                      focus:true
                    })
                    end_loader()
                }
            }
        })
    }
    window.uni_modal_small = function($title = '' , $url='',$size=""){
        start_loader()
        $.ajax({
            url:$url,
            error:err=>{
                console.log()
                alert("An error occured")
            },
            success:function(resp){
                if(resp){
                    $('#uni_modal_small .modal-title').html($title)
                    $('#uni_modal_small .modal-body').html(resp)
                    if($size != ''){
                        $('#uni_modal_small .modal-dialog').addClass($size+'  modal-dialog-centered')
                    }else{
                        $('#uni_modal_small .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
                    }
                    $('#uni_modal_small').modal({
                      show:true,
                      backdrop:'static',
                      keyboard:false,
                      focus:true
                    })
                    end_loader()
                }
            }
        })
    }
    window._conf = function($msg='',$func='',$params = []){
       $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
       $('#confirm_modal .modal-body').html($msg)
       $('#confirm_modal').modal('show')
    }
  })
</script>
<!-- Footer-->
  <footer class="py-3 bg-dark">
  <div class="footer-row2">
    <div class="container">
      <div class="row">
        <ul class="ul1">
          <h6>Connect with US</h6>
          <ul class="ul-sub">
            <a href="mailto:<?php echo $_settings->info('gmail') ?>"><p class="m-1 text-left text-white fa fa-envelope-square"> Email</p></a><br>
            <a href="tel:<?php echo $_settings->info('number') ?>"><p class="m-1 text-left text-white fa fa-phone-square"> Phone</p></a><br>
            <a href="https://<?php echo $_settings->info('facebook') ?>" target="_blank" rel="noopener"><p class="m-1 text-left text-white 	fab fa-facebook-square"> Facebook</p></a><br>
            <a href="https://<?php echo $_settings->info('instagram') ?>" target="_blank" rel="noopener"><p class="m-1 text-left text-white fab fa-instagram-square"> Instagram</p></a><br>
            <a href="https://<?php echo $_settings->info('twitter') ?>" target="_blank" rel="noopener"><p class="m-1 text-left text-white fab fa-twitter-square"> Twitter</p></a><br>
            <a href="https://<?php echo $_settings->info('youtube') ?>" target="_blank" rel="noopener"><p class="m-1 text-left text-white fab fa-youtube-square"> YouTube</p></a>
          </ul>
        </ul>
        <ul class="ul1">
          <h6>Navigation</h6>
          <?php if (isset($_SESSION['userdata'])){
            if ($status == 1){ ?>
            <ul class="ul-sub">
              <?php 
                $cat_qry = $conn->query("SELECT * FROM topics where status = 1 limit 5 ");
                while($crow = $cat_qry->fetch_assoc()):
                ?> 
                <a class="m-1 text-left text-LightGray" style="text-decoration: none;" href="<?php echo base_url ?>?p=articles&t=<?php echo md5($crow['id']) ?>"><?php echo $crow['name'] ?><br></a>
              <?php endwhile; ?>
            </ul>
          <?php } else if ($status == 2 || $status == 3 || $status == 4){ ?>
            <ul class="ul-sub">
              <a class="m-1 text-left text-LightGray" style="text-decoration: none;" href="<?php echo base_url ?>?p=new">Complete your account to view<br></a>
            </ul>
          <?php } else{ ?>
            <ul class="ul-sub">
              <a class="m-1 text-left text-LightGray" style="text-decoration: none;" href="<?php echo base_url ?>login">Login to view<br></a>
            </ul>
          <?php } } else{ ?>
            <a class="m-1 text-left text-LightGray" style="text-decoration: none;" href="<?php echo base_url ?>login">Login to view<br></a>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  </footer>
  <footer class="py-3 bg-dark text-sm">
    <div class="container">
      <strong>Copyright © 2020-<?php echo date('Y') ?>. 
        <!-- <a href=""></a> -->
      </strong>
      Jimenez Grace Gospel Church of Christ All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Developer <a href="https://franzcarl.ueuo.com" target="_blank" style="text-decoration:none;" rel="noopener">franzcarl13</a></b> V<?php echo $_settings->info('system_version') ?>
      </div>
    </div>
  </footer>

   
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url ?>plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url ?>plugins/sparklines/sparkline.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url ?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url ?>plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url ?>plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- overlayScrollbars -->
    <!-- <script src="<?php echo base_url ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
    <?php if ($_settings->info('enable_fb') == 1){ ?>
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>
    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "<?php echo $_settings->info('FBmsgAPI') ?>");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- END Facebook Messenger Chat -->
    <?php } else { } ?>
    <!-- Removed Ads -->
    <script src="<?php echo base_url ?>assets/js/fwhabannerfix.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url ?>dist/js/adminlte.js"></script>
    <div class="daterangepicker ltr show-ranges opensright">
      <div class="ranges">
        <ul>
          <li data-range-key="Today">Today</li>
          <li data-range-key="Yesterday">Yesterday</li>
          <li data-range-key="Last 7 Days">Last 7 Days</li>
          <li data-range-key="Last 30 Days">Last 30 Days</li>
          <li data-range-key="This Month">This Month</li>
          <li data-range-key="Last Month">Last Month</li>
          <li data-range-key="Custom Range">Custom Range</li>
        </ul>
      </div>
      <div class="drp-calendar left">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
      </div>
      <div class="drp-calendar right">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
      </div>
      <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
    </div>
    <div class="jqvmap-label" style="display: none; left: 1093.83px; top: 394.361px;">Idaho</div>