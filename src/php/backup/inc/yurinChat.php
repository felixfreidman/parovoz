<?php

if (isset($_POST['user_name'])) { 
	$name = $_POST['user_name']; }
// if (isset($_POST['user_mail'])) { 
// 	$mail = $_POST['user_mail']; }

if (isset($_POST['user_phone'])) { 
	$phone = $_POST['user_phone']; }

if (isset($_POST['user_message'])) { 
	$message = $_POST['user_message']; }


$mailto = 'yurin.develop@yandex.ru';	

$type = 'Обращение с БетонСтроя';

$tema = $type;

$time = time();  
$email = $send;
$massage_html = "
<html>
 <title>".$tema."</title>
 <body style='background-color: #F4F4F4'>
 	<div>Имя: <b>".$name."</b><br></div>
 	<div>Телефон: <b>".$phone."</b><br></div>
 	<div>Сообщение: <b>".$message."</b><br></div>
 </body>	
</html>
";

// $headers = array(
// 	"MIME-Version: 1.0",
// 	"Content-type: text/html; charset=utf-8",
// 	"From: БетонСтроя < info@beton-sp.ru >"
// );

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: БетонСтрой <info@beton-sp.ru>' . "\r\n";
// mail($to, $subject, $message, $headers);

mail( 'bs5516991@mail.ru', $type, $massage_html, $headers );

?>
