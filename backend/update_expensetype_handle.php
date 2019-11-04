<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

    $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    $table = "expense_type";

     try {
            $stmt = $pdo->prepare('UPDATE `'.$table.'` SET `expensetype_name`="'.$_REQUEST['expense_type'].'" WHERE `id` = '.$id);
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            return ($ex->getMessage());
        }
        $stmt->execute();
    header('Location:view_expensetype.php?choice=success&value=Expense Type Updated Successfully.');
    exit();
?>