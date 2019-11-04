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
    <?php include('configs/head_section.php');?>
</head>

<body id="app-container" class="menu-default show-spinner">
     <?php include 'configs/navigation.php'; ?>

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Add Expense Type</h1>                   
                    <div class="separator mb-5"></div>

                </div>
            </div>

        <div class="row">

            <div class="col-lg-6">
              <div class="card mb-4">
                <div class="card-body">
                    <?php see_status2($_REQUEST); ?>
                    <form action="add_expensetype_handle.php" method="POST" onsubmit="return validate_form();">

                     <!-- <div class="col-lg-8">
                        <div class="form-group">
                            <label for="expense_type" style="font-weight: bold;">Expense Type</label>
                            <select class="form-control" name="expense_group" id="expense_group" >
                                <option value="">Select</option>
                                <option value="Computer Expenses">Computer Expenses</option>
                                <option value="Office Expenses">Office Expenses</option>
                                <option value="Other Expenses">Other Expenses</option>
                                <option value="Gym EMI">Gym EMI</option>
                                <option value="Admin Expenses">Admin Expenses</option>
                                 </select>
                                </div>
                            </div> -->

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="expense_type" style="font-weight: bold;">Type</label>
                                    <input type="text" class="form-control" name="expense_type" id="expense_type" placeholder="Enter Type" required>
                                </div></div>

                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary mb-0">Add Type</button></div>
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

    <!-- <script>

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
 -->

</body>

</html>