<?php
   session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

   $id = $_GET['id'];
   echo $id;
   $lata = get_a_data("member", "id", $id);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Bootstrap modal</title>
 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>    
    <main>
        <div class="container-fluid">

            <div class="row mb-4">
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="img/defalt.jpg" style="width: 100%">   
                            <hr/>
                            <h4>Basic Info</h4>   
                            <div style="padding:5px">
                                <b style="font-size: 13px;"><?php echo $lata['member_name']; ?> (<?php echo $lata['age']; ?>)</b>
                                <div style="color: green"><?php echo $lata['membership_type']; ?></div>
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
                                             $counts = count_data("enquiry_follow_up", "member_id", $id);
                                             $remark="";
                                             echo "Total of ".$counts." / ";
                                             if($counts>0){
                                                $i=1;
                                                    $kata = get_data_col_asc("enquiry_follow_up", "member_id", $id);

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
                                     <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#followup_modal">Add New Follow Up</button> -->
                                 </div>
                             </div>         
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>
    </body>
