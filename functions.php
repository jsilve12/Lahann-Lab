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
	function imgSave($val, $pdo)
	{
		# Calculates the address
		$target_dir = "../images/";
		$target_file = (basename($_FILES['fileToUpload']['name']));
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		$fileName = strval(rand(0,100000000));
		$fileName = $fileName.".".$imageFileType;

		# Makes sure that it is actually an image and insert
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir.$fileName);

		# Updates the database
		$user = $pdo->prepare("Update person Set photo = :photo Where person_id = :pk");
		$user->execute(array("photo" => $fileName, "pk" => $val));
	}
?>
<!DOCTYPE html>
<html lang="en">

<head></head>
<body>
	<script>
	// Function for updating in the index page
    function editFunc(key, numb, val = document.getElementById(key).innerHTML, check = false)
    {
      if(check === "true" || document.getElementById(key).contentEditable === "true")
      {
        console.log("Sending");
        url = "update.php?k=";

        //Add the get parameters
        url = url.concat(key);
        url = url.concat("&v=");
        url = url.concat(val);
        url = url.concat("&pk=");
        url = url.concat(numb);
        console.log(url);

        //Actually interact with JSON
    	fetch(url)
    	  .then((response) =>{
            if (!response.ok) throw Error(response.statusText);
            console.log(response);
            return response.json();
          })
          .then((data) => {
            console.log(data);
          })
		console.log("Success");
        document.getElementById(key).contentEditable = false;
      }
      else
      {
        console.log("Editing");
        document.getElementById(key).contentEditable = true;
      }
    }

	// Function for the admin to update values
	function bigEditFunc(personId)
	{
		//Use the name row as a litmus for editability (if it has already been edited)
		if(document.getElementById(personId.toString().concat("name")).contentEditable == "true")
		{
			//Try catch this because the tail bit would cause an error
			try
			{
				console.log(personId)
				editFunc("name", personId.toString(), document.getElementById(personId.toString().concat("name")).innerHTML, "true");
			}
			catch{}
			try
			{
				editFunc("email", personId, document.getElementById(personId.toString().concat("email")).innerHTML, "true");
			}
			catch{}
			try
			{
				var selector = document.getElementById(personId.toString().concat("power"));
				editFunc("power", personId, selector[selector.selectedIndex].value, "true");
			}
			catch{}
			try
			{
				var selector = document.getElementById(personId.toString().concat("experience"));
				editFunc("experience", personId, selector[selector.selectedIndex].value, "true");
			}
			catch{}

			document.getElementById(personId.toString().concat("name")).contentEditable = false;
			document.getElementById(personId.toString().concat("experience")).disabled = true;
			document.getElementById(personId.toString().concat("power")).disabled = true;
			document.getElementById(personId.toString().concat("email")).contentEditable = false;
		}
		else
		{
			document.getElementById(personId.toString().concat("name")).contentEditable = true;
			document.getElementById(personId.toString().concat("experience")).disabled = false;
			document.getElementById(personId.toString().concat("power")).disabled = false;
			document.getElementById(personId.toString().concat("email")).contentEditable = true;
		}
	}
  </script>
</body>
