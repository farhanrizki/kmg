<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_staff_app extends CI_Model{

	function __construct(){
        parent::__construct();
    }

    function getData(){
		$this->db->select('*')->from('staff_app t1');
		$this->db->join('bagian t2', 't2.id_bagian = t1.bagian');
		$this->db->join('bidang t3', 't3.id_bidang = t1.bidang');
        $query = $this->db->get();
        return $query->result_array();
	}

	function getBagian(){
		$query = $this->db->get('bagian');
        return $query->result_array();  
	}

	function getBidang(){
		$query = $this->db->get('bidang');
        return $query->result_array();  
	}

	function pnExist($pn){
	    $this->db->where('pn',$pn);
	    $query = $this->db->get('staff_app');
	    if ($query->num_rows() > 0){
	        return true;
	    }else{
	        return false;
	    }
	}

	function tambahStaff($pn,$nama,$bagian,$bidang){
        $data = array('pn'=>$pn,'nama'=>$nama,'bagian'=>$bagian,'bidang'=>$bidang);
        $this->db->insert('staff_app',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function updateStaff($pn,$nama,$bagian,$bidang){
        $data = array('nama'=>$nama,'bagian'=>$bagian,'bidang'=>$bidang);
        $this->db->where('pn', $pn);
        $this->db->update('staff_app', $data);
        return true;
    }

    function hapusStaff($pn){
        $this->db->where('pn', $pn);
        $this->db->delete('staff_app'); 
        return true;
    }

}