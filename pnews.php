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
							<h1 style="text-align:center">Public News</h1>
							<?php
								include("functions.php");
								include("generic/header.html");
								if($_GET["type"] == "public")
									echo("<h2><a href='pnews.php?type=lab'>Switch to Lab news</a></h2>");
								elseif($_GET["type"] == "lab")
									echo("<h2><a href='pnews.php?type=public'>Switch to Public news</a></h2>");
								$news = $pdo->prepare("select * from news where Category = :get order by pk desc");
								$news->execute(array("get" => $_GET["type"]));

								foreach($news as $arti)
								{
									#Gets the relevant images
									$imgs = $pdo->prepare("select * from images where art = ".$arti["pk"]);
									$imgs->execute();
									$imgs = $imgs->fetchall();

									#Prints out each article
									echo("<h3 class = 'section-title'><a href=article.php?article=".$arti["pk"].">".$arti["title"]."</a></h3>");
									echo("<h5 style='text-align:left'>".$arti["dat"]."</h5>");
									#echo("<div>".$arti["contents"]."</div>");

									#Prints out each image
									#foreach($imgs as $img)
									#{
										#echo("<img style=\"width:20%\" src = ".$img['name'].">");
									#}
									echo("</br>");
								}
							?>
						</div>
					</div>
				</div>


				<div class="fullwidth-block" data-bg-color="#edf2f4">
					<div class="container">
						<div class="subscribe-form">
							<h2>Join our newsletter</h2>
							<form action="#">
								<input type="text" placeholder="Enter your email">
								<input type="submit" value="Subscribe">
							</form>
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
