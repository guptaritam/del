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

<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>    
    <main>
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h2>Diet Chart For <b>Weight Loss</b></h2>                   
                    <div class="separator mb-5"></div>
                </div>
            </div>


            <div class="row mb-4">

                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered dataTable" id="sample_1" aria-describedby="sample_1_info">
            <thead>
              <tr role="row" style="background-color: #13cff9; color:#fff;"><th class="center sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Sr.No" style="width: 81px;">Sr.No</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Time: activate to sort column ascending" style="width: 246px;">Time</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 685px;">Description</th></tr>
            </thead>
            
          <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                    <td data-title="Sr.No" class="  sorting_1">1</td>
                    <td data-title="Time" class=" ">Morning 06:30 AM</td>
                    <td data-title="Description" class=" ">1 Glass Hot Water + Lemon</td>
                </tr><tr class="even">
                    <td data-title="Sr.No" class="  sorting_1">2</td>
                    <td data-title="Time" class=" ">Morning 09:00 AM</td>
                    <td data-title="Description" class=" ">1 Glass Milk + 2 ROTI + 1 Spoon Sugar + Green Vegetables</td>
                </tr><tr class="odd">
                    <td data-title="Sr.No" class="  sorting_1">3</td>
                    <td data-title="Time" class=" ">Morning 10:30 AM</td>
                    <td data-title="Description" class=" ">1 Cup Tea</td>
                </tr><tr class="even">
                    <td data-title="Sr.No" class="  sorting_1">4</td>
                    <td data-title="Time" class=" ">Afternoon 1-1:30 PM</td>
                    <td data-title="Description" class=" ">-</td>
                </tr><tr class="odd">
                    <td data-title="Sr.No" class="  sorting_1">5</td>
                    <td data-title="Time" class=" ">Evening 6:00 PM</td>
                    <td data-title="Description" class=" ">-</td>
                </tr><tr class="even">
                    <td data-title="Sr.No" class="  sorting_1">6</td>
                    <td data-title="Time" class=" ">Evening 8-8:30 PM</td>
                    <td data-title="Description" class=" ">-</td>
                </tr><tr class="odd">
                    <td data-title="Sr.No" class="  sorting_1">7</td>
                    <td data-title="Time" class=" ">Night 10:00 PM</td>
                    <td data-title="Description" class=" ">-</td>
                </tr></tbody></table>
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