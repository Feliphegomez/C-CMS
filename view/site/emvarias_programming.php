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
  width: 27px;
  height: 27px;
  border-radius: 9999px;
  background-color: #666;
}

</style>

<div id="emvarias-lots">
	<div class="page-title">
		<div class="title_left">
			<h3>EMVARIAS <small>Schedule</small></h3>
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
				<div class="x_title">
					<h2>Listado Completo <small>({{ total }})</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
				
				<div class="x_content">
					<p class="text-muted font-13 m-b-30">
						The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
					</p>
					<div class="row">
						<div class="col-xs-12">
							<br>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="period">Periodo<span class="required">*</span></label>
								<div class="col-md-8 col-xs-12">
									<select id="period" required="required" v-model="period" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(option, i_option) in options.photographic_periods" :value="option.id">{{ option.name }}</option>
									</select>
								</div>
							</div><div class="clearfix"></div>
						</div>
						
						<div class="col-xs-12">
							<br>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Año <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="year" type="number" min="2019" id="year" required="required" class="form-control">
								</div>
							</div>
							</div><div class="clearfix"></div>
						</div>
						<div class="col-xs-12">
							<button @click="load" type="button" class="btn btn-success pull-right">Continuar</button>
							
						</div>
					</div>
						
					<table id="datatable-buttons2" class="table table-striped table-bordered display nowrap" style="width:100%">
						<thead>
							<tr>
								<th>id</th>
								<th>Microruta</th>
								<th>Cuadrilla</th>
								<th>Lote REF</th>
								<th>Area m2</th>
								<th>Fecha Ejec.</th>
								<th>Programado</th>
								<th>Ejecutado</th>
								<th>Aprobado</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(a,record_i) in records">
								<td>{{ a.id }}</td>						
								<td>{{ a.microroute.name }}</td>
								<td>
									{{ a.group.name }}
								</td>
								<td>{{ a.microroute.lot.id_ref }}</td>
								<td>{{ $root.formatMoney(a.microroute.lot.area_m2, 0) }}</td>
								<td>
									{{ a.date_executed_schedule }}
								</td>
								<td>
									<div class="sonar-wrapper" :title="'Programado el día [' + a.created + '] para el día [' + a.date_executed_schedule + ']'"><div class="sonar-emitter green"><div class="sonar-wave"></div></div></div>
								</td>
								<td><div class="sonar-wrapper"><div class="sonar-emitter"><div class="sonar-wave"></div></div></div></td>
								<td><div class="sonar-wrapper"><div class="sonar-emitter"><div class="sonar-wave"></div></div></div></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th>{{ $root.formatMoney(total_m2) }}</th>
								<th>{{ $root.formatMoney(total_m2_schedule) }}</th>
								<th>Total Ejecutados</th>
								<th>Total Aprobado</th>
							</tr>
						</tfoot>
					</table>
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
				photographic_periods: [],
			},
			total_m2: 0,
			total_m2_schedule: 0,
			total: 0,
			period: 0,
			"year": moment().format('Y'),
			records: [],
			dataTable: null,
		};
	},
	created: function () {
	},
	computed: {
		periodName(){
			var self = this;
			try{
				return self.options.photographic_periods.find(x => x.id === self.period).name;
			} catch(e){
				return "";
			}
		}
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
			
			api.get('/records/emvarias_schedule', { params: {
				filter: [
					'period,eq,' + self.period,
					'year,eq,' + self.year,
				],
				join: [
					'photographic_periods',
					'photographic_groups',
					'users',
					'emvarias_microroutes,emvarias_lots',
				],
			} }).then(function (a) {
				if(a.status === 200){
					self.total = a.data.records.length;
					console.log('Normal: ', a.data.records);
					a.data.records.forEach(function(b){
						self.total_m2 += b.microroute.lot.area_m2;
						self.records.push(b);
						self.total_m2_schedule += b.microroute.lot.area_m2;
					});;
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
			
					/*
			
			api.get('/records/emvarias_microroutes', { params: {
				join: [
					'emvarias_lots',
					'emvarias_schedule,photographic_periods',
					'emvarias_schedule,photographic_groups',
				],
			} }).then(function (a) {
				if(a.data.records && a.data.records.length > 0 && a.status === 200){
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
			*/
			
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
			decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
			decSep = typeof decSep === "undefined" ? "." : decSep;
			thouSep = typeof thouSep === "undefined" ? "," : thouSep;
			var sign = number < 0 ? "-" : "";
			var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
			var j = (j = i.length) > 3 ? j % 3 : 0;
			return sign + (j ? i.substr(0, j) + thouSep : "") + i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) + (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
		},
	}
}).$mount('#emvarias-lots');
</script>