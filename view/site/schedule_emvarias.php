<style>
.sonar-wrapper .green {
	background-color: green !important;
}
.sonar-wrapper .orange {
	background-color: orange !important;
}
.sonar-wrapper .red {
	background-color: red !important;
}
.sonar-wrapper .sonar-emitter {
  position: relative;
  margin: 0 auto;
  width: 27px;
  height: 27px;
  border-radius: 9999px;
  background-color: #666;
}
</style>

<div class="page-title">
    <div class="title_left">
        <h3><?= (isset($title)) ? $title : ""; ?> <small><?= (isset($subtitle)) ? $subtitle : ""; ?></small></h3>
    </div>
    <div class="title_right">
        <!-- // Buscador
		<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
            </div>
        </div>
		-->
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>CONTRATO CW72436<small>PERIODO Y AÑO</small></h2>
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
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>
                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" id="check-all" class="flat" />
                                </th>
                                <th class="column-title">#</th>
                                <th class="column-title">LOT_REF</th>
                                <th class="column-title">MICROROUTE</th>
                                <th class="column-title">DESCRIPTION</th>
                                <th class="column-title">ADDRESS_TEXT</th>
                                <th class="column-title">AREA_M2</th>
                                <th class="column-title">ZONE_CLIENT</th>
                                <th class="column-title">OBS</th>
                                <th class="column-title">Programado</th>
                                <th class="column-title">Ejecutado</th>
                                <th class="column-title">Aprobado</th>
                                <th class="column-title no-link last">
                                    <span class="nobr">Action</span>
                                </th>
                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="even pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records" />
                                </td>
                                <td class=" ">#-INT</td>
                                <td class=" ">1</td>
                                <td class=" ">Z1CC0001FM2</td>
                                <td class=" ">
                                    Zona verde pública asociada al parque infantil y gimnasio al aire libre ubicados en los costados oriental, separador central de la carrera 62 en sentido sur-norte, zona verde asociada a la rivera del rio Medellin adyacente a placa huella en costado occidental, empezando desde el puente del mico hasta el puente de la Madre Laura. No está incluido lo siguiente: a) la zona verde (separador, glorieta) que une la carrera 62 con la calle 77 en ambos costados sur y norte.
                                </td>
                                <td class=" ">Cls 77a 91 y entre crs 62 y 63A.</td>
                                <td class=" ">
                                    14445 m2 
                                    <i class="success fa fa-long-arrow-up"></i>
                                </td>
                                <td class=" ">1</td>
                                <td class=" ">Sin observaciones</td>
                                <td class=" ">
									<div class="sonar-wrapper">
										<div class="sonar-emitter">
											<div class="sonar-wave"></div>
										</div>
									</div>
								</td>
                                <td class=" ">
									<div class="sonar-wrapper">
										<div class="sonar-emitter">
											<div class="sonar-wave"></div>
										</div>
									</div>
								</td>
                                <td class=" ">
									<div class="sonar-wrapper">
										<div class="sonar-emitter">
											<div class="sonar-wave"></div>
										</div>
									</div>
								</td>
                                <td class=" last">
                                    <a href="#">View</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>