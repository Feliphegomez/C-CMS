<?php 
	
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
				<h2>Nuevo <small></small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><?= FelipheGomez\Url::a(['site/AdminPermissionsList'], PHPStrap\Util\Html::tag('i', '', ['fa fa-times'])); ?></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content table-responsive">
				<?= $model->formulario; ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>