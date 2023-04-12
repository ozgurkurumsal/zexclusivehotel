<?php

include ('../configuration.php');

$q = $_REQUEST['q'];
switch($q){

    case 'duzenle' :


        $sql = $db->query("UPDATE iletisim SET
                             Adres='$_POST[adres]',
                             ilce='$_POST[ilce]',
                             il='$_POST[il]',
                             Telefon='$_POST[telefon]',
                             Gsm='$_POST[gsm]',
                             Faks='$_POST[faks]',
                             Eposta='$_POST[eposta]',
                             Eposta2='$_POST[eposta2]',
                             Eposta3='$_POST[eposta3]',
                             Facebook='$_POST[facebook]'");
       // $html = htmlspecialchars($_POST['hakkimizda']);
        $sql2 = $db->query("UPDATE firma_tanitim SET Hakkimizda = '$_POST[hakkimizda]'");

        break;

    case '2':

        $sql= $db->query("SELECT * FROM Otel_Odalari WHERE Otel_id = '$_POST[id]' ");

        while($row = $sql->fetch(PDO::FETCH_OBJ)){

           echo "<div>".$row->Oda_Name_Tr."</div>";
        }

        break;


    case 'sil':
           $sql=$db->query("UPDATE Hotellist SET Status = '0' WHERE Otelid = '$_POST[id]'");

        break;

    case 'listele':

        $query = $db->query("SELECT * FROM iletisim INNER JOIN firma_tanitim ON firma_tanitim.id=iletisim.id  ");
        while ($row = $query->fetch()) {
            $orders[] = array(
                'id' => $row['id'],
                'Adres' => $row['Adres'],
                'ilce' => $row['ilce'],
                'il' => $row['il'],
                'Telefon' => $row['Telefon'],
                'Gsm' => $row['Gsm'],
                'Faks' => $row['Faks'],
                'Eposta' => $row['Eposta'],
                'Eposta2' => $row['Eposta2'],
                'Eposta3' => $row['Eposta3'],
                'Facebook' => $row['Facebook'],
                'Hakkimizda' => $row['Hakkimizda'],
            );
        }
        echo json_encode($orders);

        break;

    case 'otel_ozellikleri' :



        $sql = $db->query("SELECT COUNT(*) AS found_rows FROM Hizmetler");
//$rows = mysql_query($sql);
//$rows = mysql_fetch_assoc($rows);
        $rows = $sql->fetch();
        $total_rows = $rows['found_rows'];
        $orders = null;
// get data and store in a json array

        $query = $db->query("SELECT * FROM Hizmetler");
//$result->execute();
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {

            echo "<div class='col-md-3x' style='width:15%;font-size: 12px;font-weight:bold;float:left' ><input type='checkbox' value='{$row->Hizmetid}' name='hizmetler[]' /> {$row->Hizmet_Adi_Tr}</div>";
            // echo $row['Otelid'];
        }

            break;



}




?>