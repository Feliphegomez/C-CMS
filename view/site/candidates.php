<style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
.circle-color {
	position: relative;
	margin: 0 auto;
	width: 25px;
	height: 25px;
	border-radius: 9999px;
	background-color: HSL(45,100%,50%);
}

.jumbotron {
    /* background-image: url('https://2.bp.blogspot.com/-nJ12IC51iYA/Wm-DNYNd0mI/AAAAAAAA2xs/OXbDcqJk6EYXm6YTWi3t_g0j6FHUZNPfwCLcBGAs/s640/C%25C3%25B3mo%2Barmamos%2Bel%2Bfondo%2Bbibliogr%25C3%25A1fico%2Bde%2Buna%2Bbiblioteca.jpg'); */
	/* background-image: url('/public/assets/images/gettoknownativeplants.jpg'); */
	background-image: url('/public/assets/images/CV-background-checking.jpg');
    background-size: 100% auto;
    background-position: center;
    background-repeat: no-repeat;
    height: 90px;
}

.post {
    background-color: #FFF;
    overflow: hidden;
    box-shadow: 0 0 1px #CCC;
}

.post img {
	/*
    filter: blur(2px);
    -webkit-filter: blur(2px);
    -moz-filter: blur(2px);
    -o-filter: blur(2px);
    -ms-filter: blur(2px);
	*/
	max-height: 150px;
}

.post .content {
    padding: 15px;
}

.post .author {
    font-size: 11px;
    color: #737373;
    padding: 25px 30px 20px;
}

.post .post-img-content {
    height: 124px;
    position: relative;
}

.post .post-img-content img {
    position: absolute;
}

.post .post-title {
    display: table-cell;
    vertical-align: bottom;
    z-index: 2;
    position: relative;
}

.post .post-title b {
    background-color: rgba(51, 51, 51, 0.58);
    display: inline-block;
    margin-bottom: 5px;
    color: #FFF;
    padding: 10px 15px;
    margin-top: 5px;
}

.garden-card {
	max-height: 300px;
	overflow: overlay;
	height: 300px;
	box-shadow: 0px 0px 1px #666;
	margin-bottom: 10px;
}

.garden-card .post-img-content img {
	/* height: 196px; */
    height: auto;
    width: 100%;
    max-height: 150px;
}

.stepContainer {
	position: relative;
	height: auto;
	min-height: 420px;
	height: auto !important;
}

#pic{
	display: none;
}
.newbtn{
	cursor: pointer;
}
#blah{
	max-width:100px;
	height:100px;
	margin-top:20px;
}
.carousel-inner {
    min-height: calc(25vh);
    height: 100%;
}
.carousel-inner img {
  height: auto;
  width: 100%;
}
</style>

<div id="garden-app">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="page-title">
			<div class="title_left">
				<h3><?= isset($title) ? $title : ""; ?> <small> <?= isset($subtitle) ? $subtitle : ""; ?></small></h3>
			</div>
		</div>
		<div class="container">
			<router-view :key="$route.fullPath" ></router-view>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<template id="home">
	<div>
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<form action="javascript: false;" method="GET" v-on:submit="searchText">
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<div class="input-group">
								<input v-model="search.text" type="text" class="form-control" placeholder="¿Que estas buscando?" id="txtSearch"/>
								<div class="input-group-btn">
									<button class="btn btn-primary" type="submit">
									<span class="glyphicon glyphicon-search"></span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
			
			<div class="col-xs-12 col-sm-12">
				<div class="x_panel">
					<div class="x_title">
						Página: {{ page }}
						<ul class="nav navbar-right panel_toolbox">
							<?= 
								(($this->checkPermission('candidates:admin') == true)) ? 
									"<li><router-link :to=\"{ name: 'Create' }\"><i class=\"fa fa-plus\"></i></router-link></li>"
								: "";
							?>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<template v-if="records.length > 0">
								<div v-for="(candidate, index) in records" class="col-xs-6 col-sm-4 col-md-3 col-lg-3 garden-card">
									<div class="post">
										<div class="post-img-content">
											<img :src="'data:image/png;base64, ' + candidate.avatar.data" class="img-responsive" />														
												<span class="post-title"> <b> <i class="fa fa-phone"></i> {{ candidate.phone }}</b><br />
												<b> <i class="fa fa-mobile"></i> {{ candidate.mobile }}</b>
											</span>
										</div>
										
										<div class="content">
											<div class="author">
												<b>{{ candidate.names }} {{ candidate.surname }} </b>
												<time :datetime="candidate.birthday">{{ candidate.birthday }}</time>
											</div>
											<div>
												<!-- // <br /><i class="fa fa-at"></i> {{ candidate.email }} -->
											</div>
											<div>
												<router-link class="btn btn-info btn-sm pull-right" :to="{ name: 'Single-Details', params: { candidate_id: candidate.id }}">
													Leer más
												</router-link>
											</div>
										</div>
										<div class="post-footer">
											<div class="row">
												<div class="col-xs-12">
													<!-- // <div class="circle-color" :style="'background-color:' + color.hex + '; border: 1px solid rgba(0,0,0,0.25)'"></div>  -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</template>
							<template v-else>
								<div class="col-xs-12 garden-card">
									<div class="post text-center text-bold">
										<template v-if="loading === false">
											<div class="post-img-content">
											</div>
											<div class="content">
												<div class="author">
													No hay informacion para mostrar
												</div>
											</div>
										</template>
										<template v-else>
											<div class="post-img-content">
												<span class="post-title"><b>Cargando...</b><br />
													<b>Espere...</b>
												</span>
											</div>
											<div class="content">
												<div class="author">
													<b><i class="fa fa-spinner fa-pulse"></i> </b>
													Buscando informacion
												</div>
											</div>
										</template>
									</div>
								</div>
							</template>
						</div>

					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12 text-center">
				<ul class="pagination pagination-split pull-right">
					<li v-if="page > 1 && total > 0"><a @click="load();page--;"> &#60; </a></li>
					<li v-if="total > (limit * page)"><a @click="load();page++;"> &#62; </a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		
		<div class="col-xs-12 col-sm-12">
			<div class="x_panel">
				<div class="x_title">
					<ul class="nav navbar-right panel_toolbox">
						<li>
							Viendo: {{ (((page * limit) - limit) + 1) }}
							- 
							{{ (page * limit) }} / Total: {{ total }}
							 | 
							Limite x Página: {{ limit }}
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</template>

<template id="single-details">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>{{ record.names }} {{ record.surname }} </h2>
						<ul class="nav navbar-right panel_toolbox">
							<?= "<li><router-link accesskey=\"e\" class=\"close-link\" :to=\"{ name: 'Edit-Details', params: { candidate_id: record.id } }\"><i class=\"fa fa-edit\"></i></router-link></li>"; ?>
							<?= "<li><a accesskey=\"d\" @click=\"deleteThis()\"><i class=\"fa fa-trash\"></i></a></li>"; ?>
							<?= "<li><router-link accesskey=\"c\" class=\"close-link\" :to=\"{ name: 'Home' }\"><i class=\"fa fa-close\"></i></router-link></li>" ?>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
							<div class="profile_img">
								<div id="crop-avatar">
									<!-- Current avatar -->
									<img height="100%" :src="'data:image/png;base64, ' + record.avatar.data" class="img-responsive avatar-view" />
								</div>
							</div>
							<h3>{{ record.names }} {{ record.surname }}</h3>
							<ul class="list-unstyled user_data">
								<li>
									<i class="fa fa-credit-card user-profile-icon"></i> 
									<template v-if="record.identification_type.id !== undefined && record.identification_type.id > 0">
										{{ record.identification_type.code }}
									</template>
									{{ record.identification_number }}
								</li>
								<li>
									<i class="fa fa-gavel user-profile-icon"></i> 
									<template v-if="record.marital_status.id !== undefined && record.marital_status.id > 0">
										{{ record.marital_status.name }}
									</template>
								</li>
								<li>
									<i class="fa fa-birthday-cake user-profile-icon"></i> 
									{{ record.birthday }}
								</li>
								<li>
									<i class="fa fa-map-marker user-profile-icon"></i> 
									{{ record.address }}, 
									<template v-if="record.city.id !== undefined && record.city.id > 0">
										{{ record.city.name }},
									</template>
									<template v-if="record.department.id !== undefined && record.department.id > 0">
										{{ record.department.name }}
									</template>
								</li>
								<li>
									<i class="fa fa-usd user-profile-icon"></i> 
									{{ $root.formatMoney(record.salary) }}
								</li>
								<li><i class="fa fa-at user-profile-icon"></i> {{ record.email }}</li>
								<li><i class="fa fa-phone user-profile-icon"></i> {{ record.phone }}</li>
								<li><i class="fa fa-mobile user-profile-icon"></i> {{ record.mobile }}</li>
							</ul>
							
							<h4>Notas u Observaciones</h4>
							<p>{{ record.notes }}</p>							
							<router-link class="btn btn-success" :to="{ name: 'Edit-Details', params: { candidate_id: record.id } }">
								<i class="fa fa-edit m-right-xs"></i> Modificar
							</router-link>
							
							<br />
							<!-- start skills --
							<h4>Skills</h4>
							<ul class="list-unstyled user_data">
								<li>
									<p>Web Applications</p>
									<div class="progress progress_sm">
										<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
									</div>
								</li>
								<li>
									<p>Website Design</p>
									<div class="progress progress_sm">
										<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
									</div>
								</li>
								<li>
									<p>Automation & Testing</p>
									<div class="progress progress_sm">
										<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
									</div>
								</li>
								<li>
									<p>UI / UX</p>
									<div class="progress progress_sm">
										<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
									</div>
								</li>
							</ul>
							<!-- end of skills -->
						</div>
						
						<div class="col-md-9 col-sm-9 col-xs-12">
							<div class="" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Experiencia Laboral ({{ record.candidates_experience.length }})</a></li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
										<table class="data table table-striped no-margin">
											<thead>
												<tr>
													<th>#</th>
													<th>Cargo / Posicion</th>
													<th>Empresa</th>
													<th colspan="2" class="text-center" width="30%">Periodo</th>
													<th>Funciones</th>
													<th>
														<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target=".bs-news-experience-modal-lg"><i class="fa fa-plus"></i> </button>
													</th>
												</tr>
											</thead>
											<tbody>
												<template v-if="record.candidates_experience.length > 0">
													<tr v-for="(experience, experience_i) in record.candidates_experience">
														<td>{{ experience_i + 1 }}</td>
														<td>{{ experience.position }}</td>
														<td>{{ experience.business }}</td>
														<td>{{ experience.date_in }}</td>
														<td>{{ experience.date_out }}</td>
														<td>{{ experience.functions }}</td>
														<td>
															<button @click="loadExperienceById(experience.id)" type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target=".bs-experience-modal-lg"><i class="fa fa-pencil"></i> </button>
															<button @click="deleteExperienceById(experience.id)" type="button" class="btn btn-xs btn-danger" ><i class="fa fa-times"></i> </button>
														</td>
														
													</tr>
												</template>
												<template v-else>
													<tr>
														<td></td>
													</tr>
												</template>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						
							<div class="" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Información Académica ({{ record.candidates_studies.length }})</a></li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
										<table class="data table table-striped no-margin">
											<thead>
												<tr>
													<th>#</th>
													<th>Titulo</th>
													<th>Nivel de estudios</th>
													<th>Estado</th>
													<th>
														<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target=".bs-news-study-modal-lg"><i class="fa fa-plus"></i> </button>
													</th>													
												</tr>
											</thead>
											<tbody>
												<template v-if="record.candidates_studies.length > 0">
													<tr v-for="(study, study_i) in record.candidates_studies">
														<td>{{ study_i + 1 }}</td>
														<td>{{ study.title }}</td>
														<td>
															<template v-if="study.level.id !== undefined && study.level.id > 0">
																{{ study.level.name }}
															</template>
														</td>
														<td>
															<template v-if="study.status.id !== undefined && study.status.id > 0">
																{{ study.status.name }}
															</template>
														</td>
														<td>
															<button @click="loadStudyById(study.id)" type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target=".bs-study-modal-lg"><i class="fa fa-pencil"></i> </button>
															<button @click="deleteStudyById(study.id)" type="button" class="btn btn-xs btn-danger" ><i class="fa fa-times"></i> </button>
														</td>
													</tr>
												</template>
												<template v-else>
													<tr>
														<td></td>
													</tr>
												</template>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							
							<div class="" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Archivos ({{ record.candidates_files.length }})</a></li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
										<table class="data table table-striped no-margin">
											<thead>
												<tr>
													<th>#</th>
													<th>Nombre</th>
													<th>Tamaño</th>
													<th>Tipo</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<template v-if="record.candidates_files.length > 0">
													<tr v-for="(file, file_i) in record.candidates_files">
														<td>{{ file_i + 1 }}</td>
														<td>{{ file.media.name }}</td>
														<td>{{ file.media.size }}</td>
														<td>{{ file.media.type }}</td>
														<td width="125px">
															<button class="btn btn-danger btn-xs" @click="deleteFileById(file.id)"><i class="fa fa-times"></i></button>
															<a class="btn btn-default btn-xs" :href="file.media.path_short" download><i class="fa fa-download"></i></a> 
															<a class="btn btn-primary btn-xs" :href="file.media.path_short" target="_blank"><i class="fa fa-eye"></i></a>
														</td>
														<td>
														</td>
														<td>
															<!-- // <button @click="deleteStudyById(study.id)" type="button" class="btn btn-xs btn-danger" ><i class="fa fa-times"></i> </button> -->
														</td>
													</tr>
												</template>
												<template v-else>
													<tr>
														<td></td>
													</tr>
												</template>
											</tbody>
										</table>
									</div>
									<div class="clearfix"></div>
									<template>
										<div class="container">
											<div class="large-8 medium-10 small-12 pull-right">
											<div class="large-12 medium-12 small-12 cell">
												<label>Subir Archivo...
													<input type="file" id="file" ref="file" v-on:change="handleFileUpload()" accept="application/pdf, application/vnd.ms-excel"/> <!-- //  accept="image/png, image/jpeg, image/gif," -->
												</label>
												<button v-on:click="submitFile()">Subir</button>
											</div>
											</div>
										</div>
									</template>

							
								</div>
							</div>
							<div class="clearfix"></div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade bs-study-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel">Modificar Información Académica</h4>
					</div>
					<form v-on:submit="saveStudy" method="POST" action="javascript:false;" class="form-horizontal form-label-left">
						<div class="modal-body">
						<!-- // <h4>Text in a modal</h4> -->
						<!-- // 
						<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
						<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
						 -->
							<div class="form-group">
								<label for="study-edit-title">Titulo</label>
								<input id="study-edit-title" name="study-edit-title" v-model="edit.study.title" type="text" class="form-control" placeholder="Titulo" />
							</div>
							<div class="form-group">
								<label>Nivel de estudio</label>
								<select v-model="edit.study.level" class="form-control" id="field-name">
									<option value="0">Seleccione una opcion.</option>
									<option v-for="(level, level_index) in options.study.levels" :value="level.id">{{ level.name }}</option>
								</select>
							</div>
							<div class="form-group">
								<label>Estado</label>
								<select v-model="edit.study.status" class="form-control" id="field-name">
									<option value="0">Seleccione una opcion.</option>
									<option v-for="(status, status_index) in options.study.status" :value="status.id">{{ status.name }}</option>
								</select>
							</div>		  
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="modal fade bs-news-study-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel">Agregar Información Académica</h4>
					</div>
					<form v-on:submit="newStudy" method="POST" action="javascript:false;" class="form-horizontal form-label-left">
						<div class="modal-body">
						<!-- // <h4>Text in a modal</h4> -->
						<!-- // 
						<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
						<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
						 -->
							<div class="form-group">
								<label for="study-news-title">Titulo</label>
								<input id="study-news-title" name="study-news-title" v-model="news.study.title" type="text" class="form-control" placeholder="Titulo" />
							</div>
							<div class="form-group">
								<label>Nivel de estudio</label>
								<select v-model="news.study.level" class="form-control" id="field-name">
									<option value="0">Seleccione una opcion.</option>
									<option v-for="(level, level_index) in options.study.levels" :value="level.id">{{ level.name }}</option>
								</select>
							</div>
							<div class="form-group">
								<label>Estado</label>
								<select v-model="news.study.status" class="form-control" id="field-name">
									<option value="0">Seleccione una opcion.</option>
									<option v-for="(status, status_index) in options.study.status" :value="status.id">{{ status.name }}</option>
								</select>
							</div>		  
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<div class="modal fade bs-news-experience-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel">Agregar Información Académica</h4>
					</div>
					<form v-on:submit="newExperience" method="POST" action="javascript:false;" class="form-horizontal form-label-left">
						<div class="modal-body">
						<!-- // <h4>Text in a modal</h4> -->
						<!-- // 
						<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
						<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
						 -->
							<div class="form-group">
								<label for="experience-news-business">Empresa</label>
								<input id="experience-news-business" name="experience-news-business" v-model="news.experience.business" type="text" class="form-control" placeholder="Empresa" />
							</div>
							<div class="form-group">
								<label for="experience-news-position">Posicion / Cargo</label>
								<input id="experience-news-position" name="experience-news-position" v-model="news.experience.position" type="text" class="form-control" placeholder="Posicion / Cargo" />
							</div>
							<div class="form-group">
								<label for="experience-news-date_in">Fecha de Ingreso</label>
								<input id="experience-news-date_in" name="experience-news-date_in" v-model="news.experience.date_in" type="date" class="form-control" placeholder="Fecha de Ingreso" />
							</div>
							<div class="form-group">
								<label for="experience-news-date_out">Fecha de Salida</label>
								<input id="experience-news-date_out" name="experience-news-date_out" v-model="news.experience.date_out" type="date" class="form-control" placeholder="Fecha de Salida" />
							</div>
							<div class="form-group">
								<label for="experience-news-functions">Funciones</label>
								<textarea class="form-control" rows="5" id="experience-news-functions" name="experience-news-functions" v-model="news.experience.functions"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</form>
					{{ news.experience }}
				</div>
			</div>
		</div>
		
		<div class="modal fade bs-experience-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel">Agregar Información Académica</h4>
					</div>
					<form v-on:submit="saveExperience" method="POST" action="javascript:false;" class="form-horizontal form-label-left">
						<div class="modal-body">
						<!-- // <h4>Text in a modal</h4> -->
						<!-- // 
						<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
						<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
						 -->
							<div class="form-group">
								<label for="experience-edit-business">Empresa</label>
								<input id="experience-edit-business" name="experience-edit-business" v-model="edit.experience.business" type="text" class="form-control" placeholder="Empresa" />
							</div>
							<div class="form-group">
								<label for="experience-edit-position">Posicion / Cargo</label>
								<input id="experience-edit-position" name="experience-edit-position" v-model="edit.experience.position" type="text" class="form-control" placeholder="Posicion / Cargo" />
							</div>
							<div class="form-group">
								<label for="experience-edit-date_in">Fecha de Ingreso</label>
								<input id="experience-edit-date_in" name="experience-edit-date_in" v-model="edit.experience.date_in" type="date" class="form-control" placeholder="Fecha de Ingreso" />
							</div>
							<div class="form-group">
								<label for="experience-edit-date_out">Fecha de Salida</label>
								<input id="experience-edit-date_out" name="experience-edit-date_out" v-model="edit.experience.date_out" type="date" class="form-control" placeholder="Fecha de Salida" />
							</div>
							<div class="form-group">
								<label for="experience-edit-functions">Funciones</label>
								<textarea class="form-control" rows="5" id="experience-edit-functions" name="experience-edit-functions" v-model="edit.experience.functions"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</form>
					{{ edit.experience }}
				</div>
			</div>
		</div>
	</div>
</template>

<template id="create">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Crear</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><router-link accesskey="c" class="close-link" :to="{ name: 'Home' }"><i class="fa fa-close"></i></router-link></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					
					<form action="javascript:false" v-on:submit="validateForm" method="POST">
						<div class="x_content">
							<!-- // <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p> -->
							
							<template v-if="error.error == true">
								<div class="alert alert-danger alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
									<strong>Error: </strong> 
									{{ error.message }}
								</div>
							</template>
							<div class="col-sm-10 col-xs-12">
								<div class="row">
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_type">Tipo de Documento <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<select id="identification_type" required="required" v-model="record.identification_type" class="form-control">
													<option value="0">Seleccione una opcion</option>
													<option v-for="(type, index_type) in options.identifications_types" :value="type.id">{{ type.name }}</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_number">Numero de identificacion <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.identification_number" type="text" id="identification_number" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="names">Nombre(s) <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.names" type="text" id="names" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="surname">Apellido(s) <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.surname" type="text" id="surname" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="marital_status">Estado Civil <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<select id="marital_status" required="required" v-model="record.marital_status" class="form-control">
													<option value="0">Seleccione una opcion</option>
													<option v-for="(status_c, index_type) in options.status_marital" :value="status_c.id">{{ status_c.name }}</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthday">Fecha de Nacimiento <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.birthday" type="date" id="birthday" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Departamento <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<select @change="loadOptionCityBasic" id="department" required="required" v-model="record.department" class="form-control">
													<option value="0">Seleccione una opcion</option>
													<option v-for="(department, index_department) in options.geo.departments" :value="department.id">{{ department.name }}</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">Departamento <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<select id="city" required="required" v-model="record.city" class="form-control">
													<option value="0">Seleccione una opcion</option>
													<option v-for="(city, index_city) in options.geo.citys" :value="city.id">{{ city.name }}</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Dirección <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<textarea rows="3" v-model="record.address" type="date" id="address" required="required" class="form-control col-md-7 col-xs-12"></textarea>
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary">Salario <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.salary" type="number" step="0.000001" id="salary" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo electronico <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.email" type="email" id="email" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Teléfono(s) Fijo <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.phone" type="text" id="phone" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Teléfono(s) Móvil <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.mobile" type="text" id="mobile" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_comun">Imagen Principal <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="input-group">
													<span class="input-group-btn">
														<span class="btn btn-default btn-file">
															Subir… <input type="file" accept="image/png, image/jpeg, image/gif" id="imgInp">
														</span>
													</span>
													<input id='urlname' type="text" class="form-control" readonly>
													<input v-model="record.avatar" type="hidden" id="avatar" required="required" class="form-control col-md-7 col-xs-12">
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="notes">Notas u Observaciones <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<textarea v-model="record.notes" rows="7" id="notes" class="form-control col-xs-12" type="text" name="description"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-xs-12">
								<img id='img-upload'/>
								<button id="clear-pict" class="btn btn-default">Quitar</button>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success">Crear</button>
						</div>
					</form>
				</div>
				<p>{{ record }}</p>
			</div>
		</div>
	</div>
</template>

<template id="edit">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Crear</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><router-link accesskey="c" class="close-link" :to="{ name: 'Home' }"><i class="fa fa-close"></i></router-link></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					
					<form action="javascript:false" v-on:submit="validateForm" method="POST">
						<div class="x_content">
							<!-- // <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p> -->
							<!-- // <p>{{ record }}</p> -->
							<div class="col-sm-9 col-xs-8">
								<div class="row">
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_type">Tipo de Documento <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<select id="identification_type" required="required" v-model="record.identification_type" class="form-control">
													<option value="0">Seleccione una opcion</option>
													<option v-for="(type, index_type) in options.identifications_types" :value="type.id">{{ type.name }}</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_number">Numero de identificacion <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.identification_number" type="text" id="identification_number" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="names">Nombre(s) <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.names" type="text" id="names" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="surname">Apellido(s) <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.surname" type="text" id="surname" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="marital_status">Estado Civil <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<select id="marital_status" required="required" v-model="record.marital_status" class="form-control">
													<option value="0">Seleccione una opcion</option>
													<option v-for="(status_c, index_type) in options.status_marital" :value="status_c.id">{{ status_c.name }}</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthday">Fecha de Nacimiento <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.birthday" type="date" id="birthday" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Departamento <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<select id="department" required="required" v-model="record.department" class="form-control">
													<option value="0">Seleccione una opcion</option>
													<option v-for="(department, index_department) in options.geo.departments" :value="department.id">{{ department.name }}</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">Departamento <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<select id="city" required="required" v-model="record.city" class="form-control">
													<option value="0">Seleccione una opcion</option>
													<option v-for="(city, index_city) in options.geo.citys" :value="city.id">{{ city.name }}</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Dirección <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<textarea rows="3" v-model="record.address" type="date" id="address" required="required" class="form-control col-md-7 col-xs-12"></textarea>
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary">Salario <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.salary" type="number" step="0.000001" id="salary" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo electronico <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.email" type="email" id="email" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Teléfono(s) Fijo <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.phone" type="text" id="phone" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Teléfono(s) Móvil <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input v-model="record.mobile" type="text" id="mobile" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_comun">Imagen Principal <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="input-group">
													<span class="input-group-btn">
														<span class="btn btn-default btn-file">
															Subir… <input type="file" accept="image/png, image/jpeg, image/gif" id="imgInp">
														</span>
													</span>
													<input id='urlname' type="text" class="form-control" readonly>
													<input v-model="record.avatar" type="hidden" id="avatar" required="required" class="form-control col-md-7 col-xs-12">
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="notes">Notas u Observaciones <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<textarea v-model="record.notes" rows="7" id="notes" class="form-control col-xs-12" type="text" name="description"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-xs-4">
								<img id='img-upload' />									
								<button id="clear-pict" class="btn btn-default">Quitar</button>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success">Guardar</button>
						</div>
					</form>
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

var Home = Vue.extend({
	template: '#home',
	data(){
		return {
			loading: true,
			temp_filters: [],
			options: {
				filters: [],
			},
			records: [],
			total: 0,
			limit: 20,
			page: 1,
			search: {
				loading: false,
				text: '',				
			}
		};
	},
	mounted: function () {
		var self = this;
		self.loadFilters();
	},
	computed: {
		filters(){
			var self = this;
			return [1,2,3];
		}
	},
	methods: {
		loadFilters(){
			// garden_filters
			var self = this;
			self.options.filters = [];
			api.get('/records/garden_filters', { params: {
				join: [
					'garden_filters_attributes',
				]
			} }).then(function (response) {
				if(response.status === 200){
					if(response.data.records !== undefined && response.data.records.length > 0){
						// console.log('Records : ', response.data.records);
						self.options.filters = response.data.records;
						self.load();
					}
				}
			}).catch(function (error) {
				// console.log('error Home::methods::loadFilters()');
				console.log(error.response);
			});
		},
		load(){
			var self = this;
			self.loading = true;
			self.records = [];
			self.total = 0;
			window.scrollTo(0, 0);
			
			api.get('/records/candidates', {
				params: {
					join: [
						'pictures',
						// 'garden_attributes',
					],
					order: "id",
					page: self.page + "," + self.limit
				}
			}).then(function (response) {
				console.log('response', response);
				if(response.data.records && response.data.records.length > 0){
					self.total = response.data.results;
					self.records = response.data.records;
				}
				self.loading = false;
			}).catch(function (error) {
				console.log('error Home::methods::load()');
				console.log(error.response);
				self.loading = false;
			});
			/*
			if(self.temp_filters.length > 0){
				api.get('/records/garden_attributes', {
					params: {
						filter: [
							'attribute,in,' + self.temp_filters.join(',')
						],
						order: "id",
						page: self.page + "," + self.limit
					}
				}).then(function (response) {
					if(response.status == 200){
						// console.log('respo: ', response);
						list = [];
						
						response.data.records.forEach(function(b){
							const isLargeNumber = (element) => element === b.garden;
							found = list.findIndex(isLargeNumber);
							if(found < 0){
								list.push(b.garden);
							}
						});
						
						api.get('/records/garden', {
							params: {
								join: [
									'pictures',
									'garden_attributes',
								],
								filter: [
									'id,in,' + list.join(',')
								]
							}
						}).then(function (response) {
							if(response.data.records && response.data.records.length > 0){
								self.total = response.data.results;
								self.records = response.data.records;
								self.loading = false;
							}
						}).catch(function (error) {
							console.log('error Home::methods::load()');
							console.log(error.response);
							self.loading = false;
						});
						self.loading = false;
					}
				}).catch(function (error) {
					console.log('error Home::methods::load()');
					console.log(error.response);
					self.loading = false;
				});
			} else {
				api.get('/records/garden', {
					params: {
						join: [
							'pictures',
							'garden_attributes',
						],
						order: "id",
						page: self.page + "," + self.limit
					}
				}).then(function (response) {
					if(response.data.records && response.data.records.length > 0){
						self.total = response.data.results;
						self.records = response.data.records;
						self.loading = false;
					}
					self.loading = false;
				}).catch(function (error) {
					console.log('error Home::methods::load()');
					console.log(error.response);
					self.loading = false;
				});
			}
			*/
		},
		searchText(){
			var self = this;
			if(self.search.text.length >= 2){
				if(self.search.loading == false){
					self.search.loading = true;
					self.records = [];
					
					axios.get('/index.php', {
						params: {
							action: 'SearchCandidates',
							searchText: self.search.text,
						}
					}).then(function (response) {
						self.search.loading = false;
						// console.log('response', response);
						
						if(response.status === 200 && response.data.error == false && response.data.records.length > 0){					
							api.get('/records/candidates', {
								params: {
									join: [
										'pictures',
									],
									filter: [
										'id,in,' + response.data.records
									],
									order: "id",
									// page: self.page + "," + self.limit
								}
							}).then(function (response) {
								self.search.loading = false;
								if(response.data.records && response.data.records.length > 0){
									self.total = response.data.results;
									self.records = response.data.records;
								}
							}).catch(function (error) {
								console.log('error Home::methods::load()');
								console.log(error.response);
								self.search.loading = false;
							});
						}
					}).catch(function (error) {
						console.log(error);
						console.log(error.response);
						self.search.loading = false;
					});
				
				} else {
					alert("Espera a que se complete la busqueda anterior.");
					
				}
			} else {
				if(self.search.text.length >= 0 || self.search.text == "")
					self.load();
			}
		},
	}
});

var SingleDetails = Vue.extend({
	template: '#single-details',
	data(){
		return {
			file: '',
			record: {
				"id": this.$route.params.candidate_id,
				"identification_type": {
					"id": 0,
					"name": "",
					"code": ""
				},
				"identification_number": "",
				"names": "",
				"surname": "",
				"marital_status": {
					"id": 0,
					"name": ""
				},
				"birthday": "",
				"department": {
					"id": 0,
					"name": "",
					"code": ""
				},
				"city": {
					"id": 0,
					"name": "",
					"department": 0
				},
				"address": "",
				"salary": 0,
				"email": "",
				"phone": "",
				"mobile": "",
				"avatar": {
					"id": 0,
					"name": "",
					"description": "",
					"size": 0,
					"data": "",
					"type": "",
					"created": "",
					"updated": ""
				},
				"notes": "",
				"create": "",
				"updated": "",
				"candidates_experience": [],
				"candidates_studies": [],
				"candidates_files": [],
			},
			garden_attributes: [],
			
			options: {
				study: {
					status: [],
					levels: [],
				}
			},
			edit: {
				study: {
					id: 0,
					candidate: this.$route.params.candidate_id,
					title: "",
					level: 0,
					status: 0,
				},
				experience: {
					id: 0,
					candidate: this.$route.params.candidate_id,
					business: '',
					position: '',
					date_in: '',
					date_out: '',
					functions: '',
				},
			},
			news: {
				experience: {
					candidate: this.$route.params.candidate_id,
					business: '',
					position: '',
					date_in: '',
					date_out: '',
					functions: '',
				},
				study: {
					candidate: this.$route.params.candidate_id,
					title: "",
					level: 0,
					status: 0,
				}
			},
		};
	},
	computed: {
	},
	mounted() {
		var self = this;
		self.loadOptions();		
	},
	methods: {
		loadOptions(){
			var self = this;
			
			self.$root.loadAPI_List('study_levels', {}, function(e){
				self.options.study.levels = e;
			});
			self.$root.loadAPI_List('study_status', {}, function(e){
				self.options.study.status = e;
			});
			self.load();
		},
		
		loadExperienceById(id){
			var self = this;
			self.$root.loadAPI_Single('candidates_experience', id, {}, function(e){
				self.edit.experience = e;
			});
		},
		newExperience(){
			var self = this;			
			if(
				self.news.experience.business.length > 2
				&& self.news.experience.position.length > 2
				&& self.news.experience.date_in.length > 5
				&& self.news.experience.functions.length > 2
			){
				api.post('/records/candidates_experience', self.news.experience)
				.then(function (c){
					if(c.status == 200){
						$('.bs-news-experience-modal-lg').modal('hide');
						self.load();
						return true;
					} else {
						return false;
					}
				})
				.catch(function (e) {
					console.error(e);
					console.log(e.response);
					return false;
				});
			}
		},
		saveExperience(){
			var self = this;			
			if(self.edit.experience.id > 0){
				api.put('/records/candidates_experience/' + self.edit.experience.id, self.edit.experience)
				.then(function (c){
					if(c.status == 200){
						$('.bs-experience-modal-lg').modal('hide');
						self.load();
						return true;
					} else {
						return false;
					}
				})
				.catch(function (e) {
					console.error(e);
					console.log(e.response);
					return false;
				});
			
			}
		},
		
		loadStudyById(id){
			var self = this;
			self.$root.loadAPI_Single('candidates_studies', id, {}, function(e){
				self.edit.study = e;
			});
		},
		newStudy(){
			var self = this;			
			if(
				self.news.study.title.length > 2
				&& self.news.study.level > 0
				&& self.news.study.status > 0
			){
				api.post('/records/candidates_studies', self.news.study)
				.then(function (c){
					if(c.status == 200){
						$('.bs-news-study-modal-lg').modal('hide');
						self.load();
						return true;
					} else {
						return false;
					}
				})
				.catch(function (e) {
					console.error(e);
					console.log(e.response);
					return false;
				});
			}
		},
		saveStudy(){
			var self = this;
			//console.log('Validando Study', self.edit.study);
			
			if(self.edit.study.id > 0){
				api.put('/records/candidates_studies/' + self.edit.study.id, self.edit.study)
				.then(function (c){
					if(c.status == 200){
						$('.bs-study-modal-lg').modal('hide');
						self.load();
						return true;
					} else {
						return false;
					}
				})
				.catch(function (e) {
					console.error(e);
					console.log(e.response);
					return false;
				});
			
			}
		},
		load(){
			var self = this;
			window.scrollTo(0, 0);
			
			api.get('/records/candidates/' + self.$route.params.candidate_id, {
				params: {
					join: [
						'pictures',
						'identifications_types',
						'status_marital',
						'geo_departments',
						'geo_citys',
						'candidates_experience',
						'candidates_studies',
						'candidates_studies,study_levels',
						'candidates_studies,study_status',
						'candidates_files,media',
					]
				}
			}).then(function (response) {
				console.log('response', response);
				if(response.status === 200){
					if(response.data.id !== undefined && response.data.id > 0){
						self.record = response.data;
						/*
						self.record.id = response.data.id;
						self.record.name_comercial = response.data.name_comercial;
						self.record.name_comun = response.data.name_comun;
						self.record.name_botanico = response.data.name_botanico;
						self.record.picture = response.data.picture;
						self.record.description = response.data.description;
						self.record.attendance = response.data.attendance;
						self.record.garden_comun_names = response.data.garden_comun_names;
						self.record.garden_attributes = response.data.garden_attributes;
						self.record.garden_gallery = response.data.garden_gallery;
						*/
						$('[data-toggle="tooltip"]').tooltip();
					}
				}
			}).catch(function (error) {
				console.log(error);
				console.log(error.response);
				
				self.$router.push({
					name:'Home'
				});
			});
		},
		deleteFileById(id){
			var self = this;
			bootbox.confirm({
				message: "Confirma que deseas eliminar este contenido?",
				locale: 'es',
				callback: function (a) {
					if(a !== undefined && a == true){
						api.delete('/records/candidates_files/' + id)
						.then(function (c){
							if(c.data > 0){
								self.load();
								return true;
							}
						})
						.catch(function (e) {
							console.error(e);
							console.log(e.response);
							alert('UPS, Error, intente nuevamente.');
							return false;
						});
					}
				}
			});
		},
		deleteStudyById(id){
			var self = this;
			bootbox.confirm({
				message: "Confirma que deseas eliminar este contenido?",
				locale: 'es',
				callback: function (a) {
					if(a !== undefined && a == true){
						api.delete('/records/candidates_studies/' + id)
						.then(function (c){
							if(c.data > 0){
								self.load();
								return true;
							}
						})
						.catch(function (e) {
							console.error(e);
							console.log(e.response);
							alert('UPS, Error, intente nuevamente.');
							return false;
						});
					}
				}
			});
		},
		deleteExperienceById(id){
			var self = this;
			bootbox.confirm({
				message: "Confirma que deseas eliminar este contenido?",
				locale: 'es',
				callback: function (a) {
					if(a !== undefined && a == true){
						api.delete('/records/candidates_experience/' + id)
						.then(function (c){
							if(c.data > 0){
								self.load();
								return true;
							}
						})
						.catch(function (e) {
							console.error(e);
							console.log(e.response);
							alert('UPS, Error, intente nuevamente.');
							return false;
						});
					}
				}
			});
		},
		deleteThis(){
			var self = this;
			bootbox.confirm({
				message: "Confirma que deseas eliminar este contenido?",
				locale: 'es',
				callback: function (a) {
					if(a !== undefined && a == true){
						api.delete('/records/candidates/' + self.$route.params.candidate_id)
						.then(function (c){
							if(c.data > 0){
								self.$router.push({
									name:'Home',
								});
								return true;
							}
						})
						.catch(function (e) {
							console.error(e);
							console.log(e.response);
							alert('UPS, Error, intente nuevamente.');
							return false;
						});
					}
				}
			});
		},
		/* Submits the file to the server */
		submitFile(){
			var self = this;
			/* Initialize the form data */
			let formData = new FormData();
			/* Add the form data we need to submit */
			formData.append('file', self.file);
			/* Make the request to the POST /single-file URL */
			axios.post( '/index.php?action=UploadFile', formData,
			{
				headers: { 
					'Content-Type': 'multipart/form-data'
				}
			}).then(function(e){
				$("#file").val('');				
				if(e.status == 200 && e.data.files.length > 0 && e.data.files[0].error === false){
					api.post('/records/candidates_files', {
						candidate: self.$route.params.candidate_id,
						media: e.data.files[0].id,
					})
					.then(function (d){
						if(d.status == 200){
							console.log('SUCCESS!!', e);
							self.load();
						}
					})
					.catch(function (e) {
						//console.error(e);
						//console.log(e.response);
						$('#img-upload').attr('src','');
						$('#urlname').val('');
						self.record.avatar = 0;
					});
				} else {
					
				}
			})
			.catch(function(){
				alert('Hubo un error subiendo el archivo!');
				$("#file").val('');
			});
		  },
		  /*
			Handles a change on the file upload
		  */
		  handleFileUpload(){
			  var self = this;
			  self.file = self.$refs.file.files[0];
		  }
	}
});

var Create = Vue.extend({
	template: '#create',
	data(){
		return {
			options: {
				identifications_types: [],
				status_marital: [],
				geo: {
					departments: [],
					citys: [],
				},
				study: {
					levels: [],
					status: [],
				},
				
				filters: [],
			},
			id: 0,
			record: {
				"identification_type": 0,
				"identification_number": "",
				"names": "",
				"surname": "",
				"marital_status": 0,
				"birthday": "",
				"address": "",
				"department": 0,
				"city": 0,
				"salary": 0.000001,
				"email": "",
				"phone": "",
				"mobile": "",
				"avatar": 0,
				"notes": "",
			},
			"candidates_studies": [],
			"candidates_experience": [],
			
			"garden_attributes": [],
			"garden_comun_names": [],
			"garden_gallery": [],
			error: {
				error: false,
				message: "",
			}
		};
	},
	mounted() {
		var self = this;
		window.scrollTo(0, 0);
		self.loadOptions();
		
		$(document).ready( function() {
			$(document).on('change', '.btn-file :file', function() {
				var input = $(this), label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				input.trigger('fileselect', [label]);
			});

			$('.btn-file :file').on('fileselect', function(event, label) {
				var input = $(this).parents('.input-group').find(':text'), log = label;
				if (input.length){ input.val(log); } 
				else { if(log) alert(log); }
			});
			
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						self.record.avatar = 0;
						pict = {
							name: input.files[0].name,
							size: input.files[0].size,
							data: e.target.result.split('base64,')[1],
							type: input.files[0].type,
						};
						
						api.post('/records/pictures', pict)
						.then(function (d){
							if(d.data > 0){
								self.record.avatar = d.data;
								$('#img-upload').attr('src', e.target.result);
							}
						})
						.catch(function (e) {
							//console.error(e);
							//console.log(e.response);
							$('#img-upload').attr('src','');
							$('#urlname').val('');
							self.record.avatar = 0;
						});
					}
					reader.readAsDataURL(input.files[0]);
				}
			}

			$("#imgInp").change(function(){
				readURL(this);
			});
			
			$("#clear-pict").click(function(){
				$('#img-upload').attr('src','');
				$('#urlname').val('');
				self.record.avatar = 0;
			});
			
		});
	},
	methods: {
		loadOptions(){
			var self = this;
			
			self.$root.loadAPI_List('identifications_types', {}, function(e){
				self.options.identifications_types = e;
			});
			self.$root.loadAPI_List('status_marital', {}, function(e){
				self.options.status_marital = e;
			});
			self.$root.loadAPI_List('geo_departments', {}, function(e){
				self.options.geo.departments = e;
			});
			self.$root.loadAPI_List('study_levels', {}, function(e){
				self.options.study.levels = e;
			});
			self.$root.loadAPI_List('study_status', {}, function(e){
				self.options.study.status = e;
			});
		},
		loadOptionCityBasic(){
			var self = this;
			if(self.record.department > 0){
				self.$root.loadAPI_List('geo_citys', {
					filter: [
						'department,eq,' + self.record.department
					]
				}, function(e){
					self.options.geo.citys = e;
				});
			}
		},
		validateForm(){			
			var self = this;
			self.error.error = false;
			self.error.message = "";
			
			if(
				self.record.identification_type > 0
				&& self.record.identification_number.length > 3
				&& self.record.names.length > 3
				&& self.record.surname.length > 3
				&& self.record.marital_status > 0
				&& self.record.birthday.length > 1
				&& self.record.department > 0
				&& self.record.city > 0
				&& self.record.address.length > 3
				&& self.record.salary > 0
				&& self.record.email.length > 3
				&& self.record.phone.length > 3
				&& self.record.mobile.length > 3
				&& parseInt(self.record.avatar) > 0
			){
				if(self.id <= 0){
					api.post('/records/candidates', self.record)
					.then(function (c){
						if(c.data > 0){
							self.id = c.data;
							self.$router.push({
								name:'Single-Details',
								params: {
									candidate_id: self.id
								}
							});
							return true;
						}
					})
					.catch(function (e) {
						console.error(e);
						console.log(e.response);
						return false;
					});
				} else {
					api.put('/records/candidates/' + self.id, self.record)
					.then(function (c){
						if(c.data > 0){
							return true;
						}
					})
					.catch(function (e) {
						console.error(e);
						console.log(e.response);
						return false;
					});
				}
			} else {
				self.error.error = true;
				self.error.message = 'Formulario incompleto';
			}
		},
	}
});

var Edit = Vue.extend({
	template: '#edit',
	data(){
		return {
			options: {
				identifications_types: [],
				status_marital: [],
				geo: {
					departments: [],
					citys: [],
				},
				study: {
					levels: [],
					status: [],
				},
				
				filters: [],
			},
			id: this.$route.params.candidate_id,
			record: {
				id: this.$route.params.candidate_id,
				"identification_type": 0,
				"identification_number": "",
				"names": "",
				"surname": "",
				"marital_status": 0,
				"birthday": "",
				"address": "",
				"department": 0,
				"city": 0,
				"salary": 0.000001,
				"email": "",
				"phone": "",
				"mobile": "",
				"avatar": 0,
				"notes": "",
			},
			"candidates_studies": [],
			"candidates_experience": [],
			
			"garden_attributes": [],
			"garden_comun_names": [],
			"garden_gallery": [],
		};
	},
	mounted() {
		var self = this;
		window.scrollTo(0, 0);
		self.loadOptions();
		
		$(document).ready( function() {
			$(document).on('change', '.btn-file :file', function() {
				var input = $(this), label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				input.trigger('fileselect', [label]);
			});

			$('.btn-file :file').on('fileselect', function(event, label) {
				var input = $(this).parents('.input-group').find(':text'), log = label;
				if (input.length){ input.val(log); } 
				else { if(log) alert(log); }
			});
			
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						self.record.avatar = 0;
						//console.log('input.files[0]', input.files[0]);
						//console.log('e.target', e.target);
						
						pict = {
							name: input.files[0].name,
							size: input.files[0].size,
							data: e.target.result.split('base64,')[1],
							type: input.files[0].type,
						};
						//console.log('pict', pict);
						
						api.post('/records/pictures', pict)
						.then(function (d){
							if(d.data > 0){
								self.record.avatar = d.data;
								$('#img-upload').attr('src', e.target.result);
							}
						})
						.catch(function (e) {
							//console.error(e);
							//console.log(e.response);
							$('#img-upload').attr('src','');
							$('#urlname').val('');
							self.record.avatar = 0;
						});
					}
					reader.readAsDataURL(input.files[0]);
				}
			}

			$("#imgInp").change(function(){
				readURL(this);
			});
			
			$("#clear-pict").click(function(){
				$('#img-upload').attr('src','');
				$('#urlname').val('');
				self.record.avatar = 0;
			});
			
		});
	},
	methods: {
		load(){
			var self = this;
			self.$root.loadAPI_Single('candidates', self.id, {
				join: [
					//'pictures',
					//'candidates_experience',
					//'candidates_studies',
				]
			}, function(e){
				self.record = e;
				if(self.record.avatar > 0){
					self.$root.loadAPI_Single('pictures', self.record.avatar, {}, function(p){
						$("#img-upload").attr('src', 'data:image/png;base64, ' + p.data);
						$("#urlname").val(p.name);
					});
				}
			});
		},
		loadOptions(){
			var self = this;
			
			self.$root.loadAPI_List('identifications_types', {}, function(e){
				self.options.identifications_types = e;
			});
			self.$root.loadAPI_List('status_marital', {}, function(e){
				self.options.status_marital = e;
			});
			self.$root.loadAPI_List('geo_departments', {}, function(e){
				self.options.geo.departments = e;
			});
			self.$root.loadAPI_List('geo_citys', {}, function(e){
				self.options.geo.citys = e;
			});
			self.$root.loadAPI_List('study_levels', {}, function(e){
				self.options.study.levels = e;
			});
			self.$root.loadAPI_List('study_status', {}, function(e){
				self.options.study.status = e;
			});
			self.load();
		},
		loadOptionCityBasic(){
			var self = this;
			if(self.record.department > 0){
				self.$root.loadAPI_List('geo_citys', {
					filter: [
						'department,eq,' + self.record.department
					]
				}, function(e){
					self.options.geo.citys = e;
				});
			}
			self.validateForm();
		},
		validateForm(){
			var self = this;
			console.log('validateForm');
			if(
				self.record.identification_type > 0
				&& self.record.identification_number.length > 3
				&& self.record.names.length > 3
				&& self.record.surname.length > 3
				&& self.record.marital_status > 0
				&& self.record.birthday.length > 1
				&& self.record.department > 0
				&& self.record.city > 0
				&& self.record.address.length > 3
				&& self.record.salary > 0
				&& self.record.email.length > 3
				&& self.record.phone.length > 3
				&& self.record.mobile.length > 3
				&& parseInt(self.record.avatar) > 0
			){
				api.put('/records/candidates/' + self.id, self.record)
				.then(function (c){
					if(c.data > 0){
						self.$router.push({
							name:'Single-Details',
							params: {
								candidate_id: self.id
							}
						});
						return true;
					}
				})
				.catch(function (e) {
					console.error(e);
					console.log(e.response);
					return false;
				});
			} else {
				console.log('Formulario incompleto');
			}
		},
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: Home, name: 'Home' },
		{ path: '/create', component: Create, name: 'Create' },
		{ path: '/view/:candidate_id', component: SingleDetails, name: 'Single-Details' },
		{ path: '/edit/:candidate_id', component: Edit, name: 'Edit-Details' },
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
		},
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
}).$mount('#garden-app');
</script>