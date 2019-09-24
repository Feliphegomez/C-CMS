<?php 
	$table = new PHPStrap\Table([], 2, 0, ['table table-border'], []);
	#$table->addHeaderRow(new PHPStrap\Row());
	$table->addHeaderRow([
		'ID',
		'Permiso',
		'Titulo / Label',
		'Descripción',
		'',
	]);
	foreach($allpermissions as $user){
		#$user = is_object($user) ? (array) $user : $user;
		#$table->addRow(array_values($user));		
		$table->addRow([
			$user->id,
			$user->tag,
			$user->label,
			$user->description,
			"<a href=\"\" class=\"btn btn-info\"><i class=\"fa fa-times\"></i></a>",
		]);
	}
	
?>
<div class="page-title">
	<div class="title_left">
		<h3><?= isset($title) ? $title : ""; ?> <small> <?= isset($subtitle) ? $subtitle : ""; ?></small></h3>
	</div>
</div>
<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Listado de permisos <small></small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><?= FelipheGomez\Url::a(['site/AdminPermissionsCreate'], PHPStrap\Util\Html::tag('i', '', ['fa fa-plus'])); ?></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content table-responsive">
				<?= $table; ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>