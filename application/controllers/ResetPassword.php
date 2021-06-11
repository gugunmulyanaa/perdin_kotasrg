<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ResetPassword extends CI_Controller {
    public function __construct(){
		parent::__construct();
		no_access();
	}
	public function reset(){
        $id = $this->session->userdata('user');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'passconf', 'trim|required|matches[password]');
			if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Password Gagal dirubah, Coba lagi");
				redirect('setting');
			}else{
				$data=array(
					"password"=>md5($_POST['password']),
				);
				$this->db->where('username', $id);
				$this->db->update('admin',$data);
				$this->session->set_flashdata('sukses',"Password Berhasil di ganti");
				redirect('setting');
	    }
    }
}

/* End of file Logout.php */