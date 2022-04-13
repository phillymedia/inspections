<div class="contentWrapper containerGrey transitionAll">
		<div class="container">
			<div class="headerImage transitionAll"></div>
			<div class="searchHeaderWrapper transitionAll">
				<div class="searchHeaderTitle transitionAll">
					Clean Plates <span>Restaurant Inspections</span>
				</div>
			</div>
		</div>
		<div class="contentInner">
			<div class="containerCenter">
				<div class="containerSearchText containerSearchTextZeroResults">
					No results found, please search again
				</div>
				<div class="containerSearchWrapper containerSearchWrapperZero">
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
		</div>
		<div class="sitePreloader" id="site_preloader">
			<div class="spinnerWrapper">
				<img src="http://media.philly.com/designimages/restaurant_inspections_search_preloader.gif" />
			</div>
		</div>
	</div>
<script type="text/javascript">

		jQuery(document).ready(function() {
			restaurant_inspections.index.init("<?php echo $county;?>");
		});
	</script>