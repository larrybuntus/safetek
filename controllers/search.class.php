<?php  
	/**
	* 
	*/
	class Search
	{
		protected $func;
		public $hostels = array();

		function __construct()
		{
			$this->func = new myFunc;
		}

		public function index(){
			$result = $this->func->myQuery("SELECT * FROM hostels WHERE 1 = ?", "i", array(1), "result");

			foreach ($result as $row) {
				$hostels[] = $row;
			}

			return $hostels;
		}

		public function search($name){
			$result = $this->func->myQuery("SELECT * FROM hostels WHERE name LIKE CONCAT('%', ?, '%')", "s", array($name), "result");

			if ($result->num_rows == 0)
				return false;

			foreach ($result as $row) {
				$hostels[] = $row;
			}

			return $hostels;
		}
	}
?>