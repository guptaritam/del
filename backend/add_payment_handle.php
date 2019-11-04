<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    
    $member_id = $_REQUEST['member_id'];
    echo $member_id;
    $lata = get_data_id_data("member", "id", $member_id);
    print_r($lata);

    if($_REQUEST['pay_amount']<1){
        header('Location:add_payment.php?choice=error&value=Amount cant be Less than Rs 1');
        exit();
    }

        $table2 ="member";
        try {
            $stmt1 = $pdo->prepare("SELECT paid_amount FROM `$table2` WHERE member_id='".$_REQUEST['member_id']."'");
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            print_r($ex->getMessage());
        }
         $stmt1->execute();
         $user = $stmt1->fetch();
         $array['paid_amount'] = $user['paid_amount'];
         $paii = $array['paid_amount'];





        $paid_amt = $_REQUEST['pay_amount'];
        $pending_amt = $_REQUEST['pending_amount'];
        $afterpay = $pending_amt - $paid_amt;
        $paid_plus = $paii + $paid_amt; 

        if($afterpay==0){
            try {
            $stmt2 = $pdo->prepare("UPDATE `member` SET paid_amount = '".$paid_plus."', due_amount='".$afterpay."', payment_status = 'paid' WHERE member_id ='".$_REQUEST['member_id']."'");
         } catch(PDOException $ex) {
            echo "An Error occured!"; 
            print_r($ex->getMessage());
         }
       $stmt2->execute();
        }else{
            try {
            $stmt2 = $pdo->prepare("UPDATE `member` SET paid_amount = '".$paid_plus."', due_amount='".$afterpay."' WHERE member_id ='".$_REQUEST['member_id']."'");
         } catch(PDOException $ex) {
            echo "An Error occured!"; 
            print_r($ex->getMessage());
         }
       $stmt2->execute();
        }
        
        






        $table = "payment";
        $key_list = " `member_id`, `pay_amount`, `paid_by`, `receipt_type`, `date`, `remarks`";    
        $value_list  = "'".$member_id."',
                    '".$paid_amt."', 
                    '".$_REQUEST['paid_by']."', 
                    '".$_REQUEST['receipt_type']."', 
                    '".$_REQUEST['date']."', 
                    '".$_REQUEST['remarks']."'";
                     
                    $last = get_last_id($table);
        $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
        header('Location:view_payment_list.php?id='.$lata['id'].'choice=success&value=Payment Added Successfully'); 
        exit();
?>
