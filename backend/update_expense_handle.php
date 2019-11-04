<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

    $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    $table = "expense";

     try {
            $stmt = $pdo->prepare('UPDATE `'.$table.'` SET `expense_type`="'.$_REQUEST['expense_type'].'", `expense_amount`="'.$_REQUEST['expense_amount'].'", `paid_by`="'.$_REQUEST['paid_by'].'", `date`="'.$_REQUEST['date'].'", `remarks`="'.$_REQUEST['remarks'].'" WHERE `id` = '.$id);
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            return ($ex->getMessage());
        }
        $stmt->execute();
    header('Location:view_expense.php?choice=success&value=Expense Record Updated Successfully.');
    exit();
?>