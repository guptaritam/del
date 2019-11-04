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
                    <h1>View Services <a  data-toggle="modal" data-target="#myModal" class="badge badge-success badge-sm" style="font-size: 10px;color: #fff;font-weight: bold;cursor: pointer;">Add New</a></h1>                   
                    <div class="separator mb-5"></div>
                </div>
            </div>


            <div class="row mb-4">

                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <?php see_status2($_REQUEST); ?>
                            <table class="table table-striped ">
                                <thead>
                                    <tr style="border-bottom: solid 1px #eee;background-color: #ebfdff">
                                        <th style="padding:5px;">S.No</th>
                                        <th style="padding:5px;">Service Name</th>
                                        <th style="padding:5px;">Action</th>                                          
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php 
                                            $table ="services";
                                            $data = fetch_all_popo($table);      
                                            $i=1;
                                            foreach ($data as $key => $value) {                                                
                                                echo '<tr>
                                                        <td>'.$i.'</td>
                                                        <td><b>'.$value['service_name'].'</b></td>
                                                        <td>
                                                            <div class="btn-group mb-1">
                                                                <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Action 
                                                                </button>
                                                                <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -106px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a class="dropdown-item" href="delete_new_service.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'" onclick="return confirm(\'Are You Sure You want to Delete This?\')">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>';
                                                    $i++;
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
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">         
          <form method="POST" enctype="multipart/form-data" action="service_handle.php">
              <div class="modal-body">
                <h3>Add New Service Here</h3>
                <hr/>
                <div class="form-group">
                    <label for="service_name" style="font-weight: bold;">Service Name</label>
                    <input type="text" class="form-control" name="service_name" id="service_name" placeholder="Enter Name of Service">
                </div>
                 <button type="submit" class="btn btn-primary mb-0">Add New Service</button>
              </div>
          </form>

        </div>
      </div>
    </div>

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