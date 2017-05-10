<?php  
	/**
	* 
	*/
	class Chat
	{
		protected $func;
		private $message = [];

		function __construct()
		{
			$this->func = new myFunc;
		}

		public function index($group){
			$result = $this->func->myQuery("SELECT chats.id,group_id,student_id,message,chats.dateCreated,name,img FROM chats INNER JOIN students ON students.id = chats.student_id WHERE group_id = ? ORDER BY chats.id ASC", "i", array($group), "result");

			if ($result->num_rows == 0)
				return false;
			else
				foreach ($result as $row)
					$message[] = $row;
			return $message;
		}

		public function message($group,$student,$message){
			$result = $this->func->myQuery("INSERT INTO chats(group_id,student_id,message) VALUES (?,?,?)", "iis", array($group,$student,$message),"action");
			return $result;
		}
	}
?>