<?php
		if (isset($_GET['chef']) && $_GET['chef'] != ''){

			$where = '';


			$title = $phillyChefs[$_GET['chef']];	
			$thisDB = $config['insp_r'];

		if ($_GET['chef'] == 'marc_vetri')
			$where = " WHERE (facility = 'Amis' or facility = 'Osteria' or facility = 'Pizzeria Vetri' or (address = '1312 SPRUCE ST 19107' and facility != 'Vetri Demonstration Kitchen') or facility = 'Lo Spiedo') ";

		if ($_GET['chef'] == 'jose_garces')
			$where = " WHERE (facility LIKE 'Amada%' or facility LIKE '%Distrito%' or facility LIKE '%Garces Trading Company%' or facility LIKE '%JG Domestic%' or facility LIKE '%Rosa Blanca%' or facility = 'Buena Onda' or facility LIKE '%Village Whiskey%' or facility LIKE '%Tinto%' or facility LIKE '%Volver%')  ";

		if ($_GET['chef'] == 'bobby_flay')
			$where = " WHERE (facility LIKE '%%Burger Palace%%' and address = '3925 WALNUT ST 19104')  ";

		if ($_GET['chef'] == 'masaharu_morimoto')
			$where = " WHERE (facility = 'Morimoto')  ";

		if ($_GET['chef'] == 'stephen_starr')
			$where = " WHERE (facility='Alma de Cuba Restaurant' or  facility='Buddakan' or  facility='The Continental' or  facility='El Vez' or  facility='Jones Restaurant' or  facility='Pod Restaurant' or  facility='Butcher and Singer' or  facility='Barclay Prime Restaurant' or  facility='Continental Midtown' or  facility='Pizzeria Stella' or  facility='El Rey' or  facility='The Dandelion English Pub' or  facility='Square Burger' or  facility='Frankford Hall' or  facility LIKE '%%Talula%%' or  address='2025 SANSOM ST 19106' or  facility='Fette Sau' or  facility='Serpico' or  facility='Morimoto')  ";

		if ($_GET['chef'] == 'audrey-claire_taichman')
			$where = " WHERE (facility = 'Audrey Claire' or facility = 'Cook' or facility = 'Twenty Manning')  ";


		if ($_GET['chef'] == 'safran__turney')
			$where = " WHERE (facility = 'Barbuzzo Restaurant' or facility = 'Lolita' or facility LIKE '%%Jamonera%%' or facility LIKE '%%Little Nonna%%')  ";

		if ($_GET['chef'] == 'michael_solomonov')
			$where = " WHERE (facility = 'Zahav' or facility = 'Percy Street' or facility LIKE '%%Federal Donut%%' or facility  = 'Abe Fisher' or facility  = 'Dizengoff')  ";







		if ($where != ''){
			$q = "SELECT t1.facility, t1.address,  t1.date,(t1.violations_count-t1.serious_count) as not_serious_count , t1.serious_count,t1.neighborhood, t1.lat,t1.lng,t1.report_url,t1.establishment_type, groupedt1.MaxDateTime as max_date FROM $thisDB t1 INNER JOIN (SELECT facility, MAX(date) AS MaxDateTime, address FROM $thisDB $where AND lat != '' GROUP BY facility, address) groupedt1  ON t1.facility = groupedt1.facility AND t1.address = groupedt1.address AND t1.date = groupedt1.MaxDateTime ";

		}

			if ($q != ''){


					$stmt = mysqli_prepare($dbInspect, $q);
					//mysqli_stmt_bind_param($stmt, 's', $prepared);
					/* execute prepared statement */
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_bind_result($stmt, $facility,$address,$date,$not_serious_count,$serious_count,$neighborhood,$lat,$lng,$report_URL,$et,$max_date);
					mysqli_stmt_store_result($stmt);
					$totalRows = mysqli_stmt_num_rows($stmt);
				

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
							$aCount++; 
						}
					}

					mysqli_stmt_free_result($stmt2);
					mysqli_stmt_close($stmt2);

			}

		}
		else
			echo '<h1>Invalid request</h1>';
?>