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
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
</head>

<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>    
    <main>
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h1>View Payments <a href="add_payment.php" class="badge badge-success badge-sm" style="font-size: 10px;">Add New</a></h1>                   
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <?php see_status2($_REQUEST); ?>
                            <table id="example1">
                                <thead>
                                  <tr style="border-bottom: solid 1px #eee;background-color: #ebfdff">
                                   
                                        <th style="padding:5px;">Member Id</th>
                                        <th style="padding:5px;">Amount</th>
                                        <th style="padding:5px;">Payment Type</th>
                                        <th style="padding:5px;">Date</th>
                                        <th style="padding:5px;">Receipt Type</th>
                                        <th style="padding:5px;">Remarks</th>
                                        <th style="padding:5px;">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    try {
                                     $stmt = $pdo->prepare("SELECT * FROM payment ORDER BY date DESC");

                                        } catch(PDOException $ex) {
                                            echo "An Error occured!"; 
                                            print_r($ex->getMessage());
                                        }
                                        $stmt->execute();
                                        $user = $stmt->fetchAll();
                                            // $table ="payment";
                                            // $data = fetch_all_popo($table);      

                                            foreach ($user as $key => $value) {
                                               //print_r ($value);
                                             echo '<tr id="example">
                                                    <td><a href="payment_details.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'" target="_blank"><b>'.$value['member_id'].'</b></a></td>

                                                    <td><a href="payment_details.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'"  target="_blank">'.$value['pay_amount'].'.00</a></td>

                                                    <td><a href="payment_details.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'"  target="_blank">'.$value['paid_by'].'</a></td>

                                                    <td><a href="payment_details.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'"  target="_blank">'.$value['date'].'</a></td>

                                                    <td><a href="payment_details.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'"  target="_blank">'.$value['receipt_type'].'</a></td>

                                                    <td><a href="payment_details.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'"  target="_blank">'.$value['remarks'].'</a></td>
                                                    <td>
                                                     <div class="btn-group mb-1">
                                                        <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="glyph-icon iconsminds-gear"></i>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -106px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            
                                                            <a class="dropdown-item" href="delete_payment.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'" onclick="return confirm(\'Are You Sure You want to Delete This?\')">Delete</a>

                                                            <a class="dropdown-item" target="_blank" href="payment_details.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'" >Print</a>
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
      <div class="modal-dialog" style="margin-left: 78px;">  
           <div class="modal-content" style="width:1200px; ">  
                <div class="modal-header" style="background-color: #2bd1e0; color: #fff;">  
                     <center><h4>Payment Details</h4></center>  
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body" id="payment_detail">  
                </div>  
                  
           </div>  
      </div> 
    </div>

    <?php include 'jsplugin.php';?>
    
    <script type="text/javascript">
                $(document).ready(function() {
            $('#example1').DataTable( {
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
                url: "view_payment_modal.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    modal.find('#payment_detail').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
 </script>

 <script type="text/javascript">
     
        $(document).on('click', '#example tr', function(e) {
        var href = $(this).find("a").attr("href");

        window.location=href;
        });

 </script>

    

</body>

</html>
