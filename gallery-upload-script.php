<?php
    require('server.php');

    $db = $connection;    
    $tableName = "galleries";

    if(isset($_POST['submit'])){ 
        echo upload_image($tableName); 
    }

   function upload_image($tableName){
      $booking_id = $_POST['booking_id'];
      $uploadTo = "/Applications/XAMPP/xamppfiles/htdocs/hiraya/uploads/"; 
      $allowedImageType = array('jpg','png','jpeg');

      $images = $_FILES['image_gallery'];
      $imageName = $_FILES['image_gallery']['name'];
      $imageTempName=$_FILES["image_gallery"]["tmp_name"];
      $tableName= trim($tableName);

   if(empty($imageName)) { 
      $error="Please Select Images..";
      return $error;
   } else if(empty($tableName)) {
      $error="You must declare table name";
      return $error;
   } else {
       $error=$savedImageBasename='';

       $num_of_imgs = count($images['name']);

       for ($index=0; $index<$num_of_imgs; $index++) {
         $imageBasename = basename($imageName[$index]);
         $imagePath = $uploadTo.$imageBasename;
         $imageType = pathinfo($imagePath, PATHINFO_EXTENSION); 

         if(in_array($imageType, $allowedImageType)) { 
            // Upload image to server 
            if(move_uploaded_file($imageTempName[$index],$imagePath)){ 
                  
            // Store image into database table
               $savedImageBasename = "('".$imageBasename."'),";   
               save_image($booking_id, $savedImageBasename, $tableName);
               
            } else { 
               $error = 'File Not uploaded ! try again';
            } 
         } else {
            $error .= $_FILES['file_name']['name'][$index].' - file extensions not allowed<br> ';
         }
      }  
   }
      return $error;
   }

      function save_image($booking_id, $savedImageBasename, $tableName){
         global $db;
         if(!empty($savedImageBasename)) {
            $value = trim($savedImageBasename, ',');
          
            $saveImage="INSERT INTO galleries (booking_id, imageName) VALUES ('$booking_id', $value)";

            $exec= $db->query($saveImage);
            
            if($exec){
               echo "Images are uploaded successfully";  
               // header('Location: upload-gallery.php');
            } else{
               echo  "Error: " .  $saveImage . "<br>" . $db->error;
            }
         }
      } 
?>
