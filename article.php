<!DOCTYPE html>
<html lang="en">
	<?php
		include("head.html");
	?>
	<body>

		<div class="site-content">

				<div class="fullwidth-block">
					<div class="container">
						<div class="">
							<?php
								include("functions.php");
								include("generic/header.html");
								$news = $pdo->prepare("select * from news where pk = ".$_GET["article"]);
								$news->execute();

								foreach($news as $arti)
								{
									#Gets the relevant images
									$imgs = $pdo->prepare("select * from images where art = ".$arti["pk"]);
									$imgs->execute();
									$imgs = $imgs->fetchall();

									#Prints out each article
                  echo("<div>
                  				<div class=\"container\">
                  					<h3>".$arti["title"]."</h3>
                  				</div>
                  			</div>");
									echo("<h5 style='text-align:left'>".$arti["dat"]." ".$arti["author"]."</h5>");
									echo("<div>".$arti["contents"]."</div>");

									#Prints out each image
									foreach($imgs as $img)
									{
										echo("<img src = ".$img['name'].">");
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
		</div>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>

	</body>

</html>
