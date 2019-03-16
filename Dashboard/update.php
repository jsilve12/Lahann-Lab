<?php
	# This is necessary - you cant select the column via cleaning values
	include("../functions.php");
	$user = $pdo->prepare("Update person Set ".$_GET['k']." = :v Where person_id = :pk");
	$user->execute(array("v" => $_GET['v'], "pk" => $_GET['pk']));
//	$user = $user->fetchall();
	echo('{ "name": "'.$_GET['k'].'", "age": "'.$_GET['v'].'", "city": "'.$_GET['pk'].'" }');
?>
