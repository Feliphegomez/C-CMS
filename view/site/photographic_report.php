
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

<template id="list-routes">
	<div>
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<form action="javascript: false;" method="GET" v-on:submit="searchText">
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<div class="input-group">
								<input v-model="search.text" type="text" class="form-control" placeholder="¿Que estas buscando?" id="txtSearch"/>
								<div class="input-group-btn">
									<button class="btn btn-primary" type="submit">
									<span class="glyphicon glyphicon-search"></span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12 text-center">
				<ul class="pagination pagination-split pull-right">
					<li v-if="page > 1 && total > 0"><a @click="load();page--;"> &#60; </a></li>
					<li v-if="total > (limit * page)"><a @click="load();page++;"> &#62; </a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Lotes <small>Microrutas</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<!-- //
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a></li>
									<li><a href="#">Settings 2</a></li>
								</ul>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a></li>
							-->
							<li>
								<router-link tag="a" :to="{ name: 'create-route' }">
									<i class="fa fa-plus"></i>
								</router-link>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th width="75%">Lote / Microruta</th>
									<th width="15%"></th>
								</tr>
							</thead>
							<tbody>
								<template v-if="records.length > 0">
									<tr v-for="(route, index) in records">
										<th scope="row">{{ route.id }}</th>
										<td>
											<router-link  :to="{ name: 'list-reports', params: { route_id: route.id, route_name: route.name } }">
												{{ route.name }}
											</router-link>
										</td>
										<td>
											<router-link tag="button" type="button" class="btn btn-round btn-default" :to="{ name: 'list-reports', params: { route_id: route.id, route_name: route.name } }">
												<i class="fa fa-inbox"></i> Reportes
											</router-link>
										</td>
									</tr>
								</template>
							</tbody>
						</table>
					</div>
				
				
					<div class="x_footer">
						<ul class="nav navbar-right panel_toolbox">
							<li>
								Viendo: {{ (((page * limit) - limit) + 1) }}
								- 
								{{ (page * limit) }} / Total: {{ total }}
								 | 
								Limite x Página: {{ limit }}
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</template>

<template id="list-reports">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Reportes <small></small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<!-- //
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a></li>
									<li><a href="#">Settings 2</a></li>
								</ul>
							</li>
							-->
							<li>
								<router-link tag="a" class="close-link btn-sm btn-default" :to="{ name: 'create-report', params: { route_id: $route.params.route_id, route_name: $route.params.route_name } }">
									<i class="fa fa-plus"></i>									
								</router-link>
							</li>
							<li>
								<router-link tag="a" class="close-link" :to="{ name: 'list-routes' }">
									<i class="fa fa-close"></i>
								</router-link>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<template v-if="records.length > 0" v-for="(route, index) in records">
								<template v-if="route.photographic_files.length > 0" v-for="(file, i_file) in route.photographic_files">
									<div class="col-xs-6 col-sm-4 col-md-3 rwrapper">
										<div class="rlisting">
											<div class="col-sm-12 nopad" style="text-align: center;">
												<img :src="file.path_short" class="img-responsive img-thumbnail" style="max-height:300px;width:auto;">
											</div>
											<div class="col-sm-12 nopad">
												<h5></h5>
												<p>
												{{ file.name }}
												</p>
												<div class="rfooter">
													<a class="btn-sm btn-default" :href="file.path_short" target="_blank" download><i class="fa fa-download"></i></a>
													<a class="btn-xs btn-default pull-right" :href="file.path_short" target="_blank"><i class="fa fa-link"></i> </a>
												</div>
											</div>
										</div>
									</div>
								</template>
							</template>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</template>

<template id="create">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Crear</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<router-link tag="a" class="close-link" :to="{ name: 'list-reports', params: { route_id: $route.params.route_id, route_name: $route.params.route_name } }">
									<i class="fa fa-close"></i>
								</router-link>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					
					<form action="javascript:false" v-on:submit="validateForm" method="POST" class="x_content">
						<div class="row">
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
											Antes: <input v-model="record.type" type="radio" name="type" value="A" /> 
											Despues: <input v-model="record.type" type="radio" name="type" value="D" />
											Otro: <input v-model="record.type" type="radio" name="type" value="O" />
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
														Subir... <input type="file" id="file" ref="file" v-on:change="handleFileUpload()" accept="image/png, image/jpeg, image/gif" />
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

<template id="create-route">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Crear Lote</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<router-link tag="a" :to="{ name: 'list-routes' }" class="close-link">
									<i class="fa fa-close"></i>
								</router-link>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					
					<form action="javascript:false" v-on:submit="createReoute" method="POST" class="x_content">
						<div class="row">
							<template v-if="error.error == true">
								<div class="alert alert-danger alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
									<strong>Error: </strong> 
									{{ error.message }}
								</div>
							</template>
							
							<div class="col-md-6 col-xs-6">
								<br>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Nombre / Microruta <span class="required">*</span></label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input v-model="record.name" type="text" required="required" class="form-control">
									</div>
								</div>
							</div>
								
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success">Continuar</button>
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

var CreateRoute = Vue.extend({
	template: '#create-route',
	data(){
		return {
			id: 0,
			record: {
				"name": "",
			},
			error: {
				error: false,
				message: "",
			},
		};
	},
	mounted() {
		var self = this;
		window.scrollTo(0, 0);
		
	},
	methods: {
		createReoute(){
			var self = this;
			if(self.record.name.length > 3){
				api.post('/records/photographic_report_routes', self.record).then(function(f){
					console.log(f);
					if(f.status == 200 && f.data > 0){
						self.record.name = '';
						bootbox.confirm({
							title: "Éxito!",
							message: "El lote se creo correctamente, desea agregar otro?.",
							buttons: {
								cancel: {
									label: '<i class="fa fa-times"></i> NO'
								},
								confirm: {
									label: '<i class="fa fa-check"></i> SI'
								}
							},
							callback: function (result) {
								if(result !== true){
									self.$router.push({
										name:'list-routes'
									});
								}
							}
						});
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
		},
	}
});

var Create = Vue.extend({
	template: '#create',
	data(){
		return {
			enabledUpd: false,
			file: '',
			options: {
				photographic_periods: [],
				photographic_groups: [],
			},
			id: 0,
			record: {
				"route": this.$route.params.route_id,
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
	},
	computed: {
		returnFolderCURL(){
			var self = this;
			// var urlThis = 'https://micuenta.monteverdeltda.com/index.php?action=UploadFileReports';
			var urlThis = '/index.php?action=UploadFileReports';
			
			if(self.enabledUpd === true){
				route_name = self.$route.params.route_name;
				group_name = self.options.photographic_groups.find(x => x.id === self.record.group).name;
				period_name = self.options.photographic_periods.find(x => x.id === self.record.period).name;
				urlThis += '&year=' + self.record.year + '&route_name=' + encodeURI(btoa(route_name)) + '&group_name=' + encodeURI(btoa(group_name)) + '&period_name=' + encodeURI(btoa(period_name));
			}
			
			return urlThis;
				
		},
	},
	methods: {
		loadOptions(){
			var self = this;
			self.$root.loadAPI_List('photographic_periods', {}, function(e){
				self.options.photographic_periods = e;
			});
			self.$root.loadAPI_List('photographic_groups', {}, function(e){
				self.options.photographic_groups = e;
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
		submitFile(){
			var self = this;
			/* Initialize the form data */
			let formData = new FormData();
			/* Add the form data we need to submit */
			formData.append('file', self.file);
			/* Make the request to the POST /single-file URL */
			var urlThis = '/index.php?action=UploadFileReports';
			route_name = self.$route.params.route_name;
			group_name = self.options.photographic_groups.find(x => x.id === self.record.group).name;
			period_name = self.options.photographic_periods.find(x => x.id === self.record.period).name;
			
			urlThis += '&type=' + self.record.type + '&year=' + self.record.year + '&route_name=' + encodeURI(btoa(route_name)) + '&group_name=' + encodeURI(btoa(group_name)) + '&period_name=' + encodeURI(btoa(period_name));
			
			axios.post(urlThis, formData, {
				headers: { 
					'Content-Type': 'multipart/form-data'
				}
			}).then(function(e){
				$("#file").val('');
				self.record.media = 0;
				if(e.status == 200 && e.data.files.length > 0 && e.data.files[0].error === false){
					if(e.data.files[0].id !== undefined && e.data.files[0].id > 0){
						self.record.media = e.data.files[0].id;
						$("#file").val('');
						
						api.post('/records/photographic_report_reports', self.record).then(function(f){
							console.log(f);
							if(f.status == 200 && f.data > 0){
								bootbox.confirm({
									title: "Éxito! - #" + f.data,
									message: "La imagen se subio correctamente, desea agregar otra imagen?.",
									buttons: {
										cancel: {
											label: '<i class="fa fa-times"></i> Volver a los lotes'
										},
										confirm: {
											label: '<i class="fa fa-check"></i> Subir otra'
										}
									},
									callback: function (result) {
										if(result !== true){
											self.$router.push({
												name:'list-routes'
											});
										}
									}
								});
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
		},
		handleFileUpload(){
		  var self = this;
		  self.file = self.$refs.file.files[0];
		  self.submitFile();
		}
	}
});

var List_Routes = Vue.extend({
	template: '#list-routes',
	data(){
		return {
			loading: true,
			temp_filters: [],
			options: {
				filters: [],
			},
			records: [],
			total: 0,
			limit: 20,
			page: 1,
			search: {
				loading: false,
				text: '',				
			}
		};
	},
	mounted: function () {
		var self = this;
		self.loadFilters();
	},
	computed: {
	},
	methods: {
		loadFilters(){
			var self = this;
			self.load();
		},
		load(){
			var self = this;
			self.loading = true;
			self.records = [];
			self.total = 0;
			window.scrollTo(0, 0);
			
			api.get('/records/photographic_report_routes', {
				params: {
					order: "id",
					page: self.page + "," + self.limit
				}
			}).then(function (response) {
				console.log('response', response);
				if(response.data.records && response.data.records.length > 0){
					self.total = response.data.results;
					self.records = response.data.records;
				}
				self.loading = false;
			}).catch(function (error) {
				console.log('error list-routes::methods::load()');
				console.log(error.response);
				self.loading = false;
			});
		},
		searchText(){
			var self = this;
			if(self.search.text.length >= 2){
				if(self.search.loading == false){
					self.search.loading = true;
					self.records = [];
					api.get('/records/photographic_report_routes', {
						params: {
							filter: [
								'name,cs,' + self.search.text
							],
							order: "id",
							page: self.page + "," + self.limit
						}
					}).then(function (response) {
						self.search.loading = false;
						if(response.data.records && response.data.records.length > 0){
							self.total = response.data.results;
							self.records = response.data.records;
						}
					}).catch(function (error) {
						console.log('error list-routes::methods::load()');
						console.log(error.response);
						self.search.loading = false;
					});
				} else {
					alert("Espera a que se complete la busqueda anterior.");
					
				}
			} else {
				if(self.search.text.length >= 0 || self.search.text == "")
					self.load();
			}
		},
	}
});

var List_Reports = Vue.extend({
	template: '#list-reports',
	data(){
		return {
			loading: true,
			temp_filters: [],
			options: {
				filters: [],
			},
			records: [],
			total: 0,
			limit: 20,
			page: 1,
			search: {
				loading: false,
				text: '',				
			},
			"route_id": this.$route.params.route_id,
			"route_name": this.$route.params.route_name,
		};
	},
	created: function () {
	},
	mounted: function () {
		var self = this;
		self.loadFilters();
	},
	computed: {
	},
	methods: {
		loadFilters(){
			var self = this;
			self.load();
		},
		load(){
			var self = this;
			self.loading = true;
			self.records = [];
			self.total = 0;
			window.scrollTo(0, 0);
			
			api.get('/records/photographic_report_routes', {
				params: {
					filter: [
						'id,eq,' + self.route_id
					],
					join: [
						'photographic_files',
					],
					order: "id",
					page: self.page + "," + self.limit
				}
			}).then(function (response) {
				console.log('response', response);
				if(response.data.records && response.data.records.length > 0){
					self.total = response.data.results;
					self.records = response.data.records;
					
				}
				self.loading = false;
			}).catch(function (error) {
				console.log('error list-routes::methods::load()');
				console.log(error.response);
				self.loading = false;
			});
		},
		searchText(){
			var self = this;
			if(self.search.text.length >= 2){
				if(self.search.loading == false){
					self.search.loading = true;
					self.records = [];
					api.get('/records/photographic_report_routes', {
						params: {
							filter: [
								'name,cs,' + self.search.text
							],
							order: "id",
							page: self.page + "," + self.limit
						}
					}).then(function (response) {
						self.search.loading = false;
						if(response.data.records && response.data.records.length > 0){
							self.total = response.data.results;
							self.records = response.data.records;
						}
					}).catch(function (error) {
						console.log('error list-routes::methods::load()');
						console.log(error.response);
						self.search.loading = false;
					});
				} else {
					alert("Espera a que se complete la busqueda anterior.");
					
				}
			} else {
				if(self.search.text.length >= 0 || self.search.text == "")
					self.load();
			}
		},
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: List_Routes, name: 'list-routes' },
		{ path: '/:route_id-:route_name', component: List_Reports, name: 'list-reports' },
		{ path: '/:route_id-:route_name/create', component: Create, name: 'create-report' },
		{ path: '/create', component: CreateRoute, name: 'create-route' },
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