<?php
$q = '';
$title = '';
$rsts = array();
$thisSearch = '';
$numRows = 0;
$totalRows = 0;
$start = 0;
$end = 50;
$queryStr = ''; 
$ioList = ' t1.facility asc';



$orderList = array();
$orderList['1'] = ' max_date desc';
$orderList['2'] = ' max_date asc';
$orderList['3'] = ' t1.facility desc';
$orderList['4'] = ' t1.facility asc';

if (isset($_GET['inspection_list_order']) && is_numeric($_GET['inspection_list_order'])){
	if (array_key_exists($_GET['inspection_list_order'], $orderList)){

		$ioList = $orderList[$_GET['inspection_list_order']];
	}
}

if (isset($_GET['start']) && is_numeric($_GET['start'])){
	$start = strip_tags(mysqli_real_escape_string($dbInspect, $_GET['start']));
}
if (isset($_GET['end']) && is_numeric($_GET['end'])){
	$end = strip_tags(mysqli_real_escape_string($dbInspect, $_GET['end']));
}
if ($start >= $end){
	echo '<h1 style="margin-top:50px;padding:50px">Invalid request</h1>';
	exit();
}

$getStr = '';
$sortSelectStr = '';


foreach ($_GET AS $key => $value){
	if ($key != 'end' && $key != 'start' && $key != 'inspection_list_order'){
		$getStr.="$key=$value&";
		$sortSelectStr.="$key=$value&";
	}
	 if ($key == 'inspection_list_order')
	 	$getStr.="$key=$value&";

}



if (isset($_GET['searchType'])){

	if ($county == 'philly'){

		if ($_GET['searchType'] == 'restaurant'){
			require ('../searches/search_restaurant.php');
		} 

		if ($_GET['searchType'] == 'neighborhood'){
			if ( isset($_GET['nname'])  &&    array_key_exists($_GET['nname'], $phillyHoods))
				require ('../searches/search_neighborhood.php');
		}
		if ($_GET['searchType'] == 'zip'){

			if ( isset($_GET['zname'])  &&    array_key_exists($_GET['zname'], $phillyZips))
				require ('../searches/search_philly_zip.php');
		}
		if ($_GET['searchType'] == 'airport'){
				require ('../searches/search_philly_airport.php');
		}
		if ($_GET['searchType'] == 'reading_terminal'){
				require ('../searches/search_philly_rt.php');
		}
		if ($_GET['searchType'] == 'stadiums'){
				require ('../searches/search_philly_stadiums.php');
		}
		if ($_GET['searchType'] == 'hospitals'){
				require ('../searches/search_philly_hospitals.php');
		}
		if ($_GET['searchType'] == 'schools'){
				require ('../searches/search_philly_schools.php');
		}
		if ($_GET['searchType'] == 'food_trucks'){
				require ('../searches/search_philly_ft.php');
		}
		if ($_GET['searchType'] == 'chefs'){

			$phillyChefs = array();
			$phillyChefs['stephen_starr'] = 'Stephen Starr'; 
			$phillyChefs['jose_garces'] = 'Jose Garces';
			$phillyChefs['marc_vetri'] =  'Marc Vetri';
			$phillyChefs['bobby_flay'] =  'Bobby Flay';
			$phillyChefs['audrey-claire_taichman'] =  'Audrey-Claire Taichman';
			$phillyChefs['masaharu_morimoto'] =  'Masaharu Morimoto';
			$phillyChefs['safran__turney'] =  'Safran  Turney';
			$phillyChefs['michael_solomonov'] =  'Michael Solomonov';

			if ( isset($_GET['chef'])  &&    array_key_exists($_GET['chef'], $phillyChefs)){
				require ('../searches/search_philly_chefs.php');
			}
		}
	} // end if $county == 'philly'



	if ($county == 'bucks'){
		if ($_GET['searchType'] == 'restaurant'){
			require ('../searches/search_restaurant.php');
		} 
		if ($_GET['searchType'] == 'neighborhood'){
			if ( isset($_GET['nname'])  &&    array_key_exists($_GET['nname'], $bucksTowns))
				require ('../searches/search_neighborhood.php');
		}
		if ($_GET['searchType'] == 'zip'){

			if ( isset($_GET['zname'])  &&    array_key_exists($_GET['zname'], $bucksZips))
				require ('../searches/search_philly_zip.php');
		}

	}

	if ($county == 'gloucester'){
		if ($_GET['searchType'] == 'restaurant'){
			require ('../searches/search_restaurant.php');
		} 
		if ($_GET['searchType'] == 'neighborhood'){
			if ( isset($_GET['nname'])  &&    array_key_exists($_GET['nname'], $glouTowns))
				require ('../searches/search_neighborhood.php');
		}
		if ($_GET['searchType'] == 'zip'){

			if ( isset($_GET['zname'])  &&    array_key_exists($_GET['zname'], $glouZips))
				require ('../searches/search_philly_zip.php');
		}

	}
	if ($county == 'montgomery'){
		if ($_GET['searchType'] == 'restaurant'){
			require ('../searches/search_restaurant.php');
		} 
		if ($_GET['searchType'] == 'neighborhood'){
			if ( isset($_GET['nname'])  &&    array_key_exists($_GET['nname'], $montcoTowns))
				require ('../searches/search_neighborhood.php');
		}
		if ($_GET['searchType'] == 'zip'){

			if ( isset($_GET['zname'])  &&    array_key_exists($_GET['zname'], $montcoZips))
				require ('../searches/search_philly_zip.php');
		}

	}

} // end if (isset($_GET['searchType']))

if ($numRows != 0)
	require 'search_results.php';
else
	require 'search_empty.php';
mysqli_close($dbInspect);
?>
	

