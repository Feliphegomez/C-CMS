<?php 
$filelist = dirToArray(PUBLIC_PATH . '/reports-photographics');

$shownames = (isset($_GET['shownames']) &&  $_GET['shownames'] == true) ? true : false;
?>

<style>
/*Now the CSS Created by R.S*/
* {margin: 0; padding: 0;}

.tree ul {
    padding-top: 20px; position: relative;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree li {
	float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li a{
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	display: inline-block;
	
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}

/*Thats all. I hope you enjoyed it.
Thanks :)*/
</style>

		<?php 
		foreach($filelist as $year=>$period){
			echo "<div class=\"tree\">";
				echo "<ul>";
					echo "<li>";
						echo "<a href=\"#\">{$year}</a>";
							echo "<ul>";
								$continue1 = (is_array($period)) ? true : false;
								if($continue1 == true){
									foreach($period as $period_name=>$group){
										echo "<li>";
											echo "<a href=\"#\">{$period_name}</a>";
												echo "<ul>";
													$continue2 = (is_array($group)) ? true : false;
													if($continue2 == true){
														foreach($group as $group_name=>$microroute){
															echo "<li>";
																echo "<a href=\"#\">{$group_name}</a>";
																	echo "<ul>";
																		$continue3 = (is_array($microroute)) ? true : false;
																		if($continue3 == true){
																			foreach($microroute as $microroute_name=>$type){
																				echo "<li>";
																					echo "<a href=\"#\">{$microroute_name}</a>";
																						echo "<ul>";
																							$continue4 = (is_array($type)) ? true : false;
																							if($continue4 == true){
																								foreach($type as $type_name=>$status){
																									echo "<li>";
																										echo "<a href=\"#\">{$type_name}</a>";
																										echo "<ul>";
																											$continue5 = (is_array($status)) ? true : false;
																											if($continue5 == true){
																												foreach($status as $status_name=>$photos){
																													echo "<li>";
																														echo "<a href=\"#\">{$status_name}</a>";
																														echo "<ul>";
																															$continue6 = (is_array($photos)) ? true : false;
																															if($continue6 == true){
																																$photos_total = 0;;
																																foreach($photos as $indexPhoto=>$photo){
																																	$continue7 = (!is_array($photo) && is_string($photo)) ? true : false;
																																	if($continue7 == true){
																																		$photos_total++;
																																		if($shownames === true){
																																			echo "<li><a href=\"#\">" . ($photo) . "</a></li>";	
																																		}
																																	}
																																}
																																
																																if($shownames === false){
																																	echo "<li><a href=\"#\">" . ($photos_total) . "</a></li>";
																																}
																															}
																														echo "</ul>";
																													echo "</li>";
																												}
																											}
																										echo "</ul>";
																									echo "</li>";
																								}
																							}
																					echo "</ul>";
																				echo "</li>";
																			}
																		}
																echo "</ul>";
															echo "</li>";
														}
													}
											echo "</ul>";
										echo "</li>";
									}
								}
						echo "</ul>";
					echo "</li>";
				echo "</ul>";
			echo "</div>";
		}
		?>
	</ul>
</div>