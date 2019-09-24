<div class="page-title">
	<div class="title_left">
		<h3><?= isset($title) ? $title : ""; ?> <small> <?= isset($subtitle) ? $subtitle : ""; ?></small></h3>
	</div>
	<div class="clearfix"></div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?= isset($title) ? $title : ""; ?> <small><?= isset($subtitle) ? $subtitle : ""; ?></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<?= $model->formulario; ?>
				
				
			</div>
		</div>
	</div>
</div>
