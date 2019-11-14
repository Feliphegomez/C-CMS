<div class="page-title">
	<div class="title_left">
		<h3><?= isset($title) ? $title : ""; ?> <small> <?= isset($subtitle) ? $subtitle : ""; ?></small></h3>
	</div>
</div>
<div class="clearfix"></div>

<div class="row" id="accounts-app">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<router-view :key="$route.fullPath" ></router-view>
	</div>
</div>
<div class="clearfix"></div>

<template id="list">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Listado general <small>Cuentas</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<router-link  v-bind:to="{ name: 'Create' }">
									<i class="fa fa-plus"></i> / <i class="fa fa-search"></i>
								</router-link>
							</li>
							<!-- // <li><a @click="load" class="refresh"><i class="glyphicon glyphicon-refresh"></i></a></li> -->
							<!-- //
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a></li>
									<li><a href="#">Settings 2</a></li>
								</ul>
							</li>
							-->
							<!-- // <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<p class="text-muted font-13 m-b-30">
							Las cuentas son aquellas entidades y/o personas naturales a las cuales se les presta servicios y/o projectos, Son requeridas para la facturacion.
						</p>
						<table id="datatable-buttons2" class="table table-striped table-bordered table-responsive">
							<thead></thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<template id="view">
	<div>
		<div class="row  btn-pref btn-group btn-group-justified">
			<div class="col-md-12 col-sm-12 col-xs-12" >
				<div class="x_panel" >
					<div class="x_title">
						<h2>Ver <small>Cuenta</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<!-- // <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li> -->

							<li><a @click="load" class="refresh"><i class="glyphicon glyphicon-refresh"></i></a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a></li>
									<li><a href="#">Settings 2</a></li>
								</ul>
							</li>
							<li>
								<router-link  v-bind:to="{ name: 'List' }">
									<i class="fa fa-close"></i>
								</router-link>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div>
							<center>
								<div class="tabnav">
									<div class="btn-group btn-group-justified ">
										<div class="btn-group  " role="group">
											<button id="b1" type="button" class="btn btn-nav" href="#tab-basic" data-toggle="tab" >
												<div class="visible">
													<span class="glyphicon glyphicon-dashboard" aria-hidden="true"> </span>
													Info. Básica
												</div>
											</button>
										</div>
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-nav" href="#tab-contacts" data-toggle="tab" >
												<div class="visible">
													<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
													Contactos
												</div>
											</button>
										</div>
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-nav" href="#tab-headquarters" data-toggle="tab">
												<div class="visible">
													<span class="fa fa-building-o" aria-hidden="true"></span>
													Sedes
												</div>
											</button>
										</div>
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-nav" href="#tab-requests" data-toggle="tab">
												<div class="visible">
													<span class="fa fa-info-circle" aria-hidden="true"></span>
													Solicitudes
												</div>
											</button>
										</div>

										<!-- //
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-nav" href="#tab-services" data-toggle="tab" >
												<div class="visible">
													<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
													Servicios
												</div>
											</button>
										</div>
										-->

										<!-- //
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-nav" href="#tab-users" data-toggle="tab">
												<div class="visible">
													<span class="fa fa-users" aria-hidden="true"></span>
													Usuarios
												</div>
											</button>
										</div>
										-->

										<!-- //
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-nav" href="#tab4" data-toggle="tab">

											<div class="visible">Multimedia <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span></div>
											</button>
										</div>
										-->

										<!-- //
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-nav" href="#tab5" data-toggle="tab">
											 <div class="visible">Dashboard <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span></div>
											</button>
										</div>
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-nav" href="#tab6" data-toggle="tab">
											<div class="visible">Studio <span class="glyphicon glyphicon-bell"  aria-hidden="true"></span></div>
											</button>
										</div>
										-->
									</div>
								</div>
							</center>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div  class="tab-content" style="margin-top:10px; ">
					<!-- Info Básica -->
					<div class="tab-pane active" id="tab-basic">
						<div class="x_panel">
							<div class="x_content">
								<div class="col-sm-12">
									<div class="card card-default">
										<div class="card-header">
											<h4 class="card-title" style="color: #666;">
												<i class="glyphicon glyphicon-info-sign text-gold"></i>
												<b>I: Informacion Básica</b>
											</h4>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-sm-12">
													<div class="col-sm-5 pull-right">
														<div class="form-group">
															<label class="control-label"># Cuenta</label>
															<input type="text" class="form-control" :value="$root.zfill(record.id, 11)" readonly="true" />
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-12">
													<div class="col-sm-6">
														<div class="form-group">
															<label class="control-label">Tipo de Cliente</label>
															<select class="form-control" v-model="record.type" required="true">
																<option value="">Seleccione una opcion</option>
																<option v-for="(item, index_item) in options.accounts_types" :key="item.id" :value="item.id">{{ item.name }}</option>
															</select>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="control-label">Actividad Economica</label>
															<select v-model="record.economic_activity" id="form-create-economic_activity" required="required" class="form-control">
																<option value="0">Seleccione una opcion.</option>
																<option v-for="(item, index_item) in options.economic_activities" :key="item.id" :value="item.id">{{ item.name }}</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="col-sm-6">
														<div class="form-group">
															<label class="control-label">Tipo de Documento</label>
															<select class="form-control" v-model="record.identification_type" required="true">
																<option value="">Seleccione una opcion</option>
																<option v-for="(item, index_item) in options.identifications_types" :key="item.id" :value="item.id">{{ item.name }}</option>
															</select>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="control-label"># Documento</label>
															<input type="text" class="form-control" v-model="record.identification_number" required="true" />
														</div>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="col-sm-6">
														<div class="form-group">
															<label class="control-label">Nombres</label>
															<input type="text" class="form-control" v-model="record.names" required="true" />
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="control-label">Apellidos</label>
															<input type="text" class="form-control" v-model="record.surname" required="true" />
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="x_panel" class="x_panel" v-if="record.type == 1">
										<div class="x_title">
											<h2>Información Campañas Marketing</h2>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
												<input type="date" v-model="record.birthday" class="form-control has-feedback-left" id="inputSuccess4" placeholder="EFecha de nacimiento (*)">
												<span class="fa fa-birthday-cake form-control-feedback left" aria-hidden="true"></span>
											</div>

											<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="form-create-gender">Genero (*)</label>
												<div class="col-xs-9">
													<select v-model="record.gender" type="text" id="form-create-gender" class="form-control col-md-7 col-xs-12">
														<option></option>
														<option value="male">Masculino</option>
														<option value="female">Femenino</option>
													</select>
												</div>
											</div>
										</div>
									</div>

									<hr />
									<div class="card card-default">
										<div class="card-header">
											<h4 class="card-title" style="color: #666;">
												<i class="glyphicon glyphicon-phone-alt text-gold"></i>
												<b>II: Informacion de contacto</b>
											</h4>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-sm-12">
													<div class="col-sm-4">
														<label class="control-label">Email</label>
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
															<input type="text" class="form-control" v-model="record.email" required="true" />
														</div>
													</div>
													<div class="col-sm-4">
														<label class="control-label">T. Fijo</label>
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
															<input type="text" class="form-control" v-model="record.phone" required="true" />
														</div>
													</div>
													<div class="col-sm-4">
														<label class="control-label">T. Móvil</label>
														<div class="input-group">
															<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
															<input type="text" class="form-control" v-model="record.mobile" required="true" />
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>



									<hr />
									<div class="card card-default">
										<div class="card-header">
											<h4 class="card-title" style="color: #666;">
												<i class="glyphicon glyphicon-map-marker text-gold"></i>
												<b>III: Ubicación</b>
											</h4>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-sm-12">

													<div class="col-md-12 col-sm-12 col-xs-12 form-group">
														<label class="control-label col-xs-12">Dirección</label>
														<div class="col-sm-12">
															<div class="input-group">
																<input readonly="" v-model="addressNormalize.complete" type="text" class="form-control" required="required" class="form-control">
																<span class="input-group-btn">
																	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addresses-modal">
																		<i class="fa fa-search"></i>
																	</button>

																</span>
															</div>
														</div>

														<!-- //
														<div class="col-xs-12">
															<textarea v-model="form.address" type="text" id="form-create-type" required="required" class="form-control">{{ form.address }}</textarea>
														</div>
														-->
													</div>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
									</div>
									<hr />
									<div class="card card-default">
										<div class="pull-right">
											<a @click="saveAccount" class="btn btn-md btn-default">
												<i class="fa fa-save"></i>
												Guardar
											</a>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<!-- // Info Básica -->
					<!-- Contactos -->
					<div class="tab-pane panel" id="tab-contacts">
						<div class="x_panel">
							<div class="x_title">
								<h2>
									<i class="fa fa-user text-gold"></i>
									<b>Contactos</b>
								</h2>
								<ul class="nav navbar-right panel_toolbox">
									<!-- // <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li> -->
									<li>
										<a data-toggle="modal" data-target="#create-contact-modal" style="color: #666;">
											<i class="glyphicon glyphicon-plus"></i>
											Nuevo
										</a>
									</li>
									<li>
										<a data-toggle="modal" data-target="#search-contact-modal" style="color: #666;">
											<i class="glyphicon glyphicon-search"></i>
											Existente
										</a>
									</li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<template v-if="record.accounts_contacts !== undefined && record.accounts_contacts !== null">
									<template v-if="record.accounts_contacts.length > 0">
										<div class="col-md-12">
											<div class="x_panel">
												<div class="x_content">
													<div class="row">
														<!--
															<div class="col-md-12 col-sm-12 col-xs-12 text-center">
																<ul class="pagination pagination-split">
																	<li><a href="#">A</a></li>
																	<li><a href="#">B</a></li>
																	<li><a href="#">C</a></li>
																	<li><a href="#">D</a></li>
																	<li><a href="#">E</a></li>
																	<li>...</li>
																	<li><a href="#">W</a></li>
																	<li><a href="#">X</a></li>
																	<li><a href="#">Y</a></li>
																	<li><a href="#">Z</a></li>
																</ul>
															</div>
														-->

														<div v-for="(contact, index_contact) in record.accounts_contacts" class="col-md-4 col-sm-4 col-xs-6">
															<div class="profile_details">
																<div class="well profile_view">
																	<div class="col-sm-12">
																		<template v-if="contact.type !== undefined && contact.type.name !== undefined">
																			<h4 class="brief"><i>{{ contact.type.name }}</i></h4>
																		</template>
																		<div class="left col-xs-12">
																			<template v-if="contact.contact !== undefined && contact.contact.id !== undefined">
																				<h2>{{ contact.contact.names }} {{ contact.contact.surname }} </h2>


																				<!-- // <p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p> -->
																				<p>
																					<strong><i class="glyphicon glyphicon-phone-alt"></i>: </strong>
																					 {{ contact.contact.phone }}
																				</p>
																				<p>
																					<strong><i class="glyphicon glyphicon-phone"></i>: </strong>
																					 {{ contact.contact.mobile }}
																				</p>
																				<ul class="list-unstyled">
																					<li><i class="fa fa-building"></i> Dirección: {{ contact.contact.address }}</li>
																					<li></li>
																					<li></li>
																				</ul>
																			</template>

																		</div>
																		<div class="right col-xs-5 text-center">
																			<!-- // <img src="/public/assets/images/img.jpg" alt="" class="img-circle img-responsive"> -->

																		</div>
																	</div>
																	<div class="col-xs-12 bottom text-center">
																		<div class="col-xs-12 col-sm-6 emphasis">
																			<!-- //
																			<p class="ratings">
																				<a>4.0</a>
																				<a href="#"><span class="fa fa-star"></span></a>
																				<a href="#"><span class="fa fa-star"></span></a>
																				<a href="#"><span class="fa fa-star"></span></a>
																				<a href="#"><span class="fa fa-star"></span></a>
																				<a href="#"><span class="fa fa-star-o"></span></a>
																			</p>
																			-->
																		</div>
																		<div class="col-xs-12 col-sm-12 emphasis">
																			<!-- //
																			<button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
																				</i> <i class="fa fa-comments-o"></i>
																			</button>
																			-->
																			<button @click="removeContactInAccount(contact.id)" type="button" class="btn btn-danger btn-xs pull-left">
																				<i class="fa fa-times"> </i> Quitar
																			</button>
																			<button @click="loadContactInModal(contact.contact.id)" type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#view-contacts-modal">
																				<i class="fa fa-user"> </i> Ver
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
									</template>
									<template v-else>
										<p>
											Esta cuanta no tiene contactos, Agrega almenos 1.
										</p>
									</template>
								</template>
							</div>
						</div>
					</div>
					<!-- // Contactos -->
					<!-- Servicios -->
					<div class="tab-pane panel" id="tab-services">
						<div class="x_panel">
							<div class="x_title">
								<h2>
									<i class="glyphicon glyphicon-search text-gold"></i>
									<b>Servicios</b>
								</h2>
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
							</div>
						</div>
					</div>
					<!-- // Servicios -->
					<!-- Sedes -->
					<div class="tab-pane panel" id="tab-headquarters">
						<div class="x_panel">
							<div class="x_title">
								<h2>
									<i class="glyphicon glyphicon-search text-gold"></i>
									<b>Sedes</b>
								</h2>
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
									-->
									<li>
										<a data-toggle="modal" data-target="#headquarters-modal"><i class="fa fa-plus"></i></a>
									</li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">

									<!-- start project list -->
									<table class="table table-striped projects">
										<thead>
											<tr>
											  <th style="width: 1%">#</th>
											  <th style="width: 20%">Sede</th>
											  <th>Direccion</th>
											  <th style="width: 10%">Acciones</th>
											</tr>
										</thead>
										<tbody>
											<template v-if="record.accounts_headquarters.length > 0">
												<tr v-for="(headquarter, index_headquarter) in record.accounts_headquarters">
													<td>#</td>
													<td>
														<a>{{ headquarter.name }}</a>
														<!-- // <br />
														<small>Created 01.01.2015</small> -->
													</td>
													<td>
														{{ headquarter.address.complete }}
													</td>
													<td>
														<a @click="removeHeadquarters(headquarter.id)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Quitar Sede </a>
														<!-- //
														<router-link tag="a" v-bind:to="{ name: 'Project-Details', params: { account_id: $route.params.account_id, project_id: 0 } }" class="btn btn-primary btn-xs">
															<i class="fa fa-folder"></i> Ver </a>
														</router-link>
														<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
														<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
														-->
													</td>
												</tr>
											</template>
										</tbody>
									</table>
									<!-- end project list -->

							</div>
						</div>
					</div>
					<!-- // Sedes -->
					<!-- Usuarios -->
					<div class="tab-pane panel" id="tab-requests">
						<div class="x_panel">
							<div class="x_title">
								<h2>
									<i class="fa fa-info-circle"></i>
									<b>Solicitudes</b>
								</h2>
								<ul class="nav navbar-right panel_toolbox">
									<li>
										<router-link  v-bind:to="{ name: 'Create-Request', params: { account_id: $route.params.account_id } }">
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										</router-link>
									</li>



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
								{{ record.requests }}
								<hr>
							</div>
						</div>
					</div>
					<!-- // Usuarios -->
					<!-- Usuarios -->
					<div class="tab-pane panel" id="tab-users">
						<div class="x_panel">
							<div class="x_title">
								<h2>
									<i class="glyphicon glyphicon-search text-gold"></i>
									<b>Usuarios</b>
								</h2>
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
							</div>
						</div>
					</div>
					<!-- // Usuarios -->
				</div>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-7">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-nav" href="#tab4" data-toggle="tab">
						<div class="visible">
							<router-link  v-bind:to="{ name: 'Create' }">
								<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
								Regresar
							</router-link>
						</div>
					</button>
				</div>
			</div>
		</div>

		<!-- Modal View and Edit  -->
		<div class="modal fade" id="view-contacts-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="modalLabelSmall">Ver Contacto</h4>
					</div>
					<div class="modal-body">
						<div class="container bootstrap snippet">
							<div class="row">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#home">Contacto</a></li>
									<!-- //
										<li><a data-toggle="tab" href="#messages">Menu 1</a></li>
										<li><a data-toggle="tab" href="#settings">Menu 2</a></li>
									-->
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="home">
										<form class="form" action="javascript:false;" v-on:submit="saveContactModal" method="post" id="registrationForm">
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Tipo Documento</h4></label>
													<select class="form-control" v-model="contactModal.identification_type" name="contact_identification_identification_type" id="contact_identification_type" required="true">
														<option value="">Seleccione una opcion</option>
														<option v-for="(item, index_item) in options.identifications_types" :key="item.id" :value="item.id">{{ item.name }}</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4># Documento</h4></label>
													<input type="text" class="form-control" name="contact_identification_number" id="contact_identification_number" placeholder="Numero documento de identidad" title="Ingrese el numero de documento de identificación." v-model="contactModal.identification_number">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Nombres</h4></label>
													<input type="text" class="form-control" name="contact_names" id="contact_names" placeholder="Nombres" title="Ingrese el/los nombre(s) completo." v-model="contactModal.names">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Apellidos</h4></label>
													<input type="text" class="form-control" name="contact_surname" id="contact_surname" placeholder="Apellidos" title="Ingrese el/los apellidos." v-model="contactModal.surname">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Correo Electronico</h4></label>
													<input type="email" class="form-control" name="contact_email" id="contact_email" placeholder="" title="Ingrese el correo electronico." v-model="contactModal.email">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Telefono Fijo</h4></label>
													<input type="text" class="form-control" name="contact_" id="contact_" placeholder="" title="Ingrese el teléfono fijo." v-model="contactModal.phone">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Telefono Móvil</h4></label>
													<input type="text" class="form-control" name="contact_mobile" id="contact_mobile" placeholder="Telefono Celular / Movil" title="Ingrese el teléfono móvil." v-model="contactModal.mobile">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Fecha de cumpleaños</h4></label>
													<input type="text" class="form-control" name="contact_birthdayEdit" id="contact_birthdayEdit" placeholder="" title="Cumpleaños." v-model="contactModal.birthday">
													Formato: AÑO-MES-DÍA
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="mobile"><h4>Departamento</h4></label>

													<select class="form-control" v-model="contactModal.department" @change="loadCitysModal(contactModal.department)">
														<option value="">Seleccione una opcion</option>
														<option v-for="(item, index_item) in options.geo_departments" :key="item.id" :value="item.id">{{ item.name }}</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="email"><h4>Ciudad</h4></label>
													<select class="form-control" v-model="contactModal.city">
														<option value="">Seleccione una opcion</option>
														<option v-for="(item, index_item) in options.geo_citysModal" :key="item.id" :value="item.id">{{ item.name }}</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="email"><h4>Dirección</h4></label>
													<textarea type="text" class="form-control">{{ contactModal.address }}</textarea>
												</div>
											</div>

											<div class="form-group">
												<div class="col-xs-12">
													<br>
													<button class="btn btn-sm btn-success" type="submit">
														<i class="glyphicon glyphicon-floppy-disk"></i>
														Guardar
													</button>
													<!-- <button class="btn btn-sm" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
													<button class="btn btn-sm pull-right" type="button"  class="close" data-dismiss="modal" aria-label="Close">
														<i class="glyphicon glyphicon-remove"></i>
														Cerrar
													</button>
												</div>
											</div>
										</form>
										<hr>
									</div>
									<!-- tab-pane-->
									<div class="tab-pane" id="messages"></div>
									<!-- /tab-pane-->
									<!-- tab-pane-->
									<div class="tab-pane" id="settings"></div>
									<!-- /tab-pane-->
								</div>
								<!--/tab-content-->
							</div>
							<!--/row-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Modal View and Edit  -->

		<!-- Modal New -->
		<div class="modal fade" id="create-contact-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="modalLabelSmall">Nuevo Contacto</h4>
					</div>
					<div class="modal-body">
						<div class="container bootstrap snippet">
							<div class="row">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#home">Contacto</a></li>
									<!-- //
										<li><a data-toggle="tab" href="#messages">Menu 1</a></li>
										<li><a data-toggle="tab" href="#settings">Menu 2</a></li>
									-->
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="home">
										<form class="form" action="javascript:false;" v-on:submit="createContactModalAndInclude" method="post" id="registrationForm">
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Tipo Documento (*)</h4></label>
													<select class="form-control" v-model="contactModalCreate.identification_type" name="contact_identification_identification_type" id="contact_identification_type" required="true">
														<option value="">Seleccione una opcion</option>
														<option v-for="(item, index_item) in options.identifications_types" :key="item.id" :value="item.id">{{ item.name }}</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4># Documento (*)</h4></label>
													<input type="text" required="" class="form-control" name="contact_identification_number" id="contact_identification_number" placeholder="Numero documento de identidad" title="Ingrese el numero de documento de identificación." v-model="contactModalCreate.identification_number">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Nombres (*)</h4></label>
													<input type="text" required="" class="form-control" name="contact_names" id="contact_names" placeholder="Nombres" title="Ingrese el/los nombre(s) completo." v-model="contactModalCreate.names">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Apellidos (*)</h4></label>
													<input type="text" required="" class="form-control" name="contact_surname" id="contact_surname" placeholder="Apellidos" title="Ingrese el/los apellidos." v-model="contactModalCreate.surname">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Correo Electronico (*)</h4></label>
													<input type="email" required="" class="form-control" name="contact_email" id="contact_email" placeholder="" title="Ingrese el correo electronico." v-model="contactModalCreate.email">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Telefono Fijo</h4></label>
													<input type="text" class="form-control" name="contact_" id="contact_" placeholder="" title="Ingrese el teléfono fijo." v-model="contactModalCreate.phone">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Telefono Móvil</h4></label>
													<input type="text" class="form-control" name="contact_mobile" id="contact_mobile" placeholder="Telefono Celular / Movil" title="Ingrese el teléfono móvil." v-model="contactModalCreate.mobile">
												</div>
											</div>

											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Fecha de cumpleaños</h4></label>
													<input type="text" class="form-control" name="contact_birthday" id="contact_birthday" placeholder="" title="Cumpleaños." v-model="contactModalCreate.birthday">
													Formato: AÑO-MES-DÍA
												</div>
											</div>


											<div class="form-group">
												<div class="col-xs-6">
													<label for="mobile"><h4>Departamento</h4></label>

													<select class="form-control" v-model="contactModalCreate.department" @change="loadCitysModal(contactModalCreate.department)">
														<option value="">Seleccione una opcion</option>
														<option v-for="(item, index_item) in options.geo_departments" :key="item.id" :value="item.id">{{ item.name }}</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="email"><h4>Ciudad</h4></label>
													<select class="form-control" v-model="contactModalCreate.city" >
														<option value="">Seleccione una opcion</option>
														<option v-for="(item, index_item) in options.geo_citysModal" :key="item.id" :value="item.id">{{ item.name }}</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="email"><h4>Dirección</h4></label>
													<textarea type="text" class="form-control">{{ contactModalCreate.address }}</textarea>
												</div>
											</div>

											<div class="form-group">
												<div class="col-xs-12">
													<br>
													<button class="btn btn-sm btn-success" type="submit">
														<i class="glyphicon glyphicon-floppy-disk"></i>
														Guardar
													</button>
													<!-- <button class="btn btn-sm" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
													<button class="btn btn-sm pull-right" type="button"  class="close" data-dismiss="modal" aria-label="Close">
														<i class="glyphicon glyphicon-remove"></i>
														Cerrar
													</button>
												</div>
											</div>
										</form>
										<hr>
									</div>
									<!-- tab-pane-->
									<div class="tab-pane" id="messages"></div>
									<!-- /tab-pane-->
									<!-- tab-pane-->
									<div class="tab-pane" id="settings"></div>
									<!-- /tab-pane-->
								</div>
								<!--/tab-content-->
							</div>
							<!--/row-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Modal New -->

		<!-- Modal Search -->
		<div class="modal fade" id="search-contact-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="modalLabelSmall">buscar Contacto</h4>
					</div>
					<div class="modal-body">
						<div class="container bootstrap snippet">
							<div class="row">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#home">Contacto</a></li>
									<!-- //
										<li><a data-toggle="tab" href="#messages">Menu 1</a></li>
										<li><a data-toggle="tab" href="#settings">Menu 2</a></li>
									-->
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="home">
										<form class="form" action="javascript:false;" v-on:submit="searchContactModal" method="post" id="registrationForm">
											<div class="form-group">
												<div class="col-xs-5">
													<label for="first_name"><h4>Tipo Documento (*)</h4></label>
													<select class="form-control" v-model="contactModalSearch.identification_type" name="contact_identification_identification_type" id="contact_identification_type" required="true">
														<option value="">Seleccione una opcion</option>
														<option v-for="(item, index_item) in options.identifications_types" :key="item.id" :value="item.id">{{ item.name }}</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-5">
													<label for="first_name"><h4># Documento (*)</h4></label>
													<input type="text" required="" class="form-control" name="contact_identification_number" id="contact_identification_number" placeholder="Numero documento de identidad" title="Ingrese el numero de documento de identificación." v-model="contactModalSearch.identification_number">
												</div>
											</div>

											<div class="form-group">
												<div class="col-xs-2">
													<button class="btn btn-sm btn-info" type="submit">
														<i class="glyphicon glyphicon-search"></i>
														Buscar
													</button>
													<br />
													<button @click="includeContactModalSearch" class="btn btn-sm btn-success" type="button" v-if="contactModalSearch.id !== null && contactModalSearch.id !== undefined && contactModalSearch.id > 0">
														<i class="glyphicon glyphicon-ok"></i>
														Añadir
													</button>
												</div>
											</div>
										</form>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Nombres (*)</h4></label>
													<input readonly="" type="text" required="" class="form-control" name="contact_names" id="contact_names" placeholder="Nombres" title="Ingrese el/los nombre(s) completo." v-model="contactModalSearch.names">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Apellidos (*)</h4></label>
													<input readonly="" type="text" required="" class="form-control" name="contact_surname" id="contact_surname" placeholder="Apellidos" title="Ingrese el/los apellidos." v-model="contactModalSearch.surname">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Correo Electronico (*)</h4></label>
													<input readonly="" type="email" required="" class="form-control" name="contact_email" id="contact_email" placeholder="" title="Ingrese el correo electronico." v-model="contactModalSearch.email">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Telefono Fijo</h4></label>
													<input readonly="" type="text" class="form-control" name="contact_" id="contact_" placeholder="" title="Ingrese el teléfono fijo." v-model="contactModalSearch.phone">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Telefono Móvil</h4></label>
													<input readonly="" type="text" class="form-control" name="contact_mobile" id="contact_mobile" placeholder="Telefono Celular / Movil" title="Ingrese el teléfono móvil." v-model="contactModalSearch.mobile">
												</div>
											</div>

											<div class="form-group">
												<div class="col-xs-6">
													<label for="first_name"><h4>Fecha de cumpleaños</h4></label>
													<input readonly="" type="text" class="form-control" name="contact_birthday" id="contact_birthday" placeholder="" title="Cumpleaños." v-model="contactModalSearch.birthday">
													Formato: AÑO-MES-DÍA
												</div>
											</div>


											<div class="form-group">
												<div class="col-xs-12">
													<br>
													<!-- <button class="btn btn-sm" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
													<button class="btn btn-sm pull-right" type="button"  class="close" data-dismiss="modal" aria-label="Close">
														<i class="glyphicon glyphicon-remove"></i>
														Cerrar
													</button>
												</div>
											</div>
										<hr>
									</div>
									<!-- tab-pane-->
									<div class="tab-pane" id="messages"></div>
									<!-- /tab-pane-->
									<!-- tab-pane-->
									<div class="tab-pane" id="settings"></div>
									<!-- /tab-pane-->
								</div>
								<!--/tab-content-->
							</div>
							<!--/row-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Modal Search -->

		<!-- Modal Addresses -->
		<div class="modal fade" id="addresses-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="modalLabelSmall">Normalizar Direcciones</h4>
					</div>
					<div class="modal-body">
						<form class="form" action="javascript:false;" v-on:submit="NormalizeAddressesModal" method="post">

							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								<select @change="loadCitys" v-model="addressNormalize.department" type="text" id="inputSuccess2" required="required" class="form-control has-feedback-left">
									<option value="">Elija un departamento...</option>
									<option v-for="(item, index_item) in options.geo_departments" :key="item.id" :value="item.id">{{ item.name }}</option>
								</select>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								<select v-model="addressNormalize.city" type="text" id="inputSuccess2" required="required" class="form-control has-feedback-left">
									<option value="">Elija una ciudad...</option>
									<option v-for="(item, index_item) in options.geo_citys" :key="item.id" :value="item.id">{{ item.name }}</option>
								</select>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>

							<div class="col-xs-4">
								<h5>Via principal. (*)</h5>
								<div class="form-group">
									<select v-model="addressNormalize.via_principal" required="required" class="form-control">
										<option value="">Elija una opción...</option>
										<option v-for="(item, index_item) in options.geo_types_vias" :key="item.id" :value="item.id">{{ item.name }} - {{ item.code }}</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Num. (*)</h5>
								<div class="form-group">
									<input v-model="addressNormalize.via_principal_number" type="text" required="" class="form-control" />
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Letra</h5>
								<div class="form-group">
									<input v-model="addressNormalize.via_principal_letter" type="text" class="form-control" />
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Cuadrante</h5>
								<div class="form-group">
									<select v-model="addressNormalize.via_principal_quadrant" class="form-control">
										<option value="">Elija una opción...</option>
										<option v-for="(item, index_item) in options.geo_types_quadrants" :key="item.id" :value="item.code">{{ item.name }}</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Num. (*)</h5>
								<div class="form-group">
									<input v-model="addressNormalize.via_secondary_number" type="text" required="" class="form-control" />
								</div>
							</div>

							<div class="col-xs-2">
								<h5>Letra.</h5>
								<div class="form-group">
									<input v-model="addressNormalize.via_secondary_letter" type="text" class="form-control" />
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Cuadrante</h5>
								<div class="form-group">
									<select v-model="addressNormalize.via_secondary_quadrant" class="form-control">
										<option value="">Elija una opción...</option>
										<option v-for="(item, index_item) in options.geo_types_quadrants" :key="item.id" :value="item.code">{{ item.name }}</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Num. (*)</h5>
								<div class="form-group">
									<input v-model="addressNormalize.via_end_number" type="text" required="" class="form-control" />
								</div>
							</div>

							<div class="col-xs-12">
								<h5>Complemento</h5>
								<div class="form-group">
									<input v-model="addressNormalize.via_end_extra" type="text" class="form-control" />
								</div>
							</div>
							<div class="col-xs-12">
								<h5>Simple</h5>
								<div class="form-group">
									<input v-model="repairAddressMin" type="text" readonly="" class="form-control" />
								</div>
							</div>
							<div class="col-xs-12">
								<h5>Completo</h5>
								<div class="form-group">
									<input v-model="repairAddressFull" type="text" readonly="" class="form-control" />
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
										<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancelar</button>
										<button class="btn btn-primary" type="reset">Limpiar Formulario</button>
										<button v-if="addressNormalizeError === false" type="submit" class="btn btn-success">Guardar Direccion</button>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								{{ addressNormalize }}
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Modal Addresses -->

		<!-- Modal headquarters -->
		<div class="modal fade" id="headquarters-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="modalLabelSmall">Normalizar Direcciones</h4>
					</div>
					<div class="modal-body">
						<form class="form" action="javascript:false;" v-on:submit="NormalizeheadquartersModal" method="post">

							<div class="col-xs-12">
								<h5>Nombre o alias de la Sede. (*)</h5>
								<div class="form-group">
									<input v-model="headquarterName" type="text" required="" class="form-control" />
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								<select @change="loadCitysHeadquarters" v-model="headquartersNormalize.department" type="text" id="inputSuccess2" required="required" class="form-control has-feedback-left">
									<option value="">Elija un departamento...</option>
									<option v-for="(item, index_item) in options.geo_departments" :key="item.id" :value="item.id">{{ item.name }}</option>
								</select>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								<select v-model="headquartersNormalize.city" type="text" id="inputSuccess2" required="required" class="form-control has-feedback-left">
									<option value="">Elija una ciudad...</option>
									<option v-for="(item, index_item) in options.geo_citys" :key="item.id" :value="item.id">{{ item.name }}</option>
								</select>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>

							<div class="col-xs-4">
								<h5>Via principal. (*)</h5>
								<div class="form-group">
									<select v-model="headquartersNormalize.via_principal" required="required" class="form-control">
										<option value="">Elija una opción...</option>
										<option v-for="(item, index_item) in options.geo_types_vias" :key="item.id" :value="item.id">{{ item.name }} - {{ item.code }}</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Num. (*)</h5>
								<div class="form-group">
									<input v-model="headquartersNormalize.via_principal_number" type="text" required="" class="form-control" />
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Letra</h5>
								<div class="form-group">
									<input v-model="headquartersNormalize.via_principal_letter" type="text" class="form-control" />
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Cuadrante</h5>
								<div class="form-group">
									<select v-model="headquartersNormalize.via_principal_quadrant" class="form-control">
										<option value="">Elija una opción...</option>
										<option v-for="(item, index_item) in options.geo_types_quadrants" :key="item.id" :value="item.code">{{ item.name }}</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Num. (*)</h5>
								<div class="form-group">
									<input v-model="headquartersNormalize.via_secondary_number" type="text" required="" class="form-control" />
								</div>
							</div>

							<div class="col-xs-2">
								<h5>Letra.</h5>
								<div class="form-group">
									<input v-model="headquartersNormalize.via_secondary_letter" type="text" class="form-control" />
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Cuadrante</h5>
								<div class="form-group">
									<select v-model="headquartersNormalize.via_secondary_quadrant" class="form-control">
										<option value="">Elija una opción...</option>
										<option v-for="(item, index_item) in options.geo_types_quadrants" :key="item.id" :value="item.code">{{ item.name }}</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Num. (*)</h5>
								<div class="form-group">
									<input v-model="headquartersNormalize.via_end_number" type="text" required="" class="form-control" />
								</div>
							</div>

							<div class="col-xs-12">
								<h5>Complemento</h5>
								<div class="form-group">
									<input v-model="headquartersNormalize.via_end_extra" type="text" class="form-control" />
								</div>
							</div>
							<div class="col-xs-12">
								<h5>Simple</h5>
								<div class="form-group">
									<input v-model="repairheadquartersMin" type="text" readonly="" class="form-control" />
								</div>
							</div>
							<div class="col-xs-12">
								<h5>Completo</h5>
								<div class="form-group">
									<input v-model="repairheadquartersFull" type="text" readonly="" class="form-control" />
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
										<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancelar</button>
										<button class="btn btn-primary" type="reset">Limpiar Formulario</button>
										<button v-if="headquartersNormalizeError === false" type="submit" class="btn btn-success">Guardar Direccion</button>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								{{ headquartersNormalize }}
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Modal headquarters -->
	</div>
</template>

<template id="create">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Crear <small>Cuenta</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<router-link  v-bind:to="{ name: 'List' }">
									<i class="fa fa-close"></i>
								</router-link>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<form v-on:submit="searchAccount" action="javascript:return false;" >
							<div class="row">
								<div class="col-sm-6 form-group has-feedback">
									<div class="col-xs-12">
										<label class="control-label" for="form-create-identification_number">Tipo de Cliente</label>
										<select v-model="form.identification_type" type="text" id="form-create-identification_type" required="required" class="form-control has-feedback-left">
											<option value="0">-- Tipo de Cliente --</option>
											<option v-for="(item, index_item) in options.identifications_types" :key="item.id" :value="item.id">{{ item.code }} - {{ item.name }}</option>
										</select>
										<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
									</div>
								</div>
								<div class="col-sm-6 form-group has-feedback">
									<div class="col-xs-12">
										<label class="control-label" for="form-create-identification_number"># Documento</label>
										<div class="has-feedback-left">
											<div class="input-group col-xs-11">
												<input type="text" v-model="form.identification_number" id="form-create-identification_number" name="form-create-identification_number" required="required" class="form-control" />
												<span class="input-group-btn">
													<button type="submit" class="btn btn-primary">
														<i class="fa fa-search"></i>
													</button>
												</span>
											</div>
										</div>
										<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<template v-if="form_enabled == true">
					<form v-on:submit="createAccount" class="form-horizontal- form-label-left input_mask" action="javascript:return false;">
						<div class="x_panel">
							<div class="x_title">
								<h2>Información Básica</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="col-md-6 col-sm-6 col-xs-6 form-group">
									<select v-model="form.type" id="form-create-type" required="required" class="form-control">
										<option value="0">-- Tipo de Cliente --</option>
										<option v-for="(item, index_item) in options.accounts_types" :key="item.id" :value="item.id">{{ item.name }}</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
									<select v-model="form.economic_activity" id="form-create-economic_activity" required="required" class="form-control">
										<option value="0">-- Actividad Economica --</option>
										<option v-for="(item, index_item) in options.economic_activities" :key="item.id" :value="item.id">{{ item.name }}</option>
									</select>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" v-model="form.names" class="form-control has-feedback-left" id="inputSuccess2" required="required" :placeholder="(form.type == 1) ? 'Nombre(s)' : 'Razon social' + '(*)'" />
									<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" v-model="form.surname" class="form-control" id="inputSuccess3" required="required" :placeholder="(form.type == 1) ? 'Apellido(s)' : 'Nombre comercial' + '(*)'" />
									<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
									<input type="email" v-model="form.email" class="form-control has-feedback-left" id="inputSuccess4" required="required" placeholder="Email / Correo electronico (*)">
									<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
									<input type="text" v-model="form.phone" class="form-control" id="inputSuccess5" required="required" placeholder="T. Fijo">
									<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
								</div>

								<div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
									<input type="text" v-model="form.mobile" class="form-control" id="inputSuccess6" required="required" placeholder="T. Móvil">
									<span class="fa fa-mobile form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
						</div>

						<div class="x_panel" class="x_panel" v-if="form.type == 1">
							<div class="x_title">
								<h2>Información Campañas Marketing</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="date" v-model="form.birthday" class="form-control has-feedback-left" id="inputSuccess4" placeholder="EFecha de nacimiento (*)">
									<span class="fa fa-birthday-cake form-control-feedback left" aria-hidden="true"></span>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="form-create-gender">Genero (*)</label>
									<div class="col-xs-9">
										<select v-model="form.gender" type="text" id="form-create-gender" class="form-control col-md-7 col-xs-12">
											<option></option>
											<option value="male">Masculino</option>
											<option value="female">Femenino</option>
										</select>
									</div>
								</div>
							</div>
						</div>


						<div class="x_panel" class="x_panel">
							<div class="x_title">
								<h2>Dirección Principal</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="col-md-12 col-sm-12 col-xs-12 form-group">
									<label class="control-label col-xs-12">Dirección</label>
									<div class="col-sm-12">
										<div class="input-group">
											<input readonly="" v-model="addressNormalize.complete" type="text" class="form-control" required="required" class="form-control">
											<span class="input-group-btn">
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addresses-modal">
													<i class="fa fa-search"></i>
												</button>

											</span>
										</div>
									</div>

									<!-- //
									<div class="col-xs-12">
										<textarea v-model="form.address" type="text" id="form-create-type" required="required" class="form-control">{{ form.address }}</textarea>
									</div>
									-->
								</div>
							</div>
						</div>

						<div>
							<div class="x_content">

							</div>
						</div>
						<div>
							<div class="x_content">
								<div class="form-group">
									<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
										<button type="button" class="btn btn-primary">Cancelar</button>
										<button class="btn btn-primary" type="reset">Limpiar Formulario</button>
										<button type="submit" class="btn btn-success">Crear</button>
									</div>
								</div>
							</div>
						</div>
						<div>
							<div class="x_content">
								{{ form }}
							</div>
						</div>
					</form>
				</template>

			</div>
		</div>

		<!-- Modal Addresses -->
		<div class="modal fade" id="addresses-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="modalLabelSmall">Normalizar Direcciones</h4>
					</div>
					<div class="modal-body">
						<form class="form" action="javascript:false;" v-on:submit="NormalizeAddressesModal" method="post">

							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								<select @change="loadCitys" v-model="addressNormalize.department" type="text" id="inputSuccess2" required="required" class="form-control has-feedback-left">
									<option value="">Elija un departamento...</option>
									<option v-for="(item, index_item) in options.geo_departments" :key="item.id" :value="item.id">{{ item.name }}</option>
								</select>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								<select v-model="addressNormalize.city" type="text" id="inputSuccess2" required="required" class="form-control has-feedback-left">
									<option value="">Elija una ciudad...</option>
									<option v-for="(item, index_item) in options.geo_citys" :key="item.id" :value="item.id">{{ item.name }}</option>
								</select>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>

							<div class="col-xs-4">
								<h5>Via principal. (*)</h5>
								<div class="form-group">
									<select v-model="addressNormalize.via_principal" required="required" class="form-control">
										<option value="">Elija una opción...</option>
										<option v-for="(item, index_item) in options.geo_types_vias" :key="item.id" :value="item.id">{{ item.name }} - {{ item.code }}</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Num. (*)</h5>
								<div class="form-group">
									<input v-model="addressNormalize.via_principal_number" type="text" required="" class="form-control" />
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Letra</h5>
								<div class="form-group">
									<input v-model="addressNormalize.via_principal_letter" type="text" class="form-control" />
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Cuadrante</h5>
								<div class="form-group">
									<select v-model="addressNormalize.via_principal_quadrant" class="form-control">
										<option value="">Elija una opción...</option>
										<option v-for="(item, index_item) in options.geo_types_quadrants" :key="item.id" :value="item.code">{{ item.name }}</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Num. (*)</h5>
								<div class="form-group">
									<input v-model="addressNormalize.via_secondary_number" type="text" required="" class="form-control" />
								</div>
							</div>

							<div class="col-xs-2">
								<h5>Letra.</h5>
								<div class="form-group">
									<input v-model="addressNormalize.via_secondary_letter" type="text" class="form-control" />
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Cuadrante</h5>
								<div class="form-group">
									<select v-model="addressNormalize.via_secondary_quadrant" class="form-control">
										<option value="">Elija una opción...</option>
										<option v-for="(item, index_item) in options.geo_types_quadrants" :key="item.id" :value="item.code">{{ item.name }}</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<h5>Num. (*)</h5>
								<div class="form-group">
									<input v-model="addressNormalize.via_end_number" type="text" required="" class="form-control" />
								</div>
							</div>

							<div class="col-xs-12">
								<h5>Complemento</h5>
								<div class="form-group">
									<input v-model="addressNormalize.via_end_extra" type="text" class="form-control" />
								</div>
							</div>
							<div class="col-xs-12">
								<h5>Simple</h5>
								<div class="form-group">
									<input v-model="repairAddressMin" type="text" readonly="" class="form-control" />
								</div>
							</div>
							<div class="col-xs-12">
								<h5>Completo</h5>
								<div class="form-group">
									<input v-model="repairAddressFull" type="text" readonly="" class="form-control" />
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
										<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancelar</button>
										<button class="btn btn-primary" type="reset">Limpiar Formulario</button>
										<button v-if="addressNormalizeError === false" type="submit" class="btn btn-success">Guardar Direccion</button>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								{{ addressNormalize }}
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Modal Addresses -->
	</div>
</template>

<template id="create-requests">
	<div>
		<form v-on:submit="newRequest" action="javascript:return false;" >
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Crear <small>Solicitud</small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li>
									<router-link  v-bind:to="{ name: 'View', params: { account_id: $route.params.account_id } }">
										<span class="fa fa-close" aria-hidden="true"></span>
									</router-link>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="row">
								<div class="col-sm-12">

									<div class="col-xs-12 form-group has-feedback">
										<label class="control-label" for="form-create-identification_number">Solicitud del cliente</label>
										<textarea rows="5" v-model="form.description" id="form-create-identification_number" name="form-create-identification_number" required="required" class="form-control"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-4">

					<div class="x_panel">
						<div class="x_title">
							<h2>Contacto(s) <small>(*)</small></h2>
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
							<div class="">
								<template v-if="options.contacts.length > 0">
									<div class="col-md-12 col-sm-12 col-xs-12 profile_details" v-for="(contact, contact_index) in options.contacts">
										<div class="well profile_view">
											<template v-if="contact.id !== undefined && contact.id > 0">
												<div class="col-sm-12">
													<h4 class="brief">
														<i>{{ contact.identification_type.code }} {{ contact.identification_number }}</i>
													</h4>
													<div class="left col-xs-12">
														<h2>{{ contact.names }} {{ contact.surname }} </h2>
														<p><strong>Email: </strong> {{ contact.email }}</p>
														<ul class="list-unstyled">
															<li><i class="fa fa-building"></i> Direccion: {{ contact.address }}</li>
															<li><i class="fa fa-phone"></i> Tel. Fijo #: {{ contact.phone }} - {{ contact.mobile }}</li>
															<li><i class="fa fa-phone"></i> Tel. Mòvil: {{ contact.mobile }}</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 bottom text-center">
												<!-- //
													<div class="col-xs-12 col-sm-6 emphasis">
														<p class="ratings">
															<a>4.0</a>
															<a href="#"><span class="fa fa-star"></span></a>
															<a href="#"><span class="fa fa-star"></span></a>
															<a href="#"><span class="fa fa-star"></span></a>
															<a href="#"><span class="fa fa-star"></span></a>
															<a href="#"><span class="fa fa-star-o"></span></a>
														</p>
													</div>
												-->
													<div class="col-xs-12 col-sm-6 emphasis pull-right">
														<!-- // 
														<button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
														</i> <i class="fa fa-plus"></i> </button>
														-->
														<input name="contacts[]" v-model="form.contacts" :value="contact" type="checkbox" class="" style="border: 0px solid #00000000;">
														
														<template v-if="form.contacts.indexOf(contact) >= 0">
															<template v-if="form.contact === contact.id">
																<a><span class="fa fa-star"></span></a>
															</template>
															<template v-else>
																<!-- // <a><span class="fa fa-star-o"></span></a> -->
																<input name="contact" v-model="form.contact" :value="contact.id" type="radio" class="fa fa-star-o" style="opacity: 0.5;">
															</template>
														</template>
															
														
														
														
														<!-- // 
														<button type="button" class="btn btn-primary btn-xs">
														<i class="fa fa-user"> </i> View Profile
														</button>
														-->
													</div>
												</div>
											</template>
										</div>
									</div>
								</template>
							</div>
						</div>
					</div>
					
					<div class="x_panel">
						<div class="x_title">
							<h2>Direccion(es) <small>(*)</small></h2>
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
							<div class="">
								<template v-if="options.addresses.length > 0">
									<ul class="to_do">
										<li v-for="(address, address_index) in options.addresses">
											<template v-if="address.id !== undefined && address.id > 0">
												<p>
													<div class="icheckbox_flat-green" style="position: relative;">
														<input name="addresses[]" v-model="form.addresses" :value="address" type="checkbox" class="" style="border: 0px solid #00000000;">
													</div> 
													{{ address.minsize }}
												</p>
											</template>
										</li>
									</ul>
								</template>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-8 col-sm-8 col-xs-8">
					<div class="x_panel">
						<div class="x_title">
							<h2><i class="fa fa-bars"></i> Servicios <small></small></h2>
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
							<div class="" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
								<!-- // <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Home</a></li>-->
									<li v-for="(category, category_index) in options.services" role="presentation" class="">
										<a :href="'#tab_services' + category.id" role="tab" :id="'categories-services' + category.id" data-toggle="tab" aria-expanded="false">
											{{ category.name }} ({{ category.services.length }})
										</a>
									</li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
										<p></p>
									</div>
									
									<div v-for="(category, category_index) in options.services" role="tabpanel" class="tab-pane fade" :id="'tab_services' + category.id" :aria-labelledby="'categories-services' + category.id">
										<template v-if="category.description !== null && category.description !== undefined">
											<p>{{ category.description }}</p>
										</template>
										<template v-else>
											<p>Esta categoria no tiene descripcion.</p>
										</template>
										
										
										<template v-if="category.services.length > 0">
											<ul class="to_do">
												<li v-for="(service, service_index) in category.services">
													<template v-if="service.id !== undefined && service.id > 0">
														<p>
															<div class="icheckbox_flat-green" style="position: relative;">
																<input name="services[]" v-model="form.services" :value="service" type="checkbox" class="" style="border: 0px solid #00000000;">
															</div> 
															{{ service.name }} - {{ service.medition.code }}
														</p>
													</template>
												</li>
											</ul>
										</template>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="x_panel">
						<div class="x_title">
							<h2>Vista Previa <small></small></h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							{{ form }}
						</div>
						<div class="x_content">
							{{ options.account }}
						</div>
					</div>
					
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>Solicitud <small>Vista Previa</small></h2>
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
								<section class="content invoice">
									<!-- title row -->
									<div class="row">
										<div class="col-xs-12 invoice-header">
											<h1>
												<i class="fa fa-globe"></i> 
												Solicitud.
												<small class="pull-right">Date: 16/08/2016</small>
											</h1>
										</div>
										<!-- /.col -->
									</div>
									<!-- info row -->
									<div class="row invoice-info">
										<div class="col-sm-4 invoice-col">
											From
											<address>
												<strong>Iron Admin, Inc.</strong>
												<br>795 Freedom Ave, Suite 600
												<br>New York, CA 94107
												<br>Phone: 1 (804) 123-9876
												<br>Email: ironadmin.com
											</address>
										</div>
										<!-- /.col -->
										<div class="col-sm-4 invoice-col">
											To
											<address>
												<strong>John Doe</strong>
												<br>795 Freedom Ave, Suite 600
												<br>New York, CA 94107
												<br>Phone: 1 (804) 123-9876
												<br>Email: jon@ironadmin.com
											</address>
										</div>
										<!-- /.col -->
										
										<div class="col-sm-4 invoice-col">
											<b>Invoice #007612</b>
											<br>
											<br>
											<b>Order ID:</b> 4F3S8J
											<br>
											<b>Payment Due:</b> 2/22/2014
											<br>
											<b>Account:</b> 968-34567
										</div>
										<!-- /.col -->
									</div>
									<!-- /.row -->

								  <!-- Table row -->
								  <div class="row">
									<div class="col-xs-12 table">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Qty</th>
													<th>Product</th>
													<th>Serial #</th>
													<th style="width: 59%">Description</th>
													<th>Subtotal</th>
												</tr>
											</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Call of Duty</td>
														<td>455-981-221</td>
														<td>El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson
														</td>
														<td>$64.50</td>
													</tr>
													<tr>
														<td>1</td>
														<td>Need for Speed IV</td>
														<td>247-925-726</td>
														<td>Wes Anderson umami biodiesel</td>
														<td>$50.00</td>
													</tr>
													<tr>
														<td>1</td>
														<td>Monsters DVD</td>
														<td>735-845-642</td>
														<td>Terry Richardson helvetica tousled street art master, El snort testosterone trophy driving gloves handsome letterpress erry Richardson helvetica tousled</td>
														<td>$10.70</td>
													</tr>
													<tr>
														<td>1</td>
														<td>Grown Ups Blue Ray</td>
														<td>422-568-642</td>
														<td>Tousled lomo letterpress erry Richardson helvetica tousled street art master helvetica tousled street art master, El snort testosterone</td>
														<td>$25.99</td>
													</tr>
												</tbody>
											</table>
										</div>
										<!-- /.col -->
									</div>
									<!-- /.row -->
								  
									<div class="row">
										<!-- accepted payments column -->
										<div class="col-xs-6">
											<p class="lead">Payment Methods:</p>
											<img src="/public/assets/images/visa.png" alt="Visa">
											<img src="/public/assets/images/mastercard.png" alt="Mastercard">
											<img src="/public/assets/images/american-express.png" alt="American Express">
											<img src="/public/assets/images/paypal.png" alt="Paypal">
											<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
												Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
											</p>
										</div>
										<!-- /.col -->
										<div class="col-xs-6">
											<p class="lead">Amount Due 2/22/2014</p>
											<div class="table-responsive">
												<table class="table">
													<tbody>
														<tr>
															<th style="width:50%">Subtotal:</th>
															<td>$250.30</td>
														</tr>
														<tr>
															<th>Tax (9.3%)</th>
															<td>$10.34</td>
														</tr>
														<tr>
															<th>Shipping:</th>
															<td>$5.80</td>
														</tr>
														<tr>
															<th>Total:</th>
															<td>$265.24</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<!-- /.col -->
									</div>
									<!-- /.row -->
									
									<!-- this row will not appear when printing -->
									<div class="row no-print">
										<div class="col-xs-12">
											<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
											<button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
											<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
										</div>
									</div>
								</section>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="pull-right">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addresses-modal">
							<i class="fa fa-search"></i>
							Guardar y buscar agenda
						</button>
					</div>
				</div>
			</div>
		</form>
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

var List = Vue.extend({
	template: '#list',
	data(){
		return {
			records: null,
			list: null
		};
	},
	mounted: function () {
		var self = this;
		self.load();
	},
	methods: {
		load(){
			var self = this;
			api.get('/records/accounts', {
				params: {
					join: [
						'identifications_types',
						'addresses',
						'accounts_types',
						'geo_departments',
						'geo_citys',
					]
				}
			}).then(function (response) {
				if(response.data.records && response.data.records.length > 0){
					self.records = response.data.records;
					self.list = [];
					response.data.records.forEach(function(a){
						item = {
							view_account: "<a onclick=\"javascript:app.$router.push({name:'View', params: {account_id: " + a.id + "}});\" class=\"btn btn-sm btn-default\"><i class=\"fa fa-eye\"></i></router-link>",
							id: a.id,
							type: (a.type !== null && a.type.name !== undefined) ? a.type.name : a.type,
							identification_type: (a.identification_type !== null && a.identification_type.name !== undefined) ? a.identification_type.code + ' - ' + a.identification_type.name : a.identification_type,
							identification_number: a.identification_number,
							names: a.names,
							surname: a.surname,
							email: a.email,
							phone: a.phone,
							mobile: a.mobile,
							address: (a.address !== null && a.address !== undefined && a.address.id !== undefined) ? a.address.minsize : "Sin dirección registrada",
							//view_account: "<button class=\"btn btn-sm btn-default\"><i class=\"fa fa-eye\"></i> Ver cuenta</button>",
							//"<router-link tag="a" v-for="subject in subjects" v-bind:to="{name: 'List', params: {subject: subject.name}}" class="list-group-item " :key="subject.name"></router-link>"
							// edit_account: "<button class=\"btn btn-sm btn-warning\">Modificar Cuenta</button>",
							// action: "<button class=\"btn btn-sm btn-default\">Nueva Solicitud</button>",
							// <router-link tag="a" v-for="subject in subjects" v-bind:to="{name: 'List', params: {subject: subject.name}}" class="list-group-item " :key="subject.name"></router-link>
						};
						// console.log('item', item);
						self.list.push(Object.values(item));
					});
					self.init_DataTables();
				}
			}).catch(function (error) {
			  console.log(error);
			});
		},
		init_DataTables() {
			var self = this;
			/* DATA TABLES */
			if( typeof ($.fn.DataTable) === 'undefined'){ return; }
			// console.log(('init_DataTables');
			var handleDataTableButtons = function() {
				if ($("#datatable-buttons2").length) {
					$("#datatable-buttons2").DataTable({
						data: self.list,
						dom: "Blfrtip",
						columns: [
							{ title: "" },
							{ title: "ID" },
							{ title: "Tipo" },
							{ title: "T. Doc" },
							{ title: "Documento" },
							{ title: "Nombres" },
							{ title: "Apellidos" },
							{ title: "E-mail" },
							{ title: "Telefono" },
							{ title: "Movil" },
							{ title: "Dirección" },
							// { title: "<i class=\"fa fa-edit\"></i>" },
							// { title: "<i class=\"fa fa-plus\"></i>" },
						],
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
						responsive: true
					});
				}
			};
			TableManageButtons = function() {
				"use strict";
				return {
					init: function() {
						handleDataTableButtons();
					}
				};
			}();
			$('#datatable').dataTable();
			$('#datatable-keytable').DataTable({
				keys: true
			});
			$('#datatable-responsive').DataTable();
			$('#datatable-scroller').DataTable({
				deferRender: true,
				scrollY: 380,
				scrollCollapse: true,
				scroller: true
			});
			$('#datatable-fixed-header').DataTable({
				fixedHeader: true
			});
			var $datatable = $('#datatable-checkbox');
			$datatable.dataTable({
				'order': [[ 1, 'asc' ]],
				'columnDefs': [
					{ orderable: false, targets: [0] }
				]
			});
			$datatable.on('draw.dt', function() {
				$('checkbox input').iCheck({
					checkboxClass: 'icheckbox_flat-green'
				});
			});
			TableManageButtons.init();
		},
	}
});

var View = Vue.extend({
	template: '#view',
	data(){
		return {
			options: {
				accounts_types: [],
				identifications_types: [],
				geo_departments: [],
				geo_citys: [],
				geo_citysModal: [],
				geo_types_vias: [],
				geo_types_quadrants: [],
			},
			record: {
				id: this.$route.params.account_id,
				type: 0,
				economic_activity: 0,
				identification_type: 0,
				identification_number: '',
				names: '',
				surname: '',
				email: '',
				phone: '',
				mobile: '',
				gender: null,
				address: 0,
				update_by: <?= $this->user->id; ?>,
				birthday: '',
				accounts_contacts: [],
				accounts_headquarters: [],
				requests: [],
			},
			contactModal: {
				id: 0,
				identification_type: 0,
				identification_number: '',
				names: '',
				surname: '',
				email: '',
				phone: '',
				mobile: '',
				birthday: '',
				address: '',
				department: 0,
				city: 0,
			},
			contactModalCreate: {
				identification_type: null,
				identification_number: null,
				names: null,
				surname: null,
				email: null,
				phone: null,
				mobile: null,
				birthday: '1990-10-31',
				address: null,
				department: null,
				city: null,
			},
			contactModalSearch: {
				id: null,
				identification_type: null,
				identification_number: null,
				names: null,
				surname: null,
				email: null,
				phone: null,
				mobile: null,
				birthday: '1990-10-31',
				address: null,
				department: null,
				city: null,
			},
			addressNormalizeError: true,
			addressNormalize: {
				department: 0,
				city: 0,
				via_principal: 0,
				via_principal_number: '',
				via_principal_letter: '',
				via_principal_quadrant: '',
				via_secondary_number: '',
				via_secondary_letter: '',
				via_secondary_quadrant: '',
				via_end_number: '',
				via_end_extra: '',
				minsize: '',
				complete: '',
			},

			headquarterName: '',
			headquartersNormalizeError: true,
			headquartersNormalize: {
				department: 0,
				city: 0,
				via_principal: 0,
				via_principal_number: '',
				via_principal_letter: '',
				via_principal_quadrant: '',
				via_secondary_number: '',
				via_secondary_letter: '',
				via_secondary_quadrant: '',
				via_end_number: '',
				via_end_extra: '',
				minsize: '',
				complete: '',
			},
		};
	},
	mounted: function () {
		var self = this;
		// $('.inputmask-date-mysql').inputmask({ "mask": "9999-99-99" });
		self.loadOptions();
	},
	methods: {
		includeContactModalSearch(){
			var self = this;
			var Notice = new PNotify({
				styling: "bootstrap3",
				text: 'Agregando contacto...',
				icon: 'fa fa-spinner fa-pulse',
				hide: false,
				shadow: false,
				width: '200px',
			});

			if(self.contactModalSearch.id > 0){
				api.post('/records/accounts_contacts', {
					account: self.$route.params.account_id,
					type: 1,
					contact: self.contactModalSearch.id
				})
				.then(function (b) {
					if(b.data > 0){
						 Notice.update({
							type: 'success',
							title: 'Contacto enlazado!',
							text: 'Se guardo con éxito.',
							icon: 'fa fa-check',
							hide: true,
							shadow: true,
							modules: {
							  Buttons: {
								closer: false,
								sticker: false
							  }
							}
						});
						self.load();
						$('#search-contact-modal').modal('hide');
					}
				})
				.catch(function (e) {
					console.error(e);
					console.log(e.response);

					Notice.update({
						type: 'error',
						title: 'Error enlazado el contacto',
						text: (e.response.data.message != undefined) ? e.response.data.code + ' | ' + e.response.data.message : 'Error',
						icon: 'fa fa-times',
						hide: true,
						shadow: true,
					});
				});
			}
		},
		searchContactModal(){
			var self = this;
			self.contactModalSearch.id = 0;
			var Notice = new PNotify({
				styling: "bootstrap3",
				text: 'Buscando Contacto...',
				icon: 'fa fa-spinner fa-pulse',
				hide: false,
				shadow: false,
				width: '200px',
			});

			var filters = [
				'identification_type,eq,' + self.contactModalSearch.identification_type,
				'identification_number,eq,' + self.contactModalSearch.identification_number,
			];
			api.get('/records/contacts', {
				params: {
					filter: filters
				}
			})
			.then(function (a) {
				console.log(a);
				if(a.data !== undefined && a.data.records !== undefined && a.data.records.length > 0){
					Notice.update({
						type: 'success',
						title: 'Exito!',
						text: 'Se encontro un contacto con los datos ingresados.',
						icon: 'fa fa-check',
						hide: true,
						shadow: true,
						modules: {
						  Buttons: {
							closer: false,
							sticker: false
						  }
						}
					});
					self.contactModalSearch = a.data.records[0];
				} else {
					Notice.update({
						type: 'error',
						title: 'Error!',
						text: 'UPS!, NO Se encontro ningun contacto con los datos ingresados.',
						icon: 'fa fa-check',
						hide: true,
						shadow: true,
						modules: {
						  Buttons: {
							closer: false,
							sticker: false
						  }
						}
					});
				}
				/*
					self.load();
					$('#create-contact-modal').modal('hide');
				*/
			})
			.catch(function (e) {
				console.error(e);
				console.log(e.response);

				Notice.update({
					type: 'error',
					title: 'Error enlazado el contacto',
					text: (e.response.data.message != undefined) ? e.response.data.code + ' | ' + e.response.data.message : 'Error',
					icon: 'fa fa-times',
					hide: true,
					shadow: true,
				});
			});

		},
		removeContactInAccount(contactIn_ID){
			var self = this;
			bootbox.confirm({
				message: "Confirma que deseas eliminar el contacto de esta cuenta?",
				locale: 'es',
				callback: function (a) {
					if(a !== undefined && a == true){

						var Notice = new PNotify({
							styling: "bootstrap3",
							text: 'Eliminando Contacto...',
							icon: 'fa fa-spinner fa-pulse',
							hide: false,
							shadow: false,
							width: '200px',
						});

						api.delete('/records/accounts_contacts/' + contactIn_ID)
						.then(function (b) {
							if(b.data > 0){
								Notice.update({
									type: 'error',
									title: 'Error',
									text: 'No hay numero(s) de contacto.',
									icon: 'fa fa-times',
									hide: true,
									shadow: true,
								});
								self.load();
							}
						})
						.catch(function (e) {
							console.error(e);
							console.log(e.response);

							Notice.update({
								type: 'error',
								title: 'Error eliminando el contacto',
								text: (e.response.data.message != undefined) ? e.response.data.code + ' | ' + e.response.data.message : 'Error',
								icon: 'fa fa-times',
								hide: true,
								shadow: true,
							});
						});
					}
				}
			});

		},
		createContactModalAndInclude(){
			var self = this;
			var Notice = new PNotify({
				styling: "bootstrap3",
				text: 'Validando datos...',
				icon: 'fa fa-spinner fa-pulse',
				hide: false,
				shadow: false,
				width: '200px',
			});

			if(self.contactModalCreate.identification_type
				&& self.contactModalCreate.identification_number
				&& self.contactModalCreate.names
				&& self.contactModalCreate.surname
				&& self.contactModalCreate.email){
				if(self.contactModalCreate.phone.length == 0 && self.contactModalCreate.mobile.length == 0){
					Notice.update({
						type: 'error',
						title: 'Error',
						text: 'No hay numero(s) de contacto.',
						icon: 'fa fa-times',
						hide: true,
						shadow: true,
					});
				} else {
					api.get('/records/contacts', {
						params: {
							filter: [
								'identification_type,eq,' + self.contactModalCreate.identification_type,
								'identification_number,eq,' + self.contactModalCreate.identification_number,
							]
						}
					})
					.then(function (x) {
						if(x.data !== undefined && x.data.records !== undefined && x.data.records.length > 0){
							Notice.update({
								type: 'error',
								title: 'Ups! Error',
								text: 'Ya existe un contacto con los datos ingresados.',
								icon: 'fa fa-check',
								hide: true,
								shadow: true,
								modules: {
								  Buttons: {
									closer: false,
									sticker: false
								  }
								}
							});
						} else {
							api.post('/records/contacts', self.contactModalCreate)
							.then(function (a) {
								if(a.data > 0){
									Notice.update({
										title: 'Contacto guardado!',
										text: 'Se guardo con éxito, se va a enlazar con la cuenta.',
										icon: 'fa fa-check',
										hide: true,
										shadow: true,
										modules: {
										  Buttons: {
											closer: false,
											sticker: false
										  }
										}
									});

									api.post('/records/accounts_contacts', {
										account: self.$route.params.account_id,
										type: 1,
										contact: a.data
									})
									.then(function (b) {
										if(b.data > 0){
											 Notice.update({
												type: 'success',
												title: 'Contacto enlazado!',
												text: 'Se guardo con éxito.',
												icon: 'fa fa-check',
												hide: true,
												shadow: true,
												modules: {
												  Buttons: {
													closer: false,
													sticker: false
												  }
												}
											});
											self.load();
											$('#create-contact-modal').modal('hide');
										}
									})
									.catch(function (e) {
										console.error(e);
										console.log(e.response);

										Notice.update({
											type: 'error',
											title: 'Error enlazado el contacto',
											text: (e.response.data.message != undefined) ? e.response.data.code + ' | ' + e.response.data.message : 'Error',
											icon: 'fa fa-times',
											hide: true,
											shadow: true,
										});
									});
								}
							})
							.catch(function (e) {
								console.error(e);
								console.log(e.response);

								Notice.update({
									type: 'error',
									title: 'Error actualizando el contacto',
									text: (e.response.data.message != undefined) ? e.response.data.code + ' | ' + e.response.data.message : 'Error',
									icon: 'fa fa-times',
									hide: true,
									shadow: true,
								});
							});
						}
					})
					.catch(function (e) {
						console.error(e);
						console.log(e.response);

						Notice.update({
							type: 'error',
							title: 'Error buscando validando el contacto.',
							text: (e.response.data.message != undefined) ? e.response.data.code + ' | ' + e.response.data.message : 'Error',
							icon: 'fa fa-times',
							hide: true,
							shadow: true,
						});
					});
				}
			} else  {
				Notice.update({
					type: 'error',
					title: 'Error',
					text: 'Formulario incompleto.',
					icon: 'fa fa-times',
					hide: true,
					shadow: true,
				});
			}
		},
		loadContactInModal(contact_id){
			var self = this;
			api.get('/records/contacts/' + contact_id, {
				params: {
				}
			})
			.then(function (a) {
				if(a.data.id !== undefined){
					self.contactModal = a.data;
					self.loadCitysModal(self.contactModal.department);
				}
			})
			.catch(function (e) {
				console.error(e);
				console.log(e.response);
			});
		},
		saveContactModal(){
			var self = this;
			message = "";

			var Notice = new PNotify({
				styling: "bootstrap3",
				text: 'Guardando contacto...',
				icon: 'fa fa-spinner fa-pulse',
				hide: false,
				shadow: false,
				width: '200px',
			});

			api.put('/records/contacts/' + self.contactModal.id, self.contactModal)
			.then(function (a) {
				if(a.data > 0){
					self.load();
					Notice.update({
						type: 'success',
						title: 'Contacto guardado!',
						text: 'Se guardo con éxito.',
						icon: 'fa fa-check',
						hide: true,
						shadow: true,
						modules: {
						  Buttons: {
							closer: false,
							sticker: false
						  }
						}
					});
				}
			})
			.catch(function (e) {
				console.error(e);
				console.log(e.response);

				Notice.update({
					type: 'error',
					title: 'Error actualizando el contacto',
					text: (e.response.data.message != undefined) ? e.response.data.code + ' | ' + e.response.data.message : 'Error',
					icon: 'fa fa-times',
					hide: true,
					shadow: true,
				});
			});
		},
		saveAccount(){
			var self = this;
			message = "";

			var Notice = new PNotify({
				styling: "bootstrap3",
				text: 'Guardando...',
				icon: 'fa fa-spinner fa-pulse',
				hide: false,
				shadow: false,
				width: '200px',
			});

			api.put('/records/accounts/' + self.record.id, self.record)
			.then(function (a) {
				if(a.data > 0){
					Notice.update({
						type: 'success',
						title: 'Guardado!',
						text: 'Se guardo con éxito.',
						icon: 'fa fa-check',
						hide: true,
						shadow: true,
						modules: {
						  Buttons: {
							closer: false,
							sticker: false
						  }
						}
					});
				}
			})
			.catch(function (e) {
				console.error(e);
				console.log(e.response);

				Notice.update({
					type: 'error',
					title: 'Error',
					text: (e.response.data.message != undefined) ? e.response.data.code + ' | ' + e.response.data.message : 'Error',
					icon: 'fa fa-times',
					hide: true,
					shadow: true,
				});
			});
		},
		loadCitys(){
			var self = this;
			self.options.geo_citys = [];
			if(self.addressNormalize.department !== undefined && self.addressNormalize.department !== null && self.addressNormalize.department > 0){
				api.get('/records/geo_citys/', { params: {
					filter: [
						'department,eq,' + self.addressNormalize.department
					]
				}}).then(function (a) {
					if(a.data.records !== undefined){ self.options.geo_citys = a.data.records; }
				});
			}
		},
		loadCitysModal(department){
			var self = this;
			self.options.geo_citysModal = [];
			if(department !== undefined && department !== null && department > 0){
				api.get('/records/geo_citys/', { params: {
					filter: [
						'department,eq,' + department
					]
				}}).then(function (a) {
					if(a.data.records !== undefined){ self.options.geo_citysModal = a.data.records; }
				});
			}
		},
		loadOptions(){
			var self = this;
			api.get('/records/identifications_types/', { params: {} }).then(function (a) {
				if(a.data.records !== undefined){ self.options.identifications_types = a.data.records; }
				api.get('/records/geo_departments/', { params: {} }).then(function (a) {
					if(a.data.records !== undefined){ self.options.geo_departments = a.data.records; }
					api.get('/records/accounts_types/', { params: {} }).then(function (a) {
						if(a.data.records !== undefined){ self.options.accounts_types = a.data.records; }
						api.get('/records/economic_activities/', { params: {} }).then(function (a) {
							if(a.data.records !== undefined){ self.options.economic_activities = a.data.records; }
							api.get('/records/geo_types_vias/', { params: {} }).then(function (a) {
								if(a.data.records !== undefined){ self.options.geo_types_vias = a.data.records; }
								api.get('/records/geo_types_quadrants/', { params: {} }).then(function (a) {
									if(a.data.records !== undefined){ self.options.geo_types_quadrants = a.data.records; }
									self.load();
								});
							});
						});
					});
				});
			});
		},
		load(){
			var self = this;
			api.get('/records/accounts/' + self.record.id, {
				params: {
					join: [
						'accounts_contacts',
						'accounts_contacts,contacts_types',
						'accounts_contacts,contacts',
						'accounts_contacts,contacts,identifications_types',
						'accounts_contacts,contacts,geo_departments',
						'accounts_contacts,contacts,geo_citys',
						'accounts_headquarters,addresses',
						'requests',
					]
				}
			}).then(function (response) {
				if(response.data !== undefined){
					self.record = response.data;
					if(response.data.address > 0){
						api.get('/records/addresses/' + response.data.address, { params: {} }).then(function (a) {
							if(a.data.id !== undefined){
								// console.log('addressNormalize', a.data);
								self.addressNormalize = a.data;
								self.loadCitys();
							}
						});
					}
				}
			});
		},
		NormalizeAddressesModal(){
			var self = this;
			self.record.address = 0;
			api.get('/records/addresses', {
				params: {
					filter: [
						'department,eq,' + self.addressNormalize.department,
						'city,eq,' + self.addressNormalize.city,
						'complete,eq,' + self.addressNormalize.complete,
						'minsize,eq,' + self.addressNormalize.minsize
					]
				}
			})
			.then(function (a) {
				if(a.data !== undefined && a.data.records !== undefined && a.data.records.length > 0){
					// console.log("Direccion existente");
					self.record.address = a.data.records[0].id;
					$('#addresses-modal').modal('hide');
				} else {
					// console.log("Direccion nueva");

					api.post('/records/addresses', self.addressNormalize)
					.then(function (b) {
						if(b.data > 0){
							// console.log("Direccion nueva agregada con exito.");
							self.record.address = b.data;
							$('#addresses-modal').modal('hide');
						}
					})
					.catch(function (e) {
						console.log("Error al agregada la direccion nueva.");
						console.error(e);
						console.log(e.response);
					});
				}
			})
			.catch(function (e) {
				console.log("error NormalizeAddressesModal");
				console.error(e);
				console.log(e.response);
			});
		},
		NormalizeheadquartersModal(){
			var self = this;
			api.get('/records/addresses', {
				params: {
					filter: [
						'department,eq,' + self.headquartersNormalize.department,
						'city,eq,' + self.headquartersNormalize.city,
						'complete,eq,' + self.headquartersNormalize.complete,
						'minsize,eq,' + self.headquartersNormalize.minsize
					]
				}
			})
			.then(function (a) {
				if(a.data !== undefined && a.data.records !== undefined && a.data.records.length > 0){
					// console.log("Direccion existente");

					api.post('/records/accounts_headquarters', {
						name: self.headquarterName,
						account: self.$route.params.account_id,
						address: a.data.records[0].id
					})
					.then(function (d) {
						if(d.data > 0){
							self.load();
							$('#headquarters-modal').modal('hide');
						}
					})
					.catch(function (e) {
						console.log("Error al agregada la sede nueva.");
						console.error(e);
						console.log(e.response);
					});

				} else {
					api.post('/records/addresses', self.headquartersNormalize)
					.then(function (b) {
						if(b.data > 0){
							// console.log("Direccion nueva agregada con exito.");

							api.post('/records/accounts_headquarters', {
								name: self.headquarterName,
								account: self.$route.params.account_id,
								address: b.data
							})
							.then(function (d) {
								if(d.data > 0){
									self.load();
									$('#headquarters-modal').modal('hide');
								}
							})
							.catch(function (e) {
								console.log("Error al agregada la sede nueva.");
								console.error(e);
								console.log(e.response);
							});
						}
					})
					.catch(function (e) {
						console.log("Error al agregada la direccion nueva.");
						console.error(e);
						console.log(e.response);
					});
				}
			})
			.catch(function (e) {
				console.log("error NormalizeheadquartersModal");
				console.error(e);
				console.log(e.response);
			});
		},
		loadCitysHeadquarters(){
			var self = this;
			self.options.geo_citys = [];
			if(self.headquartersNormalize.department !== undefined && self.headquartersNormalize.department !== null && self.headquartersNormalize.department > 0){
				api.get('/records/geo_citys/', { params: {
					filter: [
						'department,eq,' + self.headquartersNormalize.department
					]
				}}).then(function (a) {
					if(a.data.records !== undefined){ self.options.geo_citys = a.data.records; }
				});
			}
		},
		removeHeadquarters(headquarter_id){
			var self = this;
			bootbox.confirm({
				message: "Confirma que deseas eliminar la sede de esta cuenta?",
				locale: 'es',
				callback: function (a) {
					if(a !== undefined && a == true){
						var Notice = new PNotify({
							styling: "bootstrap3",
							text: 'Eliminando sede...',
							icon: 'fa fa-spinner fa-pulse',
							hide: false,
							shadow: false,
							width: '200px',
						});

						api.delete('/records/accounts_headquarters/' + headquarter_id)
						.then(function (b) {
							if(b.data > 0){
								Notice.update({
									type: 'error',
									title: 'Error',
									text: 'No hay numero(s) de contacto.',
									icon: 'fa fa-times',
									hide: true,
									shadow: true,
								});
								self.load();
							}
						})
						.catch(function (e) {
							console.error(e);
							console.log(e.response);

							Notice.update({
								type: 'error',
								title: 'Error eliminando la sede',
								text: (e.response.data.message != undefined) ? e.response.data.code + ' | ' + e.response.data.message : 'Error',
								icon: 'fa fa-times',
								hide: true,
								shadow: true,
							});
						});
					}
				}
			});


				api.get('/records/geo_citys/', { params: {
					filter: [
						'department,eq,' + self.headquartersNormalize.department
					]
				}}).then(function (a) {
					if(a.data.records !== undefined){ self.options.geo_citys = a.data.records; }
				});
		}
	},
	computed: {
		repairAddressMin(){
			var self = this;
			var addressReturn = "";
			try {
				var principal_via = self.options.geo_types_vias[self.options.geo_types_vias.map(function(x) { return x.id; }).indexOf(self.addressNormalize.via_principal)];
				self.addressNormalize.department = self.addressNormalize.department;
				self.addressNormalize.city = self.addressNormalize.city;
				var geo_city = self.options.geo_citys[self.options.geo_citys.map(function(x) { return x.id; }).indexOf(self.addressNormalize.city)];
				var geo_department = self.options.geo_departments[self.options.geo_departments.map(function(x) { return x.id; }).indexOf(self.addressNormalize.department)];

				self.addressNormalize.via_principal_number = self.addressNormalize.via_principal_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.addressNormalize.via_secondary_number = self.addressNormalize.via_secondary_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.addressNormalize.via_end_number = self.addressNormalize.via_end_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.addressNormalize.via_principal_letter = self.addressNormalize.via_principal_letter.replace(/[0-9-+()\s]/g, '').toUpperCase();
				self.addressNormalize.via_secondary_letter = self.addressNormalize.via_secondary_letter.replace(/[0-9-+()\s]/g, '').toUpperCase();
				self.addressNormalize.via_end_extra = self.addressNormalize.via_end_extra.toUpperCase();

				// Calle 33 AA # 80b 34 Laureles – Medellín
				if(self.addressNormalize.via_principal_number.length > 0 && self.addressNormalize.via_secondary_number.length > 0 && self.addressNormalize.via_end_number.length > 0){
					if(principal_via.id !== undefined){ addressReturn += principal_via.code; }
					addressReturn += ' ' + self.addressNormalize.via_principal_number;
					addressReturn += (self.addressNormalize.via_principal_letter !== "") ? '' + self.addressNormalize.via_principal_letter : "";
					addressReturn += (self.addressNormalize.via_principal_quadrant !== "") ? ' ' + self.addressNormalize.via_principal_quadrant : "";
					addressReturn += (self.addressNormalize.via_secondary_number !== "") ? ' ' + self.addressNormalize.via_secondary_number : "";
					addressReturn += (self.addressNormalize.via_secondary_letter !== "") ? '' + self.addressNormalize.via_secondary_letter : "";
					addressReturn += (self.addressNormalize.via_secondary_quadrant !== "") ? ' ' + self.addressNormalize.via_secondary_quadrant : "";
					addressReturn += (self.addressNormalize.via_end_number !== "") ? '-' + self.addressNormalize.via_end_number : "";
					addressReturn += (self.addressNormalize.via_end_extra !== "") ? ' ' + self.addressNormalize.via_end_extra : "";

					if(geo_city.id !== undefined){ addressReturn += ', ' + geo_city.name.toUpperCase(); }
					if(geo_department.id !== undefined){ addressReturn += ', ' + geo_department.name.toUpperCase(); }

					self.addressNormalize.minsize = addressReturn;
					return addressReturn;
				} else {
					self.addressNormalizeError = true;
					return "Formulario incompleto";
				}
			} catch(e){
				self.addressNormalizeError = true;
				return "Direccion invalida";
			};
		},
		repairAddressFull(){
			var self = this;
			var addressReturn = "";
			try {
				var principal_via = self.options.geo_types_vias[self.options.geo_types_vias.map(function(x) { return x.id; }).indexOf(self.addressNormalize.via_principal)];
				var geo_city = self.options.geo_citys[self.options.geo_citys.map(function(x) { return x.id; }).indexOf(self.addressNormalize.city)];
				var geo_department = self.options.geo_departments[self.options.geo_departments.map(function(x) { return x.id; }).indexOf(self.addressNormalize.department)];

				self.addressNormalize.via_principal_number = self.addressNormalize.via_principal_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.addressNormalize.via_secondary_number = self.addressNormalize.via_secondary_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.addressNormalize.via_end_number = self.addressNormalize.via_end_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.addressNormalize.via_principal_letter = self.addressNormalize.via_principal_letter.replace(/[0-9-+()\s]/g, '').toUpperCase();
				self.addressNormalize.via_secondary_letter = self.addressNormalize.via_secondary_letter.replace(/[0-9-+()\s]/g, '').toUpperCase();
				self.addressNormalize.via_end_extra = self.addressNormalize.via_end_extra.toUpperCase();

				if(self.addressNormalize.via_principal_number.length > 0 && self.addressNormalize.via_secondary_number.length > 0 && self.addressNormalize.via_end_number.length > 0){
					if(principal_via.id !== undefined){ addressReturn += principal_via.name; }

					addressReturn += ' ' + self.addressNormalize.via_principal_number;
					addressReturn += (self.addressNormalize.via_principal_letter !== "") ? '' + self.addressNormalize.via_principal_letter : "";
					addressReturn += (self.addressNormalize.via_principal_quadrant !== "") ? ' ' + self.addressNormalize.via_principal_quadrant : "";
					addressReturn += (self.addressNormalize.via_secondary_number !== "") ? ' ' + self.addressNormalize.via_secondary_number : "";
					addressReturn += (self.addressNormalize.via_secondary_letter !== "") ? '' + self.addressNormalize.via_secondary_letter : "";
					addressReturn += (self.addressNormalize.via_secondary_quadrant !== "") ? ' ' + self.addressNormalize.via_secondary_quadrant : "";
					addressReturn += (self.addressNormalize.via_end_number !== "") ? '-' + self.addressNormalize.via_end_number : "";
					addressReturn += (self.addressNormalize.via_end_extra !== "") ? ' ' + self.addressNormalize.via_end_extra : "";

					if(geo_city.id !== undefined){ addressReturn += ', ' + geo_city.name.toUpperCase(); }
					if(geo_department.id !== undefined){ addressReturn += ', ' + geo_department.name.toUpperCase(); }

					self.addressNormalize.complete = addressReturn;
					self.addressNormalizeError = false;

					return addressReturn;
				} else {
					self.addressNormalizeError = true;
					return "Formulario incompleto";
				}
			} catch(e){
				self.addressNormalizeError = true;
				return "Direccion invalida";
			};
		},
		repairheadquartersMin(){
			var self = this;
			var addressReturn = "";
			try {
				var principal_via = self.options.geo_types_vias[self.options.geo_types_vias.map(function(x) { return x.id; }).indexOf(self.headquartersNormalize.via_principal)];
				self.headquartersNormalize.department = self.headquartersNormalize.department;
				self.headquartersNormalize.city = self.headquartersNormalize.city;
				var geo_city = self.options.geo_citys[self.options.geo_citys.map(function(x) { return x.id; }).indexOf(self.headquartersNormalize.city)];
				var geo_department = self.options.geo_departments[self.options.geo_departments.map(function(x) { return x.id; }).indexOf(self.headquartersNormalize.department)];

				self.headquartersNormalize.via_principal_number = self.headquartersNormalize.via_principal_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.headquartersNormalize.via_secondary_number = self.headquartersNormalize.via_secondary_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.headquartersNormalize.via_end_number = self.headquartersNormalize.via_end_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.headquartersNormalize.via_principal_letter = self.headquartersNormalize.via_principal_letter.replace(/[0-9-+()\s]/g, '').toUpperCase();
				self.headquartersNormalize.via_secondary_letter = self.headquartersNormalize.via_secondary_letter.replace(/[0-9-+()\s]/g, '').toUpperCase();
				self.headquartersNormalize.via_end_extra = self.headquartersNormalize.via_end_extra.toUpperCase();

				// Calle 33 AA # 80b 34 Laureles – Medellín
				if(self.headquarterName.length >= 3 && self.headquartersNormalize.via_principal_number.length > 0 && self.headquartersNormalize.via_secondary_number.length > 0 && self.headquartersNormalize.via_end_number.length > 0){
					if(principal_via.id !== undefined){ addressReturn += principal_via.code; }
					addressReturn += ' ' + self.headquartersNormalize.via_principal_number;
					addressReturn += (self.headquartersNormalize.via_principal_letter !== "") ? '' + self.headquartersNormalize.via_principal_letter : "";
					addressReturn += (self.headquartersNormalize.via_principal_quadrant !== "") ? ' ' + self.headquartersNormalize.via_principal_quadrant : "";
					addressReturn += (self.headquartersNormalize.via_secondary_number !== "") ? ' ' + self.headquartersNormalize.via_secondary_number : "";
					addressReturn += (self.headquartersNormalize.via_secondary_letter !== "") ? '' + self.headquartersNormalize.via_secondary_letter : "";
					addressReturn += (self.headquartersNormalize.via_secondary_quadrant !== "") ? ' ' + self.headquartersNormalize.via_secondary_quadrant : "";
					addressReturn += (self.headquartersNormalize.via_end_number !== "") ? '-' + self.headquartersNormalize.via_end_number : "";
					addressReturn += (self.headquartersNormalize.via_end_extra !== "") ? ' ' + self.headquartersNormalize.via_end_extra : "";

					if(geo_city.id !== undefined){ addressReturn += ', ' + geo_city.name.toUpperCase(); }
					if(geo_department.id !== undefined){ addressReturn += ', ' + geo_department.name.toUpperCase(); }

					self.headquartersNormalize.minsize = addressReturn;
					return addressReturn;
				} else {
					self.headquartersNormalizeError = true;
					return "Formulario incompleto";
				}
			} catch(e){
				self.headquartersNormalizeError = true;
				return "Direccion invalida";
			};
		},
		repairheadquartersFull(){
			var self = this;
			var addressReturn = "";
			try {
				var principal_via = self.options.geo_types_vias[self.options.geo_types_vias.map(function(x) { return x.id; }).indexOf(self.headquartersNormalize.via_principal)];
				var geo_city = self.options.geo_citys[self.options.geo_citys.map(function(x) { return x.id; }).indexOf(self.headquartersNormalize.city)];
				var geo_department = self.options.geo_departments[self.options.geo_departments.map(function(x) { return x.id; }).indexOf(self.headquartersNormalize.department)];

				self.headquartersNormalize.via_principal_number = self.headquartersNormalize.via_principal_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.headquartersNormalize.via_secondary_number = self.headquartersNormalize.via_secondary_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.headquartersNormalize.via_end_number = self.headquartersNormalize.via_end_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.headquartersNormalize.via_principal_letter = self.headquartersNormalize.via_principal_letter.replace(/[0-9-+()\s]/g, '').toUpperCase();
				self.headquartersNormalize.via_secondary_letter = self.headquartersNormalize.via_secondary_letter.replace(/[0-9-+()\s]/g, '').toUpperCase();
				self.headquartersNormalize.via_end_extra = self.headquartersNormalize.via_end_extra.toUpperCase();

				if(self.headquarterName.length >= 3 && self.headquartersNormalize.via_principal_number.length > 0 && self.headquartersNormalize.via_secondary_number.length > 0 && self.headquartersNormalize.via_end_number.length > 0){
					if(principal_via.id !== undefined){ addressReturn += principal_via.name; }

					addressReturn += ' ' + self.headquartersNormalize.via_principal_number;
					addressReturn += (self.headquartersNormalize.via_principal_letter !== "") ? '' + self.headquartersNormalize.via_principal_letter : "";
					addressReturn += (self.headquartersNormalize.via_principal_quadrant !== "") ? ' ' + self.headquartersNormalize.via_principal_quadrant : "";
					addressReturn += (self.headquartersNormalize.via_secondary_number !== "") ? ' ' + self.headquartersNormalize.via_secondary_number : "";
					addressReturn += (self.headquartersNormalize.via_secondary_letter !== "") ? '' + self.headquartersNormalize.via_secondary_letter : "";
					addressReturn += (self.headquartersNormalize.via_secondary_quadrant !== "") ? ' ' + self.headquartersNormalize.via_secondary_quadrant : "";
					addressReturn += (self.headquartersNormalize.via_end_number !== "") ? '-' + self.headquartersNormalize.via_end_number : "";
					addressReturn += (self.headquartersNormalize.via_end_extra !== "") ? ' ' + self.headquartersNormalize.via_end_extra : "";

					if(geo_city.id !== undefined){ addressReturn += ', ' + geo_city.name.toUpperCase(); }
					if(geo_department.id !== undefined){ addressReturn += ', ' + geo_department.name.toUpperCase(); }

					self.headquartersNormalize.complete = addressReturn;
					self.headquartersNormalizeError = false;

					return addressReturn;
				} else {
					self.headquartersNormalizeError = true;
					return "Formulario incompleto";
				}
			} catch(e){
				self.headquartersNormalizeError = true;
				return "Direccion invalida";
			};
		},
	},
});

var Create = Vue.extend({
	template: '#create',
	data(){
		return {
			form_enabled: false,
			options: {
				accounts_types: [],
				economic_activities: [],
				identifications_types: [],
				geo_departments: [],
				geo_citys: [],
				geo_types_vias: [],
				geo_types_quadrants: [],
			},
			form: {
				type: 0,
				economic_activity: 0,
				identification_type: 0,
				identification_number: '',
				names: '',
				surname: '',
				email: '',
				phone: '',
				mobile: '',
				birthday: null,
				gender: null,
				address: 0,
				create_by: <?= $this->user->id; ?>,
				update_by: <?= $this->user->id; ?>,
			},
			list: null,
			addressNormalizeError: true,
			addressNormalize: {
				department: 0,
				city: 0,
				via_principal: 0,
				via_principal_number: '',
				via_principal_letter: '',
				via_principal_quadrant: '',
				via_secondary_number: '',
				via_secondary_letter: '',
				via_secondary_quadrant: '',
				via_end_number: '',
				via_end_extra: '',
				minsize: '',
				complete: '',
			},
		};
	},
	computed: {
		repairAddressMin(){
			var self = this;
			var addressReturn = "";
			try {
				var principal_via = self.options.geo_types_vias[self.options.geo_types_vias.map(function(x) { return x.id; }).indexOf(self.addressNormalize.via_principal)];
				self.addressNormalize.department = self.addressNormalize.department;
				self.addressNormalize.city = self.addressNormalize.city;
				var geo_city = self.options.geo_citys[self.options.geo_citys.map(function(x) { return x.id; }).indexOf(self.addressNormalize.city)];
				var geo_department = self.options.geo_departments[self.options.geo_departments.map(function(x) { return x.id; }).indexOf(self.addressNormalize.department)];

				self.addressNormalize.via_principal_number = self.addressNormalize.via_principal_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.addressNormalize.via_secondary_number = self.addressNormalize.via_secondary_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.addressNormalize.via_end_number = self.addressNormalize.via_end_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.addressNormalize.via_principal_letter = self.addressNormalize.via_principal_letter.replace(/[0-9-+()\s]/g, '').toUpperCase();
				self.addressNormalize.via_secondary_letter = self.addressNormalize.via_secondary_letter.replace(/[0-9-+()\s]/g, '').toUpperCase();
				self.addressNormalize.via_end_extra = self.addressNormalize.via_end_extra.toUpperCase();

				// Calle 33 AA # 80b 34 Laureles – Medellín
				if(self.addressNormalize.via_principal_number.length > 0 && self.addressNormalize.via_secondary_number.length > 0 && self.addressNormalize.via_end_number.length > 0){
					if(principal_via.id !== undefined){ addressReturn += principal_via.code; }
					addressReturn += ' ' + self.addressNormalize.via_principal_number;
					addressReturn += (self.addressNormalize.via_principal_letter !== "") ? '' + self.addressNormalize.via_principal_letter : "";
					addressReturn += (self.addressNormalize.via_principal_quadrant !== "") ? ' ' + self.addressNormalize.via_principal_quadrant : "";
					addressReturn += (self.addressNormalize.via_secondary_number !== "") ? ' ' + self.addressNormalize.via_secondary_number : "";
					addressReturn += (self.addressNormalize.via_secondary_letter !== "") ? '' + self.addressNormalize.via_secondary_letter : "";
					addressReturn += (self.addressNormalize.via_secondary_quadrant !== "") ? ' ' + self.addressNormalize.via_secondary_quadrant : "";
					addressReturn += (self.addressNormalize.via_end_number !== "") ? '-' + self.addressNormalize.via_end_number : "";
					addressReturn += (self.addressNormalize.via_end_extra !== "") ? ' ' + self.addressNormalize.via_end_extra : "";

					if(geo_city.id !== undefined){ addressReturn += ', ' + geo_city.name.toUpperCase(); }
					if(geo_department.id !== undefined){ addressReturn += ', ' + geo_department.name.toUpperCase(); }

					self.addressNormalize.minsize = addressReturn;
					return addressReturn;
				} else {
					self.addressNormalizeError = true;
					return "Formulario incompleto";
				}
			} catch(e){
				self.addressNormalizeError = true;
				return "Direccion invalida";
			};
		},
		repairAddressFull(){
			var self = this;
			var addressReturn = "";
			try {
				var principal_via = self.options.geo_types_vias[self.options.geo_types_vias.map(function(x) { return x.id; }).indexOf(self.addressNormalize.via_principal)];
				var geo_city = self.options.geo_citys[self.options.geo_citys.map(function(x) { return x.id; }).indexOf(self.addressNormalize.city)];
				var geo_department = self.options.geo_departments[self.options.geo_departments.map(function(x) { return x.id; }).indexOf(self.addressNormalize.department)];

				self.addressNormalize.via_principal_number = self.addressNormalize.via_principal_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.addressNormalize.via_secondary_number = self.addressNormalize.via_secondary_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.addressNormalize.via_end_number = self.addressNormalize.via_end_number.replace(/[a-zA-Z-+()\s]/g, '');
				self.addressNormalize.via_principal_letter = self.addressNormalize.via_principal_letter.replace(/[0-9-+()\s]/g, '').toUpperCase();
				self.addressNormalize.via_secondary_letter = self.addressNormalize.via_secondary_letter.replace(/[0-9-+()\s]/g, '').toUpperCase();
				self.addressNormalize.via_end_extra = self.addressNormalize.via_end_extra.toUpperCase();

				if(self.addressNormalize.via_principal_number.length > 0 && self.addressNormalize.via_secondary_number.length > 0 && self.addressNormalize.via_end_number.length > 0){
					if(principal_via.id !== undefined){ addressReturn += principal_via.name; }

					addressReturn += ' ' + self.addressNormalize.via_principal_number;
					addressReturn += (self.addressNormalize.via_principal_letter !== "") ? '' + self.addressNormalize.via_principal_letter : "";
					addressReturn += (self.addressNormalize.via_principal_quadrant !== "") ? ' ' + self.addressNormalize.via_principal_quadrant : "";
					addressReturn += (self.addressNormalize.via_secondary_number !== "") ? ' ' + self.addressNormalize.via_secondary_number : "";
					addressReturn += (self.addressNormalize.via_secondary_letter !== "") ? '' + self.addressNormalize.via_secondary_letter : "";
					addressReturn += (self.addressNormalize.via_secondary_quadrant !== "") ? ' ' + self.addressNormalize.via_secondary_quadrant : "";
					addressReturn += (self.addressNormalize.via_end_number !== "") ? '-' + self.addressNormalize.via_end_number : "";
					addressReturn += (self.addressNormalize.via_end_extra !== "") ? ' ' + self.addressNormalize.via_end_extra : "";

					if(geo_city.id !== undefined){ addressReturn += ', ' + geo_city.name.toUpperCase(); }
					if(geo_department.id !== undefined){ addressReturn += ', ' + geo_department.name.toUpperCase(); }

					self.addressNormalize.complete = addressReturn;
					self.addressNormalizeError = false;

					return addressReturn;
				} else {
					self.addressNormalizeError = true;
					return "Formulario incompleto";
				}
			} catch(e){
				self.addressNormalizeError = true;
				return "Direccion invalida";
			};
		},
	},
	mounted: function () {
		var self = this;
		self.loadOptions();
	},
	methods: {
		NormalizeAddressesModal(){
			var self = this;
			self.form.address = 0;
			api.get('/records/addresses', {
				params: {
					filter: [
						'department,eq,' + self.addressNormalize.department,
						'city,eq,' + self.addressNormalize.city,
						'complete,eq,' + self.addressNormalize.complete,
						'minsize,eq,' + self.addressNormalize.minsize
					]
				}
			})
			.then(function (a) {
				if(a.data !== undefined && a.data.records !== undefined && a.data.records.length > 0){
					// console.log("Direccion existente");
					self.form.address = a.data.records[0].id;
					$('#addresses-modal').modal('hide');
				} else {
					// console.log("Direccion nueva");

					api.post('/records/addresses', self.addressNormalize)
					.then(function (b) {
						if(b.data > 0){
							// console.log("Direccion nueva agregada con exito.");
							self.form.address = b.data;
							$('#addresses-modal').modal('hide');
						}
					})
					.catch(function (e) {
						console.log("Error al agregada la direccion nueva.");
						console.error(e);
						console.log(e.response);
					});
				}
			})
			.catch(function (e) {
				console.log("error NormalizeAddressesModal");
				console.error(e);
				console.log(e.response);
			});
		},
		searchAccount(){
			var self = this;
			self.form_enabled = false;
			var Notice = new PNotify({
				styling: "bootstrap3",
				text: 'Revisando datos...',
				icon: 'fa fa-spinner fa-pulse',
				hide: false,
				shadow: false,
				width: '200px',
			});

			if (self.form.identification_number.length > 5 && self.form.identification_type > 0){
				api.get('/records/accounts', {
					params: {
						filter: [
							'identification_number,eq,' + self.form.identification_number,
							'identification_type,eq,' + self.form.identification_type
						]
					}
				})
				.then(function (a) {
					if(a.data !== undefined && a.data.records !== undefined && a.data.records.length > 0){
						Notice.update({
							type: 'success',
							title: 'Cliente encontrado!',
							text: 'Ya existe un cliente con los datos ingresados.',
							icon: 'fa fa-times',
							hide: true,
							shadow: true,
							modules: {
							  Buttons: {
								closer: false,
								sticker: false
							  }
							}
						});

						self.$router.push({
							name:'View',
							params: {
								account_id: a.data.records[0].id
							}
						});

					} else {
						Notice.update({
							type: 'error',
							title: 'Cliente no encontrado!',
							text: 'Puedes crear la ficha del cliente y así poder continuar.',
							icon: 'fa fa-check',
							hide: true,
							shadow: true,
							modules: {
							  Buttons: {
								closer: false,
								sticker: false
							  }
							}
						});
						self.form_enabled = true;
						$("form-create-identification_type")
					}
				})
				.catch(function (e) {
					console.error(e);
					console.log(e.response);

					Notice.update({
						type: 'error',
						title: 'Error enlazado el contacto',
						text: (e.response.data.message != undefined) ? e.response.data.code + ' | ' + e.response.data.message : 'Error',
						icon: 'fa fa-times',
						hide: true,
						shadow: true,
					});
				});

				Notice.update({
					type: 'info',
					title: 'Espere',
					text: 'Validando que si existe el cliente.',
					icon: 'fa fa-check',
					hide: true,
					shadow: true,
					modules: {
					  Buttons: {
						closer: false,
						sticker: false
					  }
					}
				});
			} else {
				Notice.update({
					type: 'error',
					title: 'Datos incompletos',
					text: 'Complete el "T. Documento" & el "# Documento"',
					icon: 'fa fa-times',
					hide: true,
					shadow: true,
				});
			}
		},
		loadOptions(){
			var self = this;
			api.get('/records/identifications_types/', { params: {} }).then(function (a) {
				if(a.data.records !== undefined){ self.options.identifications_types = a.data.records; }
				api.get('/records/geo_departments/', { params: {} }).then(function (a) {
					if(a.data.records !== undefined){ self.options.geo_departments = a.data.records; }
					api.get('/records/accounts_types/', { params: {} }).then(function (a) {
						if(a.data.records !== undefined){ self.options.accounts_types = a.data.records; }
						api.get('/records/economic_activities/', { params: {} }).then(function (a) {
							if(a.data.records !== undefined){ self.options.economic_activities = a.data.records; }
							api.get('/records/geo_types_vias/', { params: {} }).then(function (a) {
								if(a.data.records !== undefined){ self.options.geo_types_vias = a.data.records; }
								api.get('/records/geo_types_quadrants/', { params: {} }).then(function (a) {
									if(a.data.records !== undefined){ self.options.geo_types_quadrants = a.data.records; }
								});
							});
						});
					});
				});
			});
		},
		loadCitys(){
			var self = this;
			self.options.geo_citys = [];
			if(self.addressNormalize.department !== undefined && self.addressNormalize.department !== null && self.addressNormalize.department > 0){
				api.get('/records/geo_citys/', { params: {
					filter: [
						'department,eq,' + self.addressNormalize.department
					]
				}}).then(function (a) {
					if(a.data.records !== undefined){ self.options.geo_citys = a.data.records; }
				});
			}
		},
		createAccount(){
			var self = this;

			var Notice = new PNotify({
				styling: "bootstrap3",
				text: 'Validando formulario...',
				icon: 'fa fa-spinner fa-pulse',
				hide: false,
				shadow: false,
				width: '200px',
			});

			try {
				if(
					self.form.type > 0
					&& self.form.economic_activity > 0
					&& self.form.identification_type > 0
					&& self.form.identification_number.length >= 3
					&& self.form.names.length >= 3
					&& self.form.surname.length >= 3
					&& self.form.email.length >= 3
					&& self.form.phone.length >= 3
					&& self.form.mobile.length >= 3
					&& self.form.address > 0
					&& self.addressNormalizeError == false
				){
					console.log("Formulario valido");

					Notice.update({
						type: 'info',
						title: 'Enviando datos',
						text: "Por favor espere...",
						icon: 'fa fa-times',
						hide: false,
						shadow: false,
					});


					api.post('/records/accounts', self.form)
					.then(function (a) {
						if(a.data > 0){
							 Notice.update({
								type: 'success',
								title: 'Éxito!',
								text: 'Se creo la cuenta con éxito.',
								icon: 'fa fa-check',
								hide: true,
								shadow: true,
								modules: {
								  Buttons: {
									closer: false,
									sticker: false
								  }
								}
							});
							self.$router.push({
								name:'View',
								params: {
									account_id: a.data
								}
							});
						}
					})
					.catch(function (e) {
						console.error(e);
						console.log(e.response);
						Notice.update({
							type: 'error',
							title: 'Error creando la cuenta',
							text: (e.response.data.message != undefined) ? e.response.data.code + ' | ' + e.response.data.message : 'Error',
							icon: 'fa fa-times',
							hide: true,
							shadow: true,
						});
					});
				} else {
					console.log("Formulario incompleto");
					 Notice.update({
						type: 'error',
						title: 'Ups! Datos incompletos',
						text: 'Completa todos los campos para poder continuar.',
						icon: 'fa fa-check',
						hide: true,
						shadow: true,
						modules: {
						  Buttons: {
							closer: false,
							sticker: false
						  }
						}
					});
				}
			}
			catch (e){
				console.log("ERROR");
				console.error(e);
				 Notice.update({
					type: 'error',
					title: 'Error Inesperado!',
					text: 'Ocurrio un error intenta nuevamente.',
					icon: 'fa fa-check',
					hide: true,
					shadow: true,
					modules: {
					  Buttons: {
						closer: false,
						sticker: false
					  }
					}
				});
			}
		},
	}
});

var CreateRequest = Vue.extend({
	template: '#create-requests',
	data(){
		return {
			options: {
				addresses: [],
				contacts: [],
				services: [],
				account: {
					id: this.$route.params.account_id,
					type: 0,
					economic_activity: 0,
					identification_type: 0,
					identification_number: '',
					names: '',
					surname: '',
					email: '',
					phone: '',
					mobile: '',
					gender: null,
					address: 0,
					update_by: <?= $this->user->id; ?>,
					birthday: '',
					accounts_contacts: [],
					accounts_headquarters: [],
				},
			},
			form: {
				account: this.$route.params.account_id,
				create_by: <?= $this->user->id; ?>,
				update_by: <?= $this->user->id; ?>,
				contacts: 0,
				contacts: [],
				description: '',
				addresses: [],
				services: [],
			},
		};
	},
	computed: {
	},
	mounted: function () {
		var self = this;
		self.loadOptions();
	},
	methods: {
		newRequest(){

		},
		loadOptions(){
			var self = this;
			/* Limpiar listas actuales */
			self.options.addresses = [];
			self.options.contacts = [];
			self.options.services = [];

			/* Cargar direcciones */
			api.get('/records/accounts/' + self.$route.params.account_id, {
				params: {
					join: [
						'addresses',
						'accounts_headquarters,addresses',
					]
				}
			}).then(function (response) {
				console.log('addresses', response);
				if(response.data !== undefined && response.data.id > 0){
					self.options.addresses.push(response.data.address);
					if(response.data.accounts_headquarters !== undefined && response.data.accounts_headquarters.length > 0){
						response.data.accounts_headquarters.forEach(function(a){
							if(a.id !== undefined && a.id > 0){
								self.options.addresses.push(a.address);
							}
						});
					}
				}
			}).catch(function (error) {
			  console.log(error);
			});
			
			/* Cargar Contactos */
			api.get('/records/accounts_contacts', {
				params: {
					filter: [
						'account,eq,' + self.$route.params.account_id
					],
					join: [
						'contacts',
						'contacts_types',
						'contacts,addresses',
						'contacts,identifications_types',
					]
				}
			}).then(function (response) {
				if(response.data !== undefined && response.data.records !== undefined){
					if(response.data.records !== undefined && response.data.records.length > 0){
						response.data.records.forEach(function(a){
							console.log('contact', a);
							if(a.id !== undefined && a.id > 0){
								self.options.contacts.push(a.contact);
							}
						});
					}
				}
			}).catch(function (error) {
			  console.log(error);
			});
			
			/* Cargar Servicios */
			api.get('/records/services_categories', {
				params: {
					join: [
						'services,meditions',
					]
				}
			}).then(function (response) {
				if(response.data !== undefined && response.data.records !== undefined){
					if(response.data.records !== undefined && response.data.records.length > 0){
						self.options.services = response.data.records;
					}
				}
			}).catch(function (error) {
			  console.log(error);
			});
			
			/* Cargar Info Cuenta */
			api.get('/records/accounts/' + self.$route.params.account_id, {
				params: {
					join: [
						'accounts_types',
						'economic_activities',
						'identifications_types',
					]
				}
			}).then(function (response) {
				if(response.data.id !== undefined && response.data.id >= 0){
					self.options.account = response.data;
				}
			}).catch(function (error) {
			  console.log(error);
			});
			
		},
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: List, name: 'List' },
		{ path: '/create', component: Create, name: 'Create' },
		{ path: '/view/:account_id/requests/create', component: CreateRequest, name: 'Create-Request' },
		{ path: '/view/:account_id', component: View, name: 'View' },
	]
});

app = new Vue({
	router: router,
	data: function () {
		return {

		};
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
		}
	}
}).$mount('#accounts-app');
</script>
