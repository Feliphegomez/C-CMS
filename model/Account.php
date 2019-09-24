<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class Account extends ModeloBase{    
	public function __construct($adapter) {
        $table="accounts";
        parent::__construct($table, $adapter);
    }
	
	public function createForm($Action = "", $Method = "POST", $Type = 0, $MessageError = "", $MessageSuccess = ""){
		$this->formulario = $this->toFormHtml($Action, $Method, $Type, $MessageError, $MessageSuccess);
	}
    
    public function rules()
    {
        return [
			 new PHPStrap\Form\Label("Numero de Identificación", [], true, 0, "12"), 
			new PHPStrap\Form\Text([
                    "name" => "identification_number", 	
                    "placeholder" => "Numero de Identificación"
                ], [
                    new PHPStrap\Form\Validation\RequiredValidation('Este campo es requerido.')
                ])
            , new PHPStrap\Form\Password([
                    "name" => "names", 
                    "placeholder" => "Nombres"
                ], [
                    new PHPStrap\Form\Validation\RequiredValidation('Este campo es requerido.')
                ])
            , new PHPStrap\Form\Text([
                    "name" => "surname", 
                    "placeholder" => "Apellidos"
                ], [
                    new PHPStrap\Form\Validation\RequiredValidation('Este campo es requerido.')
                ])
            , new PHPStrap\Form\Text([
                    "name" => "email", 
                    "placeholder" => "Correo Electronico"
                ], [
                    new PHPStrap\Form\Validation\RequiredValidation('Este campo es requerido.')
                ])
            , new PHPStrap\Form\Text([
                    "name" => "phone", 
                    "placeholder" => "Telefono Fijo"
                ], [
                    new PHPStrap\Form\Validation\RequiredValidation('Este campo es requerido.')
                ])
            , new PHPStrap\Form\Text([
                    "name" => "phone", 
                    "placeholder" => "Telefono Movil"
                ], [
                    new PHPStrap\Form\Validation\RequiredValidation('Este campo es requerido.')
                ])
            , new PHPStrap\Form\Textarea("", [
                    "name" => "address", 
                    "placeholder" => "Dirección"
                ], [
                    new PHPStrap\Form\Validation\RequiredValidation('Este campo es requerido.')
                ])
        ];
    }
	
	public function getAll(){
		$items = parent::getSQL("SELECT 
				ACC.`id` AS `id`,
				TID.`name` AS `identification_type`,
				TID.`code` AS `identification_code`,
				ACC.`identification_number` AS `identification_number`,
				ACC.`names` AS `names`,
				ACC.`surname` AS `surname`,
				ACC.`email` AS `email`,
				ACC.`phone` AS `phone`,
				ACC.`mobile` AS `mobile`,
				ACC.`address` AS `address`,
				ACC.`department` AS `department`,
				ACC.`city` AS `city`,
				ACC.`create` AS `create`,
				ACC.`updated` AS `updated`,
				GEO_C.`name` AS `city_name`,
				GEO_D.`name` AS `department_name`
				
			FROM accounts AS ACC

			LEFT JOIN identifications_types AS TID ON TID.id = ACC.identification_type

			LEFT JOIN geo_departments AS GEO_D ON GEO_D.id = ACC.department
			LEFT JOIN geo_citys AS GEO_C ON GEO_C.id = ACC.city");
		return $items;
	}
}