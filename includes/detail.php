<?php
$q = '';
$inspections = '';
$restr = '';
$addr = '';
$thislat = '';
$thislng = '';
$neighb = '';
$eType = '';
$numInsp = 0;
$avgVio = 0;
$avgFBI = 0;
$earliestYear = '';
$QM = "SET SESSION group_concat_max_len = 1000000";
$QR = mysqli_query($dbInspect,$QM);
if (isset($_GET['detail']) && $_GET['detail'] != ''){


	if ($county == 'philly'){
		$f = explode('|',$_GET['detail']);
		$restr = stripslashes($f[0]);
		$addr = $f[1];


		$q = "SELECT R.facility,R.address,R.neighborhood,R.lat,R.lng,R.establishment_type,R.inspection_type,R.date,R.serious_count,(R.violations_count - R.serious_count) as not_serious_count,report_URL,
		GROUP_CONCAT(case when V.item_num <= 27 THEN V.violation END  SEPARATOR '<br>') as serious, 
		GROUP_CONCAT(case when V.item_num >= 28 THEN V.violation END SEPARATOR '<br>') as not_serious
		FROM ".$config['insp_r']." AS R 
		LEFT JOIN ".$config['insp_v']." AS V USING(report_URL)
		WHERE facility = ? AND address = ?
		GROUP BY R.date
		order by R.date desc";

		$stmt = mysqli_prepare($dbInspect, $q);
		mysqli_stmt_bind_param($stmt, 'ss', $restr, $addr);
	}
	if ($county == 'bucks'){
		$f = $_GET['detail'];
		$q = "SELECT R.facility,CONCAT_WS(' ',R.street,R.zip) as address,R.city as neighborhood,R.lat,R.lng,'' as establishment_type,R.inspection_type,R.date,R.serious_count,(R.violations_count - R.serious_count) as not_serious_count,R.report_URL,
		GROUP_CONCAT(case when V.item_num <= 27 THEN V.violation END  SEPARATOR '<br>') as serious, 
		GROUP_CONCAT(case when V.item_num >= 28 THEN V.violation END SEPARATOR '<br>') as not_serious
		FROM ".$config['insp_br']." AS R 
		LEFT JOIN ".$config['insp_bv']." AS V ON R.date=V.date AND R.facility_num = V.facility_num
		WHERE R.facility_num = ? 
		GROUP BY R.date
		order by R.date desc";

		$stmt = mysqli_prepare($dbInspect, $q);
		mysqli_stmt_bind_param($stmt, 's', $f);



	}

	if ($county == 'gloucester'){
		$f = $_GET['detail'];
		$q = "SELECT R.facility,CONCAT_WS(' ',R.street,R.zip) as address,R.city as neighborhood,R.lat,R.lng,'' as establishment_type,R.inspection_type,R.date,R.serious_count,(R.violations_count - R.serious_count) as not_serious_count,R.report_URL,
		GROUP_CONCAT(case when V.item_num <= 24 THEN V.violation END  SEPARATOR '<br>') as serious, 
		GROUP_CONCAT(case when V.item_num >= 25 THEN V.violation END SEPARATOR '<br>') as not_serious
		FROM ".$config['insp_gr']." AS R 
		LEFT JOIN ".$config['insp_gv']." AS V ON R.date=V.date AND R.facility_num = V.facility_num
		WHERE R.facility_num = ? 
		GROUP BY R.date
		order by R.date desc";

		$stmt = mysqli_prepare($dbInspect, $q);
		mysqli_stmt_bind_param($stmt, 's', $f);



	}


	if ($county == 'montgomery'){

		$f = $_GET['detail'];
		$q = "SELECT R.facility,CONCAT_WS(' ',R.street,R.zip) as address,R.city as neighborhood,R.lat,R.lng,'' as establishment_type,R.inspection_type,R.date,R.serious_count,(R.violations_count - R.serious_count) as not_serious_count,R.report_URL,
		GROUP_CONCAT(case when V.item_num <= 29 THEN V.violation END  SEPARATOR '<br>') as serious, 
		GROUP_CONCAT(case when V.item_num >= 30 THEN V.violation END SEPARATOR '<br>') as not_serious
		FROM ".$config['insp_mr']." AS R 
		LEFT JOIN ".$config['insp_mv']." AS V ON R.date=V.date AND R.facility_num = V.facility_num
		WHERE R.facility_num = ? 
		GROUP BY R.date
		order by R.date desc";

		$stmt = mysqli_prepare($dbInspect, $q);
		mysqli_stmt_bind_param($stmt, 's', $f);



	}

	if ($q != ''){
	/* execute prepared statement */
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $facility,$address,$neighborhood,$lat,$lng,$establishment_type,$it,$date,$serious_count,$not_serious_count,$report_URL,$serious,$not_serious);
	mysqli_stmt_store_result($stmt);
	$numRows = mysqli_stmt_num_rows($stmt);

	if ($numRows > 0){
		$cycle = 0; 
		while(mysqli_stmt_fetch($stmt)){

			$restr = $facility;
			$addr = $address;
			if ($lat != '') {$thislat = $lat;}
			if ($lng != '') {$thislng = $lng;}
			if ($neighborhood != ''){$neighb = $neighborhood;}

			$eType = $establishment_type;

				$iu = 'inspectionUnitEven';
				$ai = 'inspectionActionInfoItemEven';
				if ($cycle % 2 != 0){
					$iu = 'inspectionUnitOdd';
					$ai = 'inspectionActionInfoItemOdd';
				}

			$inspections.= '<div class="inspectionUnit containerBorder containerBottom inspectionUnitDetails '.$iu;
				 if ($numRows == 1) 
				 	$inspections.= ' inspectionUnitSingle ';
				 else
				 	$inspections.= ' inspectionUnitMultiple ';
				 if ($cycle == 0)
				 	$inspections.= ' inspectionUnitActive';
				 $inspections.= '" id="inspection_unit_'.$iu.'">';
				$inspections.= '<div class="inspectionUnitInner">';
					$inspections.= '<div class="inspectionUnitDateWrapper transitionAll">';
						$inspections.= '<div class="inspectionUnitDate transitionAll">'.wordyDate($date).'</div>';
						
						$inspections.= '<div class="clearAll"></div>';
					$inspections.= '</div>';
					$inspections.= '<div class="inspectionUnitActionsList transitionAll">';
					if ($it != '' )
						$inspections.= '<div class="inspectionUnitType transitionAll"><span class="inspectionUnitTypeTitle">Inspection Type:</span> '.$it.'</div>';
						






						$inspections.= '<div class="inspectionUnitActions inspectionUnitActionsFoodborne"><div class="inspectionCountLabel inspectionCountLabelDetail">Violations</div>';
							$inspections.= '<li class="inspectionUnitCount ';
							 if ($serious_count == 0 )
							 	$inspections.= 'inspectionUnitCountZero';
							 else
							 	$inspections.= 'inspectionUnitCountFoodborne';
							 $inspections.= ' inspectionUnitCountFirst"><span class="inspectionCountNumber">'.$serious_count.'</span><span class="inspectionUnitInfoItemTitle"><span class="inspectionUnitInfoItemTitleLabel">Foodborne Illness Risk Factors</span></li>';

							 if ($serious != ''){

	 							 $serious = explode('<br>', $serious);
	 							 for ($s=0;$s<count($serious);$s++){
	 							 							 	
	 	 							 	$inspections.= '<li class="inspectionActionInfoItem '.$ai.'">';
	 	 							 	$inspections.= '<span class="inspectionActionInfoItemText">';
	 	 							 	if ($county == 'philly'){
		 	 							 	$serious[$s] = explode(']',$serious[$s]);
		 	 							 	if ($serious[$s][1] != null)
		 	 							 		$inspections.= $serious[$s][1].'</span></li>';
		 	 							 	else
		 	 							 		$inspections.= $serious[$s][0].'</span></li>';
	 	 							 	}
	 	 							 	if ($county != 'philly')
	 	 							 		$inspections.= htmlentities($serious[$s]).'</span></li>';
	 	 						}
							 		}
						$inspections.= '</div>';





						$inspections.= '<div class="inspectionUnitActions inspectionUnitActionsRetail">';
							$inspections.= '<li class="inspectionUnitCount ';
							if ($not_serious_count == 0)
								$inspections.= 'inspectionUnitCountZero';
							else
								$inspections.= 'inspectionUnitCountRetail';
							$inspections.= '"><span class="inspectionCountNumber">'.$not_serious_count.'</span><span class="inspectionUnitInfoItemTitle"><span class="inspectionUnitInfoItemTitleLabel">Lack of Good Retail Practices</span></li>';
							
							if ($not_serious != ''){

								$not_serious = explode('<br>', $not_serious);
								for ($ns=0;$ns<count($not_serious);$ns++){
								 	$inspections.= '<li class="inspectionActionInfoItem '.$ai.'"><span class="inspectionActionInfoItemText">';
								 	if ($county == 'philly'){
									 	$not_serious[$ns] = explode(']',$not_serious[$ns]);
									 	if ($not_serious[$ns][1] != null)
			 							 	$inspections.= $not_serious[$ns][1].'</span></li>';
			 							 else
			 							 	$inspections.= $not_serious[$ns][0].'</span></li>';
			 						}
			 						if ($county != 'philly')
			 							$inspections.= htmlentities($not_serious[$ns]).'</span></li>';
		 						}
								
							}
						$inspections.= '</div>';

						$inspections.= '<div class="inspectionUnitLink inspectionUnitLinkCount"><a href="'.$report_URL.'" target="_blank">Read full inspection report</a></div>
					</div>
					<div class="clearAll"></div>
				</div>
			</div>';



			$cycle++;
			
		}


		if ($neighb != ''){
			if ($county == 'philly')
				$q = "SELECT count(facility) as counted, avg(serious_count) as avg_serious, avg(violations_count) as avg_total, MIN(YEAR(date)) as ey FROM ".$config['insp_r']." WHERE neighborhood = '$neighb' and lat != '' and facility != ''";
			
			if ($county == 'bucks')
				$q = "SELECT count(facility) as counted, avg(serious_count) as avg_serious, avg(violations_count) as avg_total, MIN(YEAR(date)) as ey FROM ".$config['insp_br']." WHERE city = '$neighb' and lat != '' and facility != ''";
			if ($county == 'gloucester')
				$q = "SELECT count(facility) as counted, avg(serious_count) as avg_serious, avg(violations_count) as avg_total, MIN(YEAR(date)) as ey FROM ".$config['insp_gr']." WHERE city = '$neighb' and lat != '' and facility != ''";
			if ($county == 'montgomery')
				$q = "SELECT count(facility) as counted, avg(serious_count) as avg_serious, avg(violations_count) as avg_total, MIN(YEAR(date)) as ey FROM ".$config['insp_mr']." WHERE city = '$neighb' and lat != '' and facility != ''";

			$r = mysqli_query($dbInspect,$q) or die($error_msg);
			if ($r && mysqli_num_rows($r) != 0){

				$row = mysqli_fetch_assoc($r);
				$numInsp = $row['counted'];
				$avgVio = $row['avg_total'];
				$avgFBI = $row['avg_serious'];
				$earliestYear = $row['ey'];
			}
		}

		

	} // end if $numRows > 0

	mysqli_stmt_free_result($stmt);
	mysqli_stmt_close($stmt);
} // end if $q != ''

	


}

	/* close statement and connection */
	mysqli_close($dbInspect);

	if ($numRows != 0)
		require 'detail_results.php';
	else
		require '404.php';

?>

