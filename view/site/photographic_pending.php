<script src="https://api.mapbox.com/mapbox-gl-js/v1.6.1/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.6.1/mapbox-gl.css" rel="stylesheet" />
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

<template id="list-periods">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Periodo <small></small></h2>
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
						</ul>
						<div class="clearfix"></div>
					</div>
					<form action="javascript: false;" method="POST" v-on:submit="searchRoutes">
						<div class="x_content">
							<div class="col-md-6 col-xs-6">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Año <span class="required">*</span></label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input v-model="next.year" type="number" min="2019" id="year" required="required" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xs-6">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="period">Periodo<span class="required">*</span></label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select size="1" id="period" required="required" v-model="next.period" class="form-control">
											<option value="0">Seleccione una opcion</option>
											<option v-for="(option, i_option) in options.photographic_periods" :value="option.id">{{ option.name }}</option>
										</select>
									</div>
								</div><div class="clearfix"></div>
							</div>
							<div class="x_footer">
								<div class="col-xs-12 pull-right">
									<div class="input-group-btn">
										<button class="btn btn-primary" type="submit">
										<span class="glyphicon glyphicon-search"></span>
										</button>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</form>
				</div>
				
				<template v-for="(route, index) in records">
					<div class="x_panel">
						<div class="x_title">
							<h2>
								<?= isset($title) ? $title : ""; ?>  {{ route.period.name }} {{ next.year }} - {{ route.name }}
								<!-- // <router-link  :to="{ name: 'list-reports', params: { route_id: route.id, route_name: route.name } }"> --
									{{ route.id }} - 
								<!-- // </router-link> --> <small></small>
							</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
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
									<template v-for="(group, group_i) in route.groups">
										<tr>
											<td>{{ route.period.name }} {{ next.year }}</td>
											<td>Antes</td>
											<td>{{ group.name }}</td>
											<td>{{ group.pictures['A'].length }}</td>
										</tr>
										<tr>
											<td>{{ route.period.name }} {{ next.year }}</td>
											<td>Despues</td>
											<td>{{ group.name }}</td>
											<td>{{ group.pictures['D'].length }}</td>
										</tr>
										<tr>
											<td>{{ route.period.name }} {{ next.year }}</td>
											<td>Ambas</td>
											<td>{{ group.name }}</td>
											<td>{{ (group.pictures['A'].length >= 0 && group.pictures['D'].length >= 0) ? (group.pictures['A'].length + group.pictures['D'].length) : 0 }}</td>
										</tr>
										<tr>
											<td> --- </td>
											<td> --- </td>
											<td> --- </td>
											<td> --- </td>
										</tr>
									</template>
								</tbody>
							</table>
						</div>
					</div>
					<div class="x_panel">
						
						<div class="x_content" v-for="(group, group_i) in route.groups">
							<div class="x_title">
								<h2>{{ group.id }} - {{ group.name }} - <?= isset($title) ? $title : ""; ?>  {{ route.period.name }} - {{ route.name }}<small></small></h2>
								<div class="clearfix"></div>
							</div>
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
									<tr>
										<td>{{ route.period.name }} {{ next.year }}</td>
										<td>Antes</td>
										<td>{{ group.name }}</td>
										<td>{{ group.pictures['A'].length }}</td>
									</tr>
									<tr>
										<td>{{ route.period.name }} {{ next.year }}</td>
										<td>Despues</td>
										<td>{{ group.name }}</td>
										<td>{{ group.pictures['D'].length }}</td>
									</tr>
									<tr>
										<td>{{ route.period.name }} {{ next.year }}</td>
										<td>Ambas</td>
										<td>{{ group.name }}</td>
										<td>{{ (group.pictures['A'].length >= 0 && group.pictures['D'].length >= 0) ? (group.pictures['A'].length + group.pictures['D'].length) : 0 }}</td>
									</tr>
								</tbody>
							</table>
							
							<div class="row">
								<div class="col-xs-6">
									<div class="x_title">
										<h2>Antes: <small></small></h2>
										<div class="clearfix"></div>
									</div>
									<div class="row">
										<div class="col-md-55" v-for="(media, media_i) in group.pictures['A']">
											<div class="thumbnail">
												<div class="image view view-first">
													<img style="width: 100%; display: block;" :src="media.path_short" alt="image" />
													<div class="mask">
														<p>ID: {{ media.id }}</p>
														<div class="tools tools-bottom">
															<a href="#"><i class="fa fa-link"></i></a>
															<a href="#"><i class="fa fa-pencil"></i></a>
															<a href="#"><i class="fa fa-times"></i></a>
														</div>
													</div>
												</div>
												<div class="caption">
													<p>{{ media.name }}</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="x_title">
										<h2>Despues: <small></small></h2>
										<div class="clearfix"></div>
									</div>
									<div class="row">
										<div class="col-md-55" v-for="(media, media_i) in group.pictures['D']">
											<div class="thumbnail">
												<div class="image view view-first">
													<img style="width: 100%; display: block;" :src="media.path_short" alt="image" />
													<div class="mask">
														<p>ID: {{ media.id }}</p>
														<div class="tools tools-bottom">
															<a href="#"><i class="fa fa-link"></i></a>
															<a href="#"><i class="fa fa-pencil"></i></a>
															<a href="#"><i class="fa fa-times"></i></a>
														</div>
													</div>
												</div>
												<div class="caption">
													<p>{{ media.name }}</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</template>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</template>

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
							<div class="col-md-55" v-for="(record, record_i) in records">
								<div class="thumbnail">
									<div class="image view view-first">
										<img style="width: 100%; display: block;" :src="record.media.path_short" alt="image" />
										<div class="mask">
											<p>ID: {{ record.id }}</p>
											<div class="tools tools-bottom">
												<a href="#"><i class="fa fa-link"></i></a>
												<a href="#"><i class="fa fa-pencil"></i></a>
												<a href="#"><i class="fa fa-times"></i></a>
												<a @click="selected = record" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-info-circle"></i></a>
											</div>
										</div>
									</div>
									<div class="caption">
										<p>{{ record }}</p>
									</div>
								</div>
							</div>
						</div>
						
						  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-md">
							  <div class="modal-content">

								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
								  </button>
								  <h4 class="modal-title" id="myModalLabel2">Información del Reporte</h4>
								</div>
								<div class="modal-body">
									<h4></h4>
									<table class="table bordered">
										<tr>
											<th>Microruta</th>
											<td>{{ selected.route.name }}</td>
											<th>Nombre del Lote</th>
											<td>{{ selected.route.lot.name }}</td>
										</tr>
										<tr>
											<th>Direccion del Lote</th>
											<td>{{ selected.route.lot.address.minsize }}</td>
											<th>Ubicacion</th>
											<td>{{ selected.route.lot.geometry }}</td>
										</tr>
										<tr>
											<th>Periodo</th>
											<td>{{ selected.period.name }}</td>
											<th>Año</th>
											<td>{{ selected.year }}</td>
										</tr>
										<tr>
											<th>Cuadrilla/Grupo</th>
											<td>{{ selected.group.name }}</td>
											<th>Reportado por</th>
											<td>{{ selected.created_by.username }}</td>
										</tr>
										<tr>
											<th>Tipo de Foto</th>
											<td>{{ (selected.type == 'A') ? 'Antes' : (selected.type == 'B') ? 'B' : 'Desconocido' }}</td>
											<th>Fecha y Hora</th>
											<td>{{ selected.created }}</td>
										</tr>
										<tr>
											<td colspan="4">
												<img class="img-responsive" style="width: 100%; display: block;" :src="selected.media.path_short" alt="image" />
											</td>
										</tr>
										<tr>
											<td>
											</td>
											<td>
											</td>
											<td>
											</td>
											<td>
												<a class="btn btn-default pull-right" :href="selected.media.path_short" target="_blank"><i class="fa fa-search-plus"></i></a>
												<a class="btn btn-default pull-right" :href="selected.media.path_short" download><i class="fa fa-download" ></i></a>
											</td>
										</tr>
									</table>
									<p>
										<div style="width:100%; height:500px" id="map"></div>
									{{ loadGeometry }}
									</p>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								  <button type="button" class="btn btn-danger">Rechazar</button>
								  <button type="button" class="btn btn-primary">Aprobar</button>
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
			limit: 20,
			page: 1,
			search: {
				loading: false,
				text: '',				
			},
			"route_id": this.$route.params.route_id,
			"route_name": this.$route.params.route_name,
			map: null,
		};
	},
	created: function () {
	},
	mounted: function () {
		var self = this;
		document.cookie = 'SameSite=None; Secure';
		self.load();
		
	},
	computed: {
		loadGeometry(){
			var self = this;
			if(self.selected.id > 0 && self.selected.route.lot.id){
				
				api.get('/geojson/lots/' + self.selected.route.lot.id, {params: {}}).then(function (response) {
					console.log('response loadGeometry', response.data);
					if(response.status !== 200) { return false; };
					
					mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmVzZ29tZXptb250ZXZlcmRlIiwiYSI6ImNrNWgxNTB3ODBkeXEzanMzZTZ2cHBmOXoifQ.NDnUq9Yf6CEwEFajzzA5Kw';
					var map = new mapboxgl.Map({
						container: 'map',
						style: 'mapbox://styles/mapbox/outdoors-v11',
						center: (response.data.geometry.coordinates[0][0] !== undefined) ? response.data.geometry.coordinates[0][0] : (response.data.geometry.coordinates[0] !== undefined && response.data.geometry.coordinates[1] !== undefined) ? [response.data.geometry.coordinates[0], response.data.geometry.coordinates[1]] : [4.570868, -74.2973328],
						zoom: 10
					});
					 
					map.on('load', function() {
						map.addSource('national-park', {
							'type': 'geojson',
							'data': response.data
						});
						 
						map.addLayer({
							'id': 'park-boundary',
							'type': 'fill',
							'source': 'national-park',
							'paint': {
							'fill-color': '#888888',
							'fill-opacity': 0.4
							},
							'filter': ['==', '$type', 'Polygon']
						});
						 
						map.addLayer({
							'id': 'park-volcanoes',
							'type': 'circle',
							'source': 'national-park',
							'paint': {
							'circle-radius': 6,
							'circle-color': '#B42222'
							},
							'filter': ['==', '$type', 'Point']
						});
					});
					
					
				}).catch(function (error) {
					console.log('error list-routes::methods::load()');
					console.log(error.response);
					self.loading = false;
				});
			}
		}
	},
	methods: {
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