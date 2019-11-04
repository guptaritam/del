<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';
?>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

<?php
    
    $from_date = $_REQUEST['from_date'];
    $to_date = $_REQUEST['to_date'];
?>
              <h2><b>Filtered Data</b></h2>
              <table class="table" id="example">
                      <thead>
                          <tr style="border-bottom: solid 1px #eee;background-color: #ebfdff">
                              <th style="padding:5px;">Member Id</th>
                              <th style="padding:5px;">Name</th>
                              <th style="padding:5px;">Mobile</th>
                              <th style="padding:5px;">Date</th>
                              <th style="padding:5px;">Package</th>
                              <th style="padding:5px;">Amount</th>
                          </tr>
                      </thead>
                      <tbody>
                    <?php 
                          $table ="member";
                          try{
                              $stmt = $pdo->prepare("SELECT * FROM member WHERE date BETWEEN '".$from_date."' AND '".$to_date."'");
                          } catch(PDOException $ex){
                              echo "An Error occured!"; 
                              print_r($ex->getMessage());
                          }     
                          $stmt->execute();
                          $user = $stmt->fetchAll();

                          foreach ($user as $key => $value) {
                               $ex = $value['membership_type'];
                              $exp = explode("/", $ex);
                              $package = $exp[0] ."-".$exp[2];
                             //print_r ($exp);
                              echo '<tr>
                                      <td>'.$value['member_id'].'</td>

                                      <td>'.$value['member_name'].'</td>

                                      <td>'.$value['phone_number'].'</td>

                                      <td>'.$value['date'].'</td>

                                      <td>'.$package.'</td>

                                      <td>'.$exp[1].'.00</td>
                                   </tr>';
                              }
                           ?>                                    
                      </tbody>
                  </table>

    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap-datepicker.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/perfect-scrollbar.min.js"></script>
    <script src="js/vendor/Sortable.js"></script>
    <script src="js/vendor/mousetrap.min.js"></script>
    <script src="js/vendor/datatables.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <script type="text/javascript">
         $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    </script>                


