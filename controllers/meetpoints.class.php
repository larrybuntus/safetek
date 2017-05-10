<?php  
	/**
	* 
	*/
	class Meetpoints
	{
		protected $func;
		public $meetpoints = array();

		function __construct()
		{
			$this->func = new myFunc;
		}

		public function index($hostel_id){
			$result = $this->func->myQuery("SELECT hostels_meetpoints.id as hostel_meetpoint, meetpoints.name as name, meetpoints.id as meetpoint_id FROM meetpoints INNER JOIN hostels_meetpoints ON meetpoint_id = meetpoints.id AND hostel_id = ?
", "i", array($hostel_id), "result");

			if ($result->num_rows == 0) {
				return false;
			}else{
				foreach ($result as $row) {
					$meetpoints[] = $row;
				}

				return $meetpoints;
			}
		}

		public function hostel_meetpoint($hostel_id, $meetpoint_id){
			$result = $this->func->myQuery("SELECT * FROM hostels_meetpoints WHERE hostel_id = ? AND meetpoint_id = ? LIMIT 1", "ii", array($hostel_id,$meetpoint_id), "fetch");

			if ($result === null) {
				return false;
			}else{
				return $result['id'];
			}
		}

		public function group($hostel_meetpoint){
			$result = $this->func->myQuery("SELECT * FROM groups WHERE hostels_meetpoints_id = ? AND active = 1", "i", array($hostel_meetpoint), "fetch");
			$id = $result['id'];

			$count = $this->func->myQuery("SELECT COUNT(*) AS peeps FROM groups_students WHERE group_id = ? AND active = 1","i",array($id),"fetch");
			if ($result === null) {
				return false;
			}else{
				return [$id,$result['name'],$count['peeps']];
			}
		}
	}
?>