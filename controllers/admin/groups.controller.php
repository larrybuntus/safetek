<?php  
	/**
	* groups controller
	*/
	class Groups
	{
		protected $func;
		public $groups = [];
		public $students = [];

		function __construct()
		{
			$this->func = new myFunc;
		}

		public function index($start,$end){
			// query for group
			$result = $this->func->myQuery("
				SELECT groups.id,groups.name,groups.active,groups.dateCreated,meetpoints.name as meetpoint
				FROM groups 
				INNER JOIN hostels_meetpoints ON hostels_meetpoints.id = hostels_meetpoints_id
				INNER JOIN meetpoints ON meetpoints.id = hostels_meetpoints.meetpoint_id
				WHERE DATE(dateCreated) BETWEEN ? AND ?", "ss", array($start,$end), "result");

			// put in array
			if($result->num_rows > 0)
				foreach ($result as $row)
					$groups[] = $row;
			else
				$groups = false;

			// query groups students
			$result = $this->func->myQuery("
				SELECT group_id, student_id, name, number, email, reference_number, index_number, img 
				FROM groups_students 
				INNER JOIN students ON students.id = groups_students.student_id
				WHERE 1 = ?
				ORDER BY groups_students.id ASC", "i", array(1), "result");

			// put in array
			if($result->num_rows > 0)
				foreach ($result as $row) {
					$students[] = $row;
				}
			else
				$students = false;

			// count active groups
			$row = $this->func->myQuery("SELECT COUNT(*) as count FROM groups WHERE active = ?","i",array(1),"fetch");
			$active = $row['count'];

			// return results
			return [$groups,$students,$active];

		}
	}
?>