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
    
</head>

<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>    
    <main>
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h1>View Members <a href="add_member.php" class="badge badge-success badge-sm" style="font-size: 10px;">Add New</a></h1>                   
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
                            <th style="padding:5px;">Member Id</th>
                            <th style="padding:5px;">Member</th>
                            <th style="padding:5px;">Name</th>
                            <th style="padding:5px;">Mobile</th>
                            <th style="padding:5px;">Date</th>
                            <th style="padding:5px;">Package</th>
                            <th style="padding:5px;">Paid</th>
                            <th style="padding:5px;">Pending</th>
                            <th style="padding:5px;">Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // $table = "member";
                                // $data = fetch_all_popo($table);
                          try {
                                  $stmt = $pdo->prepare('SELECT * FROM `member`');
                              } catch(PDOException $ex) {
                                  echo "An Error occured!"; 
                                  print_r($ex->getMessage());
                              }
                              $stmt->execute();
                              $user = $stmt->fetchAll();  

                        foreach ($user as $key => $value) {
                            // $type = get_data_id_data("membership_type", "id", $value['membership_type']);
                           //print_r ($value);
                                     $due = $value['due_amount'] ;
                                      if($due>0){
                                        $tab = $value['due_amount'].'.00.';
                                      }
                                      else{
                                        $tab = '<label class="badge badge-success">Paid</label>';
                                      }
                                    
                                echo  '<tr>
                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$value['member_id'].'</td>

                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal"><img src="member_img/opt/'.$value['member_image'].'" style="width:50px"/></td>

                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$value['member_name'].'</td>

                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$value['phone_number'].'</td>

                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$value['date'].'</td>

                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal">'.$value['membership_type'].'</td>

                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal1">'.$value['paid_amount']. '.00</td>

                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#dataModal1" style="color:#0e3087;"><b>'.$tab.'</b></td>
                                    
                                    <td>
                                        <div class="btn-group mb-1">
                                            <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="glyph-icon iconsminds-gear"></i>
                                            </button>
                                            <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -106px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="update_member.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'">Update</a>
                                                <a class="dropdown-item" href="delete_member.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'" onclick="return confirm(\'Are You Sure You want to Delete This?\')">Delete</a>
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

    <div id="dataModal" class="modal fade">  
      <div class="modal-dialog" style="margin-left: 85px;">  
           <div class="modal-content" style="width:1200px; ">  
                <div class="modal-header" style="background-color: #2bd1e0; color: #fff;">  
                     <center><h4>Member Details</h4></center>  
                  <button type="button" class="close" data-dismiss="modal"  >&times;</button>
                </div>  
                <div class="modal-body" id="member_detail">  
                </div>  
           </div>  
      </div> 
    </div> 

 <div id="dataModal1" class="modal fade">  
      <div class="modal-dialog" >  
           <div class="modal-content">  
                <div class="modal-header" style="background-color: #2bd1e0; color: #fff;">  
                     <center><h4>Member Pay</h4></center>  
                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>  
                <div class="modal-body" id="member_detail1">  
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
                url: "member_data.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    modal.find('#member_detail').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
        })
  </script>

  <script>
    $('#dataModal1').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;
 
            $.ajax({
                type: "GET",
                url: "member_pay_modal_handle.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    modal.find('#member_detail1').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
        })
 </script>

</body>

</html>