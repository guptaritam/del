<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

    $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    echo $id;
    $enquiry_for = $_REQUEST['enquiry_for'];
    $enquiry_for = implode(",", $enquiry_for);

    $goal = $_REQUEST['goal'];
    $goal = implode(",", $goal);

    $table = "enquiry";
     try {
            $stmt = $pdo->prepare('UPDATE `'.$table.'` SET 
                `name`="'.$_REQUEST['name'].'",
                `service`="'.$enquiry_for.'",
                `purpose`="'.$goal.'",
                `phone`="'.$_REQUEST['phone'].'",
                `phone2`="'.$_REQUEST['phone2'].'",
                `address`="'.$_REQUEST['address'].'",
                `occupation`="'.$_REQUEST['occupation'].'",
                `gender`="'.$_REQUEST['gender'].'",
                `dob`="'.$_REQUEST['dob'].'",
                `age`="'.$_REQUEST['age'].'",
                `had_gym_before`="'.$_REQUEST['had_gym_before'].'",
                `issue_with_previous_gym`="'.$_REQUEST['issue_with_previous_gym'].'",
                `any_health_issue`="'.$_REQUEST['any_health_issue'].'",
                `health_issue`="'.$_REQUEST['health_issue'].'",
                `date`="'.$_REQUEST['date'].'" WHERE `id` = '.$id);
           
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            return ($ex->getMessage());
        }
        $stmt->execute();
    // header('Location:view_new_enquiry.php?choice=success&value=Enquiry Updated Successfully.');
        view_page('view_new_enquiry.php', 'success', 'Enquiry Updated Successfully.');
    exit();
?>