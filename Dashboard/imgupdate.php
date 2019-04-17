<?php
	# Redirect back
	include("../functions.php");

	if($_GET['type'] == 1)
	{
		# For people
		imgSave($_POST['person_id'], $pdo, $_GET['type']);
	}
	elseif($_GET['type'] == 2)
	{
		# For news
		imgSave($_GET['key'], $pdo, $_GET['type']);
	}
	elseif($_GET['type'] == 3)
	{
		# For Papers
		imgSave($_GET['key'], $pdo, $_GET['type']);
	}
	header("Location: index.php");
	die();
?>
