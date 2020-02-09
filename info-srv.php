<?php 

if(empty($_GET['all']) || !isset($_GET['all'])){
	// Muestra solamente la información de los módulos.
	// phpinfo(8) hace exactamente lo mismo.
	phpinfo(INFO_MODULES);
} else {
	// Muestra toda la información, por defecto INFO_ALL
	phpinfo();
}


