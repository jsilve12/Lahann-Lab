<?php
	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=Lahann','Jonathan', 'Hatter12');

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	class level
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
		level::professor => "Principal Investigator",
		level::postDoc => "Post Docs" ,
		level::gradStudents => "Ph.D Students",
		level::visiting => "Visiting Students",
		level::underGrad => "Undergraduate Students",
		level::alumPostDoc => "Alumni Post Docs",
		level::alumPhD => "Alumni Ph.D Students",
		level::alumMasters => "Alumni Masters",
		level::alumVisiting => "Visiting Students Alumni",
		level::alumUnderGrad => "Alumni Undergrads"
	)
?>
