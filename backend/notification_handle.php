<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

    $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    $table = "machine";

     try {
            $stmt = $pdo->prepare('UPDATE `'.$table.'` SET `name`="'.$_REQUEST['machine_name'].'", `quantity`="'.$_REQUEST['quantity'].'", `amount`="'.$_REQUEST['machine_amount'].'", `date`="'.$_REQUEST['date'].'", `remarks`="'.$_REQUEST['remarks'].'" WHERE `id` = '.$id);
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            return ($ex->getMessage());
        }
        $stmt->execute();
    header('Location:view_machine.php?choice=success&value=Machine Updated Successfully.');
    exit();
?>