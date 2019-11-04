<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

   $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']); 
   $table = "category";
   try {
    $stmt = $pdo->prepare('DELETE FROM  '.$table.'  WHERE id = :id');
    } catch(PDOException $ex) {
        echo "An Error occured!"; 
        return ($ex->getMessage());
    }
   $stmt->execute(['id' => $id]);
   header('Location:view_gallery_category.php?choice=success&value=Selected Gallery has been Deleted Successfully');     
?>
