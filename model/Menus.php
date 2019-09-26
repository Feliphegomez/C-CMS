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
				ORDER BY M.`order_by`, `name` ASC";
				// ORDER BY M.`name`, `slug` ASC";
			
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
			$this->list_a = [];
			foreach($array as $item){
				if(!isset($this->list_a[$item->menu_slug])){
					$this->list_a[$item->menu_slug] = (object) [
						'id' => $item->menu_id,
						'name' => $item->menu_name,
						'slug' => $item->menu_slug,
						'items' => [],
						'items_t' => [],
					];
				}
				if(!in_array($item, $this->list_a[$item->menu_slug]->items)){
					$this->list_a[$item->menu_slug]->items[] = $item;
					/*
					$this->items_t[] = FelipheGomez\Url::a(
						[$subitem->tag_href, $subitem->tag_params], // Tag && Params
						PHPStrap\Util\Html::tag('i', ' ', ["{$subitem->icon}"]) . "{$subitem->title}", // Content
						json_decode($subitem->tag_class)
					);*/
				};
			}
			
			
			
			$html = "";
			foreach($this->list_a as $key => $menu){
				$items_t = [];
				foreach($menu->items as $item){
					$item->tag_params = (array) json_decode($item->tag_params);
					if ($this->validatePermission($item->permission) == true) {
						$items_t[] = FelipheGomez\Url::a(
							[$item->tag_href, $item->tag_params], // Tag && Params
							PHPStrap\Util\Html::tag('i', ' ', ["{$item->icon}"]) . "{$item->title}", // Content
							json_decode($item->tag_class)
						);
					}
				}
				/**/
				if(count($items_t) > 0){
					$html .= PHPStrap\Util\Html::tag('div', 
					   PHPStrap\Util\Html::tag('h3', $menu->name) . 
						PHPStrap\Util\Html::ul($items_t, ['nav side-menu'])
					, ['menu_section']);
				}
			}
			$this->menu = $html;
			
			//echo json_encode($this->list_a)."\n";
			#echo json_encode($html)."\n";
			#exit();
		}
		return $this->menu;
	}
	
	public function validatePermission($nameNode = 'none'){
		$nameNode = strtolower($nameNode);
		$permisosBase = (array) $this->permissions;
		$permision = in_array('isadmin', $permisosBase) || in_array($nameNode, $permisosBase) ? true : false;
		
		#echo "\n"."\n".json_encode($permisosBase)."\n";
		#echo json_encode($permision)."\n";
		
		return $permision;
	}
	
}