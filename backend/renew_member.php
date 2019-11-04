<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
    $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    $lata = get_data_id_data("member", "id", $id);
    //print_r($lata);
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
                    <h1>Add New Member</h1>                   
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php see_status2($_REQUEST); ?>
                            <h5 class="mb-4">Basic Informations</h5>
                            <form action="newmember_update.php" method="POST" onsubmit="return validate_input();" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="membershiptype" style="font-weight: bold;">Membership Type</label>
                                            <select id="member_pack" class="form-control" name="membership_type">
                                                 <option value="" selected="selected">Select</option>
                                                <?php 
                                                $fata = fetch_all_popo("membership_type");
                                                    foreach ($fata as $key => $value) {
                                                        echo '<option value="'.$value['id'].'">'.$value['membership_amount']. " /  ".$value['membership_period']. '</option>';
                                                    }
                                                 ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="font-weight: bold;">Full Name</label>
                                          <input type="text" class="form-control" name="full_name" id="full_name" aria-describedby="emailHelp" placeholder="Enter Full Name" value="<?php echo $lata['member_name'];?>">
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="exampleInputPassword1" style="font-weight: bold;">Phone Number</label>
                                      <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value="<?php echo $lata['phone_number'];?>">
                                    </div>
                                  </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Landline/Other Phone Number</label>
                                    <input type="text" class="form-control" name="phone_number2" id="phone_number2" placeholder="Optional"  value="<?php echo $lata['phone_number2'];?>" required>
                                </div>
                              </div>
                            </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" style="font-weight: bold;">Occupation</label>
                                            <select class="form-control" name="occupation" id="occupation">
                                              <option><?php echo $lata['occupation']; ?></option>
                                              <option value="Job">Job</option>
                                              <option value="Self-Employeed">Self-Employeed</option>
                                              <option value="Business">Business</option>
                                              <option value="Student">Student</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                     <div class="form-group">
                                        <label for="exampleInputPassword1" style="font-weight: bold;">Followed By</label><br>
                                        <select class="form-control" name="followed_by" id="followed_by"  style="background-color: #dddddd; font-size: 14px;">
                                                <option><?php echo $lata['following_by'];?></option>
                                          <?php
                                               $sata = fetch_all_popo("staff");
                                               foreach ($sata as $key => $value) {
                                                   echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
                                               }
                                          ?>
                                        </select>
                                      </div>
                                  </div>
                                </div>

                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="paid_amount" style="font-weight: bold;">Membership Validity</label><br/>
                                          <label>From :</label>
                                          <input type="text" class="form-control datepicker" name="validity_from" id="validity_from" placeholder="Choose From Date">
                                      </div>
                                  </div>
                              <div class="col-sm-6"><br>
                                <div class="form-group" style="margin-top: 8px;">
                                 <label>To :</label>
                                  <input type="text" class="form-control datepicker" name="validity_to" id="validity_to" placeholder="Choose To Date">
                              </div>
                            </div>
                          </div>

                            <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="total_amount" style="font-weight: bold;">Total Amount</label>
                                      <input type="text" class="form-control" name="total_amount" id="total_amount" readonly>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="paid_amount" style="font-weight: bold;">Pay Amount</label>
                                      <input type="text" class="form-control" name="paid_amount" id="paid_amount" placeholder="0.00">
                                  </div>
                                </div>
                             </div>

                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: bold;">Receipt Type</label>
                                  <select class="form-control" name="receipt_type" id="receipt_type" aria-describedby="emailHelp" >
                                      <option value="Manual">Manual</option>
                                      <option value="Printed">Printed</option>
                                      <option value="Email">Email</option>
                                      <option value="Download Pdf">Download Pdf</option>
                                      <option value="SMS">SMS</option>
                                    </select>
                                </div>
                              </div>

                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Payment Mode</label>
                                    <select class="form-control" name="paid_by" id="paid_by" aria-describedby="emailHelp" required>
                                        <option value="Cash">Cash</option>
                                        <option value="Check">Check</option>
                                        <option value="Internet Banking">Internet Banking</option>
                                        <option value="Debit">Debit</option>
                                        <option value="Credit">Credit</option>
                                        <option value="Paytm">Paytm</option>
                                      </select>
                                </div></div>
                              </div>

                              <input type="hidden" name="8d1d4357e1e1c6b3e4ea6df4ff01fede" value="<?php echo $_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']; ?>">

                               <!--  <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="paid_amount" style="font-weight: bold;">First Payment Date</label>
                                            <input type="text" class="form-control datepicker" name="first_payment_date" id="first_payment_date" placeholder="Choose Date">
                                        </div>
                                    </div>
                                    </div>-->
                                    <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="total_amount" style="font-weight: bold;">Enquiry Date</label>
                                            <input type="text" class="form-control datepicker" name="enquiry_date" id="enquiry_date" placeholder="Choose Date">
                                        </div>
                                    </div>
                                </div> -->

                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Remarks</label>
                                     <textarea name="remarks" class="form-control" id="remarks" placeholder="Your remark"></textarea>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="exampleInputPassword1" style="font-weight: bold;">Date</label>
                                      <input type="text" class="form-control datepicker" name="date" id="date" placeholder="Choose Date">
                                  </div>
                              </div>
                            </div>


                            <button type="submit" class="btn btn-primary mb-0">Add Member</button>
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
    <script src="js/scripts.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){
        $('#member_pack').change(function(){
            var id = $(this).find(":selected").val();
            alert(id);
            
            $.ajax({
                url: 'getmember_pack.php',
                method: "POST",
                data: {id:id},
                success: function(data){
                   var obj = JSON.parse(data);
                    $("#total_amount").val(obj.membership_amount);
                    // $("#validity_to").val(obj.membership_period);
                 }           
                });
             });

          $('#validity_from').change(function(){
          var from = $('#validity_from').val();
            alert(from);
              });
          });
    </script>


    <script type="text/javascript">
    $(function(){
      $('#dob').datepicker({
        showOn: 'button',
        showAnim: 'slideDown'
      });
      
      $(document).ready(function(){
        $("#dob").change(function(){
          var dob = $('#dob').val();
          if(dob == ''){
            $('.error').text('Select DOB!');
          }else{
            dobDate = new Date(dob);
            nowDate = new Date();
          
            var diff = nowDate.getTime() - dobDate.getTime();
          
            var ageDate = new Date(diff); // miliseconds from epoch
            var age = Math.abs(ageDate.getUTCFullYear() - 1970);
          
         $('#age').val(age);
        }
      });
    });
  });
  </script>

</body>

</html>