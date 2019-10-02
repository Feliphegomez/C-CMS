<style>
.mail-box {
    border-collapse: collapse;
    border-spacing: 0;
    display: table;
    table-layout: fixed;
    width: 100%;
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
a.mail-dropdown {
    background: none repeat scroll 0 0 #80d3d9;
    border-radius: 2px;
    color: #01a7b3;
    font-size: 10px;
    margin-top: 20px;
    padding: 3px 5px;
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
    background: none repeat scroll 0 0 #41cac0;
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
    padding: 0px;
    margin: 0px;
}
 
</style>

<div id="app">
	<div class="mail-box">
		<aside class="sm-side">
			<div class="user-head">
				<!-- //
				<a class="inbox-avatar" href="javascript:;">
					<img  width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
				</a>
				-->
				<!-- Default dropright button -->
				<div class="row">
					<div class="col-sm-10" style="overflow:hidden;">
						<div class="user-name">
							<h5><a href="#">{{ myBox.label }}</a></h5>
							<span><a href="#">{{ myBox.user }}</a></span>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="btn-group dropright mail-dropdown pull-right">
							<a class="mail-dropdown pull-right dropdown-toggle" href="javascript:;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li v-for="(box, index_box) in boxes" :key="box.id" class="dropdown-item">
									<router-link :to="{ name: 'Home', params: { box_id: box.id } }" tag="a">
										{{ box.label }}
									</router-link>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
			<div class="inbox-body">
				<router-link v-bind:to="{ name: 'Compose', params: { box_id: myBox.id } }" tag="a" class="btn btn-compose">
					Redactar
				</router-link>
			</div>
			<ul class="inbox-nav inbox-divider">
				<router-link :to="{ name: 'Folder', params: { folder: 'inbox' } }" tag="li">
					<a>
						<i class="fa fa-inbox"></i>
						Bandeja Entrada
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
		</aside>
		<aside class="lg-side" style="overflow-y:auto; max-height:calc(80vh);min-height: calc(80vh);zoom: 0.8;">
			<div style="overflow-y:auto; max-height:100%;min-height:100%;" class="col-sm-12 mail_view" style="overflow:auto;max-height:calc(80vh);min-height: calc(80vh);">
				<router-view :key="$route.fullPath"></router-view><!-- //  :change="currentBox()" -->
			</div>
		</aside>
	</div>
</div>
	
<template id="home">
	<div>
		<div class="inbox-head">
			<h3>
				<template v-if="$root.folder != undefined">{{ $root.folder }}</template>
			</h3>
			<form action="#" class="pull-right position">
				<div class="input-append">
					<input type="text" class="sr-input" placeholder="No habilitado">
					<button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</div>
		<div class="inbox-body">
			<div class="mail-option">
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
				<div class="btn-group">
					<a click="$root.loadList(box_id, folder)" data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
						<i class=" fa fa-refresh"></i>
					</a>
				</div>
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
				
				<ul class="unstyled inbox-pagination">
					 <li><span> {{ $root.mails.length }} Total</span></li>
				</ul>
			</div>
			<table class="table table-inbox table-hover">
				<tbody>
					<tr v-if="$root.mails.length == null || $root.mails.length <= 0">
						<td colspan="6">No hay mensajes</td>
					</tr>
					<tr v-for="(mail, index_mail) in $root.mails" :class="mail.status" :key="mail.index_mail" v-else>
						<template v-if="mail.id !== undefined && mail.id > 0">
							<td class="inbox-small-cells">
								<!-- // <input type="checkbox" class="mail-checkbox" /> -->
							</td>
							<td class="inbox-small-cells">
								<template v-if="mail.recent !== undefined && mail.recent === 1">
									<i class="fa fa-asterisk"></i>
								</template>
								
								<template v-if="mail.answered !== undefined && mail.answered === 1">
									<i class="fa fa-share"></i> 
								</template>
								
								<template v-if="mail.draft !== undefined && mail.draft === 1">
									<i class="fa fa-edit"></i> 
								</template>
								<template v-if="mail.deleted !== undefined && mail.deleted === 1">
									<i class="fa fa-trash"></i> 
								</template>
							</td>
							<td class="view-message dont-show">
								<template v-if="mail.from !== undefined && mail.from !== undefined">
									<router-link :key="index_mail" v-bind:to="{ name: 'View-Single', params: { box_id: mail.box, index: index_mail, mail_id: mail.id, folder: folder } }">
										{{ mail.from.slice(0,22) }}
									</router-link>
								</template>
							</td>
							<td class="view-message">
								<template v-if="mail.subject !== undefined">
									<router-link :key="index_mail" v-bind:to="{ name: 'View-Single', params: { box_id: mail.box, index: index_mail, mail_id: mail.id, folder: folder } }">
										{{ mail.subject.slice(0,28) }}
									</router-link>
								</template>
							</td>
							<td class="view-message inbox-small-cells">
									<router-link 
										:key="index_mail" 
										v-bind:to="{ name: 'View-Single', params: { box_id: mail.box, index: index_mail, mail_id: mail.id, folder: folder } }"
										v-if="mail.attachments.length > 0" :title="mail.attachments.length">
										<i class="fa fa-paperclip"></i>
									</router-link>
							</td>
							<td class="view-message text-right">
								<template v-if="mail.date !== undefined && mail.date !== undefined">
									<router-link :key="index_mail" v-bind:to="{ name: 'View-Single', params: { box_id: mail.box, index: index_mail, mail_id: mail.id } }">
										{{ mail.date }}
									</router-link>
								</template>
							</td>
						</template>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<template id="view">
	<div>
		<div class="inbox-head">
			<div class="col-sm-7">
				<h3><b>Asunto: </b> {{ mail.subject }}</h3>
			</div>
			<div class="col-sm-5 text-right">
				<ul class="unstyled inbox-pagination">
					<li><span>{{ mail.date }}</span></li>
				</ul>
			</div>
		</div>
		<div class="inbox-body">
			<div class="mail-option">
				<ul class="unstyled inbox-pagination">
					<li><span>{{ index }} de {{ mailsTotal }}</span></li>
					<li v-if="prevMail.id > 0">
						<router-link accesskey="b" class="np-btn" :key="prevMail.id" v-bind:to="{ name: 'View-Single', params: { box_id: prevMail.box_id, index: prevMail.index, mail_id: prevMail.id, folder: folder } }">
							<i class="fa fa-angle-left  pagination-left"></i>
						</router-link>
					</li>
					<li v-if="nextMail.id > 0">
						<router-link accesskey="n" class="np-btn" :key="nextMail.id" v-bind:to="{ name: 'View-Single', params: { box_id: nextMail.box_id, index: nextMail.index, mail_id: nextMail.id, folder: folder } }">
							<i class="fa fa-angle-right pagination-right"></i>
						</router-link>
					</li>
					<li>
						<router-link tag="a" data-original-title="Regresar" data-placement="top" data-toggle="dropdown" v-bind:to="{ name: 'Folder', folder: $route.params.folder }" class="np-btn">
							<i class="fa fa-times"></i> 
						</router-link>
					</li>
				</ul>
			</div>
			<div class="mail-option">
				<!-- //
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
				<div v-if="mail.deleted == 1" class="btn-group">
					<a @click="$root.changeFolder(mail.id, $root.ref, 'not_seen')" class="btn mini blue" aria-expanded="false">
						<i class="fa fa-inbox"></i> Sacar de la papelera
					</a>
				</div>
				
				<div class="btn-group hidden-phone">
					<a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
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
					<a class="btn mini blue" aria-expanded="false" type="button" @click="printMail()">
						<i class="fa fa-share"></i>  Re Enviar
					</a>
				</div>
				
				<div class="btn-group">
					<a class="btn mini blue" aria-expanded="false" type="button" @click="printMail()">
						<i class="fa fa-reply"></i>  Responder
					</a>
				</div>
				
				<div v-if="mail.seen == 0 && mail.draft == 0 && mail.deleted == 0 && mail.send !== 0" class="btn-group">
					<a @click="$root.changeFolder(mail.id, $root.ref, 'seen')" class="btn mini blue" aria-expanded="false">
						<i class="fa fa-check-circle"></i> Marcar como leído
					</a>
				</div>
				<div v-if="mail.seen == 1 && mail.draft == 0 && mail.deleted == 0 && mail.send !== 0" class="btn-group">
					<a @click="$root.changeFolder(mail.id, $root.ref, 'not_seen')" class="btn mini blue" aria-expanded="false">
						<i class="fa fa-check-circle-o"></i> Marcar como no leído
					</a>
				</div>
				
				
				<ul class="unstyled inbox-pagination">
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
				</ul>
			</div>
			<div class="mail_heading row">
				<div class="col-sm-12">
					<h4>
						
						<b>De:</b> {{ mail.from }}
						<br>
						<b>Para:</b> {{ mail.to }}
					</h4>
				</div>
				<div class="col-sm-12">
				</div>
			</div>
			
			<template v-if="mail.attachments !== undefined">
				<div class="" v-if="mail.attachments.length > 0">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="fa fa-paperclip"></i> Archivos Adjuntos ({{ mail.attachments.length }})
							</h3>
						</div>
						<ul class="list-group">
							
							<a :href="attachment.path_short" download="" class="list-group-item " v-for="attachment, index) in (mail.attachments)">
								{{ attachment.name.slice(0,25) }} - 
								<b style="color:olivedrab;">Clic para descargar</b>
							</a>
							
						</ul>
					</div>
				</div>
				<div v-else="">Este correo no contiene archivos adjuntos.</div>
				<div class="ln_solid"></div>
				<div class="clearfix"></div>
			</template>
			
			
			<div class="view-mail">
				<template v-if="mail.message !== undefined">
					<div style="border: #666 0.25px dashed; zoom:0.8;padding:24px;">
						<!-- // <div v-html="mail.message"></div> -->
						<!-- <div v-html="mail.message" width="100%" style="height:auto;min-height:calc(100vh)"></div> -->
						<iframe id="printf" name="printf" frameborder="0" width="100%" style="height:auto;min-height:calc(100vh)" :src="$root.urlBodyEmail" :key="mail.id"></iframe>
					</div>
				</template>
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
				<div class="btn-group">
					<router-link :to="{ name: 'Home', params: { box_id: $route.params.box_id, folder: 'inbox' } }" tag="a" class="btn mini blue" aria-expanded="false" type="button">
						<i class=" fa fa-times"></i>
					</router-link>
				</div>
				
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
					<a @click="printMail()" class="btn mini blue" aria-expanded="false" type="button">
						<i class="fa fa-floppy-o"></i> Guardar
					</a>
				</div>
				<div class="btn-group">
					<a @click="printMail()" class="btn mini blue" aria-expanded="false" type="button">
						<i class="fa fa-send"></i>  Enviar
					</a>
				</div>
				
				
				<!-- //
				<ul class="unstyled inbox-pagination">
					 <li><span>1-50 of 234</span></li>
					 <li>
						 <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
					 </li>
					 <li>
						 <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
					 </li>
				</ul>
				-->
			</div>
			<div class="mail-option">
			</div>
		</div>
		<div class="inbox-body">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
						
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="compose-to">
								Para: <span class="required">*</span>
							</label>
							<div class="col-md-10 col-sm-10 col-xs-12">
								<div class="col-xs-12" v-for="(from, from_index) in form.from">
									<div class="col-xs-4">
										<input required="required" type="text" class="tags form-control" v-model="from.label" />
									</div>
									<div class="col-xs-6">
										<input required="required" type="email" class="tags form-control" v-model="from.address_mail" />
									</div>
									<div class="col-xs-2">
										<a class="btn btn-sm btn-danger" @click="form.from.splice(from_index, 1)">
											<i class="fa fa-times"></i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-xs-10">
									<a class="btn btn-sm btn-success pull-right" @click="form.from.push({ label: '', address_mail: '' });">
										<i class="fa fa-plus"></i>
									</a>
								</div>
								<div class="col-xs-2"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="compose-cc">
								Cc / Bcc: <span class="required"></span>
							</label>
							<div class="col-md-10 col-sm-10 col-xs-12">
								<div class="col-xs-12" v-for="(CC, CC_index) in form.CC">
									<div class="col-xs-4">
										<input required="required" type="text" class="tags form-control" v-model="CC.label" />
									</div>
									<div class="col-xs-6">
										<input required="required" type="email" class="tags form-control" v-model="CC.address_mail" />
									</div>
									<div class="col-xs-2">
										<a class="btn btn-sm btn-danger" @click="form.CC.splice(from_index, 1)">
											<i class="fa fa-times"></i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-xs-10">
									<a class="btn btn-sm btn-success pull-right" @click="form.CC.push({ label: '', address_mail: '' });">
										<i class="fa fa-plus"></i>
									</a>
								</div>
								<div class="col-xs-2"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="compose-subject">
								Asunto: <span class="required">*</span>
							</label>
							<div class="col-md-10 col-sm-10 col-xs-12">
								<input type="text" v-model="form.subject" required="required" class="form-control" />
							</div>
						</div>
						
						<div class="ln_solid"></div>
						
						<div class="form-group">
							<div id="alerts"></div>
							<textarea v-model="form.message" name="editor-message" id="editor-message"></textarea>
						</div>
						<div class="ln_solid"></div>
						

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
					  <div class="ln_solid"></div>
					  <div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
						  <button type="submit" class="btn btn-success">Submit</button>
						</div>
					  </div>

					</form>
					
			  </div>
			</div>
			<div class="clearfix"></div>
		</div>
			
		<!-- // 
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
		-->
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
			// console.log(self.box_id + ' - ' + self.folder);
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
			if(Number(self.$route.params.box_id) > 0 && self.$root.mails.length == 0){
				self.$root.loadList((self.$route.params.box_id), self.$route.params.folder);
			}
			self.$root.loadMail();
			indexCurr = Number(self.$route.params.index);
			indexPrev = (Number(self.$route.params.index) - 1);
			indexNext = (Number(self.$route.params.index) + 1);
			self.index = indexCurr + 1;
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
					prevInfo = self.$root.mails[indexPrev];
					if(prevInfo.id != undefined && prevInfo.id > 0){
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
					nextInfo = self.$root.mails[indexNext];
					if(nextInfo.id != undefined && nextInfo.id > 0){
						returnInfo.id = nextInfo.id;
						returnInfo.box_id = nextInfo.box;
						returnInfo.index = indexNext;
					}
				}
				
				return returnInfo;
			},
			mailsTotal(){
				return this.$root.mails.length;
			},
			mail(){
				return this.$root.mail;
			},
			mails(){
				return this.$root.mails;
			},
		},
		methods: {
			unescape(unsafe){
				return window.unescape(unsafe);
			},
			translateAttachments(attachments){
				return JSON.parse(attachments);
			},
			
			printMail(){
				var self = this;
				window.frames["printf"].focus();
				window.frames["printf"].print();
			},
		}
	});

	var Compose = Vue.extend({
		template: '#compose-edit',
		data() {
			return {
				mail_id: this.$route.params.mail_id,
				record: {
					answered: 0,
					attachments: [],
					box: 0,
					created: '',
					date: '',
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
				form: {
					from: [
						{ label: 'Ayuda y Soporte Monteverde', address_mail: 'soporte@monteverdeltda.com' },
					],
					CC: [],
					subject: '',
					message: '',
					attachments: [],
				},
			};
		},
		mounted() {
			var self = this;
			if(self.mail_id == null || self.mail_id == 0){
				console.log('no hay email.');
			}
			
			self.loadTiny();
		},
		created() {},
		methods: {
			loadTiny(){
				var self = this;
				/*tinymce.init({
					selector: "#editor-message",  // change this value according to your HTML
					plugins: "template",
					menubar: "insert",
					toolbar: "template",
					templates: [
						{title: 'Some title 1', description: 'Some desc 1', content: 'My content'},
						{title: 'Some title 2', description: 'Some desc 2', content: 'My content 2'},
						//{title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
					]
				});*/
				var fakeServer = (function () {
				  /* Use tinymce's Promise shim */
				  var Promise = tinymce.util.Promise;

				  /* Some user names for our fake server */
				  var userNames = [
					'Terry Green', 'Edward Carroll', 'Virginia Turner', 'Alexander Schneider', 'Gary Vasquez', 'Randy Howell',
					'Katherine Moore', 'Betty Washington', 'Grace Chapman', 'Christina Nguyen', 'Danielle Rose', 'Thomas Freeman',
					'Thomas Armstrong', 'Vincent Lee', 'Brittany Kelley', 'Brenda Wheeler', 'Amy Price', 'Hannah Harvey',
					'Bobby Howard', 'Frank Fox', 'Diane Hopkins', 'Johnny Hawkins', 'Sean Alexander', 'Emma Roberts', 'Thomas Snyder',
					'Thomas Allen', 'Rebecca Ross', 'Amy Boyd', 'Kenneth Watkins', 'Sarah Tucker', 'Lawrence Burke', 'Emma Carr',
					'Zachary Mason', 'John Scott', 'Michelle Davis', 'Nicholas Cole', 'Gerald Nelson', 'Emily Smith', 'Christian Stephens',
					'Grace Carr', 'Arthur Watkins', 'Frances Baker', 'Katherine Cook', 'Roger Wallace', 'Pamela Arnold', 'Linda Barnes',
					'Jacob Warren', 'Billy Ramirez', 'Pamela Walsh', 'Paul Wade', 'Katherine Campbell', 'Jeffrey Berry', 'Patrick Bowman',
					'Dennis Alvarez', 'Crystal Lucas', 'Howard Mendoza', 'Patricia Wallace', 'Peter Stone', 'Tiffany Lane', 'Joe Perkins',
					'Gloria Reynolds', 'Willie Fernandez', 'Doris Harper', 'Heather Sandoval', 'Danielle Franklin', 'Ann Ellis',
					'Christopher Hernandez', 'Pamela Perry', 'Matthew Henderson', 'Jesse Mitchell', 'Olivia Reed', 'David Clark', 'Juan Taylor',
					'Michael Garrett', 'Gerald Guerrero', 'Jerry Coleman', 'Joyce Vasquez', 'Jane Bryant', 'Sean West', 'Deborah Bradley',
					'Phillip Castillo', 'Martha Coleman', 'Ryan Santos', 'Harold Hanson', 'Frances Hoffman', 'Heather Fisher', 'Martha Martin',
					'George Gray', 'Rachel Herrera', 'Billy Hart', 'Kelly Campbell', 'Kelly Marshall', 'Doris Simmons', 'Julie George',
					'Raymond Burke', 'Ruth Hart', 'Jack Schmidt', 'Billy Schmidt', 'Ruth Wagner', 'Zachary Estrada', 'Olivia Griffin', 'Ann Hayes',
					'Julia Weaver', 'Anna Nelson', 'Willie Anderson', 'Anna Schneider', 'Debra Torres', 'Jordan Holmes', 'Thomas Dean',
					'Maria Burton', 'Terry Long', 'Danielle McDonald', 'Kyle Flores', 'Cheryl Garcia', 'Judy Delgado', 'Karen Elliott',
					'Vincent Ortiz', 'Ann Wright', 'Ann Ramos', 'Roy Jensen', 'Keith Cunningham', 'Mary Campbell', 'Jesse Ortiz', 'Joseph Mendoza',
					'Nathan Bishop', 'Lori Valdez', 'Tammy Jacobs', 'Mary West', 'Juan Mitchell', 'Thomas Adams', 'Christian Martinez', 'James Ramos',
					'Deborah Ross', 'Eric Holmes', 'Thomas Diaz', 'Sharon Morales', 'Kathryn Hamilton', 'Helen Edwards', 'Betty Powell',
					'Harry Campbell', 'Raymond Perkins', 'Melissa Wallace', 'Danielle Hicks', 'Harold Brewer', 'Jack Burns', 'Anna Robinson',
					'Dorothy Nguyen', 'Jane Dean', 'Janice Hunter', 'Ryan Moore', 'Brian Riley', 'Brittany Bradley', 'Phillip Ortega', 'William Fisher',
					'Jennifer Schultz', 'Samantha Perez', 'Linda Carr', 'Ann Brown', 'Shirley Kim', 'Jeremy Alvarez', 'Dylan Oliver', 'Roy Gomez',
					'Ethan Brewer', 'Ruth Lucas', 'Marilyn Myers', 'Danielle Wright', 'Jose Meyer', 'Bobby Brown', 'Angela Crawford', 'Brandon Willis',
					'Kyle McDonald', 'Aaron Valdez', 'Kevin Webb', 'Ashley Gordon', 'Karen Jenkins', 'Johnny Santos', 'Ashley Henderson', 'Amy Walters',
					'Amber Rodriguez', 'Thomas Ross', 'Dorothy Wells', 'Jennifer Murphy', 'Douglas Phillips', 'Helen Johnston', 'Nathan Hawkins',
					'Roger Mitchell', 'Michael Young', 'Eugene Cruz', 'Kevin Snyder', 'Frank Ryan', 'Tiffany Peters', 'Beverly Garza', 'Maria Wright',
					'Shirley Jensen', 'Carolyn Munoz', 'Kathleen Day', 'Ethan Meyer', 'Rachel Fields', 'Joan Bell', 'Ashley Sims', 'Sara Fields',
					'Elizabeth Willis', 'Ralph Torres', 'Charles Lopez', 'Aaron Green', 'Arthur Hanson', 'Betty Snyder', 'Jose Romero', 'Linda Martinez',
					'Zachary Tran', 'Sean Matthews', 'Eric Elliott', 'Kimberly Welch', 'Jason Bennett', 'Nicole Patel', 'Emily Guzman', 'Lori Snyder',
					'Sandra White', 'Christina Lawson', 'Jacob Campbell', 'Ruth Foster', 'Mark McDonald', 'Carol Williams', 'Alice Washington',
					'Brandon Ross', 'Judy Burns', 'Zachary Hawkins', 'Julie Chavez', 'Randy Duncan', 'Lisa Robinson', 'Jacqueline Reynolds', 'Paul Weaver',
					'Edward Gilbert', 'Deborah Butler', 'Frances Fox', 'Joshua Schmidt', 'Ashley Oliver', 'Martha Chavez', 'Heather Hudson',
					'Lauren Collins', 'Catherine Marshall', 'Katherine Wells', 'Robert Munoz', 'Pamela Nelson', 'Dylan Bowman', 'Virginia Snyder',
					'Janet Ruiz', 'Ralph Burton', 'Jose Bryant', 'Russell Medina', 'Brittany Snyder', 'Richard Cruz', 'Matthew Jimenez', 'Danielle Graham',
					'Steven Guerrero', 'Benjamin Matthews', 'Janet Mendoza', 'Harry Brewer', 'Scott Cooper', 'Alexander Keller', 'Virginia Gordon',
					'Randy Scott', 'Kimberly Olson', 'Helen Lynch', 'Ronald Garcia', 'Joseph Willis', 'Philip Walker', 'Tiffany Harris', 'Brittany Weber',
					'Gregory Harris', 'Sean Owens', 'Wayne Meyer', 'Roy McCoy', 'Keith Lucas', 'Christian Watkins', 'Christopher Porter', 'Sandra Lopez',
					'Harry Ward', 'Julie Sims', 'Albert Keller', 'Lori Ortiz', 'Virginia Henry', 'Samuel Green', 'Judith Cole', 'Ethan Castillo', 'Angela Ellis',
					'Amy Reid', 'Jason Brewer', 'Aaron Clark', 'Aaron Elliott', 'Doris Herrera', 'Howard Castro', 'Kenneth Davis', 'Austin Spencer',
					'Jonathan Marshall', 'Phillip Nelson', 'Julia Guzman', 'Robert Hansen', 'Kevin Anderson', 'Gerald Arnold', 'Austin Castro', 'Zachary Moore',
					'Joseph Cooper', 'Barbara Black', 'Albert Mendez', 'Marie Lane', 'Jacob Nichols', 'Virginia Marshall', 'Aaron Miller', 'Linda Harvey',
					'Christopher Morris', 'Emma Fields', 'Scott Guzman', 'Olivia Alexander', 'Kelly Garrett', 'Jesse Hanson', 'Henry Wong', 'Billy Vasquez',
					'Larry Ramirez', 'Bryan Brooks', 'Alan Berry', 'Nicole Powell', 'Stephen Bowman', 'Eric Hughes', 'Elizabeth Obrien', 'Timothy Ramos',
					'Michelle Russell', 'Denise Ruiz', 'Sean Carter', 'Amanda Barnett', 'Kathy Black', 'Terry Gutierrez', 'John Jensen', 'Grace Sanchez',
					'Tiffany Harvey', 'Jacqueline Sims', 'Wayne Lee', 'Roy Foster', 'Joyce Hart', 'Joseph Russell', 'Harold Washington', 'Beverly Cox',
					'Nicole Morales', 'Anna Carpenter', 'Jesse Ray', 'Ann Snyder', 'Mark Diaz', 'Elizabeth Harper', 'Andrew Guerrero', 'Cheryl Silva',
					'Michelle Hudson', 'Jeffrey Santos', 'Victoria Vasquez', 'Matthew Meyer', 'Jacob Murray', 'Jose Munoz', 'Edward Howell', 'Vincent Hunter',
					'Daniel Walters', 'Samantha Obrien', 'Laura Elliott', 'Richard Olson', 'Daniel Graham', 'Carol Lee', 'Grace Sullivan', 'Nancy Rodriguez',
					'Tyler Tran', 'Crystal Shaw', 'Madison Allen', 'Ralph Sims', 'Joe Jenkins', 'Dennis Ray', 'Arthur Davidson', 'Victoria Allen', 'Arthur Jackson',
					'Joan Thomas', 'Daniel Hopkins', 'Gloria Hicks', 'Danielle Price', 'Craig Keller', 'Alan Morgan', 'Gregory Silva', 'Samantha Kelly',
					'Rachel Williamson', 'Bruce Garrett', 'Jacob Smith', 'Kathleen Nichols', 'Sarah Long', 'Carol Pearson', 'Virginia Mendez', 'Judy Valdez',
					'Jason Garza', 'Brenda Fowler', 'Karen Edwards', 'Alexander Anderson', 'Pamela Wallace', 'Ruth Howell', 'Walter Hernandez', 'George Lucas',
					'Samantha Long', 'Margaret Garza', 'Kathleen Schultz', 'Frances Guerrero', 'Amber Meyer', 'Rachel Morales', 'Teresa Curtis', 'Heather Bell',
					'Grace Johnson', 'Melissa King', 'Zachary Cook', 'Carol Schultz', 'Jane Beck', 'Karen Stone', 'Roger Brooks', 'Carolyn Fuller', 'Nicholas Coleman',
					'William Bishop', 'Christine May', 'Linda George', 'Jean Meyer', 'Cheryl Armstrong', 'Danielle Welch', 'Amanda Graham', 'Janice Carter',
					'Catherine Brooks', 'Lawrence Gonzalez', 'Amy Russell', 'Eugene Jimenez', 'Joseph Carlson', 'Peter McCoy', 'Jerry Washington', 'Carolyn Obrien',
					'Mark Walker', 'Stephanie Hoffman', 'Julie Pena', 'Karen Curtis', 'Bryan Cruz', 'Madison Shaw', 'Rachel Graham', 'Susan Simpson', 'Andrea Harrison',
					'Bryan Miller', 'Vincent McDonald', 'Jesse McCoy', 'Christine Ramos', 'Dorothy Riley', 'Karen Warren', 'Ashley Weber', 'Judith Robinson',
					'Alan Mendez', 'Donna Medina', 'Helen Lane', 'Douglas Clark', 'Brenda Romero', 'Doris Wells', 'Patrick Howell', 'Doris Lawrence', 'Harry Jacobs',
					'Phillip Rose', 'Deborah Patel', 'Bryan Day', 'Rachel Butler', 'Paul Butler', 'Judy Knight', 'Willie Wallace', 'Phillip Anderson', 'Emma Black',
					'Lisa Lynch', 'Kimberly Freeman', 'Ronald West', 'Kathleen Harris', 'Martha Ruiz', 'Phillip Moreno', 'Robert Vargas', 'Jesse Diaz', 'Christine Weber',
					'Karen Stanley', 'Theresa Edwards', 'Kathryn Chavez', 'Sarah Rios', 'Danielle Wong', 'Kathy Carr', 'Joan Diaz', 'Albert Walters',
					'Denise Kim', 'Katherine Pearson', 'Diana Richardson', 'Harry Ford', 'Eric Mills', 'Sean Hicks', 'Joe Brown', 'Judith Morgan', 'Harry Hunter',
					'Matthew Bryant', 'Tyler Rose', 'Mildred Delgado', 'Emma Peters', 'Walter Delgado', 'Lauren Gilbert', 'Christopher Romero'
				  ];

				  /* some user profile images for our fake server */
				  var images = [
					'camilarocun', 'brianmichel', 'absolutehype', '4l3d', 'lynseybrowne', 'hi_kendall', '4ae78e7058d2434', 'yusuf_y7',
					'beauty__tattoos', 'mehrank36176270', 'fabriziocuscini', 'hassaminian', 'mediajorge', 'alexbienz', 'eesates', 'donjain',
					'austinknight', 'ehlersd', 'bipiiin', 'victorstuber', 'curiousoffice', 'chowdhury_sayan', 'upslon', 'gcauchon', 'pawel_murawski',
					'mr_r_a', 'jeremieges', 'nickttng', 'patrikward', 'sinecdoques', 'gabrielbeduschi', 'ashmigosh', 'shxnx', 'laborisova',
					'anand_2688', 'mefahad', 'puneetsmail', 'jefrydagucci', 'duck4fuck', 'verbaux', 'nicolasjengler', 'sorousht_', 'am0rz',
					'dominiklevitsky', 'jarjan', 'ganilaughs', 'namphong122', 'tiggreen', 'allisongrayce', 'messagepadapp', 'madebylipsum',
					'tweetubhai', 'avonelink', 'ahmedkojito', 'piripipirics', 'dmackerman', 'markcipolla'
				  ];

				  /* some user profile descriptions for our fake server */
				  var descriptions = [
					'I like to work hard, play hard!',
					'I drink like a fish, that is a fish that drinks coffee.',
					'OutOfCheeseError: Please reinstall universe.',
					'Do not quote me.',
					'No one reads these things right?'
				  ];

				  /* This represents a database of users on the server */
				  var userDb = {};
				  userNames.map(function (fullName) {
					var name = fullName.toLowerCase().replace(/ /g, '');
					var description = descriptions[Math.floor(descriptions.length * Math.random())];
					var image = 'https://s3.amazonaws.com/uifaces/faces/twitter/' + images[Math.floor(images.length * Math.random())] + '/128.jpg';
					return {
					  id: name,
					  name: name,
					  fullName: fullName,
					  description: description,
					  image: image
					};
				  }).forEach(function(user) {
					userDb[user.id] = user;
				  });

				  /* This represents getting the complete list of users from the server with only basic details */
				  var fetchUsers = function() {
					return new Promise(function(resolve, _reject) {
					  /* simulate a server delay */
					  setTimeout(function() {
						var users = Object.keys(userDb).map(function(id) {
						  return {
							id: id,
							name: userDb[id].name,
						  };
						});
						resolve(users);
					  }, 500);
					});
				  };

				  /* This represents requesting all the details of a single user from the server database */
				  var fetchUser = function(id) {
					return new Promise(function(resolve, reject) {
					  /* simulate a server delay */
					  setTimeout(function() {
						if (Object.prototype.hasOwnProperty.call(userDb, id)) {
						  resolve(userDb[id]);
						}
						reject('unknown user id "' + id + '"');
					  }, 300);
					});
				  };

				  return {
					fetchUsers: fetchUsers,
					fetchUser: fetchUser
				  };
				})();

				/* These are "local" caches of the data returned from the fake server */
				var usersRequest = null;
				var userRequest = {};

				var mentions_fetch = function (query, success) {
				  /* Fetch your full user list from somewhere */
				  if (usersRequest === null) {
					usersRequest = fakeServer.fetchUsers();
				  }
				  usersRequest.then(function(users) {
					/* query.term is the text the user typed after the '@' */
					users = users.filter(function (user) {
					  return user.name.indexOf(query.term.toLowerCase()) !== -1;
					});

					users = users.slice(0, 10);

					/* Where the user object must contain the properties `id` and `name`
					   but you could additionally include anything else you deem useful. */
					success(users);
				  });
				};

				var mentions_menu_hover = function (userInfo, success) {
				  /* request more information about the user from the server and cache it locally */
				  if (!userRequest[userInfo.id]) {
					userRequest[userInfo.id] = fakeServer.fetchUser(userInfo.id);
				  }
				  userRequest[userInfo.id].then(function(userDetail) {
					var div = document.createElement('div');

					div.innerHTML = (
					'<div class="card">' +
					  '<h1>' + userDetail.fullName + '</h1>' +
					  '<img class="avatar" src="' + userDetail.image + '"/>' +
					  '<p>' + userDetail.description + '</p>' +
					'</div>'
					);

					success(div);
				  });
				};

				var mentions_menu_complete = function (editor, userInfo) {
				  var span = editor.getDoc().createElement('span');
				  span.className = 'mymention';
				  span.setAttribute('data-mention-id', userInfo.id);
				  span.appendChild(editor.getDoc().createTextNode('@' + userInfo.name));
				  return span;
				};

				var mentions_select = function (mention, success) {
				  /* `mention` is the element we previously created with `mentions_menu_complete`
					 in this case we have chosen to store the id as an attribute */
				  var id = mention.getAttribute('data-mention-id');
				  /* request more information about the user from the server and cache it locally */
				  if (!userRequest[id]) {
					userRequest[id] = fakeServer.fetchUser(id);
				  }
				  userRequest[id].then(function(userDetail) {
					var div = document.createElement('div');
					div.innerHTML = (
					  '<div class="card">' +
					  '<h1>' + userDetail.fullName + '</h1>' +
					  '<img class="avatar" src="' + userDetail.image + '"/>' +
					  '<p>' + userDetail.description + '</p>' +
					  '</div>'
					);
					success(div);
				  });
				};

				tinymce.init({
				  selector: 'textarea#editor-message',
				  //plugins: 'print preview fullpage powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons',
				  plugins: 'print preview fullpage casechange importcss searchreplace autolink directionality advcode'
				  + 'fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists'
				  + 'checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable formatpainter permanentpen pageembed charmap'
				  + 'quickbars linkchecker emoticons',
				  imagetools_cors_hosts: ['picsum.photos'],
				  tinydrive_token_provider: function (success, failure) {
					success({ token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJqb2huZG9lIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.Ks_BdfH4CWilyzLNk8S2gDARFhuxIauLa8PwhdEQhEo' });
				  },
				  tinydrive_demo_files_url: '/docs/demo/tiny-drive-demo/demo_files.json',
				  tinydrive_dropbox_app_key: 'jee1s9eykoh752j',
				  tinydrive_google_drive_key: 'AIzaSyAsVRuCBc-BLQ1xNKtnLHB3AeoK-xmOrTc',
				  tinydrive_google_drive_client_id: '748627179519-p9vv3va1mppc66fikai92b3ru73mpukf.apps.googleusercontent.com',
				  menubar: 'file edit view insert format tools table',
				  toolbar: 'undo template redo '
				  + '| bold italic underline strikethrough '
				  + '| fontselect fontsizeselect formatselect '
				  + '| alignleft aligncenter alignright alignjustify '
				  + '| outdent indent '
				  + '| numlist bullist checklist '
				  + '| forecolor backcolor casechange permanentpen formatpainter removeformat '
				  + '| pagebreak '
				  + '| charmap emoticons '
				  + '| fullscreen  preview save print '
				  + '| insertfile image media pageembed link anchor codesample '
				  + '| a11ycheck ltr rtl',
				  autosave_ask_before_unload: true,
				  autosave_interval: "30s",
				  autosave_prefix: "{path}{query}-{id}-",
				  autosave_restore_when_empty: false,
				  autosave_retention: "2m",
				  image_advtab: true,
				  content_css: [
					'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
					'//www.tiny.cloud/css/codepen.min.css'
				  ],
				  link_list: [
					{ title: 'My page 1', value: 'http://www.tinymce.com' },
					{ title: 'My page 2', value: 'http://www.moxiecode.com' }
				  ],
				  image_list: [
					{ title: 'My page 1', value: 'http://www.tinymce.com' },
					{ title: 'My page 2', value: 'http://www.moxiecode.com' }
				  ],
				  image_class_list: [
					{ title: 'None', value: '' },
					{ title: 'Some class', value: 'class-name' }
				  ],
				  importcss_append: true,
				  height: 400,
				  file_picker_callback: function (callback, value, meta) {
					/* Provide file and text for the link dialog */
					if (meta.filetype === 'file') {
					  callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
					}

					/* Provide image and alt text for the image dialog */
					if (meta.filetype === 'image') {
					  callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
					}

					/* Provide alternative source and posted for the media dialog */
					if (meta.filetype === 'media') {
					  callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
					}
				  },
				  templates: [
						{ title: 'Register', description: 'register', url: '/templates/mails/register.php' },
						{ title: 'signature-0001', description: '', url: '/templates/mails/signature-0001.html' },
						{ title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
						{ title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
						{ title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
					],
				  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
				  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
				  height: 600,
				  image_caption: true,
				  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
				  noneditable_noneditable_class: "mceNonEditable",
				  toolbar_drawer: 'sliding',
				  spellchecker_dialog: true,
				  spellchecker_whitelist: ['Ephox', 'Moxiecode'],
				  tinycomments_mode: 'embedded',
				  content_style: ".mymention{ color: green; }",
				  contextmenu: "link image imagetools table configurepermanentpen",
				  mentions_selector: '.mymention',
				  mentions_fetch: mentions_fetch,
				  mentions_menu_hover: mentions_menu_hover,
				  mentions_menu_complete: mentions_menu_complete,
				  mentions_select: mentions_select,
				  //language: 'ES_MX'
				  //language: 'advanced'
				 });
			}
		},
	});

	var router = new VueRouter({
		routes:[
			{ path: '/:box_id/folder/:folder', component: Home, name: 'Home', params: { folder: 'inbox' } },
			{ path: '/:box_id/folder/:folder/', component: Home, name: 'Folder' },
			{ path: '/:box_id/compose', component: Compose, name: 'Compose', params: { mail_id: 0 } },
			{ path: '/:box_id/compose/:mail_id', component: Compose, name: 'Edit' },
			{ path: '/:folder/view/:box_id/view/:mail_id-:index', component: View, name: 'View' },
			{ path: '/:box_id/folder/:folder/view/:mail_id-:index', component: View, name: 'View-Single' },
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
					date: '',
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
			if(self.mails.length == 0 && self.box_id > 0){
				self.loadList(self.box_id, self.folder);
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
							self.loadMail();
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
			},
			loadMail(){
				var self = this;
				api.get('/index.php', {
					params: {
						"controller": "site",
						"action": "my_email_id",
						"ref": self.$route.params.box_id >= 0 ? self.$route.params.box_id : 0,
						"message_id": self.$route.params.mail_id
					}
				})
				.then(function (r) {
					// console.log('r', r);
					if(r.data !== undefined){
						if(r.data.error !== undefined && r.data.error == false){
							return self.mail = r.data.record;
							// console.log(self.email_single);
						}
					}else{
						console.log('error');
					}
				})
				.catch(function (error) {
					console.log(error);
				});
			},
			loadList(boxId, folderSelected){
				var self = this;
				self.mails = [];
				self.box_id = boxId;
				self.folder = folderSelected;
				if(self.box_id > 0){
					self.box_id = self.$route.params.box_id;
					self.folder = self.$route.params.folder;
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
				
				console.log('loadList Folder:', self.folder);
				console.log('loadList boxId:', self.box_id);
				
				api.get('/api.php/records/emails', { params: {
					filter: folders[self.folder],
					order: 'id,desc',
				} })
				.then(function (r) {
					if(r.data !== undefined){
						if (r.data.records){
							self.mails = [];
							r.data.records.forEach(function(mail){
								// console.log('mail',  mail);
								mail.attachments = JSON.parse(mail.attachments)
								self.mails.push(mail);
							});
						}
					}else{
						console.error('error');
					}
				})
				.catch(function (error) {
					console.log(error);
				});
			},
		}
	}).$mount('#app');
</script>