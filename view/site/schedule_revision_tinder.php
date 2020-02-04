<style>
.tinder {
	width: 100%;
	min-height: 87vh;
	overflow: hidden;
	display: flex;
	flex-direction: column;
	position: relative;
	opacity: 0;
	transition: opacity 0.1s ease-in-out;
	/* background: brown; */
}

.loaded.tinder {
	opacity: 1;
}

.tinder--status {
	position: absolute;
	top: 50%;
	/* margin-top: -30px; */
	z-index: 2;
	width: 100%;
	text-align: center;
	pointer-events: none;
}

.tinder--status i {
	font-size: 100px;
	opacity: 0;
	transform: scale(0.3);
	transition: all 0.2s ease-in-out;
	position: absolute;
	width: 100px;
	margin-left: -50px;
}

.tinder_love .fa-heart {
	opacity: 0.7;
	transform: scale(1);
}

.tinder_nope .fa-remove {
	opacity: 0.7;
	transform: scale(1);
}

.tinder--cards {
	flex-grow: 1;
	padding-top: 40px;
	text-align: center;
	display: flex;
	justify-content: center;
	align-items: flex-end;
	z-index: 1;
}

.tinder--card {
	display: inline-block;
	width: 90vw;
	max-width: 90%;
	height: 70vh;
	/* background: #337ab7; */
	background: #F7F7F7;
	padding-bottom: 40px;
	border-radius: 8px;
	overflow: hidden;
	position: absolute;
	will-change: transform;
	transition: all 0.3s ease-in-out;
	cursor: -webkit-grab;
	cursor: -moz-grab;
	cursor: grab;
}

.moving.tinder--card {
  transition: none;
  cursor: -webkit-grabbing;
  cursor: -moz-grabbing;
  cursor: grabbing;
}

.tinder--card img {
  max-width: 100%;
  pointer-events: none;
}

.tinder--card h3 {
  margin-top: 32px;
  font-size: 32px;
  padding: 0 16px;
  pointer-events: none;
}

.tinder--card p {
  margin-top: 24px;
  font-size: 20px;
  padding: 0 16px;
  pointer-events: none;
}

.tinder--buttons {
  flex: 0 0 100px;
  text-align: center;
  padding-top: 20px;
}

.tinder--buttons button {
  border-radius: 50%;
  line-height: 60px;
  width: 60px;
  border: 0;
  background: #FFFFFF;
  display: inline-block;
  margin: 0 8px;
}

.tinder--buttons button:focus {
  outline: 0;
}

.tinder--buttons i {
  font-size: 32px;
  vertical-align: middle;
}

.fa-heart {
  color: #FFACE4;
}

.fa-remove {
  color: #CDD6DD;
}
</style>

<div id="reporting-app">
<div class="container">
	<!-- // <router-view :key="$route.fullPath" ></router-view>-->
	<div class="row">
		<div class="col-xs-12">
			<div class="tinder col-md-12">
				<div class="tinder--status">
					<i class="fa fa-remove"></i>
					<i class="fa fa-heart"></i>
				</div>
				<div class="tinder--cards col-md-12">
					<!-- // <div v-for-callback="{key: record.id, array: records, callback: callback}" v-for="(record, record_i) in records" class="tinder--card"> -->
					<div v-for="(record, record_i) in records" class="tinder--card" id="record.id">
						<img :src="record.file_path_short">
						<h3>
							<a @click="selected = record;" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus-circle"></i></a> 
							{{ record.schedule.microroute.name }} - {{ record.created }} 
						</h3>
						<p>
							{{ record.period.name }} - {{ record.year }}<br>
							{{ record.group.name }}<br>
							{{ record.schedule.date_executed_schedule }}<br>
							{{ record.schedule.date_executed_schedule }}<br>
						</p>
					</div>
					<!-- // 
					<div class="tinder--card">
					  <img src="https://placeimg.com/600/300/people">
					  <h3>Demo card 1</h3>
					  <p>This is a demo for Tinder like swipe cards</p>
					</div>
					<div class="tinder--card">
					  <img src="https://placeimg.com/600/300/animals">
					  <h3>Demo card 2</h3>
					  <p>This is a demo for Tinder like swipe cards</p>
					</div>
					<div class="tinder--card">
					  <img src="https://placeimg.com/600/300/nature">
					  <h3>Demo card 3</h3>
					  <p>This is a demo for Tinder like swipe cards</p>
					</div>
					<div class="tinder--card">
					  <img src="https://placeimg.com/600/300/tech">
					  <h3>Demo card 4</h3>
					  <p>This is a demo for Tinder like swipe cards</p>
					</div>
					<div class="tinder--card">
					  <img src="https://placeimg.com/600/300/arch">
					  <h3>Demo card 5</h3>
					  <p>This is a demo for Tinder like swipe cards</p>
					</div>
					-->
				</div>
				<div class="tinder--buttons col-md-12">
					<button id="nope"> <i class="fa fa-remove"></i>
					<button id="popup" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-info"></i></button>
					<button id="love"><i class="fa fa-heart"></i></button>
				</div>
			</div>
		</div>
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Microruta</th>
									<th>Área</th>
									<th>Año</th>
									<th>Periodo</th>
									<th>Cuadrilla/Grupo</th>
									<th>F. Programacion</th>
									<th>F. Reporte</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(record, record_i) in records">
									<td>{{ record.schedule.microroute.name }}</td>
									<td>{{ record.schedule.microroute.lot.area_m2.toLocaleString() }} m²</td>
									<td>{{ record.year }}</td>
									<td>{{ record.period.name }}</td>
									<td>{{ record.group.name }}</td>
									<td>{{ record.schedule.date_executed_schedule }}</td>
									<td>{{ record.created }}</td>
									
									<!-- //
									<td>{{ record.route.name }}</td>
									<td>{{ record.route.area_m2 }}</td>
									<td>{{ record.group.name }}</td>
									<td>{{ record.route.obs }}</td>
									<td>{{ record.created }}</td>
									loadGeometry
									-->
									<td><a @click="selected = record;" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-camera-retro"></i></a></td>
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
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		
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
							<table class="table table-bordered" v-if="selected.id > 0">
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
									<td>{{ selected.schedule.microroute.name }}</td>
									<th>Área</th>
									<td>{{ selected.schedule.microroute.lot.area_m2.toLocaleString() }} m²</td>
								</tr>
								
								<tr>
									<th>Direccion del Lote</th>
									<td colspan="3">{{ selected.schedule.microroute.lot.address_text }}</td>
								</tr>
								
								<tr>
									<th>Descripción</th>
									<td colspan="3">
										<template v-if="selected.schedule.microroute.lot.description !== null && selected.schedule.microroute.lot.description !== ''">
											{{ selected.schedule.microroute.lot.description }}
										</template>
										<template v-else>
											Sin descripción.
										</template>
									</td>
								</tr>
								<tr>
									<th>Observaciones</th>
									<td colspan="3">
										<template v-if="selected.schedule.microroute.lot.obs !== null && selected.schedule.microroute.lot.obs !== ''">
											{{ selected.schedule.microroute.lot.obs }}
										</template>
										<template v-else>
											Sin observaciones.
										</template>
									</td>
								</tr>
								<tr>
									<th>Cuadrilla/Grupo</th>
									<td>{{ selected.group.name }}</td>
									<th>Reportado por</th>
									<td>{{ selected.create_by.username }}</td>
								</tr>
								<tr>
									<th colspan="2">Tipo de Foto</th>
									<td colspan="2">{{ (selected.type == 'A') ? 'Antes' : (selected.type == 'D') ? 'Despues' : 'Desconocido' }}</td>
								</tr>
								<tr>
									<td colspan="4">
										<img class="img-responsive" style="width: 100%; display: block;" :src="selected.file_path_short" alt="image" />
									</td>
								</tr>
								
								<tr>
									<td colspan="4">
										<a class="btn btn-default pull-right" :href="selected.file_path_short" target="_blank"><i class="fa fa-search-plus"></i></a>
										<a class="btn btn-default pull-right" :href="selected.file_path_short" download><i class="fa fa-download" ></i></a>
									</td>
								</tr>
								<!-- //
								<tr>
									<td colspan="4">
										<div id="map"></div>
									</td>
								</tr>
								-->
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
var app = new Vue({
	data: function () {
		return {
			loading: true,
			records: [],
			total: 0,
			page: 1,
			limit: 25,
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
			}
		};
	},
	mounted(){
		var self = this;
		self.load();
	},
	directives: {
		forCallback(el, binding) {
			var self = this;
			let element = binding.value
			element.callback()
			if(self.loading == true){
				var key = element.key
				var len = 0
				
				if (Array.isArray(element.array)) {
					len = element.array.length
				}
				else if (typeof element.array === 'object') {
					var keys = Object.keys(element.array)
					key = keys.indexOf(key)
					len = keys.length
				}
				
				if (key == len - 1) {
					if (typeof element.callback === 'function') {
						element.callback()
					}
				}
			}
		}
	},
	computed: {
	},
	methods: {
		callback() {
			var self = this;
			console.log('v-for loop finished');3
			if(self.loading == true){
				self.runTinder();
				self.loading = false;
			}
		},
		load(){
			var self = this;
			self.loading = true;
			self.records = [];
			self.total = 0;
			var subDialog = bootbox.dialog({
				message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
				closeButton: false
			});
			
			
			MV.apiFG('/api.php/records/emvarias_reports_photographic', {
				params: {
					filter: [
						'status,eq,0'
					],
					join: [
						'emvarias_schedule',
						'photographic_groups',
						'photographic_periods',
						'emvarias_schedule,emvarias_microroutes',
						'emvarias_schedule,emvarias_microroutes,emvarias_lots',
						'emvarias_schedule,emvarias_microroutes,emvarias_contracts',
						'emvarias_schedule,emvarias_schedule_comments,users',
						'users',
					],
					order: "id",
					page: self.page + "," + self.limit
				}
			}).then(function (response) {
				if(response.status == 200){
					self.total = response.data.results;
					self.records = response.data.records;
					setTimeout(function(){
						self.runTinder();
						subDialog.modal('hide');
					}, 3000);
					// $(".tinder--cards").html('');
				} else {
					subDialog.modal('hide');
				}
			}).catch(function (error) {
				console.log('error list-routes::methods::load()');
				console.log(error.response);
				self.loading = false;
				subDialog.modal('hide');
			});
		},
		initCards(card, index) {
			var self = this;
			var tinderContainer = document.querySelector('.tinder');
			var allCards = document.querySelectorAll('.tinder--card');
		  var newCards = document.querySelectorAll('.tinder--card:not(.removed)');

		  newCards.forEach(function (card, index) {
			card.style.zIndex = allCards.length - index;
			card.style.transform = 'scale(' + (20 - index) / 20 + ') translateY(-' + 30 * index + 'px)';
			card.style.opacity = (10 - index) / 10;
		  });
		  
		  tinderContainer.classList.add('loaded');
		},
		createButtonListener(love) {
			var self = this;
		  return function (event) {
			var cards = document.querySelectorAll('.tinder--card:not(.removed)');
			var moveOutWidth = document.body.clientWidth * 1.5;

			if (!cards.length) return false;

			var card = cards[0];

			card.classList.add('removed');

			if (love) {
			  card.style.transform = 'translate(' + moveOutWidth + 'px, -100px) rotate(-30deg)';
			} else {
			  card.style.transform = 'translate(-' + moveOutWidth + 'px, -100px) rotate(30deg)';
			}

			self.initCards();

			event.preventDefault();
		  };
		},
		runTinder(){
			var self = this;
			var tinderContainer = document.querySelector('.tinder');
			var allCards = document.querySelectorAll('.tinder--card');
			var nope = document.getElementById('nope');
			var love = document.getElementById('love');
			
			self.initCards();

			allCards.forEach(function (el) {
			  var hammertime = new Hammer(el);

			  hammertime.on('pan', function (event) {
				el.classList.add('moving');
			  });

			  hammertime.on('pan', function (event) {
				if (event.deltaX === 0) return;
				if (event.center.x === 0 && event.center.y === 0) return;

				tinderContainer.classList.toggle('tinder_love', event.deltaX > 0);
				tinderContainer.classList.toggle('tinder_nope', event.deltaX < 0);

				var xMulti = event.deltaX * 0.03;
				var yMulti = event.deltaY / 80;
				var rotate = xMulti * yMulti;

				event.target.style.transform = 'translate(' + event.deltaX + 'px, ' + event.deltaY + 'px) rotate(' + rotate + 'deg)';
			  });

			  hammertime.on('panend', function (event) {
				el.classList.remove('moving');
				tinderContainer.classList.remove('tinder_love');
				tinderContainer.classList.remove('tinder_nope');

				var moveOutWidth = document.body.clientWidth;
				var keep = Math.abs(event.deltaX) < 80 || Math.abs(event.velocityX) < 0.4;

				event.target.classList.toggle('removed', !keep);

				if (keep) {
				  event.target.style.transform = '';
				} else {
				  var endX = Math.max(Math.abs(event.velocityX) * moveOutWidth, moveOutWidth);
				  var toX = event.deltaX > 0 ? endX : -endX;
				  var endY = Math.abs(event.velocityY) * moveOutWidth;
				  var toY = event.deltaY > 0 ? endY : -endY;
				  var xMulti = event.deltaX * 0.03;
				  var yMulti = event.deltaY / 80;
				  var rotate = xMulti * yMulti;

				  event.target.style.transform = 'translate(' + toX + 'px, ' + (toY + event.deltaY) + 'px) rotate(' + rotate + 'deg)';
				  self.initCards();
				}
			  });
			});


			var nopeListener = self.createButtonListener(false);
			var loveListener = self.createButtonListener(true);

			nope.addEventListener('click', nopeListener);
			love.addEventListener('click', loveListener);

		},
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
						api.put('/records/emvarias_reports_photographic/' + self.selected.id, {
							id: self.selected.id,
							status: 1,
							updated_by: <?= $this->user->id; ?>,
						}).then(function (response) {
							if(response.status == 200){
								index = self.records.findIndex(x => x.id === self.selected.id);
								if(index > -1){ self.records.splice(index, 1); }
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
						api.put('/records/emvarias_reports_photographic/' + self.selected.id, {
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
											urlWA = 'https://wa.me/57' + self.selected.create_by.mobile + '?text=Se%20ha%20rechazado%20una%20FOTO' + '.%0AIngresa%20a%20https%3A%2F%2Fmicuenta.monteverdeltda.com%20para%20gestionarla.';
											window.open(urlWA,'popUpWindow','height=500,width=600,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');
										}
									}
								});
								// self.load();
								index = self.records.findIndex(x => x.id === self.selected.id);
								if(index > -1){ self.records.splice(index, 1); }
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
	}
}).$mount('#reporting-app');
</script>