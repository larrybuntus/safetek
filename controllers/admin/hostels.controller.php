<?php  
	/**
	* hostels controller
	*/
	class Hostels
	{
		protected $func;
		public $hostels = [];
		public $locations = [];
		public $meetpoints = [];
		public $hostels_meetpoints = [];

		function __construct()
		{
			$this->func = new myFunc;
		}

		public function index($location_id = null, $search = null){
			// get hostels
			if($location_id === null)
				$result = $this->func->myQuery("SELECT hostels.id, hostels.name, location_id, locations.name as location FROM hostels INNER JOIN locations ON locations.id = hostels.location_id WHERE 1 = ? AND deleted = 0", "i", array(1), "result");
			else
				$result = $this->func->myQuery("SELECT hostels.id, hostels.name, location_id, locations.name as location FROM hostels INNER JOIN locations ON locations.id = hostels.location_id WHERE deleted = 0 AND location_id = ?", "i", array($location_id), "result");

			if ($search !== null)
				$result = $this->func->myQuery("SELECT hostels.id, hostels.name, location_id, locations.name as location FROM hostels INNER JOIN locations ON locations.id = hostels.location_id WHERE deleted = 0 AND hostels.name LIKE CONCAT('%', ?, '%')", "s", array($search), "result");

			if($result->num_rows > 0)
				foreach ($result as $row)
					$hostels[] = $row;
			else
				$hostels = false;

			// get locations
			$result = $this->func->myQuery("SELECT * FROM locations WHERE 1 = ?", "i", array(1), "result");

			if($result->num_rows > 0)
				foreach ($result as $row)
					$locations[] = $row;
			else
				$locations = false;

			// get meetpoints
			$result = $this->func->myQuery("SELECT * FROM meetpoints WHERE 1 = ?", "i", array(1), "result");

			if($result->num_rows > 0)
				foreach ($result as $row)
					$meetpoints[] = $row;
			else
				$meetpoints = false;

			// get hostels meetpoints
			$result = $this->func->myQuery("SELECT * FROM hostels_meetpoints WHERE 1 = ?", "i", array(1), "result");

			if($result->num_rows > 0)
				foreach ($result as $row)
					$hostels_meetpoints[] = $row;
			else
				$hostels_meetpoints = false;

			return [$hostels,$locations,$meetpoints,$hostels_meetpoints];

		}

		public function add($name,$location,$meetpoints){
			$row = $this->func->myQuery("SELECT * FROM hostels WHERE name LIKE CONCAT('%', ?, '%')","s",array($name),"fetch");

			if(empty($row['name'])){
				$result = $this->func->myQuery("INSERT INTO hostels(name,location_id) VALUES (?,?)","si",array($name,$location), "action");

				if ($result === true) {
					$row = $this->func->myQuery("SELECT * FROM hostels ORDER BY id DESC LIMIT ?", "i", array(1), "fetch");
					$id = $row['id'];

					foreach ($meetpoints as $meetpoint) {
						$result = $this->func->myQuery("INSERT INTO hostels_meetpoints (meetpoint_id,hostel_id) VALUES (?,?)", "ii", array($meetpoint,$id), "action");

						if ($result === false)
							return false;
					}

					return true;
				}else{
					return false;
				}
			}else{
				return "exist";
			}
		}

		public function edit($id,$name,$location,$meetpoints = null){
			$result = $this->func->myQuery("UPDATE hostels SET name = ?, location_id = ? WHERE id = ?","sii",array($name,$location,$id),"action");

			if ($result === true) {
				if ($meetpoints === null) {
					return true;
				}else{
					foreach ($meetpoints as $meetpoint) {
						$result = $this->func->myQuery("INSERT INTO hostels_meetpoints (meetpoint_id,hostel_id) VALUES (?,?)", "ii", array($meetpoint,$id), "action");

						if ($result === false)
							return false;
					}

					return true;
				}
			}else{
				return false;
			}
		}

		public function delete($id){
			$result = $this->func->myQuery("UPDATE hostels SET deleted = 1 WHERE id = ?", "i", array($id), "action");

			return $result;
		}
	}
?>