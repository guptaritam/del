<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

    $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    $table = "payment";
     try {
            $stmt = $pdo->prepare('UPDATE `'.$table.'` SET `pay_amount`="'.$_REQUEST['pay_amount'].'", `paid_by`="'.$_REQUEST['paid_by'].'", `receipt_by`="'.$_REQUEST['receipt_type'].'", `date`="'.$_REQUEST['payment_date'].'", `remarks`="'.$_REQUEST['remarks'].'" WHERE `id` = '.$id);
            
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            return ($ex->getMessage());
        }
        $stmt->execute();
    // header('Location:view_new_enquiry.php?choice=success&value=Enquiry Updated Successfully.');
        view_page('view_payment_list.php', 'success', 'Payment Updated Successfully.');
    exit();
?>