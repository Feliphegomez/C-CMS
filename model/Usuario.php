<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class Usuario extends ModeloBase{
    public $username;
    
	public function __construct($adapter) {
        $table="users";
        parent::__construct($table, $adapter);
    }
	/*
	public function __sleep(){
		return ['id', 'username', ];
	}*/

    public function rules()
    {
        return [
            new PHPStrap\Form\Text([
                    "name" => "username", 
                    "placeholder" => "Usuario"
                ], [
                    //new PHPStrap\Form\Validation\EmailValidation('Ingrese un email.')
                    new PHPStrap\Form\Validation\RequiredValidation('Ingresa tu usuario.')
                ])
            # ['email', 'unique', 'message' => Yii::t('yii2mod.user', 'This email address has already been taken.')],
            # ['username', 'unique', 'message' => Yii::t('yii2mod.user', 'This username has already been taken.')],
            # [['username'], 'min' => 2, 'max' => 255],
            # ['email', 'email'],
            # ['email', 'string', 'max' => 255],
            # ['plainPassword', 'string', 'min' => 6],
            # ['plainPassword', 'required', 'on' => 'create'],
            # ['status', 'default', 'value' => UserStatus::ACTIVE],
            # ['status', 'in', 'range' => UserStatus::getConstantsByName()],
        ];
    }
	
	public function setAll($array = []){
		if(isset($array[0])){
			foreach($array[0] as $k => $v){
				if($k == 'permissions'){
					$permisos = new Permisos($this->adapter);
					$permisos->getById($v);
					$this->set($k, $permisos);
				} else {
					$this->set($k, $v);
				}
			}
		}
		return $this;
	}

	
	public function getById($id){
		return $this->setAll(parent::getById($id));
	}
	
	public function getEmailBoxes(){
		if($this->isValid()){
			$user_mails = new UsuarioMails($this->adapter);
			$user_mails->getByUser($this->id);
			return ($user_mails->boxes);
		}
	}
	
	public function isValid(){
		return isset($this->id) && $this->id > 0 ? true : false;
	}
    
    /*
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('yii2mod.user', 'Username'),
            'email' => Yii::t('yii2mod.user', 'Email'),
            'status' => Yii::t('yii2mod.user', 'Status'),
            'created_at' => Yii::t('yii2mod.user', 'Registration time'),
            'last_login' => Yii::t('yii2mod.user', 'Last login'),
            'plainPassword' => Yii::t('yii2mod.user', 'Password'),
        ];
    }
        */
	
	/*
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            ['email', 'unique', 'message' => Yii::t('yii2mod.user', 'This email address has already been taken.')],
            ['username', 'unique', 'message' => Yii::t('yii2mod.user', 'This username has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['plainPassword', 'string', 'min' => 6],
            ['plainPassword', 'required', 'on' => 'create'],
            ['status', 'default', 'value' => UserStatus::ACTIVE],
            ['status', 'in', 'range' => UserStatus::getConstantsByName()],
        ];
    }

	
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
	
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }
	
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }
	*/
}