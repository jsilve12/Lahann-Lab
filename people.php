
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
				$toggle = false;
				$gradStud = 0;
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
					$stmt = $pdo->prepare('SELECT * FROM person WHERE experience = '.$key);
					$stmt->execute();
					echo("
							<div class = 'fullwidth-block'data-bg-color=".$color.">
								<div class = 'container'>
									<div class = 'row'>
										<h2 class = 'section-title'>".$value."</h2>
									</div>");
					if($key != 0 && $key != 1 && $key != 5 && $key != 6)
					{
						$width = "float:\"left\";\'";
						if($key == 4) {$width = "width:40%;'";}
						while($row = $stmt->fetch(PDO::FETCH_ASSOC))
						{
							if($key == 2) {$gradStud +=1;}
							echo("<div class = 'post person' style='".$width.">
									<h3 class = 'entry-title'>
										".$row['name']."
									</h3>
									<h4>
										".$value."
									</h4>");
							echo("	<img src = \"images/".trim($row['photo'])."\" class = 'featured-image'>
									<p>".$row['department']." <br> <a href= person.php?person=".$row['person_id']." alt='".$row['name']."'s personal page'/>".$row['name']."'s Website</a></p>
								</div>");
							if($gradStud == 4)
							{
								$gradStud = 0;
								echo("<br>");
							}
						}
					}
					else
					{
						echo("<table style='width:100%'>
							<tr>
								<th>Name</th>
								<th>Location</th>
								<th>Years</th>
								<th>Mentor</th>
							</tr>");
						while($row = $stmt->fetch(PDO::FETCH_ASSOC))
						{
							try
							{
								$stmt1 = $pdo->prepare("SELECT * FROM person WHERE person_id = ".$row['mentor']);
								$stmt1->execute();
								$mentor = $stmt1->fetch(PDO::FETCH_ASSOC);
							}
							catch(Exception $e)
							{
								$mentor['name'] = "";
							}
							echo("<tr>
									<td>".$row['name']."</td>
									<td>".$row['location']."</td>
									<td>".$row['years']."</td>
									<td>".$mentor['name']."</td>
								</tr>");
						}
						echo("
						</table>");
					}
					echo("
							</div>
						</div>");
				}
			?>

			<?php include("generic/footer.html"); ?>
		</div>
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
	</body>
</html>
