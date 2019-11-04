<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

    
   	try{
	   $stmt=$pdo->prepare("SELECT member_id, due_amount FROM member WHERE `".$_REQUEST['search_by']."`='".$_REQUEST['search_q']."'");
    }
   catch(PDOException $ex){
   	echo "An Error Occured!";
    print_r($ex->getMessage());
   }
   $stmt->execute();
   $user = $stmt->fetch();
	
      $array_toto = json_encode($user);
   
   echo $array_toto;
?>