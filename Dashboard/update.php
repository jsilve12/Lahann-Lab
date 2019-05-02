<?php
	# This is necessary - you cant select the column via cleaning values
	include("../functions.php");

	# If you are updating a persons information
	if($_GET['type'] == 0)
	{
		$user = $pdo->prepare("Update person Set ".$_GET['k']." = :v Where person_id = :pk");
		$user->execute(array("v" => $_GET['v'], "pk" => $_GET['pk']));
	}
	# If you are updating a news stories information
	else if($_GET['type'] == 1)
	{
		$news = $pdo->prepare("Update news set ".$_GET['k']." = :v Where pk = :pk");
		$news->execute(array("v" => $_GET['v'], "pk" => $_GET['pk']));
	}
	else if($_GET['type'] == 2)
	{
		$news = $pdo->prepare("Update papers set ".$_GET['k']." = :v Where paper_id = :pk");
		$news->execute(array("v" => $_GET['v'], "pk" => $_GET['pk']));
	}
	else if($_GET['type'] == 3)
	{
		$news = $pdo->prepare("Delete from people_papers where paper_id = :pap and person_id = :pk");
		$news->execute(array("pap" => $_GET['v'], "pk" => $_GET['pk']));
	}
	else if($_GET['type'] == 4)
	{
		$person = $pdo->prepare("Select * from people where name like :name");
		$person->execute(array("name" => $_GET['k']));
		$person = $person->fetchall();
		$person = $person[0]["name"];

		$news = $pdo->prepare("Delete from people_papers where paper_id = :pap and person_id = :pk");
		$news->execute(array("pap" => $_GET['v'], "pk" => $_GET['pk']));
	}
	var_dump($_GET);
	echo($_GET['v']);
	echo('{ "key": "'.$_GET['k'].'", "value": "'.$_GET['v'].'", "key": "'.$_GET['pk'].'" }');
?>
