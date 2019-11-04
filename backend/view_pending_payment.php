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

    <style type="text/css">
        .page-item.disabled .page-link{
            width: 70px;
        }
    </style>
    
</head>

<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>    
    <main>
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h1>View Pending List </h1>                   
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
                            <th style="padding:5px;">Name</th>
                            <th style="padding:5px;">Mobile</th>
                            <th style="padding:5px;">Join Date</th>
                            <th style="padding:5px;">Total Amt</th>
                            <th style="padding:5px;">Paid Amt</th>
                            <th style="padding:5px;">Pending Amt</th>
                            <th style="padding:5px;">Followed By</th>
                            <th style="padding:5px;">Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                        try {
                            $stmt = $pdo->prepare("SELECT * FROM member WHERE `due_amount` > '0' ORDER BY date DESC");

                            } catch(PDOException $ex) {
                                echo "An Error occured!"; 
                                print_r($ex->getMessage());
                            }
                            $stmt->execute();
                            $user = $stmt->fetchAll();

                        foreach ($user as $key => $value) {
                            //$type = get_data_id_data("membership_type", "id", $value['membership_type']);
                           //print_r ($value);
                            echo '<tr>
                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#exampleModal">'.$value['member_id'].'</td>
                                    
                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#exampleModal">'.$value['member_name'].'</td>

                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#exampleModal">'.$value['phone_number'].'</td>

                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#exampleModal">'.$value['validity_from'].'</td>

                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#exampleModal">'.$value['total_amount'].'.00</td>

                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#exampleModal">'.$value['paid_amount']. '.00</td>
                                    
                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#exampleModal" style="color:#0e3087;"><b>'.$value['due_amount'].'.00</b></td>

                                    <td data-whatever='.$value['id'].' data-toggle="modal" data-target="#exampleModal">'.$value['following_by'].'</td>
                                    
                                    <td><a class="btn btn-success btn-xs" data-whatever='.$value['id'].' data-toggle="modal" data-target="#exampleModal"  style="color:#fff;">Pay Now</a> </td>

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

    <div id="exampleModal" class="modal fade">  
      <div class="modal-dialog" style="margin-left: 12px;">  
           <div class="modal-content" style="width:1325px;">  
                <div class="modal-header" style="background-color: #2bd1e0; color: #fff;">  
                     <center><h4>Pay Member</h4></center>  
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body" id="payable_detail">  
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
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;
 
            $.ajax({
                type: "GET",
                url: "add_payment_modal.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    modal.find('#payable_detail').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
 </script>
</body>

</html>
<!-- <td>'.$type['membership_name'].' / '.$type['membership_period'].' days / '.$type['membership_amount'].'</td> -->
