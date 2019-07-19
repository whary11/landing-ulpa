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
    echo 'No hay nada disponible.';
}
// function recetData(){
//     return 'data';
// }
function sendMessage(){
    $mail = new PHPMailer(true);
    try {
        //Configuración del servidor de correos
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'mail.ulpa.com.co';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'info@ulpa.com.co';                     // SMTP username
        $mail->Password   = 'estudiosexterior19';                               // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        // Receptores
        $mail->setFrom('info@ulpa.com.co', 'ULPA');
        $mail->addAddress('pablomart81@gmail.com', 'Luis Raga');     // Add a recipient
        // $mail->addAddress('whary11@gmail.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        // Contenido
        $mail->isHTML(true);                                     // Set email format to HTML
        $mail->Subject = 'Here is the subject';                 //Asunto
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        echo 'Message has been sent';

        $succes = true;
    } catch (Exception $e) {
        $succes = false;
        $error = $mail->ErrorInfo;

        echo $error;
    }

    // if ($succes) {
    //     echo
    //         json_encode([
    //                     'resp'=> true,
    //                     'mensaje' => 'El correo fue enviado con éxito.'
    //                 ]);
    //  }else {
    //     echo
    //     json_encode([
    //                 'resp'=> false,
    //                 'mensaje' => $error
    //             ]);
    //  }
}