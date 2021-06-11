<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logout extends CI_Controller {
    public function __construct(){
		parent::__construct();
		no_access();
	}
	public function index(){
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('skpd');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi AREP LUNGE');
		redirect('login');
	}
}

/* End of file Logout.php */
