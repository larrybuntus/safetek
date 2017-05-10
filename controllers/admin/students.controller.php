<?php  
	/**
	* students controller class
	*/
	class Students
	{
		protected $func;
		public $students = [];
		public $result = null;

		function __construct()
		{
			$this->func = new myFunc;
		}

		public function index($search = null){
			// get default view
			if($search === null)
				$result = $this->func->myQuery("SELECT * FROM students WHERE 1 = ?", "i", array(1), "result");
			else
				$result = $this->func->myQuery("SELECT * FROM students WHERE name LIKE CONCAT('%', ?, '%') OR email LIKE CONCAT('%', ?, '%') OR reference_number LIKE CONCAT('%', ?, '%') OR index_number LIKE CONCAT('%', ?, '%') OR number LIKE CONCAT('%', ?, '%')", "sssss",array($search,$search,$search,$search,$search), "result");
			// check if result is empty
			if ($result->num_rows > 0)
				foreach ($result as $row)
					$students[] = $row;
			else
				$students = false;

			return $students;
		}
	}
?>