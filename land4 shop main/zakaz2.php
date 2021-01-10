<?php 
  $name = stripslashes(htmlspecialchars($_POST['name']));
  $phone = stripslashes(htmlspecialchars($_POST['phone']));
  $product = stripslashes(htmlspecialchars($_POST['product']));
  $article = stripslashes(htmlspecialchars($_POST['article']));

  if(empty($name) || empty($phone)) {
    echo '<h1 style="color:red;">Пожалуйста заполните все поля</h1>';
    echo '<meta http-equiv="refresh" content="2; url=http://'.$_SERVER['SERVER_NAME'].'">';
  }

  else {
    $subject = 'Заказ услуги'; // заголовок письмя
    $addressat = "doleinika@gmail.com"; // Ваш Электронный адрес
    $emails = "dima.oleinik.utd@gmail.com";
    $success_url = './form-ok.php?name='.$_POST['name'].'&phone='.$_POST['phone'].'&product='.$_POST['product'].'&article='.$_POST['article'].'';
    $message = "ФИО: {$name}\nКонтактный телефон: {$phone}\nНазвание продукта: {$product}\nАртикул: {$article}";
    $headers = 'From: ' .$emails . "\r\n" . 'Reply-To: ' . $emails. "\r\n" . 'X-Mailer: PHP/' . phpversion();

    $verify = mail($addressat, $subject, $message, $headers);

    if ($verify == 'true') {
      header('Location: '.$success_url);
      echo '<h1 style="color:green;">Поздравляем! Ваш заказ принят!</h1>';
      exit;
    }

    else {
      echo '<h1 style="color:red;">Произошла ошибка!</h1>';
    }
  }
?>