<?php
include "includes/configuration.php";
require_once('resources/mailphp/class.phpmailer.php');
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.antalyaaquarium.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->Username = 'kampanya2014@antalyaaquarium.com';
$mail->Password = 'kampanya';
$mail->SetFrom($mail->Username, 'Antalya Aquarium');
$mail->AddAddress('ozgurr.ozdemirr@gmail.com', 'Ozgur Ozdemir');
$mail->CharSet = 'UTF-8';
$mail->Subject = 'KONUSU';
$content = '<div style="background: #eee; padding: 10px; font-size: 14px">Bu bir test e-posta\'dır..</div>';
$mail->MsgHTML($content);
if($mail->Send()) {
    echo " e-posta başarılı ile gönderildi";
} else {
    //echo "bir sorun var, sorunu ekrana bastıralım";
    echo $mail->ErrorInfo;
}

switch ($_REQUEST['q']) {
	case '1':

$telefon = preg_replace('/([\D])/', '', $_POST['cep_tel']);


        function GeraHash($qtd){
//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
            $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
            $QuantidadeCaracteres = strlen($Caracteres);
            $QuantidadeCaracteres--;

            $Hash=NULL;
            for($x=1;$x<=$qtd;$x++){
                $Posicao = rand(0,$QuantidadeCaracteres);
                $Hash .= substr($Caracteres,$Posicao,1);
            }

            return $Hash;
        }

//Here you specify how many characters the returning string must have
        //echo GeraHash(8);
$pnr = GeraHash(8);



    $varmi = $db->query("SELECT COUNT(*) sonuc from kampanya WHERE KampanyaKodu = '$_POST[kampanya_kodu]' AND (GsmNo = '$telefon' OR Mail = '$_POST[e_mail]' ) ")->fetch(PDO::FETCH_OBJ);
    $sonuc = $varmi->sonuc;

    if($sonuc == 0) {
        $sql = $db->query("INSERT INTO kampanya (Tarih,Adi,Soyadi,GsmNo,Mail,PnrNo,KampanyaKodu)
              VALUES( NOW(),'$_POST[name]','$_POST[surname]','$telefon','$_POST[e_mail]','$pnr','$_POST[kampanya_kodu]')");

        if ($sql) {

            echo '
                <p class="tebrik">
                TEBRİKLER KAYDINIZI BAŞARI İLE TAMAMLADINIZ.
                10:00– 19:30 SAATLERİ ARASINDA ANTALYA AQUARIUM KASALARINDA ADINIZ VEYA GSM NO’NUZ İLE
                ÜCRETSİZ GİRİS VE İNDİRİM HAKKINIZI KULLANABİLİRSİNİZ

            </p>
            <p class="kampanya">Kampanya Kodunuz : </p>
            <p class="kod" id="kod">'.$pnr.'</p>

            ';

        } else {

            echo "Hatalı İşlem \n";
            print_r($db->errorInfo());

        }
    }else{

        echo "Üzgünüz bu cep telefonu veya e-posta ile Öğretmenler Günü kampanyamıza başvuru yapılmıştır.";
    }
    break;
	case '2':

        $yetki = $_POST['yetki'];
        $id = $_POST['id'];
		$sql = $db->query("UPDATE kampanya SET $yetki = 1 , IslemTarihi = NOW() WHERE Sira = $id ")->fetch(PDO::FETCH_OBJ);

		echo "islem tamam";
        break;
	
	default:

		break;
}


?>