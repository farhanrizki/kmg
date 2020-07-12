<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_bagian extends CI_Model{

	function __construct(){
        parent::__construct();
    }

    function tambahBagian($nama_bagian){
        $data = array('nama_bagian'=>$nama_bagian);
        $this->db->insert('bagian',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function updateBagian($id_bagian,$nama_bagian){
        $data = array('nama_bagian'=>$nama_bagian);
        $this->db->where('id_bagian', $id_bagian);
        $this->db->update('bagian', $data);
        return true;
    }

    function hapusBagian($id_bagian){
        $this->db->where('id_bagian', $id_bagian);
        $this->db->delete('bagian'); 
        return true;
    }

}