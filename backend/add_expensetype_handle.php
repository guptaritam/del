<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    
    // Server Side Validation Here 
    // $datas = array('expense_group', 'expense_type');    
    // foreach ($datas as $key => $value) {
    // 	if($_REQUEST[$value]==""){
    // 		header('location:add_expense_type.php.php?choice=error&value='.$value." is Empty.");
    // 		exit();
    // 	}
    //   }

    $table = "expense_type";
    $key_list = "`expensetype_name`";    

    $value_list  = " 
                    '".$_REQUEST['expense_type']."'";
                     
                    $last = get_last_id($table);
    
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");

    header('Location:view_expensetype.php?choice=success&value=Expense Type Added Successfully&8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($last).'&new=New_expensetype');              
    exit();
?>
