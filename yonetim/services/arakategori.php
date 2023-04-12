<?php 
include('configuration.php');
header('Content-Type: application/json');


switch($_SERVER['REQUEST_METHOD'])
{
case 'GET': 

  // echo $_GET['AnaKategori'];
            // $data = json_decode(file_get_contents('php://input'), true);
            $sql = $db->prepare("SELECT DISTINCT AraKategori FROM hyt WHERE AnaKategori = :AnaKategori ORDER BY id"); 
            // $sql->bindValue(':AnaKategori', $_GET["AnaKategori"]);
             $sql->execute(['AnaKategori' => $_GET["AnaKategori"]]);
            // $sql->execute();
            $value  = $sql->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($value);
    
   break;
case 'POST': 
            $data = json_decode(file_get_contents('php://input'), true);
            // print_r($data);
            $sql = $db->prepare("INSERT INTO Menu (id,MenuBaslik) VALUES (?,?) ON DUPLICATE KEY UPDATE id = (?), MenuBaslik = (?)");
            $sql->bindParam(1, $data["id"]);
            $sql->bindParam(2, $data["name"]);
            $sql->bindParam(3, $data["id"]);
            $sql->bindParam(4, $data["name"]);
            if (!$sql->execute()) {
              print_r($sql->errorInfo());
            }else {
             echo json_encode(array("result" =>"ok"));
            }


  break;
case 'PUT': echo "edit"; break;
case 'DELETE': 
              $data = json_decode(file_get_contents('php://input'), true);
              // print_r($data);
              // echo $data["id"];  
              $sql = $db->prepare("DELETE FROM Menu WHERE id = :id");
              $sql->bindValue(':id', $data["id"], PDO::PARAM_INT);
              if (!$sql->execute()) {
                print_r($sql->errorInfo());
            }else {
              echo json_encode(array("result" =>"ok"));
            }
  break;

}

?>