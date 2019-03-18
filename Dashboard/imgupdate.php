<?php
	# Redirect back
	include("../functions.php");
	imgSave($_POST['person_id'], $pdo);
	header("Location: index.php");
	die();
?>
