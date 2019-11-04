<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

    $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    echo $id;

    $member_type = $_REQUEST['membership_type'];
    $data = get_data_id_data("membership_type", "id", $member_type);
    $type = $data['membership_amount'].'/'.$data['membership_period'];

    $table = "member";

     try {
            $stmt = $pdo->prepare('UPDATE `'.$table.'` SET `membership_type`="'.$type.'", `member_name`="'          .$_REQUEST['full_name'].'", `phone_number`="'.$_REQUEST['phone_number'].'",
                        `phone_number2`="'.$_REQUEST['phone_number2'].'", `occupation`="'.$_REQUEST['occupation'].'", `validity_from`="'.$_REQUEST['validity_from'].'", `validity_to`="'.$_REQUEST['validity_to'].'", `total_amount`="'.$_REQUEST['total_amount'].'", `paid_amount`="'.$_REQUEST['paid_amount'].'", `paid_by`="'.$_REQUEST['paid_by'].'", `receipt_type`="'.$_REQUEST['receipt_type'].'", `following_by`="'.$_REQUEST['followed_by'].'", `remarks`="'.$_REQUEST['remarks'].'", `date`="'.$_REQUEST['date'].'" WHERE `id` = '.$id);

        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            return ($ex->getMessage());
        }
        $stmt->execute();
    header('Location:view_members.php?choice=success&value=Membership Renew Updated Successfully.');
    exit();

?>