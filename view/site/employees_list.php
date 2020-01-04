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
					<table id="datatable-employees" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Tipo Doc.</th>
								<th>Doc. Identidad</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Correo Electronico</th>
								<th>Edad</th>
								<th>Area</th>
								<th>Salario</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>CC</td>
								<td>00002214515</td>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>2011/04/25</td>
								<td>$320,800</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</div>
</template>

<template id="create-employee">
	<div>
		<div class="col-md-12 col-sm-12 col-xs-12">
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
					<form class="form-horizontal form-label-left"  action="javascript:false" v-on:submit="validateForm" method="POST">
						<p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a></p>
						<span class="section">Personal Info</span>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_type">Tipo de Documento <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select data-validate-length-range="0"  id="identification_type" required="required" v-model="record.identification_type" class="form-control">
									<option value="">Seleccione una opcion</option>
									<option v-for="(type, index_type) in options.identifications_types" :value="type.id">{{ type.name }}</option>
								</select>
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_number"># Documento <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input v-model="record.identification_number" id="identification_number" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" data-validate-words="1" name="identification_number" placeholder="Numero del documento" required="required" type="text">
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="names">Nombre(s) <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input v-model="record.names" id="names" class="form-control col-md-7 col-xs-12" data-validate-length-range="3" data-validate-words="1" name="names" placeholder="Nombre(s)" required="required" type="text">
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="surname">Apellido(s) <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input v-model="record.surname" id="surnname" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="surname" placeholder="Apellido(s)" required="required" type="text">
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identification_type">Estado civil <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select data-validate-length-range="0"  id="status_marital" required="required" v-model="record.status_marital" class="form-control">
									<option value="">Seleccione una opcion</option>
									<option v-for="(type, index_type) in options.status_marital" :value="type.id">{{ type.name }}</option>
								</select>
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthday">Fecha Nacim. <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input v-model="record.birthday" id="birthday" class="form-control col-md-7 col-xs-12" name="birthday" required="required" type="date" placeholder="MM/DD/YYYY" >
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Departamento <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select data-validate-length-range="0" @change="loadOptionCityBasic" id="department" required="required" v-model="record.department" class="form-control">
									<option value="">Seleccione una opcion</option>
									<option v-for="(type, index_type) in options.geo.departments" :value="type.id">{{ type.name }}</option>
								</select>
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">Ciudad <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select data-validate-length-range="0" id="city" required="required" v-model="record.city" class="form-control">
									<option value="">Seleccione una opcion</option>
									<option v-for="(type, index_type) in options.geo.citys" :value="type.id">{{ type.name }}</option>
								</select>
							</div>
						</div>
												
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Direccion <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="input-group">
									<input readonly="" v-model="record.address" type="text" class="form-control" required="required" class="form-control">
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
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input v-model="record.email" type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Teléfono Fijo <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input v-model="record.phone" type="phone" id="phone" name="phone" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Teléfono Móvil <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input v-model="record.mobile" type="mobile" id="mobile" name="mobile" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Genero <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select data-validate-length-range="0" id="gender" required="required" v-model="record.gender" class="form-control">
									<option value="X">Seleccione una opcion</option>
									<option value="male">Masculino</option>
									<option value="female">Femenino</option>
								</select>
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Estado <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select data-validate-length-range="0" id="status" required="required" v-model="record.status" class="form-control">
									<option value="">Seleccione una opcion</option>
									<option v-for="(type, index_type) in options.employees_status" :value="type.id">{{ type.name }}</option>
								</select>
							</div>
						</div>						
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirm Email <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="email" id="email2" name="confirm_email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Number <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website URL <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="url" id="website" name="website" required="required" placeholder="www.website.com" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Occupation <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="occupation" type="text" name="occupation" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="item form-group">
							<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
							</div>
						</div>
						
						<div class="item form-group">
							<label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Textarea <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea id="textarea" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
							</div>
						</div>

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<button type="submit" class="btn btn-primary">Cancel</button>
								<button id="send" type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		{{ record }}
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
		self.$root.init_DataTables_Employees();
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
					}
				}
			}).catch(function (error) {
				console.log(error.response);
				self.loading = false;
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
				geo: {
					departments: [],
					citys: [],
				},
			},
			id: 0,
			record: {
				"identification_type": "",
				"identification_number": "",
				"names": "",
				"surname": "",
				"status_marital": "",
				"birthday": "1950-01-01",
				"department": "",
				"city": "",
				"address": "-",
				"email": "cliente@sincorreo.com",
				"phone": "57 0 000 0000",
				"mobile": "57 300 000 0000",
				"gender": "X",
				"status": "",
				"area": "",
				"headquarters": "",
				"start_date": "1950-01-01",
				"end_date": "1950-01-01",
				"photo": 168,
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
			/*
			if(
				self.record.identification_type > 0
				&& self.record.identification_number.length > 0
				&& self.record.names.length > 0
				&& self.record.surname.length > 0
				&& self.record.marital_status > 0
				&& self.record.birthday.length > 0
				&& self.record.department > 0
				&& self.record.city > 0
				&& self.record.address.length > 0
				&& self.record.email.length > 0
				&& self.record.phone.length > 0
				&& self.record.mobile.length > 0
				&& self.record.avatar > 0
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
			*/
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
		resetFormExperience(){
			var self = this;
			self.news.experience = {
				candidate: this.$route.params.candidate_id,
				business: '',
				position: '',
				date_in: '',
				date_out: '',
				functions: '',
			};
		},
		resetFormStudy(){
			var self = this;
			self.news.study = {
				candidate: this.$route.params.candidate_id,
				title: "",
				level: 0,
				status: 0,
			};
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
						self.resetFormExperience();
						$("#form-new-experience")[0].reset();
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
						self.resetFormStudy();
						$("#form-new-study")[0].reset();
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
		{ path: '/', component: HomeList, name: 'HomeList' },
		{ path: '/create/', component: Create, name: 'CreateEmployee' },
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

	$('#datatable-scroller').DataTable({
	  ajax: "js/datatables/json/scroller-demo.json",
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
}).$mount('#employees-app');

</script>