<style>
a#viewSource {
  border-top: 1px solid #999;
  display: block;
  margin: 1.3em 0 0 0;
  padding: 1em 0 0 0;
}

video {
  background: #222;
  margin: 0 0 20px 0;
  width: 100%;
  height: auto;  
}
.product-image {
	height: 450px;
	max-height: 750px;
	
	
    border: 1px solid #e82b2b;
    margin: 0px;
    display: flex;
    padding: 5px;
}

.videostream {
	/*border: 1px solid #666;*/
}

#screenshot-capture {
    border: 1px solid #e82b2b;
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
		
		<div class="col-md-2 col-sm-12 col-xs-12">
			<a :class="(camera.active == true) ? 'btn btn-md active-camera btn-success' : 'btn btn-md active-camera btn-default'" @click="toggleCamera">
			  <i :class="(camera.active == true) ? 'fa fa-stop' : 'fa fa-play'"></i> {{ (camera.active == true) ? 'Desactivar' : 'Activar' }}
			</a>
			
			<a v-bind:class="classObjectGEO + ' pure-button'" @click="getLocation">
			  <i class="fa fa-map-marker"></i> Activar GPS
			</a>
			<a class="btn btn-md btn-default screenshot-button" @click="cameraTok">
			  <i class="fa fa-camera-retro"></i> Capturar
			</a>
			<br />
			<!-- start form for validation -->
			<form id="demo-form" data-parsley-validate>
				<div class="form-group">
					<label class="control-label col-md-12 col-sm-12 col-xs-12">Periodo</label>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<select @change="loadMicroroutesSchedule" v-model="createForm.period" class="select2_single form-control" tabindex="-1">
							<option value="0">Seleccione una opcion</option>
							<option v-for="(option, i_option) in options.photographic_periods" :value="option.id">{{ option.name }}</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-12 col-sm-12 col-xs-12">Cuadrilla</label>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<select @change="loadMicroroutesSchedule" v-model="createForm.group" class="select2_single form-control" tabindex="-1">
							<option value="0">Seleccione una opcion</option>
							<option v-for="(option, i_option) in options.photographic_groups" :value="option.id">{{ option.name }}</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-12 col-sm-12 col-xs-12">Microruta/Lote *</label>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<select v-model="createForm.schedule" class="select2_single2 form-control" tabindex="-1">
							<!-- // <option v-for="(option, i_option) in options.photographic_groups" :value="option.id">{{ option.name }}</option> -->
						</select>
					</div>
				</div>
				<br/>
				<img id="boxImgMap" class="img img-responsive hide" width="100%" :src="geo.urlMap" />
				<!-- // <br/>
				<div class="">{{ geo.msg }}</div> -->
				<!-- // 
				<h3 class="prod_title">{{ addressSelected }}</h3>						
				<p>{{ descriptionSelected }}</p>
				-->
			</form>
		
					<div class=" col-xs-12" style="border:0px solid #e5e5e5;">
						
						<!-- // 
						<div class="product_social">
							<ul class="list-inline">
								<li><a href="#" data-toggle="tooltip" title="Hooray!">Hover over me</a></li>
								<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope-square"></i></a></li>
								<li><a href="#"><i class="fa fa-rss-square"></i></a></li>
							</ul>
						</div>
						-->
					</div>
		</div>
		
		
		<div class="col-md-10 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<div class="product-image">
						<video @click="cameraTok" class="videostream" nocontrols autoplay muted playsinline></video>
					</div>
					
				</div>
			</div>
			
			<div class="x_panel">
				<div class="x_content">
					<div class="row">
						<p>Imagenes capturadas</p>
						<div class="actions-alls">
							<button class="btn btn-success " @click="upAll">
								<i class="glyphicon glyphicon-upload"></i>
								<span>Subir todas</span>
							</button>
						</div>
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
														<button class="btn btn-primary start ">
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
		
	</div>
</div>

<script>
var app = new Vue({
	data: function () {
		return {
			options: {
				photographic_groups: [],
				photographic_periods: [],
				emvarias_schedule: [],
			},
			createForm: {
				schedule: 0,
				year: moment().format('Y'),
				type: 'A',
				group: 0,
				period: 0,
				lat: 0,
				lng: 0,
			},
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
			camera: {
				devices: [],
				active: false,
				videoSource: '',
				deviceInfos: null,
				stream: null,
				videoElement: null,
				constraints: {
				  audio: false,
				  video: {
						width: { ideal: 1280, max: 1920 }, // 
						height: { ideal: 720, max: 1080 },
						facingMode: "environment",
						frameRate: { ideal: 10, max: 24 },
						aspectRatio: 1.777777778,
					}
				}
			},
			canvas: null,
			myDropzone: null
		};
	},
	mounted(){
		var self = this;
		self.canvas = document.createElement('canvas');
		self.camera.videoElement = document.querySelector('video');
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
		/*
		$('#CreateScheduleModal').on('show.bs.modal', function (e) {
			$('.modal .modal-dialog').attr('class', 'modal-md modal-dialog  ' + 'zoomIn' + '  animated');
		})
		$('#CreateScheduleModal').on('hide.bs.modal', function (e) {
			$('.modal .modal-dialog').attr('class', 'modal-md modal-dialog  ' + 'zoomOut' + '  animated');
		})*/
	},
	computed: {
		videoSource(){
			var self = this;
			return (self.camera.videoSource !== null) ? {exact: videoSource} : undefined;
		},
		classObjectGEO: function () {
			var self = this;
			return (self.geo.active == true) ? 'btn btn-md btn-success' : 'btn btn-md btn-default';
		},
		addressSelected(){
			var self = this;
			try{
				return self.options.emvarias_schedule.find(x => x.id === self.createForm.schedule).microroute.lot.address_text;
			} catch(e){
				return " - Complete el formulario para ver más información - ";
			}
		},
		descriptionSelected(){
			var self = this;
			try{
				return self.options.emvarias_schedule.find(x => x.id === self.createForm.schedule).microroute.lot.description;
			} catch(e){
				return " - Complete el formulario para ver más información - ";
			}
		},
		contractName(){
			var self = this;
			try{
				return self.options.emvarias_schedule.find(x => x.id == self.createForm.schedule).microroute.contract.name;
			} catch(e){
				return "";
			}
		},
		periodName(){
			var self = this;
			try{
				return self.options.emvarias_schedule.find(x => x.id == self.createForm.schedule).period.name;
			} catch(e){
				return "";
			}
		},
		groupName(){
			var self = this;
			try{
				return self.options.emvarias_schedule.find(x => x.id == self.createForm.schedule).group.name;
			} catch(e){
				return "";
			}
		},
		dateUpda(){
			var self = this;
			try{
				return self.options.emvarias_schedule.find(x => x.id == self.createForm.schedule).date_executed_schedule;
			} catch(e){
				return ((Math.floor(Math.random() * (1 + 40 - 20))) + 20);
			}
		},
		microrouterName(){
			var self = this;
			try{
				var micr = self.options.emvarias_schedule.find(x => x.id == self.createForm.schedule).microroute;
				
				return 'Z' + micr.zone + 'CC' + MV.format.zfill(micr.name, 4) + 'FM' + micr.repeat;
			} catch(e){
				return "SIN-RUTA";
			}
		},
		urlForm(){
			var self = this;
			url = "/index.php?action=send_photo_schedule";
			try {
				if(self.camera.active == true && self.createForm.schedule > 0){			
					url += "&contract_name=" + btoa(self.contractName);
					url += "&period_name=" + btoa(self.periodName);
					url += "&year=" + self.createForm.year;
					url += "&period=" + self.createForm.period;
					url += "&schedule=" + self.createForm.schedule;
					url += "&route_name=" + btoa(self.microrouterName);
					url += "&group=" + self.createForm.group;
					url += "&date_executed=" + self.dateUpda;
					url += "&group_name=" + btoa(self.groupName);
					// console.log(url);
					
				}
				return url
			} catch(e){
				console.error(e)
				return '';
			}
		},
	},
	methods: {
		upAll(){
			var self = this;
			self.myDropzone.enqueueFiles(self.myDropzone.getFilesWithStatus(Dropzone.ADDED));
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
		dataURItoBlob(dataURI) {
			var self = this;
			
			var byteString, mimestring;

			if(dataURI.split(',')[0].indexOf('base64') !== -1 ) { byteString = atob(dataURI.split(',')[1]); } 
			else { byteString = decodeURI(dataURI.split(',')[1]); };

			mimestring = dataURI.split(',')[0].split(':')[1].split(';')[0];

			var content = new Array();
			for (var i = 0; i < byteString.length; i++) { content[i] = byteString.charCodeAt(i); }

			return new Blob([new Uint8Array(content)], {type: mimestring});
		},
		dataURLtoFile(dataurl, filename) {
			var arr = dataurl.split(','),
				mime = arr[0].match(/:(.*?);/)[1],
				bstr = atob(arr[1]), 
				n = bstr.length, 
				u8arr = new Uint8Array(n);
				
			while(n--){
				u8arr[n] = bstr.charCodeAt(n);
			}
			return new File([u8arr], filename, {type:mime});
		},
		save(dataURI) {
			var self = this;
			var blob = self.dataURItoBlob(dataURI);
			return blob;
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
				// clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
				init: function() {
					this.on("processing", function(file) {
						console.log('processing');
						this.options.url = self.urlForm + "&type=A";
					});
				}
			});
			
			// "myAwesomeDropzone" is the camelized version of the HTML element's ID
			myDropzone.on("error", function(file,errorMessage,xhr){
				console.log('log our failure so we dont accidentally complete');
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
				if(response.error == false){
					myDropzone.removeFile(file);
					errors = false;
					/*
					var context = self.canvas.getContext("2d");
					 var imageObj = new Image();
					 imageObj.onload = function(){
						 context.drawImage(imageObj, 10, 10);
						 context.font = "40pt Calibri";
						 context.fillText("My TEXT!", 20, 20);
					 };
					 imageObj.src = response.files[0].path_short; 
					 $("#screenshots-images").append(imageObj);
					 */
					$("#screenshots-images").append(self.canvasToElementMedia(response.files[0]));
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
			
			//$("#actions .start").onclick = function() { myDropzone.removeAllFiles(true); };
		},
		cameraTok(){
			var self = this;
			// /// //// /// //// //$("#screenshots-images").append(self.canvasToElementMedia());
			try {
				self.canvas.width = self.camera.videoElement.videoWidth;
				self.canvas.height = self.camera.videoElement.videoHeight;
				var ctx = self.canvas.getContext('2d').drawImage(self.camera.videoElement, 0, 0, (self.canvas.width > 640) ? self.canvas.width : 640, (self.canvas.height > 480) ? self.canvas.height : 480, 0, 0, (self.canvas.width > 640) ? self.canvas.width : 640, (self.canvas.height > 480) ? self.canvas.height : 480);
				var picture = self.canvas.toDataURL('image/png');
				
				if(self.camera.active == true
					&& self.createForm.schedule > 0
					&& self.createForm.year > 0
					&& self.createForm.type !== ''
					&& self.createForm.group > 0
					&& self.createForm.period > 0
					&& self.createForm.lat > 0
					&& self.createForm.lng < 0
				){
					var newPicture = self.dataURLtoFile(picture, new Date().toISOString() + '-' + MV.format.makeid(11)+'.png');
				
					self.myDropzone.addFile(newPicture);
					
					new PNotify({
						"title": "Agregada!",
						"text": "La imagen fue agregada a la lista.",
						"styling":"bootstrap3",
						"type":"success",
						"icon":true,
						"animation":"zoom",
						"hide":true
					});
				} else {
					new PNotify({
						"title": "Error!",
						"text": "Completa el formulario para subir poder subir imagenes.",
						"styling":"bootstrap3",
						"type":"error",
						"icon":true,
						"animation":"zoom",
						"hide":true
					});
				}
			} catch(e) {
				console.error(e);
				return "";
			}
		},
		canvasToElementMedia(fileResponse){
			var self = this;
			$htmlout = '';
			try {
				/*
				response.files[0].id
				response.files[0].name
				response.files[0].path_short
				response.files[0].size*/
									
				 
				 
				$htmlout += '<div class="col-md-55">';
					$htmlout += '<div class="thumbnail">';
						$htmlout += '<div class="image view view-first">';
							$htmlout += '<img style="width: 100%; display: block;" src="' + fileResponse.path_short + '" alt="image" />';
							$htmlout += '<div class="mask">';
								$htmlout += '<p>' + fileResponse.size + '</p>';
							$htmlout += '</div>';
						$htmlout += '</div>';
						$htmlout += '<div class="caption">';
							$htmlout += '<p> ' + fileResponse.name + '</p>';
						$htmlout += '</div>';
					$htmlout += '</div>';
				$htmlout += '</div>';
				return $htmlout;
			} catch(e) {
				console.error(e);
				return "$htmlout";
			}
		},
		openFullscreen() {
			var self = this;
			if (self.camera.videoElement.requestFullscreen) {
				self.camera.videoElement.requestFullscreen();
			} else if (self.camera.videoElement.mozRequestFullScreen) { /* Firefox */
				self.camera.videoElement.mozRequestFullScreen();
			} else if (self.camera.videoElement.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
				self.camera.videoElement.webkitRequestFullscreen();
			} else if (self.camera.videoElement.msRequestFullscreen) { /* IE/Edge */
				self.camera.videoElement.msRequestFullscreen();
			}
		},
		getLocation(){
			var self = this;
			if('geolocation' in navigator){
				// geolocation is supported :)
				self.requestLocation();
			}else{
				self.geo.msg = "Sorry, looks like your browser doesn't support geolocation";
				$('.pure-button').removeClass('pure-button-primary').addClass('pure-button-success'); // change button style
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
				$('.pure-button').removeClass('pure-button-primary').addClass('btn-success'); // change button style
			} catch(e){
				
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
		toggleCamera(){
			var self = this;
			// videoElement
			try {
				if(self.camera.active === false){
					self.loadCamera();
				} else {
					self.stream.getTracks().forEach(function(track) {
					  track.stop();
					});
					self.camera.active = false;
				}
			} catch(e){
				self.camera.active = false;
			}
			
		}, 
		loadCamera(){
			var self = this;
			
			if (self.camera.stream) {
				self.camera.stream.getTracks().forEach(track => {
					track.stop();
				});
			}
			navigator.mediaDevices.getUserMedia(self.camera.constraints).then(self.handleSuccess).catch(self.handleError);
		},
		handleSuccess(stream) {
			var self = this;
			window.stream = self.stream = stream; // hacer que la transmisión esté disponible para la console del navegador
			self.camera.videoElement.srcObject = stream;
			self.camera.active = true;
			self.camera.videoElement.onloadedmetadata = function(e) {
				console.log('Haz algo con el video aquí.');
				self.camera.videoElement.play();
				if (!navigator.mediaDevices || !navigator.mediaDevices.enumerateDevices) {
				  console.log("enumerateDevices() not supported.");
				  return;
				}
				// List cameras and microphones.
				self.camera.devices = [];
				navigator.mediaDevices.enumerateDevices()
				.then(function(devices) {
					devices.forEach(function (device) {
						// console.log(device.kind + ": " + device.label + " id = " + device.deviceId);
						if(device.kind == 'videoinput'){
							self.camera.devices.push(device);
						}
					});
				})
				.catch(function(err) {
					console.log(err.name + ": " + err.message);
				});
				
			};
		},
		handleError(err) {
			var self = this;
			console.log('navigator.MediaDevices.getUserMedia error: ');
			console.log(err.message, err.name);
			
			var showError = {
				"title": "Error!",
				"text": "Ocurrio un error en la transmisión.",
				"styling":"bootstrap3",
				"type":"error",
				"icon":true,
				"animation":"slide",
				"hide":true
			};
			
			if (err.name == "NotFoundError" || err.name == "DevicesNotFoundError") {
				// falta la pista requerida
				showError.title = 'Falta la pista requerida';
				showError.text = 'No encontramos dispositivos';
			} else if (err.name == "NotReadableError" || err.name == "TrackStartError") {
				// la cámara web o el micrófono ya están en uso
				showError.title = 'Dispositivo(s) en uso';
				showError.text = 'La cámara web o el micrófono ya están en uso';
			} else if (err.name == "OverconstrainedError" || err.name == "ConstraintNotSatisfiedError") {
				// AVB no puede satisfacer las restricciones. dispositivos
				showError.title = 'Dispositivo no compatible';
				showError.text = 'AVB no puede satisfacer las restricciones. dispositivos';
			} else if (err.name == "NotAllowedError" || err.name == "PermissionDeniedError") {
				// permiso denegado en el navegador
				showError.title = 'Permisos invalidos';
				showError.text = 'permiso denegado en el navegador';
			} else if (err.name == "TypeError" || err.name == "TypeError") {
				// objeto de restricciones vacías
				showError.title = 'Objeto de restricciones vacías';
				showError.text = "No hay restricciones validas.\r\n" + err.name;
			} else {
				showError.title = 'Error Desconocido';
				showError.text = 'Ocurrio un error, consulte con soporte';
				// otros errores
			}
			self.camera.active = false;
			new PNotify(showError);
		},
		loadOptions(){
			var self = this;
			try {				
				MV.api.readList('/photographic_periods', {
					filter: [
						//'end_day,le,' + self.current.dateISO.day,
						//'start_month,eq,' + self.current.dateISO.month
					],
				}, function(a){
					self.options.photographic_periods = a;
					a.forEach(function(b){ if((self.current.dateISO.day >= b.start_day && self.current.dateISO.day <= b.end_day) == true && b.start_month == self.current.dateISO.month){ self.createForm.period = b.id; } });					
				});
				MV.api.readList('/photographic_groups', { }, function(a){ self.options.photographic_groups = a; });
			} catch(e){
				console.log('error en loadOptions');
			}
		},
		loadMicroroutesSchedule(){
			var self = this;
			var subDialog = bootbox.dialog({
				message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
				closeButton: false
			});
			try {
				$("#contentScheduleSelected").html('');
				MV.api.readList('/emvarias_schedule', {
					filter: [
						'period,eq,' + self.createForm.period,
						'group,eq,' + self.createForm.group,
						'year,eq,' + self.createForm.year
					],
					join: [
						'photographic_periods',
						'photographic_groups',
						'emvarias_microroutes,emvarias_lots',
						'emvarias_microroutes,emvarias_contracts',
					],
				}, function(a){
					$(".select2_single2").html('<option value="">Seleccione una opcion</option><option value="0">Seleccione una opcion</option>');
					self.options.emvarias_schedule = a;					
					a.forEach(function(b){
						$input = $('<input />')
							.attr('id', 'shedule-option-' + b.id)
							.attr('v-model', "createForm.schedule")
							.attr('type', "radio")
							.attr('class', "flat")
							.attr('name', "schedule")
							.attr('required', "true")
							.val(b.id).change(function(c){
								self.createForm.schedule = parseInt($(c.target).val());
							});
							
						title = 'Z' + b.microroute.zone + 'CC' + MV.format.zfill(b.microroute.name, 4) + 'FM' + b.microroute.repeat + ' - (Lote: ' + b.microroute.lot.id_ref + ') - ' + b.microroute.lot.address_text + ' - '  + b.date_executed_schedule;
						
						
						$option = $('<option />')
							.attr('id', 'shedule-option-select-' + b.id)
							.text(title)
							.attr('required', "true")
							.val(b.id).change(function(c){
								self.createForm.schedule = parseInt($(c.target).val());
							});
						
						$inputText = $('<label></label>').text(title).attr('for', 'shedule-option-' + b.id);
						$inputGroup = $('<div></div>').append($input,$inputText).popover({
							title: b.microroute.lot.address_text,
							content: b.microroute.lot.description,
							trigger: 'focus',
							placement: 'top',
							// container: 'body'
						});
						//$("#contentScheduleSelected").append($inputGroup);
						
						$(".select2_single2").append($option);
						
					});
					subDialog.modal('hide');
					
					$(".select2_single2").select2({
					  placeholder: "Seleccione Microruta/Lote",
					  allowClear: true
					})
					.on('select2:select', function (e) {
						var data = e.params.data;
						self.createForm.schedule = data.id;
					});
				});
			} catch(e){
				console.log('error en loadMicroroutesSchedule');
				subDialog.modal('hide');
			}
		}
	}
}).$mount('#schedule-report-before-creator');



</script>