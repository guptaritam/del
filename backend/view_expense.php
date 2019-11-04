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
     <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <?php include('configs/head_section.php');?>
    
</head>
`
<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>    
    <main>
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h1>View Expenses <a href="add_expense.php" class="badge badge-success badge-sm" style="font-size: 10px;">Add New</a></h1>                   
                    <div class="separator mb-5"></div>
                </div>
            </div>


            <div class="row mb-4">

                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <?php see_status2($_REQUEST); ?>
                            <table id="example">
                                <thead>
                                    <tr style="border-bottom: solid 1px #eee;background-color: #ebfdff">
                                        <th style="padding:5px;">Type</th>
                                        <th style="padding:5px;">Amount</th>
                                        <th style="padding:5px;">Date</th>
                                        <th style="padding:5px;">Remarks</th>
                                        <th style="padding:5px;">Paid By</th>
                                        <th style="padding:5px;">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            $table ="expense";
                                            $data = fetch_all_popo($table);      

                                            foreach ($data as $key => $value) {
                                               //print_r ($value);
                                                echo '<tr>
                                                        <td><b>'.$value['expense_type'].'</b></td>
                                                        <td><b>'.$value['expense_amount'].'</b></td>
                                                        <td><b>'.$value['date'].'</b></td>
                                                        <td><b>'.$value['remarks'].'</b></td>
                                                        <td><b>'.$value['paid_by'].'</b></td>

                                                        <td>
                                                            <div class="btn-group mb-1">
                                                                <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="glyph-icon iconsminds-gear"></i>
                                                                </button>
                                                                <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -106px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a class="dropdown-item" href="update_expense.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'">Update</a>
                                                                    <a class="dropdown-item" href="delete_expense.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'" onclick="return confirm(\'Are You Sure You want to Delete This?\')">Delete</a>
                                                                     
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>';
                                            }
                                     ?>                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </main>

   <?php include'jsplugin.php'; ?>

    <script type="text/javascript">
     $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
    </script>

</body>

</html>