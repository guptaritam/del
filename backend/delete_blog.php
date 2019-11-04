<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php'; 

   $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']); 
   $table = "blog";
   try {
    $stmt = $pdo->prepare('DELETE FROM '.$table.'  WHERE id = :id');
    } catch(PDOException $ex) {
        echo "An Error occured!"; 
        return ($ex->getMessage());
    }
   $stmt->execute(['id' => $id]);
   //add_notification("A Blog has been Deleted", "admin");
   header('Location:view_blog.php?choice=success&value=Selected Blog has been Deleted Successfully');     
?>
