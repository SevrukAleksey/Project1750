<?php

$adminemail = "Opostal@i.ua";  // e-mail админа 
$date = date("d.m.y"); // число.месяц.год 
$time = date("H:i"); // часы:минуты:секунды 
$backurl = "http://project1750/index.php";  // На какую страничку переходит после отправки письма 
//---------------------------------------------------------------------- // 
// Принимаем данные с формы 
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['message'];

// Проверяем валидность e-mail 

if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", strtolower($email))) {
    echo
    "<center>Вернитесь <a 
href='javascript:history.back(1)'><B>назад</B></a>. Вы 
указали неверные данные!";
} else {

    $msg = " 
 
<p>Имя: $name</p> 
  
<p>E-mail: $email</p> 
  
<p>Сообщение: $msg</p> ";



    // Отправляем письмо админу  

    mail("$adminemail", "$date $time Сообщение от $name", "$msg");
    print "<script language='Javascript'><!-- 
function reload() {location = \"$backurl\"}; setTimeout('reload()', 6000); 
//--></script> 
 
$msg 
 
<p>Сообщение отправлено! Подождите, сейчас вы будете перенаправлены на главную страницу...</p>";  
exit; 
 
 } 