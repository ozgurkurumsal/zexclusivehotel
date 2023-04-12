<?php 
include('configuration.php');
header('Content-Type: application/json');

// anamenü sorguları

switch($_SERVER['REQUEST_METHOD'])
{
case 'GET': 
            $sql = $db->query("SELECT * FROM Menu ORDER BY id")->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($sql);
   break;
case 'POST': 
            $data = json_decode(file_get_contents('php://input'), true);
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
              $sql = $db->prepare("DELETE FROM Menu WHERE id = :id");
              $sql->bindValue(':id', $data["id"], PDO::PARAM_INT);
              if (!$sql->execute()) {
                print_r($sql->errorInfo());
            }else {
              echo json_encode(array("result" =>"ok"));
            }
  break;

}

// anamenü sorguları

?>