<div class="contentWrapper contentWrapperDetail contentWrapperSearch transitionAll">
		<div class="contentInner">
			<div class="inspectionsWrapper" id="inspection_wrapper">
				<div class="inspectionsWrapperInner">
					<div class="container containerBorder inspectionTypeToggle">
						<div class="inspectionTypeText">View Option:</div>
						<div class="buttonItem inspectionType inspectionTypeGlobe"><i class="fa fa-globe"></i></div>
						<div class="buttonItem inspectionType inspectionTypeList inspectionTypeActive"><i class="fa fa-list-ol"></i></div>
						<div class="clearAll"></div>
					</div>
					<div class="container containerBorder containerSplit40 containerSplitLeft inspectionMapWrapper inspectionMapWrapperHidden containerDemographics transitionAll">
						<div class="containerInner transitionAll">
							<div class="mapWrapper mapSearchWrapper">
								<div class="mapHolder mapHolderSearch transitionAll">
									<div class="theMapUnit" id="the_map_unit" data-area="<?php if ($_GET['searchType'] == 'neighborhood' && $county == 'philly') echo $title;?>" data-bounds="<?php if ($_GET['searchType'] == 'neighborhood' && $county == 'philly') echo 'neighborhood';?>"></div>
								</div>
							</div>
							<div class="mapOptions">
								
							</div>
						</div>
						<!-- {% if total|add:0 > 1 and avg_count > -1 %}<div class="containerInner transitionAll containerAverages">
							<div class="averagesWrapper">
								<div class="averagesInner">
									<div class="averageTitle"><span>{% load humanize %}{{avg_count|intcomma}}</span> Inspections since {% if county == 'Philly' %}2009{% elif county == 'Bucks' %}2012{% endif %}</div>
									<div class="averagesLine averagesLineTotal">
										<div class="averageType">Average Violations</div>
										<div class="averageData">{{avg_total|floatformat:1}}</div>
										<div class="clearAll"></div>
									</div>
									<div class="averagesLine averagesLineFoodborne">
										<div class="averageType">Average Foodborne Illness Risk Factor Violations</div>
										<div class="averageData">{{avg_serious|floatformat:1}}</div>
										<div class="clearAll"></div>
									</div>
								</div>
							</div>
						</div>{% endif %} -->
						<div class="containerExplainer">
							<div class="containerInner transitionAll containerAverages">
								<div class="averagesWrapper">
									<div class="averagesInner ">
										<?php include '../includes/how_to_interpret.php' ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="container containerSplit60 containerSplitRight inspectionListWrapper transitionAll">
						<div class="containerInner containerBorder">
							<div class="containerTitle containerTitleIndex containerTitleSearch">
								<div class="containerTitleText"><?php echo $title;?></div>
								<div class="sortTitle">
									<div class="sortCount">
										<span>Establishments Found:</span> <?php echo number_format($totalRows,0,'',',');?> | 
									</div>
									<div class="sortOptions" <?php if($totalRows == 0) echo 'style="display:none"';?>>
										<span>Sort by:</span>
										<select id="inspection_list_sort_by" class="transitionAll" onchange="window.location.href='<?php echo $ourDomain.'inspections/';  echo $county.'/';echo '?'.$sortSelectStr.'inspection_list_order=';?>'+this.value" name="inspection_list_order">
											<option value="1" <?php if (isset($_GET['inspection_list_sort_by']) && $_GET['inspection_list_sort_by'] == 1) echo 'selected';?>>Latest Date</option>
											<option value="2" <?php if (isset($_GET['inspection_list_sort_by']) && $_GET['inspection_list_sort_by'] == 2) echo 'selected';?>>Earliest Date</option>
											<option value="3" <?php if (isset($_GET['inspection_list_sort_by']) && $_GET['inspection_list_sort_by'] == 3) echo 'selected';?>>Name Z-A</option>
											<option value="4" <?php if ((isset($_GET['inspection_list_sort_by']) && $_GET['inspection_list_sort_by'] == 4) || isset($_GET['inspection_list_sort_by']) === false) echo 'selected';?>>Name A-Z</option>
										</select>
									</div>


									<div class="clearAll"></div>
								</div>
								<div class="clearAll"></div>
							</div>
							<?php 
							$rCount = $start+1;
							for ($c=0;$c<$numRows;$c++){

								$iu = 'inspectionUnitEven';
								$ai = 'inspectionActionInfoItemEven';
								if ($c % 2 != 0){
									$iu = 'inspectionUnitOdd';
									$ai = 'inspectionActionInfoItemOdd';
								}
								echo '<div class="inspectionUnit '.$iu.' transitionBackground" id="inspection_unit_'.$c.'">';
								echo "<a href=\"".$ourDomain.'inspections/';
								//if ($county != 'philly')
										echo $county.'/';
								if ($county == 'philly')
									echo "?detail=".rawurlencode($rsts[$c]['facility'])."|".rawurlencode($rsts[$c]['address'])."\">";
								if ($county != 'philly')
									echo "?detail=".rawurlencode($rsts[$c]['facility_num'])."\">";
							
									echo '<div class="inspectionUnitInner">';
										echo '<div class="inspectionUnitNumber">'. $rCount .'</div>';
										echo '<div class="inspectionUnitDataWrapper">';
											echo '<div class="inspectionNameWrapper">';
												echo '<div class="inspectionUnitName transitionAll">'.$rsts[$c]['facility'].'</div>';
												echo '<div class="inspectionUnitDate"><span class="inspectionUnitDateTitle">Inspection date:</span> '.wordyDate($rsts[$c]['date']).'</div>';
												echo '<div class="clearAll"></div>';
											echo '</div>';
											echo '<div class="inspectionUnitInfoWrapper">';
												echo '<div class="inspectionUnitAddress" data-lat="'.$rsts[$c]['lat'].'" data-lng="'.$rsts[$c]['lng'].'" data-neighborhood="'.$rsts[$c]['neighborhood'].'">'.$rsts[$c]['address'].'</div>';
												echo '<div class="inspectionUnitNeigborhood">'.$rsts[$c]['neighborhood'].'</div>';
												echo '<div class="clearAll"></div>';
											echo '</div>';
											echo '<div class="inspectionUnitCountWrapper">';
												echo '<span class="inspectionCountLabel">Violations</span>';
												echo '<li class="inspectionUnitCount ';
												if ($rsts[$c]['serious_count'] == 0) echo 'inspectionUnitCountZero';
												else 
													echo 'inspectionUnitCountFoodborne';
												echo ' inspectionUnitCountFirst"><span class="inspectionCountNumber">'.$rsts[$c]['serious_count'].'</span><span class="inspectionUnitInfoItemTitle"><span class="inspectionUnitInfoItemTitleLabel">Foodborne Illness Risk Factors</span></li>';
												echo '<li class="inspectionUnitCount ';
												if ($rsts[$c]['not_serious_count'] == 0)
													echo 'inspectionUnitCountZero';
												else
													echo 'inspectionUnitCountRetail';
												echo '"><span class="inspectionCountNumber">'.$rsts[$c]['not_serious_count'].'</span><span class="inspectionUnitInfoItemTitle"><span class="inspectionUnitInfoItemTitleLabel">Lack of Good Retail Practices</span></li>';
												echo '<div class="clearAll"></div>';
											echo '</div>';
											echo '<div class="clearAll"></div>';
										echo '</div>';
										echo '<div class="clearAll"></div>';
									echo '</div>';
								echo '</a></div>';
								$rCount++;
							}

							?>

							
							<div class="inspectionListMoreWrapper">
								<div class="inspectionListMoreWrapperInner">
									<div class="inspectionListSortOptions <?php if ($totalRows > 50) echo ' inspectionListSortOptionsMore';?>" <?php if($totalRows == 0) echo 'style="display:none"';?>>
										<span>Sort by:</span>
										<select id="inspection_list_sort_by" class="transitionAll" onchange="window.location.href='<?php echo $ourDomain.'inspections/'; echo $county.'/';echo '?'.$sortSelectStr.'inspection_list_order=';?>'+this.value" name="inspection_list_order">
											<option value="1" <?php if (isset($_GET['inspection_list_sort_by']) && $_GET['inspection_list_sort_by'] == 1) echo 'selected';?>>Latest Date</option>
											<option value="2" <?php if (isset($_GET['inspection_list_sort_by']) && $_GET['inspection_list_sort_by'] == 2) echo 'selected';?>>Earliest Date</option>
											<option value="3" <?php if (isset($_GET['inspection_list_sort_by']) && $_GET['inspection_list_sort_by'] == 3) echo 'selected';?>>Name Z-A</option>
											<option value="4" <?php if ((isset($_GET['inspection_list_sort_by']) && $_GET['inspection_list_sort_by'] == 4) || isset($_GET['inspection_list_sort_by']) === false) echo 'selected';?>>Name A-Z</option>
										</select>
									</div>



									<?php

									$total = ceil(((int)$totalRows/50));
									if ($totalRows > 50){
										echo '<div class="inspectionListItemWrapper">';
											echo '<div class="inspectionListItemWrapperInner">';
												//{% if start|divide_by_number:25 != 0 %}
												if ($start/50 != 0){ // if this isn't the first page of results
														echo '<div class="inspectionListMoreItem inspectionListMoreItemArrow buttonItem transitionAll"><a href="';
														echo $siteURL;
														//if ($county != 'philly')
															echo $county.'/';
														echo '?'.$getStr;
														echo 'start='.($start-50).'&end='.$start;
														echo '"><div class="transitionAll">&larr;</div></a></div>';
												}


												//{% for i in total|get_range:start %}
												for ($i=0;$i<$total;$i++){
													echo '<div class="inspectionListMoreItem buttonItem transitionAll ';
													//{% if start|divide_by_number:25|add:1 == i|add:1 %} 
													if (($start/50)+1 == $i+1)
														echo 'inspectionListMoreItemActive';
													

													//{% if start|divide_by_number:25 == total|get_range:start|last and forloop.counter0 == total|get_range:start|length|add:-1 %} 
													if ($start/50 == $total) 
														echo 'inspectionListMoreItemLast';

													echo '"><a href="'.$siteURL;
													//if ($county != 'philly')
															echo $county.'/';
													echo '?'.$getStr.'start='.((int)$i*50).'&end='.(((int)$i+1)*50).'"><div class="transitionAll">'.((int)$i+1).'</div></a> </div>';

													
												}
												//{% endfor %}





												//{% if start|divide_by_number:25 != total|get_range:start|last %}
												if ($end/50 < $total){
												echo '<div class="inspectionListMoreItem inspectionListMoreItemArrow inspectionListMoreItemLast ';
												if ($start == 0)
													echo 'inspectionListMoreItemLastBorder';
												echo ' buttonItem transitionAll"><a href="'.$siteURL;
												//if ($county != 'philly')
														echo $county.'/';
												echo '?'.$getStr.'start='.((int)$start+50).'&end='.((int)$start+100).'"><div class="transitionAll">&rarr;</div></a></div>';

												}


												echo '<div class="clearAll"></div>';
											echo '</div>';
											echo '<div class="inspectionListMoreTitle">';
												echo 'Page '.(((int)$start/50)+1).' of '.$total;
											echo '</div>';
										echo '</div>';
									}
									?>



									<div class="clearAll"></div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="sitePreloader" id="site_preloader">
						<div class="spinnerWrapper">
							<img src="http://data.inquirer.com/open_data/inspections/media/images/preloader.gif" />
						</div>
					</div>
					<div class="clearAll"></div>		
				</div>
			</div>
		</div>
	</div>
		<script type="text/javascript">
		var _start = <?php echo $start;?>;
		var _county = '<?php echo $county;?>';
		jQuery(document).ready(function() {
			restaurant_inspections.search.init(_county);
		});
	</script>