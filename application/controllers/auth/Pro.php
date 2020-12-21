<?php
class Pro extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('logpro');
 
	}
 
	function index(){
		$this->load->view('auth/logpro');
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->logpro->cek_login("procoor",$where)->num_rows();
		if($cek > 0){
 
			redirect(base_url("index.php/admin"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
}