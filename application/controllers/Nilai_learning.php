<?php 
    
class Nilai_learning extends CI_Controller{

    function __construct(){
    	parent::__construct();
        $this->load->model('m_nilai_learning');
    }

    function index(){
        if(isset($_POST['hapusnilai'])){
            $this->hapusnilai();
        }else if(isset($_POST['import'])){
            $this->import();
        }else{
            $data['page_title'] = 'Nilai Self Learning';
            $data['getNilai']   = $this->m_nilai_learning->getNilai();
            $this->load->view('header', $data); 
            $this->load->view('nilaiLearning');
            $this->load->view('footer');
        }
    }

    function import(){
        //Get extension
        $path = $_FILES['file']['name'];
        $ext  = pathinfo($path, PATHINFO_EXTENSION);

        if($ext == "xls"){
            $config = array(
                'upload_path'   => FCPATH.'upload/',
                'allowed_types' => 'xlsx|xls|csv'
            );
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $data = $this->upload->data();
                @chmod($data['full_path'], 0777);

                $this->load->library('Spreadsheet_Excel_Reader');
                $this->spreadsheet_excel_reader->setOutputEncoding('CP1251');
                $this->spreadsheet_excel_reader->read($data['full_path']);
                $sheets = $this->spreadsheet_excel_reader->sheets[0];
                error_reporting(0);

                $data_excel = array();
                for ($i = 2; $i <= $sheets['numRows']; $i++) {
                    if ($sheets['cells'][$i][1] == '') break;

                    $data_excel[$i - 1]['id_nilai']        = $sheets['cells'][$i][1];
                    $data_excel[$i - 1]['pn']              = $sheets['cells'][$i][2];
                    $data_excel[$i - 1]['id_selflearning'] = $sheets['cells'][$i][3];
                    $data_excel[$i - 1]['nilai']           = $sheets['cells'][$i][4];
                }

                $this->db->insert_batch('nilai_self_learning', $data_excel);
                unlink($data['full_path']);
                echo '<script language="javascript">';
                echo 'alert("Import data berhasil")';
                echo '</script>';
                redirect('nilai_learning', 'refresh');
            }else{
                echo '<script language="javascript">';
                echo 'alert("Import data gagal, harap diperiksa ulang")';
                echo '</script>';
                redirect('nilai_learning', 'refresh');
            }
        }else{
            echo '<script language="javascript">';
            echo 'alert("Hanya dapat import file dengan ekstensi xls")';
            echo '</script>';
            redirect('nilai_learning', 'refresh');
        }
    }

    function hapusnilai(){
        $id_nilai = $this->input->post('id_nilai');
        $hapus    = $this->m_nilai_learning->hapusNilai($id_nilai);
        if($hapus){
            echo '<script language="javascript">';
            echo 'alert("Data nilai self learning berhasil dihapus")';
            echo '</script>';
            redirect('nilai_learning', 'refresh');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Data nilai self learning gagal dihapus!!!")';
            echo '</script>';
            redirect('nilai_learning', 'refresh');
        }
    }
}