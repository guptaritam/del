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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<style>
    
    body
{
  background-color:#f5f5f5;
}
.imagePreview {
    width: 140%;
    height: 180px;
    background-position: center center;
  background:url(http://cliquecities.com/assets/no-image-e4699ae24f866f6cbdf8ba2444ee5c4e.jpg);
  background-color:#fff;
    background-size: cover;
  background-repeat:no-repeat;
    display: inline-block;
  box-shadow:0px -4px 6px 2px rgba(0,0,0,0.2);
}
.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.imgUp
{
  margin-bottom:15px;
}

</style>

</head>

<body id="app-container" class="menu-default show-spinner">
     <?php include 'configs/navigation.php'; ?>

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Add New Staff</h1>                   
                    <div class="separator mb-5"></div>

                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body" style="margin-left:60px;">
                            <?php see_status2($_REQUEST); ?>
                            <h5 class="mb-4">Basic Informations</h5>
                            <form action="add_staff_handle.php" method="POST" onsubmit="return validate();" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" style="font-weight: bold;">Type</label>
                                            <select class="form-control" name="type" id="type" >
                                                <option value="">------Select------</option>
                                                <option value="staff">Staff</option>
                                                <option value="trainer">Trainer</option>
                                            </select>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1" style="font-weight: bold;">Full Name</label>
                                           <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Full Name" >
                                        </div>
                                    </div>
                                  </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"  
                                        placeholder="Enter Email" >
                                </div></div></div>

                                <div class="row">
                                  <div class="col-sm-4">
                                   <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Password</label>
                                     <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" 
                                        placeholder="Enter Password">
                                   </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                     <label for="exampleInputEmail1" style="font-weight: bold;">Contact Number</label>
                                      <input type="text" class="form-control" name="mobile" id="mobile" aria-describedby="emailHelp" 
                                        placeholder="Enter Contact Number" >
                                    </div>
                                 </div>
                                </div>

                               <div class="row">
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                     <label for="exampleInputEmail1" style="font-weight: bold;">Salary</label>
                                      <input type="text" class="form-control" name="salary" id="salary" aria-describedby="emailHelp" 
                                        placeholder="0.00" >
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                     <label for="exampleInputEmail1" style="font-weight: bold;">Address</label>
                                      <textarea type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp" placeholder="Enter Address" ></textarea>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-2 imgUp">
                                     <label for="exampleInputEmail1" style="font-weight: bold;">User Photo</label>
                                    <div class="imagePreview"></div>
                                <label class="btn btn-primary">Upload
                                    <input type="file" class="uploadFile img" name="upload_img" id="upload_img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" ></label>
                                  </div>
                                 </div>

                                <div class="row">
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1" style="font-weight: bold;">Joining Date</label>
                                        <input type="text" class="form-control datepicker" name="joining_date" id="joining_date" aria-describedby="emailHelp" 
                                        placeholder="Choose Date" >
                                    </div>
                                  </div>
                               </div>

                                 <div class="row">
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                       <label for="exampleInputEmail1" style="font-weight: bold;">Status</label>
                                        <select class="form-control" name="status" id="status" aria-describedby="emailHelp"  >
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option></select>
                                     </div>
                                   </div>
                                 </div>

                                <!-- <div class="row">
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Allow Delete</label>
                                   <select class="form-control" name="allow_delete" id="allow_delete" aria-describedby="emailHelp"  >
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option></select>
                                </div></div></div> -->

                                <button type="submit" class="btn btn-primary mb-0">Add New Staff</button>
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

  <!-- <script>

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