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
      
      $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    $table = "staff";
     try {
            $stmt = $pdo->prepare('UPDATE `'.$table.'` SET `type`="'.$_REQUEST['type'].'", `name`="'.$_REQUEST['name'].'", `email`="'.$_REQUEST['email'].'", `password`="'.$_REQUEST['password'].'", `mobile`="'.$_REQUEST['mobile'].'", `salary`="'.$_REQUEST['salary'].'", `address`="'.$_REQUEST['address'].'", `upload_img`="'.$image_file.'" , `joining_date`="'.$_REQUEST['joining_date'].'", `status`="'.$_REQUEST['status'].'"WHERE `id` = '.$id);
            
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            return ($ex->getMessage());
        }
        $stmt->execute();
        view_page('view_staff.php', 'success', 'Staff Record Updated Successfully.');
    exit();
    }


    

?>