<style>
.img-drag {
  width: 25px;
}

.div-box {
  width: 100%;
  padding: 10px;
  border: 1px solid #aaaaaa;
}


/* draggable targets */
[data-draggable="target"]
{
    float:left;
    list-style-type:none;
    width: 90%;
    height: 100%;
    min-height: 12.5em;
	height: auto;
    overflow-y:auto;
    
    margin:0 0.5em 0.5em 0;
    padding: 2.5em 0.5em;
    
	border:2px solid #888;
    /* background:#ddd; */
    border-radius:0.2em;
    
    background:#d8e9cf;
    color:#555;
}

/* draggable items */
[data-draggable="item"]
{
    display:block;
    list-style-type:none;
    
    margin:0 0 2px 0;
    padding:0.2em 0.4em;
	
	color:#d8e9cf;
	background:#6ba74c;
	
    border-radius:0.2em;
    border:2px solid #888;
    line-height:1.3;
}
</style>


<div id="schedule-programming">
	<div class="page-title">
		<div class="title_left">
			<h3><?= $title; ?> <small><?= $subtitle; ?></small></h3>
		</div>
		<div class="title_right">
		</div>
	</div>
	<div class="clearfix"></div>
	
	<div class="row">
		<router-view :key="$route.fullPath" ></router-view>
	</div>
</div>

<template id="step-one">
	<div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Paso # 1 <small></small></h2>
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
					<p class="text-muted font-13 m-b-30">
						The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
					</p>
					<div class="row">
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract">Contrato<span class="required">*</span></label>
								<div class="col-md-8 col-xs-12">
									<select @change="loadMicroroutes" id="contract" required="required" v-model="contract" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(option, i_option) in options.emvarias_contracts" :value="option.id">{{ option.name }}</option>
									</select>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="period">Periodo<span class="required">*</span></label>
								<div class="col-md-8 col-xs-12">
									<select id="period" required="required" v-model="period" class="form-control">
										<option value="0">Seleccione una opcion</option>
										<option v-for="(option, i_option) in options.photographic_periods" :value="option.id">{{ option.name }}</option>
									</select>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						
						<div class="col-md-4 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Año <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input v-model="year" type="number" min="2019" id="year" required="required" class="form-control">
								</div>
							</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-xs-12">
							<br>
							<button @click="load" type="button" class="btn btn-success pull-right">Continuar</button>
							
						</div>
					</div>
				
			</div>
		</div>
		
		<div class="col-md-3 col-sm-3 col-xs-3">
			<div class="x_panel">
				<div class="x_content" style="height: calc(50vw);overflow: auto;">
					<ol data-draggable="target" class="list-group">
						<li class="btn btn-sm btn-success" draggable data-draggable="item" v-for="(microroute, microroute_i) in options.emvarias_microroutes">
							{{ microroute.name }}
						</li>
					</ol>
				</div>
			</div>
		</div>
		
		<div class="col-md-9 col-sm-9 col-xs-9">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6" v-for="(group, group_i) in options.photographic_groups">
					<div class="x_panel">
						<div class="x_title">
							<h2>{{ group.name }} <small></small></h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<ol data-draggable="target">
							</ol>
						</div>
					</div>
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

function FormException(error, aviso){
	this.name = error;
	this.message = aviso;
};

var Step_One = Vue.extend({
	template: '#step-one',
	data(){
		return {
			options: {
				emvarias_contracts: [],
				emvarias_microroutes: [],
				photographic_periods: [],
				photographic_groups: [],
			},
			total_m2: 0,
			total_m2_schedule: 0,
			total: 0,
			period: 0,
			contract: 0,
			"year": moment().format('Y'),
			records: [],
			dataTable: null,
		};
	},
	created: function () {
	},
	computed: {
		contractName(){
			var self = this;
			try{
				return self.options.emvarias_contracts.find(x => x.id === self.contract).name;
			} catch(e){
				return "";
			}
		},
		periodName(){
			var self = this;
			try{
				return self.options.photographic_periods.find(x => x.id === self.period).name;
			} catch(e){
				return "";
			}
		},
	},
	mounted: function () {
		var self = this;
		self.loadDrag();
		self.listOptions();
	},
	methods: {
		loadDrag(){
			(function(){
				//exclude older browsers by the features we need them to support
				//and legacy opera explicitly so we don't waste time on a dead browser
				if (!document.querySelectorAll || !('draggable' in document.createElement('span')) || window.opera) { return; }
				//get the collection of draggable items and add their draggable attribute
				for(var items = document.querySelectorAll('[data-draggable="item"]'), len = items.length, i = 0; i < len; i ++){
					items[i].setAttribute('draggable', 'true');
				}
				//variable for storing the dragging item reference 
				//this will avoid the need to define any transfer data 
				//which means that the elements don't need to have IDs 
				var item = null;
				//dragstart event to initiate mouse dragging
				document.addEventListener('dragstart', function(e){
					//set the item reference to this element
					item = e.target;
					//we don't need the transfer data, but we have to define something
					//otherwise the drop action won't work at all in firefox
					//most browsers support the proper mime-type syntax, eg. "text/plain"
					//but we have to use this incorrect syntax for the benefit of IE10+
					e.dataTransfer.setData('text', '');
				}, false);
				//dragover event to allow the drag by preventing its default
				//ie. the default action of an element is not to allow dragging 
				document.addEventListener('dragover', function(e){
					if(item){ e.preventDefault(); }
				}, false);
				//drop event to allow the element to be dropped into valid targets
				document.addEventListener('drop', function(e){
					//if this element is a drop target, move the item here 
					//then prevent default to allow the action (same as dragover)
					if(e.target.getAttribute('data-draggable') == 'target'){
						e.target.appendChild(item);
						e.preventDefault();
					}				
				}, false);				
				//dragend event to clean-up after drop or abort
				//which fires whether or not the drop target was valid
				document.addEventListener('dragend', function(e){
					item = null;				
				}, false);
			})();
		},
		loadMicroroutes(){
			var self = this;
			self.options.emvarias_microroutes = [];
			var dialog = bootbox.dialog({
				message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
				closeButton: false
			});
			
			self.$root.loadAPI_List('emvarias_microroutes', {
				filter: [
					'contract,eq,' + self.contract
				],
			}, function(e){
				self.options.emvarias_microroutes = e;
				dialog.modal('hide');
			});
			self.loadDrag();
		},
		listOptions(){
			var self = this;
			self.$root.loadAPI_List('photographic_groups', {}, function(e){
				self.options.photographic_groups = e;
			});
			self.$root.loadAPI_List('photographic_periods', {}, function(e){
				self.options.photographic_periods = e;
			});
			self.$root.loadAPI_List('emvarias_contracts', {}, function(e){
				self.options.emvarias_contracts = e;
			});
		},
		isSchedule(item){
			var self = this;
			result = false;
			try {
				if(item.emvarias_schedule.length > 0){
					isSchedule = item.emvarias_schedule.find(x => (x.period.id == self.period && x.year == self.year) );
					if(isSchedule !==undefined && isSchedule.id > 0){
						result = true;
					} else {
						result = false;
					}
				} else {
					result = false;
				}
				return result;
			} catch(e){
				result = false;
				return false;
			}
			//
		},
		load(){
			var self = this;
			self.loading = true;
			self.records = [];
			self.total = 0;
			window.scrollTo(0, 0);
			if(self.period <= 0 || self.year <= 0){ return false; }
			var dialog = bootbox.dialog({
				message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Por favor espera mientras hacemos algo...</p>',
				closeButton: false
			});
			
			api.get('/records/emvarias_microroutes', { params: {
				filter: [
					'contract,eq,' + self.contract,
				],
				join: [
					'emvarias_lots',
					'emvarias_schedule,emvarias_contracts',
					'emvarias_schedule,photographic_periods',
					'emvarias_schedule,photographic_groups',
				],
			} }).then(function (a) {
				if(a.status === 200){
					self.total = a.data.records.length;
					a.data.records.forEach(function(b){
						b.isSchedule = self.isSchedule(b);
						self.total_m2 += b.lot.area_m2;
						self.records.push(b);
						if(b.isSchedule == true){
							// console.log(b.isSchedule);
							self.total_m2_schedule += b.lot.area_m2;
							b.schedule = b.emvarias_schedule.find(x => (x.period.id == self.period && x.year == self.year) );
						}
					});;
					
					// do something in the background
					dialog.modal('hide');
					// console.log('Normal: ', a.data.records);
				} else {
					alert("Ocurrio un error cargando la lista.");
					console.log(a);
				}
			}).catch(function (error) {
				console.error(error);
				console.log(error.response);
				self.loading = false;
			});
			
			
		},
		tableStyle() {
			var self = this;
			//self.dataTable.data.reload();
			
		
		},
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: Step_One, name: 'Step-One' },
	]
});

app = new Vue({
	router: router,
	data: function () {
		return {};
	},
	methods: {
		loadAPI_List(table=null, paramsIn=null, call=null){
			var self = this;
			paramsIn = paramsIn !== null ? paramsIn : {};
			call = call !== null ? call : function(e){ console.log('e',e); };
			table = table !== null ? '/records/' + table : '/openapi';
			
			
			api.get(table, { params: paramsIn})
			.then(function (c){ if(c.status == 200){ call(c.data.records); } else { return call([]); } })
			.catch(function (e) {
				console.error(e);
				console.log(e.response);
				return call([]);
			});
		},
		loadAPI_Single(table=null, id=0, paramsIn=null, call=null){
			var self = this;
			paramsIn = paramsIn !== null ? paramsIn : {};
			call = call !== null ? call : function(e){ console.log('e',e); };
			table = table !== null && id > 0 ? '/records/' + table + '/' + id : '/openapi';
			
			
			api.get(table, { params: paramsIn})
			.then(function (c){ if(c.status == 200){ call(c.data); } else { return call(null); } })
			.catch(function (e) {
				console.error(e);
				console.log(e.response);
				return call([]);
			});
		},
		zfill(number, width) {
			var numberOutput = Math.abs(number);
			var length = number.toString().length;
			var zero = "0";
			if (width <= length) {
				if (number < 0) { return ("-" + numberOutput.toString()); }
				else { return numberOutput.toString(); }
			} else {
				if (number < 0) { return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); }
				else { return ((zero.repeat(width - length)) + numberOutput.toString()); }
			}
		},
		formatMoney(number, decPlaces, decSep, thouSep) {
			var self = this;
			decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
			decSep = typeof decSep === "undefined" ? "." : decSep;
			thouSep = typeof thouSep === "undefined" ? "," : thouSep;
			var sign = number < 0 ? "-" : "";
			var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
			var j = (j = i.length) > 3 ? j % 3 : 0;
			return sign + (j ? i.substr(0, j) + thouSep : "") + (i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + (thouSep))) + (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
		},
	}
}).$mount('#schedule-programming');
</script>
