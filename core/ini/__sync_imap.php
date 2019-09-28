<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
 * Developer by FelipheGomez
 *
 * ******************************/
$_SERVER["PHP_AUTH_USER"] = "monteverdeltda";
$_SERVER["PHP_AUTH_PW"] = password_hash("SomosLegion", PASSWORD_DEFAULT);

$boxes = new EmailBox($adapter);
$mailBoxes = ($boxes->getAllPendingSync());

$imap = new IMAP($adapter);
$imap->setBoxes($mailBoxes);


# echo json_encode($mailBoxes)."\n";

foreach($mailBoxes as $i => $box){
	$box = is_array($box) ? (object) $box : $box;
	echo "[{$i}] \t\t Comenzando a sincronizar buzón \t {$box->label} \n";
	echo "[=--------]\t Abriendo conexión.\n";
	$openBox = $imap->loadMails($i, NULL);
	echo $openBox->success == false ? "[XXXX-----]\t Error en la conexión.\n" :  "[====-----]\t Conexión establecida.\n";
	
	if(count($openBox->box) > 0){
		#echo "[=====----]\t Multi Cuenta [activado].\n";
		foreach($openBox->box as $box){
			echo "[=====----]\t {$box->label}\n";		
		}
	}else{
		if(isset($openBox->box[0])){
			#echo "[======---]\t Cuenta Unica [activado].\n";
			echo "[======---]\t {$openBox->box[0]->label} \n";		
		}else{
		}
	}
	#echo "[====-----]\t Cargando mensajes.\n";
	$mails = $imap->getMails();
	echo "[===------]\t Mensajes cargados con éxito. \n";
	echo "[======---]\t Ingresando Mensajes: \n";
	echo "[=========]\t EXITO! \n\n";
	//
}
