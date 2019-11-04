<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    //$dats = get_data_id_dataName("member", "member_name", $search);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
     <?php include 'configs/head_section.php'; ?>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<body id="app-container" class="menu-default show-spinner">
     <?php include 'configs/navigation.php'; ?>
    
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>New Payment</h1>                   
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body" style="margin-left:60px;">
                            <?php see_status2($_REQUEST); ?>
                            <form action="add_payment_handle.php" method="POST" onsubmit="return validate();" enctype="multipart/form-data">

                             <!-- <div id="pending_payment"></div> -->

                             <div class="row">
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="font-weight: bold;"></label>
                                        <select class="form-control" name="search_by" id="search_by" aria-describedby="emailHelp"  >
                                        <option value="">Select</option>
                                        <option value="member_name">Search By Name</option>
                                        <option value="phone_number">Search By Phone No</option>
                                        <option value="member_id">Search By Id</option>
                                      </select>
                                    </div>
                                </div>
                                </div>

                             <div class="row">
                                    <div class="col-sm-2">
                                    <div class="search-box">
                                        <input type="text" class="form-control" autocomplete="off" placeholder="Search Here..." name="search" id="search" value="" />
                                        <div class="result" style="background-color: #fafafa;"></div>
                                    </div>
                                </div>
                            </div>
                                <br/>

                                <div class="row">
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Pending Payment </label>
                                    <input type="text" class="form-control" name="pending_payment" id="pending_payment" readonly>
                                </div>
                            </div>
                        </div>
                        <div id="pending_payment"></div>

                        <input type="hidden" class="form-control" id="member_id" name="member_id">

                                <div class="row">
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Payment</label>
                                    <input type="text" class="form-control" name="pay_amount" id="pay_amount" aria-describedby="emailHelp" 
                                        placeholder="0.00" >
                                </div></div></div>


                                <div class="row">
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Payment Mode</label>
                                    <select class="form-control" name="paid_by" id="paid_by" aria-describedby="emailHelp"  >
                                        <option value="">Select</option>
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
                                    <select class="form-control" name="receipt_type" id="receipt_type" aria-describedby="emailHelp" >
                                        <option value="Manual">Manual</option>
                                        <option value="Printed">Printed</option>
                                        <option value="Email">Email</option>
                                        <option value="Download Pdf">Download Pdf</option>
                                        <option value="SMS">SMS</option>
                                      </select>
                                </div></div></div>


                            <div class="row">
                                    <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Remarks</label>
                                    <textarea name="remarks" class="form-control" id="remarks" placeholder="Remark Here" rows="3" cols="2"></textarea>
                                </div></div>
                            </div>

                            <div class="row">
                            <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" style="font-weight: bold;">Date</label>
                                            <input type="text" class="form-control datepicker" name="date" id="date" placeholder="Choose Date">
                                        </div>
                                    </div>
                                    </div>

                                <button type="submit" class="btn btn-primary mb-0" id="add_payment">Add Payment</button>
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('#search').blur(function(){
                var by = $('#search_by').val();
                var data = $(this).val();
                $("#pending_payment").load('search_popo.php', {'search_by':by, 'search_q':data}, function(data){
                    var obj = JSON.parse(data);

                    if(obj.due_amount==0){
                        alert(obj.due_amount);
                        $("#pending_payment").val("paid");
                       
                    }
                    else{
                        alert(obj.due_amount);
                        $("#pending_payment").val(obj.due_amount);
                    $("#member_id").val(obj.member_id);
                    }
                });
             });
        });
            
    </script>

 <!--  <script>

        function validate(){

          var type = document.getElementById('type').value;
          var name = document.getElementById('name').value;
          var email = document.getElementById('email').value;
          var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          var email_result = email_regex.test(email);
          var password = document.getElementById('password').value;
          var mobile = document.getElementById('mobile').value;
          var phone_regex = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
          var phone_result = phone_regex.test(mobile);

           var salary = document.getElementById('salary').value;
           var address = document.getElementById('address').value;
           var upload_img = document.getElementById('upload_img').value;
           var joining_date = document.getElementById('joining_date').value;
           var status = document.getElementById('status').value;
           //var allow_delete = document.getElementById('allow_delete').value;
 
                if(type == ""){
                  alert('Please choose any type');
                    return false;
                }

                if(name == ""){
                  alert('Please enter valid name');
                    return false;
                }

                if(email_result == false)
                {
                alert('Please enter a valid email address');
                return false;
                }

                if(password == ""){
                  alert('Please enter password');
                    return false;
                }

                if(phone_result == false)
                {
                alert('Please enter a valid phone number');
                return false;
                }

                if(salary == "")
                {
                  alert('Please enter salary');
                    return false;
                }

                if(address == ""){
                  alert('Please enter address');
                    return false;
                }

                if(upload_img == ""){
                  alert('Please choose a photo');
                    return false;
                }

                if(joining_date == ""){
                  alert('Please choose any date');
                    return false;
                }

                if(status == ""){
                  alert('Please choose any bhgfthhhth');
                    return false;
                }

                    return true;
                }

                </script> -->

    

</body>

</html>