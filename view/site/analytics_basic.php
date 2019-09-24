<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * ******************************/
?>
<div class="page-title">
	<div class="title_left">
		<h3>Analitycs</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Conectado Como: </h2>
					<ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div id="embed-api-auth-container"></div>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<div id="embed-api-auth-email"></div>
						<div id="embed-api-auth-name"></div>
					</div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div class="profile_pic">
							<img class="media-object img-circle profile_img" id="embed-api-auth-image" alt="..." />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Sesiones</h2>
					<ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-4 col-sm-4 col-xs-4">
						<div id="view-selector-container"></div>
					</div>
					
					<div class="col-md-4 col-sm-4 col-xs-4">
						<label class="label">Métricas</label>
						<select name="metrics[]" id="metric-select" class="form-control" size="10" multiple>
							<optgroup label="Usuario">
								<option value="ga:users" selected>Usuarios</option>
								<option value="ga:newUsers">Usuarios nuevos</option>
								<option value="ga:percentNewSessions">% De nuevas sesiones</option>
								<option value="ga:1dayUsers">Usuarios activos durante 1 día</option>
								<option value="ga:7dayUsers">Usuarios activos de 7 días</option>
								<option value="ga:14dayUsers">Usuarios activos de 14 días</option>
								<option value="ga:28dayUsers">Usuarios activos de 28 días</option>
								<option value="ga:sessionsPerUser">Usuarios activos de 30 días</option>
								<option value="ga:30dayUsers">Número de sesiones por usuario</option>
							</optgroup>
							<optgroup label="Sesión">
								<option value="ga:sessions">Sesiones</option>
								<option value="ga:bounces">Rebotes</option>
								<option value="ga:bounceRate">% de rebotes</option>
								<option value="ga:sessionDuration">Duración de la sesión</option>
								<option value="ga:avgSessionDuration">Duración (media) de la sesión</option>
								<option value="ga:hits">Golpes o Hits</option>
							</optgroup>
							<optgroup label="Fuentes de Tráfico">
								<option value="ga:organicSearches">Búsquedas orgánicas</option>
							</optgroup>
							<optgroup label="Adwords">
								<option value="ga:impressions">Impresiones</option>
								<option value="ga:adClicks">Clics</option>
								<option value="ga:adCost">Costo</option>
								<option value="ga:CPM">CPM</option>
								<option value="ga:CPC">CPC</option>
								<option value="ga:CTR">CTR</option>
								<option value="ga:costPerTransaction">Costo por transacción</option>
								<option value="ga:costPerGoalConversion">Conversión de costo por objetivo</option>
								<option value="ga:costPerConversion">Costo por conversión</option>
								<option value="ga:RPC">RPC</option>
								<option value="ga:ROAS">ROAS</option>
							</optgroup>								
							<optgroup label="Plataforma o dispositivo">
								<option value="">Sin Metricas</option>
							</optgroup>
							<optgroup label="Geo Network">
								<option value="">Sin Metricas</option>
							</optgroup>
							<optgroup label="Sistema">
								<option value="">Sin Metricas</option>
							</optgroup>
							<optgroup label="Seguimiento de página">
								<option value="ga:pageValue">Valor de página</option>
								<option value="ga:entrances">Entradas</option>
								<option value="ga:entranceRate">Entradas / Páginas vistas</option>
								<option value="ga:pageviews">Vistas de página</option>
								<option value="ga:pageviewsPerSession">Páginas / Sesión</option>
								<option value="ga:uniquePageviews">Vistas de página únicas</option>
								<option value="ga:timeOnPage">Tiempo en la página</option>
								<option value="ga:avgTimeOnPage">Media Tiempo en la página</option>
								<option value="ga:exits">Salidas</option>
								<option value="ga:exitRate">% Salida</option>
							</optgroup>
							<optgroup label="Interacciones sociales">
								<option value="ga:socialInteractions">Acciones sociales</option>
								<option value="ga:uniqueSocialInteractions">Acciones sociales únicas</option>
								<option value="ga:socialInteractionsPerSession">Acciones por sesión social</option>
							</optgroup>
							<optgroup label="Audiencia">
								<option value="">Sin Metricas</option>
							</optgroup>
							<optgroup label="Adsense">
								<option value="ga:adsenseRevenue">Ingresos de AdSense</option>
								<option value="ga:adsenseAdUnitsViewed">Bloques de anuncios de AdSense vistos</option>
								<option value="ga:adsenseAdsViewed">Impresiones de AdSense</option>
								<option value="ga:adsenseAdsClicks">Anuncios de AdSense en los que se hizo clic</option>
								<option value="ga:adsensePageImpressions">Impresiones de página de AdSense</option>
								<option value="ga:adsenseCTR">CTR de AdSense</option>
								<option value="ga:adsenseECPM">ECPM de AdSense</option>
								<option value="ga:adsenseExits">Salidas de AdSense</option>
								<option value="ga:adsenseViewableImpressionPercent">Porcentaje de impresiones visibles de AdSense</option>
								<option value="ga:adsenseCoverage">Cobertura de AdSense</option>
							</optgroup>
							
							<optgroup label="Base">
								<option value="ga:base">base</option>
							</optgroup>
						</select>
					</div>
					
					<div class="col-md-4 col-sm-4 col-xs-4">
						<label class="label">Dimenciónes</label>
						<select name="dimensions[]" id="dimension-select" class="form-control" size="10" multiple>
							<optgroup label="Usuario">
								<option value="ga:userType" selected>Tipo de Usuario</option>
								<option value="ga:sessionCount">Conteo de sesiones</option>
								<option value="ga:daysSinceLastSession">Días desde la última sesión</option>
							</optgroup>								
							<optgroup label="Sesión">
								<option value="ga:sessionDurationBucket">Duración de la sesión</option>
							</optgroup>
							<optgroup label="Fuentes de Tráfico">
								<option value="ga:referralPath">Ruta de referencia</option>
								<option value="ga:fullReferrer">Remitente completo</option>
								<option value="ga:campaign">Campaña</option>
								<option value="ga:source">Fuente</option>
								<option value="ga:medium">Medio</option>
								<option value="ga:sourceMedium">Fuente / Medio</option>
								<option value="ga:keyword">Palabra clave</option>
								<option value="ga:adContent">Contenido del anuncio</option>
								<option value="ga:socialNetwork">Red social</option>
								<option value="ga:hasSocialSourceReferral">Referencia de fuente social</option>
								<option value="ga:campaignCode">Código de campaña</option>
							</optgroup>
							<optgroup label="Adwords">
								<option value="ga:adGroup">Google Ads: grupo de anuncios</option>
								<option value="ga:adSlot">Google Ads: espacio publicitario</option>
								<option value="ga:adDistributionNetwork">Red de distribución de anuncios</option>
								<option value="ga:adMatchType">Tipo de coincidencia de consulta</option>
								<option value="ga:adKeywordMatchType">Tipo de concordancia de palabra clave</option>
								<option value="ga:adMatchedQuery">Consulta de busqueda</option>
								<option value="ga:adPlacementDomain">Dominio de colocación</option>
								<option value="ga:adPlacementUrl">URL de ubicación</option>
								<option value="ga:adFormat">Formato de anuncio</option>
								<option value="ga:adTargetingType">Tipo de orientación</option>
								<option value="ga:adTargetingOption">Tipo de colocación</option>
								<option value="ga:adDisplayUrl">URL visible</option>
								<option value="ga:adDestinationUrl">URL de destino</option>
								<option value="ga:adwordsCustomerID">ID de cliente de Google Ads</option>
								<option value="ga:adwordsCampaignID">ID de campaña de Google Ads</option>
								<option value="ga:adwordsAdGroupID">ID del grupo de anuncios de Google Ads</option>
								<option value="ga:adwordsCreativeID">ID de creatividad de Google Ads</option>
								<option value="ga:adwordsCriteriaID">ID de criterios de Google Ads</option>
								<option value="ga:adQueryWordCount">Consultar recuento de palabras</option>
								<option value="ga:isTrueViewVideoAd">Anuncio de video TrueView</option>
							</optgroup>								
							<optgroup label="Plataforma o dispositivo">
								<option value="ga:browser">Navegador</option>
								<option value="ga:browserVersion">Versión del navegador</option>
								<option value="ga:operatingSystem">Sistema operativo</option>
								<option value="ga:operatingSystemVersion">Versión del sistema operativo</option>
								<option value="ga:mobileDeviceBranding">Marca de dispositivo móvil</option>
								<option value="ga:mobileDeviceModel">Modelo de dispositivo móvil</option>
								<option value="ga:mobileInputSelector">Selector de entrada móvil</option>
								<option value="ga:mobileDeviceInfo">Información del dispositivo móvil</option>
								<option value="ga:mobileDeviceMarketingName">Nombre de marketing del dispositivo móvil</option>
								<option value="ga:deviceCategory">Categoría de dispositivo</option>
								<option value="ga:browserSize">Tamaño del navegador</option>
								<option value="ga:dataSource">Fuente de datos</option>
							</optgroup>								
							<optgroup label="Geo Network">
								<option value="ga:continent">Continente</option>
								<option value="ga:subContinent">Subcontinente</option>
								<option value="ga:country">País</option>
								<option value="ga:region">Región</option>
								<option value="ga:metro">Metro</option>
								<option value="ga:city">Ciudad</option>
								<option value="ga:latitude">Latitud</option>
								<option value="ga:longitude">Longitud</option>
								<option value="ga:networkDomain">Dominio de Red</option>
								<option value="ga:networkLocation">Proveedor de servicio</option>
								<option value="ga:cityId">ID de la ciudad</option>
								<option value="ga:continentId">ID del continente</option>
								<option value="ga:countryIsoCode">Código ISO del país</option>
								<option value="ga:metroId">ID del metro</option>
								<option value="ga:regionId">ID de región</option>
								<option value="ga:regionIsoCode">Código ISO de la región</option>
								<option value="ga:subContinentCode">Código de subcontinente</option>
							</optgroup>								
							<optgroup label="Sistema">
								<option value="ga:flashVersion">Versión flash</option>
								<option value="ga:javaEnabled">Soporte Java</option>
								<option value="ga:language">Idioma</option>
								<option value="ga:screenColors">Colores de pantalla</option>
								<option value="ga:sourcePropertyDisplayName">Nombre de visualización de propiedad de origen</option>
								<option value="ga:sourcePropertyTrackingId">ID de seguimiento de propiedad de origen</option>
								<option value="ga:screenResolution">Resolución de la pantalla</option>
							</optgroup>								
							<optgroup label="Seguimiento de página">
								<option value="ga:hostname">Nombre de host</option>
								<option value="ga:pagePath">Página</option>
								<option value="ga:pagePathLevel1">Ruta de página nivel 1</option>
								<option value="ga:pagePathLevel2">Ruta de página nivel 2</option>
								<option value="ga:pagePathLevel3">Ruta de página nivel 3</option>
								<option value="ga:pagePathLevel4">Ruta de página nivel 4</option>
								<option value="ga:pageTitle">Título de la página</option>
								<option value="ga:landingPagePath">Página de destino</option>
								<option value="ga:secondPagePath">Segunda pagina</option>
								<option value="ga:exitPagePath">Salir de la página</option>
								<option value="ga:previousPagePath">Ruta de página anterior</option>
								<option value="ga:pageDepth">Profundidad de página</option>
							</optgroup>
							<optgroup label="Interacciones sociales">
								<option value="ga:socialInteractionNetwork">Red social</option>
								<option value="ga:socialInteractionAction">Acción social</option>
								<option value="ga:socialInteractionNetworkAction">Red social y acción (Hit)</option>
								<option value="ga:socialInteractionTarget">Entidad social</option>
								<option value="ga:socialEngagementType">Tipo social</option>
							</optgroup>
							<optgroup label="Audiencia">
								<option value="ga:userAgeBracket">Años</option>
								<option value="ga:userGender">Género</option>
								<option value="ga:interestOtherCategory">Otra categoría</option>
								<option value="ga:interestAffinityCategory">Categoría de afinidad (alcance)</option>
								<option value="ga:interestInMarketCategory">Segmento en el mercado</option>
							</optgroup>								
							<optgroup label="Adsense">
								<option value="ga:base">Sin Dimenciónes</option>
							</optgroup>
							
							<optgroup label="Base">
								<option value="ga:base">base</option>
							</optgroup>
						</select>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="x_panel">
				<div class="x_title">
					<h2>Gráfico LINE</h2>
					<ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div id="chart-container-line"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="x_panel">
				<div class="x_title">
					<h2>Gráfico COLUMN</h2>
					<ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div id="chart-container-column"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="x_panel">
				<div class="x_title">
					<h2>Gráfico BAR</h2>
					<ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div id="chart-container-bar"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="x_panel">
				<div class="x_title">
					<h2>Gráfico TABLE</h2>
					<ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div id="chart-container-table"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Gráfico GEO</h2>
					<ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div id="chart-container-geo"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
gapi.analytics.ready(function() {
	var box_user_email = $("#embed-api-auth-email");
	var box_user_name = $("#embed-api-auth-name");
	var box_user_image = $("#embed-api-auth-image");
	var metricSelector = $( "#metric-select" );
	var dimensionSelector = $( "#dimension-select" );
	var chartContainerLINE = 'chart-container-line';
	var chartContainerCOLUMN = 'chart-container-column';
	var chartContainerBAR = 'chart-container-bar';
	var chartContainerTABLE = 'chart-container-table';
	var chartContainerGEO = 'chart-container-geo';
	
	var chart_StartDate = '7daysAgo';
	var chart_EndDate = 'yesterday';
	
	gapi.analytics.auth.authorize({
		clientid: '<?= $clientid; ?>',
		container: 'embed-api-auth-container',
		userInfoLabel: 'Has iniciado sesión como: ',
	});
	
	gapi.analytics.auth.on('signIn', function() {
		var userActive = gapi.analytics.auth.getUserProfile();
		//console.log(userActive);
		box_user_email.text(userActive.email)
		box_user_name.text(userActive.name)
		box_user_image.attr('src', userActive.imageUrl)
	});
	
	var viewSelector = new gapi.analytics.ViewSelector({ container: 'view-selector-container' });
	viewSelector.execute();
	
	var dataChart_1 = new gapi.analytics.googleCharts.DataChart({
		query: {
			metrics: metricSelector.val(),
			dimensions: dimensionSelector.val(),
			'max-results': '25',
			'start-date': chart_StartDate,
			'end-date': chart_EndDate
		},
		chart: {
			container: chartContainerLINE,
			type: "LINE",
			options: {
				title: 'Últimos 7 días.',
				width: '100%'
			}
		}
	});
	
	dataChart_1.on('error', function(a) {
		console.log(a.error);
		a.error.errors.forEach(function(b){
			b.message = b.message == 'Selected dimensions and metrics cannot be queried together.' ? 'Las dimensiones y métricas seleccionadas no se pueden consultar juntas.' : b.message;// Selected dimensions and metrics cannot be queried together. => Las dimensiones y métricas seleccionadas no se pueden consultar juntas.
			
			new PNotify({
				"title":"Error: ",
				"text":b.message,
				"styling":"bootstrap3",
				"type":"error",
				"icon":true,
				"animation":"zoom",
				"hide":true,
				"delay":4000
			});
		});
	});
	
	
	var dataChart_2 = new gapi.analytics.googleCharts.DataChart({
		query: {
			metrics: metricSelector.val(),
			dimensions: dimensionSelector.val(),
			'max-results': '25',
			'start-date': chart_StartDate,
			'end-date': chart_EndDate
		},
		chart: {
			container: chartContainerCOLUMN,
			type: "COLUMN",
			options: {
				title: 'Últimos 7 días.',
				width: '100%',
			}
		}
	});
	var dataChart_3 = new gapi.analytics.googleCharts.DataChart({
		query: {
			metrics: metricSelector.val(),
			dimensions: dimensionSelector.val(),
			'max-results': '25',
			'start-date': chart_StartDate,
			'end-date': chart_EndDate
		},
		chart: {
			container: chartContainerBAR,
			type: "BAR",
			options: {
				title: 'Últimos 7 días.',
				width: '100%'
			}
		}
	});
	var dataChart_4 = new gapi.analytics.googleCharts.DataChart({
		query: {
			metrics: metricSelector.val(),
			dimensions: dimensionSelector.val(),
			'max-results': '25',
			'start-date': chart_StartDate,
			'end-date': chart_EndDate
		},
		chart: {
			container: chartContainerTABLE,
			type: "TABLE",
			options: {
				title: 'Últimos 7 días.',
				width: '100%'
			}
		}
	});
	/*var dataChart_5 = new gapi.analytics.googleCharts.DataChart({
		query: {
			metrics: metricSelector.val(),
			dimensions: dimensionSelector.val(),
			'start-date': chart_StartDate,
			'end-date': chart_EndDate
		},
		chart: {
			container: chartContainerGEO,
			type: "GEO",
			options: {
				 title: 'Últimos 30 días.',
				width: '100%'
			}
		}
	});*/
	
	viewSelector.on('change', function(ids) {
		console.log(ids);
		dataChart_1.set({query: {ids: ids}}).execute();
		dataChart_2.set({query: {ids: ids}}).execute();
		dataChart_3.set({query: {ids: ids}}).execute();
		dataChart_4.set({query: {ids: ids}}).execute();
		//dataChart_5.set({query: {ids: ids}}).execute();
	});
	
	metricSelector.on('change', function(event, handler) {
		console.log('metricSelector.val()', metricSelector.val().join(','));
		// dataChart.set({query: {ids: ids}}).execute();
		dataChart_1.set({ query: { metrics: metricSelector.val().join(',') } }).execute();
		dataChart_2.set({ query: { metrics: metricSelector.val().join(',') } }).execute();
		dataChart_3.set({ query: { metrics: metricSelector.val().join(',') } }).execute();
		dataChart_4.set({ query: { metrics: metricSelector.val().join(',') } }).execute();
		//dataChart_5.set({ query: { metrics: metricSelector.val().join(',') } }).execute();
	});
	
	dimensionSelector.on('change', function(event, handler) {
		dataChart_1.set({ query: { dimensions: dimensionSelector.val().join(',') } }).execute();
		dataChart_2.set({ query: { dimensions: dimensionSelector.val().join(',') } }).execute();
		dataChart_3.set({ query: { dimensions: dimensionSelector.val().join(',') } }).execute();
		dataChart_4.set({ query: { dimensions: dimensionSelector.val().join(',') } }).execute();
		//dataChart_5.set({ query: { dimensions: dimensionSelector.val() } }).execute();
	});

});
</script>