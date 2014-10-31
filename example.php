<?php 
	require_once 'qrcodew.php';
	
	$qr = new QRCodeWidget();
	$qr->setValue('http://google.com');
	$qr->setQrcodeSize(300);
	
	echo $qr->getQrcode();
?>