<!DOCTYPE html>
<html lang="en">
	<?php include("generic/header.html"); ?>
	<?php
		include("head.html");
	?>
	<body>
		<div class="site-content">
			<div class="hero">
				<ul class="slides">
					<li data-bg-image="images/slider-2.png">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">Laboratory Experiment</h2>
								<p>This is a very fascinating laboratory experiment- Click the link to learn more</p>
								<a href="#" class="button">See details</a>
							</div>
						</div>
					</li>
					<li data-bg-image="images/slider-4.jpg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">Laboratory Experiment</h2>
								<p>This is a very fascinating laboratory experiment- Click the link to learn more</p>
								<a href="#" class="button">See details</a>
							</div>
						</div>
					</li>
					<li data-bg-image="images/slider-5.jpg">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">Laboratory Experiment</h2>
								<p>This is a very fascinating laboratory experiment- Click the link to learn more</p>
								<a href="#" class="button">See details</a>
							</div>
						</div>
					</li>
				</ul>
			</div>

			<main class="main-content">
				<?php
					include("functions.php");

					# Deals with the news
					$news = $pdo->prepare("Select pk, title, dat, contents from news order by pk desc limit 3");
					$news->execute();
					$news = $news->fetchall();
					echo('<div class="fullwidth-block" data-bg-color="#edf2f4">
								<div class="container">
									<h2 class="section-title">Latest News</h2>
									<div class="row">');

					# Iterates over the image
					foreach($news as $new)
					{
						echo('<div class="col-md-4">
								<div class="post">');

						# Gets the image
						$img = $pdo->prepare("Select name from images where art = :art");
						$img->execute(array(
							"art" => $new["pk"]
						));
						$img = $img->fetchall();

						# Prints the image
						if(sizeof($img) >= 1)
						{
							echo('<figure class="featured-image"><img src="'.$img[0]["name"].'" alt=""></figure>');
						}

						# The Rest of the information
						echo('<h2 class="entry-title"><a href="article.php?article='.$new["pk"].'">'.$new["title"].'</a></h2>
								<small class="date">'.$new["dat"].'</small>
								<p>'.substr($new["contents"], 0, 128).'...</p>
							</div>
						</div>');
					}

					# End of News
					echo('</div> <!-- .row -->
					</div> <!-- .container -->
				</div>');
				?>

				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<h2 class="section-title">Our mission and vision</h2>
								<p>Research in the Lahann Lab focuses on surface engineering, advanced polymers, biomimetic materials, engineered microenvironments, and nano-scale self-assembly. More information will go in here, however I'm uncertain what specifically yet, so the rest is lorep ipsum for the moment</p>
								<p>Distinctio delectus consequuntur sed quod ipsum a, odio obcaecati neque, aliquam nostrum aliquid reprehenderit ad quae qui autem voluptate omnis quas Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime magnam amet obcaecati dolore omnis consectetur dignissimos iste cupiditate excepturi quae porro fugiat, nemo iure, minima. Fuga hic voluptate ratione, at.ullam.</p>
							</div>
							<div class="col-md-4">
								<h2 class="section-title">Research summaries</h2>
								<ul class="arrow-list has-border">
									<li><a href="#"> Surface-initiated RAFT polymerization from vapor-based polymer coatings</a></li>
									<li><a href="#"> Compartmentalized Microhelices Prepared via Electrohydrodynamic Cojetting</a></li>
									<li><a href="#">Robust label-free biosensing using microdisk laser arrays withon-chip references</a></li>
									<li><a href="#"> Progress of multicompartmental particles for medical applications</a></li>
								</ul>
								<a href="#" class="button">Show more</a>
							</div>
						</div>
					</div>
				</div>

				<!-- <div class="fullwidth-block cta" data-bg-image="images/cta-bg.jpg">
					<div class="container">
						<h2 class="cta-title">Neque porro quisquam</h2>
						<p>Modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem enim ad minima veniam quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil moles</p>
						<a href="#" class="button">See details</a>
					</div>
				</div> -->

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

			</main> <!-- .main-content -->


		</div>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		<?php include("generic/footer.html"); ?>
	</body>
</html>
