<?php  
	/**
	* admin controller class
	*/
	class Admins
	{
		protected $func;
		public $admins = array();

		function __construct()
		{
			$this->func = new myFunc;
		}

		public function index(){
			$result = $this->func->myQuery("SELECT * FROM admin WHERE role = ? ORDER BY name ASC","i",array(0),"result");

			if ($result->num_rows > 0)
				foreach ($result as $row)
					$admins[] = $row;
			else
				$admins = false;

			return $admins;
		}

		public function add($name,$email,$number,$role,$img = null){
			$username = substr($email, 0, strpos($email, "@"));
			$password = password_hash($username, PASSWORD_DEFAULT);
			
			if ($img === null)
				return $this->func->myQuery("INSERT INTO admin(username,name,email,password,number,role) VALUES (?,?,?,?,?,?)","sssssi",array($username,$name,$email,$password,$number,$role),"action");
			else
				if ($this->func->imgUpload("../../assets/img/users/",$img['name'],$img['tmp_name'],$img['size']) === true)
					return $this->func->myQuery("INSERT INTO admin(username,name,email,password,number,role,img) VALUES (?,?,?,?,?,?,?)","sssssis",array($username,$name,$email,$password,$number,$role,basename($img['name'])),"action");
				else
					return false;
		}

		public function account($id){
			return $this->func->myQuery("SELECT * FROM admin WHERE id = ?","i",array($id),"fetch");
		}

		public function update($username,$name,$number,$email,$role,$id,$password,$img = null){
			$result = $this->func->myQuery("SELECT * FROM admin WHERE id = ?","i",array($id),"fetch");

			if (!password_verify($password,$result['password'])) {
				return "password";
				exit();
			}

			if ($img === null)
				return $this->func->myQuery("UPDATE admin SET username = ?, name = ?, number = ?, email = ?, role = ? WHERE id = ?","ssssii",array($username,$name,$number,$email,$role,$id),"action");
			else
				if ($this->func->imgUpload("../../assets/img/users/",$img['name'],$img['tmp_name'],$img['size']) === true)
					return $this->func->myQuery("UPDATE admin SET username = ?, name = ?, img = ?, number = ?, email = ?, role = ? WHERE id = ?","sssssii",array($username,$name,basename($img['name']),$number,$email,$role,$id),"action");
		}

		public function password($cpass,$npass,$id){
			$result = $this->func->myQuery("SELECT * FROM admin WHERE id = ?","i",array($id),"fetch");

			if (!password_verify($cpass,$result['password'])) {
				return "password";
				exit();
			}

			$password = password_hash($npass,PASSWORD_DEFAULT);

			return $this->func->myQuery("UPDATE admin SET password = ? WHERE id = ?","si",array($password,$id),"action");
		}
	}
?>