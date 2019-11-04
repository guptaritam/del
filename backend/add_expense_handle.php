<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    
     $datas = array('expense_type', 'expense_amount', 'paid_by', 'date', 'remarks');    
    foreach ($datas as $key => $value) {
    	if($_REQUEST[$value]==""){
    		header('location:add_expense.php?choice=error&value='.$value." is Empty.");
    		exit();
    	}
      }

    $table = "expense";
    $key_list = " `expense_type`, `expense_amount`, `paid_by`, `date`, `remarks`";    

    $value_list  = " 
                    '".$_REQUEST['expense_type']."', 
                    '".$_REQUEST['expense_amount'].".00', 
                    '".$_REQUEST['paid_by']."', 
                    '".$_REQUEST['date']."',
                    '".$_REQUEST['remarks']."'";
                     
                    $last = get_last_id($table);
    
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");

    header('Location:view_expense.php?choice=success&value=Expense Added Successfully&8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($last).'&new=New_expense');              
    exit();
?>
