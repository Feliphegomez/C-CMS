<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class CronController extends ControladorBase{
	
    public function __construct() {
        parent::__construct();
        $this->theme['default'] = 'none';
    }
    
    public function actionIndex(){
		
    }
    
    public function actionSyncEmails(){
		$this->render("sync_emails", [
			
		]);
    }
}
?>
