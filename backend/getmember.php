<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

    $array_toto = array();

if($_REQUEST['id']) {
	$id = $_REQUEST['id'];
	//echo $id;
	try{
		$stmt=$pdo->prepare("SELECT member_id, due_amount FROM member WHERE id='".$_REQUEST['id']."'");
	   }
	   catch(PDOException $ex){
	   	echo "An Error Occured!";
        print_r($ex->getMessage());
	   }
	   $stmt->execute();
       $user = $stmt->fetch();
		// echo json_encode($user);
		 //print_r($user);
      $array_toto["due_amount"] = $user['due_amount'];
      $array_toto["member_id"] = $user['member_id'];

      $array_toto = json_encode($array_toto);
      echo $array_toto;
	} 
?>