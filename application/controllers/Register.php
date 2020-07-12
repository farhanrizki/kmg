<?php 
    
class Register extends CI_Controller{

    function __construct(){
    	parent::__construct();
    	$this->load->model('m_register');
    }

    function index(){
		$data['namalengkap']  = "";
		$data['username']     = "";
		$data['password']     = "";
		$data['confpassword'] = "";
		$data['roleuser']     = $this->m_register->getRole();
    	$this->load->view('register', $data);
    }

    function input(){
		$namalengkap    = $this->input->post('namalengkap');
		$username       = $this->input->post('username');
		$roleuser       = $this->input->post('roleuser');
		$password       = $this->input->post('password');
		$confpassword   = $this->input->post('confpassword');
		$check_username = $this->m_register->checkUsername($username);
		if($check_username){
			$data['namalengkap']  = $namalengkap;
			$data['username']     = $username;
			$data['password']     = $password;
			$data['confpassword'] = $confpassword;
			$data['roleuser']     = $this->m_register->getRole();
			$data['userexist']    = '<div class="form-label-group">
                                	 <span style="color:red;">Username sudah ada, harap ganti yang lain</span>
                              	     </div>';
            $this->load->view('register', $data);
		}else{
			if($password != $confpassword){
				$data['namalengkap']  = $namalengkap;
				$data['username']     = $username;
				$data['password']     = $password;
				$data['confpassword'] = $confpassword;
				$data['roleuser']     = $this->m_register->getRole();
				$data['confpass']     = '<div class="form-label-group">
	                                	 <span style="color:red;">Konfirmasi password harus sama!!!</span>
	                              	     </div>';
	            $this->load->view('register', $data);
			}else{
				$simpan = $this->m_register->simpanUser($roleuser,$namalengkap,$username,$password);
	            if($simpan){
	                echo '<script language="javascript">';
		            echo 'alert("Register berhasil, silahkan login")';
		            echo '</script>';
		            redirect('auth', 'refresh');
	            }else{
	                $data['namalengkap']  = $namalengkap;
					$data['username']     = $username;
					$data['password']     = $password;
					$data['confpassword'] = $confpassword;
					$data['roleuser']     = $this->m_register->getRole();
					$data['error']	      = '<div class="form-label-group">
		                                	 <span style="color:red;">Data gagal disimpan!!!</span>
		                              	     </div>';
		            $this->load->view('register', $data);
	            }
			}
		}
    }

}