<?php 
$name = stripslashes(htmlspecialchars($_POST['name']));
$phone = stripslashes(htmlspecialchars($_POST['phone']));
$comment = stripslashes(htmlspecialchars($_POST['comment']));
$metr = stripslashes(htmlspecialchars($_POST['metr']));

if(empty($name) || empty($phone)){
echo '<h1 style="color:red;">Пожалуйста заполните все поля</h1>';
echo '<meta http-equiv="refresh" content="2; url=http://'.$_SERVER['SERVER_NAME'].'">';
}
else{
$subject = 'Заказ товара - Умние часы'; // заголовок письмя
$addressat = "grisalazurcashop@gmail.com"; // Ваш Электронный адрес
$email = "kreo.studio13@gmail.com";
$success_url = './form-ok.php?name='.$_POST['name'].'&phone='.$_POST['phone'].'&comment='.$_POST['comment'].'&metr='.$_POST['metr'].'';
$message = "ФИО: {$name}\nКонтактный телефон: {$phone}\nЗатемнение: {$comment}\nМетров: {$metr}";
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