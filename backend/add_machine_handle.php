<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    
    // Server Side Validation Here 
    $datas = array('machine_name', 'quantity', 'machine_amount', 'date', 'remarks');    
    foreach ($datas as $key => $value) {
    	if($_REQUEST[$value]==""){
    		header('location:add_machine.php?choice=error&value='.$value." is Empty.");
    		exit();
    	}
      }

    $table = "machine";
    $key_list = " `name`, `quantity`, `amount`, `date`, `remarks` ";    
    $value_list  = " 
                    '".$_REQUEST['machine_name']."', 
                    '".$_REQUEST['quantity']."', 
                    '".$_REQUEST['machine_amount']."', 
                    '".$_REQUEST['date']."',
                    '".$_REQUEST['remarks']."'";
                     
                    $last = get_last_id($table);
    echo $value_list;
    
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");

    header('Location:view_machine.php?choice=success&value=Machine Added Successfully&8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($last).'&new=New_machine');              
    exit();
?>
