	<div class="contentWrapper contentWrapperDetail transitionAll">
		<div class="contentInner">
			<div class="inspectionsWrapper" id="inspection_wrapper">
				<div class="inspectionsWrapperInner transitionAll">
					<div class="container containerBorder containerSplit30 containerSplitLeft transitionAll containerDemographics">
						<div class="containerInner inspectionMapWrapperInner transitionAll">
							<div class="detailsInfoWrapper">
								<div class="restaurantName"><?php echo $restr;?></div>
								<div class="restaurantInfo mapWrapper">
									<div class="mapHolder detailMap transitionAll">
										<div class="theMapUnit" id="the_map_unit"></div>
										<div class="mapCover"></div>
									</div>
								</div>
								<div class="restaurantInfo restaurantAddress" data-lat="<?php echo $thislat;?>" data-lng="<?php echo $thislng;?>">
									<div class="restaurantInfoLabel">Address</div><div class="restaurantInfoData"><?php echo $addr;?></div>
									<div class="clearAll"></div>
								</div>
								<div class="restaurantInfo restaurantInfoOdd"><div class="restaurantInfoLabel">					
								<?php if ($county == 'philly')
										echo 'Neighborhood';
									else
										echo 'City';
								?>
								</div><div class="restaurantInfoData">
								
								<?php 
									echo '<a href="'.$ourDomain.'inspections/';
									//if ($county != 'philly'){
										echo $county.'/';
									//}
									echo "?searchType=neighborhood&nname=";
									echo ucwords(strtolower($neighb)).'">'.$neighb.'</a>';
								?>
								</div>
									<div class="clearAll"></div>
								</div>

								<div class="restaurantInfo restaurantInfoOdd" <?php if ($county != 'philly')echo 'style="display:none"';?>><div class="restaurantInfoLabel">

								
								<?php
				
									if ($county == 'philly')
										echo 'Establishment type';
									else
										echo '';
								?>

								</div><div class="restaurantInfoData"><?php echo $eType;?></div>
									<div class="clearAll"></div>
								</div>
								<div class="restaurantInfo"><div class="restaurantInfoLabel">Number of inspections</div><div class="restaurantInfoData"><?php echo $numRows;?></div>
									<div class="clearAll"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="container containerBorder containerSplit70 containerSplitRight transitionAll containerViolations">
						<div class="containerInner inspectionListWrapperInner <?php if ($numRows == 1) echo 'inspectionListDetailWrapperSingle'; else  echo 'inspectionListDetailWrapperMultiple'; ?>">
							<?php echo $inspections; ?>
						</div>
					</div>
					<div class="clearLeft"></div><div class="container containerBorder containerSplit30 containerSplitLeft transitionAll containerAverages">
						<div class="containerInner inspectionMapWrapperInner transitionAll">
							<div class="detailsInfoWrapper">
								<div class="locationName">Average Violations in 
								<?php 
									echo '<a href="'.$ourDomain.'inspections/';
									//if ($county != 'philly'){
										echo $county.'/';
									//}
									echo "?searchType=neighborhood&nname=";
									echo ucwords(strtolower($neighb)).'">'.$neighb.'</a> since '.$earliestYear;
								?>


								</div>
								<div class="restaurantInfo"><div class="restaurantInfoLabel">Number of Inspections</div><div class="restaurantInfoData">
								<?php echo number_format($numInsp,0,'',','); ?></div>
									<div class="clearAll"></div>
								</div>
								<div class="restaurantInfo restaurantInfoOdd"><div class="restaurantInfoLabel">Average Violations</div><div class="restaurantInfoData"><?php echo number_format($avgVio,1,'.',','); ?></div>
									<div class="clearAll"></div>
								</div>
								<div class="restaurantInfo"><div class="restaurantInfoLabel labelWidth">Average Foodborne Illness Risk Factor Violations</div><div class="restaurantInfoData"><?php echo number_format($avgFBI,1,'.',','); ?></div>
									<div class="clearAll"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearLeft"></div>
					
					<div class="container containerBorder containerSplit30 containerSplitLeft transitionAll containerExplainer">
						<div class="containerInner transitionAll">
							<?php include '../includes/how_to_interpret.php' ?>
							
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
		jQuery(document).ready(function() {
			restaurant_inspections.detail.init(<?php if ($neighb != '') echo 'true'; else echo 'false'; echo ",'$county'";?>);	
			//restaurant_inspections.general.scroll('inspection_wrapper');
		});
	</script>