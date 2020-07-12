<?php 
    
class Bidang extends CI_Controller{

    function __construct(){
    	parent::__construct();
        $this->load->model(array('m_bidang','m_staff_app'));
    }

    function index(){
        if(isset($_POST['tambahbidang'])){
            $this->tambahbidang();
        }else if(isset($_POST['updatebidang'])){
            $this->updatebidang();
        }else if(isset($_POST['hapusbidang'])){
            $this->hapusbidang();
        }else{
            $data['page_title'] = 'Bidang';
            $data['getBidang']  = $this->m_staff_app->getBidang();
            $this->load->view('header', $data); 
            $this->load->view('bidang');
            $this->load->view('footer');
        } 
    }

    function tambahbidang(){
        $nama_bidang = $this->input->post('nama_bidang');
        $simpan      = $this->m_bidang->tambahBidang($nama_bidang);
        if($simpan){
            echo '<script language="javascript">';
            echo 'alert("Data bidang berhasil ditambahkan")';
            echo '</script>';
            redirect('bidang', 'refresh');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Data bidang gagal ditambahkan!!!")';
            echo '</script>';
            redirect('bidang', 'refresh');
        }
    }

    function updatebidang(){
        $id_bidang   = $this->input->post('id_bidang');
        $nama_bidang = $this->input->post('nama_bidang');
        $update      = $this->m_bidang->updateBidang($id_bidang,$nama_bidang);
        if($update){
            echo '<script language="javascript">';
            echo 'alert("Data bidang berhasil diupdate")';
            echo '</script>';
            redirect('bidang', 'refresh');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Data bidang gagal diupdate!!!")';
            echo '</script>';
            redirect('bidang', 'refresh');
        }
    }

    function hapusbidang(){
        $id_bidang = $this->input->post('id_bidang');
        $hapus     = $this->m_bidang->hapusBidang($id_bidang);
        if($hapus){
            echo '<script language="javascript">';
            echo 'alert("Data bidang berhasil dihapus")';
            echo '</script>';
            redirect('bidang', 'refresh');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Data bidang gagal dihapus!!!")';
            echo '</script>';
            redirect('bidang', 'refresh');
        }
    }
}