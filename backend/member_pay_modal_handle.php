<?php
   session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

   $id = $_GET['id'];
   $lata = get_data_id_data("member", "id", $id);
   $date = $lata['date'];
   $pending_amt = $lata['due_amount'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Bootstrap modal</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
<form method="post" action="add_payment_handle.php" role="form" onsubmit="return checkamt()">
  <div class="modal-body">
    <div class="form-group">
        <label for="id" style="font-weight: bold;">ID</label>
        <input type="text" class="form-control" id="member_id" name="member_id" value="<?php echo $lata['member_id'];?>" readonly="true"/>
    </div>
    <div class="form-group">
        <label for="name" style="font-weight: bold;">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $lata['member_name'];?>" readonly/>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1" style="font-weight: bold;">Paid By</label>
                <select class="form-control" name="paid_by" id="paid_by" aria-describedby="emailHelp">
                    <option value="Cash">Cash</option>
                    <option value="Check">Check</option>
                    <option value="Internet Banking">Internet Banking</option>
                    <option value="Debit">Debit</option>
                    <option value="Credit">Credit</option>
                    <option value="Paytm">Paytm</option>
                </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1" style="font-weight: bold;">Receipt Type</label>
                <select class="form-control" name="receipt_type" id="receipt_type" aria-describedby="emailHelp">
                    <option value="Manual">Manual</option>
                    <option value="Printed">Printed</option>
                    <option value="Email">Email</option>
                    <option value="Download Pdf">Download Pdf</option>
                    <option value="SMS">SMS</option>
                </select>
    </div>

    <div class="form-group">
       <label for="exampleInputEmail1" style="font-weight: bold;">Date</label>
             <input type="text" class="form-control datepicker" name="date" id="date" placeholder="Choose Date" >
     </div>

     <div class="form-group">
       <label for="exampleInputPassword1" style="font-weight: bold;">Remarks</label>
             <textarea name="remarks" class="form-control" id="remarks" placeholder="Remark Here" rows="3" cols="2"></textarea>
     </div>

    <!-- <input type="hidden" class="form-control" id="member_id" name="member_id" value="<?php echo $lata['member_id'];?>"> -->

    <div class="form-group">
         <label for="address" style="font-weight: bold;">Pending Amount</label>
         <input type="text" class="form-control" id="pending_amount" name="pending_amount" value="<?php echo $pending_amt; ?>" readonly/>
    </div>
    <div class="form-group">
             <label for="email" style="font-weight: bold;">Pay Amount</label>
         <input type="text" class="form-control" id="pay_amount" name="pay_amount" />
    </div>
    </div>
    <div class="modal-footer">
      <?php 
            if($pending_amt <= 0){
                echo '<input type="submit" class="btn btn-primary" name="submit" value="Pay" disabled/>&nbsp';
            }
            else{
                echo '<input type="submit" class="btn btn-primary" name="submit" value="Pay" />&nbsp';
            }
      ?>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </form>

    <script src="js/vendor/bootstrap-datepicker.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>

    <script type="text/javascript">

      $(document).ready(function() {
      var register_date = "<?php echo $date ?>";
    $('#date').datepicker({
    format: "dd/mm/yyyy",
    startDate: register_date,
    autoclose: true
      });
    $('#date').datepicker('setDate', register_date);
    });

  </script>

  <script type="text/javascript">
    function checkamt(){
      var pay_amount = $('#pay_amount').val();
      var pending_amount = "<?php echo $pending_amt; ?>";
      alert(pending_amount);
      alert(pay_amount);
      if(pending_amount < pay_amount){
        alert("Pay Amount Can't be more then Pending Amount.");
        return false;
      }
      else{
        return true;
        
      }
    }
     
  </script>
    
</body>
</html>