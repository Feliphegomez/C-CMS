<?php 
$filelist = dirToArray(PUBLIC_PATH . '/reports-photographics');
$hidenames = (isset($_GET['hidenames']) &&  $_GET['hidenames'] == true) ? true : false;
?>

<style> 
.tree {
    min-height:20px;
    padding:19px;
    margin-bottom:20px;
    background-color:#fbfbfb;
    border:1px solid #999;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -moz-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05)
}
.tree li {
    list-style-type:none;
    margin:0;
    padding:10px 5px 0 5px;
    position:relative
}
.tree li::before, .tree li::after {
    content:'';
    left:-20px;
    position:absolute;
    right:auto
}
.tree li::before {
    border-left:1px solid #999;
    bottom:50px;
    height:100%;
    top:0;
    width:1px
}
.tree li::after {
    border-top:1px solid #999;
    height:20px;
    top:25px;
    width:25px
}
.tree li span:not(.glyphicon) {
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border-radius:5px;
    display:inline-block;
    padding:4px 9px;
    text-decoration:none
}
.tree li.parent_li>span:not(.glyphicon) {
    cursor:pointer
}
.tree>ul>li::before, .tree>ul>li::after {
    border:0
}
.tree li:last-child::before {
    height:30px
}
.tree li.parent_li>span:not(.glyphicon):hover, .tree li.parent_li>span:not(.glyphicon):hover+ul li span:not(.glyphicon) {
    background:#eee;
    border:1px solid #999;
    padding:3px 8px;
    color:#000
}
</style>

<div id="test" class="tree">
    <ul>
		<?php 
		foreach($filelist as $year=>$period){
			echo "<li>";
				echo "<a>{$year}</a>";
					echo "<ul>";
						$continue1 = (is_array($period)) ? true : false;
						if($continue1 == true){
							foreach($period as $period_name=>$group){
								echo "<li>";
									echo "<a>{$period_name}</a>";
										echo "<ul>";
											$continue2 = (is_array($group)) ? true : false;
											if($continue2 == true){
												foreach($group as $group_name=>$microroute){
													echo "<li>";
														echo "<a>{$group_name}</a>";
															echo "<ul>";
																$continue3 = (is_array($microroute)) ? true : false;
																if($continue3 == true){
																	foreach($microroute as $microroute_name=>$type){
																		echo "<li>";
																			echo "<a>{$microroute_name}</a>";
																				echo "<ul>";
																					$continue4 = (is_array($type)) ? true : false;
																					if($continue4 == true){
																						foreach($type as $type_name=>$status){
																							echo "<li>";
																								echo "<a>{$type_name}</a>";
																								echo "<ul>";
																									$continue5 = (is_array($status)) ? true : false;
																									if($continue5 == true){
																										foreach($status as $status_name=>$photos){
																											echo "<li>";
																												echo "<a>{$status_name}</a>";
																												echo "<ul>";
																													$continue6 = (is_array($photos)) ? true : false;
																													if($continue6 == true){
																														$photos_total = 0;;
																														foreach($photos as $indexPhoto=>$photo){
																															$continue7 = (!is_array($photo) && is_string($photo)) ? true : false;
																															if($continue7 == true){
																																$photos_total++;
																																if($hidenames === false){
																																	echo "<li><a data-style-active=\"text\" style=\"cursor:pointer;\" class=\"linkToImg\" data-file_name=\"{$photo}\" data-path_short=\"/public/reports-photographics/{$year}/{$period_name}/{$group_name}/{$microroute_name}/{$type_name}/{$status_name}/{$photo}\">{$photo}</a></li>";
																																	# echo "<li><a><img src=\"/public/reports-photographics/{$year}/{$period_name}/{$group_name}/{$microroute_name}/{$type_name}/{$status_name}/{$photo}\" /></a></li>";
																																}
																															}
																														}
																														
																														if($hidenames === true){
																															echo "<li><a>" . ($photos_total) . "</a></li>";
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
		}
		?>
	</ul>
</div>


<script>

$(".linkToImg").click(function(a){
	console.log('Click');
	TextThis = $(this).data('file_name');
	path_shortThis = $(this).data('path_short');
	styleActive = $(this).data('style-active');
	console.log(styleActive);
	
	if(styleActive == 'text'){
		$(this).data('style-active', 'image');
		$img = $('<img />');
		$img.attr('width', '225px');
		$img.attr('class', 'img img-responsive');
		$img.data('file_name', TextThis);
		$img.attr('src', path_shortThis);
		$(this).html($img);
	} else {
		$(this).data('style-active', 'text');
		$(this).html(TextThis);
	}
	/**/
});

</script>