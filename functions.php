<?php
	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=Lahann','Jonathan', 'Hatter12');

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	class levels
	{
		const __default = self::underGrad;

		const underGrad = 0;
		const visiting = 1;
		const gradStudents = 2;
		const postDoc = 3;
		const professor = 4;
		const alumUnderGrad = 5;
		const alumVisiting = 6;
		const alumMasters = 7;
		const alumPhD = 8;
		const alumPostDoc = 9;
	}

	class priviledges
	{
		const __default = self::underGrad;

		const underGrad = 0;
		const graduate = 1;
		const admin = 2;
		const superAdmin = 3;
	}

	class person
	{
		public $name;
		public $experience;
		public $power;
		public $email;
		public $department;
		public $location;
		public $years;
		public $mentor;
		public $photo;
		public $resume;

		//Constructs for all the values
		function __construct($named, $experienced, $powerd, $emaild, $departmentd, $locationd, $yearsd, $mentord, $photod, $resumed)
		{
			$name = $named;
			$experience = $experienced;
			$power = $powerd;
			$email = $emaild;
			$department = $departmentd;
			$location = $locationd;
			$years = yearsd;
			$mentor = $mentord;
			$photo = $photod;
			$resume = $resumed;
		}
	}

	$types = array(
		levels::professor => "Principal Investigator",
		levels::postDoc => "Post Docs" ,
		levels::gradStudents => "Ph.D Students",
		levels::visiting => "Visiting Students",
		levels::underGrad => "Undergraduate Students",
		levels::alumPostDoc => "Alumni Post Docs",
		levels::alumPhD => "Alumni Ph.D Students",
		levels::alumMasters => "Alumni Masters",
		levels::alumVisiting => "Visiting Students Alumni",
		levels::alumUnderGrad => "Alumni Undergrads"
	);
	$type = array("Undergraduate", "Visiting Scholar", "Graduate", "Post Doc", "Professor", "Alumni Undergraduate", "Alumni Visiting Scholar", "Alumni Masters", "Alumni Ph.D.", "Alumni Post Doc");


	# Checks if you are logged in
	function loggedIn($arr)
	{
		if(isset($_SESSION['username']))
		{
			return 1;
		}
		return 2;
	}

	# Saves the image
	function imgSave($val, $pdo, $type = 1)
	{
		# Calculates the address
		$target_dir = "../images/";
		$target_file = (basename($_FILES['fileToUpload']['name']));
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		$fileName = strval(rand(0,100000000));
		if($imageFileType != "")
		{
			$fileName = $fileName.".".$imageFileType;
		}
		else
		{
			$fileName = "";
		}

		# Makes sure that it is actually an image and insert
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir.$fileName);

		# Update for the person
		if($type == 1)
		{
			$user = $pdo->prepare("Update person Set photo = :photo Where person_id = :pk");
			$user->execute(array("photo" => $fileName, "pk" => $val));
		}
		elseif($type == 2)
		{
			# Update for the news
			$fileName = "images/".$fileName;
			$user = $pdo->prepare("Insert into images(art, name) values(:pk, :photo)");
			$user->execute(array("photo" => $fileName, "pk" => $val));
		}
		# Update for the news
		elseif($type == 3)
		{
			# Updates the database
			$fileName = "images/".$fileName;
			$user = $pdo->prepare("Update papers Set Image = :photo where paper_id = :pk");
			$user->execute(array("photo" => $fileName, "pk" => $val));
		}
	}

	# Saves the Resume
	function resSave($val, $pdo, $type = 1)
	{
		# Calculates the address
		$target_dir = "../resume/";
		$target_file = (basename($_FILES['ResumeToUpload']['name']));
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		$fileName = strval(rand(0,100000000));
		if($imageFileType != "")
		{
			$fileName = $fileName.".".$imageFileType;
		}
		else
		{
			$fileName = "";
		}

		# Makes sure that it is actually an image and insert
		move_uploaded_file($_FILES['ResumeToUpload']['tmp_name'], $target_dir.$fileName);

		# Updates the database
		$fileName = "resume/".$fileName;

		# Update for the person
		if($type == 1)
		{
			$user = $pdo->prepare("Update person Set Resume = :photo Where person_id = :pk");
			$user->execute(array("photo" => $fileName, "pk" => $val));
		}

		# Update for the something else?
//		if($type == 2)
//		{
//			$user = $pdo->prepare("Insert into images(art, name) values(:pk, :photo)");
//			$user->execute(array("photo" => $fileName, "pk" => $val));
//		}
	}

	function Publications($numProject, $pdo)
	{
		# Get the Papers
		$papers = $pdo->prepare("Select * from papers where Project = :proj limit 15");
		$papers->execute(array("proj" => $numProject));
		$papers = $papers->fetchall();

		# Display the papers
		echo("<div id = publications>");
		foreach($papers as $paper)
		{
			echo($paper["Author"].",\"".$paper["title"]."\",".$paper["Journal"]."(".$paper["Year"].")");
		}
		echo("</div>");
	}
?>
<script src="../functions.js"></script>
