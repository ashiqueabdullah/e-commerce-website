<?php
	include 'session.php';
	Session::checkLogin();
	include 'database.php';
	include 'format.php';
?>

<?php
class AllLoginFunction{
	private $fm;
	private $db;
	function __construct()
	{
		$this->db= new Database();
		$this->fm= new Format();
	}
	public function adminLogin($adminName,$adminPassword){
		$adminName=$this->fm->validation($adminName);
		$adminPassword=$this->fm->validation($adminPassword);


		if (empty($adminName) || empty($adminName)) {
			$loginMsz="User Name or Passsword must not be Empty!";
			return $loginMsz;
		}else{
			$query="SELECT * FROM admin_login WHERE adminUser='$adminName' AND 
			adminPass='$adminPassword'";
			$result=$this->db->select($query);
			if ($result==true) {
				$value=$result->fetch_assoc();
				Session::set("AdminLogin",true);
				Session::set("adminName",$value['adminName']);
				Session::set("adminPassword",$value['adminPass']);
				header("Location:order.php");
			}else{
				$loginMsz="User Name or Passsword not Match!";
				return $loginMsz;
			}
		}
	}
}

?>

