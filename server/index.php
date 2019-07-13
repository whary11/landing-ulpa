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
function recetData(){
    return 'data';
}
function sendMessage(){
    echo(
        json_encode([
            'resp'=> true,
            'status' => 200,
            'mensaje' => 'El correo fue enviado con éxito.'
        ])
    );
}