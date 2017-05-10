<?php  
	/**
	* 
	*/
	class Login
	{
		// function variable
		protected $func;

		function __construct()
		{
			// constructor functions
			$this->func = new myFunc;
		}

		public function login($reference, $index, $password){
			$student = $this->func->myQuery("SELECT * FROM students WHERE index_number = ? AND reference_number = ? LIMIT 1", "ii", array($index,$reference), "fetch");

			// check if variable is set
			if (!empty($student['reference_number'])) {
				$name = $student['name'];
				$img = $student['img'];
				$id = $student['id'];
				$dbpass = $student['password'];

				// check if password if correct
				if (hash_equals($dbpass, crypt($password, $dbpass))) {
					return [$id, $name, $img];
				}else{
					return ["incorrect", "incorrect", "incorrect"];
				}
			}else{
				return ["invalid", "invalid", "invalid"];
			}

		}
	}
?>