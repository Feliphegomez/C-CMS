<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class Menus extends ModeloBase{
	public $id = 0;
	public $name = "";
	public $slug = "";
	private $permissions = [];
	private $list_a = [];
	public $menu = "";
    
	public function __construct($adapter) {
        $table="menus";
        parent::__construct($table, $adapter);
       
		//$this->menu = PHPStrap\Util\Html::tag('div', PHPStrap\Util\Html::clearfix(), ['main_menu_side hidden-print main_menu'], ['id' => 'sidebar-menu'])
    }
	
    public function rules()
    {
        return [
        ];
    }
	
    public function __sleep(){
        return ['id', 'name', 'slug', 'menu'];
    }
	
	
    public function setPermissions($permissions = null){
		$this->permissions = [];
		if($permissions !== null){
			foreach(explode(',', $permissions) as $permiso){
				$this->permissions[] = $permiso;
			}
		}
    }
	
	public function getBySlug($menuSlug = null){
		if($menuSlug !== null){
			$sql = "SELECT 
					M.id AS `menu_id`
					, M.`name` AS `menu_name`
					, M.`slug` AS `menu_slug`
					, MT.*
				FROM 
					`menus_items` AS MT
					LEFT JOIN `menus` AS M
						ON MT.menu = M.id
				WHERE M.`slug` LIKE (?)
				ORDER BY M.`name`, `slug` ASC";
			
			$this->setAll(parent::getSQL($sql, ["{$menuSlug}%"]));
		}
		return $this;
	}
	
	public function setAll($array = []){
		if(isset($array[0])){
			foreach($array[0] as $k => $v){
				if($k == 'menu_id'){ $this->set('id', $v); }
				else if($k == 'menu_name'){ $this->set('name', $v); }
				else if($k == 'menu_slug'){ $this->set('slug', $v); }
			}
			$this->setList($array);
		}
		return $this;
	}
	
	public function setList($array = []){
		if(count($array) > 0){
			foreach($array as $item){
				if(!isset($this->list_a[$item->menu_slug])){
					$this->list_a[$item->menu_slug] = (object) [
						'id' => $item->menu_id,
						'name' => $item->menu_name,
						'slug' => $item->menu_slug,
						'items' => [],
					];
				}
				$this->list_a[$item->menu_slug]->items[] = $item;
			}
			
			$items_t = [];
			foreach($this->list_a as $key => $item){
				foreach($item->items as $subitem){
					if ($this->validatePermission($subitem->permission) == true) {
						$items_t[] = FelipheGomez\Url::a(json_decode($subitem->tag_href), PHPStrap\Util\Html::tag('i', ' ', ["{$subitem->icon}"]) . "{$subitem->title}");
					}
					
				}
				if(count($items_t) > 0){
					$this->menu .= PHPStrap\Util\Html::tag('div', 
					   PHPStrap\Util\Html::tag('h3', $item->name) . 
						PHPStrap\Util\Html::ul($items_t, ['nav side-menu'])
					, ['menu_section']);
				}
			}
			
		}
		return $this->list_a;
	}
	
	public function validatePermission($nameNode = 'none'){
		$nameNode = strtolower($nameNode);
		return !isset($this->permissions['isadmin']) || $this->permissions['isadmin'] !== true 
					? !isset($this->permissions[$nameNode]) 
											? false 
											: $this->permissions[$nameNode] 
					: true;
	}
	
}