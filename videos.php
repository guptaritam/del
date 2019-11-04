<?php session_start();
    include 'backend/configs/pdo_class_data.php';
    include 'backend/configs/connection.php';    
    include 'backend/configs/function.php';    
    $pdo = new PDO($dsn, $user, $pass, $opt);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
     <?php include("head.php");?>
     <title>Video: <?php include("title.php");?></title>
     <style type="text/css">
         .cards{
          font-size: 14px;
        font-family: 'Lato';
        border-bottom: solid 1px #eee;
        padding: 10px;
       }

       .cards{
        background-color: #f6f6f6;
        font-weight: bold;
        font-size: 15px;
       }
        
        
    </style>
</head>
    <body style="background-color: #cccccc87;">
        <div class="main-wrapper" >
            <?php include("header.php");?>
            <div class="s-pagetitle">
                <img src="img/backgrounds/pagetitle-img_about.jpg" class="s-pagetitle-img" alt="About page title image">
                <div class="container flexbox">
                    <h1 class="clr-white title-decor">Video</h1>
                </div>
            </div>
             <div class="text-block" style="background-color: #cccccc87;">
                <div class="container">
                     <div style="padding: 30px;"></div>
                    <div class="row">
                                   
                                               <?php 
                        try {
                          $stmt = $pdo->prepare('SELECT * FROM `video` ORDER BY Date DESC');
                          } catch(PDOException $ex) {
                              echo "An Error occured!"; 
                              print_r($ex->getMessage());
                          }
                          $stmt->execute();
                          $user = $stmt->fetchAll();
                          $i=0;
                          foreach ($user as $key => $value) {
                          if($i%2==0){
                            echo '</div><div class="row">';
                          }
                            echo '<div class="col-sm-6">
                                    <div class="cards">
                                      <div style="padding: 10px"></div>
                                     <iframe width="100%" height="315" src="https://www.youtube.com/embed/'.$value['link'].'" frameborder="0" allow="autoplay; encrypted-media"  allowfullscreen class="img"></iframe>
                                      <div style="padding: 10px;"></div>            
                                        <p style="font-size: 14px;font-family: Lato;color: #444">'.$value['title'].'</p>            
                                    </div>
                                  </div>';
                      $i++;
                }
             
         ?>     
                    </div>
                      <div style="padding: 30px;"></div>
                </div>
            </div>
           
        </div>
            <?php include("footer.php");?>
            <?php include("popups.php");?>
            <?php include("scripts.php");?>
        
    </body>
</html>