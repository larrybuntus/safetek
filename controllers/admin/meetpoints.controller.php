<?php  
	/**
	* meetpoint controller class
	*/
	class Meetpoints
	{
		protected $func;
		public $meetpoints = [];
		public $locations = [];

		function __construct()
		{
			$this->func = new myFunc;
		}

		public function index($location = null, $search = null){
			if ($location === null)
				$result = $this->func->myQuery("SELECT m.id, m.name, location_id, l.name as location FROM meetpoints m INNER JOIN locations l ON l.id = location_id WHERE 1 = ?","i",array(1),"result");
			else
				$result = $this->func->myQuery("SELECT m.id, m.name, location_id, l.name as location FROM meetpoints m INNER JOIN locations l ON l.id = location_id WHERE location_id = ?","i",array($location),"result");

			if ($search !== null)
				$result = $this->func->myQuery("SELECT m.id, m.name, location_id, l.name as location FROM meetpoints m INNER JOIN locations l ON l.id = location_id WHERE m.name LIKE CONCAT('%',?,'%')","s",array($search),"result");

			if ($result->num_rows > 0)
				foreach ($result as $row)
					$meetpoints[] = $row;
			else
				$meetpoints = false;

			$result = $this->func->myQuery("SELECT * FROM locations WHERE 1 = ?","i",array(1),"result");

			if ($result->num_rows > 0)
				foreach ($result as $row)
					$locations[] = $row;
			else
				$locations = false;

			return [$meetpoints,$locations];
		}

		public function delete($id){
			return $this->func->myQuery("DELETE FROM meetpoints WHERE id = ?", "i", array($id), "action");
		}

		public function add($name,$location){
			return $this->func->myQuery("INSERT INTO meetpoints(name,location_id) VALUES (?,?)","si",array($name,$location),"action");
		}

		public function edit($id, $name, $location){
			return $this->func->myQuery("UPDATE meetpoints SET name = ?, location_id =? WHERE id = ?", "sii", array($name,$location,$id),"action");
		}
	}
?>