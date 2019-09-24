<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/

$mailBoxes = $this->user->getEmailBoxes();
$myEmailsPendings = new Email($this->adapter);
$mails = $myEmailsPendings->loadMailsPending($mailBoxes);
?>
<!DOCTYPE html>
<html lang="<?= $this->getLang(); ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="<?= $this->getCharset(); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title; ?></title>
        <?= $this->head(); ?>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <?= 
                            PHPStrap\Util\Html::tag('div', 
                                    FelipheGomez\Url::a('/'
                                        , PHPStrap\Util\Html::tag('i', '', ['fa fa-leaf']) . PHPStrap\Util\Html::tag('span', 'C&CMS')
                                        , ['site_title'])
                                , ['navbar nav_title']
                                , ['style' => 'border: 0;']) 
                            . PHPStrap\Util\Html::clearfix(); ?>
                            <!-- menu profile quick info -->
                             <?php
                                $profile_pic = PHPStrap\Util\Html::tag('div', 
                                    PHPStrap\Media::image('/public/assets/images/img.jpg', '...', ['img-circle profile_img'])
                                , ['profile_pic']);
                                $profile_info = PHPStrap\Util\Html::tag('div', 
                                    PHPStrap\Util\Html::tag('span', 'Bienvend@, ')
                                    . PHPStrap\Util\Html::tag('h2', $this->user->username)
                                , ['profile_info']);
                            ?>
                            <?= PHPStrap\Util\Html::tag('div', $profile_pic . $profile_info . PHPStrap\Util\Html::clearfix(), ['profile clearfix']); ?>
                            <!-- /menu profile quick info -->
                        <br />
                        <!-- sidebar menu -->
                        <?php 
							// Correos - Boxes
							$boxes_html = [];
							foreach($mailBoxes as $box){
								$box = is_array($box) ? (object) $box : $box;
								$boxes_html[] = PHPStrap\Util\Html::tag('a', $box->label . PHPStrap\Util\Html::tag('span', '', ["fa fa-chevron-down"]))
									. PHPStrap\Util\Html::ul([
										FelipheGomez\Url::a(['site/my_email', ['ref' => $box->id, 'folder' => 'not_seen']], 'Sin Leer', ['sub_menu'])
										, FelipheGomez\Url::a(['site/my_email', ['ref' => $box->id, 'folder' => 'inbox']], 'Bandeja Entrada', ['sub_menu'])
										, FelipheGomez\Url::a(['site/my_email', ['ref' => $box->id, 'folder' => 'seen']], 'Leidos', ['sub_menu'])
										, FelipheGomez\Url::a(['site/my_email', ['ref' => $box->id, 'folder' => 'trash']], 'Papelera', ['sub_menu'])
										, FelipheGomez\Url::a(['site/my_email', ['ref' => $box->id, 'folder' => 'draft']], 'Borradores', ['sub_menu'])
										, FelipheGomez\Url::a(['site/my_email', ['ref' => $box->id]], 'Todo', ['sub_menu'])
								], ['nav child_menu']);
							}
							
                            $menu_section_my = PHPStrap\Util\Html::tag('div', 
                                PHPStrap\Util\Html::tag('h3', 'Mi Cuenta')
                                . PHPStrap\Util\Html::ul([
                                    PHPStrap\Util\Html::tag('a', PHPStrap\Util\Html::tag('i', ' ', ["fa fa-envelope"]) . "Mis Correos" . PHPStrap\Util\Html::tag('span', '', ["fa fa-chevron-down"]))
                                        . PHPStrap\Util\Html::ul($boxes_html, ['nav child_menu'])
									, ($this->checkPermission('my:calendar') == true) ? FelipheGomez\Url::a(['site/my_calendar', ['table' => 'accounts']], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-calendar"]) . "Mi Calendario") : ""
                                ], ['nav side-menu'])
                            , ['menu_section']);
							
							
                            $menu_section_events = PHPStrap\Util\Html::tag('div', 
                                PHPStrap\Util\Html::tag('h3', 'Eventos')
                                . PHPStrap\Util\Html::ul([
									($this->checkPermission('calendar:admin:master') == true) ? FelipheGomez\Url::a(['site/calendar_master'], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-calendar"]) . "Calendario Master") : ""
									, ($this->checkPermission('calendar:admin:table') == true) ? FelipheGomez\Url::a(['site/Table_Master_Vue', ['table' => 'events']], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-calendar-o"]) . "Calendario Master Tabla") : ""
									, ($this->checkPermission('calendar:admin:types') == true) ? FelipheGomez\Url::a(['site/Table_Master_Vue', ['table' => 'events_types']], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-calendar-o"]) . "Tipos de Eventos Tabla") : ""
                                ], ['nav side-menu'])
                            , ['menu_section']);
							
                            $menu_section_2 = PHPStrap\Util\Html::tag('div', 
                                PHPStrap\Util\Html::tag('h3', 'Live On')
                                . PHPStrap\Util\Html::ul([
                                    FelipheGomez\Url::a('javascript:void(0)', PHPStrap\Util\Html::tag('i', ' ', ["fa fa-bug"]) . "Páginas adicionales" . PHPStrap\Util\Html::tag('span', '', ["fa fa-chevron-down"]))
                                        . PHPStrap\Util\Html::ul([
                                            FelipheGomez\Url::a(['demo/e_commerce'], 'Comercio electrónico')
                                            , FelipheGomez\Url::a(['demo/projects'], 'Proyectos')
                                            , FelipheGomez\Url::a(['demo/project_detail'], 'Detalle del proyecto')
                                            , FelipheGomez\Url::a(['demo/contacts'], 'Contactos')
                                            , FelipheGomez\Url::a(['demo/profile'], 'Perfil')
                                        ], ['nav child_menu'])
                                    , FelipheGomez\Url::a('javascript:void(0)', PHPStrap\Util\Html::tag('i', ' ', ["fa fa-windows"]) . "Extras" . PHPStrap\Util\Html::tag('span', '', ["fa fa-chevron-down"]))
                                        . PHPStrap\Util\Html::ul([
                                            FelipheGomez\Url::a(['demo/page_403'], 'Error 403')
                                            , FelipheGomez\Url::a(['demo/page_404'], 'Error 404')
                                            , FelipheGomez\Url::a(['demo/page_500'], 'Error 500')
                                            , FelipheGomez\Url::a(['demo/plain_page'], 'Página simple')
                                            , FelipheGomez\Url::a(['demo/login'], 'Página de inicio de sesión')
                                            , FelipheGomez\Url::a(['demo/pricing_tables'], 'Tablas de precios')
                                        ], ['nav child_menu'])
                                    , 
                                    FelipheGomez\Url::a('javascript:void(0)', 
                                        PHPStrap\Util\Html::tag('i', ' ', ["fa fa-windows"])
                                        . 'Landing Page'
                                        . PHPStrap\Util\Html::tag('span', 'Próximamente', ["label label-success pull-right"]))
                                    , PHPStrap\Util\Html::tag('a', PHPStrap\Util\Html::tag('i', ' ', ["fa fa-sitemap"]) . "Menú multinivel" . PHPStrap\Util\Html::tag('span', '', ["fa fa-chevron-down"]))
                                        . PHPStrap\Util\Html::ul([
                                            FelipheGomez\Url::a('#level1_1', 'Nivel uno')
                                            , PHPStrap\Util\Html::tag('a', "Nivel uno" . PHPStrap\Util\Html::tag('span', '', ["fa fa-chevron-down"]))
                                                . PHPStrap\Util\Html::ul([
                                                    FelipheGomez\Url::a('#level2_1', 'Nivel dos', ['sub_menu'])
                                                    , FelipheGomez\Url::a('#level2_2', 'Nivel dos')
                                                    , FelipheGomez\Url::a('#level3_1', "Nivel tres" . PHPStrap\Util\Html::tag('span', '', ["fa fa-chevron-down"]))
                                                        . PHPStrap\Util\Html::ul([
                                                            FelipheGomez\Url::a('#level3_1', 'Nivel tres')
                                                        ], ['nav child_menu'])
                                            ], ['nav child_menu'])
                                        ], ['nav child_menu'])
                                ], ['nav side-menu'])
                            , ['menu_section']);
							
							// FelipheGomez\Url::a(['site/accounts_master', ['table' => 'accounts']], 'Cuentas')
							
							
                            $menu_section_accounts = PHPStrap\Util\Html::tag('div', 
                               PHPStrap\Util\Html::tag('h3', 'Cuentas y Clientes') . 
                                PHPStrap\Util\Html::ul([
									PHPStrap\Util\Html::tag('a', PHPStrap\Util\Html::tag('i', ' ', ["fa fa-building"]) . "Cuentas" . PHPStrap\Util\Html::tag('span', '', ["fa fa-chevron-down"]))
									. PHPStrap\Util\Html::ul(
											 [
												FelipheGomez\Url::a(['site/accounts_list'], 'Todas las cuentas'),
												FelipheGomez\Url::a(['site/accounts_create'], 'Crear Cuenta'),
												FelipheGomez\Url::a(['site/accounts_search'], 'Buscar Cuenta'),
												FelipheGomez\Url::a(['site/accounts_master', ['table' => 'accounts']], 'Master')
											 ]
										, ['nav child_menu'])
                                ], ['nav side-menu'])
                            , ['menu_section']);
							
							
                            $menu_section_analytics = PHPStrap\Util\Html::tag('div', 
                               PHPStrap\Util\Html::tag('h3', 'Analytics') . 
                                PHPStrap\Util\Html::ul([
									($this->checkPermission('analytics:basic') == true) ? FelipheGomez\Url::a(['site/analytics_basic', []], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-pie-chart"]) . "Básico") : ""
									, ($this->checkPermission('analytics:multiple') == true) ? FelipheGomez\Url::a(['site/analytics_multiple', []], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-pie-chart"]) . "Multiple") : ""
									, ($this->checkPermission('analytics:interactive') == true) ? FelipheGomez\Url::a(['site/analytics_interactive', []], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-pie-chart"]) . "Interactivo") : ""
                                ], ['nav side-menu'])
                            , ['menu_section']);
							
                            $menu_section_system = PHPStrap\Util\Html::tag('div', 
                               PHPStrap\Util\Html::tag('h3', 'Sistema') . 
                                PHPStrap\Util\Html::ul([
									// ($this->checkPermission('usuarios:admin') == true) ? FelipheGomez\Url::a(['site/AdminPermissionsList'], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-users"]) . "Permisos") : ""
									
									// MENU NUEVO
									($this->checkPermission('system:permissions:manage') == true) ? FelipheGomez\Url::a(['site/AdminPermissionsVue'], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-users"]) . "Gestionar Permisos") : ""
									, ($this->checkPermission('system:permissions:manage') == true) ? FelipheGomez\Url::a(['site/AdminPermissionsGroupVue'], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-lock"]) . "Grupos de Permisos") : ""
									, ($this->checkPermission('system:users:manage') == true) ? FelipheGomez\Url::a(['site/AdminUsersVue '], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-lock"]) . "Gestionar Usuarios") : ""
									
									
									#, ($this->checkPermission('usuarios:admin') == true) ? FelipheGomez\Url::a(['site/UsersMaster'], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-users"]) . "Usuarios Master") : ""
									#, ($this->checkPermission('usuarios:admin') == true) ? FelipheGomez\Url::a(['site/Table_Master_Vue', ['table' => 'users']], PHPStrap\Util\Html::tag('i', ' ', ["fa fa-users"]) . "Usuarios Tabla") : ""
                                ], ['nav side-menu'])
                            , ['menu_section']);
							
							
                            echo PHPStrap\Util\Html::tag('div', 
								$menu_section_my
								.$menu_section_events
								.$menu_section_accounts
								.$menu_section_analytics
								.$menu_section_system
								.PHPStrap\Util\Html::clearfix(), ['main_menu_side hidden-print main_menu'], ['id' => 'sidebar-menu']);
							
                        ?>
                        <!-- /sidebar menu -->
                        <!-- /menu footer buttons -->
                        <?= PHPStrap\Util\Html::tag('div', 
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
                        ?>
                        <!-- /menu footer buttons -->
                    </div>
                </div>
                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
						<?php 							
							$html_mail = "";
							foreach($mails as $mail){
								$html_mail .= PHPStrap\Util\Html::tag('li', 
									FelipheGomez\Url::a(
											"/index.php?controller=site&action=my_email&ref={$mail->box}&folder=not_seen#/view/{$mail->id}-0"
											, # PHPStrap\Util\Html::tag('span', PHPStrap\Media::imageClean('/public/assets/images/img.jpg', '...'), ['image'])
												PHPStrap\Util\Html::tag('span', 
														#PHPStrap\Util\Html::tag('span', $mail->from)
														PHPStrap\Util\Html::tag('span', "<b>{$mail->from}</b>")
														. PHPStrap\Util\Html::tag('span', "", ['time'])
													)
												. PHPStrap\Util\Html::tag('span', cortar_string(strip_tags($mail->subject), 25), ['message'])
											, []
											, []
										)
									, [], []);
							};
						?>
						
						
                        <?php 
							echo PHPStrap\Util\Html::tag('nav', 
                                $navbar = PHPStrap\Util\Html::tag('div', PHPStrap\Util\Html::tag('a', PHPStrap\Util\Html::tag('i', '', ['fa fa-bars']), [], ['id' => 'menu_toggle']), ['nav toggle'])
                                . PHPStrap\Util\Html::tag('ul', 
                                    PHPStrap\Util\Html::tag('li', 
                                        FelipheGomez\Url::a(
                                                'javascript:void(0)'
                                                , PHPStrap\Media::imageClean('/public/assets/images/img.jpg', '...') . "{$this->user->username} " . PHPStrap\Util\Html::tag('span', '', ["fa fa-angle-down"])
                                                , ['user-profile dropdown-toggle']
                                                , ['data-toggle' => 'dropdown', 'aria-expanded' => 'false']
                                            )
                                            . PHPStrap\Util\Html::ul([
                                                        // FelipheGomez\Url::a('javascript:void(0)', "Perfil ")
                                                        // , FelipheGomez\Url::a('javascript:void(0)', "Ayuda ")
                                                        // , FelipheGomez\Url::a('javascript:void(0)', PHPStrap\Util\Html::tag('span', '50%', ["badge bg-red pull-right"]) . PHPStrap\Util\Html::tag('span', 'Configuraciones'))
                                                        FelipheGomez\Url::a(['site/logout'], PHPStrap\Util\Html::tag('span', '', ["fa fa-sign-out pull-right"]) . "Salir ")
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
                                    . PHPStrap\Util\Html::tag('li', 
                                        FelipheGomez\Url::a(
                                                'javascript:void(0)'
                                                , PHPStrap\Util\Html::tag('i', '', ['fa fa-envelope-o']) . (count($mails) > 0 ? PHPStrap\Util\Html::tag('span', count($mails)==100 ? "+" . count($mails) : count($mails), ['badge bg-green']) : "")
                                                , ['dropdown-toggle info-number']
                                                , ['data-toggle' => 'dropdown', 'aria-expanded' => 'false']
                                            )
                                        . PHPStrap\Util\Html::tag('ul', 
                                                // Items
                                                $html_mail
                                                . 
                                                // Footer
                                                PHPStrap\Util\Html::tag('li', 
                                                        PHPStrap\Util\Html::tag('div', 
                                                            PHPStrap\Util\Html::tag('a', 
                                                                    PHPStrap\Util\Html::tag('strong', 'Ver todos los correos')
                                                                    . PHPStrap\Util\Html::tag('i', '', ['fa fa-angle-right'])
                                                                )
                                                            , ['text-center'], [])
                                                    , [], [])
                                            , ['dropdown-menu list-unstyled msg_list'], ['id' => 'menu2', 'role' => 'menu'], ['style' => 'max-height: 250px;overflow: auto;'])
                                    , ['dropdown'], ['role' => 'presentation'])
									
                                , ['nav navbar-nav navbar-right'])
                            );
                        ?>
						<style>
							#menu2 {
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
            </div>
        </div>
        <?= $this->footerScripts(); ?>
    </body>
</html>