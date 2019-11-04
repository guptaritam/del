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
   $date = $lata['date'];
 
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
               <div class="col-md-6">
                <div class="table-responsive" style="">  
                <table class="table table-striped">

                <tr>  
                     <td width="30%"><label><b>Enquiry Id</b></label></td>  
                     <td width="70%"><?php echo $lata["enquiry_id"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Name</b></label></td>  
                     <td width="70%"><?php echo $lata["name"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Phone</b></label></td>  
                     <td width="70%"><?php echo $lata["phone"] ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Phone2</b></label></td>  
                     <td width="70%"><?php echo $lata["phone2"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Address</b></label></td>  
                     <td width="70%"><?php echo $lata["address"]; ?></td>  
                </tr>
                 <tr>  
                     <td width="30%"><label><b>Occupation</b></label></td>  
                     <td width="70%"><?php echo $lata["occupation"]; ?></td>  
                </tr>
                <tr>  
                     <td width="30%"><label><b>Age</b></label></td>  
                     <td width="70%"><?php echo $lata["age"]; ?></td>  
                </tr>  
                 </table></div>
                    </div>

              <div class="col-md-6">
                <div class="table-responsive" style="">  
                <table class="table table-striped">

                <tr>  
                     <td width="30%"><label><b>Gender</b></label></td>  
                     <td width="70%"><?php
                        $gender = '<label class="badge badge-success">Female</label>';
                                        if($lata['gender']=="Male"){
                                            $gender = '<label class="badge badge-danger">Male</label>';
                                        }
                      echo $gender; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Service</b></label></td>  
                     <td width="70%"><?php echo $lata["service"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Conversion Status</b></label></td>  
                     <td width="70%" style="text-transform:capitalize"><?php echo stutusify($lata["conversion_status"]); ?></td>  
                </tr> 
                <tr>  
                     <td width="30%"><label><b>Purpose</b></label></td>  
                     <td width="70%"><?php echo $lata["purpose"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Date</b></label></td>  
                     <td width="70%"><?php echo $lata["date"]; ?></td>  
                </tr> 
                <tr>  
                     <td width="30%"><label><b>Following By</b></label></td>  
                     <td width="70%" style="color: #7d9ed4; font-size: 15px;"><b><?php echo $lata["following_by"]; ?></b><label class="badge badge-success" data-whatever="<?php echo $lata['id'];?>" data-target="#followUps" data-toggle="modal" data-dismiss="modal">Follow Up Details</label></td>  
                </tr>  
                 </table>
               </div>
             </div>
          </div>


          <div id="followUps" class="modal fade">  
      <div class="modal-dialog" style="margin-left: 150px;">  
           <div class="modal-content" style="width:1000px; ">  
                <div class="modal-header" style="background-color: #2bd1e0; color: #fff;">  
                     <center><h3>Followup Details</h3></center>  
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body" id="followUps_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div> 
 </div> 

    <script src="js/vendor/bootstrap-datepicker.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>

    <script type="text/javascript">

    </script>

    <script>
    $('#followUps').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;
 
            $.ajax({
                type: "GET",
                url: "followup_details.php",
                data: dataString,
                cache: false, 
                success: function (data) {
                    modal.find('#followUps_detail').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
 </script>

</body>
</html>
