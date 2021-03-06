<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class EmvariasContracts extends ModeloBase{
    
	public function __construct($adapter) {
        $table="emvarias_contracts";
        parent::__construct($table, $adapter);
    }
	
	public function __sleep(){
		return $this->labels;
	}
	
	public function getById($id){
		$id = (isset($id) && $id > 0) ? $id : 0;
		$items = parent::getById($id);
		if(isset($items[0])){
			foreach($items[0] as $k=>$v){
				$this->{$k} = $v;
			}
		}
		return $items;
	}
}
?>