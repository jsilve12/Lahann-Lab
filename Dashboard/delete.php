<?php
	# This is necessary - you cant select the column via cleaning values
	include("../functions.php");

	# If you are updating a persons information
	$user = $pdo->prepare("Delete from images where pk = :key");
	$user->execute(array("key" => $_GET['key']));

	# Prints the info
	echo('{ "key": "'.$_GET['key'].'"}');
?>
