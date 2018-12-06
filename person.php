<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<title>Science Labs</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">

		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>
	<body>
		<div class="site-content">
			<?php
				include("functions.php");
				include("generic/header.html");
				$stmt = $pdo->prepare('SELECT * FROM person WHERE name = '.$GET['person']);
				$stmt->execute();
				if($stmt->rowCount() != 1)
				{
					echo("<h1 class = 'section-title'>We are sorry, but the person that you're looking for doesn't appear in our servers</h1>");
				}
				echo("<h1 class = 'section-title'".$stmt[0]['name']."</h1>");
				echo("<div class = 'post'>
						<h2 class = 'entry-title'>".$stmt[0]['experience']." at Lahann Lab
						".$stmt[0]['department']."
						</h2>
						<img src = ".$stmt[0]['photo']." class = 'featured-image'/>
					</div>");

				include("generic/footer.html"); ?>
		</div>
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
	</body>
</html>
