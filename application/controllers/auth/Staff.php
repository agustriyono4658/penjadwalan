<?php
class Staff extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('logstaff');
 
	}
 
	function index(){
		$this->load->view('auth/logstaff');
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->logstaff->cek_login("staff",$where)->num_rows();
		if($cek > 0){
 
			redirect(base_url("index.php/staff"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
}