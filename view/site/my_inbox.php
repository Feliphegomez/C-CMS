<style>
.mail-box {
    border-collapse: collapse;
    border-spacing: 0;
    display: table;
    table-layout: fixed;
    width: 100%;
	/* overflow: hidden; */
}
.mail-box aside {
    display: table-cell;
    float: none;
    height: 100%;
    padding: 0;
    vertical-align: top;
}
.mail-box .sm-side {
    background: none repeat scroll 0 0 #e5e8ef;
    border-radius: 4px 0 0 4px;
    width: 25%;
}
.mail-box .lg-side {
    background: none repeat scroll 0 0 #fff;
    border-radius: 0 4px 4px 0;
    width: 75%;
}
.mail-box .sm-side .user-head {
    background: none repeat scroll 0 0 #00a8b3;
    border-radius: 4px 0 0;
    color: #fff;
    min-height: 80px;
    padding: 10px;
}
.user-head .inbox-avatar {
    float: left;
    width: 65px;
}
.user-head .inbox-avatar img {
    border-radius: 4px;
}
.user-head .user-name {
    display: inline-block;
    margin: 0 0 0 10px;
}
.user-head .user-name h5 {
    font-size: 14px;
    font-weight: 300;
    margin-bottom: 0;
    margin-top: 15px;
}
.user-head .user-name h5 a {
    color: #fff;
}
.user-head .user-name span a {
    color: #87e2e7;
    font-size: 12px;
}
.inbox-body {
    padding: 20px;
}
.btn-compose {
    background: none repeat scroll 0 0 #ff6c60;
    color: #fff;
    padding: 12px 0;
    text-align: center;
    width: 100%;
}
.btn-compose:hover {
    background: none repeat scroll 0 0 #f5675c;
    color: #fff;
}
ul.inbox-nav {
    display: inline-block;
    margin: 0;
    padding: 0;
    width: 100%;
}
.inbox-divider {
    border-bottom: 1px solid #d5d8df;
}
ul.inbox-nav li {
    display: inline-block;
    line-height: 45px;
    width: 100%;
}
ul.inbox-nav li a {
    color: #6a6a6a;
    display: inline-block;
    line-height: 45px;
    padding: 0 20px;
    width: 100%;
}
ul.inbox-nav li a:hover, ul.inbox-nav li.active a, ul.inbox-nav li a:focus {
    background: none repeat scroll 0 0 #d5d7de;
    color: #6a6a6a;
}
ul.inbox-nav li a i {
    color: #6a6a6a;
    font-size: 16px;
    padding-right: 10px;
}
ul.inbox-nav li a span.label {
    margin-top: 13px;
}
ul.labels-info li h4 {
    color: #5c5c5e;
    font-size: 13px;
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 5px;
    text-transform: uppercase;
}
ul.labels-info li {
    margin: 0;
}
ul.labels-info li a {
    border-radius: 0;
    color: #6a6a6a;
}
ul.labels-info li a:hover, ul.labels-info li a:focus {
    background: none repeat scroll 0 0 #d5d7de;
    color: #6a6a6a;
}
ul.labels-info li a i {
    padding-right: 10px;
}
.nav.nav-pills.nav-stacked.labels-info p {
    color: #9d9f9e;
    font-size: 11px;
    margin-bottom: 0;
    padding: 0 22px;
}
.inbox-head {
    background: none repeat scroll 0 0 #34495e;
    border-radius: 0 4px 0 0;
    color: #fff;
    min-height: 80px;
    padding: 20px;
	overflow: hidden;
}
.inbox-head h3 {
    display: inline-block;
    font-weight: 300;
    margin: 0;
    padding-top: 6px;
}
.inbox-head .sr-input {
    border: medium none;
    border-radius: 4px 0 0 4px;
    box-shadow: none;
    color: #8a8a8a;
    float: left;
    height: 40px;
    padding: 0 10px;
}
.inbox-head .sr-btn {
    background: none repeat scroll 0 0 #00a6b2;
    border: medium none;
    border-radius: 0 4px 4px 0;
    color: #fff;
    height: 40px;
    padding: 0 20px;
}
.table-inbox {
    border: 1px solid #d3d3d3;
    margin-bottom: 0;
}
.table-inbox tr td {
    padding: 12px !important;
}
.table-inbox tr td:hover {
    cursor: pointer;
}
.table-inbox tr td .fa-star.inbox-started, .table-inbox tr td .fa-star:hover {
    color: #f78a09;
}
.table-inbox tr td .fa-star {
    color: #d5d5d5;
}
.table-inbox tr.unread td {
    background: none repeat scroll 0 0 #f7f7f7;
    font-weight: 600;
}
ul.inbox-pagination {
    float: right;
}
ul.inbox-pagination li {
    float: left;
}
.mail-option {
    display: inline-block;
    margin-bottom: 10px;
    width: 100%;
}
.mail-option .chk-all, .mail-option .btn-group {
    margin-right: 5px;
}
.mail-option .chk-all, .mail-option .btn-group a.btn {
    background: none repeat scroll 0 0 #fcfcfc;
    border: 1px solid #e7e7e7;
    border-radius: 3px !important;
    color: #afafaf;
    display: inline-block;
    padding: 5px 10px;
}
.inbox-pagination a.np-btn {
    background: none repeat scroll 0 0 #fcfcfc;
    border: 1px solid #e7e7e7;
    border-radius: 3px !important;
    color: #afafaf;
    display: inline-block;
    padding: 5px 15px;
}
.mail-option .chk-all input[type="checkbox"] {
    margin-top: 0;
}
.mail-option .btn-group a.all {
    border: medium none;
    padding: 0;
}
.inbox-pagination a.np-btn {
    margin-left: 5px;
}
.inbox-pagination li span {
    display: inline-block;
    margin-right: 5px;
    margin-top: 7px;
}
.fileinput-button {
    background: none repeat scroll 0 0 #eeeeee;
    border: 1px solid #e6e6e6;
}
.inbox-body .modal .modal-body input, .inbox-body .modal .modal-body textarea {
    border: 1px solid #e6e6e6;
    box-shadow: none;
}
.btn-send, .btn-send:hover {
    background: none repeat scroll 0 0 #00a8b3;
    color: #fff;
}
.btn-send:hover {
    background: none repeat scroll 0 0 #009da7;
}
.modal-header h4.modal-title {
    font-family: "Open Sans",sans-serif;
    font-weight: 300;
}
.modal-body label {
    font-family: "Open Sans",sans-serif;
    font-weight: 400;
}
.heading-inbox h4 {
    border-bottom: 1px solid #ddd;
    color: #444;
    font-size: 18px;
    margin-top: 20px;
    padding-bottom: 10px;
}
.sender-info {
    margin-bottom: 20px;
}
.sender-info img {
    height: 30px;
    width: 30px;
}
.sender-dropdown {
    background: none repeat scroll 0 0 #eaeaea;
    color: #777;
    font-size: 10px;
    padding: 0 3px;
}
.view-mail a {
    color: #ff6c60;
}
.attachment-mail {
    margin-top: 30px;
}
.attachment-mail ul {
    display: inline-block;
    margin-bottom: 30px;
    width: 100%;
}
.attachment-mail ul li {
    float: left;
    margin-bottom: 10px;
    margin-right: 10px;
    width: 150px;
}
.attachment-mail ul li img {
    width: 100%;
}
.attachment-mail ul li span {
    float: right;
}
.attachment-mail .file-name {
    float: left;
}
.attachment-mail .links {
    display: inline-block;
    width: 100%;
}

.fileinput-button {
    float: left;
    margin-right: 4px;
    overflow: hidden;
    position: relative;
}
.fileinput-button input {
    cursor: pointer;
    direction: ltr;
    font-size: 23px;
    margin: 0;
    opacity: 0;
    position: absolute;
    right: 0;
    top: 0;
    transform: translate(-300px, 0px) scale(4);
}
.fileupload-buttonbar .btn, .fileupload-buttonbar .toggle {
    margin-bottom: 5px;
}
.files .progress {
    width: 200px;
}
.fileupload-processing .fileupload-loading {
    display: block;
}
* html .fileinput-button {
    line-height: 24px;
    margin: 1px -3px 0 0;
}
* + html .fileinput-button {
    margin: 1px 0 0;
    padding: 2px 15px;
}
@media (max-width: 767px) {
.files .btn span {
    display: none;
}
.files .preview * {
    width: 40px;
}
.files .name * {
    display: inline-block;
    width: 80px;
    word-wrap: break-word;
}
.files .progress {
    width: 20px;
}
.files .delete {
    width: 60px;
}
}
ul {
    list-style-type: none;
    /* padding: 0px; */
    /* margin: 0px; */
}
 
</style>

<div id="app">
	<div>
		<div class="row">
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
				<nav class="navbar navbar-default" role="navigation">
					<!-- El logotipo y el icono que despliega el menú se agrupan para mostrarlos mejor en los dispositivos móviles -->
					<div class="navbar-header bg-info">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Desplegar navegación</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand" style="height:100px;max-height:100px;zoom:0.7;">
							<div class="mail-box">
								<div class="user-name">
									<div class="btn-group mail-dropdown pull-right">
										<a class="mail-dropdown pull-right dropdown-toggle" href="javascript:;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fa fa-chevron-down"></i>
										</a>
										<ul class="dropdown-menu">
											<li v-for="(box, index_box) in boxes" :key="box.id" class="dropdown-item">
												<router-link :to="{ name: 'Home', params: { box_id: box.id } }" tag="a">
													{{ box.label }}
												</router-link>
											</li>
											<li class="divider"></li>
										</ul>
									</div>
									
									<font :title="myBox.user">
										<i class="fa fa-envelope"></i> 
										{{ myBox.label }}
										<br /> <font style="zoom:0.7;">{{ myBox.user }}</font>
									</font>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<br /><hr /><br /> 
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="inbox-nav inbox-divider">
							<!-- // 
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown">
								Cambiar Cuenta <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li v-for="(box, index_box) in boxes" class="dropdown-item">
										<router-link :to="{ name: 'Home', params: { box_id: box.id } }" tag="a">
											{{ box.label }}
										</router-link>
									</li>
									<!-- // 
									<li class="divider"></li>
									<li><a href="#">Acción #5</a></li>
									-- >
								</ul>
							</li>
							-->
							<!-- // <li class="active_not"><a href="#">Enlace #1</a></li> -->							
							<li class="">
								<router-link v-if="myBox.send_enabled === 1" v-bind:to="{ name: 'Compose', params: { box_id: myBox.id } }" tag="a" class="btn btn-compose" style="color:#FFF;">
									Redactar
								</router-link>
							</li>							
							<router-link :to="{ name: 'Folder', params: { folder: 'inbox' } }" tag="li">
								<a>
									<i class="fa fa-inbox"></i>
									<!-- // Bandeja Entrada -->
									Inbox
								</a>
							</router-link>
							<router-link :to="{ name: 'Folder', params: { folder: 'not_seen' } }" tag="li">
								<a>
									<i class="fa fa-envelope-o"></i>
									Sin Leer
								</a>
							</router-link>
							<router-link v-bind:to="{ name: 'Folder', params: { folder: 'seen' } }" tag="li">
								<a>
									<i class="fa fa-envelope"></i>
									Leidos
								</a>
							</router-link>
							<router-link v-bind:to="{ name: 'Folder', params: { folder: 'send' } }" tag="li">
								<a>
									<i class="fa fa-send"></i>
									Enviados
								</a>
							</router-link>
							<router-link v-bind:to="{ name: 'Folder', params: { folder: 'trash' } }" tag="li">
								<a>
									<i class="fa fa-trash-o"></i>
									Papelera
								</a>
							</router-link>
							<router-link v-bind:to="{ name: 'Folder', params: { folder: 'draft' } }" tag="li">
								<a>
									<i class="fa fa-floppy-o"></i>
									Borradores
								</a>
							</router-link>
							<!-- // 
							<router-link v-bind:to="{ name: 'Folder', params: { folder: 'default' } }" tag="li">
								<a>
									<i class="fa fa-inbox"></i>
									Todos
								</a>
							</router-link>
							-->
						</ul>

						<!-- // 
						<ul class="inbox-nav inbox-divider">
							<li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a></li>
							<li><a href="#"><i class="fa fa-envelope-o"></i> Sent Mail</a></li>
							<li><a href="#"><i class="fa fa-bookmark-o"></i> Important</a></li>
							<li><a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a></li>
							<li><a href="#"><i class=" fa fa-trash-o"></i> Trash</a></li>
						</ul>
						-->
						
						<!-- //
						<div class="inbox-body text-center">
							<div class="btn-group">
								<a class="btn mini btn-primary" href="javascript:;">
									<i class="fa fa-plus"></i>
								</a>
							</div>
							<div class="btn-group">
								<a class="btn mini btn-success" href="javascript:;">
									<i class="fa fa-phone"></i>
								</a>
							</div>
							<div class="btn-group">
								<a class="btn mini btn-info" href="javascript:;">
									<i class="fa fa-cog"></i>
								</a>
							</div>
						</div>
						-->
					</div>
				</nav>
			</div>
			<div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
				<aside class="lg-side" style="zoom: 0.8;"> 
					<div style="" class="mail_view" style="max-height:calc(80vh);min-height: calc(80vh);">
						<router-view :key="$route.fullPath"></router-view><!-- //  :change="currentBox()" -->
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>
	
<template id="home">
	<div>
		<!-- // 
			<div class="inbox-head">
				<h3>
					<template v-if="$root.folder != undefined">{{ $root.labels.folders[$root.folder] }}</template>
				</h3>
				<form action="#" class="pull-right position">
					<div class="input-append">
						<input type="text" class="sr-input" placeholder="No habilitado">
						<button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</div>
		-->
			<div class="inbox-head">
				<h3>
					<template v-if="$root.folder != undefined">{{ $root.labels.folders[$root.folder] }}</template>
				</h3>
				
				<!--
				<form action="#" class="pull-right position">
					<div class="input-append">
						<input type="text" class="sr-input" placeholder="No habilitado">
						<button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
					</div>
				</form>
				-->
			</div>
		<div class="inbox-body">
			<div class="mail-option">
				<div class="col-xs-7">
					<div class="btn-group">
						<a @click="$root.loadList(box_id, folder)" data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
							<i class=" fa fa-refresh"></i>
						</a>
					</div>
				</div>
				<div class="col-xs-5">
					<ul class="unstyled inbox-pagination">
						<li><span> {{ ((($root.list.limit * $root.list.page) - $root.list.limit) + 1) }} - {{ ((($root.list.limit * $root.list.page) + $root.list.limit) - $root.list.limit) }}</span></li>
						<li><span></span></li>
						<li>
							<router-link v-if="$root.list.page > 1" accesskey="b" class="np-btn" :key="'list-page-' + $root.list.page" v-bind:to="{ name: 'Folder-Page', params: { page: ($root.list.page - 1), folder: $route.params.folder } }">
								<i class="fa fa-angle-left pagination-left"></i>
							</router-link>
							<a accesskey="b" class="np-btn" style="cursor:no-drop;" v-else>
								<i class="fa fa-angle-left pagination-left"></i>
							</a>
						</li>
						<li>
							<router-link v-if="(($root.list.page * $root.list.limit) + 1) < $root.list.total && ($root.list.total + 1) > $root.list.limit" accesskey="n" class="np-btn" :key="'list-page-' + $root.list.page" v-bind:to="{ name: 'Folder-Page', params: { page: ($root.list.page + 1), folder: $route.params.folder } }">
								<i class="fa fa-angle-right pagination-left"></i>
							</router-link>
							<a accesskey="n" class="np-btn" style="cursor:no-drop;" v-else>
								<i class="fa fa-angle-right pagination-left"></i>
							</a>
						</li>
							
					</ul>
				</div>
				<!-- // 
				<div class="chk-all">
					<input type="checkbox" class="mail-checkbox mail-group-checkbox">
					<div class="btn-group">
						<a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
							All
							<i class="fa fa-angle-down "></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"> None</a></li>
							<li><a href="#"> Read</a></li>
							<li><a href="#"> Unread</a></li>
						</ul>
					</div>
				</div>
				-->
				<!--
				<div class="btn-group hidden-phone">
					<a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
						More
						<i class="fa fa-angle-down "></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
						<li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
					 </ul>
				</div>
				<div class="btn-group">
					 <a data-toggle="dropdown" href="#" class="btn mini blue">
						 Move to
						 <i class="fa fa-angle-down "></i>
					 </a>
					 <ul class="dropdown-menu">
						 <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
						 <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
						 <li class="divider"></li>
						 <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
					 </ul>
				</div>
				-->
				
			</div>
			
			<table class="table table-inbox table-hover">
				<tbody>
					<tr v-for="(mail, index_mail) in $root.list.data" :class="mail.status" :key="index_mail" v-if="$root.list.data.length !== null && $root.list.data.length > 0">
						<template v-if="mail.id !== undefined && mail.id > 0">
							<router-link tag="td" class="inbox-small-cells" v-bind:to="{ name: 'View-Single', params: { box_id: mail.box, index: index_mail, mail_id: mail.id, folder: folder } }">
								<!-- // <input type="checkbox" class="mail-checkbox" /> -->
								<template v-if="mail.status !== undefined && mail.status == 'read'">
									<i title="Leido" class="fa fa-circle-o"></i>
								</template>
								<template v-else-if="mail.status !== undefined && mail.status == 'unread'">
									<i title="No leido" class="fa fa-circle"></i>
								</template>
								<template v-else-if="mail.status !== undefined && mail.status == 'drafting'">
									<i title="Borrador" class="fa fa-pencil"></i>
								</template>
								<template v-else-if="mail.status !== undefined && mail.status == 'send'">
									<i title="Enviado" class="fa fa-check"></i>
								</template>
								<template v-else-if="mail.status !== undefined && mail.status == 'to_send'">
									<i title="Enviando" class="fa fa-spinner"></i>
								</template>
								<template v-else>
									<i :title="mail.status" class="fa fa-times"></i>
								</template>
								
								<template v-if="mail.recent !== undefined && mail.recent === 1">
									<i class="fa fa-asterisk"></i>
								</template>
								<template v-if="mail.answered !== undefined && mail.answered === 1">
									<i class="fa fa-share"></i> 
								</template>
								<template v-if="mail.deleted !== undefined && mail.deleted === 1">
									<i class="fa fa-trash"></i> 
								</template>
							</router-link>
							<router-link tag="td" class="view-message" v-bind:to="{ name: 'View-Single', params: { box_id: mail.box, index: index_mail, mail_id: mail.id, folder: folder } }">
								<template v-if="mail.subject !== undefined">
									{{ (mail.subject == undefined || mail.subject == '') ? "&lt;Sin asunto&gt;" : (mail.subject.length > 28 ? mail.subject.slice(0,28) : mail.subject) }}
								</template>
							</router-link>
							<router-link tag="td" class="view-message dont-show" v-bind:to="{ name: 'View-Single', params: { box_id: mail.box, index: index_mail, mail_id: mail.id, folder: folder } }">
								<template v-if="mail.from !== undefined && mail.from !== undefined">
									{{ mail.from_email }}
								</template>
							</router-link>
							<router-link tag="td" class="view-message inbox-small-cells" v-bind:to="{ name: 'View-Single', params: { box_id: mail.box, index: index_mail, mail_id: mail.id, folder: folder } }">
								<i class="fa fa-paperclip" v-if="mail.attachments.length > 0" :title="mail.attachments.length"></i>
							</router-link>
							<router-link tag="td" class="view-message text-right" v-bind:to="{ name: 'View-Single', params: { box_id: mail.box, index: index_mail, mail_id: mail.id, folder: folder } }">
								<template v-if="mail.date !== undefined && mail.date !== undefined">
									{{ mail.date.toMessageFormat() }}
								</template>
							</router-link>
						</template>
					</tr>
					<tr v-else>
						<td colspan="6">No hay mensajes</td>
					</tr>
				</tbody>
			</table>
			<div class="mail-option">
				<ul class="unstyled inbox-pagination">
					 <li><span> Total: {{ $root.list.total }}</span></li>
				</ul>
				<ul class="unstyled inbox-pagination pull-left">
					 <li>Página: <span>{{ $root.list.page }} - {{ Math.round($root.list.total / $root.list.limit) }}</span> | Limite: <span>{{ $root.list.limit }}</span></li>
				</ul>
			</div>
		</div>
	</div>
</template>

<template id="view">
	<div>
		<div class="row">
			<div class="col-xs-12">
				<!-- CONTENT MAIL -->
				<div class="">
					<div class="mail-option">
						<div class="col-xs-7">
							<div class="btn-group">
								<router-link tag="a" data-original-title="Regresar" data-placement="top" v-bind:to="{ name: 'Folder', folder: $route.params.folder }" class="btn mini blue">
									<i class="fa fa-times"></i> 
								</router-link>
							</div>
							
							<div class="btn-group">
								<a data-toggle="dropdown" href="#" class="btn btn-sm btn-default" aria-expanded="false">
									Más <i class="fa fa-angle-down "></i>
								</a>
								<ul class="dropdown-menu">
									<li v-if="mail.seen == 0 && mail.draft == 0 && mail.deleted == 0 && mail.send !== 0">
										<a @click="$root.changeFolder(mail.id, $root.ref, 'seen')">
											<i class="fa fa-check-circle-o"></i> Marcar como leído
										</a>
									</li>
									<li v-if="mail.seen == 1 && mail.draft == 0 && mail.deleted == 0 && mail.send !== 0">
										<a @click="$root.changeFolder(mail.id, $root.ref, 'not_seen')">
											<i class="fa fa-check-circle-o"></i> Marcar como no leído
										</a>
									</li>
									<!-- //
									<li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
									<li><a href="#"><i class="fa fa-ban"></i> Spam</a></li> 
									-->
									<li class="divider"></li>
									<li>
										<a @click="$root.changeFolder(mail.id, $root.ref, 'trash')" v-if="mail.deleted == 0" >
											<i class="fa fa-trash-o"></i> Enviar a la papelera
										</a>
									</li>
								 </ul>
							</div>
									
							<div class="btn-group">
								<!-- // <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Responder</button> -->
								<!-- // <button class="btn btn-sm btn-default" type="button" ><i class="fa fa-share"></i></button> -->
								<!-- // <button @click="printMail()" class="btn btn-sm btn-default" type="button" ><i class="fa fa-print"></i></button> -->
								<!-- // <button class="btn btn-sm btn-default" type="button" ><i class="fa fa-trash-o"></i></button> -->
							</div>
							
							<div v-if="mail.deleted == 1" class="btn-group">
								<a @click="$root.changeFolder(mail.id, $root.ref, 'not_seen')" class="btn mini blue" aria-expanded="false">
									<i class="fa fa-inbox"></i> Sacar de la papelera
								</a>
							</div>
						
							<div v-if="mail.seen == 0 && mail.draft == 0 && mail.deleted == 0 && mail.send !== 0" class="btn-group">
								<a @click="$root.changeFolder(mail.id, $root.ref, 'seen')" class="btn btn-sm btn-success" aria-expanded="false">
									<i class="fa fa-check-circle"></i> Marcar como leído
								</a>
							</div>
							
							<div class="btn-group" v-if="mail.seen == 0 && mail.draft == 1 && mail.deleted == 0 && mail.send !== 0">
								<router-link class="btn mini blue" :to="{ name: 'Edit', params: { folder: 'draft', box_id: $route.params.box_id, index: $route.params.index, mail_id: $route.params.mail_id } }" title="Seguir Editando">
									<i class="fa fa-edit"></i> Seguir editando
								</router-link>
							</div>
						</div>
						<div class="col-xs-5">
							<ul class="unstyled inbox-pagination">
								<li><span>{{ index }} de {{ mailsTotal }}</span></li>
								<li><span></span></li>
								<li>
									<router-link v-if="prevMail.id > 0" accesskey="b" class="np-btn" :key="prevMail.id" v-bind:to="{ name: 'View-Single', params: { box_id: prevMail.box_id, index: prevMail.index, mail_id: prevMail.id, folder: folder } }">
										<i class="fa fa-angle-left pagination-left"></i>
									</router-link>
									<a accesskey="b" class="np-btn" style="cursor:no-drop;" v-else>
										<i class="fa fa-angle-left pagination-left"></i>
									</a>
								</li>
								<li>
									<router-link v-if="nextMail.id > 0" accesskey="n" class="np-btn" :key="nextMail.id" v-bind:to="{ name: 'View-Single', params: { box_id: nextMail.box_id, index: nextMail.index, mail_id: nextMail.id, folder: folder } }">
										<i class="fa fa-angle-right pagination-right"></i>
									</router-link>
									<a accesskey="n" class="np-btn" style="cursor:no-drop;" v-else>
										<i class="fa fa-angle-right pagination-right"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					
					<div class="inbox-body">
						<div class="mail_heading row">
							<div class="col-xs-8">
								<h2>{{ mail.subject }}</h2>
								<strong>De: </strong> <span>{{ mail.from_email }}</span><br>
								<strong>Para : </strong> <span v-for="(to, mail_to_index) in mail.to">{{ to.label }} &lt;{{ to.address_mail }}&gt;</span>
							</div>
							<div class="col-xs-4 text-right">
								<p class="date pull-right"> 
									{{ mail.date.toMessageFormat() }} 
								</p>
							</div>
						</div>
						<div class="sender-info">
							<div class="row">
								<div class="col-md-12">
									<!-- // <strong>{{ mail.from }}</strong>
									<span>({{ mail.from_email }})</span> -->
									
									<!-- // <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a> -->
								</div>
							</div>
						</div>
						<div class="mail-option">
							<ul class="unstyled inbox-pagination">
								<li>
									<router-link class="np-btn" v-if="mail.seen == 0 && mail.draft == 1 && mail.deleted == 0 && mail.send !== 0" :to="{ name: 'Edit', params: { folder: 'draft', box_id: $route.params.box_id, mail_id: $route.params.mail_id } }" title="Seguir Editando">
										<i class="fa fa-pencil"></i> 
									</router-link>
								</li>
								<li>
									<a class="np-btn" aria-expanded="false" type="button" @click="printMail()">
										<i class="fa fa-print"></i> 
									</a>
								</li>
								<li>
									<a :href="$root.urlBodyEmail" class="np-btn" target="_blank" v-if="mail.draft == 0 && mail.deleted == 0">
										<i class="fa fa-external-link"></i> 
									</a>
								</li>
								<li>
									<a @click="resizeIframeZoom()" class="np-btn">
										<i class="fa fa-search-minus"></i> 
									</a>
								</li>
							</ul>
						</div>
						
						
						<!-- Archivos Adjuntos -->
						<template v-if="mail.attachments !== undefined">									
							<div class="" v-if="mail.attachments.length > 0">
								
								<!-- start accordion -->
								<div class="accordion" id="accordion" role="tablist" aria-multiselectable="false">
									<div class="panel panel-default">
										<a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
											<h4 class="panel-title">
												<i class="fa fa-paperclip"></i> Archivos Adjuntos ({{ mail.attachments.length }}) (Clic para expandir)
											</h4>
										</a>
										<div id="collapseOne" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
												
												<ul class="list-group">
													<a :href="attachment.path_short" download="" class="list-group-item " v-for="(attachment, index) in mail.attachments">
														{{ attachment.name }}
														<b style="color:olivedrab;">Clic para descargar</b>
													</a>
													
												</ul>
											</div>
										</div>
									</div>
								</div>
								<!-- end of accordion -->
							</div>
							<div v-else="">Este correo no contiene archivos adjuntos.</div>
							<div class="ln_solid"></div>
							<div class="clearfix"></div>
						</template>
						<!-- / Archivos Adjuntos -->
						
						<!-- Message HTML -->
						<div class="view-mail">
							<template v-if="mail.message !== undefined">
								<!-- // <div style="border: #666 0px dashed; zoom:0.8;padding:0;"> -->
								<div>
									<!-- // <iframe @onload="resizeIframe(this)" id="printf" name="printf" frameborder="0" width="100%" style="height:auto;min-height:calc(100vh)" :src="$root.urlBodyEmail" ></iframe> -->
									<iframe style="min-height:calc(40vh)" id="printf" name="printf" frameborder="0" width="100%" :src="$root.urlBodyEmail" v-on:load="resizeIframe(this)" ></iframe>
								</div>
							</template>
						</div>
						<!-- / Message HTML -->
						
						<!-- Archivos Adjuntos -->
						<template v-if="mail.attachments !== undefined">
							<div class="ln_solid"></div>
							<div class="clearfix"></div>
							<div class="attachment" v-if="mail.attachments.length > 0">
								<p>
									<span><i class="fa fa-paperclip"></i> {{ mail.attachments.length }} Archivos Adjuntos </span>
									<!-- — <a href="#">Download all attachments</a> | <a href="#">View all images</a> -->
								</p>
								<div class="row">
									<div v-for="(attachment, index) in mail.attachments">
										<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="zoom:0.9;overflow: hidden;border: 0px dotted #666;padding: 0.3em;min-height: 300px;max-height: 300px;">
											<a class="atch-thumb" :href="attachment.path_short" target="_blank" style="cursor:pointer;">
												<!-- // <img src="/public/assets/images/inbox.png" alt="img" /> -->
												<center class="col-xs-12">
													<template v-if="[
														'ai', 'avi', 'css', 'csv', 'dbf', 'doc', 'dwg', 'exe', 'fla', 'flash', 'html'
														, 'iso', 'jpg', 'js', 'json', 'mp3', 'mp4', 'png', 'ppt', 'psd', 'rtf', 'svg', 'txt', 'xls', 'xml', 'zip'
													].includes((attachment.name.split('.')[(attachment.name.split('.').length - 1)]))">													
														<img :src="'/public/assets/icons/136517-file-types/svg/' + attachment.name.split('.')[(attachment.name.split('.').length - 1)] + '.svg'" :alt="attachment.name.split('.')[(attachment.name.split('.').length - 1)]" />
													</template>
													<template v-else>
														<template v-if="['xls', 'xlsx'].includes((attachment.name.split('.')[(attachment.name.split('.').length - 1)]))">													
															<img src="/public/assets/icons/136517-file-types/svg/xls.svg" alt="XLS" />
														</template>
														<template v-else-if="attachment.filetype === 'PDF'">
															<img src="/public/assets/icons/136517-file-types/svg/pdf.svg" alt="PDF" />
														</template>
														<template v-else-if="attachment.filetype === 'X-ICON'">
															<img width="100%" :src="attachment.path_short" alt="X-ICON" />
														</template>
														<template v-else-if="attachment.filetype === 'MP4'">
															<img src="/public/assets/icons/136517-file-types/svg/mp4.svg" alt="MP4" />
														</template>
														<template v-else-if="attachment.filetype === 'ZIP'">
															<img src="/public/assets/icons/136517-file-types/svg/ZIP.svg" alt="ZIP" />
														</template>
														<template v-else-if="attachment.filetype === 'POSTSCRIPT'">
															<img src="/public/assets/icons/136517-file-types/svg/search.svg" alt="POSTSCRIPT" />
														</template>
														<template v-else-if="attachment.filetype.search('VND.EXCEL') >= 0">
															<img src="/public/assets/icons/136517-file-types/svg/xls.svg" alt="XLS" />
														</template>
														<template v-else>
															<img src="/public/assets/icons/136517-file-types/svg/file.svg" alt="NO DETECTADO" />
														</template>
													</template>
												</center>
											</a>
											<div class="col-xs-12 text-center">
												<div class="file-name">
													<!-- // {{ attachment.name.split(/(\d)/).join(' ') }} -->
													<!-- // {{ attachment.name.split(/([\w\d])/).join('_').replace(/(#\w{10})[\w\d]+/g, '$1')  }} -->
													{{ attachment.name.replace(/(#\w{10})[\w\d]+/g, '$1') }}
												</div>
											</div>
											<span class="col-xs-12">
												<div class="pull-right">
													<template v-if="attachment.filesize > 1024 && Math.round(attachment.filesize/1024) < 1024">
														<b>{{ parseInt(attachment.filesize/1024) }}</b> KB 
													</template>
													<template v-else-if="attachment.filesize > 1024 && Math.round(attachment.filesize/1024) > 1024">
														<b>{{ parseInt(Math.round(attachment.filesize/1024)/1024) }}</b> MB 
													</template>
													<template v-else>
														<b>{{ attachment.filesize }}</b> B 
													</template>
												</div>
											</span>
											<div class="col-xs-12 text-right" style="cursor:pointer" >
												<div class="" style="cursor:pointer" >
													<a :href="attachment.path_short" class="col-xs-4 btn btn-sm btn-default pull-left" target="_blank">
														Ver
													</a>
													<a :href="attachment.path_short" class="col-xs-5 btn btn-sm btn-primary pull-right" download="">
														Bajar
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</template>
						<!-- / Archivos Adjuntos -->
					</div>
				</div>
				<!-- /CONTENT MAIL -->
			</div>
		</div>
	</div>
</template>

<template id="compose-edit">
	<div>
		<div class="inbox-head">
			<h3>
				<template v-if="$root.folder != undefined">Componer Mensaje</template>
			</h3>
			<form action="#" class="pull-right position"></form>
		</div>
		<div class="inbox-body">
			<div class="mail-option">
				<div class="btn-group pull-left">
					<router-link :to="{ name: 'Folder', params: { box_id: $route.params.box_id, folder: 'draft' } }" tag="a" class="btn mini blue" aria-expanded="false" type="button">
						<i class=" fa fa-times"></i>
					</router-link>
				</div>
				<div class="btn-group pull-right">
					<router-link 
					:to="{ name: 'View-Single', params: { box_id: $route.params.box_id, index: $route.params.index, mail_id: $route.params.mail_id, folder: 'draft' } }"
					tag="a" class="btn mini blue" aria-expanded="false" type="button">
						<i class=" fa fa-times"></i>
					</router-link>
				</div>
				<div class="btn-group pull-right">
					<a @click="saveDraft()" class="btn mini blue" aria-expanded="false">
						<i class=" fa fa-save"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="inbox-body">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<form 
						@submit="saveDraft"
						method="POST"
						action="javascript:return false;" 
						id="create-mail"
						class="form-horizontal-not form-label-left">
						<div class="form-group">
							<div class="col-md-1 col-sm-1 col-xs-2">
								<a v-if="form.to.length < 5" class="btn btn-sm btn-success" @click="form.to.push({ label: '', address_mail: '', valid: null });">
									<i class="fa fa-plus"></i>
								</a>
							</div>
							<label class="control-label col-md-2 col-sm-2 col-xs-10" for="compose-to">
								Para: <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="col-xs-12" v-for="(to, to_index) in form.to">
									<div class="col-xs-4">
										<input required="required" type="text" class="tags form-control" v-model="to.label" placeholder="Nombre(s) y Apellido(s)" />
									</div>
									<div class="col-xs-6">
										<input required="required" type="email" class="tags form-control" v-model="to.address_mail" placeholder="Correo Electronico" />
									</div>
									<div class="col-xs-2">
										<a class="btn btn-sm btn-info" @click="validateMailAddress('to', to_index)">
											<i class="fa fa-question"></i>
										</a>
										<a class="btn btn-sm btn-danger" @click="form.to.splice(to_index, 1)">
											<i class="fa fa-times"></i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="clearfix"><hr /></div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="compose-subject">
								Asunto: <span class="required"></span>
							</label>
							<div class="col-md-10 col-sm-10 col-xs-12">
								<input type="text" v-model="form.subject" class="form-control" />
							</div>
							<div class="clearfix"><hr /></div>
						</div>
						<div class="ln_solid"></div>
						
						<div class="">
							<div id="alerts"></div>
							<textarea v-model="form.message" name="editor-message" id="editor-message">{{form.message}}</textarea>
							<div class="clearfix"><hr /></div>
						</div>
						<div class="ln_solid"></div>
						<div class="clearfix"></div>
						
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<span class="btn green fileinput-button">
									<i class="fa fa-plus fa fa-white"></i>
									<span>Adjuntar Archivo(s)</span>
									<input id="file-attachments" v-on:change="openFileAtt()" type="file" name="file[]" multiple="">
								</span>
								
								<button class="btn btn-send" type="button" @click="validateMail">Enviar</button>
							</div>
							<div class="clearfix"></div>
						</div>
						<hr>
						
						<!-- Archivos Adjuntos -->
						<template v-if="form.attachments !== undefined">
							<div class="ln_solid"></div>
							<div class="clearfix"></div>
							<div class="attachment" v-if="form.attachments.length > 0">
								<p>
									<span><i class="fa fa-paperclip"></i> {{ form.attachments.length }} Archivos Adjuntos </span>
									<!-- — <a href="#">Download all attachments</a> | <a href="#">View all images</a> -->
								</p>
								<div class="row">
									<div v-for="(attachment, index) in form.attachments">
										<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="zoom:0.9;overflow: hidden;border: 0px dotted #666;padding: 0.3em;min-height: 300px;max-height: 300px;">
											<a class="atch-thumb" :href="attachment.path_short" target="_blank" style="cursor:pointer;">
												<!-- // <img src="/public/assets/images/inbox.png" alt="img" /> -->
												<center class="col-xs-12">
													<template v-if="[
														'ai', 'avi', 'css', 'csv', 'dbf', 'doc', 'dwg', 'exe', 'fla', 'flash', 'html'
														, 'iso', 'jpg', 'js', 'json', 'mp3', 'mp4', 'png', 'ppt', 'psd', 'rtf', 'svg', 'txt', 'xls', 'xml', 'zip'
													].includes((attachment.name.split('.')[(attachment.name.split('.').length - 1)]))">													
														<img :src="'/public/assets/icons/136517-file-types/svg/' + attachment.name.split('.')[(attachment.name.split('.').length - 1)] + '.svg'" :alt="attachment.name.split('.')[(attachment.name.split('.').length - 1)]" />
													</template>
													<template v-else>
														<template v-if="['xls', 'xlsx'].includes((attachment.name.split('.')[(attachment.name.split('.').length - 1)]))">													
															<img src="/public/assets/icons/136517-file-types/svg/xls.svg" alt="XLS" />
														</template>
														<template v-else-if="attachment.filetype === 'PDF'">
															<img src="/public/assets/icons/136517-file-types/svg/pdf.svg" alt="PDF" />
														</template>
														<template v-else-if="attachment.filetype === 'X-ICON'">
															<img width="100%" :src="attachment.path_short" alt="X-ICON" />
														</template>
														<template v-else-if="attachment.filetype === 'MP4'">
															<img src="/public/assets/icons/136517-file-types/svg/mp4.svg" alt="MP4" />
														</template>
														<template v-else-if="attachment.filetype === 'ZIP'">
															<img src="/public/assets/icons/136517-file-types/svg/ZIP.svg" alt="ZIP" />
														</template>
														<template v-else-if="attachment.filetype === 'POSTSCRIPT'">
															<img src="/public/assets/icons/136517-file-types/svg/search.svg" alt="POSTSCRIPT" />
														</template>
														<template v-else-if="attachment.filetype.search('VND.EXCEL') >= 0">
															<img src="/public/assets/icons/136517-file-types/svg/xls.svg" alt="XLS" />
														</template>
														<template v-else>
															<img src="/public/assets/icons/136517-file-types/svg/file.svg" alt="NO DETECTADO" />
														</template>
													</template>
												</center>
											</a>
											<div class="col-xs-12 text-center">
												<div class="file-name">
													<!-- // {{ attachment.name.split(/(\d)/).join(' ') }} -->
													<!-- // {{ attachment.name.split(/([\w\d])/).join('_').replace(/(#\w{10})[\w\d]+/g, '$1')  }} -->
													{{ attachment.name.replace(/(#\w{10})[\w\d]+/g, '$1') }}
												</div>
											</div>
											<span class="col-xs-12">
												<div class="pull-right">
													<template v-if="attachment.filesize > 1024 && Math.round(attachment.filesize/1024) < 1024">
														<b>{{ parseInt(attachment.filesize/1024) }}</b> KB 
													</template>
													<template v-else-if="attachment.filesize > 1024 && Math.round(attachment.filesize/1024) > 1024">
														<b>{{ parseInt(Math.round(attachment.filesize/1024)/1024) }}</b> MB 
													</template>
													<template v-else>
														<b>{{ attachment.filesize }}</b> B 
													</template>
												</div>
											</span>
											<div class="col-xs-12 text-right" style="cursor:pointer" >
												<div class="" style="cursor:pointer" >
													<a :href="attachment.path_short" class="col-xs-4 btn btn-sm btn-default pull-left" target="_blank">
														Ver
													</a>
													<a :href="attachment.path_short" class="col-xs-5 btn btn-sm btn-primary pull-right" download="">
														Bajar
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</template>
						<!-- / Archivos Adjuntos -->
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</template>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				<h4 class="modal-title">Compose</h4>
			</div>
			<div class="modal-body">
				<form role="form" class="form-horizontal">
					<div class="form-group">
						<label class="col-lg-2 control-label">To</label>
						<div class="col-lg-10">
							<input type="text" placeholder="" id="inputEmail1" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Cc / Bcc</label>
						<div class="col-lg-10">
							<input type="text" placeholder="" id="cc" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Subject</label>
						<div class="col-lg-10">
							<input type="text" placeholder="" id="inputPassword1" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Message</label>
						<div class="col-lg-10">
							<textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<span class="btn green fileinput-button">
								<i class="fa fa-plus fa fa-white"></i>
								<span>Attachment</span>
								<input type="file" name="files[]" multiple="">
							</span>
							<button class="btn btn-send" type="submit">Send</button>
						</div>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	function excepcionForm(message){
		var self = this;
		self.name = "excepcionForm";
		self.message = message;
	};
			
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
				box_id: this.$route.params.box_id,
				folder: this.$route.params.folder,
			};
		},
		mounted() {
			var self = this;
			self.$root.currentBox();
			
			self.$root.loadList(self.box_id, self.folder);
			// // console.log(self.box_id + ' - ' + self.folder);
		},
		computed: {
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
				box_id: this.$route.params.box_id,
				folder: this.$route.params.folder,
				index: 0,
				next: {
					id: 0,
					index: 0,
					box_id: 0,
				},
				prev: {
					id: 0,
					index: 0,
					box_id: 0,
				}
			};
		},
		created() {
			var self = this;
		},
		mounted() {
			var self = this;
			self.$root.currentBox();
			if(Number(self.$route.params.box_id) > 0 && self.$root.list.data.length == 0){
				self.$root.loadList((self.$route.params.box_id), self.$route.params.folder); // Listado para vista individual
			}
			self.$root.loadMail();
			indexCurr = Number(self.$route.params.index);
			indexPrev = (Number(self.$route.params.index) - 1);
			indexNext = (Number(self.$route.params.index) + 1);
			self.index = indexCurr + 1;
			
			// http://micuenta.monteverdeltda.com/api.php/records/emails_boxes
		},
		computed: {
			prevMail(){
				var self = this;
				var returnInfo = {
					id: 0,
					index: 0,
					box_id: 0,
				};
				indexCurr = Number(self.$route.params.index);
				indexPrev = (Number(self.$route.params.index) - 1);
				indexNext = (Number(self.$route.params.index) + 1);
				
				if (indexPrev >= 0){
					prevInfo = self.$root.list.data[indexPrev];
					if(prevInfo != undefined && prevInfo.id !== undefined && prevInfo.id > 0){
						returnInfo.id = prevInfo.id;
						returnInfo.box_id = prevInfo.box;
						returnInfo.index = indexPrev;
					}
				}
				
				return returnInfo;
			},
			nextMail(){
				var self = this;
				var returnInfo = {
					id: 0,
					index: 0,
					box_id: 0,
				};
				indexCurr = Number(self.$route.params.index);
				indexPrev = (Number(self.$route.params.index) - 1);
				indexNext = (Number(self.$route.params.index) + 1);
				
				if (indexNext <= (self.mailsTotal - 1)){
					nextInfo = self.$root.list.data[indexNext];
					if(nextInfo.id != undefined && nextInfo.id > 0){
						returnInfo.id = nextInfo.id;
						returnInfo.box_id = nextInfo.box;
						returnInfo.index = indexNext;
					}
				}
				
				return returnInfo;
			},
			mailsTotal(){
				return this.$root.list.data.length;
			},
			mail(){
				return this.$root.mail;
			},
			mails(){
				return this.$root.list.data;
			},
		},
		methods: {
			dividirCadena(cadenaADividir,separador) {
			   var arrayDeCadenas = cadenaADividir.split(separador);
			   document.write('<p>La cadena original es: "' + cadenaADividir + '"');
			   document.write('<br>El separador es: "' + separador + '"');
			   document.write("<br>El array tiene " + arrayDeCadenas.length + " elementos: ");

			   for (var i=0; i < arrayDeCadenas.length; i++) {
				  document.write(arrayDeCadenas[i] + " / ");
			   }
			},
			unescape(unsafe){
				return window.unescape(unsafe);
			},
			translateAttachments(attachments){
				return JSON.parse(attachments);
			},
			tagsFormat(data){
				r = [];
				if(data.length > 0){
					data.forEach(function(a){
						a.address_mail = (a.address_mail == undefined) ? ((a.user !== undefined) ? a.user : "") : "";
						a.label = (a.label == undefined || a.label.length < 1) ? a.address_mail : a.label;
						r.push(a);
						// r.push(a.label + " <" + a.address_mail + ">");
					});
				}
				return r;
				return r.join(',');
			},
			printMail(){
				var self = this;
				window.frames["printf"].focus();
				window.frames["printf"].print();
			},
			resizeIframe() {
				obj = document.getElementById("printf");
				// obj = document.getElementById(($(".tox-edit-area__iframe")[0].id)) // OTROS
				obj.contentWindow.document.body.style.overflowX = "auto";
				obj.contentWindow.document.body.style.overflowY = "hidden";
				wInDoc = obj.contentWindow.document.body.scrollWidth;
				hInDoc = obj.contentWindow.document.body.scrollHeight;
				// console.log('hInDoc', hInDoc);
				// console.log('wInDoc', wInDoc);
				// console.log('resolution', wInDoc + 'x' + hInDoc);
				
				wMyDoc = obj.contentWindow.innerWidth;
				hMyDoc = obj.contentWindow.innerHeight;
				// console.log('hMyDoc', hMyDoc);
				// console.log('wMyDoc', wMyDoc);
				// console.log('Myresolution', wMyDoc + 'x' + hMyDoc);
				
				ZoomDect = wMyDoc / wInDoc;
				// console.log('ZoomDect', ZoomDect);
				
				height = obj.contentWindow.document.body.scrollHeight + obj.contentWindow.innerHeight;
				obj.style.minHeight = height + 'px';
				obj.style.height = height + 'px';
				//obj.contentWindow.document.body.style.zoom = ZoomDect;
			},
			resizeIframeZoom() {
				if(obj.contentWindow.document.body.style.zoom && obj.contentWindow.document.body.style.zoom < 1){
					obj.contentWindow.document.body.style.zoom = 1;
				} else  {					
					obj = document.getElementById("printf");
					obj.contentWindow.document.body.style.overflowX = "auto";
					obj.contentWindow.document.body.style.overflowY = "hidden";
					wInDoc = obj.contentWindow.document.body.scrollWidth;
					hInDoc = obj.contentWindow.document.body.scrollHeight;				
					wMyDoc = obj.contentWindow.innerWidth;
					hMyDoc = obj.contentWindow.innerHeight;				
					ZoomDect = wMyDoc / wInDoc;
					obj.contentWindow.document.body.style.zoom = ZoomDect;
				}
			},
		}
	});

	var Compose = Vue.extend({
		template: '#compose-edit',
		data() {
			return {
				mail_id: this.$route.params.mail_id,
				box_id: this.$route.params.box_id,
				record: {
					answered: 0,
					attachments: [],
					box: 0,
					created: '',
					date: '',
					deleted: 0,
					draft: 1,
					flagged: 0,
					from: '',
					from_email: '',
					id: 0,
					isHtml: false,
					message: '',
					message_id: '',
					new: 0,
					recent: 0,
					response: 0,
					seen: 0,
					size: 0,
					status: '',
					subject: '',
					to: '',
					to_email: '',
					uid: 0,
				},
				form: {
					id: this.$route.params.mail_id,
					box: this.$route.params.box_id,
					to: [
						// { label: 'Ayuda y Soporte Monteverde', address_mail: 'soporte@monteverdeltda.com', valid: null },
					],
					draft: 1,
					send: 0,
					flagged: 0,
					seen: 0,
					subject: '',
					message: '',
					attachments: [],
				},
			};
		},
		mounted() {
			var self = this;
			self.$root.currentBox();
			if(self.mail_id == null || self.mail_id == 0){
				// console.log('no hay email.');
				insert = {
					from: self.$root.myBox.label,
					from_email: self.$root.myBox.user,
					box: self.form.box,
					to: JSON.stringify([{ "label": "", "address_mail": "" }]),
					status: 'drafting',
					draft: 1,
					send: 0,
					new: 0,
					recent: 0,
					flagged: 0,
					create_by: <?= $this->user->id; ?>,
					attachments: "[]",
				};
				
				api.post('/api.php/records/emails', insert)
				.then(function (r) {
					console.log(r);
					if(r.data > 0){
						// self.$router.push({ name: 'Edit', params: { mail_id: r.data } })
						self.$router.push({ name: 'Edit', params: { mail_id: r.data, box_id: self.form.box, folder: 'draft', folder: 'draft', index: 0 } })
						
						//location.reload();
						// self.loadTiny();
					} else {
						self.$router.push({ name: 'Home' })
					};
				})
				.catch(function (error) {
					
				});
			} else {
				api.get('/api.php/records/emails/' + self.mail_id, {
					params: {
						
					}
				})
				.then(function (r) {
					if(r.data.id > 0 && r.data.status == 'drafting'){
						r.data.to = JSON.parse(r.data.to);
						r.data.attachments = JSON.parse(r.data.attachments);
						self.form = r.data;
						
						if(self.form.to.length == 0){ self.form.to.push([{ "label": "nombre", "address_mail": "correo@sincorreo.com" }]); }
						
						self.loadTiny();
						//if(self.$route.params.mail_id != self.mail.id){
					} else {
						self.$router.push({ name: 'Home' })
					};
				})
				.catch(function (error) {
					console.error('error 1111', error);
				});
				
			}
		
		},
		created() {},
		methods: {
			encode_utf8( s ){
				return unescape( encodeURIComponent( s ) );
			},
			decode_utf8( s ){
				return decodeURIComponent( escape( s ) );
			},
			loadTiny(){
				console.log('loadTiny');
				var self = this;
				for (var i = tinymce.editors.length - 1 ; i > -1 ; i--) {
					var ed_id = tinymce.editors[i].id;
					tinyMCE.execCommand("mceRemoveEditor", true, ed_id);
				}
				var usersRequest = null;
				var userRequest = {};
				
				$("#editor-message")
					.html(self.form.message)
					.val(self.form.message);
				tinymce.init({
					language: 'es_MX',
					//theme: 'modern',
					selector: 'textarea#editor-message',
					//themes: 'advanced',
					height: 'calc(60vh)',
					elementpath: false,
					image_caption: true,
					image_title: true,
					convert_urls: true,
					automatic_uploads: true,
					file_picker_types: 'image',
					icons: 'material',
					// toolbar_drawer: 'floating',
					relative_urls : false,
					remove_script_host : false,
					document_base_url : location.protocol + '//' + location.hostname,
					//skin: "feliphegomez-mv",
					plugins: 'print preview fullpage powerpaste code searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help save',
					/*
					plugins: [
						'save template importcss preview image imagetools media table',
						'advlist autolink lists link charmap print preview anchor code powerpaste',
						'searchreplace visualblocks fullscreen',
						'insertdatetime wordcount fullpage help'
					],*/
					external_plugins: {
						// 'powerpaste': '/public/assets/vendors/tinymce/plugins/powerpaste/plugin.js'
					},
					// paste_as_text: true,
					powerpaste_allow_local_images: true,
					powerpaste_word_import: "clean",
					powerpaste_html_import: "merge",
					image_advtab: true,
					visualblocks_default_state: false,
					end_container_on_empty_block: true,
					importcss_append: true,
					menubar: "file edit insert format table tools view code",
					paste_postprocess: function(editor, fragment) {
						// var textnode = document.createTextNode("Added Text");
						// fragment.node.appendChild(textnode);
					},
					toolbar1: 'save | template preview fullscreen | '
						+ 'insertfile pastetext undo redo | '
						+ 'insert link image imagetools | '
						+ 'fullpage code help',
					toolbar2: 'styleselect formatselect removeformat | '
						+ 'visualblocks | sizeselect | bold italic | fontselect |  fontsizeselect | strikethrough forecolor backcolor | '
						+ 'alignleft aligncenter alignright alignjustify | '
						+ 'bullist numlist outdent indent ',
					save_enablewhendirty: true,
					save_onsavecallback: function () {
						self.saveDraft();
					},
					templates: [
						{
							title: 'Tabla Sencilla',
							description: 'creates a new table',
							content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
						},
						{
							title: 'Lista con fechas', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>Mi Lista</h2><ul><li></li><li></li></ul></div>'
						},
						{
							title: 'Abacus (Blog)', description: '', url: '/templates/mails/FG-abacus-blog.html'
						},
						{
							title: 'Abacus (Product)', description: '', url: '/templates/mails/FG-abacus-product.html'
						},
						{
							title: 'Abacus (Re-opt-in)', description: '', url: '/templates/mails/FG-abacus-re-opt-in.html'
						},
						{
							title: 'Abacus (Transactional)', description: '', url: '/templates/mails/FG-abacus-transactional.html'
						},
						{
							title: 'Cerberus (Fluid)', description: '', url: '/templates/mails/FG-cerberus-fluid.html'
						},
						{
							title: 'Cerberus (Hybrid)', description: '', url: '/templates/mails/FG-cerberus-hybrid.html'
						},
						{
							title: 'Cerberus (InLine)', description: '', url: '/templates/mails/FG-cerberus-responsive.html'
						},
						{
							title: 'Email (InLine)', description: '', url: '/templates/mails/FG-email-inlined.html'
						},
						{
							title: 'Email', description: '', url: '/templates/mails/FG-email.html'
						},
						{
							title: 'Email Marketing', description: '', url: '/templates/mails/FG-HTML-Email-Marketing-Template.html'
						},
						{
							title: 'Karakil (Blog)', description: '', url: '/templates/mails/FG-karakol-blog.html'
						},
						{
							title: 'Karakil (Product)', description: '', url: '/templates/mails/FG-karakol-product.html'
						},
						{
							title: 'Karakil (Transactional)', description: '', url: '/templates/mails/FG-karakol-transactional.html'
						},
						{
							title: 'plain re opt-in', description: '', url: '/templates/mails/FG-plain-re-opt-in.html'
						},
						{
							title: 'Responsive Email', description: '', url: '/templates/mails/FG-responsive-html-email-template.html'
						},
						{
							title: 'Columna Sencilla', description: '', url: '/templates/mails/FG-single-column.html'
						},
						{
							title: 'Correo Marketing', description: '', url: '/templates/mails/FG-Template-Email-Marketing.html'
						},
						{
							title: '3 Columnas con imagenes', description: '', url: '/templates/mails/FG-three-cols-images.html'
						},
						{
							title: '2 Columnas simples', description: '', url: '/templates/mails/FG-two-cols-simple.html'
						},
						{
							title: 'Wayfair (Blog)', description: '', url: '/templates/mails/FG-wayfair-blog.html'
						},
						{
							title: 'Wayfair (Newsletter)', description: '', url: '/templates/mails/FG-wayfair-newsletter.html'
						},
						{
							title: 'Wayfair (Transactional)', description: '', url: '/templates/mails/FG-wayfair-transactional.html'
						},
						{
							title: 'Registro', description: 'register', url: '/templates/mails/register.php'
						},
					],
					template_cdate_format: '[Fecha de Creacion (CDATE): %m/%d/%Y : %H:%M:%S]',
					template_mdate_format: '[Fecha de Modificación (MDATE): %m/%d/%Y : %H:%M:%S]',
					//code_dialog_height: 200,
					// importcss_file_filter: "/templates/mails/style01.css",
					fullpage_default_doctype: "<!DOCTYPE html>",
					fullpage_default_encoding: "UTF-8",
					fullpage_default_font_size: "12px",
					fullpage_fontsizes : '13px,14px,15px,18pt,xx-large',
					fullpage_default_font_family: "'Times New Roman', Georgia, Serif;",
					fullpage_default_langcode: "es-CO",
					fullpage_default_title: (self.form.subject !== undefined && self.form.subject !== "") ? self.form.subject : "",
					// fullpage_default_text_color: "blue",
					fullpage_hide_in_source_view: false,
					style_formats: [
						{
							title: 'Headers',
							items: [
								{ title: 'h1', block: 'h1' },
								{ title: 'h2', block: 'h2' },
								{ title: 'h3', block: 'h3' },
								{ title: 'h4', block: 'h4' },
								{ title: 'h5', block: 'h5' },
								{ title: 'h6', block: 'h6' }
							]
						},
						{
							title: 'Blocks',
							items: [
								{ title: 'p', block: 'p' },
								{ title: 'div', block: 'div' },
								{ title: 'pre', block: 'pre' }
							]
						},
						{
							title: 'Containers',
							items: [
								{ title: 'section', block: 'section', wrapper: true, merge_siblings: false },
								{ title: 'article', block: 'article', wrapper: true, merge_siblings: false },
								{ title: 'blockquote', block: 'blockquote', wrapper: true },
								{ title: 'hgroup', block: 'hgroup', wrapper: true },
								{ title: 'aside', block: 'aside', wrapper: true },
								{ title: 'figure', block: 'figure', wrapper: true }
							]
						}
					],
					/*file_picker_callback: function(cb, value, meta) {
						var input = document.createElement('input');
						input.setAttribute('type', 'file');
						input.setAttribute('accept', 'image/*');
						input.onchange = function() {
							var file = this.files[0];
							var reader = new FileReader();
							reader.onload = function () {
									var id = 'blobid' + (new Date()).getTime();
									var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
									var base64 = reader.result.split(',')[1];
									var blobInfo = blobCache.create(id, file, base64);
									blobCache.add(blobInfo);
									cb(blobInfo.blobUri(), { title: file.name });
							};
							reader.readAsDataURL(file);
						};
						input.click();
					},
					*/
					images_upload_handler: function (blobInfo, success, failure) {
						var xhr, formData;
						xhr = new XMLHttpRequest();
						xhr.withCredentials = false;
						xhr.open('POST', '/index.php?controller=site&action=UploadFile');
						xhr.onload = function() {
						  var json;
						  if (xhr.status != 200) { failure('HTTP Error: ' + xhr.status); return; }
						  // jsonResponse = JSON.parse(xhr.response);
						  jsonResponse = JSON.parse(xhr.responseText);
						  if(jsonResponse.error == false && jsonResponse.files.length > 0){
							  json = jsonResponse.files[0];
							  json.location = location.protocol + '//' + location.hostname + json.path_short;
							  
						  } else {
							  failure('Error Subuendi el/los archivos: ');
						  }
						  
						  if (!json || typeof json.location != 'string') {
							failure('Invalid JSON: ' + xhr.responseText);
							return;
						  }
						  success(json.location);
						};
						formData = new FormData();
						formData.append('file', blobInfo.blob(), blobInfo.filename());
						xhr.send(formData);
					  },
				});
			},
			addFileInEmail(file_id, mail_id){
				var xhr, formData;
				xhr = new XMLHttpRequest();
				xhr.open('POST', '/api.php/records/emails_attachments');
				xhr.onload = function() {
				  var json;
				  if (xhr.status != 200) { failure('HTTP Error: ' + xhr.status); return; }
				  // jsonResponse = JSON.parse(xhr.response);
				  jsonResponse = JSON.parse(xhr.responseText);
				  if(jsonResponse.data !== undefined && jsonResponse.data > 0){
					  json = true;
				  } else {
					  console.error('Error enlazando el archivo: ');
					  json = false;
				  }
				  return json;
				};
				formData = new FormData();
				formData.append('email', mail_id);
				formData.append('attachment', file_id);
				xhr.send(formData);
			},
			openFileAtt(){
				var self = this;
				var input = document.getElementById('file-attachments');
				var file = input.files[0];
				var reader = new FileReader();
				reader.onload = function () {
					console.log('openFileAtt => file', file);
					var xhr, formData;
					xhr = new XMLHttpRequest();
					xhr.withCredentials = false;
					xhr.open('POST', '/index.php?controller=site&action=UploadFile');
					
					xhr.onload = function() {
					  var json;
					  if (xhr.status != 200) { failure('HTTP Error: ' + xhr.status); return; }
					  // jsonResponse = JSON.parse(xhr.response);
					  jsonResponse = JSON.parse(xhr.responseText);
					  if(jsonResponse.error == false && jsonResponse.files.length > 0){
						  console.log('jsonResponse', jsonResponse);
						  if(jsonResponse.error == false){
							  json = jsonResponse.files[0];
							  self.form.attachments.push(json);
							  enlace = self.addFileInEmail(json.id, self.mail_id);
							  console.log('enlace', enlace);
							  // json.id
						  }
					  } else {
						  console.error('Error subiendo el/los archivos: ');
					  }
					  
					  if (!json || typeof json.error == true) {
						console.error('Invalid JSON: ' + xhr.responseText);
						return;
					  }
					  self.saveDraft();
					  // success(json.location);
					  return json;
					};
					
					formData = new FormData();
					formData.append('file', file);
					xhr.send(formData);
				};
				reader.readAsDataURL(file);
			},
			addAttachments(){				
				// input = $("#file-attachments");
				
				
				var file = input.files[0];
				var reader = new FileReader();
				reader.onload = function () {
						var id = 'blobid' + (new Date()).getTime();
						var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
						var base64 = reader.result.split(',')[1];
						var blobInfo = blobCache.create(id, file, base64);
						blobCache.add(blobInfo);
						// cb(blobInfo.blobUri(), { title: file.name });
				};
				reader.readAsDataURL(file);
				
				return;
				var file = {};
				file.name = elm.val();
				
				var id = 'blobid' + (new Date()).getTime();
				var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
				var blobInfo = blobCache.create(id, file);
				
			},
			saveDraft(){
				var self = this;
				/*message = self.encode_utf8(tinyMCE.activeEditor.getContent()).split('').map(function (char) {
					return char.charCodeAt(0).toString(2);
				}).join(' ');;*/
				message = self.encode_utf8(tinyMCE.activeEditor.getContent());
				// doc = tinyMCE.activeEditor.getDoc();
				self.form.message = message;
				console.log('Guardando Mensaje actual ', self.form);
				
				var Notice = new PNotify({
					//styling: "bootstrap3",
					text: 'Guardando',
					icon: 'fa fa-spinner fa-pulse',
					hide: false,
					shadow: false,
					width: '200px',
				});
				
				console.log((message));
				api.put('/api.php/records/emails/' + self.form.id, {
					id: self.form.id,
					subject: self.form.subject,
					message: (self.form.message),
					to: JSON.stringify(self.form.to),
					attachments: JSON.stringify(self.form.attachments),
					create_by: <?= $this->user->id; ?>,
					status: 'drafting',
					delete: 0,
					seen: 0,
					recent: 0,
				})
				.then(function (r) {
					console.log(r);
					if(r.data > 0){
						Notice.update({
							title: 'Guardado!',
							text: 'Se guardo con éxito el mensaje.',
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
					console.log(error);
					console.log(error.response);
				});
			},
			validateEmail(email) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(String(email).toLowerCase());
			},
			getValidateEmail(address_mail, callback){
				var self = this;
				api.get('/index.php', {
					params: {
						controller: 'site',
						action: 'verificar_email',
						address_mail: address_mail,
					}
				})
				.then(function (r) {
					return r.data;					  
				})
				.catch(function (error) {
					if(error.response.data){ return error.response.data; } else { return error.response; };
				});
			},
			validateMailAddress(list, index){
				var self = this;
				var checkEmail = new PNotify({
					text: 'Validando ' + self.form[list][index].address_mail,
					icon: 'fa fa-spinner fa-pulse',
					hide: false,
					shadow: false,
					width: '200px',
					styling: "bootstrap3",
				});

				api.get('/index.php', {
					params: {
						controller: 'site',
						action: 'verificar_email',
						address_mail: self.form[list][index].address_mail,
					}
				})
				.then(function (r) {
					eCheck = r.data;
					self.form[list][index].valid = eCheck.error;
					
					checkEmail.update({
						title: "Resultado " + self.form[list][index].address_mail,
						text: eCheck.message,
						icon: (eCheck.error == true) ? 'fa fa-times' : 'fa fa-check',
						hide: true,
						type: (eCheck.error == true) ? 'error' : 'success',
						shadow: true,
						width: '25%',
						modules: {
						  Buttons: {
							closer: false,
							sticker: false
						  }
						}
					});
				})
				.catch(function (error) {
					console.error(error.response);
				});
			},
			saveEndCallback(cb){
				var self = this;
				console.log('Guardando mensaje actual para ser enviado.');
				message = (tinyMCE.activeEditor.getContent());
				self.form.message = message;
				
				api.put('/api.php/records/emails/' + self.form.id, {
					id: self.form.id,
					subject: self.form.subject,
					message: self.form.message,
					to: JSON.stringify(self.form.to),
					attachments: JSON.stringify(self.form.attachments),
					create_by: <?= $this->user->id; ?>,
					status: 'send',
					send: 1,
					draft: 0,
					delete: 0,
					seen: 0,
					recent: 0,
				})
				.then(cb)
				.catch(cb);
			},
			validateMail(){
				console.log("Validando correo para ser enviado");
				var self = this;
				//self.saveDraft();
				
				var percent = 0;
				var form = {};
				var notice = new PNotify({
					//styling: "bootstrap3",
					text: 'Confirme que desee enviar el correo electronico?.',
					icon: 'fa fa-spinner fa-pulse',
					type: 'notice',
					width: '200px',
					hide: false,
					shadow: false,
					buttons: {
						closer: false,
						sticker: false
					},
					confirm: {
						confirm:true
					}
				}).get()
					.on('pnotify.confirm', function() {
						//alert('Ok, cool.');
						var notice = new PNotify({
							//styling: "bootstrap3",
							text: 'Confirme que desee enviar el correo electronico?.',
							icon: 'fa fa-spinner fa-pulse',
							//type: 'notice',
							width: '200px',
							hide: false,
							shadow: false,
							buttons: {
								closer: false,
								sticker: false
							},
						})
						
						form.box = self.$route.params.box_id;
						try {
							percent += 7;
							notice.update({ title: 'Validando cuenta de origen', text: percent + '% completado.', icon: 'fa fa-spinner fa-pulse', type: 'info' });
							if(form.box <= 0){ throw new excepcionForm("No existe el remitente o no tienes permisos para enviar con esta cuenta."); }
							notice.update({ title: 'Cuenta de origen. OK', text: percent + '% completado.', icon: 'fa fa-check', type: 'info' });
							
							var delayInMilliseconds = 1000; // 1 Segundo por campo = 1000 Milisegundos
							var toTotal = self.form.to.length;
							// console.log('toTotal', toTotal);
							// console.log('ccTotal', ccTotal);
							
							for (i = 0; i < toTotal; i++) { if (self.form.to[i].label.length < 4 || !self.validateEmail(self.form.to[i].address_mail)){ self.form.to.splice(i, 1); } };
							
							percent += 7;
							notice.update({ title: 'Validando asunto', text: percent + '% completado.', icon: 'fa fa-spinner fa-pulse', type: 'info' });
							selfContinue = self.form.subject == "" ? false : true;
							if(selfContinue == false){
								throw new excepcionForm("Cancelamos el envio por que no el correo no tiene asunto.");
							}else{
								console.log('Validando mensje');
								notice.update({ title: 'Validando mensaje', text: 'Estamos revisando el mensaje.', icon: 'fa fa-spinner fa-pulse', type: 'warning' });
								self.form.message = tinyMCE.activeEditor.getContent();
								htmlBody = $(self.form.message);
								if(htmlBody.length <= 2){ throw new excepcionForm("Cancelamos el envio por que el mensaje está vácio."); };
								notice.update({ title: 'Espere...', text: 'Estamos guardando el mensaje.', icon: 'fa fa-spinner fa-pulse', type: 'info' });
								
								self.saveEndCallback(function(resultSave){
									console.log('resultSave', resultSave);
									if(resultSave.data > 0){
										notice.update({ title: 'Espere un poco más...', text: 'Estamos colocando el mensaje en cola.', icon: 'fa fa-spinner fa-pulse', type: 'info' });
										setTimeout(function(){
											notice.update({ title: 'Enviando Mensaje', text: 'Enviando el mensaje...', icon: 'fa fa-spinner fa-pulse', type: 'warning' });
											self.$root.sendCallback(self.mail_id, self.form.box, function(resultSend){
												if(resultSend.error !== undefined && resultSend.error == false){
													notice.update({ title: 'Éxito!', text: 'Mensaje Enviado con éxito.', icon: 'fa fa-check', type: 'success', hide: true, shadow: true, buttons: { closer: true, sticker: true }, });
													self.$router.push({ name: 'View-Single', params: { mail_id: self.$route.params.mail_id, box_id: self.$route.params.box_id, index: self.$route.params.index, folder: 'send' } });
												}else{
													notice.update({ title: 'Error!', text: 'Ocurrio un error enviando el correo, revise en "Enviados" en caso de no ver el mensaje contacte con soporte.', icon: 'fa fa-times', type: 'danger', hide: false, shadow: false, buttons: { closer: true, sticker: true }, });
												}
											});
										}, 2000);
									}
								});
								
								
								
								// 
								
								/*
								notice.update({
									text: 'Confirme que desee enviar el correo electronico?.',
									type: 'notice',
									icon: false,
									buttons: {
										closer: false,
										sticker: false
									},
									confirm: {
										confirm:true
									}
								});
								notice.on('pnotify.confirm', function() {
									alert('Ok, cool.');
								});
								notice.on('pnotify.cancel', function() {
									alert('Oh ok. Chicken, I see.');
								});*/
								
								/*
								self.pNotify()
								.confirm({
									title: 'Todo listo!',
									text: 'Confirma que deseas enviar el correo electronico.'
								})
								.then(function onConfirm() {
									alert('Removido!');
								},function onCancel() {
									alert('Cancelado!');
								});
								*/
							}
						} 
						catch(e){
							// console.log(e);
							if (e.name === 'excepcionForm') {
								// console.log("Manejar error de Formulario.");
								// console.log(e.message);
								var options = {};
								options.error = 'success';
								options.text = e.message;
								options.icon = 'fa fa-times';
								options.hide = true;
								options.type = 'error';
								options.shadow = true;
								options.modules = { Buttons: { closer: true, sticker: true } };
								notice.update(options);
							} else {
								console.log("Manejar otros errores");
								notice.update({ title: 'Error!', text: 'Ocurrio un error, pero se identificó, revise los datos y vuelva a intentarlo, si continua contacte con soporte.', icon: 'fa fa-times', type: 'danger', hide: false, shadow: false, buttons: { closer: true, sticker: true }, });
								console.error(e);
							}
						}
					})
					.on('pnotify.cancel', function() {
						// alert('Oh ok. Chicken, I see.');
					});
			},
			validateMailOld(){
				// form.box = 0;
				
			},
			pNotify() {
				var defaultSettings = {
					icon: 'glyphicon glyphicon-question-sign'
				};
				var confirmSettings = {
					confirm: true,
					buttons: {
						closer: false,
						sticker: false
					},
					hide: false,
					history: {
						history: false
					}
				};
				var _api = {
					confirm: confirm
				};
				return _api;
				////////////
				function factory(settings) {
					settings = $.extend({}, defaultSettings, settings);
					return new PNotify({
						title: settings.title,
						text: settings.text,
						icon: 'glyphicon glyphicon-question-sign',
						hide: false,
						confirm: {
							confirm: true
						},
						buttons: {
							closer: false,
							sticker: false
						},
						history: {
							history: false
						}
					});
				}
				function confirm(settings) {
					confirmSettings.title = settings.title;
					confirmSettings.text = settings.text;
					var result = factory(confirmSettings).get();
					return {
						then: function (onConfirm, onCancel) {
							result.on('pnotify.confirm', onConfirm);
							result.on('pnotify.cancel', onCancel);
						}
					};
				}
			},
		},
	});

	var router = new VueRouter({
		routes:[
			{ path: '/:box_id/', component: Home, name: 'Home', params: { limit: 25 } },
			{ path: '/:box_id/folder/inbox', component: Home, name: 'Inbox', params: { limit: 25 } },
			{ path: '/:box_id/folder/:folder/1', component: Home, name: 'Folder', params: { limit: 25 } },
			{ path: '/:box_id/folder/:folder/:page', component: Home, name: 'Folder-Page', params: { limit: 25 } },
			{ path: '/:box_id/compose', component: Compose, name: 'Compose', params: { mail_id: 0 } },
			
			{ path: '/:folder/view/:box_id/view/:mail_id-:index', component: View, name: 'View' },
			{ path: '/:box_id/folder/:folder/view/:mail_id-:index', component: View, name: 'View-Single' },
			
			{ path: '/:box_id/folder/edit/:folder/:mail_id-:index/', component: Compose, name: 'Edit' },
			/*
			{ path: '/', component: Home, name: 'Home' },
			{ path: '/folder/:folder/', component: Home, name: 'Folder' },
			{ path: '/:box_id/compose', component: Compose, name: 'Compose', params: { mail_id: null } },
			{ path: '/:box_id/compose/:mail_id', component: Compose, name: 'Edit' },
			{ path: '/view/:mail_id-:index', component: View, name: 'View' },
			{ path: '/view/:box_id/:mail_id-:index', component: View, name: 'View-Single' },*/
		]
	});

	app = new Vue({
		router: router,
		data: function () {
			return {
				labels: {
					folders: {
						inbox: 'Bandeja de entrada',
						not_seen: 'Sin Leer',
						seen: 'Leidos',
						send: 'Enviados',
						trash: 'Papelera',
						draft: 'Borradores',
					}
				},
				box_id: 0,
				folder: 'inbox',
				boxes: <?php echo json_encode($AllBoxes); ?>,
				myBox: {
					"id": 0,
					"label": "",
					"enable": false,
					"mailbox": "{:/}",
					"username": "",
					"password": ""
				},
				mails: [],
				mail: {
					answered: 0,
					attachments: [],
					box: 0,
					created: '',
					date: new Date(),
					deleted: 0,
					draft: 0,
					flagged: 0,
					from: '',
					from_email: '',
					id: 0,
					isHtml: false,
					message: '',
					message_id: '',
					new: 0,
					recent: 0,
					response: 0,
					seen: 0,
					size: 0,
					status: '',
					subject: '',
					to: '',
					to_email: '',
					uid: 0,
				},
				
				ref: 0,
				folder: 'inbox',
				
				list: {
					limit: ((this.$route.params.limit != undefined && this.$route.params.limit > 0) ? this.$route.params.limit : 25),
					page: ((this.$route.params.page != undefined && this.$route.params.page > 0) ? this.$route.params.page : 1),
					total: 0,
					data: []
				}
			};
		},
		computed: {
			urlBodyEmail(){
				var self = this;
				
				
				return '/index.php?controller=site&action=My_email_body&ref=0&email_id=' + self.$route.params.mail_id;
			},
		},
		mounted(){
			var self = this;
			self.currentBox();
			if(self.list.data.length == 0 && self.box_id > 0){ 
				//self.loadList(self.box_id, self.folder);
			}
		},
		created() {
			var self = this;
		},
		methods: {
			currentBox(){
				var self = this;
				self.boxes.find(function(box) {
					if(box['id'] == self.$route.params.box_id){
						self.myBox = box;
					}
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
							//self.loadList(box_id, self.folder);
							self.loadMail(true);
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
					// console.log(error);
					return false;
				});
			},
			loadMail(force = false){
				var self = this;
				
				// console.log('box_id', self.$route.params.box_id);
				// console.log('mail_id', self.$route.params.mail_id);
				if(self.$route.params.mail_id != self.mail.id || force == true){
					console.log('Cargar.');
					
					api.get('/index.php', {
						params: {
							"controller": "site",
							"action": "my_email_id",
							"ref": self.$route.params.box_id >= 0 ? self.$route.params.box_id : 0,
							"message_id": self.$route.params.mail_id
						}
					})
					.then(function (r) {
						if(r.data !== undefined){
							if(r.data.error !== undefined && r.data.error == false){
								var infoEmail = r.data.record;
								//console.log('infoEmail', infoEmail);
								
								r.data.record.to = JSON.parse(r.data.record.to);
								r.data.record.date = new Date(r.data.record.date.date);
								
								if(r.data.record.draft == 1 && self.$route.name == 'Edit'){
									console.log('borrador');
									// self.$router.push({ name: 'Edit', params: { mail_id: r.data.record.id } });
									// Verificado - 
									// location.reload();
									 // self.loadTiny();
								}
								self.mail = r.data.record;
								//console.log('/loadMail', self.mail);
								// // console.log(self.email_single);
							}
						}else{
							// console.log('error');
							console.error('/loadMail');
						}
					})
					.catch(function (error) {
						// console.log(error);
						console.error('/loadMail', error);
					});
				} else {
					console.log('No cargar');
				}
				return self.mail;
			},
			loadList(boxId, folderSelected){
				var self = this;
				self.list.page = ((self.$route.params.page != undefined && self.$route.params.page > 0) ? self.$route.params.page : 1)
				self.list.limit = ((self.$route.params.limit != undefined && self.$route.params.limit > 0) ? self.$route.params.limit : 25)
				
				self.list.data = [];
				self.box_id = boxId;
				self.folder = folderSelected;
				if(self.box_id > 0){
					self.box_id = self.$route.params.box_id;
					self.folder = self.$route.params.folder;
				}
				
				if(self.folder == "" || self.folder == undefined){
					self.folder = 'inbox';
				}
				var folders = {
					'inbox': [
						'box,eq,' + self.$route.params.box_id,
						'deleted,eq,0',
						'seen,in,0,1',
						'draft,eq,0',
						'send,eq,0'
					],
					'seen': [
						'box,eq,' + self.$route.params.box_id,
						'deleted,eq,0',
						'seen,eq,1',
						'draft,eq,0',
						'send,eq,0'
					],
					'not_seen': [
						'box,eq,' + self.$route.params.box_id,
						'deleted,eq,0',
						'seen,eq,0',
						'draft,eq,0',
						'send,eq,0'
					],
					'trash': [
						'box,eq,' + self.$route.params.box_id,
						'deleted,eq,1',
						'seen,eq,0',
						'draft,eq,0',
						'send,eq,0'
					],
					'draft': [
						'box,eq,' + self.$route.params.box_id,
						'deleted,eq,0',
						'seen,eq,0',
						'draft,eq,1',
						'send,eq,0'
					],
					'send': [
						'box,eq,' + self.$route.params.box_id,
						'deleted,eq,0',
						'seen,eq,0',
						'draft,eq,0',
						'send,eq,1'
					],
					'default': [
						'box,eq,' + self.$route.params.box_id,
						'deleted,eq,0',
						'seen,in,0,1',
						'draft,eq,0',
						'send,eq,0'
					],
				};
				
				api.get('/api.php/records/emails', { params: {
					filter: folders[self.folder],
					order: 'id,desc',
					page: self.list.page + ',' + self.list.limit
				} })
				.then(function (r) {
					if(r.data !== undefined){
						if (r.data.records){
							self.list.total = r.data.results
							self.mails = [];
							r.data.records.forEach(function(mail){
								mail.date = new Date(mail.date);
								mail.attachments = JSON.parse(mail.attachments);
								// self.mails.push(mail);
								
								
								self.list.data.push(mail);
							});
						}
					}else{
						console.error('error');
					}
				})
				.catch(function (error) {
					// console.log(error);
				});
			},
			sendCallback(mail_id, box_id, cb){
				var self = this;
				var xhr, formData;
				xhr = new XMLHttpRequest();
				xhr.withCredentials = false;
				xhr.open('POST', '/index.php?controller=site&action=SendMail');
				xhr.onload = function() {
				  var json;
				  if (xhr.status != 200) { console.error('HTTP Error: ' + xhr.status); return; }
				  jsonResponse = JSON.parse(xhr.responseText);
				  cb(jsonResponse);
				};
				formData = new FormData();
				formData.append('mail_id', mail_id);
				formData.append('box_id', box_id);
				xhr.send(formData);
			},
		}
	}).$mount('#app');
</script>