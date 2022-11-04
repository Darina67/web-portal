<?
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
$message = '';
$email = $_POST['input-email'];
$name = $_POST['input-name'];
$phone = $_POST['input-phone'];
$select = $_POST['select'];

$mail = new PHPMailer;
$mail->CharSet = "utf-8";


if(isset($_POST['submit'])){
    $secret = "6LcKkmwhAAAAAFvj4ca1v328ClkgxtrCt8CX7g96";
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
    $data = file_get_contents($url);
    $row = json_decode($data, true);


    if($row['success'] === TRUE){
        if(!$mail->Send()) {
           
        $message = 'Имя: ' . $name. ', Позиция: ' . $text. ', Email с котрого пришла заявка: ' . $select; // Текст письма
        // SMTP данные отличаются у разных почт. В данном случае используется @mail.ru. Посмотреть SMTP данные почты просто загуглив
        $mail->IsSMTP();
        $mail->Host = 'smtp.mail.ru';
        $mail->Port = '465';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';

        $mail->Username = 'darina_grigoreva_01@mail.ru'; // почта с которой отправляется письмо
        $mail->Password = 'passworduniv'; // пароль от почты с которого отправляется письмо
        $mail->From = 'darina_grigoreva_01@mail.ru'; // почта с которой отправляется письмо
        $mail->FromName = $email;
        $mail->AddAddress("darina_grigoreva_01@mail.ru"); // почта на которое отправляется письмо
        // $mail->AddAddress(""); Их может
        // $mail->AddAddress(""); быть
        // $mail->AddAddress(""); много
        $mail->Subject = 'Заявка с формы';
        $mail->Body = $message; // текст письма из переменной $message
        if($mail->Send()) {
          header('Location: /index.html');
        }
        else {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
} 
   else{
       echo '<script>alert("Введите капчу снова")
       </script>';
      
   }
}
?>