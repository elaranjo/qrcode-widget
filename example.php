<?php 
	require_once 'gqrcode.php';
	
	$qr = new QRCodeWidget();
	$qr->setValue('http://google.com');
	$qr->setQrcodeSize(300);
	
	echo $qr->getQrcode();
?>