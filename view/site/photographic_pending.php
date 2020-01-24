<!-- // <script src="https://api.mapbox.com/mapbox-gl-js/v1.6.1/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.6.1/mapbox-gl.css" rel="stylesheet" /> -->
<!-- // <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.css" /> -->
<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.js"></script> -->
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
			<div class="title">
				<h3>Contrato CW72436 - <?= isset($title) ? $title : ""; ?> <small> <?= isset($subtitle) ? $subtitle : ""; ?></small></h3>
			</div>
		</div>
		<div class="container">
			<router-view :key="$route.fullPath" ></router-view>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<template id="list-pending">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>
							<?= isset($title) ? $title : ""; ?>  
							<!-- // <router-link  :to="{ name: 'list-reports', params: { route_id: route.id, route_name: route.name } }"> --
								{{ route.id }} - 
							<!-- // </router-link> --> <small></small>
						</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-xs-12">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>ID. Reporte</th>
												<th>Microruta</th>
												<th>Área</th>
												<th>Cuadrilla/Grupo</th>
												<th>Observaciones</th>
												<th>F. Reporte</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="(record, record_i) in records">
												<td>{{ record.id }}</td>
												<td>{{ record.route.name }}</td>
												<td>{{ record.route.area_m2 }}</td>
												<td>{{ record.group.name }}</td>
												<td>{{ record.route.obs }}</td>
												<td>{{ record.created }}</td>
												<td><a @click="selected = record;loadGeometry" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-camera-retro"></i></a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="clearfix"></div>
								<div class="col-xs-12 col-sm-12">
									<ul class="nav navbar-right panel_toolbox">
										<li>
											Viendo: {{ page }} / {{ parseInt(total/limit) }}
											- 
											{{ (page * limit) }} / Total: {{ total }}
											 | 
											Limite x Página: {{ limit }}
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 text-center">
									<ul class="pagination pagination-split pull-right">
										<li :class="(page == 1) ? 'active' : ''"><a @click="page=1;load();"> Inicio </a></li>
										<template v-if="total > (limit*3) && parseInt(total/limit) > 1" v-for="npage in parseInt(total/limit)"><li :class="(npage == page) ? 'active' : ''" v-if="npage > 1 && npage < parseInt(total/limit)"><a @click="page=npage;load();"> {{npage}} </a></li></template>
										<li v-if="total > (limit+1)" :class="(page == parseInt(total/limit)) ? 'active' : ''"><a @click="page=parseInt(total/limit);load();"> Fín </a></li>
										<!-- // 
										--->
									</ul>
								</div>
								<div class="clearfix"></div>
						</div>
						<!-- //
						<div class="row">
							<div class="col-xs-4" v-for="(record, record_i) in records">
								<div class="thumbnail">
									<div class="image view view-first">
										<img class="img-responsive" :src="record.media.path_short" alt="image" style="height: auto;width: calc(85vw);" />
										<div class="mask">
											<p>ID: {{ record.id }}</p>
											<div class="tools tools-bottom">
												<a @click="selected = record;loadGeometry" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-info-circle"></i></a>
											</div>
										</div>
									</div>
									<div class="caption">
										<p>
											<span title="Microruta">{{ record.route.name }}</span>
											<br /><span title="Lote"><b>{{ record.route.lot.name }}</b></span>
											- <span title="Lote"><b>{{ record.created }}</b></span>
										</p>
									</div>
								</div>
							</div>
						</div>
						-->
						
						  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-lg">
							  <div class="modal-content">

								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
								  </button>
								  <h4 class="modal-title" id="myModalLabel2">Contrato CW72436 - Informe Registro Fotografico</h4>
								</div>
								<div class="modal-body">
									<h4></h4>
									<div class="table-responsive">
										<table class="table table-bordered">
											<tr>
												<th width="25%">Año</th>
												<td width="25%">{{ selected.year }}</td>
												<th width="25%">Periodo</th>
												<td width="25%">{{ selected.period.name }}</td>
											</tr>
											<tr>
												<th>Fecha y Hora del Reporte</th>
												<td colspan="3">{{ selected.created }}</td>
											</tr>
											<tr>
												<th>Microruta</th>
												<td>{{ selected.route.name }}</td>
												<th>Área</th>
												<td>{{ selected.route.area_m2 }}</td>
											</tr>
											<tr>
												<th>Direccion del Lote</th>
												<td colspan="3">{{ selected.route.address_text }}</td>
											</tr>
											<tr>
												<th>Descripción</th>
												<td colspan="3">
													<template v-if="selected.route.description !== null && selected.route.description !== ''">
														{{ selected.route.description }}
													</template>
													<template v-else>
														Sin descripción.
													</template>
												</td>
											</tr>
											<tr>
												<th>Observaciones</th>
												<td colspan="3">
													<template v-if="selected.route.obs !== null && selected.route.obs !== ''">
														{{ selected.route.obs }}
													</template>
													<template v-else>
														Sin observaciones.
													</template>
												</td>
											</tr>
											<tr>
											</tr>
											<tr>
												<th>Cuadrilla/Grupo</th>
												<td>{{ selected.group.name }}</td>
												<th>Reportado por</th>
												<td>{{ selected.created_by.username }}</td>
											</tr>
											<tr>
												<th colspan="2">Tipo de Foto</th>
												<td colspan="2">{{ (selected.type == 'A') ? 'Antes' : (selected.type == 'D') ? 'Despues' : 'Desconocido' }}</td>
											</tr>
											<tr>
												<td colspan="4">
													<img class="img-responsive" style="width: 100%; display: block;" :src="selected.media.path_short" alt="image" />
												</td>
											</tr>
											<tr>
												<td colspan="4">
													<div id="map"></div>
												</td>
											</tr>
											<tr>
												<td colspan="4">
													<a class="btn btn-default pull-right" :href="selected.media.path_short" target="_blank"><i class="fa fa-search-plus"></i></a>
													<a class="btn btn-default pull-right" :href="selected.media.path_short" download><i class="fa fa-download" ></i></a>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="modal-footer">
								  <button @click="declineReport" type="button" class="btn btn-danger pull-left">Rechazar</button>
								  <button @click="aprobeReport" type="button" class="btn btn-primary pull-left">Aprobar</button>
								  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								</div>

							  </div>
							</div>
						  </div>
						  <!-- /modals -->
						
						<!-- // 
						<table class="table">
							<thead>
								<tr>
									<th>Periodo</th>
									<th width="20%">Antes/Despues/Ambas</th>
									<th width="20%">Cuadrilla/Grupo</th>
									<th width="15%">Total</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						-->
					</div>
				</div>
				
			</div>
		</div>
		<div class="clearfix"></div>
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

var List_Pending = Vue.extend({
	template: '#list-pending',
	data(){
		return {
			intervalid1: null,
			loading: true,
			temp_filters: [],
			options: {
				photographic_periods: [],
				filters: [],
			},
			records: [],
			selected: {
				"id": 0,
				"route": {
					"id": 0,
					"name": "",
					"lot": {
						"id": 0,
						"name": "",
						"address": {
							"id": 0,
							"department": 0,
							"city": 0,
							"via_principal": 0,
							"via_principal_number": "",
							"via_principal_letter": "",
							"via_principal_quadrant": "",
							"via_secondary_number": "",
							"via_secondary_letter": "",
							"via_secondary_quadrant": "",
							"via_end_number": "",
							"via_end_extra": "",
							"minsize": "",
							"complete": "",
							"point": null
						},
						"geometry": ""
					}
				},
				"year": 0,
				"type": "",
				"group": {
					"id": 0,
					"name": ""
				},
				"period": {
					"id": 0,
					"name": ""
				},
				"media": {
					"id": 0,
					"name": "",
					"type": "",
					"size": "0",
					"path_full": "",
					"path_short": "",
					"create_by": 0,
					"created": "",
					"updated": ""
				},
				"status": 0,
				"created": "1950-01-01 00:00:01",
				"created_by": {
					"id": 0,
					"username": "",
					"password": "",
					"identification_type": 0,
					"identification_number": "",
					"names": "",
					"surname": "",
					"phone": "",
					"mobile": "",
					"address": "",
					"department": 0,
					"city": 0,
					"email": "",
					"avatar": 0,
					"permissions": 0,
					"bulletin": 0,
					"marketing": 0,
					"analytic": 0,
					"registered": "1950-01-01 00:00:01",
					"updated": "1950-01-01 00:00:01",
					"last_connection": "1950-01-01 00:00:01"
				}
			},
			total: 0,
			limit: 25,
			page: 1,
			search: {
				loading: false,
				text: '',				
			},
			"route_id": this.$route.params.route_id,
			"route_name": this.$route.params.route_name,
			map: null,
			drone: {
				"type": "Feature", 
				'properties': {
					'description': "Mi posicion",
					'icon': 'rocket'
				},
				"geometry": {
					"type": "Point", 
					"coordinates": [],
				}, 
			}
		};
	},
	created: function () {
	},
	mounted: function () {
		var self = this;
		document.cookie = 'SameSite=None; Secure';
		self.load();
		self.intervalid1 = setInterval(function(){
			self.load();
		}, 300000);
	},
	computed: {
		loadGeometry(){
			var self = this;
			if(self.selected.id > 0 && self.selected.route.lot.id){
							 
				
				api.get('/geojson/lots/' + self.selected.route.lot.id, {params: {}}).then(function (response) {
					console.log('response loadGeometry', response.data);
					if(response.status !== 200) { return false; };
					
					api.get('/geojson/photographic_reports/' + self.selected.id, {
						params: {
						}
					}).then(function (responseGEO) {
						if(responseGEO.status == 200){
							console.log('responseGEO.geometry.coordinates', responseGEO);
							self.drone = responseGEO.data;
					
						}
					}).catch(function (error) {
						console.log('error list-routes::methods::load()');
						console.log(error.response);
						console.error(error);
						self.search.loading = false;
					});
				}).catch(function (error) {
					console.log('error list-routes::methods::load()');
					console.log(error.response);
					console.error(error);
					self.loading = false;
				});
			}
		}
	},
	methods: {
		aprobeReport(){
			var self = this;
			
			bootbox.confirm({
				message: "Debes confirmar antes de continuar.",
				locale: 'es',
				buttons: {
					confirm: {
						label: 'Aprobar',
						className: 'btn-success'
					},
					cancel: {
						label: 'Cancelar',
						className: 'btn-default'
					}
				},
				callback: function (result) {
					if(result === true){
						api.put('/records/photographic_reports/' + self.selected.id, {
							id: self.selected.id,
							status: 1,
							updated_by: <?= $this->user->id; ?>,
						}).then(function (response) {
							if(response.status == 200){
								self.load();
								$('.bs-example-modal-sm').modal('hide')
							}
						}).catch(function (error) {
							console.log('error list-routes::methods::load()');
							console.log(error.response);
							self.search.loading = false;
						});
					}
					console.log('This was logged in the callback: ' + result);
				}
			});
		},
		declineReport(){
			var self = this;
			
			bootbox.confirm({
				message: "Debes confirmar antes de continuar.",
				locale: 'es',
				buttons: {
					confirm: {
						label: 'Rechazar',
						className: 'btn-danger'
					},
					cancel: {
						label: 'Cancelar',
						className: 'btn-default'
					}
				},
				callback: function (result) {
					if(result === true){
						api.put('/records/photographic_reports/' + self.selected.id, {
							id: self.selected.id,
							status: 2,
							updated_by: <?= $this->user->id; ?>,
						}).then(function (response) {
							if(response.status == 200){
								bootbox.confirm({
									message: "Deseas enviar una notificacion del rechazo?.",
									locale: 'es',
									buttons: {
										confirm: {
											label: 'Enviar',
											className: 'btn-success'
										},
										cancel: {
											label: 'Cerrar',
											className: 'btn-default'
										}
									},
									callback: function (result) {
										if(result === true){
											// urlWA = 'https://wa.me/57' + self.selected.created_by.mobile + '?text=Se%20ha%20rechazado%20una%20FOTO' + '.%0AIngresa%20a%20https%3A%2F%2Fmicuenta.monteverdeltda.com%20para%20gestionarla.' + '%20https%3A%2F%2Fmicuenta.monteverdeltda.com' + encodeURI(self.selected.media.path_short);
											urlWA = 'https://wa.me/57' + self.selected.created_by.mobile + '?text=Se%20ha%20rechazado%20una%20FOTO' + '.%0AIngresa%20a%20https%3A%2F%2Fmicuenta.monteverdeltda.com%20para%20gestionarla.';
											window.open(urlWA,'popUpWindow','height=500,width=600,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');
										}
									}
								});
								self.load();
								$('.bs-example-modal-sm').modal('hide')
							}
						}).catch(function (error) {
							console.log('error list-routes::methods::load()');
							console.log(error.response);
							self.search.loading = false;
						});
					}
					console.log('This was logged in the callback: ' + result);
				}
			});
		},
		searchRoutes(){
			var self = this;
			if(self.next.year > 0 && self.next.period > 0){
				self.records = [];
				api.get('/records/photographic_reports', {
					params: {
						filter: [
							'year,eq,' + self.next.year,
							'period,eq,' + self.next.period
						],
						join: [
							'photographic_periods',
							'photographic_routes',
							'photographic_groups',
							'photographic_files',
						],
					}
				}).then(function (response) {
					//console.log(response);
					
					if(response.status == 200){
						console.log(response.data.records)
						// self.records = response.data.records;
						response.data.records.forEach(function(a){							
							if(!(self.records.find(x => x.id === a.route.id))){
								insrt = {
									id: a.route.id,
									name: a.route.name,
									period: a.period,
									groups: [],
								};
								group = {
									id: a.group.id,
									name: a.group.name,
									pictures: {"A": [], "D": [] },
								};
								group.pictures[a.type].push(a.media)
								insrt.groups.push(group);
								self.records.push(insrt);
							} else {
								i_i = self.records.findIndex(x => x.id === a.route.id);
								console.log(i_i);
								if(!(self.records[i_i].groups.find(x => x.id === a.group.id))){
									group = {
										id: a.group.id,
										name: a.group.name,
										pictures: {"A": [], "D": [] },
									};
									group.pictures[a.type].push(a.media)
									self.records[i_i].groups.push(group);
								} else {
									i_g = self.records[i_i].groups.findIndex(x => x.id === a.group.id);
									console.log(i_g);
									self.records[i_i].groups[i_g].pictures[a.type].push(a.media);
								}
							}
						});
					}
				}).catch(function (error) {
					console.log('error list-routes::methods::load()');
					console.log(error.response);
					self.search.loading = false;
				});
			} else {
				console.log("Completa los campos para cargar los Lotes/Microrutas disponibles.");
				return [];
			}
		},
		load(){
			var self = this;
			self.loading = true;
			self.records = [];
			self.total = 0;
			window.scrollTo(0, 0);
			
			api.get('/records/photographic_reports', {
				params: {
					filter: [
						'status,eq,0'
					],
					join: [
						'photographic_routes',
						'photographic_routes,lots',
						'photographic_routes,lots,addresses',
						'photographic_groups',
						'photographic_periods',
						'photographic_files',
						'users',
					],
					order: "id",
					page: self.page + "," + self.limit
				}
			}).then(function (response) {
				console.log('response load', response);
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
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: List_Pending, name: 'list-pending' },
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