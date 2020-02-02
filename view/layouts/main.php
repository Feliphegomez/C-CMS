<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

?>
<!DOCTYPE html>
<html lang="<?= $this->getLang(); ?>">
    <head>
		<?= $this->head(); ?>
		<script src='/public/assets/build/js/apiFG.js'></script>
		<script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
		<link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />		
		<style>
		.mapboxgl-popup {
		max-width: 400px;
		font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
		}
		</style>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <?= 
                            PHPStrap\Util\Html::tag('div', 
                                    FelipheGomez\Url::a('/'
                                        , PHPStrap\Util\Html::tag('i', '', [ BUSSINES_ICON ]) . PHPStrap\Util\Html::tag('span', BUSSINES_NAME_SM)
                                        , ['site_title'])
                                , ['navbar nav_title']
                                , ['style' => 'border: 0;']) 
                            . PHPStrap\Util\Html::clearfix(); ?>
                            <!-- menu profile quick info -->
                             <?php
                                $profile_pic = PHPStrap\Util\Html::tag('div', PHPStrap\Media::image('/public/assets/images/img.jpg', '...', ['img-circle profile_img']), ['profile_pic']);
                                $profile_info = PHPStrap\Util\Html::tag('div', 
                                    PHPStrap\Util\Html::tag('span', 'Bienvend@, ')
                                    . PHPStrap\Util\Html::tag('h2', $this->user->username)
                                , ['profile_info']);
                            ?>
                            <?php /* PHPStrap\Util\Html::tag('div', $profile_pic . $profile_info . PHPStrap\Util\Html::clearfix(), ['profile clearfix']); */ ?>
                            <!-- /menu profile quick info -->
                        <br />
                        <!-- sidebar menu -->
                        <?php 
							
							$sidebarItems = new Menus($this->adapter);
							$sidebarItems->setPermissions($this->user->permissions->list);
							$sidebarItems->getBySlug("sidebar");
							
							// Sistema
                            $menu_section_system = PHPStrap\Util\Html::tag('div', 
								(($this->checkPermission('system:users:manage') == true) ? PHPStrap\Util\Html::tag('h3', 'Sistema') : "")
                                . PHPStrap\Util\Html::ul([
									// ($this->checkPermission('usuarios:admin') == true) ? FelipheGomez\Url::a(['site/AdminPermissionsList'], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-users"]) . "Permisos") : ""
									
									// MENU NUEVO
									($this->checkPermission('system:users:manage') == true) ? FelipheGomez\Url::a(['site/AdminMenusVue '], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-sitemap"]) . "Menús") : ""
									// Usuarios
									, ($this->checkPermission('system:users:manage') == true) ? FelipheGomez\Url::a(['site/AdminUsersVue '], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-users"]) . "Usuarios") : ""
									// Emails
									
									// Media
									, ($this->checkPermission('system:media:manage') == true) ? 
										PHPStrap\Util\Html::tag('a', PHPStrap\Util\Html::tag('i', ' ', ["fa fa-film"]) . "Multimedia" . PHPStrap\Util\Html::tag('span', '', ["fa fa-chevron-down"]))
										. PHPStrap\Util\Html::ul([
											($this->checkPermission('system:media:manage') == true) ? FelipheGomez\Url::a(['site/AdminMediaVue '], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-file"]) . "Gestionar Archivos") : ""
									], ['nav child_menu']) : ""
                                ], ['nav side-menu'])
                            , ['menu_section']);
							
							// Roles y permisos
							if($this->checkPermission('system:permissions:manage')){
								$menu_section_roles = PHPStrap\Util\Html::tag('div', 
								   PHPStrap\Util\Html::tag('h3', 'Roles y Permisos') . 
									PHPStrap\Util\Html::ul([										
										// MENU NUEVO
										($this->checkPermission('system:permissions:manage') == true) ? FelipheGomez\Url::a(['site/AdminPermissionsVue'], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-lock"]) . "Permisos") : ""
										, ($this->checkPermission('system:permissions:manage') == true) ? FelipheGomez\Url::a(['site/AdminPermissionsGroupVue'], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-unlock"]) . "Roles") : ""
										
									], ['nav side-menu'])
								, ['menu_section']);
							} else {
								$menu_section_roles = "";
							}
							
							
							// Correos - Boxes
							$mailBoxes = $this->user->getEmailBoxes();
							$boxes_html = [];
							if(count($mailBoxes) > 0){
								foreach($mailBoxes as $box){
									$box = is_array($box) ? (object) $box : $box;
									
									$boxes_html[] = FelipheGomez\Url::a(['site/my_webmail', ["_box" => "{$box->id}"]], 
										PHPStrap\Util\Html::tag('i', ' ', ["fa fa-envelope-o"]) . $box->label
									, ['sub_menu'], ["title" => $box->user]);
									
									
									
									/*$boxes_html[] = FelipheGomez\Url::a(['site/my_email', ["V" => "#/{$box->id}/folder/inbox/1"]], 
										PHPStrap\Util\Html::tag('i', ' ', ["fa fa-envelope"]) . $box->label
									, ['sub_menu'], ["title" => $box->user]);*/
								}
							}
							// Mis correos
                            $menu_section_emails = ($this->checkPermission('my:webmail') == true || $this->checkPermission('my:emails') == true) ? (PHPStrap\Util\Html::tag('div', 
                                PHPStrap\Util\Html::tag('h3', 'Correo Electronico')
                                . PHPStrap\Util\Html::ul($boxes_html, ['nav side-menu'])
                                . PHPStrap\Util\Html::ul([($this->checkPermission('system:emails:manage') == true) ? 
										PHPStrap\Util\Html::tag('a', PHPStrap\Util\Html::tag('i', ' ', ["fa fa-shield"]) . "Gestionar" . PHPStrap\Util\Html::tag('span', '', ["fa fa-chevron-down"]))
										. PHPStrap\Util\Html::ul([
											($this->checkPermission('emails:accounts:manage') == true) ? FelipheGomez\Url::a(['site/AdminEmailsBoxesVue'], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-at"]) . "Cuentas") : ""
											, ($this->checkPermission('emails:accounts_in_users:manage') == true) ? FelipheGomez\Url::a(['site/AdminEmailsBoxesInUserVue'], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-random"]) . "Relacion usuarios") : ""
											, ($this->checkPermission('emails:attachments:manage') == true) ? FelipheGomez\Url::a(['site/AdminEmailsAttachmentsVue'], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-paperclip"]) . "Admin. Adjuntos") : ""
										], ['nav child_menu']) : ""], ['nav side-menu'])
                                /*
								. PHPStrap\Util\Html::ul([
									PHPStrap\Util\Html::tag('a', PHPStrap\Util\Html::tag('i', ' ', ["fa fa-envelope-o"]) . "Mis Correos" . PHPStrap\Util\Html::tag('span', '', ["fa fa-chevron-down"]))
										. PHPStrap\Util\Html::ul($boxes_html, ['nav child_menu'])
								], ['nav side-menu'])*/
                            , ['menu_section'])) : "";
							
                            echo PHPStrap\Util\Html::tag('div', 
								$sidebarItems->menu
								. $menu_section_emails
								. $menu_section_system
								. $menu_section_roles
								. PHPStrap\Util\Html::clearfix(), 
							['main_menu_side hidden-print main_menu'], ['id' => 'sidebar-menu']);
							
							
                        ?>
                        <!-- /sidebar menu -->
                        <!-- /menu footer buttons -->
                        <?php /* PHPStrap\Util\Html::tag('div', 
                                PHPStrap\Util\Html::tag('a', PHPStrap\Util\Html::tag('span', "", ['glyphicon glyphicon-cog'], ['aria-hidden' => 'true']), [], [
                                    'data-toggle' => 'tooltip'
                                    , 'data-placement' => 'top'
                                    , 'title' => 'Configuraciones'
                                ])
                                . PHPStrap\Util\Html::tag('a', PHPStrap\Util\Html::tag('span', "", ['glyphicon glyphicon-fullscreen'], ['aria-hidden' => 'true']), [], [
                                    'data-toggle' => 'tooltip'
                                    , 'data-placement' => 'top'
                                    , 'title' => 'Pantalla Completa'
                                ])
                                . PHPStrap\Util\Html::tag('a', PHPStrap\Util\Html::tag('span', "", ['glyphicon glyphicon-eye-close'], ['aria-hidden' => 'true']), [], [
                                    'data-toggle' => 'tooltip'
                                    , 'data-placement' => 'top'
                                    , 'title' => 'Bloquear'
                                ])
                                . PHPStrap\Util\Html::tag('a', PHPStrap\Util\Html::tag('span', "", ['glyphicon glyphicon-off'], ['aria-hidden' => 'true']), [], [
                                    'data-toggle' => 'tooltip'
                                    , 'data-placement' => 'top'
                                    , 'title' => 'Cerrar sesión'
                                    , 'href' => 'login.html'
                                ])
                            , ["sidebar-footer hidden-small"]);
                            */
                        ?>
                        <!-- /menu footer buttons -->
                    </div>
                </div>
                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
						<?php 
							$html_mail = '
							<template v-if="mails.length > 0">
								<li @click="openUrlMailPending(mail.url)" v-for="(mail, mails_index) in mails">
									<a>
										<span>
											<span class="time"><b><a :title="mail.from_email">{{mail.subject}}</a></b>
											<span>{{mail.from}}</span> 
											</span>
										</span> 
										<span class="message">{{mail.message}}</span>
									</a>
								</li>
							</template>
							<template v-else>
								<li>
									<a>
										<span><span></span> <span class="time"><b></b></span></span> 
										<span class="message">No tienes correos actualmente.</span>
									</a>
								</li>
							</template>';
							
							$inboxSuccess = ($this->checkPermission('my:webmail') == true || $this->checkPermission('my:emails') == true) ? PHPStrap\Util\Html::tag('li', 
								FelipheGomez\Url::a(
										'javascript:void(0);'
										, PHPStrap\Util\Html::tag('i', '', ['fa fa-envelope-o']) . PHPStrap\Util\Html::tag('span', "", ['total-mails-count badge bg-green'])
										, ['dropdown-toggle info-number']
										, ['data-toggle' => 'dropdown', 'aria-expanded' => 'false']
									)
								. PHPStrap\Util\Html::tag('ul', $html_mail, ['dropdown-menu list-unstyled msg_list'], ['id' => 'menu-mails', 'role' => 'menu'], ['style' => 'max-height: 250px;overflow: auto;' ])
							, ['dropdown menu-mails-box'], ['@click' => 'load()', 'role' => 'presentation']) : "";
							
							
							$iconBarTop_reports_declines = ($this->checkPermission('my:webmail') == true || $this->checkPermission('my:emails') == true) ? PHPStrap\Util\Html::tag('li', 
								FelipheGomez\Url::a(
										'javascript:void(0);'
										, PHPStrap\Util\Html::tag('i', '', ['fa fa-envelope-o']) . PHPStrap\Util\Html::tag('span', "", ['total-mails-count badge bg-green'])
										, ['dropdown-toggle info-number']
										, ['data-toggle' => 'dropdown', 'aria-expanded' => 'false']
									)
								. PHPStrap\Util\Html::tag('ul', $html_mail, ['dropdown-menu list-unstyled msg_list'], ['id' => 'menu-mails', 'role' => 'menu'], ['style' => 'max-height: 250px;overflow: auto;' ])
							, ['dropdown menu-mails-box'], ['@click' => 'load()', 'role' => 'presentation']) : "";

								echo PHPStrap\Util\Html::tag('nav', 
									$navbar = PHPStrap\Util\Html::tag('div', PHPStrap\Util\Html::tag('a', PHPStrap\Util\Html::tag('i', '', ['fa fa-bars']), [], ['id' => 'menu_toggle']), ['nav toggle'])
									. PHPStrap\Util\Html::tag('ul', 
										PHPStrap\Util\Html::tag('li', 
											FelipheGomez\Url::a(
												'javascript:void(0)'
												//, PHPStrap\Media::imageClean('/public/assets/images/img.jpg', '...') . "{$this->user->username} " . PHPStrap\Util\Html::tag('span', '', ["fa fa-angle-down"])
												, "{$this->user->username} " . PHPStrap\Util\Html::tag('span', '', ["fa fa-angle-down"])
												, ['user-profile dropdown-toggle']
												, ['data-toggle' => 'dropdown', 'aria-expanded' => 'false']
											)
											. PHPStrap\Util\Html::ul([
													FelipheGomez\Url::a(['site/My_profile'], "Perfil ")
													// , FelipheGomez\Url::a('javascript:void(0)', "Ayuda ")
													// , FelipheGomez\Url::a('javascript:void(0)', PHPStrap\Util\Html::tag('span', '50%', ["badge bg-red pull-right"]) . PHPStrap\Util\Html::tag('span', 'Configuraciones'))
													. FelipheGomez\Url::a(['site/logout'], PHPStrap\Util\Html::tag('span', '', ["fa fa-sign-out pull-right"]) . "Salir ")
												]
											, ['dropdown-menu dropdown-usermenu pull-right']) 
										, [''])
										/*
										// Icono 1
										. PHPStrap\Util\Html::tag('li', 
											FelipheGomez\Url::a(
													'javascript:void(0)'
													, PHPStrap\Util\Html::tag('i', '', ['fa fa-envelope-o']) . PHPStrap\Util\Html::tag('span', '6', ['badge bg-green'])
													, ['dropdown-toggle info-number']
													, ['data-toggle' => 'dropdown', 'aria-expanded' => 'false']
												)
											. PHPStrap\Util\Html::tag('ul', 
													// Item
													PHPStrap\Util\Html::tag('li', 
															PHPStrap\Util\Html::tag('a', 
																PHPStrap\Util\Html::tag('span', PHPStrap\Media::imageClean('/public/assets/images/img.jpg', '...'), ['image'])
																. PHPStrap\Util\Html::tag('span', 
																		PHPStrap\Util\Html::tag('span', 'Feliphe Gomez')
																		. PHPStrap\Util\Html::tag('span', '3 mins ago', ['time'])
																	)
																. PHPStrap\Util\Html::tag('span', 'Film festivals used to be do-or-die moments for movie makers. They were where...', ['message'])
																, [], [])
														, [], [])
													. 
													// Footer
													PHPStrap\Util\Html::tag('li', 
															PHPStrap\Util\Html::tag('div', 
																PHPStrap\Util\Html::tag('a', 
																		PHPStrap\Util\Html::tag('strong', 'Ver todas las alertas')
																		. PHPStrap\Util\Html::tag('i', '', ['fa fa-angle-right'])
																	)
																, ['text-center'], [])
														, [], [])
												, ['dropdown-menu list-unstyled msg_list'], ['id' => 'menu1', 'role' => 'menu'])
										, ['dropdown'], ['role' => 'presentation'])
										*/
										// Icono 2 - Mails
										// . $inboxSuccess
										
									, ['nav navbar-nav navbar-right mail-navbar'])
								);
							// }
                        ?>
						<style>
							#menu-mails {
								max-height: calc(45vh);overflow: auto;
							}
						</style>
                    </div>
                </div>
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <?php $this->getView($description); ?>
                    </div>
                </div>
                <!-- /page content -->
				<!-- footer content -->
                <?= PHPStrap\Util\Html::tag('footer', PHPStrap\Util\Html::tag('div', ControladorBase::PowerBy(), ['pull-right']) . PHPStrap\Util\Html::clearfix(), []); ?>
                <!-- /footer content -->
				<?= $this->getModals(); ?>
            </div>
        </div>
        <?= $this->footerScripts(); ?>
	</body>
</html>