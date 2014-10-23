<?php
	
	require('../../app/Bootstrap.php');
        Bootstrap::Initialize();		

	$strParams = QApplication::QueryString('cId'); 
	
	//Create a CAPTCHA
	$objCaptchaImage = new QCaptchaImage($strParams);
?>