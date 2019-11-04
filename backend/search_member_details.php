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

	try{
		$stmt=$pdo->prepare("SELECT name, phone, phone2, address, occupation, dob, age, reference_from_media FROM enquiry WHERE id='".$_REQUEST['id']."'");
	   }
	   catch(PDOException $ex){
	   	echo "An Error Occured!";
        print_r($ex->getMessage());
	   }
	   $stmt->execute();
     $user = $stmt->fetch();
      //print_r($user);
      $array_toto["name"] = $user['name'];
      $array_toto["phone"] = $user['phone'];
      $array_toto["phone2"] = $user['phone2'];
      $array_toto["address"] = $user['address'];
      $array_toto["occupation"] = $user['occupation'];
      $array_toto["dob"] = $user['dob'];
      $array_toto["age"] = $user['age'];
      $array_toto["reference_from_media"] = $user['reference_from_media'];
      $array_toto = json_encode($array_toto);
      echo $array_toto;

	} 
?>