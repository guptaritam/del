<?php session_start();	
	include 'configs/pdo_class_data.php';
	include 'configs/connection.php';
	
	$pdo = new PDO($dsn, $user, $pass, $opt);
	$user = $_REQUEST['email'];
	$pass = $_REQUEST['pass'];

	try {
	    $stmt = $pdo->prepare('SELECT * FROM `login_admin`  WHERE user = :user AND pass=:pass');
	} catch(PDOException $ex) {
	    echo "An Error occured!"; 
	    print_r($ex->getMessage());
	}
	
	$stmt->execute(['user' => $user, 'pass' => $pass]);
	$user = $stmt->fetchAll();
	$row_count = $stmt->rowCount();
	//echo $row_count;
	if($row_count>0){
		$_SESSION['administrator'] = $_REQUEST['email'];
	 	$_SESSION['loged_primitives'] = md5($pass);
	 	header('Location:dashboard.php?choice=success&value=Login Successful, Welcome to Your Own Admin Panel');
	}else
	{
		header('Location:index.php?choice=error&value=Please Relogin, Previous Supplied Credentials Were Wrong');
	}
?>