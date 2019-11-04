<?php 
        $arr = array();
        if (!empty($_POST['keywords'])) {
         $keywords = $db->real_escape_string($_POST['keywords']);
         $sql = "SELECT name, phone FROM enquiry WHERE name LIKE '%".$keywords."%'";
         $result = $db->query($sql) or die($mysqli->error);
         if ($result->num_rows > 0) {
         while ($obj = $result->fetch_object()) {
         $arr[] = array('name' => $obj->name, 'phone' => $obj->phone);
         }
         }
        }
echo json_encode($arr);
?>