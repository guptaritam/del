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
     <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include('configs/head_section.php');?>
    
</head>
`
<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>    
    <main>
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h1>View Expenses <a href="notification_sms.php" class="badge badge-success badge-sm" style="font-size: 10px;">Send New</a></h1>                   
                    <div class="separator mb-5"></div>
                </div>
            </div>


            <div class="row mb-4">

                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <?php see_status2($_REQUEST); ?>
                            <table class="table">
                                <thead>
                                    <tr style="border-bottom: solid 1px #eee;background-color: #ebfdff">
                                        <th style="padding:5px;">Name</th>
                                        <th style="padding:5px;">Number</th>
                                        <th style="padding:5px;">Message</th>
                                        <th style="padding:5px;">Status</th>
                                        <th style="padding:5px;">Send By</th
                                        <th style="padding:5px;">Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            $table ="notification";
                                            $data = fetch_all_popo($table);      

                                            foreach ($data as $key => $value) {
                                               //print_r ($value);
                                                echo '<tr>
                                                        <td><b>'.$value['name'].'</b></td>
                                                        <td><b>'.$value['number'].' .00</b></td>
                                                        <td><b>'.$value['message'].'</b></td>
                                                        <td><b>'.$value['status'].'</b></td>
                                                        <td><b>'.$value['send_by'].'</b></td>
                                                        <td><b>'.$value['date'].'</b></td>
                                                    </tr>';
                                            }
                                     ?>                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </main>

    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/perfect-scrollbar.min.js"></script>
    <script src="js/vendor/Sortable.js"></script>
    <script src="js/vendor/mousetrap.min.js"></script>
    <script src="js/vendor/datatables.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>

</body>

</html>