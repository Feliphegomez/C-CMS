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
  background-color: red;
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
							<!-- title row -->
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
								<!-- /.col -->
							</div>
							<!-- /.row -->
						<!-- Table row -->
						<div class="row">
							<div class="col-xs-12">
								
								
								<!-- start accordion -->
								<div class="accordion" :id="'accordion-' + item.year + '-' + item.id" role="tablist" aria-multiselectable="true" style="zoom: 0.65">
									<!-- // 
									<div class="panel">
										<a class="panel-heading" role="tab" :id="'heading'+item_i" data-toggle="collapse" data-parent="#accordion" :href="'#collapse' + item_i" aria-expanded="true" :aria-controls="'collapse' + item_i">
											<h4 class="panel-title">
												Titulo
											</h4>
										</a>
										<div :id="'collapse' + item_i" class="panel-collapse collapse " role="tabpanel" :aria-labelledby="'heading'+item_i">
											<div class="panel-body">
												<div class="col-xs-12 table">
													<table class="table table-striped">
														<thead>
															<tr>
																<th>Qty</th>
																<th>Product</th>
																<th>Serial #</th>
																<th style="width: 59%">Description</th>
																<th>Subtotal</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>1</td>
																<td>Call of Duty</td>
																<td>455-981-221</td>
																<td>El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson </td>
																<td>$64.50</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									-->
								</div>
								<!-- end of accordion -->
								
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<div class="row">
							<!-- accepted payments column -->
							<div class="col-xs-6">
								<p class="lead">Payment Methods:</p>
								<img src="/public/assets/images/visa.png" alt="Visa">
								<img src="/public/assets/images/mastercard.png" alt="Mastercard">
								<img src="/public/assets/images/american-express.png" alt="American Express">
								<img src="/public/assets/images/paypal.png" alt="Paypal">
								<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
									{{ options.periods_from_year }}
								</p>
							</div>
							<!-- /.col -->
							<div class="col-xs-6">
								<p class="lead">Amount Due 2/22/2014</p>
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr>
												<th style="width:50%">Subtotal:</th>
												<td>$250.30</td>
											</tr>
											<tr>
												<th>Tax (9.3%)</th>
												<td>$10.34</td>
											</tr>
											<tr>
												<th>Shipping:</th>
												<td>$5.80</td>
											</tr>
											<tr>
												<th>Total:</th>
												<td>$265.24</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- this row will not appear when printing -->
						<div class="row no-print">
							<div class="col-xs-12">
								<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
								<button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
								<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
							</div>
						</div>
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

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {self.scrollFunction()};
	},
	computed: {
	},
	methods: {
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
		ArrayToGallery(array, x, t){
			var self = this;
			try {
				$Row = $('<div></div>').attr('class', 'row x_panel');
				srcInit = Array.isArray(array) == true && array.length > 0 ? array[0].file_path_short : 'https://picsum.photos/1200/800/?random';
				
				$imgView = $('<img />').attr('class', 'img img-responsive boxView').attr('id', 'view-schedule-' + x.id + '-' + t).attr('src', srcInit);
				$RowView = $('<div></div>').attr('class', 'view-img-gall').append($imgView);
				$Row.append($RowView)
				
				$picsThumbs = $('<div></div>').attr('class', 'pics-thumbs').attr('id', 'pics-thumbs-schedule-' + x.id + '-' + t);
				
				if(Array.isArray(array)){
					array.forEach(function(a, index){
						// console.log(index);
						// console.log(a);
					
						$toolsText = $('<p></p>').attr('style', 'zoom:0.8;').text(a.file_name);
						$toolsBottoms = $('<div></div>').attr('class', 'tools tools-bottom');
						$maskBox = $('<div></div>').attr('class', 'mask').append($toolsText).append($toolsBottoms);
						/*
						$img = $('<img />')
							.attr('style', 'width: 100%; display: block;')
							.attr('src', '/public/assets/images/media.jpg')
							.attr('alt', 'image')
							.attr('data-file_name', a.file_name)
							.attr('data-file_path_short', a.file_path_short);
							*/
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
							.attr('class', 'col-md-4')
							.append($thumbnailBox).click(function(){
								console.log('click');
								$('#view-schedule-' + x.id + '-' + t).attr('src', $('#box-img-' + a.id).data('file_path_short'))
								
							});
						
						$picsThumbs.append($columnBox);
						
						//$picsThumbs.append($img);
						
					});
				
					if(array.length == 0){
						$picsThumbs.append(
							$('<p></p>').text('No tenemos imagenes en este momento.')
						);
					}
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
								.attr('class', 'col-xs-6').append($titleA).append(GalleryTA);
							$colTwo = $('<div></div>')
								.attr('class', 'col-xs-6').append($titleD).append(GalleryTD);
							
							$rowBody = $('<div></div>')
								.attr('class', 'row')
								.append($colOne)
								.append($colTwo);
							
							
							$textTitle = $('<b></b>').text(x.lot.microroute_name + ' (' + x.date_executed_schedule + ' - ' + x.date_executed_schedule_end + ')');
							$subTitle = $('<span></span>').text(' (' + x.date_executed_schedule + ' - ' + x.date_executed_schedule_end + ')');
							$panelTitle = $('<a></a>').attr('class', 'panel-title').append($textTitle).append($subTitle);
							$panelHeading = $('<div></div>')
								.attr('role', 'tab')
								.attr('class', 'panel-heading')
								.attr('id', 'heading0-'+x.id)
								.attr('data-toggle', 'collapse')
								.attr('data-parent', '#accordion')
								.attr('href', '#collapse0-'+x.id)
								.attr('aria-expanded', 'true')
								.attr('aria-controls', 'collapse0-'+x.id)
								.append($panelTitle);
							
							$panelBody = $('<div></div>').attr('class', 'panel-bod').append($rowBody);
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
				
									if($total > 0){
									}
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