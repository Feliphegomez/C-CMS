<div id="app">
<div class="page-title">
	<div class="title_left">
		<h3>Correo Electronico 
			<template v-if="folder != undefined">
				<small>{{ folder }}</small>
			</template>
		</h3>
	</div>
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
						<router-link v-for="(mail, index_mail) in list_mails" v-bind:to="{ name: 'View', params: { index: index_mail, mail_id: mail.id } }" tag="a" class="mail_list" :key="mail.id">
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
									<h3>{{ mail.from.replace(/<\/?[^>]+(>|$)/g, '').slice(0,23) }} {{ (mail.from.length > 23) ? "..." : "" }} <small> {{ mail.date }}</small></h3>
									<p>{{ mail.subject.replace(/<\/?[^>]+(>|$)/g, '').slice(0,25) }} - Leer Más</p>
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

<!-- compose -->
<div class="compose col-sm-6 col-xs-12">
  <div class="compose-header">
	New Message
	<button type="button" class="close compose-close">
	  <span>×</span>
	</button>
  </div>

  <div class="compose-body">
	<div id="alerts"></div>

	<div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
	  <div class="btn-group">
		<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
		<ul class="dropdown-menu">
		</ul>
	  </div>

	  <div class="btn-group">
		<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size">
			<i class="fa fa-text-height"></i>&nbsp;
			<b class="caret"></b>
		</a>
		<ul class="dropdown-menu">
		  <li>
			<a data-edit="fontSize 5">
			  <p style="font-size:17px">Huge</p>
			</a>
		  </li>
		  <li>
			<a data-edit="fontSize 3">
			  <p style="font-size:14px">Normal</p>
			</a>
		  </li>
		  <li>
			<a data-edit="fontSize 1">
			  <p style="font-size:11px">Small</p>
			</a>
		  </li>
		</ul>
	  </div>

	  <div class="btn-group">
		<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
		<a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
		<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
		<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
	  </div>

	  <div class="btn-group">
		<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
		<a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
		<a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
		<a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
	  </div>

	  <div class="btn-group">
		<a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
		<a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
		<a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
		<a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
	  </div>

	  <div class="btn-group">
		<a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
		<div class="dropdown-menu input-append">
		  <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
		  <button class="btn" type="button">Add</button>
		</div>
		<a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
	  </div>

	  <div class="btn-group">
		<a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
		<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
	  </div>

	  <div class="btn-group">
		<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
		<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
	  </div>
	</div>

	<div id="editor" class="editor-wrapper"></div>
  </div>

  <div class="compose-footer">
	<button id="send" class="btn btn-sm btn-success" type="button">Send</button>
  </div>
</div>
<!-- /compose -->
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
				<div class="col-sm-8" style="zoom: 0.9;">
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
						<button @click="$root.changeFolder(mail.id, $root.ref, 'trash')" class="btn btn-sm btn-danger" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Eliminar" v-if="mail.deleted == 0" >
							<i class="fa fa-trash-o"></i>
						</button>
					</div>
				</div>
				<div class="col-sm-4 text-right">
					<template v-if="mail.date !== undefined">
						<p class="date"> {{ mail.date }}</p>
					</template>
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
					<br />
				<div class="attachment" v-if="mail.attachments.length > 0">
					<p>
						<span><i class="fa fa-paperclip"></i> {{ mail.attachments.length }} Ajuntos — </span>
						<!-- // <a href="#">Download all attachments</a> | <a href="#">View all images</a> -->						
					</p>
					<ul>
						<li v-for="attachment, index) in (mail.attachments)">
							<!--// 
							<a href="#" class="atch-thumb">
								<img src="/public/assets/images/inbox.png" alt="img" />
							</a>
							-->
							<!-- // <div class="file-name">{{ attachment.name.replace(/<\/?[^>]+(>|$)/g, '').slice(0,25) }}</div> -->
							<!-- <span>12KB</span> -->
							<div class="links">
								<a target="_blank" :href="attachment.path_short" download>
									<b>{{ attachment.name.replace(/<\/?[^>]+(>|$)/g, '').slice(0,25) }}</b>
									<br />Descargar
								</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</template>
			<div class="view-mail">
				<br />
				<iframe frameborder="0" width="100%" style="height:auto;min-height:calc(50vh)" :src="'/index.php?controller=site&action=My_email_body&ref=14&email_id=' + mail.id"></iframe>
				
				<!-- // 
				<template v-if="mail.message !== undefined">
					<div v-html="mail.message"></div>
				</template>
				-->
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
		}
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
			console.log('loadMail', self.$route.params.mail_id);
			// $root.changeFolder(mail.id, $root.ref, 'seen')
			api.get('/index.php', {
				params: {
					"controller": "site",
					"action": "my_email_id",
					"ref": <?= $ref; ?>,
					"message_id": self.$route.params.mail_id
				}
			})
			.then(function (r) {
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
				"ref": <?= $ref; ?>,
				"folder": "<?= $filter; ?>",
			};
			
			api.get('/index.php', { params: query })
			.then(function (r) {
				if(r.data !== undefined){
					if(r.data.error !== undefined && r.data.error == false){
						self.list_mails = r.data.records;
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
