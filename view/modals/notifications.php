<?php 

?>
<style>
button, .buttons, .btn, .modal-footer .btn+.btn {
    margin-bottom: 5px !important;
    margin-right: 5px !important;
}
.dropzone {
	max-height: 150px !important;
}
</style>

<script>
var appNotifications = new Vue({
	data: function () {
		return {
			records: [],
			geo: {
				active: false,
				msg: '',
				urlMap: '/index.php?controller=sw&action=staticmap&maptype=wikimedia&zoom=16&center=6.2386064999999995,-75.58853739999999&size=450x450',
				lat: 0,
				lng: 0,
				options: {
					enableHighAccuracy: false,
					timeout: 5000,
					maximumAge: 0
				},
			},
			myDropzone: null
		};
	},
	mounted(){
		var self = this;
		self.load();
	},
	directives: {
	},
	computed: {
	},
	methods: {
		urlFormSendFilePhotographicReport(fileData){
			console.log('fileData', fileData);
			var self = this;
			url = "/index.php?action=send_photo_schedule";
			try {
				if(fileData.year > 0){ url += "&year=" + fileData.year; }
				if(fileData.period !== undefined && fileData.period.name !== undefined){ url += "&period_name=" + btoa(fileData.period.name); }
				if(fileData.group !== undefined && fileData.group.name !== undefined){ url += "&group_name=" + btoa(fileData.group.name); }
				if(fileData.period !== undefined && fileData.period.id !== undefined){ url += "&period=" + (fileData.period.id); }
				if(fileData.group !== undefined && fileData.group.id !== undefined){ url += "&group=" + (fileData.group.id); }
				if(fileData.schedule !== undefined && fileData.schedule.id !== undefined){ url += "&schedule=" + (fileData.schedule.id); }
				if(fileData.schedule !== undefined && fileData.schedule.lot !== undefined && fileData.schedule.lot.microroute_name !== undefined){ url += "&route_name=" + btoa(fileData.schedule.lot.microroute_name); }
				if(fileData.schedule !== undefined && fileData.schedule !== undefined && fileData.schedule.date_executed_schedule !== undefined){ url += "&date_executed=" + (fileData.schedule.date_executed_schedule); }
				if(fileData.type !== undefined){ url += "&type=" + (fileData.type); }
				
				url += "&lat=" + (self.geo.lat);
				url += "&lng=" + (self.geo.lng);
				
				//return url + "&type=";
				console.log('url final: ', url);
				return url;
			} catch(e){
				console.error(e)
				return '';
			}
		},
		addToTask: function(){
            var self = this;
            setTimeout(self.load, 300000); // 300000 == 5 Minutos || 1Min = 60000 || 1Seg = 1000
        },
		openNotificationInModal(dataNot, eljQuery){
			var self = this;
			try {
				console.log('dataNot', dataNot);
				console.log('datajson.id', dataNot.datajson.id);
				
				if(dataNot.type == 'photographic-report-declined'){
					MV.api.read('/emvarias_reports_photographic/' + dataNot.datajson.id, {}, function(img){
						$messageTxt = $('<div></div>');
						$title = 'Foto rechazada';
						$parrOne = $('<p></p>')
							.append("Se ha rechazado una fotografia tuya en la microruta <b>" + dataNot.datajson.schedule.lot.microroute_name + "</b>")
							.append(
								$('<b></b>').append($('<br />'))
								.append("F. programacion: " )
								.append(dataNot.datajson.schedule.date_executed_schedule)
								.append(moment(dataNot.datajson.schedule.date_executed_schedule_end).subtract({ days: 1 }).format('Y-MM-DD') == dataNot.datajson.schedule.date_executed_schedule ? '' 
									: '/' + moment(dataNot.datajson.schedule.date_executed_schedule_end).subtract({ days: 1 }).format('Y-MM-DD'))
							);
						
						console.log(img);
						
						$previewsDropzone = $('<div></div>').attr('id', 'previews-dropzone-notifications').attr('class', 'table table-striped files')
							.append($('<div></div>').attr('id', 'template-dropzone-notifications').attr('class', 'file-row')
								.append($('<div></div>')
									.append($('<span></span>').attr('class', 'preview').append($('<img />').attr('data-dz-thumbnail', '')))
								)
								
								.append($('<div></div>')
									.append($('<p></p>').attr('class', 'name').attr('data-dz-name', ''))
									.append($('<strong></strong>').attr('class', 'error text-danger').attr('data-dz-errormessage', ''))
								)
								
								.append($('<div></div>')
									.append($('<p></p>').attr('class', 'size').attr('data-dz-size', ''))
									.append(
										$('<div></div>').attr('class', 'progress progress-striped active').attr('role', 'progressbar').attr('aria-valuemin', '0').attr('aria-valuemax', '100').attr('aria-valuenow', '0')
											.append($('<div></div>').attr('class', 'progress-bar progress-bar-success').attr('style', 'width:0%;').attr('data-dz-uploadprogress', ''))
									)
								)
								
								.append($('<div></div>')
									.append($('<button></button>').attr('class', 'btn btn-primary start')
										.append($('<i></i>').attr('class', 'glyphicon glyphicon-upload'))
										.append($('<span></span>').append('Subir')))
									.append($('<button></button>').attr('class', 'btn btn-danger cancel').attr('data-dz-remove', '')
										.append($('<i></i>').attr('class', 'glyphicon glyphicon-ban-circle'))
										.append($('<span></span>').append('Cancelar')))
									.append($('<button></button>').attr('class', 'btn btn-danger delete').attr('data-dz-remove', '')
										.append($('<i></i>').attr('class', 'glyphicon glyphicon-trash'))
										.append($('<span></span>').append('Eliminar')))
								)
							);
						
						
					
						$imgBox = $('<div></div>').attr('class', 'row')
							.append(
								$('<div></div>').attr('class', 'col-xs-7')
									.append(
										$('<img />')
											.attr('class', 'img img-responsive')
											.attr('src', img.file_path_short)
									)
							).append(
								$('<div></div>').attr('class', 'col-xs-5')
									.append($('<div></div>').attr('class', 'dropzone').attr('id', 'dropzone-notifications').attr('style', 'max-height: 150px !important;'))
									.append($previewsDropzone)
							);
						
						$messageTxt.append($parrOne).append($('<b></b>')).append($imgBox);
						
						var dialog = bootbox.dialog({
							title: $title,
							message: $messageTxt.html(),
							size: 'large',
							buttons: {
								cancel: {
									label: "Cerrar",
									className: 'btn-danger',
									callback: function(){
										console.log('Custom cancel clicked');
									}
								},
								noclose: {
									label: "Subir Foto",
									className: 'btn-warning fileinput-button',
									callback: function(){
										console.log('Custom button clicked');
										return false;
									}
								},
								ok: {
									label: "Marcar como leida",
									className: 'btn-default',
									callback: function(){
										console.log('Custom OK clicked');
											bootbox.confirm({
												message: "Marcar notificacion como leida?.",
												locale: 'es',
												buttons: { confirm: { label: 'Marcar', }, },
												callback: function (result) {
													if(result === true){
														MV.api.update('/notifications/' + dataNot.id, {
															read: 1,
															updated_by: <?= ($this->user->id); ?>
														},function(xs){
															eljQuery.remove();
															$count.text(parseInt($count.text())-1);
														});
													}
												}
											});
										
									}
								},
							}
						}).init(function (){
							console.log('This was logged in the callback: ' );
							
							// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
							var previewNode = document.querySelector("#template-dropzone-notifications");
							previewNode.id = "";
							var previewTemplate = previewNode.parentNode.innerHTML;
							previewNode.parentNode.removeChild(previewNode);
							
							
							
							var myDropzone = $('#dropzone-notifications').dropzone({
								// Make the whole body a dropzone
								url: self.urlFormSendFilePhotographicReport(dataNot.datajson), // Set the url
								thumbnailWidth: 80,
								thumbnailHeight: 80,
								parallelUploads: 3,
								previewTemplate: previewTemplate,
								autoQueue: false, // Make sure the files aren't queued until manually added
								previewsContainer: "#previews-dropzone-notifications", // Define the container to display the previews
								clickable: ".fileinput-button", // Define the element that should be used as click trigger to select files.
								init: function() {
									this.on("processing", function(file) {
										console.log('processing');
										this.options.url = self.urlFormSendFilePhotographicReport(dataNot.datajson);
									});
								},
								acceptedFiles: 'image/*'
								/*onDropHandler(files) {      
									  var file = files[0]
									  const reader = new FileReader();
									  reader.onload = (event) => {
										console.log(event.target.result);
									  };
									  reader.readAsDataURL(file);
								}
								*/
							});
							
							
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
								/*
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
								*/
							});
						});
					})
				} else if(dataNot.type == 'schedule-executed'){
					$title = dataNot.datajson.lot.microroute_name;
					$parrOne = $('<p></p>').append('se ha cambiado el estado a "Ejecutado", Bien hecho!.');
					//$messageTxt.append($parrOne);
					$create = true;
				} else if(dataNot.type == 'novelty-execution-schedule'){
					$title = dataNot.datajson.lot.microroute_name;
					$parrOne = $('<p></p>').append('Hay una observación, gestionala para continuar la aprobación.');
					//$messageTxt.append($parrOne);
					$create = true;
				}

				
			} catch (e){
				console.error(e);
				console.log(e);
			}
		},
		load(task){
			var self = this;
			var task = (task !== undefined) ? true : task;
			$Ul = $('#menu-notifications-top');
			$count = $('#count-notifications');
			
			$Ul.html('<li><a><i class="fa fa-spinner fa-spin"></i> Cargando, espere... </a></li>');
			$count.text(0);
			self.meNotificationsPendings(function(a){
				self.records = Array.isArray(a) === true ? a : [];
				$Ul.html('');
				self.records.forEach(function(b){
					b.datajson = JSON.parse(b.datajson);
					$create = false;
					$title = 'Nueva notificacion';
					$messageTxt = 'Tienes una nueva notificacion.';
					$buttonsBox = $('<div></div>');
					
					if(b.type == 'photographic-report-declined'){
						$title = 'Foto rechazada';
						$messageTxt = "Se ha rechazado una fotografia tuya en la microruuta "+ b.datajson.schedule.lot.microroute_name +".<br><b>F. programacion: </b>" + b.datajson.schedule.date_executed_schedule;
						$messageTxt += (moment(b.datajson.schedule.date_executed_schedule_end).subtract({ days: 1 }).format('Y-MM-DD') == b.datajson.schedule.date_executed_schedule) ? '' : '/' + moment(b.datajson.schedule.date_executed_schedule_end).subtract({ days: 1 }).format('Y-MM-DD');
						$create = true;
					} else if(b.type == 'schedule-executed'){
						$title = b.datajson.lot.microroute_name;
						$messageTxt = 'se ha cambiado el estado a "Ejecutado", Bien hecho!.';						
						$create = true;
					} else if(b.type == 'novelty-execution-schedule'){
						$title = b.datajson.lot.microroute_name;
						$messageTxt = 'Hay una observación, gestionala para continuar la aprobación.';
						$create = true;
					}
					
					if($create == true){
						/*
						$buttonReadNot = $('<button></button>').attr('style', 'display: inline-flex;zoom:0.5;').attr('class', 'btn-round btn-success').append($('<i></i>').attr('class', 'fa fa-check')).click(function(){
							$thisElement = $(this);
							bootbox.confirm({
								message: "Marcar notificacion como leida?.",
								locale: 'es',
								buttons: { confirm: { label: 'Marcar', }, },
								callback: function (result) {
									if(result === true){
										MV.api.update('/notifications/' + b.id, {
											read: 1,
											updated_by: <?= ($this->user->id); ?>
										},function(xs){
											$thisElement.remove();
											$count.text(parseInt($count.text())-1);
										});
									}
								}
							});
						});
						$buttonsBox.append($buttonReadNot);*/
						
						$count.text(parseInt($count.text())+1);
						$spanTime = $('<span></span>').attr('class', 'time').attr('style', 'display: inline-flex;').append(moment(b.created).format('DD-MM-Y HH:mm:ss')).append($buttonsBox);
						$spanUsername = $('<span></span>').append($title);
						
						$spanBox = $('<span></span>').append($spanUsername).append($spanTime);
						$message = $('<span></span>').attr('class', 'message').append($messageTxt);
						
						$ABox = $('<a></a>').append($spanBox).append($message);
						
						$Li = $('<li></li>').append($ABox).click(function(){
							self.openNotificationInModal(b, $(this));
						});
						
						$Ul.append($Li);
					}
				});
				
				if(self.records.length == 0){
					$Li = $('<li></li>').append($('<a></a>').append(
						$('<span></span>').append('').append('')
					).append(
						$('<span></span>').attr('class', 'message').append('No tienes notificaciones sin leer.')
					));
					$Ul.append($Li);
				}
				
				if(task == true){
					self.addToTask();
				}
			})
		},
		meNotificationsPendings(call){
			var self = this;
			MV.api.readList('/notifications', {
				filter: [
					'user,eq,<?= $this->user->id; ?>',
					'read,eq,0'
				],
				order: 'created,desc'
			}, call);
		},
	}
}).$mount('#notifications-navbar-top');
</script>