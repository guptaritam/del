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

<style>
    


</style>

</head>

<body id="app-container" class="menu-default show-spinner">
     <?php include 'configs/navigation.php'; ?>

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Send Notification</h1>                   
                    <div class="separator mb-5"></div>

                </div>
            </div>

        <div class="row">

            <div class="col-lg-6">
              <div class="card mb-4">
                <div class="card-body">
                    <?php see_status2($_REQUEST); ?>
                    <h5 class="mb-4">Basic Informations</h5>
                    <form action="notification_handle.php" method="POST" onsubmit="return validate_form();">

                     <div class="col-lg-6">
                        <div class="form-group">
                            <label for="send_by" style="font-weight: bold;">Sender Id</label>
                            <select class="form-control" name="send_by" id="send_by" >
                                <option value="">Select</option>
                                <option value="ADMIN001"><?php echo $pdo_auth['name'];?></option>
                                <option value="ADMIN001">ADMIN001</option>
                                <option value="ADMIN002">ADMIN002</option>
                                 </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                              <div class="form-group">
                               <label for="select2-disabled-inputs-multiple" class="control-label" style="font-weight: bold;">   Select Member</label>
                              <div class="input-group">
                                <select id="select_member" name="select_member" class="form-control select2-multiple select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true" placeholder="Select Multiple">
                                <?php $data = fetch_all_popo("member");
                                        foreach ($data as $key => $value) {
                                                $str = ucfirst($value['member_name']);
                                            echo '<option>'.$str. "-" .$value['phone_number'].'</option>';
                                        }
                                ?>
                                </select>
                             <span class="select2 select2-container select2-container--bootstrap select2-container--below select2-container--focus" dir="ltr">
                                  <span class="selection"></span>
                            </span>
                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                        </div>
                         </div>
                        </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Message</label>
                                    <textarea name="message" class="form-control" id="message" placeholder="Type message Here ....  " rows="3" cols="3"></textarea>
                                </div></div>
                                
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary mb-0">Send Message</button></div>
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
        
    $(document).ready(function() {
    $('.mdb-select').materialSelect();
     });
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
 -->

</body>

</html>