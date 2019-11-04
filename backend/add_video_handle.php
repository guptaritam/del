<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
   
    $table = "video";
    $key_list = "`title`, `link`";        
    $value_list  = "'".$_REQUEST['title']."', '".$_REQUEST['link']."'";
    
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    header('Location:view_video.php?choice=success&value=Video Added Successfully');              
    exit();
?>
