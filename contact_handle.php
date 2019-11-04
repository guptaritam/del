<?php session_start();
    include 'backend/configs/pdo_class_data.php';
    include 'backend/configs/connection.php';    
    $pdo = new PDO($dsn, $user, $pass, $opt);   
    
   // extract($_REQUEST);
  $table = "contact_data";
  $key_list = "`name`,`email`, `phone`, `remark`";  
  
  $value_list  = "'".$_REQUEST['name']."',";
  $value_list .= "'".$_REQUEST['email']."',";
  $value_list .= "'".$_REQUEST['phone']."',";
  $value_list .= "'".$_REQUEST['message']."'"; 
  
  $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
  header('Location:contact.php?choice=success&value=Your Query has been Recieved Successfully, We will contact you soon');              
  exit();	
?>