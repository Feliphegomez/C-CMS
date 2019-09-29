
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
			<!-- //
			<div class="user-head">
				<a class="inbox-avatar" href="javascript:;">
					<img  width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
				</a>
				<div class="user-name">
					<h5><a href="#">Alireza Zare</a></h5>
					<span><a href="#">Info.Ali.Pci@Gmail.com</a></span>
				</div>
				<a class="mail-dropdown pull-right" href="javascript:;">
					<i class="fa fa-chevron-down"></i>
				</a>
			</div>
			-->
			<div class="inbox-body">
				<!-- // <a href="#myModal" data-toggle="modal"  title="Compose"    class="btn btn-compose">Compose</a> -->
				<router-link v-bind:to="{ name: 'Compose', params: { box_id: <?= $ref; ?> } }" tag="a" class="btn btn-compose">
					Redactar
				</router-link>
		
				<a href="#myModal" data-toggle="modal"  title="Compose"    class="btn btn-compose">Compose</a>
			</div>
				
			<ul class="inbox-nav inbox-divider">
				<li class="active">
					<a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-envelope-o"></i> Sent Mail</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-bookmark-o"></i> Important</a>
				</li>
				<li>
					<a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a>
				</li>
				<li>
					<a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
				</li>
			</ul>
			<ul class="nav nav-pills nav-stacked labels-info inbox-divider">
				<li> <h4>Labels</h4> </li>
				<li> <a href="#"> <i class=" fa fa-sign-blank text-danger"></i> Work </a> </li>
				<li> <a href="#"> <i class=" fa fa-sign-blank text-success"></i> Design </a> </li>
				<li> <a href="#"> <i class=" fa fa-sign-blank text-info "></i> Family </a></li>
				<li> <a href="#"> <i class=" fa fa-sign-blank text-warning "></i> Friends </a></li>
				<li> <a href="#"> <i class=" fa fa-sign-blank text-primary "></i> Office </a></li>
			</ul>
			<ul class="nav nav-pills nav-stacked labels-info ">
				<li> <h4>Buddy online</h4> </li>
				<li> <a href="#"> <i class=" fa fa-circle text-success"></i>Alireza Zare <p>I do not think</p></a>  </li>
				<li> <a href="#"> <i class=" fa fa-circle text-danger"></i>Dark Coders<p>Busy with coding</p></a> </li>
				<li> <a href="#"> <i class=" fa fa-circle text-muted "></i>Mentaalist <p>I out of control</p></a></li>
				<li> <a href="#"> <i class=" fa fa-circle text-muted "></i>H3s4m<p>I am not here</p></a></li>
				<li> <a href="#"> <i class=" fa fa-circle text-muted "></i>Dead man<p>I do not think</p></a></li>
			</ul>
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
		</aside>
		<aside class="lg-side" style="overflow-y:auto; max-height:calc(80vh);min-height: calc(80vh);zoom: 0.8;">
			<div style="overflow-y:auto; max-height:100%;min-height:100%;" class="col-sm-12 mail_view" style="overflow:auto;max-height:calc(80vh);min-height: calc(80vh);">
				<router-view :key="$route.fullPath"></router-view>
			</div>
			
			<!-- //
				<div class="inbox-head">
					<h3>Inbox</h3>
					<form action="#" class="pull-right position">
						<div class="input-append">
							<input type="text" class="sr-input" placeholder="Search Mail">
							<button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>
				<div class="inbox-body">
					<div class="mail-option">
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

						 <div class="btn-group">
							 <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
								 <i class=" fa fa-refresh"></i>
							 </a>
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

						 <ul class="unstyled inbox-pagination">
							 <li><span>1-50 of 234</span></li>
							 <li>
								 <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
							 </li>
							 <li>
								 <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
							 </li>
						 </ul>
					 </div>
					  <table class="table table-inbox table-hover">
						<tbody>
						  <tr class="unread">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message  dont-show">PHPClass</td>
							  <td class="view-message ">Added a new class: Login Class Fast Site</td>
							  <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
							  <td class="view-message  text-right">9:27 AM</td>
						  </tr>
						  <tr class="unread">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message dont-show">Google Webmaster </td>
							  <td class="view-message">Improve the search presence of WebSite</td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">March 15</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message dont-show">JW Player</td>
							  <td class="view-message">Last Chance: Upgrade to Pro for </td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">March 15</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message dont-show">Tim Reid, S P N</td>
							  <td class="view-message">Boost Your Website Traffic</td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">April 01</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
							  <td class="view-message dont-show">Freelancer.com <span class="label label-danger pull-right">urgent</span></td>
							  <td class="view-message">Stop wasting your visitors </td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">May 23</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
							  <td class="view-message dont-show">WOW Slider </td>
							  <td class="view-message">New WOW Slider v7.8 - 67% off</td>
							  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
							  <td class="view-message text-right">March 14</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
							  <td class="view-message dont-show">LinkedIn Pulse</td>
							  <td class="view-message">The One Sign Your Co-Worker Will Stab</td>
							  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
							  <td class="view-message text-right">Feb 19</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message dont-show">Drupal Community<span class="label label-success pull-right">megazine</span></td>
							  <td class="view-message view-message">Welcome to the Drupal Community</td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">March 04</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message dont-show">Facebook</td>
							  <td class="view-message view-message">Somebody requested a new password </td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">June 13</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message dont-show">Skype <span class="label label-info pull-right">family</span></td>
							  <td class="view-message view-message">Password successfully changed</td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">March 24</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
							  <td class="view-message dont-show">Google+</td>
							  <td class="view-message">alireza, do you know</td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">March 09</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
							  <td class="dont-show">Zoosk </td>
							  <td class="view-message">7 new singles we think you'll like</td>
							  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
							  <td class="view-message text-right">May 14</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message dont-show">LinkedIn </td>
							  <td class="view-message">Alireza: Nokia Networks, System Group and </td>
							  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
							  <td class="view-message text-right">February 25</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="dont-show">Facebook</td>
							  <td class="view-message view-message">Your account was recently logged into</td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">March 14</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message dont-show">Twitter</td>
							  <td class="view-message">Your Twitter password has been changed</td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">April 07</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message dont-show">InternetSeer Website Monitoring</td>
							  <td class="view-message">http://golddesigner.org/ Performance Report</td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">July 14</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
							  <td class="view-message dont-show">AddMe.com</td>
							  <td class="view-message">Submit Your Website to the AddMe Business Directory</td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">August 10</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message dont-show">Terri Rexer, S P N</td>
							  <td class="view-message view-message">Forget Google AdWords: Un-Limited Clicks fo</td>
							  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
							  <td class="view-message text-right">April 14</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message dont-show">Bertina </td>
							  <td class="view-message">IMPORTANT: Don't lose your domains!</td>
							  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
							  <td class="view-message text-right">June 16</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
							  <td class="view-message dont-show">Laura Gaffin, S P N </td>
							  <td class="view-message">Your Website On Google (Higher Rankings Are Better)</td>
							  <td class="view-message inbox-small-cells"></td>
							  <td class="view-message text-right">August 10</td>
						  </tr>
						  <tr class="">
							  <td class="inbox-small-cells">
								  <input type="checkbox" class="mail-checkbox">
							  </td>
							  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
							  <td class="view-message dont-show">Facebook</td>
							  <td class="view-message view-message">Alireza Zare Login faild</td>
							  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
							  <td class="view-message text-right">feb 14</td>
						  </tr>
					  </tbody>
					  </table>
				  </div>
				 -->
		</aside>
	</div>
	
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
							<div class="col-sm-3 mail_list_column">
								
								<!-- // <button id="compose" class="btn btn-sm btn-success btn-block" type="button"> Redactar </button> -->
								
								<!--//
								<router-link v-bind:to="{ name: 'Compose', params: { box_id: <?= $ref; ?> } }" tag="button" class="btn btn-sm btn-success btn-block" type="button">
									Redactar
								</router-link>
								
								-->
								<!-- //
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
								-->
							</div>
							<!--
							<div style="overflow-y:auto; max-height:100%;min-height:100%;" class="col-sm-9 mail_view" style="overflow:auto;max-height:calc(80vh);min-height: calc(80vh);">
								<router-view :key="$route.fullPath"></router-view>
							</div>
							-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<template id="home">
  <div>
	<div class="inbox-head">
		<h3>Inbox</h3>
		<form action="#" class="pull-right position">
			<div class="input-append">
				<input type="text" class="sr-input" placeholder="Search Mail">
				<button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
			</div>
		</form>
	</div>
	<div class="inbox-body">
		<div class="mail-option">
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
			<div class="btn-group">
				<a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
					<i class=" fa fa-refresh"></i>
				</a>
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

			<ul class="unstyled inbox-pagination">
				 <li><span>1-50 of 234</span></li>
				 <li>
					 <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
				 </li>
				 <li>
					 <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
				 </li>
			</ul>
		</div>
		<table class="table table-inbox table-hover">
			<tbody>
				<tr v-for="(mail, index_mail) in $root.list_mails" :class="mail.status" :key="mail.id">
					<template v-if="mail.id !== undefined && mail.id > 0">
						<td class="inbox-small-cells">
							<input type="checkbox" class="mail-checkbox">
						</td>
						<template v-if="mail !== undefined">
							<td class="inbox-small-cells">
								<template v-if="mail.recent !== undefined && mail.recent === 1">
									<i class="fa fa-asterisk"></i>
								</template>
							</td>
							<td class="view-message dont-show">
								<template v-if="mail.from !== undefined && mail.subject !== undefined">
									<router-link :key="index_mail" v-bind:to="{ name: 'View-Single', params: { box_id: mail.box, index: index_mail, mail_id: mail.id } }">
										{{ mail.from.replace(/<\/?[^>]+(>|$)/g, '').slice(0,22) }}
									</router-link>
								</template>
							</td>
							<td class="view-message">
								<template v-if="mail.subject !== undefined">
									<router-link :key="index_mail" v-bind:to="{ name: 'View-Single', params: { box_id: mail.box, index: index_mail, mail_id: mail.id } }">
										{{ mail.subject.replace(/<\/?[^>]+(>|$)/g, '').slice(0,28) }}
									</router-link>
								</template>
							</td>
							<td class="view-message inbox-small-cells">
								<template v-if="mail.attachments !== undefined && mail.attachments.length > 0">
									<i class="fa fa-paperclip"></i>
								</template>
							</td>
							<td class="view-message text-right">
								<template v-if="mail.from !== undefined && mail.subject !== undefined">
									{{ mail.date }}
								</template>
							</td>
						</template>
					</template>
					<!-- //
					<template v-if="mail.answered !== undefined && mail.answered === 1">
						<i class="fa fa-share"></i> 
					</template>
					
					<template v-if="mail.draft !== undefined && mail.draft === 1">
						<i class="fa fa-edit"></i> 
					</template>
					<template v-if="mail.deleted !== undefined && mail.deleted === 1">
						<i class="fa fa-trash"></i> 
					</template>
					<template v-if="mail.from !== undefined && mail.subject !== undefined">{{ mail.date }}
						<h3>{{ mail.from.replace(/<\/?[^>]+(>|$)/g, '').slice(0,22) }}{{ (mail.from.length > 23) ? "..." : "" }}<small> {{ mail.date }}</small></h3>
						<p> - Leer Más</p>
					</template>
					-->
				</tr>
			
				<!-- //
				<tr class="unread">
					<td class="inbox-small-cells">
						<input type="checkbox" class="mail-checkbox">
					</td>
					<td class="inbox-small-cells"><i class="fa fa-star"></i></td>
					<td class="view-message dont-show">Google Webmaster </td>
					<td class="view-message">Improve the search presence of WebSite</td>
					<td class="view-message inbox-small-cells"></td>
					<td class="view-message text-right">March 15</td>
				</tr>
				  <tr class="">
					  <td class="inbox-small-cells">
						  <input type="checkbox" class="mail-checkbox">
					  </td>
					  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
					  <td class="view-message dont-show">Tim Reid, S P N</td>
					  <td class="view-message">Boost Your Website Traffic</td>
					  <td class="view-message inbox-small-cells"></td>
					  <td class="view-message text-right">April 01</td>
				  </tr>
				  -->
				</tbody>
		  </table>
	  </div>
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
						
						
						<router-link v-bind:to="{ name: 'Home' }" class="btn btn-xs btn-default pull-right">
							<i class="fa fa-times"></i> 
						</router-link>
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
							
							<a :href="attachment.path_short" download="" class="list-group-item " v-for="attachment, index) in (mail.attachments)">
								{{ attachment.name.slice(0,25) }} - 
								<b>Clic para descargar</b>
							</a>
							
						</ul>
					</div>
				</div>
				<div v-else=""></div>
				<div class="clearfix"></div>
			</template>
			
			
			<div class="view-mail">
				<template v-if="mail.message !== undefined">
					<template v-if="mail.isHtml == true">
						<div style="border: #666 0.25px dashed; zoom:0.8;padding:24px;">
							<!-- // <div v-html="mail.message"></div> -->
							<iframe frameborder="0" width="100%" style="height:auto;min-height:calc(100vh)" :src="$root.urlBodyEmail" :key="mail.id"></iframe>
						</div>
					</template>
					<template v-else>
						<div style="border: #666 0.25px dashed; zoom:0.8;padding:24px;">
							<pre v-html="mail.message"></pre>
							<!-- // <iframe frameborder="0" width="100%" style="height:auto;min-height:calc(50vh)" :src="$root.urlBodyEmail" :key="mail.id"></iframe> -->
						</div>
					</template>
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

var Compose = Vue.extend({
	template: '#compose-edit',
	data() {
		return {
			mail_id: this.$route.params.mail_id
		};
	},
	mounted() {
		var self = this;
		if(self.mail_id == null || self.mail_id == 0){
			console.log('no hay email.');
		}
	},
	created() {
		
	},
	methods: {
		
	}
});

var router = new VueRouter({
	routes:[
		{ path: '/', component: Home, name: 'Home' },
		{ path: '/:box_id/compose', component: Compose, name: 'Compose', params: { mail_id: null } },
		{ path: '/:box_id/compose/:mail_id', component: Compose, name: 'Edit' },
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