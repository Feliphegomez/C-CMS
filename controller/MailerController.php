<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class MailerController extends ControladorBase{
    public $conectar;
    public $adapter;
    
    public function __construct() {
        parent::__construct([
            "theme" => "demo"
        ]);
        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }
    
    // Paneles / Dashboard
    public function actionTest(){
        $this->render("test", [
            "title" => "Panel 1",
            "description" => "Ingrese su contenido..."
        ]);
    }
}
?>
