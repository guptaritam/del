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

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>   

    <main>
<div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h1>View Testimonials <a href="add_testimonials.php" class="badge badge-success badge-sm" style="font-size: 10px;">Add New</a></h1>                   
                    <div class="separator mb-5"></div>
                </div>
            </div>


            <div class="row mb-4">

                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <?php see_status2($_REQUEST); ?>
                            <table id="datatable-buttons">
                          <thead>
                             <tr style="border-bottom: solid 1px #eee;background-color: #ebfdff">
                               <th>S.No</th>
                               <th>Thumbnail</th>
                                <th>Title</th>                               
                               <th>Date </th>
                               <th>Action</th>                              
                             </tr>
                          </thead>
                          <tbody>
                            <?php 
                            try {
                                  $stmt = $pdo->prepare('SELECT * FROM `testimonials`   ORDER BY date DESC');
                              } catch(PDOException $ex) {
                                  echo "An Error occured!"; 
                                  print_r($ex->getMessage());
                              }
                              $stmt->execute();
                              $user = $stmt->fetchAll();   
                              $i=1; 
                              foreach ($user as $key => $value) {
                       //print_r ($value);
                        echo '<tr>
                                    <td>'.$i.'</td>
                                <td><img src="testimonials/opt/'.$value['file'].'" style="width:50px"/></td>
                                <td><label class="label label-success">'.$value['title'].'</label><br/> '.$value['desc'].'</td>

                                <td>'.$value['date'].'</td>

                                <th><a href="delete_testimonials.php?id='.$value['id'].'"><button class="btn btn-danger btn-sm">Delete</button></a>  </th>                        
                                  </tr>
                                
                                <td>
                                    
                                        <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -106px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="update_staff.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'">Update</a>
                                            <a class="dropdown-item" href="delete_staff.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'" onclick="return confirm(\'Are You Sure You want to Delete This?\')">Delete</a>
                                             
                                    </div>
                                </td>
                            </tr>';
                                 $i++;         
                                   }
                          ?>                    
                        </tbody>
                      </table>
                    </div>
                </div><!-- end col-->

                
            </div>
           

        </div>..... <!-- container -->

    </div> <!-- content -->


</main>

<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->



 <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/perfect-scrollbar.min.js"></script>
    <script src="js/vendor/Sortable.js"></script>
    <script src="js/vendor/mousetrap.min.js"></script>
    <script src="js/vendor/datatables.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

         <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                //"bPaginate":false,

                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });

    </script>
  </body>
  </html>
