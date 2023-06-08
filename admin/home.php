<style>
    .img-thumb {
        width:13.5vw !important;
        height:31.5vh !important;
        object-fit:cover;
        object-position:center top;
        min-width: 180px;
    }
    .birthday-holder {
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
</style>
<h1 class="text-light">Welcome to <?php echo $_settings->info('name') ?></h1>
<hr class="border-light">
<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-light elevation-1"><i class="fas fa-quote-left"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Daily Verses</span>
                <span class="info-box-number text-right">
                  <?php 
                    $verses = $conn->query("SELECT count(id) as total FROM daily_verses ")->fetch_assoc()['total'];
                    echo number_format($verses);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-calendar-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Confirm Appointments</span>
                <span class="info-box-number text-right">
                  <?php 
                    $appointment = $conn->query("SELECT count(id) as total FROM appointment_request ")->fetch_assoc()['total'];
                    echo number_format($appointment);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-blog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Published Blogs/Posts</span>
                <span class="info-box-number text-right">
                  <?php 
                    $blogs = $conn->query("SELECT id FROM `blogs` where status = '1' ")->num_rows;
                    echo number_format($blogs);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas far fa-folder-open"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Topic</span>
                  <span class="info-box-number text-right">
                  <?php 
                      $event = $conn->query("SELECT id FROM `topics` where status = '1'")->num_rows;
                      echo number_format($event);
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </div>
<section class="py-0">
  <div class="container">
    <h3 class='text-center bg-dark'>Upcoming Birthday's</h3>
    <hr class="border-light">
    <div class="w-100 row row-cols-1 row-cols-sm-1 row-cols-lg-3 row-cols-md-3 gx-3">
      <?php 
        $events = $conn->query("SELECT * FROM users WHERE  DATE_ADD(birthday, INTERVAL YEAR(CURDATE())-YEAR(birthday) + IF(DAYOFYEAR(CURDATE()) >= DAYOFYEAR(birthday),1,0) YEAR) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 28 DAY) ORDER BY MONTH(birthday) ASC");
        while($row = $events->fetch_array()):
        ?>
        <div class="cols-6">
            <div class="card d-flex">
                <span class="birthday-holder bg-dark"><?php echo date("M d",strtotime($row['birthday'])) ?></span>
                <img src="<?php echo validate_image($row['avatar']) ?>" alt="<?php echo $row['avatar'] ?>" class="img-top img-thumb">
                <div class="position-relative">
                    <div class="container-fluid-small">
                        <h5><b><?php echo $row['firstname'] ?></b></h5>
                        <small class="truncate-3"><b><?php echo $row['lastname'] ?></b></small>
                        <hr>
                        <small class="truncate-3">
                          <b>
                            <?php
                              $birthdayuser = $row['birthday'];
                              $date=date_create($birthdayuser);
                              $bday = new DateTime($birthdayuser); // Your date of birth
                              $today = new Datetime(date('m.d.y'));
                              $diff = $today->diff($bday);
                              printf(' Age: %d<br>', $diff->y);
                              printf(' Turning: %d years old', $diff->y+1);
                              printf("\n");
                              printf(' Birthday: '); echo date_format($date,"m/d/Y");
                            ?>
                          </b>
                        </small>
                    </div>
                </div>
            </div>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="col-12 text-center">
      <h5 class="text-light">
        <b>
          <?php 
            if($events->num_rows <= 0){
              printf(' No upcoming birthdays month of ' );
              $currentmonth = date('m');
              $monthNum  = $currentmonth;
              $dateObj   = DateTime::createFromFormat('!m', $monthNum);
              $monthName = $dateObj->format('F'); // March
              echo $monthName; echo ".";
            }
          ?>
        </b>
      </h5>
    </div>
  </div>
</section>
<br><br><br>
<section class="py-0">
  <div class="container">
    <h3 class='text-center bg-dark'>Upcoming Event's</h3>
    <hr class="border-light">
    <div class="w-100 row row-cols-1 row-cols-sm-1 row-cols-lg-3 row-cols-md-3 gx-3">
      <?php 
        $events = $conn->query("SELECT * FROM events where date(schedule) >= '".date("Y-m-d")."' order by date(schedule) asc ");
        while($row = $events->fetch_array()):
        ?>
        <div class="cols-6">
            <div class="card d-flex">
              <span class="birthday-holder bg-dark"><?php echo date("M d",strtotime($row['schedule'])) ?></span>
              <img src="<?php echo validate_image($row['img_path']) ?>" alt="<?php echo $row['img_path'] ?>" class="img-top img-thumb">
              <div class="position-relative">
                <div class="container-fluid-small">
                  <h5><b><?php echo $row['title'] ?></b></h5>
                  <small class="truncate-3"><b><?php echo $row['description'] ?></b></small>
                  <hr>
                </div>
              </div>
            </div>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="col-12 text-center">
      <h5 class="text-light">
        <b>
          <?php 
            if($events->num_rows <= 0){
              printf(' No upcoming events month of ' );
              $currentmonth = date('m');
              $monthNum  = $currentmonth;
              $dateObj   = DateTime::createFromFormat('!m', $monthNum);
              $monthName = $dateObj->format('F'); // March
              echo $monthName; echo ".";
            }
          ?>
        </b>
      </h5>
    </div>
  </div>
</section>
<br><br><br>
<section class="py-0">
  <div class="container">
    <h3 class='text-center bg-dark'>Status Chart's</h3>
      <hr class="border-light">
    </h3>
  </div>
</section>
<div class="row">
  <div class="col-12 col-sm-6 col-md-6">
    <canvas id="myChart" style="background:white; width:100%; max-width:600px"></canvas>
  </div>
  <div class="col-12 col-sm-6 col-md-6">
    <canvas id="myChart1" style="background:white; width:100%; max-width:600px"></canvas>
  </div>
</div>
<br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<!-- Total Admin -->
<?php
  $total = $conn->query("SELECT * FROM users WHERE type = 1 AND status = 1 AND (date_added between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW() )")->num_rows;
  $admin = number_format($total);
?>

<!-- Total Client -->
<?php
  $total = $conn->query("SELECT * FROM users WHERE type = 2 AND status = 1 AND (date_added between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW() )")->num_rows;
  $client = number_format($total);
?>

<!-- Total Memmbership -->
<?php
  $total = $conn->query("SELECT * FROM users WHERE type = 5 AND status = 1 AND (date_added between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW() )")->num_rows;
  $membership = number_format($total);
?>

<!-- Total Pastor -->
<?php
  $total = $conn->query("SELECT * FROM users WHERE type = 3 AND status = 1 AND (date_added between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW() )")->num_rows;
  $pastor = number_format($total);
?>

<!-- Total Youth People -->
<?php
  $total = $conn->query("SELECT * FROM users WHERE type = 4 AND status = 1 AND (date_added between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW() )")->num_rows;
  $youthpeople = number_format($total);
?>

<!-- Total Males (Active only!) -->
<?php 
  $total = $conn->query("SELECT count(id) as total FROM users where gender = 1 AND status = 1 ")->fetch_assoc()['total'];
  $male = number_format($total);
?>

<!-- Total Females (Active only!) -->
<?php 
  $total = $conn->query("SELECT count(id) as total FROM users where gender = 2 AND status = 1 ")->fetch_assoc()['total'];
  $female = number_format($total);
?>

<script>
  var xValues = ["Male", "Female"];
  var yValues = [<?php echo $male ?>, <?php echo $female ?>];
  var barColors = ["#0000FF","#FF69B4"];

  new Chart("myChart", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "Gender Category"
      }
    }
  });
</script>

<script>
  <?php 
    $currentmonth = date('m');
    $monthNum  = $currentmonth;
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthNameChart = $dateObj->format('F'); // March
  ?>
  var xValues = ["Admin", "Client", "Membership", "Pastor", "Youth People"];
  var yValues = [<?php echo $admin ?>,<?php echo $client ?>,<?php echo $membership ?>,<?php echo $pastor ?>,<?php echo $youthpeople ?>];
  var barColors = ["#b91d47","#00aba9","#2b5797","#e8c3b9","#1e7145"];

  new Chart("myChart1", {
    type: "pie",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true,
        text: "Total enrollees users month of <?php echo $monthNameChart; echo ".";?>"
      }
    }
  });
</script>