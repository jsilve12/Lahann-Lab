<!DOCTYPE html>
<html lang="en">
	<?php
		include("head.html");
	?>
	<body>
		<div class="site-content">
			<?php
				include("functions.php");
				include("generic/header.html");

				#Default to Lahan
				if(!isset($_GET['person']))
				{
					$_GET['person'] = 1;
				}
				$stmt = $pdo->prepare('SELECT * FROM person WHERE person_id = '.$_GET['person']);
				$stmt->execute();
				if($stmt->rowCount() != 1)
				{
					echo("<h1 class = 'section-title'>We are sorry, but the person that you're looking for doesn't appear in our servers</h1>");
				}
				$stmt = $stmt->fetchAll();
				$pairs = array(
					"department" => "Department",
					"location" => "Location",
					"Education" => "Experience",
					"Research" => "Research",
					"Research_Experience" => "Previous Research Experience",
					"Awards" => "Awards",
				);

				#Gets the important parts of the website (i.e. awards, department, etc.)
				echo("<div class = 'personal-page'>
						<h1 >".$stmt[0]['name']."</h1>
						<img class ='personal-page' src = images/".$stmt[0]['photo'].">");
				foreach( $pairs as $key => $value)
				{
					if(array_key_exists($key, $stmt[0]) && $stmt[0][$key] != "")
					{
						echo("<h2>".$value."</h2>");
						echo("<h4>".$stmt[0][$key]."</h4>");
					}
				}

				# Grabs the papers that person is on
				$stmt1 = $pdo->prepare('SELECT * FROM people_papers WHERE person_id = '.$stmt[0]['person_id']);
				$stmt1->execute();
				$stmt1 = $stmt1->fetchAll();
				echo("<h2> Papers </h2>");

				foreach( $stmt1 as $paper)
				{
					$stmt2 = $pdo->prepare('SELECT * FROM papers where paper_id = '.$paper["paper_id"]);
					$stmt2->execute();
					$stmt2 = $stmt2->fetchAll();

					echo("<div style='margin:0%; margin-left: 20%'>");
					echo("<h5 style='margin:0%'>Title: ".$stmt2[0]["title"]." </h5>");
					echo("<p style='margin:0%'>Abstract: ".$stmt2[0]["abstract"]." </p>");
					echo("<div style='margin:0%>Link to Article: <a href = \"".$stmt2[0]["link"]."\" alt = 'Link to the paper on'>" .$stmt2[0]["title"]." </a></div>
					</br></br></div>");
				}

				# Posts the Resume
				if(array_key_exists("Resume", $stmt[0]) && $stmt[0]["Resume"] != "0" && $stmt[0]["Resume"] != "resume\\")
				{
					echo("<h2> Resume </h2>");
					echo("<h4><a href = '".$stmt[0]["Resume"]."' download>Download my Resume</a><h4>");
				}

				echo("</div>");

				include("generic/footer.html"); ?>
		</div>
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
</html>
