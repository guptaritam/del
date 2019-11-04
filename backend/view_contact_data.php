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

<body id="app-container" class="menu-default show-spinner">
    <?php include 'configs/navigation.php'; ?>    
    <main>
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <h1>View Contact Data </h1>                   
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
                               <th>S.No</th>
                               <th>Name</th>
                                <th>Email</th>
                               <th>Contact Data</th>
                               <th>Remark </th>
                               <th>Date </th>
                               <th>Action</th>                              
                             </tr>
                                   
                                </thead>
                                <tbody>
                                    <?php 
                          try {
                                $stmt = $pdo->prepare('SELECT * FROM `contact_data`   ORDER BY date DESC');
                            } catch(PDOException $ex) {
                                echo "An Error occured!"; 
                                print_r($ex->getMessage());
                            }
                            $stmt->execute();
                            $user = $stmt->fetchAll();   
                            $i=1; 
                            foreach($user as $key=>$value){                                 
                              echo '<tr data-whatever='.$value['id'].' data-toggle="modal" data-target="#ContactModal">
                                    <td>'.$i.'</td>
                                    <td>'.$value['name'].'</td>
                                    <td><label class="label label-success">'.$value['email'].'</label></td>
                                    <td><label class="label label-primary">'.$value['phone'].'</label><br/></td>
                                    <td>'.substr(strip_tags(htmlspecialchars_decode($value['remark'])), 0,100).'</td> 
                                    <td>'.$value['date'].'</td>      
                                    <th><a href="delete_contact.php?id='.$value['id'].'" onclick="return confirm(\' Are You Sure You Want to Delete this? \');"><button class="btn btn-danger btn-sm">Delete</button></a>  </th>                        
                                </tr>';
                                $i++;
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

    <div id="ContactModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header" style="background-color: #2bd1e0; color: #fff;">  
                     <center><h4>Contact Details</h4></center>  
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body" id="contact_detail">  
                </div>  
                  
           </div>  
      </div> 
    </div>

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

    <script>
        $('#ContactModal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var recipient = button.data('whatever') // Extract info from data-* attributes
              var modal = $(this);
              var dataString = 'id=' + recipient;
     
                $.ajax({
                    type: "GET",
                    url: "contact_modal.php",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        modal.find('#contact_detail').html(data);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });  
        })
 </script>

</body>

</html>