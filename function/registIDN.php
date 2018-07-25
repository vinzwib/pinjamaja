<?php
	include "tesemail/mail.php";
	
	$ct = rand(10000,99999);
	$p7 = md5("123".$ct);
	
	$idku = $_POST['idv'];
	$emailku = $_POST['emailv'];
	
	$coba = array("com"=>"ACC_IDN","no_idn"=>"$idku","pass"=>"$p7","counter"=>$ct);
	
	$postx = json_encode($coba); 
	
	//echo $postx;
	//$host    = "183.91.70.178";
    $host    = "127.0.0.1";
    $port    = 37773;
    $message = $postx."\n";
    $length = strlen($message);
    //echo "Send JSON=>\n".$message;
    
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
    $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
    socket_write($socket, $message, $length) or die("Could not send data to server\n");
    $result = socket_read ($socket, 1024) or die("Could not read server response\n");
    //echo "\nReceive =>".$result;
    $hasil = json_decode($result);
	$idxx = $hasil->id_idn;
	
	kirim($emailku,$idxx);
	
	echo "1-".$idxx;
    socket_close($socket);
    die("");
?>