<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

/*
class Permisos extends ModeloBase{
	public $labels_p = '';
	private $list = [];
	
	public function __construct($adapter) {
        $table="permissions";
        parent::__construct($table, $adapter);
    }
	
	public function __sleep(){
		return ['id', 'name', 'labels_p'];
	}
	
	public function validatePermission($labelNode = 'none'){
		$labelNode = strtolower($labelNode);
		return !isset($this->list['isadmin']) || $this->list['isadmin'] !== true 
					? !isset($this->list[$labelNode]) 
											? false 
											: $this->list[$labelNode] 
					: true;
	}
    
    public function rules()
    {
        return [
            new PHPStrap\Form\Text([
				"name" => "username", 
				"placeholder" => "Nombre"
			], [
				new PHPStrap\Form\Validation\RequiredValidation('Dato requerido.')
			])
			, new PHPStrap\Form\Text([
				"name" => "data", 
				"placeholder" => "Data JSON"
			], [
				new PHPStrap\Form\Validation\RequiredValidation('Dato requerido.')
			])
        ];
    }
	
	public function getById($id){
		return $this->setAll(parent::getById($id));
	}
	
	public function setAll($array = []){
		if(isset($array[0])){
			foreach($array[0] as $k => $v){
				if($k == 'data'){ $v = json_decode($v); }
				$this->set($k, $v);
			}
			foreach($this->data as $perm_k => $perm_v){
				if(!is_array($perm_v) && !is_object($perm_v)){
					$this->list[strtolower($perm_k)] = $perm_v;
				} else {
					foreach($perm_v as $node1_k => $node1_v){
						if(!is_array($node1_v) && !is_object($node1_v)){
							$this->list[strtolower("{$perm_k}:{$node1_k}")] = $node1_v;
						} else {
							foreach($node1_v as $node2_k => $node2_v){
								$this->list[strtolower("{$perm_k}:{$node1_k}:{$node2_k}")] = $node2_v;
							}
						}
					}
				}
			}
			$this->labels_p = json_encode($this->list);
		}
		return $this;
	}
}

*/