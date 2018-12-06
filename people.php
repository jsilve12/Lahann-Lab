
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
				$toggle = false;
				foreach($types as $key => $value)
				{
					if($toggle)
					{
						$color = '#edf2f4';
					}
					else
					{
						$color = '#FFFFFF';
					}
					$toggle = !$toggle;
					echo("
							<div class = 'fullwidth-block'data-bg-color=".$color.">
								<div class = 'container'>
									<div class = 'row'>
										<h2 class = 'section-title'>".$value."</h2>
									</div>
								</div>
							</div>
					");
				}
			?>

			<?php include("generic/footer.html"); ?>
		</div>
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
	</body>
</html>
