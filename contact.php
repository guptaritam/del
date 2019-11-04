<?php session_start();
    include 'backend/configs/pdo_class_data.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <?php include("head.php");?>
     <title>Contact Us: <?php include("title.php");?></title>
     
</head>
    <body>
        <div class="main-wrapper">
           <?php include("header.php");?>
            <div class="s-pagetitle">
                <img src="img/backgrounds/pagetitle-img_contacts.jpg" class="s-pagetitle-img" alt="About page title image">
                <div class="container flexbox">
                    <h1 class="clr-white title-decor">Contacts</h1>
                </div>
            </div>
            
            <?php see_status2($_REQUEST);  ?>
            <div class="contacts-page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6 bg-white">
                            <div class="contacts-page-content">
                                <div class="contacts-info">
                                    <div class="contacts-info-item">
                                        <div class="contacts-icon">
                                            <i class="icon-address"></i>
                                        </div>
                                        <div class="contacts-desc">
                                            <h4>Address</h4>
                                            <span> 124 St Abord Road, London, GB 045</span>
                                        </div>
                                    </div>
                                    <div class="contacts-info-item">
                                        <div class="contacts-icon">
                                            <i class="icon-telephone"></i>
                                        </div>
                                        <div class="contacts-desc">
                                            <h4>Telephone</h4>
                                            <span>+1 (800) 123456789 or +1 (800) 123456789</span>
                                        </div>
                                    </div>
                                    <div class="contacts-info-item">
                                        <div class="contacts-icon">
                                            <i class="icon-mail"></i>
                                        </div>
                                        <div class="contacts-desc">
                                            <h4>Mail</h4>
                                            <span><a href=""></a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="contacts-form-box">
                                    <h2>Send us a message</h2>
                                    <form action="contact_handle.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Your name*</label>
                                                    <input type="text" name="name" id="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Your E-mail*</label>
                                                    <input type="text" name="email" id="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="subject">Phone</label>
                                                    <input type="text" name="phone" id="subject">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="message">Your message</label>
                                                    <textarea name="message" id="message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="submit" class="button button-bg" value="Send message">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="contacts-map"></div>
            </div>
        </div>

        
       
            <?php include("footer.php");?>
            <?php include("popups.php");?>
            <?php include("scripts.php");?>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnORm0YB_lFawxQsqEl_kfBk5dKUciTvc&amp;callback=initMap"
                type="text/javascript"></script>
        <script src="js/main.js"></script>
    </body>
</html>