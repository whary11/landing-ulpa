<?php
if ($_POST) {
    if ($_POST['nombre']) {

        return json_encode(sendMessage()) ;
        
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