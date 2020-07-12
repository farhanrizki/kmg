<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_nilai_learning extends CI_Model{

	function __construct(){
        parent::__construct();
    }

    function getNilai(){
        $this->db->select('*')->from('nilai_self_learning t1');
		$this->db->join('staff_app t2', 't2.pn = t1.pn');
		$this->db->join('self_learning t3', 't3.id_selflearning = t1.id_selflearning');
        $query = $this->db->get();
        return $query->result_array();
    }

    function hapusNilai($id_nilai){
        $this->db->where('id_nilai', $id_nilai);
        $this->db->delete('nilai_self_learning'); 
        return true;
    }
}