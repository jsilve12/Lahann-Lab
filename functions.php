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

	# Checks if you are logged in
	function loggedIn($arr)
	{
		if(isset($_SESSION['username']))
		{
			return 1;
		}
		return 2;
	}
?>
