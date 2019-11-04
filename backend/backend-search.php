<?php session_start();
    include 'configs/connection.php';
    include 'configs/site_confirgurations.php'; 
    include 'configs/pdo_class_data.php';    
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'configs/function.php';

 
try{
    if(isset($_REQUEST["term"])){
        $sql = "SELECT * FROM enquiry WHERE name  LIKE :term";
        $stmt = $pdo->prepare($sql);

        $term = $_REQUEST["term"] . '%';
        $stmt->bindParam(":term", $term);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                    $enquiry_id = $row['enquiry_id'];
                    $sata = get_data_id_data("member", "enquiry_id", $enquiry_id);
                    if($sata['enquiry_id']==""){
                         echo "<p data-value=".$row["id"].">" . $row["name"] . " (".$row['phone'].") </p>";
            
                     }
                    }
            } else{
            echo "<p>No matches found</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
unset($stmt);
unset($pdo);
?>