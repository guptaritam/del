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
                        `phone_number2`="'.$_REQUEST['phone_number2'].'",`email`="'.$_REQUEST['email'].'",  `gender`="'.$_REQUEST['gender'].'", `dob`="'.$_REQUEST['dob'].'", `state`="'.$_REQUEST['prof_state'].'",`city`="'.$_REQUEST['city'].'", `age`="'.$_REQUEST['age'].'", `address`="'.$_REQUEST['address'].'", `occupation`="'.$_REQUEST['occupation'].'", `marital_status`="'.$_REQUEST['marital_status'].'", `validity_from`="'.$_REQUEST['validity_from'].'", `validity_to`="'.$_REQUEST['validity_to'].'",
                        `reference_from_media`="'.$_REQUEST['reference_from_media'].'", `following_by`="'.$_REQUEST['followed_by'].'", `remarks`="'.$_REQUEST['remarks'].'" WHERE `id` = '.$id);

        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            return ($ex->getMessage());
        }
        $stmt->execute();
    header('Location:view_members.php?choice=success&value=Member Record Updated Successfully.');
    exit();

?>