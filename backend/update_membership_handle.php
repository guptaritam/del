<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

    $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    $table = "membership_type";

     try {
            $stmt = $pdo->prepare('UPDATE `'.$table.'` SET `membership_name`="'.$_REQUEST['membership_name'].'", `membership_period`="'.$_REQUEST['membership_period'].'", `membership_amount`="'.$_REQUEST['membership_amount'].'", `register_fees`="'.$_REQUEST['register_fee'].'" WHERE `id` = '.$id);
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            return ($ex->getMessage());
        }
        $stmt->execute();
    header('Location:view_membership.php?choice=success&value=Membership Updated Successfully.');
        //view_page('view_membership.php', 'success', 'Enquiry Updated Successfully.');
    exit();
?>