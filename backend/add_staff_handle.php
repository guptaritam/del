<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    include 'resize_image.php';

    $target_dir = "staff_gallery/";
    $mota =  date("U").basename($_FILES["upload_img"]["name"]);
    $target_file = $target_dir .$mota;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        header('Location:add_staff.php?choice=success&value=Sorry File Already Exist');
        exit();
    }
    // Check file size
    if ($_FILES["upload_img"]["size"] > 500000000) {
        header('Location:add_staff.php?choice=success&value=Sorry File too Large ');
        exit();
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"  && $imageFileType != "pdf") {
      header('Location:add_staff.php?choice=success&value=Sorry, only JPG, JPEG, PNG & GIF files are allowed.');       
        exit();
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
         header('Location:add_staff.php?choice=success&value=Sorry, your File was Not Uploaded');
         exit();
     }
     else 
    {
      if (move_uploaded_file($_FILES["upload_img"]["tmp_name"], $target_file)) {
        $dir = "staff_gallery/";
        $image_file = date("U").$_FILES['upload_img']['name'];
        $file_src = $dir."/".$image_file;       
        $main_thumb_file = $dir."/opt/".$image_file;
        smart_resize_image($file_src , null, 720, 450, false , $main_thumb_file , false , false ,80 ); 
        $small_thumb_file = $dir."/thumb/".$image_file;
        smart_resize_image($file_src , null, 450, 300, false, $small_thumb_file , false , false ,80 ); 
      
    }

    $datas = array('type', 'name', 'email', 'password', 'mobile', 'salary', 'address', 'joining_date', 'status');    
    foreach ($datas as $key => $value) {
        if($_REQUEST[$value]==""){
            header('location:add_staff.php?choice=error&value='.$value." is Empty.");
            exit();
        }
      }
        
                    $table = "staff";
                    $last = get_last_id($table);
                    $lastplus = $last + 1;
                        $suf = str_pad($lastplus, 4, '0', STR_PAD_LEFT);

                    if($_REQUEST['type']=="staff"){
                         $prefix = "STAF".$suf;
                    
    $key_list = " `staff_id`, `type`, `name`, `email`, `password`, `mobile`, `salary`, `address`, `upload_img`, `joining_date`, `status`";    

    $value_list  = "'".$prefix."',
                    '".$_REQUEST['type']."', 
                    '".$_REQUEST['name']."',
                    '".$_REQUEST['email']."', 
                    '".$_REQUEST['password']."', 
                    '".$_REQUEST['mobile']."', 
                    '".$_REQUEST['salary'].".00', 
                    '".$_REQUEST['address']."', 
                    '".$image_file."',
                    '".$_REQUEST['joining_date']."', 
                    '".$_REQUEST['status']."'"; 
}

    else{
        $prefix = "TRAIN".$suf;
        $key_list = " `staff_id`, `type`, `name`, `email`, `password`, `mobile`, `salary`, `address`, `upload_img`, `joining_date`, `status`";    

                    $value_list  =  "'".$prefix."',
                                    '".$_REQUEST['type']."', 
                                    '".$_REQUEST['name']."',
                                    '".$_REQUEST['email']."', 
                                    '".$_REQUEST['password']."', 
                                    '".$_REQUEST['mobile']."', 
                                    '".$_REQUEST['salary']."', 
                                    '".$_REQUEST['address']."', 
                                    '".$image_file."',
                                    '".$_REQUEST['joining_date']."', 
                                    '".$_REQUEST['status']."'";
                                    }

    $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    header('Location:view_staff.php?choice=success&value=New Staff Added Successfully&8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($last).'&new=New_staff');              
    exit();
}
?>
