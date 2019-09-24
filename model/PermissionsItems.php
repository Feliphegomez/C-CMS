<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class PermissionsItems extends ModeloBase{	
	public function __construct($adapter) {
        $table="permissions_items";
        parent::__construct($table, $adapter);
    }
	
	public function __sleep(){
		return ['id', 'tag', 'name', 'description'];
	}
    
    public function rules()
    {
        return [
            new PHPStrap\Form\Text([
				"name" => "tag", 
				"placeholder" => "Permiso"
			], [
				new PHPStrap\Form\Validation\RequiredValidation('Dato requerido.')
			])
			, new PHPStrap\Form\Text([
				"name" => "name", 
				"placeholder" => "name / Titulo"
			], [
				new PHPStrap\Form\Validation\RequiredValidation('Dato requerido.')
			])
			, new PHPStrap\Form\Text([
				"name" => "description", 
				"placeholder" => "Descripcion del permiso"
			], [])
        ];
    }
	
	
	public function getById($id){
		return $this->setAll(parent::getById($id));
	}
	
	public function setAll($array = []){
		if(isset($array[0])){
			foreach($array[0] as $k => $v){
				$this->set($k, $v);
			}
		}
		return $this;
	}
	
    public function crear(){
        $sql = "INSERT INTO {$this->getTableUse()} (tag,name,description) VALUES (?, ?, ?)";
        $id = (int) parent::getInsert($sql, [
			$this->tag,
			$this->name,
			$this->description
		]);
		$this->id = ($id > 0) ? $id : 0;
		return ($this->id > 0) ? true : false;
    }

}
?>