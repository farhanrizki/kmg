<?php 
    
class Staff_app extends CI_Controller{

    function __construct(){
    	parent::__construct();
        $this->load->model('m_staff_app');
    }

    function index(){
        if(isset($_POST['tambahstaff'])){
            $this->tambahstaff();
        }else if(isset($_POST['updatestaff'])){
            $this->updatestaff();
        }else if(isset($_POST['hapusstaff'])){
            $this->hapusstaff();
        }else if(isset($_POST['import'])){
            $this->import();
        }else{
            $data['page_title'] = 'Staff App';
            $data['staffApp']   = $this->m_staff_app->getData();
            $data['getBagian']  = $this->m_staff_app->getBagian();
            $data['getBidang']  = $this->m_staff_app->getBidang();
            $this->load->view('header', $data); 
            $this->load->view('staffApp');
            $this->load->view('footer');
        } 
    }

    function tambahstaff(){
        $pn     = $this->input->post('pn');
        $nama   = $this->input->post('nama');
        $bagian = $this->input->post('bagian');
        $bidang = $this->input->post('bidang');
        $cek    = $this->m_staff_app->pnExist($pn);
        if($cek){
            echo '<script language="javascript">';
            echo 'alert("PN sudah ada, harap input ulang!!!")';
            echo '</script>';
            redirect('staff_app', 'refresh');
        }else{
            $simpan = $this->m_staff_app->tambahStaff($pn,$nama,$bagian,$bidang);
            if($simpan){
                echo '<script language="javascript">';
                echo 'alert("Data staff berhasil ditambahkan")';
                echo '</script>';
                redirect('staff_app', 'refresh');
            }else{
                echo '<script language="javascript">';
                echo 'alert("Data staff gagal ditambahkan!!!")';
                echo '</script>';
                redirect('staff_app', 'refresh');
            }
        }
    }

    function updatestaff(){
        $pn     = $this->input->post('pn');
        $nama   = $this->input->post('nama');
        $bagian = $this->input->post('bagian');
        $bidang = $this->input->post('bidang');
        for ($i = 0; $i < count($pn); $i++){
            $id  = $pn[$i];
            $bag = $bagian[$id];
            $bid = $bidang[$id];
            $update = $this->m_staff_app->updateStaff($id,$nama,$bag,$bid);
        }

        if($update){
            echo '<script language="javascript">';
            echo 'alert("Data staff berhasil diupdate")';
            echo '</script>';
            redirect('staff_app', 'refresh');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Data staff gagal diupdate!!!")';
            echo '</script>';
            redirect('staff_app', 'refresh');
        }
    }

    function hapusstaff(){
        $pn    = $this->input->post('pn');
        $hapus = $this->m_staff_app->hapusStaff($pn);
        if($hapus){
            echo '<script language="javascript">';
            echo 'alert("Data staff berhasil dihapus")';
            echo '</script>';
            redirect('staff_app', 'refresh');
        }else{
            echo '<script language="javascript">';
            echo 'alert("Data staff gagal dihapus!!!")';
            echo '</script>';
            redirect('staff_app', 'refresh');
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

                    $data_excel[$i - 1]['pn']     = $sheets['cells'][$i][1];
                    $data_excel[$i - 1]['nama']   = $sheets['cells'][$i][2];
                    $data_excel[$i - 1]['bidang'] = $sheets['cells'][$i][3];
                    $data_excel[$i - 1]['bagian'] = $sheets['cells'][$i][4];
                }

                $this->db->insert_batch('staff_app', $data_excel);
                unlink($data['full_path']);
                echo '<script language="javascript">';
                echo 'alert("Import data berhasil")';
                echo '</script>';
                redirect('staff_app', 'refresh');
            }else{
                echo '<script language="javascript">';
                echo 'alert("Import data gagal, harap diperiksa ulang")';
                echo '</script>';
                redirect('staff_app', 'refresh');
            }
        }else{
            echo '<script language="javascript">';
            echo 'alert("Hanya dapat import file dengan ekstensi xls")';
            echo '</script>';
            redirect('staff_app', 'refresh');
        }
        
    }
}