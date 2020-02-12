<style>
.modal {
	overflow: auto !important;
}

.list-inline-sonar {display:block;}
.list-inline-sonar li{display:inline-block;}
.list-inline-sonar li:after{content:'|'; margin:0 10px;}

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
  margin: 1.5px;
}
.count {
	zoom: 0.7;
}
.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
}

.thumbnail {
    padding: 0;
}

.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    width: 100%;
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
		<div class="page-title">
			<div class="title_left">
				<h3>Contrato: <small>{{ contractName }}</small></h3>
			</div>
			<div class="title_right">
			</div>
		</div>
		<div class="clearfix"></div>
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
			  <div class="count">{{ total_m2.toLocaleString() }} m²</div>			  
			  <h3>Lote(s)</h3>
			  <p>El total de lotes es XXX.</p>
			</div>
		  </div>
		  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa fa-calendar"></i></div>
			  <div class="count">{{ total_m2_schedule.toLocaleString() }} m²</div>
			  <h3>Programado(s)</h3>
			  <p>El total de lotes programados es XXX.</p>
			</div>
		  </div>
		  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa fa-thumbs-up"></i></div>
			  <div class="count">{{ total_m2_executed.toLocaleString() }} m²</div>
			  <h3>Ejecutado(s)</h3>
			  <p>Lorem ipsum psdea itgum rixt.</p>
			</div>
		  </div>
		  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa fa-check-square-o"></i></div>
			  <div class="count">{{ total_m2_approved.toLocaleString() }} m²</div>
			  <h3>Aprobado(s)</h3>
			  <p>Lorem ipsum psdea itgum rixt.</p>
			</div>
		  </div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Resumen <small>Periodo</small></h2>
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
						<div class="col-md-9 col-sm-12 col-xs-12">
						  <div class="demo-container" style="height:280px">
							<div id="chart_plot_02" class="demo-placeholder"></div>
						  </div>
						  <div class="tiles">
							<div class="col-md-8 tile">
							  <span>Progreso de ejecucion</span>
							  <h2></h2>
							  <div id="sparkline22" class="demo-placeholder"></div>
							</div>
							  <div class="col-md-4">
								<div id="echart_pie2" style="height:350px;"></div>
								<canvas class="canvasDoughnut_02" width="100%" style="margin: 5px 10px 10px 0;width:100%"></canvas>
							  </div>
						  </div>

						</div>

						<div class="col-md-3 col-sm-12 col-xs-12">
							<div>
								<div class="x_title">
									<h2>Lotes</h2>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-3 control-label">
										<input type="checkbox" style="zoom:0.5" v-model="singleAgend" name="sole" id="hobby1" value="ski" data-parsley-mincheck="2" required class="form-control pull-left" /> 
										<br>
									</label>
									<small class="text-navy">Solo agendados</small>
								</div>
								<ul class="list-unstyled top_profiles scroll-view" style="overflow: auto;height: 620px !important;">
									<li class="media event" v-for="(a,record_i) in records" v-if="(a.isSchedule === true && singleAgend == true) || singleAgend == false">
										<a class="pull-left border-aero profile_thumb" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a" @click="generalSelected = a">
											<template v-if="a.isSchedule === true && a.isExecuted === false && a.isApproved === false">
												<i class="fa fa-calendar aero"></i>
											</template>
											<template v-else-if="a.isSchedule === true && a.isExecuted === true && a.isApproved === false">
												<i class="fa fa-thumbs-up aero"></i>
											</template>
											<template v-else-if="a.isSchedule === true && a.isExecuted === true && a.isApproved === true">
												<i class="fa fa-check aero"></i>
											</template>
											<template v-else>
												<i class="fa fa-question aero"></i>
											</template>
										</a>
										<div class="media-body">
											<a class="title" href="#" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">{{ a.name }}</a>
											
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
				<h2>Consola general <small>Vista Rapida</small></h2>
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
					<!-- // <div class="row fontawesome-icon-list" style="line-height: 1em;"> -->
					<div class="list-inline-sonar">
						<!-- // 
                        <div class="fa-hover col-xs-1">
							<div class="sonar-wrapper"><div class="sonar-emitter"><div class="sonar-wave"></div></div></div>
						</div>-->
						
						<div class="fa-hover " v-for="(a,record_i) in records" v-if="(a.isSchedule == true)">
							
								<template v-if="a.isSchedule === true && a.isExecuted === false && a.isApproved === false">
									<a title="Programado: En espera de ejecucion." class="pull-left border-aero profile_thumb" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a" @click="generalSelected = a">
										<div class="sonar-wrapper"><div class="sonar-emitter red"><div class="sonar-wave"></div></div></div>
									</a>
								</template>
								<template v-else-if="a.isSchedule === true && a.isExecuted === true && a.isApproved === false">
									<a title="Ejecutado: En espera de aprobación." class="pull-left border-aero profile_thumb" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a" @click="generalSelected = a">
										<div class="sonar-wrapper"><div class="sonar-emitter orange"><div class="sonar-wave"></div></div></div>
									</a>
								</template>
								<template v-else-if="a.isSchedule === true && a.isExecuted === true && a.isApproved === true">
									<a title="Aprobado" class="pull-left border-aero profile_thumb" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a" @click="generalSelected = a">
										<div class="sonar-wrapper"><div class="sonar-emitter green"><div class="sonar-wave"></div></div></div>
									</a>
								</template>
								<template v-else>
								<a title="No programado para este periodo." class="pull-left border-aero profile_thumb" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a" @click="generalSelected = a">
										<div class="sonar-wrapper"><div class="sonar-emitter"><div class="sonar-wave"></div></div></div>
									</a>
								</template>
							</a>
							<!--
							<div class="media-body">
								<a class="title" href="#" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">{{ a.name }}</a>
								
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
							-->
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
				<h2>En progreso <small></small></h2>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
				<article class="media event" v-for="(a,record_i) in records" v-if="a.isSchedule === true && a.isExecuted === false && a.isApproved === false">
				  <a class="pull-left date" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">
					<p class="month">{{ monthText[new Date().getMonth()] }}</p>
					<p class="day">{{ a.schedule.date_executed_schedule.split('-')[2] }}</p>
				  </a>
				  <div class="media-body">
					<a class="title" href="#" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">{{ a.name }} </a>
					<p>{{ a.schedule.group.name }}</p>
					<p>{{ $root.formatMoney(a.lot.area_m2, 2, ',', '.') }} m²</p>
				  </div>
				</article>
				
					
					
			  </div>
			</div>
		  </div>

		  <div class="col-md-4">
			<div class="x_panel">
			  <div class="x_title">
				<h2>Ejecutado(s) <small></small></h2>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
				
				<article class="media event" v-for="(a,record_i) in records" v-if="a.isSchedule === true && a.isExecuted === true && a.isApproved === false">
				  <a class="pull-left date" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">
					<p class="month">{{ monthText[new Date().getMonth()] }}</p>
					<p class="day">{{ a.schedule.date_executed_schedule.split('-')[2] }}</p>
				  </a>
				  <div class="media-body">
					<a class="title" href="#" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">{{ a.name }} </a>
					<p>Fecha Ejecutado: {{ a.schedule.date_executed }}</p>
					<p>{{ a.schedule.group.name }}</p>
					<p>{{ $root.formatMoney(a.lot.area_m2, 2, ',', '.') }} m²</p>
				  </div>
				</article>
				
				
			  </div>
			</div>
		  </div>

		  <div class="col-md-4">
			<div class="x_panel">
			  <div class="x_title">
				<h2>Aprobado(s) <small></small></h2>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
				<article class="media event" v-for="(a,record_i) in records" v-if="a.isSchedule === true && a.isExecuted === true && a.isApproved === true">
				  <a class="pull-left date" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">
					<p class="month">{{ monthText[new Date().getMonth()] }}</p>
					<p class="day">{{ a.schedule.date_executed_schedule.split('-')[2] }}</p>
				  </a>
				  <div class="media-body">
					<a class="title" href="#" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">{{ a.name }} </a>
					<p>{{ a.schedule.group.name }}</p>
					<p>{{ $root.formatMoney(a.lot.area_m2, 2, ',', '.') }} m²</p>
				  </div>
				</article>
			  </div>
			</div>
		  </div>
		</div>

		<!-- modals -->
		<div class="modal fade bs-info-general-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel">Contrato {{ contractName }} - {{ periodName }} {{ year }} | Informe general de progreso</h4>
					</div>
					<div class="modal-body">
						<h4></h4>
						<div class="clearfix"></div>
						<!-- // 
						<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
						<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
						-->
						<div class="row">
							<div class="col-md-8 col-sm-8 col-xs-12">
								<template v-if="generalSelected.isSchedule === true">
									<ul class="stats-overview">
										<li>
											<span class="name"> Fecha de Creación </span>
											<span class="value text-success"> {{ generalSelected.schedule.created }} </span>
										</li>
										<li>
											<span class="name"> Creado Por:  </span>
											<span class="value text-success"> {{ generalSelected.schedule.created_by.username }} </span>
										</li>
										<li>
											<span class="name"> Cuadrilla </span>
											<span class="value text-success">
												{{ generalSelected.schedule.group.name }}
											</span>
										</li>
									</ul>
									<ul class="stats-overview">
										<li>
											<span class="name"> Fecha de Programacion </span>
											<span class="value text-success">
												<template v-if="generalSelected.schedule.date_executed_schedule !== null">{{ generalSelected.schedule.date_executed_schedule }}</template>
												<template v-else> - </template>
											</span>
										</li>
										<li class="hidden-phone">
											<span class="name"> Fecha de Ejecución </span>
											<span class="value text-success">
												<template v-if="generalSelected.schedule.date_executed !== null">{{ generalSelected.schedule.date_executed }}</template>
												<template v-else> - </template>
											</span>
										</li>
										<li>
											<span class="name"> Fecha de Aprobación </span>
											<span class="value text-success">
												<template v-if="generalSelected.schedule.date_approved !== null">{{ generalSelected.schedule.date_approved }}</template>
												<template v-else> - </template>
											</span>
										</li>
									</ul>
								</template>
								<template v-else>
									<p>
										<span class="name"> Sin programacion</span>
										<span class="value text-success"> Lo sentimos, no hay programacion. </span>
									</p>
								</template>
							
								<br />
								<div>
									<div class="row">
										<div class="col-xs-6">
											ANTES
											<hr>
											<div class="actions fileinput-button">
												<button v-if="generalSelected.isSchedule == true && generalSelected.isApproved === false" class="btn btn-sm btn-warning "> <i class="fa fa-search"></i> Cargar Archivo </button>
											</div>
											<div class="col-xs-12 dropzone1"></div>
											<div class="table table-striped" class="files" id="previews">
												<div id="template" class="file-row">
													<!-- This is used as the file preview template -->
													<div>
														<span class="preview"><img data-dz-thumbnail /></span>
													</div>
													<div>
														<p class="name" data-dz-name></p>
														<strong class="error text-danger" data-dz-errormessage></strong>
													</div>
													<div>
														<p class="size" data-dz-size></p>
														<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
														  <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
														</div>
													</div>
													<div>
														<button class="btn btn-primary start hidden">
															<i class="glyphicon glyphicon-upload"></i>
															<span>Start</span>
														</button>
														<button data-dz-remove class="btn btn-warning cancel">
															<i class="glyphicon glyphicon-ban-circle"></i>
															<span>Cancel</span>
														</button>
														<button data-dz-remove class="btn btn-danger delete hidden">
															<i class="glyphicon glyphicon-trash"></i>
															<span>Delete</span>
														</button>
													</div>
												</div>
											</div>
											<hr>
											
											<div id="main_area">
												<!-- Slider -->
												<div class="row">
													<div class="col-sm-12" id="slider-thumbs">
														<h3>Aprobadas</h3>
														<!-- Bottom switcher of slider -->
														<ul class="hide-bullets">
															<template v-if="generalSelected.isSchedule == true">
																<li class="col-sm-2" v-for="(photographic, photographic_i) in generalSelected.schedule.emvarias_reports_photographic" v-if="photographic.type == 'A' && photographic.status == 1">
																	<a data-toggle="modal" data-target=".bs-view-photo-modal-lg" @click="fileSelected = photographic" class="thumbnail" style="height: 26px !important;" id="'carousel-selector-' + photographic_i"><img :src="photographic.file_path_short" /></a>
																</li>
															</template>
														</ul>
													</div>
													<div class="col-sm-12" id="slider-thumbs">
														<h3>En revisión</h3>
														<!-- Bottom switcher of slider -->
														<ul class="hide-bullets">
															<template v-if="generalSelected.isSchedule == true">
																<li class="col-sm-2" v-for="(photographic, photographic_i) in generalSelected.schedule.emvarias_reports_photographic" v-if="photographic.type == 'A' && photographic.status == 0">
																	<a data-toggle="modal" data-target=".bs-view-photo-modal-lg" @click="fileSelected = photographic" class="thumbnail" style="height: 26px !important;" id="'carousel-selector-' + photographic_i"><img :src="photographic.file_path_short" /></a>
																</li>
															</template>
														</ul>
													</div>
													<!--/Slider-->
												</div>

											</div>
										</div>
										<div class="col-xs-6">
											DESPUES
											<hr>
											<div class="actions fileinput-button2">
												<button v-if="generalSelected.isSchedule == true && generalSelected.isApproved === false" class="btn btn-sm btn-warning "> <i class="fa fa-search"></i> Cargar Archivo </button>
											</div>
											<div class="col-xs-12 dropzone2"></div>
											<div class="table table-striped" class="files" id="previews2">
												<div id="template2" class="file-row">
													<!-- This is used as the file preview template -->
													<div>
														<span class="preview"><img data-dz-thumbnail /></span>
													</div>
													<div>
														<p class="name" data-dz-name></p>
														<strong class="error text-danger" data-dz-errormessage></strong>
													</div>
													<div>
														<p class="size" data-dz-size></p>
														<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
														  <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
														</div>
													</div>
													<div>
														<button class="btn btn-primary start hidden">
															<i class="glyphicon glyphicon-upload"></i>
															<span>Start</span>
														</button>
														<button data-dz-remove class="btn btn-warning cancel">
															<i class="glyphicon glyphicon-ban-circle"></i>
															<span>Cancel</span>
														</button>
														<button data-dz-remove class="btn btn-danger delete hidden">
															<i class="glyphicon glyphicon-trash"></i>
															<span>Delete</span>
														</button>
													</div>
												</div>
											</div>
											<hr>
											<div id="main_area">
												<!-- Slider -->
												<div class="row">
													<div class="col-sm-12" id="slider-thumbs">
														<h3>Aprobadas</h3>
														<!-- Bottom switcher of slider -->
														<ul class="hide-bullets">
															<template v-if="generalSelected.isSchedule == true">
																<li class="col-sm-2" v-for="(photographic, photographic_i) in generalSelected.schedule.emvarias_reports_photographic" v-if="photographic.type == 'D' && photographic.status == 1">
																	<a data-toggle="modal" data-target=".bs-view-photo-modal-lg" @click="fileSelected = photographic" class="thumbnail" style="height: 26px !important;" id="'carousel-selector-' + photographic_i"><img :src="photographic.file_path_short" /></a>
																</li>
															</template>
														</ul>
													</div>
													<div class="col-sm-12" id="slider-thumbs">
														<h3>En revisión</h3>
														<!-- Bottom switcher of slider -->
														<ul class="hide-bullets">
															<template v-if="generalSelected.isSchedule == true">
																<li class="col-sm-2" v-for="(photographic, photographic_i) in generalSelected.schedule.emvarias_reports_photographic" v-if="photographic.type == 'D' && photographic.status == 0">
																	<a data-toggle="modal" data-target=".bs-view-photo-modal-lg" @click="fileSelected = photographic" class="thumbnail" style="height: 26px !important;" id="'carousel-selector-' + photographic_i"><img :src="photographic.file_path_short" /></a>
																</li>
															</template>
														</ul>
													</div>
													<!--/Slider-->
												</div>

											</div>
										</div>
									</div>
								
									<h4>Comentarios y Mensajes</h4>
									<!-- end of user messages -->
									
									<div class="modal-body" style="overflow: auto;max-height: 430px;zoom: 0.8;">
										<ul class="messages">
											<li v-for="(comment, comment_i) in generalSelected.schedule.emvarias_schedule_comments">
													<br />
												<div class="message_date">
													<h3 class="date text-info">{{ comment.created.split('-')[2].split(' ')[0] }}</h3>
													<p class="month">{{ monthText[new Date(comment.created).getMonth()] }}</p>
												</div>
												<div class="message_wrapper">
													<h4 class="heading">{{ comment.created_by.names }} {{ comment.created_by.surname }} ({{ comment.created_by.username }})</h4>
													<blockquote class="message">
														{{ comment.comment }}
													</blockquote>
													<br />
													<!-- //
													<br />
													<p class="url">
														<span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
														<a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
													</p>
													-->
												</div>
											</li>
											
										</ul>
									</div>
									<div class="modal-footer">
										<ul class="messages">
											<li>
												<div class="message_date">
													<!-- // <h3 class="date text-info">Hoy</h3>-->
												</div>
												<div class="message_wrapper">
													<h4 class="heading">Quieres enviar un mensaje sobre este evento?</h4>
														<label for="message">Mensaje/Comentario (10 min) :</label>
													<blockquote class="message">
														<textarea id="message" v-model="commentSchedule" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10" style="margin: 0px 5.66406px 0px 0px; height: 140px;"></textarea>
													</blockquote>
													<br />
													<p class="url">
														<a @click="scheduleSendComment"><i class="fa fa-send"></i> Enviar mensaje </a>
													</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							
							<!-- start project-detail sidebar -->
							<div class="col-md-4 col-sm-4 col-xs-12">
								<section class="panel">
									<!-- // 
									<div class="x_title">
										<h2>Microruta</h2>
										<div class="clearfix"></div>
									</div>
									-->
									<div class="x_title">
										<h2 class="" title="Microruta"><i class="fa fa-location-arrow"></i> {{ generalSelected.name }}</h2>
										<div class="clearfix"></div>
									</div>
									<div class="panel-body">
										<!-- // <h3 class="green"><i class="fa fa-bus"></i> {{ generalSelected.name }}</h3> -->
										<h3 class="aero"><i class="fa fa-calendar"></i> <template v-if="generalSelected.isSchedule === true"> {{ generalSelected.schedule.date_executed_schedule }}</template></h3>
										<p>Fecha de Programacion</p>
										
										<h3 class="green" v-if="generalSelected.isSchedule === true">
											<i class="fa fa-thumbs-up"></i> 
											<template v-if="generalSelected.schedule.date_executed !== null">
												{{ generalSelected.schedule.date_executed }}
											</template>
											<template v-else>
												...
											</template>
										</h3>
										<p>Fecha de Ejecución</p>
						
										<p>{{ generalSelected.lot.description }}</p>
										<br />
										<div class="project_detail">
											<p class="title">Direccion(es)</p>
											<p>{{ generalSelected.lot.address_text }}</p>
											<p class="title">Observacion(es)</p>
											<p>{{ generalSelected.lot.obs }}</p>
											<p class="title">Área</p>
											<p>{{ $root.formatMoney(generalSelected.lot.area_m2, 2, ',', '.') }} m²</p>
											<template v-if="generalSelected.isSchedule === true">
												<p class="title">Agendado por </p>
												<p>{{ generalSelected.schedule.created_by.username }}</p>
											</template>
										</div>
										<br />
										<!--
										<h5>Project files</h5>
										<ul class="list-unstyled project_files">
											<li><a href=""><i class="fa fa-file-word-o"></i> Functional-requirements.docx</a></li>
											<li><a href=""><i class="fa fa-file-pdf-o"></i> UAT.pdf</a></li>
											<li><a href=""><i class="fa fa-mail-forward"></i> Email-from-flatbal.mln</a></li>
											<li><a href=""><i class="fa fa-picture-o"></i> Logo.png</a></li>
											<li><a href=""><i class="fa fa-file-word-o"></i> Contract-10_12_2014.docx</a></li>
										</ul>
										-->
										<br />
										<div class="text-center mtop20">
											<button type="button" class="btn btn-app pull-left" v-if="generalSelected.isSchedule === true && generalSelected.isExecuted === false && generalSelected.isApproved === false">
												<i class="fa fa-calendar"></i> En progreso..
											</button>
											<button type="button" class="btn btn-app pull-left" v-if="generalSelected.isSchedule === true && generalSelected.isExecuted === true && generalSelected.isApproved === false">
												<i class="fa fa-thumbs-up"></i> Ejecutado
											</button>
										
											<!-- // <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-view-photo-modal-lg">Agregar archivos</a> -->
											<!-- // <a href="#" class="btn btn-sm btn-warning">Report contact</a> -->
											
											
										</div>
									</div>
								</section>
							</div>
							<!-- end project-detail sidebar -->

						</div>
					</div>
					<div class="modal-footer">
						<button @click="scheduleChangeToExecuted" type="button" class="btn btn-app pull-left hide" v-if="generalSelected.isSchedule === true && generalSelected.isExecuted === false && generalSelected.isApproved === false">
							<i class="fa fa-thumbs-up"></i> Pasar a "Ejecutado"
						</button>
						<button @click="scheduleChangeToNotExecuted" type="button" class="btn btn-app pull-left hide" v-if="generalSelected.isSchedule === true && generalSelected.isExecuted === true && generalSelected.isApproved === false">
							<i class="fa fa-calendar"></i> Pasar a "En Progreso..."
						</button>
						<button @click="scheduleChangeToApproved" type="button" class="btn btn-app pull-left" v-if="generalSelected.isSchedule === true && generalSelected.isExecuted === true && generalSelected.isApproved === false">
							<i class="fa fa-check-square-o"></i> Aprobar
						</button>
						
						<!-- //
						<button @click="scheduleChangeToNotApproved" type="button" class="btn btn-app pull-left" v-if="generalSelected.isSchedule === true && generalSelected.isExecuted === true && generalSelected.isApproved === true">
							<i class="fa fa-calendar"></i> Pasar a "Ejecutado"
						</button>
						-->
					
						
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						
						<!-- // <button type="button" class="btn btn-primary">Save changes</button> -->
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade bs-view-photo-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel">Contrato {{ contractName }} - {{ periodName }} {{ year }} | Informe Registro Fotografico</h4>
					</div>
					<div class="modal-body row" v-if="fileSelected.id > 0">
						<div class="col-md-7 col-sm-7 col-xs-12">
							<div class="product-image">
								<img :src="fileSelected.file_path_short" alt="..." />
							</div>
						</div>
						<div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
							<h3 class="prod_title">{{ generalSelected.name }} - {{ ((fileSelected.type == 'D')?'DESPUES':(fileSelected.type == 'A') ? 'ANTES':'OTRO') }}</h3>
							<p>
								<b>ID del archivo: </b>
								<br>
								{{ fileSelected.id }}
								<br>
								<b>Nombre del archivo: </b>
								<br>
								{{ fileSelected.file_name }}
							</p>
							<br />
							<div class="">
								<h2>Estado Actual <small></small></h2>
								<ul class="list-inline prod_size">
									<li>
										<button type="button" class="btn btn-default btn-xs">
										{{ ((fileSelected.status == 0) ? 'En revisión' : (fileSelected.status == 1) ? 'Aprobada' : (fileSelected.status == 2) ? 'Rechazada' : 'Desconocido') }}
										</button>
									</li>
								</ul>
							</div>
							<br />
							
							<div class="">
								<div class="product_price">
									<h1 class="price">{{ fileSelected.created }}</h1>
									<span class="price-tax">{{ generalSelected.schedule.group.name }}</span>
									<br>
								</div>
							</div>
							
							<!-- //
						  <div class="">
							<button type="button" class="btn btn-default btn-lg">Add to Cart</button>
							<button type="button" class="btn btn-default btn-lg">Add to Wishlist</button>
						  </div>
						  -->

						  <div class="product_social">
							<ul class="list-inline">
							  <li><a :href="fileSelected.file_path_short" target="_new"><i class="fa fa-search-plus"></i></a>
							  </li>
							  <li><a :href="fileSelected.file_path_short" download><i class="fa fa-download"></i></a>
							  </li>
							</ul>
						  </div>
						</div>
						<br />
					</div>
					<div class="modal-footer">
						<button @click="scheduleApprovedToFile" type="button" class="btn btn-app pull-left" data-dismiss="modal" v-if="fileSelected.status == 0 || fileSelected.status == 2">
							<i class="fa fa-thumbs-up"></i> Aprobar Fotografía
						</button>
						<button @click="scheduleDeclineToFile" type="button" class="btn btn-app pull-left" data-dismiss="modal" v-if="fileSelected.status == 1 || fileSelected.status == 0">
							<i class="fa fa-thumbs-up"></i> Rechazar Fotografía
						</button>
						<!-- // 
						<button type="button" class="btn btn-app pull-left" data-dismiss="modal" v-if="fileSelected.status == 0">
							<i class="fa fa-thumbs-down"></i> Rechazar Fotografía
						</button>
						-->
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<!-- // <button type="button" class="btn btn-primary">Save changes</button> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

var List = Vue.extend({
	template: '#list',
	data(){
		return {
			current: {
				dateISO: {
					year: moment().format('Y'),
					month: moment().format('M'),
					day: moment().format('D'),
				}
			},
			options: {
				emvarias_contracts: [],
				photographic_periods: [],
				photographic_groups: [],
			},
			
			
			charts: {
				plot01: [],
				plot02: [],
				plot03: [],
				plot04: [],
				plot05: [],
			},
			singleAgend: false,
			monthText: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
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
			generalSelected: {
			  "id": 0,
			  "name": "",
			  "lot": {
				"id": 0,
				"microroute_name": "",
				"id_ref": "",
				"description": "",
				"address_text": "",
				"area_m2": 0,
				"zone_client": "",
				"obs": ""
			  },
			  "contract": 0,
			  "emvarias_schedule": [
				{
				  "id": 0,
				  "microroute": 0,
				  "period": {
					"id": 0,
					"name": "",
					"start_day": 0,
					"start_month": 0,
					"end_day": 0,
					"end_month": 0
				  },
				  "group": {
					"id": 0,
					"name": ""
				  },
				  "year": 0,
				  "date_executed_schedule": "",
				  "time_executed_schedule": null,
				  "date_executed": null,
				  "time_executed": null,
				  "is_executed": 0,
				  "is_approved": 0,
				  "created": "",
				  "created_by": 0,
				  "updated": "",
				  "updated_by": null
				}
			  ],
			  "isSchedule": false,
			  "schedule": {
				"id": 0,
				"microroute": 0,
				"period": {
				  "id": 0,
				  "name": "",
				  "start_day": 0,
				  "start_month": 0,
				  "end_day": 0,
				  "end_month": 0
				},
				"group": {
				  "id": 0,
				  "name": ""
				},
				"year": 0,
				"date_executed_schedule": "",
				"time_executed_schedule": null,
				"date_executed": null,
				"time_executed": null,
				"is_executed": 0,
				"is_approved": 0,
				"created": "",
				"created_by": 0,
				"updated": "",
				"updated_by": null
			  },
			  emvarias_reports_photographic: [],
			},
			lastDayExecuted: -1,
			fileSelected: {
			  "id": 0,
			  "schedule": 0,
			  "year": 0,
			  "type": "O",
			  "group": 0,
			  "period": 0,
			  "status": 0,
			  "file_name": "",
			  "file_type": "",
			  "file_size": "",
			  "file_path_full": "",
			  "file_path_short": "",
			  "created": "",
			  "create_by": 0,
			  "updated": "",
			  "updated_by": null
			},
			commentSchedule: '',
		};
	},
	created: function () {
	},
	computed: {
		urlForm(){
			var self = this;
			url = "/index.php?action=send_photo_schedule";
			
			if(self.generalSelected.isSchedule == true && self.generalSelected.id > 0 && self.generalSelected.schedule.id !== undefined && self.generalSelected.schedule.id > 0){			
				url += "&contract_name=" + btoa(self.contractName);
				url += "&period_name=" + btoa(self.periodName);
				url += "&year=" + self.year;
				url += "&period=" + self.generalSelected.schedule.period.id;
				url += "&schedule=" + self.generalSelected.schedule.id;
				url += "&route_name=" + btoa(self.generalSelected.name);
				url += "&group=" + self.generalSelected.schedule.group.id;
				url += "&date_executed=" + self.generalSelected.schedule.date_executed_schedule;
				url += "&group_name=" + btoa(self.generalSelected.schedule.group.name);
				// console.log(url);
			}
			return url;
		},
		contractName(){
			var self = this;
			try{
				return self.options.emvarias_contracts.find(x => x.id == self.contract).name;
			} catch(e){
				return "";
			}
		},
		periodName(){
			var self = this;
			try{
				return self.options.photographic_periods.find(x => x.id == self.period).name;
			} catch(e){
				return "";
			}
		},
		groupName(){
			var self = this;
			try{
				return self.options.photographic_groups.find(x => x.id == self.generalSelected).name;
			} catch(e){
				return "";
			}
		},
		periodDateStart(){
			var self = this;
			try{
				period = self.options.photographic_periods.find(x => x.id == self.period);
				if(period.start_month == null || period.start_day == null){ throw new FormException('noDates', 'No hay fechas establecidas en la tabla de periodos'); }
				return (moment().format('Y') + '-' + ((String(period.start_month).length > 1) ? period.start_month : '0' + period.start_month) + '-' + ((String((period.start_day)).length > 1) ? period.start_day : '0' + (period.start_day)));
			} catch(e){
				return "";
			}
		},
		periodDateEnd(){
			var self = this;
			try{
				period = self.options.photographic_periods.find(x => x.id == self.period);
				if(period.end_month === null || period.end_day === null){ throw new FormException('noDates', 'No hay fechas establecidas en la tabla de periodos'); }
				return (moment().format('Y') + '-' + ((String((period.end_month)).length > 1) ? period.end_month : '0' + (period.end_month)) + '-' + ((String((period.end_day)).length > 1) ? period.end_day : '0' + (period.end_day)));
			} catch(e){
				return "";
			}
		},
	},
	mounted: function () {
		var self = this;
		self.listOptions();
		self.loadDropzone();
		self.loadDropzone2();
		
		//self.load();
	},
	methods: {
		loadDropzone(){
			var self = this;
			// Dropzone class:
			// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
			var previewNode = document.querySelector("#template");
			previewNode.id = "";
			var previewTemplate = previewNode.parentNode.innerHTML;
			previewNode.parentNode.removeChild(previewNode);
			
			var myDropzone = new Dropzone(".dropzone1", { // Make the whole body a dropzone
			  url: self.urlForm, // Set the url
			  thumbnailWidth: 80,
			  thumbnailHeight: 80,
			  parallelUploads: 3,
			  previewTemplate: previewTemplate,
			  autoQueue: true, // Make sure the files aren't queued until manually added
			  previewsContainer: "#previews", // Define the container to display the previews
			  clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
			  ,init: function() {
				this.on("processing", function(file) {
					// console.log('processing');
					this.options.url = self.urlForm + "&type=A";
				});
			  }
				
			});
			
			myDropzone.on("addedfile", function(file) {
			  // Hookup the start button
			  file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
			});
			
			// Update the total progress bar
			myDropzone.on("totaluploadprogress", function(progress) {
			  $("#total-progress .progress-bar").css('width', progress + "%");
			});

			myDropzone.on("sending", function(file) {
			  // Show the total progress bar when upload starts
			  $("#total-progress").css('opacity', "1");
			  // And disable the start button
			  file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
			});
			// Hide the total progress bar when nothing's uploading anymore
			myDropzone.on("queuecomplete", function(progress) {
			  $("#total-progress").css('opacity', "0");
			});
			// Hide the total progress bar when nothing's uploading anymore
			myDropzone.on("success", function(file, response) {
				// console.log('response ', response);
				if(response.error == false){
					console.log('eliminar');
					myDropzone.removeFile(file);
					self.generalSelected.schedule.emvarias_reports_photographic.push({
						id: response.files[0].id,
						schedule: self.generalSelected.schedule.id,
						year: self.generalSelected.schedule.year,
						type: "A",
						group: self.generalSelected.schedule.group.id,
						period: self.generalSelected.schedule.period.id,
						status: 0,
						file_name: response.files[0].name,
						file_type: response.files[0].type,
						file_size: response.files[0].size,
						file_path_full: response.files[0].path_full,
						file_path_short: response.files[0].path_short,
					});
				}
			});
			
			// Setup the buttons for all transfers
			// The "add files" button doesn't need to be setup because the config
			// `clickable` has already been specified.
			$("#actions .start").onclick = function() {
			  myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
			};
			$("#actions .start").onclick = function() {
			  myDropzone.removeAllFiles(true);
			};
			// "myAwesomeDropzone" is the camelized version of the HTML element's ID
			
			var randNum = function() {
				return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
			};
			
			/*
			$('#myCarousel').carousel({
					interval: 5000
			});
	 
			//Handles the carousel thumbnails
			$('[id^=carousel-selector-]').click(function () {
				var id_selector = $(this).attr("id");
				try {
					var id = /-(\d+)$/.exec(id_selector)[1];
					console.log(id_selector, id);
					jQuery('#myCarousel').carousel(parseInt(id));
				} catch (e) {
					console.log('Regex failed!', e);
				}
			});
			// When the carousel slides, auto update the text
			$('#myCarousel').on('slid.bs.carousel', function (e) {
					 var id = $('.item.active').data('slide-number');
					$('#carousel-text').html($('#slide-content-'+id).html());
			});*/
		},
		loadDropzone2(){
			var self = this;
			// Dropzone class:
			// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
			var previewNode = document.querySelector("#template2");
			previewNode.id = "";
			var previewTemplate = previewNode.parentNode.innerHTML;
			previewNode.parentNode.removeChild(previewNode);
			
			var myDropzone = new Dropzone(".dropzone2", { // Make the whole body a dropzone
			  url: self.urlForm, // Set the url
			  thumbnailWidth: 80,
			  thumbnailHeight: 80,
			  parallelUploads: 3,
			  previewTemplate: previewTemplate,
			  autoQueue: true, // Make sure the files aren't queued until manually added
			  previewsContainer: "#previews2", // Define the container to display the previews
			  clickable: ".fileinput-button2" // Define the element that should be used as click trigger to select files.
			  ,init: function() {
				this.on("processing", function(file) {
					// console.log('processing');
					this.options.url = self.urlForm + "&type=D";
				});
			  }
				
			});
			
			myDropzone.on("addedfile", function(file) {
				// Hookup the start button
				// file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
			});
			
			// Update the total progress bar
			myDropzone.on("totaluploadprogress", function(progress) {
				$("#total-progress2 .progress-bar").css('width', progress + "%");
			});

			myDropzone.on("sending", function(file) {
				// Show the total progress bar when upload starts
				$("#total-progress2").css('opacity', "1");
				// And disable the start button
				//file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
			});
			// Hide the total progress bar when nothing's uploading anymore
			myDropzone.on("queuecomplete", function(progress) {
				$("#total-progress2").css('opacity', "0");
			});
			// Hide the total progress bar when nothing's uploading anymore
			myDropzone.on("success", function(file, response) {
				// console.log('response ', response);
				if(response.error == false){
					console.log('eliminar');
					myDropzone.removeFile(file);
					self.generalSelected.schedule.emvarias_reports_photographic.push({
						id: response.files[0].id,
						schedule: self.generalSelected.schedule.id,
						year: self.generalSelected.schedule.year,
						type: "D",
						group: self.generalSelected.schedule.group.id,
						period: self.generalSelected.schedule.period.id,
						status: 0,
						file_name: response.files[0].name,
						file_type: response.files[0].type,
						file_size: response.files[0].size,
						file_path_full: response.files[0].path_full,
						file_path_short: response.files[0].path_short,
					});
				}
			});
			
			// Setup the buttons for all transfers
			// The "add files" button doesn't need to be setup because the config
			// `clickable` has already been specified.
			/*
			$("#actions .start").onclick = function() {
			  myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
			};
			$("#actions .start").onclick = function() {
			  myDropzone.removeAllFiles(true);
			};*/
			// "myAwesomeDropzone" is the camelized version of the HTML element's ID
			
		},
		listOptions(){
			var self = this;
			MV.api.readList('photographic_periods', {}, function(e){
				self.options.photographic_periods = e;
				e.forEach(function(b){ if((self.current.dateISO.day >= b.start_day && self.current.dateISO.day <= b.end_day) == true && b.start_month == self.current.dateISO.month){ self.period = b.id; } });					
			});
			MV.api.readList('emvarias_contracts', {}, function(e){
				self.options.emvarias_contracts = e;
			});
			MV.api.readList('photographic_groups', {}, function(e){
				self.options.photographic_groups = e;
			});
		},
		isExecuted(item){
			var self = this;
			result = false;
			try {
				if(item.emvarias_schedule.length > 0){
					isSchedule = item.emvarias_schedule.find(x => (x.period.id == self.period && x.year == self.year) );
					if(isSchedule !==undefined && isSchedule.id > 0 && isSchedule.is_executed == 1){
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
		},
		isApproved(item){
			var self = this;
			result = false;
			try {
				if(item.emvarias_schedule.length > 0){
					isSchedule = item.emvarias_schedule.find(x => (x.period.id == self.period && x.year == self.year) );
					if(isSchedule !==undefined && isSchedule.id > 0 && isSchedule.is_approved == 1){
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
		
		scheduleSendComment(){
			var self = this;
			if(self.commentSchedule.length < 9){ return false; }
			
			bootbox.confirm({
				message: "Debes confirmar antes de continuar.",
				locale: 'es',
				buttons: {
					confirm: {
						label: 'Continuar',
						className: 'btn-success'
					},
					cancel: {
						label: 'Cancelar',
						className: 'btn-default'
					}
				},
				callback: function (result) {
					
					if(result === true){
						api.post('/records/emvarias_schedule_comments', {
							schedule: self.generalSelected.schedule.id,
							comment: self.commentSchedule,
							created_by: <?= $this->user->id; ?>,
						}).then(function (response) {
							if(response.status == 200){
								// console.log(indexSheduled, response);
								var insert = {
									id: response.data,
									schedule: self.generalSelected.schedule.id,
									comment: self.commentSchedule,
									created_by: <?= json_encode($this->user); ?>,
									created: new Date().getFullYear() + "-" + (new Date().getMonth()+1) + "-" + new Date().getDate(),
								};
								
								indexSheduled = self.records.findIndex(x => (x.id == self.generalSelected.id));
								if(indexSheduled > -1){
									console.log('insert', insert);
									self.records[indexSheduled].schedule.emvarias_schedule_comments.push(insert);
									
									self.generalSelected.schedule.emvarias_schedule_comments.push(insert);
									/*
									self.generalSelected.schedule.emvarias_schedule_comments.push();;
									self.records[indexSheduled].schedule.emvarias_schedule_comments.push({
										id: response.data,
										schedule: self.generalSelected.schedule.id,
										comment: self.commentSchedule,
										created_by: <?= json_encode($this->user); ?>,
										created: new Date().toLocaleString(),
									});;
									*/
								}
								self.commentSchedule = '';
							}
						}).catch(function (error) {
							console.error(error);
							console.log(error.response);
						});
					}
				}
			});
		},
		scheduleChangeToNotExecuted(){
			var self = this;
			bootbox.confirm({
				message: "Debes confirmar antes de continuar.",
				locale: 'es',
				buttons: {
					confirm: {
						label: 'Continuar',
						className: 'btn-success'
					},
					cancel: {
						label: 'Cancelar',
						className: 'btn-default'
					}
				},
				callback: function (result) {
					if(result === true){
						console.log('self.generalSelected.schedule.id', self.generalSelected.schedule.id);
						api.put('/records/emvarias_schedule/' + self.generalSelected.schedule.id, {
							id: self.generalSelected.schedule.id,
							is_executed: 0,
							updated_by: <?= $this->user->id; ?>,
						}).then(function (response) {
							if(response.status == 200){
								self.generalSelected.schedule.date_executed = null;
								self.generalSelected.schedule.is_executed = 0;
								self.generalSelected.isExecuted = false;
								indexSheduled = self.records.findIndex(x => (x.id == self.generalSelected.id));
								if(indexSheduled > -1){
									self.records[indexSheduled].isExecuted = false;
									self.records[indexSheduled].schedule.is_executed = 0;
									self.records[indexSheduled].schedule.date_executed = null;
								}
								
								self.total_m2_executed -= self.generalSelected.lot.area_m2;
							}
						}).catch(function (error) {
							console.error(error);
							console.log(error.response);
						});
					}
				}
			});
		},
		scheduleChangeToExecuted(){
			var self = this;
			//$(".bs-info-general-modal-lg").modal('show');
			//$(".bs-info-general-modal-lg").modal('hide');
			bootbox.confirm({
				message: "Debes confirmar antes de continuar.",
				locale: 'es',
				buttons: {
					confirm: {
						label: 'Continuar',
						className: 'btn-success'
					},
					cancel: {
						label: 'Cancelar',
						className: 'btn-default'
					}
				},
				callback: function (result) {
					if(result === true){
						console.log('self.generalSelected.schedule.id', self.generalSelected.schedule.id);
						api.put('/records/emvarias_schedule/' + self.generalSelected.schedule.id, {
							id: self.generalSelected.schedule.id,
							is_executed: 1,
							date_executed: moment().format('Y-MM-DD'),
							updated_by: <?= $this->user->id; ?>,
						}).then(function (response) {
							if(response.status == 200){
								self.generalSelected.schedule.is_executed = 1;
								self.generalSelected.schedule.date_executed = moment().format('Y-MM-DD');
								self.generalSelected.isExecuted = true;
								indexSheduled = self.records.findIndex(x => (x.id == self.generalSelected.id));
								if(indexSheduled > -1){
									self.records[indexSheduled].isExecuted = true;
									self.records[indexSheduled].schedule.date_executed = moment().format('Y-MM-DD');
									self.records[indexSheduled].schedule.is_executed = 1;
								}
								self.total_m2_executed += self.generalSelected.lot.area_m2;
							}
							//$(".bs-info-general-modal-lg").modal('show');
						}).catch(function (error) {
							console.error(error);
							console.log(error.response);
						});
					} else {
						//$(".bs-info-general-modal-lg").modal('show');
					}
				}
			});
		},
		scheduleChangeToApproved(){
			var self = this;
			bootbox.confirm({
				message: "Debes confirmar antes de continuar.",
				locale: 'es',
				buttons: {
					confirm: {
						label: 'Continuar',
						className: 'btn-success'
					},
					cancel: {
						label: 'Cancelar',
						className: 'btn-default'
					}
				},
				callback: function (result) {
					if(result === true){
						console.log('self.generalSelected.schedule.id', self.generalSelected.schedule.id);
						api.put('/records/emvarias_schedule/' + self.generalSelected.schedule.id, {
							id: self.generalSelected.schedule.id,
							is_approved: 1,
							date_approved: moment().format('Y-MM-DD'),
							updated_by: <?= $this->user->id; ?>,
						}).then(function (response) {
							if(response.status == 200){
								self.generalSelected.schedule.is_approved = 1;
								self.generalSelected.schedule.date_approved = moment().format('Y-MM-DD');
								self.generalSelected.isApproved = true;
								indexSheduled = self.records.findIndex(x => (x.id == self.generalSelected.id));
								if(indexSheduled > -1){
									self.records[indexSheduled].isApproved = true;
									self.records[indexSheduled].schedule.is_approved = 1;
									self.records[indexSheduled].schedule.date_approved = moment().format('Y-MM-DD');
								}
								self.total_m2_approved += self.generalSelected.lot.area_m2;
							}
						}).catch(function (error) {
							console.error(error);
							console.log(error.response);
						});
					}
				}
			});
		},
		scheduleChangeToNotApproved(){
			var self = this;
			bootbox.confirm({
				message: "Debes confirmar antes de continuar.",
				locale: 'es',
				buttons: {
					confirm: {
						label: 'Continuar',
						className: 'btn-success'
					},
					cancel: {
						label: 'Cancelar',
						className: 'btn-default'
					}
				},
				callback: function (result) {
					if(result === true){
						console.log('self.generalSelected.schedule.id', self.generalSelected.schedule.id);
						api.put('/records/emvarias_schedule/' + self.generalSelected.schedule.id, {
							id: self.generalSelected.schedule.id,
							is_approved: 0,
							updated_by: <?= $this->user->id; ?>,
						}).then(function (response) {
							if(response.status == 200){
								self.generalSelected.schedule.is_approved = 0;
								self.generalSelected.isApproved = false;
								indexSheduled = self.records.findIndex(x => (x.id == self.generalSelected.id));
								if(indexSheduled > -1){
									self.records[indexSheduled].isApproved = false;
									self.records[indexSheduled].schedule.is_approved = 0;
								}
							}
						}).catch(function (error) {
							console.error(error);
							console.log(error.response);
						});
					}
				}
			});
		},
		
		
		scheduleApprovedToFile(){
			var self = this;
			bootbox.confirm({
				message: "Debes confirmar antes de continuar.",
				locale: 'es',
				buttons: {
					confirm: {
						label: 'Continuar',
						className: 'btn-success'
					},
					cancel: {
						label: 'Cancelar',
						className: 'btn-default'
					}
				},
				callback: function (result) {
					if(result === true){
						console.log('self.fileSelected.id', self.fileSelected.id);
						api.put('/records/emvarias_reports_photographic/' + self.fileSelected.id, {
							id: self.fileSelected.id,
							status: 1,
							updated_by: <?= $this->user->id; ?>,
						}).then(function (response) {
							if(response.status == 200){
								self.fileSelected.status = 1;
								indexSheduled = self.records.findIndex(x => (x.id == self.generalSelected.id));
								if(indexSheduled > -1){
									indexFile = self.records[indexSheduled].schedule.emvarias_reports_photographic.findIndex(x => (x.id == self.fileSelected.id));
									if(indexFile > -1){
										self.records[indexSheduled].schedule.emvarias_reports_photographic[indexFile].status = 1;
									}
								}
							}
						}).catch(function (error) {
							console.error(error);
							console.log(error.response);
						});
					}
				}
			});
		},
		
		scheduleDeclineToFile(){
			var self = this;
			bootbox.confirm({
				message: "Debes confirmar antes de continuar.",
				locale: 'es',
				buttons: {
					confirm: {
						label: 'Continuar',
						className: 'btn-success'
					},
					cancel: {
						label: 'Cancelar',
						className: 'btn-default'
					}
				},
				callback: function (result) {
					if(result === true){
						console.log('self.fileSelected.id', self.fileSelected.id);
						api.put('/records/emvarias_reports_photographic/' + self.fileSelected.id, {
							id: self.fileSelected.id,
							status: 2,
							updated_by: <?= $this->user->id; ?>,
						}).then(function (response) {
							if(response.status == 200){
								self.fileSelected.status = 2;
								indexSheduled = self.records.findIndex(x => (x.id == self.generalSelected.id));
								if(indexSheduled > -1){
									indexFile = self.records[indexSheduled].schedule.emvarias_reports_photographic.findIndex(x => (x.id == self.fileSelected.id));
									if(indexFile > -1){
										self.records[indexSheduled].schedule.emvarias_reports_photographic[indexFile].status = 2;
									}
								}
							}
						}).catch(function (error) {
							console.error(error);
							console.log(error.response);
						});
					}
				}
			});
		},
		
		
		declineFile(){
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
						api.put('/records/emvarias_schedule/' + self.generalSelected.schedule.id, {
							id: self.generalSelected.schedule.id,
							status: 2,
							updated_by: <?= $this->user->id; ?>,
						}).then(function (response) {
							if(response.status == 200){
								self.generalSelected.schedule.status = 2;
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
												urlWA = 'https://wa.me/57' + self.generalSelected.schedule.created_by.mobile + '?text=Se%20ha%20rechazado%20una%20FOTO' + '.%0AIngresa%20a%20https%3A%2F%2Fmicuenta.monteverdeltda.com%20para%20gestionarla.';
												window.open(urlWA,'popUpWindow','height=500,width=600,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');
											}
										}
									});
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
		
		load(){
			var self = this;
			self.loading = true;
			self.records = [];
			self.charts.plot01 = [];
			self.charts.plot02 = [];
			self.charts.plot03 = [];
			self.charts.plot04 = [];
			self.charts.plot05 = [];
			self.total = 0;
			window.scrollTo(0, 0);
			if(self.period <= 0 || self.year <= 0){ return false; }
			var dialog = bootbox.dialog({
				message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
				closeButton: false
			});
			
			
			startDate = new Date(self.periodDateStart);
			// endDate = new Date(self.periodDateStart).addDays(15);
			endDate = new Date(self.periodDateEnd);
			console.log('startDate', startDate);
			console.log('endDate', endDate);
			
			
			
			for (var i = -1; i < ((((((endDate-startDate)/1000)/60)/60)/24)+2); i++) {
				var dat = new Date(startDate).add(i).days();
				self.charts.plot01.push([dat.getTime(), 0]);
				self.charts.plot02.push([dat.getTime(), 0]);
				self.charts.plot03.push([dat.getTime(), 0]);
				self.charts.plot04.push([dat.getTime(), 0]);
			}
			
			self.options.photographic_groups.forEach(function(xa){
				self.charts.plot05.push({
					id: xa.id,
					label: xa.name,
					data: 0,
				});
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
					'emvarias_schedule,emvarias_reports_photographic',
					'emvarias_schedule,users',
					'emvarias_schedule,emvarias_schedule_comments,users',
				],
			} }).then(function (a) {
				if(a.status === 200){
					self.total = a.data.records.length;
					var recordsSends = [];
					
					var theme = {
						  color: [
							  '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
							  '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
						  ],

						  title: {
							  itemGap: 8,
							  textStyle: {
								  fontWeight: 'normal',
								  color: '#408829'
							  }
						  },

						  dataRange: {
							  color: ['#1f610a', '#97b58d']
						  },

						  toolbox: {
							  color: ['#408829', '#408829', '#408829', '#408829']
						  },

						  tooltip: {
							  backgroundColor: 'rgba(0,0,0,0.5)',
							  axisPointer: {
								  type: 'line',
								  lineStyle: {
									  color: '#408829',
									  type: 'dashed'
								  },
								  crossStyle: {
									  color: '#408829'
								  },
								  shadowStyle: {
									  color: 'rgba(200,200,200,0.3)'
								  }
							  }
						  },

						  dataZoom: {
							  dataBackgroundColor: '#eee',
							  fillerColor: 'rgba(64,136,41,0.2)',
							  handleColor: '#408829'
						  },
						  grid: {
							  borderWidth: 0
						  },

						  categoryAxis: {
							  axisLine: {
								  lineStyle: {
									  color: '#408829'
								  }
							  },
							  splitLine: {
								  lineStyle: {
									  color: ['#eee']
								  }
							  }
						  },

						  valueAxis: {
							  axisLine: {
								  lineStyle: {
									  color: '#408829'
								  }
							  },
							  splitArea: {
								  show: true,
								  areaStyle: {
									  color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
								  }
							  },
							  splitLine: {
								  lineStyle: {
									  color: ['#eee']
								  }
							  }
						  },
						  timeline: {
							  lineStyle: {
								  color: '#408829'
							  },
							  controlStyle: {
								  normal: {color: '#408829'},
								  emphasis: {color: '#408829'}
							  }
						  },

						  k: {
							  itemStyle: {
								  normal: {
									  color: '#68a54a',
									  color0: '#a9cba2',
									  lineStyle: {
										  width: 1,
										  color: '#408829',
										  color0: '#86b379'
									  }
								  }
							  }
						  },
						  map: {
							  itemStyle: {
								  normal: {
									  areaStyle: {
										  color: '#ddd'
									  },
									  label: {
										  textStyle: {
											  color: '#c12e34'
										  }
									  }
								  },
								  emphasis: {
									  areaStyle: {
										  color: '#99d2dd'
									  },
									  label: {
										  textStyle: {
											  color: '#c12e34'
										  }
									  }
								  }
							  }
						  },
						  force: {
							  itemStyle: {
								  normal: {
									  linkStyle: {
										  strokeColor: '#408829'
									  }
								  }
							  }
						  },
						  chord: {
							  padding: 4,
							  itemStyle: {
								  normal: {
									  lineStyle: {
										  width: 1,
										  color: 'rgba(128, 128, 128, 0.5)'
									  },
									  chordStyle: {
										  lineStyle: {
											  width: 1,
											  color: 'rgba(128, 128, 128, 0.5)'
										  }
									  }
								  },
								  emphasis: {
									  lineStyle: {
										  width: 1,
										  color: 'rgba(128, 128, 128, 0.5)'
									  },
									  chordStyle: {
										  lineStyle: {
											  width: 1,
											  color: 'rgba(128, 128, 128, 0.5)'
										  }
									  }
								  }
							  }
						  },
						  gauge: {
							  startAngle: 225,
							  endAngle: -45,
							  axisLine: {
								  show: true,
								  lineStyle: {
									  color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
									  width: 8
								  }
							  },
							  axisTick: {
								  splitNumber: 10,
								  length: 12,
								  lineStyle: {
									  color: 'auto'
								  }
							  },
							  axisLabel: {
								  textStyle: {
									  color: 'auto'
								  }
							  },
							  splitLine: {
								  length: 18,
								  lineStyle: {
									  color: 'auto'
								  }
							  },
							  pointer: {
								  length: '90%',
								  color: 'auto'
							  },
							  title: {
								  textStyle: {
									  color: '#333'
								  }
							  },
							  detail: {
								  textStyle: {
									  color: 'auto'
								  }
							  }
						  },
						  textStyle: {
							  fontFamily: 'Arial, Verdana, sans-serif'
						  }
					  };

					a.data.records.forEach(function(b){
						self.lastDayExecuted = -1;
						self.total_m2 += (b.lot.area_m2) * b.repeat;
						detectCalendar = (b.emvarias_schedule[0] !== undefined) ? true : false;
						
						if(detectCalendar == true){
							b.emvarias_schedule.forEach(function(c){
								self.lastDayExecuted = -1;
								self.total_m2_schedule += b.lot.area_m2;
								// Charts
								indexSheduled = self.charts.plot01.findIndex(x => (x[0] == new Date(c.date_executed_schedule).getTime()));
								if(indexSheduled > -1){
									self.charts.plot01[indexSheduled][1] += (b.lot.area_m2);
								}
								
								
								if(c.is_executed == 1){
									self.total_m2_executed += b.lot.area_m2;
									indexExecuted = self.charts.plot02.findIndex(x => (x[0] == new Date(c.date_executed).getTime()));
									if(indexExecuted > -1){
										self.charts.plot02[indexExecuted][1] += parseFloat(b.lot.area_m2);
										self.charts.plot04[indexExecuted][1] += (parseFloat(b.lot.area_m2) + ((self.lastDayExecuted > -1) ? self.charts.plot04[self.lastDayExecuted][1] : 0));
										
								}
									indexGroupChart = self.charts.plot05.findIndex(x => (x.id == c.group.id));
									if(indexGroupChart > -1){
										// self.charts.plot04[indexExecuted][1] += (parseFloat(b.lot.area_m2) + ((self.lastDayExecuted > -1) ? self.charts.plot04[self.lastDayExecuted][1] : 0));
										self.charts.plot05[indexGroupChart].data += parseFloat(b.lot.area_m2);
									}
									
									self.lastDayExecuted = indexExecuted;
								}
								
								if(c.is_approved == 1){
									self.total_m2_approved += b.lot.area_m2;
									indexApproved = self.charts.plot02.findIndex(x => (x[0] == new Date(c.date_approved).getTime()));
									if(indexApproved > -1){
										self.charts.plot03[indexApproved][1] += parseFloat(b.lot.area_m2);
									}
								}
								
								// repeat
								
								recordsSends.push({
									id: b.id,
									name: b.name,
									area_m2: b.lot.area_m2,
									repeat: b.repeat,
									repeatDetect: b.repeat,
									lot: b.lot,
									contract: b.contract,
									isSchedule: true,
									isExecuted: c.is_executed == 1 ? true : false,
									isApproved: c.is_approved == 1 ? true : false,
									schedule: c,
								});
							});
						} else {
							recordsSends.push({
								id: b.id,
								name: b.name,
								area_m2: b.lot.area_m2,
								repeat: b.repeat,
								repeatDetect: b.repeat,
								lot: b.lot,
								contract: b.contract,
								isSchedule: false,
								isExecuted: false,
								isApproved: false,
								schedule: null,
							});
						}
					});
					self.records = recordsSends;
					
					var chart_plot_02_settings = {
						grid: {
							show: true,
							aboveData: true,
							color: "#3f3f3f",
							labelMargin: 10,
							axisMargin: 0,
							borderWidth: 0,
							borderColor: null,
							minBorderMargin: 5,
							clickable: true,
							hoverable: true,
							autoHighlight: true,
							mouseActiveRadius: 100
						},
						series: {
							lines: {
								show: true,
								fill: true,
								lineWidth: 2,
								steps: false
							},
							points: {
								show: true,
								radius: 3.5,
								symbol: "circle",
								lineWidth: 3.0
							}
						},
						legend: {
							position: "ne",
							margin: [0, -25],
							noColumns: 0,
							labelBoxBorderColor: null,
							labelFormatter: function(label, series) {
								return label + '&nbsp;&nbsp;';
							},
							width: 40,
							height: 1
						},
						colors: ['rgba(255, 255, 0, 0.45)', '#3F97EB', '#72c380', '#6f7a8a', '#f7cb38', '#5a8022', '#2c7282'],
						shadowSize: 0,
						tooltip: true,
						tooltipOpts: {
							content: "%s: %y.0",
							xDateFormat: "%d/%m",
						shifts: {
							x: -30,
							y: -50
						},
						defaultTheme: false
						},
						yaxis: {
							min: 0
						},
						xaxis: {
							mode: "time",
							minTickSize: [1, "day"],
							timeformat: "%d/%m/%y",
							//min: chart_plot_02_data[0][0],
							//max: chart_plot_02_data[20][0]
						}
					};	
						
					
					if ($("#chart_plot_02").length){			
						// console.log(('Plot2');
						finalChart01 = [];
						finalChart02 = [];
						finalChart03 = [];
						finalChart04 = [];
						self.charts.plot01.forEach(function(x){ if(x[1] >= 0){ finalChart01.push(x); } });
						self.charts.plot02.forEach(function(x){ if(x[1] >= 0){ finalChart02.push(x); } });
						self.charts.plot03.forEach(function(x){ if(x[1] >= 0){ finalChart03.push(x); } });
						
						
							
						$.plot( $("#chart_plot_02"), 
						[{ 
							label: "Programado", 
							data: finalChart01, 
							lines: { 
								fillColor: "rgba(150, 100, 89, 0.12)" 
							}, 
							points: { 
								fillColor: "#fff" } 
						},{ 
							label: "Ejecutado", 
							data: finalChart02, 
							lines: { 
								fillColor: "rgba(63, 151, 235, 0.12)" 
							}, 
							points: { 
								fillColor: "#fff" } 
						},{ 
							label: "Aprobado", 
							data: finalChart03, 
							lines: { 
								fillColor: "rgba(202,150, 0, 0.12)" 
							}, 
							points: { 
								fillColor: "#fff" } 
						}], chart_plot_02_settings);
						
						
						ot = 0;
						chart1 = [];
						self.charts.plot01.forEach(function(x){ if(x[1] > 0){ ot += x[1]; x[1] = ot; chart1.push(x); } });
						
						ot = 0;
						chart2 = [];
						self.charts.plot02.forEach(function(x){ if(x[1] > 0){ ot += x[1]; x[1] = ot; chart2.push(x); } });
						
						chart3_label = [];
						chart3_data = [];
						self.charts.plot05.forEach(function(x){ if(x.id > 0){ chart3_label.push(x.label); chart3_data.push(x.data); } });
						
						console.log('self.charts', self.charts);
						console.log('self.chart1', chart1);
						console.log('self.chart2', chart2);
						console.log('self.chart3_data', chart3_data);
						$.plot( $("#sparkline22"), [
						{ 
							label: "Programado", 
							data: chart1, 
							lines: { 
								fillColor: "rgba(150, 100, 89, 0.12)" 
							}, 
							points: { 
								fillColor: "#fff" } 
						},{ 
							label: "Ejecutado", 
							data: chart2, 
							lines: { 
								fillColor: "rgba(63, 151, 235, 0.12)" 
							}, 
							points: { 
								fillColor: "#fff" } 
						}], chart_plot_02_settings);
						
						
						var chart_doughnut_settings = {
								type: 'pie',
								tooltipFillColor: "rgba(51, 51, 51, 1)",
								data: {
									labels: chart3_label,
									datasets: [{
										data: chart3_data,
										backgroundColor: [
											"#BDC3C7",
											"#9B59B6",
											"#E74C3C",
											"#26B99A",
											"#3498DB",
											"#72c380"
										],
										hoverBackgroundColor: [
											"#CFD4D8",
											"#B370CF",
											"#E95E4F",
											"#36CAAB",
											"#49A9EA"
										]
									}]
								},
								options: { 
									legend: true, 
									responsive: true
								}
							}
						$('.canvasDoughnut_02').each(function(){
							
							var chart_element = $(this);
							var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);
							
						});
						
						var chart_pie = [];
						self.charts.plot05.forEach(function(hx){
							chart_pie.push({
								id: hx.id,
								name: hx.label,
								value: hx.data
							});
						});
						
						if ($('#echart_pie2').length ){ 
						  var echartPieCollapse = echarts.init(document.getElementById('echart_pie2'));
									/*
								  echartPieCollapse.setOption({
									tooltip: {
										trigger: 'item',
										formatter: '{a} <br/>{b}: {c} ({d}%)'
									},
									legend: {
										orient: 'vertical',
										left: 10,
										data: ['直达', '营销广告', '搜索引擎', '邮件营销', '联盟广告', '视频广告', '百度', '谷歌', '必应', '其他']
									},
									series: [
										{
											name: '访问来源',
											type: 'pie',
											selectedMode: 'single',
											radius: [0, '30%'],

											label: {
												position: 'inner'
											},
											labelLine: {
												show: false
											},
											data: [
												{value: 335, name: '直达', selected: true},
												{value: 679, name: '营销广告'},
												{value: 1548, name: '搜索引擎'}
											]
										},
										{
											name: '访问来源',
											type: 'pie',
											radius: ['40%', '55%'],
											label: {
												formatter: '{a|{a}}{abg|}\n{hr|}\n  {b|{b}：}{c}  {per|{d}%}  ',
												backgroundColor: '#eee',
												borderColor: '#aaa',
												borderWidth: 1,
												borderRadius: 4,
												// shadowBlur:3,
												// shadowOffsetX: 2,
												// shadowOffsetY: 2,
												// shadowColor: '#999',
												// padding: [0, 7],
												rich: {
													a: {
														color: '#999',
														lineHeight: 22,
														align: 'center'
													},
													// abg: {
													//     backgroundColor: '#333',
													//     width: '100%',
													//     align: 'right',
													//     height: 22,
													//     borderRadius: [4, 4, 0, 0]
													// },
													hr: {
														borderColor: '#aaa',
														width: '100%',
														borderWidth: 0.5,
														height: 0
													},
													b: {
														fontSize: 16,
														lineHeight: 33
													},
													per: {
														color: '#eee',
														backgroundColor: '#334455',
														padding: [2, 4],
														borderRadius: 2
													}
												}
											},
											data: [
												{value: 335, name: '直达'},
												{value: 310, name: '邮件营销'},
												{value: 234, name: '联盟广告'},
												{value: 135, name: '视频广告'},
												{value: 1048, name: '百度'},
												{value: 251, name: '谷歌'},
												{value: 147, name: '必应'},
												{value: 102, name: '其他'}
											]
										}
									]
								});
								*/
								
						
						  echartPieCollapse.setOption({
							tooltip: {
							  trigger: 'item',
							  formatter: "{a} <br/>{b} : {c} ({d}%)"
							},
							legend: {
							  x: 'center',
							  y: 'bottom',
							  data: chart3_label
							},
							toolbox: {
							  show: true,
							  feature: {
								magicType: {
								  show: true,
								  type: ['pie', 'funnel']
								},
								restore: {
								  show: true,
								  title: "Restore"
								},
								saveAsImage: {
								  show: true,
								  title: "Save Image"
								}
							  }
							},
							calculable: true,
							series: [{
							  name: 'Area Mode',
							  type: 'pie',
							  radius: [25, 90],
							  center: ['50%', 170],
							  roseType: 'area',
							  x: '50%',
							  max: self.total_m2_schedule,
							  sort: 'ascending',
							  data: chart_pie
							}]
						  });
						}
					}
					
					dialog.modal('hide');
					// console.log('Normal: ', a.data.records);
					//$('[data-toggle="tooltip"]').tooltip()
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
	mounted(){
		
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
		kFormatter(num) {
			return Math.abs(num) > 999 ? Math.sign(num)*((Math.abs(num)/1000).toFixed(1)) + 'k' : Math.sign(num)*Math.abs(num);
		},
		nFormatter(num, digits) {
		  var si = [
			{ value: 1, symbol: "" },
			{ value: 1E3, symbol: "k" },
			{ value: 1E6, symbol: "M" },
			{ value: 1E9, symbol: "G" },
			{ value: 1E12, symbol: "T" },
			{ value: 1E15, symbol: "P" },
			{ value: 1E18, symbol: "E" }
		  ];
		  var rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
		  var i;
		  for (i = si.length - 1; i > 0; i--) {
			if (num >= si[i].value) {
			  break;
			}
		  }
		  return (num / si[i].value).toFixed(digits).replace(rx, "$1") + si[i].symbol;
		},
	}
}).$mount('#emvarias-lots');
</script>