<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

# --------------------------------------------------------------------------------------------------------------------------
// Podemos adjuntar archivos simplemente agregando los mismos de la siguiente forma:
# $mail->AddAttachment(“nombredearchivo.txt”); // Ingresamos la ruta del archivo

// -- Si necesitamos utilizar una casilla de correo smtp, con user y pass:
# $mail->IsSMTP(); // vamos a conectarnos a un servidor SMTP
# $mail->Host = “mail.servidor.com”; // direccion del servidor
# $mail->SMTPAuth = true; // usaremos autenticacion
# $mail->Username = “info@servidor.com”; // usuario
# $mail->Password = “pass”; // contraseña

// -- Si necesitamos una conexion con SSL, por ejemplo para enviar un mail desde PHP con gmail:
# $mail->Mailer = “smtp”;
# $mail->Host = “ssl://smtp.gmail.com”;
# $mail->Port = 465;
# $mail->SMTPAuth = true;
# $mail->Username = “burmauy@gmail.com”; // SMTP username
# $mail->Password = “burmaUY123456”; // SMTP password

// ParaPor último y enviar Mensaje
# $mail->Send();


$mailfrom = "webmaster@monteverdeltda.com";
$name = "C&CMS Test";
$para = "andres.gomez@monteverdeltda.com";
# $para = "andres.gomez@monteverdeltda.com";
$mailreply = "andres.gomez.monteverde@gmail.com";
$tel = "+573005473082";
$asunto = "Correo de pruebas o Test de correo";
$info = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum semper nunc ut tempor faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin fringilla lorem aliquam feugiat ultrices. Vivamus et magna sit amet dui mollis gravida. Morbi sed sapien vel diam luctus tincidunt. Sed sit amet blandit nisi, nec imperdiet est. Donec viverra odio non justo pretium, ac pharetra nibh ornare. Phasellus sit amet enim mauris. Donec mi mauris, lacinia eget risus sit amet, blandit venenatis eros. Aliquam sit amet dui mauris. Nunc iaculis venenatis nunc, hendrerit rutrum elit cursus et. Vestibulum posuere est neque, vitae finibus ipsum pharetra sit amet. Donec efficitur, leo quis facilisis rhoncus, nisl erat ultrices tellus, nec dictum sem ex a velit. Morbi ullamcorper justo sit amet ante molestie, et convallis massa ultricies. Donec nec tortor eu lacus lacinia porttitor a at sapien.';

echo "<b>Mail de origen</b>: \n <br> {$mailfrom} \n <br> "
. "<b>Nombre del que envia</b>: \n <br> {$name} \n <br> "
. "<b>Mail destino</b>: \n <br> {$para} \n <br> "
. "<b>Mail de respuesta</b>: \n <br> {$mailreply} \n <br> "
. "<b>Asunto</b>: \n <br> {$asunto} \n <br> "
."<b>Mensaje: </b>\n <br /> {$info}\n <br /><hr /><br /> ";

// Ejemplo # 1
/*
    // Crear Comunicador
    $mail = new PHPMailer();

    // Definir origen, destino, nombre, etc.
    $mail->From     = $mailfrom;                    // Mail de origen
    $mail->FromName = $name;                        // Nombre del que envia
    $mail->AddAddress($para);                       // Mail destino, podemos agregar muchas direcciones
    $mail->AddReplyTo($mailfrom);                   // Mail de respuesta

    // definimos el contenido del mail
    $mail->WordWrap = 50;                           // Largo de las lineas
    $mail->IsHTML(true);                            // Podemos incluir tags html
    $mail->Subject = "Consulta formulario Web: {$name}";
    $mail->Body = "Nombre: {$name} \n<br />".
    "Email: $mailfrom \n<br />".
    "Tel: $tel \n<br />".
    "Mensaje: $info \n<br />";
    $mail->AltBody  =  strip_tags($mail->Body); // Este es el contenido alternativo sin html


    $mail->Mailer = "smtp";
    $mail->Host = "ssl://midgard.dataservix.com";
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = "webmaster@monteverdeltda.com"; // SMTP username
    $mail->Password = "Celeste.1035429360.Samael"; // SMTP password


    if ($mail->Send())
        echo "Enviado";
    else
        echo "Error en el envio de mail";
*/

// Ejemplo # 2
for ($i = 0; $i < 2; $i++){
    $mail = new PHPMailer(true);
    try {
        //Server settings
        #$mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'midgard.dataservix.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->SMTPAutoTLS = false;
        $mail->Username   = 'webmaster@monteverdeltda.com';                     // SMTP username
        $mail->Password   = 'Celeste.1035429360.Samael';                               // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($mailfrom, 'Mailer');
        $mail->addAddress($para, 'FelipheGomez');     // Add a recipient
        # $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($mailreply, 'Information Reply');
        # $mail->addCC('cc@example.com');
        # $mail->addBCC('bcc@example.com');

        // Attachments
        # $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        # $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "[{$i}] [Intervalos 30 Seg] {$asunto}";
        $mail->Body    = $info;
        $mail->AltBody = strip_tags($info);

        $mail->send();
        echo "El mensaje ha sido enviado correctamente.";
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Error de envío: {$mail->ErrorInfo}";
    }
    sleep(30);
}