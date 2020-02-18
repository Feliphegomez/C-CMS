<style>
.modal {
	overflow: auto !important;
}

.list-inline-sonar {display:block;}
.list-inline-sonar li{display:inline-block;}
.list-inline-sonar li:after{content:'|'; margin:0 10px;}

.sonar-wrapper .purple {
	background-color: purple !important;
}
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
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<fieldset>
								<div class="control-group">
									<div class="controls">
										<div class="col-md-11 xdisplay_inputx form-group has-feedback">
											<input v-model="filter.date" type="text" class="form-control has-feedback-left" id="date-filter" placeholder="First Name" aria-describedby="inputSuccess2Status2" />
											<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
											<span id="inputSuccess2Status2" class="sr-only">(success)</span>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</fieldset>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							Periodo en Observacion: {{ periodName }} {{ filter.year }}
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="row top_tiles">
				<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-calendar"></i></div>
						<div class="count">{{ totals.area_m2.schedule.toLocaleString() }} m²</div>
						<h3>Programado(s)</h3>
						<p>El total de lotes es {{ totals.lots.schedule.toLocaleString() }}.</p>
					</div>
				</div>
				
				<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-thumbs-up"></i></div>
						<div class="count">{{ totals.area_m2.executed.toLocaleString() }} m²</div>
						<h3>Ejecutado(s)</h3>
						<p>El total de lotes es {{ totals.lots.executed.toLocaleString() }}.</p>
					</div>
				</div>
				
				<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-check-square-o"></i></div>
						<div class="count">{{ totals.area_m2.approved.toLocaleString() }} m²</div>
						<h3>Aprobado(s)</h3>
						<p>El total de lotes es {{ totals.lots.approved.toLocaleString() }}.</p>
					</div>
				</div>
				
				<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="tile-stats">
						<div class="icon"><i class="fa fa-retweet"></i></div>
						<div class="count">{{ totals.area_m2.novelty.toLocaleString() }} m²</div>
						<h3>Con Observacion(es)</h3>
						<p>El total de lotes es {{ totals.lots.novelty.toLocaleString() }}.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		
		<div class="col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">		
					<div class="x_panel">
						<div class="x_content">
							<div class="row">

								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="demo-container" >
										<div id="chart_plot_02" class="demo-placeholder" style="margin: 5px 10px 10px 0;width:100%"></div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">				
					<div class="x_panel">
						<div class="x_content">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div id="sparkline22" class="demo-placeholder" width="100%" style="margin: 5px 10px 10px 0;width:100%"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_content">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-6">
									<div id="canvas-holder">
										<canvas id="chart-area-lots" style="height: 430px;margin: 5px 10px 10px 0;width:100%"></canvas>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<div id="canvas-holder">
										<canvas id="chart-area-area_m2" style="height: 430px;margin: 5px 10px 10px 0;width:100%"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">		
					<div class="x_panel">
						<div class="x_title">
							<h3>Consola general <small>Vista Rapida</small></h3>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="list-inline-sonar">
										<div class="fa-hover " v-for="(a,record_i) in datas.schedule">
											<template v-if="a.in_novelty == 1">
												<a title="Pdte: Con observaciones." class="pull-left border-aero profile_thumb" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a" @click="generalSelected = a">
													<div class="sonar-wrapper"><div class="sonar-emitter purple"><div class="sonar-wave"></div></div></div>
												</a>
											</template>
											<template v-else-if="a.is_executed === 0 && a.is_approved == 0">
												<a title="Programado: En espera de ejecucion." class="pull-left border-aero profile_thumb" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a" @click="generalSelected = a">
													<div class="sonar-wrapper"><div class="sonar-emitter red"><div class="sonar-wave"></div></div></div>
												</a>
											</template>
											<template v-else-if="a.is_executed === 1 && a.is_approved == 0">
												<a title="Ejecutado: En espera de aprobación." class="pull-left border-aero profile_thumb" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a" @click="generalSelected = a">
													<div class="sonar-wrapper"><div class="sonar-emitter orange"><div class="sonar-wave"></div></div></div>
												</a>
											</template>
											<template v-else-if="a.is_executed === 1 && a.is_approved == 1">
												<a title="Aprobado" class="pull-left border-aero profile_thumb" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a" @click="generalSelected = a">
													<div class="sonar-wrapper"><div class="sonar-emitter green"><div class="sonar-wave"></div></div></div>
												</a>
											</template>
											<template v-else>
												<a title="No programado para este periodo." class="pull-left border-aero profile_thumb" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a" @click="generalSelected = a">
													<div class="sonar-wrapper"><div class="sonar-emitter"><div class="sonar-wave"></div></div></div>
												</a>
											</template>
										</div>
								   </div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
			</div>
		</div>
		
		
		<div class="col-md-3 col-sm-4 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<div class="row">
						
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div>
								<div class="x_title">
									<h2>Lotes</h2>
									<div class="clearfix"></div>
								</div>
								<ul class="list-unstyled top_profiles scroll-view" style="overflow: auto;height: 620px !important;">
									<li class="media event" v-for="(a,record_i) in datas.lots" >
										<a class="pull-left border-aero profile_thumb" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a" @click="generalSelected = a">
											<template v-if="a.in_novelty == 1">
												<i class="fa fa-info aero"></i>
											</template>
											<template v-else-if="a.is_executed == 0 && a.is_approved == 0 && a.in_novelty == 0">
												<i class="fa fa-calendar aero"></i>
											</template>
											<template v-else-if="a.is_executed == 1 && a.is_approved == 0 && a.in_novelty == 0">
												<i class="fa fa-thumbs-up aero"></i>
											</template>
											<template v-else-if="a.is_executed == 1 && a.is_approved == 1 && a.in_novelty == 0">
												<i class="fa fa-check aero"></i>
											</template>
											<template v-else>
												<i class="fa fa-question aero"></i>
											</template>
										</a>
										<div class="media-body">
											<a class="title" href="#" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">
												{{ a.lot.microroute_name }}
											</a>
											<p>
												<strong>{{ a.lot.area_m2.toLocaleString() }} m² </strong>
												 -  
												<template> {{ a.date_executed_schedule }}</template>
												<template v-if="a.date_executed_schedule_end !== undefined && a.date_executed_schedule_end !== null && a.date_executed_schedule_end !== a.date_executed_schedule">/{{ a.date_executed_schedule_end }}</template>
											</p>
											
											<!-- // 
											<p> 
												<small>F. Creacion {{ a.created }}</small> 
											</p>
											-->
										</div>
									</li>
								
								
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-md-3">
					<div class="x_panel">
						<div class="x_title">
							<h3>En progreso <small></small></h3>
							<div class="clearfix"></div>
						</div>
						<div class="x_content" style="max-height: calc(50vh);overflow: auto;">
							<article class="media event" v-for="(a,record_i) in datas.schedule" v-if="a.is_executed == 0 && a.is_approved == 0 && a.in_novelty == 0">
								<a class="pull-left date" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">
									<p class="month">{{ monthText[new Date(a.date_executed_schedule.split('-')[1]).getMonth()] }}</p>
									<p class="day">{{ a.date_executed_schedule.split('-')[2] }}</p>
								</a>
								<div class="media-body">
									<a class="title" href="#" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">
									{{ a.lot.microroute_name }}
									</a>
									<p>{{ a.lot.area_m2.toLocaleString() }} m²</p>
									<p>{{ a.group.name }}</p>
								</div>
							</article>
						</div>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="x_panel">
						<div class="x_title">
							<h3>Ejecutado(s) <small></small></h3>
							<div class="clearfix"></div>
						</div>
						<div class="x_content" style="max-height: calc(50vh);overflow: auto;">
							<article class="media event" v-for="(a,record_i) in datas.schedule" v-if="a.is_executed == 1 && a.is_approved == 0 && a.in_novelty == 0">
								<a class="pull-left date" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">
									<p class="month">{{ monthText[new Date(a.date_executed_schedule.split('-')[1]).getMonth()] }}</p>
									<p class="day">{{ a.date_executed_schedule.split('-')[2] }}</p>
								</a>
								<div class="media-body">
									<a class="title" href="#" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">
									{{ a.lot.microroute_name }}
									</a>
									<p>{{ a.lot.area_m2.toLocaleString() }} m²</p>
									<p>{{ a.group.name }}</p>
								</div>
							</article>
						</div>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="x_panel">
						<div class="x_title">
							<h3>Aprobado(s) <small></small></h3>
							<div class="clearfix"></div>
						</div>
						<div class="x_content" style="max-height: calc(50vh);overflow: auto;">
							<article class="media event" v-for="(a,record_i) in datas.schedule" v-if="a.is_executed == 1 && a.is_approved == 1 && a.in_novelty == 0">
								<a class="pull-left date" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">
									<p class="month">{{ monthText[new Date(a.date_executed_schedule.split('-')[1]).getMonth()] }}</p>
									<p class="day">{{ a.date_executed_schedule.split('-')[2] }}</p>
								</a>
								<div class="media-body">
									<a class="title" href="#" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">
									{{ a.lot.microroute_name }}
									</a>
									<p>{{ a.lot.area_m2.toLocaleString() }} m²</p>
									<p>{{ a.group.name }}</p>
								</div>
							</article>
						</div>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="x_panel">
						<div class="x_title">
							<h3>Con Observacion(es) <small></small></h3>
							<div class="clearfix"></div>
						</div>
						<div class="x_content" style="max-height: calc(50vh);overflow: auto;">
							<article class="media event" v-for="(a,record_i) in datas.schedule" v-if="a.is_executed == 1 && a.in_novelty == 1">
								<a class="pull-left date" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">
									<p class="month">{{ monthText[new Date(a.date_executed_schedule.split('-')[1]).getMonth()] }}</p>
									<p class="day">{{ a.date_executed_schedule.split('-')[2] }}</p>
								</a>
								<div class="media-body">
									<a class="title" href="#" data-toggle="modal" data-target=".bs-info-general-modal-lg" @click="generalSelected = a">
									{{ a.lot.microroute_name }}
									</a>
									<p>{{ a.lot.area_m2.toLocaleString() }} m²</p>
									<p>{{ a.group.name }}</p>
								</div>
							</article>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="clearfix"></div>
		
		
		<!-- modals -->
		<div class="modal fade bs-info-general-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel"> {{ periodName }} {{ filter.year }} | Informe general de progreso | {{ generalSelected.lot.microroute_name }} - Lote: {{ $root.zfill(generalSelected.lot.id_ref, 4) }}</h4>
					</div>
					<div class="modal-body">
						<h4></h4>
						<div class="clearfix"></div>
						<!-- // 
						<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
						<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
						-->
						<div class="row">
							<br>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<ul class="stats-overview">
									<li>
										<span class="name"> Fecha de Creación </span>
										<span class="value text-success"> {{ generalSelected.created }} </span>
									</li>
									<li>
										<span class="name"> Creado Por:  </span>
										<span class="value text-success"> {{ generalSelected.created_by.username }} </span>
									</li>
									<li>
										<span class="name"> Cuadrilla </span>
										<span class="value text-success">
											{{ generalSelected.group.name }}
										</span>
									</li>
								</ul>
								
								<ul class="stats-overview">
									<li>
										<span class="name"> Fecha de Programacion </span>
										<span class="value text-success">
											<template v-if="generalSelected.date_executed_schedule !== null">{{ generalSelected.date_executed_schedule }}</template>
											<template v-else> - </template>
										</span>
									</li>
									<li class="hidden-phone">
										<span class="name"> Fecha de Ejecución </span>
										<span class="value text-success">
											<template v-if="generalSelected.date_executed !== null">{{ generalSelected.date_executed }}</template>
											<template v-else> - </template>
										</span>
									</li>
									<li>
										<span class="name"> Fecha de Aprobación </span>
										<span class="value text-success">
											<template v-if="generalSelected.date_approved !== null">{{ generalSelected.date_approved }}</template>
											<template v-else> - </template>
										</span>
									</li>
								</ul>
								<div class="clearfix"></div>
								
								<div class="row">
									<div class="col-xs-6">
										<h3>ANTES</h3>
										<div id="main_area">
											<div class="row">
												<div class="col-sm-12" id="slider-thumbs">
													<template v-if="generalSelected.emvarias_reports_photographic.length > 0">
														<ul class="hide-bullets">
															<li class="col-sm-2" v-for="(photographic, photographic_i) in generalSelected.emvarias_reports_photographic" v-if="photographic.type == 'A' && photographic.status == 1">
																<a data-toggle="modal" data-target=".bs-view-photo-modal-lg" @click="fileSelected = photographic" class="thumbnail" style="height: 26px !important;" id="'carousel-selector-' + photographic_i"><img :src="photographic.file_path_short" /></a>
															</li>
														</ul>
													</template>
													<template v-else>
														<p>Aun no tenemos registro fotografico, intenta más tarde.</p>
													</template>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="col-xs-6">
										<h3>DESPUES</h3>
										<div id="main_area">
											<div class="row">
												<div class="col-sm-12" id="slider-thumbs">
													<template v-if="generalSelected.emvarias_reports_photographic.length > 0">
														<ul class="hide-bullets">
															<li class="col-sm-2" v-for="(photographic, photographic_i) in generalSelected.emvarias_reports_photographic" v-if="photographic.type == 'D' && photographic.status == 1">
																<a data-toggle="modal" data-target=".bs-view-photo-modal-lg" @click="fileSelected = photographic" class="thumbnail" style="height: 26px !important;" id="'carousel-selector-' + photographic_i"><img :src="photographic.file_path_short" /></a>
															</li>
														</ul>
													</template>
													<template v-else>
														<p>Aun no tenemos registro fotografico, intenta más tarde.</p>
													</template>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<h4>Observacion(es)</h4>								
										<div class="modal-body" style="overflow: auto;zoom: 0.8;"> <!-- max-height: 430px; -->
											<template v-if="generalSelected.emvarias_schedule_execution_novelties.length > 0">
												<ul class="messages">
													<li v-for="(comment, comment_i) in generalSelected.emvarias_schedule_execution_novelties">
														<div class="message_date">
															<h3 class="date text-info">{{ comment.created.split('-')[2].split(' ')[0] }}</h3>
															<p class="month">{{ monthText[new Date(comment.created).getMonth()] }}</p>
														</div>
														<div class="message_wrapper">
															<h4 class="heading">@{{ comment.created_by.username }} - {{ comment.created_by.names }} {{ comment.created_by.surname }}</h4>
															<blockquote class="message">
																{{ comment.comment }}
															</blockquote>
															<br />
															<p class="url">
																<span class="fs1 text-info" aria-hidden="true" data-icon="camera-retro">
																	<template v-if="comment.status == 0">
																		<a href="#"><i class="fa fa-exchange"></i> Pdte por gestionar </a>
																	</template>
																	<template v-else-if="comment.status == 1">
																		<a href="#"><i class="fa fa-exchange"></i> Solucionado </a>
																	</template>
																</span>
															</p>
														</div>
													</li>
												</ul>
											</template>
											<template v-else>
												<p>No hay observacion(es) </p>
											</template>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-4 col-sm-4 col-xs-12">
								<section class="panel">
									<div class="x_title">
										<h2 class="" title="Microruta"><i class="fa fa-location-arrow"></i> {{ generalSelected.lot.microroute_name }}</h2>
										<div class="clearfix"></div>
									</div>
									<div class="panel-body">
										<!-- // <h3 class="green"><i class="fa fa-bus"></i> {{ generalSelected.name }}</h3> -->
										<p>Fecha de Programacion</p>
										<h3 class="aero"><i class="fa fa-calendar"></i> <template > {{ generalSelected.date_executed_schedule }}</template></h3>
										
										<p>Fecha de Ejecución</p>
										<h3 class="green">
											<i class="fa fa-thumbs-up"></i> 
											<template v-if="generalSelected.date_executed !== null">
												{{ generalSelected.date_executed }}
											</template>
											<template v-else>
												...
											</template>
										</h3>
						
										<br />
										<div class="project_detail">
											<p class="title">Lote Ref: </p><p> {{ generalSelected.lot.id_ref }}</p>
											<p class="title">Direccion(es)</p><p>{{ generalSelected.lot.address_text }}</p>
											
											<p class="title">Observacion(es)</p><p>{{ generalSelected.lot.obs }}</p>
											<p class="title">Descripcion del Lote</p><p>{{ generalSelected.lot.description }}</p>
											<p class="title">Área</p><p>{{ $root.formatMoney(generalSelected.lot.area_m2, 2, ',', '.') }} m²</p>
											<template >
												<p class="title">Agendado por </p>
												<p>{{ generalSelected.created_by.username }}</p>
											</template>
										</div>
										<br />
										<div class="text-center mtop20">
											<button type="button" class="btn btn-app pull-left" v-if="generalSelected.is_executed === 0">
												<i class="fa fa-calendar"></i> En progreso..
											</button>
											<button type="button" class="btn btn-app pull-left" v-else-if="generalSelected.is_executed === 1">
												<i class="fa fa-thumbs-up"></i> Ejecutado
											</button>
											
											<button type="button" class="btn btn-app pull-left" v-if="generalSelected.is_executed === 1 && generalSelected.is_approved === 1">
												<i class="fa fa-check-square-o"></i> Aprobado
											</button>
											
											<button type="button" class="btn btn-app pull-left" v-if="generalSelected.in_novelty == 1">
												<i class="fa fa-times"></i> Con observacion(es)
											</button>
										</div>
									</div>
								</section>
							</div>
							
						</div>
					</div>
					<div class="modal-footer">
						<button @click="scheduleChangeToExecuted" type="button" class="btn btn-app pull-left hide" v-if="generalSelected.isSchedule === true && generalSelected.isExecuted === false && generalSelected.isApproved === false">
							<i class="fa fa-thumbs-up"></i> Pasar a "Ejecutado"
						</button>
						<button @click="scheduleChangeToNotExecuted" type="button" class="btn btn-app pull-left hide" v-if="generalSelected.isSchedule === true && generalSelected.isExecuted === true && generalSelected.isApproved === false">
							<i class="fa fa-calendar"></i> Pasar a "En Progreso..."
						</button>
						<button @click="scheduleChangeToApproved" type="button" class="btn btn-app pull-left hide" v-if="generalSelected.isSchedule === true && generalSelected.isExecuted === true && generalSelected.isApproved === false">
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
						<h4 class="modal-title" id="myModalLabel"> {{ periodName }} {{ filter.year }} | Informe general de progreso | {{ generalSelected.lot.microroute_name }} - Lote: {{ $root.zfill(generalSelected.lot.id_ref, 4) }}</h4>
					</div>
					<div class="modal-body row" v-if="fileSelected.id > 0">
						<div class="col-md-7 col-sm-7 col-xs-12">
							<div class="product-image">
								<img :src="fileSelected.file_path_short" alt="..." />
							</div>
						</div>
						<div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
							<h3 class="prod_title">{{ generalSelected.lot.microroute_name }} - {{ ((fileSelected.type == 'D')?'DESPUES':(fileSelected.type == 'A') ? 'ANTES':'OTRO') }}</h3>
							<p>
								<b>ID del archivo: </b>
								<br>
								RF{{ $root.zfill(fileSelected.id, 8) }}
								<br>
								<b>Nombre del archivo: </b>
								<br>
								{{ fileSelected.file_name }}
							</p>
							<br />
							
							<div class="">
								<div class="product_price">
									<h1 class="price">{{ fileSelected.created }}</h1>
									<span class="price-tax">{{ generalSelected.group.name }}</span>
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
						<!-- // 
						<button @click="scheduleApprovedToFile" type="button" class="btn btn-app pull-left" data-dismiss="modal" v-if="fileSelected.status == 0 || fileSelected.status == 2">
							<i class="fa fa-thumbs-up"></i> Aprobar Fotografía
						</button>
						<button @click="scheduleDeclineToFile" type="button" class="btn btn-app pull-left" data-dismiss="modal" v-if="fileSelected.status == 1 || fileSelected.status == 0">
							<i class="fa fa-thumbs-up"></i> Rechazar Fotografía
						</button>
						-->
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
			filter: {
				date: null,
				period: null,
				year: null,
			},
			charts: {
				plot01: [],
				plot02: [],
				plot03: [],
				plot04: [],
				plot05: [],
				plot06: [],
			},
			totals: {
				lots: {
					schedule: 0,
					executed: 0,
					approved: 0,
					novelty: 0,
				},
				area_m2: {
					schedule: 0,
					executed: 0,
					approved: 0,
					novelty: 0,
				}
			},
			datas: {
				schedule: [],
				lots: [],
				files: [],
			},
			
			
			
			records: [],
			current: {
				dateISO: {
					year: moment().format('Y'),
					month: moment().format('M'),
					day: moment().format('D'),
				}
			},
			options: {
				emvarias_contracts: [],
				emvarias_periods: [],
				emvarias_groups: [],
			},
			geo: {
				active: false,
				msg: '',
				urlMap: '/index.php?controller=sw&action=staticmap&maptype=wikimedia&zoom=16&center=6.2386064999999995,-75.58853739999999&size=450x450',
				lat: 0,
				lng: 0,
				options: {
					// enableHighAccuracy = should the device take extra time or power to return a really accurate result, or should it give you the quick (but less accurate) answer?
					enableHighAccuracy: false,
					// timeout = how long does the device have, in milliseconds to return a result?
					timeout: 5000,
					// maximumAge = maximum age for a possible previously-cached position. 0 = must return the current position, not a prior cached position
					maximumAge: 0
				},
			},
			
			
			singleAgend: false,
			monthText: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			total_m2: 0,
			total_m2_schedule: 0,
			total_m2_executed: 0,
			total_m2_approved: 0,
			total: 0,
			total_schedule: 0,
			total_executed: 0,
			total_approved: 0,
			period: 0,
			year: moment().format('Y'),
			dataTable: null,
			generalSelected: {
				"id": 0,
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
				"isSchedule": false,
				"schedule": {
					"id": 0,
					"microroute": 0,
				},
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
				"in_novelty": 0,
				"created": "",
				"updated": "",
				"updated_by": null,
				"created_by": {
					id: 0,
					username: '',
				},
				"emvarias_reports_photographic": [],
				"emvarias_schedule_execution_novelties": []
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
		periodName(){
			var self = this;
			try{
				return self.options.emvarias_periods.find(x => x.id == self.filter.period).name;
			} catch(e){
				return "";
			}
		},
		groupName(){
			var self = this;
			try{
				return self.options.emvarias_groups.find(x => x.id == self.generalSelected).name;
			} catch(e){
				return "";
			}
		},
		periodDateStart(){
			var self = this;
			try{
				period = self.options.emvarias_periods.find(x => x.id == self.filter.period);
				if(period.start_month == null || period.start_day == null){ throw new FormException('noDates', 'No hay fechas establecidas en la tabla de periodos'); }
				return (moment().format('Y') + '-' + ((String(period.start_month).length > 1) ? period.start_month : '0' + period.start_month) + '-' + ((String((period.start_day)).length > 1) ? period.start_day : '0' + (period.start_day)));
			} catch(e){
				return "";
			}
		},
		periodDateEnd(){
			var self = this;
			try{
				period = self.options.emvarias_periods.find(x => x.id == self.period);
				if(period.end_month === null || period.end_day === null){ throw new FormException('noDates', 'No hay fechas establecidas en la tabla de periodos'); }
				return (moment().format('Y') + '-' + ((String((period.end_month)).length > 1) ? period.end_month : '0' + (period.end_month)) + '-' + ((String((period.end_day)).length > 1) ? period.end_day : '0' + (period.end_day)));
			} catch(e){
				return "";
			}
		},
	},
	mounted: function () {
		var self = this;
		$('#date-filter').daterangepicker({
		  singleDatePicker: true,
		  singleClasses: "picker_2"
		}, function(start, end, label) {
			// console.log(start.toISOString(), end.toISOString(), label);
			
			self.filter.date = start.format('Y-MM-DD');
			self.filter.year = start.format('Y');
			self.loadDay();
		});
		self.listOptions();
	},
	methods: {
		resetAll(){
			var self = this;
			self.resetCharts();
			self.resetCounters();
			self.resetData();
		},
		resetData(){
			var self = this;
			self.datas.schedule = [];
			self.datas.lots = [];
			self.datas.files = [];
		},
		resetCharts(){
			var self = this;
			self.charts = {
				plot01: [],
				plot02: [],
				plot03: [],
				plot04: [],
				plot05: [],
				plot06: [],
			};
			try {
			} catch(e){}
		},
		resetCounters(){
			var self = this;
			self.totals.lots.schedule = 0;
			self.totals.lots.executed = 0;
			self.totals.lots.approved = 0;
			self.totals.lots.novelty = 0;
			self.totals.area_m2.schedule = 0;
			self.totals.area_m2.executed = 0;
			self.totals.area_m2.approved = 0;
			self.totals.area_m2.novelty = 0;
		},
		loadDay(){
			var self = this;
			var dialog = bootbox.dialog({
				message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
				closeButton: false
			});
			
			try {
				self.resetAll();
				var Dt = moment(self.filter.date);				
				resultPeriod = self.options.emvarias_periods.filter(function(a){
					if(a.start_month == Dt.format('M')){						
						if(a.start_day <= Dt.format('D') && Dt.format('D') <= a.end_day){
							console.log('Periodo AutoSelect: ', a.name);
							self.filter.period = a.id;
						}
					}
				});
				
				MV.api.readList('/emvarias_schedule', {
					filter1: [
						'date_executed_schedule,le,' + self.filter.date,
						'date_executed_schedule_end,ge,' + self.filter.date
					],
					filter2: [
						'period,eq,' + self.filter.period
					],
					join: [
						'emvarias_lots',
						'emvarias_periods',
						'emvarias_groups',
						'emvarias_reports_photographic',
						'users',
						'emvarias_schedule_comments,users',
						'emvarias_schedule_execution_novelties,emvarias_groups',
						'emvarias_schedule_execution_novelties,emvarias_periods',
						'emvarias_schedule_execution_novelties,users',
					],
				}, 
				function(a){
					console.log('schedule records: ', a);
					indexPeriod = self.options.emvarias_periods.findIndex(x => x.id == self.filter.period);
					
					if(indexPeriod >= 0){						
						startDate = new Date(self.filter.year, Number(self.options.emvarias_periods[indexPeriod].start_month)-1, self.options.emvarias_periods[indexPeriod].start_day);
						endDate = new Date(self.filter.year, Number(self.options.emvarias_periods[indexPeriod].end_month)-1, self.options.emvarias_periods[indexPeriod].end_day);
						
						for (var i = -1; i < ((((((endDate-startDate)/1000)/60)/60)/24)+2); i++) {
							var dat = new Date(startDate).add(i).days();
							self.charts.plot01.push([dat.getTime(), 0]);
							self.charts.plot02.push([dat.getTime(), 0]);
							self.charts.plot03.push([dat.getTime(), 0]);
							self.charts.plot04.push([dat.getTime(), 0]);
						}
					
						self.options.emvarias_groups.forEach(function(g){
							self.charts.plot05.push({
								id: g.id,
								label: g.name,
								data: 0,
							});
							self.charts.plot06.push({
								id: g.id,
								label: g.name,
								data: [0,0],
							});
						});
						
						chart3_label = [];
						chart3_data = [];
						self.charts.plot05.forEach(function(x){ if(x.id > 0){ 
							chart3_label.push(x.label);
							chart3_data.push(x.data);
						} });
						
						a.forEach((b) => {
							// console.log('schedule item: ', b);
							self.totals.area_m2.schedule = parseFloat(self.totals.area_m2.schedule) + parseFloat(b.lot.area_m2);
							self.totals.area_m2.executed = (b.is_executed == 1) ? parseFloat(self.totals.area_m2.executed) + parseFloat(b.lot.area_m2) : self.totals.area_m2.executed;
							self.totals.area_m2.approved = (b.is_approved == 1) ? parseFloat(self.totals.area_m2.approved) + parseFloat(b.lot.area_m2) : self.totals.area_m2.approved;
							self.totals.area_m2.novelty = (b.in_novelty == 1) ? parseFloat(self.totals.area_m2.novelty) + parseFloat(b.lot.area_m2) : self.totals.area_m2.novelty;
							self.datas.schedule.push(b);
							
							
							if(self.datas.lots.findIndex((c) => c === b.lot) < 0){
								self.datas.lots.push(b);
								self.totals.lots.schedule++;
								self.totals.lots.executed = (b.is_executed == 1) ? parseFloat(self.totals.lots.executed) + 1 : self.totals.lots.executed;
								self.totals.lots.approved = (b.is_approved == 1) ? parseFloat(self.totals.lots.approved) + 1 : self.totals.lots.approved;
								self.totals.lots.novelty = (b.in_novelty == 1) ? parseFloat(self.totals.lots.novelty) + 1 : self.totals.lots.novelty;
							}
							indexGroupChart06 = self.charts.plot06.findIndex(x => (x.id == b.group.id));
							
							
							base = moment(b.date_executed_schedule);
							indexSheduled = self.charts.plot01.findIndex(x => (x[0] == new Date(base.format('Y'), (base.format('M')-1), base.format('D')).getTime()));
							console.log('indexSheduled', indexSheduled);
							if(indexSheduled > -1){
								self.charts.plot01[indexSheduled][1] += (b.lot.area_m2);
								// indexGroupChart06
							}
							
							if(b.is_executed == 1){
								base = moment(b.date_executed);
								indexExecuted = self.charts.plot02.findIndex(x => (x[0] == new Date(base.format('Y'), (base.format('M')-1), base.format('D')).getTime()));
								console.log('indexExecuted', indexExecuted);
								
								if(indexExecuted > -1){
									self.charts.plot02[indexExecuted][1] += parseFloat(b.lot.area_m2);
									self.charts.plot04[indexExecuted][1] += (parseFloat(b.lot.area_m2) + ((self.lastDayExecuted > -1) ? self.charts.plot04[self.lastDayExecuted][1] : 0));
								}
								
								indexGroupChart = self.charts.plot05.findIndex(x => (x.id == b.group.id));
								if(indexGroupChart > -1){
									self.charts.plot05[indexGroupChart].data += parseFloat(b.lot.area_m2);
								}
								self.lastDayExecuted = indexExecuted;
								
							}
							
							if(b.is_approved == 1){
								base = moment(b.date_approved);
								indexApproved = self.charts.plot03.findIndex(x => (x[0] == new Date(base.format('Y'), (base.format('M')-1), base.format('D')).getTime()));
								console.log('indexApproved', indexApproved);
								
								if(indexApproved > -1){
									self.charts.plot03[indexApproved][1] += parseFloat(b.lot.area_m2);
								}
							}
						});
					
						finalChart01 = [];
						finalChart02 = [];
						finalChart03 = [];
						finalChart04 = [];
						self.charts.plot01.forEach(function(x){ if(x[1] >= 0){ finalChart01.push(x); } });
						self.charts.plot02.forEach(function(x){ if(x[1] >= 0){ finalChart02.push(x); } });
						self.charts.plot03.forEach(function(x){ if(x[1] >= 0){ finalChart03.push(x); } });
					
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
									steps: true
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
						
						
						var chart_pie = [];
						self.charts.plot05.forEach(function(hx){
							chart_pie.push({
								id: hx.id,
								name: hx.label,
								value: hx.data
							});
						});
						console.log('chart_pie', chart_pie);
						
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

						
						ot = 0;
						chart1 = [];
						self.charts.plot01.forEach(function(x){ if(x[1] >= 0){ ot += x[1]; x[1] = ot; chart1.push(x); } });
						
						ot = 0;
						chart2 = [];
						self.charts.plot02.forEach(function(x){ if(x[1] >= 0){ ot += x[1]; x[1] = ot; chart2.push(x); } });
						
						$.plot( $("#sparkline22"), [
							{ label: "Programado", data: chart1, lines: { fillColor: "rgba(150, 100, 89, 0.12)" }, points: { fillColor: "#fff" } },
							{ label: "Ejecutado", data: chart2, lines: { fillColor: "rgba(63, 151, 235, 0.12)" }, points: { fillColor: "#fff" } }
						], chart_plot_02_settings);
						
						
						dataDemo = {
							datasets: [{
								barPercentage: 0.5,
								barThickness: 6,
								maxBarThickness: 8,
								minBarLength: 2,
								data: [10, 20, 30, 40, 50, 60, 70]
							}]
						};
						
						optionsDemo = {
							scales: {
								xAxes: [{
									gridLines: {
										offsetGridLines: true
									}
								}]
							}
						};
						
						new Chart(document.getElementById("chart-area-lots"), {
							type: 'bar',
							data: {
							  // labels: ["Ejecutado", "1950", "1999", "2050"],
							  labels: ["Lotes"],
							  //labels: chart3_label,
							  datasets: [
								  {
									  label: "Programado",
									  backgroundColor: "red",
									  data: [self.totals.lots.schedule]
								  },
								  {
									  label: "Ejecutado",
									  backgroundColor: "orange",
									  data: [self.totals.lots.executed]
								  },
								  {
									  label: "Aprobado",
									  backgroundColor: "green",
									  data: [self.totals.lots.approved]
								  },
								  {
									  label: "Con Observacion",
									  backgroundColor: "#8e5ea2",
									  data: [self.totals.lots.novelty]
								  }
							  ]
							},
							options: {
							  title: {
								display: true,
								text: 'Vista rapida (Lotes)'
							  }
							}
						});
						
						new Chart(document.getElementById("chart-area-area_m2"), {
							type: 'bar',
							data: {
							  // labels: ["Ejecutado", "1950", "1999", "2050"],
							  labels: ["Área m2"],
							  //labels: chart3_label,
							  datasets: [
								  {
									  label: "Programado",
									  backgroundColor: "red",
									  data: [self.totals.area_m2.schedule]
								  },
								  {
									  label: "Ejecutado",
									  backgroundColor: "orange",
									  data: [self.totals.area_m2.executed]
								  },
								  {
									  label: "Aprobado",
									  backgroundColor: "green",
									  data: [self.totals.area_m2.approved]
								  },
								  {
									  label: "Con Observacion",
									  backgroundColor: "#8e5ea2",
									  data: [self.totals.area_m2.novelty]
								  }
							  ]
							},
							options: {
							  title: {
								display: true,
								text: 'Vista rapida (Área m2)'
							  }
							}
						});
						
						/*
						$.plot( $("#sparkline22"), [
							{ label: "Programado", data: chart1, lines: { fillColor: "rgba(150, 100, 89, 0.12)" }, points: { fillColor: "#fff" } },
							{ label: "Ejecutado", data: chart2, lines: { fillColor: "rgba(63, 151, 235, 0.12)" }, points: { fillColor: "#fff" } }
						], {
							type: 'bar',
							data: {
								datasets: [{
									barPercentage: 0.5,
									barThickness: 6,
									maxBarThickness: 8,
									minBarLength: 2,
									data: [10, 20, 30, 40, 50, 60, 70]
								}]
							},
							options: {
								scales: {
									xAxes: [{
										gridLines: {
											offsetGridLines: true
										}
									}]
								}
							}
						});
						
						
						var randomScalingFactor = function() {
							return Math.round(Math.random() * 100);
						};
						
						var config = {
							type: 'pie',
							data: {
								datasets: [{
									data: [
										randomScalingFactor(),
										randomScalingFactor(),
										randomScalingFactor(),
										randomScalingFactor(),
										randomScalingFactor(),
									],
									backgroundColor: [
										'red',
										'orange',
										'yellow',
										'green',
										'blue',
									],
									label: 'Dataset 1'
								}],
								labels: [
									'Red',
									'Orange',
									'Yellow',
									'Green',
									'Blue'
								]
							},
							options: {
								responsive: true
							}
						};
						
						var ctx = document.getElementById('chart-area').getContext('2d');
						window.myPie = new Chart(ctx, config);
						*/
						
						/*
						var echartPieCollapse = echarts.init(document.getElementById('chart-area'));
						echartPieCollapse.setOption({
							responsive: true,
							// maintainAspectRatio: true,
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
							  center: ['50%', '50%'],
							  roseType: 'area',
							  x: '50%',
							  // max: self.total_m2_schedule,
							  sort: 'ascending',
							  data: chart_pie
							}]
						  });
						*/
					}
					dialog.modal('hide');
				});
			} catch(e){
				console.error(e);
				dialog.modal('hide');
			}
		},
		
		listOptions(){
			var self = this;
			MV.api.readList('emvarias_periods', {}, function(e){
				self.options.emvarias_periods = e;
				e.forEach(function(b){ if((self.current.dateISO.day >= b.start_day && self.current.dateISO.day <= b.end_day) == true && b.start_month == self.current.dateISO.month){ self.period = b.id; } });					
			});
			MV.api.readList('emvarias_groups', {}, function(e){
				self.options.emvarias_groups = e;
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