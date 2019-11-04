<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    $lata = get_data_id_data("payment", "id", $id);
   // print_r($lata);
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
                    <h1>Update Payment</h1>    
                     <button type="submit" class="btn btn-primary mb-0 " form="myform" style="float: right;">Save Changes</button>                
                    <div class="separator mb-5"></div>

                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body" style="margin-left:60px;">
                            <?php see_status2($_REQUEST); ?>
                            <form action="update_payment_handle.php" method="POST" onsubmit="return validate();" enctype="multipart/form-data" id=myform>

                             
                                     <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-inline">
                                    <label for="exampleInputEmail1" style="font-weight: bold; margin-right: 50px;">Search</label>
                                    <input type="text" class="form-control" name="search_name" id="search_name" aria-describedby="emailHelp" value="<?php echo "name"; ?>">
                                </div>
                                    </div>

                                  <div class="col-sm-1">
                                    OR</div>

                                    <div class="col-sm-4" >
                                        <div class="form-inline">
                                   
                                    <input type="text" class="form-control" name="search_mobile" id="search_mobile" aria-describedby="emailHelp" value="<?php echo "Contact Number"; ?>" >
                                </div>
                                    </div></div><br/>

                                <div class="row">
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Pending Payment </label>
                                    <input type="text" class="form-control" name="pending_payment" id="pending_payment" value="0.00" value="<?php echo "" ; ?>" readonly>
                                </div></div></div>

                                <div class="row">
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Payment</label>
                                    <input type="text" class="form-control" name="pay_amount" id="pay_amount" aria-describedby="emailHelp" value="<?php echo $lata['pay_amount'];?>">
                                </div></div></div>


                                <div class="row">
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Paid By</label>
                                    <select class="form-control" name="paid_by" id="paid_by" aria-describedby="emailHelp">
                                        <?php echo '<option>'.$lata['paid_by'].'</option>'; ?>
                                        <option value="Cash">Cash</option>
                                        <option value="Check">Check</option>
                                        <option value="Internet Banking">Internet Banking</option>
                                        <option value="Debit">Debit</option>
                                        <option value="Credit">Credit</option>
                                        <option value="Paytm">Paytm</option>
                                      </select>
                                </div></div></div>


                               <div class="row">
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Receipt Type</label>
                                    <select class="form-control" name="receipt_type" id="receipt_type" aria-describedby="emailHelp">
                                        <?php echo '<option>'.$lata['receipt_by'].'</option>'; ?>
                                        <option value="Manual">Manual</option>
                                        <option value="Printed">Printed</option>
                                        <option value="Email">Email</option>
                                        <option value="Download Pdf">Download Pdf</option>
                                        <option value="SMS">SMS</option>
                                      </select>
                                </div></div></div>


                                      <div class="row">
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Date</label>
                                    <input type="text" class="form-control datepicker" name="payment_date" id="payment_date" aria-describedby="emailHelp" 
                                        placeholder="Choose Date" value="<?php echo $lata['date'];?>">
                                </div></div></div>


                                 <div class="row">
                                    <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Remarks</label>
                                    <textarea name="remarks" class="form-control" id="remarks" placeholder="Remark Here" rows="3" cols="2"><?php echo $lata['remarks'];?></textarea>
                                </div></div>
                            </div>

                            <input type="hidden" name="8d1d4357e1e1c6b3e4ea6df4ff01fede" value="<?php echo $_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']; ?>">

                            </form>

                        </div>
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
    <script src="js/upload.js"></script>
    <script src="js/scripts.js"></script>

    </body>
    </html>
