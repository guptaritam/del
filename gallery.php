<?php session_start();
    include 'backend/configs/pdo_class_data.php';
    include 'backend/configs/connection.php';    
    include 'backend/configs/function.php';    
    $pdo = new PDO($dsn, $user, $pass, $opt);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>    
        <title>Gallery: <?php include("title.php");?></title>
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
                        <?php   $i=0;
                                try {
                                      $stmt = $pdo->prepare('SELECT * FROM `gallery`  GROUP BY `category` ORDER BY date DESC');
                                      //echo 'SELECT * FROM `gallery` WHERE `sub_category`="Buildings"  ORDER BY date DESC';
                                  } catch(PDOException $ex) {
                                      echo "An Error occured!"; 
                                      print_r($ex->getMessage());
                                  }
                                  $stmt->execute();
                                  $gal1 = $stmt->fetchAll();
                                foreach ($gal1 as $key => $value) {                              
                                        if ($value['file']=="") {
                                            continue;
                                        }
                                        if ($i%3==0) {
                                            echo '</div><div class="row">';
                                        }
                                        echo '<div class="col-sm-4">                        
                                                <div class="img">
                                                    <a href="gallery_inner.php?ghhjghjgshjgdasjhdjasfgfdsaghfdhgsafgdfashgfdgasdafsfdgsadjfastdfghasfdghasfdfaghagfdgsfdgfdasgfdhfasdgfghdfsghfdghsfdghfas_data='.base64_encode($value['category']).'"><img src="backend/gallery/thumb/'.$value['file'].'" style="width: 100%"></a>
                                                    <div style="padding: 8px"></div>
                                                    <h4 style="margin:0px;font-size:19px;color:orangered; font-weight:bold;text-align:center;">'.$value['category'].' </h4>
                                                    
                                                </div>
                                            </div>';
                                            $i++;
                                }

                         ?>             
                        </div>
                 <div style="padding: 30px;"></div>
            </div>
        </section>
        
           
        <?php include("footer.php");?>
            <?php include("popups.php");?>
            <?php include("scripts.php");?>
        
    </body>
</html>