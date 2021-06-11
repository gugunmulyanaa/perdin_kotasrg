<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct(){
		parent::__construct();
		in_access();
		$this->load->model('M_login');
	}
	public function index(){
		$this->load->view('login.php');
	}
	public function signin(){
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$username=$this->security->sanitize_filename($_POST['username']);
		$password=$this->security->sanitize_filename($_POST['password']);
		$ceknum=$this->M_login->ceknum($username,md5($password))->num_rows();
		$rows=$this->M_login->ceknum($username,md5($password))->row_array();
		if($ceknum>0){
			$this->session->set_userdata('user',$username);
			$this->session->set_userdata('skpd',$rows['skpd_id']);
			$this->session->set_userdata('level',$rows['akses']);
			if($rows['akses'] == 1){
				redirect('Dashboard');
			}else{
				redirect('Calendar');
			}
		}else{
			$this->session->set_flashdata('error','Maaf Anda Gagal Login Cek Kembali User & Password');
			redirect('Login');
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
