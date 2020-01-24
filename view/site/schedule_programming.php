<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.print.css" media='print' />
<!-- // <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script> -->
<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script> -->
<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script> -->
<!-- //  -->
<!-- // <script src="/public/assets/vendors/fullcalendar/3.1.0/dist/gcal.js"></script> -->
<!-- // <script src="/public/assets/vendors/fullcalendar/3.1.0/dist/locales-all.js"></script> -->
<style>
	#wrap {
		width: 100%;
		margin: 0 auto;
	}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
	}
		
	#external-events .fc-event {
		margin: 10px 0;
		cursor: pointer;
	}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
	}
	#calendar {
		float: right;
		width: 900px;
	}
</style>

<div id="schedule-programming">
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

<template id="step-one">
	<div>
		<div id='wrap'>
			
			<!-- // <div :class="'col-md-12 col-sm-12 col-xs-12 ' + ((inSchedule !== false) ? 'hidden' : '')"> -->
			<div >
				<div class="x_panel">
					<div class="x_title">
						<h2>Paso # 1 <small></small></h2>
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
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract">Contrato<span class="required">*</span></label>
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
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="period">Periodo<span class="required">*</span></label>
									<div class="col-md-8 col-xs-12">
										<select id="period" required="required" v-model="period" class="form-control">
											<option value="0">Seleccione una opcion</option>
											<option v-for="(option, i_option) in options.photographic_periods" :value="option.id">{{ option.name }}</option>
										</select>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							
							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Año <span class="required">*</span></label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input v-model="year" type="number" min="2019" id="year" required="required" class="form-control">
									</div>
								</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="col-xs-12">
								<br>
								<button @click="validateStepOne" type="button" class="btn btn-success pull-right">Continuar</button>
							</div>
						</div>
					
				</div>
			</div>
			
			<div :class="'col-md-12 col-sm-12 col-xs-12 ' + ((inSchedule !== false) ? '' : 'hidden')">
				<div class="col-md-3 col-xs-4">
					<div class="x_panel" style="max-height:calc(65vh);    overflow: auto;">
						<div class="x_content">
							<div>
								<div id='external-events'>
									<h4>Draggable Events</h4>
									<div class="box-rec"></div>
									<p>
										<input type='checkbox' id='drop-remove' />
										<label for='drop-remove'>Remover despues de colocar</label>
									</p>
								</div>
								<div style='clear:both'></div>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="col-md-9 col-xs-8">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12" v-for="(group, group_i) in options.photographic_groups">
							<div class="x_panel">
								<div class="x_title">
									<h2>{{ group.name }} <small></small></h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div :id="'calendar-group-' + group.id" class="calendar calender_box" style="display: hidden; "></div>
									<!-- // <ol data-draggable="target"></ol> -->
								</div>
							</div>
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

var Step_One = Vue.extend({
	template: '#step-one',
	data(){
		return {
			inSchedule: false,
			options: {
				emvarias_contracts: [],
				emvarias_microroutes: [],
				photographic_periods: [],
				photographic_groups: [],
			},
			total_m2: 0,
			total_m2_schedule: 0,
			total: 0,
			period: 0,
			contract: 0,
			"year": moment().format('Y'),
			records: [],
			routesInSchedule: [],
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
		periodDateStart(){
			var self = this;
			try{
				period = self.options.photographic_periods.find(x => x.id === self.period);
				if(period.start_month === null || period.start_day === null){ throw new FormException('noDates', 'No hay fechas establecidas en la tabla de periodos'); }
				return (moment().format('Y') + '-' + ((String(period.start_month).length > 1) ? period.start_month : '0' + period.start_month) + '-' + ((String(period.start_day).length > 1) ? period.start_day : '0' + period.start_day));
			} catch(e){
				return "";
			}
		},
		periodDateEnd(){
			var self = this;
			try{
				period = self.options.photographic_periods.find(x => x.id === self.period);
				if(period.end_month === null || period.end_day === null){ throw new FormException('noDates', 'No hay fechas establecidas en la tabla de periodos'); }
				return (moment().format('Y') + '-' + ((String(period.end_month).length > 1) ? period.end_month : '0' + period.end_month) + '-' + ((String(period.end_day).length > 1) ? period.end_day : '0' + period.end_day));
			} catch(e){
				return "";
			}
		},
	},
	mounted: function () {
		var self = this;
		self.listOptions();
	},
	methods: {
		validateStepOne(){
			var self = this;
			self.inSchedule = false;
			try{
				if(self.contract > 0 && self.period > 0  && self.year > 0){
					self.inSchedule = true;
						self.loadMicroroutes();
				} else {
					throw new FormException('incompleteStep', 'Completa todos los campos.');
				}
			}catch(e){
				console.error(e);
			}
		},
		loadDrag2(){
			(function(){
				//exclude older browsers by the features we need them to support
				//and legacy opera explicitly so we don't waste time on a dead browser
				if (!document.querySelectorAll || !('draggable' in document.createElement('span')) || window.opera) { return; }
				//get the collection of draggable items and add their draggable attribute
				for(var items = document.querySelectorAll('[data-draggable="item"]'), len = items.length, i = 0; i < len; i ++){
					items[i].setAttribute('draggable', 'true');
				}
				//variable for storing the dragging item reference 
				//this will avoid the need to define any transfer data 
				//which means that the elements don't need to have IDs 
				var item = null;
				//dragstart event to initiate mouse dragging
				document.addEventListener('dragstart', function(e){
					//set the item reference to this element
					item = e.target;
					//we don't need the transfer data, but we have to define something
					//otherwise the drop action won't work at all in firefox
					//most browsers support the proper mime-type syntax, eg. "text/plain"
					//but we have to use this incorrect syntax for the benefit of IE10+
					e.dataTransfer.setData('text', '');
				}, false);
				//dragover event to allow the drag by preventing its default
				//ie. the default action of an element is not to allow dragging 
				document.addEventListener('dragover', function(e){
					if(item){ e.preventDefault(); }
				}, false);
				//drop event to allow the element to be dropped into valid targets
				document.addEventListener('drop', function(e){
					//if this element is a drop target, move the item here 
					//then prevent default to allow the action (same as dragover)
					if(e.target.getAttribute('data-draggable') == 'target'){
						e.target.appendChild(item);
						e.preventDefault();
					}				
				}, false);				
				//dragend event to clean-up after drop or abort
				//which fires whether or not the drop target was valid
				document.addEventListener('dragend', function(e){
					item = null;				
				}, false);
			})();
		},
		loadcalendar(){
			var self = this;
			self.options.photographic_groups.forEach(function(a){
				//console.log('Comenzando con grupo: ', a.id + ' - ' + a.name);
				
				$('#calendar-group-' + a.id).fullCalendar({
					dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
					dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
					monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
					monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					buttonText: {
						today:    'Hoy',
						month:    'Mes',
						week:     'Semana',
						day:      'Día',
						list:     'Lista'
					},
					defaultButtonText: {
						prev: "Anterior",
						next: "Siguiente",
						prevYear: "Ant Año",
						nextYear: "Sig Año",
						today: 'Hoy',
						month: 'mes',
						week: 'Semana',
						day: 'Día'
					},
					eventSources: [
						// your event source
						{
							url: '/api.php/records/emvarias_schedule?join[]=emvarias_microroutes&' + 'filter[]=' + 'group,eq,' + a.id + '&filter[]=' + 'period,eq,' + self.period + '&filter[]=' + 'year,eq,' + self.year,
							method: 'GET',
							extraParams: {
								custom_param2: 'somethingelse'
							},
							failure: function() {
								alert('there was an error while fetching events!');
							},
							success: function(content, xhr) {
								let result = content.records.map(function(eventEl) {
									self.routesInSchedule.push(eventEl.id);
									// Eliminar las rutas
									// $( "#microroute-drog-" + eventEl.microroute.id).css('display', 'none')
									$( "#microroute-drog-" + eventEl.microroute.id).css('background-color', '#a6ad3a');
									
									return {
										id: eventEl.id,
										title: eventEl.microroute.name,
										microroute: eventEl.microroute.id,
										period: eventEl.period,
										group: a.id,
										year: eventEl.year,
										start: eventEl.date_executed_schedule,
										date_executed_schedule: eventEl.date_executed_schedule,
										created_by: <?= $this->user->id; ?>,
										stick: true
									}
								});
								return result;
							},
							color: '#d8e9cf',   // a non-ajax option
							textColor: '#666'
						},
					  ],
					defaultView: 'month',
					validRange: {
						start: self.periodDateStart,
						end: self.periodDateEnd
					},
					timeZone: 'local',
					defaultDate: moment(self.periodDateStart),
					header: {
						left: 'prev,next today',
						center: 'title',
						// right: 'month,agendaWeek,agendaDay'
						right: 'month,listWeek'
					},
					editable: true,
					droppable: true, // this allows things to be dropped onto the calendar
					eventReceive: function (event) {
						if (confirm("Desea Agregar este evento?")) {
							var subDialog = bootbox.dialog({
								message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
								closeButton: false
							});
							
							event.date_executed_schedule = event.start.format('Y-MM-DD');
							// console.log(event);
							dataSend = {
								microroute: event.microroute,
								period: event.period,
								group: a.id,
								year: event.year,
								date_executed_schedule: event.date_executed_schedule,
								created_by: <?= $this->user->id; ?>,
								
							};
							
							if(event.id == null){
								api.post('/records/emvarias_schedule', dataSend)
								.then(function (b){
									if(b.data > 0){
										event.id = b.data;
									}
								})
								.catch(function (e) {
									console.log('Error Agrgando schedule');
									//console.error(e);
									console.log(e.response);
									$('#calendar-group-' + a.id).fullCalendar('removeEvents', event._id);
								});
							}
							subDialog.modal('hide');
						} else {
							$('#calendar-group-' + a.id).fullCalendar('removeEvents', event._id);
						}
					},
					drop: function(date, jsEvent, ui, resourceId) {
						var memberName = $(this).data('event').title;
						var memberID = $(this).attr('id').toString();
						
						if ($('#drop-remove').is(':checked')) {
							$(this).remove();
						}
					},
					eventDrop: function(event, delta, revertFunc, jsEvent, ui, view) {
						console.log(event.title + " was dropped on " + event.start.format());
						if (!confirm("Desea modificar la fecha de este evento?")) {
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
									date_executed_schedule: event.start.format('Y-MM-DD'),
									updated_by: <?= $this->user->id; ?>
								})
								.then(function (b){
									if(b.data > 0){
										console.log(event);
									}
								})
								.catch(function (e) {
									console.log('Error Agrgando schedule');
									//console.error(e);
									console.log(e.response);
									revertFunc();
								});
								subDialog.modal('hide');
							} else {
								revertFunc();
							}
						}
					},
					eventRender: function(event, element) {
						// console.log('eventRender: element', element);
						element.prepend( "<span class='closeon'>X</span>" );
						element.find(".closeon").click(function() {
							var subDialog = bootbox.dialog({
								message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
								closeButton: false
							});
							
							if (confirm("Desea Eliminar este evento?")) {
								api.delete('/records/emvarias_schedule/' + event.id, {})
								.then(function (b){
									if(b.data > 0){
										$('.calendar').fullCalendar('removeEvents',event._id);
									}
								})
								.catch(function (e) {
									console.log('Error al eliminar schedule');
									//console.error(e);
									console.log(e.response);
								});
								
								subDialog.modal('hide');
							}
						});
					},
					dayRender: function (date, cell) {
						// console.log('date', moment(date));
						// cell.css("background-color", "red");
					}
				});
				
			});			
		},
		loadMicroroutes(){
			var self = this;
			self.options.emvarias_microroutes = [];
			$("#external-events .box-rec").html('');
			var dialog = bootbox.dialog({
				message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
				closeButton: false
			});
			
			self.$root.loadAPI_List('emvarias_microroutes', {
				filter: [
					'contract,eq,' + self.contract
				],
			}, function(e){
				self.options.emvarias_microroutes = e;
				e.forEach(function(a){
					var $newdiv1 = $( "<div class=\"fc-event\" id=\"microroute-drog-" + a.id + "\"></div>" );
					// $newdiv1.text(a.name);
					// $newdiv1.attr('v-if', 'routesInSchedule.find(x => x === a.id)');
					$newdiv1.text(a.name + ' ');
					// {{ routesInSchedule.find(x => x.id === self.contract).name }} 
					
					/* initialize the external events
					-----------------------------------------------------------------*/
					$newdiv1.data('event', {
						color: '#6ba74c',
						id: null,
						title: $.trim($newdiv1.text()),
						microroute: a.id,
						period: self.period,
						year: self.year,
						date_executed_schedule: null,
						stick: true,
						created_by: <?= $this->user->id; ?>
					});
					// make the event draggable using jQuery UI
					$newdiv1.draggable({
						zIndex: 999,
						revert: true,      // will cause the event to go back to its
						revertDuration: 0  //  original position after the drag
					});
					$("#external-events .box-rec").append( $newdiv1 );
				});
				
				dialog.modal('hide');
				self.loadcalendar();
			});
		},
		listOptions(){
			var self = this;
			self.$root.loadAPI_List('photographic_groups', {}, function(e){
				self.options.photographic_groups = e;
			});
			self.$root.loadAPI_List('photographic_periods', {}, function(e){
				self.options.photographic_periods = e;
			});
			self.$root.loadAPI_List('emvarias_contracts', {}, function(e){
				self.options.emvarias_contracts = e;
			});
		},
		
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: Step_One, name: 'Step-One' },
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
}).$mount('#schedule-programming');
</script>
