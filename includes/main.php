
	<div class="contentWrapper contentWrapperWhite transitionAll">
		<div class="container">
			<div class="headerImage transitionAll"></div>
			<div class="searchHeaderWrapper transitionAll">
				<div class="searchHeaderTitle transitionAll">
					Clean Plates
					<?php
						if ($county == 'philly')
							echo ': Philadelphia';
						if ($county == 'bucks')
							echo ': Bucks County';
						if ($county == 'gloucester')
							echo ': Gloucester County';
					?>


					<span>Restaurant Inspections</span>
				</div>
				<div class="formWrapper transitionAll">
					<div class="buttonItem formButton formButtonCounty transitionAll" id="form_button_county">
						
					</div>
					<div class="formInput transitionAll">
						<span class="searchIcon">
							<i class="fa fa-search"></i>
						</span>
						<input class="transitionAll searchInput" id="search_input" value="Search by restaurant name" />
					</div>
					<div class="buttonItem formButton formSubmit transitionAll" id="form_button_submit">
						<span class="transitionAll">Search</span>
					</div>
					<div class="clearAll"></div>
				</div>
			</div>
		</div>
		<div class="container containerMaxWidth">
			<div class="container establishmentWrapper" <?php if ($county != 'philly') echo 'style="display:none"';?>>
				<div class="establishmentTitleWrapper">
					<div class="establishmentButtonWrapper">
						<div class="buttonItem transitionAll rotatorButton rotatorButtonPrev" id="rotator_prev"><i class="fa fa-chevron-left"></i></div>
						<div class="buttonItem transitionAll rotatorButton rotatorButtonNext" id="rotator_next"><i class="fa fa-chevron-right"></i></div>
						<div class="clearAll"></div>
					</div>
					<div class="establishmentTitleText">
						Explore popular places and celebrity chefs in Philadelphia
					</div>
					<div class="clearAll"></div>
				</div>
				<div class="establishmentHolder">
					<div class="establishmentInner transitionAll owl-carousel" id="establishment_holder" data-counter='0'>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=reading_terminal"><img src="//media.inquirer.com/images/300*281/RTMinside.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=reading_terminal">Reading Terminal Market</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=stadiums"><img src="//media.inquirer.com/images/300*281/clean_plates_CBP.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=stadiums">Sports Stadiums</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=airport"><img src="//media.inquirer.com/images/300*281/PHLterminal.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=airport">Philadelphia Int'l Airport</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=hospitals"><img src="//media.inquirer.com/images/300*281/CHOP2.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=hospitals">Hospitals</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=schools"><img src="//media.inquirer.com/images/300*281/eisenhowerCAFE.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=schools">Schools</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=food_trucks"><img src="//media.inquirer.com/images/300*281/foodtruck.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=food_trucks">Food Trucks</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=jose_garces"><img src="//media.inquirer.com/images/300*281/GARCES.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=jose_garces">Jose Garces</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=stephen_starr"><img src="//media.inquirer.com/images/300*281/STARR.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=stephen_starr">Stephen Starr</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=marc_vetri"><img src="//media.inquirer.com/images/300*281/VETRI.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=marc_vetri">Marc Vetri</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=safran__turney"><img src="//media.inquirer.com/images/300*281/TURNEY.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=safran__turney">Safran & Turney</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=michael_solomonov"><img src="//media.inquirer.com/images/300*281/SOLOMONOV.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=michael_solomonov">Michael Solomonov</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=audrey-claire_taichman"><img src="//media.inquirer.com/images/300*281/Taichman.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=audrey-claire_taichman">Audrey-Claire Taichman</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=bobby_flay"><img src="//media.inquirer.com/images/300*281/FLAY1.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=bobby_flay">Bobby Flay</a>
							</div>
						</div>
						<div class="rotatorUnit noSwipe">
							<div class="rotatorImage">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=masaharu_morimoto"><img src="//media.inquirer.com/images/300*281/MORIMOTO.jpg" /></a>
							</div>
							<div class="rotatorTitle">
								<a href="<?php echo $ourDomain.'inspections/';?>philly/?searchType=chefs&chef=masaharu_morimoto">Masaharu Morimoto</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mostRecentWrapper" <?php if ($county != 'philly') echo 'style="margin-top:40px"';?>>
				<div class="containerTitle containerTitleIndex">
					<span class="containerTitleText">Most Recent Inspections:</span>
					<a href="<?php echo $ourDomain.'inspections/';?>philly/" class="buttonItem recentButtonOption recentButtonOptionPhilly <?php if ($county == 'philly') echo 'recentButtonOptionActive';?> transitionAll" data-value="philly">Philadelphia</a>
					<a href="<?php echo $ourDomain.'inspections/';?>bucks/" class="buttonItem recentButtonOption recentButtonOptionBucks <?php if ($county == 'bucks') echo 'recentButtonOptionActive';?> transitionAll" data-value="bucks">Bucks County</a>
					<a href="<?php echo $ourDomain.'inspections/';?>gloucester/" class="buttonItem recentButtonOption recentButtonOptionBucks <?php if ($county == 'gloucester') echo 'recentButtonOptionActive';?> transitionAll" data-value="bucks">Gloucester County</a>
					<a href="<?php echo $ourDomain.'inspections/';?>montgomery/" class="buttonItem recentButtonOption recentButtonOptionMontgomery <?php if ($county == 'montgomery') echo 'recentButtonOptionActive';?> transitionAll" data-value="montgomer">Montgomery County</a>
					<div class="clearAll"></div>
				</div>
				<div class="inspectionsHolder">
					<div class="inspectionRecentHolder inspectionRecentHolderActive" id="recent_holder_philly">
					<?php
					if ($county == 'philly')
						$q = "SELECT facility, address, date, violations_count, serious_count,neighborhood, license_num, report_url FROM ".$config['insp_r']." ORDER BY date desc,serious_count desc, facility LIMIT 50";
					if ($county == 'bucks')
						$q = "SELECT facility, CONCAT_WS(' ',street,zip) as address, date, violations_count, serious_count,city as neighborhood, facility_num , report_url FROM ".$config['insp_br']." ORDER BY date desc,serious_count desc, facility LIMIT 50";
					if ($county == 'gloucester')
						$q = "SELECT facility, CONCAT_WS(' ',street,zip) as address, date, violations_count, serious_count,city as neighborhood, facility_num , report_url FROM ".$config['insp_gr']." ORDER BY date desc,serious_count desc, facility LIMIT 50";
					if ($county == 'montgomery')
						$q = "SELECT facility, CONCAT_WS(' ',street,zip) as address, date, violations_count, serious_count,city as neighborhood, facility_num , report_url FROM ".$config['insp_mr']." ORDER BY date desc,serious_count desc, facility LIMIT 50";


					
					$r = mysqli_query($dbInspect,$q) or die($error_msg);
					$cycle = 0; 
					if ($r){
						while($row = mysqli_fetch_assoc($r)){
							$iu = 'inspectionUnitEven';
							if ($cycle % 2 != 0)
								$iu = 'inspectionUnitOdd';

							echo "<div class=\"inspectionUnit $iu transitionBackground\" id=\"inspection_unit_$cycle\">";
							echo "<a href=\"".$ourDomain.'inspections/';
							//if ($county != 'philly')
									echo $county.'/';
							if ($county == 'philly')
								echo "?detail=".rawurlencode($row['facility'])."|".rawurlencode($row['address'])."\">";
							else{
								echo "?detail=".rawurlencode($row['facility_num'])."\">";
							}
							echo '<div class="inspectionUnitInner">';
									echo '<div class="inspectionNameWrapper">';
										echo '<div class="inspectionUnitName transitionAll">'.$row['facility'].'</div>';
							 			echo '<div class="inspectionUnitDate"><span class="inspectionUnitDateTitle">Inspection date:</span> '.wordyDate($row['date']).'</div>';
										echo '<div class="clearAll"></div>';
									echo '</div>';
									echo '<div class="inspectionUnitInfoWrapper">';
										echo '<div class="inspectionUnitAddress">'.$row['address'].'</div>';
										echo '<div class="inspectionUnitNeigborhood">'.$row['neighborhood']. '</div>';
										echo '<div class="clearAll"></div>';
									echo '</div>';
									echo '<div class="inspectionUnitCountWrapper">';
										echo '<span class="inspectionCountLabel">Violations</span>';
										


										$serious = $row['serious_count'];
										$not_serious = $row['violations_count'] - $serious;

										echo '<li class="inspectionUnitCount ';
										if ($serious == 0)
											echo 'inspectionUnitCountZero';
										else
											echo 'inspectionUnitCountFoodborne';

										echo ' inspectionUnitCountFirst"><span class="inspectionCountNumber">'.$serious.'</span><span class="inspectionUnitInfoItemTitle"><span class="inspectionUnitInfoItemTitleLabel">Foodborne Illness Risk Factors</span></li>';

										

										echo '<li class="inspectionUnitCount ';
										if ($not_serious == 0)
											echo 'inspectionUnitCountZero';
										else
											echo 'inspectionUnitCountRetail';
										echo '"><span class="inspectionCountNumber">'.$not_serious.'</span><span class="inspectionUnitInfoItemTitle"><span class="inspectionUnitInfoItemTitleLabel">Lack of Good Retail Practices</span></li>';
										echo '<div class="clearAll"></div>';
									echo '</div>';
									echo '<div class="clearAll"></div>';
								echo '</div>';
							echo '</a></div>';


							$cycle++;

						}
					}
					mysqli_close($dbInspect);
					?>
					</div>
				</div>
			</div>
		</div>
		<div class="sitePreloader" id="site_preloader">
			<div class="spinnerWrapper">
				<img src="//data.inquirer.com/open_data/inspections/media/images/preloader.gif" />
			</div>
		</div>
	</div>
	
	<script type="text/javascript">

		jQuery(document).ready(function() {
			restaurant_inspections.index.init("<?php echo $county;?>");
		});
	</script>