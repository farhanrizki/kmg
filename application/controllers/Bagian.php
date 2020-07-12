<?php 
    
class Bagian extends CI_Controller{

    function __construct(){
    	parent::__construct();
        $this->load->model(array('m_bagian','m_staff_app'));
    }

    function index(){
        if(isset($_POST['tambahbagian'])){
            $this->tambahbagian();
        }else if(isset($_POST['updatebagian'])){
            $this->updatebagian();
        }else if(isset($_POST['hapusbagian'])){
            $this->hapusbagian();
        }else{
            $data['page_title'] = 'Bagian';
            $data['getBagian']  = $this->m_staff_app->getBagian();
            $this->load->view('header', $data); 
            $this->load->view('bagian');
            $this->load->view('footer');
        } 
    }

    function tambahbagian(){
        $nama_bagian = $this->input->post('nama_bagian');
        $simpan      = $this->m_bagian->tambahBagian($nama_bagian);
        if($simpan){
            echo '<script language="javascript">';
            echo 'alert("Data bagian berhasil ditambahkan")';
            echo '</script>';
            redirect('bagian', 'refresh');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Data bagian gagal ditambahkan!!!")';
            echo '</script>';
            redirect('bagian', 'refresh');
        }
    }

    function updatebagian(){
        $id_bagian   = $this->input->post('id_bagian');
        $nama_bagian = $this->input->post('nama_bagian');
        $update      = $this->m_bagian->updateBagian($id_bagian,$nama_bagian);
        if($update){
            echo '<script language="javascript">';
            echo 'alert("Data bagian berhasil diupdate")';
            echo '</script>';
            redirect('bagian', 'refresh');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Data bagian gagal diupdate!!!")';
            echo '</script>';
            redirect('bagian', 'refresh');
        }
    }

    function hapusbagian(){
        $id_bagian = $this->input->post('id_bagian');
        $hapus     = $this->m_bagian->hapusBagian($id_bagian);
        if($hapus){
            echo '<script language="javascript">';
            echo 'alert("Data bagian berhasil dihapus")';
            echo '</script>';
            redirect('bagian', 'refresh');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Data bagian gagal dihapus!!!")';
            echo '</script>';
            redirect('bagian', 'refresh');
        }
    }
}