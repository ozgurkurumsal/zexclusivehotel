<?php
include('configuration.php');
header('Access-Control-Allow-Origin: *');


// print_r($POST);


if(isset($_POST)){
 
   $name = $_FILES['true']['name'];
   $target_dir = "../../uploads/";
   $target_file = $target_dir . basename($_FILES["true"]["name"]);
 
   // Select file type
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
   // Valid file extensions
   $extensions_arr = array("jpg","jpeg","png","gif");
 
   // Check extension
   if( in_array($imageFileType,$extensions_arr) ){
  
     // Convert to base64 
  //    $image_base64 = base64_encode(file_get_contents($_FILES['true']['tmp_name']) );
  //    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
  //    // Insert record
  //  //   $query = "insert into images(image) values('".$image."')";
  //  //   mysqli_query($con,$query);
        
  //        $sql = $db->prepare("INSERT INTO Menu (id,MenuBaslik) VALUES (?,?) ON DUPLICATE KEY UPDATE id = (?), MenuBaslik = (?)");
  //        $sql->bindParam(1,100);
  //        $sql->bindParam(2, $name);
  //        $sql->bindParam(3,100);
  //        $sql->bindParam(4, $name);
        
  //       if (!$sql->execute()) {
  //         print_r($sql->errorInfo());
  //       }else {
  //        echo json_encode(array("result" =>"ok"));
  //       };
        
    // echo $image;
     // Upload file
     move_uploaded_file($_FILES['true']['tmp_name'],$target_dir.$name);
    //  unlink($target_dir.$name);
   }
  
 }



// if(isset($_POST)){
 


    
   
   //  $name = $_FILES["true"]["name"];
   //  $target_dir = "uploads/";
   //  $target_file = $target_dir . basename($_FILES["true"]["name"]);
    


   // //  echo $name;
   //    // print_r($_FILES);
   // //   echo json_encode(array('dosya' => $target_dir.$name,"target" => $target_file));
   //  // Select file type
   //  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   

    
   //  // Valid file extensions
   //  $extensions_arr = array("jpg","jpeg","png","gif");
  
   //  // Check extension
   //  if( in_array($imageFileType,$extensions_arr) ){
   
   //     // Insert record
   //  //    $query = "insert into images(name) values('".$name."')";
   //  //    mysqli_query($con,$query);
   // //   echo json_encode(array('dosya' => $target_dir.$name,"target" => $target_file,"type"=>$imageFileType));
   
   //     // Upload file
   //     move_uploaded_file($_FILES['true']['tmp_name'],$target_dir.$name);
  
   //  }
   
//   }

?>