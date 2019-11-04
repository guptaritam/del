<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <?php include 'configs/head_section.php'; ?>
</head>

<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>
    <main>
        <div class="container-fluid">
            <div class="row  ">
                <div class="col-12">
                    <h1>Dashboard Analytics</h1>
                    
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-4 col-lg-6 mb-4">
                    <div class="card" style="height:130px;">
                      <a href="view_members.php">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0" style="font-size: 20px;">Total Members
                              <i style="font-size: 30px;" class="fa fa-user-circle-o"></i></h6>
                              <h2 class="m-b-20" data-plugin="counterup" style="font-size: 30px; color:#34baeb;"><?php  echo $count = count_tem_in_table("member"); ?></h2>
                              
                        </div></a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 mb-4">
                    <div class="card" style="height:130px;">
                      <a href="view_membership.php">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0" style="font-size: 20px;">Packages Type
                              <i class="fa fa-money" style="font-size: 30px;" ></i></h6>
                              <h2 class="m-b-20" data-plugin="counterup" style="font-size: 30px; color:#34baeb;"><?php  echo $count = count_tem_in_table("membership_type"); ?></h2>
                              
                        </div></a>
                    </div>
                </div>

               <div class="col-xl-4 col-lg-6 mb-4">
                    <div class="card" style="height:130px;">
                      <a href="view_pending_payment.php">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0" style="font-size: 20px;">Pending Payments
                              <i class="fa fa-inr" style="font-size: 30px;" ></i></h6>
                              <h2 class="m-b-20" data-plugin="counterup" style="font-size: 30px; color:#34baeb;"><?php  echo $count1 = count_tem_in_table2(); ?></h2>
                              
                        </div></a>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-4 col-lg-6 mb-4">
                    <div class="card" style="height:130px;">
                      <a href="view_new_enquiry.php">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0" style="font-size: 20px;">Total Enquiries
                              <i style="font-size: 30px;" class="fa fa-pencil"></i></h6>
                              <h2 class="m-b-20" data-plugin="counterup" style="font-size: 30px; color:#34baeb;"><?php  echo $count = count_tem_in_table("enquiry"); ?></h2>
                              
                        </div></a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 mb-4">
                    <div class="card" style="height:130px;">
                      <a href="upcoming_birthday.php">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0" style="font-size: 20px;">Upcoming Birthday's
                                <i class="fa fa-birthday-cake" style="font-size: 30px;"></i></h6>
                              <h2 class="m-b-20" data-plugin="counterup" style="font-size: 30px; color:#34baeb;">
                                <?php  
                                try {
                                  $stmt = $pdo->prepare('SELECT * FROM member');
                                  } catch(PDOException $ex) {
                                      echo "An Error occured!"; 
                                      print_r($ex->getMessage());
                                  }    
                                  $stmt->execute();
                                  $user = $stmt->fetchAll();
                                  $count = str_pad(count($user), 3, '0', STR_PAD_LEFT);
                                  echo $count;
                              ?>
                              </h2>
                              
                        </div></a>
                    </div>
                </div>

                 <div class="col-xl-4 col-lg-6 mb-4">
                    <div class="card" style="height:130px;">
                      <a href="membership_about_to_expire.php">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0" style="font-size: 20px;">Packages to Expire
                                <i class="fa fa-birthday-cake" style="font-size: 30px;"></i></h6>
                              <h2 class="m-b-20" data-plugin="counterup" style="font-size: 30px; color:#34baeb;">
                                <?php 
                                    // $tu = date('Y-m-d');
                                    // echo $tu;
                                    
                                try {
                                    $stmt = $pdo->prepare('SELECT * from member WHERE date > DATE_ADD("2019-10-23", INTERVAL 60 DAY)');
                                  } catch(PDOException $ex) {
                                      echo "An Error occured!"; 
                                      print_r($ex->getMessage());
                                  }    
                                  $stmt->execute();
                                  $user = $stmt->fetchAll();
                                  $count = str_pad(count($user), 3, '0', STR_PAD_LEFT);
                                  echo $count;
                              ?>
                              </h2>
                              
                        </div></a>
                    </div>
                </div>

               <!--  <div class="col-xl-4 col-lg-6 mb-4">
                    <div class="card" style="height:130px;">
                      <a href="view_membership.php">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0" style="font-size: 20px;">Packages Type
                              <i class="fa fa-money" style="font-size: 40px;" ></i></h6>
                              <h2 class="m-b-20" data-plugin="counterup" style="font-size: 30px; color:#34baeb;"><?php  echo $count = count_tem_in_table("membership_type"); ?></h2>
                              
                        </div></a>
                    </div>
                </div>

               <div class="col-xl-4 col-lg-6 mb-4">
                    <div class="card" style="height:130px;">
                      <a href="view_pending_payment.php">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0" style="font-size: 20px;">Pending Payments
                              <i class="fa fa-inr" style="font-size: 40px;" ></i></h6>
                              <h2 class="m-b-20" data-plugin="counterup" style="font-size: 30px; color:#34baeb;"><?php  echo $count1 = count_tem_in_table2(); ?></h2>
                              
                        </div></a>
                    </div>
                </div> -->
            </div>

            <div class="row">

            <div class="col-lg-12">

                    <div class="card mb-4">
                        <h1 style="padding:20px;">Enquiry Updates</h1>
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" data-toggle="tab" href="#home">Warm</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#menu1">Hot</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#menu3">Cold</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#menu2">Cancelled</a>
                                </li>
                              </ul>

                              <!-- Tab panes -->
                              <div class="tab-content">
                                <div id="home" class="container tab-pane active"><br>
                                  <h3>Warm Enquiries</h3>
                                  <table class="example">
                                    <thead>
                                    <tr style="border-bottom: solid 1px #eee; background-color: #ebfdff">

                                        <th style="padding:5px;">S.No.</td>
                                        <th style="padding:5px;">Name</th>
                                        <th style="padding:5px;">Contact</th>
                                        <th style="padding:5px;">Status</th>
                                        <th style="padding:5px;">Goal</th>
                                        <th style="padding:5px;">Date</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php 
                                                $table ="enquiry";
                                                $data = get_data_id_data_hoho($table,'conversion_status','Warm'); 
                                                show_enquiry_short2($data);
                                         ?>                                    
                                    </tbody>
                                </table>
                                </div>

                                <div id="menu1" class="container tab-pane fade"><br>
                                  <h3>Hot Enquiries</h3>
                                  <table class="example">
                                    <thead>
                                    <tr style="border-bottom: solid 1px #eee;">
                                        <th style="padding:5px;">S.No.</td>
                                        <th style="padding:5px;">Name</th>
                                        <th style="padding:5px;">Contact</th>
                                        <th style="padding:5px;">Status</th>
                                        <th style="padding:5px;">Goal</th>
                                        <th style="padding:5px;">Date</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php 
                                              $table = "enquiry";
                                              $data = get_data_id_data_hoho($table, 'conversion_status', 'Hot');
                                              show_enquiry_short2($data);
                                        ?>                                 
                                    </tbody>
                                </table>
                                </div>

                                <div id="menu2" class="container tab-pane fade"><br>
                                  <h3>Cancelled Enquiries</h3>
                                  <table class="example">
                                    <thead>
                                    <tr style="border-bottom: solid 1px #eee;">
                                        <th style="padding:5px;">S.No.</td>
                                        <th style="padding:5px;">Name</th>
                                        <th style="padding:5px;">Contact</th>
                                        <th style="padding:5px;">Status</th>
                                        <th style="padding:5px;">Goal</th>
                                        <th style="padding:5px;">Date</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php 
                                                $table ="enquiry";
                                                $data = get_data_id_data_hoho($table,'conversion_status','Cancelled'); 
                                                show_enquiry_short2($data);
                                         ?>                                    
                                    </tbody>
                                </table>
                                </div>

                                <div id="menu3" class="container tab-pane fade"><br>
                                  <h3>Cold Enquiries</h3>
                                  <table class="example">
                                    <thead>
                                    <tr style="border-bottom: solid 1px #eee;">
                                        <th style="padding:5px;">S.No.</td>
                                        <th style="padding:5px;">Name</th>
                                        <th style="padding:5px;">Contact</th>
                                        <th style="padding:5px;">Status</th>
                                        <th style="padding:5px;">Goal</th>
                                        <th style="padding:5px;">Date</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php 
                                                $table ="enquiry";
                                                $data = get_data_id_data_hoho($table,'conversion_status','Cold'); 
                                                show_enquiry_short2($data);
                                         ?>                                    
                                    </tbody>
                                </table>
                                </div>

                              </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Product Categories</h5>
                            <div class="dashboard-donut-chart">
                                <canvas id="categoryChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 col-xl-4 mb-4">
                    <div class="card dashboard-progress">
                        <div class="position-absolute card-top-buttons">
                            <button class="btn btn-header-light icon-button">
                                <i class="simple-icon-refresh"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Profile Status</h5>
                            <div class="mb-4">
                                <p class="mb-2">Basic Information
                                    <span class="float-right text-muted">12/18</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="mb-2">Portfolio
                                    <span class="float-right text-muted">1/8</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="mb-2">Billing Details
                                    <span class="float-right text-muted">2/6</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="mb-2">Interests
                                    <span class="float-right text-muted">0/8</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="mb-2">Legal Documents
                                    <span class="float-right text-muted">1/2</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 col-xl-4">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="card dashboard-small-chart-analytics">
                                <div class="card-body">
                                    <p class="lead color-theme-1 mb-1 value"></p>
                                    <p class="mb-0 label text-small"></p>
                                    <div class="chart">
                                        <canvas id="smallChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mb-4">
                            <div class="card dashboard-small-chart-analytics">
                                <div class="card-body">
                                    <p class="lead color-theme-1 mb-1 value"></p>
                                    <p class="mb-0 label text-small"></p>
                                    <div class="chart">
                                        <canvas id="smallChart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mb-4">
                            <div class="card dashboard-small-chart-analytics">
                                <div class="card-body">
                                    <p class="lead color-theme-1 mb-1 value"></p>
                                    <p class="mb-0 label text-small"></p>
                                    <div class="chart">
                                        <canvas id="smallChart3"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mb-4">
                            <div class="card dashboard-small-chart-analytics">
                                <div class="card-body">
                                    <p class="lead color-theme-1 mb-1 value"></p>
                                    <p class="mb-0 label text-small"></p>
                                    <div class="chart">
                                        <canvas id="smallChart4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <div class="row sortable">
                <div class="col-xl-3 col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <div class="position-absolute handle card-icon">
                                <i class="simple-icon-shuffle"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Profile Status</h6>
                            <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88"
                                data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <div class="position-absolute handle card-icon">
                                <i class="simple-icon-shuffle"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Work Progress</h6>
                            <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88"
                                data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="64" data-show-percent="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <div class="position-absolute handle card-icon">
                                <i class="simple-icon-shuffle"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Tasks Completed</h6>
                            <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88"
                                data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="75" data-show-percent="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <div class="position-absolute handle card-icon">
                                <i class="simple-icon-shuffle"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Payments Done</h6>
                            <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88"
                                data-trailColor="#d7d7d7" aria-valuemax="100" aria-valuenow="32" data-show-percent="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order - Stock</h5>
                            <div class="chart-container">
                                <canvas id="radarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Categories</h5>
                            <div class="chart-container">
                                <canvas id="polarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- 
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sales</h5>
                            <div class="dashboard-line-chart">
                                <canvas id="salesChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </main>

    <?php include 'configs/script_section.php'; ?>
   <?php include'jsplugin.php'; ?>
   
   <script type="text/javascript">
     $(document).ready(function() {
    $('.example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
    </script>

    <script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>
</body>

</html>