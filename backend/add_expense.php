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
                    <h1>Add Expense</h1>                   
                    <div class="separator mb-5"></div>

                </div>
            </div>

        <div class="row">

            <div class="col-lg-6">
              <div class="card mb-4">
                <div class="card-body">
                    <?php see_status2($_REQUEST); ?>
                    <h5 class="mb-4">Basic Informations</h5>
                    <form action="add_expense_handle.php" method="POST" onsubmit="return validate_form();">

                     <div class="col-lg-8">
                        <div class="form-group">
                            <label for="expense_type" style="font-weight: bold;">Expense Type</label>
                            <select class="form-control" name="expense_type" id="expense_type" >
                                <option value="">------Select------</option>
                                                <?php $fata = fetch_all_popo("expense_type");
                                                    foreach ($fata as $key => $value) {
                                                        echo '<option>'.$value['expensetype_name'].'</option>';
                                                    }
                                                 ?>
                                 </select>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="expense_amount" style="font-weight: bold;">Amount</label>
                                    <input type="number" class="form-control" name="expense_amount" id="expense_amount" placeholder="Enter Amount" >
                                </div></div>

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Paid By</label>
                                    <select class="form-control" name="paid_by" id="paid_by" aria-describedby="emailHelp" >
                                        <option value="">Select</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Check">Check</option>
                                        <option value="Internet Banking">Internet Banking</option>
                                        <option value="Debit">Debit</option>
                                        <option value="Credit">Credit</option>
                                        <option value="Paytm">Paytm</option>
                                      </select>
                                </div></div>

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="date" style="font-weight: bold;">Date</label>
                                    <input type="text" class="form-control datepicker" name="date" id="date" placeholder="Choose Date" >
                                </div></div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Remarks</label>
                                    <textarea name="remarks" class="form-control" id="remarks" placeholder="Remark Here" rows="3" cols="2"></textarea>
                                </div></div>
                                
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary mb-0">Add Expense</button></div>
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


    <script type="text/javascript">
        
        function getval(sel)
{
    alert(sel.value);
}
    </script>

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

<!--<script type="text/javascript">-->
<!-- function myFunction(){-->
     
<!--       var remain_fee = "<?php echo $remain; ?>";-->
<!--       var amount = document.getElementById('pay_amount').value;-->
<!--       alert(amount);-->
<!--        if (amount <= remain_fee){-->
<!--            alert('Pay Amount Must Be Less Then Due Amount. ');-->
           
<!--        }-->
   
<!--}-->
<!--</script>-->
 

</body>

</html>