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
</style>

<div id="employees-app">
	<div class="page-title">
		<div class="title_left">
			<h3><?= $title; ?> <small><?= $subtitle; ?></small></h3>
		</div>
		<div class="title_right">
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
			</div>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="row">
		<router-view :key="$route.fullPath" ></router-view>
		
	</div>
</div>

<template id="home-list">
	<div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Listado<small><?= $subtitle; ?></small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><router-link class="close-link" :to="{ name: 'CreateEmployee' }"><i class="fa fa-plus"></i></router-link></li>
						<!-- // <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li> -->
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a></li>
								<li><a href="#">Settings 2</a></li>
							</ul>
						</li>
						-->
						<!-- // <li><a class="close-link"><i class="fa fa-close"></i></a></li>-->
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<p class="text-muted font-13 m-b-30">
						The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
					</p>
					<table id="datatable-employees" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Ver</th>
								<th>Tipo Doc.</th>
								<th>Doc. Identidad</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Correo Electronico</th>
								<th>Edad</th>
								<th>Salario</th>
								<th></th>
							</tr>
						</thead>
						
						<tbody>
							<template v-if="records.length > 0">
								<tr v-for="(employee, employee_i) in records">
									<td>{{ (employee_i+1) }}</td>
									<td>
										<router-link class="btn btn-default" :to="{ name: 'single-details', params: { employee_id: employee.id } }"><i class="fa fa-eye"></i></router-link>
									</td>
									<td>{{ (employee.identification_type.id !== undefined && employee.identification_type.id > 0) ? employee.identification_type.code : employee.identification_type }}</td>
									<td>{{ employee.identification_number }}</td>
									<td>{{ employee.names }}</td>
									<td>{{ employee.surname }}</td>
									<td>{{ employee.email }}</td>
									<td>{{ employee.birthday }}</td>
									<td>{{ employee.salary }}</td>
									<td></td>
								</tr>
							</template>
							<!-- // 
							<template v-else>
								<tr>
									<td></td>
									<td>Agrega</td>
									<td>empleados </td>
									<td>para </td>
									<td>poder </td>
									<td>visualizar </td>
									<td>más </td>
									<td> opciones...</td>
									<td></td>
								</tr>
							</template>
							-->
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</div>
</template>

<template id="create-employee">
	<div>
		<div class="col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Nuevo <small><?= $title; ?></small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a></li>
								<li><a href="#">Settings 2</a></li>
							</ul>
						</li>
						<li><router-link accesskey="c" class="close-link" :to="{ name: 'HomeList' }"><i class="fa fa-close"></i></router-link></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<template v-if="error.error == true">
						<div class="alert alert-danger alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<!-- // <span aria-hidden="true">×</span> -->
							</button>
							<strong>Error: </strong> 
							{{ error.message }}
						</div>
					</template>
					
					<form class="form-horizontal form-label-left" action="javascript:false" v-on:submit="validateForm" method="POST">
						<span class="section">Info. Personal</span>
						<div class="col-sm-6 col-xs-6">
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_type">Tipo de Documento <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0"  id="identification_type" required="required" v-model="record.identification_type" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.identifications_types" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_number"># Documento <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.identification_number" id="identification_number" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" data-validate-words="1" name="identification_number" placeholder="Numero del documento" required="required" type="text">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="expedition">Fecha Exped. <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.expedition" id="expedition" class="form-control col-md-7 col-xs-12" name="expedition" required="required" type="date" placeholder="MM/DD/YYYY" >
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Departamento Exped. <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0" @change="loadOptionCityBasic" id="department" required="required" v-model="record.department" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.geo.departments" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">Ciudad Exped. <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0" id="city" required="required" v-model="record.city" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.geo.citys" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="names">Nombre(s) <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.names" id="names" class="form-control col-md-7 col-xs-12" data-validate-length-range="3" data-validate-words="1" name="names" placeholder="Nombre(s)" required="required" type="text">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="surname">Apellido(s) <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.surname" id="surnname" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="surname" placeholder="Apellido(s)" required="required" type="text">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_type">Estado civil <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0"  id="status_marital" required="required" v-model="record.status_marital" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.status_marital" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthday">Fecha Nacim. <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.birthday" id="birthday" class="form-control col-md-7 col-xs-12" name="birthday" required="required" type="date" placeholder="MM/DD/YYYY" >
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Direccion <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<div class="input-group">
										<input min="1" readonly="" v-model="record.address" type="number" id="address" class="form-control" required="required" class="form-control">
										<span class="input-group-btn">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addresses-modal">
												<i class="fa fa-search"></i>
											</button>

										</span>
									</div>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo electronico <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.email" type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Teléfono Fijo <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.phone" type="phone" id="phone" name="phone" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Teléfono Móvil <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.mobile" type="mobile" id="mobile" name="mobile" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Genero <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="gender" required="required" v-model="record.gender" class="form-control">
										<option value="">Seleccione una opcion</option>
										<option value="male">Masculino</option>
										<option value="female">Femenino</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6 col-xs-6">
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Estado <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0" id="status" required="required" v-model="record.status" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.employees_status" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="area">Área <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0" id="area" required="required" v-model="record.area" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.employees_areas" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="headquarters">Sede <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0" id="headquarters" required="required" v-model="record.headquarters" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.headquarters" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="headquarters">Foto 3x4 (cm) <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
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
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary">Salario <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.salary" type="float" id="salary" name="salary" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="col-sm-12 col-xs-12">
								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-xs-4 col-md-offset-8">
										<button id="send" type="submit" class="btn btn-success"> Crear </button>
									</div>
								</div>
							</div>
						</form>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="headquarters">Foto 3x4 (cm) <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<img class="img-responsive" src="data:image/png;base64, /9j/4AAQSkZJRgABAQEBLAEsAAD/4R7GRXhpZgAATU0AKgAAAAgACwALAAIAAAAmAAAIngEOAAIA%0AAABLAAAIxAESAAMAAAABAAEAAAEaAAUAAAABAAAJEAEbAAUAAAABAAAJGAEoAAMAAAABAAIAAAEx%0AAAIAAAAmAAAJIAEyAAIAAAAUAAAJRgE7AAIAAAAIAAAJWodpAAQAAAABAAAJYuocAAcAAAgMAAAA%0AkgAAEaYc6gAAAAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAFdpbmRvd3MgUGhvdG8gRWRpdG9yIDEwLjAuMTAwMTEuMTYzODQARGVmYXVs%0AdCBhdmF0YXIgcHJvZmlsZSBpY29uLiBHcmV5IHBob3RvIHBsYWNlaG9sZGVyLCBpbGx1c3RyYXRp%0Ab25zIHZlY3RvcnMAAAAtxsAAACcQAC3GwAAAJxBXaW5kb3dzIFBob3RvIEVkaXRvciAxMC4wLjEw%0AMDExLjE2Mzg0ADIwMTk6MTI6MjYgMTQ6MjI6NTgARWt3aXNpdAAABKABAAMAAAABAAEAAKACAAQA%0AAAABAAAXcKADAAQAAAABAAAXcOocAAcAAAgMAAAJmAAAAAAc6gAAAAgAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAYBAwADAAAAAQAG%0AAAABGgAFAAAAAQAAEfQBGwAFAAAAAQAAEfwBKAADAAAAAQACAAACAQAEAAAAAQAAEgQCAgAEAAAA%0AAQAADLoAAAAAAAAAYAAAAAEAAABgAAAAAf/Y/9sAQwAIBgYHBgUIBwcHCQkICgwUDQwLCwwZEhMP%0AFB0aHx4dGhwcICQuJyAiLCMcHCg3KSwwMTQ0NB8nOT04MjwuMzQy/9sAQwEJCQkMCwwYDQ0YMiEc%0AITIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIy/8AAEQgA%0A/wEAAwEhAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMC%0ABAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYn%0AKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeY%0AmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5%0A+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwAB%0AAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpD%0AREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ip%0AqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMR%0AAD8A9/ooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKACigA%0AooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKA%0ACigAooAKKACigAooAKKACigAooAKKACq01/bw8F9zei80AUpNYbpFEB7sc1WfULp8/vSAeyjFVYm%0A5CZ5W+9K5+rGo+vWmIASOhxUguJl6SyD6MaBk6aldIeXDD0YVai1joJYvqVP9KVguXYbuCfhJBu/%0Aung1PUlBRQAUUAFFABRQAUUAFFABRQAUUAFFABVO51GKDKr87+g6CgDKnvJ7j7z4X+6vAqvVEhRT%0AEFFABRQAUUAFW4NQngwN29fRqQzVtr6G54B2v/dNWakoKKACigAooAKKACigAooAKKACmSSJEhd2%0ACqO5oAxrvUZJ8pHlI/1NUqpEhRTEORGkYKilmPQAVfh0mRuZXCew5NJsaRcTTLZeqs3+83+FP+wW%0Av/PEfmaVx2GPpls3RWX/AHW/xqnNpMijMTh/Y8Gi4WKDo8bbXUqw7EU2qJCigA6HIrStNTKYScll%0A7P3H1pMaNZWDKGUgg9CKWpKCigAooAKKACigAooAKKAIp50t4y7njsPWsG5upLmTc5wB91ewpoTI%0AaKokKmtrZ7mXYvA7t6Uhm9b20dsm2MfUnqalqSgooAKKAIp7eO4TZIufQ9xVGTSE2/upGDf7XNNM%0AVjMkjeKQo4wwplUSFFAFqzvXtWwctGeq+n0rdR1kQOhBU9DUspDqKQwooAKKACigAooAKZLKsMbS%0AOcKKAOfubl7mXe3A/hX0qGqJCimIVVLMFUZJOAK6K1t1toAg69WPqaTKRNRUjCigAooAKKAM7VYA%0A0ImA+ZDg/SseqRLCimIKtWV4baTB5jb7w9PekM3lIZQynIPINLUlBRQAUUAFFABRQAVhahd/aJdq%0An92h49z600JlOiqJCigC9pUW+6LkcIM/j/nNbdSykFFIYUUAFFABRQBFcqHtZVPdTXN1SEwopkhR%0AQBpaZd7W+zuflP3T6H0rXqWUgopDCigAooAKKAKGp3PlQ+Up+d+vsKxapEsKKYgooA1tHHyzH1I/%0ArWnUvcpBRSGFFABRQAUUANf/AFbfQ1zFNCYUVRIUUAHQ5FdBZXP2m3DH744b60mNFmipKCigAooA%0AKQkAEk4A6mgDnLmY3Fw0h6E8ewqKqJCimIKKALunXQt5GVlJDkDI7VuVLKQUUhhRQAUUAFFADJTi%0AFz6Ka5mmhMKKokKKACrenT+TdAE/K/yn+lIZvUVJQUUAFFABVPU5vKtCoPzOdv4d6EDMKirICigA%0AooAVThgfQ11FSykFFIYUUAFFABRQBFcnFrKf9g/yrm6pCYUUyQooAKKAOjtZvPtkfuRg/WpqgsKK%0AACigArF1aXdcrGDwi/qf8imhMoUVRIUUAFFABXUDpUspC0UhhRQAUUAFFAFe/OLKU+2K56qRLCim%0AIKKACigDW0iT5ZIieh3CtOpZSCikMKKACucunMl1K2c/McU0JkNFUSFFABRQBd061S5dzIMqo6Zx%0Aya3OgxUspBRSGFFABRQAUUAIyK6lWUMp6g1h6jbpbzjyxhWGcelNCZToqiQooAKKALmmPtvVH94E%0AVu1LKQUUhhRQAjHCk+gzXL00JhRVEhRQAUUAaWjviWRPVQfy/wD11r1LKQUUhhRQAUUAFFABWNq7%0AZuUX0X+tNCZn0VRIUUAFFAEtqdt1Ef8AbH866SpZSCikMKKAIrk4tZj6If5VzdUhMKKZIUUAFFAF%0ArT5PLvY+cBvlP4//AF636llIKKQwooAKKACigArnr6TzbyRh0BwPwpoTK9FUSFFABRQA5Dh1Poa6%0AepZSCikMKKAIrkZtZh/sH+Vc3VITCimSFFABRQAoJUgg4IOQa3bK9F0pBUh1HPoaTGi3RUlBRQAU%0AUAFFAFK+vfsw8tVJkZcg9hWHVIlhRTEFFABRQAq8uo966ipZSCikMKKAEcbkZfUYrl6aEwoqiQoo%0AAKKACr+kvtuiv95aTGjaoqSgooAKKACigDA1CTzL2Q9lO0fh/wDXqrVEhRTEFFABRQBLbDddRD1c%0AfzrpKllIKKQwooAK5u4Ty7mRcYwxx9KaEyKiqJCigAooAKfDIYZkkH8JzQB0qMHRWU5BGRS1BYUU%0AAFFABUVxMILd5D2HH1oA5vqcmirICigAooAKKALempvvU44UEmt6pZSCikMKKACsTVY9l3vwcOM5%0A9/8AOKaEyjRVEhRQAUUAFFAG1pLs1qwJyFbAq/UstBRSAKKACsXVJXa58on5FAIFNCZQoqiQooAK%0AKACigDU0eP8A1kp/3R/X+latSykFFIYUUAFUdUh8y13gfMhz+HehAzEoqyAooAKKACigDa0kf6Ix%0A9XP8hV+pZaCikAUUAFYmqjF4PdBTQmUaKokKKACigAooA6Kzh8m1RSPmxk/Wp6gsKKACigApGUMp%0AVhkEYNAHNzxGCdoz/CfzFR1ZAUUAFFABRQB0Fgnl2UYI5Iz+dWagsKKACigArK1hOYpMeqk/5/Gm%0AhMy6KokKKACigAqzYQefdKCPlX5mpDOgoqSgooAKKACigDO1S23xiZR8yfe+lY9UiWFFMQUUAFTW%0A0BuJ1jHQ8k+goGdEAAMDoKWoKCigAooAKr3sH2i1ZAPmHK/WgDnqKsgKKACigAresLb7Pb/MPnfl%0Avb2pMaLdFSUFFABRQAUUABAIwRkGsC9tTbTcf6tuVP8ASmhMq0VRIUUAXLfTpp8EjYnq3+Fa1tax%0A2qYQZJ6sepqWykieikMKKACigAooAo3WnJOS6HZIevoayJoJYG2yKR6HsapMlojopiCigDQ02082%0ATznHyKePc1s1LKQUUhhRQAUUAFFABUU8CXERjccHofQ0Ac/PC9vKY3HI6H1FR1ZBat7Ga4wQNqf3%0Am/pWrb2ENvg43P8A3mqWyki1RSGFFABRQAUUAFFABTXRZFKuoZT2IoAzrjSVOWgbb/st0/Os2WGW%0AFtsiFfr3qkyWiOrFpatdS4HCD7zUAb6IsaBEGFAwBTqkoKKACigAooAKKACigCC5tkuotrcEfdb0%0AqK206GHDMPMf1PQfhTuKxcopDCigAooAKKACigAooAKKACkZVdSrKGB6gigDPm0mN2zExTnkHkVd%0AhhSCMRoMAfrTuKxJRSGFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQA%0AUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFA%0ABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUU%0AAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABR%0AQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQB//2f/hb35odHRwOi8vbnMuYWRvYmUuY29t%0AL3hhcC8xLjAvADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3pr%0AYzlkIj8+DQo8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJYTVAg%0AQ29yZSA0LjQuMC1FeGl2MiI+DQoJPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9y%0AZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4NCgkJPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJv%0AdXQ9IiIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczp4%0AbXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu%0AYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94%0AYXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j%0Ab20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1sbnM6aWxsdXN0cmF0b3I9Imh0dHA6%0ALy9ucy5hZG9iZS5jb20vaWxsdXN0cmF0b3IvMS4wLyIgeG1sbnM6eG1wVFBnPSJodHRwOi8vbnMu%0AYWRvYmUuY29tL3hhcC8xLjAvdC9wZy8iIHhtbG5zOnN0RGltPSJodHRwOi8vbnMuYWRvYmUuY29t%0AL3hhcC8xLjAvc1R5cGUvRGltZW5zaW9ucyMiIHhtbG5zOnhtcEc9Imh0dHA6Ly9ucy5hZG9iZS5j%0Ab20veGFwLzEuMC9nLyIgeG1sbnM6cGRmPSJodHRwOi8vbnMuYWRvYmUuY29tL3BkZi8xLjMvIiB4%0AbWxuczpwZGZ4PSJodHRwOi8vbnMuYWRvYmUuY29tL3BkZngvMS4zLyIgeG1sbnM6cGhvdG9zaG9w%0APSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiBkYzpmb3JtYXQ9ImltYWdlL2pw%0AZWciIHhtcDpNZXRhZGF0YURhdGU9IjIwMTctMTEtMzBUMjE6MzE6NTMrMDc6MDAiIHhtcDpNb2Rp%0AZnlEYXRlPSIyMDE3LTExLTMwVDIxOjMxOjUzKzA3OjAwIiB4bXA6Q3JlYXRlRGF0ZT0iMjAxNy0x%0AMS0zMFQyMToyODoyMyswNzowMCIgeG1wOkNyZWF0b3JUb29sPSJXaW5kb3dzIFBob3RvIEVkaXRv%0AciAxMC4wLjEwMDExLjE2Mzg0IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOmFkZmNkZDdlLTFl%0ANjQtZjE0Ny1iODk2LTYzOGQ4ZmRmMzc0ZSIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6%0AcGhvdG9zaG9wOjJmOTVlYmY1LWQ1ZGItMTFlNy04ZWFkLWIxYzRmMzVkZDgxNiIgeG1wTU06T3Jp%0AZ2luYWxEb2N1bWVudElEPSJ1dWlkOjVEMjA4OTI0OTNCRkRCMTE5MTRBODU5MEQzMTUwOEM4IiB4%0AbXBNTTpSZW5kaXRpb25DbGFzcz0icHJvb2Y6cGRmIiBpbGx1c3RyYXRvcjpTdGFydHVwUHJvZmls%0AZT0iUHJpbnQiIGlsbHVzdHJhdG9yOlR5cGU9IkRvY3VtZW50IiB4bXBUUGc6SGFzVmlzaWJsZU92%0AZXJwcmludD0iRmFsc2UiIHhtcFRQZzpIYXNWaXNpYmxlVHJhbnNwYXJlbmN5PSJGYWxzZSIgeG1w%0AVFBnOk5QYWdlcz0iMSIgcGRmOlByb2R1Y2VyPSJBZG9iZSBQREYgbGlicmFyeSAxNS4wMCIgcGRm%0AeDpDcmVhdG9yVmVyc2lvbj0iMjEuMC4wIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3No%0Ab3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiPg0KCQkJPGRjOnRpdGxlPg0KCQkJCTxy%0AZGY6QWx0Pg0KCQkJCQk8cmRmOmxpIHhtbDpsYW5nPSJ4LWRlZmF1bHQiPkRlZmF1bHQgYXZhdGFy%0AIHByb2ZpbGUgaWNvbi00PC9yZGY6bGk+DQoJCQkJPC9yZGY6QWx0Pg0KCQkJPC9kYzp0aXRsZT4N%0ACgkJCTxkYzpkZXNjcmlwdGlvbj4NCgkJCQk8cmRmOkFsdD4NCgkJCQkJPHJkZjpsaSB4bWw6bGFu%0AZz0ieC1kZWZhdWx0Ij5EZWZhdWx0IGF2YXRhciBwcm9maWxlIGljb24uIEdyZXkgcGhvdG8gcGxh%0AY2Vob2xkZXIsIGlsbHVzdHJhdGlvbnMgdmVjdG9yczwvcmRmOmxpPg0KCQkJCTwvcmRmOkFsdD4N%0ACgkJCTwvZGM6ZGVzY3JpcHRpb24+DQoJCQk8ZGM6Y3JlYXRvcj4NCgkJCQk8cmRmOlNlcT4NCgkJ%0ACQkJPHJkZjpsaT5WZWN0b3JTdG9jay5jb20vMTg5NDIzODE8L3JkZjpsaT4NCgkJCQk8L3JkZjpT%0AZXE+DQoJCQk8L2RjOmNyZWF0b3I+DQoJCQk8ZGM6c3ViamVjdD4NCgkJCQk8cmRmOkJhZz4NCgkJ%0ACQkJPHJkZjpsaT5hdmF0YXI8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5wbGFjZWhvbGRlcjwvcmRm%0AOmxpPg0KCQkJCQk8cmRmOmxpPnByb2ZpbGU8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5mZW1hbGU8%0AL3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5kZWZhdWx0PC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+aWNv%0AbjwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPndvbWFuPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+cGhv%0AdG88L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5pc29sYXRlZDwvcmRmOmxpPg0KCQkJCQk8cmRmOmxp%0APndoaXRlPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+dmVjdG9yPC9yZGY6bGk+DQoJCQkJCTxyZGY6%0AbGk+cGVyc29uPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+cGljdHVyZTwvcmRmOmxpPg0KCQkJCQk8%0AcmRmOmxpPmltYWdlPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+aWxsdXN0cmF0aW9uPC9yZGY6bGk+%0ADQoJCQkJCTxyZGY6bGk+c2lsaG91ZXR0ZTwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPmJhY2tncm91%0AbmQ8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5wZW9wbGU8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5m%0AYWNlPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+Z3JheTwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPmdp%0Acmw8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5idXNpbmVzczwvcmRmOmxpPg0KCQkJCQk8cmRmOmxp%0APm1hbGU8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5zeW1ib2w8L3JkZjpsaT4NCgkJCQkJPHJkZjps%0AaT5hbm9ueW1vdXM8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT51c2VyPC9yZGY6bGk+DQoJCQkJCTxy%0AZGY6bGk+bWFuPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+aHVtYW48L3JkZjpsaT4NCgkJCQkJPHJk%0AZjpsaT5oZWFkPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+b3V0bGluZTwvcmRmOmxpPg0KCQkJCQk8%0AcmRmOmxpPnBvcnRyYWl0PC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+YmxhY2s8L3JkZjpsaT4NCgkJ%0ACQkJPHJkZjpsaT5ncmFwaGljPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+dGVtcGxhdGU8L3JkZjps%0AaT4NCgkJCQkJPHJkZjpsaT5pbnRlcm5ldDwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPnNvY2lhbDwv%0AcmRmOmxpPg0KCQkJCQk8cmRmOmxpPm5ldHdvcms8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5tZWRp%0AYTwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPmdlbnRsZW1hbjwvcmRmOmxpPg0KCQkJCQk8cmRmOmxp%0APmZsYXQ8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5ndXk8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5k%0AZXNpZ248L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5kaXNwbGF5PC9yZGY6bGk+DQoJCQkJCTxyZGY6%0AbGk+ZmFjZWxlc3M8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5oYWlyPC9yZGY6bGk+DQoJCQkJCTxy%0AZGY6bGk+Ym95PC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+Y2hhcmFjdGVyPC9yZGY6bGk+DQoJCQkJ%0ACTxyZGY6bGk+cHJpdmF0ZTwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPm1pbmltYWw8L3JkZjpsaT4N%0ACgkJCQkJPHJkZjpsaT5vcHRpb25zPC9yZGY6bGk+DQoJCQkJPC9yZGY6QmFnPg0KCQkJPC9kYzpz%0AdWJqZWN0Pg0KCQkJPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6%0AZjg2NDk5MjQtNDAyZi1jNjQ2LThjNzctZWJkOTUwN2JjNDVjIiBzdFJlZjpkb2N1bWVudElEPSJ4%0AbXAuZGlkOmY4NjQ5OTI0LTQwMmYtYzY0Ni04Yzc3LWViZDk1MDdiYzQ1YyIgc3RSZWY6b3JpZ2lu%0AYWxEb2N1bWVudElEPSJ1dWlkOjVEMjA4OTI0OTNCRkRCMTE5MTRBODU5MEQzMTUwOEM4IiBzdFJl%0AZjpyZW5kaXRpb25DbGFzcz0icHJvb2Y6cGRmIi8+DQoJCQk8eG1wTU06SGlzdG9yeT4NCgkJCQk8%0AcmRmOlNlcT4NCgkJCQkJPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5j%0AZUlEPSJ4bXAuaWlkOjVlOWQ3YzAwLTFhNDAtNjk0ZS1hMzEwLTg1ZWM4MWUxMTYzYyIgc3RFdnQ6%0Ad2hlbj0iMjAxNy0wOC0yNlQxNDowNzoyMyswNzowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRv%0AYmUgSWxsdXN0cmF0b3IgQ0MgMjAxNyAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4NCgkJ%0ACQkJPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlk%0AOjhkOTJhNjI2LWQ1YTAtNmU0Ni05ODM1LWYwYjdkYmFlMjIwNSIgc3RFdnQ6d2hlbj0iMjAxNy0x%0AMS0zMFQyMToyODoyMSswNzowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgSWxsdXN0cmF0%0Ab3IgQ0MgMjAxNyAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4NCgkJCQkJPHJkZjpsaSBz%0AdEV2dDphY3Rpb249ImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlv%0Abi9wZGYgdG8gYXBwbGljYXRpb24vdm5kLmFkb2JlLnBob3Rvc2hvcCIvPg0KCQkJCQk8cmRmOmxp%0AIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6Zjg2NDk5MjQt%0ANDAyZi1jNjQ2LThjNzctZWJkOTUwN2JjNDVjIiBzdEV2dDp3aGVuPSIyMDE3LTExLTMwVDIxOjMx%0AOjUzKzA3OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNyAo%0AV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4NCgkJCQkJPHJkZjpsaSBzdEV2dDphY3Rpb249%0AImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlvbi9wZGYgdG8gaW1h%0AZ2UvanBlZyIvPg0KCQkJCQk8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iZGVyaXZlZCIgc3RFdnQ6cGFy%0AYW1ldGVycz0iY29udmVydGVkIGZyb20gYXBwbGljYXRpb24vdm5kLmFkb2JlLnBob3Rvc2hvcCB0%0AbyBpbWFnZS9qcGVnIi8+DQoJCQkJCTxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6%0AaW5zdGFuY2VJRD0ieG1wLmlpZDphZGZjZGQ3ZS0xZTY0LWYxNDctYjg5Ni02MzhkOGZkZjM3NGUi%0AIHN0RXZ0OndoZW49IjIwMTctMTEtMzBUMjE6MzE6NTMrMDc6MDAiIHN0RXZ0OnNvZnR3YXJlQWdl%0AbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE3IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIv%0APg0KCQkJCTwvcmRmOlNlcT4NCgkJCTwveG1wTU06SGlzdG9yeT4NCgkJCTx4bXBUUGc6TWF4UGFn%0AZVNpemUgc3REaW06dz0iNDAwLjAwMDAwMCIgc3REaW06aD0iNDAwLjAwMDAwMCIgc3REaW06dW5p%0AdD0iUGl4ZWxzIi8+DQoJCQk8eG1wVFBnOlBsYXRlTmFtZXM+DQoJCQkJPHJkZjpTZXE+DQoJCQkJ%0ACTxyZGY6bGk+Q3lhbjwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPk1hZ2VudGE8L3JkZjpsaT4NCgkJ%0ACQkJPHJkZjpsaT5ZZWxsb3c8L3JkZjpsaT4NCgkJCQk8L3JkZjpTZXE+DQoJCQk8L3htcFRQZzpQ%0AbGF0ZU5hbWVzPg0KCQkJPHhtcFRQZzpTd2F0Y2hHcm91cHM+DQoJCQkJPHJkZjpTZXE+DQoJCQkJ%0ACTxyZGY6bGk+DQoJCQkJCQk8cmRmOkRlc2NyaXB0aW9uIHhtcEc6Z3JvdXBOYW1lPSJEZWZhdWx0%0AIFN3YXRjaCBHcm91cCIgeG1wRzpncm91cFR5cGU9IjAiPg0KCQkJCQkJCTx4bXBHOkNvbG9yYW50%0Acz4NCgkJCQkJCQkJPHJkZjpTZXE+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0i%0AV2hpdGUiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIyNTUi%0AIHhtcEc6Z3JlZW49IjI1NSIgeG1wRzpibHVlPSIyNTUiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1w%0ARzpzd2F0Y2hOYW1lPSJCbGFjayIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIg%0AeG1wRzpyZWQ9IjM1IiB4bXBHOmdyZWVuPSIzMSIgeG1wRzpibHVlPSIzMiIvPg0KCQkJCQkJCQkJ%0APHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkNNWUsgUmVkIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0%0AeXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjM3IiB4bXBHOmdyZWVuPSIyOCIgeG1wRzpibHVlPSIz%0ANiIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkNNWUsgWWVsbG93IiB4bXBH%0AOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjU1IiB4bXBHOmdyZWVu%0APSIyNDIiIHhtcEc6Ymx1ZT0iMCIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9%0AIkNNWUsgR3JlZW4iIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVk%0APSIwIiB4bXBHOmdyZWVuPSIxNjYiIHhtcEc6Ymx1ZT0iODEiLz4NCgkJCQkJCQkJCTxyZGY6bGkg%0AeG1wRzpzd2F0Y2hOYW1lPSJDTVlLIEN5YW4iIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBS%0AT0NFU1MiIHhtcEc6cmVkPSIwIiB4bXBHOmdyZWVuPSIxNzQiIHhtcEc6Ymx1ZT0iMjM5Ii8+DQoJ%0ACQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQ01ZSyBCbHVlIiB4bXBHOm1vZGU9IlJH%0AQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iNDYiIHhtcEc6Z3JlZW49IjQ5IiB4bXBH%0AOmJsdWU9IjE0NiIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkNNWUsgTWFn%0AZW50YSIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjIzNiIg%0AeG1wRzpncmVlbj0iMCIgeG1wRzpibHVlPSIxNDAiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpz%0Ad2F0Y2hOYW1lPSJDPTE1IE09MTAwIFk9OTAgSz0xMCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlw%0AZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjE5MCIgeG1wRzpncmVlbj0iMzAiIHhtcEc6Ymx1ZT0iNDUi%0ALz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTAgTT05MCBZPTg1IEs9MCIg%0AeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjIzOSIgeG1wRzpn%0AcmVlbj0iNjUiIHhtcEc6Ymx1ZT0iNTQiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hO%0AYW1lPSJDPTAgTT04MCBZPTk1IEs9MCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VT%0AUyIgeG1wRzpyZWQ9IjI0MSIgeG1wRzpncmVlbj0iOTAiIHhtcEc6Ymx1ZT0iNDEiLz4NCgkJCQkJ%0ACQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTAgTT01MCBZPTEwMCBLPTAiIHhtcEc6bW9k%0AZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIyNDciIHhtcEc6Z3JlZW49IjE0%0AOCIgeG1wRzpibHVlPSIyOSIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9%0AMCBNPTM1IFk9ODUgSz0wIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBH%0AOnJlZD0iMjUxIiB4bXBHOmdyZWVuPSIxNzYiIHhtcEc6Ymx1ZT0iNjQiLz4NCgkJCQkJCQkJCTxy%0AZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTUgTT0wIFk9OTAgSz0wIiB4bXBHOm1vZGU9IlJHQiIg%0AeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjQ5IiB4bXBHOmdyZWVuPSIyMzciIHhtcEc6%0AYmx1ZT0iNTAiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTIwIE09MCBZ%0APTEwMCBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIy%0AMTUiIHhtcEc6Z3JlZW49IjIyMyIgeG1wRzpibHVlPSIzNSIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4%0AbXBHOnN3YXRjaE5hbWU9IkM9NTAgTT0wIFk9MTAwIEs9MCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6%0AdHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjE0MSIgeG1wRzpncmVlbj0iMTk4IiB4bXBHOmJsdWU9%0AIjYzIi8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz03NSBNPTAgWT0xMDAg%0ASz0wIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iNTciIHht%0AcEc6Z3JlZW49IjE4MSIgeG1wRzpibHVlPSI3NCIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3%0AYXRjaE5hbWU9IkM9ODUgTT0xMCBZPTEwMCBLPTEwIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBl%0APSJQUk9DRVNTIiB4bXBHOnJlZD0iMCIgeG1wRzpncmVlbj0iMTQ4IiB4bXBHOmJsdWU9IjY4Ii8+%0ADQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz05MCBNPTMwIFk9OTUgSz0zMCIg%0AeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjAiIHhtcEc6Z3Jl%0AZW49IjEwNCIgeG1wRzpibHVlPSI1NiIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5h%0AbWU9IkM9NzUgTT0wIFk9NzUgSz0wIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNT%0AIiB4bXBHOnJlZD0iNDMiIHhtcEc6Z3JlZW49IjE4MiIgeG1wRzpibHVlPSIxMTUiLz4NCgkJCQkJ%0ACQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTgwIE09MTAgWT00NSBLPTAiIHhtcEc6bW9k%0AZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIwIiB4bXBHOmdyZWVuPSIxNjci%0AIHhtcEc6Ymx1ZT0iMTU3Ii8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz03%0AMCBNPTE1IFk9MCBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6%0AcmVkPSIzOSIgeG1wRzpncmVlbj0iMTcwIiB4bXBHOmJsdWU9IjIyNSIvPg0KCQkJCQkJCQkJPHJk%0AZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9ODUgTT01MCBZPTAgSz0wIiB4bXBHOm1vZGU9IlJHQiIg%0AeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjciIHhtcEc6Z3JlZW49IjExNyIgeG1wRzpi%0AbHVlPSIxODgiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTEwMCBNPTk1%0AIFk9NSBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSI0%0AMyIgeG1wRzpncmVlbj0iNTciIHhtcEc6Ymx1ZT0iMTQ0Ii8+DQoJCQkJCQkJCQk8cmRmOmxpIHht%0AcEc6c3dhdGNoTmFtZT0iQz0xMDAgTT0xMDAgWT0yNSBLPTI1IiB4bXBHOm1vZGU9IlJHQiIgeG1w%0ARzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMzgiIHhtcEc6Z3JlZW49IjM0IiB4bXBHOmJsdWU9%0AIjk4Ii8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz03NSBNPTEwMCBZPTAg%0ASz0wIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMTAyIiB4%0AbXBHOmdyZWVuPSI0NSIgeG1wRzpibHVlPSIxNDUiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpz%0Ad2F0Y2hOYW1lPSJDPTUwIE09MTAwIFk9MCBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9%0AIlBST0NFU1MiIHhtcEc6cmVkPSIxNDYiIHhtcEc6Z3JlZW49IjM5IiB4bXBHOmJsdWU9IjE0MyIv%0APg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9MzUgTT0xMDAgWT0zNSBLPTEw%0AIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMTU4IiB4bXBH%0AOmdyZWVuPSIzMSIgeG1wRzpibHVlPSI5OSIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRj%0AaE5hbWU9IkM9MTAgTT0xMDAgWT01MCBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBS%0AT0NFU1MiIHhtcEc6cmVkPSIyMTgiIHhtcEc6Z3JlZW49IjI4IiB4bXBHOmJsdWU9IjkyIi8+DQoJ%0ACQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz0wIE09OTUgWT0yMCBLPTAiIHhtcEc6%0AbW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIyMzgiIHhtcEc6Z3JlZW49%0AIjQyIiB4bXBHOmJsdWU9IjEyMyIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9%0AIkM9MjUgTT0yNSBZPTQwIEs9MCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIg%0AeG1wRzpyZWQ9IjE5NCIgeG1wRzpncmVlbj0iMTgxIiB4bXBHOmJsdWU9IjE1NSIvPg0KCQkJCQkJ%0ACQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9NDAgTT00NSBZPTUwIEs9NSIgeG1wRzptb2Rl%0APSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjE1NSIgeG1wRzpncmVlbj0iMTMz%0AIiB4bXBHOmJsdWU9IjEyMSIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9%0ANTAgTT01MCBZPTYwIEs9MjUiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHht%0AcEc6cmVkPSIxMTQiIHhtcEc6Z3JlZW49IjEwMiIgeG1wRzpibHVlPSI4OCIvPg0KCQkJCQkJCQkJ%0APHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9NTUgTT02MCBZPTY1IEs9NDAiIHhtcEc6bW9kZT0i%0AUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSI4OSIgeG1wRzpncmVlbj0iNzQiIHht%0AcEc6Ymx1ZT0iNjYiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTI1IE09%0ANDAgWT02NSBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVk%0APSIxOTYiIHhtcEc6Z3JlZW49IjE1NCIgeG1wRzpibHVlPSIxMDgiLz4NCgkJCQkJCQkJCTxyZGY6%0AbGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTMwIE09NTAgWT03NSBLPTEwIiB4bXBHOm1vZGU9IlJHQiIg%0AeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMTY5IiB4bXBHOmdyZWVuPSIxMjQiIHhtcEc6%0AYmx1ZT0iODAiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTM1IE09NjAg%0AWT04MCBLPTI1IiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0i%0AMTM5IiB4bXBHOmdyZWVuPSI5NCIgeG1wRzpibHVlPSI2MCIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4%0AbXBHOnN3YXRjaE5hbWU9IkM9NDAgTT02NSBZPTkwIEs9MzUiIHhtcEc6bW9kZT0iUkdCIiB4bXBH%0AOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIxMTciIHhtcEc6Z3JlZW49Ijc2IiB4bXBHOmJsdWU9%0AIjQxIi8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz00MCBNPTcwIFk9MTAw%0AIEs9NTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSI5NiIg%0AeG1wRzpncmVlbj0iNTciIHhtcEc6Ymx1ZT0iMTkiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpz%0Ad2F0Y2hOYW1lPSJDPTUwIE09NzAgWT04MCBLPTcwIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBl%0APSJQUk9DRVNTIiB4bXBHOnJlZD0iNjAiIHhtcEc6Z3JlZW49IjM2IiB4bXBHOmJsdWU9IjIxIi8+%0ADQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iUj02IEc9ODAgQj0xMTAgMSIgeG1w%0ARzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjYiIHhtcEc6Z3JlZW49%0AIjgwIiB4bXBHOmJsdWU9IjExMCIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9%0AIlI9MTA3IEc9MTY0IEI9MTkyIDEiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1Mi%0AIHhtcEc6cmVkPSIxMDciIHhtcEc6Z3JlZW49IjE2NCIgeG1wRzpibHVlPSIxOTIiLz4NCgkJCQkJ%0ACQkJPC9yZGY6U2VxPg0KCQkJCQkJCTwveG1wRzpDb2xvcmFudHM+DQoJCQkJCQk8L3JkZjpEZXNj%0AcmlwdGlvbj4NCgkJCQkJPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+DQoJCQkJCQk8cmRmOkRlc2Ny%0AaXB0aW9uIHhtcEc6Z3JvdXBOYW1lPSJHcmF5cyIgeG1wRzpncm91cFR5cGU9IjEiPg0KCQkJCQkJ%0ACTx4bXBHOkNvbG9yYW50cz4NCgkJCQkJCQkJPHJkZjpTZXE+DQoJCQkJCQkJCQk8cmRmOmxpIHht%0AcEc6c3dhdGNoTmFtZT0iQz0wIE09MCBZPTAgSz0xMDAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5%0AcGU9IlBST0NFU1MiIHhtcEc6cmVkPSIzNSIgeG1wRzpncmVlbj0iMzEiIHhtcEc6Ymx1ZT0iMzIi%0ALz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTAgTT0wIFk9MCBLPTkwIiB4%0AbXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iNjUiIHhtcEc6Z3Jl%0AZW49IjY0IiB4bXBHOmJsdWU9IjY2Ii8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFt%0AZT0iQz0wIE09MCBZPTAgSz04MCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIg%0AeG1wRzpyZWQ9Ijg4IiB4bXBHOmdyZWVuPSI4OSIgeG1wRzpibHVlPSI5MSIvPg0KCQkJCQkJCQkJ%0APHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9MCBNPTAgWT0wIEs9NzAiIHhtcEc6bW9kZT0iUkdC%0AIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIxMDkiIHhtcEc6Z3JlZW49IjExMCIgeG1w%0ARzpibHVlPSIxMTMiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTAgTT0w%0AIFk9MCBLPTYwIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0i%0AMTI4IiB4bXBHOmdyZWVuPSIxMzAiIHhtcEc6Ymx1ZT0iMTMzIi8+DQoJCQkJCQkJCQk8cmRmOmxp%0AIHhtcEc6c3dhdGNoTmFtZT0iQz0wIE09MCBZPTAgSz01MCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6%0AdHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjE0NyIgeG1wRzpncmVlbj0iMTQ5IiB4bXBHOmJsdWU9%0AIjE1MiIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9MCBNPTAgWT0wIEs9%0ANDAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIxNjciIHht%0AcEc6Z3JlZW49IjE2OSIgeG1wRzpibHVlPSIxNzIiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpz%0Ad2F0Y2hOYW1lPSJDPTAgTT0wIFk9MCBLPTMwIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQ%0AUk9DRVNTIiB4bXBHOnJlZD0iMTg4IiB4bXBHOmdyZWVuPSIxOTAiIHhtcEc6Ymx1ZT0iMTkyIi8+%0ADQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz0wIE09MCBZPTAgSz0yMCIgeG1w%0ARzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjIwOSIgeG1wRzpncmVl%0Abj0iMjExIiB4bXBHOmJsdWU9IjIxMiIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5h%0AbWU9IkM9MCBNPTAgWT0wIEs9MTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1Mi%0AIHhtcEc6cmVkPSIyMzAiIHhtcEc6Z3JlZW49IjIzMSIgeG1wRzpibHVlPSIyMzIiLz4NCgkJCQkJ%0ACQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTAgTT0wIFk9MCBLPTUiIHhtcEc6bW9kZT0i%0AUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIyNDEiIHhtcEc6Z3JlZW49IjI0MiIg%0AeG1wRzpibHVlPSIyNDIiLz4NCgkJCQkJCQkJPC9yZGY6U2VxPg0KCQkJCQkJCTwveG1wRzpDb2xv%0AcmFudHM+DQoJCQkJCQk8L3JkZjpEZXNjcmlwdGlvbj4NCgkJCQkJPC9yZGY6bGk+DQoJCQkJCTxy%0AZGY6bGk+DQoJCQkJCQk8cmRmOkRlc2NyaXB0aW9uIHhtcEc6Z3JvdXBOYW1lPSJCcmlnaHRzIiB4%0AbXBHOmdyb3VwVHlwZT0iMSI+DQoJCQkJCQkJPHhtcEc6Q29sb3JhbnRzPg0KCQkJCQkJCQk8cmRm%0AOlNlcT4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTAgTT0xMDAgWT0xMDAg%0ASz0wIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjM3IiB4%0AbXBHOmdyZWVuPSIyOCIgeG1wRzpibHVlPSIzNiIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3%0AYXRjaE5hbWU9IkM9MCBNPTc1IFk9MTAwIEs9MCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0i%0AUFJPQ0VTUyIgeG1wRzpyZWQ9IjI0MiIgeG1wRzpncmVlbj0iMTAxIiB4bXBHOmJsdWU9IjM0Ii8+%0ADQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz0wIE09MTAgWT05NSBLPTAiIHht%0AcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIyNTUiIHhtcEc6Z3Jl%0AZW49IjIyMiIgeG1wRzpibHVlPSIyMyIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5h%0AbWU9IkM9ODUgTT0xMCBZPTEwMCBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NF%0AU1MiIHhtcEc6cmVkPSIwIiB4bXBHOmdyZWVuPSIxNjEiIHhtcEc6Ymx1ZT0iNzUiLz4NCgkJCQkJ%0ACQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTEwMCBNPTkwIFk9MCBLPTAiIHhtcEc6bW9k%0AZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIzMyIgeG1wRzpncmVlbj0iNjQi%0AIHhtcEc6Ymx1ZT0iMTU0Ii8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz02%0AMCBNPTkwIFk9MCBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6%0AcmVkPSIxMjciIHhtcEc6Z3JlZW49IjYzIiB4bXBHOmJsdWU9IjE1MiIvPg0KCQkJCQkJCQk8L3Jk%0AZjpTZXE+DQoJCQkJCQkJPC94bXBHOkNvbG9yYW50cz4NCgkJCQkJCTwvcmRmOkRlc2NyaXB0aW9u%0APg0KCQkJCQk8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT4NCgkJCQkJCTxyZGY6RGVzY3JpcHRpb24g%0AeG1wRzpncm91cE5hbWU9IkZsYXQgRGVzaWduIiB4bXBHOmdyb3VwVHlwZT0iMSI+DQoJCQkJCQkJ%0APHhtcEc6Q29sb3JhbnRzPg0KCQkJCQkJCQk8cmRmOlNlcT4NCgkJCQkJCQkJCTxyZGY6bGkgeG1w%0ARzpzd2F0Y2hOYW1lPSJSPTI1NSBHPTE4NCBCPTggMSIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlw%0AZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjI1NSIgeG1wRzpncmVlbj0iMTg0IiB4bXBHOmJsdWU9Ijgi%0ALz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJSPTIzMyBHPTkxIEI9OTAgMSIg%0AeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjIzMyIgeG1wRzpn%0AcmVlbj0iOTEiIHhtcEc6Ymx1ZT0iOTAiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hO%0AYW1lPSJSPTk2IEc9MTk3IEI9MjIxIDEiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NF%0AU1MiIHhtcEc6cmVkPSI5NiIgeG1wRzpncmVlbj0iMTk3IiB4bXBHOmJsdWU9IjIyMSIvPg0KCQkJ%0ACQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IlI9NDEgRz0xMzAgQj0yNTEgMSIgeG1wRzpt%0Ab2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjQxIiB4bXBHOmdyZWVuPSIx%0AMzAiIHhtcEc6Ymx1ZT0iMjUxIi8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0i%0AUj00MiBHPTIxMCBCPTI1MiAxIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4%0AbXBHOnJlZD0iNDIiIHhtcEc6Z3JlZW49IjIxMCIgeG1wRzpibHVlPSIyNTIiLz4NCgkJCQkJCQkJ%0ACTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJSPTI0NiBHPTE0MiBCPTEwMyAxIiB4bXBHOm1vZGU9%0AIlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjQ2IiB4bXBHOmdyZWVuPSIxNDIi%0AIHhtcEc6Ymx1ZT0iMTAzIi8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iUj0x%0AMTggRz0xNjYgQj0xODggMSIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1w%0ARzpyZWQ9IjExOCIgeG1wRzpncmVlbj0iMTY2IiB4bXBHOmJsdWU9IjE4OCIvPg0KCQkJCQkJCQkJ%0APHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IlI9MjI5IEc9MTQ4IEI9MTYyIDEiIHhtcEc6bW9kZT0i%0AUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIyMjkiIHhtcEc6Z3JlZW49IjE0OCIg%0AeG1wRzpibHVlPSIxNjIiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJSPTE1%0AOCBHPTE5MSBCPTE3MiAxIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBH%0AOnJlZD0iMTU4IiB4bXBHOmdyZWVuPSIxOTEiIHhtcEc6Ymx1ZT0iMTcyIi8+DQoJCQkJCQkJCQk8%0AcmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iUj0yMjkgRz0xNzYgQj0xMzcgMSIgeG1wRzptb2RlPSJS%0AR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjIyOSIgeG1wRzpncmVlbj0iMTc2IiB4%0AbXBHOmJsdWU9IjEzNyIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IlI9MTk0%0AIEc9MTc0IEI9MTc4IDEiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6%0AcmVkPSIxOTQiIHhtcEc6Z3JlZW49IjE3NCIgeG1wRzpibHVlPSIxNzgiLz4NCgkJCQkJCQkJCTxy%0AZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJSPTIxMCBHPTIwMCBCPTExMyAxIiB4bXBHOm1vZGU9IlJH%0AQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjEwIiB4bXBHOmdyZWVuPSIyMDAiIHht%0AcEc6Ymx1ZT0iMTEzIi8+DQoJCQkJCQkJCTwvcmRmOlNlcT4NCgkJCQkJCQk8L3htcEc6Q29sb3Jh%0AbnRzPg0KCQkJCQkJPC9yZGY6RGVzY3JpcHRpb24+DQoJCQkJCTwvcmRmOmxpPg0KCQkJCTwvcmRm%0AOlNlcT4NCgkJCTwveG1wVFBnOlN3YXRjaEdyb3Vwcz4NCgkJPC9yZGY6RGVzY3JpcHRpb24+DQoJ%0APC9yZGY6UkRGPg0KPC94OnhtcG1ldGE+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAK%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAog%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0ACiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAK%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAog%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0ACiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAK%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICA8P3hwYWNrZXQgZW5kPSd3Jz8+/+0TSFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAALCHAFaAAMb%0AJUccAgAAAgAAHAJ4AEpEZWZhdWx0IGF2YXRhciBwcm9maWxlIGljb24uIEdyZXkgcGhvdG8gcGxh%0AY2Vob2xkZXIsIGlsbHVzdHJhdGlvbnMgdmVjdG9ycxwCUAAHRWt3aXNpdBwCBQAdRGVmYXVsdCBh%0AdmF0YXIgcHJvZmlsZSBpY29uLTQcAhkABmF2YXRhchwCGQALcGxhY2Vob2xkZXIcAhkAB3Byb2Zp%0AbGUcAhkABmZlbWFsZRwCGQAHZGVmYXVsdBwCGQAEaWNvbhwCGQAFd29tYW4cAhkABXBob3RvHAIZ%0AAAhpc29sYXRlZBwCGQAFd2hpdGUcAhkABnZlY3RvchwCGQAGcGVyc29uHAIZAAdwaWN0dXJlHAIZ%0AAAVpbWFnZRwCGQAMaWxsdXN0cmF0aW9uHAIZAApzaWxob3VldHRlHAIZAApiYWNrZ3JvdW5kHAIZ%0AAAZwZW9wbGUcAhkABGZhY2UcAhkABGdyYXkcAhkABGdpcmwcAhkACGJ1c2luZXNzHAIZAARtYWxl%0AHAIZAAZzeW1ib2wcAhkACWFub255bW91cxwCGQAEdXNlchwCGQADbWFuHAIZAAVodW1hbhwCGQAE%0AaGVhZBwCGQAHb3V0bGluZRwCGQAIcG9ydHJhaXQcAhkABWJsYWNrHAIZAAdncmFwaGljHAIZAAh0%0AZW1wbGF0ZRwCGQAIaW50ZXJuZXQcAhkABnNvY2lhbBwCGQAHbmV0d29yaxwCGQAFbWVkaWEcAhkA%0ACWdlbnRsZW1hbhwCGQAEZmxhdBwCGQADZ3V5HAIZAAZkZXNpZ24cAhkAB2Rpc3BsYXkcAhkACGZh%0AY2VsZXNzHAIZAARoYWlyHAIZAANib3kcAhkACWNoYXJhY3RlchwCGQAHcHJpdmF0ZRwCGQAHbWlu%0AaW1hbBwCGQAHb3B0aW9uczhCSU0EJQAAAAAAEH2dXHztHOOwh78Ge5dL1co4QklNBDoAAAAAAOUA%0AAAAQAAAAAQAAAAAAC3ByaW50T3V0cHV0AAAABQAAAABQc3RTYm9vbAEAAAAASW50ZWVudW0AAAAA%0ASW50ZQAAAABDbHJtAAAAD3ByaW50U2l4dGVlbkJpdGJvb2wAAAAAC3ByaW50ZXJOYW1lVEVYVAAA%0AAAEAAAAAAA9wcmludFByb29mU2V0dXBPYmpjAAAADABQAHIAbwBvAGYAIABTAGUAdAB1AHAAAAAA%0AAApwcm9vZlNldHVwAAAAAQAAAABCbHRuZW51bQAAAAxidWlsdGluUHJvb2YAAAAJcHJvb2ZDTVlL%0AADhCSU0EOwAAAAACLQAAABAAAAABAAAAAAAScHJpbnRPdXRwdXRPcHRpb25zAAAAFwAAAABDcHRu%0AYm9vbAAAAAAAQ2xicmJvb2wAAAAAAFJnc01ib29sAAAAAABDcm5DYm9vbAAAAAAAQ250Q2Jvb2wA%0AAAAAAExibHNib29sAAAAAABOZ3R2Ym9vbAAAAAAARW1sRGJvb2wAAAAAAEludHJib29sAAAAAABC%0AY2tnT2JqYwAAAAEAAAAAAABSR0JDAAAAAwAAAABSZCAgZG91YkBv4AAAAAAAAAAAAEdybiBkb3Vi%0AQG/gAAAAAAAAAAAAQmwgIGRvdWJAb+AAAAAAAAAAAABCcmRUVW50RiNSbHQAAAAAAAAAAAAAAABC%0AbGQgVW50RiNSbHQAAAAAAAAAAAAAAABSc2x0VW50RiNQeGxAcsAAAAAAAAAAAAp2ZWN0b3JEYXRh%0AYm9vbAEAAAAAUGdQc2VudW0AAAAAUGdQcwAAAABQZ1BDAAAAAExlZnRVbnRGI1JsdAAAAAAAAAAA%0AAAAAAFRvcCBVbnRGI1JsdAAAAAAAAAAAAAAAAFNjbCBVbnRGI1ByY0BZAAAAAAAAAAAAEGNyb3BX%0AaGVuUHJpbnRpbmdib29sAAAAAA5jcm9wUmVjdEJvdHRvbWxvbmcAAAAAAAAADGNyb3BSZWN0TGVm%0AdGxvbmcAAAAAAAAADWNyb3BSZWN0UmlnaHRsb25nAAAAAAAAAAtjcm9wUmVjdFRvcGxvbmcAAAAA%0AADhCSU0D7QAAAAAAEAEsAAAAAQACASwAAAABAAI4QklNBCYAAAAAAA4AAAAAAAAAAAAAP4AAADhC%0ASU0EDQAAAAAABAAAAFo4QklNBBkAAAAAAAQAAAAeOEJJTQPzAAAAAAAJAAAAAAAAAAABADhCSU0n%0AEAAAAAAACgABAAAAAAAAAAI4QklNA/UAAAAAAEgAL2ZmAAEAbGZmAAYAAAAAAAEAL2ZmAAEAoZma%0AAAYAAAAAAAEAMgAAAAEAWgAAAAYAAAAAAAEANQAAAAEALQAAAAYAAAAAAAE4QklNA/gAAAAAAHAA%0AAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAAAAA%0A/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAOEJJ%0ATQQAAAAAAAACAAA4QklNBAIAAAAAAAIAADhCSU0EMAAAAAAAAQEAOEJJTQQtAAAAAAAGAAEAAAAC%0AOEJJTQQIAAAAAAAQAAAAAQAAAkAAAAJAAAAAADhCSU0EHgAAAAAABAAAAAA4QklNBBoAAAAAA28A%0AAAAGAAAAAAAAAAAAABdwAAAXcAAAAB0ARABlAGYAYQB1AGwAdAAgAGEAdgBhAHQAYQByACAAcABy%0AAG8AZgBpAGwAZQAgAGkAYwBvAG4ALQA0AAAAAQAAAAAAAAAAAAAAAAAAAAAAAAABAAAAAAAAAAAA%0AABdwAAAXcAAAAAAAAAAAAAAAAAAAAAABAAAAAAAAAAAAAAAAAAAAAAAAABAAAAABAAAAAAAAbnVs%0AbAAAAAIAAAAGYm91bmRzT2JqYwAAAAEAAAAAAABSY3QxAAAABAAAAABUb3AgbG9uZwAAAAAAAAAA%0ATGVmdGxvbmcAAAAAAAAAAEJ0b21sb25nAAAXcAAAAABSZ2h0bG9uZwAAF3AAAAAGc2xpY2VzVmxM%0AcwAAAAFPYmpjAAAAAQAAAAAABXNsaWNlAAAAEgAAAAdzbGljZUlEbG9uZwAAAAAAAAAHZ3JvdXBJ%0ARGxvbmcAAAAAAAAABm9yaWdpbmVudW0AAAAMRVNsaWNlT3JpZ2luAAAADWF1dG9HZW5lcmF0ZWQA%0AAAAAVHlwZWVudW0AAAAKRVNsaWNlVHlwZQAAAABJbWcgAAAABmJvdW5kc09iamMAAAABAAAAAAAA%0AUmN0MQAAAAQAAAAAVG9wIGxvbmcAAAAAAAAAAExlZnRsb25nAAAAAAAAAABCdG9tbG9uZwAAF3AA%0AAAAAUmdodGxvbmcAABdwAAAAA3VybFRFWFQAAAABAAAAAAAAbnVsbFRFWFQAAAABAAAAAAAATXNn%0AZVRFWFQAAAABAAAAAAAGYWx0VGFnVEVYVAAAAAEAAAAAAA5jZWxsVGV4dElzSFRNTGJvb2wBAAAA%0ACGNlbGxUZXh0VEVYVAAAAAEAAAAAAAlob3J6QWxpZ25lbnVtAAAAD0VTbGljZUhvcnpBbGlnbgAA%0AAAdkZWZhdWx0AAAACXZlcnRBbGlnbmVudW0AAAAPRVNsaWNlVmVydEFsaWduAAAAB2RlZmF1bHQA%0AAAALYmdDb2xvclR5cGVlbnVtAAAAEUVTbGljZUJHQ29sb3JUeXBlAAAAAE5vbmUAAAAJdG9wT3V0%0Ac2V0bG9uZwAAAAAAAAAKbGVmdE91dHNldGxvbmcAAAAAAAAADGJvdHRvbU91dHNldGxvbmcAAAAA%0AAAAAC3JpZ2h0T3V0c2V0bG9uZwAAAAAAOEJJTQQoAAAAAAAMAAAAAj/wAAAAAAAAOEJJTQQUAAAA%0AAAAEAAAAAjhCSU0EDAAAAAAHOgAAAAEAAACgAAAAoAAAAeAAASwAAAAHHgAYAAH/2P/tAAxBZG9i%0AZV9DTQAB/+4ADkFkb2JlAGSAAAAAAf/bAIQADAgICAkIDAkJDBELCgsRFQ8MDA8VGBMTFRMTGBEM%0ADAwMDAwRDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAENCwsNDg0QDg4QFA4ODhQUDg4ODhQR%0ADAwMDAwREQwMDAwMDBEMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwM/8AAEQgAoACgAwEiAAIR%0AAQMRAf/dAAQACv/EAT8AAAEFAQEBAQEBAAAAAAAAAAMAAQIEBQYHCAkKCwEAAQUBAQEBAQEAAAAA%0AAAAAAQACAwQFBgcICQoLEAABBAEDAgQCBQcGCAUDDDMBAAIRAwQhEjEFQVFhEyJxgTIGFJGhsUIj%0AJBVSwWIzNHKC0UMHJZJT8OHxY3M1FqKygyZEk1RkRcKjdDYX0lXiZfKzhMPTdePzRieUpIW0lcTU%0A5PSltcXV5fVWZnaGlqa2xtbm9jdHV2d3h5ent8fX5/cRAAICAQIEBAMEBQYHBwYFNQEAAhEDITES%0ABEFRYXEiEwUygZEUobFCI8FS0fAzJGLhcoKSQ1MVY3M08SUGFqKygwcmNcLSRJNUoxdkRVU2dGXi%0A8rOEw9N14/NGlKSFtJXE1OT0pbXF1eX1VmZ2hpamtsbW5vYnN0dXZ3eHl6e3x//aAAwDAQACEQMR%0AAD8A9VSSSSUpJJJJSkkkklKSSSSUpJJQN1Q5e0fEhJTNJQF1J4e0/AhTSUpJJJJSkkkklKSSSSUp%0AJJJJT//Q9VSSSSUpJJJJSklC21lTC95gflPgFm5GXZfI+jX+6O/9dKlNy7Ppr0Z+kd5cf5yqWZuQ%0A/h2weDf/ACRVdO1rnuDWAuceAEaRanEuMvJcfEmfypoHgrtfTSdbXx/Jb/5Io4wMX9wn+07+9K1U%0A5cDwTtJaZaS0+IMfkWi/p1B+iXMPkZH/AEpVS/DupG76bP3h2/rNStVKrzchn528eDv7wrdOfS/R%0A/wCjd58f5yzUkqVbuJLJx8qyjQe6v9w/99WnVay5m9hkdx3B8ChSbZpJJJKUkkkkp//R9VSSSSUp%0AQttZUwvedB958gprKy8j17ND+jZo3z8XpBTC659z97/7LewCGkknLVwCSABJOgHmVq42O2hkcvP0%0A3eJVHAYHZIJ/MBd8/o/xWogUhSSSSCVJJJJKQ5OO25h0HqAe138FkrcWNcIusHg935UQgsFOq19L%0A97PmOxHgVBJFDs1WsuYHs4PI7g+BU1k4t/oWSfoO0f8A+S/srWTSuUkkkkp//9L1VJJJJTWz7vTp%0A2j6Vmg+H5yzFYzbN+Q4dmDaPyuVdEIKkkkkUJ8O4VXSQSHw3TxJ0WqsVmj2/1m/lW0gUhSSSSCVJ%0AJJJKUsa/+fs/ru/KtlYrzNjz4ud+UohBYpJJIoUtLp9u+rYfpV6fI/RWaj4dmzIb4P8Aafnx/wBJ%0AApDqpJJIJf/T9VSSULjFTz4NJ/BJTjlxcS88uJJ+eqZIcBJOWqSSSSUnw6mW37X/AEQC6OJghaqy%0AcN23JYTwZb94/wDJLWQKQpJJJBKkkkklKWZnU11WN2CA8EkeYWmszqD92Rt/caB8z7kQgtZJJJFC%0AkpLfcOW6j5apJJKdsEESOCnQ8czRWfFjfyIiauf/1PVVC4TU8eLSPwU0klOGOAknLS0lp5aSD8tE%0AyctUkkkkpfUajQjUFauJa66kPdG6SDHkVkq7060Bzqj+d7m/HhyBSG+kkkglSSSSSkWTaaqXWNgu%0AERPEkwslxLnFzjJcZJ8yrnUbQS2kdvc7/vqpIhBUkkkihSSSUE+0cnQfPRJTsY4iiseDG/kREwAA%0AgcBOmrn/1fVUkkklOVm17Mh3g/3D8hQFpZ9O+nePpV6/L85ZqIQVJJJIoUi439Iq/rfwQlZwGbsg%0AO7MBPzPtCSnTSSSTVykkkklONeIvs/ru/KoI+azZkv8AB0OHz0/76gJy1SSSSSlI+HXvyG+Dfcfl%0Ax/0kBaPT6tlRsPNmo/qj6KBSG2kkkgl//9b1VJJJJSlk5WP6FkD+bdqz/wAj/ZWsoW1MuYWPGh4P%0AcHxCQU4ySMcTIFpqDZP73DY/elWqensb7rTvd+7+b/5kjaKadVFtx/RtkfvHQfetLGxxQyJlztXO%0ARQABA0ATpWmlJJJIKUkkkkpBlYwvaIO17font/VKzbKrKnbbG7T2PY/By2UzmteNrgHA8g6o2inE%0ASV+3pzTrS7b/ACXaj/O+kqoxbzYKthDj3PEfvbkUUvjUG+3afoN1efL93+0tXhQppZTWGN+Z7k+J%0ARE0rlJJJJKf/1/VUkkklKSSSSUpJJJJSkkkklKSSSSUpJJJJSkkkklKSSSSUpJJJJSkkkklP/9D1%0AVJJJJSkkkklKSSSSUpJJJJSkkkklKSSSSUpJJJJSkkkklKSSSSUpJJJJT//ZOEJJTQQhAAAAAABd%0AAAAAAQEAAAAPAEEAZABvAGIAZQAgAFAAaABvAHQAbwBzAGgAbwBwAAAAFwBBAGQAbwBiAGUAIABQ%0AAGgAbwB0AG8AcwBoAG8AcAAgAEMAQwAgADIAMAAxADcAAAABADhCSU0EBgAAAAAABwAIAAAAAQEA%0A/9sAQwADAgIDAgIDAwMDBAMDBAUIBQUEBAUKBwcGCAwKDAwLCgsLDQ4SEA0OEQ4LCxAWEBETFBUV%0AFQwPFxgWFBgSFBUU/9sAQwEDBAQFBAUJBQUJFA0LDRQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQU%0AFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQU/8AAEQgD4wPlAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEB%0AAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQci%0AcRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpj%0AZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfI%0AycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgME%0ABQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkj%0AM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2%0Ad3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ%0A2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A/VOiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiikyKAFopCw9agkv7eH79xEn+84FA%0AFiis2TxFpkf3763B/wCugNQN4u0dG5v4z7DJ/lTsxXRs0VhN410dT/x95+kbf4Uz/hOdH/5+XP8A%0A2yb/AAoswujoKK5//hOtI/5+H/79N/hS/wDCcaOf+Xph9Ym/woswujforEHjLR2H/H6q/VGH9Klj%0A8UaTIONQg/4E2P50WYXRrUVSj1mxm+5eW7fSUVZjmSTlXVh/skGkMkopMijNAC0UUUAFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFA%0ABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUmapX2tWOmj/SLqKI+hbn8qAL1Fcje/ESzhyLaGW4P95s%0AItYV5481O4yI/Kth/sKWP5n/AAquVk8yPSWI21n3XiDT7L/XXkKn+6G3H8hXll1qV5e/8fFzLN/v%0APkfl/wDWqsBjpxVcpPMejXXxA02PIiWacjptTaP1/wAKy7j4jyn/AFFki+8jlv0ArjaKrlRPMzoZ%0A/HWry52yRQj0jQH+ZNZ83iLVLg/Pfz/RW2j9BWdRTshXZJJcSznMk0kh/wBpyf61HtGemTRRTEHH%0ApRRRQAUUUUAFFFFABRRRQAbQe2aUfL93K/7ppKKALUOq3tvxFeXCD/ZkP+NX4PF+rwYAvWkH/TRV%0Ab+lY1FKyHdnU2/xC1CPAlgt5vcAqf0JrSt/iNA5Ans5Y/UxuG/wrhKKXKh8zPULbxppNzj/SvJb0%0AlUr/APW/Wte3u4bobopY5V9Y2DV4xSozRNuRmRvVTg0uUrmPbM0teTWnirVbLG27aRf7suH/AM/n%0AW5Z/EaVcC6tFcf3oWIP5H/Gp5WPmR3tFYFj400u8wDceQ5/hnG39elbccyTKGRldT3UgioKJKKTN%0ALQMKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiii%0AgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAK%0AKKKACiimO4VSSQAOSTwKAH0hrndU8cafp5KRubuQcYh6D6t0/KuT1PxpqV/lY3FpF/dh+8f+BH+l%0AUotkuSR6DqGsWemLm5uI4j/dY8n8BXM6h8RIlytlbNIf78xwPwAyTXDMxdi7HczdWJyTSVfKQ5M1%0Ar/xRqmoZD3LRof4IflH6c1k98nk+veiirICiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKmtb24sX3W08kDd/LJH6dDUNFAHUWPj6/t8C5SO6T1+%0A636cfnXS6f4202+wrSG1kP8ADPwPzGRXmVFS4opSaPa45FkAZSGU9CCCDT68csdVvNLbNrcPEOu0%0AHKn6iup034iFcLf2/wD20g/qpqHFlqSO6oqjp2sWmqIGtrhJfVQcEfUdRV3NQWLRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRTJJEjjLuwVV5LMcAUAPqKaeO3jZ5HVE%0AXksxwBXLax4+t7XMViv2qT/npzsH+P4Vxeo6td6tJuupml9FHCj6AdPxqlFslySOy1bx/bW+UskN%0A0/TzGyqD/GuQ1LXL7Vm/0m4Zk7RLwg/Af1qhRWiikZtthRRRVEhRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQA%0A6OR4nDxu0bjoynBFdHpfju8stq3Q+2R9NxID/n3rmqKVk9xptHrGk+IrHV8CCb953ifhh+B6/hWr%0AXia5VgwJBHcda6PR/HF7YbUuf9MhHqRvA+vf8ahx7FqXc9KorM0nXrLWVzbzAuOTG3DD8DWlmszQ%0AWiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAK%0AKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoo%0AooAKKKKACiiigAooooAKKKKACiiigAooooAKKKSgBaRulU9T1a20m3MtzKIx2HUt9BXA6740u9U3%0ARW2bS1Pp99h7noPoPzppXE3Y6rW/GFnpO6ND9puRx5cZyFPue30rg9W1691p/wDSJSI85EKcIP6/%0AnWd06dPzorVRSMnJsKKKKokKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigBUdopA6%0AMyOvIZTgius0Xx7NblYtQUzx9p1Hzj6jv+FclRSauNNo9ksb6DUYRNbyrNGf4lOfz9PpVqvGbHUL%0AnS7gTWszRSd8cg/UV3mg+OLfUGWG8C21weNw+4/0Pb6H86zcbGilc6qikBzzS1BYUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRSVXvL2HT7dpp5FiiXqzGgCw3SuV8QeNobDfb2eLi4+6W6on+JrA8QeMp9U3QWu63tPXo%0A7/X0rm8dP/11oo9zNy7E15ez6hcGe5kaWU8bif5DoB7CoaKK0MwooooAKKKKACiiigAooooAKKKK%0AACiiigAooooAKKKKACitTTPDWo6tgw25SL/nrL8i/hnn8q6jT/h3bx4a9uGnbusQ2L+J5J/Sp5ki%0AuVs4PPatGz8P6lfYMNlIVPRmBUfrXp1jotjpwH2a2jiP95Rk/nV6p5iuXuedWvw/1CbBllgg9slj%0A+n+NaUPw4iH+tvZG9RGgX+ea7Sip5mVyo5iP4f6WmMmeQ990mP5VYXwTo68G1Le7St/jW/RSux2R%0AhjwZo/8Az5D/AL+N/jTH8EaO3/LqR9JG/wAa36KLsLI5iX4f6W33fPj/AN2TP8wapz/DeA8w3sqe%0Azorf4V2dFHMwsjzu4+Ht/GP3M8M49Gyp/wAP1rIuvDOqWefMspSB/FH84/8AHa9bpMCq5mTyo8TY%0AFWKkEEdQRjH4Gkr2O7021vl23NvHP7uoz+dc9qHw/srjm2eS1Pp99fyPP5VXMTynntFbuoeDNT0/%0AJWIXMY/ihOT+IOD+VYZBVipBVh1UjGKsgSiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA%0AKKKKACg9KKKAN/QfF91o5WKXdc2o42E5Zfof6GvQtL1S21a3E1tIHXoR3U+hHY149Vix1C4024E9%0AtKYpB6Hgj0IqHG5alY9mornPD3i+31jbDNi3vP7hPyt/un+ldFWexpuLRRRSGFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUh6UGua8TeLo%0AtJ3W9vtmvPT+FPr7+1PcDQ1zxFbaHDulO6Vh8kI+8ff2FebatrV1rVx5tw/yj7kan5U+n+NVLi4l%0AvJ3mmdpJWPzM38v/AK1R1qo2MXK4UUUVRIUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFH1q5%0Apuk3WrTiK2j3erHhV+prv9D8G2ml7ZJALq57uw+VfoP8mk5WKSucho/g+/1ba7IbWA8+ZKME/Qdf%0AzrtdJ8I2Gl4byvPmH/LSXk/gOg/CtsU6snJs0UUhop1FFSUFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFFFACVQ1LQ7LVl/0m3WRugccMPoa0KKAPPtW+H88OXsJfPQf8s5CA359/wBK5WaCW2lMU0bR%0ASL1Vxgj869qqlqej2urQ+XcwrIMcN0ZfoatS7kOPY8foro9d8F3Wl7prctdWw/77Ue46H6j8q5z7%0A39O1aXuZ7BRRRTEFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAvPUdeorsfDfjho9ttq%0ALbl6Lcdx/ve3vXG0Umk9xp2Pao5FkVWUhlIyGB4I9RUleXeHPFU2iMIpMzWZPKd091/wr0ixvYdQ%0At0ngkWSNhww/r6GsWrGqdyzRRRSKCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAK%0AKKKACiiigAooooAKKKKACkbpQzbVJ6Vwfivxk0xeysHIQfLJMvf2Ht700ribsWfFXjH7OzWdg4M3%0ASSYHIT2X3/lXC5LEsSWJOST1PuT3NHTA/wDr0VslYxbuFFFFMQUUUUAFFFFABRRRQAUUUUAFFFFA%0ABRRRQAUUUUAFb/hvwnPrTCabdBZ5+9/E/wBPb3q74V8IG+23l8u236xxEY3+59v5130aCMBVAUAY%0AAHQewrOUuxpGPVkVjYwadbrDbxrFGvQD+Z9TVmiiszQKKKKACiiigAooooAKKKKACiiigAooooAK%0AKKKACiiigAooooAKKKKACiiigBK5HxN4LS83XViqx3BOXj6B/f2NdfRTTsJq55Wvg7WGUN9jIHoZ%0AFz/Oq1x4f1O1yZbKYD1Vcj9DXrm0UbarmZPKjxLodvQjqOhH50V6/qGjWWpqRc20cp7MRgj8RXI6%0Ax8P3hDS6c5kHXyZDz+B/xqlIlxOOop0kbwyNHIpSRThlYYIPpim1ZAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFaOia7c6Hcb4jviY/vITwrD1HoazqKW4Hr+k6tb6xarPbvuXup+8p9DV+vHdL%0A1a50e7E9u5DfxJn5WHoa9P0PXINcthLCcOOHjPVT/h71lKNjaMrmnRRRUlBRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUjHapJOAKG+6c1wXi/xYZ2axsnxGDiWVf4vZ%0AT6epppXE3Yb4t8XG6Z7GxfbCDiSZf4vYe3vXI9uOnbvR246du9FbJWMW7hRRRTEFFFFABRRRQAUU%0AUUAFFFFABRRRQAUUUUAFFFH16UAHp3rq/B/hX+0GS9vF/wBHU/u0b/lofU+wqh4V8PNrl55koItI%0Aj85/vH0FenxoI1VFUKqjAA7VnKXRGkY9RygLwKWiiszQKKKKACiiigAooooAKKKKACiiigAooooA%0AKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigApDS0UAYPiTwzDrcJdcR3aj5ZAMZ9jXmc9%0AvJaTPDMhSVDhlI6f59a9pboa5LxxoAvbY30K/wCkQj5x/fUf1HX6VcZdCJLqef0UfSitTIKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACrWnalPpV2txbttkHVSflYehqrRQB61oOuQa5aiaI7ZBx%0AJG33lP8Ah6GtSvG9O1KfSbtbi3bbIOqk/Kw9DXqWh6zBrlqJ4Thhw8bfeU/4ehrGSsbRlc0qKKKk%0AoKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigApG+6aDXLeMPEw0uM2lu2buQctn/V%0Aqf6+lPcRT8ZeKvL36fZv8/SaVT90f3R71w/AwPw60cnkkknrnqfc+9FbJWMW7hRRRTEFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFFFABVnTtPl1S9jtoh87nqeijufyqtXo3gfQ/wCzrH7VKuLi4GcH%0Aqqdh/U/hSbsikrs3NN0+HS7WK3hXaka49z6n8auUUVgbBRRRQAUUUUAFFFFABRRRQAUUUUAFFFFA%0ABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU1huUjrkYp1IaAPJvEuk/2%0APq0sSjELnzIv909vw5FZdeiePNM+1aUt0o/eW7ZPurHkfnivO8hsY9M5raLujGSswoooqiQooooA%0AKKKKACiiigAooooAKKKKACiiigAooooAKu6Pq0+jXguITns8fZ19KpUf54oA9h0rU4NWtI7iBso3%0Abup7g+9Xa8k8P67Jod5vGXgbiSMdx6j/AGq9Us7qK8gSaFw8cg3KQaxkrG0XcnoooqSgooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigApKKq6lqEOl2clxMcIg6Dqx7AfjQBn+JvECaHZ5+9cScRp7+p%0A9q8vmmkuJnllbfI5yzHuasapqk2sXsl1MfmbhV/uL6f571UrZKxjJ3CiiiqJCiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAo9qKKANbwvpP8AbGrRo4zDH+8k91Hb8a9WX5eMYFc74H0v+z9JWVxi%0AW5/eH2X+Ef1/GukrGTubRVkFFFFSUFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQBDd263dvJC/3JFKn6EV41NC1tNJC/DxsU%0Ab6g17U33TXl3jK1+y+ILnAwsoWUfiOf1zWkOxnPuYdFFFaGYUUUUAFFFFABRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABXQ+EfEZ0i4FvOSbSQ/wDftvX6Vz1H8qW472PbEYMoIOQehHQ06uJ8D+JNwGm3%0AL5ZR+5kbuP7p/wA9K7WsWrGydxaKKKQwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKRulACOwVSxOABkk9%0ABXmHizxAdavdkRxaQnCf7Tdz/ntW9468QG3j/s63fEjDMrDqq/3fqa4TAHTp25/StIrqZyfQKKKK%0A0MwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACrek6edU1K3tQMiR8H6Dk/oDVT+ddd8%0AO7HzLy6uiOIl8tfqef5AUm7Ia1Z3sarGoVeABgU+iisDcKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAQ9K4T4j2u2e%0AyuMdVaMn6EEfzNd5XK/EKHzNFSTH+rmU/gQR/WqjuTLY87opaStjEKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAVWaNlZSVZTkEdQe2K9Q8K+IF1uzAcgXUQxIvr/tCvLquaTqkuj3%0A0dzEeV++ueGX0qWrlRdj2Kiq1jeRahaxXELBo5Bkf59as1ibBRRRQAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAhr%0AM1/WE0XT5J2G6T7saf3mPStJm2qSeAOTXlninXDrepMUbNtDlIwO/q34/wBBVRV2TJ2MmaaS5mea%0AV98kh3FvX/63+FMoorYxCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACvS/Alr9%0An0GNyPmmdpPw6D9AK80b7p+lew6Pb/ZNNtIcY2RKD9cD/wCvUT2LjuXaKKKyNQooooAKKKKACiii%0AgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigArD8aRiXw3eeqqrfkwrcrL8TJ5mg34/6Ysf0prcT2PJv8/1pKO9FbmAUUUUAFFFFABRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUf5+vtRRQB0/gfXv7PuxYztmCY/K3ZXPT8DXoq14nXp/%0Ag/Xf7Y08JI2bmH5Xz1Ydm/H+hrOS6mkX0N+iiiszQKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigApG6UtV767jsbWWeVgkca%0A7ixoA5vx3rZs7MWUL4nuB8xHVU/+vXnv06VZ1LUJNUvprqXIaRs7T/COw/Cq1bpWRg3dhRRRTEFF%0AFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAPhj82aNP7zBfzNe0rXjulru1OzH/TZ%0AP/QhXsQ61nM1gOooorMsKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACii%0AigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKo64N2j3o/6YP/6CavVR1v8A5A97/wBcH/8A%0AQTTW4Hj46D/PrRQv3R/ntRW5zhRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRR%0ARQAelX9E1R9F1GK5X7g+WRezKaoUUAe0wTJPHHIjb0ddyt6g1LXE/D/Wt8badK3KZeHd3Hcfh/Wu%0A1rBqzsbp3VxaKKKQwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooARvumuF+IGsbmTTYm4GJJsf+Or/AF/Kuw1S/TTLGa5k+5Gu7Hqe%0Aw/E8V5BcXD3lxJPKd0sjFmPrn/I/IVcVrciT0sR0UUVqZBRRRQAUUUUAFFFFABRRRQAUUUUAFFFF%0AABRRRQAUUUUAFFFFABRRRQBZ01tupWh/6bJ/6EK9kFeKI/lyK/8AdIb8q9pjYMoYdCM/nWczSI+i%0AiiszQKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKz9eONFv/8Arg//AKCa0KzfEjbdBvz/ANMH/lTW4Hkfaij0orc5%0AwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAJrS7lsbqK4hOJI23D%0A39q9d02+i1K0huYTmORdw/w/Dkfga8c+vTvXYfD3WPLmk0+Q8P8AvIvqPvD8Rz+BqJLS5cWd9RRR%0AWRqFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRR%0AQAUUUUAFIelLVe+uksbSW4kOEjUufw7UAcV8QtW8yaLT0bhR5kmPU/dH5ZNcdUt1dPfXUtzLzJKx%0AY59/T6cD8BUVbpWRg3dhRRRTEFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFAB14PSvWPDepxalpNsySK7pGqyKDyrAYOa8nqW2uprKYS28rwyD+KNscVLVyoux7RS155oXi7U7%0ArU7W2lkjkSSQKxZADj6ivQVrJqxqncdRRRSGFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRR%0ARQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAVkeLG2+HdQP8A0yIrXrE8ZNs8%0AN3p/2V/9CFNbiex5ZRR04orcwCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACii%0AigAooooAWn29xJZ3Ec8RKyRsGXHqKjo/zzQB7Hpt8mpWcNzEf3ci7h7eo/PP5Vbrhfh7qv8ArtPc%0An/nrHn8mH9fxNd1WDVnY3TugooopDCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKK%0AACiiigAooooAKKKKACiiigAooooAQ9K434hap5dvDYofmlPmSf7o6D8Tz/wGuxY7VJJwBzmvItd1%0AH+1tWuLnqhbbH/uDgfn1/GritSJPQoUUUVqZBRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFFFABRRRQAUUUUAFFFFAGl4abb4g08/9NgK9aHavIdDfy9asD/03T/0IV6+tZyNY7C0UUVmW%0AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU%0AUUUAFFFFABRRRQAlc947fb4dmH950H/jwroq5b4hybdEjX+9Oo/RjTW4nsed0lLSVuYBRRRQAUUU%0AUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAFnTr59NvoLlBlo2B2/wB4%0Adx+IyPxr2C3mS4iSWM7kdQyt6g/5FeLV6L4B1L7VpbWrn95bNgf7h6fkcj8KiS6lxfQ6miiisjUK%0AKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiikPQ+l%0AAGF4w1H+zdDlCnEk2IU/Hr+ma8vA4x3FdT8QNQ+0apHbKflgTLf7zf8A1sVy1bR2MZbhRRRVEhRR%0ARQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAFjT226han/psn/o%0AQr2UV4tbnbcwn/pov8xXtIrOZrAWiiisywooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAEPQ1x3xHk/0OyT+9Kx/IY/rXZVwv%0AxIf95p6ezt/6DVR3JlscXRRRWxiFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUALWz4P1D+ztcg3NiOb9y349P1xWLSgkEEdRyKBnta/r0p1Z+h341PS7W5/idBu%0A/wB7of1rQrnNwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKjmkWGNpHOEUFifYU+uf8AG999j0GVFOHnIhH48n9M0xHnF5dNfXk1y33pmL/mf/1flUNH%0AGAR0xxRW5gFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFF%0AFFACqcOp9x/Ova1O4Z9ea8TbgE17VbtugjP+yP5VnM0iSUUUVmaBRRRQAUUUUAFFFFABRRRQAUUU%0AUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAJXn3xGk3al%0AaJ6Qk/m3/wBavQq818fyb9eC/wByFR+ZJ/rVx3Jlsc3RRRWpiFFFFABRRRQAUUUUAFFFFABRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFH6iiigDufh1fbobqzY8oRKv0PB/UD867WvKPCl%0A/wDYNetXJwsh8ph7N0/XFerCsZbm0dhaKKKkoKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAQ1598Q77zb+2tQciFN5+rf/AFh+tegt0NeQ69ef2hrV5ODlTIVX%0A6L8o/QVcdyJbFCiiitTIKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACii%0AigAooooAKKKKAEb7p+leyaW27T7VvWFD/wCOivHK9e0Bt+i2J/6YJ/Ks5mkTQooorM0CiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooASvLvGj+Z4kuv8AZCr+Sj/GvUT0ryXxNJ5niC/P/TXH5DH9KuO5E9jMooorUyCiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigBclSCvDA5Few6XeDU%0ALC3uR0ljDfpz/n2rx39a9F+H14J9HaAnLW8hX8DyP5molsXE6miiisjUKKKKACiiigAooooAKKKK%0AACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoopKAKes3g0/S7q4Jx5cbEfXHH6149z35PevR%0AvH115Oh+UDzNIq/gOf6V51WsdjKW4lFFFWQFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFLToIJLqZIYUMkrnCqvWgBtereE5PM8O2B/6ZAflkf0rj7T4f6hc%0AKDPLFbD0++fy6flXcaLpx0nT4LUyeb5YI34xnJJ9fes5O+hpFF+iiiszQKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigBG+6a%0A8f1xt2tX5/6bv/6Ea9grCuPBulXUksjwN5kjb2YSMOf8mqi7EyVzy+iuv1rwC9rG81hIZVXkxP8A%0Ae/AjrXI8qcEYPcHtWqdzJqwlFFFMQUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQ%0AAUUUUAFFFFABRRRQAV1Xw9vPJ1Se3J4mjyB7rz/I1ytaPh26NnrllLnCiQKfoeP60nsNbnrtFNWn%0AVgbhRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFIehz0paQ9KAOC%0A+I9xuu7O3/uI0h/E4/pXH1ueNLj7R4iuQDkRhUH4AZ/UmsOto7GEtwoooqhBRRRQAUUUUAFFFFAB%0ARRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABXa/DzTFPn37LyD5Uft3Y/wAh+FcV%0AXqfg+3Fv4esxjDOpkP8AwIk1EnoXHc26KKKyNQooooAKKKKACiiigAooooAKKKKACiiigAooooAK%0AKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAQ15/4+0ZbW4jv%0A4hhZjtk/3vX8f6V6A3Sub8fJu8Puf7siH9aqO5Mtjzaijv8AjRWxiFFFFABRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFGSvI6jkfhRR2NAHs1lcC6tYJh/y0QP+YBq%0AxWH4NuPP8PWmTlkDRn8Ccfpityuc3QUUUUDCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigApD0pagvZvs9pNL/AM842b8hmgDyLVJ/tWp3k39+Z2H03f8A6qq0A7lB9s0Vuc4U%0AUUUwCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACvXPDhDa%0AFYEdPIT+VeR+/pzXqfg2TzPDdlzyqlD+DEVE9i47m3RRRWRqFFFFABRRRQAUUUUAFFFFABRRRQAU%0AUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFACVz%0A3jr/AJFyf/eT/wBCFdDXN+P32+H3H96RB+tNbiex5vSUd/xorcwCiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACj69O9FFAHoHw5uN2m3EJ6xzbvwKj+oNddXA/%0ADmfbeXsP96NX/In/ABrvqxlubR2CiiipKCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA%0AKKKKACiiigArK8UzeR4fvm/6ZFfz4/rWpXP+OpfL8OzD+86L+oP9Ka3E9jzL0oo9qK3MAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAWvRPh5P5miPHnm%0AOZh+BAP9a86rs/hvcfvb+A9SFkH5kH+lTLYuO53dFFFYmoUUUUAFFFFABRRRQAUUUUAFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFcj8R%0AZsaXbR/35s/kp/xrrTXCfEa43T2MI/hVn/MgD+Rqo7ky2ONooorYxCiiigAooooAKKKKACiiigAo%0AoooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACj3oooA6LwHN5XiBU/56RMv6A/0r0yvKPCc%0AvleIrA/3nK/mpFere9ZS3NY7C0UUVBYUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRR%0ARQAUUUUAFcn8RH26PEv96cf+gmusrjPiQ221sU9ZGP5AD+tOO5MtjhaSiitzEKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACt/wAD3X2fxBECcLKrJ/7N%0A/SsCrGnXRsdQtrj/AJ5yKx+mef0pPYa3PZaWmqRxinVgbhRRRQAUUUUAFFFFABRRRQAUUUUAFFFF%0AABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAh6cV5%0Ah44uvtHiCVQcrEixj8sn9TXpzsFUsTgDk143fXJvb64uDz5kjN+ZyKuO5E9ivRRRWpkFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAF3RX8vWLB/8Apsn8%0AxXsC/wBa8XtX8u6hf+7Ip/IivaB3rOZrEWiiisywooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAK4j4ktxp6+7n+VdvXCfEg/vtPH+y5/VaqO5MtjjKKKK2MQooooAKKKKACii%0AigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKP5UUUAet+G7v7dotnMT%0A8xjCt9Rwf1Fadch8ObvzLC4tieYpNw+hH+INdfWD3N1sFFFFIYUUUUAFFFFABRRRQAUUUUAFFFFA%0ABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABSN0NLSUAZHi%0Aq+FhoV2+cMy+WB7tx/I15T/Ou1+It/lrSzU+szj9B/WuKrWK0MpbhRRRVkBRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAqnDqfcfzr2tDuUH1rxM9K9qh%0AOYkPqo/lWczSJJRRRWZoFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABXC%0AfEn/AI+LD/df+a13dcJ8SB++08/7Lj9Vqo7ky2OMooorYxCiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigApaSigDe8F6gNP1xEc4inHlH2PUH88V6eK8TD%0AFSGUlWHII6j3r1XwzrSa1p6PwJk+SVB2bHX8f89KykuppF9DYoooqDQKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAprttUn%0A05pTXMeONcGn2JtImH2m4GP91O5/Hp+NNasTdjide1D+1NXubnOUZtqf7o4H+fes+kGBx09KWtzA%0AKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAb%0A7pr2q3/1Ef8AuivFT0xXtUPESD0UfyrOZpEkooorM0CiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAriPiSvGnt7uP5V29cZ8SFza2L+kjD8wD/SqjuTLY4SiiitjEKKKKACii%0AigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAq5peq3Gj3%0AYuLZ9rdGUn5WHuKp0UAeg2fxCsZIh9oimgl6EKu5fwNdNZ3SXlrFPHzHKodeMcHmvGK9Y8Kyeb4e%0AsD/0yA/LI/pWUlY1jJs1qKKKgsKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKgvbyKwtZLid/LiQZZvTtU1cx4/uTDoflg8zSqv4Dn+Ypr%0AcT2K+pfEK2jjZbKN5pD91nG1R7+9cNdXU19cPPO7SSuckn+nt7VHSVskkYtthRRRTEFFFFABRRRQ%0AAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAqjLqPcfzr2t%0ABtUD0rxi1TzLqFP70ij9RXtA71nM0iLRRRWZoFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABXJ/ERN2jxN/dnH/oJrq65/wAdReZ4dmP910b9QP601uJ7HmdJR70VuYBRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABX%0ApvgWbzPD0A/55s6f+PZ/rXmdd78OJ92n3UB/5Zyg/mo/wqJbFx3OwooorI1CiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAErgviNdbrqztx%0A/AjSH8TgfyNd7XlPiu8+2eILtgflRvKH/AeD+uauO5MtjIooorUxCiiigAooooAKKKKACiiigAoo%0AooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKALuix+ZrFgn/TZP5ivYF/%0ArXlPhOPzfEVgP7rlvyUmvVvaspbmsdhaKKKgsKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACsrxTD5/h++X/pkW/Ln+latQXsP2i0mi/56Rsv5jFMDxj0ooA2qPpiitznCiii%0AgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACuq+Ht15WqzwE482LOPcH/A1ytaHh+8+w61ZzE7VEgV/oeD/ADpPYa3PXqKaufrTqwNwooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiikoAr6hd%0ALY2U9w5wsSM5/AV42zNI7M/LsST9Tyf1r0Xx9ffZtHEAOHuHC/gOT/IV5z29ulax7mUn0CiiirIC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKP%0AaiigDovAcPm+IFf/AJ5xM36Af1r0yuB+HMG68vZv7sap+ZP+Fd9WMtzaOwUUUVJQUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFIaWkPSgDxzVLf7Lqd3D/zzlZR9Mn/61Va3%0APGlv9n8RXJAwJArj8QM/qDWHW62MHuFFFFMQUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABR7fhRRQB67oGof2ppNrck5Zk+b/eHB/WtGuF+HepY%0ANxYuf+msf8mH8q7qsGrM3TugooopDCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKK%0AACiiigAooooAKKKKACiiigApG6UtVdSvE0+xmuZOVjUtj19qAPPfHWofbNbMSnKW67P+Bfxf0/Ku%0Adp80z3EryyHdJIxZj6k9T+f8qZW62MHqFFFFMQUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABR9eneijsaAPQPhzBt024mPWSbb+AUf1Jrrqw/Bt%0Av9n8PWmRhnDSH8ScfpitysHubrYKKKKQwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKQ9DnpS0lAHBfEe323dncf30aM/gc/1rj69G8fWvnaH5oHMMit+B4/rXnVbR2MZbiU%0AUUVRIUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFF%0AFFABRRRQBa0y/bS9Qguk5MbZK+o6EfiM16/bzJcQxyxtvjcblb1B714t/Ou7+H+sCa2fT5G+eL5o%0A8/3e4/A/zqJLqXFnZ0UUVkahRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQ%0AAUUUUAFFFFABRRRQAVxfxC1TZDBYoeZD5kn+6Og/E5P/AAGuwmkSGNpJGCooJZj0A9a8h1jUm1bU%0Ap7psgSN8in+FRwB/n1NXFakSehTooorUyCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA%0AKKKKACiiigAooooAKKKKACiiigAooooAKKKKACjBbgdTwPxorR8O2pvNcsosZUyBj9Bz/SgZ6rZW%0A4tbWCEf8s0CfkAKsU1adXObhRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQ%0AAUUUUAFFFFAFLWbMahpd1bkZ8yNgPrjj9a8e578GvbW6GvIdes/7P1q8gAwokLL9G5H6GtImcu5Q%0AooorQzCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACrFhfSabeRXMR+eNsj39R+I4/Gq9L6Z6d6APY9PvY9RtYrmE5jkXcP6j8P8atVw3w5%0AvJGF1ascxqFkA9CetdzWDVnY3TugooopDCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA%0AKKKKACiiigAooooAKRvumiuJ8c+IJ4ZBp0GYwyB5JM4JB7D8qaV2JuyKnjLxQLzNjZsDCp/eyL0Y%0A+g9vf1rkx0x2oAAHHTtRWy0MW7hRRRTEFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU%0AUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAH8q6r4e2fnapPcEcQx4B924/kK5X9K9F+H1mINHa%0AcjDXEhb8BwP5GplsVHc6miiisTYKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAK%0AKKKACiiigAooooAQ1598Q7Hyr+2ugMCZNh+q/wD1j+leg1z/AI3sftmgyuoy8BEo/Dg/pmqjuTLY%0A8yoo4AGOmOKK2MQooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACii%0AigAooooAKKKKACiiigAooooA634c/wDISvP+uI/mK9Brz74cL/xML0/9MlH/AI8a9BrGW5rHYKKK%0AKksKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArzX4gLt19T6wL/%0AADNelV538RF/4nFu396D/wBmNXHcmWxytFFFamIUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUA%0AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUALgsQF5YnAr2HS7MafYW9sP8AllGF%0A/Tn/AD715p4UsPt+vWqEZWM+ax9l6frivVhWcjSPcWiiiszQKKKKACiiigAooooAKKKKACiiigAo%0AoooAKKKKACiiigAooooAKKKKACiiigAooooAKjmjWaNo3GUYFSPY1JSHofSgDxi8tWsbya2b70LF%0APyP/AOr86hrqfiBp/wBn1SO5UfLOmG/3l/8ArYrlq3TujB6OwUUUUxBRRRQAUUUUAFFFFABRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAHY/Ddcz37/AOyg/U13%0AtcX8OI8W9/J6uq/kM/1rtKxlubR2CiiipKCiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAK4H4kR4vLF/70bD8iP8a72uK+JEf7mwf0d1/MA/0qo7ky2OHooorYxCiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0Aj9BRSgFiAOp4FAHcfDuw2w3V4w5ciJfoOT+pH5V2tZ+h2A0zS7W2/iRBu/3up/WtCsG7s3WiCiii%0AkMKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAMHxhp%0A39paHKVGZIcTL+HX9M15eDxnua9sYBlIIyDxivItd07+ydWuLb+ANuj/ANw8j8un4VpF9DOS6lCi%0AiitDMKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooo9vwoA9E+Hce3RpX/vzk/kAP6V1VYfgyHyfDtnkYLhpD+LEj9MVuVg9zdbBRRRSGFFFFAB%0ARRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAlcr8Q492jRP/wA85gfzBFdU%0Aaw/GkPneHbr1Taw/BhTW4nseX0lL/L/GkrcwCiiigAooooAKKKKACiiigAooooAKKKKACiiigAoo%0AooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAFrZ8H6f/AGjrkG5cxw/vm/Dp+uKxf0r0XwDp%0Av2XS2unH7y5bI/3B0/M5P41MnoVFXZ06/r1p1FFYmwUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFACHpXG/ELS/Mt4b5Bloj5cn+6eh/A8f8AAq7O%0Aq99apfWktvIMpKpQ/j3pp2E1dHjNFS3Vq9jdS20vEkTFTnvj0+vB/EVFW5gFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUcngdTxRV3RbX7brFl%0AAeQ0qlvoDk/oKAPV9Ng+y2FtDj/Vxqv5DFWqaOvSnVznQFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFU9Yt/tWl3cOM74mH6VcpG6UAeJL054OBn60VY1C2+x%0A6hdQEf6uVl/DPH6YqvXQc4UUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFFFFABRRR/nmgCzp1i+pX0FsnDSMBu/ujufwGT+FewW8KW8SRRjaiKFVfQD/I%0Arivh7pX+u1CQH/nlHn82P9PwNd1WUnrY1itAoooqCwooooAKKKKACiiigAooooAKKKKACiiigAoo%0AooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACkPSlooA4L4haT5c0WoIvDDy5Meo+6fyyK46%0AvY9UsE1OxmtpOEkXbn0PY/gea8guLd7O4kglG2WNirL6Y/yPzFaxeljKS1uR0UUVZAUUUUAFFFFA%0ABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFdP8AD+z8/WJJyOIY%0A859zwP0DVzNei/D+x+z6O1wRh7h93/ARwP5H86mWxUdzqKKKKxNgooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigApG6UtIaAPMvHFr9n8QSOBhZkWQfXof5Vz9d5%0A8RrLfZ2t0BzE5Rvo3/1xXB1tF3RjLRhRRRVEhRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFFFABRRRQAUUUUAFFFFABRRRQAtPt7eS8uI4IgTJIwVcepqP69O9dj8PdH8yaTUJBxH+7i+p%0A+8fwHH4mk3ZDSudlptimm2cNtEP3ca7R7+p/PP51boorA3CiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigBG+6a4X4gaPtaPUol4OI5%0Asf8Ajrf0/Ku7qvfWkd9aywSqHjkXaVNNOzE1dHjNFWdS0+TS76a1lyWjbG4/xDsfxqtW5gFFFFAB%0ARRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFLSUcd+lAElvbveXEV%0AvGMySMEH4mvY7O2SztooI+EjUKPw71wvw/0o3F7LfSLmOEbEPqxH9Bn/AL6r0CspPWxrFaXFoooq%0ACwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAoa3p4%0A1TS7m2xkyIcfUcj9QK8gww4YYYcH69/5V7aa8w8Z6X/Z2sO6riK4/er9ejD8Dj860i+hnJdTBooo%0ArQzCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigCazt%0AJb+6it4RmSRgo9vf8Ov4V67ptjHptnDbRDEcS7R7+/48n8TXKfD/AEXZG2oyry+Uh3dh3P4/0rta%0Ayk9bGsV1FoooqCwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACii%0AigAooooAKKKKACiiigAooooAKRuhpaKAOT8d6IbyzF7CmZ7cfMB1ZP8A61ee+46V7Yy7lIPIPBry%0AzxToZ0TUmCLi2my8Z9PVfw/wrSL6Gcl1MaiiitDMKKKKACiiigAooooAKKKKACiiigAooooAKKKK%0AACiiigAooooAKKKKACiiigBafb28l3cRwRKXkkbaFFR9OenfNd/4J8OGxj+3XK4uHGI0IxsU9z7n%0A9B9aTdhpXOh0fTU0nT4bVOdi/M395u5/Gr1FFYG4UUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABWL4q0f+2dLdUGZ4vni+vcfiOPxrapD0oA8S5H%0ABGCDgj09aK67xt4cMEzajbJmNz++Qdm/vD2/rXI+/at07mDVmFFFFMQUUUUAFFFFABRRRQAUUUUA%0AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAB6Vf0TS31rUYrZeEPzSN2Ve9UK9P8H6F/Y+nh5F%0AxczfM+eqjsv4f1NTJ2Kirm1BCkEccaLsRF2qvoBUtFFYmwUUUUAFFFFABRRRQAUUUUAFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAlZuv6Omtaf%0AJAx2yfejf+6w6Vp0jdKAPFZoZLaZ4ZU2SRnaV9P/AK3+NMru/HXh8zx/2jbpmRRiVV6sv976iuE3%0AA9Onbj9a3TujBqwUUUUxBRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFKMkhQMk9hQ%0AAlKu5mCqCWY4AXqa6DSfBN9qG1px9jh/6aDLkfQf1rttH8M2Oi4aCPdN086Tlv8A634YqXJFqLZg%0AeF/BZjZLvUE+Ycx2/Ye7e/t/Wu0FLS1k3c0SsFFFFIYUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU%0AUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAySNZFKsAysMEEZBrgvEXgeW3ka405%0AfMiPJh/iT6eo9q9ApDTTsJq54mylSVIKlTgqe1JXquteGbLWlJkTy5scTIMN+PrXA614XvtFyzr5%0A8HQTR8j8fT8fzrVSTMnFoyKKAQRmiqJCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACj9Pf096Wrek6ZLrF9HbRDlvvvjhV9aANvwPoP9oXYvp1xBCflXszjp+Ar0VagsbOLT7WK3hX%0AbHGNo/z61ZrBu5ulZBRRRSGFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFA%0ABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFADXUMpUjIIwQehrzDxZ4fOi3u+IZt%0AJjlP9lu4/wA9q9QqrqWnw6pZyW8wyjjqOqnsR+NUnYlq545RVvVNLm0e9ktZh8y8q399fX/Peqlb%0AGIUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFL3AAyT2rd0nwbfaph5F+yW5/ikX5mHsv+Ndx%0Ao/hmx0fDRRb5uhml5f8A+t+FS5JFKLZxekeCb7UNrzj7HD1+cZcj6f4122k+G7HR8GCPdL0MsnLH%0A/D8K1aWsm2zRJISloopFBRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABTWUFSCMj3p1FAHKa54Ftr4tLaEWs55K4+Rv%0A8K4fUdLutJm8q6haM9mx8rfQ9Pyr2OoLq1ivIWinjWWNuNrjIqlIlxR4xRXaax4A25k05+P+eEh/%0Akf8AH864+4t5bWZop42hkXqjjBrVNMyaaI6KKKYgooooAKKKKACiiigAooooAKKKKACiiigAooo/%0AlQAqq0jKqgszHAA6k9sV6h4V8ProlmC4BupRmRvT/ZFY3gfw3tA1K5TDMP3Mbdh/eP8AnpXa1lJ9%0ADWK6i0UUVBYUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU%0AUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABSUtFAGJ4m8Pprlnj7txHzG/v6H2ry+aGS3%0AmeKVdkiHDKexr2o1y3jDwyNUjN3bri7jHK4++B/X0q4y6MiUbnndFHI4III656j2PvRWpkFFFFAB%0ARRRQAUUUUAFFFFABRWnpPh2+1ogwxbYc8zSZCj6ev4V2+j+CrLTNskv+lXA/ikGFH0A/rmpckilF%0As43R/Ct9rBV1TyID/wAtZRwfoO9dzo/hOw0nDhPPn7yyjkfQdB+H51tinVm5NmiikIKWiipKCiii%0AgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooAKKKKACiiigBDVPUdJtdWh8u5hWVe2eCPoau0UAee6x4BuLfMl%0AhJ9oj/55vgOPoe/6VyskbwyNHIjRyLwVZcH8jXtdUtS0e01aPbcwLJjo3Rh9DVqXchx7Hj9Fdbq3%0Aw/uLfL2En2hOvlyYDj6Hv+Qrlp7eW1lMc0bxyDqsi4P5GtE0zNpojooopiCiiigAooooAKKKKACi%0Aij/PFABXQ+EfDh1i4FxMD9jjb0++3p9Ko+H9Dk1y82DKW68ySDsPQf7VeqWdrFZwJDCgSOMbVAFR%0AJ2Lir6kqKFUADAHQDoKdRRWRqFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABSN900tFAH%0AE+MvCvmb9Qs0+frNEv8AEP7w964cYPP417a33TmuC8X+EzAzX1kmYycyxL/D7qPT1FaRl0ZnKPU4%0A+ijPHHTt2orQzCiiigAoq1p+l3WqTeXawtKR1IwFX6k12ej+AYIMSX7faJOvlKTsH4nk0m7DSbOP%0A03RbzV5NttCzLnBkbhR9Wrt9G8CWtjtkuyLub+7jCL+Hf8fyrpYYUhjVI0CIvAVRgD8KlrJybNVG%0Aw1VCKFUYA4AHSnUUVJQUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFF%0AABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUA%0AFFFFACVUvtNttSi8u5hWZR03dR9D2q5RQBwuqfD1hmTT5uOvkzf0Yf1rkryxuNPm8q5gaF/RxjP0%0A7flXs1Q3VnDexmKeJJUP8Mi5FWpEOJ4xRXc6t8PkbL6fL5TdfKlyy/g3UfjXH32m3WmSeVdQNC3Y%0AsMhvoen5VommZtNFaiiimIKKKKACruj6TPrV4LeEY7vJ2RfWmadps+rXa29um6Q9WI+VR6mvUtD0%0AaDQ7UQQjLHl5G+8x/wAPQVMnYqMbkulaZBpNpHbwLhF792Pcn3q7RRWJsFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFIw3KQRkGlooA8/8W+ETas97YpmEnMkI/h9x7e1cjn5%0Acjp+XFe2Mu5SD0rk9Q8AwXWpCaKUwQOcyRKMnOf4T2rRS7mbj2OFs7O41CYQ20LTSeiDgD3NdnpH%0Aw9jTbJqL+Y3/ADxjJ2j6nvXU6bpttpcIhtYliQdcdT7k9z9auUnIaj3Ibe3itY1jhjWKNeAiDA/S%0ApqKKgsKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKhuLWK6hMU0ayxngqwyKmooA4rV/h/G5MmnSeS3/PGQ5X8D1Fcdfafc6bL5V1C%0A0L543Dg/Q9D+FeymoLqzgvoTFPEksZ/hcZq1J9SHHseM1a07TZ9Vult7dN0h6tj5VHqa6zVPh6Gk%0ADafL5ak4McvOOeoP+P510uh6Jb6HbCKEAueXk7ufX/61VzdiVETQdDg0O1EMQ3SHmSRvvMf8PQVq%0AUUVkahRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU%0AUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFADel%0ALRTTxQA+ikBpaACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiikoAWkJ7U3NOAoARadRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFA%0ABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFADSO4pQaWkK0ALRTc4paAFooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKTdQAUnL%0AH2oxmloAKWiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiii%0AgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooASk6U6igBAfzpaQik5FADqKSloAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACkoJpME0AByelKBRS0AFFFFABRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABSUtFADdp7UbvWnUhXNABS03G2jdQA6ikzS0AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFJupMmgBS1JyfpRtpaAALS0UUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUU%0AUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQ%0AAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAB%0ASbaWigBnK0u6nUm2gAzS03bRux1oAdRSUtABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUU%0AUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFN3UcmgBdwpC35Uu2jFACBaXF%0ALRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQA%0A3bRyKdRQA3dS0tN2+lADqKbzRk0AOopu6lzQAtFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRSbqAFopu6jmgB1JupMGl20AJuNG3PWlxS0AJjFLRRQAUUUUAFFFFABRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFACbRSbadRQA3aaOadRQA3nvS5FLSbRQAZFGRRtFG0UAGaWk20YoAMijIoo59aADIoyKTn1N%0ALzQAZpaSjaKADIoyKNtG0UAGRRn0o2ijFACc0cmnUUAN20u0UtFACYpaKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigD//Z" id='img-upload'/>
									<button id="clear-pict" class="btn btn-default">Quitar</button>
								</div>
							</div>
							
						</div>
				</div>
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
						<form id="form-create-employees" class="form" action="javascript:false;" v-on:submit="NormalizeAddressesModal" method="post">
							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								<select @change="loadCitys" v-model="addressNormalize.department" type="text" id="modal-department" required="required" class="form-control has-feedback-left">
									<option value="">Elija un departamento...</option>
									<option v-for="(item, index_item) in options.geo_departments" :key="item.id" :value="item.id">{{ item.name }}</option>
								</select>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								<select v-model="addressNormalize.city" type="text" id="modal-city" required="required" class="form-control has-feedback-left">
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

<template id="single-details">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>{{ record.names }} {{ record.surname }}<small>Viendo Perfil</small></h2>
						<ul class="nav navbar-right panel_toolbox">
						<li><a @click="deleteThis"><i class="fa fa-trash"></i></a></li>
							<li><router-link accesskey="c" class="close-link" :to="{ name: 'HomeList' }"><i class="fa fa-close"></i></router-link></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					
					<div class="x_content">
						<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
							<div class="profile_img">
								<div id="crop-avatar">
									<!-- Current avatar -->
									<template v-if="record.avatar !== null && record.avatar.id !== undefined && record.avatar.id > 0">
										<!-- // <img class="img-responsive avatar-view" src="/public/assets/images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
										<img class="img-responsive avatar-view" :src="'data:image/png;base64, ' + record.avatar.data" alt="Avatar" title="Avatar">
									</template>
								</div>
							</div>
							<h3>{{ record.names }} <br />{{ record.surname }}</h3>
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
									<template v-if="record.status_marital.id !== undefined && record.status_marital.id > 0">
										{{ record.status_marital.name }}
									</template>
								</li>
								<li>
									<i class="fa fa-birthday-cake user-profile-icon"></i> 
									{{ record.birthday }}
								</li>
								<li>
									<i class="fa fa-usd user-profile-icon"></i> 
									{{ $root.formatMoney(record.salary) }}
								</li>
								<li><i class="fa fa-at user-profile-icon"></i> {{ record.email }}</li>
								<li><i class="fa fa-phone user-profile-icon"></i> {{ record.phone }}</li>
								<li><i class="fa fa-mobile user-profile-icon"></i> {{ record.mobile }}</li>
								<li>
									<i class="fa fa-map-marker user-profile-icon"></i> 
									<template v-if="record.address !== null && record.address.id !== undefined && record.address.id > 0">
										{{ record.address.minsize }}
									</template>
								</li>
								
								
								<li><i class="fa fa-briefcase user-profile-icon"></i> Software Engineer</li>
								<li class="m-top-xs">
									<i class="fa fa-external-link user-profile-icon"></i>
									<a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
								</li>
							</ul>
							<router-link tag="a" class="btn btn-success" :to="{ name: 'Edit', params: { employee_id: record.id } }"><i class="fa fa-edit m-right-xs"></i>Editar Perfil</a>
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
									<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a></li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
										
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

<template id="edit-employee">
	<div>
		<div class="col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Modificar <small><?= $title; ?></small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><router-link accesskey="c" class="close-link" :to="{ name: 'HomeList' }"><i class="fa fa-close"></i></router-link></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<template v-if="error.error == true">
						<div class="alert alert-danger alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<!-- // <span aria-hidden="true">×</span> -->
							</button>
							<strong>Error: </strong> 
							{{ error.message }}
						</div>
					</template>
					
					<form class="form-horizontal form-label-left" action="javascript:false" v-on:submit="validateForm" method="POST">
						<span class="section">Info. Personal</span>
						<div class="col-sm-6 col-xs-6">
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_type">Tipo de Documento <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0"  id="identification_type" required="required" v-model="record.identification_type" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.identifications_types" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_number"># Documento <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.identification_number" id="identification_number" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" data-validate-words="1" name="identification_number" placeholder="Numero del documento" required="required" type="text">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="expedition">Fecha Exped. <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.expedition" id="expedition" class="form-control col-md-7 col-xs-12" name="expedition" required="required" type="date" placeholder="MM/DD/YYYY" >
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Departamento Exped. <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0" @change="loadOptionCityBasic" id="department" required="required" v-model="record.department" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.geo.departments" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">Ciudad Exped. <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0" id="city" required="required" v-model="record.city" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.geo.citys" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="names">Nombre(s) <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.names" id="names" class="form-control col-md-7 col-xs-12" data-validate-length-range="3" data-validate-words="1" name="names" placeholder="Nombre(s)" required="required" type="text">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="surname">Apellido(s) <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.surname" id="surnname" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="surname" placeholder="Apellido(s)" required="required" type="text">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_type">Estado civil <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0"  id="status_marital" required="required" v-model="record.status_marital" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.status_marital" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthday">Fecha Nacim. <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.birthday" id="birthday" class="form-control col-md-7 col-xs-12" name="birthday" required="required" type="date" placeholder="MM/DD/YYYY" >
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Direccion <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<div class="input-group">
										<input min="1" readonly="" v-model="record.address" type="number" id="address" class="form-control" required="required" class="form-control">
										<span class="input-group-btn">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addresses-modal">
												<i class="fa fa-search"></i>
											</button>

										</span>
									</div>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo electronico <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.email" type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Teléfono Fijo <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.phone" type="phone" id="phone" name="phone" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Teléfono Móvil <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.mobile" type="mobile" id="mobile" name="mobile" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Genero <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="gender" required="required" v-model="record.gender" class="form-control">
										<option value="">Seleccione una opcion</option>
										<option value="male">Masculino</option>
										<option value="female">Femenino</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6 col-xs-6">
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Estado <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0" id="status" required="required" v-model="record.status" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.employees_status" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="area">Área <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0" id="area" required="required" v-model="record.area" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.employees_areas" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="headquarters">Sede <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select data-validate-length-range="0" id="headquarters" required="required" v-model="record.headquarters" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(type, index_type) in options.headquarters" :value="type.id">{{ type.name }}</option>
									</select>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="headquarters">Foto 3x4 (cm) <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
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
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary">Salario <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="record.salary" type="float" id="salary" name="salary" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="col-sm-12 col-xs-12">
								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-xs-4 col-md-offset-8">
										<button id="send" type="submit" class="btn btn-info"> Guardar </button>
									</div>
								</div>
							</div>
						</form>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="headquarters">Foto 3x4 (cm) <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<img class="img-responsive" src="data:image/png;base64, /9j/4AAQSkZJRgABAQEBLAEsAAD/4R7GRXhpZgAATU0AKgAAAAgACwALAAIAAAAmAAAIngEOAAIA%0AAABLAAAIxAESAAMAAAABAAEAAAEaAAUAAAABAAAJEAEbAAUAAAABAAAJGAEoAAMAAAABAAIAAAEx%0AAAIAAAAmAAAJIAEyAAIAAAAUAAAJRgE7AAIAAAAIAAAJWodpAAQAAAABAAAJYuocAAcAAAgMAAAA%0AkgAAEaYc6gAAAAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAFdpbmRvd3MgUGhvdG8gRWRpdG9yIDEwLjAuMTAwMTEuMTYzODQARGVmYXVs%0AdCBhdmF0YXIgcHJvZmlsZSBpY29uLiBHcmV5IHBob3RvIHBsYWNlaG9sZGVyLCBpbGx1c3RyYXRp%0Ab25zIHZlY3RvcnMAAAAtxsAAACcQAC3GwAAAJxBXaW5kb3dzIFBob3RvIEVkaXRvciAxMC4wLjEw%0AMDExLjE2Mzg0ADIwMTk6MTI6MjYgMTQ6MjI6NTgARWt3aXNpdAAABKABAAMAAAABAAEAAKACAAQA%0AAAABAAAXcKADAAQAAAABAAAXcOocAAcAAAgMAAAJmAAAAAAc6gAAAAgAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA%0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAYBAwADAAAAAQAG%0AAAABGgAFAAAAAQAAEfQBGwAFAAAAAQAAEfwBKAADAAAAAQACAAACAQAEAAAAAQAAEgQCAgAEAAAA%0AAQAADLoAAAAAAAAAYAAAAAEAAABgAAAAAf/Y/9sAQwAIBgYHBgUIBwcHCQkICgwUDQwLCwwZEhMP%0AFB0aHx4dGhwcICQuJyAiLCMcHCg3KSwwMTQ0NB8nOT04MjwuMzQy/9sAQwEJCQkMCwwYDQ0YMiEc%0AITIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIy/8AAEQgA%0A/wEAAwEhAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMC%0ABAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYn%0AKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeY%0AmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5%0A+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwAB%0AAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpD%0AREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ip%0AqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMR%0AAD8A9/ooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKACigA%0AooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKACigAooAKKA%0ACigAooAKKACigAooAKKACigAooAKKACq01/bw8F9zei80AUpNYbpFEB7sc1WfULp8/vSAeyjFVYm%0A5CZ5W+9K5+rGo+vWmIASOhxUguJl6SyD6MaBk6aldIeXDD0YVai1joJYvqVP9KVguXYbuCfhJBu/%0Aung1PUlBRQAUUAFFABRQAUUAFFABRQAUUAFFABVO51GKDKr87+g6CgDKnvJ7j7z4X+6vAqvVEhRT%0AEFFABRQAUUAFW4NQngwN29fRqQzVtr6G54B2v/dNWakoKKACigAooAKKACigAooAKKACmSSJEhd2%0ACqO5oAxrvUZJ8pHlI/1NUqpEhRTEORGkYKilmPQAVfh0mRuZXCew5NJsaRcTTLZeqs3+83+FP+wW%0Av/PEfmaVx2GPpls3RWX/AHW/xqnNpMijMTh/Y8Gi4WKDo8bbXUqw7EU2qJCigA6HIrStNTKYScll%0A7P3H1pMaNZWDKGUgg9CKWpKCigAooAKKACigAooAKKAIp50t4y7njsPWsG5upLmTc5wB91ewpoTI%0AaKokKmtrZ7mXYvA7t6Uhm9b20dsm2MfUnqalqSgooAKKAIp7eO4TZIufQ9xVGTSE2/upGDf7XNNM%0AVjMkjeKQo4wwplUSFFAFqzvXtWwctGeq+n0rdR1kQOhBU9DUspDqKQwooAKKACigAooAKZLKsMbS%0AOcKKAOfubl7mXe3A/hX0qGqJCimIVVLMFUZJOAK6K1t1toAg69WPqaTKRNRUjCigAooAKKAM7VYA%0A0ImA+ZDg/SseqRLCimIKtWV4baTB5jb7w9PekM3lIZQynIPINLUlBRQAUUAFFABRQAVhahd/aJdq%0An92h49z600JlOiqJCigC9pUW+6LkcIM/j/nNbdSykFFIYUUAFFABRQBFcqHtZVPdTXN1SEwopkhR%0AQBpaZd7W+zuflP3T6H0rXqWUgopDCigAooAKKAKGp3PlQ+Up+d+vsKxapEsKKYgooA1tHHyzH1I/%0ArWnUvcpBRSGFFABRQAUUANf/AFbfQ1zFNCYUVRIUUAHQ5FdBZXP2m3DH744b60mNFmipKCigAooA%0AKQkAEk4A6mgDnLmY3Fw0h6E8ewqKqJCimIKKALunXQt5GVlJDkDI7VuVLKQUUhhRQAUUAFFADJTi%0AFz6Ka5mmhMKKokKKACrenT+TdAE/K/yn+lIZvUVJQUUAFFABVPU5vKtCoPzOdv4d6EDMKirICigA%0AooAVThgfQ11FSykFFIYUUAFFABRQBFcnFrKf9g/yrm6pCYUUyQooAKKAOjtZvPtkfuRg/WpqgsKK%0AACigArF1aXdcrGDwi/qf8imhMoUVRIUUAFFABXUDpUspC0UhhRQAUUAFFAFe/OLKU+2K56qRLCim%0AIKKACigDW0iT5ZIieh3CtOpZSCikMKKACucunMl1K2c/McU0JkNFUSFFABRQBd061S5dzIMqo6Zx%0Aya3OgxUspBRSGFFABRQAUUAIyK6lWUMp6g1h6jbpbzjyxhWGcelNCZToqiQooAKKALmmPtvVH94E%0AVu1LKQUUhhRQAjHCk+gzXL00JhRVEhRQAUUAaWjviWRPVQfy/wD11r1LKQUUhhRQAUUAFFABWNq7%0AZuUX0X+tNCZn0VRIUUAFFAEtqdt1Ef8AbH866SpZSCikMKKAIrk4tZj6If5VzdUhMKKZIUUAFFAF%0ArT5PLvY+cBvlP4//AF636llIKKQwooAKKACigArnr6TzbyRh0BwPwpoTK9FUSFFABRQA5Dh1Poa6%0AepZSCikMKKAIrkZtZh/sH+Vc3VITCimSFFABRQAoJUgg4IOQa3bK9F0pBUh1HPoaTGi3RUlBRQAU%0AUAFFAFK+vfsw8tVJkZcg9hWHVIlhRTEFFABRQAq8uo966ipZSCikMKKAEcbkZfUYrl6aEwoqiQoo%0AAKKACr+kvtuiv95aTGjaoqSgooAKKACigDA1CTzL2Q9lO0fh/wDXqrVEhRTEFFABRQBLbDddRD1c%0AfzrpKllIKKQwooAK5u4Ty7mRcYwxx9KaEyKiqJCigAooAKfDIYZkkH8JzQB0qMHRWU5BGRS1BYUU%0AAFFABUVxMILd5D2HH1oA5vqcmirICigAooAKKALempvvU44UEmt6pZSCikMKKACsTVY9l3vwcOM5%0A9/8AOKaEyjRVEhRQAUUAFFAG1pLs1qwJyFbAq/UstBRSAKKACsXVJXa58on5FAIFNCZQoqiQooAK%0AKACigDU0eP8A1kp/3R/X+latSykFFIYUUAFUdUh8y13gfMhz+HehAzEoqyAooAKKACigDa0kf6Ix%0A9XP8hV+pZaCikAUUAFYmqjF4PdBTQmUaKokKKACigAooA6Kzh8m1RSPmxk/Wp6gsKKACigApGUMp%0AVhkEYNAHNzxGCdoz/CfzFR1ZAUUAFFABRQB0Fgnl2UYI5Iz+dWagsKKACigArK1hOYpMeqk/5/Gm%0AhMy6KokKKACigAqzYQefdKCPlX5mpDOgoqSgooAKKACigDO1S23xiZR8yfe+lY9UiWFFMQUUAFTW%0A0BuJ1jHQ8k+goGdEAAMDoKWoKCigAooAKr3sH2i1ZAPmHK/WgDnqKsgKKACigAresLb7Pb/MPnfl%0Avb2pMaLdFSUFFABRQAUUABAIwRkGsC9tTbTcf6tuVP8ASmhMq0VRIUUAXLfTpp8EjYnq3+Fa1tax%0A2qYQZJ6sepqWykieikMKKACigAooAo3WnJOS6HZIevoayJoJYG2yKR6HsapMlojopiCigDQ02082%0ATznHyKePc1s1LKQUUhhRQAUUAFFABUU8CXERjccHofQ0Ac/PC9vKY3HI6H1FR1ZBat7Ga4wQNqf3%0Am/pWrb2ENvg43P8A3mqWyki1RSGFFABRQAUUAFFABTXRZFKuoZT2IoAzrjSVOWgbb/st0/Os2WGW%0AFtsiFfr3qkyWiOrFpatdS4HCD7zUAb6IsaBEGFAwBTqkoKKACigAooAKKACigCC5tkuotrcEfdb0%0AqK206GHDMPMf1PQfhTuKxcopDCigAooAKKACigAooAKKACkZVdSrKGB6gigDPm0mN2zExTnkHkVd%0AhhSCMRoMAfrTuKxJRSGFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQA%0AUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFA%0ABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUU%0AAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABR%0AQAUUAFFABRQAUUAFFABRQAUUAFFABRQAUUAFFABRQB//2f/hb35odHRwOi8vbnMuYWRvYmUuY29t%0AL3hhcC8xLjAvADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3pr%0AYzlkIj8+DQo8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJYTVAg%0AQ29yZSA0LjQuMC1FeGl2MiI+DQoJPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9y%0AZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4NCgkJPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJv%0AdXQ9IiIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczp4%0AbXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMu%0AYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94%0AYXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5j%0Ab20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1sbnM6aWxsdXN0cmF0b3I9Imh0dHA6%0ALy9ucy5hZG9iZS5jb20vaWxsdXN0cmF0b3IvMS4wLyIgeG1sbnM6eG1wVFBnPSJodHRwOi8vbnMu%0AYWRvYmUuY29tL3hhcC8xLjAvdC9wZy8iIHhtbG5zOnN0RGltPSJodHRwOi8vbnMuYWRvYmUuY29t%0AL3hhcC8xLjAvc1R5cGUvRGltZW5zaW9ucyMiIHhtbG5zOnhtcEc9Imh0dHA6Ly9ucy5hZG9iZS5j%0Ab20veGFwLzEuMC9nLyIgeG1sbnM6cGRmPSJodHRwOi8vbnMuYWRvYmUuY29tL3BkZi8xLjMvIiB4%0AbWxuczpwZGZ4PSJodHRwOi8vbnMuYWRvYmUuY29tL3BkZngvMS4zLyIgeG1sbnM6cGhvdG9zaG9w%0APSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiBkYzpmb3JtYXQ9ImltYWdlL2pw%0AZWciIHhtcDpNZXRhZGF0YURhdGU9IjIwMTctMTEtMzBUMjE6MzE6NTMrMDc6MDAiIHhtcDpNb2Rp%0AZnlEYXRlPSIyMDE3LTExLTMwVDIxOjMxOjUzKzA3OjAwIiB4bXA6Q3JlYXRlRGF0ZT0iMjAxNy0x%0AMS0zMFQyMToyODoyMyswNzowMCIgeG1wOkNyZWF0b3JUb29sPSJXaW5kb3dzIFBob3RvIEVkaXRv%0AciAxMC4wLjEwMDExLjE2Mzg0IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOmFkZmNkZDdlLTFl%0ANjQtZjE0Ny1iODk2LTYzOGQ4ZmRmMzc0ZSIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6%0AcGhvdG9zaG9wOjJmOTVlYmY1LWQ1ZGItMTFlNy04ZWFkLWIxYzRmMzVkZDgxNiIgeG1wTU06T3Jp%0AZ2luYWxEb2N1bWVudElEPSJ1dWlkOjVEMjA4OTI0OTNCRkRCMTE5MTRBODU5MEQzMTUwOEM4IiB4%0AbXBNTTpSZW5kaXRpb25DbGFzcz0icHJvb2Y6cGRmIiBpbGx1c3RyYXRvcjpTdGFydHVwUHJvZmls%0AZT0iUHJpbnQiIGlsbHVzdHJhdG9yOlR5cGU9IkRvY3VtZW50IiB4bXBUUGc6SGFzVmlzaWJsZU92%0AZXJwcmludD0iRmFsc2UiIHhtcFRQZzpIYXNWaXNpYmxlVHJhbnNwYXJlbmN5PSJGYWxzZSIgeG1w%0AVFBnOk5QYWdlcz0iMSIgcGRmOlByb2R1Y2VyPSJBZG9iZSBQREYgbGlicmFyeSAxNS4wMCIgcGRm%0AeDpDcmVhdG9yVmVyc2lvbj0iMjEuMC4wIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3No%0Ab3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiPg0KCQkJPGRjOnRpdGxlPg0KCQkJCTxy%0AZGY6QWx0Pg0KCQkJCQk8cmRmOmxpIHhtbDpsYW5nPSJ4LWRlZmF1bHQiPkRlZmF1bHQgYXZhdGFy%0AIHByb2ZpbGUgaWNvbi00PC9yZGY6bGk+DQoJCQkJPC9yZGY6QWx0Pg0KCQkJPC9kYzp0aXRsZT4N%0ACgkJCTxkYzpkZXNjcmlwdGlvbj4NCgkJCQk8cmRmOkFsdD4NCgkJCQkJPHJkZjpsaSB4bWw6bGFu%0AZz0ieC1kZWZhdWx0Ij5EZWZhdWx0IGF2YXRhciBwcm9maWxlIGljb24uIEdyZXkgcGhvdG8gcGxh%0AY2Vob2xkZXIsIGlsbHVzdHJhdGlvbnMgdmVjdG9yczwvcmRmOmxpPg0KCQkJCTwvcmRmOkFsdD4N%0ACgkJCTwvZGM6ZGVzY3JpcHRpb24+DQoJCQk8ZGM6Y3JlYXRvcj4NCgkJCQk8cmRmOlNlcT4NCgkJ%0ACQkJPHJkZjpsaT5WZWN0b3JTdG9jay5jb20vMTg5NDIzODE8L3JkZjpsaT4NCgkJCQk8L3JkZjpT%0AZXE+DQoJCQk8L2RjOmNyZWF0b3I+DQoJCQk8ZGM6c3ViamVjdD4NCgkJCQk8cmRmOkJhZz4NCgkJ%0ACQkJPHJkZjpsaT5hdmF0YXI8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5wbGFjZWhvbGRlcjwvcmRm%0AOmxpPg0KCQkJCQk8cmRmOmxpPnByb2ZpbGU8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5mZW1hbGU8%0AL3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5kZWZhdWx0PC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+aWNv%0AbjwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPndvbWFuPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+cGhv%0AdG88L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5pc29sYXRlZDwvcmRmOmxpPg0KCQkJCQk8cmRmOmxp%0APndoaXRlPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+dmVjdG9yPC9yZGY6bGk+DQoJCQkJCTxyZGY6%0AbGk+cGVyc29uPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+cGljdHVyZTwvcmRmOmxpPg0KCQkJCQk8%0AcmRmOmxpPmltYWdlPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+aWxsdXN0cmF0aW9uPC9yZGY6bGk+%0ADQoJCQkJCTxyZGY6bGk+c2lsaG91ZXR0ZTwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPmJhY2tncm91%0AbmQ8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5wZW9wbGU8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5m%0AYWNlPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+Z3JheTwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPmdp%0Acmw8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5idXNpbmVzczwvcmRmOmxpPg0KCQkJCQk8cmRmOmxp%0APm1hbGU8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5zeW1ib2w8L3JkZjpsaT4NCgkJCQkJPHJkZjps%0AaT5hbm9ueW1vdXM8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT51c2VyPC9yZGY6bGk+DQoJCQkJCTxy%0AZGY6bGk+bWFuPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+aHVtYW48L3JkZjpsaT4NCgkJCQkJPHJk%0AZjpsaT5oZWFkPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+b3V0bGluZTwvcmRmOmxpPg0KCQkJCQk8%0AcmRmOmxpPnBvcnRyYWl0PC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+YmxhY2s8L3JkZjpsaT4NCgkJ%0ACQkJPHJkZjpsaT5ncmFwaGljPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+dGVtcGxhdGU8L3JkZjps%0AaT4NCgkJCQkJPHJkZjpsaT5pbnRlcm5ldDwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPnNvY2lhbDwv%0AcmRmOmxpPg0KCQkJCQk8cmRmOmxpPm5ldHdvcms8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5tZWRp%0AYTwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPmdlbnRsZW1hbjwvcmRmOmxpPg0KCQkJCQk8cmRmOmxp%0APmZsYXQ8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5ndXk8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5k%0AZXNpZ248L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5kaXNwbGF5PC9yZGY6bGk+DQoJCQkJCTxyZGY6%0AbGk+ZmFjZWxlc3M8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT5oYWlyPC9yZGY6bGk+DQoJCQkJCTxy%0AZGY6bGk+Ym95PC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+Y2hhcmFjdGVyPC9yZGY6bGk+DQoJCQkJ%0ACTxyZGY6bGk+cHJpdmF0ZTwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPm1pbmltYWw8L3JkZjpsaT4N%0ACgkJCQkJPHJkZjpsaT5vcHRpb25zPC9yZGY6bGk+DQoJCQkJPC9yZGY6QmFnPg0KCQkJPC9kYzpz%0AdWJqZWN0Pg0KCQkJPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6%0AZjg2NDk5MjQtNDAyZi1jNjQ2LThjNzctZWJkOTUwN2JjNDVjIiBzdFJlZjpkb2N1bWVudElEPSJ4%0AbXAuZGlkOmY4NjQ5OTI0LTQwMmYtYzY0Ni04Yzc3LWViZDk1MDdiYzQ1YyIgc3RSZWY6b3JpZ2lu%0AYWxEb2N1bWVudElEPSJ1dWlkOjVEMjA4OTI0OTNCRkRCMTE5MTRBODU5MEQzMTUwOEM4IiBzdFJl%0AZjpyZW5kaXRpb25DbGFzcz0icHJvb2Y6cGRmIi8+DQoJCQk8eG1wTU06SGlzdG9yeT4NCgkJCQk8%0AcmRmOlNlcT4NCgkJCQkJPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5j%0AZUlEPSJ4bXAuaWlkOjVlOWQ3YzAwLTFhNDAtNjk0ZS1hMzEwLTg1ZWM4MWUxMTYzYyIgc3RFdnQ6%0Ad2hlbj0iMjAxNy0wOC0yNlQxNDowNzoyMyswNzowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRv%0AYmUgSWxsdXN0cmF0b3IgQ0MgMjAxNyAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4NCgkJ%0ACQkJPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlk%0AOjhkOTJhNjI2LWQ1YTAtNmU0Ni05ODM1LWYwYjdkYmFlMjIwNSIgc3RFdnQ6d2hlbj0iMjAxNy0x%0AMS0zMFQyMToyODoyMSswNzowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgSWxsdXN0cmF0%0Ab3IgQ0MgMjAxNyAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4NCgkJCQkJPHJkZjpsaSBz%0AdEV2dDphY3Rpb249ImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlv%0Abi9wZGYgdG8gYXBwbGljYXRpb24vdm5kLmFkb2JlLnBob3Rvc2hvcCIvPg0KCQkJCQk8cmRmOmxp%0AIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6Zjg2NDk5MjQt%0ANDAyZi1jNjQ2LThjNzctZWJkOTUwN2JjNDVjIiBzdEV2dDp3aGVuPSIyMDE3LTExLTMwVDIxOjMx%0AOjUzKzA3OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNyAo%0AV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4NCgkJCQkJPHJkZjpsaSBzdEV2dDphY3Rpb249%0AImNvbnZlcnRlZCIgc3RFdnQ6cGFyYW1ldGVycz0iZnJvbSBhcHBsaWNhdGlvbi9wZGYgdG8gaW1h%0AZ2UvanBlZyIvPg0KCQkJCQk8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iZGVyaXZlZCIgc3RFdnQ6cGFy%0AYW1ldGVycz0iY29udmVydGVkIGZyb20gYXBwbGljYXRpb24vdm5kLmFkb2JlLnBob3Rvc2hvcCB0%0AbyBpbWFnZS9qcGVnIi8+DQoJCQkJCTxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6%0AaW5zdGFuY2VJRD0ieG1wLmlpZDphZGZjZGQ3ZS0xZTY0LWYxNDctYjg5Ni02MzhkOGZkZjM3NGUi%0AIHN0RXZ0OndoZW49IjIwMTctMTEtMzBUMjE6MzE6NTMrMDc6MDAiIHN0RXZ0OnNvZnR3YXJlQWdl%0AbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE3IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIv%0APg0KCQkJCTwvcmRmOlNlcT4NCgkJCTwveG1wTU06SGlzdG9yeT4NCgkJCTx4bXBUUGc6TWF4UGFn%0AZVNpemUgc3REaW06dz0iNDAwLjAwMDAwMCIgc3REaW06aD0iNDAwLjAwMDAwMCIgc3REaW06dW5p%0AdD0iUGl4ZWxzIi8+DQoJCQk8eG1wVFBnOlBsYXRlTmFtZXM+DQoJCQkJPHJkZjpTZXE+DQoJCQkJ%0ACTxyZGY6bGk+Q3lhbjwvcmRmOmxpPg0KCQkJCQk8cmRmOmxpPk1hZ2VudGE8L3JkZjpsaT4NCgkJ%0ACQkJPHJkZjpsaT5ZZWxsb3c8L3JkZjpsaT4NCgkJCQk8L3JkZjpTZXE+DQoJCQk8L3htcFRQZzpQ%0AbGF0ZU5hbWVzPg0KCQkJPHhtcFRQZzpTd2F0Y2hHcm91cHM+DQoJCQkJPHJkZjpTZXE+DQoJCQkJ%0ACTxyZGY6bGk+DQoJCQkJCQk8cmRmOkRlc2NyaXB0aW9uIHhtcEc6Z3JvdXBOYW1lPSJEZWZhdWx0%0AIFN3YXRjaCBHcm91cCIgeG1wRzpncm91cFR5cGU9IjAiPg0KCQkJCQkJCTx4bXBHOkNvbG9yYW50%0Acz4NCgkJCQkJCQkJPHJkZjpTZXE+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0i%0AV2hpdGUiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIyNTUi%0AIHhtcEc6Z3JlZW49IjI1NSIgeG1wRzpibHVlPSIyNTUiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1w%0ARzpzd2F0Y2hOYW1lPSJCbGFjayIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIg%0AeG1wRzpyZWQ9IjM1IiB4bXBHOmdyZWVuPSIzMSIgeG1wRzpibHVlPSIzMiIvPg0KCQkJCQkJCQkJ%0APHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkNNWUsgUmVkIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0%0AeXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjM3IiB4bXBHOmdyZWVuPSIyOCIgeG1wRzpibHVlPSIz%0ANiIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkNNWUsgWWVsbG93IiB4bXBH%0AOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjU1IiB4bXBHOmdyZWVu%0APSIyNDIiIHhtcEc6Ymx1ZT0iMCIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9%0AIkNNWUsgR3JlZW4iIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVk%0APSIwIiB4bXBHOmdyZWVuPSIxNjYiIHhtcEc6Ymx1ZT0iODEiLz4NCgkJCQkJCQkJCTxyZGY6bGkg%0AeG1wRzpzd2F0Y2hOYW1lPSJDTVlLIEN5YW4iIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBS%0AT0NFU1MiIHhtcEc6cmVkPSIwIiB4bXBHOmdyZWVuPSIxNzQiIHhtcEc6Ymx1ZT0iMjM5Ii8+DQoJ%0ACQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQ01ZSyBCbHVlIiB4bXBHOm1vZGU9IlJH%0AQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iNDYiIHhtcEc6Z3JlZW49IjQ5IiB4bXBH%0AOmJsdWU9IjE0NiIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkNNWUsgTWFn%0AZW50YSIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjIzNiIg%0AeG1wRzpncmVlbj0iMCIgeG1wRzpibHVlPSIxNDAiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpz%0Ad2F0Y2hOYW1lPSJDPTE1IE09MTAwIFk9OTAgSz0xMCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlw%0AZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjE5MCIgeG1wRzpncmVlbj0iMzAiIHhtcEc6Ymx1ZT0iNDUi%0ALz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTAgTT05MCBZPTg1IEs9MCIg%0AeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjIzOSIgeG1wRzpn%0AcmVlbj0iNjUiIHhtcEc6Ymx1ZT0iNTQiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hO%0AYW1lPSJDPTAgTT04MCBZPTk1IEs9MCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VT%0AUyIgeG1wRzpyZWQ9IjI0MSIgeG1wRzpncmVlbj0iOTAiIHhtcEc6Ymx1ZT0iNDEiLz4NCgkJCQkJ%0ACQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTAgTT01MCBZPTEwMCBLPTAiIHhtcEc6bW9k%0AZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIyNDciIHhtcEc6Z3JlZW49IjE0%0AOCIgeG1wRzpibHVlPSIyOSIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9%0AMCBNPTM1IFk9ODUgSz0wIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBH%0AOnJlZD0iMjUxIiB4bXBHOmdyZWVuPSIxNzYiIHhtcEc6Ymx1ZT0iNjQiLz4NCgkJCQkJCQkJCTxy%0AZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTUgTT0wIFk9OTAgSz0wIiB4bXBHOm1vZGU9IlJHQiIg%0AeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjQ5IiB4bXBHOmdyZWVuPSIyMzciIHhtcEc6%0AYmx1ZT0iNTAiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTIwIE09MCBZ%0APTEwMCBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIy%0AMTUiIHhtcEc6Z3JlZW49IjIyMyIgeG1wRzpibHVlPSIzNSIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4%0AbXBHOnN3YXRjaE5hbWU9IkM9NTAgTT0wIFk9MTAwIEs9MCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6%0AdHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjE0MSIgeG1wRzpncmVlbj0iMTk4IiB4bXBHOmJsdWU9%0AIjYzIi8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz03NSBNPTAgWT0xMDAg%0ASz0wIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iNTciIHht%0AcEc6Z3JlZW49IjE4MSIgeG1wRzpibHVlPSI3NCIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3%0AYXRjaE5hbWU9IkM9ODUgTT0xMCBZPTEwMCBLPTEwIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBl%0APSJQUk9DRVNTIiB4bXBHOnJlZD0iMCIgeG1wRzpncmVlbj0iMTQ4IiB4bXBHOmJsdWU9IjY4Ii8+%0ADQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz05MCBNPTMwIFk9OTUgSz0zMCIg%0AeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjAiIHhtcEc6Z3Jl%0AZW49IjEwNCIgeG1wRzpibHVlPSI1NiIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5h%0AbWU9IkM9NzUgTT0wIFk9NzUgSz0wIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNT%0AIiB4bXBHOnJlZD0iNDMiIHhtcEc6Z3JlZW49IjE4MiIgeG1wRzpibHVlPSIxMTUiLz4NCgkJCQkJ%0ACQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTgwIE09MTAgWT00NSBLPTAiIHhtcEc6bW9k%0AZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIwIiB4bXBHOmdyZWVuPSIxNjci%0AIHhtcEc6Ymx1ZT0iMTU3Ii8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz03%0AMCBNPTE1IFk9MCBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6%0AcmVkPSIzOSIgeG1wRzpncmVlbj0iMTcwIiB4bXBHOmJsdWU9IjIyNSIvPg0KCQkJCQkJCQkJPHJk%0AZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9ODUgTT01MCBZPTAgSz0wIiB4bXBHOm1vZGU9IlJHQiIg%0AeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjciIHhtcEc6Z3JlZW49IjExNyIgeG1wRzpi%0AbHVlPSIxODgiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTEwMCBNPTk1%0AIFk9NSBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSI0%0AMyIgeG1wRzpncmVlbj0iNTciIHhtcEc6Ymx1ZT0iMTQ0Ii8+DQoJCQkJCQkJCQk8cmRmOmxpIHht%0AcEc6c3dhdGNoTmFtZT0iQz0xMDAgTT0xMDAgWT0yNSBLPTI1IiB4bXBHOm1vZGU9IlJHQiIgeG1w%0ARzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMzgiIHhtcEc6Z3JlZW49IjM0IiB4bXBHOmJsdWU9%0AIjk4Ii8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz03NSBNPTEwMCBZPTAg%0ASz0wIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMTAyIiB4%0AbXBHOmdyZWVuPSI0NSIgeG1wRzpibHVlPSIxNDUiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpz%0Ad2F0Y2hOYW1lPSJDPTUwIE09MTAwIFk9MCBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9%0AIlBST0NFU1MiIHhtcEc6cmVkPSIxNDYiIHhtcEc6Z3JlZW49IjM5IiB4bXBHOmJsdWU9IjE0MyIv%0APg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9MzUgTT0xMDAgWT0zNSBLPTEw%0AIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMTU4IiB4bXBH%0AOmdyZWVuPSIzMSIgeG1wRzpibHVlPSI5OSIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRj%0AaE5hbWU9IkM9MTAgTT0xMDAgWT01MCBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBS%0AT0NFU1MiIHhtcEc6cmVkPSIyMTgiIHhtcEc6Z3JlZW49IjI4IiB4bXBHOmJsdWU9IjkyIi8+DQoJ%0ACQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz0wIE09OTUgWT0yMCBLPTAiIHhtcEc6%0AbW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIyMzgiIHhtcEc6Z3JlZW49%0AIjQyIiB4bXBHOmJsdWU9IjEyMyIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9%0AIkM9MjUgTT0yNSBZPTQwIEs9MCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIg%0AeG1wRzpyZWQ9IjE5NCIgeG1wRzpncmVlbj0iMTgxIiB4bXBHOmJsdWU9IjE1NSIvPg0KCQkJCQkJ%0ACQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9NDAgTT00NSBZPTUwIEs9NSIgeG1wRzptb2Rl%0APSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjE1NSIgeG1wRzpncmVlbj0iMTMz%0AIiB4bXBHOmJsdWU9IjEyMSIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9%0ANTAgTT01MCBZPTYwIEs9MjUiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHht%0AcEc6cmVkPSIxMTQiIHhtcEc6Z3JlZW49IjEwMiIgeG1wRzpibHVlPSI4OCIvPg0KCQkJCQkJCQkJ%0APHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9NTUgTT02MCBZPTY1IEs9NDAiIHhtcEc6bW9kZT0i%0AUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSI4OSIgeG1wRzpncmVlbj0iNzQiIHht%0AcEc6Ymx1ZT0iNjYiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTI1IE09%0ANDAgWT02NSBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVk%0APSIxOTYiIHhtcEc6Z3JlZW49IjE1NCIgeG1wRzpibHVlPSIxMDgiLz4NCgkJCQkJCQkJCTxyZGY6%0AbGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTMwIE09NTAgWT03NSBLPTEwIiB4bXBHOm1vZGU9IlJHQiIg%0AeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMTY5IiB4bXBHOmdyZWVuPSIxMjQiIHhtcEc6%0AYmx1ZT0iODAiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTM1IE09NjAg%0AWT04MCBLPTI1IiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0i%0AMTM5IiB4bXBHOmdyZWVuPSI5NCIgeG1wRzpibHVlPSI2MCIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4%0AbXBHOnN3YXRjaE5hbWU9IkM9NDAgTT02NSBZPTkwIEs9MzUiIHhtcEc6bW9kZT0iUkdCIiB4bXBH%0AOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIxMTciIHhtcEc6Z3JlZW49Ijc2IiB4bXBHOmJsdWU9%0AIjQxIi8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz00MCBNPTcwIFk9MTAw%0AIEs9NTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSI5NiIg%0AeG1wRzpncmVlbj0iNTciIHhtcEc6Ymx1ZT0iMTkiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpz%0Ad2F0Y2hOYW1lPSJDPTUwIE09NzAgWT04MCBLPTcwIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBl%0APSJQUk9DRVNTIiB4bXBHOnJlZD0iNjAiIHhtcEc6Z3JlZW49IjM2IiB4bXBHOmJsdWU9IjIxIi8+%0ADQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iUj02IEc9ODAgQj0xMTAgMSIgeG1w%0ARzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjYiIHhtcEc6Z3JlZW49%0AIjgwIiB4bXBHOmJsdWU9IjExMCIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9%0AIlI9MTA3IEc9MTY0IEI9MTkyIDEiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1Mi%0AIHhtcEc6cmVkPSIxMDciIHhtcEc6Z3JlZW49IjE2NCIgeG1wRzpibHVlPSIxOTIiLz4NCgkJCQkJ%0ACQkJPC9yZGY6U2VxPg0KCQkJCQkJCTwveG1wRzpDb2xvcmFudHM+DQoJCQkJCQk8L3JkZjpEZXNj%0AcmlwdGlvbj4NCgkJCQkJPC9yZGY6bGk+DQoJCQkJCTxyZGY6bGk+DQoJCQkJCQk8cmRmOkRlc2Ny%0AaXB0aW9uIHhtcEc6Z3JvdXBOYW1lPSJHcmF5cyIgeG1wRzpncm91cFR5cGU9IjEiPg0KCQkJCQkJ%0ACTx4bXBHOkNvbG9yYW50cz4NCgkJCQkJCQkJPHJkZjpTZXE+DQoJCQkJCQkJCQk8cmRmOmxpIHht%0AcEc6c3dhdGNoTmFtZT0iQz0wIE09MCBZPTAgSz0xMDAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5%0AcGU9IlBST0NFU1MiIHhtcEc6cmVkPSIzNSIgeG1wRzpncmVlbj0iMzEiIHhtcEc6Ymx1ZT0iMzIi%0ALz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTAgTT0wIFk9MCBLPTkwIiB4%0AbXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iNjUiIHhtcEc6Z3Jl%0AZW49IjY0IiB4bXBHOmJsdWU9IjY2Ii8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFt%0AZT0iQz0wIE09MCBZPTAgSz04MCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIg%0AeG1wRzpyZWQ9Ijg4IiB4bXBHOmdyZWVuPSI4OSIgeG1wRzpibHVlPSI5MSIvPg0KCQkJCQkJCQkJ%0APHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9MCBNPTAgWT0wIEs9NzAiIHhtcEc6bW9kZT0iUkdC%0AIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIxMDkiIHhtcEc6Z3JlZW49IjExMCIgeG1w%0ARzpibHVlPSIxMTMiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTAgTT0w%0AIFk9MCBLPTYwIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0i%0AMTI4IiB4bXBHOmdyZWVuPSIxMzAiIHhtcEc6Ymx1ZT0iMTMzIi8+DQoJCQkJCQkJCQk8cmRmOmxp%0AIHhtcEc6c3dhdGNoTmFtZT0iQz0wIE09MCBZPTAgSz01MCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6%0AdHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjE0NyIgeG1wRzpncmVlbj0iMTQ5IiB4bXBHOmJsdWU9%0AIjE1MiIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IkM9MCBNPTAgWT0wIEs9%0ANDAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIxNjciIHht%0AcEc6Z3JlZW49IjE2OSIgeG1wRzpibHVlPSIxNzIiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpz%0Ad2F0Y2hOYW1lPSJDPTAgTT0wIFk9MCBLPTMwIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQ%0AUk9DRVNTIiB4bXBHOnJlZD0iMTg4IiB4bXBHOmdyZWVuPSIxOTAiIHhtcEc6Ymx1ZT0iMTkyIi8+%0ADQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz0wIE09MCBZPTAgSz0yMCIgeG1w%0ARzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjIwOSIgeG1wRzpncmVl%0Abj0iMjExIiB4bXBHOmJsdWU9IjIxMiIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5h%0AbWU9IkM9MCBNPTAgWT0wIEs9MTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1Mi%0AIHhtcEc6cmVkPSIyMzAiIHhtcEc6Z3JlZW49IjIzMSIgeG1wRzpibHVlPSIyMzIiLz4NCgkJCQkJ%0ACQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTAgTT0wIFk9MCBLPTUiIHhtcEc6bW9kZT0i%0AUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIyNDEiIHhtcEc6Z3JlZW49IjI0MiIg%0AeG1wRzpibHVlPSIyNDIiLz4NCgkJCQkJCQkJPC9yZGY6U2VxPg0KCQkJCQkJCTwveG1wRzpDb2xv%0AcmFudHM+DQoJCQkJCQk8L3JkZjpEZXNjcmlwdGlvbj4NCgkJCQkJPC9yZGY6bGk+DQoJCQkJCTxy%0AZGY6bGk+DQoJCQkJCQk8cmRmOkRlc2NyaXB0aW9uIHhtcEc6Z3JvdXBOYW1lPSJCcmlnaHRzIiB4%0AbXBHOmdyb3VwVHlwZT0iMSI+DQoJCQkJCQkJPHhtcEc6Q29sb3JhbnRzPg0KCQkJCQkJCQk8cmRm%0AOlNlcT4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTAgTT0xMDAgWT0xMDAg%0ASz0wIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjM3IiB4%0AbXBHOmdyZWVuPSIyOCIgeG1wRzpibHVlPSIzNiIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3%0AYXRjaE5hbWU9IkM9MCBNPTc1IFk9MTAwIEs9MCIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0i%0AUFJPQ0VTUyIgeG1wRzpyZWQ9IjI0MiIgeG1wRzpncmVlbj0iMTAxIiB4bXBHOmJsdWU9IjM0Ii8+%0ADQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz0wIE09MTAgWT05NSBLPTAiIHht%0AcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIyNTUiIHhtcEc6Z3Jl%0AZW49IjIyMiIgeG1wRzpibHVlPSIyMyIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5h%0AbWU9IkM9ODUgTT0xMCBZPTEwMCBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NF%0AU1MiIHhtcEc6cmVkPSIwIiB4bXBHOmdyZWVuPSIxNjEiIHhtcEc6Ymx1ZT0iNzUiLz4NCgkJCQkJ%0ACQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJDPTEwMCBNPTkwIFk9MCBLPTAiIHhtcEc6bW9k%0AZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIzMyIgeG1wRzpncmVlbj0iNjQi%0AIHhtcEc6Ymx1ZT0iMTU0Ii8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iQz02%0AMCBNPTkwIFk9MCBLPTAiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6%0AcmVkPSIxMjciIHhtcEc6Z3JlZW49IjYzIiB4bXBHOmJsdWU9IjE1MiIvPg0KCQkJCQkJCQk8L3Jk%0AZjpTZXE+DQoJCQkJCQkJPC94bXBHOkNvbG9yYW50cz4NCgkJCQkJCTwvcmRmOkRlc2NyaXB0aW9u%0APg0KCQkJCQk8L3JkZjpsaT4NCgkJCQkJPHJkZjpsaT4NCgkJCQkJCTxyZGY6RGVzY3JpcHRpb24g%0AeG1wRzpncm91cE5hbWU9IkZsYXQgRGVzaWduIiB4bXBHOmdyb3VwVHlwZT0iMSI+DQoJCQkJCQkJ%0APHhtcEc6Q29sb3JhbnRzPg0KCQkJCQkJCQk8cmRmOlNlcT4NCgkJCQkJCQkJCTxyZGY6bGkgeG1w%0ARzpzd2F0Y2hOYW1lPSJSPTI1NSBHPTE4NCBCPTggMSIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlw%0AZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjI1NSIgeG1wRzpncmVlbj0iMTg0IiB4bXBHOmJsdWU9Ijgi%0ALz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJSPTIzMyBHPTkxIEI9OTAgMSIg%0AeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjIzMyIgeG1wRzpn%0AcmVlbj0iOTEiIHhtcEc6Ymx1ZT0iOTAiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hO%0AYW1lPSJSPTk2IEc9MTk3IEI9MjIxIDEiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NF%0AU1MiIHhtcEc6cmVkPSI5NiIgeG1wRzpncmVlbj0iMTk3IiB4bXBHOmJsdWU9IjIyMSIvPg0KCQkJ%0ACQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IlI9NDEgRz0xMzAgQj0yNTEgMSIgeG1wRzpt%0Ab2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjQxIiB4bXBHOmdyZWVuPSIx%0AMzAiIHhtcEc6Ymx1ZT0iMjUxIi8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0i%0AUj00MiBHPTIxMCBCPTI1MiAxIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4%0AbXBHOnJlZD0iNDIiIHhtcEc6Z3JlZW49IjIxMCIgeG1wRzpibHVlPSIyNTIiLz4NCgkJCQkJCQkJ%0ACTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJSPTI0NiBHPTE0MiBCPTEwMyAxIiB4bXBHOm1vZGU9%0AIlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjQ2IiB4bXBHOmdyZWVuPSIxNDIi%0AIHhtcEc6Ymx1ZT0iMTAzIi8+DQoJCQkJCQkJCQk8cmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iUj0x%0AMTggRz0xNjYgQj0xODggMSIgeG1wRzptb2RlPSJSR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1w%0ARzpyZWQ9IjExOCIgeG1wRzpncmVlbj0iMTY2IiB4bXBHOmJsdWU9IjE4OCIvPg0KCQkJCQkJCQkJ%0APHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IlI9MjI5IEc9MTQ4IEI9MTYyIDEiIHhtcEc6bW9kZT0i%0AUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6cmVkPSIyMjkiIHhtcEc6Z3JlZW49IjE0OCIg%0AeG1wRzpibHVlPSIxNjIiLz4NCgkJCQkJCQkJCTxyZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJSPTE1%0AOCBHPTE5MSBCPTE3MiAxIiB4bXBHOm1vZGU9IlJHQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBH%0AOnJlZD0iMTU4IiB4bXBHOmdyZWVuPSIxOTEiIHhtcEc6Ymx1ZT0iMTcyIi8+DQoJCQkJCQkJCQk8%0AcmRmOmxpIHhtcEc6c3dhdGNoTmFtZT0iUj0yMjkgRz0xNzYgQj0xMzcgMSIgeG1wRzptb2RlPSJS%0AR0IiIHhtcEc6dHlwZT0iUFJPQ0VTUyIgeG1wRzpyZWQ9IjIyOSIgeG1wRzpncmVlbj0iMTc2IiB4%0AbXBHOmJsdWU9IjEzNyIvPg0KCQkJCQkJCQkJPHJkZjpsaSB4bXBHOnN3YXRjaE5hbWU9IlI9MTk0%0AIEc9MTc0IEI9MTc4IDEiIHhtcEc6bW9kZT0iUkdCIiB4bXBHOnR5cGU9IlBST0NFU1MiIHhtcEc6%0AcmVkPSIxOTQiIHhtcEc6Z3JlZW49IjE3NCIgeG1wRzpibHVlPSIxNzgiLz4NCgkJCQkJCQkJCTxy%0AZGY6bGkgeG1wRzpzd2F0Y2hOYW1lPSJSPTIxMCBHPTIwMCBCPTExMyAxIiB4bXBHOm1vZGU9IlJH%0AQiIgeG1wRzp0eXBlPSJQUk9DRVNTIiB4bXBHOnJlZD0iMjEwIiB4bXBHOmdyZWVuPSIyMDAiIHht%0AcEc6Ymx1ZT0iMTEzIi8+DQoJCQkJCQkJCTwvcmRmOlNlcT4NCgkJCQkJCQk8L3htcEc6Q29sb3Jh%0AbnRzPg0KCQkJCQkJPC9yZGY6RGVzY3JpcHRpb24+DQoJCQkJCTwvcmRmOmxpPg0KCQkJCTwvcmRm%0AOlNlcT4NCgkJCTwveG1wVFBnOlN3YXRjaEdyb3Vwcz4NCgkJPC9yZGY6RGVzY3JpcHRpb24+DQoJ%0APC9yZGY6UkRGPg0KPC94OnhtcG1ldGE+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAK%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAog%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0ACiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAK%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAog%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0ACiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAK%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAg%0AICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg%0AICA8P3hwYWNrZXQgZW5kPSd3Jz8+/+0TSFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAALCHAFaAAMb%0AJUccAgAAAgAAHAJ4AEpEZWZhdWx0IGF2YXRhciBwcm9maWxlIGljb24uIEdyZXkgcGhvdG8gcGxh%0AY2Vob2xkZXIsIGlsbHVzdHJhdGlvbnMgdmVjdG9ycxwCUAAHRWt3aXNpdBwCBQAdRGVmYXVsdCBh%0AdmF0YXIgcHJvZmlsZSBpY29uLTQcAhkABmF2YXRhchwCGQALcGxhY2Vob2xkZXIcAhkAB3Byb2Zp%0AbGUcAhkABmZlbWFsZRwCGQAHZGVmYXVsdBwCGQAEaWNvbhwCGQAFd29tYW4cAhkABXBob3RvHAIZ%0AAAhpc29sYXRlZBwCGQAFd2hpdGUcAhkABnZlY3RvchwCGQAGcGVyc29uHAIZAAdwaWN0dXJlHAIZ%0AAAVpbWFnZRwCGQAMaWxsdXN0cmF0aW9uHAIZAApzaWxob3VldHRlHAIZAApiYWNrZ3JvdW5kHAIZ%0AAAZwZW9wbGUcAhkABGZhY2UcAhkABGdyYXkcAhkABGdpcmwcAhkACGJ1c2luZXNzHAIZAARtYWxl%0AHAIZAAZzeW1ib2wcAhkACWFub255bW91cxwCGQAEdXNlchwCGQADbWFuHAIZAAVodW1hbhwCGQAE%0AaGVhZBwCGQAHb3V0bGluZRwCGQAIcG9ydHJhaXQcAhkABWJsYWNrHAIZAAdncmFwaGljHAIZAAh0%0AZW1wbGF0ZRwCGQAIaW50ZXJuZXQcAhkABnNvY2lhbBwCGQAHbmV0d29yaxwCGQAFbWVkaWEcAhkA%0ACWdlbnRsZW1hbhwCGQAEZmxhdBwCGQADZ3V5HAIZAAZkZXNpZ24cAhkAB2Rpc3BsYXkcAhkACGZh%0AY2VsZXNzHAIZAARoYWlyHAIZAANib3kcAhkACWNoYXJhY3RlchwCGQAHcHJpdmF0ZRwCGQAHbWlu%0AaW1hbBwCGQAHb3B0aW9uczhCSU0EJQAAAAAAEH2dXHztHOOwh78Ge5dL1co4QklNBDoAAAAAAOUA%0AAAAQAAAAAQAAAAAAC3ByaW50T3V0cHV0AAAABQAAAABQc3RTYm9vbAEAAAAASW50ZWVudW0AAAAA%0ASW50ZQAAAABDbHJtAAAAD3ByaW50U2l4dGVlbkJpdGJvb2wAAAAAC3ByaW50ZXJOYW1lVEVYVAAA%0AAAEAAAAAAA9wcmludFByb29mU2V0dXBPYmpjAAAADABQAHIAbwBvAGYAIABTAGUAdAB1AHAAAAAA%0AAApwcm9vZlNldHVwAAAAAQAAAABCbHRuZW51bQAAAAxidWlsdGluUHJvb2YAAAAJcHJvb2ZDTVlL%0AADhCSU0EOwAAAAACLQAAABAAAAABAAAAAAAScHJpbnRPdXRwdXRPcHRpb25zAAAAFwAAAABDcHRu%0AYm9vbAAAAAAAQ2xicmJvb2wAAAAAAFJnc01ib29sAAAAAABDcm5DYm9vbAAAAAAAQ250Q2Jvb2wA%0AAAAAAExibHNib29sAAAAAABOZ3R2Ym9vbAAAAAAARW1sRGJvb2wAAAAAAEludHJib29sAAAAAABC%0AY2tnT2JqYwAAAAEAAAAAAABSR0JDAAAAAwAAAABSZCAgZG91YkBv4AAAAAAAAAAAAEdybiBkb3Vi%0AQG/gAAAAAAAAAAAAQmwgIGRvdWJAb+AAAAAAAAAAAABCcmRUVW50RiNSbHQAAAAAAAAAAAAAAABC%0AbGQgVW50RiNSbHQAAAAAAAAAAAAAAABSc2x0VW50RiNQeGxAcsAAAAAAAAAAAAp2ZWN0b3JEYXRh%0AYm9vbAEAAAAAUGdQc2VudW0AAAAAUGdQcwAAAABQZ1BDAAAAAExlZnRVbnRGI1JsdAAAAAAAAAAA%0AAAAAAFRvcCBVbnRGI1JsdAAAAAAAAAAAAAAAAFNjbCBVbnRGI1ByY0BZAAAAAAAAAAAAEGNyb3BX%0AaGVuUHJpbnRpbmdib29sAAAAAA5jcm9wUmVjdEJvdHRvbWxvbmcAAAAAAAAADGNyb3BSZWN0TGVm%0AdGxvbmcAAAAAAAAADWNyb3BSZWN0UmlnaHRsb25nAAAAAAAAAAtjcm9wUmVjdFRvcGxvbmcAAAAA%0AADhCSU0D7QAAAAAAEAEsAAAAAQACASwAAAABAAI4QklNBCYAAAAAAA4AAAAAAAAAAAAAP4AAADhC%0ASU0EDQAAAAAABAAAAFo4QklNBBkAAAAAAAQAAAAeOEJJTQPzAAAAAAAJAAAAAAAAAAABADhCSU0n%0AEAAAAAAACgABAAAAAAAAAAI4QklNA/UAAAAAAEgAL2ZmAAEAbGZmAAYAAAAAAAEAL2ZmAAEAoZma%0AAAYAAAAAAAEAMgAAAAEAWgAAAAYAAAAAAAEANQAAAAEALQAAAAYAAAAAAAE4QklNA/gAAAAAAHAA%0AAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAAAAA%0A/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAOEJJ%0ATQQAAAAAAAACAAA4QklNBAIAAAAAAAIAADhCSU0EMAAAAAAAAQEAOEJJTQQtAAAAAAAGAAEAAAAC%0AOEJJTQQIAAAAAAAQAAAAAQAAAkAAAAJAAAAAADhCSU0EHgAAAAAABAAAAAA4QklNBBoAAAAAA28A%0AAAAGAAAAAAAAAAAAABdwAAAXcAAAAB0ARABlAGYAYQB1AGwAdAAgAGEAdgBhAHQAYQByACAAcABy%0AAG8AZgBpAGwAZQAgAGkAYwBvAG4ALQA0AAAAAQAAAAAAAAAAAAAAAAAAAAAAAAABAAAAAAAAAAAA%0AABdwAAAXcAAAAAAAAAAAAAAAAAAAAAABAAAAAAAAAAAAAAAAAAAAAAAAABAAAAABAAAAAAAAbnVs%0AbAAAAAIAAAAGYm91bmRzT2JqYwAAAAEAAAAAAABSY3QxAAAABAAAAABUb3AgbG9uZwAAAAAAAAAA%0ATGVmdGxvbmcAAAAAAAAAAEJ0b21sb25nAAAXcAAAAABSZ2h0bG9uZwAAF3AAAAAGc2xpY2VzVmxM%0AcwAAAAFPYmpjAAAAAQAAAAAABXNsaWNlAAAAEgAAAAdzbGljZUlEbG9uZwAAAAAAAAAHZ3JvdXBJ%0ARGxvbmcAAAAAAAAABm9yaWdpbmVudW0AAAAMRVNsaWNlT3JpZ2luAAAADWF1dG9HZW5lcmF0ZWQA%0AAAAAVHlwZWVudW0AAAAKRVNsaWNlVHlwZQAAAABJbWcgAAAABmJvdW5kc09iamMAAAABAAAAAAAA%0AUmN0MQAAAAQAAAAAVG9wIGxvbmcAAAAAAAAAAExlZnRsb25nAAAAAAAAAABCdG9tbG9uZwAAF3AA%0AAAAAUmdodGxvbmcAABdwAAAAA3VybFRFWFQAAAABAAAAAAAAbnVsbFRFWFQAAAABAAAAAAAATXNn%0AZVRFWFQAAAABAAAAAAAGYWx0VGFnVEVYVAAAAAEAAAAAAA5jZWxsVGV4dElzSFRNTGJvb2wBAAAA%0ACGNlbGxUZXh0VEVYVAAAAAEAAAAAAAlob3J6QWxpZ25lbnVtAAAAD0VTbGljZUhvcnpBbGlnbgAA%0AAAdkZWZhdWx0AAAACXZlcnRBbGlnbmVudW0AAAAPRVNsaWNlVmVydEFsaWduAAAAB2RlZmF1bHQA%0AAAALYmdDb2xvclR5cGVlbnVtAAAAEUVTbGljZUJHQ29sb3JUeXBlAAAAAE5vbmUAAAAJdG9wT3V0%0Ac2V0bG9uZwAAAAAAAAAKbGVmdE91dHNldGxvbmcAAAAAAAAADGJvdHRvbU91dHNldGxvbmcAAAAA%0AAAAAC3JpZ2h0T3V0c2V0bG9uZwAAAAAAOEJJTQQoAAAAAAAMAAAAAj/wAAAAAAAAOEJJTQQUAAAA%0AAAAEAAAAAjhCSU0EDAAAAAAHOgAAAAEAAACgAAAAoAAAAeAAASwAAAAHHgAYAAH/2P/tAAxBZG9i%0AZV9DTQAB/+4ADkFkb2JlAGSAAAAAAf/bAIQADAgICAkIDAkJDBELCgsRFQ8MDA8VGBMTFRMTGBEM%0ADAwMDAwRDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAENCwsNDg0QDg4QFA4ODhQUDg4ODhQR%0ADAwMDAwREQwMDAwMDBEMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwM/8AAEQgAoACgAwEiAAIR%0AAQMRAf/dAAQACv/EAT8AAAEFAQEBAQEBAAAAAAAAAAMAAQIEBQYHCAkKCwEAAQUBAQEBAQEAAAAA%0AAAAAAQACAwQFBgcICQoLEAABBAEDAgQCBQcGCAUDDDMBAAIRAwQhEjEFQVFhEyJxgTIGFJGhsUIj%0AJBVSwWIzNHKC0UMHJZJT8OHxY3M1FqKygyZEk1RkRcKjdDYX0lXiZfKzhMPTdePzRieUpIW0lcTU%0A5PSltcXV5fVWZnaGlqa2xtbm9jdHV2d3h5ent8fX5/cRAAICAQIEBAMEBQYHBwYFNQEAAhEDITES%0ABEFRYXEiEwUygZEUobFCI8FS0fAzJGLhcoKSQ1MVY3M08SUGFqKygwcmNcLSRJNUoxdkRVU2dGXi%0A8rOEw9N14/NGlKSFtJXE1OT0pbXF1eX1VmZ2hpamtsbW5vYnN0dXZ3eHl6e3x//aAAwDAQACEQMR%0AAD8A9VSSSSUpJJJJSkkkklKSSSSUpJJQN1Q5e0fEhJTNJQF1J4e0/AhTSUpJJJJSkkkklKSSSSUp%0AJJJJT//Q9VSSSSUpJJJJSklC21lTC95gflPgFm5GXZfI+jX+6O/9dKlNy7Ppr0Z+kd5cf5yqWZuQ%0A/h2weDf/ACRVdO1rnuDWAuceAEaRanEuMvJcfEmfypoHgrtfTSdbXx/Jb/5Io4wMX9wn+07+9K1U%0A5cDwTtJaZaS0+IMfkWi/p1B+iXMPkZH/AEpVS/DupG76bP3h2/rNStVKrzchn528eDv7wrdOfS/R%0A/wCjd58f5yzUkqVbuJLJx8qyjQe6v9w/99WnVay5m9hkdx3B8ChSbZpJJJKUkkkkp//R9VSSSSUp%0AQttZUwvedB958gprKy8j17ND+jZo3z8XpBTC659z97/7LewCGkknLVwCSABJOgHmVq42O2hkcvP0%0A3eJVHAYHZIJ/MBd8/o/xWogUhSSSSCVJJJJKQ5OO25h0HqAe138FkrcWNcIusHg935UQgsFOq19L%0A97PmOxHgVBJFDs1WsuYHs4PI7g+BU1k4t/oWSfoO0f8A+S/srWTSuUkkkkp//9L1VJJJJTWz7vTp%0A2j6Vmg+H5yzFYzbN+Q4dmDaPyuVdEIKkkkkUJ8O4VXSQSHw3TxJ0WqsVmj2/1m/lW0gUhSSSSCVJ%0AJJJKUsa/+fs/ru/KtlYrzNjz4ud+UohBYpJJIoUtLp9u+rYfpV6fI/RWaj4dmzIb4P8Aafnx/wBJ%0AApDqpJJIJf/T9VSSULjFTz4NJ/BJTjlxcS88uJJ+eqZIcBJOWqSSSSUnw6mW37X/AEQC6OJghaqy%0AcN23JYTwZb94/wDJLWQKQpJJJBKkkkklKWZnU11WN2CA8EkeYWmszqD92Rt/caB8z7kQgtZJJJFC%0AkpLfcOW6j5apJJKdsEESOCnQ8czRWfFjfyIiauf/1PVVC4TU8eLSPwU0klOGOAknLS0lp5aSD8tE%0AyctUkkkkpfUajQjUFauJa66kPdG6SDHkVkq7060Bzqj+d7m/HhyBSG+kkkglSSSSSkWTaaqXWNgu%0AERPEkwslxLnFzjJcZJ8yrnUbQS2kdvc7/vqpIhBUkkkihSSSUE+0cnQfPRJTsY4iiseDG/kREwAA%0AgcBOmrn/1fVUkkklOVm17Mh3g/3D8hQFpZ9O+nePpV6/L85ZqIQVJJJIoUi439Iq/rfwQlZwGbsg%0AO7MBPzPtCSnTSSSTVykkkklONeIvs/ru/KoI+azZkv8AB0OHz0/76gJy1SSSSSlI+HXvyG+Dfcfl%0Ax/0kBaPT6tlRsPNmo/qj6KBSG2kkkgl//9b1VJJJJSlk5WP6FkD+bdqz/wAj/ZWsoW1MuYWPGh4P%0AcHxCQU4ySMcTIFpqDZP73DY/elWqensb7rTvd+7+b/5kjaKadVFtx/RtkfvHQfetLGxxQyJlztXO%0ARQABA0ATpWmlJJJIKUkkkkpBlYwvaIO17font/VKzbKrKnbbG7T2PY/By2UzmteNrgHA8g6o2inE%0ASV+3pzTrS7b/ACXaj/O+kqoxbzYKthDj3PEfvbkUUvjUG+3afoN1efL93+0tXhQppZTWGN+Z7k+J%0ARE0rlJJJJKf/1/VUkkklKSSSSUpJJJJSkkkklKSSSSUpJJJJSkkkklKSSSSUpJJJJSkkkklP/9D1%0AVJJJJSkkkklKSSSSUpJJJJSkkkklKSSSSUpJJJJSkkkklKSSSSUpJJJJT//ZOEJJTQQhAAAAAABd%0AAAAAAQEAAAAPAEEAZABvAGIAZQAgAFAAaABvAHQAbwBzAGgAbwBwAAAAFwBBAGQAbwBiAGUAIABQ%0AAGgAbwB0AG8AcwBoAG8AcAAgAEMAQwAgADIAMAAxADcAAAABADhCSU0EBgAAAAAABwAIAAAAAQEA%0A/9sAQwADAgIDAgIDAwMDBAMDBAUIBQUEBAUKBwcGCAwKDAwLCgsLDQ4SEA0OEQ4LCxAWEBETFBUV%0AFQwPFxgWFBgSFBUU/9sAQwEDBAQFBAUJBQUJFA0LDRQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQU%0AFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQU/8AAEQgD4wPlAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEB%0AAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQci%0AcRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpj%0AZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfI%0AycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgME%0ABQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkj%0AM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2%0Ad3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ%0A2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A/VOiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiikyKAFopCw9agkv7eH79xEn+84FA%0AFiis2TxFpkf3763B/wCugNQN4u0dG5v4z7DJ/lTsxXRs0VhN410dT/x95+kbf4Uz/hOdH/5+XP8A%0A2yb/AAoswujoKK5//hOtI/5+H/79N/hS/wDCcaOf+Xph9Ym/woswujforEHjLR2H/H6q/VGH9Klj%0A8UaTIONQg/4E2P50WYXRrUVSj1mxm+5eW7fSUVZjmSTlXVh/skGkMkopMijNAC0UUUAFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFA%0ABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUmapX2tWOmj/SLqKI+hbn8qAL1Fcje/ESzhyLaGW4P95s%0AItYV5481O4yI/Kth/sKWP5n/AAquVk8yPSWI21n3XiDT7L/XXkKn+6G3H8hXll1qV5e/8fFzLN/v%0APkfl/wDWqsBjpxVcpPMejXXxA02PIiWacjptTaP1/wAKy7j4jyn/AFFki+8jlv0ArjaKrlRPMzoZ%0A/HWry52yRQj0jQH+ZNZ83iLVLg/Pfz/RW2j9BWdRTshXZJJcSznMk0kh/wBpyf61HtGemTRRTEHH%0ApRRRQAUUUUAFFFFABRRRQAbQe2aUfL93K/7ppKKALUOq3tvxFeXCD/ZkP+NX4PF+rwYAvWkH/TRV%0Ab+lY1FKyHdnU2/xC1CPAlgt5vcAqf0JrSt/iNA5Ans5Y/UxuG/wrhKKXKh8zPULbxppNzj/SvJb0%0AlUr/APW/Wte3u4bobopY5V9Y2DV4xSozRNuRmRvVTg0uUrmPbM0teTWnirVbLG27aRf7suH/AM/n%0AW5Z/EaVcC6tFcf3oWIP5H/Gp5WPmR3tFYFj400u8wDceQ5/hnG39elbccyTKGRldT3UgioKJKKTN%0ALQMKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiii%0AgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAK%0AKKKACiimO4VSSQAOSTwKAH0hrndU8cafp5KRubuQcYh6D6t0/KuT1PxpqV/lY3FpF/dh+8f+BH+l%0AUotkuSR6DqGsWemLm5uI4j/dY8n8BXM6h8RIlytlbNIf78xwPwAyTXDMxdi7HczdWJyTSVfKQ5M1%0Ar/xRqmoZD3LRof4IflH6c1k98nk+veiirICiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKmtb24sX3W08kDd/LJH6dDUNFAHUWPj6/t8C5SO6T1+%0A636cfnXS6f4202+wrSG1kP8ADPwPzGRXmVFS4opSaPa45FkAZSGU9CCCDT68csdVvNLbNrcPEOu0%0AHKn6iup034iFcLf2/wD20g/qpqHFlqSO6oqjp2sWmqIGtrhJfVQcEfUdRV3NQWLRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRTJJEjjLuwVV5LMcAUAPqKaeO3jZ5HVE%0AXksxwBXLax4+t7XMViv2qT/npzsH+P4Vxeo6td6tJuupml9FHCj6AdPxqlFslySOy1bx/bW+UskN%0A0/TzGyqD/GuQ1LXL7Vm/0m4Zk7RLwg/Af1qhRWiikZtthRRRVEhRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQA%0A6OR4nDxu0bjoynBFdHpfju8stq3Q+2R9NxID/n3rmqKVk9xptHrGk+IrHV8CCb953ifhh+B6/hWr%0AXia5VgwJBHcda6PR/HF7YbUuf9MhHqRvA+vf8ahx7FqXc9KorM0nXrLWVzbzAuOTG3DD8DWlmszQ%0AWiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAK%0AKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoo%0AooAKKKKACiiigAooooAKKKKACiiigAooooAKKKSgBaRulU9T1a20m3MtzKIx2HUt9BXA6740u9U3%0ARW2bS1Pp99h7noPoPzppXE3Y6rW/GFnpO6ND9puRx5cZyFPue30rg9W1691p/wDSJSI85EKcIP6/%0AnWd06dPzorVRSMnJsKKKKokKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigBUdopA6%0AMyOvIZTgius0Xx7NblYtQUzx9p1Hzj6jv+FclRSauNNo9ksb6DUYRNbyrNGf4lOfz9PpVqvGbHUL%0AnS7gTWszRSd8cg/UV3mg+OLfUGWG8C21weNw+4/0Pb6H86zcbGilc6qikBzzS1BYUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRSVXvL2HT7dpp5FiiXqzGgCw3SuV8QeNobDfb2eLi4+6W6on+JrA8QeMp9U3QWu63tPXo%0A7/X0rm8dP/11oo9zNy7E15ez6hcGe5kaWU8bif5DoB7CoaKK0MwooooAKKKKACiiigAooooAKKKK%0AACiiigAooooAKKKKACitTTPDWo6tgw25SL/nrL8i/hnn8q6jT/h3bx4a9uGnbusQ2L+J5J/Sp5ki%0AuVs4PPatGz8P6lfYMNlIVPRmBUfrXp1jotjpwH2a2jiP95Rk/nV6p5iuXuedWvw/1CbBllgg9slj%0A+n+NaUPw4iH+tvZG9RGgX+ea7Sip5mVyo5iP4f6WmMmeQ990mP5VYXwTo68G1Le7St/jW/RSux2R%0AhjwZo/8Az5D/AL+N/jTH8EaO3/LqR9JG/wAa36KLsLI5iX4f6W33fPj/AN2TP8wapz/DeA8w3sqe%0Azorf4V2dFHMwsjzu4+Ht/GP3M8M49Gyp/wAP1rIuvDOqWefMspSB/FH84/8AHa9bpMCq5mTyo8TY%0AFWKkEEdQRjH4Gkr2O7021vl23NvHP7uoz+dc9qHw/srjm2eS1Pp99fyPP5VXMTynntFbuoeDNT0/%0AJWIXMY/ihOT+IOD+VYZBVipBVh1UjGKsgSiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA%0AKKKKACg9KKKAN/QfF91o5WKXdc2o42E5Zfof6GvQtL1S21a3E1tIHXoR3U+hHY149Vix1C4024E9%0AtKYpB6Hgj0IqHG5alY9mornPD3i+31jbDNi3vP7hPyt/un+ldFWexpuLRRRSGFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUh6UGua8TeLo%0AtJ3W9vtmvPT+FPr7+1PcDQ1zxFbaHDulO6Vh8kI+8ff2FebatrV1rVx5tw/yj7kan5U+n+NVLi4l%0AvJ3mmdpJWPzM38v/AK1R1qo2MXK4UUUVRIUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFH1q5%0Apuk3WrTiK2j3erHhV+prv9D8G2ml7ZJALq57uw+VfoP8mk5WKSucho/g+/1ba7IbWA8+ZKME/Qdf%0AzrtdJ8I2Gl4byvPmH/LSXk/gOg/CtsU6snJs0UUhop1FFSUFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFFFACVQ1LQ7LVl/0m3WRugccMPoa0KKAPPtW+H88OXsJfPQf8s5CA359/wBK5WaCW2lMU0bR%0ASL1Vxgj869qqlqej2urQ+XcwrIMcN0ZfoatS7kOPY8foro9d8F3Wl7prctdWw/77Ue46H6j8q5z7%0A39O1aXuZ7BRRRTEFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAvPUdeorsfDfjho9ttq%0ALbl6Lcdx/ve3vXG0Umk9xp2Pao5FkVWUhlIyGB4I9RUleXeHPFU2iMIpMzWZPKd091/wr0ixvYdQ%0At0ngkWSNhww/r6GsWrGqdyzRRRSKCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAK%0AKKKACiiigAooooAKKKKACkbpQzbVJ6Vwfivxk0xeysHIQfLJMvf2Ht700ribsWfFXjH7OzWdg4M3%0ASSYHIT2X3/lXC5LEsSWJOST1PuT3NHTA/wDr0VslYxbuFFFFMQUUUUAFFFFABRRRQAUUUUAFFFFA%0ABRRRQAUUUUAFb/hvwnPrTCabdBZ5+9/E/wBPb3q74V8IG+23l8u236xxEY3+59v5130aCMBVAUAY%0AAHQewrOUuxpGPVkVjYwadbrDbxrFGvQD+Z9TVmiiszQKKKKACiiigAooooAKKKKACiiigAooooAK%0AKKKACiiigAooooAKKKKACiiigBK5HxN4LS83XViqx3BOXj6B/f2NdfRTTsJq55Wvg7WGUN9jIHoZ%0AFz/Oq1x4f1O1yZbKYD1Vcj9DXrm0UbarmZPKjxLodvQjqOhH50V6/qGjWWpqRc20cp7MRgj8RXI6%0Ax8P3hDS6c5kHXyZDz+B/xqlIlxOOop0kbwyNHIpSRThlYYIPpim1ZAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFaOia7c6Hcb4jviY/vITwrD1HoazqKW4Hr+k6tb6xarPbvuXup+8p9DV+vHdL%0A1a50e7E9u5DfxJn5WHoa9P0PXINcthLCcOOHjPVT/h71lKNjaMrmnRRRUlBRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUjHapJOAKG+6c1wXi/xYZ2axsnxGDiWVf4vZ%0AT6epppXE3Yb4t8XG6Z7GxfbCDiSZf4vYe3vXI9uOnbvR246du9FbJWMW7hRRRTEFFFFABRRRQAUU%0AUUAFFFFABRRRQAUUUUAFFFH16UAHp3rq/B/hX+0GS9vF/wBHU/u0b/lofU+wqh4V8PNrl55koItI%0Aj85/vH0FenxoI1VFUKqjAA7VnKXRGkY9RygLwKWiiszQKKKKACiiigAooooAKKKKACiiigAooooA%0AKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigApDS0UAYPiTwzDrcJdcR3aj5ZAMZ9jXmc9%0AvJaTPDMhSVDhlI6f59a9pboa5LxxoAvbY30K/wCkQj5x/fUf1HX6VcZdCJLqef0UfSitTIKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACrWnalPpV2txbttkHVSflYehqrRQB61oOuQa5aiaI7ZBx%0AJG33lP8Ah6GtSvG9O1KfSbtbi3bbIOqk/Kw9DXqWh6zBrlqJ4Thhw8bfeU/4ehrGSsbRlc0qKKKk%0AoKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigApG+6aDXLeMPEw0uM2lu2buQctn/V%0Aqf6+lPcRT8ZeKvL36fZv8/SaVT90f3R71w/AwPw60cnkkknrnqfc+9FbJWMW7hRRRTEFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFFFABVnTtPl1S9jtoh87nqeijufyqtXo3gfQ/wCzrH7VKuLi4GcH%0Aqqdh/U/hSbsikrs3NN0+HS7WK3hXaka49z6n8auUUVgbBRRRQAUUUUAFFFFABRRRQAUUUUAFFFFA%0ABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU1huUjrkYp1IaAPJvEuk/2%0APq0sSjELnzIv909vw5FZdeiePNM+1aUt0o/eW7ZPurHkfnivO8hsY9M5raLujGSswoooqiQooooA%0AKKKKACiiigAooooAKKKKACiiigAooooAKu6Pq0+jXguITns8fZ19KpUf54oA9h0rU4NWtI7iBso3%0Abup7g+9Xa8k8P67Jod5vGXgbiSMdx6j/AGq9Us7qK8gSaFw8cg3KQaxkrG0XcnoooqSgooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigApKKq6lqEOl2clxMcIg6Dqx7AfjQBn+JvECaHZ5+9cScRp7+p%0A9q8vmmkuJnllbfI5yzHuasapqk2sXsl1MfmbhV/uL6f571UrZKxjJ3CiiiqJCiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAo9qKKANbwvpP8AbGrRo4zDH+8k91Hb8a9WX5eMYFc74H0v+z9JWVxi%0AW5/eH2X+Ef1/GukrGTubRVkFFFFSUFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQBDd263dvJC/3JFKn6EV41NC1tNJC/DxsU%0Ab6g17U33TXl3jK1+y+ILnAwsoWUfiOf1zWkOxnPuYdFFFaGYUUUUAFFFFABRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABXQ+EfEZ0i4FvOSbSQ/wDftvX6Vz1H8qW472PbEYMoIOQehHQ06uJ8D+JNwGm3%0AL5ZR+5kbuP7p/wA9K7WsWrGydxaKKKQwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKRulACOwVSxOABkk9%0ABXmHizxAdavdkRxaQnCf7Tdz/ntW9468QG3j/s63fEjDMrDqq/3fqa4TAHTp25/StIrqZyfQKKKK%0A0MwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACrek6edU1K3tQMiR8H6Dk/oDVT+ddd8%0AO7HzLy6uiOIl8tfqef5AUm7Ia1Z3sarGoVeABgU+iisDcKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAQ9K4T4j2u2e%0AyuMdVaMn6EEfzNd5XK/EKHzNFSTH+rmU/gQR/WqjuTLY87opaStjEKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAVWaNlZSVZTkEdQe2K9Q8K+IF1uzAcgXUQxIvr/tCvLquaTqkuj3%0A0dzEeV++ueGX0qWrlRdj2Kiq1jeRahaxXELBo5Bkf59as1ibBRRRQAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAhr%0AM1/WE0XT5J2G6T7saf3mPStJm2qSeAOTXlninXDrepMUbNtDlIwO/q34/wBBVRV2TJ2MmaaS5mea%0AV98kh3FvX/63+FMoorYxCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACvS/Alr9%0An0GNyPmmdpPw6D9AK80b7p+lew6Pb/ZNNtIcY2RKD9cD/wCvUT2LjuXaKKKyNQooooAKKKKACiii%0AgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigArD8aRiXw3eeqqrfkwrcrL8TJ5mg34/6Ysf0prcT2PJv8/1pKO9FbmAUUUUAFFFFABRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUf5+vtRRQB0/gfXv7PuxYztmCY/K3ZXPT8DXoq14nXp/%0Ag/Xf7Y08JI2bmH5Xz1Ydm/H+hrOS6mkX0N+iiiszQKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigApG6UtV767jsbWWeVgkca%0A7ixoA5vx3rZs7MWUL4nuB8xHVU/+vXnv06VZ1LUJNUvprqXIaRs7T/COw/Cq1bpWRg3dhRRRTEFF%0AFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAPhj82aNP7zBfzNe0rXjulru1OzH/TZ%0AP/QhXsQ61nM1gOooorMsKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACii%0AigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKo64N2j3o/6YP/6CavVR1v8A5A97/wBcH/8A%0AQTTW4Hj46D/PrRQv3R/ntRW5zhRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRR%0ARQAelX9E1R9F1GK5X7g+WRezKaoUUAe0wTJPHHIjb0ddyt6g1LXE/D/Wt8badK3KZeHd3Hcfh/Wu%0A1rBqzsbp3VxaKKKQwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooARvumuF+IGsbmTTYm4GJJsf+Or/AF/Kuw1S/TTLGa5k+5Gu7Hqe%0Aw/E8V5BcXD3lxJPKd0sjFmPrn/I/IVcVrciT0sR0UUVqZBRRRQAUUUUAFFFFABRRRQAUUUUAFFFF%0AABRRRQAUUUUAFFFFABRRRQBZ01tupWh/6bJ/6EK9kFeKI/lyK/8AdIb8q9pjYMoYdCM/nWczSI+i%0AiiszQKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKz9eONFv/8Arg//AKCa0KzfEjbdBvz/ANMH/lTW4Hkfaij0orc5%0AwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAJrS7lsbqK4hOJI23D%0A39q9d02+i1K0huYTmORdw/w/Dkfga8c+vTvXYfD3WPLmk0+Q8P8AvIvqPvD8Rz+BqJLS5cWd9RRR%0AWRqFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRR%0AQAUUUUAFIelLVe+uksbSW4kOEjUufw7UAcV8QtW8yaLT0bhR5kmPU/dH5ZNcdUt1dPfXUtzLzJKx%0AY59/T6cD8BUVbpWRg3dhRRRTEFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFAB14PSvWPDepxalpNsySK7pGqyKDyrAYOa8nqW2uprKYS28rwyD+KNscVLVyoux7RS155oXi7U7%0ArU7W2lkjkSSQKxZADj6ivQVrJqxqncdRRRSGFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRR%0ARQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAVkeLG2+HdQP8A0yIrXrE8ZNs8%0AN3p/2V/9CFNbiex5ZRR04orcwCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACii%0AigAooooAWn29xJZ3Ec8RKyRsGXHqKjo/zzQB7Hpt8mpWcNzEf3ci7h7eo/PP5Vbrhfh7qv8ArtPc%0An/nrHn8mH9fxNd1WDVnY3TugooopDCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKK%0AACiiigAooooAKKKKACiiigAooooAQ9K434hap5dvDYofmlPmSf7o6D8Tz/wGuxY7VJJwBzmvItd1%0AH+1tWuLnqhbbH/uDgfn1/GritSJPQoUUUVqZBRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFFFABRRRQAUUUUAFFFFAGl4abb4g08/9NgK9aHavIdDfy9asD/03T/0IV6+tZyNY7C0UUVmW%0AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU%0AUUUAFFFFABRRRQAlc947fb4dmH950H/jwroq5b4hybdEjX+9Oo/RjTW4nsed0lLSVuYBRRRQAUUU%0AUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAFnTr59NvoLlBlo2B2/wB4%0Adx+IyPxr2C3mS4iSWM7kdQyt6g/5FeLV6L4B1L7VpbWrn95bNgf7h6fkcj8KiS6lxfQ6miiisjUK%0AKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiikPQ+l%0AAGF4w1H+zdDlCnEk2IU/Hr+ma8vA4x3FdT8QNQ+0apHbKflgTLf7zf8A1sVy1bR2MZbhRRRVEhRR%0ARQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAFjT226han/psn/o%0AQr2UV4tbnbcwn/pov8xXtIrOZrAWiiisywooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAEPQ1x3xHk/0OyT+9Kx/IY/rXZVwv%0AxIf95p6ezt/6DVR3JlscXRRRWxiFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUALWz4P1D+ztcg3NiOb9y349P1xWLSgkEEdRyKBnta/r0p1Z+h341PS7W5/idBu%0A/wB7of1rQrnNwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKjmkWGNpHOEUFifYU+uf8AG999j0GVFOHnIhH48n9M0xHnF5dNfXk1y33pmL/mf/1flUNH%0AGAR0xxRW5gFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFF%0AFFACqcOp9x/Ova1O4Z9ea8TbgE17VbtugjP+yP5VnM0iSUUUVmaBRRRQAUUUUAFFFFABRRRQAUUU%0AUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAJXn3xGk3al%0AaJ6Qk/m3/wBavQq818fyb9eC/wByFR+ZJ/rVx3Jlsc3RRRWpiFFFFABRRRQAUUUUAFFFFABRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFH6iiigDufh1fbobqzY8oRKv0PB/UD867WvKPCl%0A/wDYNetXJwsh8ph7N0/XFerCsZbm0dhaKKKkoKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAQ1598Q77zb+2tQciFN5+rf/AFh+tegt0NeQ69ef2hrV5ODlTIVX%0A6L8o/QVcdyJbFCiiitTIKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACii%0AigAooooAKKKKAEb7p+leyaW27T7VvWFD/wCOivHK9e0Bt+i2J/6YJ/Ks5mkTQooorM0CiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooASvLvGj+Z4kuv8AZCr+Sj/GvUT0ryXxNJ5niC/P/TXH5DH9KuO5E9jMooorUyCiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigBclSCvDA5Few6XeDU%0ALC3uR0ljDfpz/n2rx39a9F+H14J9HaAnLW8hX8DyP5molsXE6miiisjUKKKKACiiigAooooAKKKK%0AACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoopKAKes3g0/S7q4Jx5cbEfXHH6149z35PevR%0AvH115Oh+UDzNIq/gOf6V51WsdjKW4lFFFWQFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFLToIJLqZIYUMkrnCqvWgBtereE5PM8O2B/6ZAflkf0rj7T4f6hc%0AKDPLFbD0++fy6flXcaLpx0nT4LUyeb5YI34xnJJ9fes5O+hpFF+iiiszQKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigBG+6a%0A8f1xt2tX5/6bv/6Ea9grCuPBulXUksjwN5kjb2YSMOf8mqi7EyVzy+iuv1rwC9rG81hIZVXkxP8A%0Ae/AjrXI8qcEYPcHtWqdzJqwlFFFMQUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQ%0AAUUUUAFFFFABRRRQAV1Xw9vPJ1Se3J4mjyB7rz/I1ytaPh26NnrllLnCiQKfoeP60nsNbnrtFNWn%0AVgbhRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFIehz0paQ9KAOC%0A+I9xuu7O3/uI0h/E4/pXH1ueNLj7R4iuQDkRhUH4AZ/UmsOto7GEtwoooqhBRRRQAUUUUAFFFFAB%0ARRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABXa/DzTFPn37LyD5Uft3Y/wAh+FcV%0AXqfg+3Fv4esxjDOpkP8AwIk1EnoXHc26KKKyNQooooAKKKKACiiigAooooAKKKKACiiigAooooAK%0AKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAQ15/4+0ZbW4jv%0A4hhZjtk/3vX8f6V6A3Sub8fJu8Puf7siH9aqO5Mtjzaijv8AjRWxiFFFFABRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFGSvI6jkfhRR2NAHs1lcC6tYJh/y0QP+YBq%0AxWH4NuPP8PWmTlkDRn8Ccfpityuc3QUUUUDCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigApD0pagvZvs9pNL/AM842b8hmgDyLVJ/tWp3k39+Z2H03f8A6qq0A7lB9s0Vuc4U%0AUUUwCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACvXPDhDa%0AFYEdPIT+VeR+/pzXqfg2TzPDdlzyqlD+DEVE9i47m3RRRWRqFFFFABRRRQAUUUUAFFFFABRRRQAU%0AUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFACVz%0A3jr/AJFyf/eT/wBCFdDXN+P32+H3H96RB+tNbiex5vSUd/xorcwCiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACj69O9FFAHoHw5uN2m3EJ6xzbvwKj+oNddXA/%0ADmfbeXsP96NX/In/ABrvqxlubR2CiiipKCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA%0AKKKKACiiigArK8UzeR4fvm/6ZFfz4/rWpXP+OpfL8OzD+86L+oP9Ka3E9jzL0oo9qK3MAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAWvRPh5P5miPHnm%0AOZh+BAP9a86rs/hvcfvb+A9SFkH5kH+lTLYuO53dFFFYmoUUUUAFFFFABRRRQAUUUUAFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFcj8R%0AZsaXbR/35s/kp/xrrTXCfEa43T2MI/hVn/MgD+Rqo7ky2ONooorYxCiiigAooooAKKKKACiiigAo%0AoooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACj3oooA6LwHN5XiBU/56RMv6A/0r0yvKPCc%0AvleIrA/3nK/mpFere9ZS3NY7C0UUVBYUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRR%0ARQAUUUUAFcn8RH26PEv96cf+gmusrjPiQ221sU9ZGP5AD+tOO5MtjhaSiitzEKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACt/wAD3X2fxBECcLKrJ/7N%0A/SsCrGnXRsdQtrj/AJ5yKx+mef0pPYa3PZaWmqRxinVgbhRRRQAUUUUAFFFFABRRRQAUUUUAFFFF%0AABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAh6cV5%0Ah44uvtHiCVQcrEixj8sn9TXpzsFUsTgDk143fXJvb64uDz5kjN+ZyKuO5E9ivRRRWpkFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAF3RX8vWLB/8Apsn8%0AxXsC/wBa8XtX8u6hf+7Ip/IivaB3rOZrEWiiisywooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAK4j4ktxp6+7n+VdvXCfEg/vtPH+y5/VaqO5MtjjKKKK2MQooooAKKKKACii%0AigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKP5UUUAet+G7v7dotnMT%0A8xjCt9Rwf1Fadch8ObvzLC4tieYpNw+hH+INdfWD3N1sFFFFIYUUUUAFFFFABRRRQAUUUUAFFFFA%0ABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABSN0NLSUAZHi%0Aq+FhoV2+cMy+WB7tx/I15T/Ou1+It/lrSzU+szj9B/WuKrWK0MpbhRRRVkBRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAqnDqfcfzr2tDuUH1rxM9K9qh%0AOYkPqo/lWczSJJRRRWZoFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABXC%0AfEn/AI+LD/df+a13dcJ8SB++08/7Lj9Vqo7ky2OMooorYxCiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigApaSigDe8F6gNP1xEc4inHlH2PUH88V6eK8TD%0AFSGUlWHII6j3r1XwzrSa1p6PwJk+SVB2bHX8f89KykuppF9DYoooqDQKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAprttUn%0A05pTXMeONcGn2JtImH2m4GP91O5/Hp+NNasTdjide1D+1NXubnOUZtqf7o4H+fes+kGBx09KWtzA%0AKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAb%0A7pr2q3/1Ef8AuivFT0xXtUPESD0UfyrOZpEkooorM0CiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAriPiSvGnt7uP5V29cZ8SFza2L+kjD8wD/SqjuTLY4SiiitjEKKKKACii%0AigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAq5peq3Gj3%0AYuLZ9rdGUn5WHuKp0UAeg2fxCsZIh9oimgl6EKu5fwNdNZ3SXlrFPHzHKodeMcHmvGK9Y8Kyeb4e%0AsD/0yA/LI/pWUlY1jJs1qKKKgsKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKgvbyKwtZLid/LiQZZvTtU1cx4/uTDoflg8zSqv4Dn+Ypr%0AcT2K+pfEK2jjZbKN5pD91nG1R7+9cNdXU19cPPO7SSuckn+nt7VHSVskkYtthRRRTEFFFFABRRRQ%0AAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAqjLqPcfzr2t%0ABtUD0rxi1TzLqFP70ij9RXtA71nM0iLRRRWZoFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABXJ/ERN2jxN/dnH/oJrq65/wAdReZ4dmP910b9QP601uJ7HmdJR70VuYBRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABX%0ApvgWbzPD0A/55s6f+PZ/rXmdd78OJ92n3UB/5Zyg/mo/wqJbFx3OwooorI1CiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAErgviNdbrqztx%0A/AjSH8TgfyNd7XlPiu8+2eILtgflRvKH/AeD+uauO5MtjIooorUxCiiigAooooAKKKKACiiigAoo%0AooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKALuix+ZrFgn/TZP5ivYF/%0ArXlPhOPzfEVgP7rlvyUmvVvaspbmsdhaKKKgsKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACsrxTD5/h++X/pkW/Ln+latQXsP2i0mi/56Rsv5jFMDxj0ooA2qPpiitznCiii%0AgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACuq+Ht15WqzwE482LOPcH/A1ytaHh+8+w61ZzE7VEgV/oeD/ADpPYa3PXqKaufrTqwNwooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiikoAr6hd%0ALY2U9w5wsSM5/AV42zNI7M/LsST9Tyf1r0Xx9ffZtHEAOHuHC/gOT/IV5z29ulax7mUn0CiiirIC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKP%0AaiigDovAcPm+IFf/AJ5xM36Af1r0yuB+HMG68vZv7sap+ZP+Fd9WMtzaOwUUUVJQUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFIaWkPSgDxzVLf7Lqd3D/zzlZR9Mn/61Va3%0APGlv9n8RXJAwJArj8QM/qDWHW62MHuFFFFMQUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABR7fhRRQB67oGof2ppNrck5Zk+b/eHB/WtGuF+HepY%0ANxYuf+msf8mH8q7qsGrM3TugooopDCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKK%0AACiiigAooooAKKKKACiiigApG6UtVdSvE0+xmuZOVjUtj19qAPPfHWofbNbMSnKW67P+Bfxf0/Ku%0Adp80z3EryyHdJIxZj6k9T+f8qZW62MHqFFFFMQUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABR9eneijsaAPQPhzBt024mPWSbb+AUf1Jrrqw/Bt%0Av9n8PWmRhnDSH8ScfpitysHubrYKKKKQwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKQ9DnpS0lAHBfEe323dncf30aM/gc/1rj69G8fWvnaH5oHMMit+B4/rXnVbR2MZbiU%0AUUVRIUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFF%0AFFABRRRQBa0y/bS9Qguk5MbZK+o6EfiM16/bzJcQxyxtvjcblb1B714t/Ou7+H+sCa2fT5G+eL5o%0A8/3e4/A/zqJLqXFnZ0UUVkahRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQ%0AAUUUUAFFFFABRRRQAVxfxC1TZDBYoeZD5kn+6Og/E5P/AAGuwmkSGNpJGCooJZj0A9a8h1jUm1bU%0Ap7psgSN8in+FRwB/n1NXFakSehTooorUyCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA%0AKKKKACiiigAooooAKKKKACiiigAooooAKKKKACjBbgdTwPxorR8O2pvNcsosZUyBj9Bz/SgZ6rZW%0A4tbWCEf8s0CfkAKsU1adXObhRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQ%0AAUUUUAFFFFAFLWbMahpd1bkZ8yNgPrjj9a8e578GvbW6GvIdes/7P1q8gAwokLL9G5H6GtImcu5Q%0AooorQzCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA%0AooooAKKKKACrFhfSabeRXMR+eNsj39R+I4/Gq9L6Z6d6APY9PvY9RtYrmE5jkXcP6j8P8atVw3w5%0AvJGF1ascxqFkA9CetdzWDVnY3TugooopDCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA%0AKKKKACiiigAooooAKRvumiuJ8c+IJ4ZBp0GYwyB5JM4JB7D8qaV2JuyKnjLxQLzNjZsDCp/eyL0Y%0A+g9vf1rkx0x2oAAHHTtRWy0MW7hRRRTEFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU%0AUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAH8q6r4e2fnapPcEcQx4B924/kK5X9K9F+H1mINHa%0AcjDXEhb8BwP5GplsVHc6miiisTYKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAK%0AKKKACiiigAooooAQ1598Q7Hyr+2ugMCZNh+q/wD1j+leg1z/AI3sftmgyuoy8BEo/Dg/pmqjuTLY%0A8yoo4AGOmOKK2MQooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACii%0AigAooooAKKKKACiiigAooooA634c/wDISvP+uI/mK9Brz74cL/xML0/9MlH/AI8a9BrGW5rHYKKK%0AKksKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArzX4gLt19T6wL/%0AADNelV538RF/4nFu396D/wBmNXHcmWxytFFFamIUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUA%0AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUALgsQF5YnAr2HS7MafYW9sP8AllGF%0A/Tn/AD715p4UsPt+vWqEZWM+ax9l6frivVhWcjSPcWiiiszQKKKKACiiigAooooAKKKKACiiigAo%0AoooAKKKKACiiigAooooAKKKKACiiigAooooAKjmjWaNo3GUYFSPY1JSHofSgDxi8tWsbya2b70LF%0APyP/AOr86hrqfiBp/wBn1SO5UfLOmG/3l/8ArYrlq3TujB6OwUUUUxBRRRQAUUUUAFFFFABRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAHY/Ddcz37/AOyg/U13%0AtcX8OI8W9/J6uq/kM/1rtKxlubR2CiiipKCiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAK4H4kR4vLF/70bD8iP8a72uK+JEf7mwf0d1/MA/0qo7ky2OHooorYxCiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0Aj9BRSgFiAOp4FAHcfDuw2w3V4w5ciJfoOT+pH5V2tZ+h2A0zS7W2/iRBu/3up/WtCsG7s3WiCiii%0AkMKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAMHxhp%0A39paHKVGZIcTL+HX9M15eDxnua9sYBlIIyDxivItd07+ydWuLb+ANuj/ANw8j8un4VpF9DOS6lCi%0AiitDMKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACi%0AiigAooo9vwoA9E+Hce3RpX/vzk/kAP6V1VYfgyHyfDtnkYLhpD+LEj9MVuVg9zdbBRRRSGFFFFAB%0ARRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAlcr8Q492jRP/wA85gfzBFdU%0Aaw/GkPneHbr1Taw/BhTW4nseX0lL/L/GkrcwCiiigAooooAKKKKACiiigAooooAKKKKACiiigAoo%0AooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAFrZ8H6f/AGjrkG5cxw/vm/Dp+uKxf0r0XwDp%0Av2XS2unH7y5bI/3B0/M5P41MnoVFXZ06/r1p1FFYmwUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFACHpXG/ELS/Mt4b5Bloj5cn+6eh/A8f8AAq7O%0Aq99apfWktvIMpKpQ/j3pp2E1dHjNFS3Vq9jdS20vEkTFTnvj0+vB/EVFW5gFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUcngdTxRV3RbX7brFl%0AAeQ0qlvoDk/oKAPV9Ng+y2FtDj/Vxqv5DFWqaOvSnVznQFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFU9Yt/tWl3cOM74mH6VcpG6UAeJL054OBn60VY1C2+x%0A6hdQEf6uVl/DPH6YqvXQc4UUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFFFFABRRR/nmgCzp1i+pX0FsnDSMBu/ujufwGT+FewW8KW8SRRjaiKFVfQD/I%0Arivh7pX+u1CQH/nlHn82P9PwNd1WUnrY1itAoooqCwooooAKKKKACiiigAooooAKKKKACiiigAoo%0AooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACkPSlooA4L4haT5c0WoIvDDy5Meo+6fyyK46%0AvY9UsE1OxmtpOEkXbn0PY/gea8guLd7O4kglG2WNirL6Y/yPzFaxeljKS1uR0UUVZAUUUUAFFFFA%0ABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFdP8AD+z8/WJJyOIY%0A859zwP0DVzNei/D+x+z6O1wRh7h93/ARwP5H86mWxUdzqKKKKxNgooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigApG6UtIaAPMvHFr9n8QSOBhZkWQfXof5Vz9d5%0A8RrLfZ2t0BzE5Rvo3/1xXB1tF3RjLRhRRRVEhRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFFFABRRRQAUUUUAFFFFABRRRQAtPt7eS8uI4IgTJIwVcepqP69O9dj8PdH8yaTUJBxH+7i+p%0A+8fwHH4mk3ZDSudlptimm2cNtEP3ca7R7+p/PP51boorA3CiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigBG+6a4X4gaPtaPUol4OI5%0Asf8Ajrf0/Ku7qvfWkd9aywSqHjkXaVNNOzE1dHjNFWdS0+TS76a1lyWjbG4/xDsfxqtW5gFFFFAB%0ARRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFLSUcd+lAElvbveXEV%0AvGMySMEH4mvY7O2SztooI+EjUKPw71wvw/0o3F7LfSLmOEbEPqxH9Bn/AL6r0CspPWxrFaXFoooq%0ACwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAoa3p4%0A1TS7m2xkyIcfUcj9QK8gww4YYYcH69/5V7aa8w8Z6X/Z2sO6riK4/er9ejD8Dj860i+hnJdTBooo%0ArQzCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigCazt%0AJb+6it4RmSRgo9vf8Ov4V67ptjHptnDbRDEcS7R7+/48n8TXKfD/AEXZG2oyry+Uh3dh3P4/0rta%0Ayk9bGsV1FoooqCwooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACii%0AigAooooAKKKKACiiigAooooAKRuhpaKAOT8d6IbyzF7CmZ7cfMB1ZP8A61ee+46V7Yy7lIPIPBry%0AzxToZ0TUmCLi2my8Z9PVfw/wrSL6Gcl1MaiiitDMKKKKACiiigAooooAKKKKACiiigAooooAKKKK%0AACiiigAooooAKKKKACiiigBafb28l3cRwRKXkkbaFFR9OenfNd/4J8OGxj+3XK4uHGI0IxsU9z7n%0A9B9aTdhpXOh0fTU0nT4bVOdi/M395u5/Gr1FFYG4UUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABWL4q0f+2dLdUGZ4vni+vcfiOPxrapD0oA8S5H%0ABGCDgj09aK67xt4cMEzajbJmNz++Qdm/vD2/rXI+/at07mDVmFFFFMQUUUUAFFFFABRRRQAUUUUA%0AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAB6Vf0TS31rUYrZeEPzSN2Ve9UK9P8H6F/Y+nh5F%0AxczfM+eqjsv4f1NTJ2Kirm1BCkEccaLsRF2qvoBUtFFYmwUUUUAFFFFABRRRQAUUUUAFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAlZuv6Omtaf%0AJAx2yfejf+6w6Vp0jdKAPFZoZLaZ4ZU2SRnaV9P/AK3+NMru/HXh8zx/2jbpmRRiVV6sv976iuE3%0AA9Onbj9a3TujBqwUUUUxBRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFKMkhQMk9hQ%0AAlKu5mCqCWY4AXqa6DSfBN9qG1px9jh/6aDLkfQf1rttH8M2Oi4aCPdN086Tlv8A634YqXJFqLZg%0AeF/BZjZLvUE+Ycx2/Ye7e/t/Wu0FLS1k3c0SsFFFFIYUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU%0AUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAySNZFKsAysMEEZBrgvEXgeW3ka405%0AfMiPJh/iT6eo9q9ApDTTsJq54mylSVIKlTgqe1JXquteGbLWlJkTy5scTIMN+PrXA614XvtFyzr5%0A8HQTR8j8fT8fzrVSTMnFoyKKAQRmiqJCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACj9Pf096Wrek6ZLrF9HbRDlvvvjhV9aANvwPoP9oXYvp1xBCflXszjp+Ar0VagsbOLT7WK3hX%0AbHGNo/z61ZrBu5ulZBRRRSGFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFA%0ABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFADXUMpUjIIwQehrzDxZ4fOi3u+IZt%0AJjlP9lu4/wA9q9QqrqWnw6pZyW8wyjjqOqnsR+NUnYlq545RVvVNLm0e9ktZh8y8q399fX/Peqlb%0AGIUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFL3AAyT2rd0nwbfaph5F+yW5/ikX5mHsv+Ndx%0Ao/hmx0fDRRb5uhml5f8A+t+FS5JFKLZxekeCb7UNrzj7HD1+cZcj6f4122k+G7HR8GCPdL0MsnLH%0A/D8K1aWsm2zRJISloopFBRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABTWUFSCMj3p1FAHKa54Ftr4tLaEWs55K4+Rv%0A8K4fUdLutJm8q6haM9mx8rfQ9Pyr2OoLq1ivIWinjWWNuNrjIqlIlxR4xRXaax4A25k05+P+eEh/%0Akf8AH864+4t5bWZop42hkXqjjBrVNMyaaI6KKKYgooooAKKKKACiiigAooooAKKKKACiiigAooo/%0AlQAqq0jKqgszHAA6k9sV6h4V8ProlmC4BupRmRvT/ZFY3gfw3tA1K5TDMP3Mbdh/eP8AnpXa1lJ9%0ADWK6i0UUVBYUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU%0AUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABSUtFAGJ4m8Pprlnj7txHzG/v6H2ry+aGS3%0AmeKVdkiHDKexr2o1y3jDwyNUjN3bri7jHK4++B/X0q4y6MiUbnndFHI4III656j2PvRWpkFFFFAB%0ARRRQAUUUUAFFFFABRWnpPh2+1ogwxbYc8zSZCj6ev4V2+j+CrLTNskv+lXA/ikGFH0A/rmpckilF%0As43R/Ct9rBV1TyID/wAtZRwfoO9dzo/hOw0nDhPPn7yyjkfQdB+H51tinVm5NmiikIKWiipKCiii%0AgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooAKKKKACiiigBDVPUdJtdWh8u5hWVe2eCPoau0UAee6x4BuLfMl%0AhJ9oj/55vgOPoe/6VyskbwyNHIjRyLwVZcH8jXtdUtS0e01aPbcwLJjo3Rh9DVqXchx7Hj9Fdbq3%0Aw/uLfL2En2hOvlyYDj6Hv+Qrlp7eW1lMc0bxyDqsi4P5GtE0zNpojooopiCiiigAooooAKKKKACi%0Aij/PFABXQ+EfDh1i4FxMD9jjb0++3p9Ko+H9Dk1y82DKW68ySDsPQf7VeqWdrFZwJDCgSOMbVAFR%0AJ2Lir6kqKFUADAHQDoKdRRWRqFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABSN900tFAH%0AE+MvCvmb9Qs0+frNEv8AEP7w964cYPP417a33TmuC8X+EzAzX1kmYycyxL/D7qPT1FaRl0ZnKPU4%0A+ijPHHTt2orQzCiiigAoq1p+l3WqTeXawtKR1IwFX6k12ej+AYIMSX7faJOvlKTsH4nk0m7DSbOP%0A03RbzV5NttCzLnBkbhR9Wrt9G8CWtjtkuyLub+7jCL+Hf8fyrpYYUhjVI0CIvAVRgD8KlrJybNVG%0Aw1VCKFUYA4AHSnUUVJQUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFF%0AABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUA%0AFFFFACVUvtNttSi8u5hWZR03dR9D2q5RQBwuqfD1hmTT5uOvkzf0Yf1rkryxuNPm8q5gaF/RxjP0%0A7flXs1Q3VnDexmKeJJUP8Mi5FWpEOJ4xRXc6t8PkbL6fL5TdfKlyy/g3UfjXH32m3WmSeVdQNC3Y%0AsMhvoen5VommZtNFaiiimIKKKKACruj6TPrV4LeEY7vJ2RfWmadps+rXa29um6Q9WI+VR6mvUtD0%0AaDQ7UQQjLHl5G+8x/wAPQVMnYqMbkulaZBpNpHbwLhF792Pcn3q7RRWJsFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFIw3KQRkGlooA8/8W+ETas97YpmEnMkI/h9x7e1cjn5%0Acjp+XFe2Mu5SD0rk9Q8AwXWpCaKUwQOcyRKMnOf4T2rRS7mbj2OFs7O41CYQ20LTSeiDgD3NdnpH%0Aw9jTbJqL+Y3/ADxjJ2j6nvXU6bpttpcIhtYliQdcdT7k9z9auUnIaj3Ibe3itY1jhjWKNeAiDA/S%0ApqKKgsKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKhuLWK6hMU0ayxngqwyKmooA4rV/h/G5MmnSeS3/PGQ5X8D1Fcdfafc6bL5V1C%0A0L543Dg/Q9D+FeymoLqzgvoTFPEksZ/hcZq1J9SHHseM1a07TZ9Vult7dN0h6tj5VHqa6zVPh6Gk%0ADafL5ak4McvOOeoP+P510uh6Jb6HbCKEAueXk7ufX/61VzdiVETQdDg0O1EMQ3SHmSRvvMf8PQVq%0AUUVkahRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU%0AUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFADel%0ALRTTxQA+ikBpaACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo%0AAKKKKACiiigAooooAKKKKACiikoAWkJ7U3NOAoARadRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRR%0AQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFA%0ABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFADSO4pQaWkK0ALRTc4paAFooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKTdQAUnL%0AH2oxmloAKWiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiii%0AgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKA%0ACiiigAooooAKKKKACiiigAooooASk6U6igBAfzpaQik5FADqKSloAKKKKACiiigAooooAKKKKACi%0AiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKK%0AKACiiigAooooAKKKKACiiigAooooAKKKKACkoJpME0AByelKBRS0AFFFFABRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABSUtFADdp7UbvWnUhXNABS03G2jdQA6ikzS0AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAF%0AFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU%0AUUAFFJupMmgBS1JyfpRtpaAALS0UUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUU%0AUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQ%0AAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAB%0ASbaWigBnK0u6nUm2gAzS03bRux1oAdRSUtABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUU%0AUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFN3UcmgBdwpC35Uu2jFACBaXF%0ALRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQA%0A3bRyKdRQA3dS0tN2+lADqKbzRk0AOopu6lzQAtFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRSbqAFopu6jmgB1JupMGl20AJuNG3PWlxS0AJjFLRRQAUUUUAFFFFABRRRQA%0AUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABR%0ARRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFF%0AFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUU%0AAFFFFACbRSbadRQA3aaOadRQA3nvS5FLSbRQAZFGRRtFG0UAGaWk20YoAMijIoo59aADIoyKTn1N%0ALzQAZpaSjaKADIoyKNtG0UAGRRn0o2ijFACc0cmnUUAN20u0UtFACYpaKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKK%0AKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooo%0AoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiig%0AAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC%0AiiigD//Z" id='img-upload'/>
									<button id="clear-pict" class="btn btn-default">Quitar</button>
								</div>
							</div>
							
						</div>
				</div>
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
						<form id="form-create-employees" class="form" action="javascript:false;" v-on:submit="NormalizeAddressesModal" method="post">
							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								<select @change="loadCitys" v-model="addressNormalize.department" type="text" id="modal-department" required="required" class="form-control has-feedback-left">
									<option value="">Elija un departamento...</option>
									<option v-for="(item, index_item) in options.geo_departments" :key="item.id" :value="item.id">{{ item.name }}</option>
								</select>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								<select v-model="addressNormalize.city" type="text" id="modal-city" required="required" class="form-control has-feedback-left">
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

var HomeList = Vue.extend({
	template: '#home-list',
	data(){
		return {
			loading: false,
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
		self.load();
	},
	computed: {
		filters(){
			var self = this;
			return [1,2,3];
		}
	},
	methods: {
		load(){
			var self = this;
			if(self.loading == true){ return false; }
			self.loading = true;
			self.records = [];
			self.total = 0;
			window.scrollTo(0, 0);
			
			api.get('/records/employees', {
				params: {
					join: [
						'identifications_types',
						// 'geo_departments',
						// 'geo_citys',
					],
					order: "id",
					page: self.page + "," + self.limit
				}
			}).then(function (response) {
				self.loading = false;
				if(response.status == 200){					
					if(response.data.records && response.data.records.length > 0){
						self.total = response.data.results;
						self.records = response.data.records;
						self.$root.init_DataTables_Employees();
					}
				}
			}).catch(function (error) {
				console.log(error.response);
				self.loading = false;
				self.$root.init_DataTables_Employees();
			});
		},
	}
});

var Create = Vue.extend({
	template: '#create-employee',
	data(){
		return {
			options: {
				identifications_types: [],
				status_marital: [],
				accounts_types: [],
				economic_activities: [],
				geo_types_vias: [],
				geo_types_quadrants: [],
				geo_departments: [],
				geo_citys: [],
				employees_status: [],
				employees_areas: [],
				headquarters: [],
				geo: {
					departments: [],
					citys: [],
				},
			},
			id: 0,
			record: {
				"identification_type": 0,
				"identification_number": "",
				"expedition": "",
				"department": 0,
				"city": 0,
				"names": "",
				"surname": "",
				"status_marital": 0,
				"birthday": "",
				"address": 0,
				"email": "empleado@sincorreo.com",
				"phone": "57 0 000 0000",
				"mobile": "57 300 000 0000",
				"gender": "",
				"status": 0,
				"area": 0,
				"headquarters": 0,
				"avatar": 168,
				"salary": 0.001,
			},
			error: {
				error: false,
				message: "",
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
		loadCitys(){
			var self = this;
			self.options.geo_citys = [];
			if(self.addressNormalize.department !== undefined && self.addressNormalize.department !== null && self.addressNormalize.department > 0){
				
				self.$root.loadAPI_List('geo_citys', {filter: [
					'department,eq,' + self.addressNormalize.department
				]}, function(e){
					self.options.geo_citys = e;
				});
			}
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
				self.options.geo_departments = e;
			});
			self.$root.loadAPI_List('accounts_types', {}, function(e){
				self.options.accounts_types = e;
			});
			self.$root.loadAPI_List('economic_activities', {}, function(e){
				self.options.economic_activities = e;
			});
			self.$root.loadAPI_List('geo_types_vias', {}, function(e){
				self.options.geo_types_vias = e;
			});
			self.$root.loadAPI_List('geo_types_quadrants', {}, function(e){
				self.options.geo_types_quadrants = e;
			});
			self.$root.loadAPI_List('employees_status', {}, function(e){
				self.options.employees_status = e;
			});
			self.$root.loadAPI_List('employees_areas', {}, function(e){
				self.options.employees_areas = e;
			});
			self.$root.loadAPI_List('headquarters', {}, function(e){
				self.options.headquarters = e;
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
			console.log("Val. Form");
			if(
				self.record.identification_type > 0
				&& self.record.identification_number.length > 4
				&& self.record.expedition.length > 0
				&& self.record.department > 0
				&& self.record.city > 0
				&& self.record.names.length > 2
				&& self.record.surname.length > 3
				&& self.record.status_marital > 0
				&& self.record.birthday.length > 0
				&& self.record.address > 0
				&& self.record.email.length > 5
				&& self.record.phone.length > 6
				&& self.record.mobile.length > 9
				&& self.record.gender.length > 3
				&& self.record.status > 0
				&& self.record.area > 0
				&& self.record.headquarters > 0
				&& self.record.salary > 0
				&& self.record.avatar > 0
				&& self.record.salary > 0
			){
				self.error.error = true;
				self.error.message = 'Formulario OK';
				
				if(self.id <= 0){
					api.post('/records/employees', self.record)
					.then(function (c){
						if(c.data > 0){
							self.id = c.data;
							self.$router.push({
								name:'single-details',
								params: {
									employee_id: self.id
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
					api.put('/records/employees/' + self.id, self.record)
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

var SingleDetails = Vue.extend({
	template: '#single-details',
	data(){
		return {
			file: '',
			record: {
				"id": this.$route.params.employee_id,
				"identification_type": {
					"id": 0,
					"name": "",
					"code": ""
				},
				"identification_number": "",
				"expedition": "1950-01-01",
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
				"names": "",
				"surname": "",
				"status_marital": {
					"id": 0,
					"name": ""
				},
				"birthday": "1950-01-01",
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
					"complete": ""
				},
				"email": "",
				"phone": "",
				"mobile": "",
				"gender": "",
				"status": {
					"id": 0,
					"name": ""
				},
				"area": {
					"id": 0,
					"name": "",
					"description": ""
				},
				"headquarters": 0,
				"salary": 0.001,
				"avatar": {
					"id": 0,
					"name": "",
					"description": null,
					"size": 0,
					"data": "",
					"type": "",
					"created": "1950-01-01 00:00:00",
					"updated": "1950-01-01 00:00:00"
				},
				"created": "1950-01-01 00:00:00",
				"updated": "1950-01-01 00:00:00"
			},
			edit: {
			},
			news: {
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
			/*
			self.$root.loadAPI_List('study_levels', {}, function(e){
				self.options.study.levels = e;
			});
			*/
			self.load();
		},
		load(){
			var self = this;
			window.scrollTo(0, 0);
			
			api.get('/records/employees/' + self.$route.params.employee_id, {
				params: {
					join: [
						'pictures',
						'identifications_types',
						'status_marital',
						'geo_departments',
						'geo_citys',
						'addresses',
						'employees_status',
						'employees_areas',
						'headquarters',
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
		deleteThis(){
			var self = this;
			bootbox.confirm({
				message: "Confirma que deseas eliminar este contenido?",
				locale: 'es',
				callback: function (a) {
					if(a !== undefined && a == true){
						api.delete('/records/employees/' + self.$route.params.employee_id)
						.then(function (c){
							if(c.data > 0){
								self.$router.push({
									name:'HomeList',
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

var Edit = Vue.extend({
	template: '#edit-employee',
	data(){
		return {
			options: {
				identifications_types: [],
				status_marital: [],
				accounts_types: [],
				economic_activities: [],
				geo_types_vias: [],
				geo_types_quadrants: [],
				geo_departments: [],
				geo_citys: [],
				employees_status: [],
				employees_areas: [],
				headquarters: [],
				geo: {
					departments: [],
					citys: [],
				},
			},
			id: this.$route.params.employee_id,
			record: {
				"id": this.$route.params.employee_id,
				"identification_type": 0,
				"identification_number": "",
				"expedition": "",
				"department": 0,
				"city": 0,
				"names": "",
				"surname": "",
				"status_marital": 0,
				"birthday": "",
				"address": 0,
				"email": "empleado@sincorreo.com",
				"phone": "57 0 000 0000",
				"mobile": "57 300 000 0000",
				"gender": "",
				"status": 0,
				"area": 0,
				"headquarters": 0,
				"avatar": 168,
				"salary": 0.001,
			},
			error: {
				error: false,
				message: "",
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
		load(){
			var self = this;
			self.$root.loadAPI_Single('employees', self.id, {
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
		loadCitys(){
			var self = this;
			self.options.geo_citys = [];
			if(self.addressNormalize.department !== undefined && self.addressNormalize.department !== null && self.addressNormalize.department > 0){
				
				self.$root.loadAPI_List('geo_citys', {filter: [
					'department,eq,' + self.addressNormalize.department
				]}, function(e){
					self.options.geo_citys = e;
				});
			}
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
				self.options.geo_departments = e;
			});
			self.$root.loadAPI_List('geo_citys', {}, function(e){
				self.options.geo.citys = e;
				self.options.geo_citys = e;
			});
			self.$root.loadAPI_List('accounts_types', {}, function(e){
				self.options.accounts_types = e;
			});
			self.$root.loadAPI_List('economic_activities', {}, function(e){
				self.options.economic_activities = e;
			});
			self.$root.loadAPI_List('geo_types_vias', {}, function(e){
				self.options.geo_types_vias = e;
			});
			self.$root.loadAPI_List('geo_types_quadrants', {}, function(e){
				self.options.geo_types_quadrants = e;
			});
			self.$root.loadAPI_List('employees_status', {}, function(e){
				self.options.employees_status = e;
			});
			self.$root.loadAPI_List('employees_areas', {}, function(e){
				self.options.employees_areas = e;
			});
			self.$root.loadAPI_List('headquarters', {}, function(e){
				self.options.headquarters = e;
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
		},
		validateForm(){			
			var self = this;
			self.error.error = false;
			self.error.message = "";
			console.log("Val. Form");
			if(
				self.record.identification_type > 0
				&& self.record.identification_number.length > 4
				&& self.record.expedition.length > 0
				&& self.record.department > 0
				&& self.record.city > 0
				&& self.record.names.length > 2
				&& self.record.surname.length > 3
				&& self.record.status_marital > 0
				&& self.record.birthday.length > 0
				&& self.record.address > 0
				&& self.record.email.length > 5
				&& self.record.phone.length > 6
				&& self.record.mobile.length > 9
				&& self.record.gender.length > 3
				&& self.record.status > 0
				&& self.record.area > 0
				&& self.record.headquarters > 0
				&& self.record.salary > 0
				&& self.record.avatar > 0
				&& self.record.salary > 0
			){
				
				if(self.id > 0){
					api.put('/records/employees/' + self.id, self.record)
					.then(function (c){
						if(c.data > 0){
							self.$router.push({
								name:'single-details',
								params: {
									employee_id: self.id
								}
							});
							return true;
						}
					})
					.catch(function (e) {
						self.error.error = true;
						self.error.message = 'Error';
						console.error(e);
						console.log(e.response);
						return false;
					});
				} else {
					self.error.error = true;
					self.error.message = 'Formulario OK';
					console.error('ID NO DETECT');
				}
			} else {
				self.error.error = true;
				self.error.message = 'Formulario incompleto';
			}
		},
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
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: HomeList, name: 'HomeList' },
		{ path: '/create/', component: Create, name: 'CreateEmployee' },
		{ path: '/view-single/:employee_id', component: SingleDetails, name: 'single-details' },
		{ path: '/edit/:employee_id', component: Edit, name: 'Edit' },
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
		init_DataTables_Employees() {
			// console.log(('run_datatables');
			if( typeof ($.fn.DataTable) === 'undefined'){ return; }
			// console.log(('init_DataTables');
			/*
			var handleDataTableButtons = function() {
			  if ($("#datatable-employees").length) {
				$("#datatable-employees").DataTable({
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
			*/
		},
	}
}).$mount('#employees-app');

</script>