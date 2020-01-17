<?php 
#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);

$dir_core = dirname(__DIR__);
$dir_path = dirname(dirname($dir_core . "/../"));

require_once $dir_path.'/config/global.php';

require_once '../Conectar.php';
$conectar = new Conectar();
$adapter = $conectar->conexion();
require_once '../EntidadBase.php';
require_once '../ModeloBase.php';
//Incluir todos los modelos
foreach(glob("../model/*.php") as $file){ require_once $file; }

/* *******************************
 *
 *
 * Developer by FelipheGomez
 *
 * ******************************/

$boxes = new EmailBox($adapter);
$mailBoxes = ($boxes->getAllPendingSync());

#echo json_encode($mailBoxes)."\n";	

foreach($mailBoxes as $mailBox){
	echo $host = "------ Sincronizando {$mailBox->label} / {$mailBox->user} [{$mailBox->id}] ------ \n";
	$imap = new FG_IMAP($mailBox, $adapter);
	if($imap->isValid() !== false){
		$emails = $imap->searchBy(TYPE_SYNC_EMAILS);	
		
		$total_search = (count($emails));
		echo "{$total_search} Encontrado(s)\n";
		if($total_search > 0){
			// Correo
			foreach(array_reverse($emails) as $email){
				$mail = $imap->getMail($email);
				#$mail = $imap->getMail(674);
				#echo "message_id: {$mail->message_id}\n";
				#echo "ID_MV: {$mail->id} | message_id: {$mail->message_id} | uid: {$mail->uid} | subject: {$mail->subject}\n";
				#echo "{$mail->message}\n";
			}
			// FIN Correo
		} 
		else {
			echo "No hay emails.\n";
		}
	}
	/*
	$imap = imap_open("{{$curMailBox->host}:{$curMailBox->port}{$curMailBox->args_add}}", $mailBox->user, $mailBox->pass);
	
	echo "<ul>";
	foreach ($folders as $folder) {
		$folder = str_replace("{imap.gmail.com:993/imap/ssl}", "", imap_utf7_decode($folder));
		echo '<li><a href="mail.php?folder=' . $folder . '&func=view">' . $folder . '</a></li>';
	}
	echo "</ul>";*/
}