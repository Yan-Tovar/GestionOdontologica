<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)

//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);
$fila = $result->fetch_object();
try {
    //Server settings
    $mail->SMTPDebug =SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'yantovar2007@gmail.com';                     //SMTP username
    $mail->Password   = 'xpio noff vmaf kxzm';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

    //Recipients
    $mail->setFrom('freyderjapo@gmail.com', 'SubCitas');
    $mail->addAddress($fila->correoPaciente, $fila->PacNombres);     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Cita Odontologica Programada';
    $mail->Body    = "<h2>Hola $fila->PacNombres,</h2>
        <p>Te confirmamos que tienes una cita odontológica programada con el Medico, <strong>$fila->MedNombres $fila->MedApellidos</strong>.</p>
        <p><strong>Detalles de la cita:</strong></p>
        <ul>
            <li><strong>Fecha:</strong> $fila->CitFecha</li>
            <li><strong>Hora:</strong> $fila->CitHora</li>
            <li><strong>Consultorio:</strong> Numero $fila->CitConsultorio, $fila->ConNombre </li>
        </ul>
        <p>Por favor, llega 15 minutos antes de tu cita.</p>
        <p>Saludos,<br><strong>SubCitas</strong></p>
";
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}