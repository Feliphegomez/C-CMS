<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

$_SERVER["PHP_AUTH_USER"] = "monteverdeltda";
$_SERVER["PHP_AUTH_PW"] = password_hash("SomosLegion", PASSWORD_DEFAULT);

/*
$mailBoxes = ([
	[
		'label' 	=> 'Gmail',
		'enable'	=> false,
		'mailbox' 	=> '{imap.gmail.com:993/imap/ssl}INBOX',
		'username' 	=> '<your-mail-id@google-powered-email-domain.com>',
		'password' 	=> '<password>'
	],
	[
		'label' 	=> 'Inbox andres.gomez MVLTDA',
		'enable'	=> true,
		'mailbox' 	=> '{mail.monteverdeltda.com:143/tls}INBOX',
		'username' 	=> 'andres.gomez@monteverdeltda.com',
		'password' 	=> 'nxZA1Xgc4E'
	]
	/*
	[
		'label' 	=> 'Inbox webmaster MVLTDA',
		'enable'	=> true,
		'mailbox' 	=> '{mail.monteverdeltda.com:143/tls}INBOX',
		'username' 	=> 'webmaster@monteverdeltda.com',
		'password' 	=> 'Celeste.1035429360.Samael'
	]* /
]);
*/

$boxes = new EmailBox($this->adapter);
$mailBoxes = ($boxes->getAllPendingSync());
# echo json_encode($mailBoxes);
	

$imap = new IMAP($this->adapter);
$imap->setBoxes($mailBoxes);

foreach($mailBoxes as $i => $box){
	$box = is_array($box) ? (object) $box : $box;
	echo "[{$i}] \t\t Comenzando a sincronizar buzón \n";
	echo "[•--------]\t Validando Datos\n";
	echo "[=--------]\t {$box->label}\n";
	echo "[==-------]\t {$box->pass}:{$box->user}\n";
	echo "[===------]\t {$box->host}:{$box->port}{$box->args_add}/INBOX\n";
	echo "[====-----]\t Abriendo conexión.\n";
	
	$openBox = $imap->loadMails($i, null);
	echo $openBox->success == false ? "[XXXX-----]\t Error en la conexión.\n" :  "[=====----]\t Conexión establecida.\n";
	
	if(count($openBox->box) > 0){
		echo "[======---]\t Multi Cuenta [activado].\n";
		foreach($openBox->box as $box){
			echo "[======---]\t {$box->label} - Total:[{$box->total}]/Mails:[".count($box->mails)."]\n";		
		}
	}else{
		if(isset($openBox->box[0])){
		
			echo "[======---]\t Cuenta Unica [activado].\n";
			echo "[======---]\t {$openBox->box[0]->label} - Total:[{$openBox->box[0]->total}]/Mails:[".count($openBox->box[0]->mails)."]\n";		
		}else{
			return;
		}
	}
	
	echo "[=======--]\t Cargando mensajes.\n";
	$mails = $imap->getMails();
	echo "[========-]\t Mensajes cargados con éxito. [" . count($mails) . "] \n";
	echo "[========-]\t Ingresando Mensajes: \n\n";
	foreach($mails as $mail){
		echo "[=========]\t [{$mail->uid}]  [{$mail->message_id}] - {$mail->date} - ({$mail->size} bytes) \n";
		echo "[=========]\t {$mail->subject} == {$mail->from} \n";
		echo "[-ADJUNTOS-]\t attachments == [" . count($mail->attachments) . "] \n";
		
		foreach($mail->attachments as $attachment){
			$attachment = !is_object($attachment) ? (object) $attachment : $attachment;
			echo "\t \t [{$attachment->name}] - {$attachment->filename} -> {$attachment->path_short}\n";
			
			#$attachment->
			#
		}
		
		echo "[-ADJUNTOS-]\t  \n";
		
		/*
		foreach($mail as $k=>$v){
			echo "[=========]\t [{$k}] == ".(json_encode($v))." \n";
		}*/
	}
	echo " \n \n[===O.K===]\t Completado! \n \n";
	//
}
#$imap->loadMails($mailBoxes, 1);
#$mails = $imap->getMails();
//echo json_encode($mails);
