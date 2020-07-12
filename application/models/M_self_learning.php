<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_self_learning extends CI_Model{

	function __construct(){
        parent::__construct();
    }

    function getLearning(){
        $query = $this->db->get('self_learning');
        return $query->result_array();  
    }

    function tambahLearning($nama_selflearning,$nota_dinas,$materi){
        $data = array('nama_selflearning'=>$nama_selflearning,'nota_dinas'=>$nota_dinas,'materi'=>$materi);
        $this->db->insert('self_learning',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function updateLearning($id_selflearning,$nama_selflearning,$nota_dinas,$materi){
        $data = array('nama_selflearning'=>$nama_selflearning,'nota_dinas'=>$nota_dinas,'materi'=>$materi);
        $this->db->where('id_selflearning', $id_selflearning);
        $this->db->update('self_learning', $data);
        return true;
    }

    function hapusLearning($id_selflearning){
        $this->db->where('id_selflearning', $id_selflearning);
        $this->db->delete('self_learning'); 
        return true;
    }

}