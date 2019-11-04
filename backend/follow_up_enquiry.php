<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

    $id = base64_decode($_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']);
    $lata = get_data_id_data("enquiry", "id", $id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
     <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include('configs/head_section.php');?>
    

</head>

<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>    
    <main>
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h1>Add Follow Ups <a href="add_new_enquiry.php" class="badge badge-success badge-sm" style="font-size: 10px;">Add New Enquiry</a></h1>                   
                    <div class="separator mb-5"></div>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="img/defalt.jpg" style="width: 100%">   
                            <hr/>
                            <h4>Basic Info</h4>   
                            <div style="padding:5px">
                                <b style="font-size: 13px;"><?php echo $lata['name']; ?> (<?php echo $lata['age']; ?>)</b>
                                <div style="color: green"><?php echo $lata['occupation']; ?></div>
                                <div style="font-size: 12px;"><?php echo $lata['phone']; ?></div>
                                <label class="badge badge-primary"><?php echo $lata['gender']; ?></label>
                                <div style="border-bottom: solid 1px #eee;margin:10px 0px;"></div>
                                <div style="font-size: 12px;"><?php echo $lata['address']; ?></div>
                                <div style="border-bottom: solid 1px #eee;margin:10px 0px;"></div>
                                <a class="btn btn-secondary btn-xs mb-1" href="update_new_enquiry.php?8d1d4357e1e1c6b3e4ea6df4ff01fede=<?php echo base64_encode($lata['id']); ?>" >Edit User</a>

                            </div>                      
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                             <h4>Detailled Info</h4>   
                             <hr/>      
                             <div class="row">
                                 <div class="col-lg-12">
                                     <table class="table table-border">
                                        <tr>
                                             <td style="width: 150px"><b>Enquiry Status</b></td>
                                             <td><label class="badge badge-danger"><?php echo $lata['conversion_status'];  ?></label></td>
                                         </tr>
                                         <tr>
                                             <td style="width: 150px"><b>Enquiring For</b></td>
                                             <td><?php echo $lata['service'];  ?></td>
                                         </tr>
                                         <tr>
                                             <td><b>Purpose</b></td>
                                             <td><?php echo $lata['purpose'];  ?></td>
                                         </tr>
                                         <tr>
                                             <td><b>Had Gym Before </b></td>
                                             <td><?php echo $lata['had_gym_before'];  ?></td>
                                         </tr>
                                         <tr>
                                             <td colspan="2"><b>Previous Gym Details</b>
                                                <br/><?php echo $lata['issue_with_previous_gym'];  ?>
                                            </td>
                                         </tr>
                                         <tr>
                                             <td><b>Any health Issue</b></td>
                                             <td><?php echo $lata['any_health_issue'];  ?></td>
                                         </tr>

                                         <tr>
                                             <td colspan="2"><b>Any Health Issues</b>
                                                <br/><?php echo $lata['health_issue'];  ?>
                                            </td>
                                         </tr>

                                         <tr>
                                             <td><b>Reference From</b></td>
                                             <td><?php echo $lata['reference_from_media'];  ?></td>
                                         </tr>
                                     </table>
                                 </div>
                             </div>         
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                             <h4>Follow Ups</h4>   
                             <hr/>      
                             <div class="row">
                                 <div class="col-lg-12">
                                     <table class="table table-border">
                                        <tr>
                                             <td style="width: 150px"><b>S.No.</b></td>
                                             <td>Date</td>
                                             <td>Remark</td>
                                             <td>Status</td>
                                         </tr>
                                         <?php 
                                             $date = date("d-m-Y");
                                             $counts = count_data("enquiry_follow_up", "enquiry_id", $id);
                                             $remark="";
                                             echo "Total of ".$counts." / ";
                                             if($counts>0){
                                                $i=1;
                                                    $kata = get_data_col_asc("enquiry_follow_up", "enquiry_id", $id);

                                                    foreach ($kata as $key => $value) {
                                                        echo '<tr>
                                                             <td style=""><b>'.$i.'</b></td>
                                                             <td style="background-color: #f5f5f5;width: 150px">'.$value['date'].'</td>
                                                             <td>'.$value['remark'].'</td>
                                                             <td><label class="badge badge-danger">'.$value['status'].'</label></td>
                                                         </tr>';
                                                         $i++;
                                                         $date = $value['date'];
                                                         $remark = $value['remark'];
                                                    }  

                                             }else{
                                                echo "No Followup Taken till Date";
                                             } 
                                         ?>
                                         
                                     </table>

                                     <hr/>
                                     <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#followup_modal">Add New Follow Up</button>
                                 </div>
                             </div>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal" id="followup_modal">
      <div class="modal-dialog">
        <div class="modal-content">         
          <div class="modal-body">
            <h3>Enter Followup Remarks</h3><hr/>

            <form action="enquiry_followup_handle.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Follow Up Date : </label>
                    <input type="text" readonly="" name="date" id="followup_date" class="form-control" placeholder="Enter Followup Date" value="<?php echo $date; ?>" >
                </div>

                <div class="form-group">
                    <label>Remark : </label>
                    <textarea class="form-control" name="remark" placeholder="Enter Followup Remark"  ></textarea>
                </div>

                <div class="form-group">
                    <label>Status : </label>
                    <select class="form-control" name="status">
                        <option>Hot</option>
                        <option>Warm</option>
                        <option>Cold</option>
                        <option>Cancelled</option>
                        <option>Expected Payment</option>
                    </select>
                </div>
                <input type="hidden" name="8d1d4357e1e1c6b3e4ea6df4ff01fede" value="<?php echo $_REQUEST['8d1d4357e1e1c6b3e4ea6df4ff01fede']; ?>">

                <div class="form-group">
                    <label>Next Date : </label>
                    <input type="text" name="next_date" id="followup_nextdate" class="form-control datepicker" placeholder="Enter Followup Date"  >
                </div>
                <hr/>
                <button type="submit" class="btn btn-sm btn-success">Save Followup</button>
                <button  class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/perfect-scrollbar.min.js"></script>
    <script src="js/vendor/Sortable.js"></script>
    <script src="js/vendor/mousetrap.min.js"></script>
    <script src="js/vendor/datatables.min.js"></script>
    <script src="js/vendor/bootstrap-datepicker.js"></script>
    <script src="js/vendor/fullcalendar.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>
    
    <?php 
        if ($counts<2 && $remark=="") {
            echo '<script type="text/javascript">      
                   $(window).on("load",function(){        
                    $("#followup_modal").modal("show");
                  }); 
               </script>';
        }
     ?>
</body>

</html>