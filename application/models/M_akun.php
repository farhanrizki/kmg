<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_akun extends CI_Model{
	
	function __construct(){
        parent::__construct();
    }
	
	/*function add_user($nama_lengkap, $username, $password,$role){
		$data = array(	
			'nama_lengkap' => $nama_lengkap,
			'username' => $username,
			'password' => md5("xx-".$password."-xx"),
			'id_role' => $role
		);
		$this->db->insert('master_user', $data);
		//return $this->db->insert_id();
	}*/
	
	function login($username, $password){
		$this->db->select('*')->from('tb_user t1');
		$this->db->join('role_user t2', 't2.id_role = t1.id_role');
		$this->db->where('t1.username', $username);
		$this->db->where('t1.password', sha1(md5("xyz-".$password."-zyx")));
        $query = $this->db->get();
        return $query->row_array();
	}
    
    function login_encrypted($username, $pwd){
		$this->db
            ->select('*')
            ->from('master_user')
            ->where('username', $username)
            ->where('password', $pwd);
        $query = $this->db->get();
        return $query->row_array();
	}
	
}
