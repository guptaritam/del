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

    <style>

        #myImg {
          border-radius: 5px;
          cursor: pointer;
          transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal1 {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
          text-align: center;
          color: #ccc;
          padding: 10px 0;
          height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {  
          -webkit-animation-name: zoom;
          -webkit-animation-duration: 0.6s;
          animation-name: zoom;
          animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
          from {-webkit-transform:scale(0)} 
          to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
          from {transform:scale(0)} 
          to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
          position: absolute;
          top: 15px;
          right: 35px;
          color: #f1f1f1;
          font-size: 40px;
          font-weight: bold;
          transition: 0.3s;
        }

        .close:hover,
        .close:focus {
          color: #bbb;
          text-decoration: none;
          cursor: pointer;
        }

        @media only screen and (max-width: 700px){
          .modal-content {
            width: 100%;
          }
        }
</style>

    <?php include('configs/head_section.php');?>
    
</head>

<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>    
    <main>
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h1>View Staffs <a href="add_staff.php" class="badge badge-success badge-sm" style="font-size: 10px;">Add New</a></h1>                   
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
                                  <tr style="border-bottom: solid 1px #eee;background-color: #ebfdff">
                                        <th style="padding:5px;">Staff Id</th>
                                        <th style="padding:5px;">Name</th>
                                        <th style="padding:5px;">Contact</th>
                                        <th style="padding:5px;">Salary</th>
                                        <th style="padding:5px;">Joining Date</th>
                                        <th style="padding:5px;">Status</th>
                                        <th style="padding:5px;">Image</th>
                                        <th style="padding:5px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i='';
                                    $table ="staff";
                                    $data = fetch_all_popo($table);      

                                    foreach ($data as $key => $value) {
                                       //print_r ($value);
                                        echo '<tr>
                                                <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$value['staff_id'].'</td>

                                                <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal" style="text-transform:capitalize">'.$value['name'].'</td>

                                                <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$value['mobile'].'</td>

                                                <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal"><b>'.$value['salary'].'.00</b></td>

                                                <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$value['joining_date'].'</td>

                                                <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal"><label class="badge badge-success">'.$value['status'].'</label></td>

                                                <td><img id="myImg" src="staff_gallery/thumb/'.$value['upload_img'].'" style="width:50px"/></td>
                                                
                                                <td>
                                                    <div class="btn-group mb-1">
                                                        <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="glyph-icon iconsminds-gear"></i>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -106px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a class="dropdown-item" href="update_staff.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'">Update</a>
                                                            <a class="dropdown-item" href="delete_staff.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'" onclick="return confirm(\'Are You Sure You want to Delete This?\')">Delete</a>
                                                             
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

    <!-- <div id="myModal" class="modal1">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div> -->

    <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header" style="background-color: #2bd1e0; color: #fff;">  
                     <center><h4>Staff Details</h4></center>  
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body" id="staff_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div> 
    </div>

    <?php include 'jsplugin.php';?>

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
                url: "view_staff_modal.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    modal.find('#staff_detail').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
 </script>

 <!-- <script>
        var modal = document.getElementById("myModal");

        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal1.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() { 
          modal1.style.display = "none";
        }
</script> -->


</body>

</html>