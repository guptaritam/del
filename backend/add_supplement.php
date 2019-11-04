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
            <div class="row">
                <div class="col-12">
                    <h1>New Product</h1>                   
                    <div class="separator mb-5"></div>

                </div>
            </div>

            <div class="row">

                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Basic Informations</h5>
                            <form action="add_supplement_handle.php" method="POST" onsubmit="return validate_input();">

                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" id="product_name" aria-describedby="emailHelp" placeholder="Enter Product Name" required="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Enter Brand Name" required="">
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Add New Product</button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <?php see_status2($_REQUEST); ?>
                            <table class="table">
                                <thead>
                                    <tr style="border-bottom: solid 1px #eee;background-color: #ebfdff">
                                        <th style="padding:5px;">Product Name</th>
                                        <th style="padding:5px;">Brand Name</th>
                                        <th style="padding:5px;">Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                            $table ="supplement_product";
                                            $data = fetch_all_popo($table);      

                                            foreach ($data as $key => $value) {
                                                echo '<tr>
                                                        <td><b>'.$value['product_name'].'</b></td>
                                                        <td><b>'.$value['brand_name'].'</b></td>
                                                        
                                                        <td>
                                                            <div class="btn-group mb-1">
                                                                <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="glyph-icon iconsminds-gear"></i>
                                                                </button>
                                                                <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -106px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a class="dropdown-item" href="update_supplement.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'">Update</a>
                                                                    <a class="dropdown-item" href="delete_supplement.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'" onclick="return confirm(\'Are You Sure You want to Delete This?\')">Delete</a>
                                                                     
                                                                </div>
                                                            </div>
                                                        </td>
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
    <script src="js/vendor/moment.min.js"></script>
    <script src="js/vendor/fullcalendar.min.js"></script>
    <script src="js/vendor/perfect-scrollbar.min.js"></script>
    <script src="js/vendor/bootstrap-notify.min.js"></script>
    <script src="js/vendor/select2.full.js"></script>
    <script src="js/vendor/bootstrap-datepicker.js"></script>
    <script src="js/vendor/dropzone.min.js"></script>
    <script src="js/vendor/bootstrap-tagsinput.min.js"></script>
    <script src="js/vendor/nouislider.min.js"></script>
    <script src="js/vendor/jquery.barrating.min.js"></script>
    <script src="js/vendor/cropper.min.js"></script>
    <script src="js/vendor/typeahead.bundle.js"></script>
    <script src="js/vendor/mousetrap.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>

</body>

</html>