<?php

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

	}

	$types = array(
		level::professor => "Principal Investigator",
		level::postDoc => "Post Docs" ,
		level::gradStudents => "Ph.D Students",
		level::visiting => "Visiting Students",
		level::underGrad => "Undergraduate Students",
		level::alumPostDoc => "Alumni Post Docs",
		"Alumni Ph.D Students" => level::alumPhD,
		"Alumni Masters" => level::alumMasters,
		"Visiting Students Alumni" => level::alumVisiting,
		"Alumni Undergrads" => level::alumUnderGrad
	)
?>
