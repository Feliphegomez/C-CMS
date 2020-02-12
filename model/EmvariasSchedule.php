<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class EmvariasSchedule extends ModeloBase{
    
	public function __construct($adapter) {
        $table="emvarias_schedule";
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
				if($k == 'microroute'){
					$model = new EmvariasMicroroutes($this->adapter);
					$model->getById($v);
					$a = new stdClass();
					foreach($model->labels as $ak=>$av){
						$a->{$ak} = $model->{$ak};
					}
					$this->{$k} = $a;
				} else if($k == 'group'){
					$model = new PhotographicGroup($this->adapter);
					$model->getById($v);
					$a = new stdClass();
					foreach($model->labels as $ak=>$av){
						$a->{$ak} = $model->{$ak};
					}
					$this->{$k} = $a;
				}  else if($k == 'period'){
					$model = new PhotographicPeriod($this->adapter);
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
	
	public function getPeriodsGlobal(){
		$sql = "SELECT `year` as year, B.* 
			FROM {$this->getTableUse()} AS A
		INNER JOIN `emvarias_periods` AS B
			ON A.period = B.id
		 GROUP BY A.`year`, A.`period`";
		return $this->FetchAllObject($sql, []);
	}
}
?>