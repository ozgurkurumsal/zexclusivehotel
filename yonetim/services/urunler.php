<?php 
include('configuration.php');
header('Content-Type: application/json');

// Ürünler sorguları

switch($_SERVER['REQUEST_METHOD'])
{
case 'GET': 
            if(isset($_GET['id'])){
              $sql = $db->prepare("SELECT * FROM odalar WHERE odaId = :id ");
              $sql->bindValue(':id', $_GET['id'], PDO::PARAM_INT); 
              $sql->execute();
              $value  = $sql->fetchAll(PDO::FETCH_OBJ);
              echo json_encode($value);
            }else
            {
            $sql = $db->query("SELECT * FROM odalar  ")->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($sql);
            }
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
case 'PUT': 
        $data = json_decode(file_get_contents('php://input'), true);
        // echo json_encode(array("result" =>"ok",
        //                         "odaAdi" => $data['urunAdi'],
        //                         "id" => $data['id']));
        // echo json_encode($data);
         $sql = $db->prepare("UPDATE odalar SET odaAdi = :odaAdi , aciklama = :aciklama , detay = :detay ,resim1 = :resim1 , resim2 = :resim2 WHERE odaId = :id ");
         $sql->bindValue(':id', $data["id"], PDO::PARAM_INT); 
         $sql->bindValue(':odaAdi', $data["urunAdi"], PDO::PARAM_STR); 
         $sql->bindValue(':aciklama', $data["aciklama"], PDO::PARAM_STR); 
         $sql->bindValue(':detay', $data["detay"], PDO::PARAM_STR); 
         $sql->bindValue(':resim1', $data["resim1"], PDO::PARAM_STR); 
         $sql->bindValue(':resim2', $data["resim2"], PDO::PARAM_STR); 
        $sql->execute();
        if (!$sql->execute()) {
          print_r($sql->errorInfo());
       }else {
         echo json_encode(array("result" =>"ok"));
       }
    break;


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