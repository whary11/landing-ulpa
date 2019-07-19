<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar el cargador automático del compositor
require 'vendor/autoload.php';


if ($_POST) {
    if ($_POST['nombres']) {
        return json_encode(sendMessage()); 
    }
}else{
    echo 'Error';
}
function sendMessage(){
    $mail = new PHPMailer(true);
    $succes='';
    $error='';
    try {
        //Configuración del servidor de correos
        // $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'mail.ulpa.com.co';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'info@ulpa.com.co';                     // SMTP username
        $mail->Password   = 'estudiosexterior19';                               // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        // Receptores
        $mail->setFrom('gerencia@ulpa.com.co', 'ULPA');
        $mail->addAddress('gerencia@ulpa.com.co', 'ULPA');     // Add a recipient
        // Contenido
        $mail->isHTML(true);                                     // Set email format to HTML
        $mail->Subject = 'Nuevo registro';                 //Asunto
        $mail->Body    = 'Nombres: '.$_POST["nombres"] . '<br>Apellidos: '.$_POST["apellidos"]. '<br>Email: '.$_POST['email'].'<br>Mensaje: '.$_POST['mensaje'];
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $succes = true;
    } catch (Exception $e) {

        $error = $mail->ErrorInfo;
    }

    if ($succes) {
        echo
            json_encode([
                        'resp'=> true,
                        'mensaje' => 'El correo fue enviado con éxito.'
                    ]);
     }else {
        echo
        json_encode([
                    'resp'=> false,
                    'mensaje' => $error
                ]);
     }
}