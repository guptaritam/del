<?php
   session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

	$id = $_GET['id'];
	$lata = get_data_id_data("contact_data", "id", $id);
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
                <div class="table-responsive" style="">  
                <table class="table table-striped">

                <tr>  
                     <td width="30%"><label><b>Name</b></label></td>  
                     <td width="70%"><?php echo $lata["name"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Email Id</b></label></td>  
                     <td width="70%"><?php echo $lata["email"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Phone</b></label></td>  
                     <td width="70%"><?php echo $lata["phone"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Remark</b></label></td>  
                     <td width="70%"><?php echo $lata["remark"]; ?></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label><b>Date</b></label></td>  
                     <td width="70%"><?php echo $lata["date"]; ?></td>  
                </tr>
                  
                 </table>
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