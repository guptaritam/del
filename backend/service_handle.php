<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    
    // Server Side Validation Here 
    if($_REQUEST['service_name']==""){
        header('location:view_services.php?choice=error&value=Service is Empty.');
        exit();
    }

    // Insert Validated Data Here
    $table = "services";
    $key_list = " `service_name`";        
    $value_list  = "'".$_REQUEST['service_name']."'"; 
    //echo "INSERT INTO `$table` ($key_list) VALUES ($value_list)";
    
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    header('Location:view_services.php?choice=success&value=Service Added Successfully');              
    exit();
?>
