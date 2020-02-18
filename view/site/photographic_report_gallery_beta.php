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
					<h2>{{ item.name }} {{ item.year }} <small>Informe Registro Fotografico.</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a :data-year="item.year" :data-period="item.id" :data-period_name="item.name" :data-period_slug="$root.strtr(item.name, ' ', '-').toLowerCase() + '-' + item.year" class="collapse-link-box"><i class="fa fa-chevron-up"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
					
				<div class="x_content" style="display: none;">
					<section class="content invoice">
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								<address>
									<br><strong>Lotes Programados</strong>
									<br> <span :id="'total-microroutes-' + $root.strtr(item.name, ' ', '-').toLowerCase() + '-' + item.year">0</span>
									<br><strong>Área m2 Programados</strong>
									<br> <span :id="'total-microroutes-area-' + $root.strtr(item.name, ' ', '-').toLowerCase() + '-' + item.year">0</span>
								</address>
							</div>
							<div class="col-sm-4 invoice-col">
								<!-- // <b>Invoice #007612</b>
								<br> -->
								<!-- // 
								<br><b>Order ID:</b> 4F3S8J -->
								<br><b>Lotes (Ejecutado):</b> 
									<br> <span :id="'total-microroutes-executed-' + $root.strtr(item.name, ' ', '-').toLowerCase() + '-' + item.year">0</span>
								<br><b>Área m2 (Ejecutado):</b> 
									<br> <span :id="'total-microroutes-executed-area-' + $root.strtr(item.name, ' ', '-').toLowerCase() + '-' + item.year">0</span>
							</div>
							<div class="col-sm-4 invoice-col">
								<br>
								<b>Fecha inicio: </b> {{ item.start }}/{{ item.year }}
								<br>
								<b>Fecha finalización: </b> {{ dateEnd(item) }}
								<b></b>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="accordion" :id="'accordion-' + item.year + '-' + item.id" role="tablist" aria-multiselectable="true" style="zoom: 0.65"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</section>
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
					// console.log('Cerrado');
				} else {
					$BOX_CONTENT.slideToggle(200); 
					$BOX_PANEL.css('height', 'auto');
					// console.log('Abierto');
					
					var data_year = $(this).data('year');
					var data_period = $(this).data('period');
					var data_period_slug = $(this).data('period_slug');
					console.log('data_year', data_year);
					console.log('data_period', data_period);
					
					$("#accordion-" + data_year + '-' + data_period).html('<i class="fa fa-spinner fa-spin"></i> Estamos cargando la información, espere...');
					
					setTimeout(
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
							
							console.log('data_period_slug', data_period_slug);
							$boxTotal = $('#total-microroutes-' + data_period_slug);
							$boxTotalArea = $('#total-microroutes-area-' + data_period_slug);
							$boxTotalExecuted = $('#total-microroutes-executed-' + data_period_slug);
							$boxTotalExecutedArea = $('#total-microroutes-executed-area-' + data_period_slug);
								
							
							resp.forEach(function(x){
								//console.log('x', x);
								// total-microroutes-' + $root.strtr(item.name, ' ', '-').toLowerCase() + '-' + item.year
								
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
								
								$BtnOne = $('<div></div>');
								$BtnTwo = $('<div></div>');
								
								if(x.is_executed == 1){
									$boxTotalExecuted.text(parseInt($boxTotalExecuted.text()) + 1);
									$boxTotalExecutedArea.text(parseFloat($boxTotalExecutedArea.text()) + parseFloat(x.lot.area_m2));
								}
									
									
								if(x.is_executed == 1 && x.is_approved == 0){
									
									if(x.in_novelty == 1){
										$BtnOne.attr('class', 'pull-right btn btn-danger btn-approved')
											.append($('<div></div>')
											.attr('class', 'fa fa-check'))
											.append(' Solucionando observación... ').click(function(){
												$elementThis = $(this);
											});
									} 
									
								} else {
								}
								
								//console.log('Sumando: ', x.lot.area_m2);
								$boxTotalArea.text(parseFloat($boxTotalArea.text()) + parseFloat(x.lot.area_m2));
								
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
								$boxTotal.text(parseInt($boxTotal.text()) + 1);
							});
							
							$boxTotal.text(Number($boxTotal.text()).toLocaleString());
							$boxTotalArea.text(parseFloat($boxTotalArea.text()).toLocaleString());
						})
					, 1000);
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
				date = new Date(item.year, (item.end_month-1), (item.end_day));
				return moment(date).format('DD/MM/Y');
			} catch(e) {
				return '000';
			}
		},
		strtr(s, p, r) {
			var self = this;
			return !!s && {
				2: function () {
					for (var i in p) {
						s = self.strtr(s, i, p[i]);
					}
					return s;
				},
				3: function () {
					return s.replace(RegExp(p, 'g'), r);
				},
				0: function () {
					return;
				}
			}[arguments.length]();
		},
	}
}).$mount('#gallery-beta-reports');
</script>