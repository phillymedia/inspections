<div class="navigationWrapper">
    	<div class="navigationInner">
			<div class="brandLogo transitionAll">
				<a href="https://www.inquirer.com" target="_blank">
					<img src="//media.inquirer.com/designimages/InqTheInquirerSmall_140x30.png" />
				</a>
			</div>
			<div class="siteTitle">
				<a href="//www.inquirer.com/health/clean-plates/"><div class="siteLogoText"><span class="siteLogoTitle transitionAll">Clean Plates</span></div></a>
			</div>
			<div class="menuButton">
				<div class="navIcon transitionAll"><span></span><span></span><span></span><span></span></div>
			</div>
			<div class="searchWrapper transitionRight">
				<div class="buttonItem transitionAll searchButton" id="search_button_search">
					<span class="searchButtonSymbol transitionAll">
						<span class="transitionAll">
							<i class="fa fa-search transitionAll"></i>
						</span>
					</span>
					<span class="searchButtonText transitionAll">Search</span>
				</div>
				<div class="searchDropDownMenu transitionAll" id="search_drop_down_menu">
					<div class="searchDropDownMenuInner">
						<div class="countySelector">
							<label class="searchOptionLabel">County</label>
								<div class="searchOptionInput">
								<select name="county" id="menu_dropdown_county" class="buttonItem formButton formButtonCounty menuCounty transitionAll" >
									<option  <?php if ($county == 'philly') echo 'selected';?> value="philly">Philadelphia</option>
									<option <?php if ($county == 'bucks') echo 'selected';?> value="bucks">Bucks</option>
									<option <?php if ($county == 'gloucester') echo 'selected';?> value="gloucester">Gloucester</option>
									<option <?php if ($county == 'montgomery') echo 'selected';?> value="montgomery">Montgomery</option>
								</select>
								</div>
							<div class="clearAll"></div>
						</div>
						<div class="searchOptionsWrapper <?php if ($county == 'philly') echo 'searchOptionsWrapperActive';?>" id="search_options_philadelphia">
							<div class="searchOptionRow">
								<label class="searchOptionLabel">Name</label>
								<div class="searchOptionInput">
									<input id="search_input_nav_philadelphia" class="transitionAll searchInput" value="Ex: Zahav" />
									<span class="buttonItem transitionAll searchInputSubmit" id="submit_philadelphia_facility"><span>Search</span></span>
								</div>
								<div class="clearAll"></div>
							</div>
							<div class="searchOptionRow">
								<label class="searchOptionLabel">Neighborhood</label>
								<div class="searchOptionInput">
									<select name="neighborhood" id="submit_philadelphia_neighborhood" class="buttonItem formButton formButtonCounty menuCounty transitionAll" >
									<?php
									if ($county == 'philly')
										create_options($phillyHoods, 'nname');
									?>
									</select>
								</div>
								<div class="clearAll"></div>
							</div>
							<div class="searchOptionRow">
								<label class="searchOptionLabel">Zip Code</label>
								<div class="searchOptionInput">

									<select name="zip" id="submit_philadelphia_zip" class="buttonItem formButton formButtonCounty menuCounty transitionAll" >
									<?php
									if ($county == 'philly')
										create_options($phillyZips, 'zname');
									?>
									</select>
								</div>
								<div class="clearAll"></div>
							</div>
							<div class="clearAll"></div>
						</div>
						<div class="searchOptionsWrapper <?php if ($county == 'bucks') echo 'searchOptionsWrapperActive';?>" id="search_options_bucks">
							<div class="searchOptionRow">
								<label class="searchOptionLabel">Name</label>
								<div class="searchOptionInput">
									<input id="search_input_nav_bucks" class="transitionAll searchInput" value="Ex: Pineville Tavern" />
									<span class="buttonItem transitionAll searchInputSubmit" id="submit_bucks_facility"><span>Search</span></span>
								</div>
								<div class="clearAll"></div>
							</div>
							<div class="searchOptionRow">
								<label class="searchOptionLabel">City</label>
								<div class="searchOptionInput">
									<select name="neighborhood" id="submit_bucks_neighborhood" class="buttonItem formButton formButtonCounty menuCounty transitionAll" >
									<?php
									if ($county == 'bucks')
										create_options($bucksTowns, 'nname');
									?>
									</select>
								</div>
								<div class="clearAll"></div>
							</div>
							<div class="searchOptionRow">
								<label class="searchOptionLabel">Zip Code</label>
								<div class="searchOptionInput">
									<select name="zip" id="submit_bucks_zip" class="buttonItem formButton formButtonCounty menuCounty transitionAll" >
									<?php
									if ($county == 'bucks')
										create_options($bucksZips, 'zname');
									?>
									</select>
								</div>
								<div class="clearAll"></div>
							</div>
							<div class="clearAll"></div>
						</div>



						<div class="searchOptionsWrapper <?php if ($county == 'gloucester') echo 'searchOptionsWrapperActive';?>" id="search_options_gloucester">
							<div class="searchOptionRow">
								<label class="searchOptionLabel">Name</label>
								<div class="searchOptionInput">
									<input id="search_input_nav_gloucester" class="transitionAll searchInput" value="Ex: La Verde" />
									<span class="buttonItem transitionAll searchInputSubmit" id="submit_gloucester_facility"><span>Search</span></span>
								</div>
								<div class="clearAll"></div>
							</div>
							<div class="searchOptionRow">
								<label class="searchOptionLabel">City</label>
								<div class="searchOptionInput">
									<select name="neighborhood" id="submit_gloucester_neighborhood" class="buttonItem formButton formButtonCounty menuCounty transitionAll" >
									<?php
									if ($county == 'gloucester')
										create_options($glouTowns, 'nname');
									?>
									</select>
								</div>
								<div class="clearAll"></div>
							</div>
							<div class="searchOptionRow">
								<label class="searchOptionLabel">Zip Code</label>
								<div class="searchOptionInput">
									<select name="zip" id="submit_gloucester_zip" class="buttonItem formButton formButtonCounty menuCounty transitionAll" >
									<?php
									if ($county == 'gloucester')
										create_options($glouZips, 'zname');
									?>
									</select>
								</div>
								<div class="clearAll"></div>
							</div>
							<div class="clearAll"></div>
						</div>




						<div class="searchOptionsWrapper <?php if ($county == 'montgomery') echo 'searchOptionsWrapperActive';?>" id="search_options_montgomery">
							<div class="searchOptionRow">
								<label class="searchOptionLabel">Name</label>
								<div class="searchOptionInput">
									<input id="search_input_nav_montgomery" class="transitionAll searchInput" value="Ex: Merion Cricket Club" />
									<span class="buttonItem transitionAll searchInputSubmit" id="submit_montgomery_facility"><span>Search</span></span>
								</div>
								<div class="clearAll"></div>
							</div>
							<div class="searchOptionRow">
								<label class="searchOptionLabel">City</label>
								<div class="searchOptionInput">
									<select name="neighborhood" id="submit_montgomery_neighborhood" class="buttonItem formButton formButtonCounty menuCounty transitionAll" >
									<?php
									if ($county == 'montgomery')
										create_options($montcoTowns, 'nname');
									?>
									</select>
								</div>
								<div class="clearAll"></div>
							</div>
							<div class="searchOptionRow">
								<label class="searchOptionLabel">Zip Code</label>
								<div class="searchOptionInput">
									<select name="zip" id="submit_montgomery_zip" class="buttonItem formButton formButtonCounty menuCounty transitionAll" >
									<?php
									if ($county == 'montgomery')
										create_options($montcoZips, 'zname');
									?>
									</select>
								</div>
								<div class="clearAll"></div>
							</div>
							<div class="clearAll"></div>
						</div>



					</div>
				</div>
				<div class="socialWrapper">
					<div class="transitionAll socialButton"><a href="<?php echo $ourDomain.'inspections/';?>about/" class="transitionAll"><i class="fa fa-info-circle fa-2"></i></a></div>
					<div class="transitionAll socialButton"><a href="https://www.facebook.com/sharer/sharer.php?u=https://data.inquirer.com/inspections/" target="_blank" class="transitionAll"><i class="fa fa-facebook-square fa-2"></i></a></div>
					<div class="transitionAll socialButton"><a href="https://twitter.com/intent/tweet?text=Clean Plates: Philadelphia restaurant inspections%0Ahttps://data.inquirer.com/inspections/&amp;hashtags=CleanPlates" target="_blank" class="transitionAll"><i class="fa fa-twitter fa-2"></i></a></div>
					<div class="clearAll"></div>
				</div>
				<div class="brandLogoSmall">
					<img src="//data.inquirer.com/open_data/inspections/media/images/InquirerflagSmallHeaderBlack.png" />
				</div>
				<div class="clearAll"></div>
			</div>
			<div class="clearAll"></div>
		</div>
	</div>