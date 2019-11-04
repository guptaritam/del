<?php session_start();
    include 'backend/configs/pdo_class_data.php';
    include 'backend/configs/connection.php';    
    include 'backend/configs/function.php';    
    $pdo = new PDO($dsn, $user, $pass, $opt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <?php include("head.php");?>
     <title>Blog: <?php include("title.php");?></title>
     <style type="text/css">
         .product-item .product-item__img {
              border: 1px solid #e7e7e7 !important;
          }
     </style>
</head>
    <body>
        <div class="main-wrapper">
            <?php include("header.php");?>
            <div class="s-pagetitle">
                <img src="img/backgrounds/pagetitle-img_classes.jpg" class="s-pagetitle-img" alt="About page title image">
                <div class="container flexbox">
                    <h1 class="clr-white title-decor">Blog</h1>
                </div>
            </div>
            
            <div style="padding:20px;"></div>
             <div class="container">
                <div class="row">
                <div class="col-md-8 text-box">

                  <?php   $i=0;
                                try {
                                      $stmt = $pdo->prepare('SELECT * FROM `blog` ORDER BY date DESC');
                                      //echo 'SELECT * FROM `gallery` WHERE `sub_category`="Buildings"  ORDER BY date DESC';
                                  } catch(PDOException $ex) {
                                      echo "An Error occured!"; 
                                      print_r($ex->getMessage());
                                  }
                                  $stmt->execute();
                                  $user = $stmt->fetchAll();
                                foreach ($user as $key => $value) 
                                {
                                  $title = strtoupper($value['title']);

                                  echo '<div class="row"> 
                          <div class="col-md-12 text-box" style="padding: 20px;">
                             <div class="col-md-4 ">
                                <img src="backend/blogs/thumb/'.$value['file'].'" alt="" class="fullwidth mtop-20" style="height: 170px;">
                            </div>
                            <div class="col-md-8 ">
                            <b><u>'.$title.'</u></b>

                            <p>'.$value['desc'].'</p>
                            <p><label class="badge badge-warning badge-md">'.$value['tags'].'</label></p>
                            </div>
                            <br/>
                          </div>
                          </div>';
                              $i++;
                            }           
                          ?>        

                </div>

                   
                    <div class="col-md-4">
                        <div style="padding: 20px;"></div>
                        <div class="page-sidebar">
                            <img src="img/side.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding: 40px;"></div>
            
        </div>
            <?php include("footer.php");?>
            <?php include("popups.php");?>
            <?php include("scripts.php");?>
        
    </body>
</html>