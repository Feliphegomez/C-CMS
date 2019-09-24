<?php 
	$table = new PHPStrap\Table([], 2, 0, [], []);
	#$table->addHeaderRow(new PHPStrap\Row());
	$table->addHeaderRow([
		'ID',
		'Usuario',
		'Contraseña',
		'Tipo de documento',
		'# documento',
		'Nombres',
		'Apellidos',
		'Teléfono',
		'Móvil',
		'Dirección',
		'Departamento',
		'Ciudad',
		'E-Mail',
		'Grupo de Permisos',
		'Avatar',
		'F. Registro',
		'F. U. Actualización',
		'F. U. Conexión'
	]);
	foreach($allusers as $user){
		$user = is_object($user) ? (array) $user : $user;
		$table->addRow(array_values($user));
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
				<h2> Todos los usuarios <small></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content table-responsive">
				<?= $table; ?>
			</div>
			
			
		</div>
	</div>
	<div class="clearfix"></div>
</div>