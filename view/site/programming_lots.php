
<link href='https://unpkg.com/fullcalendar-scheduler@1.10.0/dist/scheduler.min.css' rel='stylesheet' /> 
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/redmond/jquery-ui.css" rel="stylesheet" />

<script src='https://unpkg.com/fullcalendar@3.10.1/dist/fullcalendar.min.js'></script>
<script src='https://unpkg.com/fullcalendar-scheduler@1.10.0/dist/scheduler.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>

<style>
.ui-datepicker {
	z-index: 99999999999999 !important;
}
.fc-license-message, .fc-timeline-event .fc-time, .fc-day-grid-event .fc-time {
	display: none;
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
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Periodo</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select @change="loadEvents" v-model="formCreate.period" class="select2_single form-control" tabindex="-1">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(option, i_option) in options.emvarias_periods" :value="option.id">{{ option.name }}</option>
									</select>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Año <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input @change="loadEvents" v-model="formCreate.year" id="birthday" class="date-picker form-control col-md-7 col-xs-12" min="2018" required="required" type="number">
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Grupo</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select @change="loadEvents" v-model="formCreate.group" class="select2_single form-control" tabindex="-1">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(option, i_option) in options.emvarias_groups" :value="option.id">{{ option.name }}</option>
									</select>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="ln_solid"></div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-5 col-sm-5 col-xs-12" style="zoom:0.8;">
							<div class="x_content">	
								<!-- // 
								<p class="text-muted font-13 m-b-30">
									The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
								</p>
								-->
								<table id="datatable-buttons2" class="table table-striped table-bordered"></table>
								<div id="demo_info"></div>
							</div>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<div class="x_content">
								<div id='calendar-box'></div>
							</div>
						</div>
					</div>
				</div>
				
						
			</div>
		</div>
		
		
		
		
		<div class="modal fade bs-new-calendar-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Programar</h4>
					</div>
					<div class="modal-body">
						<!-- // 
						<h4>Text in a modal</h4>
						<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
						<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
						-->

						<div class="form-group hide">
							<label>Months</label>
							<input type="text" id="chit_months" name="chit_months" class="form-control" />
						</div>
						<div class="form-group">
							<label>Fecha de inicio</label>
							<div class='input-group date' id='datetimepicker1'>
								<input type='text' class="form-control" name="start_date" id="example1" v-model="formCreate.date_executed_schedule" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label>End Date</label>
							<div class='input-group date' id='datetimepicker2'>
								<input type='text' class="form-control" name="start_date" id="example2" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button @click="createSchedule" type="button" class="btn btn-primary">Programar</button>
					</div>

				</div>
			</div>
		</div>


	</div>

</template>



<script>
function FormException(error, aviso){
	this.name = error;
	this.message = aviso;
};

var List = Vue.extend({
	template: '#list',
	data(){
		return {
			options: {
				emvarias_groups: [],
				emvarias_periods: [],
			},
			total: 0,
			records: [],
			dataTable: null,
			formCreate: {
				lot: 0,
				year: moment().format('Y'),
				period: 0,
				group: 0,
				date_executed_schedule: '',
				date_executed_schedule_end: '',
				created_by: "<?= $this->user->id; ?>"
			},
			id_edit: null,
			calendar: null,
			events: [],
		};
	},
	created: function () {},
	mounted: function () {
		var self = this;
		self.loadOptions();
		  
		$( ".bs-new-calendar-modal-lg" ).on('shown.bs.modal', function(){
		});
		$('#example1').datepicker({
			dateFormat: "yy-mm-dd"
		});
		
		$('#example2').datepicker({
			dateFormat: "yy-mm-dd"
		});
		
		$('#chit_months, #example1').change(function() {
			self.formCreate.date_executed_schedule = $('#example1').val();
			var months = +$('#chit_months').val() || 0, date = $('#example1').datepicker('getDate');
			
			if (months && date) {
				date.setMonth(date.getMonth() + months);
				$('#example2').datepicker('setDate', date);
			} else {
				$('#example2').val('');
				self.formCreate.date_executed_schedule_end = '';
			}
		})
		
		$('#example2').change(function() {
			self.formCreate.date_executed_schedule_end = $('#example2').val();
		})
	},
	methods: {
		loadEvents(){
			var self = this;
			self.events = [];
			if(self.formCreate.year > 1950 && self.formCreate.period > 0 && self.formCreate.group > 0)
			{
				MV.api.readList('/emvarias_schedule', {
					join: [
						'emvarias_lots',
						'period',
						'group',
						'users'
					],
					filter: [
						'year,eq,' + self.formCreate.year,
						'period,eq,' + self.formCreate.period,
						'group,eq,' + self.formCreate.group,
					]
				}, function(a){
					events = [];
					a.forEach(function(ab){
						events.push(self.jsonEvent(ab));
					})
					self.events = events;
					$('#calendar-box').fullCalendar( 'addEventSource', events );
				});				
			}
			
		},
		booleanToint(d, def){
			def = (def !== undefined) ? def : 0;
			var self = this;
			if(d === true){
				return 1;
			} else if(d === false){
				return 0;
			} else {
				return def;
			}
		},
		intToboolean(d, def){
			var self = this;
			def = (def !== undefined) ? def : false;
			var self = this;
			if(d == 1){
				return true;
			} else if(d === 0){
				return false;
			} else {
				return def;
			}
		},
		init_calendar(){
			var self = this;
			if( typeof ($.fn.fullCalendar) === 'undefined'){ return; }
			console.log(('init_calendar'));
				
			var date = new Date(),
				d = date.getDate(),
				m = date.getMonth(),
				y = date.getFullYear(),
				started,
				categoryClass;

			var calendar = self.calendar = $('#calendar-box').fullCalendar({
				dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
				dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
				monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				buttonText: { today:    'Hoy', month:    'Mes', week:     'Semana', day:      'Día', list:     'Lista' },
				defaultButtonText: { prev: "Anterior", next: "Siguiente", prevYear: "Ant Año", nextYear: "Sig Año", today: 'Hoy', month: 'mes', week: 'Semana', day: 'Día' },
				defaultView: 'listMonth',
				timeZone: 'UTC',
				editable: true,
				droppable: true,
				selectable: true,
				selectHelper: true,
				header: {
					left: 'prev,next today timelineDay,timelineWeek,timelineMonth,timelineYear',
					center: 'title',
					right: 'month,agendaWeek,agendaDay,listMonth'
				},
				select: function(start, end, jsEvent, view) {
					//console.log(view.dateProfile.isRangeAllDay);
					/*
					self.modalNew.start = moment(start).format("YYYY-MM-DD HH:mm:ss");
					self.modalNew.end = moment(end).format("YYYY-MM-DD HH:mm:ss");
					var allDay = !start.hasTime() && !end.hasTime();
					self.modalNew.allDay = self.booleanToint(allDay);
					self.modalNew.editable = 0;
					$('#fc_create').click();
					started = start;
					ended = end;
					*/
				},
				eventClick: function(calEvent, jsEvent, view) {
					var allDay = !calEvent.start.hasTime() && !calEvent.end.hasTime();
					/*
					self.id_edit = calEvent._id;
					self.modalView = {
						id: calEvent.id,
						title: calEvent.title,
						description: calEvent.description,
						allDay: self.booleanToint(allDay),
						start: moment(calEvent.start).format("YYYY-MM-DD HH:mm:ss"),
						end: moment(calEvent.end).format("YYYY-MM-DD HH:mm:ss"),
						url: calEvent.url,
						editable: self.booleanToint(calEvent.editable),
						color: calEvent.color,
						backgroundColor: calEvent.backgroundColor,
						borderColor: calEvent.borderColor,
						textColor: calEvent.textColor,
						created: calEvent.created,
						created_by: calEvent.created_by,
						updated: calEvent.updated,
						updated_by: calEvent.updated_by,
						"100_events_staff": calEvent['100_events_staff']
					};
					$('#fc_edit').click();
					//$('.antoclose2').click();
					
					calendar.fullCalendar('unselect');
					*/
				},
				events: function(start, end, timezone, callback) {
					MV.api.read('/emvarias_schedule', {
						join: [
							'emvarias_lots',
							'period',
							'group',
							'users'
						],
						filter: [
							'year,eq,' + self.formCreate.year,
							'period,eq,' + self.formCreate.period,
							'group,eq,' + self.formCreate.group,
						]
					}, function(rb){
						console.log('rb',rb);
						events = [];
						rb.forEach(function(ab){
							events.push(self.jsonEvent(ab));
						})
						callback(events);
					});
				},
				eventRender: function(eventObj, element) {
					//console.log('eventRender: eventObj', eventObj);
					if(moment().diff(eventObj.start, 'days') > 0 || moment().diff(eventObj.end, 'days') > 0){
						eventObj.resourceEditable = false;
					} else {
						// element.prepend( "<span class='closeon' style='z-index: 99999;position: relative;color: black;padding:2px;'><i class=\"fa fa-times\"></i></span>" );
						// element.append( "<span class='closeon pull-right' style='z-index: 99999;position: relative;color: black;padding:2px;'><i class=\"fa fa-times\"></i></span>" );
						
						
						/*
						element.find(".closeon").click(function() {
							if (confirm("Desea Eliminar este evento?")) {
								/*
								api.delete('/emvarias_schedule/' + eventObj.id, {})
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
								}); * /
							}
						});
						*/
					}
					
					// console.log('lot ', eventObj.objectMV.microroute.lot.description);
					element.popover({
					  title: eventObj.title + ' | ' + eventObj.lot.address_text + ' | ' + eventObj.lot.area_m2.toLocaleString() + ' m2',
					  content: eventObj.lot.description,
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
				// events: [{title: 'All Day Event',start: new Date(y, m, 1)}, {title: 'Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)}, {title: 'Meeting',start: new Date(y, m, d, 10, 30),allDay: false}, {title: 'Lunch',start: new Date(y, m, d + 14, 12, 0),end: new Date(y, m, d, 14, 0),allDay: false}, {title: 'Birthday Party',start: new Date(y, m, d + 1, 19, 0),end: new Date(y, m, d + 1, 22, 30),allDay: false}, {title: 'Click for Google',start: new Date(y, m, 28),end: new Date(y, m, 29),url: 'http://google.com/'}]
			});
		},
		jsonEvent(a){
			var self = this;
			//a.editable = (a.editable == 1) ? 1 : (a.created_by.id === undefined && a.created_by == '<?= $this->user->id; ?>') ? 1 : (a.created_by.id !== undefined && a.created_by.id == '<?= $this->user->id; ?>') ? 1 : 0;
			//a['100_events_staff'].forEach(function(b){ a.editable = (b.isAdmin == 1) ? 1 : a.editable; });
			a.title = (a.lot.microroute_name);
			a.start = moment(a.date_executed_schedule);
			a.end = moment(a.date_executed_schedule_end);
			a.editable = self.intToboolean(0);
			a.allDay = self.intToboolean(0);
			return a;
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
				api.post('/records/emvarias_schedule_log', send)
				.then(function (l){
					if(l.status == 200){
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
				console.error(e);
				callb(e)
			}
		},
		createSchedule(){
			var self = this;
			try{
				if(
					self.formCreate.lot > 0
					&& self.formCreate.year > 1950
					&& self.formCreate.period > 0
					&& self.formCreate.group > 0
					&& self.formCreate.date_executed_schedule !== ''
					&& self.formCreate.date_executed_schedule_end !== ''
					&& self.formCreate.created_by > 0
				){
					console.log('Completo', self.formCreate);
					var asx = self.formCreate.date_executed_schedule_end;
					self.formCreate.date_executed_schedule_end = moment(self.formCreate.date_executed_schedule_end).add({ days: 1 }).format('Y-MM-DD');
					
					MV.api.create('/emvarias_schedule', self.formCreate, function(a){
						if(parseInt(a) > 0){
							self.createLogSchedule({
								schedule: a,
								action: 'create-event',
								data: self.formCreate,
								response: a,
							}, function(w){
								self.formCreate.date_executed_schedule_end = asx;
								new PNotify({
									"title": "¡Éxito!",
									"text": "Creada con éxito",
									"styling":"bootstrap3",
									"type":"success",
									"icon":true,
									"animation":"zoom",
									"hide":true
								});
								$( ".bs-new-calendar-modal-lg" ).modal('hide');
								self.loadEvents();
							})
								
						}
					})
				} else {
					console.log('Formulario incompleto');
				}
			}catch(e){
				console.error(e);
			}
		},
		loadOptions(){
			var self = this;
			var subDialog = bootbox.dialog({
				message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
				closeButton: false
			});
			
			MV.api.readList('emvarias_periods', {}, function(a){
				self.options.emvarias_periods = a;
				a.forEach(function(x){
					if(x.start_month == moment().format('M') || x.end_month == moment().format('M')){
						var startDate   = moment(x.start + '/' + self.formCreate.year, "DD/MM/YYYY");
						var endDate     = moment(x.end + '/' + self.formCreate.year, "DD/MM/YYYY");
						var compareDate = moment();
						result = compareDate.isBetween(startDate, endDate);
						if(result == true){
							self.formCreate.period = x.id;
							// console.log('x', x); // console.log('startDate', startDate); // console.log('endDate', endDate); // console.log('compareDate', compareDate); // console.log('result', result);
						}
					}
				});
				
				MV.api.readList('emvarias_groups', {}, function(b){				
					self.options.emvarias_groups = b;
					subDialog.modal('hide');
					self.load();
				});
			});
		},
		load(){
			var self = this;
			self.loading = true;
			self.records = [];
			self.total = 0;
			window.scrollTo(0, 0);
			
			var dialog = bootbox.dialog({
				message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
				closeButton: false
			});
			
			api.get('/records/emvarias_lots', { params: {} }).then(function (a) {
				if(a.data.records && a.data.records.length > 0 && a.status === 200){
					self.total = a.data.records.length;
					self.records = a.data.records;
					
					var eventFired = function ( type ) {
						var n = $('#demo_info')[0];
						n.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>';
						n.scrollTop = n.scrollHeight;      
					}
					self.dataTable = $('#datatable-buttons2')
						.DataTable({
							destroy: true,
							language: { "url": "/public/assets/build/js/lang-datatable.json" },
							// data: self.records,
							fixedHeader: true,
							data: self.records.map(a => [
								//a.id + 
								"<button class=\"add-lot-in-programming\" data-lot=\"" + a.id + "\"><i class=\"fa fa-crosshairs\"></i></button>", 
								a.microroute_name, 
								a.id_ref, 
								a.address_text, 
								a.area_m2.toLocaleString(), 
								a.obs, 
								a.description,
							]),
							columns: [
								{ title: "id" },
								{ title: "Microruta" },
								{ title: "Lote REF." },
								{ title: "Direccion(es)" },
								{ title: "Area m2" },
								{ title: "Obs." },
								{ title: "Descripcion" },
							],
							dom: "Blfrtip",
							buttons: [
								{
								  extend: "copy",
								  className: "btn-sm"
								},
								{
								  extend: "csv",
								  className: "btn-sm"
								},
								{
								  extend: "excel",
								  className: "btn-sm"
								},
								{
								  extend: "pdfHtml5",
								  className: "btn-sm"
								},
								{
								  extend: "print",
								  className: "btn-sm"
								},
							],
							responsive: true,
							initComplete: function( settings, json ) {
								//self.loadEvents();
								self.init_calendar();
								var apiTables = this.api();
								
								apiTables.$('tr').click( function () {
									tds = $(this).find( ".add-lot-in-programming" );
									selectedId = parseInt($(tds[0]).data('lot'));
									self.formCreate.lot = ((parseInt(selectedId)>0) ? parseInt(selectedId) : 0);
										$('.bs-new-calendar-modal-lg').modal('show');
								} );
								
								apiTables.$(".add-lot-in-programming").click(function() {
									self.formCreate.lot = $(this).data('lot');
									try {
										$('.bs-new-calendar-modal-lg').modal('show');
									} catch(e){
										console.error(e);
										return false;
									}
								});
								dialog.modal('hide');
							}
						});
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