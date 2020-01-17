
<style>
.bg{background-color: #dfdfdf;}
.rwrapper{padding: 5px;}
.rlisting{background-color: #fff;overflow: hidden;}
.rlisting img{width: 100%}
.nopad{padding:0;}
.rfooter{background: #f1f3f5;border-top: 1px #ebebeb solid;width: 100%;padding:10px 15px}
.rlisting h5,.rlisting p{padding:0 15px;}
</style>

<div id="reporting-app">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="page-title">
			<div class="title_left">
				<h3><?= isset($title) ? $title : ""; ?> <small> <?= isset($subtitle) ? $subtitle : ""; ?></small></h3>
			</div>
		</div>
		<div class="container">
			<router-view :key="$route.fullPath" ></router-view>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<template id="create">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Crear</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<!--
								<router-link tag="a" class="close-link" :to="{ name: 'list-reports', params: { route_id: $route.params.route_id, route_name: $route.params.route_name } }">
									<i class="fa fa-close"></i>
								</router-link>
								-->
							</li>
							<li v-if="enabledUpd == true">
								<a class="close-link" @click="newForm()">
									<i class="fa fa-close"></i>
								</a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					
					<form action="javascript:false" v-on:submit="validateForm" method="POST" class="x_content">
						<div class="row">
							<div class="col-md-12">
								<button @click="startWatch" class="btn btn-default" type="button" id="toggleWatchBtn">Start Watching</button>
								<div id="result">
									<!--Position information will be inserted here-->
								</div>
							</div>
						
							<template v-if="error.error == true">
								<div class="alert alert-danger alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
									<strong>Error: </strong> 
									{{ error.message }}
								</div>
							</template>
							
							<template v-if="enabledUpd !== true">
								<div class="col-md-12 col-xs-12">
									
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="route">Microruta<span class="required">*</span></label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<select size="10" id="route" required="required" v-model="record.route" class="form-control">
												<option value="0">Seleccione una opcion</option>
												<option v-for="(option, i_option) in options.photographic_routes" :value="option.id">
													{{ option.name }} {{ option.lot_name }}
												</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="group">Cuadrilla<span class="required">*</span></label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<select size="10" id="group" required="required" v-model="record.group" class="form-control">
												<option value="0">Seleccione una opcion</option>
												<option v-for="(option, i_option) in options.photographic_groups" :value="option.id">{{ option.name }}</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="period">Periodo<span class="required">*</span></label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<select size="10" id="period" required="required" v-model="record.period" class="form-control">
												<option value="0">Seleccione una opcion</option>
												<option v-for="(option, i_option) in options.photographic_periods" :value="option.id">{{ option.name }}</option>
											</select>
										</div>
									</div><div class="clearfix"></div>
								</div>
								
								<div class="col-md-6 col-xs-6">
									<br>
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Año <span class="required">*</span></label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input v-model="record.year" type="number" min="2019" id="year" required="required" class="form-control">
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-xs-6">
									<br>
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Tipo de reporte <span class="required">*</span></label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<div class="col-xs-6">
												<div class="col-xs-4 text-right">
													Antes:
												</div>
												<div class="col-xs-8">
													<input v-model="record.type" type="radio" name="type" value="A" /> 
												</div>
											</div>
											<div class="col-xs-6">
												<div class="col-xs-4">
													Despues:
												</div>
												<div class="col-xs-8">
													<input v-model="record.type" type="radio" name="type" value="D" /> 
												</div>
											</div>
											<!-- // Otro: <input v-model="record.type" type="radio" name="type" value="O" /> -->
										</div>
									</div>
								</div>
							</template>
							
							<div class="col-md-12 col-xs-12">
								<br>
								<div class="form-group" v-if="enabledUpd === true">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_comun">Imagen <span class="required">*</span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">

										<template>
											<div class="input-group">
												<span class="input-group-btn">
													<span class="btn btn-default btn-file">
														Subir... <input name="file[]" type="file" id="file" ref="file" v-on:change="handleFileUpload()" accept="image/png, image/jpeg, image/gif" multiple/>
													</span>
												</span>
												<input id='urlname' type="text" class="form-control" readonly>
											</div>
										</template>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button v-if="enabledUpd !== true" @click="validateForm" type="button" class="btn btn-success">Continuar</button>
							
							<div class="col-sm-12 col-xs-12">
								{{ _route_name }}
							</div>
							<div class="col-sm-12 col-xs-12">
								{{ record }}
							</div>
							<div class="col-sm-12 col-xs-12">
								{{ returnFolderCURL }}
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
var api = axios.create({
	baseURL: '/api.php',
   withCredentials: true
});

api.interceptors.response.use(function (response) {
  if (response.headers['x-xsrf-token']) {
    document.cookie = 'XSRF-TOKEN=' + response.headers['x-xsrf-token'] + '; path=/';
  }
  return response;
});

function FormException(error, aviso){
	this.name = error;
	this.message = aviso;
};

var Create = Vue.extend({
	template: '#create',
	data(){
		return {
			enabledUpd: false,
			file: '',
			files: [],
			options: {
				photographic_routes: [],
				photographic_periods: [],
				photographic_groups: [],
			},
			id: 0,
			record: {
				"route": 0,
				"year": moment().format('Y'),
				"group": 0,
				"period": 0,
				"media": 0,
				"type": 0,
				"created_by": <?= $this->user->id; ?>,
			},
			error: {
				error: false,
				message: "",
			},
			countUps: 0,
			countUp: 0,
			finishUp: false,
			watchID: null,
		};
	},
	mounted() {
		var self = this;
		window.scrollTo(0, 0);
		self.loadOptions();
		
		$(document).ready( function() {
			$(document).on('change', '.btn-file :file', function() {
				var input = $(this), label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				input.trigger('fileselect', [label]);
			});

			$('.btn-file :file').on('fileselect', function(event, label) {
				var input = $(this).parents('.input-group').find(':text'), log = label;
				if (input.length){ input.val(log); } 
				else { if(log) alert(log); }
			});
			
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						self.record.avatar = 0;
						pict = {
							name: input.files[0].name,
							size: input.files[0].size,
							data: e.target.result.split('base64,')[1],
							type: input.files[0].type,
						};
						
						api.post('/records/pictures', pict)
						.then(function (d){
							if(d.data > 0){
								self.record.avatar = d.data;
								$('#img-upload').attr('src', e.target.result);
							}
						})
						.catch(function (e) {
							//console.error(e);
							//console.log(e.response);
							$('#img-upload').attr('src','');
							$('#urlname').val('');
							self.record.avatar = 0;
						});
					}
					reader.readAsDataURL(input.files[0]);
				}
			}

			$("#imgInp").change(function(){
				readURL(this);
			});
			
			$("#clear-pict").click(function(){
				$('#img-upload').attr('src','');
				$('#urlname').val('');
				self.record.avatar = 0;
			});
			
		});
		self.startWatch();
		self.startWatch();
		// self.showPosition();
	},
	computed: {
		returnFolderCURL(){
			var self = this;
			// var urlThis = 'https://micuenta.monteverdeltda.com/index.php?action=UploadFileReports';
			var urlThis = '/index.php?action=UploadFileReports';
			
			
			try{
				route_name = self._route_name;
				group_name = self.options.photographic_groups.find(x => x.id === self.record.group).name;
				period_name = self.options.photographic_periods.find(x => x.id === self.record.period).name;
				urlThis += '&year=' + self.record.year + '&route_name=' + encodeURI(btoa(route_name)) + '&group_name=' + encodeURI(btoa(group_name)) + '&period_name=' + encodeURI(btoa(period_name));
			}catch(e){
				urlThis = '/index.php?action=UploadFileReports';
			}
			
			return urlThis;
				
		},
		_route_name(){
			var self = this;			
			try {
				console.log(self.options.photographic_routes.find(x => x.id === self.record.route));
				return self.options.photographic_routes.find(x => x.id === self.record.route).name;
			} catch(e){
				return "MicrorutaInvalida";
			}
		},
		_route_lot(){
			var self = this;			
			try {
				return self.options.photographic_routes.find(x => x.id === self.record.route).lot.name;
			} catch(e){
				return "LoteInvalido";
			}
		},
	},
	methods: {
		showPosition() {
			var self = this;
			var result = document.getElementById("result");
			var toggleWatchBtn = document.getElementById("toggleWatchBtn");
			if(navigator.geolocation) {
				self.watchID = navigator.geolocation.watchPosition(self.successCallback);
			} else {
				alert("Sorry, your browser does not support HTML5 geolocation.");
			}
		},
		successCallback(position) {
			var self = this;
			var result = document.getElementById("result");
			var toggleWatchBtn = document.getElementById("toggleWatchBtn");
			toggleWatchBtn.innerHTML = "Stop Watching";
			
			// Check position has been changed or not before doing anything
			if(prevLat != position.coords.latitude || prevLong != position.coords.longitude) {
				
				// Set previous location
				var prevLat = position.coords.latitude;
				var prevLong = position.coords.longitude;
				
				// Get current position
				var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
				document.getElementById("result").innerHTML = positionInfo;
				
			}	
		},
		startWatch() {
			var self = this;
			var result = document.getElementById("result");
			var toggleWatchBtn = document.getElementById("toggleWatchBtn");
			
			toggleWatchBtn.onclick = function() {
				if(self.watchID) {
					toggleWatchBtn.innerHTML = "Start Watching";
					navigator.geolocation.clearWatch(self.watchID);
					self.watchID = false;
				} else {
					toggleWatchBtn.innerHTML = "Aquiring Geo Location...";
					self.showPosition();
				}
			}
		},
		
		
		detectLocation() {
			var self = this;
			if(navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
					var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
					document.getElementById("geolocation-test").innerHTML = positionInfo;
				});
			} else {
				alert("Sorry, your browser does not support HTML5 geolocation.");
			}
		},
		detectLocation2(){
			var self = this;
			
			if (navigator.geolocation){
				console.log('// Código de la aplicación');
			} else {
				console.log('// No hay soporte para la geolocalización: podemos desistir o utilizar algún método alternativo');
			}
			
			(function(){
				var content = document.getElementById("geolocation-test");

				if (navigator.geolocation)
				{
					navigator.geolocation.getCurrentPosition(function(objPosition)
					{
						var lon = objPosition.coords.longitude;
						var lat = objPosition.coords.latitude;

						content.innerHTML = "<p><strong>Latitud:</strong> " + lat + "</p><p><strong>Longitud:</strong> " + lon + "</p>";

					}, function(objPositionError)
					{
						switch (objPositionError.code)
						{
							case objPositionError.PERMISSION_DENIED:
								content.innerHTML = "No se ha permitido el acceso a la posición del usuario.";
							break;
							case objPositionError.POSITION_UNAVAILABLE:
								content.innerHTML = "No se ha podido acceder a la información de su posición.";
							break;
							case objPositionError.TIMEOUT:
								content.innerHTML = "El servicio ha tardado demasiado tiempo en responder.";
							break;
							default:
								content.innerHTML = "Error desconocido.";
						}
					}, {
						maximumAge: 75000,
						timeout: 15000
					});
				}
				else
				{
					content.innerHTML = "Su navegador no soporta la API de geolocalización.";
				}
			})();
		},
		loadOptions(){
			var self = this;
			self.$root.loadAPI_List('photographic_periods', {}, function(e){
				self.options.photographic_periods = e;
			});
			self.$root.loadAPI_List('photographic_groups', {}, function(e){
				self.options.photographic_groups = e;
			});
			self.$root.loadAPI_List('photographic_routes', {
				join: [
					'lots'
				]
			}, function(e){
				self.options.photographic_routes = e;
			});
		},
		validateForm(){			
			var self = this;
			self.error.error = false;
			self.error.message = "";			
			if(
				self.record.route > 0
				&& self.record.year >= moment().format('Y')
				&& self.record.group > 0
				&& self.record.period > 0
				&& self.record.type !== 0
			){
				self.enabledUpd = true;
			} else {
				self.error.error = true;
				self.error.message = 'Formulario incompleto';
				self.enabledUpd = false;
			}
		},
		newForm(){
			var self = this;
			self.enabledUpd = false;
			self.record = {
				"route": 0,
				"year": moment().format('Y'),
				"group": 0,
				"period": 0,
				"media": 0,
				"type": 0,
				"created_by": <?= $this->user->id; ?>,
			};
		},
		submitFile(){
			var self = this;
			self.files.forEach(function(fileInput){
				/* Initialize the form data */
				let formData = new FormData();
				/* Add the form data we need to submit */
				formData.append('file', fileInput);
				console.log('files', fileInput);
				
				/* Make the request to the POST /single-file URL */
				var urlThis = '/index.php?action=UploadFileReports';
				route_name = self._route_name;
				lot_name = self._route_lot;
				group_name = self.options.photographic_groups.find(x => x.id === self.record.group).name;
				period_name = self.options.photographic_periods.find(x => x.id === self.record.period).name;
				
				urlThis += '&type=' + self.record.type + '&year=' + self.record.year + '&lot_name=' + encodeURI(btoa(lot_name)) + '&route_name=' + encodeURI(btoa(route_name)) + '&group_name=' + encodeURI(btoa(group_name)) + '&period_name=' + encodeURI(btoa(period_name));
				
				axios.post(urlThis, formData, {
					headers: { 
						'Content-Type': 'multipart/form-data'
					}
				}).then(function(e){
					console.log(e);
					console.log(e.data);
					$("#file").val('');
					self.record.media = 0;
					if(e.status == 200 && e.data.files.length > 0 && e.data.files[0].error === false){
						if(e.data.files[0].id !== undefined && e.data.files[0].id > 0){
							self.record.media = e.data.files[0].id;
							$("#file").val('');
							
							api.post('/records/photographic_reports', self.record).then(function(f){
								console.log(f);
								if(f.status == 200 && f.data > 0){
									self.finishUp++;
									self.countUp++;
									if(self.countUp == self.files.length || self.finishUp == self.files.length){
										bootbox.confirm({
											title: "Éxito! - #" + f.data,
											message: "La imagen se subio correctamente, desea agregar otra imagen?.",
											buttons: {
												cancel: {
													label: '<i class="fa fa-times"></i> Otro reporte'
												},
												confirm: {
													label: '<i class="fa fa-check"></i> Subir otra'
												}
											},
											callback: function (result) {
												if(result !== true){
													self.newForm();
												}
											}
										});
									}
								}
							})
							.catch(function(e){
								console.log(e.response);
								bootbox.alert({
									message: 'Hubo un error subiendo el archivo!',
									size: 'small'
								});
							});
						}
					}
				})
				.catch(function(){
					bootbox.alert({
						message: 'Hubo un error subiendo el archivo!',
						size: 'small'
					});
					$("#file").val('');
				});
			});
			
			
		},
		handleFileUpload(){
			var self = this;
			// self.file = self.$refs.file.files[0];
			console.log(self.$refs.file.files.length);
			console.log(self.$refs.file.files);
			self.file = self.$refs.file.files;
			
			for (var i = 0; i < self.$refs.file.files.length; i++) {
				console.log(self.$refs.file.files[i]);
				self.files.push(self.$refs.file.files[i]);
			}
			
			//self.files = self.$refs.file.files;
			self.submitFile();
		}
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: Create, name: 'create-report' },
	]
});

app = new Vue({
	router: router,
	data: function () {
		return {};
	},
	methods: {
		zfill(number, width) {
			var numberOutput = Math.abs(number);
			var length = number.toString().length;
			var zero = "0";
			if (width <= length) {
				if (number < 0) { return ("-" + numberOutput.toString()); }
				else { return numberOutput.toString(); }
			} else {
				if (number < 0) { return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); }
				else { return ((zero.repeat(width - length)) + numberOutput.toString()); }
			}
		},
		loadAPI_List(table=null, paramsIn=null, call=null){
			var self = this;
			paramsIn = paramsIn !== null ? paramsIn : {};
			call = call !== null ? call : function(e){ console.log('e',e); };
			table = table !== null ? '/records/' + table : '/openapi';
			
			
			api.get(table, { params: paramsIn})
			.then(function (c){ if(c.status == 200){ call(c.data.records); } else { return call([]); } })
			.catch(function (e) {
				console.error(e);
				console.log(e.response);
				return call([]);
			});
		},
		loadAPI_Single(table=null, id=0, paramsIn=null, call=null){
			var self = this;
			paramsIn = paramsIn !== null ? paramsIn : {};
			call = call !== null ? call : function(e){ console.log('e',e); };
			table = table !== null && id > 0 ? '/records/' + table + '/' + id : '/openapi';
			
			
			api.get(table, { params: paramsIn})
			.then(function (c){ if(c.status == 200){ call(c.data); } else { return call(null); } })
			.catch(function (e) {
				console.error(e);
				console.log(e.response);
				return call([]);
			});
		},
		formatMoney(number, decPlaces, decSep, thouSep) {
			decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
			decSep = typeof decSep === "undefined" ? "." : decSep;
			thouSep = typeof thouSep === "undefined" ? "," : thouSep;
			var sign = number < 0 ? "-" : "";
			var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
			var j = (j = i.length) > 3 ? j % 3 : 0;
			return sign + (j ? i.substr(0, j) + thouSep : "") + i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) + (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
		},
	}
}).$mount('#reporting-app');

</script>