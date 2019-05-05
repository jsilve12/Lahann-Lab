<!DOCTYPE html>
<html lang="en">
	<?php
		include("head.html");
	?>
	<body>

		<div class="site-content">
			<?php include("generic/header.html"); ?>
				<h1 style="text-align:center">Publications</h1>
				<div class="fullwidth-block">
						<div class="container">
							<div class="">
							<?php

								# Allows switching back and forth between the different publication locations
								if($_GET["location"] == "Michigan")
									echo("<h2><a href='publications.php?location=Germany'>Switch to German Publications</a></h2>");
								elseif($_GET["location"] == "Germany")
									echo("<h2><a href='publications.php?location=Michigan'>Switch to Michigan Publications</a></h2>");
								include("functions.php");
								$news = $pdo->prepare("select * from papers where Location = :loc or Location = 'both' order by paper_id desc");
								$news->execute(array("loc" => $_GET["location"]));

								foreach($news as $arti)
								{
									#Prints out each article
									echo("<h3 class = 'section-title'><a href='".$arti["link"]."'>".$arti["title"]."</a></h3>");
									echo("<h5 style='text-align:left'>Authors: ".$arti["Author"]."</h5>");
									echo("<h5 style='text-align:left'>".$arti["abstract"]."</h5>");

									# Insert the image
									if($arti["Image"] != "")
									{
										echo("<img style='width:20%' src = ".$arti["Image"].">");
									}
									echo("</br>");
								}
							?>
					</div>
				</div>
			</div>
			<?php
				include("generic/footer.html");
			?>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>

	</body>

</html>
