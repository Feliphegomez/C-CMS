﻿<?php 
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
        if ($this->isGuest){
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			], 'demo-login');
			header('HTTP/1.0 403 Forbidden'); exit();	
		}
        /*
        $this->render("home_users", [
            "title" => "Principal Usuario",
			"description" => $this->user
        ]);*/
		/*
        $this->render("debug_user", [
            "title" => "Principal Usuario",
			"description" => $this->user
        ]);*/
        $this->actionMy_profile();
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
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
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

	// Cuentas - Master
	public function actionAccounts_master(){
		$error = null;
        if ($this->isGuest || ($this->checkPermission('accounts:master:admin') !== true)){ $this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			], 'main'); }
			
		$this->render("accounts_master", [
            "title" => "Master Cuentas",
        ]);
	}

	// Servicios - Master
	public function actionServices_master(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		$this->render("services_master", [
            "title" => "Master Servicios",
        ]);
	}
	
	public function actionCalendar_Master(){
		$this->render("calendar_master", [
            "title" => "Calendario",
            "subtitle" => "Todo",
        ]);
	}
	
	public function actionTable_Master_Vue(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		$table = isset($_GET['table']) ? $_GET['table'] : false;
		if ($table == false) { $this->goHome(); }
		
		$this->render("vue_table", [
            "title" => "Tablas",
            "subtitle" => "Master",
			"table" => $table
        ]);
	}
	
	// media - Subir Archivo
	public function actionUploadFile(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
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
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
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
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
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
		if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
        $this->theme['default'] = 'demo-login';
        global $global_session;
        $global_session->close();
        return $this->goHome();
    }
	
	// Permisos - Manejador de Permisos PHP LISTA
	public function actionAdminPermissionsList(){
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
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
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
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
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("vue_table", [
            "title" => "Permisos",
            "subtitle" => "Master",
			"table" => "permissions_items"
        ]);
	}
	
	// Permisos - Manejador de Permisos VUE
	public function actionAdminPermissionsGroupVue(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("vue_table", [
            "title" => "Grupos de Permisos",
            "subtitle" => "Master",
			"table" => "permissions_group"
        ]);
	}
	
	// Usuarios - Manejador de Usuarios VUE
	public function actionAdminUsersVue(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("vue_table", [
            "title" => "Usuarios",
            "subtitle" => "Master",
			"table" => "users"
        ]);
	}

	// Menus - Manejador de Menús
	public function actionAdminMenusVue(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
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
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
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
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
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
		if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
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
		
		$message = mb_convert_encoding(utf8_encode($message), 'Windows-1252', 'UTF-8');
		
		// $message = mb_convert_encoding(utf8_decode($message), 'UTF-8', 'Windows-1252');
		
		//$message = (mb_convert_encoding($message, 'Windows-1252','UTF-8') !== $message) ? "" :  $message;
		echo  ($message);
		return $message;
	}
	
	// Emails - Manejador de cuentas de correo electronico (boxes)
	public function actionAdminEmailsBoxesVue(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("vue_table", [
            "title" => "Cuentas de correo",
            "subtitle" => "Master",
			"table" => "emails_boxes"
        ]);
	}
	
	// Emails - Manejador de cuentas de correo electronico (attachments)
	public function actionAdminEmailsAttachmentsVue(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("vue_table", [
            "title" => "Usuarios",
            "subtitle" => "Master",
			"table" => "emails_attachments"
        ]);
	}
	
	// Emails - Manejador de cuentas de correo electronico (emails in user)
	public function actionAdminEmailsBoxesInUserVue(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
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
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("vue_table", [
            "title" => "Usuarios",
            "subtitle" => "Master",
			"table" => "media"
        ]);
	}

	public function actionMy_profile(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		$this->render("my_profile", [
            "title" => "Mi Perfil",
            "subtitle" => "",
        ]);
	}
	
	public function actionMy_accounts(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		$this->render("my_accounts", [
            "title" => "Mis Cuentas",
            "subtitle" => "",
        ]);
	}
	
	public function actionMy_calendar(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
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
			$mail->setEmailFrom($returnData['email']);
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
	
	// Emails - Montaje para Test de Email 
	/*
		URL:/index.php?controller=site&action=testerMail&address_mail={address_mail}
		var @address_mail = string
	*/
	public function actionTesterMail(){
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
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
			$mail->setEmailFrom($returnData['email']);
			$email = $returnData['email'];
			
			// Check if email is valid and exist
			if(FelipheGomez\verifyEmail::validate($email)){
				$mail = new MailSend();
				$mail->setSubject("¡Mensaje de pruebas desde " . MAIL_DEFAULT_FROM_NAME . "!");
				$mail->addTo($email, 'Test FG');
				$mail->setHtml(false);
				$mail->setMessage("Esto es un correo de pruebas generado desde " . BUSSINES_NAME_LG);
				$returnData['MailSend'] = $mail->sendMail();
			}else{ 
				$returnData['message'] = 'El correo electrónico &lt;' . $email . '&gt; no es valido y no existe!'; 
			}
		}
			
		echo json_encode($returnData);
		return json_encode($returnData);
		exit();
	}

	// Emails - Manejador para Envio de Email
	public function actionSendMail(){
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		$error = null;
		$returnData = [];
		$returnData['error'] = true;
		$returnData['message'] = '';
		
		$mail_id = isset($_REQUEST['mail_id']) ? $_REQUEST['mail_id'] : 0;
		$box_id = isset($_REQUEST['box_id']) ? $_REQUEST['box_id'] : 0;
		
		
		if($mail_id <= 0 || $box_id <= 0){
			$returnData['message'] = 'Los parametros no existen.';
		}else{
			$emailBase = new Email($this->adapter);
			
			$sql = "SELECT * FROM {$emailBase->getTableUse()} WHERE id=? AND box=?";
			$data = [$mail_id, $box_id];
			$items = $emailBase->getSQL($sql, $data);
				
			if(isset($items[0])){
				$emailInfo = (object) $items[0];
				$emailverify = new FelipheGomez\VerifyEmail();
				$from_email = $emailInfo->from_email;
				$emailverify->setEmailFrom($from_email);
				if($emailverify->check($from_email)){
					// Crear Correo
					$mail = new MailSend();
					// Habilitar HTML
					$mail->setHtml(true);
					// Definir Destinatario
					$mail->setFrom($emailInfo->from_email, $emailInfo->from);
					// Definir la cuenta de respuesta
					$mail->setReply($emailInfo->from_email, $emailInfo->from);
					// Asunto
					$mail->setSubject($emailInfo->subject);
					// Añadir Direcciones de envío
					$addresses = json_decode($emailInfo->to);
					foreach($addresses as $to_mail){
						if(FelipheGomez\verifyEmail::validate($to_mail->address_mail)){ 
							$mail->addTo($to_mail->address_mail, $to_mail->label); // Validar correo a@b.c
						}
					}
					// Mensaje
					if(isset($emailInfo->message)){
						$mail->setMessage(($emailInfo->message));
					}
					// Adjuntos
					$attachments = json_decode($emailInfo->attachments);
					foreach($attachments as $fileAttachment){
						if(isset($fileAttachment->targetPath)){ $mail->addAttachments($fileAttachment->targetPath); }
						if(isset($fileAttachment->path_full)){ $mail->addAttachments($fileAttachment->path_full); }
					}
					/*
					*/
					// Modificar ID del Mensaje
					/*
					preg_match_all('/[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i', $from_email, $domain_search);
					$domain = ($domain_search[0]);
					$subID = base64_encode("CelesteSamael");					
					$dateUTC = ((idate("U") - 1000000000) . uniqid());
					$createMessageID = "<" . md5("FG-{$domain[0]}" . $subID) . '-' . $dateUTC . '@' . $domain[0];
					*/
					
					$resultSend = $mail->sendMail();
					if($resultSend == true){
						$idMessage = $mail->MessageID;
						// $idMessage
						// $update = $emailBase->updateBy($mail_id, 'message_id', $idMessage);
						
						$returnData['error'] = false;
						$returnData['message'] = 'Mensaje enviado.';
					} else {
						$returnData['message'] = 'Error enviado el mensaje.';
					}
					/*
					$resultSend = $mail->sendMail();
					if($resultSend == true){
						$idMessage = $mail->MessageID;
						$returnData['message'] = 'Mensaje enviado. ID: ' . $idMessage;
					} else {
						$returnData['message'] = 'Error enviado el mensaje.';
					}
					*/
				}elseif(FelipheGomez\verifyEmail::validate($from_email)){ 
					$returnData['message'] = 'El correo electrónico de envio &lt;' . $from_email . '&gt; es válido, ¡pero no existe!'; 
				}else{ 
					$returnData['message'] = 'El correo electrónico de envio &lt;' . $from_email . '&gt; no es valido y no existe!'; 
				}
				
				
			} else {
				$returnData['message'] = 'Los parametros no coinciden.';
			}
		}
			
		echo json_encode($returnData);
		return json_encode($returnData);
		exit();
	}

	// Budgets - Manejador para administrador
	public function actionBudgets_admin(){
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
	
		$this->render("budgets_admin", [
			"title" => "Presupuestos",
			"subtitle" => "Master",
			"table" => "budgets"
		]);
	}
	
	// Manejador para la biblioteca garden
	public function actionGarden(){
		$error = null;
        if ($this->isGuest){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
		
		$this->render("libraries_garden", [
            "title" => "Bilbiotecas",
            "subtitle" => "Plantas y Especies",
        ]);
	}
	
	// Manejador para candidatos / aspirantes
	public function actionCandidates_list(){
        if ($this->isGuest || ($this->checkPermission('candidates:admin') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
		$error = null;		
		$this->render("candidates", [
            "title" => "Candidatos / Aspirantes",
            "subtitle" => "",
        ]);
	}
	
	// Candidatos - Search Return IDs
	public function actionSearchCandidates(){
        if ($this->isGuest || ($this->checkPermission('candidates:admin') !== true)){ 
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
		$error = isset($_GET['searchText']) ? false : true;
		$text = isset($_GET['searchText']) ? $_GET['searchText'] : "";
		$items = array();
		$returning = (object) [
			'error' 	=> $error,
			'text' => $text,
			'records' => $items,
		];
		
		if ($error === false){
			// "Busqueda 1"
			$sql = "SELECT * FROM `candidates` 
			WHERE 
				`identification_number` LIKE '%{$text}%' 
				OR `names` LIKE '%{$text}%' 
				OR `surname` LIKE '%{$text}%' 
				OR `address` LIKE '%{$text}%' 
				OR `salary` LIKE '%{$text}%' 
				OR `email` LIKE '%{$text}%' 
				OR `phone` LIKE '%{$text}%' 
				OR `mobile` LIKE '%{$text}%' 
				OR `notes` LIKE '%{$text}%'";
			$conn = new EntidadBase('candidates', $this->adapter);
			$data = $conn->getSQL($sql);
			$records1 = [];
			foreach($data as $candidate){
				$candidate = is_array($candidate) ? (object) $candidate : $candidate;
				//$returning->records[] = $candidate->id;
				if(!isset($records1[$candidate->id])){
					$records1[] = $candidate->id;
				}
			}
			// "Busqueda 2" - Dentro de experiencia
			$sql2 = "SELECT * FROM `candidates_experience` 
			WHERE 
				`business` LIKE '%{$text}%' 
				OR `position` LIKE '%{$text}%' 
				OR `functions` LIKE '%{$text}%' ";
			$conn2 = new EntidadBase('candidates_experience', $this->adapter);
			$data2 = $conn2->getSQL($sql2);
			$records2 = [];
			foreach($data2 as $experience){
				$experience = is_array($experience) ? (object) $experience : $experience;
				if(!isset($records2[$experience->candidate])){
					$records2[] = $experience->candidate;
				}
			}
		}
		$returning->records = array_merge(array_unique(array_merge($records1, $records2)), array());
		echo json_encode($returning);
		return json_encode($returning);
	}
	
	// 
	public function actionTestAD(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		/*$this->render("testAD", [
            "title" => "",
            "subtitle" => "",
        ]);*/
		
		//phpinfo(); exit();		
		echo "Iniciando pruebas de Active Directory";
		
		// Define the parameters for the shell command
		$location_ip = "\\\\172.16.4.2";
		$domain = "MONTEVERDE.local";
		$location = "\\SRV-DC";
		$user = "Monteverde";
		$pass = "Medellin2019";
		$letter = "G";


$dir = "\\\\172.16.4.2\\g";
$files = scandir($dir);
print_r($files);
/*

		function map_path($path, $domain,$username,$password )
		{   
			//delete all current mapping
			exec("net use * /delete /y");
			//create a new mapping to local K: drive
			exec('net use k: '.$path.' /user:'.$domain.'\\'.$username.'  '.$password.' /persistent:no');
		}


		function print_dir_list($master_path){
			map_path(str_replace("/","\\",dirname($master_path)),"companey_ds","username","password");

			//get the list of folders in local K: drive
			exec('dir k:', $output, $ret);

			//iterate trough the list and print
			foreach($output as $str)
			{
				echo $str;
			}
		}
		
		$dor = map_path($location_ip, $domain, $user, $pass);
		print_r($dor);
		print_dir_list();
		*/
		
		/*
		$targetPath = PUBLIC_PATH . "/files/reports/{$year}/{$mouth}/{$day}/";
		// Compruebe si la carpeta de carga si existe sino se crea la carpeta
		if ( !file_exists($targetPath) && !is_dir($targetPath) ) { mkdir($targetPath, 0777, true); };
		// Compruebe si la carpeta se creo o si existe
		if ( file_exists($targetPath) && is_dir($targetPath) ) {
			// Comprueba si podemos escribir en el directorio de destino
			if ( is_writable($targetPath) ) {} else {
				$returning->text = "No hay permisos en la carpeta. {$targetPath}";
			}
		}else{
			$returning->text = "no existe la carpeta. {$targetPath}";
		}*/
	}
	
	// Reporte media - Subir Archivo en Reporte
	public function actionUploadFileReports(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$year = (isset($_GET['year']) && (int) $_GET['year'] >= date("Y")) ? (int) $_GET['year'] : date("Y");
		$route_name = isset($_GET['route_name']) ? base64_decode((string) $_GET['route_name']) : false;
		$group_name = isset($_GET['group_name']) ? base64_decode((string) $_GET['group_name']) : false;
		$period_name = isset($_GET['period_name']) ? base64_decode((string) $_GET['period_name']) : false;
		$lot_name = isset($_GET['lot_name']) ? base64_decode((string) $_GET['lot_name']) : false;
		$type = isset($_GET['type']) ? $_GET['type'] : false;
		$typeText = ($type !== "A") ? ($type == "D") ? 'DESPUES' : 'OTRO' : 'ANTES';
		
		$ds          = DIRECTORY_SEPARATOR;
		$storeFolder = 'uploads';
		$files_detect = !isset($_FILES['file']) ? false : true;
		$files = isset($_FILES['file']) ? [$_FILES['file']] : [];
		$returning = (object) [
			'error' 	=> true,
			'status'    => 'error',
			'result' => false,
			'files_detect' => $files_detect,
			'files' => [],
			'files_origin' => $files,
			//'files' => isset($_FILES['file']) ? $_FILES['file'] : [],
			'text' => ""
		];
		
		if(
			$route_name !== false
			&& $group_name !== false
			&& $period_name !== false
			&& $lot_name !== false
			&& $type !== false
		){
			$folderBase = [
				"reports",
				"photographics",
				"{$year}",
				"{$period_name}",
				// cuadrilla
				$route_name,
				// $lot_name,
				$typeText
			];
			$targetPath = PUBLIC_PATH . "/" . implode('/', $folderBase)."/";
			$returning->text = $targetPath;
			
			if (!empty($_FILES)) {
				$isArray = is_array($files) ? true : false;
				$day = date("d");
				$mouth = date("m");
				$year = date("Y");
				// Compruebe si la carpeta de carga si existe sino se crea la carpeta
				if ( !file_exists($targetPath) && !is_dir($targetPath) ) { mkdir($targetPath, 0777, true); };
				// Compruebe si la carpeta se creo o si existe
				if ( file_exists($targetPath) && is_dir($targetPath) ) {
					// Comprueba si podemos escribir en el directorio de destino
					if ( is_writable($targetPath) ) {
						if($isArray == true){
							// $returning->text = "multiples archivos."; //carpeta: {$targetPath}
							$total = count($files);
							for($i = 0; $i < $total; $i++){
								$model = new PhotographicFile($this->adapter);
								$model->name = randomString(16, $files[$i]['name']);
								$model->type = $files[$i]['type'];
								$model->size = $files[$i]['size'];
								$model->path_short = "/public/".implode('/', $folderBase)."/" . $model->name;
								$model->path_full = $targetPath . $model->name;
								$model->create_by = $this->user->id;
								
								// Mover archivo
								$error_up = !$model->copyFile($files[$i]['tmp_name']);
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
							$model = new PhotographicFile($this->adapter);
							$model->name = randomString(16, $files['name']);
							$model->type = $files['type'];
							$model->size = $files['size'];
							$model->path_short = "/public/".implode('/', $folderBase)."/" . $model->name;
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

		}
		
		$returning->status = $returning->error == false ? 'status' : 'error';
		$returning->files = is_object(json_decode(json_encode($returning->files))) ? [$returning->files] : $returning->files;
		echo json_encode($returning);
		return json_encode($returning);
	}
	
	// Manejador para empleados
	public function actionEmployees_List(){
        if ($this->isGuest || ($this->checkPermission('employees:admin') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		$error = null;		
		$this->render("employees_list", [
            "title" => "Empleados",
            "subtitle" => "Personal",
        ]);
	}

	public function actionMy_Email_Pending(){
		header('Content-Type: application/json');
        if ($this->isGuest || ($this->checkPermission('my:emails') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		$error = null;
		$returnData = [];
		$returnData['error'] = true;
		$returnData['message'] = '';
		$returnData['data'] = [];
		
		$myEmailsPendings = new Email($this->adapter);
		$mailBoxes = $this->user->getEmailBoxes();
		$mails = $myEmailsPendings->loadMailsPending($mailBoxes);
		// $returnData['data'] = $mails;
		if(is_array($mails)){
			foreach(array_reverse($mails) as $mail){
				$item = new stdClass();
				$item->url = linkRoute('site', 'my_email') . "&V=#/{$mail->box}/folder/not_seen/view/{$mail->id}-0";
				$item->from = (( strlen($mail->from) <= 2) ? "Anon" : $mail->from );
				$item->from_email = ((strlen($mail->from_email) <= 2) ? "Anon" : $mail->from_email);
				$item->subject = $mail->subject;
				$item->message = cortar_string(strip_tags($mail->subject), 25)."...";			
				$returnData['data'][] = $item;
			};
			$returnData['error'] = false;
		}
		echo json_encode($returnData);
		return json_encode($returnData);
		exit();
	}
	
	// Reporte fotográfico - Nuevo
	public function actionPhotographic_pending(){
		$error = null;
		// if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
        if (($this->checkPermission('reports:photographic:back') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("photographic_pending", [
            "title" => "Informe Registro Fotografico",
            "subtitle" => "Pendientes",
        ]);
	}
	
	function actionMy_Webmail(){
        if ($this->isGuest || ($this->checkPermission('my:webmail') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
		if (!isset($_GET['_box']) || (int) $_GET['_box'] <= 0) { header('HTTP/1.0 404 Forbidden'); exit(); }
		$mailBox = new EmailBox($this->adapter);
		$mailBox->getById($_GET['_box']);
		$user = $mailBox->user;
		$pass = $mailBox->pass;
		$urlOut = "https://micuenta.monteverdeltda.com/webmail/?_task=logout_mvt";
		$url = "https://micuenta.monteverdeltda.com/webmail/?postlogin&_user={$user}&_pass={$pass}&_action=login";
		
		$this->render("my_webmail", [
            "title" => "Correo Corporativo Monteverde LTDA",
            "subtitle" => "",
            "url" => $url,
        ]);
	}
	
	// Reporte fotográfico
	public function actionPhotographic_report(){
		$error = null;
		// if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
        if (($this->checkPermission('reports:photographic:view') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("photographic_report", [
            "title" => "Reporte fotográfico",
            "subtitle" => "",
        ]);
	}
	
	// Reporte fotográfico - Nuevo
	public function actionPhotographic_creator(){
		$error = null;
		// if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
        if (($this->checkPermission('reports:photographic:creator') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("photographic_creator_report", [
            "title" => "Reporte fotográfico",
            "subtitle" => "",
        ]);
	}
	
	// Reporte fotográfico - Nuevo
	public function actionPhotographic_client(){
		$error = null;
		// if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
        if (($this->checkPermission('reports:photographic:client') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("photographic_report3", [
            "title" => "Informe Registro Fotografico",
            "subtitle" => "",
        ]);
	}
	
	function actionMy_reports_approved(){
        if ($this->isGuest || ($this->checkPermission('reports:photographic:me:approvals') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("photographic_me_approved", [
            "title" => "Informe Registro Fotografico - Mi reportes aprobados",
            "subtitle" => "",
        ]);
	}
	
	function actionMy_reports_declined(){
        if ($this->isGuest || ($this->checkPermission('reports:photographic:me:declined') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("photographic_me_declined", [
            "title" => "Informe Registro Fotografico - Mi reportes rechazados",
            "subtitle" => "",
        ]);
	}
	
	function actionMy_reports_pending(){
        if ($this->isGuest || ($this->checkPermission('reports:photographic:me:pending') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("photographic_me_pending", [
            "title" => "Informe Registro Fotografico - Mi reportes pendientes",
            "subtitle" => "",
        ]);
	}
	
	function actionMy_reports(){
        if ($this->isGuest || ($this->checkPermission('reports:photographic:me:reports') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$this->render("photographic_me_reports", [
            "title" => "Informe Registro Fotografico - Mi reportes",
            "subtitle" => "",
        ]);
	}

    function actionSchedule(){
        if ($this->isGuest || ($this->checkPermission('schedule:general') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }

        // $this->render("schedule_emvarias", [
        $this->render("schedule", [
            "title" => "Revision General",
            "subtitle" => "Listado General",
        ]);
    }
	
    function actionLots(){
        if ($this->isGuest || ($this->checkPermission('lots:general') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }

        $this->render("lots", [
            "title" => "Lotes",
            "subtitle" => "Listado generado",
        ]);
    }
	
    function actionMicroroutes(){
        if ($this->isGuest || ($this->checkPermission('microrutes:general') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }

        $this->render("microroutes", [
            "title" => "Microrutas",
            "subtitle" => "Listado General",
        ]);
    }
	
    function actionSchedule_Programming(){
        if ($this->isGuest || ($this->checkPermission('schedule:programming:general') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
        $this->render("schedule_programming", [
            "title" => "Programacion",
            "subtitle" => "Crear",
        ]);
    }
	
	// Reporte nuevo - Subir Archivo en Reporte
	/*
	*/
	
    function actionProgramming(){
        if ($this->isGuest || ($this->checkPermission('schedule:programming') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
        $this->render("emvarias_programming", [
            "title" => "Programacion",
            "subtitle" => "Crear",
        ]);
    }
	
	// Reporte fotográfico - Consola de revision
	public function actionSchedule_Revision(){
		$error = null;
		// if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
        if (($this->checkPermission('reports:photographic:back') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
		
		$this->render("schedule_revision", [
            "title" => "Informe Registro Fotografico",
            "subtitle" => "Pendientes",
        ]);
	}

    function actionSchedule_Group(){
        if ($this->isGuest || ($this->checkPermission('schedule:general') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}

        // $this->render("schedule_emvarias", [
        $this->render("schedule_group", [
            "title" => "Revision",
            "subtitle" => "Listado General",
        ]);
    }
	
	function actionSchedule_Report_Live(){
        if ($this->isGuest || ($this->checkPermission('schedule:reports:create:before') !== true) || empty($_GET['type'])){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}

        $this->render("schedule_report_live_create", [
            "title" => "Reportar",
            "subtitle" => "Antes",
        ]);
	}
	
	function actionSchedule_Report_Live_Offline(){
        if ($this->isGuest || ($this->checkPermission('schedule:reports:create:before') !== true) || empty($_GET['type'])){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
        $this->render("schedule_report_live_create_offline", [
            "title" => "Reportar",
            "subtitle" => "Antes",
        ]);
	}
	
	function actionSchedule_Revision_Tinder(){
        if ($this->isGuest || ($this->checkPermission('schedule:revision:tinder:admin') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}

        $this->render("schedule_revision_tinder", [
            "title" => "Reportar",
            "subtitle" => "Antes",
        ]);
	}

    function actionSchedule_Live(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:schedule:live') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }

        // $this->render("schedule_emvarias", [
        $this->render("schedule_live", [
            "title" => "Revision General",
            "subtitle" => "Listado General",
        ]);
    }
	
	function actionTest_replace_photo(){
		try{
			$urlPicture = '/home/admin/web/micuenta.monteverdeltda.com/public_html/public/assets/images/default_user.png';
			if(empty($_GET['file_id']) || !isset($_GET['file_id'])){
				$txt = "Error: Falta ID";
			} else {
				$file_id = $_GET['file_id'];
				$fileModel = new ReportPhotographicFile($this->adapter);
				$fileModel->getById($file_id);
				
				if($fileModel->id <= 0){
					$txt = "Error: 404";
				} else {
					$schedule = new EmvariasSchedule($this->adapter);
					$schedule->getById($fileModel->schedule);
					$contract = "Contrato: ";
					$microruote = "";
					$FyH = "";
					$LatyLng = "";
					$AddressText = "";
					$period_group_year = "";
					
					if($schedule->id > 0){
						$contract .= "{$schedule->microroute->contract->name}" . "\r\n";
						$textCC = str_pad($schedule->microroute->name, 4, "0", STR_PAD_LEFT);
						#$microruote .= "Z{$schedule->microroute->zone}CC{$textCC}FM{$schedule->microroute->repeat}" . " - " . strtoupper($schedule->microroute->lot->address_text) . "\r\n";
						$dateProgramm = new DateTime($schedule->date_executed_schedule);
						#$FyH .= $dateProgramm->format('Y-m-d') . " - ";
						
						$latDSM = DDtoDMS($fileModel->lat);
						$latDSMText = $latDSM['deg'] . "°" . $latDSM['min'] . "'" . $latDSM['sec'] . "''" . (($fileModel->lat > 0) ? "N" : "S");
						
						$lngDSM = DDtoDMS($fileModel->lng);
						$lngDSMText = $lngDSM['deg'] . "°" . $lngDSM['min'] . "'" . $lngDSM['sec'] . "''" . (($fileModel->lng > 0) ? "O" : "W");
						
						$LatyLng .=   "{$latDSMText} {$lngDSMText}" . "\r\n";
						
						//$period_group_year .= "{$schedule->period->name} {$schedule->year} - {$schedule->group->name}" . "\r\n";
						
						$ctx = stream_context_create(array(
							'http' => array(
								'timeout' => 1
								)
							)
						);
						$result = json_decode(@file_get_contents("https://eu1.locationiq.com/v1/reverse.php?key=e5e2e6ef0e7892&postaladdress=1&format=json&zoom=18&lat={$fileModel->lat}&lon={$fileModel->lng}", 0, $ctx));
						
						if(isset($result->display_name)){
							$AddressText .= "{$result->display_name}" . "\r\n";
						}
					}
					
					$dateSchedule = new DateTime($fileModel->created);
					$FyH .= $dateSchedule->format('Y-m-d H:i:s') . "\r\n";
					
					$urlPicture = $fileModel->file_path_full;
					
					$txt = "MONTEVERDE Servicios Ambientales y Forestales LTDA\r\n" 
						. $contract
						. $microruote
						. $FyH
						. $LatyLng
						. $AddressText
						. $period_group_year;
				}
				
			}
			
			$infoFile = pathinfo($urlPicture);
			if($infoFile['extension'] == 'png'){ $img = imagecreatefrompng($urlPicture); } 
			else if($infoFile['extension'] == 'jpg' || $infoFile['extension'] == 'jpeg'){ $img = imagecreatefromjpeg($urlPicture); } 
			else if($infoFile['extension'] == 'gif'){ $img = imagecreatefromgif($urlPicture); } 
			else if($infoFile['extension'] == 'bmp'){ $img = imagecreatefrombmp($urlPicture); } 
			else if($infoFile['extension'] == 'wbmp'){ $img = imagecreatefromwbmp($urlPicture); } 
			else if($infoFile['extension'] == 'webp'){ $img = imagecreatefromwebp($urlPicture); }
			
			// FETCH IMAGE & WRITE TEXT
			//$img = imagecreatefrompng($urlPicture);
			# $font = "/home/admin/web/micuenta.monteverdeltda.com/public_html/public/assets/build/fonts/arial.ttf";
			#$font = "/home/admin/web/micuenta.monteverdeltda.com/public_html/public/assets/build/fonts/OCRAEXT.TTF";
			$font = "/home/admin/web/micuenta.monteverdeltda.com/public_html/public/assets/build/fonts/arial-bold.ttf";
			
			if(imagesy($img) > imagesx($img)){ $img = imagerotate($img, 90, 0); }
			// THE IMAGE SIZE
			//imagecopyresized($img, $img, 0, 0, 0, 0, 1366, 768, imagesx($img), imagesy($img));
			
			
			// imagecopyresized($img, $img2, 0, 0, 0, 0, 1366, 768, imagesx($img), imagesy($img));
			
			$width = imagesx($img);
			$height = imagesy($img);
			$white = imagecolorallocate($img, 255, 255, 255);
			// THE TEXT SIZE
			$text_size = imagettfbbox(10, 0, $font, $txt);
			$text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
			$text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

			// CENTERING THE TEXT BLOCK
			$centerX = CEIL(($width - $text_width) / 2);
			$centerX = $centerX<0 ? 0 : $centerX;
			//$centerX = $width - ($text_width*2);
			$centerY = CEIL(($height - $text_height) / 2);
			$centerY = $centerY<0 ? 0 : $centerY;
			//$centerY = -100
			imagettftext($img, 13, 0, CEIL(($width - $text_width) / 22) + 1, CEIL(($height - $text_height) / 1.3) - 1, imagecolorallocate($img, 0, 0, 0), $font, $txt);
			imagettftext($img, 13, 0, CEIL(($width - $text_width) / 22), CEIL(($height - $text_height) / 1.3), $white, $font, $txt);

			// OUTPUT IMAGE
			header('Content-type: image/jpeg');
			imagejpeg($img);
			imagedestroy($img);
		} catch(Exception $e){
			
		}

		// OR SAVE TO A FILE
		// THE LAST PARAMETER IS THE QUALITY FROM 0 to 100
		// imagejpeg($img, "test.jpg", 100);
	}

    function actionSchedule_Programming_Group(){
        if ($this->isGuest || ($this->checkPermission('schedule:programming:group') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
        $this->render("schedule_programming_group", [
            "title" => "Programacion Grupo",
            "subtitle" => "Crear",
        ]);
    }
	
	// Reporte media - 
	public function actionReport_Photo_Approve(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:schedule:files:approved') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		$_get = (!empty($_GET)) ? $_GET : [];
		$error = null;
		$file_id = (isset($_GET['file_id']) && (int) $_GET['file_id'] > 0) ? (int) $_GET['file_id'] : 0;
		$fileModel = new ReportPhotographicFile($this->adapter);
		$fileModel->getById($file_id);
		$ds          = DIRECTORY_SEPARATOR;
		
		
		if($fileModel->status !== 1 && file_exists($fileModel->file_path_full)){
			// echo "Vamos" . "\r\n";
			
			$path_full = $fileModel->file_path_full;
			$parts_path_full = explode($ds, $path_full);
			$array_finish_pf = [];
			foreach($parts_path_full as $f){ if($f == 'en-revision' || $f == 'no-aprobado'){ $f = 'aprobado'; } $array_finish_pf[] = $f; }
			$new_path_full = implode($ds, $array_finish_pf);
			$nameDir = dirname($new_path_full);
			
			# echo $nameDir ."\r\n";
			
			
			$path_short = $fileModel->file_path_short;
			$parts_path_short = explode($ds, $path_short);
			$array_finish_ps = [];
			foreach($parts_path_short as $f){ if($f == 'en-revision' || $f == 'no-aprobado'){ $f = 'aprobado'; } $array_finish_ps[] = $f; }
			$new_path_short = implode($ds, $array_finish_ps);
			
			# echo $new_path_short ."\r\n";
			
			if ( !file_exists($nameDir) && !is_dir($nameDir) ) { mkdir($nameDir, 0755, true); };
			if ( file_exists($nameDir) && is_dir($nameDir) ) {
				if ( is_writable($nameDir) ) {
					echo "Podemos escribir en el directorio de destino.";
					$success = (rename($path_full, $new_path_full));
					if($success == true){
						echo "Resultado 1 : " . json_encode($success);
						
						$fileModel->status = 1;
						$fileModel->updated_by = $this->user->id;
						$fileModel->file_path_full = $new_path_full;
						$fileModel->file_path_short = $new_path_short;
						$succes = $fileModel->saveFolders();
						echo "Resultado 2 : " . json_encode($succes);
					}
				} else {
					echo "No podemos escribir en el directorio de destino.";
				}
			} else {
				echo "Compruebe si la carpeta se creo o si existe";
			}
		}
	}
	
	// Reporte media - 
	public function actionReport_Photo_NoPass(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:schedule:files:declined') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		$_get = (!empty($_GET)) ? $_GET : [];
		$error = null;
		$file_id = (isset($_GET['file_id']) && (int) $_GET['file_id'] > 0) ? (int) $_GET['file_id'] : 0;
		$fileModel = new ReportPhotographicFile($this->adapter);
		$fileModel->getById($file_id);
		$ds          = DIRECTORY_SEPARATOR;
		
		
		if($fileModel->status !== 2 && file_exists($fileModel->file_path_full)){
			// echo "Vamos" . "\r\n";
			
			$path_full = $fileModel->file_path_full;
			$parts_path_full = explode($ds, $path_full);
			$array_finish_pf = [];
			foreach($parts_path_full as $f){ if($f == 'en-revision' || $f == 'aprobado'){ $f = 'no-aprobado'; } $array_finish_pf[] = $f; }
			$new_path_full = implode($ds, $array_finish_pf);
			$nameDir = dirname($new_path_full);
			
			# echo $nameDir ."\r\n";
			
			
			$path_short = $fileModel->file_path_short;
			$parts_path_short = explode($ds, $path_short);
			$array_finish_ps = [];
			foreach($parts_path_short as $f){ if($f == 'en-revision' || $f == 'aprobado'){ $f = 'no-aprobado'; } $array_finish_ps[] = $f; }
			$new_path_short = implode($ds, $array_finish_ps);
			
			# echo $new_path_short ."\r\n";
			
			if ( !file_exists($nameDir) && !is_dir($nameDir) ) { mkdir($nameDir, 0755, true); };
			if ( file_exists($nameDir) && is_dir($nameDir) ) {
				if ( is_writable($nameDir) ) {
					echo "Podemos escribir en el directorio de destino.";
					$success = (rename($path_full, $new_path_full));
					if($success == true){
						echo "Resultado 1 : " . json_encode($success);
						
						$fileModel->status = 2;
						$fileModel->updated_by = $this->user->id;
						$fileModel->file_path_full = $new_path_full;
						$fileModel->file_path_short = $new_path_short;
						$succes = $fileModel->saveFolders();
						echo "Resultado 2 : " . json_encode($succes);
					}
				} else {
					echo "No podemos escribir en el directorio de destino.";
				}
			} else {
				echo "Compruebe si la carpeta se creo o si existe";
			}
		}
	}
	
	// Reporte media - Subir Archivo en Reporte
	public function actionSend_Photo_Schedule(){
		$error = null;
        if ($this->isGuest){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$_get = (!empty($_GET)) ? $_GET : [];
		$year = (isset($_GET['year']) && (int) $_GET['year'] >= date("Y")) ? (int) $_GET['year'] : date("Y");
		
		$schedule = isset($_GET['schedule']) ? ($_GET['schedule']) : false;
		$route_name = isset($_GET['route_name']) ? base64_decode((string) $_GET['route_name']) : false;
		$group = isset($_GET['group']) ? ($_GET['group']) : false;
		$period = isset($_GET['period']) ? ($_GET['period']) : false;
		$date_executed = isset($_GET['date_executed']) ? ($_GET['date_executed']) : false;
		
		$group_name = isset($_GET['group_name']) ? base64_decode((string) $_GET['group_name']) : false;
		$period_name = isset($_GET['period_name']) ? base64_decode((string) $_GET['period_name']) : false;
		$lat = isset($_GET['lat']) ? (float) $_GET['lat'] : false;
		$lng = isset($_GET['lng']) ? (float) $_GET['lng'] : false;
		
		$type = isset($_GET['type']) ? $_GET['type'] : false;
		$typeText = ($type !== "A") ? ($type == "D") ? 'DESPUES' : 'OTRO' : 'ANTES';
		
		$ds          = DIRECTORY_SEPARATOR;
		$storeFolder = 'uploads';
		$files_detect = !isset($_FILES['file']) ? false : true;
		$files = !empty($_FILES) ? [$_FILES['file']] : [];
		$returning = (object) [
			'error' 	=> true,
			'status'    => 'error',
			'result' => false,
			'files_detect' => $files_detect,
			'files' => [],
			'files_origin' => $files,
			//'files' => isset($_FILES['file']) ? $_FILES['file'] : [],
			'text' => "",
			'_get' => $_get,
			'_files' => isset($_FILES) ? $_FILES : null,
			'_file' => isset($_FILE) ? $_FILE : null,
		];
		
		if(
			$route_name !== false
			&& $schedule !== false
			&& $group !== false
			&& $group_name !== false
			&& $period !== false
			&& $period_name !== false
			&& $date_executed !== false
			&& $type !== false
			&& $lat !== false
			&& $lng !== false
		){
			$folderBase = [
				"reports-photographics",
				"{$year}",
				"{$period_name}",
				"{$group_name}",
				$route_name,
				$typeText,
				"en-revision",
				// $date_executed
			];
			$targetPath = PUBLIC_PATH . $ds . implode($ds, $folderBase) . $ds;
			$returning->text = $targetPath;
			$returning->folderBase = $folderBase;
			
			if (!empty($_FILES)) {
				$isArray = is_array($files) ? true : [$files];
				// Compruebe si la carpeta de carga si existe sino se crea la carpeta
				if ( !file_exists($targetPath) && !is_dir($targetPath) ) { mkdir($targetPath, 0777, true); };
				// Compruebe si la carpeta se creo o si existe
				if ( file_exists($targetPath) && is_dir($targetPath) ) {
					// Comprueba si podemos escribir en el directorio de destino
					if ( is_writable($targetPath) ) {
						// $returning->text = "multiples archivos."; //carpeta: {$targetPath}
						$total = count($files);
						$returning->total = $total;
						for($i = 0; $i < $total; $i++){
							$model = new ReportPhotographicFile($this->adapter);
							$model->schedule = $schedule;
							$model->year = $year;
							$model->type = $type;
							$model->group = $group;
							$model->period = $period;
							$model->lat = $lat;
							$model->lng = $lng;
							$model->file_name = randomString(6, $files[$i]['name']);
							$model->file_type = $files[$i]['type'];
							$model->file_size = $files[$i]['size'];
							$model->file_path_short = $ds . "public" . $ds .implode($ds, $folderBase). $ds . $date_executed . "-" . $model->file_name;
							$model->file_path_full = $targetPath . $date_executed . "-" . $model->file_name;
							$model->create_by = $this->user->id;
							
							
							// echo json_encode($model);
							// return json_encode($model);
							// Mover archivo
							$error_up = !$model->copyFile($files[$i]['tmp_name']);
							$returning->error = $error_up;
								$returning->text = $error_up; // carpeta: {$targetPath}
							if ($error_up == false) {
								$returning->files[] = (object) [
									"id" => $model->id,
									"name" => $model->file_name,
									"type" => $model->file_type,
									"size" => $model->file_size,
									"path_short" => $model->file_path_short,
									"path_full" => $model->file_path_full,
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
			}else{
				$returning->text = "no existen archivos. {$targetPath}";
			}
		}
		
		$returning->status = $returning->error == false ? 'status' : 'error';
		$returning->files = is_object(json_decode(json_encode($returning->files))) ? [$returning->files] : $returning->files;
		
		header('Content-Type: application/json');
		echo json_encode($returning);
		return json_encode($returning);
	}
	
	
	
	
	
	# CALENDARIO
    function actionMeEvents(){
        if ($this->isGuest || ($this->checkPermission('me:events') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
        $this->render("me_calendar", [
            "title" => "Mis eventos",
            "subtitle" => "",
        ]);
    }
	
	# PROGRAMACION EMVARIAS X Lotes
	function actionProgramming_Lots(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:programming:lots:master') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
        $this->render("programming_lots", [
            "title" => "Mis eventos",
            "subtitle" => "",
        ]);
	}
	
	# REPORTE EMVARIAS
	function actionPhotographic_Report_Live_Offline(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:reports:offline') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		
		$typeNol = isset($_GET['type']) ? (string) $_GET['type'] : 'O';
		
		$titleCompl = "";
		switch($typeNol){
			case "A":
				$titleCompl = 'Antes';
				break;
			case "D":
				$titleCompl = 'Despues';
				break;
			default:
				$titleCompl = 'Otro';
				break;
		}
		# $titleCompl = ($typeNol === "D") ? 'Despues' : ($typeNol === 'A') ? 'Antes' : 'Otro';

        $this->render("photographic_reporting_offline", [
            "title" => "Reportar ",
            "subtitle" => "{$titleCompl}",
        ]);
	}

	# REVISION FOTOS EMVARIAS
	function actionPhotographic_Report_Tinder(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:reports:revision:style:tinder') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
        $this->render("photographic_report_tinder", [
            "title" => "Revisar fotografias",
            "subtitle" => "",
        ]);
	}
	
	# PROGRAMACION EN CURSO EMVARIAS
    function actionTrackingProgramming(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:reports:revision:style:table') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
        $this->render("tracking_programming", [
            "title" => "Programacion",
            "subtitle" => "Crear",
        ]);
    }
	
	# MIS REPORTES X PERIODO
    function actionMePhotographicReports(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:reports:me:current:period') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
        $this->render("me_photographic_reports_current_period", [
            "title" => "Mis reportes",
            "subtitle" => "Actual",
        ]);
    }
	
	# MIS REPORTES PENDIENTES X PERIODO
    function actionMePhotographicReportsPending(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:reports:me:current:period') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
        $this->render("me_photographic_reports_current_period_pending", [
            "title" => "Mis reportes",
            "subtitle" => "Actual",
        ]);
    }
	
	# MIS REPORTES APROBADOS X PERIODO
    function actionMePhotographicReportsApprove(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:reports:me:current:period') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
        $this->render("me_photographic_reports_current_period_approve", [
            "title" => "Mis reportes",
            "subtitle" => "Actual",
        ]);
    }
	
	# MIS REPORTES RECHAZADOS X PERIODO
    function actionMePhotographicReportsDecline(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:reports:me:current:period') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
        $this->render("me_photographic_reports_current_period_decline", [
            "title" => "Mis reportes",
            "subtitle" => "Actual",
        ]);
    }
	
	# FOTOS EMVARIAS EXPLORER FOLDER
    function actionExplorePhotographicReports(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:reports:explore:folder') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
        $this->render("photographic_explore_reports", [
            "title" => "Reportes",
            "subtitle" => "Explorador",
        ]);
    }
	
	# FOTOS EMVARIAS EXPLORER TREE
    function actionExplorePhotographicReports_Tree(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:reports:explore:tree') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
        $this->render("photographic_explore_reports_tree", [
            "title" => "Reportes",
            "subtitle" => "Explorador",
        ]);
    }
	
	# EMVARIAS REPORTAR NOVEDAD
    function actionPhotographicReportsNovelty(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:reports:offline') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
        $this->render("photographic_report_novelty", [
            "title" => "Reporte",
            "subtitle" => "Novedades",
        ]);
    }
	
	# EMVARIAS GALERIA BETA DE REPORTES
    function actionReportGalleryBeta(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:reports:revision:style:gallery') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
        $this->render("photographic_report_gallery_beta", [
            "title" => "Informe Registro Fotografico",
            "subtitle" => "Contrato CW72436",
        ]);
    }

	// Reporte media - Subir Archivo en Reporte
	public function actionSend_File_Novelty(){
		if ($this->isGuest || ($this->checkPermission('emvarias:beta:reports:offline') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }
		header('Content-Type: application/json');
		$error = null;
		$_get = (!empty($_GET)) ? $_GET : [];
		$_post = (!empty($_POST)) ? $_POST : [];
		$_files = (empty($_FILES['file'])) ? [] : ((is_array($_FILES['file']) && isset($_FILES['file'][0]) && is_array($_FILES['file'][0])) ? $_FILES['file'] : [$_FILES['file']]);
        
			
		$ds          = DIRECTORY_SEPARATOR;
		$storeFolder = 'uploads';
		$files_detect = count($_files) > 0 ? true : false;
		
		$returning = (object) [
			'error' 	=> true,
			'message' => "Cargando..",
			'success'    => 'error',
			'additional' => new stdClass(),
			//'files' => isset($_FILES['file']) ? $_FILES['file'] : [],
			//'_get' => $_get,
			//'_post' => $_post,
		];
		
		$returning->additional->files_detect = $_files;
		$returning->additional->files = [];
		
		$date_report = isset($_GET['date_report']) ? ($_GET['date_report']) : false;
		$group = isset($_GET['group']) ? ($_GET['group']) : false;
		$period = isset($_GET['period']) ? ($_GET['period']) : false;
		$year = (isset($_GET['year']) && (int) $_GET['year'] >= date("Y")) ? (int) $_GET['year'] : date("Y");
		$lat = isset($_GET['lat']) ? (float) $_GET['lat'] : false;
		$lng = isset($_GET['lng']) ? (float) $_GET['lng'] : false;
		$id_report = isset($_GET['id_report']) ? (float) $_GET['id_report'] : false;
		
		$group_name = isset($_GET['group_name']) ? base64_decode((string) $_GET['group_name']) : false;
		$period_name = isset($_GET['period_name']) ? base64_decode((string) $_GET['period_name']) : false;
		
		if(
			$group !== false
			&& $id_report !== false
			&& $group_name !== false
			&& $period !== false
			&& $period_name !== false
			&& $date_report !== false
			&& $lat !== false
			&& $lng !== false
		){
			$folderBase = [
				"reports-photographics",
				"{$year}",
				"{$period_name}",
				"{$group_name}",
				"observaciones",
				$date_report,
				"reporte-nro-" . $id_report,
				// $date_executed
			];
			$targetPath = PUBLIC_PATH . $ds . implode($ds, $folderBase) . $ds;
			$returning->message = $targetPath;
			$returning->folderBase = $folderBase;
			
			try {
				if (count($_files) > 0) {
					// Compruebe si la carpeta de carga si existe sino se crea la carpeta
					if ( !file_exists($targetPath) && !is_dir($targetPath) ) { mkdir($targetPath, 0755, true); };
					// Compruebe si la carpeta se creo o si existe
					if ( file_exists($targetPath) && is_dir($targetPath) ) {
						// Comprueba si podemos escribir en el directorio de destino
						if ( is_writable($targetPath) ) {
							$total = count($_files);
							$returning->total_det = $total;
							$returning->total_up = 0;
							
							for($i = 0; $i < $total; $i++){
								$model = new ReportNoveltyFile($this->adapter);
								$model->novelty = $id_report;
								$model->year = $year;
								$model->group = $group;
								$model->period = $period;
								$model->date_report = $date_report;
								$model->lat = $lat;
								$model->lng = $lng;
								$model->file_name = randomString(6, $_files[$i]['name']);
								$model->file_type = $_files[$i]['type'];
								$model->file_size = $_files[$i]['size'];
								$model->file_path_short = $ds . "public" . $ds .implode($ds, $folderBase). $ds . $model->file_name;
								$model->file_path_full = $targetPath . $model->file_name;
								$model->created_by = $this->user->id;
								
								// Mover archivo
								$error_up = !$model->copyFile($_files[$i]['tmp_name']);
								$returning->error = $error_up;
								if ($error_up == false) {
									
									
									
									
									$returning->total_up++;
									$returning->message = 'Archivo guardado correctamente.';
									$returning->additional->files[] = (object) [
										"id" => $model->id,
										"name" => $model->file_name,
										"type" => $model->file_type,
										"size" => $model->file_size,
										"path_short" => $model->file_path_short,
										"path_full" => $model->file_path_full,
										"error" => ($model->id > 0) ? false : true,
									];
								} else {
									$returning->error = true;
									$returning->message = 'No se pudo cargar el archivo solicitado :(, ocurrió un misterioso error.';
								}
							}
						} else {
							$returning->error = true;
							$returning->message = "No hay permisos en la carpeta. {$targetPath}";
						}
					}else{
						$returning->error = true;
						$returning->message = "no existe la carpeta. {$targetPath}";
					}
				}else{
					$returning->error = true;
					$returning->message = "No hay archivo(s)";
				}
				
				$returning->success = $returning->error == false ? 'success' : 'error';
				$returning->additional->files = is_object(json_decode(json_encode($returning->additional->files))) ? [$returning->additional->files] : $returning->additional->files;
				

				
				
				echo json_encode($returning);
				return json_encode($returning);
			} catch (Exception $e) {
				$returning->error = true;
				$returning->message = $e->getMessage();
				echo json_encode($returning);
				return json_encode($returning);
			}
		}

			echo json_encode($returning);
			return json_encode($returning);
		
	}
	
	# EMVARIAS DASHBOARD BETA
    function actionEmvariasDashboardBETA(){
        if ($this->isGuest || ($this->checkPermission('emvarias:dashboard:beta') !== true)){
			header('HTTP/1.0 403 Forbidden');
			$this->render("errors", 
				[
				"code"=> "403",
				"title"=> "Acceso denegado",
				"description" => "",
			]); exit();	
		}
        $this->render("emvarias_dashboard_beta", [
            "title" => "Informe Registro Fotografico",
            "subtitle" => "Contrato CW72436",
        ]);
    }
	
    function actionSchedule_Emvarias_Day(){
        if ($this->isGuest || ($this->checkPermission('emvarias:beta:dashboard:day') !== true)){ header('HTTP/1.0 403 Forbidden'); exit(); }

        // $this->render("schedule_emvarias", [
        $this->render("emvarias_dashboard_day", [
            "title" => "Revision General",
            "subtitle" => "Diario",
        ]);
    }

	function actionCreateReportPDF(){
		/*
		# $pdf = new FelipheGomez\FPDF\FPDF('P','mm','A4');
		$pdf = new FelipheGomez\FPDF\FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,'¡Hola, Mundo!');
		$pdf->Cell(60,10,'Hecho con FPDF.',1,1,'C');
		$pdf->Output();
				*/
		
		// Creación del objeto de la clase heredada
		$model = new EmvariasNoveltiesGeneralsPDF($this->adapter);
		$pdf = new BaseReportEmvariasNoveltiesGeneralsPDF();
		$model->getById(2);
		
		
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','',12);
		#$pdf->Cell(0,10,utf8_decode('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'));
		$pdf->Ln(20);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(0,10,utf8_decode("Fecha del reporte: "));
		$pdf->Ln();
		$pdf->SetFont('Times','',12);
		$pdf->Cell(0,10,utf8_decode($model->date_report));
		$pdf->Ln();
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(0,10,utf8_decode("Resumen de los hechos: "));
		$pdf->Ln();
		$pdf->SetFont('Times','',12);
		$pdf->MultiCell(180,8, utf8_decode($model->notes));
		
		$pdf->Output();
		/*
		// $pdf->Cell(0,10,utf8_decode("Fecha de creacion: " . $model->created));
		$pdf->Ln(20);
		for($i=1;$i<=25;$i++)
			$pdf->Cell(0,7,utf8_decode('Imprimiendo línea número ').$i,0,1);
		*/
	}
}