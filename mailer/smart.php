<?php 
$agreement = $_POST['agreement-input'];
$enjoy = $_POST['enjoy'];
$likedorno = $_POST['likedorno'];
$most = $_POST['most'];
$mostno = $_POST['mostno'];
$onegame = $_POST['onegame'];
$benefit = $_POST['benefit'];
$somechanges = $_POST['somechanges'];
$recommendations = $_POST['recommendations'];
$more = $_POST['more'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'marybelova-psy@yandex.ru';                 // Наш логин
$mail->Password = 'oqqvhkmuadjbwgdh';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('marybelova-psy@yandex.ru', 'Форма игротеки');   // От кого письмо
$mail->addAddress('marybelova-psy@yandex.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Форма игротеки';
$mail->Body    = '

    <strong>Понравилось?</strong> ' . $enjoy . ' <br>
    <strong>Расскажите, что понравилось, что не очень:</strong> ' . $likedorno . ' <br>
    <strong>Что понравилось больше всего:</strong> ' . $most . ' <br>
    <strong>Что не понравилось больше всего:</strong> ' . $mostno . ' <br>
    <strong>Какая игра запомнилась больше всего:</strong> ' . $onegame . ' <br>
    <strong>Было ли вам полезно данное мероприятие? Если да, то чем?</strong> ' . $benefit . ' <br>
    <strong>Есть ли что-то, что вы бы хотели изменить в Нейроигротеке, чтобы она была  более эффективной?</strong> ' . $somechanges . ' <br>
    <strong>Как и кому бы вы порекомендовали Нейроигротеку?</strong> ' . $recommendations . ' <br>
    <strong>Есть ли что-то, что хотелось бы добавить?</strong> ' . $more . ' <br>';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>