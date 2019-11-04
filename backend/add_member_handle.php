<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    include 'resize_image.php';

    $id = $_REQUEST['membership_type'];
    $data = get_data_id_data("membership_type", "id", $id);
    $type = $data['membership_amount'].'/'.$data['membership_period'];

    //$enquiry_id = $_REQUEST['enquiry_id'];

    $target_dir = "member_img/";
    $mota =  date("U").basename($_FILES["file"]["name"]);
    $target_file = $target_dir .$mota;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if file already exists
    if (file_exists($target_file)) {
        header('Location:add_member.php?choice=success&value=Sorry File Already Exist');
        exit();
    }
    // Check file size
    if ($_FILES["file"]["size"] > 500000000) {
        header('Location:add_member.php?choice=success&value=Sorry File too Large ');
        exit();
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"  && $imageFileType != "pdf") {
      header('Location:add_member.php?choice= success&value=Sorry, only JPG, JPEG, PNG & GIF files are allowed.');       
        exit();
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    //echo "mastar";
         header('Location:add_member.php?choice=success&value=Sorry, your File was Not Uploaded');
         exit();
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
              $file = date("U").$_FILES['file']['name'];
              $resizedFile = $target_dir."/thumb/".$file;
              $resizedFile2 = $target_dir."/opt/".$file;
              smart_resize_image($target_file , null, 720 , 400 , false , $resizedFile , false , false ,80 ); 
              smart_resize_image($target_file , null, 100 , 100 , false , $resizedFile2 , false , false ,80 );       
        $date = $_REQUEST['date'];
        $table1 = "member";

        $last = get_last_id($table1);
        $last_plus = $last + 1;
        $up = str_pad($last_plus , 4, '0', STR_PAD_LEFT);
        $prefix = "MEM".$up;

        $total = $_REQUEST['total_amount'];
        $paid = $_REQUEST['paid_amount'];
        $due = $total - $paid;

       $key_list = "`member_id`, `membership_type`, `member_name`, `phone_number`, `phone_number2`,`email`,  `gender`, `dob`, `state`, `city`, `age`, `address`, `occupation`, `marital_status`, `total_amount`, `paid_amount`, `due_amount`, `validity_from`, `validity_to`, `paid_by`, `receipt_type`, `reference_from_media`,`remarks`, `enquiry_id`, `following_by`, `member_image`, `date`";
                // if($enquiry_id==""){
                //     $enq = 'NA';
                // }else{
                //     $enq = $enquiry_id;
                // }

       $value_list  = " 
                        '".$prefix."', 
                        '".$type."', 
                        '".$_REQUEST['full_name']."', 
                        '".$_REQUEST['phone_number']."', 
                        '".$_REQUEST['phone_number2']."', 
                        '".$_REQUEST['email']."', 
                        '".$_REQUEST['gender']."',
                        '".$_REQUEST['dob']."', 
                        '".$_REQUEST['prof_state']."', 
                        '".$_REQUEST['city']."', 
                        '".$_REQUEST['age']."',
                        '".$_REQUEST['address']."', 
                        '".$_REQUEST['occupation']."', 
                        '".$_REQUEST['marital_status']."', 
                        '".$total."', 
                        '".$paid."', 
                        '".$due."',   
                        '".$_REQUEST['validity_from']."', 
                        '".$_REQUEST['validity_to']."',
                        '".$_REQUEST['paid_by']."',
                        '".$_REQUEST['receipt_type']."',
                        '".$_REQUEST['reference_from_media']."', 
                        '".$_REQUEST['remarks']."', 
                        'NA', 
                        '".$_REQUEST['followed_by']."', 
                        '".$file."',
                        '".$date."'";
                     
                    $last1 = get_last_id($table1);

       $result = $pdo->exec("INSERT INTO `$table1` ($key_list) VALUES ($value_list)");

       } else {
          header('Location:add_member.php?choice=success&value=Sorry, There Was an Error Uploading Your File');
        }
           }

      if($paid > 0){
         $table = "payment";
            $key_list = " `member_id`, `pay_amount`, `paid_by`, `receipt_type`, `remarks`, `date`";    
            $value_list  = "'".$prefix."',
                            '".$paid."', 
                            '".$_REQUEST['paid_by']."',
                            '".$_REQUEST['receipt_type']."', 
                            '".$_REQUEST['remarks']."', 
                            '".$date."'";
                             
                            //$last = get_last_id($table);
            
            $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");   

            header('Location:after_add_member.php?choice=success&value=Member Added Successfully&8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($last_plus).'&new=New_member');
            exit();
              }   
              else{
                    header('Location:view_members.php?choice=success&value=Member Added Successfully&8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($last_plus).'&new=New_member');
              }  

?>
