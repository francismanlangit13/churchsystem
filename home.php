<?php 
$qry = $conn->query("SELECT * FROM `daily_verses` where `display_date` = '".date('Y-m-d')."' ");
if($qry->num_rows>0){
    foreach($qry->fetch_array() as $k => $v){
        if(!is_numeric($k))
            $dv[$k] = $v;
    }
}

?>

<style>
    #main-header:before{
        background-image:url("<?php echo validate_image((isset($dv['image_path']) && !empty($dv['image_path']))? $dv['image_path'] : $_settings->info('no_verse')) ?>");
    }
    #main-header {
        height: 100vh;
        font-family: Brush Script MT, Brush Script Std, cursive;
        text-shadow: 5px 5px #9e73734d;
    }
    #main-header-small:before{
        background-image:url("<?php echo validate_image($_settings->info('cover')) ?>");
    }
    #main-header-small {
        height: 100vh;
        font-family: Brush Script MT, Brush Script Std, cursive;
    }
    #main-header-medium:before{
        background-image:url("<?php echo validate_image($_settings->info('interlink_cover')) ?>");
    }
    #main-header-medium {
        height: 100vh;
        font-family: cursive;
    }
    #slideshow { 
        position: relative; 
        height: 100vh; 
    }

    #slideshow > div { 
        position: absolute; 
        top: 0px; 
        left: 0px; 
        right: 0px; 
        bottom: 0px; 
    }
</style>
<div id="slideshow">
    <div>
        <header class="bg-dark py-5 d-flex align-items-center" id="main-header-small">
            <div class="container px-4 px-lg-5 my-5 w-100">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder"><?php echo $_settings->info('home_quote') ?></h1>
                    <p class="lead fw-normal text-white-75 mb-0"><?php echo $_settings->info('home_verse') ?></p>
                </div>
            </div>
        </header>
    </div>
    <div>
        <header class="bg-dark py-5 d-flex align-items-center" id="main-header">
            <div class="container px-4 px-lg-5 my-5 w-100">
                <div class="text-center text-white">
                    <h3 class="display-4">Daily Verse</h3>
                    <h3 class="display-6"><?php echo isset($dv['verse']) ? $dv['verse'] : "No verse for today." ?></h3>
                    <p class="lead fw-normal text-white-50 mb-0"><?php echo isset($dv['verse_from']) ? $dv['verse_from'] : "" ?></p>
                </div>
            </div>
        </header>
    </div>
    <div>
        <header class="bg-dark py-5 d-flex align-items-center" id="main-header-medium">
            <div class="container px-4 px-lg-5 my-5 w-100">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder"><?php echo $_settings->info('orgname') ?></h1>
                    <p class="lead fw-normal text-white-75 mb-0"><?php echo $_settings->info('orgdes') ?></p>
                    <a href="https://<?php echo $_settings->info('orglink') ?>" target="_blank" rel="noopener"> <button class="btn-small btn-primary" type="button">Visit</button></a>
                </div>
            </div>
        </header>
    </div>
</div>
<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
       <div class="col-12">
           <div class="row">
               <div class="col-md-8">
                   <h2><b>Welcome to <?php echo $_settings->info('name') ?></b></h2>
                   <hr>
                   <?php include('welcome_content.html') ?>
               </div>
               <div class="col-md-4 border-left">
                   <h4><b>Recent Blogs</b></h4>
                   <hr>
                   <?php 
                    $qry_blogs =$conn->query("SELECT * FROM `blogs` where `status` = 1 order by unix_timestamp(`date_created`) desc Limit 10");
                    while($row = $qry_blogs->fetch_assoc()):
                   ?>
                   <a href="<?php echo base_url.$row['blog_url'] ?>" class="w-100 d-flex pl-0 row-cols-2 text-decoration-none bg-light bg-gradient rounded-1 border-light border recent-item mb-1">
                       <div class="col-auto w-25 ml-0 p-0">
                           <img src="<?php echo validate_image($row['banner_path']) ?>" alt="Title" class="img-thumbnail recent-blog-img border-0 rounded-0  ml-0">
                       </div>
                       <div class="col-auto flex-grow-1 w-75">
                           <p class="truncate-1 m-0 "><b><?php echo $row['title'] ?></b></p>
                           <small class="truncate-1"><?php echo $row['meta_description'] ?></small>
                       </div>
                   </a>
                   <?php
                   endwhile;
                    ?>
                    <?php if($qry_blogs->num_rows <=0): ?>
                        <center><small><i>No data listed yet.</i></small></center>
                    <?php endif; ?>
               </div>
           </div>
       </div>
    </div>
</section>

<script>
$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
  .fadeOut(2000)
  .next()
  .fadeIn(2000)
  .end()
  .appendTo('#slideshow');
}, 5000);
</script>