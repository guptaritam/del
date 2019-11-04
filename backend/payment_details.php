<?php
   session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
?>

<html>
<head>
  <title>
    Prefit : Club Of India
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  
  <style type="text/css">
  	p
  	{
  		margin: 0px 0 2px;
  	}
    body{
      font-family: arial;
    }

    td{
          font-size: 11px;
          /*border:solid 1px #ccc;*/
          padding:10px;
          font-size: 14px;
          border-bottom:solid 1px #ccc;
        }
        th{
          text-align: left;
          background-color: #2ec0cb;
          padding:10px;
          color: #fff;
        }

    @media print
    {    
        .no-print, .no-print *
        {
            display: none !important;
        }

        body{
          font-size: 11px;
          font-family: arial;
          padding:20px;
        }

        td{
          font-size: 11px;
          /*border:solid 1px #ccc;*/
        }
    }
    
  </style>
</head>
 <body>
  

 <?php 
    try {
          $stmt = $pdo->prepare('SELECT * FROM `payment` WHERE `id`="'.base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']).'" ');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetchAll();   
      $i=1; 
      foreach($user as $key=>$value){   
        $data = get_data_id_data("member", "member_id", $value['member_id']);                
          echo'</br>
                <table style="width:100%" cellspacing="0" >
                <tr>
                  <td style="padding:10px;width:300px;">
                    <div style="padding: 10px;"></div>
                    <img src="../img/pre.png" style="width: 250px;">
                   
                  </td>

                  <td style="padding:10px;text-align:right">
                     <b>Member Id:</b> '.$data['member_id'].'</br>
                     <b>Package:</b> '.$data['membership_type'].'</br>
                     <b>Name:</b> '.$data['member_name'].'</br>
                     <b>Invoice Number:</b> '.$i.'</br>
                     <b>Phone No: </b> '.$data['phone_number'].'</br>
                     <b>Address: </b> '.$data['address'].' </br>
                     <b>Age: </b> '.$data['age'].'</br> 
                     <b>Validity: </b> '.$data['validity_from'].' <b>To</b> '.$data['validity_to'].'</br> 
                     <b>Date : </b> '.$data['date'].'
                  </td>
                </tr>
              </table>';
                $i++;
              }
      ?>


      <table style="width:100%">
        <tr>
          <th>S.no</th>
          <th>Installment</th>          
          <th>Date</th>
          <th>Payment Mode</th>
          <th>Amount</th>
        </tr>
        <?php
          try {
              $stmt = $pdo->prepare('SELECT * FROM `payment` WHERE `member_id`="'.$data['member_id'].'" ');
          } catch(PDOException $ex) {
              echo "An Error occured!"; 
              print_r($ex->getMessage());
          }
          $i=1;
          $stmt->execute();
          $user = $stmt->fetchAll();  
          $total=0;
          foreach ($user as $key => $value) {
            echo '<tr>
                    <td>'.$i.'</td>
                    <td>Installment - '.$i.'</td>                    
                    <td>'.$value['date'].'</td>
                    <td>'.$value['paid_by'].'</td>
                    <td>Rs.'.$value['pay_amount'].'.00</td>
                  </tr>';
                  //$total+=$value['pay_amount'];
            $i++;
          }
          
           $total_paid = $data['paid_amount'];
           $amt = $data['total_amount']; 
        //$dis = $data['discount']; 
        // $after_dis = $fee * $dis/100;
        // $fee1 = $fee - $after_dis;
          
        ?>
        
        <tr style="background-color: #eee;">
          <td colspan="4" style="text-align: right;font-weight: bold;border:0;padding:5px;">Total Paid :</td>
          <td style="font-size: 16px;font-weight: bold;border:0;padding:5px;"> Rs.  <?php echo $total_paid; ?>.00</td>
        </tr>

        <tr style="background-color: #eee;">
          <td colspan="4" style="text-align: right;font-weight: bold;border:0;padding:5px;">Total Amount :</td>
          <td style="font-size: 16px;font-weight: bold;border:0;padding:5px;"> Rs.  <?php echo $amt; ?>.00</td>
        </tr>
        
        <tr style="background-color: #eee;">
          <td colspan="4" style="text-align: right;font-weight: bold;border:0;padding:5px;">Amount Remaining :</td>
          <td style="font-size: 16px;font-weight: bold;border:0;padding:5px;"> Rs.  <?php echo $data['due_amount']; ?>.00</td>
        </tr>
        
      </table>


      <hr/>
      <div style="font-size: 9px;padding:20px;"><b>Terms and Conditions : </b><br/>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div><br>

      <center><button class="btn btn-primary hidden-print" onclick="myFunction()" style="margin-bottom: 30px; "><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button></center>
</body>
<script>
function myFunction() {
    window.print();
}
</script>
</html>

