<?php 
$modelSchedule = new EmvariasSchedule($this->adapter);
$list_periods = $modelSchedule->getPeriodsGlobal();
?>
<style>
#myBtn-Top {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: olive;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn-Top:hover {
  background-color: #555;
}

.zoom-img-gall {
  position: absolute;
  width: 100px;
  height: 100px;
  background-repeat: no-repeat;
  border-radius: 50px;
  box-shadow: 0 0 10px rgba(0, 0, 0, .8);
  display: none;
}

.zoom {
  background-position:  50% 50%;
  position: relative;
  width: 100%;
  overflow: hidden;
  cursor: zoom-in;
  background-size: 165%;
}
.zoom img:hover {
  opacity: 0;
}
.zoom img {
  transition: opacity 0.5s;
  display: block;
  width: 100%;
  background-color: #FFF;
}

.panel-color-default {
	background: #cfe5e9 !important;
}
.panel-color-green {
	background: #d8e9cf !important;
}
.panel-color-red {
	background: #e9cfcf !important;
}
.panel-color-orange {
	background: #e9dbcf !important;
}
</style>

<div id="gallery-beta-reports">
	<button @click="topFunction()" id="myBtn-Top" title="Go to top">↑</button>

	<div class="page-title">
		<div class="title_left">
			<h3><?= $title; ?> <small><?= $subtitle; ?></small></h3>
		</div>
		
		<div class="title_right">
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">	</div>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="row">
	
		<div v-for="(item, item_i) in options.periods_from_year" class="col-md-12 report-box-principal">
			<div class="x_panel">
				<div class="x_title">
					<h2>{{ item.name }} {{ item.year }} <small>Sample user invoice design</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a :data-year="item.year" :data-period="item.id" class="collapse-link-box"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a></li>
								<li><a href="#">Settings 2</a></li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
					
				<div class="x_content" style="display: none;">
					<section class="content invoice">
						<div class="row">
							<div class="col-xs-12 invoice-header">
								<h1>
									<i class="fa fa-globe"></i> Informe Registro Fotografico.
									<small class="pull-right">{{ item.name }} {{ item.year }}</small>
								</h1>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								<address>
									<strong><?= BUSSINES_NAME_LG; ?></strong>
									<br> <?= BUSSINES_ADDRESS; ?>
									<br> <?= BUSSINES_PHONE; ?> - <?= BUSSINES_MOBILE; ?>
									<br> <?= BUSSINES_EMAIL; ?>
								</address>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<address>
									<strong>Periodo</strong>
									<br> {{ item.name }} {{ item.year }}
									<br><strong>Lotes Programados</strong>
									<br> 0
									<br><strong>Área m2 Programados</strong>
									<br> 0.0
								</address>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<!-- // <b>Invoice #007612</b>
								<br> -->
								<!-- // 
								<br><b>Order ID:</b> 4F3S8J -->
								<br><b>Lotes (Ejecutado):</b> 0000
								<br><b>Área m2 (Ejecutado):</b> 0000
								<br>
								<b>Fecha inicio: </b> {{ item.start }}/{{ item.year }}
								<br>
								<b>Fecha finalización: </b> {{ dateEnd(item) }}
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="accordion" :id="'accordion-' + item.year + '-' + item.id" role="tablist" aria-multiselectable="true" style="zoom: 0.65"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</section>
					<div class="x_footer">
						<br><br>
						<div class="clearfix"></div>
						<div class="row no-print">
							<div class="col-xs-12">
								<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Imprimir</button>
								<button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
								<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Crear PDF</button>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
var app = new Vue({
	data: function () {
		return {
			options: {
				periods_from_year: <?= json_encode($list_periods); ?>,
			}
		};
	},
	mounted(){
		var self = this;
		self.PanelToolbox();
		
		window.onscroll = function() {self.scrollFunction()};
	},
	computed: {
	},
	methods: {
		createNotification(data, callb){
			var self = this;
			try{
				send = {};
					
				send.type = data.type;
				send.datajson = JSON.stringify(data.data);
				send.user = data.user;
				send.created_by = <?= $this->user->id; ?>;
				
				MV.api.create('/notifications', send, function (l){
					callb(l);
				});
			}
			catch(e){
				console.error(e);
				callb(e)
			}
		},
		createLogSchedule(data, callb){
			var self = this;
			try{
				send = {};
				send.schedule = data.schedule;
				send.action = data.action;
				send.data_in = JSON.stringify(data.data);
				send.data_out = JSON.stringify(data.response);
				send.created_by = <?= $this->user->id; ?>;
				api.post('/records/emvarias_schedule_log', send)
				.then(function (l){
					if(l.status == 200){
						callb(l);
					} else {
						throw new FormException('error_create_log', 'No se pudo crear el LOG.');
					}
				})
				.catch(function (e) {
					callb(e);
					return e;
				});
			}
			catch(e){
				console.error(e);
				callb(e)
			}
		},
		scrollFunction() {
			var self = this;
			var mybutton = document.getElementById("myBtn-Top");
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.display = "block";
			} else {
				mybutton.style.display = "none";
			}
		},
		topFunction() {
			var self = this;
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		},
		zoom(e){
			var self = this;
			console.log('zoom')
			$zoom = $(e.currentTarget);
			scheduleId = $zoom.data('schedule');
			typeFolder = $zoom.data('type');
			
			$bImg = $('#view-schedule-' + scheduleId + '-' + typeFolder);
			var zoomer = e.currentTarget;
			var urlImg = 'url("' + $bImg.attr('src') + '")';
			zoomer.style.backgroundImage = zoomer.style.backgroundImage !== urlImg ? urlImg : zoomer.style.backgroundImage;
			zoomer.style.backgroundRepeat = 'no-repeat';
			
			e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
			e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
			x = offsetX/zoomer.offsetWidth * 100
			y = offsetY/zoomer.offsetHeight * 200
			zoomer.style.backgroundPosition = x + '% ' + y + '%';
		},
		ArrayToGallery(array, x, t){
			var self = this;
			try {
				$Row = $('<div></div>').attr('class', 'row x_panel');
				// srcInit = Array.isArray(array) == true && array.length > 0 ? array[0].file_path_short : 'https://picsum.photos/1200/800/?random';
				var srcInit = Array.isArray(array) == true && array.length > 0 ? array[0].file_path_short : '';
				$imgView = $('<img />').attr('id', 'view-schedule-' + x.id + '-' + t).attr('class', 'img img-responsive boxView view-schedule-' + x.id + '-' + t).attr('src', srcInit);
				$RowView = $('<div></div>').attr('id', 'bg-view-schedule-' + x.id + '-' + t).attr('class', 'view-img-gall zoom').attr('data-schedule', x.id).attr('data-type', t).append($imgView).on('mousemove', self.zoom);
				$Row.append($RowView)
				$picsThumbs = $('<div></div>').attr('class', 'pics-thumbs list-inline').attr('id', 'pics-thumbs-schedule-' + x.id + '-' + t);
				
				if(Array.isArray(array)){
					array.forEach(function(a, index){
						$toolsText = $('<p></p>').attr('style', 'zoom:0.8;').text(a.file_name);
						$toolsBottoms = $('<div></div>').attr('class', 'tools tools-bottom');
						$maskBox = $('<div></div>').attr('class', 'mask').append($toolsText).append($toolsBottoms);
						// $img = $('<img />').attr('style', 'width: 100%; display: block;').attr('src', '/public/assets/images/media.jpg').attr('alt', 'image').attr('data-file_name', a.file_name).attr('data-file_path_short', a.file_path_short);
						$img = $('<span></span>')
							.attr('id', 'box-img-' + a.id)
							.attr('class', 'imgs-schedule-' + a.schedule)
							.attr('style', 'width: 100%; display: block;')
							.attr('data-file_name', a.file_name)
							.attr('data-file_path_short', a.file_path_short)
							.attr('data-load', 'waiting')
							.html('<i class="fa fa-spinner fa-spin"></i>');
							
						$imgBox = $('<div></div>').attr('class', 'image view view-first').append($img).append($maskBox);
						
						$captionText = $('<p></p>').text('Foto # ' + (index + 1));
						$captionBox = $('<div></div>')
							.attr('class', 'caption')
							.append($captionText);
						
						$thumbnailBox = $('<div></div>')
							.attr('class', 'thumbnail')
							.append($imgBox)
							.append($captionBox);
						
						$columnBox = $('<div></div>')
							.attr('class', 'col-lg-2 col-md-3 col-xs-4 item')
							.append($thumbnailBox).click(function(){
								console.log('click');
								$('#view-schedule-' + x.id + '-' + t).attr('src', $('#box-img-' + a.id).data('file_path_short'));
								$('#bg-view-schedule-' + x.id + '-' + t).attr('style', 'background-image: url(' + $('#box-img-' + a.id).data('file_path_short') + ')"');
							});
						
						$picsThumbs.append($columnBox);
						//$picsThumbs.append($img);
					});
				
					if(array.length == 0){ $picsThumbs.append($('<p></p>').text('No tenemos imagenes en este momento.')); }
					$Thumbs = $('<div></div>').attr('class', 'thumbs-img-gall').attr('id', 'thumbs-schedule-' + x.id + '-' + t).append($picsThumbs);
					$Row.append($Thumbs);
				}
				return $Row;
			} catch (e) {
				console.error(e);
				return $('<div></div>').attr('class', 'row');
			}
		},
		PanelToolbox(){
			var self = this;
			$('.collapse-link-box').on('click', function() {
				var $BOX_PANEL = $(this).closest('.x_panel'),
					$ICON = $(this).find('i'),
					$BOX_CONTENT = $BOX_PANEL.find('.x_content');
				
				// fix for some div with hardcoded fix class
				if ($BOX_PANEL.attr('style')) {
					$BOX_CONTENT.slideToggle(200, function(){
						$BOX_PANEL.removeAttr('style');
					});
					console.log('Cerrado');
				} else {
					$BOX_CONTENT.slideToggle(200); 
					$BOX_PANEL.css('height', 'auto');
					console.log('Abierto');
					
					var data_year = $(this).data('year');
					var data_period = $(this).data('period');
					console.log('data_year', data_year);
					console.log('data_period', data_period);
					
					$("#accordion-" + data_year + '-' + data_period).html('<i class="fa fa-spinner fa-spin"></i> Estamos cargando la información, espere...');
					MV.api.readList('/emvarias_schedule', {
						filter: [
							'year,eq,' + data_year,
							'period,eq,' + data_period,
						],
						join: [
							'emvarias_groups',
							'emvarias_periods',
							'emvarias_lots',
							'emvarias_reports_photographic',
							'emvarias_reports_photographic,emvarias_groups',
							'emvarias_reports_photographic,emvarias_periods',
						],
					}, function(resp){
						$("#accordion-" + data_year + '-' + data_period).html('');
						resp.forEach(function(x){
							//console.log('x', x);
							//console.log('x.emvarias_reports_photographic', x.emvarias_reports_photographic);
							
							var galleryA = [];
							var galleryD = [];
							
							x.emvarias_reports_photographic.forEach(function(z){
								if(z.status == 1){
									if(z.type == 'A'){
										galleryA.push(z);
									} else if(z.type == 'D'){
										galleryD.push(z);
									}
								}
							});
							
							var GalleryTA = self.ArrayToGallery(galleryA, x, 'A');
							var GalleryTD = self.ArrayToGallery(galleryD, x, 'D');
						
							$titleA = $('<h2></h2>').text('Reg. Antes (' + galleryA.length + ')');
							$titleD = $('<h2></h2>').text('Reg. Despues (' + galleryD.length + ')');
								
							$colOne = $('<div></div>')
								.attr('class', 'col-md-6 col-xs-12').append($titleA).append(GalleryTA);
							$colTwo = $('<div></div>')
								.attr('class', 'col-md-6 col-xs-12').append($titleD).append(GalleryTD);
							
							$rowBody = $('<div></div>')
								.attr('class', 'row')
								.append($colOne)
								.append($colTwo);
							
							
							$textTitle = $('<b></b>').html('<i class="fa fa-plus-circle"></i> ' + x.lot.microroute_name + ' | Lote: ' + x.lot.id_ref + ' | ' );
							$subTitle = $('<span></span>').text(' (' + x.date_executed_schedule + ' - ' + x.date_executed_schedule_end + ') ');
							$subTitleTwo = $('<span></span>').attr('class', 'pull-right').text(' [Antes: ' + galleryA.length + '] ' + ' [Despues: ' + galleryD.length + '] ');
							$subTitleThree = $('<b></b>').attr('class', 'pull-right').text(
								x.is_executed == 0 && x.is_approved == 0 ? ' En ejecución... ' : 
									x.is_executed == 1 && x.is_approved == 0 ? ' Ejecutado, Esperando Aprobación... ' : 
										x.is_executed == 1 && x.is_approved == 1 ? ' Aprobado' : ' Sin parametrizar'
								+ x.in_novelty == 1 ? 'Con observación(es)' : ''
							);
							$panelTitle = $('<a></a>')
								.attr('class', 'panel-title')
								.append($textTitle)
								.append($subTitle)
								.append($subTitleThree)
								.append($subTitleTwo);
							
							$panelHeading = $('<div></div>')
								.attr('style', 'cursor: pointer;')
								.attr('role', 'tab')
								.attr('class', x.is_executed == 0 && x.is_approved == 0 ? 'panel-heading panel-color-default' 
									: x.is_executed == 1 && x.is_approved == 0 ? 'panel-heading panel-color-orange' 
									: x.is_executed == 1 && x.is_approved == 1 ? 'panel-heading panel-color-green' 
									: 'panel-heading panel-color-default')
								.attr('id', 'heading0-'+x.id)
								.attr('data-toggle', 'collapse')
								.attr('data-parent', '#accordion-' + data_year + '-' + data_period)
								.attr('href', '#collapse0-'+x.id)
								.attr('aria-expanded', 'true')
								.attr('aria-controls', 'collapse0-'+x.id)
								.append($panelTitle);
							
							$panelBody = $('<div></div>').attr('class', 'panel-bod').append($rowBody);
							
							if(x.is_executed == 1 && x.is_approved == 0 && x.in_novelty == 0){
								console.log('is_executed')
								$BtnOne = $('<div></div>')
									.attr('class', 'pull-right btn btn-success btn-approved')
									.append($('<div></div>')
									.attr('class', 'fa fa-check'))
									.append(' Aprobar ').click(function(){
										$elementThis = $(this);
										$elementThis.attr('disabled', 'true');
										bootbox.confirm({
											message: "confirme esta accion antes de continuar, desea aprobar y dar por completado este trabajo?",
											locale: 'es',
											buttons: {
												confirm: {
													label: 'Aprobar',
													className: 'btn-success'
												},
												cancel: {
													label: 'Cerrar',
													className: 'btn-default'
												}
											},
											callback: function (result) {
												if(result === true){
													MV.api.update('/emvarias_schedule/' + x.id, {
														is_executed: 1,
														is_approved: 1,
														in_novelty: 0,
														date_approved: moment().format('Y-MM-DD'),
														time_approved: moment().format('HH:mm:ss'),
														updated_by: <?= ($this->user->id); ?>
													},function(xs){
														self.createLogSchedule({
															schedule: x.id,
															action: 'event-approved',
															data: {
																is_executed: 1,
																is_approved: 1,
																in_novelty: 0,
																date_approved: moment().format('Y-MM-DD'),
																time_approved: moment().format('HH:mm:ss'),
																updated_by: <?= ($this->user->id); ?>
															},
															response: xs,
														}, function(w){
															$elementThis.remove();
															$BtnTwo.remove();
															new PNotify({
																"title": "¡Éxito!",
																"text": "Actualizado con exito.",
																"styling":"bootstrap3",
																"type":"success",
																"icon":true,
																"animation":"zoom",
																"hide":true
															});
														});
													});
													$elementThis.removeAttr('disabled');
												} else {
													$elementThis.removeAttr('disabled');
												}
											}
										});
									});
									
									
								$BtnTwo = $('<div></div>')
									.attr('class', 'pull-right btn btn-warning btn-declined')
									.append($('<div></div>')
									.attr('class', 'fa fa-history'))
									.append(' ¿Falta algo? ').click(function(){
										$elementThis = $(this);
										$elementThis.attr('disabled', 'true');
										bootbox.prompt({
											title: "Cuentanos que observación(es) tienes para solucionarla y poder termina esté trabajo.",
											inputType: 'textarea',
											locale: 'es',
											buttons: {
												confirm: {
													label: 'Enviar Mensaje',
													className: 'btn-success'
												},
												cancel: {
													label: 'Cerrar',
													className: 'btn-default'
												}
											},
											callback: function (result) {
												console.log(x.group.group_notification);
												if(result !== null && result.length > 3){
													var novelty = {
														schedule: x.id,
														group: x.group.id,
														period: x.period.id,
														year: x.year,
														comment: result,
														created_by: <?= ($this->user->id); ?>
													};
													
													MV.api.readList('/notifications_groups_users', {
														filter: [
															'group,eq,' + x.group.group_notification
														],
													},function(IdsNots){
													
													
														MV.api.create('/emvarias_schedule_execution_novelties', novelty,function(xs){
															
															self.createLogSchedule({
																schedule: x.id,
																action: 'execution-novelties',
																data: novelty,
																response: xs,
															}, function(idNoveltyCreateLog){
																novelty.id = xs;
																$elementThis.remove();
																
																MV.api.update('/emvarias_schedule/' + x.id, {
																	in_novelty: 1,
																	updated_by: <?= ($this->user->id); ?>
																},function(xs2){
																	self.createLogSchedule({
																		schedule: x.id,
																		action: 'event-in-novelty',
																		data: {
																			in_novelty: 1,
																			updated_by: <?= ($this->user->id); ?>
																		},
																		response: xs2,
																	}, function(w){
																		$elementThis.remove();
																		new PNotify({
																			"title": "¡Éxito!",
																			"text": "Actualizado con exito.",
																			"styling":"bootstrap3",
																			"type":"success",
																			"icon":true,
																			"animation":"zoom",
																			"hide":true
																		});
																	});
																	
																	IdsNots.forEach(function(abc){
																		self.createNotification({
																			user: abc.user,
																			type: 'novelty-execution-schedule',
																			data: {
																				novelty: novelty,
																				schedule: x
																			},
																		}, function(wsa){
																			console.log(wsa)
																			console.log('ID NOTIFICADO: ', abc.user);
																		});
																	
																		new PNotify({
																			"title": "¡Éxito!",
																			"text": "Actualizado con exito.",
																			"styling":"bootstrap3",
																			"type":"success",
																			"icon":true,
																			"animation":"zoom",
																			"hide":true
																		});
																	});
																	
																	
																});
																
																
															});
														});
														
													});
												} else {
													new PNotify({
														"title": "¡Ups!",
														"text": "El mensaje debe contener más de 4 caracteres.",
														"styling":"bootstrap3",
														"type":"error",
														"icon":true,
														"animation":"zoom",
														"hide":true
													});
												}
												
												$elementThis.removeAttr('disabled');
											}
										});
										
										/*
													$elementThis.removeAttr('disabled');*/
									});
									
							} else {
								$BtnOne = $('<div></div>');
								$BtnTwo = $('<div></div>');
								if(x.in_novelty == 1){
									$BtnOne.attr('class', 'pull-right btn btn-danger btn-approved')
										.append($('<div></div>')
										.attr('class', 'fa fa-check'))
										.append(' Solucionando observación... ').click(function(){
											$elementThis = $(this);
										});
									
								}
							}
							$FooterBody = $('<div></div>')
								.attr('class', 'col-xs-12').append($BtnOne).append($BtnTwo);
							
							$panelFooter = $('<div></div>')
								.attr('class', 'panel-footer row')
								.append($FooterBody);
							
							$panelBody.append($panelFooter)
							
							$panelCollapse = $('<div></div>')
								.attr('id', 'collapse0-'+x.id)
								.attr('class', 'panel-collapse collapse')
								.attr('tabpanel', 'tabpanel')
								.attr('aria-labelledby', 'heading0-'+x.id)
								.append($panelBody);
							
							$panel = $('<div></div>').attr('class', 'panel').append($panelHeading).append($panelCollapse)
								.click(function(){
									$ariaexpanded = $(this).attr('aria-expanded');
									$total = 0;
									$('.imgs-schedule-' + x.id).each(function( index ) {
										//console.log(index);
										$divId = $(this).attr('id');
										$data_file_name = $(this).data('file_name');
										$data_file_path_short = $(this).data('file_path_short');
										
										if($ariaexpanded == false){
											$dataLoad = 'finish';
											
										} else {
											$dataLoad = 'waiting';
										}
										//$dataLoad = $(this).data('load');
										//console.log('$dataLoad', $dataLoad);
										if($dataLoad == 'waiting' && $(this).data('load') == 'waiting'){
											console.log('Cargar imagen');
											$dataLoad = 'finish';
											$img = $('<img />')
												.attr('id', $divId)
												.attr('class', 'imgs-schedule-' + x.id)
												.attr('style', 'width: 100%; display: block;')
												.attr('src', $data_file_path_short)
												.attr('alt', 'image')
												.attr('data-file_name', $data_file_name)
												.attr('data-load', $dataLoad)
												.attr('data-file_path_short', $data_file_path_short);
											$total++;
											$(this).attr('data-load', $dataLoad).replaceWith($img);
										} else if($dataLoad == 'finish' && $(this).data('load') == 'finish'){
											/*
											console.log('Cargar Texto');
											$dataLoad = 'waiting';
											$img = $('<span></span>')
												.attr('id', $divId)
												.attr('class', 'imgs-schedule-' + x.id)
												.attr('style', 'width: 100%; display: block;')
												.attr('data-file_name', $data_file_name)
												.attr('data-file_path_short', $data_file_path_short)
												.attr('data-load', $dataLoad)
												.html('<i class="fa fa-spinner fa-spin"></i>');
												*/
										} else {
											
										}
										//$(this).replaceWith($('<h5>' + this.innerHTML + '</h5>'));
									});
									
								});
									
							$("#accordion-" + data_year + '-' + data_period).append($panel);
						});
						
					});
				}
				$ICON.toggleClass('fa-chevron-up fa-chevron-down');
			});

			$('.close-link').click(function () {
				var $BOX_PANEL = $(this).closest('.x_panel');

				$BOX_PANEL.remove();
			});
		},
		dateEnd(item){
			var self = this;
			try {
				date = new Date(item.year, (item.end_month-1), (item.end_day+1));
				return moment(date).format('DD/MM/Y');
			} catch(e) {
				return '000';
			}
		},
	}
}).$mount('#gallery-beta-reports');
</script>