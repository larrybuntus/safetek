<?php  
	/**
	* login controller
	*/
	class Logs
	{
		protected $func;
		public $returns = [];
		
		function __construct()
		{
			$this->func = new myFunc;
		}

		// default operations
		public function index($credential, $password){
			// look up email
			$row = $this->func->myQuery("SELECT * FROM admin WHERE email = ? OR username = ? OR number = ?", "sss",array($credential,$credential,$credential),"fetch");
			// check if field is set
			if (empty($row['number']))
				return "credential";
			else{
				// set password variable
				$dbPass = $row['password'];
				$id = $row['id'];
				if(password_verify($password, $dbPass)){
					$returns = array("id"=>$id,"name"=>$row['name']);

					// update session
					$this->func->myQuery("UPDATE admin SET sessions = sessions + 1 WHERE id = ?","i",array($id),"action");

					return $returns;
				}else
					return "password";
			}
		}

		public function forgotten($email){
			$result = $this->func->myQuery("SELECT * FROM admin WHERE email = ?","s",array($email),"fetch");

			if (!empty($result['password']))
				return $result;
			else
				return false;
		}

		public function decode($id,$date,$cipher){
			$result = $this->func->myQuery("SELECT * FROM reset WHERE cipher_date = ? AND cipher_iv = ?","ss",array($date,$cipher),"fetch");
			if (isset($result['id']))
				return [false,false];

			// get ciphers into database
			$dbdate = $date;
			$dbcipher = $cipher;
 
			// decode iv
			$iv = base64_decode($cipher);

			// decrypt data
			$id 	= (int)openssl_decrypt($id, "AES-256-CTR", base64_encode("encryption_passphrase"),0,$iv);
			$date 	= openssl_decrypt($date, "AES-256-CTR", base64_encode("encryption_passphrase"),0,$iv);

			if (((strtotime($date) - strtotime(date("Y-m-d H:i:s")))/3600) > 24.0)
				$date = false;

			if (!is_int($id) || $id == 0)
				$id = false;

			// populate db with ciphers
			if ($date !== false && $id !== false)
				$this->func->myQuery("INSERT INTO reset(cipher_date,cipher_iv) VALUES (?,?)","ss",array($dbdate,$dbcipher),"action");

			return [$id,$date];
		}

		public function reset($id,$npass){
			$password = password_hash($npass, PASSWORD_DEFAULT);

			return $this->func->myQuery("UPDATE admin SET password = ? WHERE id = ?","si",array($password,$id),"action");
		}
	}
?>