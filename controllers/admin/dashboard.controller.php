<?php  
	/**
	* dashboard controller class
	*/
	class Dashboard
	{
		protected $func;
		public $alerts = [];
		public $result_date = [];

		function __construct()
		{
			$this->func = new myFunc;
		}

		public function index($start_date,$end_date){
			// get alerts
			$result = $this->func->myQuery("
				SELECT gs.id, group_id, student_id, gs.active, gs.dateCreated, gs.emergencyDate, emergency, latitude, longitude, s.name as student, g.name as group_name
				FROM groups_students gs 
				INNER JOIN groups g ON g.id = gs.group_id
				INNER JOIN students s ON s.id = gs.student_id
				WHERE emergency = ? ORDER BY gs.id DESC", "i", array(1), "result");

			if ($result->num_rows > 0)
				foreach ($result as $row)
					$alerts[] = $row;
			else
				$alerts = false;

			// find date difference
			$date_diff = abs(strtotime($start_date) - strtotime($end_date))/(60*60*24);

			// check if dates are of the same month
			$month_diff = abs(date('m',strtotime($start_date)) - date('m',strtotime($end_date)));

			// check if dates are of the same year
			$year_diff = abs(date("Y",strtotime($start_date)) - date("Y",strtotime($end_date)));

			$date = $start_date;
			// for date difference equal or less than a week
			if ($date_diff <= 7) {
				while (strtotime($date) <= strtotime($end_date)) {
                	
	                $result = $this->func->myQuery("SELECT COUNT(*) as count FROM groups WHERE DATE(dateCreated) = ?","s",array($date),"fetch");
	                
	                // format date
	                $format_date = date("D", strtotime($date));
	                $result['dateCreated'] = $format_date;

	                $result_date[] = $result;

	                // add 1 day to date
	                $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
				}
			}

			// if different is greater than a week and still in the same month
			if ($date_diff > 7 && $date_diff <= 31 && $month_diff == 0) {
				// foreach time between the range given
				do{
					// get day number
					$add = abs(6 - date("w",strtotime($date)));

					$sdate = $date;
					// if sunday, make start of week
					$next_date = date("Y-m-d", strtotime("+{$add} day", strtotime($date)));
					// determine whether next date is greater than end date
					if(strtotime($next_date) > strtotime($end_date))
						$date = $end_date;
					// recompute add
		            if (abs(6 - date("w", strtotime($next_date))) == 0)
		            	$date = date("Y-m-d", strtotime("+1 day", strtotime($next_date)));

					if(strtotime($next_date) > strtotime($end_date))
						$edate = $end_date;
					else    
		            	$edate = date("Y-m-d", strtotime("-1 day", strtotime($date)));

		            $result = $this->func->myQuery("SELECT COUNT(*) as count FROM groups WHERE DATE(dateCreated) BETWEEN ? AND ?","ss",array($sdate,$edate),"fetch");

		            // format date
		            $format_date = date("jS M", strtotime($sdate)).' - '.date("jS M", strtotime($edate));
		            $result['dateCreated'] = $format_date;

		            $result_date[] = $result;

				}while(strtotime($date) < strtotime($end_date));
			}

			return [$alerts,$result_date];
		}

		public function mute($id,$date){
			return $this->func->myQuery("UPDATE groups_students SET emergency = ?, emergencyDate = ? WHERE id = ?","isi",array(0,$date,$id),"action");
		}
	}
?>