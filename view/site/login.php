<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

?>

<div>
	<a class="hiddenanchor" id="signup"></a>
	<a class="hiddenanchor" id="signin"></a>
	<div class="login_wrapper">
		<div class="animate form login_form">
			<section class="login_content">
				<h1><?= $title; ?></h1>
				<?= $model->formulario; ?>
				<div class="clearfix"></div>
				<div class="separator">
					<p class="change_link">
						nuevo en el sitio?
						<a href="#signup" class="to_register"> Create Account </a>
					</p>
					<div class="clearfix"></div>
					<br />
					<div>
						<h1><i class="fa fa-paw"></i> C&CMS </h1>
						<p><?= ControladorBase::PowerBy(); ?>. Privacy and Terms</p>
					</div>
					<?= json_encode($this->session->getAll()); ?>
				</div>
			</section>
		</div>
		
		<div id="register" class="animate form registration_form">
			<section class="login_content">
				<h1>Crear Cuenta</h1>
				<?= $register->formulario; ?>
			</section>
        </div>
	</div>
</div>