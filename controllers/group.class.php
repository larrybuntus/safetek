<?php 
/**
* 
*/
class Group
{
	protected $func;
	private $members = array();

	function __construct()
	{
		$this->func = new myFunc;
	}

	public function create($hostels_meetpoints_id, $name, $student_id){
		$group_id = null;
		$group_name = null;
  		// get group name and meetpoint id
  		$dateCreated = date("Y-m-d H:i:s");

  		// preapre statement to create group in db
  		$stmt = $this->func->myQuery("INSERT INTO groups(name,dateCreated,hostels_meetpoints_id) VALUES (?,?,?)","ssi", array($name, $dateCreated, $hostels_meetpoints_id), "action");

  		// check if statement execution is valid
  		if ($stmt === false) {
  			return [false,false];
  		}else{
  			// get group id using prepare statement
  			$stmt = $this->func->myQuery("SELECT * FROM groups WHERE name = ? AND hostels_meetpoints_id = ? ORDER BY id DESC LIMIT 1", "si", array($name, $hostels_meetpoints_id),"fetch");
  			if($stmt === false){
  				return [false,false];
  			}else{
  				$group_id = $stmt['id'];
  				$group_name = $stmt['name'];

	  			if ($group_id === null)
	  				return [false,false];
	  			
	  			// add student to group student table
	  			$stmt = $this->func->myQuery("INSERT INTO groups_students(group_id, student_id, dateCreated) VALUES (?,?,?)","iis", array($group_id, $student_id, $dateCreated), "action");

	  			if ($stmt === false) {
	  				return [false,false];
	  			}else{
	  				return [$group_id,$group_name];
	  			}
	  		}
  		}
  	}

  	public function join($group, $student){
  		$date = date("Y-m-d H:i:s");
			
		$row = $this->func->myQuery("SELECT * FROM groups_students WHERE group_id = ? AND student_id = ? AND active = 1","ii",array($group,$student),"fetch");

		if (!empty($row['active']))
			return true;
		else{
  			$result = $this->func->myQuery("INSERT INTO groups_students(group_id,student_id,dateCreated) VALUES (?,?,?)","iis",array($group,$student,$date),"action");

  			return $result;
  		}
  	}

  	public function members($group){
  		$result = $this->func->myQuery("SELECT * FROM students WHERE id IN (SELECT student_id FROM groups_students WHERE group_id = ? AND active = 1)", "i", array($group), "result");

  		if ($result->num_rows == 0)
  			return false;
  		else
  			foreach ($result as $row)
  				$members[] = $row;

  		return $members;
  	}

  	public function setoff($group_id){
  		$result = $this->func->myQuery("UPDATE groups SET active = ? WHERE id = ?", "ii", array(0,$group_id),"action");

  		return $result;
  	}

  	public function exiting($group,$student){
  		// check if last person on group
  		$result = $this->func->myQuery("SELECT COUNT(*) AS count FROM groups_students WHERE group_id = ? AND active = 1","i",array($group),"fetch");
  		if ($result['count'] == 1) {
  			$query = $this->func->myQuery("UPDATE groups SET active = 0 WHERE id = ?", "i", array($group),"action");
  		}

  		$result = $this->func->myQuery("UPDATE groups_students SET active = ? WHERE group_id = ? AND student_id = ?", "iii", array(0,$group,$student),"action");

  		return $result;
  	}

    public function emergency($group,$student,$latitude,$longitude){
      if ($latitude == "undefined")
        $latitude = null;
      if ($longitude == "undefined")
        $longitude = null;

      $result = $this->func->myQuery("UPDATE groups_students SET emergency = ?, latitude = ?, longitude = ? WHERE group_id = ? AND student_id = ?", "issii", array(1,$latitude,$longitude,$group,$student), "action");

      return $result;
    }
}
?>