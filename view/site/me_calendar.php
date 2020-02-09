
<link href='https://unpkg.com/fullcalendar-scheduler@1.10.0/dist/scheduler.min.css' rel='stylesheet' /> 
<script src='https://unpkg.com/fullcalendar@3.10.1/dist/fullcalendar.min.js'></script>
<script src='https://unpkg.com/fullcalendar-scheduler@1.10.0/dist/scheduler.min.js'></script>

<style>
.modal {
	overflow: auto;
}
</style>

<div id="me-calendar">
	<div class="page-title">
		<div class="title_left">
			<h3>Calendario <small></small></h3>
		</div>
		<div class="title_right">
			<!-- //
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">Go!</button>
					</span>
				</div>
			</div>
			-->
		</div>
	</div>
	<div class="clearfix"></div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Mis Eventos <small></small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a onclick="javascript:$('#fc_create').click();">Nuevo evento</a></li>
								<li><a href="#">Settings 2</a></li>
							</ul>
						</li>
						<!-- // <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div id='calendar-box'></div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- calendar modal -->
	<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Nuevo evento</h4>
				</div>
				<form class="form-horizontal" role="form" action="javascript:return false;" v-on:submit="newSchedule">
					<div class="modal-body">
						<div id="testmodal" style="padding: 5px 20px;">
							<div class="form-group">
								<label class="col-sm-3 control-label">Titulo</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" v-model="modalNew.title">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Descripcion</label>
								<div class="col-sm-9">
									<textarea class="form-control" style="height:55px;" v-model="modalNew.description"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Link Externo (Opcional)</label>
								<div class="col-sm-9">
									<input class="form-control" type="url" v-model="modalNew.url" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Todo el día?</label>
								<div class="col-sm-9">
									<select class="form-control" v-model="modalNew.allDay">
										<option value="0">Fecha y hora exacta</option>
										<option value="1">El evento es en el transcurso del día.</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Editable</label>
								<div class="col-sm-9">
									<select class="form-control" v-model="modalNew.editable">
										<option value="0">Solo puede ser modificado por los administradores</option>
										<option value="1">Puede ser modificado por cualquier invitado</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">F. Inicio</label>
								<div class="col-sm-9">
									<input class="form-control" type="datetime" v-model="modalNew.start" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">F. Fin</label>
								<div class="col-sm-9">
									<input class="form-control" type="datetime" v-model="modalNew.end" />
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="col-sm-5 control-label">Color</label>
									<div class="col-sm-7">
										<input class="form-control" type="color" v-model="modalNew.color" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="col-sm-5 control-label">Fondo</label>
									<div class="col-sm-7">
										<input class="form-control" type="color" v-model="modalNew.backgroundColor" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="col-sm-5 control-label">Borde</label>
									<div class="col-sm-7">
										<input class="form-control" type="color" v-model="modalNew.borderColor" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="col-sm-5 control-label">Texto</label>
									<div class="col-sm-7">
										<input class="form-control" type="color" v-model="modalNew.textColor" />
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="x_panel">
									  <div class="x_title">
										<h2>Invitados</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a @click="addUserStaffNew"><i class="fa fa-plus"></i></a></li>
										</ul>
										<div class="clearfix"></div>
									  </div>
										<div class="x_content">
											<div class="row">
												<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
													<div class="well profile_view">
														<div class="col-sm-12">
															<h4 class="brief"><i><?= $this->user->names; ?> <?= $this->user->surname; ?></i></h4>
															<div class="left col-xs-12">
																<h2>@<?= $this->user->username; ?></h2>
																<ul class="list-unstyled">
																	<li><i class="fa fa-building"></i> <?= $this->user->address; ?></li>
																	<li><i class="fa fa-phone"></i> <?= $this->user->phone; ?></li>
																	<li><i class="fa fa-mobile"></i> <?= $this->user->mobile; ?></li>
																</ul>
															</div>
														</div>
														<div class="col-xs-12 bottom text-center">
															<div class="col-xs-12 col-sm-6 emphasis">
																<p class="ratings"></p>
															</div>
															<div class="col-xs-12 col-sm-6 emphasis">
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-4 col-sm-4 col-xs-12 profile_details" v-for="(staff, staff_i) in staffNew">
													<div class="well profile_view">
														<div class="col-sm-12">
															<h4 class="brief"><i>{{ staff.user.names }} {{ staff.user.surname }}</i></h4>
															<div class="left col-xs-12">
																<h2>@{{ staff.user.username }}</h2>
																<ul class="list-unstyled">
																	<li><i class="fa fa-building"></i> {{ staff.user.address }} </li>
																	<li><i class="fa fa-phone"></i> {{ staff.user.phone }}: </li>
																	<li><i class="fa fa-mobile"></i> {{ staff.user.mobile }}: </li>
																	<li>
																		<select class="form-control" v-model="staff.isAdmin">
																			<option value="0">Solo puede ver el evento</option>
																			<option value="1">Puede editar el evento</option>
																		</select>
																	</li>
																</ul>
															</div>
														</div>
														<div class="col-xs-12 bottom text-center">
															<div class="col-xs-12 col-sm-6 emphasis">
																<p class="ratings"></p>
															</div>
															<div class="col-xs-12 col-sm-6 emphasis">
																<button @click="removeUserInNewEvent(staff)" type="button" class="btn btn-danger btn-xs">
																	<i class="fa fa-times"></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Guardar </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel2">{{ modalView.title }}</h4>
				</div>
				
				<div class="">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">				
							<div class="row">
								<div class="animated flipInY col-sm-offset-2 col-sm-8 col-xs-12">
									<div class="tile-stats">
										<div class="icon">
											<i class="fa fa-calendar"></i>
										</div>
										<div class="count">{{ modalView.description }}</div>
										<h3>{{ modalView.title }}</h3>
										<p>{{ (modalView.description !== null && modalView.description.length > 3) ? modalView.description : 'Sin descripcion' }}</p>
										
										<p>
											<b>Fecha y Hora de Inicio: </b>
											{{ modalView.start }}
										</p>
										<p>
											<b>Fecha y Hora de Finalizacion: </b>
											{{ modalView.end }}
										</p>
										<p>
											<b> </b>
											<select class="form-control" v-model="modalView.editable" readonly="" disabled="">
												<option value="0">Solo puede ser modificado por los administradores</option>
												<option value="1">Puede ser modificado por cualquier invitado</option>
											</select>
										</p>
										<p>
											<b> </b>
											<select class="form-control" v-model="modalView.allDay" readonly="" disabled="">
												<option value="0">Fecha y hora exacta</option>
												<option value="1">El evento es en el transcurso del día.</option>
											</select>
										</p>
										<!-- // 
										<p>
											<b>Área	m²: </b>
											<template v-if="microrouteData !== undefined && microrouteData.lot !== undefined && microrouteData.lot.address_text !== undefined">
												{{ microrouteData.lot.area_m2.toLocaleString() }} m²
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
										-->
										<p v-if="modalView.url !== null && modalView.url.length > 4">
											<a class="btn btn-md btn-info pull-right" >
												Enlace Externo
											</a>
											<button class="btn btn-md btn-warning pull-right" >
												Editar
											</button>
										</p>
										
									</div>
								</div>
							</div>

						</div>
					</div>

					
							<div id="testmodal" style="padding: 5px 20px;">
								<br />
								<div class="clearfix"></div>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="x_panel">
										  <div class="x_title">
											<h2>Invitados</h2>
											<ul class="nav navbar-right panel_toolbox">
												<li v-if="modalView.editable"><a @click="addUserStaffEdit"><i class="fa fa-plus"></i></a></li>
											</ul>
											<div class="clearfix"></div>
										  </div>
											<div class="x_content">
												<div class="row">													
													<div class="col-md-4 col-sm-4 col-xs-12 profile_details" v-for="(staff, staff_i) in modalView['100_events_staff']">
														<div class="well profile_view">
															<div class="col-sm-12">
																<h4 class="brief"><i>{{ staff.user.names }} {{ staff.user.surname }}</i></h4>
																<div class="left col-xs-12">
																	<h2>@{{ staff.user.username }}</h2>
																	<ul class="list-unstyled">
																		<li><i class="fa fa-building"></i> {{ staff.user.address }} </li>
																		<li><i class="fa fa-phone"></i> {{ staff.user.phone }}: </li>
																		<li><i class="fa fa-mobile"></i> {{ staff.user.mobile }}: </li>
																		<li>
																		</li>
																	</ul>
																</div>
															</div>
															<div class="col-xs-12 bottom text-center">
																<div class="col-xs-12 col-sm-6 emphasis">
																	<p class="ratings"></p>
																</div>
																<div class="col-xs-12 col-sm-6 emphasis" v-if="modalView.editable == 1 && staff.user.id !== <?= $this->user->id; ?>">
																	<!-- //
																	<button @click="removeUserInEvent(staff_i)" type="button" class="btn btn-danger btn-xs">
																		<i class="fa fa-times"></i>
																	</button>
																	-->
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cerrar</button>
						<button v-if="modalView.editable" type="button" class="btn btn-primary">Editar </button>
					</div>
			</div>
		</div>
	</div>
	
	
	<div class="modal fade bs-list-users-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				  </button>
				  <h4 class="modal-title" id="myModalLabel">
					<input type="text" class="form-control" v-model="searchTextUser" />
				  </h4>
				</div>
				<div class="modal-body">
					<div class="row" style="max-height:calc(70vh);overflow:auto;">
						<div class="col-md-4 col-sm-4 col-xs-12 profile_details" v-for="(user, user_i) in filterUsers">
							<div class="well profile_view">
								<div class="col-sm-12">
									<h4 class="brief"><i>{{ user.names }} {{ user.surname }}</i></h4>
									<div class="left col-xs-12">
										<h2>@{{ user.username }}</h2>
										<!-- <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p> -->
										<ul class="list-unstyled">
											<li><i class="fa fa-building"></i> {{ user.address }} </li>
											<li><i class="fa fa-phone"></i> {{ user.phone }} </li>
											<li><i class="fa fa-mobile"></i> {{ user.mobile }} </li>
										</ul>
									</div>
								</div>
								<div class="col-xs-12 bottom text-center">
									<div class="col-xs-12 col-sm-6 emphasis">
										<p class="ratings"></p>
									</div>
									<div class="col-xs-12 col-sm-6 emphasis">
										<!-- // <button type="button" class="btn btn-success btn-xs">
											<i class="fa fa-user"></i>
											<i class="fa fa-comments-o"></i>
										</button>-->
										<button v-if="userInEventNew(user) === false && user.id !== <?= $this->user->id; ?>" @click="addUserInNewEvent(user)" type="button" class="btn btn-primary btn-xs">
											<i class="fa fa-plus-circle"> </i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
						
						
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="modal fade bs-update-users-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				  </button>
				  <h4 class="modal-title" id="myModalLabel">
					<input type="text" class="form-control" v-model="searchTextUser" />
				  </h4>
				</div>
				<div class="modal-body">
					<div class="row" style="max-height:calc(70vh);overflow:auto;">
						<div class="col-md-4 col-sm-4 col-xs-12 profile_details" v-for="(user, user_i) in filterUsers">
							<div class="well profile_view">
								<div class="col-sm-12">
									<h4 class="brief"><i>{{ user.names }} {{ user.surname }}</i></h4>
									<div class="left col-xs-12">
										<h2>@{{ user.username }}</h2>
										<!-- <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p> -->
										<ul class="list-unstyled">
											<li><i class="fa fa-building"></i> {{ user.address }} </li>
											<li><i class="fa fa-phone"></i> {{ user.phone }} </li>
											<li><i class="fa fa-mobile"></i> {{ user.mobile }} </li>
										</ul>
									</div>
								</div>
								<div class="col-xs-12 bottom text-center">
									<div class="col-xs-12 col-sm-6 emphasis">
										<p class="ratings"></p>
									</div>
									<div class="col-xs-12 col-sm-6 emphasis">
										<!-- // <button type="button" class="btn btn-success btn-xs">
											<i class="fa fa-user"></i>
											<i class="fa fa-comments-o"></i>
										</button>-->
										<button v-if="userInEventEdit(user) === false && user.id !== <?= $this->user->id; ?>" @click="addUserInEvent(user)" type="button" class="btn btn-primary btn-xs">
											<i class="fa fa-plus-circle"> </i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
						
						
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	
	<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
	<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
</div>

<script>

	   
var app = new Vue({
	data: function () {
		return {
			id_edit: 0,
			searchTextUser: '',
			options: {
				users: [],
			},
			calendar: null,
			modalNew: null,
			staffNew: [],
			modalView: {
				title: null,
				description: null,
				allDay: null,
				start: null,
				end: null,
				url: null,
				editable: 0,
				color: '#d8e9cf',
				backgroundColor: '#d8e9cf',
				borderColor: '#d8e9cf',
				textColor: '#666666',
				update_by: 0,
				"100_events_staff": []
			},
			group: {
				New: {
					invited: []
				}
			},
			events: [],
		};
	},
	created(){
		var self = this;
		self.formCreateReset();
	},
	mounted(){
		var self = this;
		MV.api.read('/users', {
		}, function(a){
			self.options.users = a;
			self.init_calendar();
		});
		
	},
	computed: {
		filterUsers(){
			var self = this;
			try {
				if(self.searchTextUser.length > 3){
					result = [];
					self.options.users.forEach(function(a){
						if(a.username.toLowerCase().indexOf(self.searchTextUser.toLowerCase()) > -1 
							|| (a.names !== null && a.names.toLowerCase().indexOf(self.searchTextUser.toLowerCase()) > -1)
							|| (a.surname !== null && a.surname.toLowerCase().indexOf(self.searchTextUser.toLowerCase()) > -1)
							//|| a.surname.indexOf(self.searchTextUser) > -1
							|| a.email.toLowerCase().indexOf(self.searchTextUser.toLowerCase()) > -1){
							result.push(a);
						}
					});
					return result;
				} else {
					return self.options.users;
				}
			}catch(e){
				return [];
			}			
		},
	},
	methods: {
		addUserStaffNew(){
			var self = this;
			$('.bs-list-users-modal-lg').modal('show');
			
		},
		addUserStaffEdit(){
			var self = this;
			$('.bs-update-users-modal-lg').modal('show');
		},
		addUserInNewEvent(data){
			var self = this;
			if(parseInt(data.id) > 0 && self.userInEventNew(data) == false){
				ins = {isAdmin: 0, user: data };
				self.staffNew.push(ins);
			}
		},
		addUserInEvent(userData){
			var self = this;
			if(userData.id !== undefined && userData.id > 0){
				MV.api.create('/100_events_staff', {
					event: self.modalView.id,
					user: userData.id,
					isAdmin: 0
				}, function(r){
					if(parseInt(r) > 0){
						self.modalView["100_events_staff"].push({
							id: r,
							event: self.modalView.id,
							isAdmin: 0,
							user: userData
						});
					}
				});
			}
			
		},
		removeUserInNewEvent(user){
			var self = this;
			index = self.staffNew.indexOf(user);
			if(parseInt(user.user.id) > 0 && index > -1){
				self.staffNew.splice(index, 1)
			}
		},
		userInEventNew(user){
			var self = this;
			result = self.staffNew.filter((a) => (a.user == user));
			if(result.length > 0){
				return true;
			} else {
				return false;
			}
		},
		userInEventEdit(user){
			var self = this;
			result = self.modalView["100_events_staff"].filter((a) => (a.user == user));
			if(result.length > 0){
				return true;
			} else {
				return false;
			}
		},
		loadMeEvents(){
			var self = this;
			MV.api.read('/100_events', {
				join: [
					'100_events_staff,users',
					'users',
				],
			}, function(rb){
				self.events = rb;
			});
		},
		addEvent(rb){
			var self = this;
			rb = self.jsonEvent(rb);
			self.calendar.fullCalendar('renderEvent', rb,true);
			self.calendar.fullCalendar('unselect');
		},
		jsonEvent(a){
			var self = this;
			//a.editable = (a.editable == 1) ? 1 : (a.created_by.id === undefined && a.created_by == '<?= $this->user->id; ?>') ? 1 : (a.created_by.id !== undefined && a.created_by.id == '<?= $this->user->id; ?>') ? 1 : 0;
			//a['100_events_staff'].forEach(function(b){ a.editable = (b.isAdmin == 1) ? 1 : a.editable; });
			a.editable = self.intToboolean(a.editable);
			a.allDay = self.intToboolean(a.allDay);
			return a;
		},
		editSchedule(){
			var self = this;
			if (self.modalView.id && self.modalView.title) {
				console.log('self.modalView', self.modalView);
				
				MV.api.update('/100_events/' + self.modalView.id, {
					id: self.modalView.id,
					title: self.modalView.title,
					description: self.modalView.description,
					update_by: <?= $this->user->id; ?>
				}, function(r){
					console.log(r);
					if(parseInt(r) > 0){
						self.modalView._id = self.id_edit;
						calendar.fullCalendar('updateEvent', self.modalView);
					}
				});
			} else {
				new PNotify({
					"title": "Error",
					"text": "El evento debe de llevar un titulo.",
					"styling":"bootstrap3",
					"type":"error",
					"icon":true,
					"animation":"zoom",
					"hide":true
				});
			}
		},
		newSchedule(){
			var self = this;
			if (self.modalNew.title) {
				bootbox.confirm({
					title: "Verificacion de actividad",
					message: "Confirma que deseas continuar.",
					buttons: {
						cancel: {
							label: '<i class="fa fa-times"></i> Cerrar'
						},
						confirm: {
							label: '<i class="fa fa-check"></i> Continuar'
						}
					},
					callback: function (result) {
						if(result == true){
							MV.api.create('/100_events', self.modalNew, function(r){
								if(parseInt(r) > 0){
									self.modalNew.id = r;
									self.staffNew.forEach(function(newStaff){
										MV.api.create('/100_events_staff', {
											event: r,
											user: newStaff.user.id,
											isAdmin: newStaff.isAdmin,
										}, function(rgm){
											if(parseInt(rgm) > 0){}
										});
									});
									
									MV.api.create('/100_events_staff', {
										event: r,
										user: self.modalNew.created_by,
										isAdmin: 1,
									}, function(rgm){
										if(parseInt(rgm) > 0){
											MV.api.read('/100_events/' + r, {
												join: [
													'users',
													'100_events_staff,users',
												],
											}, function(rb){
												$('.antoclose').click();
												self.addEvent(rb);
											});
										}
									});
								}
							});
						}
					}
				});
			} else {
				new PNotify({
					"title": "Error",
					"text": "El evento debe de llevar un titulo.",
					"styling":"bootstrap3",
					"type":"error",
					"icon":true,
					"animation":"zoom",
					"hide":true
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
		formCreateReset(){
			var self = this;
			self.staffNew = [];
			self.modalNew = {
				title: null,
				allDay: null,
				start: null,
				end: null,
				url: null,
				editable: 0,
				color: '#d8e9cf',
				backgroundColor: '#6ba74c',
				borderColor: '#6ba74c',
				textColor: '#CCCCCC',
				created_by: <?= $this->user->id; ?>
			};
		},
		init_calendar(){
			var self = this;
			self.formCreateReset();
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
					self.modalNew.start = moment(start).format("YYYY-MM-DD HH:mm:ss");
					self.modalNew.end = moment(end).format("YYYY-MM-DD HH:mm:ss");
					var allDay = !start.hasTime() && !end.hasTime();
					self.modalNew.allDay = self.booleanToint(allDay);
					self.modalNew.editable = 0;
					$('#fc_create').click();
					started = start;
					ended = end;
				},
				eventClick: function(calEvent, jsEvent, view) {
					var allDay = !calEvent.start.hasTime() && !calEvent.end.hasTime();
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
				},
				events: function(start, end, timezone, callback) {
					MV.api.read('/100_events', {
						join: [
							'users',
							'100_events_staff,users',
						],
					}, function(rb){
						events = [];
						rb.forEach(function(ab){
							events.push(self.jsonEvent(ab));
						})
						callback(events);
					});
				}
				//events: [{title: 'All Day Event',start: new Date(y, m, 1)}, {title: 'Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)}, {title: 'Meeting',start: new Date(y, m, d, 10, 30),allDay: false}, {title: 'Lunch',start: new Date(y, m, d + 14, 12, 0),end: new Date(y, m, d, 14, 0),allDay: false}, {title: 'Birthday Party',start: new Date(y, m, d + 1, 19, 0),end: new Date(y, m, d + 1, 22, 30),allDay: false}, {title: 'Click for Google',start: new Date(y, m, 28),end: new Date(y, m, 29),url: 'http://google.com/'}]
			});
		},
	}
}).$mount('#me-calendar');

</script>