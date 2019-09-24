<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class ModeloBase extends EntidadBase
{
    public $adapter;
    public $formulario;
    private $table;
    public $db;
	public $isUnique;
    
    public function __construct($table, $adapter) {
        $this->adapter = $adapter;
        $this->table = (string) $table;
		$this->db = $adapter;
        parent::__construct($table, $adapter);
        $this->formulario = $this->toFormHtml();
    }

    public function toFormHtml($Action = "", $Method = "GET", $FormType = 0, $MessageError = "Datos invalidos.", $MessageSuccess = "OK."){
        $rules = $this->rules();
        $labels = $this->attributeLabels();
        $formulario = new PHPStrap\Form\Form($Action, $Method, $FormType, $MessageError, $MessageSuccess);      
        foreach($rules as $rul){
            $formulario->group($rul);
        }
        $formulario->addSubmitButton('Continuar', [
            "name" => "btn-submit", 
        ]);
        return $formulario;
    }

    public function isValid(){   
        return $this->formulario->isValid();
    }
    
    public function rules(){
        return [
        ];
    }

    public function attributeLabels(){
        return [
        ];
    }
	
	public function generateFormCreate($Action = "", $Method = "POST", $FormType = 0, $MessageError = "Error.", $MessageSuccess = "Creado con éxito"){
		$this->formulario = $this->toFormHtml($Action, $Method, $FormType, $MessageError, $MessageSuccess);
        return $this->formulario;
	}
};