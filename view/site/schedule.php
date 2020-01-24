<style>
.sonar-wrapper .green {
	background-color: green !important;
}
.sonar-wrapper .orange {
	background-color: orange !important;
}
.sonar-wrapper .red {
	background-color: red !important;
}
.sonar-wrapper .sonar-emitter {
  position: relative;
  margin: 0 auto;
  width: 14px;
  height: 14px;
  border-radius: 9999px;
  background-color: #666;
}
.count {
	zoom: 0.7;
}
</style>

<div id="emvarias-lots">
	<div class="page-title">
		<div class="title_left">
			<h3><?= $title; ?> <small><?= $subtitle; ?></small></h3>
		</div>
		<div class="title_right">
		</div>
	</div>
	<div class="clearfix"></div>
	
	<div class="row">
		<router-view :key="$route.fullPath" ></router-view>
	</div>
</div>

<template id="list">
	<div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<!--//<p class="text-muted font-13 m-b-30">
						The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
					</p>-->
					<div class="row">
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract">Contrato<span class="required"></span></label>
								<div class="col-md-8 col-xs-12">
									<select id="contract" required="required" v-model="contract" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(option, i_option) in options.emvarias_contracts" :value="option.id">{{ option.name }}</option>
									</select>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="period">Periodo<span class="required"></span></label>
								<div class="col-md-8 col-xs-12">
									<select id="period" required="required" v-model="period" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(option, i_option) in options.photographic_periods" :value="option.id">{{ option.name }}</option>
									</select>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						
						<div class="col-md-2 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Año <span class="required"></span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="year" type="number" min="2019" id="year" required="required" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-2 col-xs-12">
							<button @click="load" type="button" class="btn btn-success pull-right">Continuar</button>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>

		<div class="row top_tiles">
		  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa fa-globe"></i></div>
			  <div class="count">{{ $root.formatMoney(total_m2, 2, ',', '.') }} m²</div>			  
			  <h3>Lote(s)</h3>
			  <p>El total de lotes es XXX.</p>
			</div>
		  </div>
		  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa fa-calendar"></i></div>
			  <div class="count">{{ $root.formatMoney(total_m2_schedule, 2, ',', '.') }} m²</div>
			  <h3>Programado(s)</h3>
			  <p>El total de lotes programados es XXX.</p>
			</div>
		  </div>
		  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa fa-thumbs-up"></i></div>
			  <div class="count">{{ $root.formatMoney(total_m2_executed, 2, ',', '.') }} m²</div>
			  <h3>Ejecutado(s)</h3>
			  <p>Lorem ipsum psdea itgum rixt.</p>
			</div>
		  </div>
		  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa fa-check-square-o"></i></div>
			  <div class="count">{{ $root.formatMoney(total_m2_approved, 2, ',', '.') }} m²</div>
			  <h3>Aprobado(s)</h3>
			  <p>Lorem ipsum psdea itgum rixt.</p>
			</div>
		  </div>
		</div>

		<div class="row">
		  <div class="col-md-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>Transaction Summary <small>Weekly progress</small></h2>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
				<div class="col-md-9 col-sm-12 col-xs-12">
				  <div class="demo-container" style="height:280px">
					<div id="chart_plot_02" class="demo-placeholder"></div>
				  </div>
				  <div class="tiles">
					<div class="col-md-4 tile">
					  <span>Total Sessions</span>
					  <h2>231,809</h2>
					  <span class="sparkline11 graph" style="height: 160px;">
						   <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
					  </span>
					</div>
					<div class="col-md-4 tile">
					  <span>Total Revenue</span>
					  <h2>$231,809</h2>
					  <span class="sparkline22 graph" style="height: 160px;">
							<canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
					  </span>
					</div>
					<div class="col-md-4 tile">
					  <span>Total Sessions</span>
					  <h2>231,809</h2>
					  <span class="sparkline11 graph" style="height: 160px;">
							 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
					  </span>
					</div>
				  </div>

				</div>

				<div class="col-md-3 col-sm-12 col-xs-12">
				  <div>
					<div class="x_title">
					  <h2>Lotes</h2>
					  <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a>
							</li>
							<li><a href="#">Settings 2</a>
							</li>
						  </ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					  </ul>
					  <div class="clearfix"></div>
					</div>
					<ul class="list-unstyled top_profiles scroll-view" style="overflow: auto;">
					
					
					<li class="media event" v-for="(a,record_i) in records">
						<a class="pull-left border-aero profile_thumb">
							
						
							<template v-if="a.isSchedule === true">
								<i class="fa fa-calendar aero"></i>
							</template>
							<template v-else>
								<i class="fa fa-question aero"></i>
							</template>
						
							
						</a>
						<div class="media-body">
							<a class="title" href="#">{{ a.name }}</a>
							<p>
								<strong>{{ $root.formatMoney(a.lot.area_m2, 2, ',', '.') }} m² </strong>
								 -  
								<template v-if="a.isSchedule === true"> {{ a.schedule.date_executed_schedule }} </template>
							</p>
							<p> 
								
									<template v-if="a.isSchedule === true">
										<small>Evento programado el día {{ a.schedule.created }}</small>
									</template>
									<template v-else>
										<small>Evento programado no programado.</small>
									</template>
							</p>
						</div>
					</li>
					
					
					<!-- //
					  
					<tr v-for="(a,record_i) in records">
						<td>{{ a.id }}</td>						
						<td>{{ a.name }}</td>
						<td>
							<template v-if="a.schedule !== undefined && a.schedule.id > 0">
								{{ a.schedule.group.name }}
							</template>
						</td>
						<td>{{ $root.formatMoney(a.lot.area_m2, 2, ',', '.') }}</td>
						<td>
							<template v-if="a.schedule !== undefined && a.schedule.id > 0">
								{{ a.schedule.date_executed_schedule }}
							</template>
						</td>
						<td>
							<template v-if="a.isSchedule === true">
								<div class="sonar-wrapper" :title="'Programado el día [' + a.schedule.created + '] para el día [' + a.schedule.date_executed_schedule + ']'"><div class="sonar-emitter green"><div class="sonar-wave"></div></div></div>
							</template>
							<template v-else>
								<div class="sonar-wrapper"><div class="sonar-emitter"><div class="sonar-wave"></div></div></div>
							</template>
						</td>
						<td><div class="sonar-wrapper"><div class="sonar-emitter"><div class="sonar-wave"></div></div></div></td>
						<td><div class="sonar-wrapper"><div class="sonar-emitter"><div class="sonar-wave"></div></div></div></td>
					</tr>
					  
					  
					  -->
					  
					  
					  
					</ul>
				  </div>
				</div>

			  </div>
			</div>
		  </div>
		</div>

		<div class="row">
		  <div class="col-md-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>Weekly Summary <small>Activity shares</small></h2>
				<ul class="nav navbar-right panel_toolbox">
				  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				  </li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					<ul class="dropdown-menu" role="menu">
					  <li><a href="#">Settings 1</a>
					  </li>
					  <li><a href="#">Settings 2</a>
					  </li>
					</ul>
				  </li>
				  <li><a class="close-link"><i class="fa fa-close"></i></a>
				  </li>
				</ul>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">

				<div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
				  <div class="col-md-7" style="overflow:hidden;">
					<span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
								  <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
							  </span>
					<h4 style="margin:18px">Weekly sales progress</h4>
				  </div>

				  <div class="col-md-5">
					<div class="row" style="text-align: center;">
					  <div class="col-md-4">
						<canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
						<h4 style="margin:0">Bounce Rates</h4>
					  </div>
					  <div class="col-md-4">
						<canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
						<h4 style="margin:0">New Traffic</h4>
					  </div>
					  <div class="col-md-4">
						<canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
						<h4 style="margin:0">Device Share</h4>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<div class="row">
		  <div class="col-md-4">
			<div class="x_panel">
			  <div class="x_title">
				<h2>Programado(s) <small>Todo</small></h2>
				<ul class="nav navbar-right panel_toolbox">
				  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				  </li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					<ul class="dropdown-menu" role="menu">
					  <li><a href="#">Settings 1</a>
					  </li>
					  <li><a href="#">Settings 2</a>
					  </li>
					</ul>
				  </li>
				  <li><a class="close-link"><i class="fa fa-close"></i></a>
				  </li>
				</ul>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
				<article class="media event" v-for="(a,record_i) in records" v-if="a.isSchedule === true">
				  <a class="pull-left date">
					<p class="month">April</p>
					<p class="day">23</p>
				  </a>
				  <div class="media-body">
					<a class="title" href="#">{{ a.name }}</a>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				  </div>
				</article>
				
					
					
			  </div>
			</div>
		  </div>

		  <div class="col-md-4">
			<div class="x_panel">
			  <div class="x_title">
				<h2>Ejecutado(s) <small>Todo</small></h2>
				<ul class="nav navbar-right panel_toolbox">
				  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				  </li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					<ul class="dropdown-menu" role="menu">
					  <li><a href="#">Settings 1</a>
					  </li>
					  <li><a href="#">Settings 2</a>
					  </li>
					</ul>
				  </li>
				  <li><a class="close-link"><i class="fa fa-close"></i></a>
				  </li>
				</ul>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
				<article class="media event">
				  <a class="pull-left date">
					<p class="month">April</p>
					<p class="day">23</p>
				  </a>
				  <div class="media-body">
					<a class="title" href="#">Item One Title</a>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				  </div>
				</article>
			  </div>
			</div>
		  </div>

		  <div class="col-md-4">
			<div class="x_panel">
			  <div class="x_title">
				<h2>Aprobado(s) <small>Todo</small></h2>
				<ul class="nav navbar-right panel_toolbox">
				  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				  </li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					<ul class="dropdown-menu" role="menu">
					  <li><a href="#">Settings 1</a>
					  </li>
					  <li><a href="#">Settings 2</a>
					  </li>
					</ul>
				  </li>
				  <li><a class="close-link"><i class="fa fa-close"></i></a>
				  </li>
				</ul>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
				<article class="media event">
				  <a class="pull-left date">
					<p class="month">April</p>
					<p class="day">23</p>
				  </a>
				  <div class="media-body">
					<a class="title" href="#">Item One Title</a>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				  </div>
				</article>
			  </div>
			</div>
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

var List = Vue.extend({
	template: '#list',
	data(){
		return {
			options: {
				emvarias_contracts: [],
				photographic_periods: [],
			},
			total_m2: 0,
			total_m2_schedule: 0,
			total_m2_executed: 0,
			total_m2_approved: 0,
			total: 0,
			period: 0,
			contract: 0,
			"year": moment().format('Y'),
			records: [],
			dataTable: null,
		};
	},
	created: function () {
	},
	computed: {
		contractName(){
			var self = this;
			try{
				return self.options.emvarias_contracts.find(x => x.id === self.contract).name;
			} catch(e){
				return "";
			}
		},
		periodName(){
			var self = this;
			try{
				return self.options.photographic_periods.find(x => x.id === self.period).name;
			} catch(e){
				return "";
			}
		},
	},
	mounted: function () {
		var self = this;
		self.listOptions();

		
		//self.load();
	},
	methods: {
		listOptions(){
			var self = this;
			self.$root.loadAPI_List('photographic_periods', {}, function(e){
				self.options.photographic_periods = e;
			});
			self.$root.loadAPI_List('emvarias_contracts', {}, function(e){
				self.options.emvarias_contracts = e;
			});
		},
		isSchedule(item){
			var self = this;
			result = false;
			try {
				if(item.emvarias_schedule.length > 0){
					isSchedule = item.emvarias_schedule.find(x => (x.period.id == self.period && x.year == self.year) );
					if(isSchedule !==undefined && isSchedule.id > 0){
						result = true;
					} else {
						result = false;
					}
				} else {
					result = false;
				}
				return result;
			} catch(e){
				result = false;
				return false;
			}
			//
		},
		load(){
			var self = this;
			self.loading = true;
			self.records = [];
			self.total = 0;
			window.scrollTo(0, 0);
			if(self.period <= 0 || self.year <= 0){ return false; }
			var dialog = bootbox.dialog({
				message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
				closeButton: false
			});
			
			api.get('/records/emvarias_microroutes', { params: {
				filter: [
					'contract,eq,' + self.contract,
				],
				join: [
					'emvarias_lots',
					'emvarias_schedule,emvarias_contracts',
					'emvarias_schedule,photographic_periods',
					'emvarias_schedule,photographic_groups',
				],
			} }).then(function (a) {
				if(a.status === 200){
					self.total = a.data.records.length;
					a.data.records.forEach(function(b){
						b.isSchedule = self.isSchedule(b);
						self.total_m2 += b.lot.area_m2;
						self.records.push(b);
						if(b.isSchedule == true){
							// console.log(b.isSchedule);
							self.total_m2_schedule += b.lot.area_m2;
							b.schedule = b.emvarias_schedule.find(x => (x.period.id == self.period && x.year == self.year) );
						}
					});;
					
					// do something in the background
					dialog.modal('hide');
					// console.log('Normal: ', a.data.records);
				} else {
					alert("Ocurrio un error cargando la lista.");
					console.log(a);
				}
			}).catch(function (error) {
				console.error(error);
				console.log(error.response);
				self.loading = false;
			});
			
			
		},
		tableStyle() {
			var self = this;
			//self.dataTable.data.reload();
			
		
		},
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: List, name: 'Home' },
	]
});


app = new Vue({
	router: router,
	data: function () {
		return {};
	},
	methods: {
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
		formatMoney(number, decPlaces, decSep, thouSep) {
			var self = this;
			decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
			decSep = typeof decSep === "undefined" ? "." : decSep;
			thouSep = typeof thouSep === "undefined" ? "," : thouSep;
			var sign = number < 0 ? "-" : "";
			var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
			var j = (j = i.length) > 3 ? j % 3 : 0;
			return sign + (j ? i.substr(0, j) + thouSep : "") + (i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + (thouSep))) + (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
		},
	}
}).$mount('#emvarias-lots');
</script>