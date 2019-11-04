<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    include 'resize_image.php';
   	
    //File Upload Starts
    $target_dir = "blogs/";
    $mota =  date("U").basename($_FILES["file"]["name"]);
    $target_file = $target_dir .$mota;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if file already exists
    if (file_exists($target_file)) {
        header('Location:add_blog.php?choice=success&value=Sorry File Already Exist');
        exit();
    }
    // Check file size
    if ($_FILES["file"]["size"] > 500000000) {
        header('Location:add_blog.php?choice=success&value=Sorry File too Large ');
        exit();
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"  && $imageFileType != "pdf") {
      header('Location:add_blog.php?choice=success&value=Sorry, only JPG, JPEG, PNG & GIF files are allowed.');       
        exit();
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    //echo "mastar";
         header('Location:add_blog.php?choice=success&value=Sorry, your File was Not Uploaded');
         exit();
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
              $file = date("U").$_FILES['file']['name'];
              $resizedFile = $target_dir."/thumb/".$file;
              $resizedFile2 = $target_dir."/opt/".$file;
              smart_resize_image($target_file , null, 720 , 400 , false , $resizedFile , false , false ,80 ); 
              smart_resize_image($target_file , null, 100 , 100 , false , $resizedFile2 , false , false ,80 ); 

                $table = "blog";
                $key_list = "`title`,`desc`, `tags`, `file`, `category`";      
                $value_list .= "'".$_REQUEST['blog_title']."',";
                $value_list .= "'".$_REQUEST['blog_desc']."',";
                $value_list .= "'".$_REQUEST['blog_tags']."',";
                $value_list .= "'".$file."',";
                $value_list .= "'".$_REQUEST['blog_category']."'";
                  
                $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
                header('Location:view_blog.php?choice=success&value=Blogs Added Successfully');              
                exit();

        } else {
          header('Location:add_blog.php?choice=success&value=Sorry, There Was an Error Uploading Your File');
           exit();
        }
    }
   

   