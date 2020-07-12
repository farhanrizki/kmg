<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_bidang extends CI_Model{

	function __construct(){
        parent::__construct();
    }

    function tambahBidang($nama_bidang){
        $data = array('nama_bidang'=>$nama_bidang);
        $this->db->insert('bidang',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function updateBidang($id_bidang,$nama_bidang){
        $data = array('nama_bidang'=>$nama_bidang);
        $this->db->where('id_bidang', $id_bidang);
        $this->db->update('bidang', $data);
        return true;
    }

    function hapusBidang($id_bidang){
        $this->db->where('id_bidang', $id_bidang);
        $this->db->delete('bidang'); 
        return true;
    }

}