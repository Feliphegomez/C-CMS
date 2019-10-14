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
					<h2>table <small>Listado</small></h2>
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
							<td>{{ record.name }}</td>
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
				<h2><?= $table; ?> <small>Nuevo</small></h2>
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
				<form > <!-- // v-on:submit="createRecord" -->
					<div class="form-group">
						<label>Nombre</label>
						<input class="form-control" id="key" /> <!-- // v-model="record[key]"  -->
					</div>
					<div class="form-group">
						<label>Objetivo</label>
						<textarea class="form-control" id="key"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
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
				<h2>{{ subject }} <small>Viendo</small></h2>
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
				<p v-if="record===null">Loading...</p>
				<ul v-else>
					<template v-for="(value, key) in record">
						<li v-if="key !== 'created' && key !== 'created' key !== 'updated' key !== 'created'"><b>{{ key }}</b>: {{ value }}</li>
					</template>
					<template v-if="record.path_short !== undefined">
						<li><a target="_blank" :href="record.path_short" class="btn btn-sm btn-info	"><i class="fa fa-link"></i></a></li>
					</template>
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

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: Home},
		{ path: '/create', component: Add, name: 'Add'},
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
