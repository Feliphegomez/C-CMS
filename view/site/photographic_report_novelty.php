<style>
.product-image {
	height: 450px;
	max-height: 750px;
	
	
    border: 1px solid #e82b2b;
    margin: 0px;
    display: flex;
    padding: 5px;
}


</style>

<div class="container" id="schedule-report-before-creator">
	<div class="page-title">
	  <div class="title_left">
		<h3><?= $title; ?> :: <?= $subtitle; ?></h3>
	  </div>
	</div>
	<div class="clearfix"></div>
	<div class="row" id="screenshot">
		<div class="clearfix"></div>
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<!-- start form for validation -->
			<form action="javascript:return false;">
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div class="form-group">
						<label class="control-label col-md-12 col-sm-12 col-xs-12">Periodo</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<select v-model="createForm.period" class="select2_single form-control" tabindex="-1">
								<option value="0">Seleccione una opcion</option>
								<option v-for="(option, i_option) in options.emvarias_periods" :value="option.id">{{ option.name }}</option>
							</select>
						</div>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div class="form-group">
						<label class="control-label col-md-12 col-sm-12 col-xs-12">Cuadrilla</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<select v-model="createForm.group" class="select2_single form-control" tabindex="-1">
								<option value="0">Seleccione una opcion</option>
								<option v-for="(option, i_option) in options.emvarias_groups" :value="option.id">{{ option.name }}</option>
							</select>
						</div>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div class="form-group">
						<label class="control-label col-md-12 col-sm-12 col-xs-12">Reportado para el día</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input class="form-control" type="date" v-model="createForm.date_report" />
						</div>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-12 col-sm-12 col-xs-12">Resumen de los hechos</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<textarea class="form-control" v-model="createForm.notes" rows="5"></textarea>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<div :class="(idReport > 0) ? '' : 'hide ' + ' col-md-12 col-sm-12 col-xs-12'">
							<button @click="idReport = 0; createForm.notes = ''" type="button" class="btn btn-warning">Nuevo Reporte</button>
						</div>
						<div :class="(idReport <= 0) ? '' : 'hide ' + ' col-md-12 col-sm-12 col-xs-12'">
							<button @click="submitForm" type="button" class="btn btn-success">Reportar Novedad</button>
						</div>
					</div>
				</div>
				
			</form>

		</div>
		
		<div :class="(idReport > 0) ? '' : 'hide ' + ' col-md-12 col-sm-12 col-xs-12'">
			<br />
			<div class="col-md-12 col-sm-12 col-xs-12'">
				<div class="form-group pull-right">
					<a class="btn btn-md btn-default fileinput-button">
					  <i class="fa fa-camera-retro"></i> Subir Archivo
					</a>
				</div>
			</div>
			<div class="x_panel">
				<div class="x_content">
					<div class="row">
						<p>Imagenes capturadas</p>
						<div class="product_gallery">
							<div class="row" id="screenshots-images"></div>
						</div>
						<div class="clearfix"></div>
					</div>
					
					<div class="col-xs-12 dropzone1"></div>
					<div class="table table-striped" class="files" id="previews">
						<div id="template" class="file-row">
							<!-- This is used as the file preview template -->
							<div>
								<span class="preview"><img data-dz-thumbnail /></span>
							</div>
							<div>
								<p class="name" data-dz-name></p>
								<strong class="error text-danger" data-dz-errormessage></strong>
							</div>
							<div>
								<p class="size" data-dz-size></p>
								<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
								  <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
								</div>
							</div>
							<div>
								<button class="btn btn-primary start">
									<i class="glyphicon glyphicon-upload"></i>
									<span>Subir</span>
								</button>
								<!-- // 
								<button data-dz-remove class="btn btn-warning cancel">
									<i class="glyphicon glyphicon-ban-circle"></i>
									<span>Cancelar</span>
								</button>-->
								<button data-dz-remove class="btn btn-danger delete ">
									<i class="glyphicon glyphicon-trash"></i>
									<span>Eliminar</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			
			{{ createForm }}
	</div>
</div>

<script>
var app = new Vue({
	data: function () {
		return {
			options: {
				emvarias_groups: [],
				emvarias_periods: [],
				emvarias_schedule: [],
			},
			createForm: {
				date_report: moment().format('Y-MM-DD'),
				group: 0,
				period: 0,
				year: moment().format('Y'),
				lat: 0,
				lng: 0,
				notes: '',
				created_by: '<?= $this->user->id; ?>',
			},
			idReport: 0,
			current: {
				dateISO: {
					year: moment().format('Y'),
					month: moment().format('M'),
					day: moment().format('D'),
				}
			},
			geo: {
				active: false,
				msg: '',
				urlMap: '/index.php?controller=sw&action=staticmap&maptype=wikimedia&zoom=16&center=6.2386064999999995,-75.58853739999999&size=450x450',
				lat: 0,
				lng: 0,
				options: {
					// enableHighAccuracy = should the device take extra time or power to return a really accurate result, or should it give you the quick (but less accurate) answer?
					enableHighAccuracy: false,
					// timeout = how long does the device have, in milliseconds to return a result?
					timeout: 5000,
					// maximumAge = maximum age for a possible previously-cached position. 0 = must return the current position, not a prior cached position
					maximumAge: 0
				},
			},
			myDropzone: null
		};
	},
	mounted(){
		var self = this;
		self.getLocation();
		self.loadOptions();
					
		$(document).ready(function(){
		  $('[data-toggle="tooltip"]').popover({
				title: this.title,
				content: ($(this).data('description')) ? $(this).data('description') : '',
				trigger: 'hover',
				placement: 'right',
				container: 'body'
			});
		});
		self.loadDropzone();
		
		// self.loadDropzone();
		/*
		$('#CreateScheduleModal').on('show.bs.modal', function (e) {
			$('.modal .modal-dialog').attr('class', 'modal-md modal-dialog  ' + 'zoomIn' + '  animated');
		})
		$('#CreateScheduleModal').on('hide.bs.modal', function (e) {
			$('.modal .modal-dialog').attr('class', 'modal-md modal-dialog  ' + 'zoomOut' + '  animated');
		})*/
	},
	computed: {
		classObjectGEO: function () {
			var self = this;
			return (self.geo.active == true) ? 'btn btn-md btn-success' : 'btn btn-md btn-default';
		},
		urlForm(){
			var self = this;
			url = "/index.php?action=send_file_novelty";
			try {
				return url;
			} catch(e){
				console.error(e)
				return '';
			}
		},
	},
	methods: {
		abrir_Popup(url, title="Mi Cuenta") {
			var objeto_window_referencia;
			var configuracion_ventana = "width=800,height=800,menubar=no,location=yes,resizable=no,scrollbars=no,status=no";
			objeto_window_referencia = window.open(url, title, configuracion_ventana);
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
				// console.log('send LOG: ', send);
				api.post('/records/emvarias_schedule_log', send)
				.then(function (l){
					// console.log('log', l);
					if(l.status == 200){
						// console.log('Registro creado con exito.');
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
				// console.log('Error al creado el registro.');
				console.error(e);
				callb(e)
				// data
			}
		},
		submitForm(){
			var self = this;
			var subDialog = bootbox.dialog({
				message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
				closeButton: false
			});
			
			try {
				if(moment(self.createForm.date_report).isValid() == true 
					&& self.createForm.group > 0
					&& self.createForm.period > 0
					&& self.createForm.year > 1950
				){
					console.log('Formulario correcto');
					
					console.log('Agregar: ', self.createForm);
					
					
					MV.api.create('/emvarias_reports_novelty', self.createForm, function(a){
						subDialog.modal('hide');
						if(a > 0){
							self.idReport = a;
							
							bootbox.confirm({
								message: "¿Desea agregar fotos/archivos a este reporte?",
								locale: "es",
								callback: function (result) {
									if(result == true){
										
									} else {
										self.idReport = 0;
										self.createForm.notes = '';
									}
								}
							});
						}
					});
				}else {
					console.log('Formulario incompleto.');
					subDialog.modal('hide');
				}
			} catch(e) {
				console.log(e);
				subDialog.modal('hide');
			}
		},
		loadDropzone(){
			var self = this;
			// Dropzone class:
			// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
			var previewNode = document.querySelector("#template");
			previewNode.id = "";
			var previewTemplate = previewNode.parentNode.innerHTML;
			previewNode.parentNode.removeChild(previewNode);
			var myDropzone = self.myDropzone = new Dropzone(".dropzone1", {
				// Make the whole body a dropzone
				url: self.urlForm, // Set the url
				thumbnailWidth: 80,
				thumbnailHeight: 80,
				parallelUploads: 3,
				previewTemplate: previewTemplate,
				autoQueue: false, // Make sure the files aren't queued until manually added
				previewsContainer: "#previews", // Define the container to display the previews
				clickable: ".fileinput-button", // Define the element that should be used as click trigger to select files.
				init: function() {
					this.on("processing", function(file) {
						console.log('processing');
						this.options.url = self.urlForm;
					});
				},
				// acceptedFiles: 'image/*;capture=camera'
				acceptedFiles: 'image/*'
			});
			
			// "myAwesomeDropzone" is the camelized version of the HTML element's ID
			myDropzone.on("error", function(file,errorMessage,xhr){
				console.log('log our failure so we dont accidentally complete');
				console.log(xhr);
				console.log(errorMessage);
				alert(errorMessage);
                // log our failure so we don't accidentally complete
                //$scope.errors.push(file.name);
                // retry!
                //myDropZone.context.dropzone.uploadFile(file);
				
				myDropzone.removeFile(file);
				myDropzone.addFile(file);
            });
			
			myDropzone.on("addedfile", function(file) {
			  // Hookup the start button
			  file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
			});
			// Update the total progress bar
			myDropzone.on("totaluploadprogress", function(progress) {
			  $("#total-progress .progress-bar").css('width', progress + "%");
			});

			myDropzone.on("sending", function(file) {
			  // Show the total progress bar when upload starts
			  $("#total-progress").css('opacity', "1");
			  // And disable the start button
			  file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
			});
			// Hide the total progress bar when nothing's uploading anymore
			myDropzone.on("queuecomplete", function(progress) {
			  $("#total-progress").css('opacity', "0");
			});
			// Hide the total progress bar when nothing's uploading anymore
			myDropzone.on("success", function(file, response) {
				console.log('response', response);
				if(response.error == false){
					myDropzone.removeFile(file);
					errors = false;
					
					
					$inputGroup = $(self.canvasToElementMedia(response.files[0]));
					$inputGroup.click(function(){
						// console.log('click');
						self.abrir_Popup($(this).data('path_short'), 'Visor de fotos rápido');
					});
					
					$("#screenshots-images").append($inputGroup);
					self.createLogSchedule({
						schedule: self.createForm.schedule,
						action: 'new-picture',
						data: file,
						response: response,
					}, function(w){
						
					});
					return file.previewElement.classList.add("dz-success");
				} else {
					return file.previewElement.classList.add("dz-danger");
				}
			});
			// Setup the buttons for all transfers
			// The "add files" button doesn't need to be setup because the config
			// `clickable` has already been specified.
			// image/*;capture=camera
			//$("#actions .start").onclick = function() { myDropzone.removeAllFiles(true); };
		},
		getLocation(){
			var self = this;
			if('geolocation' in navigator){
				// geolocation is supported :)
				self.requestLocation();
			}else{
				self.geo.msg = "Sorry, looks like your browser doesn't support geolocation";
			}
		},
		requestLocation(){
			var self = this;
			navigator.geolocation.getCurrentPosition(self.successGEO, self.errorGEO, self.geo.options);
		},
		successGEO(pos){
			var self = this;
			// console.log('pos', pos);
			try {				
				self.createForm.lng = self.geo.lng = pos.coords.longitude;
				self.createForm.lat = self.geo.lat = pos.coords.latitude;
				// and presto, we have the device's location!
				self.geo.msg = 'lon: ' + self.geo.lng + ' and lat: ' + self.geo.lat;
				self.geo.urlMap = '/index.php?controller=sw&action=staticmap&maptype=wikimedia&zoom=16&center=' + self.geo.lat + ',' + self.geo.lng + '&size=450x450&markers=' + self.geo.lat + ',' + self.geo.lng + ',bullseye';
				//var boxImgMap = document.querySelector('#boxImgMap');
				// boxImgMap.src = self.geo.urlMap;
			} catch(e){
				console.log(e);
			}
		},
		errorGEO(err){
			var self = this;
			// return the error message
			self.geo.msg = 'Error: ' + err + ' -------- ' + JSON.stringify(err) + ' :(';
			self.outputResult(self.geo.msg); // output button
			$('.pure-button').removeClass('pure-button-primary').addClass('pure-button-error'); // change button style
		},		
		outputResult(msg){
			var self = this;
			$('.result').addClass('result').html(self.geo.msg);
		},
		loadOptions(){
			var self = this;
			try {				
				MV.api.readList('/emvarias_periods', {
					filter: [
						//'end_day,le,' + self.current.dateISO.day,
						//'start_month,eq,' + self.current.dateISO.month
					],
				}, function(a){
					self.options.emvarias_periods = a;
					a.forEach(function(b){ if((self.current.dateISO.day >= b.start_day && self.current.dateISO.day <= b.end_day) == true && b.start_month == self.current.dateISO.month){ self.createForm.period = b.id; } });					
				});
				MV.api.readList('/emvarias_groups', { }, function(a){ self.options.emvarias_groups = a; });
			} catch(e){
				console.log('error en loadOptions');
			}
		},
		
	}
}).$mount('#schedule-report-before-creator');



</script>