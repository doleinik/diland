<?php 
$name = stripslashes(htmlspecialchars($_POST['name']));
$phone = stripslashes(htmlspecialchars($_POST['phone']));

if(empty($name) || empty($phone)){
echo '<h1 style="color:red;">Пожалуйста заполните все поля</h1>';
echo '<meta http-equiv="refresh" content="2; url=http://'.$_SERVER['SERVER_NAME'].'">';
}
else{
$subject = 'Заказ товара - Умние часы'; // заголовок письмя
$addressat = "doleinika@gmail.com"; // Ваш Электронный адрес
$email = "kreo.studio13@gmail.com";
$success_url = 'name='.$_POST['name'].'&phone='.$_POST['phone'].'';
$message = "ФИО: {$name}\nКонтактный телефон: {$phone}";
$headers = 'From: ' .$email . "\r\n". 
  'Reply-To: ' . $email. "\r\n" . 
  'X-Mailer: PHP/' . phpversion();

$verify = mail($addressat, $subject, $message, $headers);

if ($verify == 'true'){
    header('Location: '.$success_url);
    echo '<h1 style="color:green;">Поздравляем! Ваш заказ принят!</h1>';
    exit;
}
else 
    {
    echo '<h1 style="color:red;">Произошла ошибка!</h1>';
    }
}
?>