<?php
		
			$title = $_GET['nname'];
			$prepared = $title;

		if ($county == 'philly'){
				
					$thisDB = $config['insp_r'];
					
				$q = "SELECT t1.facility, t1.address,  t1.date,(t1.violations_count-t1.serious_count) as not_serious_count , t1.serious_count,t1.neighborhood, t1.lat,t1.lng,t1.report_url,t1.establishment_type, groupedt1.MaxDateTime as max_date, t1.license_num as facility_num FROM $thisDB t1 INNER JOIN (SELECT facility, MAX(date) AS MaxDateTime, address FROM $thisDB WHERE neighborhood = ?  AND lat != '' AND facility != '' GROUP BY facility, address) groupedt1  ON t1.facility = groupedt1.facility AND t1.address = groupedt1.address AND t1.date = groupedt1.MaxDateTime ";
		}

		if ($county == 'bucks'){
					$thisDB = $config['insp_br'];

				$q = "SELECT t1.facility, CONCAT_WS(' ',t1.street,t1.zip) as address,  t1.date,(t1.violations_count-t1.serious_count) as not_serious_count , t1.serious_count,t1.city as neighborhood, t1.lat,t1.lng,t1.report_url,'' as establishment_type, groupedt1.MaxDateTime as max_date, t1.facility_num FROM $thisDB t1 INNER JOIN (SELECT facility, MAX(date) AS MaxDateTime, facility_num FROM $thisDB WHERE city LIKE ?  AND lat != '' AND facility != '' GROUP BY facility_num) groupedt1  ON t1.facility = groupedt1.facility AND t1.facility_num = groupedt1.facility_num AND t1.date = groupedt1.MaxDateTime ";
		}
		if ($county == 'gloucester'){
					$thisDB = $config['insp_gr'];

				$q = "SELECT t1.facility, CONCAT_WS(' ',t1.street,t1.zip) as address,  t1.date,(t1.violations_count-t1.serious_count) as not_serious_count , t1.serious_count,t1.city as neighborhood, t1.lat,t1.lng,t1.report_url,'' as establishment_type, groupedt1.MaxDateTime as max_date, t1.facility_num FROM $thisDB t1 INNER JOIN (SELECT facility, MAX(date) AS MaxDateTime, facility_num FROM $thisDB WHERE city LIKE ?  AND lat != '' AND facility != '' GROUP BY facility_num) groupedt1  ON t1.facility = groupedt1.facility AND t1.facility_num = groupedt1.facility_num AND t1.date = groupedt1.MaxDateTime ";
		
		}
		if ($county == 'montgomery'){
					$thisDB = $config['insp_mr'];

				$q = "SELECT t1.facility, CONCAT_WS(' ',t1.street,t1.zip) as address,  t1.date,(t1.violations_count-t1.serious_count) as not_serious_count , t1.serious_count,t1.city as neighborhood, t1.lat,t1.lng,t1.report_url,'' as establishment_type, groupedt1.MaxDateTime as max_date, t1.facility_num FROM $thisDB t1 INNER JOIN (SELECT facility, MAX(date) AS MaxDateTime, facility_num FROM $thisDB WHERE city LIKE ?  AND lat != '' AND facility != '' GROUP BY facility_num) groupedt1  ON t1.facility = groupedt1.facility AND t1.facility_num = groupedt1.facility_num AND t1.date = groupedt1.MaxDateTime ";
		
		}

			if ($q != ''){


					$stmt = mysqli_prepare($dbInspect, $q);
					mysqli_stmt_bind_param($stmt, 's', $prepared);
					/* execute prepared statement */
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_bind_result($stmt, $facility,$address,$date,$not_serious_count,$serious_count,$neighborhood,$lat,$lng,$report_URL,$et,$max_date,$facility_num);
					mysqli_stmt_store_result($stmt);
					$totalRows = mysqli_stmt_num_rows($stmt);
				

					mysqli_stmt_free_result($stmt);
					mysqli_stmt_close($stmt);

					if ($start > $totalRows){
						echo "Something went wrong"; exit();
					}


					$stmt2 = mysqli_prepare($dbInspect, $q.="  ORDER BY $ioList limit $start,50");

					mysqli_stmt_bind_param($stmt2, 's', $prepared);
	
					/* execute prepared statement */
					mysqli_stmt_execute($stmt2);
					$result = mysqli_stmt_bind_result($stmt2, $facility,$address,$date,$not_serious_count,$serious_count,$neighborhood,$lat,$lng,$report_URL,$et,$max_date,$facility_num);
					mysqli_stmt_store_result($stmt2);
					$numRows = mysqli_stmt_num_rows($stmt2);
					
			
					if ($numRows > 0){
				
						$aCount = 0; 
						while(mysqli_stmt_fetch($stmt2)){
							$rsts[$aCount]['facility'] = $facility;
							$rsts[$aCount]['address'] = $address;
							$rsts[$aCount]['date'] = $date;
							$rsts[$aCount]['maxdate'] = $max_date;
							$rsts[$aCount]['not_serious_count'] = $not_serious_count;
							$rsts[$aCount]['serious_count'] = $serious_count;
							$rsts[$aCount]['neighborhood'] = $neighborhood;
							$rsts[$aCount]['lat'] = $lat;
							$rsts[$aCount]['lng'] = $lng;
							$rsts[$aCount]['url'] = $report_URL;
							$rsts[$aCount]['facility_num'] = $facility_num;
							$aCount++; 
						}
					}

					mysqli_stmt_free_result($stmt2);

					mysqli_stmt_close($stmt2);

			}

		
?>
<script type="text/javascript" src="http://media.philly.com/storage/inquirer/script/leaflet/philly_neighborhoods.min.js"></script>