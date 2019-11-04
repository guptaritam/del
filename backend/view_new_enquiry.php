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
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <?php include('configs/head_section.php');?>
    <style>
        
        #show-button { cursor: pointer; }
        #text { cursor: pointer; display: none; }

        /*Some stylings to the buttons*/
        #show-button, #text  { color: #fff; border-radius: 5px; padding: 10px 50px; }
        #show-button { background: #0703af; }
        #text { background: #af2303; }

    </style>
    
</head>

<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>    
    <main>
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h1>View New Enquiry <a href="add_new_enquiry.php" class="badge badge-success badge-sm" style="font-size: 10px;">Add New</a></h1>                   
                    <div class="separator mb-5"></div>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <?php see_status2($_REQUEST); ?>
                            <table id="example">
                             <thead>
                                <tr  style="border-bottom: solid 1px #eee;background-color: #ebfdff">
                                    <th style="padding:5px;">Name</th>
                                    <th style="padding:5px;">Enquiry Id</th>
                                    <th style="padding:5px;">Contact</th>
                                    <th style="padding:5px;">Gender</th>
                                    <th style="padding:5px;">Enquiry For</th>
                                    <th style="padding:5px;">Goal</th>
                                    <th style="padding:5px;">Followed By</th>
                                    <th style="padding:5px;">Actions</th>
                                    <th style="padding:5px;">Action</th>
                                </tr>
                             </thead>
                                <tbody>
                                 <?php 
                                   $table ="enquiry";
                                   $data = fetch_all_popo($table);      
                                    foreach ($data as $key => $value) {
                                      $pata = get_data_id_data("member", "enquiry_id", $value['enquiry_id']);
                                        if($pata==""){
                                            $button = '<a href="make_member.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'"  class="btn btn-success btn-xs  style="color:#fff;">Make Member</a>';
                                        }
                                        else{
                                            $button = '<button class="btn btn-danger btn-xs" style="text-transform:capitalize;">Joined</button>';
                                        }
                                            
                                        $gender = '<label class="badge badge-success">Female</label>';
                                        if($value['gender']=="Male"){
                                            $gender = '<label class="badge badge-danger">Male</label>';
                                        }
                                        echo '<tr>
                                                <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal"><b style="text-transform:capitalize">'.$value['name'].'</b><br/> '.stutusify($value['conversion_status']).'</td>
                                                 <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal"><b>'.$value['enquiry_id'].'</b></td>
                                                <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$value['phone'].'<br/>'.$value['address'].'</td>
                                                <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$gender.'</td>
                                                <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$value['service'].' </td>
                                                <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$value['purpose'].'</td>
                                                <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$value['following_by'].'</td>
                                                <td>
                                        <div class="btn-group mb-1">
                                            <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="glyph-icon iconsminds-gear"></i>
                                            </button>
                                            <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(-82px, -94px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="update_new_enquiry.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'">Update</a>
                                                <a class="dropdown-item" href="delete_new_enquiry.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'" onclick="return confirm(\'Are You Sure You want to Delete This?\')">Delete</a>
                                                </div>
                                            </div>
                                         </td>
                                                <td><center>'.$button.'</center></td>
                                                
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

    <div id="dataModal" class="modal fade">  
      <div class="modal-dialog" style="margin-left: 280px;">  
           <div class="modal-content" style="width:800px; ">  
                <div class="modal-header" style="background-color: #2bd1e0; color: #fff;">  
                     <center><h3>Enquiry Member Details</h3></center>  
                  <button type="button" class="close" data-dismiss="modal"  >&times;</button>
                </div>  
                <div class="modal-body" id="enquiry_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
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

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript">
     $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

<script>
    $('#dataModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;
 
            $.ajax({
                type: "GET",
                url: "enquiry_data.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    modal.find('#enquiry_detail').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
 </script>

 <script>
     $( "#header-plugin" ).load( "https://vivinantony.github.io/header-plugin/", function() {
    $("a.back-to-link").attr("href", "http://blog.thelittletechie.com/2014/06/how-to-make-button-disappear-onclick.html#tlt")  
    });

      $(document).ready(function() {
      $("#show-button").click(function () {
       $("#text").show()
       $("#show-button").hide()
      });
 
   });
 </script>

</body>

</html>

<!-- <td><a href="add_member.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'"><button type="button" class="badge badge-primary">Make Member</button></a></td> -->