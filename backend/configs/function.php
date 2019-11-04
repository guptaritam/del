<?php 
function add_notification($notification, $for){
    include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);
        $table = "notification";
        $key_list = "`notification`, `for`";
        $value_list = "'".$notification."', '".$for."'";
        $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    }

    function view_page($link, $choice, $value){
      header('Location:'.$link.'?choice='.$choice.'&value='.$value);
    }
    

    function get_data_col($table, $col, $value){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$value.'"  ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetchAll();
      return $user;
    }

     function get_data_col_asc($table, $col, $value){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$value.'"  ORDER BY date ASC ');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetchAll();
      return $user;
    }



     function get_village($gram_panchayat){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $gram_panchayat = explode("_", $gram_panchayat);
          $id = $gram_panchayat[1];
          $gram_panchayat = $gram_panchayat[0];
          $stmt = $pdo->prepare('SELECT * FROM `village` WHERE `gram_panchayat_id`="'.$id.'"  ORDER BY village ASC '); 
          echo 'SELECT * FROM `village` WHERE `gram_panchayat_id`="'.$id.'"  ORDER BY village ASC ';         
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetchAll();
      return $user;
    }
    
    
    function fetch_all_district($table){
         include 'connection.php';
        // echo 'SELECT * FROM `'.$table.'` WHERE `'.$column.'`='.$id.' ORDER BY date DESC';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
             echo 'SELECT * FROM `'.$table.'` ORDER BY district ASC';
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` ORDER BY district ASC');

            } catch(PDOException $ex) {
                echo "An Error occured!"; 
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
    }
    
     function get_blocks($district){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $district = explode("_", $district);
          $id = $district[1];
          $district = $district[0];
          $stmt = $pdo->prepare('SELECT * FROM `block` WHERE `district_id`="'.$id.'"  ORDER BY block ASC ');
          //echo 'SELECT * FROM `block` WHERE `district`="'.$district.'"  ORDER BY block ASC ';
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetchAll();
      return $user;
    }


    function get_gram_panchayat($block){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $block = explode("_", $block);
          $id = $block[1];
          $block = $block[0];
          $stmt = $pdo->prepare('SELECT * FROM `gram_panchayat` WHERE `block_id`="'.$id.'"  ORDER BY gram_panchayat ASC ');    
          //echo 'SELECT * FROM `gram_panchayat` WHERE `block_id`="'.$id.'"  ORDER BY block ASC ';      
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetchAll();
      return $user;
    }


function get_data_id($table){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'`  ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      return $user;
    }

    function countIt($date,$count){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);   
        try {
            $stmt = $pdo->prepare('INSERT INTO counter(`date`,`count`) VALUE("'.$date.'", "'.$count.'")');
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            print_r($ex->getMessage());
        }
        $stmt->execute();       
    }

    function inclreaseCount($date,$count){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);   
        try {
            $stmt = $pdo->prepare('UPDATE counter SET `count`="'.($count).'" WHERE `date`="'.$date.'"');
            //echo 'UPDATE counter SET `count`="'.$count.'" WHERE `date`="'.$date.'"';
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            print_r($ex->getMessage());
        }
        $stmt->execute();       
    }

     function fetch_all_popo($table){
         include 'connection.php';
        // echo 'SELECT * FROM `'.$table.'` WHERE `'.$column.'`='.$id.' ORDER BY date DESC';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` ORDER BY date DESC');

            } catch(PDOException $ex) {
                echo "An Error occured!"; 
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
    }


    function fetch_all_membership($table){
         include 'connection.php';
        // echo 'SELECT * FROM `'.$table.'` WHERE `'.$column.'`='.$id.' ORDER BY date DESC';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'`');

            } catch(PDOException $ex) {
                echo "An Error occured!"; 
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
    }


      function get_data_id2($table){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'`  ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      return $user;
    }

     function get_data_id_data($table, $col, $id){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$id.'" ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      return $user;
    }

    function get_data_id_dataName($table, $col, $search){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$search.'" ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      return $user;
    }

    function get_data_id_data_hoho($table, $col, $id){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$id.'" ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetchAll();
      return $user;
    }


    function stutusify($conversion_status){
      switch ($conversion_status) {
        case 'Warm':
          return '<span class="badge badge-warning mb-1">Warm</span>';
          break;

        case 'Hot':
          return '<span class="badge badge-danger mb-1">Hot</span>';
          break;

        case 'Cold':
          return '<span class="badge badge-primary mb-1">Cold</span>';
          break;

        case 'Cancelled':
          return '<span class="badge badge-dark mb-1">Cancelled</span>';
          break;
        
        default:
          return '<span class="badge badge-warning mb-1">Warm</span>';
          break;
      }
    }

     function count_data($table, $col, $id){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);                                 
        try {
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$id.'" ORDER BY date DESC ');
           // echo 'SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$id.'" ORDER BY date DESC ';
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            print_r($ex->getMessage());
        }
        $stmt->execute();
        $user = $stmt->rowCount();
        return $user;
    }


 function get_data_id_data_alll($table, $limits){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` ORDER BY date DESC LIMIT '.$limits);
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetchAll();
      return $user;
    }
    
    
    function get_data_id_data_alll_mata($table, $tx_address){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE tx_address LIKE "'.$tx_address.'" ORDER BY date DESC');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      return $user;
    }

    function count_notification($table, $id){
        include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `notification` WHERE `for`="admin" AND `status`="Unread" ORDER BY date DESC');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->rowCount();
      return $user;
    }
    

      function count_tem_in_table($table){
        include 'connection.php';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'`');
            } catch(PDOException $ex) {
                echo "An Error occured!"; 
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetchAll();
            return str_pad(count($user), 3, '0', STR_PAD_LEFT);
    }

     function count_tem_in_table2(){
        include 'connection.php';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare("SELECT * FROM  member WHERE `due_amount` > '0' ORDER BY date DESC");
            } catch(PDOException $ex) {
                echo "An Error occured!"; 
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetchAll();
            return str_pad(count($user), 3, '0', STR_PAD_LEFT);
    }

     function count_notification_creditor($table){
        include 'connection.php';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'`');
            } catch(PDOException $ex) {
                echo "An Error occured!"; 
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetchAll();
            return str_pad(count($user), 3, '0', STR_PAD_LEFT);
    }



    function get_last_id($table){
        include 'connection.php';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` ORDER BY id DESC');
            } catch(PDOException $ex) {
                echo "An Error occured!"; 
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetch();
            return $user['id'];
    }


function show_enquiry_short($data){ 
    $i=1; 
    foreach ($data as $key => $value) {                                                    
      echo '<tr>
              <td>'.$i.'</td>
              <td><b style="text-transform:capitalize">'.$value['name'].'</b> </td>
              <td><b>'.$value['phone'].'</b></td>
              <td>'.stutusify($value['conversion_status']).'</td>
              <td>
                  <div class="btn-group mb-1">
                      <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="glyph-icon iconsminds-gear"></i>
                      </button>
                      <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -106px, 0px); top: 0px; left: 0px; will-change: transform;">
                          <a class="dropdown-item" href="update_new_enquiry.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'">Update</a>
                          <a class="dropdown-item" href="delete_new_enquiry.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'" onclick="return confirm(\'Are You Sure You want to Delete This?\')">Delete</a>
                           <a class="dropdown-item" href="follow_up_enquiry.php?8d1d4357e1e1c6b3e4ea6df4ff01fede='.base64_encode($value['id']).'">Follow Ups</a>
                      </div>
                  </div>
              </td>
          </tr>';
          $i++;
      }
}

function show_enquiry_short2($data){ 
    $i=1; 
    foreach ($data as $key => $value) {                                                    
      echo '<tr style="font-size:12px;">
              <td>'.$i.'.</td>
              <td style="text-transform:capitalize">'.$value['name'].' </td>
              <td>'.$value['phone'].'</td>
              <td>'.stutusify($value['conversion_status']).'</td>
              <td>'.$value['purpose'].'</td>
              <td>'.$value['date'].'</td>
              
          </tr>';
          $i++;
      }
}

//  function fetch_all_popoOne($table){
    //      include 'connection.php';
    //     // echo 'SELECT * FROM `'.$table.'` WHERE `'.$column.'`='.$id.' ORDER BY date DESC';
    //      $pdo = new PDO($dsn, $user, $pass, $opt);
    //      try {
    //         $stmt = $pdo->prepare('SELECT `id`, `member_name`, `due_amount` FROM '.$table.' WHERE `due_amount`> "0" ');

    //         } catch(PDOException $ex) {
    //             echo "An Error occured!"; 
    //             print_r($ex->getMessage());
    //         }
    //         $stmt->execute();
    //         $user = $stmt->fetchAll();
    //         return $user;
    // }


// <script type="text/javascript">

//     $(function(){
//       $('#dob').datepicker({
//         showOn: 'button',
//         showAnim: 'slideDown'
//       });
      
//       $(document).ready(function(){
//         $("#dob").change(function(){
//           var dob = $('#dob').val();
//           if(dob == ''){
//             $('.error').text('Select DOB!');
//           }else{
//             dobDate = new Date(dob);
//             nowDate = new Date();
          
//             var diff = nowDate.getTime() - dobDate.getTime();
          
//             var ageDate = new Date(diff); // miliseconds from epoch
//             var age = Math.abs(ageDate.getUTCFullYear() - 1970);
          
//          $('#age').val(age);
//         }
//       });
//     });
//   });
//   </script>

   function get_a_data($table, $col, $value){
       include 'connection.php';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);        
                         
      try {
          $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` WHERE `'.$col.'`="'.$value.'"  ORDER BY date DESC ');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetchAll();
      return $user;
    }

    function get_last_member_id($table){
        include 'connection.php';
         $pdo = new PDO($dsn, $user, $pass, $opt);
         try {
            $stmt = $pdo->prepare('SELECT * FROM `'.$table.'` ORDER BY id DESC');
            } catch(PDOException $ex) {
                echo "An Error occured!"; 
                print_r($ex->getMessage());
            }
            $stmt->execute();
            $user = $stmt->fetch();
            return $user['member_id'];
    }

 ?>