<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    
    // Server Side Validation Here 
    // $datas = array('search_name', 'pay_amount', 'pay_type', 'receipt_type', 'payment_date', 'remarks');    
    // foreach ($datas as $key => $value) {
    // 	if($_REQUEST[$value]==""){
    // 		header('location:add_payment.php?choice=error&value='.$value." is Empty.");
    // 		exit();
    // 	}
    //   }

       $table = "supplement_product";
    $key_list = " `product_name`, `brand_name`";    

    $value_list  = "'".$_REQUEST['product_name']."', 
                    '".$_REQUEST['brand_name']."'";
                     
                    $last = get_last_id($table);
    
    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");

    header('Location:add_supplement.php?choice=success&value=Product Added Successfully&8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($last).'&new=New_product');              
    exit();
?>
