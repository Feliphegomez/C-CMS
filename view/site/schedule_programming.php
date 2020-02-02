<!-- // 
<style>
.demo-topbar{height:40px;line-height:40px;padding-left:1em;background:#eee;border-bottom:1px solid #ddd;font-family:Lucida Grande,Helvetica,Arial,Verdana,sans-serif!important;font-size:14px!important;color:#000!important}.demo-topbar .codepen-button{float:right;margin-top:7px;margin-right:7px}.codepen-button{-webkit-appearance:none;-moz-appearance:none;appearance:none;height:26px;line-height:26px;padding:0 6px;border:1px solid #ddd;background:#fff;border-radius:4px;font-family:Lucida Grande,Helvetica,Arial,Verdana,sans-serif!important;font-size:11px!important;color:#000!important;cursor:pointer}.codepen-button:after{content:"\02197";vertical-align:middle;margin:-50% 0 -50% 2px}
</style>-->
<!-- //
<link href='https://unpkg.com/fullcalendar@3.10.1/dist/fullcalendar.min.css' rel='stylesheet' />
<link href='https://unpkg.com/fullcalendar@3.10.1/dist/fullcalendar.print.css' rel='stylesheet' media='print' />-->
<link href='https://unpkg.com/fullcalendar-scheduler@1.10.0/dist/scheduler.min.css' rel='stylesheet' /> 
<!-- // <script src='https://unpkg.com/moment@2.24.0/min/moment.min.js'></script> -->
<!-- // <script src='https://unpkg.com/jquery@3.4.1/dist/jquery.min.js'></script> -->
<script src='https://unpkg.com/fullcalendar@3.10.1/dist/fullcalendar.min.js'></script>
<script src='https://unpkg.com/fullcalendar-scheduler@1.10.0/dist/scheduler.min.js'></script>
<!-- // <script src='https://fullcalendar.io/assets/demo-to-codepen.js'></script> -->

<style>
.modal {
	overflow: auto !important;
}
#calendar-schedule {
	/* max-width: 900px; */
	margin: 40px auto;
}
.fc-license-message {
	display: none;
}
.tile-stats .icon {
    right: 153px;
    top: 82px;
}
.tile-stats .icon i {
	font-size: 120px;
}
</style>

<div id="schedule-programming">
	<div class="page-title">
		<div class="title_left">
			<h3>Servicios Periodicos</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Programar <small>Consola básica</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a @click="submitFormSearch" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<!-- // 
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a></li>
								<li><a href="#">Settings 2</a></li>
							</ul>
						</li>
						-->
						<li><a ><i class="fa fa-refresh"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" v-on:submit="submitFormSearch" action="javascript:return false;">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Periodo</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select @change="submitFormSearch" v-model="form_search_create.period" class="select2_single form-control" tabindex="-1">
											<option value="0">Seleccione una opcion</option>
											<option v-for="(option, i_option) in options.photographic_periods" :value="option.id">{{ option.name }}</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Año <span class="required">*</span></label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input @change="submitFormSearch" v-model="form_search_create.year" id="birthday" class="date-picker form-control col-md-7 col-xs-12" min="2018" required="required" type="number">
									</div>
								</div>
								<div class="ln_solid"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a></li>
								<li><a href="#">Settings 2</a></li>
							</ul>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div id='calendar-schedule'></div>
				</div>
			</div>
		</div>
	</div>					
								
	<div id="CreateScheduleModal" class="modal fade">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
					<h4 id="modalTitle2" class="modal-title modal-info-title"></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							
							<div class="row">
								<div class="animated flipInY col-sm-offset-2 col-sm-8 col-xs-12">
									<div class="tile-stats">
										<div class="icon">
											<i class="fa fa-calendar"></i>
										</div>
										<div class="count">{{ form_search_create.date_executed_schedule }}</div>
										<h3>{{ groupName }}</h3>
										<p>
											{{ periodName }} {{ form_search_create.year }}.
										</p>
										<p>
											<b>Microruta: </b>
											<template v-if="microrouteData !== undefined && microrouteData.name !== undefined">
												{{ microrouteData.name }}
											</template>
											<template v-else>Seleccione la Microruta/Lote para ver más información.</template>
										</p>
										<p>
											<b>Contrato: </b>
											<template v-if="microrouteData !== undefined && microrouteData.contract !== undefined && microrouteData.contract.name !== undefined">
												{{ microrouteData.contract.name }}
											</template>
											<template v-else>Seleccione la Microruta/Lote para ver más información.</template>
										</p>
										<p>
											<b>Lote (Antigüo): </b>
											<template v-if="microrouteData !== undefined && microrouteData.lot !== undefined && microrouteData.lot.id_ref !== undefined">
												{{ microrouteData.lot.id_ref }}
											</template>
											<template v-else>Seleccione la Microruta/Lote para ver más información.</template>
										</p>
										<p>
											<b>Direccion(es): </b>
											<template v-if="microrouteData !== undefined && microrouteData.lot !== undefined && microrouteData.lot.address_text !== undefined">
												{{ microrouteData.lot.address_text }}
											</template>
											<template v-else>Seleccione la Microruta/Lote para ver más información.</template>
										</p>
										
										<p>
											<b>Área	m²: </b>
											<template v-if="microrouteData !== undefined && microrouteData.lot !== undefined && microrouteData.lot.address_text !== undefined">
												{{ microrouteData.lot.address_text }} m²
											</template>
											<template v-else>Seleccione la Microruta/Lote para ver más información.</template>
										</p>
										<p>
											<b>Descripción: </b>
											<template v-if="microrouteData !== undefined && microrouteData.lot !== undefined && microrouteData.lot.description !== undefined">
												{{ microrouteData.lot.description }}
											</template>
											<template v-else>Seleccione la Microruta/Lote para ver más información.</template>
										</p>
										<!-- // 
										<p>
											<button v-if="newScheduleComplete === true" class="btn btn-md btn-info pull-right" @click="newSchedule">
												Programar
											</button>
										</p>
										
										-->
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="table-responsive">
								<p class="datatable-buttons2-message"></p>
								<table class="table table-striped table-hover hover table-bordered datatable-buttons2">
								</table>
							</div>
						</div>
					</div>
				</div>
			
				<div id="modalBody" class="modal-body"> </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>		
	
</div>

<style>
.nav-microroutes {
  background-color: yellow; 
  list-style-type: none;
  text-align: center;
  margin: 0;
  padding: 0;
}

.nav-microroutes li {
  display: inline-block;
  font-size: 20px;
  padding: 20px;
}

table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
	    line-height: normal;
}
</style>

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

var app = new Vue({
	data: function () {
		return {
			records_org: [],
			records: [],
			options: {
				photographic_groups: [],
				photographic_periods: [],
				emvarias_microroutes: [],
				microroutes: [],
			},
			calendar: {
				colors: ["gray", "#bbe069", "#61adee", "#ff7777", "yellow", "#ffa62c", "#ae93df", "#cecece"],
				resources: []
			},
			form_search_create: {
				period: 0,
				year: moment().format('Y'),
				microroute: 0,
				group: 0,
				date_executed_schedule: '',
				created_by: <?= $this->user->id; ?>,
			},
		};
	},
	mounted(){
		var self = this;
		self.$root.loadAPI_List('emvarias_microroutes', {
			join: [
				'emvarias_lots',
				'emvarias_contracts'
			],
		}, function(e){
			self.options.emvarias_microroutes = e;
			
			self.loadOptions();
		});
		$('#CreateScheduleModal').on('show.bs.modal', function (e) {
			$('.modal .modal-dialog').attr('class', 'modal-lg modal-dialog  ' + 'zoomIn' + '  animated');
			$('.datatable-buttons2-message').html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> Cargando...');
			setTimeout(self.loadTableMicroroutes, 1000);
		})
		/*
		$('#CreateScheduleModal').on('hide.bs.modal', function (e) {
			$('.modal .modal-dialog').attr('class', 'modal-md modal-dialog  ' + 'zoomOut' + '  animated');
		})*/
	},
	computed: {
		groupName(){
			var self = this;
			try{
				return self.options.photographic_groups.find(x => x.id === self.form_search_create.group).name;
			} catch(e){
				return "Cuadrilla invalida o no seleccionada.";
			}
		},
		periodName(){
			var self = this;
			try{
				return self.options.photographic_periods.find(x => x.id === self.form_search_create.period).name;
			} catch(e){
				return "Periodo invalido o no seleccionado.";
			}
		},
		newScheduleComplete(){
			var self = this;
			try {
				if(
					self.form_search_create.period <= 0
					|| self.form_search_create.year <= 0
					|| self.form_search_create.group <= 0
					|| self.form_search_create.date_executed_schedule == ''
					|| self.form_search_create.microroute <= 0
				){
					return false;
				} else {
					return true;
				}
				
			} catch(e){
				console.error(e);
				return false;
			}
		},
		microrouteName(){
			var self = this;
			item = self.options.emvarias_microroutes.find(x => x.id === self.form_search_create.microroute);
			try{
				return item.name;
			} catch(e){
				return "Microruta/Lote invalid@ o no seleccionad@.";
			}
		},
		microrouteData(){
			var self = this;
			item = self.options.emvarias_microroutes.find(x => x.id === self.form_search_create.microroute);
			try{
				return item;
			} catch(e){
				return "Microruta/Lote invalid@ o no seleccionad@.";
			}
		},
		periodDateStart(){
			var self = this;
			try{
				period = self.options.photographic_periods.find(x => x.id == self.form_search_create.period);
				if(period.start_month === null || period.start_day === null){ throw new FormException('noDates', 'No hay fechas establecidas en la tabla de periodos'); }
				return (moment().format('Y') + '-' + ((String(period.start_month).length > 1) ? period.start_month : '0' + period.start_month) + '-' + ((String(period.start_day).length > 1) ? period.start_day : '0' + period.start_day));
			} catch(e){
				return "1950-01-01";
			}
		},
		periodDateEnd(){
			var self = this;
			try{
				period = self.options.photographic_periods.find(x => x.id === self.form_search_create.period);
				if(period.end_month === null || period.end_day === null){ throw new FormException('noDates', 'No hay fechas establecidas en la tabla de periodos'); }
				return (moment().format('Y') + '-' + ((String(period.end_month).length > 1) ? period.end_month : '0' + period.end_month) + '-' + ((String(period.end_day).length > 1) ? period.end_day : '0' + period.end_day));
			} catch(e){
				return "1950-01-02";
			}
		},
	},
	methods: {
		scheduleToEvent(scheduleData){
			var self = this;
			try {
				return {
					id: scheduleData.id,
					title: 'Z' + scheduleData.microroute.zone + 'CC' + self.$root.zfill(scheduleData.microroute.name, 4) + 'FM' + scheduleData.microroute.repeat,
					content: scheduleData.microroute.name,
					objectMV: scheduleData,
					microroute: scheduleData.microroute,
					period: scheduleData.period,
					group: scheduleData.group,
					resourceId: scheduleData.group.id,
					year: scheduleData.year,
					allDay: true,
					start: (scheduleData.date_executed_schedule),
					// end: (scheduleData.date_executed_schedule_end),
					end: moment(scheduleData.date_executed_schedule_end),
					date_executed_schedule: scheduleData.date_executed_schedule,
					date_executed_schedule_end: scheduleData.date_executed_schedule_end,
					created_by: scheduleData.created_by,
					stick: true
				};
			} catch(e){
				console.log(e);
			}
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
		loadTableMicroroutes(){
			var self = this;
			
			self.dataTable = $('.datatable-buttons2').DataTable({
				destroy: true,
				dom: "Blfrtip",
				buttons: [{ extend: "copy", className: "btn-sm btn-default" }, ],
				responsive: true,
				"processing": true,
				language: { "url": "/public/assets/build/js/lang-datatable.json" },
				data: self.options.emvarias_microroutes.map(a => [
					a.id,
					'Z' + a.zone + 'CC' + self.$root.zfill(a.name, 4) + 'FM' + a.repeat, 
					(a.lot.id_ref.length > 1 || a.lot.id_ref.length !== 'N/A') ? a.lot.id_ref : 'N/A', 
					a.lot.address_text, 
					self.$root.formatMoney(a.lot.area_m2, 2, ',', '.') + ' m2', 
					a.zone, 
					self.$root.zfill(a.name, 4), 
					'<font id="repeats-microroute-' + a.id + '">' + self.repeatsDetect(a) + '</font>' + '/' + a.repeat, 
					'<button data-microroute="' + a.id + '" data-lot="' + a.lot.id + '" class="btn btn-sm btn-success create-schedule-fast"><i class="fa fa-plus-circle"></i></button>', 
					a.contract.name, 
					(a.lot.obs.length > 1) ? a.lot.obs : 'Sin observacion(es)',
					(a.lot.description.length > 1) ? a.lot.description : 'Sin Descripcion',
				]),
				"order": [[1, 'asc']],
				columns: [
					{ title: "Id INT" },
					{ title: "Microruta" },
					{ title: "Lote Ref" },
					{ title: "Direccion(es)" },
					{ title: "Area m2" },
					{ title: "Zona" },
					{ title: "CC" },
					{ title: "Repeticiones" },
					{ title: "Añadir" },
					{ title: "Contrato" },
					{ title: "Obs lote" },
					{ title: "Descripcion", class: "child" },
				],
				initComplete: function( settings, json ) {
					//subDialog.modal('hide');
					var apiTables = this.api();
					apiTables.$('tr').click( function () {
						tds = $(this).find( "td" );
						selectedId = parseInt($(tds[0]).text());
						self.form_search_create.microroute = ((parseInt(selectedId)>0) ? parseInt(selectedId) : 0);
						//document.getElementById('CreateScheduleModal').scrollTo(0, 0);
					} );
					
					
					apiTables.$("button.create-schedule-fast").click(function() {
						try {
							//button = $(this).find( "" );
							
							if(
								self.form_search_create.period <= 0
								|| self.form_search_create.year <= 0
								|| self.form_search_create.group <= 0
								|| self.form_search_create.date_executed_schedule == ''
							){
								return false;
							} else {
								
								if (confirm("Desea agregar la microruta/lote al dia " + self.form_search_create.date_executed_schedule + ', ' + self.groupName + '?')) {
									dataThis = $(this).data();
									self.form_search_create.microroute = dataThis.microroute;
									self.newSchedule(false, false);
									$("#repeats-microroute-" + dataThis.microroute).text(parseInt($("#repeats-microroute-" + dataThis.microroute).text())+1);
									//self.loadTableMicroroutes();
								}
							}
							
						} catch(e){
							console.error(e);
							return false;
						}
					});
					$('.datatable-buttons2-message').html('');
				},
			});
		},
		repeatsDetect(microroute){
			var self = this;
			detect = self.records_org.filter(x => (x.microroute.id === microroute.id || x.microroute === microroute));
			detect = (detect !== undefined) ? detect : [];
			return detect.length;
		},
		loadOptions(){
			var self = this;
			self.$root.loadAPI_List('photographic_periods', {}, function(e){
				self.options.photographic_periods = e;
				self.$root.loadAPI_List('photographic_groups', {}, function(e){				
					e.forEach(function(a){
						self.options.photographic_groups.push(a);
						self.calendar.resources.push({
							id: a.id,
							title: a.name,
							eventColor: (self.calendar.colors[a.id] !== undefined) ? self.calendar.colors[a.id] : "gray",
						});
					});
					self.loadCalendar();
				});
			});
		},
		newSchedule(closeModal=true, empty_form=true){
			var self = this;
			try {
				if(self.form_search_create.period <= 0){ throw new FormException('Datos incompletos', 'Seleccione el primero el periodo de la programacion.') };
				if(self.form_search_create.year <= 0){ throw new FormException('Datos incompletos', 'Seleccione antes el año de la programacion.') };
				if(self.form_search_create.group <= 0){ throw new FormException('Datos incompletos', 'Seleccione antes la cuadrilla de la programacion.') };
				if(self.form_search_create.date_executed_schedule == ''){ throw new FormException('Datos incompletos', 'Seleccione antes la fecha de la programacion.') };
				if(self.form_search_create.microroute <= 0){ throw new FormException('Datos incompletos', 'Seleccione la microruta/lote que desea agregar a la programacion.') };
				var sendTo = self.form_search_create;
				sendTo.date_executed_schedule_end = moment(self.form_search_create.date_executed_schedule).add(1, 'day').format('Y-MM-DD');
				
				api.post('/records/emvarias_schedule', sendTo)
				.then(function (c){
					if(c.status == 200){
						self.createLogSchedule({
							schedule: c.data,
							action: 'create',
							data: sendTo,
							response: c,
						}, function(w){
							new PNotify({
								"title": "¡Éxito!",
								"text": "Creada con éxito",
								"styling":"bootstrap3",
								"type":"success",
								"icon":true,
								"animation":"zoom",
								"hide":true
							});
							
							if(empty_form === true){							
								self.form_search_create.microroute = 0;
								self.form_search_create.group = 0;
								self.form_search_create.date_executed_schedule = '';
								//self.submitFormSearch();	
							}
							
							self.$root.loadAPI_Single('emvarias_schedule', c.data, {
								join: [
									'emvarias_microroutes',
									'emvarias_microroutes,emvarias_lots',
									'photographic_periods',
									'photographic_groups'
								],
								filter: [
									'period,eq,' + self.form_search_create.period,
									'year,eq,' + self.form_search_create.year
								],
							}, function(d){
								//console.log('d', d);
								self.records_org.push(d);
								item = self.scheduleToEvent(d);
								console.log('item', item);
								self.records.push(item);
								$('#calendar-schedule').fullCalendar('addEventSource', [item]);
							});
							if(closeModal === true){
								$('#CreateScheduleModal').modal('hide');
							}
						});
					}
				})
				.catch(function (e) {
					console.error(e);
					self.createLogSchedule({
						action: 'create-error',
						data: self.form_search_create,
						response: e.response,
					}, function(){});
				});
			} catch(e){
				console.error(e);
				self.createLogSchedule({
					action: 'create-error',
					data: self.form_search_create,
					response: e,
				}, function(w){
					new PNotify({
						"title": e.name,
						"text": e.message,
						"styling":"bootstrap3",
						"type":"error",
						"icon":true,
						"animation":"zoom",
						"hide":true
					});
				});
			}
		},
		submitFormSearch(){
			var self = this;
			$('#calendar-schedule').fullCalendar( 'removeEventSource', self.records );
			self.records = [];
			if(self.form_search_create.period <= 0 || self.form_search_create.year <= 1950){ return false; };
			api.get('/records/emvarias_schedule', {
				params: {
					join: [
						'emvarias_microroutes',
						'emvarias_microroutes,emvarias_lots',
						'photographic_periods',
						'photographic_groups'
					],
					filter: [
						'period,eq,' + self.form_search_create.period,
						'year,eq,' + self.form_search_create.year
					],
				}
			})
			.then(function (c){
				if(c.status == 200){
					self.records_org = c.data.records;
					self.records = c.data.records.map(function(eventEl) {
						return self.scheduleToEvent(eventEl);
					});
				};
			})
			.catch(function (e) {
				console.error(e);
				// console.log(e.response);
				return false;
			}).finally(function(){
				// console.log(self.records)
				// console.log('carga finalizada...');
				$('#calendar-schedule').fullCalendar( 'addEventSource', self.records );
				$('#calendar-schedule').fullCalendar( 'gotoDate', self.periodDateStart );
			});			
		},
		loadCalendar(){
			var self = this;
			$('#calendar-schedule').fullCalendar({
				dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
				dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
				monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				buttonText: { today:    'Hoy', month:    'Mes', week:     'Semana', day:      'Día', list:     'Lista' },
				defaultButtonText: { prev: "Anterior", next: "Siguiente", prevYear: "Ant Año", nextYear: "Sig Año", today: 'Hoy', month: 'mes', week: 'Semana', day: 'Día' },
				plugins: [ 'interaction', 'resourceTimeline' ],
				timeZone: 'UTC',
				header: { left: 'timelineWeek,timelineYear list timelineDay', center: 'title', right: 'today prev,next timelineMonth' },
				defaultView: 'timelineMonth',
				resourceLabelText: 'Cuadrillas',
				resources: self.calendar.resources,
				events: self.records,
				duration: { days: parseInt(moment(self.periodDateEnd).format('D')) - parseInt(moment(self.periodDateStart).format('D')) },
				dateAlignment: self.periodDateStart,
				defaultDate: self.periodDateStart,
				visibleRange: {
					start: self.periodDateStart,
					end: self.periodDateEnd
				},
				//dateIncrement: { days: 15 },
				dayClick: function (date, jsEvent, view, resourceOb) {
					if(date.format('Y-MM-DD') == self.form_search_create.date_executed_schedule && parseInt(resourceOb.id) == self.form_search_create.group){
						if (confirm("Desea continuar?")) {
							$('#CreateScheduleModal').modal('show');
						}
					}
					self.form_search_create.date_executed_schedule = date.format('Y-MM-DD');
					self.form_search_create.group = parseInt(resourceOb.id);
				},
				resourceRender: function(resourceObj, $td) {
					$td.eq(0).find('.fc-cell-content')
					.append(
						$('<strong>(?)</strong>').popover({
							title: resourceObj.title,
							content: resourceObj.id,
							trigger: 'hover',
							placement: 'right',
							container: 'body'
						})
					);
				},
				editable: true,
				droppable: true,
				eventResize: function(event, delta, revertFunc, jsEvent, ui, view) {
					// alert(event.title + " end is now " + event.end.format('Y-MM-DD'));
					if (!confirm("Desea modificar la fecha de finalizacion del evento?")) {
						revertFunc();
					} else {
						if(moment().diff(event.start, 'days') > 0 || moment().diff(event.end, 'days') > 0){
							alert('No puedes modificar el evento antes de hoy.');
							revertFunc();
						} else {
							api.put('/records/emvarias_schedule/' + event.id, {
								id: event.id,
								date_executed_schedule_end: event.end.format('Y-MM-DD'),
								updated_by: <?= $this->user->id; ?>
							})
							.then(function (b){
								if(b.data > 0){									
									self.createLogSchedule({
										schedule: event.id,
										action: 'edit',
										data: {
											id: event.id,
											date_executed_schedule_end: event.end.toISOString(),
											updated_by: <?= $this->user->id; ?>
										},
										response: b,
									}, function(w){
										new PNotify({
											"title": "¡Éxito!",
											"text": "Modificado con éxito",
											"styling":"bootstrap3",
											"type":"success",
											"icon":true,
											"animation":"zoom",
											"hide":true
										});
										
									});
								}
							})
							.catch(function (e) {
								//console.error(e);
								self.createLogSchedule({
									schedule: event.id,
									action: 'edit-error',
									data: {
										id: event.id,
										date_executed_schedule_end: event.end.toISOString(),
										updated_by: <?= $this->user->id; ?>
									},
									response: e.response,
								}, function(w){
									revertFunc();
								});
								
							});
						}
					}
				},
				eventDrop: function(event, delta, revertFunc, jsEvent, ui, view) {
					if (!confirm("Desea modificar la fecha de este evento?")) {
						revertFunc();
					} else {
						if(moment().diff(event.start, 'days') > 0){
							alert('No puedes modificar el evento antes de hoy.');
							revertFunc();
						} else {
							var subDialog = bootbox.dialog({
								message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
								closeButton: false
							});
							if(event.id > 0){
								event.color = 'orange';
								event.date_executed_schedule = event.start.format('Y-MM-DD');
								
								api.put('/records/emvarias_schedule/' + event.id, {
									id: event.id,
									group: event.resourceId,
									date_executed_schedule: event.start.format('Y-MM-DD'),
									date_executed_schedule_end:  event.end.toISOString(),
									updated_by: <?= $this->user->id; ?>
								})
								.then(function (b){
									if(b.data > 0){									
										self.createLogSchedule({
											schedule: event.id,
											action: 'edit',
											data: {
												id: event.id,
												group: event.resourceId,
												date_executed_schedule_end: event.end.format('Y-MM-DD'),
												date_executed_schedule: event.start.format('Y-MM-DD'),
												updated_by: <?= $this->user->id; ?>
											},
											response: b,
										}, function(w){
											event.date_executed_schedule = event.start.format('Y-MM-DD');
											event.date_executed_schedule_end = event.end.format('Y-MM-DD');
											event.group = event.resourceId;
											
											new PNotify({
												"title": "¡Éxito!",
												"text": "Modificado con éxito",
												"styling":"bootstrap3",
												"type":"success",
												"icon":true,
												"animation":"zoom",
												"hide":true
											});
											
										});
									}
								})
								.catch(function (e) {
									//console.error(e);
									self.createLogSchedule({
										schedule: event.id,
										action: 'edit-error',
										data: {
											id: event.id,
											group: event.resourceId,
											date_executed_schedule: event.start.format('Y-MM-DD'),
											updated_by: <?= $this->user->id; ?>
										},
										response: e.response,
									}, function(w){
										
										revertFunc();
									});
									
								});
								subDialog.modal('hide');
							} else {
								revertFunc();
							}
						}
					}
				},
				eventRender: function(eventObj, element) {
					//console.log('eventRender: eventObj', eventObj);
					if(moment().diff(eventObj.start, 'days') > 0 || moment().diff(eventObj.end, 'days') > 0){
						eventObj.resourceEditable = false;
					} else {
						element.prepend( "<span class='closeon' style='z-index: 99999;position: relative;color: black;padding:2px;'>X</span>" );
						element.find(".closeon").click(function() {
							if (confirm("Desea Eliminar este evento?")) {
								api.delete('/records/emvarias_schedule/' + eventObj.id, {})
								.then(function (b){
									if(b.status == 200){
										self.createLogSchedule({
											action: 'delete',
											data: { id: eventObj.id },
											response: b,
										}, function(w){
											$('.popover.fade.top').remove();
											$('#calendar-schedule').fullCalendar('removeEvents',eventObj._id);
											
											IndexOne = self.records.findIndex(x => (x.id == eventObj.id));
											IndexTwo = self.records_org.findIndex(x => (x.id == eventObj.id));
											if(IndexOne > -1){ self.records.splice(IndexOne, 1); }
											if(IndexTwo > -1){ self.records_org.splice(IndexTwo, 1); }
										
											new PNotify({
												"title": "Éxito!",
												"text": "La programacion se eliminó con éxito.",
												"styling":"bootstrap3",
												"type":"error",
												"icon":true,
												"animation":"zoom",
												"hide":true
											});
										});									
									}
								})
								.catch(function (e) {
									// console.log('Error al eliminar schedule');
									self.createLogSchedule({
										schedule: eventObj.id,
										action: 'delete-error',
										data: { id: eventObj.id },
										response: e.response,
									}, function(w){
										new PNotify({
											"title": "Error eliminando",
											"text": "La programacion no se puede modificar, posiblemente hay contanido anexido a ellá.",
											"styling":"bootstrap3",
											"type":"error",
											"icon":true,
											"animation":"zoom",
											"hide":true
										});
									});
								});
							}
						});
					}
					
					// console.log('lot ', eventObj.objectMV.microroute.lot.description);
					element.popover({
					  title: eventObj.date_executed_schedule + ' | ' + eventObj.title + ' | ' + eventObj.objectMV.microroute.lot.address_text,
					  content: eventObj.objectMV.microroute.lot.description,
					  trigger: 'hover',
					  placement: 'top',
					  container: 'body'
					});
					
					element.click(function(e) {
						if (e.which === 1) {
							//$('.popover.fade.top').remove();
						}
						
					});
					element.mousemove(function(e) {
						if (e.which === 1) {
							$('.popover.fade.top').remove();
						}
					});
				},
			});
		},
		loadAPI_List(table=null, paramsIn=null, call=null){
			var self = this;
			paramsIn = paramsIn !== null ? paramsIn : {};
			call = call !== null ? call : function(e){
				//console.log('e',e);
			};
			table = table !== null ? '/records/' + table : '/openapi';
			
			
			api.get(table, { params: paramsIn})
			.then(function (c){ if(c.status == 200){ call(c.data.records); } else { return call([]); } })
			.catch(function (e) {
				console.error(e);
				// console.log(e.response);
				return call([]);
			});
		},
		loadAPI_Single(table=null, id=0, paramsIn=null, call=null){
			var self = this;
			paramsIn = paramsIn !== null ? paramsIn : {};
			call = call !== null ? call : function(e){
				// console.log('e',e);
			};
			table = table !== null && id > 0 ? '/records/' + table + '/' + id : '/openapi';
			
			
			api.get(table, { params: paramsIn})
			.then(function (c){ if(c.status == 200){ call(c.data); } else { return call(null); } })
			.catch(function (e) {
				console.error(e);
				// console.log(e.response);
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
		}
	}
}).$mount('#schedule-programming');
</script>



