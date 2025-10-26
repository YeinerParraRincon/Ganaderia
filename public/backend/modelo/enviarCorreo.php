<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once(__DIR__ . '/../../../vendor/autoload.php');


function enviarCorreoRecuperacion($correo, $codigo)
{

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'yeinerparrarincon123456789@gmail.com';
        $mail->Password = 'eoskinqhppnecnyr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;


        $mail->setFrom('yeinerparrarincon123456789@gmail.com', 'Sistema Ganadero');


        $mail->addAddress($correo);


        $mail->isHTML(true);
        $mail->Subject = '🐄 Recuperación de contraseña - Sistema Ganadero';
        $mail->Body    = "
            <h2>Hola 👋</h2>
            <p>Recibimos una solicitud para recuperar tu contraseña.</p>
            <p><b>Tu código de recuperación es:</b> 
            <span style='font-size:20px;color:blue;'>$codigo</span></p>
            <p>Este código expira en 10 minutos.</p>
        ";
        $mail->AltBody = "Tu código de recuperación es: $codigo";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
