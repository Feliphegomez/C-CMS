<div id="app">
	<div class="page-title">
		<div class="title_left">
			<h3>Evento <small>Administrador Master</small></h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<router-view :key="$route.fullPath" ></router-view>
	</div>
</div>


<!-- HOME -->
<template id="event-home">
	<div>
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Eventos<small>Master</small></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12 col-xs-12" id='calendar-container'>
							<div id='calendar-vue'></div>
						</div>
					</div>
					<!-- calendar modal create -->
					<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title" id="myModalLabel">Nuevo evento</h4>
								</div>
								<div class="modal-body">
									<div id="testmodal" style="padding: 5px 20px;">
										<form id="antoform" class="form-horizontal calender" role="form">
											<div class="form-group">
												<label class="col-sm-3 control-label">Titulo del evento</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="title" name="title">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Tipo de evento</label>
												<div class="col-sm-9">
													<select class="form-control" name="events_types" id="events_types">
														<option value="">Seleccione una opcion de la lista...</option>
														<option :value="type.id" :key="type.id" v-for="(type, index_type) in $root.options.events_types">
														{{ type.name }} [{{ type.id }}]
														</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Inicio</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="started" name="started">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Finalizacion</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="ended" name="ended">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label"></label>
												<div class="col-sm-9">
													<label>
													  <input name="allDay" id="allDay" type="checkbox"  checked="checked" /> ¿Todo el dia?
													</label>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Notas Adicionales</label>
												<div class="col-sm-9">
													<textarea class="form-control" style="height:55px;" id="notes" name="notes"></textarea>
												</div>
											</div>
											
											
											<div class="form-group">
												<label class="col-sm-3 control-label">Dirección(es)</label>
												<div class="col-sm-9">
													<textarea class="form-control" style="height:55px;" id="addresses" name="addresses"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Puntos de referencia</label>
												<div class="col-sm-9">
													<textarea class="form-control" style="height:55px;" id="points_ref" name="points_ref"></textarea>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cerrar</button>
									<button type="button" class="btn btn-primary antosubmit">Guardar Evento</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /calendar modal create -->
					<!-- calendar modal edit -->
					<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
								</div>
								<div class="modal-body">
									<div id="testmodal2" style="padding: 5px 20px;">
										<form id="antoform2" class="form-horizontal calender" role="form">
											<input type="hidden" class="form-control" id="idEdit" name="idEdit">
											
											<div class="form-group">
												<label class="col-sm-3 control-label">Titulo del evento</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="title2" name="title2">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Tipo de evento</label>
												<div class="col-sm-9">
													<select class="form-control" name="events_types2" id="events_types2">
														<option value="">Seleccione una opcion de la lista...</option>
														<option :value="type.id" :key="type.id" v-for="(type, index_type) in $root.options.events_types">
														{{ type.name }} [{{ type.id }}]
														</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Inicio</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="started2" name="started2">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Finalizacion</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="ended2" name="ended2">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label"></label>
												<div class="col-sm-9">
													<label>
													  <input name="allDay2" id="allDay2" type="checkbox"  checked="checked" /> ¿Todo el dia?
													</label>
												</div>
											</div>
							
											<div class="form-group">
												<label class="col-sm-3 control-label">Notas Adicionales</label>
												<div class="col-sm-9">
													<textarea class="form-control" style="height:55px;" id="notes2" name="notes2"></textarea>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-3 control-label">Dirección(es)</label>
												<div class="col-sm-9">
													<textarea class="form-control" style="height:55px;" id="addresses2" name="addresses2"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Puntos de referencia</label>
												<div class="col-sm-9">
													<textarea class="form-control" style="height:55px;" id="points_ref2" name="points_ref2"></textarea>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="modal-footer">
									<div class="pull pull-left">
										<button type="button" class="btn btn-danger" @click="deleteCurrent()">
											<i class="fa fa-trash"></i>
										</button>
									</div>
									<button type="button" class="btn btn-info" @click="viewCurrent()">
										<i class="fa fa-eye"></i>
										Ir al evento
									</button>
									
									
									<button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Cerrar</button>
									<button type="button" class="btn btn-success antosubmit2">Guardar Cambios</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /calendar modal edit -->
					
					<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
					<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
					<!-- /calendar modal -->
				</div>
			</div>
		</div>
	</div>
</template>
<!-- /HOME -->

<!-- EVENT DETAILS -->
<style scope="event-view-details">
@import url(https://fonts.googleapis.com/css?family=Open+Sans);

.sticky.stuck{
  border-bottom: thin solid rgba(0,0,0,.2);
  box-shadow:0 10px 15px -10px rgba(0,0,0,.1);
}


article {
  margin: 20px;
  background: #FFF;
  font-family: "Open Sans";
  box-shadow:1px 2px 3px rgba(0,0,0,.2);
  position: relative;
}

.art-text{
  padding: 10px 20px;
  overflow: auto;
}

.header-img {
  width: 100%;
  display: block;
}

.art-text img{
  max-width: 100%;
  float: left;
  margin: 10px 10px 0 0;
}

.embedded-video{
  margin: 0;
  padding: 0;
}

hr {
  margin: 10px 0;
  border: none;
  border-top: thin solid rgba(0,0,0,.1);
}

article:before{
  content: "\f05a";
  color: rgba(255,255,255,.9);
  display: block;
  position: absolute;
  font-family: FontAwesome;
  font-style: normal;
  font-weight: normal;
  font-size: 28px;
  text-align: center;
  padding: 5px 10px;
  top: 0px;
  right: 0px;
  border-bottom-left-radius: 20px;
  z-index: 100;
}

article:after{
  content: "Published: "attr(data-post-date);
  position: absolute;
  font-size: 10px;
  padding: 3px 5px;
  bottom: 0px;
  right: 0px;
  background: #FAFAFA;
  color: #AAA;
  
}

article.info:before{
  content: "\f05a";
  background: #29F;
}

article.video:before{
  content: "\f03d";
  background: #82F;
}
  
article.announcement:before{
  content: "\f0a1";
  background-color: #E32;
}

.calendar{
  min-width: 100%;
}

.ui-datepicker-header {
    color: #333;  
    font-weight: bold;
    line-height: 30px;
}  

.ui-datepicker {
  text-align: center;
  font-family: "Helvetica";
  color: #666;
  position: relative;
}

.date-block{
  text-align: center;
  background: #D32;
  font-family: "Helvetica";
  color: #F4F4F4;
  font-size: 18pt;
  padding: 10px;
  border-radius: 0.5em;
}

.date-day{
  font-size: 24pt;
}
.date-date{
  font-size: 48pt;
}

.ui-datepicker-prev, .ui-datepicker-next {  
    display: inline-block;  
    font-family: FontAwesome;
    width: 52px;  
    height: 30px;  
    text-align: center;  
    cursor: pointer;  
    background-color:none;  
    background-repeat: no-repeat;
    overflow: hidden;
    position: absolute;
    color: #D54;
}
.ui-datepicker-prev {  
    left: 0;  
    border-radius:0 0 30px 0;
}  
.ui-datepicker-next {  
    right: 0;  
    border-radius:0 0 0 30px; 
}  

.ui-datepicker-prev:before {
  content: "\f053";
  display: block;
}

.ui-datepicker-next:before {
  content: "\f054";
  display: block;
  
}

.ui-datepicker-year{
  font-weight: normal;
  color: #999;
}


.ui-datepicker-month{
  font-weight: bold;
  background: #EEE;
  font-size: 12pt;
  border: none;
}

.ui-datepicker-calendar {
  border-collapse:collapse;
  width: 100%;
  margin-top: 10px;
  text-align: center;
  font-family: "Helvetica";
}

.ui-datepicker td a, .ui-datepicker td span{
  text-decoration: none;
  display: block;
  width: 100%;
  font-size: 12px;
  padding: 10px 0;
  color: #333;
  border-radius: 50%;
  transition:all .1s ease;
}

.ui-datepicker td span{
  color: #BBB;
}

.ui-datepicker .ui-state-active {
  background: #BBB;
}
.ui-datepicker .ui-state-highlight {
  background: #FFF;
  color: #D32;
}


.ui-datepicker a:hover {
  background: #d32;
  color: #FAFAFA;
}

.social-buttons a{
  display: inline-block;
  color: #555;
  font-size: 24pt;
  width: 15%;
  text-align: center;
  
}

.social-buttons a:hover{
  color: #D43 ;
  color: attr(data-color);
}



.twitter-timeline {
  width: 100%;
  min-width: 300px;
  height: 500px;
  border-radius:10px;
}

/*//////////// FOOTER ///////////*/



.socialList li{
  display: inline-block;
  font-size: 3em;
  color: #555;
  width: 10%;
  min-width: 50px;
}

.socialList li a:hover{
  color: #D55;
  text-shadow:0 0 5px #500;

}

/*//////////// MEDIA ////////////*/

@media screen and (max-width:600px){
  .calendar {
    width: 100%;
    max-width: none;
  }
  
  
  .ui-datepicker td a, .ui-datepicker td span{
    border-radius:0;
  }
  
  
  .twitter-feed{
    margin: 20px;
  }
}




.info-event .nav {
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
	font-size: 14px;
	line-height: 1.42857143;
	color: #fff;
	background-color: #F1F1F1;
}

.info-event .well {
    margin-top:-20px;
    background-color:#007FBD;
    border:2px solid #0077B2;
    text-align:center;
    cursor:pointer;
    font-size: 25px;
    padding: 15px;
    border-radius: 0px !important;
}

.info-event .well:hover {
    margin-top:-20px;
    background-color:#0077B2;
    border:2px solid #0077B2;
    text-align:center;
    cursor:pointer;
    font-size: 25px;
    padding: 15px;
    border-radius: 0px !important;
    border-bottom : 2px solid rgba(97, 203, 255, 0.65);
}

.info-event .bg_blur {
    background-image:url('http://data2.whicdn.com/images/139218968/large.jpg');
    height: 300px;
    background-size: cover;
}
/*

.info-event .follow_btn {
    text-decoration: none;
    position: absolute;
    left: 35%;
    top: 42.5%;
    width: 35%;
    height: 15%;
    background-color: #007FBE;
    padding: 10px;
    padding-top: 6px;
    color: #fff;
    text-align: center;
    font-size: 20px;
    border: 4px solid #007FBE;
}

.info-event .follow_btn:hover {
    text-decoration: none;
    position: absolute;
    left: 35%;
    top: 42.5%;
    width: 35%;
    height: 15%;
    background-color: #007FBE;
    padding: 10px;
    padding-top: 6px;
    color: #fff;
    text-align: center;
    font-size: 20px;
    border: 4px solid rgba(255, 255, 255, 0.8);
}

.info-event .header{
    color : #808080;
    margin-left:10%;
    margin-top:70px;
}

.info-event .picture{
    height:150px;
    width:150px;
    position:absolute;
    top: 75px;
    left:-75px;
}

.info-event .picture_mob{
    position: absolute;
    width: 35%;
    left: 35%;
    bottom: 70%;
}

.info-event .btn-style{
    color: #fff;
    background-color: #007FBE;
    border-color: #adadad;
    width: 33.3%;
}

.info-event .btn-style:hover {
    color: #333;
    background-color: #3D5DE0;
    border-color: #adadad;
    width: 33.3%;
   
}


@media (max-width: 767px) {
    .info-event .header{
        text-align : center;
    }
    
    
    
    .info-event .nav{
        margin-top : 30px;
    }
}
*/

</style>
<template id="event-view-details">
	<div>
		<template v-if="event !== null">
			<!-- ALERT -->
			<div class="col-xs-12">
				<div v-if="event.complete !== null && event.complete === 1" class="alert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<strong>Ups!. </strong> Este evento ya a finalizado.
				</div>
				<div v-else class="alert alert-info alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<strong>Hola! </strong> Recuerda documentar bien tus recomendacion/hallazgo.
				</div>
			</div>
			<!-- /ALERT -->
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Evento <small>Visor general</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><router-link v-bind:to="{name: 'Home'}"><i class="fa fa-times"></i></router-link></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
								
						<div class="col-xs-12 info-event">
							<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
								<div class="row panel">
									<div class="col-md-3 col-xs-6" style="padding: 1.2em;">
										<aside>
											<div class="calendar">
												<div class="date-block" :style="'background: ' + event.type.color_background">
													<div class="date-day">{{ $root.dayText(new Date(event.start).getDay()) }}</div>
													<div class="date-date">{{ new Date(event.start).getDate() }}</div>
													<span class="date-month">{{ $root.monthText(new Date(event.start).getMonth()) }}</span>,
													<span class="date-year">{{ new Date(event.start).getFullYear() }}</span>
												</div>
											</div>
											<div class="clearfix"></div>
										</aside>
									</div>
									<div class="col-md-9 col-xs-6">
										<div class="header">
											<h1>{{ event.title }}</h1>
											<p>{{ event.notes }}</p>
										</div>
										<div class="col-xs-12">
										<h4><b>Dirección(es): </b></h4>
										<template v-if="event.addresses !== null && event.addresses !== ''">
											<template v-for="(address, index_address) in event.addresses.split('\n')">
												<span class="label label-default">{{ address }}</span>
												&nbsp;
											</template>
										</template>
									   </div>
									</div>
									<div class="clearfix"></div>
								</div>   
								
								<div class="row nav">    
									<div class="col-sm-4"></div>
									<div class="col-sm-8 col-xs-12" style="margin: 0px;padding: 0px;">
										<!-- // 
										<div class="col-sm-3 col-xs-4 well">
											<i class="fa fa-weixin fa-lg"></i> 0
										</div>
										-->
										<div class="col-sm-3 col-xs-3 well">
											<i class="fa fa-users fa-lg"></i> {{ event.users_events.length }}
										</div>
										
										<div @click="loadFormUpload()" class="col-sm-3 col-xs-3 well" data-toggle="modal" data-target=".bs-gallery-modal-lg">
											<i class="fa fa-picture-o fa-lg"></i> {{ event.media_events.length }}
										</div>
										<div class="col-sm-3 col-xs-3 well">
											<i class="fa fa-cogs fa-lg"></i> 0
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="x_panel" style="overflow-y: auto;max-height: 450px;min-height: 250px;">
						<div class="x_title">
							<h2>Integrantes <small>({{ event.users_events.length }})</small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a @click="loadFormInvite()" data-toggle="modal" data-target=".bs-invite-modal-lg"><i class="fa fa-plus"></i></a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<ul class="messages">
								<li 
									v-if="event.users_events.length > 0" 
									v-for="(user_in, index_user_in) in event.users_events" 
								>
									<!-- // <img src="/public/assets/images/img.jpg" class="avatar" alt="Avatar"> -->
									<div class="message_date">
										<br>
										<a @click="withdrawParticipant(user_in.id)" style="cursor:pointer;"><i class="fa fa-times-circle fa-lg"></i></a>
									</div>
									<div class="wrapper">
										<h4 class="heading">
											{{ user_in.user.names }} {{ user_in.user.surname }}
										</h4>
										<!-- // <blockquote class="message"><i class="fa fa-times-circle fa-lg"></i></blockquote> -->
									</div>
								</li>
								<li v-else>
									No hay integrantes<br>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="x_panel" style="overflow-y: auto;max-height: 450px;min-height: 250px;">
						<div class="x_title">
							<h2>Herramienta <small>& Documentacion </small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a @click="addTools()"><i class="fa fa-plus"></i></a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="">
								<table class="table table-border">
									<tr v-for="(tool, tool_index) in event.events_tools">
										<td>
											<input @change="changeStatusTool(tool.id, !tool.status)" type="checkbox" class="flat" v-if="tool.status == 0" />
											<input @change="changeStatusTool(tool.id, !tool.status)" type="checkbox" class="flat" v-if="tool.status == 1" checked="" />
										</td>
										<td>{{ tool.title }}</td>
										<td>
											<a @click="withdrawTool(tool.id)" style="cursor:pointer;"><i class="fa fa-times"></i></a>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel" style="overflow-y: auto;max-height: 450px;min-height: 250px;">
						<div class="x_title">
							<h2>Galeria <small></small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a @click="loadFormUpload()" data-toggle="modal" data-target=".bs-gallery-modal-lg"><i class="fa fa-plus"></i></a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<!-- GALLERY -->
							<div class="row">
								<template v-for="(media, media_index) in event.media_events">
									<div class="col-md-55">
										<div class="thumbnail">
											<div class="image view view-first">
												<template v-if="media.media.type.split('/')[1] == 'png' || media.media.type.split('/')[1] == 'jpg' || media.media.type.split('/')[1] == 'jpeg' || media.media.type.split('/')[1] == 'gif'">
													<img style="width: 100%; display: block;" :src="media.media.path_short" alt="image" />
												</template>
												<template v-else>
													<img style="width: 100%; display: block;" src="/public/assets/images/application-octet-stream.png" alt="image" />
												</template>
												<div class="mask">
													<p>{{ media.media.type.split('/')[1] }}</p>
													<div class="tools tools-bottom">
														<a :href="media.media.path_short" target="_blank"><i class="fa fa-link"></i></a>
														<a :href="media.media.path_short" download><i class="fa fa-download"></i></a>
														<a @click="mediaRemove(media.id)" style="cursor:pointer;"><i class="fa fa-times"></i></a>
													</div>
												</div>
											</div>
											<div class="caption">
												<p>{{ media.media.name }}</p>
											</div>
										</div>
									</div>
								</template>
							</div>
							<!-- /GALLERY -->
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="x_panel" style="overflow-y: auto;max-height: calc(57.8vh);min-height: 250px;">
					<div class="x_title">
						<h2>Actividad <small></small></h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-xs-12">									
								
								<ul class="list-unstyled timeline">
									<li v-for="(activity, index_activity) in event.events_activity">
										<div class="block" style="margin:0 0 0 65px !important;">
											<div class="tags" style="width:50px;">
												<template v-if="activity.type === 'event-create'">
													<a class="tag">
														<i class="fa fa-plus-circle"></i> 
														<i class="fa fa-calendar-o"></i> 
													</a>
												</template>
												<template v-else-if="activity.type === 'event-edit'">
													<a class="tag">
														<i class="fa fa-pencil"></i> 
														<i class="fa fa-calendar-o"></i> 
													</a>
												</template>
												<template v-else-if="activity.type === 'event-added-participant'">
													<a class="tag">
														<i class="fa fa-plus-circle"></i> 
														<i class="fa fa-user"></i> 
													</a>
												</template>
												<template v-else-if="activity.type === 'event-withdraw-participant'">
													<a class="tag">
														<i class="fa fa-times-circle"></i> 
														<i class="fa fa-user"></i> 
													</a>
												</template>
												<template v-else>
													<a class="tag">
														<span>{{ activity.type }}</span>
													</a>
												</template>
											</div>
											<div class="block_content">
												<template v-if="activity.type === 'event-create'">
													<h2 class="title">
														<a>Evento Nuevo</a>
													</h2>
												</template>
												<template v-else-if="activity.type === 'event-edit'">
													<h2 class="title">
														<a>Evento Editado</a>
													</h2>
												</template>
												<template v-else-if="activity.type === 'event-added-participant'">
													<h2 class="title">
														<a>Participante Agregado</a>
													</h2>
												</template>
												<template v-else-if="activity.type === 'event-withdraw-participant'">
													<h2 class="title">
														<a>Participante Retirado</a>
													</h2>
												</template>
												<template v-else>															
													<h2 class="title">
														<a>{{ activity.user.names }} {{ activity.user.surname }}</a>
													</h2>
												</template>
												
												<div class="byline">
													<span>{{ activity.created }}</span> por <a>{{ activity.user.username }}</a>
												</div>
												<p class="excerpt">
													<template v-if="activity.info !== null && activity.info.text !== undefined && activity.info.text !== null">
														{{ activity.info.text }}
													</template>
													
													<!--//<a>Read&nbsp;More</a>-->
												</p>
											</div>
										</div>
									</li>
									
								</ul>
							</div>
							
							<!-- //
							<div class="col-xs-12">
								<article class="announcement"  data-post-date="April 8">
									<div class="sticky">
										<img src="https://ucomm.unl.edu/resources/downloads/campusphotos/140829_Life_208.jpg" alt="RPI" class="header-img"/>
										<h2>his is Title</h2>
									</div>
									<div class="art-text">
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
									</div>
								</article>
								<article class="info" data-post-date="April 6">
									<h2 class="sticky">This is an Info Article</h2>
									<div class="art-text">
										<img src="https://ucomm.unl.edu/resources/downloads/campusphotos/140829_Life_208.jpg" alt="guy" width="200" />
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
									</div>
								</article>
								
							  <article class="info" data-post-date="April 6">
								<h2 class="sticky">This is a long Info Article</h2>
								
								<div class="art-text">         
								 <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>  
								 <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>  <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>  
								 <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>  
								<img src="https://ucomm.unl.edu/resources/downloads/campusphotos/140829_Life_208.jpg" alt="school" />
								<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>  
								 <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>  </div>
							   </article>
							  
							  <article class="video" data-post-date="April 6"><iframe class="embedded-video" height="315" width="100%" src="//www.youtube.com/embed/GLkbcsNJIv0" frameborder="0" allowfullscreen></iframe>
							  <h2 class="sticky">This is a Video Article</h2>
								<div class="art-text">
								
								 <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>  
								 <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>  </div>
							   </article>
							</div>
							-->
						</div>
					</div>
				</div>
			</div>
						
			<div class="modal fade bs-invite-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel">Invitar</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-xs-5">
									<select class="form-control" name="AvailableFields" id="AvailableFields" multiple="multiple" size="10">
										<!-- // <option value="">Please select</option> -->
										<option 
											v-for="(user_invite, index_user_invite) in options.users" 
											:value="user_invite.id" 
											:key="user_invite.id">
												{{ user_invite.names }} {{ user_invite.surname }}
										</option>
										<!-- //
										<optgroup label="Group B">
											<option value="a">A</option>
											<option value="b">B</option>
											<option value="c">C</option>
										</optgroup>
										-->
									</select>
								</div>
								<div class="col-xs-1">
									<button class="btn btn-default" type="button" title="Backward" id="btnLeft">
										<i class="fa fa-arrow-left"></i>
									</button>
								</div>
								<div class="col-xs-1">
									<button class="btn btn-default" type="button" title="Forward" id="btnRight">
										<i class="fa fa-arrow-right"></i>
									</button>
								</div>
								<div class="col-xs-5">
									<select class="form-control" name="FieldstoBeMatchedOn" id="FieldstoBeMatchedOn" multiple="multiple" size="10"></select>
									<div> {{  selected }} </div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							<button @click="sendInvitations()" type="button" class="btn btn-primary">Invitar</button>
						</div>
					</div>
				</div>
			</div>
					
			<div class="modal fade bs-gallery-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel">Galeria del evento</h4>
						</div>
						<div class="modal-body">
							<div class="wrapper">
								<section class="container-fluid inner-page">
									<div class="row full-dark-bg">
										<div class="col-md-6">
											<form id="myId" action="/index.php?controller=site&action=UploadFile" class="dropzone files-container">
												<div class="fallback">
													<input name="file" type="file" multiple />
												</div>
											</form>
										</div>
										<div class="col-md-6">
											<!-- Files section -->
											<h4 class="section-sub-title"><span>Suba</span> Sus archivos</h4>
											<!-- Notes -->
											<span>Solo se admiten los tipos de archivos JPG, PNG, PDF, DOC (Word), XLS (Excel), PPT, ODT y RTF.</span>
											<span>El tamaño maximo permitido es de 25MB.</span>
											<!-- Uploaded files section -->
											<h4 class="section-sub-title"><span>Archivos</span> Subidos (<span class="uploaded-files-count">0</span>)</h4>
											<span class="no-files-uploaded">No has subido nada aún..</span>
											<!-- Preview collection of uploaded documents -->
											<div class="preview-container dz-preview uploaded-files">
												<div id="previews">
													<div id="onyx-dropzone-template">
														<div class="onyx-dropzone-info">
															<div class="thumb-container">
																<img data-dz-thumbnail />
															</div>
															<div class="details">
																<div>
																	<span data-dz-name></span> <span data-dz-size></span>
																</div>
																<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
																<div class="dz-error-message"><span data-dz-errormessage></span></div>
																<div class="actions">
																	<a href="#!" data-dz-remove><i class="fa fa-times"></i></a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>
		</template>
	</div>
</template>
<!-- /EVENT DETAILS -->
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

var Base = Vue.extend({
	//template: '#home',
	data: function () {
		return {
		};
	},
	created: function () {},
	computed: {},
	methods: {}
});

var ViewSingle = Vue.extend({
	template: '#event-view-details',
	data: function () {
		return {
			selected: [],
			options: {
				users: [],
			},
			event_id: this.$route.params.event_id,
			event: null
		};
	},
	created: function () {},
	mounted(){
		var self = this;
		self.load();
		
		$(function () { $('[data-toggle="tooltip"]').tooltip() });
	},
	computed: {
	},
	methods: {
		sendInvitations(){
			var self = this;
			console.log('espere...')
			console.log('invitar a: ', self.selected)
			if(self.selected !== null && self.selected.length > 0){				
				self.selected.forEach(function(userId){
					api.post('/records/users_events', {
						event: self.event_id,
						user: userId
					}).then(function (response) {
						if(!isNaN(response.data)){
							if(response.data > 0){
								self.$root.addActivity({
									event: self.event_id,
									user: <?= $this->user->id; ?>,
									type: 'event-added-participant',
									info: JSON.stringify({
										"text": "<?= $this->user->username; ?> agregó un participante."
									})
								}, function (e){
									//console.log(e);
									self.load();
								});
							}
						}
					}).catch(function (error) {
						// console.log(error.response);
					});
					
				});
				$('.bs-invite-modal-lg').modal('hide');
				self.load();
			}else{
				new PNotify({
					"title":"Ups! Hubo un error",
					"text":"No hay nadie en la invitación.",
					"styling":"bootstrap3",
					"type":"error",
					"icon":true,
					"animation":"zoom",
					"hide":true
				});
			}
		},
		withdrawParticipant(userInId){
			var self = this;
			bootbox.confirm({
				message: "Debes confirmar antes de eliminar este participante, esta acción es irreversible. ¿Estas seguro?",
				locale: "es",
				callback: function (result) {
					if(result == true){
						api.delete('/records/users_events/' + userInId).then(function (response) {
							if(!isNaN(response.data)){
								if(response.data > 0){
									self.$root.addActivity({
										event: self.event_id,
										user: <?= $this->user->id; ?>,
										type: 'event-withdraw-participant',
										info: JSON.stringify({
											"text": "<?= $this->user->username; ?> retirado un participante."
										})
									}, function (e){
										//console.log(e);
										self.load();
									});
								}
							}
						}).catch(function (error) {
							// console.log(error.response);
						});
					}
				}
			});
		},
		withdrawTool(toolId){
			var self = this;
			bootbox.confirm({
				message: "Debes confirmar antes de eliminar este requerimiento, esta acción es irreversible. ¿Estas seguro?",
				locale: "es",
				callback: function (result) {
					if(result == true){
						api.delete('/records/events_tools/' + toolId).then(function (response) {
							if(!isNaN(response.data)){
								if(response.data > 0){
									self.$root.addActivity({
										event: self.event_id,
										user: <?= $this->user->id; ?>,
										type: 'event-withdraw-tool',
										info: JSON.stringify({
											"text": "<?= $this->user->username; ?> eliminó un requerimiento." + ". req: " + toolId
										})
									}, function (e){
										//console.log(e);
										self.load();
									});
								}
							}
						}).catch(function (error) {
							// console.log(error.response);
						});
					}
				}
			});
		},
		changeStatusTool(toolId, status){
			var self = this;
			bootbox.confirm({
				message: "Debes confirmar antes de completar esta acción, ¿Estas seguro?",
				locale: "es",
				callback: function (result) {
					if(result == true){
						api.put('/records/events_tools/' + toolId, {
							id: toolId,
							status: Number(status),
							update_by: <?= $this->user->id; ?>
						}).then(function (response) {
							if(!isNaN(response.data)){
								if(response.data > 0){
									statusText = status == 1 ? 'Completado' : 'Pendiente';
									
									self.$root.addActivity({
										event: self.event_id,
										user: <?= $this->user->id; ?>,
										type: 'event-change-status-tool',
										info: JSON.stringify({
											"text": "<?= $this->user->username; ?> cambio el estado del un requerimiento a " + statusText + ". req: " + toolId
										})
									}, function (e){
										//console.log(e);
										self.load();
									});
								}
							}
						}).catch(function (error) {
							console.log(error.response);
						});
					}
				}
			});
		},
		addTools(){
			var self = this;
			bootbox.prompt({
				locale: 'es',
				title: "Especifique que se necesita.", 
				callback: function(result){
					if(result !== null && result.length > 3){
						console.log(result);
						api.post('/records/events_tools', {
							event: self.event_id,
							title: result,
							create_by: <?= $this->user->id; ?>,
							update_by: <?= $this->user->id; ?>,
						}).then(function (abc) {
							if(!isNaN(abc.data)){
								if(abc.data > 0){
									self.$root.addActivity({
										event: self.event_id,
										user: <?= $this->user->id; ?>,
										type: 'event-added-tool',
										info: JSON.stringify({
											"text": "<?= $this->user->username; ?> agregó un requerimiento (" + result + ")."
										})
									}, function (e){
										self.load();
									});
								}
							}
						}).catch(function (error) {
							// console.log(error.response);
						});
					}
				}
			});
			/*
			bootbox.confirm({
				message: "Debes confirmar antes de eliminar este participante, esta acción es irreversible. ¿Estas seguro?",
				locale: "es",
				callback: function (result) {
					if(result == true){
						api.delete('/records/users_events/' + userInId).then(function (response) {
							if(!isNaN(response.data)){
								if(response.data > 0){
									self.$root.addActivity({
										event: self.event_id,
										user: <?= $this->user->id; ?>,
										type: 'event-withdraw-participant',
										info: JSON.stringify({
											"text": "<?= $this->user->username; ?> retirado un participante."
										})
									}, function (e){
										//console.log(e);
										self.load();
									});
								}
							}
						}).catch(function (error) {
							// console.log(error.response);
						});
					}
				}
			});*/
		},
		loadFormUpload(){
			var self = this;

			!function ($) {
				"use strict";
				var Onyx = Onyx || {};
				Onyx = {
					init: function() { var self = this, obj; for (obj in self) { if ( self.hasOwnProperty(obj)) { var _method =  self[obj]; if ( _method.selector !== undefined && _method.init !== undefined ) { if ( $(_method.selector).length > 0 ) { _method.init(); }; }; }; }; },
					/**
					 * Files upload
					 */
					userFilesDropzone: {
						selector: 'form#myId',
						init: function() { var base = this, container = $(base.selector); base.initFileUploader(base, 'form.dropzone'); },
						initFileUploader: function(base, target) {
							var previewNode = document.querySelector("#onyx-dropzone-template");
							previewNode.id = "";
							var previewTemplate = previewNode.parentNode.innerHTML;
							previewNode.parentNode.removeChild(previewNode);
							var onyxDropzone = new Dropzone(target, {
								url: ($(target).attr("action")) ? $(target).attr("action") : "/index.php?controller=site&action=UploadFile", // Check that our form has an action attr and if not, set one here
								maxFiles: 5,
								maxFilesize: 8,
								acceptedFiles: "image/*,application/pdf,.doc,.docx,.xls,.xlsx,.csv,.tsv,.ppt,.pptx,.pages,.odt,.rtf",
								previewTemplate: previewTemplate,
								previewsContainer: "#previews",
								clickable: true,
								createImageThumbnails: true,
								dictDefaultMessage: "Arrastra los archivos aquí para subirlos.", // Default: Drop files here to upload
								dictFallbackMessage: "Su navegador no admite la carga de archivos de arrastrar y soltar.", // Default: Your browser does not support drag'n'drop file uploads.
								dictFileTooBig: "El archivo es demasiado grande ({{filesize}} MiB). Tamaño máximo de archivo: {{maxFilesize}} MiB.", // Default: File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.
								dictInvalidFileType: "No puedes subir archivos de este tipo.", // Default: You can't upload files of this type.
								dictResponseError: "El servidor respondió con el código {{statusCode}}.", // Default: Server responded with {{statusCode}} code.
								dictCancelUpload: "Cancelar carga.", // Default: Cancel upload
								dictUploadCanceled: "Subida cancelada.", // Default: Upload canceled.
								dictCancelUploadConfirmation: "¿Estás seguro de que deseas cancelar esta carga?", // Default: Are you sure you want to cancel this upload?
								dictRemoveFile: "Remover archivo", // Default: Remove file
								dictRemoveFileConfirmation: null, // Default: null
								dictMaxFilesExceeded: "No puedes subir más archivos.", // Default: You can not upload any more files.
								dictFileSizeUnits: {tb: "TB", gb: "GB", mb: "MB", kb: "KB", b: "b"},
							});
							Dropzone.autoDiscover = false;
							onyxDropzone.on("addedfile", function(file) { 
								console.log('agregar archivo(s): ', file);
								$('.preview-container').css('visibility', 'hidden');
								// file.previewElement.classList.add('type-' + base.fileType(file.name)); // Add type class for this element's preview
							});
							onyxDropzone.on("totaluploadprogress", function (progress) {
								var progr = document.querySelector(".progress .determinate");
								if (progr === undefined || progr === null) return;
								progr.style.width = progress + "%";
							});
							onyxDropzone.on('dragenter', function () {
								$(target).addClass("hover");
							});
							onyxDropzone.on('dragleave', function () {
								$(target).removeClass("hover");			
							});
							onyxDropzone.on('drop', function () {
								$(target).removeClass("hover");	
							});
							onyxDropzone.on('addedfile', function () {
								// Remove no files notice
								$(".no-files-uploaded").slideUp("easeInExpo");
							});
							onyxDropzone.on('removedfile', function (file) {
								console.log('remover archivo... ', file.upload_ticket);
								/*
								$.ajax({
									type: "POST",
									url: ($(target).attr("action")) ? $(target).attr("action") : "/?controller=Media&action=upload_file",
									data: {
										target_file: file.upload_ticket,
										delete_file: 1
									},
									success: function (r) {
										console.log('Response: ', r);
										// r = JSON.parse(r);
										// if(r.status != 'error'){
										// }else{
										// 	console.log("Error eliminando el archivo.");
										// 	console.log(r.info);
										// }
									},
								});
								*/
								// Show no files notice
								if ( base.dropzoneCount() == 0 ) {
									$(".no-files-uploaded").slideDown("easeInExpo");
									$(".uploaded-files-count").html(base.dropzoneCount());
								}
							});
							onyxDropzone.on("success", function(file, response) {
								let parsedResponse = JSON.parse(response);
								console.log('recibido: ', parsedResponse);
								parsedResponse.files.forEach(function(fileResponse){
									console.log(fileResponse);
									if(fileResponse.error == false){
										api.post('/records/media_events', {
											media: fileResponse.id,
											event: self.event_id,
										}).then(function (abc) {
											if(!isNaN(abc.data)){
												if(abc.data > 0){
													self.$root.addActivity({
														event: self.event_id,
														user: <?= $this->user->id; ?>,
														type: 'event-added-gallery',
														info: JSON.stringify({
															"text": "<?= $this->user->username; ?> agregó un archivo."
														})
													}, function (e){
														//console.log(e);
														self.load();
													});
													$(".uploaded-files-count").html(Number($(".uploaded-files-count").html()) + 1);
													//$('.preview-container').css('visibility', 'visible');
													//file.previewElement.classList.add('type-' + base.fileType(file.name)); // Add type class for this element's preview
												}
											}
										}).catch(function (error) {
											// console.log(error.response);
										});
									}
								});
								self.load();
								/*
								if(response.error !== undefined && response.error == false){
									
									$('.preview-container').css('visibility', 'visible');
									file.previewElement.classList.add('type-' + base.fileType(file.name)); // Add type class for this element's preview
									
								}else{
									console.log('error subiendo...');
								}*/
								/*
								file.upload_ticket = parsedResponse.response.id;
								// Make it wait a little bit to take the new element
								setTimeout(function(){
									$(".uploaded-files-count").html(base.dropzoneCount());
									console.log('Files count: ' + base.dropzoneCount());
								}, 350);
								// Something to happen when file is uploaded*/
							});
						},
						dropzoneCount: function() {
							var filesCount = $("#previews > .dz-success.dz-complete").length;
							return filesCount;
						},
						fileType: function(fileName) {
							var fileType = (/[.]/.exec(fileName)) ? /[^.]+$/.exec(fileName) : undefined;
							return fileType[0];
						}
					}
				}
				$(document).ready(function() {
					Onyx.init();
				});
			}(jQuery);
			/*
			var onyxDropzone = new Dropzone("#myId", {
				maxFiles: 5,
				maxFilesize: 8,
				acceptedFiles: "image/*,application/pdf,.doc,.docx,.xls,.xlsx,.csv,.tsv,.ppt,.pptx,.pages,.odt,.rtf",
				// previewTemplate: previewTemplate,
				previewsContainer: "#previews",
				clickable: true,
				createImageThumbnails: true,
				dictDefaultMessage: "Arrastra los archivos aquí para subirlos.", // Default: Drop files here to upload
				dictFallbackMessage: "Su navegador no admite la carga de archivos de arrastrar y soltar.", // Default: Your browser does not support drag'n'drop file uploads.
				dictFileTooBig: "El archivo es demasiado grande ({{filesize}} MiB). Tamaño máximo de archivo: {{maxFilesize}} MiB.", // Default: File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.
				dictInvalidFileType: "No puedes subir archivos de este tipo.", // Default: You can't upload files of this type.
				dictResponseError: "El servidor respondió con el código {{statusCode}}.", // Default: Server responded with {{statusCode}} code.
				dictCancelUpload: "Cancelar carga.", // Default: Cancel upload
				dictUploadCanceled: "Subida cancelada.", // Default: Upload canceled.
				dictCancelUploadConfirmation: "¿Estás seguro de que deseas cancelar esta carga?", // Default: Are you sure you want to cancel this upload?
				dictRemoveFile: "Remover archivo", // Default: Remove file
				dictRemoveFileConfirmation: null, // Default: null
				dictMaxFilesExceeded: "No puedes subir más archivos.", // Default: You can not upload any more files.
				dictFileSizeUnits: {tb: "TB", gb: "GB", mb: "MB", kb: "KB", b: "b"},
			});
			Dropzone.autoDiscover = false;
		
			onyxDropzone.on("addedfile", function(file) { 
				$('.preview-container').css('visibility', 'visible');
				file.previewElement.classList.add('type-' + base.fileType(file.name)); // Add type class for this element's preview
			});
			*/
			/*
			onyxDropzone.on("totaluploadprogress", function (progress) {
				var progr = document.querySelector(".progress .determinate");
				if (progr === undefined || progr === null) return;
				progr.style.width = progress + "%";
			});
			onyxDropzone.on('dragenter', function () {
				$(target).addClass("hover");
			});
			onyxDropzone.on('dragleave', function () {
				$(target).removeClass("hover");			
			});
			onyxDropzone.on('drop', function () {
				$(target).removeClass("hover");	
			});
			onyxDropzone.on('addedfile', function () {
				// Remove no files notice
				$(".no-files-uploaded").slideUp("easeInExpo");
			});
			onyxDropzone.on('removedfile', function (file) {
				console.log('target_file', file.upload_ticket);
				$.ajax({
					type: "POST",
					url: ($(target).attr("action")) ? $(target).attr("action") : "/?controller=Media&action=upload_file",
					data: {
						target_file: file.upload_ticket,
						delete_file: 1
					},
					success: function (r) {
						console.log('Response: ', r);
						
						// r = JSON.parse(r);
						// if(r.status != 'error'){
						// }else{
						// 	console.log("Error eliminando el archivo.");
						// 	console.log(r.info);
						// }
					},
				});
				// Show no files notice
				if ( base.dropzoneCount() == 0 ) {
					$(".no-files-uploaded").slideDown("easeInExpo");
					$(".uploaded-files-count").html(base.dropzoneCount());
				}
			});
			onyxDropzone.on("success", function(file, response) {
				console.log(response);
				let parsedResponse = JSON.parse(response);
				file.upload_ticket = parsedResponse.response.id;
				// Make it wait a little bit to take the new element
				setTimeout(function(){
					$(".uploaded-files-count").html(base.dropzoneCount());
					console.log('Files count: ' + base.dropzoneCount());
				}, 350);
				// Something to happen when file is uploaded
			});
			*/
		},
		loadFormInvite(){
			var self = this;
			var userIn = [];
			self.event.users_events.forEach(function(repair){
				userIn.push(repair.user.id);
			});
			
			self.options.users = [];
			self.$root.loadOption('users', {
				 params: {
				 }
			 }, function(a){
				 a.forEach(function(b){
					 if(userIn.indexOf(b.id) === -1){
						 self.options.users.push(b);
					 }
				 });
			})
			self.scriptsFormInvite();
		},
		scriptsFormInvite(){
			var self = this;
			self.selected = [];
			$("#AvailableFields option").each(function () { $(this).remove(); });
			$("#FieldstoBeMatchedOn option").each(function () { $(this).remove(); });
			
			 $(document).ready(function () {
				$('#btnRight').click(function (e) {
					var selectedOpts = $('#AvailableFields option:selected');
					if (selectedOpts.length == 0) {
						//alert("Nada que mover.");
						e.preventDefault();
					}
					$('#FieldstoBeMatchedOn').append($(selectedOpts).clone());
					$(selectedOpts).remove();
					defaultSelect();
					e.preventDefault();
				});

				$('#btnLeft').click(function (e) {
					var selectedOpts = $('#FieldstoBeMatchedOn option:selected');
					if (selectedOpts.length == 0) {
						//alert("Nada que mover.");
						e.preventDefault();
					}

					$('#AvailableFields').append($(selectedOpts).clone());
					$(selectedOpts).remove();					
					defaultSelect();
					e.preventDefault();
				});
				
				defaultSelect = function () {
					$("#FieldstoBeMatchedOn option").each(function () {
						$(this).prop("selected", true);
					});
					self.selected = $('#FieldstoBeMatchedOn').val();
				}
			});
		},
		mediaRemove(idIn){
			var self = this;
			if(idIn > 0){
				if (confirm(
					"El archivo sera desenlazado, esta operacion es irreversible" + "\n¿esta seguro?"
				)) {
					api.delete('/records/media_events/' + idIn).then(function (response) {
						if(!isNaN(response.data)){
							if(response.data > 0){
								self.$root.addActivity({
									event: self.event_id,
									user: <?= $this->user->id; ?>,
									type: 'event-withdraw-gallery',
									info: JSON.stringify({
										"text": "<?= $this->user->username; ?> retiró un archivo."
									})
								}, function (e){
									//console.log(e);
									self.load();
								});
							}
						}
					}).catch(function (error) {
						// console.log(error.response);
					});
				}
			}
		},
		load(){
			var self = this;
			api.get('/records/events/' + self.event_id, {
				 params: {
					 join: [
						'events_tools',
						'events_types',
						'events_activity',
						'media_events',
						'media_events,media',
						'events_activity,users',
						'users_events',
						'users_events,users',
					 ]
				 }
			 })
			.then(function (r) {
				console.log('event data: ', r);
				if(r.data != undefined && r.data.id != undefined ){
					r.data.events_activity.forEach(function(b){
						b.info = JSON.parse(b.info);
					});
					r.data.events_activity = r.data.events_activity.reverse();
					
					self.event = r.data;
				}
			})
			.catch(function (error) {
				// console.log(error);
				self.events = null;
			})
			.finally(function () {
				if(self.event !== null){
					// console.log('events', self.event);
				}
			});
		}
	}
});

var Home = Vue.extend({
	template: '#event-home',
	data: function () {
		return {
			calendar: null,
			events: []
		};
	},
	created: function () {},
	mounted: function () {
		var self = this;
		self.loadEvents();
	},
	computed: {},
	methods: {
		loadEvents(){
			var self = this;
			self.events = [];
			if(self.calendar !== null){
				$('#calendar-vue').fullCalendar('removeEvents');
				$('#calendar-vue').fullCalendar('destroy');
			}
			api.get('/records/events', {
				 params: {
					 join: [
						'events_types'
					 ]
				 }
			 })
			.then(function (response) {
				if(response.data != undefined && response.data.records != undefined ){
					response.data.records.forEach(function(event){
						insert = {
							id: event.id,
							title: event.title,
							start: new Date(event.start),
							end: new Date(event.end),
							allDay: (event.allDay == 1 ? true : false),
							data: event,
							source: event,
							// backgroundColor: event.type.color_background,
							backgroundColor: (event.complete !== null && event.complete === 1) ? "green" : "red",
							//url: 'http://google.com/'
						};
						
						self.events.push(insert);
					});
				}
			})
			.catch(function (error) {
				// console.log(error);
				self.events = null;
			})
			.finally(function () {
				if(self.events !== null){
					// console.log('events', self.events);
					//self.init_calendar();
					self.init_calendar();
				}
			});
		},
		init_calendar(){
			var self = this;
			if( typeof ($.fn.fullCalendar) === 'undefined'){ return; } // console.log(('init_calendar');
			var date = new Date(), d = date.getDate(), m = date.getMonth(), y = date.getFullYear(), started, categoryClass;
			var calendar = $('#calendar-vue').fullCalendar({
				themeSystem: 'bootstrap3',
				timeZone: 'America/Bogota',
				height: 650,
				weekNumbers: true,
				eventLimit: true, // allow "more" link when too many events
				eventLimitText: "Eventos ",
				dayPopoverFormat: 'D MMM, YYYY',
				lang: 'es',
				titleFormat: 'D MMMM, YYYY',
				buttonText: {
					today:    'Hoy',
					month:    'Mes',
					week:     'Semana',
					day:      'Día',
					list:     'Listado'
				},
				buttonIcons : {
					close: 'null glyphicons glyphicon-remove ',
					prev: 'left-double-arrow',
					next: 'right-double-arrow',
					prevYear: 'left-single-arrow',
					nextYear: 'right-single-arrow'
				},
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay,listMonth'
				},  
				selectable: true,
				selectHelper: true,
				select: function(start, end, jsEvent, view) {
					var starttime = moment(start).format('MMMM Do YYYY h:mm a'); 
					var endtime = moment(end).format('h:mm a'); 
					var allDay = !start.hasTime() && !end.hasTime();
					started = start;
					ended = end;
					
					var item = {
						title: "",
						type: 0,
						start: started.format("YYYY-MM-DD HH:mm:ss"),
						end: ended.format("YYYY-MM-DD HH:mm:ss"),
						allDay: allDay,
						notes: "",
						addresses: "",
						points_ref: "",
					};
					
					$('#started').val(item.start);
					$('#ended').val(item.end);
					document.getElementById("allDay").checked = allDay;
					$('#allDay').val(allDay);
					
					$('#fc_create').click();
					$(".antosubmit").on("click", function() {
						item.title = $("#title").val();
						item.type = Number($("#events_types").val());
						item.notes = $("#notes").val();
						item.addresses = $("#addresses").val();
						item.points_ref = $("#points_ref").val();
						item.allDay = document.getElementById("allDay").checked ? 1 : 0;
						if (end) { ended = end; }
						categoryClass = $("#event_type").val();
						// console.log('categoryClass', categoryClass);
						
						if (item.title) {
							if (item.type > 0) {
								item.create_by = <?= $this->user->id; ?>;
								item.update_by = <?= $this->user->id; ?>;
								
								api.post('/records/events', item).then(function (response) {
									if(!isNaN(response.data)){
										if(response.data > 0){
											item.id = response.data;
											
											
											self.$root.addActivity({
												event: item.id,
												user: <?= $this->user->id; ?>,
												type: 'event-create',
												info: JSON.stringify({
													"text": "<?= $this->user->username; ?> a creado un nuevo evento.",
													"event": item
												})
											}, function (e){
												//console.log(e);
												self.loadEvents();
												// Borrar
												$('#started').val('');
												$('#ended').val('');
												$('#title').val('');
												$('#notes').val('');
												$('#events_types').val(0);
												calendar.fullCalendar('unselect');
												$('.antoclose').click();
											});
											
										}
									}
								}).catch(function (error) {
									// console.log(error.response);
								});
							} else {
								new PNotify({
									"title":"Ups! Hubo un error",
									"text":"Seleccione el tipo de evento .",
									"styling":"bootstrap3",
									"type":"error",
									"icon":true,
									"animation":"zoom",
									"hide":true
								});
							}
						}else{
							new PNotify({
								"title":"Ups! Hubo un error",
								"text":"Ingrese el titulo del evento.",
								"styling":"bootstrap3",
								"type":"error",
								"icon":true,
								"animation":"zoom",
								"hide":true
							});
						}
						return false;
					});
				},
				eventClick: function(calEvent, jsEvent, view) {					
					$('#fc_edit').click();
					$('#idEdit').val(calEvent.id);
					$('#title2').val(calEvent.data.title);
					$('#events_types2').val(calEvent.data.type.id);
					$('#started2').val(calEvent.data.start);
					$('#ended2').val(calEvent.data.end);
					document.getElementById("allDay2").checked = (calEvent.data.allDay == 1) ? true : false;
					$('#notes2').val(calEvent.data.notes);
					$("#addresses2").val(calEvent.data.addresses);
					$("#points_ref2").val(calEvent.data.points_ref);
					
					var item = {
						id: calEvent.id,
						title: calEvent.data.title,
						type: calEvent.data.type.id,
						start: calEvent.start,
						end: calEvent.end,
						allDay: document.getElementById("allDay2").checked,
						notes: calEvent.data.notes,
						addresses: calEvent.data.addresses,
						points_ref: calEvent.data.points_ref,
						update_by: <?= $this->user->id; ?>
					};
					
					
					$(".antosubmit2").on("click", function() {
						item.title = $("#title2").val();
						item.type = Number($("#events_types2").val());
						item.start = $("#started2").val();
						item.end = $("#ended2").val();
						item.notes = $("#notes2").val();
						item.allDay = document.getElementById("allDay2").checked ? 1 : 0;
						item.addresses = $("#addresses2").val();
						item.points_ref = $("#points_ref2").val();
						if (item.id && item.title && item.type > 0) {
							api.put('/records/events/' + item.id, item).then(function (response) {
								if(!isNaN(response.data)){
									if(response.data > 0){
										$('.antoclose2').click();
										
										self.$root.addActivity({
											event: item.id,
											user: <?= $this->user->id; ?>,
											type: 'event-edit',
											info: JSON.stringify({
												"text": "<?= $this->user->username; ?> modificado el evento \"" + event.title + "\"",
												"event": event.data
											})
										}, function (e){
											//console.log(e);
											self.loadEvents();
										});
										
										
									}
								}
							}).catch(function (error) {
								// console.log(error.response);
							});
						}
					});
					calendar.fullCalendar('unselect');
				},
				editable: true,
				eventResize: function(event, delta, revertFunc) {
					if (!confirm(
						event.title + " finaliza ahora el día " + event.end.format('Do MMMM YYYY h:mm a') + 
						"\n¿esta bien?"
					)) {
						revertFunc();
					}else{
						var item = {
							id: event.id,
							end: event.end.format("YYYY-MM-DD HH:mm:ss"),
							update_by: <?= $this->user->id; ?>
						};
						api.put('/records/events/' + item.id, item).then(function (response) {
							if(!isNaN(response.data)){
								if(response.data > 0){
									
									self.$root.addActivity({
										event: item.id,
										user: <?= $this->user->id; ?>,
										type: 'event-edit',
										info: JSON.stringify({
											"text": "<?= $this->user->username; ?> modificado el evento \"" + event.title + "\"",
											"event": event.data
										})
									}, function (e){
										//console.log(e);
										self.loadEvents();
									});
									
								}
							}
						}).catch(function (error) {
							revertFunc();
						});
					}
				},
				eventDrop: function(event, delta, revertFunc) {
					if (!confirm(
						event.title + " inicia ahora el día " + event.start.format('Do MMMM YYYY h:mm a') + 
						"\n¿esta bien?"
					)) {
						revertFunc();
					}else{
						var item = {
							id: event.id,
							allDay: event.allDay ? 1 : 0,
							update_by: <?= $this->user->id; ?>							
						};
						if(event.start){ item.start = event.start.format("YYYY-MM-DD HH:mm:ss"); }
						if(event.end){ item.end = event.end.format("YYYY-MM-DD HH:mm:ss"); }
						// console.log(item);
						
						api.put('/records/events/' + item.id, item).then(function (response) {
							if(!isNaN(response.data)){
								if(response.data > 0){
									self.$root.addActivity({
										event: item.id,
										user: <?= $this->user->id; ?>,
										type: 'event-edit',
										info: JSON.stringify({
											"text": "<?= $this->user->username; ?> modificado el evento \"" + event.title + "\"",
											"event": event.data
										})
									}, function (e){
										//console.log(e);
										self.loadEvents();
									});
								}
							}
						}).catch(function (error) {
							// console.log(error);
							revertFunc();
						});
					}
				},  
				events: self.events
			});
			self.calendar = calendar;
		},
		deleteCurrent(){
			var self = this;
			id_edit = Number($('#idEdit').val());
			if(id_edit > 0){
				if (confirm(
					"El evento [] será eliminado, esta operacion es irreversible" + 
					"\n¿esta seguro?"
				)) {
					api.delete('/records/events/' + id_edit).then(function (response) {
						if(!isNaN(response.data)){
							if(response.data > 0){
								$('.antoclose2').click();
									
								self.loadEvents();								
							}
						}
					}).catch(function (error) {
						// console.log(error.response);
					});
				}
			}
		},
		viewCurrent(){
			var self = this;
			id_edit = Number($('#idEdit').val());
			$('.antoclose2').click();
			router.push({ name: 'View-Single', params: { event_id: id_edit } });
		}
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: Home, name: 'Home' },
		{ path: '/view/:event_id', component: ViewSingle, name: 'View-Single' },
	]
});

app = new Vue({
	router: router,
	data: function () {
		return {
			options: {
				events_types: []
			}
		};
	},
	created: function () {
		var self = this;
		self.loadOption('events_types', {
			 params: {
			 }
		 }, function(a){
			 // console.log(a);
			self.options.events_types = a;
		})
	},
	methods: {
		dayText(dayWeek){
			array = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
			return (array[dayWeek]) ? array[dayWeek] : "none";
		},
		monthText(month){
			array = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
			return (array[month]) ? array[month] : "none";
		},
		addActivity(log, call){
			log = (log == undefined || log == null) ? {} : log;
			api.post('/records/events_activity', log).then(function (response) {
				return call(response);
			}).catch(function (error) {
				return call(error.response);
			});
		},
		loadOption(table, params, call){
			api.get('/records/' + table, params)
			.then(function (a) {
				if(a.data != undefined && a.data.records != undefined ){ return call(a.data.records); } else { return call([]); }
			});
		}
	}
}).$mount('#app');
</script>