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
		$stmt=$pdo->prepare("SELECT membership_period, membership_amount FROM membership_type WHERE id='".$_REQUEST['id']."'");
	   }
	   catch(PDOException $ex){
	   	echo "An Error Occured!";
        print_r($ex->getMessage());
	   }
	   $stmt->execute();
     $user = $stmt->fetch();
      //print_r($user);
      $array_toto["membership_amount"] = $user['membership_amount'];
      $array_toto["membership_period"] = $user['membership_period'];
      $array_toto = json_encode($array_toto);
      echo $array_toto;

	} 
?>