<?php

function kirim($email,$idagen) {
include "PHPMailerAutoload.php";
$mail = new PHPMailer();

$mail->isSMTP();            
$mail->Host = "mail.pinjamaja.com";
$mail->SMTPAuth = true;
$mail->Username = "no-reply@pinjamaja.com";                 
$mail->Password = "HdiHdi54321";   
$mail->SMTPSecure = "TLS";                           
$mail->Port ="587";

  /*'smtp_user' => 'app@davestpay.com', 
            'smtp_pass' => 'hdihdi54321',*/                                    

$mail->From = "no-reply@pinjamaja.com";
$mail->FromName = "no-reply@pinjamaja.com";
//$mail->addAddress("waptornet@gmail.com");
//$mail->addAddress("it_teknis5@yahoo.com");
//$mail->addAddress("paksoepojo@gmail.com");
//$mail->addAddress("misstester777888@gmail.com");
//$mail->addAddress("vt3st3r@gmail.com");
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = "Pendaftaran Pendana Anda Di Pinjam Aja ";


$body = "ID Pendana Anda di Pinjam Aja : ".$idagen;
//$body = preg_replace('/\\\\/','', $body); //Strip backslashes
//$mail->addAttachment("Slip/".$tanggal2."/".$namafile);
$mail->MsgHTML($body);
 
	if(!$mail->send()) 
	{
		return "0";
		//return "Mailer Error: " . $mail->ErrorInfo;
	} 
	else
	{	
		return "1";
	}
}
?>