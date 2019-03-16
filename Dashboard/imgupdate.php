<?php
	include("../functions.php");

	# Calculates the address
	$target_dir = "../images/";
	$target_file = (basename($_FILES['fileToUpload']['name']));
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$fileName = strval(rand(0,100000000));
	$fileName = $fileName.".".$imageFileType;

	# Makes sure that it is actually an image and insert
	move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir.$fileName);
	if(isset($_POST['submit']))
	{
	}

	# Updates the database
	$user = $pdo->prepare("Update person Set photo = :photo Where person_id = :pk");
	$user->execute(array("photo" => $fileName, "pk" => $_POST['person_id']));

	# Redirect back
	header("Location: index.php");
	die();
?>
