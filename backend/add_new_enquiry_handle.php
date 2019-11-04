<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    
    // Server Side Validation Here 
    // $datas = array('enquiry_for', 'goal', 'name', 'phone', 'address', 'occupation', 'age', 'gender', 'had_gym_before', 'any_health_issue', 'reference_from_media', 'date');    
    // foreach ($datas as $key => $value) {
    //     if($_REQUEST[$value]==""){
    //         header('location:add_new_enquiry.php?choice=error&value='.$value." is Empty.");
    //         exit();
    //     }
    //   }

    $checkbox = $_REQUEST['enquiry_for'];
    $value = implode(",", $checkbox);

    $checkbox1 = $_REQUEST['goal'];
    $value1 = implode(",", $checkbox1);

    $table = "enquiry";

    $last = get_last_id($table);
    $last_plus = $last + 1;
    $be = str_pad($last_plus, 4, '0', STR_PAD_LEFT);
    $prefix = "ENQ".$be; 
    
    $key_list = " `enquiry_id`, `name`, `phone`, `phone2`, `address`, `occupation`, `dob`,  `age`, `gender`, `had_gym_before`, `issue_with_previous_gym`, `any_health_issue`, `health_issue`, `purpose`, `service`, `reference_from_media`, `following_by`, `date`";    

    $value_list  = "'".$prefix."',
                    '".$_REQUEST['name']."', 
                    '".$_REQUEST['phone']."', 
                    '".$_REQUEST['phone2']."', 
                    '".clean($_REQUEST['address'])."', 
                    '".$_REQUEST['occupation']."', 
                    '".$_REQUEST['dob']."', 
                    '".$_REQUEST['age']."', 
                    '".$_REQUEST['gender']."', 
                    '".$_REQUEST['had_gym_before']."', 
                    '".clean($_REQUEST['issue_with_previous_gym'])."', 
                    '".$_REQUEST['any_health_issue']."', 
                    '".clean($_REQUEST['health_issue'])."', 
                    '".$value1."',
                    '".$value."', 
                    '".$_REQUEST['reference_from_media']."',
                    '".$_REQUEST['followed_by']."',
                    '".$_REQUEST['date']."'";
                    
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
   

    // Insert Validated Data Here 

     //$last1 = get_last_member_id($table);

    $table = "enquiry_follow_up";
    $key_list = "`enquiry_id`, `date`"; 
    $value_list  = "'".$last_plus."',
                    '".date("d-m-Y")."'";       
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");

    header('Location:follow_up_enquiry.php?choice=success&value=Enquiry Added Successfully&8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($last_plus).'&new=New_enquiry');              
    exit();
?>
