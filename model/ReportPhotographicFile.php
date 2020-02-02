<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class ReportPhotographicFile extends ModeloBase{
    
	public function __construct($adapter) {
        $table="emvarias_reports_photographic";
        parent::__construct($table, $adapter);
    }
	
	public function __sleep(){
		return $this->labels;
	}
    
	public function copyFile($tmp_name){
		$success = (@move_uploaded_file($tmp_name, $this->file_path_full));
		if ($success == true) {
			$this->save();
			return $this->id > 0 ? true : false;
		}else{
			return false;
		}
	}
	
    public function save($columns = null){
		if($this->create_by > 0){} else { return 0; }
		$sql = "INSERT INTO {$this->getTableUse()} (`schedule`, `year`, `type`, `group`, `period`, `file_name`, `file_type`, `file_size`, `file_path_full`, `file_path_short`, `create_by`) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		
		$query = $this->db()->prepare($sql);
		try {
			$success = $query->execute([
				$this->schedule,
				$this->year,
				$this->type,
				$this->group,
				$this->period,
				$this->file_name,
				$this->file_type,
				$this->file_size,
				$this->file_path_full,
				$this->file_path_short,
				$this->create_by,
			]);
			$this->id = $this->db()->lastInsertId();
			
			#return $this->id;
			return $this->id;
		}catch (Exception $e){
			//throw $e;
			#echo "\n {$sql} \n";
			echo $e->getMessage();
			return 0;
		}
    }
	
}
?>