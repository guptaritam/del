<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    $lata = get_data_id_data("gallery", "id", $id);
   // print_r($lata);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update <?php echo $title; ?></title>
     <?php include 'configs/head_section.php'; ?>
    <!--  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" scr="ckeditor/style.css"> -->
</head>

<body id="app-container" class="menu-default show-spinner">
     <?php include 'configs/navigation.php'; ?>

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Update Gallery</h1>         
                     <button type="submit" class="btn btn-primary mb-0 " form="myform" style="float: right;">Save Changes</button>          
                    <div class="separator mb-5"></div>
                </div>
                <div class="col-sm-3">
                   
                </div>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php see_status2($_REQUEST); ?>
                    <form action="update_gallery_handle.php" method="POST" enctype="multipart/form-data" id="myform">
                      <div class="card-box items">
                        <div style="padding-bottom: 5px;"></div>
                        <div style="padding:10px">
                          <label>Select Gallery Category</label>
                          <select name="category" class="form-control" required="">
                            <option value=""><?php echo $lata['category'];?></option>
                            <?php 
                              $table = "category";
                              $data = fetch_all_popo($table);
                              foreach($lata as $key=>$value){                                 
                                echo '<option>'.$value['category'].'</option>';
                              }           
                          ?>         
                          </select>
                        </div>

                         <div style="padding:10px">
                          <label>Attach Images</label>
                          <input type="file" name="file" placeholder="Attach Image" class="form-control" <?php echo $lata['file'];?>>
                         </div>

                        <div style="padding:10px;"><input type="submit" value="Add Gallery Here " class="btn btn-primary mb-0" /></div>
                     </div>
                    </form>
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
