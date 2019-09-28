<div id="app">
	<div class="page-title">
		<div class="title_left">
			<h3>Correo Electronico 
				<template v-if="folder != undefined">
					<small>{{ folder }}</small>
				</template>
			</h3>
		</div>
		
		<!-- //
		<div class="title_right">
			<div class="col-sm-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">Go!</button>
					</span>
				</div>
			</div>
		</div>
		-->
	</div>
	<div class="clearfix"></div>

	<div class="row">
		<div class="col-sm-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><?= $MailerBox->label; ?><small><?= $MailerBox->username; ?></small></h2>
					<!--
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
					-->
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-3 mail_list_column" style="overflow-y:auto; max-height:calc(80vh);min-height: calc(80vh);zoom: 0.8;">
							<button id="compose" class="btn btn-sm btn-success btn-block" type="button"> Redactar </button>
							<router-link v-for="(mail, index_mail) in list_mails" v-bind:to="{ name: 'View-Single', params: { box_id: mail.box, index: index_mail, mail_id: mail.id } }" tag="a" class="mail_list" :key="mail.id">
								<div class="left">
									<template v-if="mail.answered !== undefined && mail.answered === 1">
										<i class="fa fa-share"></i> 
									</template>
									<template v-if="mail.recent !== undefined && mail.recent === 1">
										<i class="fa fa-asterisk"></i>
									</template>
									
									<template v-if="mail.seen !== undefined && mail.seen === 0">
										<i class="fa fa-circle"></i>
									</template>
									<template v-else>
										<i class="fa fa-circle-o"></i>
									</template>
									
									<template v-if="mail.draft !== undefined && mail.draft === 1">
										<i class="fa fa-edit"></i> 
									</template>
									<template v-if="mail.deleted !== undefined && mail.deleted === 1">
										<i class="fa fa-trash"></i> 
									</template>
									<template v-if="mail.attachments !== undefined && mail.attachments.length > 0">
										<i class="fa fa-paperclip"></i> 
									</template>
								</div>
								<div class="right">
									<template v-if="mail.from !== undefined && mail.subject !== undefined">
										<h3>{{ mail.from.replace(/<\/?[^>]+(>|$)/g, '').slice(0,22) }}{{ (mail.from.length > 23) ? "..." : "" }}<small> {{ mail.date }}</small></h3>
										<p>{{ mail.subject.replace(/<\/?[^>]+(>|$)/g, '').slice(0,17) }} - Leer Más</p>
									</template>
								</div>
							</router-link>
						</div>
						<div style="overflow-y:auto; max-height:100%;min-height:100%;" class="col-sm-9 mail_view" style="overflow:auto;max-height:calc(80vh);min-height: calc(80vh);">
							<router-view :key="$route.fullPath"></router-view>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<template id="home">
  <div>
      HOME
  </div>
</template>

<template id="view">
	<div>
		<div class="inbox-body">
			<div class="mail_heading row">
				<div class="col-sm-7" style="zoom: 0.9;">
					<div class="btn-group">
						<!-- // <button class="btn btn-sm btn-primary" type="button" v-if="mail.draft == 0 && mail.deleted == 0"><i class="fa fa-reply"></i> Responder</button> -->
						
						<button @click="$root.changeFolder(mail.id, $root.ref, 'seen')" class="btn btn-sm btn-default" data-original-title="Marcar como leído" v-if="mail.seen == 0 && mail.draft == 0 && mail.deleted == 0" type="button" data-placement="top" data-toggle="tooltip" type="button">
							<i class="fa fa-check-circle"></i> Marcar como leído
						</button>
						<button @click="$root.changeFolder(mail.id, $root.ref, 'not_seen')" class="btn btn-sm btn-default" data-original-title="Marcar como no leído" v-if="mail.seen == 1 && mail.draft == 0 && mail.deleted == 0" type="button" data-placement="top" data-toggle="tooltip" type="button">
							<i class="fa fa-check-circle-o"></i> Marcar como no leído
						</button>
						
						<!-- // <button class="btn btn-sm btn-success" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Reenvíar" v-if="mail.draft == 0 && mail.deleted == 0">
							<i class="fa fa-share"></i> Reenvíar
						</button>
						-->
						
						<button class="btn btn-sm btn-dark" type="button" onclick="window.print();" title="Imprimir">
							<i class="fa fa-print"></i> 
						</button>


						<button @click="$root.changeFolder(mail.id, $root.ref, 'not_seen')" class="btn btn-sm btn-default" data-original-title="Marcar como no leído" v-if="mail.deleted == 1" type="button" data-placement="top" data-toggle="tooltip" type="button">
							<i class="fa fa-inbox"></i> Sacar de la papelera
						</button>
						

						<button @click="$root.changeFolder(mail.id, $root.ref, 'trash')" class="btn btn-sm btn-warning" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Eliminar" v-if="mail.deleted == 0" >
							<i class="fa fa-trash-o"></i>
						</button>
					</div>
				</div>
				<div class="col-sm-5 text-right">
					<template v-if="mail.date !== undefined">
						<a :href="$root.urlBodyEmail" class="btn btn-xs btn-default pull-right" target="_blank" v-if="mail.draft == 0 && mail.deleted == 0">
							<i class="fa fa-external-link"></i> 
						</a>
					</template>
				</div>
				
				<div class="col-sm-7" style="zoom: 0.9;"></div>
				<div class="col-sm-5 text-right">
					<template v-if="mail.date !== undefined"><p class="date"> {{ mail.date }} .</p> </template>
				</div>
				
				
				<div class="col-sm-12">
					<template v-if="mail.subject !== undefined">
						<h4>{{ mail.subject }}</h4>
					</template>
				</div>
			</div>
			<div class="sender-info">
				<div class="row">
					<div class="col-sm-12">
						<!--
						<template v-if="mail.from_email !== undefined">
							<strong>{{ mail.from_email }}</strong>
						</template>
						-->
						<template v-if="mail.from !== undefined">
							<span>{{ mail.from }}</span> para <strong>{{ mail.to }}</strong>
						</template>
						<a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
					</div>
					<br />
				</div>
				<div class="clearfix"></div>
			</div>
						
			
			
			<template v-if="mail.attachments !== undefined">
				<div class="attachment" v-if="mail.attachments.length > 0">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="fa fa-paperclip"></i> Archivos Adjuntos ({{ mail.attachments.length }})
							</h3>
						</div>
						<ul class="list-group" style="zoom:0.8">
							
							<a :href="attachment.path_short" download class="list-group-item " v-for="attachment, index) in (mail.attachments)">
							{{ attachment.name.replace(/<\/?[^>]+(>|$)/g, '').slice(0,25) }} - <b>Clic para descargar</b>
							</a>
							
						</ul>
					</div>
				</div>
				<div v-else>
				<br />
				</div>
				<div class="clearfix"></div>
			</template>
			<div class="view-mail">
				<!-- // 
				-->
				<template v-if="mail.message !== undefined">
					<template v-if="mail.isHtml == true">
						<div style="border: #666 0.25px dashed; zoom:0.8;padding:24px;">
							<!-- //  -->
							<!-- // <div v-html="mail.message"></div> -->
							<iframe frameborder="0" width="100%" style="height:auto;min-height:calc(68vh)" :src="$root.urlBodyEmail" :key="mail.id"></iframe>
						</div>
					</template>
					<template v-else>
						<div style="border: #666 0.25px dashed; zoom:0.8;padding:24px;">
							<pre v-html="mail.message"></pre>
							<!-- // <iframe frameborder="0" width="100%" style="height:auto;min-height:calc(50vh)" :src="$root.urlBodyEmail" :key="mail.id"></iframe> -->
						</div>
					</template>
				</template>
				<br />				
			</div>
			
			
			<!-- // 
			<div class="btn-group">
				<button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply</button>
				<button class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Forward"><i class="fa fa-share"></i></button>
				<button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
				<button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
				<br />
			</div>
			-->
		</div>
	  <hr>
  </div>
</template>

<script>
const api = axios.create({
  baseURL: '/',
  timeout: 60000,
  headers: {'X-Custom-Header': 'foobar'}
});
api.interceptors.response.use(function (response) {
  if (response.headers['x-xsrf-token']) {
	document.cookie = 'XSRF-TOKEN=' + response.headers['x-xsrf-token'] + '; path=/';
  }
  return response;
});

var Home = Vue.extend({
	template: '#home',
	data() {
		return {
			mails: this.$root.list_mails
		};
	},
	created() {
		
	},
	methods: {
		
	}
});
var View = Vue.extend({
	template: '#view',
	data() {
		return {
			
		};
	},
	created() {
		var self = this;
	},
	mounted() {
		var self = this;
		self.$root.loadMail();
	},
	computed: {
		mail(){
			return this.$root.email_single;
		},
	},
	methods: {
		unescape(unsafe){
			return window.unescape(unsafe);
		},
		translateAttachments(attachments){
			return JSON.parse(attachments);
		},
	}
});

var router = new VueRouter({
	routes:[
		{ path: '/', component: Home, name: 'Home' },
		{ path: '/view/:mail_id-:index', component: View, name: 'View' },
		{ path: '/view/:box_id/:mail_id-:index', component: View, name: 'View-Single' },
	]
});

app = new Vue({
	router: router,
	data: function () {
		return {
			ref: <?= $ref; ?>,
			folder: '<?= $filter; ?>',
			list_mails: [],
			options: {},
			email_single: {}
		};
	},
	computed: {
		urlBodyEmail(){
			var self = this;
			return '/index.php?controller=site&action=My_email_body&ref=<?= $ref; ?>&email_id=' + self.$route.params.mail_id;
		}
	},
	mounted(){
		var self = this;
	},
	created() {
		var self = this;
		self.loadList();
	},
	methods: {
		loadMail(){
			var self = this;
			console.log('index', self.$route.params.index);
			console.log('mail_id', self.$route.params.mail_id);
			console.log('box_id', self.$route.params.box_id);
			// $root.changeFolder(mail.id, $root.ref, 'seen')
			api.get('/index.php', {
				params: {
					"controller": "site",
					"action": "my_email_id",
					"ref": self.$route.params.box_id >= 0 ? self.$route.params.box_id : <?= $ref; ?>,
					"message_id": self.$route.params.mail_id
				}
			})
			.then(function (r) {
				console.log('r', r);
				if(r.data !== undefined){
					if(r.data.error !== undefined && r.data.error == false){
						self.email_single = r.data.record;
						console.log(self.email_single);
					}
				}else{
					console.log('error');
				}
			})
			.catch(function (error) {
				console.log(error);
			});
		},
		loadList(){
			var self = this;
			console.log('solicitando datos');
			var query = {
				"controller": "site",
				"action": "my_email_list",
				"ref": self.$route.params.box_id >= 0 ? self.$route.params.box_id : <?= $ref; ?>,
				"folder": "<?= $filter; ?>",
			};
			
			api.get('/index.php', { params: query })
			.then(function (r) {
				if(r.data !== undefined){
					if(r.data.error !== undefined && r.data.error == false){
						self.list_mails = r.data.records;
						if(self.$route.params.mail_id != undefined){
							self.loadMail();
						}
					}
				}else{
					console.error('error');
				}
			})
			.catch(function (error) {
				console.log(error);
			});
		},
		changeFolder(mail_id, box_id, folder){
			var self = this;
			api.get('/index.php', { 
				params: {
					controller: 'site',
					action: 'my_email_change_status',
					id: mail_id,
					ref: box_id,
					folder: folder
				}
			})
			.then(function (r) {
				if(r.data !== undefined){
					if(r.data.error !== undefined && r.data.error == false){
						self.loadMail();
						self.loadList();
						return true;
					}else{
						// console.error('error');
						return false;
					}
				}else{
					// console.error('error');
					return false;
				}
			})
			.catch(function (error) {
				console.log(error);
				return false;
			});
		}
	}
}).$mount('#app');
</script>
