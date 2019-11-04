<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
   
    $table = "blog_category";
    $key_list = "`category`";        
    $value_list  = "'".$_REQUEST['category_name']."'";
    
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    header('Location:view_blog_category.php?choice=success&value=Blog Category Added Successfully');              
    exit();
?>
