<div class="page-title">
	<div class="title_left">
		<h3><?= isset($title) ? $title : ""; ?> <small> <?= isset($subtitle) ? $subtitle : ""; ?></small></h3>
	</div>
</div>
<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?= isset($subtitle) ? $subtitle : ""; ?> <small> <?= isset($title) ? $title : ""; ?></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content table-responsive">
				<table class="table">
					<thead>
						<?php 
							foreach($headers as $list){
								if(is_array($list)){
									echo "<tr>";
										foreach($list as $item){ echo "<th>{$item['label']}</th>"; }
									echo "</tr>";
								}else{ echo "<tr>{$list}</tr>"; }
							}
						?>
					</thead>
					<tbody class="table-responsive">
						<?php 
							foreach($data as $row){
								$row = is_array($row) ? (object) $row : $row;
								foreach($headers as $list){
									echo "<tr>";
										if(is_array($list)){
											foreach($list as $item){
												echo "<td>{$row->{$item['key']}}</td>";
											}
										}
									echo "</tr>";
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Stripped table <small>Stripped table subtitle</small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content table-responsive">
			<table class="table table-striped">
					<thead>
						<?php 
							foreach($headers as $list){
								if(is_array($list)){
									echo "<tr>";
										foreach($list as $item){ echo "<th>{$item['label']}</th>"; }
									echo "</tr>";
								}else{ echo "<tr>{$list}</tr>"; }
							}
						?>
					</thead>
					<tbody>
						<?php 
							foreach($data as $row){
								$row = is_array($row) ? (object) $row : $row;
								foreach($headers as $list){
									echo "<tr>";
										if(is_array($list)){
											foreach($list as $item){
												echo "<td>{$row->{$item['key']}}</td>";
											}
										}
									echo "</tr>";
								}
							}
						?>
					</tbody>
			</table>
		</div>
	</div>
</div>
<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Hover rows <small>Try hovering over the rows</small></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content table-responsive">
			<table class="table table-hover table-hovered">
					<thead>
						<?php 
							foreach($headers as $list){
								if(is_array($list)){
									echo "<tr>";
										foreach($list as $item){ echo "<th>{$item['label']}</th>"; }
									echo "</tr>";
								}else{ echo "<tr>{$list}</tr>"; }
							}
						?>
					</thead>
					<tbody>
						<?php 
							foreach($data as $row){
								$row = is_array($row) ? (object) $row : $row;
								foreach($headers as $list){
									echo "<tr>";
										if(is_array($list)){
											foreach($list as $item){
												echo "<td>{$row->{$item['key']}}</td>";
											}
										}
									echo "</tr>";
								}
							}
						?>
					</tbody>
			</table>
		</div>
	</div>
</div>


  <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
		<h2>Bordered table <small>Bordered table subtitle</small></h2>
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content table-responsive">

		<table class="table table-bordered">
					<thead>
						<?php 
							foreach($headers as $list){
								if(is_array($list)){
									echo "<tr>";
										foreach($list as $item){ echo "<th>{$item['label']}</th>"; }
									echo "</tr>";
								}else{ echo "<tr>{$list}</tr>"; }
							}
						?>
					</thead>
					<tbody>
						<?php 
							foreach($data as $row){
								$row = is_array($row) ? (object) $row : $row;
								foreach($headers as $list){
									echo "<tr>";
										if(is_array($list)){
											foreach($list as $item){
												echo "<td>{$row->{$item['key']}}</td>";
											}
										}
									echo "</tr>";
								}
							}
						?>
					</tbody>
		</table>

	  </div>
	</div>
  </div>

  <div class="clearfix"></div>

  <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
		<h2>Table design <small>Custom design</small></h2>
		<ul class="nav navbar-right panel_toolbox">
		  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		  </li>
		  <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
			<ul class="dropdown-menu" role="menu">
			  <li><a href="#">Settings 1</a>
			  </li>
			  <li><a href="#">Settings 2</a>
			  </li>
			</ul>
		  </li>
		  <li><a class="close-link"><i class="fa fa-close"></i></a>
		  </li>
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
				  <input type="checkbox" id="check-all" class="flat">
				</th>
				<th class="column-title">Invoice </th>
				<th class="column-title">Invoice Date </th>
				<th class="column-title">Order </th>
				<th class="column-title">Bill to Name </th>
				<th class="column-title">Status </th>
				<th class="column-title">Amount </th>
				<th class="column-title no-link last"><span class="nobr">Action</span>
				</th>
				<th class="bulk-actions" colspan="7">
				  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
				</th>
			  </tr>
			</thead>

			<tbody>
			  <tr class="even pointer">
				<td class="a-center ">
				  <input type="checkbox" class="flat" name="table_records">
				</td>
				<td class=" ">121000040</td>
				<td class=" ">May 23, 2014 11:47:56 PM </td>
				<td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
				<td class=" ">John Blank L</td>
				<td class=" ">Paid</td>
				<td class="a-right a-right ">$7.45</td>
				<td class=" last"><a href="#">View</a>
				</td>
			  </tr>
			  <tr class="odd pointer">
				<td class="a-center ">
				  <input type="checkbox" class="flat" name="table_records">
				</td>
				<td class=" ">121000039</td>
				<td class=" ">May 23, 2014 11:30:12 PM</td>
				<td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
				</td>
				<td class=" ">John Blank L</td>
				<td class=" ">Paid</td>
				<td class="a-right a-right ">$741.20</td>
				<td class=" last"><a href="#">View</a>
				</td>
			  </tr>
			  <tr class="even pointer">
				<td class="a-center ">
				  <input type="checkbox" class="flat" name="table_records">
				</td>
				<td class=" ">121000038</td>
				<td class=" ">May 24, 2014 10:55:33 PM</td>
				<td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i>
				</td>
				<td class=" ">Mike Smith</td>
				<td class=" ">Paid</td>
				<td class="a-right a-right ">$432.26</td>
				<td class=" last"><a href="#">View</a>
				</td>
			  </tr>
			  <tr class="odd pointer">
				<td class="a-center ">
				  <input type="checkbox" class="flat" name="table_records">
				</td>
				<td class=" ">121000037</td>
				<td class=" ">May 24, 2014 10:52:44 PM</td>
				<td class=" ">121000204</td>
				<td class=" ">Mike Smith</td>
				<td class=" ">Paid</td>
				<td class="a-right a-right ">$333.21</td>
				<td class=" last"><a href="#">View</a>
				</td>
			  </tr>
			  <tr class="even pointer">
				<td class="a-center ">
				  <input type="checkbox" class="flat" name="table_records">
				</td>
				<td class=" ">121000040</td>
				<td class=" ">May 24, 2014 11:47:56 PM </td>
				<td class=" ">121000210</td>
				<td class=" ">John Blank L</td>
				<td class=" ">Paid</td>
				<td class="a-right a-right ">$7.45</td>
				<td class=" last"><a href="#">View</a>
				</td>
			  </tr>
			  <tr class="odd pointer">
				<td class="a-center ">
				  <input type="checkbox" class="flat" name="table_records">
				</td>
				<td class=" ">121000039</td>
				<td class=" ">May 26, 2014 11:30:12 PM</td>
				<td class=" ">121000208 <i class="error fa fa-long-arrow-down"></i>
				</td>
				<td class=" ">John Blank L</td>
				<td class=" ">Paid</td>
				<td class="a-right a-right ">$741.20</td>
				<td class=" last"><a href="#">View</a>
				</td>
			  </tr>
			  <tr class="even pointer">
				<td class="a-center ">
				  <input type="checkbox" class="flat" name="table_records">
				</td>
				<td class=" ">121000038</td>
				<td class=" ">May 26, 2014 10:55:33 PM</td>
				<td class=" ">121000203</td>
				<td class=" ">Mike Smith</td>
				<td class=" ">Paid</td>
				<td class="a-right a-right ">$432.26</td>
				<td class=" last"><a href="#">View</a>
				</td>
			  </tr>
			  <tr class="odd pointer">
				<td class="a-center ">
				  <input type="checkbox" class="flat" name="table_records">
				</td>
				<td class=" ">121000037</td>
				<td class=" ">May 26, 2014 10:52:44 PM</td>
				<td class=" ">121000204</td>
				<td class=" ">Mike Smith</td>
				<td class=" ">Paid</td>
				<td class="a-right a-right ">$333.21</td>
				<td class=" last"><a href="#">View</a>
				</td>
			  </tr>

			  <tr class="even pointer">
				<td class="a-center ">
				  <input type="checkbox" class="flat" name="table_records">
				</td>
				<td class=" ">121000040</td>
				<td class=" ">May 27, 2014 11:47:56 PM </td>
				<td class=" ">121000210</td>
				<td class=" ">John Blank L</td>
				<td class=" ">Paid</td>
				<td class="a-right a-right ">$7.45</td>
				<td class=" last"><a href="#">View</a>
				</td>
			  </tr>
			  <tr class="odd pointer">
				<td class="a-center ">
				  <input type="checkbox" class="flat" name="table_records">
				</td>
				<td class=" ">121000039</td>
				<td class=" ">May 28, 2014 11:30:12 PM</td>
				<td class=" ">121000208</td>
				<td class=" ">John Blank L</td>
				<td class=" ">Paid</td>
				<td class="a-right a-right ">$741.20</td>
				<td class=" last"><a href="#">View</a>
				</td>
			  </tr>
			</tbody>
		  </table>
		</div>
				
			
	  </div>
	</div>
  </div>
</div>