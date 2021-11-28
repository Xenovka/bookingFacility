<?php 
class Auth extends CI_Model 
{
	public function __construct()
	{
        parent::__construct();
	}
 
	function register($username,$email,$password)
	{
		$data_user = array(
			'username'=>$username,
            'email'=>$email,
			'password'=>password_hash($password, PASSWORD_DEFAULT)
		);
		$this->db->insert('User',$data_user);
	}
}
?>