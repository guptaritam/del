<?php include 'configs/site_confirgurations.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- <link rel="stylesheet" href="font/iconsmind-s/css/iconsminds.css" /> 
    <link rel="stylesheet" href="font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="css/main.css" /> -->
    <?php include('configs/head_section.php');?>
    

</head>

<body class="background show-spinner">
    <div class="fixed-background" style="background-image: url(img/polkk.jpg);"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side " style="background-image: url('img/yui.jpg');">

                            <p class=" text-white h2">You Can Always <span style="color: #11cedc">Transform Your Life</span>.</p>

                            <p class="white mb-0">
                                Please use your credentials to login.
                                <br>You can add new member or get details of existing</a>.
                            </p>
                        </div>
                        <div class="form-side">
                            <a href="index.php">
                               <img src="img/logo.jpg" style="width: 140px">
                            </a>
                            <div style="padding:20px;"></div>
                            <h6 class="mb-4">Login</h6>
                            <form action="login_redirect.php" method="POST" enctype="multipart/form-data">
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" name="email" id="email" />
                                    <span>E-mail</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="password" name="pass" id="pass" placeholder="" />
                                    <span>Password</span>
                                </label>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#">Forget password?</a>
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>