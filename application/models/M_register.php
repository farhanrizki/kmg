<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_register extends CI_Model{
	
	function __construct(){
        parent::__construct();
    }

    function getRole(){
		$this->db->select('*')->from('role_user');
        $query = $this->db->get();
        return $query->result_array();
	}

    function checkUsername($username){
        $this->db->select('*');    
        $this->db->from('tb_user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function simpanUser($id_role,$nama_lengkap,$username,$password){
        $data = array('id_role'=>$id_role,'nama_lengkap'=>$nama_lengkap,'username'=>$username,'password'=>sha1(md5("xyz-".$password."-zyx")));
        $this->db->insert('tb_user',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function updatePassword($username,$password){
        $data = array('password'=>sha1(md5("xyz-".$password."-zyx")));
        $this->db->where('username', $username);
        $this->db->update('tb_user', $data);
        return true;
    }

}