<?php
require_once '../config.php';
class Login extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;

		parent::__construct();
		ini_set('display_error', 1);
	}
	public function __destruct(){
		parent::__destruct();
	}
	public function index(){
		echo "<h1>Access Denied</h1> <a href='".base_url."'>Go Back.</a>";
	}
	public function login(){
		extract($_POST);

		$qry = $this->conn->query("SELECT * from users where username = '$username' and password = md5('$password') ");
		if($qry->num_rows > 0){
			foreach($qry->fetch_array() as $k => $v){
				if(!is_numeric($k) && $k != 'password'){
					$this->settings->set_userdata($k,$v);
				}

			}
			$this->settings->set_userdata('login_type',1);
		return json_encode(array('status'=>'success'));
		}else{
		return json_encode(array('status'=>'incorrect','last_qry'=>"SELECT * from users where username = '$username' and password = md5('$password') "));
		}
	}
	public function elogin(){
		extract($_POST);

		$qry = $this->conn->query("SELECT * from establishment where  code = '$code' ");
		if($qry->num_rows > 0){
			foreach($qry->fetch_array() as $k => $v){
				if(!is_numeric($k)){
					$this->settings->set_userdata($k,$v);
				}

			}
			$this->settings->set_userdata('login_type',2);
			return json_encode(array('status'=>'success'));
		}else{
		return json_encode(array('status'=>'incorrect'));
		}
	}
	public function rlogin(){
		extract($_POST);

		$qry = $this->conn->query("SELECT * from people where  email = '$email' and `password` =  md5('$password') ");
		if($qry->num_rows > 0){
			foreach($qry->fetch_array() as $k => $v){
				if(!is_numeric($k)){
					$this->settings->set_userdata($k,$v);
				}

			}
			$this->settings->set_userdata('login_type',3);
			return json_encode(array('status'=>'success'));
		}else{
		return json_encode(array('status'=>'incorrect'));
		}
	}
	public function logout(){
		if($this->settings->sess_des()){
			redirect('admin/login.php');
		}
	}
	public function elogout(){
		if($this->settings->sess_des()){
			redirect('establishment/login.php');
		}
	}
	public function rlogout(){
		if($this->settings->sess_des()){
			redirect('users/login.php');
		}
	}
}
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$auth = new Login();
switch ($action) {
	case 'login':
		echo $auth->login();
		break;
	case 'elogin':
		echo $auth->elogin();
		break;
	case 'rlogin':
		echo $auth->rlogin();
		break;
	case 'logout':
		echo $auth->logout();
		break;
	case 'elogout':
		echo $auth->elogout();
		break;
	case 'rlogout':
		echo $auth->rlogout();
		break;
	default:
		echo $auth->index();
		break;
}

