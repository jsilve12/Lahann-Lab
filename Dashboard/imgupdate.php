<?php
	# Redirect back
	include("../functions.php");

	if($_GET['type'] == 1)
	{
		imgSave($_POST['person_id'], $pdo, $_GET['type']);
	}
	elseif($_GET['type'] == 2)
	{
		imgSave($_GET['key'], $pdo, $_GET['type']);
	}
	header("Location: index.php");
	die();
?>
