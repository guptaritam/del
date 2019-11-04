<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);  

   $table = "testimonials";
   $id= $_REQUEST['id'];

   try {
    $stmt = $pdo->prepare('DELETE FROM  '.$table.'  WHERE id = :id');
    } catch(PDOException $ex) {
        echo "An Error occured!".($ex->getMessage()); 
        return ($ex->getMessage());
    }
   $stmt->execute(['id' => $id]);
   add_notification("An Agent has been Deleted", "admin");
   header('Location:view_testimonials.php?choice=success&value=Selected Testimonial has been Deleted Successfully');     
   exit();
?>
