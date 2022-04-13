<?php
		
			$title = 'Mobile Food Vendors';

		
			$thisDB = $config['insp_r'];
			
		$q = "SELECT t1.facility, t1.address,  t1.date,(t1.violations_count-t1.serious_count) as not_serious_count , t1.serious_count,t1.neighborhood, t1.lat,t1.lng,t1.report_url,t1.establishment_type, groupedt1.MaxDateTime as max_date FROM $thisDB t1 INNER JOIN (SELECT facility, MAX(date) AS MaxDateTime, address FROM $thisDB WHERE establishment_type = 'Food Vendor: Mobile Food Vendor' AND YEAR(date) > '2014' AND lat != '' AND facility != '' GROUP BY facility, address) groupedt1  ON t1.facility = groupedt1.facility AND t1.address = groupedt1.address AND t1.date = groupedt1.MaxDateTime ";




			if ($q != ''){


					$stmt = mysqli_prepare($dbInspect, $q);
					//mysqli_stmt_bind_param($stmt, 's', $prepared);
					/* execute prepared statement */
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_bind_result($stmt, $facility,$address,$date,$not_serious_count,$serious_count,$neighborhood,$lat,$lng,$report_URL,$et,$max_date);
					mysqli_stmt_store_result($stmt);
					$totalRows = mysqli_stmt_num_rows($stmt); // needed for pagination - total number of records that match the search
				

					mysqli_stmt_free_result($stmt);
					mysqli_stmt_close($stmt);

					if ($start > $totalRows){
						echo "Something went wrong"; exit();
					}


					$stmt2 = mysqli_prepare($dbInspect, $q.="  ORDER BY $ioList limit $start,50");

					//mysqli_stmt_bind_param($stmt2, 's', $prepared);
	
					/* execute prepared statement */
					mysqli_stmt_execute($stmt2);
					$result = mysqli_stmt_bind_result($stmt2, $facility,$address,$date,$not_serious_count,$serious_count,$neighborhood,$lat,$lng,$report_URL,$et,$max_date);
					mysqli_stmt_store_result($stmt2);
					$numRows = mysqli_stmt_num_rows($stmt2); // the number of rows returned with limit added
					
			
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
							$aCount++; 
						}
					}

					mysqli_stmt_free_result($stmt2);
					mysqli_stmt_close($stmt2);

			}

		
?>