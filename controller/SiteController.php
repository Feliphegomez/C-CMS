<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class SiteController extends ControladorBase{
    public function __construct() {
        parent::__construct();

    }
    
    public function actionIndex(){
		if (!$this->isGuest){ $this->actionHome_users(); }  
		else { $this->redirect('site', 'login'); }
    }
    
    public function actionHome_users(){
        if ($this->isGuest){ $this->goHome(); }
        /*
        $this->render("home_users", [
            "title" => "Principal Usuario",
			"description" => $this->user
        ]);*/
		
        $this->render("debug_user", [
            "title" => "Principal Usuario",
			"description" => $this->user
        ]);
    }
	
	public function actionTest(){
        //Creamos el objeto usuario
        $usuario = new Usuario($this->adapter);
        //Conseguimos todos los usuarios
        $allusers = $usuario->getAll();
		//Producto
        $producto = new Producto($this->adapter);
		$allproducts = $producto->getAll();
		
		$this->render("plain_page", 
			[
			"allusers"=>$allusers,
			"allproducts" => $allproducts,
			"Hola"    =>"Soy una variable más"
		]);
	}
	
	public function actionDemoPHPStrap(){
		// DOCS: https://maxtuni.es/PHPStrap/namespaces/PHPStrap.html
		// https://maxtuni.es/PHPStrap/
		$ExamplePanelX = new PHPStrap\PanelX();
		$ExamplePanelX->addHeader("Plain Page");
		$ExamplePanelX->addButton((PHPStrap\Util\Html::tag('a', (PHPStrap\Util\Html::tag('i', '', 'fa fa-chevron-up')), 'collapse-link')));
        $ExamplePanelX->addButton(
            PHPStrap\Util\Html::tag('a', 
                PHPStrap\Util\Html::tag('i', '', 'fa fa-wrench')
            , ['dropdown-toggle'], ['data-toggle' => 'dropdown', 'role' => 'button', 'aria-expanded' => 'false'])
            // dropdown-menu
            . PHPStrap\Util\Html::tag('ul', 
                PHPStrap\Util\Html::tag('li', FelipheGomez\Url::a('#', "Opcion 1"), ['dropdown'])
                . PHPStrap\Util\Html::tag('li', FelipheGomez\Url::a('#', "Opcion 2"), ['dropdown'])
            , ['dropdown-menu'], ['role' => 'menu'])
        , ['dropdown']);
		$ExamplePanelX->addButton((PHPStrap\Util\Html::tag('a', (PHPStrap\Util\Html::tag('i', '', 'fa fa-close')), 'close-link')));
		$ExamplePanelX->addContent("Add content to the page ...");
		
		$ExamplePanel = new PHPStrap\Panel();
		$ExamplePanel->addHeader("Example panel");
		$ExamplePanel->addContent("My content");
		
		$ExampleListGroup = new PHPStrap\ListGroup();
		$ExampleListGroup->addItem("First item");
		$ExampleListGroup->addItem("Active item", TRUE);
		$ExampleListGroup->addLink("Linked item", "https://github.com/Feliphegomez/");
		
		$Row = new PHPStrap\Row();
		$Row->addColumn($ExamplePanelX);
		$Row->addColumn($ExamplePanelX);
		$Row->addColumn($ExampleListGroup);
		$Row->addColumn($ExamplePanel);
		$ExampleWell = new PHPStrap\Well($Row);
		
		$this->render("blank_page", [
			"description" => $ExamplePanelX.$ExamplePanel.$ExampleListGroup.$ExampleWell
		]);
    }

	public function actionAccounts_list(){
        //Creamos el objeto cuenta
        $cuentas = new Account($this->adapter);
        //Conseguimos todos los usuarios
        $allaccounts = $cuentas->getAll();
		
		$this->render("table_simple", [
			"title"   	=>"Cuentas",
			"subtitle"  =>"Todas las cuentas",
			"headers"	=> [
				[
					[
						'label' => '#',
						'key' => 'id'
					],
					[
						'label' => 'Tipo de identificación',
						'key' => 'identification_type'
					],
					[
						'label' => 'Tipo de identificación',
						'key' => 'identification_number'
					],
					[
						'label' => 'Nombres',
						'key' => 'names'
					],
					[
						'label' => 'Apellidos',
						'key' => 'surname'
					],
					[
						'label' => 'Correo Electronico',
						'key' => 'email'
					],
					[
						'label' => 'Teléfono Fijo',
						'key' => 'phone'
					],
					[
						'label' => 'Teléfono Móvil',
						'key' => 'mobile'
					],
					[
						'label' => 'Dirección',
						'key' => 'address'
					],
					[
						'label' => 'Departamento',
						'key' => 'department_name'
					],
					[
						'label' => 'Ciudad',
						'key' => 'city_name'
					],
					/*[
						'label' => 'Creacion',
						'key' => 'create'
					],
					[
						'label' => 'Actualizacion',
						'key' => 'updated'
					]*/
				]
			],
			"data"		=> $allaccounts,
		]);
	}
	
	public function actionAccounts_create(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		$model = new Account($this->adapter);
        $formulario = $model->createForm('','POST',0,"verifique sus datos.", "Espere...");
		
		if($model->formulario->isValid()){
			$data = (object) $_REQUEST;
			echo json_encode($data);
		}
		
		
		if(isset($_GET['error']) && $_GET['error'] != ""){
			$error = [
				"title" => "Ups! Hubo un error",
				"text" => $_GET['error'],
				"styling" => "bootstrap3",
				"type" => "error",
				"icon" => true,
				"animation" => "zoom",
				"hide" => false
			];
			
			$this->errors[] = $error;
		};
		
		
		$this->render("form_simple", [
            "title" => "Iniciar sesión",
            "model" => $model,
            "error" => $error
        ]);
		/*
		$this->render("login", [
            "title" => "Iniciar sesión",
            "model" => $model,
            "error" => $error
        ]);
		*/
	}

	public function actionAccounts_master(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		$table = isset($_GET['table']) ? $_GET['table'] : false;
		if ($table == false) { $this->goHome(); }
		
		$this->render("vue_table", [
            "title" => "Cuentas",
            "subtitle" => "Todas las cuentas",
			"table" => $table
        ]);
		
		/*
		$this->render("vue_master", [
            "title" => "Cuentas",
            "subtitle" => "Todas las cuentas",
			"table" => $table
        ]);*/
	}

	public function actionCalendar_Master(){
		$this->render("calendar_master", [
            "title" => "Calendario",
            "subtitle" => "Todo",
        ]);
	}
	
	public function actionTable_Master_Vue(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		$table = isset($_GET['table']) ? $_GET['table'] : false;
		if ($table == false) { $this->goHome(); }
		
		$this->render("vue_table", [
            "title" => "Tablas",
            "subtitle" => "Master",
			"table" => $table
        ]);
	}

	public function actionUploadFile(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		$ds          = DIRECTORY_SEPARATOR;
		$storeFolder = 'uploads';
		$files_detect = !isset($_FILES['file']) ? false : true;
		$files = isset($_FILES['file']) ? $_FILES['file'] : [];
		$returning = (object) [
			'error' 	=> true,
			'status'    => 'error',
			'result' => false,
			'files_detect' => $files_detect,
			'files' => [],
			//'files' => isset($_FILES['file']) ? $_FILES['file'] : [],
			'text' => ""
		];
		
		if (!empty($_FILES)) {
			$isArray = is_array($_FILES['file']['tmp_name']) ? true : false;
			$day = date("d");
			$mouth = date("m");
			$year = date("Y");
			$targetPath = PUBLIC_PATH . "/files/{$year}/{$mouth}/{$day}/";
			// Compruebe si la carpeta de carga si existe sino se crea la carpeta
			if ( !file_exists($targetPath) && !is_dir($targetPath) ) { mkdir($targetPath, 0777, true); };
			// Compruebe si la carpeta se creo o si existe
			if ( file_exists($targetPath) && is_dir($targetPath) ) {
				// Comprueba si podemos escribir en el directorio de destino
				if ( is_writable($targetPath) ) {
					/** Empieza a bailar */
					if($isArray == true){
						// $returning->text = "multiples archivos."; //carpeta: {$targetPath}
						$total = count($files['tmp_name']);
						for($i = 0; $i < $total; $i++){
							$model = new Media($this->adapter);
							$model->name = randomString(16, $files['name']);
							$model->type = $files['type'];
							$model->size = $files['size'];
							$model->path_short = "/public/files/{$year}/{$mouth}/{$day}/" . $model->name;
							$model->path_full = $targetPath . $model->name;
							$model->create_by = $this->user->id;
							
							// Mover archivo
							$error_up = !$model->copyFile($files['tmp_name'][$i]);
							$returning->error = $error_up;
								$returning->text = $error_up; // carpeta: {$targetPath}
							if ($error_up == false) {
								$returning->files[] = (object) [
									"id" => $model->id,
									"name" => $model->name,
									"type" => $model->type,
									"size" => $model->size,
									"path_short" => $model->path_short,
									"path_full" => $model->path_full,
									"error" => ($model->id > 0) ? false : true,
								];
							} else {
								$response = array (
									'status' => 'error',
									'info'   => 'No se pudo cargar el archivo solicitado :(, ocurrió un misterioso error.'
								);
							}
						}
					} else {
						$model = new Media($this->adapter);
						$model->name = randomString(16, $files['name']);
						$model->type = $files['type'];
						$model->size = $files['size'];
						$model->path_short = "/public/files/{$year}/{$mouth}/{$day}/" . $model->name;
						$model->path_full = $targetPath . $model->name;
						$model->create_by = $this->user->id;
						
						// Mover archivo
						$error_up = !$model->copyFile($files['tmp_name']);
						$returning->error = $error_up;
							$returning->text = $error_up; // carpeta: {$targetPath}
						if ($error_up == false) {
							$returning->files[] = (object) [
								"id" => $model->id,
								"name" => $model->name,
								"type" => $model->type,
								"size" => $model->size,
								"path_short" => $model->path_short,
								"path_full" => $model->path_full,
								"error" => ($model->id > 0) ? false : true,
							];
						} else {
							$response = array (
								'status' => 'error',
								'info'   => 'No se pudo cargar el archivo solicitado :(, ocurrió un misterioso error.'
							);
						}
					}
				} else {
					$returning->text = "No hay permisos en la carpeta. {$targetPath}";
				}
			}else{
				$returning->text = "no existe la carpeta. {$targetPath}";
			}
		}
		
		$returning->status = $returning->error == false ? 'status' : 'error';
		$returning->files = is_object(json_decode(json_encode($returning->files))) ? [$returning->files] : $returning->files;
		echo json_encode($returning);
		return json_encode($returning);
	}
	
	public function addScripts_GA(){
        if ($this->isGuest){ $this->goHome(); }
		// https://console.developers.google.com/apis/credentials/oauthclient/507571280579-rir2jneap7141vh6g66kr87ep44qmpph.apps.googleusercontent.com?project=gapi-1470725186645
		// https://console.developers.google.com/apis/credentials/consent?project=gapi-1470725186645&duration=P1D
		
		$scriptGA = "(function(w,d,s,g,js,fs){
		  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
		  js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
		  js.src='https://apis.google.com/js/platform.js';
		  fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
		}(window,document,'script'));";
		$this->appendScriptBefore($scriptGA);
	}
	
	// Usuarios
	public function actionUsersMaster(){
        if ($this->isGuest){ $this->goHome(); }
        $query = new Usuario($this->adapter);
        $allusers = $query->getAll();
		
		$this->render("admin_usuarios", [
			"title"   	=> "Usuarios",
			"subtitle"  => "Master",
			"allusers"		=> $allusers,
		]);
	}
	
	// Login - Manejador de Ingreso y Registro
    public function actionLogin(){
		$error = null;
        $this->theme['default'] = 'demo-login';
        if (!$this->isGuest){ $this->goHome(); }
        $model = new LoginForm($this->adapter);
        $register = new RegisterForm($this->adapter);
		$model->createFormLogin();
		$register->createForm();
		if($model->formulario->isValid()){
			$user = $_REQUEST['username'];
			$pass = $_REQUEST['password'];
			$hash = password_hash($pass, PASSWORD_DEFAULT);
			
			// Buscar usuario.
			$searchUser = $model->getBy('username', $user);
			if(isset($searchUser[0])){
				$verify = password_verify($pass, $searchUser[0]->password);
				if($verify === true){
					$this->session->setAll((array) $searchUser[0]);
					$this->redirect('site', 'login', [
						"error" => 'Bienvenid@'
					]);
				} else {
					$this->redirect('site', 'login', [
						"error" => 'Contraseña incorrecta.'
					]);
				}
				
				
			}else{
				$this->redirect('site', 'login', [
					"error" => "El usuario {$_REQUEST['username']} no existe."
				]);
			}
		}
		else if($register->formulario->isValid()){
			$valuesRegister = $register->formulario->submitedValues();
			$checkPass = $valuesRegister['register_password'] == $valuesRegister['register_password_validate'] ? true : false;
			$text = $checkPass == true ? "Espere.." : "Las contraseñas no coinciden.";
			$register->formulario->setSucessMessage($text);
			if($checkPass == false){
				$this->redirect('site', 'login', [
					"error" => 'Las contraseñas no coinciden.',
					"feliphegomez" => 'more/#signup'
				]);
			}
			
		
			
			$register->setFormRegisterResult($valuesRegister);
			$newUser = $register->crearMin();
			if($newUser = true){
				$searchUser = $model->getById($register->id);
				$this->session->setAll((array) $searchUser[0]);
				
			
				$file = dirname(dirname(__DIR__) . "/../") . "/templates/mails/register.php";
				//$file = "templates/mails/register.php";
				$fileExist = @file_exists($file);
				$template = @htmlspecialchars(@file_get_contents($file, true));
				if($fileExist == true){					
					$template = (preg_replace([
						'/%username%/i',
						'/%email%/i',
						'/%password%/i',
					], [
						$valuesRegister['register_username'],
						$valuesRegister['register_email'],
						$valuesRegister['register_password'],
					], $template));
				}
				$template = htmlspecialchars_decode(utf8_decode($template));
				
				$mail = new MailSend();
				$mail->setSubject("¡Te damos la bienvenida a Monteverde!");
				$mail->addTo($valuesRegister['register_email'], $valuesRegister['register_username']);
				$mail->setHtml(true);
				$mail->setMessage($template);
				$sendingMail = $mail->sendMail();
				if($sendingMail == true){
					// Enviado con exito
					// echo json_encode($sendTru);
				}
				
				
				$this->redirect('site', 'login', [
					"error" => 'Bienvenid@'
				]);
			} else {
				$this->redirect('site', 'login', [
					"error" => 'Hubo un error creando la cuenta.',
					"feliphegomez" => 'more/#signup'
				]);
			}
		}
		
		if(isset($_GET['error']) && $_GET['error'] != ""){
			$error = [
				"title" => "Ups! Hubo un error",
				"text" => $_GET['error'],
				"styling" => "bootstrap3",
				"type" => "error",
				"icon" => true,
				"animation" => "zoom",
				"hide" => false
			];
			
			$this->errors[] = $error;
		}
		$this->render("login", [
            "title" => "Iniciar sesión",
            "register" => $register,
            "model" => $model,
            "error" => $error
        ]);
    }
    
	// Login - Manejador de Cierre de sesion
	public function actionLogout(){
        $this->theme['default'] = 'demo-login';
        global $global_session;
        $global_session->close();
        return $this->goHome();
    }
	
	// Permisos - Manejador de Permisos PHP LISTA
	public function actionAdminPermissionsList(){
        if ($this->isGuest){ $this->goHome(); }
        $error = Null;
        $model = new PermissionsItems($this->adapter);
        $allpermissions = $model->getAll();
		$this->render("admin_permissions_list", [
			"title"          => "Permisos",
			"subtitle"       => "Master",
			"allpermissions" => $allpermissions,
		]);
	}
	
	// Permisos - Manejador de Permisos PHP CREAR
	public function actionAdminPermissionsCreate(){
        if ($this->isGuest){ $this->goHome(); }
        $error = Null;
        $model = new PermissionsItems($this->adapter);
		$model->generateFormCreate();
		
		if($model->formulario->isValid()){
			$tag = $_REQUEST['tag'];
			$label = $_REQUEST['label'];
			$description = $_REQUEST['description'];
			$model->setAll([(object) $_REQUEST]);
			$new = $model->crear();
			if($new == true){
				$this->redirect('site', 'AdminPermissionsList', []);
			} else {
				$this->redirect('site', 'AdminPermissionsCreate', [
					"error" => "El permiso {$_REQUEST['label']} no se pudo crear."
				]);
			}
		}
		
		if(isset($_GET['error']) && $_GET['error'] != ""){
			$error = [
				"title" => "Ups! Hubo un error",
				"text" => $_GET['error'],
				"styling" => "bootstrap3",
				"type" => "error",
				"icon" => true,
				"animation" => "zoom",
				"hide" => false
			];
			
			$this->errors[] = $error;
		}
		
		$this->render("admin_permissions_add", [
			"title"          => "Permisos",
			"subtitle"       => "Master",
			"model" => $model,
			"error" => $error,
		]);
	}
	
	// Permisos - Manejador de Permisos VUE
	public function actionAdminPermissionsVue(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		
		$this->render("vue_table", [
            "title" => "Permisos",
            "subtitle" => "Master",
			"table" => "permissions_items"
        ]);
	}
	
	// Permisos - Manejador de Permisos VUE
	public function actionAdminPermissionsGroupVue(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		
		$this->render("vue_table", [
            "title" => "Grupos de Permisos",
            "subtitle" => "Master",
			"table" => "permissions_group"
        ]);
	}
	
	// Usuarios - Manejador de Usuarios VUE
	public function actionAdminUsersVue(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		
		$this->render("vue_table", [
            "title" => "Usuarios",
            "subtitle" => "Master",
			"table" => "users"
        ]);
	}

	// Menus - Manejador de Menús
	public function actionAdminMenusVue(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		
		$this->render("vue_table", [
            "title" => "Menús",
            "subtitle" => "Master",
			"table" => "menus"
        ]);
	}
	
	// Analytics - Visualizaciones Google Analytics Basico
	public function actionAnalytics_basic(){
		$this->addScripts_GA();
		$this->render('analytics_basic', [
			"clientid" => "507571280579-rir2jneap7141vh6g66kr87ep44qmpph.apps.googleusercontent.com"
		]);
	}

	// Analytics - Visualizaciones Google Analytics Multiple
	public function actionAnalytics_multiple(){
		$this->addScripts_GA();
		$this->render('analytics_multiple', [
			"clientid" => "507571280579-rir2jneap7141vh6g66kr87ep44qmpph.apps.googleusercontent.com"
		]);
	}

	// Analytics - Visualizaciones Google Analytics Interactivo
	public function actionAnalytics_interactive(){
		$this->addScripts_GA();
		$this->render('analytics_interactive', [
			"clientid" => "507571280579-rir2jneap7141vh6g66kr87ep44qmpph.apps.googleusercontent.com"
		]);
	}
	
	// Emails - Manejador de Inbox Email
	public function actionMy_email(){
        if ($this->isGuest){ $this->goHome(); }
		$AllBoxes = $this->user->getEmailBoxes();
		$this->render("my_inbox", [
			"title"    =>"Correos electronico",
			"AllBoxes" => $AllBoxes,
		]);
		/*
		$mailBoxes = null;
		for($i = 0; $i < count($mailBoxes); $i++){ if($mailBoxes[$i]['enable'] == true){ $mailBoxes = $mailBoxes[$i]; break; } }
		$box = !isset($_GET['ref']) ? isset($mailBoxes) ? $mailBoxes['id'] : false : $_GET['ref'];
        if (!isset($box) || $box < 0){ $this->goHome(); }
		$mailBoxes = is_array($mailBoxes) ? (object) $mailBoxes : $mailBoxes;
		$filter = !isset($_GET['folder']) ? 'default' : $_GET['folder'];
		$this->render("my_inbox", [
			"title"    =>"Correos electronico",
			"ref" => $box,
			"MailerBox" => $mailBoxes,
			"AllBoxes" => $AllBoxes,
			//"filter" => $filter,
		]);*/
	}
	
	// Emails - Manejador de correo electronico individual
	public function actionMy_email_id(){
        if ($this->isGuest){ $this->goHome(); }
		$mailBoxes = ($this->user->getEmailBoxes());
		for($i = 0; $i < count($mailBoxes); $i++){
			if($mailBoxes[$i]->actived == true){
				$mailBoxes = $mailBoxes[$i]->id;
				break; 
			}
		}
		$box = !isset($_GET['ref']) ? isset($mailBoxes) ? $mailBoxes : 0 : $_GET['ref'];
		$email_id = !isset($_GET['message_id']) ? 0 : $_GET['message_id'];
        if (!isset($box) || $box < 0){ $this->goHome(); }
        if (!isset($email_id) || $email_id < 0){ $this->goHome(); }
		
		$mail = new Email($this->adapter);
        if (isset($box) && $box > 0){ $list = $mail->getByEmailFromBox($box, $email_id); }
		else { $this->goHome(); }
		$date = new DateText($mail->date);
		
		
		$isHtml = SiteController::isHTML((htmlspecialchars_decode($mail->message)));
		if($isHtml == false){ $mail->message = nl2br($mail->message, false); } 
		else {
			$mail->message = htmlspecialchars($mail->message);
			$arr1 = ["/href=\"http:/"];
			$arr2 = ["href=\"https:"];
			$mail->message = preg_replace($arr1, $arr2, $mail->message);
			$arr1 = ["/href=\"http:/"];
			$arr2 = ["href=\"https:"];
			$mail->message = preg_replace($arr1, $arr2, $mail->message);
			$mail->message = htmlspecialchars_decode($mail->message);
		}
		
		$entrega = (object) [
			"id" => $mail->id,
			"box" => $mail->box,
			"isHtml" => $isHtml,
			"message_id" => $mail->message_id,
			"uid" => $mail->uid,
			"status" => $mail->status,
			"subject" => $mail->subject,
			"from" => $mail->from,
			"from_email" => $mail->from_email,
			"to" => $mail->to,
			"to_email" => $mail->to_email,
			"date" => $date,
			"size" => $mail->size,
			"created" => $mail->created,
			"message" => htmlspecialchars_decode($mail->message),
			"attachments" => json_decode($mail->attachments),
			"recent" => $mail->recent,
			"flagged" => $mail->flagged,
			"answered" => $mail->answered,
			"deleted" => $mail->deleted,
			"seen" => $mail->seen,
			"draft" => $mail->draft,
			"new" => $mail->new,
			"response" => $mail->response,
		];
		
		$response = (object) [
			"error"    => true,
			"record" => $entrega
		];
		
		if($mail->id > 0){
			$response->error = false;
		}
		
		header("Content-type:application/json");
		echo json_encode($response);
		return json_encode($response);
	}
	
	// Emails - Manejador de Body para Email = iframe
	public function actionMy_email_body(){
		$box = !isset($_GET['ref']) ? null : $_GET['ref'];
		$email_id = !isset($_GET['email_id']) ? null : $_GET['email_id'];
		$model = new Email($this->adapter);
        if (!isset($box) || $box < 0){ $this->goHome(); }
		$model->getById($email_id);
		$date = new DateText($model->date);
		$message = ($model->message);
		if(SiteController::isHTML($message) == true){
			header("text/html; charset=UTF-8");
			echo "<style>"
				."html { zoom: 0.85 !important;overflow: auto; }\n"
			."</style>";
		} else {
			// header("Content-Type: text/plain; charset=UTF-8");
			header("text/plain; charset=UTF-8");
			$message = str_replace(["\n"], ['<br />'], $message);
		}
		// $message = preg_replace("/^http:/i", "https:", $message);
		#$arr1 = ["/href=\"http:/", "/target=(.*)/"];
		#$arr2 = ["href=\"https:", "target=\"_blancko\""];
		
		$arr1 = ["/href=\"http:/"];
		$arr2 = ["href=\"https:"];
		$message = preg_replace($arr1, $arr2, $message);
		$arr1 = ["/href=\"http:/"];
		$arr2 = ["href=\"https:"];
		$message = preg_replace($arr1, $arr2, $message);
		
		$message = utf8_decode(utf8_encode($message));
		echo  ($message);
		return $message;
	}
	
	// Emails - Manejador de cuentas de correo electronico (boxes)
	public function actionAdminEmailsBoxesVue(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		
		$this->render("vue_table", [
            "title" => "Cuentas de correo",
            "subtitle" => "Master",
			"table" => "emails_boxes"
        ]);
	}
	
	// Emails - Manejador de cuentas de correo electronico (attachments)
	public function actionAdminEmailsAttachmentsVue(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		
		$this->render("vue_table", [
            "title" => "Usuarios",
            "subtitle" => "Master",
			"table" => "emails_attachments"
        ]);
	}
	
	// Emails - Manejador de cuentas de correo electronico (emails in user)
	public function actionAdminEmailsBoxesInUserVue(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		
		$this->render("vue_table", [
            "title" => "Usuarios",
            "subtitle" => "Master",
			"table" => "emails_users"
        ]);
	}
	
	// Emails - Manejador para cambio de estado de los correos electronicos
	public function actionMy_email_change_status(){
		$box = !isset($_REQUEST['ref']) ? null : $_REQUEST['ref'];
		$email_id = !isset($_REQUEST['id']) ? null : $_REQUEST['id'];
		$model = new Email($this->adapter);
        if (!isset($box) || $box < 0){ $this->goHome(); }
		$model->getById($email_id);
		header("Content-type:application/json");
		$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : "GET";
		
		$returning = (object) [
			'error' => true,
			'result' => false,
			'method' => $method,
			#  'request' => isset($_REQUEST) ? $_REQUEST : [],
		];
		if(($email_id > 0)){
			$filter = !isset($_REQUEST['folder']) ? 'default' : $_REQUEST['folder'];
			$folders = [
				'inbox' => [
					'status' => 'read',
					'seen' => 0,
					'draft' => 0,
					'deleted' => 0
				],
				'seen' => [
					'status' => 'read',
					'seen' => 1,
					'draft' => 0,
					'deleted' => 0
				],
				'not_seen' => [
					'status' => 'unread',
					'seen' => 0,
					'draft' => 0,
					'deleted' => 0
				],
				'trash' => [
					'status' => 'read',
					'seen' => 0,
					'deleted' => 1
				],
				'draft' => [
					'status' => 'read',
					'seen' => 0,
					'draft' => 1,
					'deleted' => 0
				],
				'default' => [
				],
			];
			$filters = isset($folders[$filter]) ? $folders[$filter] : $folders['default'];
			if (!isset($filter) || $filter == 'default'){ $this->goHome(); }
			$returning->filter = $filter;
			$returning->filters = $filters;
			$returning->request = $_REQUEST;
			
			$returning->result = $model->updateByFilter($filters);
			
			if($returning->result == true){
				$returning->error = false;
			}
		}
		
		echo json_encode($returning);
		return json_encode($returning);
	}

	// Media - Manejador de Multimedia
	public function actionAdminMediaVue(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		
		$this->render("vue_table", [
            "title" => "Usuarios",
            "subtitle" => "Master",
			"table" => "media"
        ]);
	}

	public function actionMy_profile(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		$this->render("my_profile", [
            "title" => "Mi Perfil",
            "subtitle" => "",
        ]);
	}
	
	public function actionMy_accounts(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		$this->render("my_accounts", [
            "title" => "Mis Cuentas",
            "subtitle" => "",
        ]);
	}
	
	public function actionMy_calendar(){
		$error = null;
        if ($this->isGuest){ $this->goHome(); }
		$this->render("my_calendar", [
            "title" => "Mi Calendario",
            "subtitle" => "Mi Calendario",
        ]);
		
		/*
		$this->render("vue_master", [
            "title" => "Cuentas",
            "subtitle" => "Todas las cuentas",
			"table" => $table
        ]);*/
	}

	public function actionVerificar_email(){
		$error = null;
		$returnData = [];
		$returnData['error'] = true;
		$returnData['email'] = !isset($_GET['address_mail']) ? null : $_GET['address_mail'];
		$returnData['message'] = '';
		
		if($returnData['email'] == null){
			$returnData['message'] = 'No se detecto correo para verificar.';
		}else{
			// Initialize library class
			$mail = new FelipheGomez\VerifyEmail();
			// Set the timeout value on stream
			//$mail->setStreamTimeoutWait(1);
			// Set debug output mode
			//$mail->Debug= false; 
			//$mail->Debugoutput= 'html';
			// Set email address for SMTP request
			$mail->setEmailFrom('no-reply@monteverdeltda.com');
			// Email to check
			$email = $returnData['email'];
			
			// Check if email is valid and exist
			if($mail->check($email)){
				$returnData['error'] = false;
				$returnData['message'] = '¡El correo electrónico &lt;' . $email . '&gt; existe!';
			}elseif(FelipheGomez\verifyEmail::validate($email)){ 
				$returnData['message'] = 'El correo electrónico &lt;' . $email . '&gt; es válido, ¡pero no existe!'; 
			}else{ 
				$returnData['message'] = 'El correo electrónico &lt;' . $email . '&gt; no es valido y no existe!'; 
			}
		}
			
		echo json_encode($returnData);
		return json_encode($returnData);
		exit();
	}

}