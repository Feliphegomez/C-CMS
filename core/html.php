<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

class Html {
}

class ActiveField {
    const VALIDATION_STATE_ON_INPUT = 'input';
    public $validationStateOn = self::VALIDATION_STATE_ON_INPUT;
    /* Default form layout */
    const LAYOUT_DEFAULT = 'default';
    /* Horizontal form layout */
    const LAYOUT_HORIZONTAL = 'horizontal';
    /* Inline form layout */
    const LAYOUT_INLINE = 'inline';
    public $layout = self::LAYOUT_DEFAULT;
    public $errorCssClass = 'is-invalid';
    public $successCssClass = 'is-valid';
    public $errorSummaryCssClass = 'alert alert-danger';


    public function __construct($config = [])
    {
        $this->fieldConfig = $this->createLayoutConfig($config);
    }

    /* @var bool whether to render [[checkboxList()]] and [[radioList()]] inline. */
    public $inline = false;
    /* @var string|null optional template to render the `{input}` placeholder content */
    public $inputTemplate;
    /* @var array options for the wrapper tag, used in the `{beginWrapper}` placeholder */
    public $wrapperOptions = [];
    public $options = ['class' => ['widget' => 'form-group']];
    public $inputOptions = ['class' => ['widget' => 'form-control']];
    /**
     * @var array the default options for the input checkboxes. The parameter passed to individual
     * input methods (e.g. [[checkbox()]]) will be merged with this property when rendering the input tag.
     *
     * If you set a custom `id` for the input element, you may need to adjust the [[$selectors]] accordingly.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     * @since 2.0.7
     */
    public $checkOptions = [
        'class' => ['widget' => 'custom-control-input'],
        'labelOptions' => [
            'class' => ['widget' => 'custom-control-label']
        ]
    ];
    /**
     * @var array the default options for the input radios. The parameter passed to individual
     * input methods (e.g. [[radio()]]) will be merged with this property when rendering the input tag.
     *
     * If you set a custom `id` for the input element, you may need to adjust the [[$selectors]] accordingly.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     * @since 2.0.7
     */
    public $radioOptions = [
        'class' => ['widget' => 'custom-control-input'],
        'labelOptions' => [
            'class' => ['widget' => 'custom-control-label']
        ]
    ];
    public $errorOptions = ['class' => 'invalid-feedback'];
    public $labelOptions = [];
    public $hintOptions = ['class' => ['widget' => 'form-text', 'text-muted'], 'tag' => 'small'];
    /**
     * @var null|array CSS grid classes for horizontal layout. This must be an array with these keys:
     *  - 'offset' the offset grid class to append to the wrapper if no label is rendered
     *  - 'label' the label grid class
     *  - 'wrapper' the wrapper grid class
     *  - 'error' the error grid class
     *  - 'hint' the hint grid class
     */
    public $horizontalCssClasses = [];
    /**
     * @var string the template for checkboxes in default layout
     */
    public $checkTemplate = "<div class=\"custom-control custom-checkbox\">\n{input}\n{label}\n{error}\n{hint}\n</div>";
    /**
     * @var string the template for radios in default layout
     * @since 2.0.5
     */
    public $radioTemplate = "<div class=\"custom-control custom-radio\">\n{input}\n{label}\n{error}\n{hint}\n</div>";
    /**
     * @var string the template for checkboxes and radios in horizontal layout
     */
    public $checkHorizontalTemplate = "{beginWrapper}\n<div class=\"custom-control custom-checkbox\">\n{input}\n{label}\n{error}\n{hint}\n</div>\n{endWrapper}";
    /**
     * @var string the template for checkboxes and radios in horizontal layout
     * @since 2.0.5
     */
    public $radioHorizontalTemplate = "{beginWrapper}\n<div class=\"custom-control custom-radio\">\n{input}\n{label}\n{error}\n{hint}\n</div>\n{endWrapper}";
    /**
     * @var string the `enclosed by label` template for checkboxes and radios in default layout
     */
    public $checkEnclosedTemplate = "<div class=\"form-check\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n{error}\n{hint}\n</div>";
    /**
     * @var bool whether to render the error. Default is `true` except for layout `inline`.
     */
    public $enableError = true;
    /**
     * @var bool whether to render the label. Default is `true`.
     */
    public $enableLabel = true;

    public function field($model, $attribute, $options = []) 
    {
        $config = $this->fieldConfig;

        if ($config instanceof \Closure) {
            $config = call_user_func($config, $model, $attribute);
        }
        return array_merge($config, $options, [
            'model' => $model,
            'attribute' => $attribute,
            'form' => $this,
        ]);
        return $config;
    }

    public function checkbox($options = [], $enclosedByLabel = false){}
    public function radio($options = [], $enclosedByLabel = false){}
    public function checkboxList($items, $options = []){}
    public function radioList($items, $options = []){}
    public function listBox($items, $options = []){}
    public function dropdownList($items, $options = []){}
    public function staticControl($options = []){}
    public function label($label = null, $options = []){}
    public function fileInput($options = []){}

    /**
     * @param bool $value whether to render a inline list
     * @return $this the field object itself
     * Make sure you call this method before [[checkboxList()]] or [[radioList()]] to have any effect.
     */
    public function inline($value = true)
    {
        $this->inline = (bool)$value;
        return $this;
    }

    /**
     * @param array $instanceConfig the configuration passed to this instance's constructor
     * @return array the layout specific default configuration for this instance
     */
    protected function createLayoutConfig($instanceConfig)
    {
        $config = [
            'hintOptions' => [
                'tag' => 'small',
                'class' => ['form-text', 'text-muted'],
            ],
            'errorOptions' => [
                'tag' => 'div',
                'class' => 'invalid-feedback',
            ],
            'inputOptions' => [
                'class' => 'form-control'
            ],
            'labelOptions' => [
                'class' => []
            ]
        ];
        $layout = isset($instanceConfig['form']->layout) ? $instanceConfig['form']->layout : self::LAYOUT_DEFAULT;
        if ($layout === ActiveForm::LAYOUT_HORIZONTAL) {
            $config['template'] = "{label}\n{beginWrapper}\n{input}\n{error}\n{hint}\n{endWrapper}";
            $config['wrapperOptions'] = [];
            $config['labelOptions'] = [];
            $config['options'] = [];
            $cssClasses = [
                'offset' => ['col-sm-10', 'offset-sm-2'],
                'label' => ['col-sm-2', 'col-form-label'],
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
                'field' => 'form-group row'
            ];
            if (isset($instanceConfig['horizontalCssClasses'])) {
                $cssClasses = ArrayHelper::merge($cssClasses, $instanceConfig['horizontalCssClasses']);
            }
            $config['horizontalCssClasses'] = $cssClasses;
            Html::addCssClass($config['wrapperOptions'], $cssClasses['wrapper']);
            Html::addCssClass($config['labelOptions'], $cssClasses['label']);
            Html::addCssClass($config['errorOptions'], $cssClasses['error']);
            Html::addCssClass($config['hintOptions'], $cssClasses['hint']);
            Html::addCssClass($config['options'], $cssClasses['field']);
        } elseif ($layout === ActiveForm::LAYOUT_INLINE) {
            $config['inputOptions']['placeholder'] = true;
            $config['enableError'] = false;
            Html::addCssClass($config['labelOptions'], 'sr-only');
        }
        return $config;
    }

    public function input($typeInput = 'text', $options = [])
    {
        $options = array_merge($this->fieldConfig, $this->options, $options);
        $options['inputOptions']['type'] = $typeInput;
        return self::renderInput($options);
    }

    public function textInput($options = [])
    {

        $options = array_merge($this->fieldConfig, $this->options, $options);
        $options['inputOptions']['type'] = isset($options['inputOptions']['type']) ? $options['inputOptions']['type'] : 'text';
        return self::renderInput($options);

    }

    public static function renderInput($options = []) : string 
    {        
        $model =  $options['model'];
        $inputOptions = isset($options['inputOptions']) ? $options['inputOptions'] : $options['form']->inputOptions;        
        $inputOptions['placeholder'] = isset($inputOptions['placeholder']) ? $inputOptions['placeholder'] : '';
        $inputOptions['class'] = isset($inputOptions['class']) ? $inputOptions['class'] : 'form-control';

        $labelOptions = isset($options['labelOptions']) ? $options['labelOptions'] : $options['form']->labelOptions;
        $fieldConfig = isset($options['fieldConfig']) ? $options['fieldConfig'] : $options['form']->fieldConfig;
        $hintOptions = isset($options['hintOptions']) ? $options['hintOptions'] : $options['form']->hintOptions;
        $attribute = $options['attribute'];
        $labelTextClasses = implode(' ', $labelOptions['class']);
        $hintTextClasses = implode(' ', $hintOptions['class']);
        $indexColumnModel = $i = array_search($attribute, array_column($model->columnas, 'name'));
        $column = $model->columnas[$i];
        $requiredInput = $column->{'required'} == true ? " required=\"\"" : "";
        $valInput = $column->{'value'} == true ? " value=\"\"" : "";


        $html = "\n";
        $html .= "\t<div class=\"form-group\">\n"
        ."\t\t<label class=\"{$labelTextClasses}\" for=\"{$attribute}\">{$options['model']->labels[$attribute]}</label>\n"
        ."\t\t<input value=\"{$valInput}\" type=\"{$inputOptions['type']}\" class=\"{$inputOptions['class']}\" id=\"{$attribute}\" aria-describedby=\"{$attribute}\" placeholder=\"{$inputOptions['placeholder']}\" {$requiredInput} />\n"
        ."\t\t<{$options['hintOptions']['tag']} id=\"{$attribute}\" class=\"{$hintTextClasses}\">We'll never share your email with anyone else.</{$options['hintOptions']['tag']}>\n"
        ."\t</div>\n";
        $html .= "\n";

        return $html;
    }
}


class ActiveForm extends ActiveField {
    public $options = [];

    public static function begin($params=[]) {
        $params['id'] = isset($params['id']) ? " id=\"".strip_tags($params['id'])."\"" : "";
        $params['class'] = isset($params['class']) ? " class=\"{$params['class']}\"" : "";

        return "<form{$params['id']}{$params['class']}>";
    }

    public function field($model, $attribute, $options = []) : array {
        return parent::field($model, $attribute, $options);
    }
    
    public static function end($params=[]) : string {
        return "</form>";
    }


}

class NavBar {
	public static function repairParams($params=[]) : array {
		if(isset($params['options'])){
			$a = "";
			foreach($params['options'] as $k=>$v){
				$a .= " {$k}=\"{$v}\"";
			}
			$params['options'] = $a;
		}else{
			$params['options'] = "";
		}
		return $params;
	}
	
	public static function begin($params=[]) {
		$params['brandUrl'] = isset($params['brandUrl']) ? $params['brandUrl'] : '#';
		$params['options']['class'] = isset($params['options']['class']) ? $params['options']['class'] : "";
		$params['class_list'] = isset($params['class_list']) ? $params['class_list'] : 'nav navbar-nav navbar-right';
		$toggl = isset($params['toggle']) ? true : false;
		$brand = isset($params['brandLabel']) ? "<a class=\"navbar-brand\" href=\"{$params['brandUrl']}\">{$params['brandLabel']}</a>" : "";
		$toggle = ($toggl == true) ? "<div class=\"nav toggle\"><a id=\"menu_toggle\"><i class=\"fa fa-bars\"></i></a></div>" : "";
		
		return $html = "<nav class=\"{$params['options']['class']}\">{$toggle}".
						"<div class=\"container-fluid\">".
							"<div class=\"navbar-header\">{$brand}</div>";
	}
	
	public static function end() {
		//echo "</ul>";
		return $html = "</div>".
		"</nav>";
	}
}

class Nav {
	public static function repairParams($params=[]) : array {
		$params['brandLabel'] = !isset($params['brandLabel']) ? 'No brandLabel' : $params['brandLabel'];
		$params['brandUrl'] = !isset($params['brandUrl']) ? 'No brandUrl' : $params['brandUrl'];
		if(isset($params['options'])){
			$a = "";
			foreach($params['options'] as $k=>$v){
				$a .= " {$k}=\"{$v}\"";
			}
			$params['options'] = $a;
		}else{
			$params['options'] = "";
		}
		return $params;
	}
	
	public static function widget($params) {
		//$params['options'] = (!isset($params['options']) && isset($params['linkOptions'])) ? $params['linkOptions'] : [];
		$params['options']['class'] = isset($params['options']['class']) ? $params['options']['class'] : "";
		$params['items'] = isset($params['items']) ? $params['items'] : [];
		
		$html = "<ul class=\"{$params['options']['class']}\">";
			foreach($params['items'] as $item){
				if (is_string($item)){
					$html .= $item;
				} else {
					$item['isDropdown'] = isset($item['isDropdown']) ? $item['isDropdown'] : false;
					$item['label'] = isset($item['label']) ? $item['label'] : "";
					$item['url'] = isset($item['url']) ? $item['url'] : "";
					$item['items'] = isset($item['items']) ? $item['items'] : [];
					$item['linkOptions'] = isset($item['linkOptions']) ? $item['linkOptions'] : [];
					$item['visible'] = isset($item['visible']) ? $item['visible'] : true;
					$item['items'] = isset($item['items']) ? $item['items'] : [];
					$item['linkOptions']['class'] = isset($item['linkOptions']['class']) ? $item['linkOptions']['class'] : "";
					
					
					if ($item['isDropdown'] == true){
						$html .= "<li class=\"\" style=\"min-width:auto\">".
							"<a href=\"javascript:;\" class=\"dropdown-toggle {$item['linkOptions']['class']}\" data-toggle=\"dropdown\" aria-expanded=\"false\">  {$item['label']} <span class=\" fa fa-angle-down\"></span> </a>".
							"<ul class=\"dropdown-menu pull-right\">";
								foreach($item['items'] as $item2){
									$item2['options'] = isset($item['options']) ? $item['options'] : [];
									$item2['options']['class'] = isset($item2['options']['class']) ? "{$item2['linkOptions']['class']}" : "dropdown-menu pull-right";
									
									$html .= "<li class=\"\">".
									  "<a href=\"{$item2['url']}\" class=\"{$item2['options']['class']}\">{$item2['label']}</a>".
									"</li>";
								}
							$html .= "</ul>";
						$html .= "</li>";
						
						
					} else {
						$html .= "<li class=\"\">".
						  "<a href=\"{$item['url']}\" class=\"{$item['linkOptions']['class']}\">{$item['label']}</a>".
						"</li>";
					}
				}
			}
		$html .= "</ul>";
		return $html;
	}
}