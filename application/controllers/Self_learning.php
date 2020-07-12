<?php 
    
class Self_learning extends CI_Controller{

    function __construct(){
    	parent::__construct();
        $config['upload_path']   = './upload/';
        $config['allowed_types'] = '*';
        $config['max_size']      = 2048000;
        $config['max_width']     = 10000;
        $config['max_height']    = 10000;
        $config['remove_spaces'] = FALSE;
        $this->load->library('upload', $config);
        $this->load->model('m_self_learning');
    }

    function index(){
        if(isset($_POST['tambahlearning'])){
            $this->tambahlearning();
        }else if(isset($_POST['updatelearning'])){
            $this->updatelearning();
        }else if(isset($_POST['hapuslearning'])){
            $this->hapuslearning();
        }else{
            $data['page_title']  = 'Self Learning';
            $data['getLearning'] = $this->m_self_learning->getLearning();
            $this->load->view('header', $data); 
            $this->load->view('selfLearning');
            $this->load->view('footer');
        } 
    }

    function tambahlearning(){
        $nama_selflearning = $this->input->post('nama_selflearning');
        $nota_dinas        = $this->input->post('nota_dinas');
        $file              = $_FILES['file'];
        $upload_file       = $file['name'];
        if (!empty($_FILES['file']['name'])) {
            $path = './upload/'.$upload_file;
            if(file_exists($path)){
                echo '<script language="javascript">';
                echo 'alert("File yang di upload sudah ada, Data gagal disimpan!!!")';
                echo '</script>';
                redirect('self_learning', 'refresh');
            }else{
                $materi = $upload_file;
            }
        }else{
            $materi = null;
        }
        $simpan = $this->m_self_learning->tambahLearning($nama_selflearning,$nota_dinas,$materi);
        if($simpan){
            $this->upload->do_upload('file');
            echo '<script language="javascript">';
            echo 'alert("Data self learning berhasil ditambahkan")';
            echo '</script>';
            redirect('self_learning', 'refresh');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Data self learning gagal ditambahkan!!!")';
            echo '</script>';
            redirect('self_learning', 'refresh');
        }
    }

    function updatelearning(){
        $id_selflearning   = $this->input->post('id_selflearning');
        $nama_selflearning = $this->input->post('nama_selflearning');
        $nota_dinas        = $this->input->post('nota_dinas');
        $file              = $_FILES['file'];
        $file_upload       = $file['name'];
        $upload_sebelum    = $this->input->post('upload_sebelum');
        if (!empty($_FILES['file']['name'])) {
            $path = './upload/'.$file_upload;
            if(file_exists($path)){
                echo '<script language="javascript">';
                echo 'alert("File yang di upload sudah ada, Data gagal diupdate!!!")';
                echo '</script>';
                redirect('self_learning', 'refresh');
            }else{
                if(empty($upload_sebelum)){
                    $materi = $file_upload;
                }else{
                    $path = './upload/'.$upload_sebelum;
                    unlink($path);
                    $materi = $file_upload;
                }
            }
        }else{
            if(empty($upload_sebelum)){
                $materi = null;
            }else{
                $materi = $upload_sebelum;
            }
        }
        $update = $this->m_self_learning->updateLearning($id_selflearning,$nama_selflearning,$nota_dinas,$materi);
        if($update){
            $this->upload->do_upload('file');
            echo '<script language="javascript">';
            echo 'alert("Data self learning berhasil diupdate")';
            echo '</script>';
            redirect('self_learning', 'refresh');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Data self learning gagal diupdate!!!")';
            echo '</script>';
            redirect('self_learning', 'refresh');
        }
    }

    function hapuslearning(){
        $id_selflearning = $this->input->post('id_selflearning');
        $upload_sebelum  = $this->input->post('upload_sebelum');
        $hapus           = $this->m_self_learning->hapusLearning($id_selflearning);
        if($hapus){
            if(!empty($upload_sebelum)){
                $path_to_file = './upload/'.$upload_sebelum;
                if(file_exists($path_to_file)){
                    unlink($path_to_file);
                }else{}
            }else{}
            echo '<script language="javascript">';
            echo 'alert("Data self learning berhasil dihapus")';
            echo '</script>';
            redirect('self_learning', 'refresh');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Data self learning gagal dihapus!!!")';
            echo '</script>';
            redirect('self_learning', 'refresh');
        }
    }
}