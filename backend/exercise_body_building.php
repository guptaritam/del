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

     <?php include 'configs/head_section.php'; ?>
    
</head>

<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>    
    <main>
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h2> Exercises For <b>Body Building</b></h2>                   
                    <div class="separator mb-5"></div>
                </div>
            </div>


            <div class="row mb-4">

                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                           
                           <table class="table table-striped table-bordered dataTable" id="sample_1" aria-describedby="sample_1_info">
            <thead>
              <tr role="row" style="background-color: #13cff9; color:#fff;"><th class="center sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Sr.No" style="width: 68px;">Sr.No</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Exercise: activate to sort column ascending" style="width: 367px;">Exercise</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Set1: activate to sort column ascending" style="width: 58px;">Set1</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Set2: activate to sort column ascending" style="width: 58px;">Set2</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Set3: activate to sort column ascending" style="width: 58px;">Set3</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Set4: activate to sort column ascending" style="width: 58px;">Set4</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Intensity: activate to sort column ascending" style="width: 277px;">Intensity</th></tr>
            </thead>
            
          <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                    <td data-title="Sr.No" class="  sorting_1">1</td>
                    <td data-title="Exercise" class=" ">Warm UP(Please refer to the trainer)</td>
                    <td data-title="Set1" class=" ">-</td>
                    <td data-title="Set2" class=" ">-</td>
                    <td data-title="Set3" class=" ">-</td>
                    <td data-title="Set4" class=" ">-</td>
                    <td data-title="Intensity" class=" ">15 Minute Moderate Speed</td>
                </tr><tr class="even">
                    <td data-title="Sr.No" class="  sorting_1">2</td>
                    <td data-title="Exercise" class=" ">Tread Mill / Cross Trainer</td>
                    <td data-title="Set1" class=" ">-</td>
                    <td data-title="Set2" class=" ">-</td>
                    <td data-title="Set3" class=" ">-</td>
                    <td data-title="Set4" class=" ">-</td>
                    <td data-title="Intensity" class=" ">15 Minute Moderate Speed</td>
                </tr><tr class="odd">
                    <td data-title="Sr.No" class="  sorting_1">3</td>
                    <td data-title="Exercise" class=" ">Wall Push Up / Knee Push Up</td>
                    <td data-title="Set1" class=" ">-</td>
                    <td data-title="Set2" class=" ">-</td>
                    <td data-title="Set3" class=" ">-</td>
                    <td data-title="Set4" class=" ">-</td>
                    <td data-title="Intensity" class=" ">15 Minute Moderate Speed</td>
                </tr><tr class="even">
                    <td data-title="Sr.No" class="  sorting_1">4</td>
                    <td data-title="Exercise" class=" ">Assissted Chin Up</td>
                    <td data-title="Set1" class=" ">10</td>
                    <td data-title="Set2" class=" ">10</td>
                    <td data-title="Set3" class=" ">10</td>
                    <td data-title="Set4" class=" ">10</td>
                    <td data-title="Intensity" class=" ">-</td>
                </tr><tr class="odd">
                    <td data-title="Sr.No" class="  sorting_1">5</td>
                    <td data-title="Exercise" class=" ">Dumbell Pullover</td>
                    <td data-title="Set1" class=" ">10</td>
                    <td data-title="Set2" class=" ">10</td>
                    <td data-title="Set3" class=" ">10</td>
                    <td data-title="Set4" class=" ">10</td>
                    <td data-title="Intensity" class=" ">-</td>
                </tr><tr class="even">
                    <td data-title="Sr.No" class="  sorting_1">6</td>
                    <td data-title="Exercise" class=" ">Side Lateral</td>
                    <td data-title="Set1" class=" ">10</td>
                    <td data-title="Set2" class=" ">10</td>
                    <td data-title="Set3" class=" ">10</td>
                    <td data-title="Set4" class=" ">10</td>
                    <td data-title="Intensity" class=" ">-</td>
                </tr><tr class="odd">
                    <td data-title="Sr.No" class="  sorting_1">7</td>
                    <td data-title="Exercise" class=" ">Tricep Dumbells</td>
                    <td data-title="Set1" class=" ">10</td>
                    <td data-title="Set2" class=" ">10</td>
                    <td data-title="Set3" class=" ">10</td>
                    <td data-title="Set4" class=" ">10</td>
                    <td data-title="Intensity" class=" ">-</td>
                </tr><tr class="even">
                   <td data-title="Sr.No" class="  sorting_1">8</td>
                    <td data-title="Exercise" class=" ">Bicep Dumbells</td>
                    <td data-title="Set1" class=" ">10</td>
                    <td data-title="Set2" class=" ">10</td>
                    <td data-title="Set3" class=" ">10</td>
                    <td data-title="Set4" class=" ">10</td>
                    <td data-title="Intensity" class=" ">-</td>
                </tr><tr class="odd">
                    <td data-title="Sr.No" class="  sorting_1">9</td>
                    <td data-title="Exercise" class=" ">Hemoner Dumbells</td>
                    <td data-title="Set1" class=" ">10</td>
                    <td data-title="Set2" class=" ">10</td>
                    <td data-title="Set3" class=" ">10</td>
                    <td data-title="Set4" class=" ">10</td>
                    <td data-title="Intensity" class=" ">-</td>
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