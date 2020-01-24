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

var List_Periods = Vue.extend({
	template: '#list-periods',
	data(){
		return {
			loading: true,
			temp_filters: [],
			options: {
				photographic_periods: [],
				filters: [],
			},
			next: {
				period: 0,
				year: moment().format('Y'),
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
		searchRoutes(){
			var self = this;
			if(self.next.year > 0 && self.next.period > 0){
				self.records = [];
				api.get('/records/photographic_reports', {
					params: {
						filter: [
							'year,eq,' + self.next.year,
							'period,eq,' + self.next.period,
							'status,eq,1'
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
		loadFilters(){
			var self = this;
			self.$root.loadAPI_List('photographic_periods', {}, function(e){
				self.options.photographic_periods = e;
			});
		},
		load(){
			var self = this;
			self.loading = true;
			self.records = [];
			self.total = 0;
			window.scrollTo(0, 0);
			
			api.get('/records/photographic_routes', {
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
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: List_Periods, name: 'list-periods' },
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