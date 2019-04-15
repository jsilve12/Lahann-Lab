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
								include("functions.php");
								$news = $pdo->prepare("select * from papers order by paper_id desc");
								$news->execute();

								foreach($news as $arti)
								{
									#Prints out each article
									echo("<h3 class = 'section-title'><a href='".$arti["link"]."'>".$arti["title"]."</a></h3>");
									echo("<h5 style='text-align:left'>Authors:".$arti["Author"]."</h5>");
									echo("<h5 style='text-align:left'>".$arti["abstract"]."</h5>");
									echo("<img style='width:20%' src = ".$arti["Image"].">");
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
