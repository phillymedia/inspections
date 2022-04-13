<!DOCTYPE html>
<html>
<head>
<?php 
require '../common/connect_inspections.php';
require '../common/useful_scripts.php';
$siteURL = 	$ourDomain.'inspections/';
$siteDescr = 'Clean Plates: Philadelphia Restaurant Inspections';
$county = 'philly';

?>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1.0">
	<title>Clean Plates | The Philadelphia Inquirer</title>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<?php require 'includes/social_head.php'; ?>
	<link rel="icon" type="image/png" href="//media.inquirer.com/designimages/inq-favicon.png">
	<link rel="icon" href="//media.inquirer.com/designimages/inq-favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="shortcut icon" href="//media.inquirer.com/designimages/inq-favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="apple-touch-icon" href="//media.inquirer.com/designimages/apple-touch-inquirer-icon.png" type="image/png">
	<script>
	var siteURL = '<?php echo $siteURL;?>';
	</script>
	<?php 
	
		require 'includes/header.php';
	
		 ?>
</head>
<body>
	<div class="masterWrapper">
		<?php 
		require 'includes/small_menu.php'; 

    ?>
		<?php 

		
			if (isset($_GET['searchType'])){

				if ($_GET['searchType'] == 'restaurant'){
					if (isset($_GET['rname']) && $_GET['rname'] != '')
						require 'includes/search.php';
					else
						echo '<h1>Invalid request</h1>';
				} 

			}
			else if (isset($_GET['detail'])){
				require 'includes/detail.php';
			}
			else{
				include 'includes/main.php';
			}
		
		?>


	<?php require'includes/footer.php'; ?>
	</div>
	<?php #include 'includes/tracking_philly.php'; ?>
</body>
</html>