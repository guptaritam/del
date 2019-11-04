<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    
    // Server Side Validation Here 
    $datas = array('date', 'remark', 'status', 'next_date');    
    foreach ($datas as $key => $value) {
    	if($_REQUEST[$value]==""){
    		header('location:add_new_enquiry.php?choice=error&value='.$value." is Empty.");
    		exit();
    	}
    }

    $counts = count_data("enquiry_follow_up", "enquiry_id", $id);
    if($counts>0){
    	 // Update Previous Follow
	    $table = "enquiry_follow_up";    
	    $result = $pdo->exec("UPDATE `".$table."` SET `remark`='".clean($_REQUEST['remark'])."', `status`='".$_REQUEST['status']."' WHERE `date`='".$_REQUEST['date']."'");
    }
    else{
    	// Insert New Row
	    $table = "enquiry_follow_up";
	    $key_list = "`date`, `remark`, `status`, `enquiry_id`"; 
	    $value_list  = "'".$_REQUEST['date']."', 
	    				'".$_REQUEST['remark']."', 
	    				'".clean($_REQUEST['status'])."', 
	    				'".$id."'";    
	    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    }
   
    
    $key_list = "`enquiry_id`, `date`"; 
    $value_list  = "'".$id."',
    				'".$_REQUEST['next_date']."'";	
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");

    
    // Update in enquiry Table also
	$table = "enquiry";    
    $result = $pdo->exec("UPDATE `".$table."` SET `conversion_status`='".clean($_REQUEST['status'])."' WHERE `id`='".$id."'");
    
    
    header('Location:follow_up_enquiry.php?choice=success&value=Enquiry Followup Added Successfully&8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($id));              
    exit();
?>
