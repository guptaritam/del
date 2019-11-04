<?php
   session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

	$id = $_GET['id'];
    $lata = get_data_id_data("enquiry", "id", $id);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Bootstrap modal</title>
</head>

<body>
	<div class="row">
       <div class="col-md-4">
        <div class="card">
         <div class="card-body">
           <div class="modal-body">
                <div class="table-responsive" style="">  
                <table class="table table-striped">

                <tr>  
                     <td width="30%"><label><b>Name</b></label></td>  
                     <td width="70%"><?php echo $lata["name"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Phone</b></label></td>  
                     <td width="70%"><?php echo $lata["phone"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Address</b></label></td>  
                     <td width="70%"><?php echo $lata["address"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>DOB</b></label></td>  
                     <td width="70%"><?php echo $lata["dob"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Gender</b></label></td>  
                     <td width="70%"><?php echo $lata["gender"]; ?></td>  
                </tr>
                <tr>  
                     <td width="30%"><label><b>Followed By</b></label></td>  
                     <td width="70%"><?php echo $lata["following_by"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Date</b></label></td>  
                     <td width="70%"><?php echo $lata["date"]; ?></td>  
                </tr>
                  
                 </table>
               </div>
              </div>
             </div>
            </div>
          </div>

          <div class="col-md-8">
          <div class="card">
           <div class="card-body">
                <h3>All Followups </h3><hr/>

                    <table class="table table-striped">
                      <tr>
                        <th>S.No.</th>
                        <th>Id</th>
                        <th>Followup Dates</th>
                        <th>Remark</th>
                        <th>Status</th>
                      </tr>
                      <?php 
                        $i=1;
                        $value = get_data_col("enquiry_follow_up", "enquiry_id",  $lata['id']);
                        
                        foreach ($value as $key => $value) {
                          $status = '<label class="label label-success">Paid</label>';
                          
                                    echo '<tr>
                                    <td>'.$i.'</td>
                                    <td>'.$value['date'].'</td>  
                                    <td>'.$value['remark'].'</td> 
                                    <td>'.$value['status'].'</td> 
                                  </tr>';
                                  $i++;
                                }
                            ?>

                   </table>
              </div>
             </div>
            </div>
        </div>

    <script src="js/vendor/bootstrap-datepicker.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>

   
    <script type="text/javascript">

        $(document).ready(function() {
        var register_date = "<?php echo $date ?>";
        $('#date').datepicker({
        format: "dd/mm/yyyy",
        startDate: register_date,
        autoclose: true
          });
        $('#date').datepicker('setDate', register_date);
        });

    </script>

</body>
</html>