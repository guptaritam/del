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
                    <h1>Sales History </h1>                   
                    <div class="separator mb-5"></div>
                </div>
            </div>

                        <form method="POST">
                     <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="paid_amount" style="font-weight: bold;">Filter By Date</label><br/>
                                    <label>From :</label>
                                    <input type="text" class="form-control datepicker" name="from_date" id="from_date" placeholder="Choose From Date">
                                </div>
                            </div>

                                    <div class="col-sm-3"><br>
                                <div class="form-group" style="margin-top: 8px;">
                                    <label>To :</label>
                                    <input type="text" class="form-control datepicker" name="to_date" id="to_date" placeholder="Choose To Date">
                                </div>
                            </div>

                            <div class="col-sm-3" style="margin-top:34px;"><br>
                            <input type="button" name="filter" id="filter" class="btn btn-success" value="Search" >
                        </div>
                            </div>
                                </form>
                       <!--  <div id="purchase_order">
                        </div> -->

            <div class="row mb-4">

                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <?php see_status2($_REQUEST); ?>
                            <div id="order_table">
                            <table id="example">
                                <thead>
                                    <tr style="border-bottom: solid 1px #eee;background-color: #ebfdff">
                                        <th style="padding:5px;">Member Id</th>
                                        <th style="padding:5px;">Name</th>
                                        <th style="padding:5px;">Mobile</th>
                                        <th style="padding:5px;">Date</th>
                                        <th style="padding:5px;">Package</th>
                                        <th style="padding:5px;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            $table ="member";
                                            try{
                                                $stmt = $pdo->prepare("SELECT * FROM member ORDER BY date DESC");
                                            } catch(PDOException $ex){
                                                echo "An Error occured!"; 
                                                print_r($ex->getMessage());
                                            }     
                                            $stmt->execute();
                                            $user = $stmt->fetchAll();

                                            foreach ($user as $key => $value) {
                                                $ex = $value['membership_type'];
                                                $exp = explode("/", $ex);
                                                $package = $exp[0] ."-".$exp[2];
                                               print_r ($exp);
                                                echo '<tr>
                                                        <td>'.$value['member_id'].'</td>

                                                        <td>'.$value['member_name'].'</td>

                                                        <td>'.$value['phone_number'].'</td>

                                                        <td>'.$value['date'].'</td>

                                                        <td>'.$package.'</td>

                                                        <td>'.$exp[1].'.00</td>


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


        </div>
    </main>

   <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap-datepicker.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/perfect-scrollbar.min.js"></script>
    <script src="js/vendor/Sortable.js"></script>
    <script src="js/vendor/mousetrap.min.js"></script>
    <script src="js/vendor/datatables.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>

        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
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
      $(document).ready(function(){  

           $('#filter').click(function(){  
            alert("1");
                var from_date = $('#from_date').val();  
                alert(from_date);
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>



</body>

</html>