<?php 
    
class Forgot_password extends CI_Controller{

    function __construct(){
    	parent::__construct();
    	$this->load->model('m_register');
    }

    function index(){
		$data['username']     = "";
		$data['password']     = "";
		$data['confpassword'] = "";
    	$this->load->view('forgotPassword', $data);
    }

    function cek(){
		$username       = $this->input->post('username');
		$password       = $this->input->post('password');
		$confpassword   = $this->input->post('confpassword');
		$check_username = $this->m_register->checkUsername($username);
		if($check_username){
			if($password != $confpassword){
				$data['username']     = $username;
				$data['password']     = $password;
				$data['confpassword'] = $confpassword;
				$data['confpass']     = '<div class="form-label-group">
	                                	 <span style="color:red;">Konfirmasi password harus sama!!!</span>
	                              	     </div>';
	            $this->load->view('forgotPassword', $data);
			}else{
				$update = $this->m_register->updatePassword($username,$password);
				if($update){
	                echo '<script language="javascript">';
		            echo 'alert("Password berhasil diubah")';
		            echo '</script>';
		            redirect('auth', 'refresh');
	            }else{
	                $data['username']     = $username;
					$data['password']     = $password;
					$data['confpassword'] = $confpassword;
					$data['error']	      = '<div class="form-label-group">
		                                	 <span style="color:red;">Password gagal diubah!!!</span>
		                              	     </div>';
		            $this->load->view('forgotPassword', $data);
	            }
			}
            $this->load->view('forgotPassword', $data);
		}else{
			$data['username']     = $username;
			$data['password']     = $password;
			$data['confpassword'] = $confpassword;
			$data['notexist']     = '<div class="form-label-group">
                                	 <span style="color:red;">Username tidak terdaftar!!!</span>
                              	     </div>';
            $this->load->view('forgotPassword', $data);
		}
    }
}