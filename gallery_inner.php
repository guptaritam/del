<?php session_start();
    include 'backend/configs/pdo_class_data.php';
    include 'backend/configs/connection.php';    
    include 'backend/configs/function.php';    
    $pdo = new PDO($dsn, $user, $pass, $opt);
     $category = base64_decode($_REQUEST['ghhjghjgshjgdasjhdjasfgfdsaghfdhgsafgdfashgfdgasdafsfdgsadjfastdfghasfdghasfdfaghagfdgsfdgfdasgfdhfasdgfghdfsghfdghsfdghfas_data']);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>    
        <title>Gallery : <?php include'title.php';  ?></title>
        <?php include 'head.php'; ?>
        <style type="text/css">
        .img
        {
            font-family: roboto;
            transition: all .1s ease-in-out 0s;
            padding:10px;
            background-color: #fff;
            box-shadow: 0px 0px 10px #ccc;
            color: #333;
            text-align: left;
            min-height: 100px;
            margin-bottom: 20px;
        }

        .img:hover
        {
            box-shadow: 20px 20px 10px #ccc;
            background-color: #fff;
            color: #333+-
            -+
            ;
            cursor: pointer;
        }
        
        
    </style>
 <link rel="stylesheet" type="text/css" href="lightbox.css">
    </head> 
    <body class="header-sticky">
        <div class="boxed">
        	<?php include 'header.php'; ?>
            
        <div class="page-title parallax parallax4"> 
            <div class="overlay"></div>            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Gallery</h2>
                        </div><!-- /.page-title-heading -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>Gallery</li>
                            </ul>                   
                        </div>
                    </div>
                </div> 
            </div>                     
        </div>
        <section>
            <div class="container">
                <div style="padding: 30px;"></div>
               <div class="row">
                    <?php 
                        try {
                           $stmt = $pdo->prepare('SELECT * FROM `gallery` WHERE category="'.$category.'" ORDER BY Date DESC');
                          } catch(PDOException $ex) {
                              echo "An Error occured!"; 
                              print_r($ex->getMessage());
                          }
                          $stmt->execute();
                          $user = $stmt->fetchAll();
                          $i=0;
                          foreach ($user as $key => $value) {
                          if($i%3==0){
                            echo '</div><div class="row">';
                          }
                            echo '<div class="col-md-4">
                                    <div class="img">
                                      <a href="backend/gallery/'.$value['file'].'" data-lightbox="roadtrip" data-title="'.$value['category'].'"><img src="backend/gallery/'.$value['file'].'" style="width: 100%"></a>
                                      <div style="padding: 3px;"></div>
                                      <b style="font-size: 14px;color:orangered;">'.$value['category'].'</b><br/>
                                      <span style="font-size: 12px;">'.$value['date'].'</span>
                                    </div>
                                  </div>';
                                 $i++;
                          }            
                     ?>             
                    </div>
                 <div style="padding: 30px;"></div>
            </div>
        </section>
        
           
        <?php include 'footer.php'; ?>                   
        </div>
        <?php include 'scripts.php'; ?>
        <script type="text/javascript" src="lightbox.js"></script>
        
    </body>
</html>