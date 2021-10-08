<?php
    require('server.php');

    $db=$connection; // Enter your Connection variable;

    $tableName='galleries'; // Enter your table Name;
    $fetchImage= fetch_image($tableName);
          // fetching padination data

    function fetch_image($tableName){
       global $db;
       $tableName= trim($tableName);

      if(!empty($tableName)){
        $query = "SELECT * FROM galleries ORDER BY gallery_id DESC";
        $result = $db->query($query);
        if ($result->num_rows > 0) {
          $row= $result->fetch_all(MYSQLI_ASSOC);
  
          return $row;       
          
        }else{
          
          echo "No Image is stored in the database";
        }
      } else {
        echo "you must declare table name to fetch Image";
      }
    }  
?>
