<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class EmvariasMicroroutes extends ModeloBase{
    
	public function __construct($adapter) {
        $table="emvarias_microroutes";
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
				if($k == 'contract'){
					$model = new EmvariasContracts($this->adapter);
					$model->getById($v);
					$a = new stdClass();
					foreach($model->labels as $ak=>$av){
						$a->{$ak} = $model->{$ak};
					}
					$this->{$k} = $a;
				} else if($k == 'lot'){
					$model = new EmvariasLot($this->adapter);
					$model->getById($v);
					$a = new stdClass();
					foreach($model->labels as $ak=>$av){
						$a->{$ak} = $model->{$ak};
					}
					$this->{$k} = $a;
				} else {
					$this->{$k} = $v;
				}
			}
		}
		return $items;
	}
}
?>