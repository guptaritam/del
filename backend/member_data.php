<?php
   session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

   $id = $_GET['id'];
   $lata = get_data_id_data("member", "id", $id);
   $date = $lata['date'];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Bootstrap modal</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<body>
            <div class="row">
                <div class="col-md-2">
                <table class="table table-striped">

                    <?php 
                         $file="member_img/".$lata['member_image'];
                         echo '<img src="'.$file.'" style="width:150px; height:180px; margin-left: 15px;"/>';
                    ?><br><br>
                    
                     <tr>  
                         <td><label><b>Payment Status : </b></label></td>  
                         <td><label class="badge badge-success"><?php echo $lata["payment_status"]; ?></label></td>  
                    </tr>

                </table><br>
                    <label><b>Aadhar Card : </b></label>
                    <input type="file" name="file" id="file">
              </div>

               <div class="col-md-5">
                <div class="table-responsive" style="">  
                <table class="table table-striped">

                <tr>  
                     <td width="30%"><label><b>Name</b></label></td>  
                     <td width="70%"><?php echo $lata["member_name"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Phone</b></label></td>  
                     <td width="70%"><?php echo $lata["phone_number"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>DOB</b></label></td>  
                     <td width="70%"><?php echo $lata["dob"] ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Address</b></label></td>  
                     <td width="70%"><?php echo $lata["address"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Validity From</b></label></td>  
                     <td width="70%"><?php echo $lata["validity_from"]; ?></td>  
                </tr>
                 <tr>  
                     <td width="30%"><label><b>Total Amount</b></label></td>  
                     <td width="70%"><?php echo $lata["total_amount"]; ?>.00</td>  
                </tr>
                <tr>  
                     <td width="30%"><label><b>Membership Type</b></label></td>  
                     <td width="70%"><?php echo $lata["membership_type"]; ?></td>  
                </tr>  

                 </table><br>
                 <label><b>Driving Licence : </b></label>
                    <input type="file" name="file" id="file">
                </div>
              </div>

              <div class="col-md-5">
                <div class="table-responsive" style="">  
                <table class="table table-striped">
                <tr>  
                     <td width="30%"><label><b>Member Id</b></label></td>  
                     <td width="70%"><?php echo $lata["member_id"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Other No.</b></label></td>  
                     <td width="70%"><?php echo $lata["phone_number2"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Age</b></label></td>  
                     <td width="70%"><?php echo $lata["age"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Occupation</b></label></td>  
                     <td width="70%"><?php echo $lata["occupation"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Validity To</b></label></td>  
                     <td width="70%"><?php echo $lata["validity_to"]; ?></td>  
                </tr>  
                 <tr>  
                     <td width="30%"><label><b>Due Amount</b></label></td>  
                     <td width="70%"><?php echo $lata["due_amount"]; ?>.00</td>  
                </tr>
                <tr>  
                     <td width="30%"><label><b>Followed By</b></label></td>  
                     <td width="70%" style="color: #7d9ed4; font-size: 15px;"><b><?php echo $lata["following_by"]; ?></b></td>  
                </tr>

                 </table><br>

                 <label><b>PAN Card : </b></label>
                    <input type="file" name="file" id="file">
               </div>

             </div>
          </div>

            <br>
            <br>
            <br>
            <div class="button" style="text-align: right;">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
             <a href="receipt_print.php?8d1d4357e1e1c6b3e4ea6df4ff01fede=<?php echo base64_encode($lata['id']);?>" style="color:#fff;" target="_blank"><button type="button" class="btn btn-info">Receipt</button></a>
         </div>
        

    <script src="js/vendor/bootstrap-datepicker.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>

    <script type="text/javascript">

       

    </script>

</body>
</html>
 
