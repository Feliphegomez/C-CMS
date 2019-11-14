<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/
?>
<div class="page-title">
	<div class="title_left">
		<h3><?= isset($title) ? $title : ""; ?> <small> <?= isset($subtitle) ? $subtitle : ""; ?></small></h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row" id="budgets-app">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<router-view :key="$route.fullPath" ></router-view>
	</div>
</div>
<div class="clearfix"></div>

<style scope="menu">
	.list-group-horizontal .list-group-item {
		display: inline-block;
	}
	.list-group-horizontal .list-group-item {
		margin-bottom: 0;
		margin-left:-4px;
		margin-right: 0;
	}
	.list-group-horizontal .list-group-item:first-child {
		border-top-right-radius:0;
		border-bottom-left-radius:4px;
	}
	.list-group-horizontal .list-group-item:last-child {
		border-top-right-radius:4px;
		border-bottom-left-radius:0;
	}
</style>
<template id="menu">
	<div>
		<div class="row" style="padding-top:50px;display:none;">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-12 text-center">
				<nav v-if="subjects!==null" class="list-group list-group-horizontal">
					<router-link tag="a" v-for="subject in subjects" v-bind:to="{name: 'List', params: {subject: subject.name}}" class="list-group-item " :key="subject.name">
						{{ subject.name }}
					</router-link>
				</nav>
			</div>
		</div>
	</div>
</template>

<template id="home">
	<div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Presupuesto <small>Listado</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li>
							<router-link  v-bind:to="{ name: 'Add' }">
								<i class="fa fa-plus"></i>
							</router-link>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				
				<div class="x_content table-responsive">
					<p v-if="list === null">Loading...</p>
					<table v-else class="table">
						<thead>
							<tr>
							  <th>ID</th>
							  <th>Nombre</th>
							  <th>Objetivo</th>
							  <th>Total</th>
							  <th></th>
							</tr>
						</thead>
					  <tbody>
						<tr v-if="list.length == 0">
						  <td colspan="5" style="padding: 6px; white-space: nowrap;">
							No hay registros
						  </td>
						</tr>
						<tr v-for="record in list" v-else>
							<td>{{ record.id }}</td>
							<td>
                <router-link tag="a" v-bind:to="{ name: 'View', params: { budget_id: record.id } }" >
                  {{ record.name }}
                </router-link>
              </td>
							<td>{{ record.objective }}</td>
							<td>{{ record.total }}</td>
							  <td style="padding: 6px; white-space: nowrap;">
							  </td>
						</tr>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>

<template id="create">
  <div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Presupuesto <small>Nuevo</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li>
						<router-link v-bind:to="{ name: 'Home' }">
							<i class="fa fa-times"></i>
						</router-link>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<h2>Crear - add</h2>
				<form action="javascript: return false;" method="POST">
					<div class="form-group">
						<label>Nombre</label>
						<input v-model="form.name" required="" class="form-control" /> <!-- // v-model="record[key]"  -->
					</div>
					<div class="form-group">
						<label>Objetivo</label>
						<textarea v-model="form.objective" class="form-control"></textarea>
					</div>
					<button @click="createRecord" v-on:submit="createRecord" type="submit" class="btn btn-primary">Create</button>
					<!-- // <router-link class="btn btn-primary" v-bind:to="{name: 'List', params: {subject: subject}}">Cancel</router-link> -->
				</form>
			</div>
		</div>
	</div>
  </div>
</template>

<template id="view">
  <div>
    <div class="col-md-12 col-sm-12 col-xs-12">
    
      <div class="x_panel">
        <div class="x_title">
          <h2>Presupuesto <small>Viendo</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a></li>
                <li><a href="#">Settings 2</a></li>
              </ul>
            </li>
            <li>
              <router-link v-bind:to="{ name: 'Home' }">
                <i class="fa fa-times"></i>
              </router-link>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <p v-if="record===null">Loading...</p>
          <ul v-else>
          <div>
            <!-- // INICIO -->
            <div class="col-md-9 col-sm-9 col-xs-12">
              <ul class="stats-overview">
                <li>
                  <span class="name">Presupuesto estimado </span>
                  <span class="value text-success"> 2300 </span>
                </li>
                <li>
                  <span class="name">Cantidad total gastada </span>
                  <span class="value text-success"> 2000 </span>
                </li>
                <li class="hidden-phone">
                  <span class="name">Duración estimada del proyecto </span>
                  <span class="value text-success"> 20 </span>
                </li>
              </ul>
              <br />
              <div id="mainb" style="height:350px;"></div>
              <div>
                <h4>Última Actividad</h4>
                <!-- end of user messages -->
                <ul class="messages">
                  <li>
                    <img src="/public/assets/images/img.jpg" class="avatar" alt="Avatar">
                    <div class="message_date">
                      <h3 class="date text-info">24</h3>
                      <p class="month">May</p>
                    </div>
                    <div class="message_wrapper">
                      <h4 class="heading">Desmond Davison</h4>
                      <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                      <br />
                      <p class="url">
                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                        <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                      </p>
                    </div>
                  </li>
                  
                  
                <li>
                <img src="/public/assets/images/img.jpg" class="avatar" alt="Avatar">
                <div class="message_date">
                  <h3 class="date text-error">21</h3>
                  <p class="month">May</p>
                </div>
                <div class="message_wrapper">
                  <h4 class="heading">Brian Michaels</h4>
                  <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                  <br />
                  <p class="url">
                  <span class="fs1" aria-hidden="true" data-icon=""></span>
                  <a href="#" data-original-title="">Download</a>
                  </p>
                </div>
                </li>
                <li>
                <img src="/public/assets/images/img.jpg" class="avatar" alt="Avatar">
                <div class="message_date">
                  <h3 class="date text-info">24</h3>
                  <p class="month">May</p>
                </div>
                <div class="message_wrapper">
                  <h4 class="heading">Desmond Davison</h4>
                  <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                  <br />
                  <p class="url">
                  <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                  <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                  </p>
                </div>
                </li>
              </ul>
              <!-- end of user messages -->


              </div>


            </div>

            <!-- start project-detail sidebar -->
            <div class="col-md-3 col-sm-3 col-xs-12">

              <section class="panel">

              <div class="x_title">
                <h2>Descripcion del projecto</h2>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <h3 class="green"><i class="fa fa-paint-brush"></i> Gentelella</h3>
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                <br />

                <div class="project_detail">
                <p class="title">Líder del proyecto</p>
                <p>Tony Chicken</p>
                </div>

                <br />
                <h5>Archivos del proyecto</h5>
                <ul class="list-unstyled project_files">
                <li><a href=""><i class="fa fa-file-word-o"></i> Functional-requirements.docx</a>
                </li>
                <li><a href=""><i class="fa fa-file-pdf-o"></i> UAT.pdf</a>
                </li>
                <li><a href=""><i class="fa fa-mail-forward"></i> Email-from-flatbal.mln</a>
                </li>
                <li><a href=""><i class="fa fa-picture-o"></i> Logo.png</a>
                </li>
                <li><a href=""><i class="fa fa-file-word-o"></i> Contract-10_12_2014.docx</a>
                </li>
                </ul>
                <br />

                <div class="text-center mtop20">
                <a href="#" class="btn btn-sm btn-primary">Añadir archivos</a>
                <a href="#" class="btn btn-sm btn-danger">Añadir gastos</a>
                </div>
              </div>

              </section>

            </div>
            <!-- end project-detail sidebar -->

            </div>
            <!-- // FIN    -->
          </div>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<template id="update">
  <div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?= $table; ?> <small>Listado</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a></li>
							<li><a href="#">Settings 2</a></li>
						</ul>
					</li>
					<li>
						<router-link v-bind:to="{name: 'List', params: {subject: subject}}">
							<i class="fa fa-times"></i>
						</router-link>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content table-responsive">
				<h2>{{ subject }} - edit</h2>
				<p v-if="record===null">Loading...</p>
				<form v-else v-on:submit="updateRecord">
				  <template v-for="(value, key) in record">
					<div class="form-group">
					  <label v-bind:for="key">{{ key }}</label>
					  <input v-if="references[key] === false" class="form-control" v-bind:id="key" v-model="record[key]" :disabled="key === primaryKey" />
					  <select v-else-if="!options[references[key]]" class="form-control" disabled>
						<option value="" selected>Loading...</option>
					  </select>
					  <select v-else class="form-control" v-bind:id="key" v-model="record[key]">
						<option value=""></option>
						<option v-for="option in options[references[key]]" v-bind:value="option.key">{{ option.value }}</option>
					  </select>
					</div>
				  </template>
				  <button type="submit" class="btn btn-primary">Save</button>
				  <router-link class="btn btn-secondary" v-bind:to="{name: 'List', params: {subject: subject}}">Cancel</router-link>
				</form>
			</div>
		</div>
	</div>
  </div>
</template>

<template id="delete">
  <div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>{{ subject }} <small></small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a></li>
							<li><a href="#">Settings 2</a></li>
						</ul>
					</li>
					<li>
						<router-link v-bind:to="{name: 'List', params: {subject: subject}}">
							<i class="fa fa-times"></i>
						</router-link>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form v-on:submit="deleteRecord">
					<p>Se va a proceder a eliminar el registro con #{{ id }}</p>
					<button type="submit" class="btn btn-danger">ELIMINAR</button>
					<router-link class="btn btn-secondary" v-bind:to="{name: 'List', params: {subject: subject}}">Cancelar</router-link>
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

var Home = Vue.extend({
	template: '#home',
	data(){
		return {
			list: null
		};
	},
	mounted: function () {
		var self = this;
		api.get('/records/budgets').then(function (response) {
		  console.log('response.data', response.data);
		  self.list = response.data.records;
		  //router.push({name: 'List', params: {subject: "<?= $table; ?>"}});
		}).catch(function (error) {
		  console.log(error);
		});
	}
});

var Add = Vue.extend({
	template: '#create',
	data(){
		return {
			form: {
				name: "",
				objective: "",
			}
		};
	},
	mounted: function () {
		var self = this;
	},
	methods: {
		createRecord(){
			var self = this;
			message = "";
			
			  var Notice = new PNotify({
				styling: "bootstrap3",
				text: 'Validando...',
				icon: 'fa fa-spinner fa-pulse',
				hide: false,
				shadow: false,
				width: '200px',
			  });
			  
							
			  if(self.form.name.length > 0){
				console.log('Enviando... ', self.form.name);
				Notice.update({
				  text: 'Guardando...',
				  icon: 'fa fa-spinner fa-pulse',
				  hide: false,
				  shadow: false,
				  width: '200px',
				});
        
				
				api.post('/api.php/records/budgets', {
					name: self.form.name,
					objective: self.form.objective,
					create_by: <?= $this->user->id; ?>,
				})
				.then(function (r) {
					console.log(r);
					if(r.data > 0){
						Notice.update({
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
					} else {
						Notice.update({
							title: 'Error',
							text: 'Error',
							icon: 'fa fa-times',
							hide: true,
							shadow: true,
						});
					};
				})
				.catch(function (error) {
						Notice.update({
							title: 'Error2',
							text: 'Error2',
							icon: 'fa fa-times',
							hide: true,
							shadow: true,
						});
				});
      } else {
        console.log('name', self.form.name);
        console.log('objective', self.form.objective	);
        
        Notice.update({
          title: 'Error',
          text: 'Datos incompletos',
          icon: 'fa fa-times',
          hide: true,
          shadow: true,
        });
      }
			return false;
		}
	},
});

var View = Vue.extend({
	template: '#view',
	data(){
		return {
			record: null
		};
	},
	mounted: function () {
		var self = this;
		api.get('/records/budgets/' + self.$route.params.budget_id, {
      params: {
        join: [
          'budgets_history'
        ]
      }
    }).then(function (response) {
		  console.log(response);
		  self.record = response.data.record;
		}).catch(function (error) {
		  console.log(error);
		});
	},
	methods: {
	},
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: Home, name: 'Home' },
		{ path: '/create', component: Add, name: 'Add'},
		{ path: '/view/:budget_id', component: View, name: 'View'},
	]
});

app = new Vue({
	router: router,
	data: function () {
		return {
			
		};
	}
}).$mount('#budgets-app');
</script>
