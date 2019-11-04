<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

   $table = "contact_data";
   $id= $_REQUEST['id'];
   try {
    $stmt = $pdo->prepare('DELETE FROM  '.$table.'  WHERE id = :id');
    } catch(PDOException $ex) {
        echo "An Error occured!"; 
        return ($ex->getMessage());
    }
   $stmt->execute(['id' => $id]);
   header('Location:view_contact_data.php?choice=success&value=Selected Contact Data  has been Deleted Successfully');     
?>
