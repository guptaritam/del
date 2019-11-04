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
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        .multiselect-container>li>a>label {
  padding: 4px 20px 3px 20px;
}
    </style>
    
</head>

<body id="app-container" class="menu-default show-spinner">
     <?php include 'configs/navigation.php'; ?>

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>New Enquiry</h1>                   
                    <div class="separator mb-5"></div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php see_status2($_REQUEST); ?>
                            <h5 class="mb-4">Basic Informations</h5>
                            <form action="add_new_enquiry_handle.php" method="POST" onsubmit="return validate_input();">

                                <div class="row">
                                <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Enquiry For</label><br>
                                    <select id="enquiry_for" multiple="multiple" name="enquiry_for[]">
                                                    <?php $fata = fetch_all_popo("services");
                                                        foreach ($fata as $key => $value) {
                                                            echo '<option>'.$value['service_name'].'</option>';
                                                        }
                                                     ?>
                                    </select><br />
                                </div>
                                </div>

                                <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Goal</label><br>
                                    <select class="form-control" name="goal[]" id="goal" multiple="multiple">
                                            <option value="Weight Loss">Weight Loss</option>
                                            <option value="Body Building">Body Building</option>
                                            <option value="Weight Gain">Weight Gain</option>
                                            <option value="Fitness">Fitness</option>
                                            <option value="General Training">General Training</option>
                                    </select>
                                </div>
                                </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Followed By</label><br>
                                    <select class="form-control" name="followed_by" id="followed_by"  style="background-color: #dddddd; font-size: 14px;">
                                      <?php
                                             $sata = fetch_all_popo("staff");
                                             foreach ($sata as $key => $value) {
                                                 echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
                                             }
                                      ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Enter Full Name" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your Private information
                                        with anyone else.</small>
                                </div>

                                <div class="row">
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Mobile Number</label>
                                    <input type="text" class="form-control" name="phone" id="exampleInputPassword1" placeholder="Phone Number" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Landline/Other Phone Number</label>
                                    <input type="text" class="form-control" name="phone2" id="exampleInputPassword1" placeholder="Optional" required>
                                </div>
                            </div>
                        </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Address</label>
                                    <textarea name="address" class="form-control" id="exampleInputPassword1" placeholder="Complete Address" required></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" style="font-weight: bold;">Occupation</label>
                                            <select class="form-control" name="occupation" id="occupation">
                                                <option value="Job">Job</option>
                                                <option value="Self-Employeed">Self-Employeed</option>
                                                <option value="Business">Business</option>
                                                <option value="Student">Student</option>
                                                
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" style="font-weight: bold;">Select Gender</label><br/>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" checked="" required>
                                                <label class="form-check-label" for="gender">
                                                    Male
                                                </label>
                                            </div>

                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gende2" value="Female" checked="">
                                                <label class="form-check-label" for="gende2">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="DOB" style="font-weight: bold;">Dob</label>
                                   <input type="text" name="dob" id="dob" class="form-control datepicker" placeholder="Choose Date">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Age</label>
                                    <input type="text" class="form-control" name="age" id="age" readonly>
                                    </div>
                                </div>
                            </div>
                                    
                                <hr/>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" style="font-weight: bold;color: green">Had Gym Before</label>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="had_gym_before" id="gridRadios1" value="Yes" checked="" required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Yes
                                                </label>
                                            </div>

                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="had_gym_before" id="gridRadios2" value="No" checked="" required>
                                                <label class="form-check-label" for="gridRadios2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                   <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Name of the gym and why you left?</label>
                                            <textarea name="issue_with_previous_gym" class="form-control" id="exampleInputPassword1" placeholder="Name of Gym, City, Address and Reason for Opting Out"></textarea>
                                        </div>
                                   </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" style="font-weight: bold;color: green">Any Health Issues?</label>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="any_health_issue" id="any_health_issue" value="Yes" checked="" required>
                                                <label class="form-check-label" for="any_health_issue">
                                                    Yes
                                                </label>
                                            </div>

                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="any_health_issue" id="any_health_issue2" value="No" checked="" required>
                                                <label class="form-check-label" for="any_health_issue2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                   
                               <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Please List your Issues</label>
                                        <textarea name="health_issue" class="form-control" id="exampleInputPassword1" placeholder="Please Write your issues"></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputPassword1" style="font-weight: bold;">How did you here about us?</label>
                                        <select class="form-control" name="reference_from_media" id="exampleInputPassword1" required>
                                            <option>Friend</option>
                                            <option>Hoarding</option>
                                            <option>Flyer</option>
                                            <option>Social Media</option>
                                            <option>Radio</option>
                                            <option>News Paper</option>
                                            <option>Coupons</option>
                                            <option>Seminars</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                               </div>

                                   <div class="col-sm-6">
                                     <div class="form-group">
                                      <label for="exampleInputPassword1" style="font-weight: bold;">Date</label>
                                       <input type="text" name="date" id="date" class="form-control datepicker" placeholder="Choose Date" >
                                     </div>
                                   </div>

                                
                                <button type="submit" class="btn btn-primary mb-0">Add New Enquiry</button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="card mb-4">
                        <h1 style="padding:20px;">Enquiry Updates</h1>
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" data-toggle="tab" href="#home">Warm</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#menu1">Hot</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#menu3">Cold</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#menu2">Cancelled</a>
                                </li>
                              </ul>

                              <!-- Tab panes -->
                              <div class="tab-content">
                                <div id="home" class="container tab-pane active"><br>
                                  <h3>Warm Enquiries</h3>
                                  <table class="example">
                                    <thead>
                                    <tr style="border-bottom: solid 1px #eee; background-color: #ebfdff">

                                        <th style="padding:5px;">S.No.</td>
                                        <th style="padding:5px;">Name</th>
                                        <th style="padding:5px;">Contact</th>
                                        <th style="padding:5px;">Status</th>
                                        <th style="padding:5px;">Goal</th>
                                        <th style="padding:5px;">Date</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php 
                                                $table ="enquiry";
                                                $data = get_data_id_data_hoho($table,'conversion_status','Warm'); 
                                                show_enquiry_short2($data);
                                         ?>                                    
                                    </tbody>
                                </table>
                                </div>

                                <div id="menu1" class="container tab-pane fade"><br>
                                  <h3>Hot Enquiries</h3>
                                  <table class="example">
                                    <thead>
                                    <tr style="border-bottom: solid 1px #eee;">
                                        <th style="padding:5px;">S.No.</td>
                                        <th style="padding:5px;">Name</th>
                                        <th style="padding:5px;">Contact</th>
                                        <th style="padding:5px;">Status</th>
                                        <th style="padding:5px;">Goal</th>
                                        <th style="padding:5px;">Date</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php 
                                              $table = "enquiry";
                                              $data = get_data_id_data_hoho($table, 'conversion_status', 'Hot');
                                              show_enquiry_short2($data);
                                        ?>                                 
                                    </tbody>
                                </table>
                                </div>

                                <div id="menu2" class="container tab-pane fade"><br>
                                  <h3>Cancelled Enquiries</h3>
                                  <table class="example">
                                    <thead>
                                    <tr style="border-bottom: solid 1px #eee;">
                                        <th style="padding:5px;">S.No.</td>
                                        <th style="padding:5px;">Name</th>
                                        <th style="padding:5px;">Contact</th>
                                        <th style="padding:5px;">Status</th>
                                        <th style="padding:5px;">Goal</th>
                                        <th style="padding:5px;">Date</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php 
                                                $table ="enquiry";
                                                $data = get_data_id_data_hoho($table,'conversion_status','Cancelled'); 
                                                show_enquiry_short2($data);
                                         ?>                                    
                                    </tbody>
                                </table>
                                </div>

                                <div id="menu3" class="container tab-pane fade"><br>
                                  <h3>Cold Enquiries</h3>
                                  <table class="example">
                                    <thead>
                                    <tr style="border-bottom: solid 1px #eee;">
                                        <th style="padding:5px;">S.No.</td>
                                        <th style="padding:5px;">Name</th>
                                        <th style="padding:5px;">Contact</th>
                                        <th style="padding:5px;">Status</th>
                                        <th style="padding:5px;">Goal</th>
                                        <th style="padding:5px;">Date</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php 
                                                $table ="enquiry";
                                                $data = get_data_id_data_hoho($table,'conversion_status','Cold'); 
                                                show_enquiry_short2($data);
                                         ?>                                    
                                    </tbody>
                                </table>
                                </div>

                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/bootstrap-notify.min.js"></script>
    <script src="js/vendor/bootstrap-datepicker.js"></script>
    <script src="js/vendor/bootstrap-tagsinput.min.js"></script>
    <script src="js/vendor/jquery.barrating.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>

    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
    type="text/javascript"></script>


   <script type="text/javascript">
     $(document).ready(function() {
    $('.example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
    </script>

 <script type="text/javascript">
      
          $(document).ready(function(){
            $('#dob').datepicker({
            showOn: 'button',
            showAnim: 'slideDown',
            autoclose: true
          });
            $("#dob").change(function(){
              var dob = $('#dob').val();
              alert(dob);
              if(dob == ''){
                $('.error').text('Select DOB!');
              }else{

                dobDate = new Date(dob);
                nowDate = new Date();
                var diff = nowDate.getTime() - dobDate.getTime(); 
                var ageDate = new Date(diff); 
                var age = Math.abs(ageDate.getUTCFullYear() - 1970);
              
             $('#age').val(age);
            }
          });
      });
  </script>

  <script type="text/javascript">
      $(function() {
        $('#enquiry_for').multiselect({
        includeSelectAllOption: true
        });
       
        });
  </script>

  <script type="text/javascript">
      $(function() {
        $('#goal').multiselect({
        includeSelectAllOption: true
        });
       
        });
  </script>
    

</body>

</html>