<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function index(){
		$this->load->view('login');
	}
	
	function login(){
		if(!$this->input->post()) {
			$this->load->view('login');
		}else{
			$this->load->model('m_akun');
			$user_data = $this->m_akun->login($this->input->post('username'), $this->input->post('password'));
			if(!empty($user_data)) {
				unset($user_data['password']);
				$this->session->set_userdata('user_data', $user_data);
				if($this->input->get('dst')) {
					redirect(rawurldecode($this->input->get('dst')));
				}
				redirect('home');
			}else{
				if($this->input->get('dst')) {
					redirect('auth/login?dst='.$this->input->get('dst'));
				}else{
					redirect('auth');
				}
			}
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
	
	/*public function check_sess_ajax(){
		if($this->session->userdata('user_data')) {
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
	}
	
	public function cek_login(){
		echo json_encode(false);
	}
	
	public function modal_login(){
		if(!$this->input->post()) {
			$this->load->view('modal_login');
		}else{
			$this->load->model('account_model');
			$user_data = $this->account_model->login($this->input->post('username'), $this->input->post('pwd'));
			if(!empty($user_data)) {
				unset($user_data['password']);
				$this->session->set_userdata('user_data', $user_data);
				echo json_encode(true);
			}else{
				echo json_encode(false);
			}
		}
	}*/
	
}

/* End of file mater_perencana.php */
/* Location: ./application/controllers/master/master_perencana.php */