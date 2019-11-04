<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
     <?php include 'configs/head_section.php'; ?>
    
</head>

<body id="app-container" class="menu-default show-spinner">
     <?php include 'configs/navigation.php'; ?>

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Add New Primary Membership</h1>                   
                    <div class="separator mb-5"></div>

                </div>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php see_status2($_REQUEST); ?>
                            <h5 class="mb-4">Basic Informations</h5>
                            <form action="add_membership_handle.php" method="POST" onsubmit="return validate_form();">

                                <!-- <div class="form-group">
                                    <label for="membership_name" style="font-weight: bold;">Primary Membership</label>
                                    <input type="text" class="form-control" name="membership_name" id="membership_name"
                                        placeholder="Enter Membership Name" required>
                                </div> -->

                                <div class="form-group">
                                    <label for="membership_period" style="font-weight: bold;">Primary Membership Period</label>
                                    <input type="text" class="form-control" name="membership_period" id="membership_period" placeholder="Membership Period In Months" required>
                                </div>

                                <div class="form-group">
                                    <label for="membership_amount" style="font-weight: bold;">Membership Amount</label>
                                    <input type="text" name="membership_amount" class="form-control" id="membership_amount" placeholder="Membership Amount In Rs." required>
                                </div>
<!-- 
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="register_fee" style="font-weight: bold;">Register Fee</label>
                                            <input type="text" class="form-control" name="register_fee" id="register_fee" placeholder="Enter Fee In Rs." required>
                                        </div>
                                    </div>
                                </div> -->
                                
                                <button type="submit" class="btn btn-primary mb-0">Add Membership</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/moment.min.js"></script>
    <script src="js/vendor/fullcalendar.min.js"></script>
    <script src="js/vendor/perfect-scrollbar.min.js"></script>
    <script src="js/vendor/bootstrap-notify.min.js"></script>
    <script src="js/vendor/select2.full.js"></script>
    <script src="js/vendor/bootstrap-datepicker.js"></script>
    <script src="js/vendor/dropzone.min.js"></script>
    <script src="js/vendor/bootstrap-tagsinput.min.js"></script>
    <script src="js/vendor/nouislider.min.js"></script>
    <script src="js/vendor/jquery.barrating.min.js"></script>
    <script src="js/vendor/cropper.min.js"></script>
    <script src="js/vendor/typeahead.bundle.js"></script>
    <script src="js/vendor/mousetrap.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>

    <script>

function validate_form(){
  var membership_name = document.getElementById('membership_name').value;
  var membership_period = document.getElementById('membership_period').value;
  var membership_amount = document.getElementById('membership_amount').value;
  var register_fee = document.getElementById('register_fee').value;
 
if(membership_name == ""){
  alert('Please enter a valid name');
    return false;
}

if(isNaN(membership_period)){
alert('Only number required.');
return false;
}

if(isNaN(membership_amount)){
alert('Amount must be in number.');
return false;
}

if(isNaN(register_fee)){
alert('Fee must be in number.');
return false;
}

  return true;
}
</script>


</body>

</html>