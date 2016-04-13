<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/*****
     | CRUD dashboard
     | controller dashboard view, create, update, delete
     | by g2tech
	 */
    public function __construct() {
        parent::__construct();
        //$this->load->model('mkelas');
        //$this->load->helper('form','url');
        $this->load->helper(array('url','form'));
    }

    public function index()
	{
		$this->load->view('index.php');
    }

/*    public function form(){
    	//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
        //print $mau_ke;

		//ambil variabel
		$id     				= addslashes($this->input->post('id'));


		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah barang';
		    $data['aksi'] = 'aksi_add';
            $this->load->view('header');
            $this->load->view('vformkelas');
		} else if ($mau_ke == "edit") {
			$data['qdata']	= $this->mbarang->get_barang_byid($idu);
			$data['title'] = 'Edit barang';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('header');
            $this->load->view('vform');
		} else if ($mau_ke == "aksi_add") {
			$data = array(
                'nama_murid'  => $nama
            );
            $this->mkelas->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
			redirect('barang');
        } else if ($mau_ke == "aksi_edit") {
          $data = array(
                'nama_murid'  => $nama
            );
            $this->mkelas->get_update($id,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
			redirect('kelas');
		}

    } */
    // fungsi hapus
 /*   public function hapus($gid){

        //$this->mkelas->del_kelas($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Kelas berhasil dihapus</div>");
        redirect('kelas');
	} */

    public function checkLoginStudents() {
        $this->form_validation->set_rules('username_murid','Username','required');
        $this->form_validation->set_rules('password_murid','Password','required|callback_verifyStudents');
        
        if($this->form_validation->run() == false){
            $this->load->view('index.php');
        }
        else{
            redirect('dashboard/students');
        }
    }

    public function checkLoginTeacher() {
        $this->form_validation->set_rules('username_guru','Username','required');
        $this->form_validation->set_rules('password_guru','Password','required|callback_verifyTeacher');
        
        if($this->form_validation->run() == false){
            $this->load->view('index.php');
            //echo "string";
        }
        else{
            redirect('dashboard/teacher');
        }
    }

    public function verifyStudents(){
        $username = $this->input->post('username_murid');
        $pass = $this->input->post('password_murid');
        
        $this->load->model('dashboardModel');
        $this->load->library('session');
        if($this->dashboardModel->loginStudents($username, $pass)){
            return true;
        }
        else{
            $this->form_validation->set_message('verifyStudents','incorrect Username or Password. Please try again.');
            return false;
        }
    }

    public function verifyTeacher(){
        $username = $this->input->post('username_guru');
        $pass = $this->input->post('password_guru');
        
        $this->load->model('dashboardModel');
        $this->load->library('session');
        if($this->dashboardModel->loginTeacher($username, $pass)){
            return true;
            //echo var_dump(query);
        }
        else{
            $this->form_validation->set_message('verifyteacher','Incorrect Username or Password. Please try again.');
            return false;
        }
    }

    public function account() {
        $this->load->helper('security');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');
        
        if($this->form_validation->run() == false){
            $this->form_validation->set_message('Incorrect Email.');
        }
        else{
            $nama = $this->input->post('nama');
            $nip = $this->input->post('nip');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            
            if(isset($_FILES['image'])){
                $file = $_FILES['image']['tmp_name'];
                if(!isset($file)){
                    echo "Please select an image.";
                }
                else{
                    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                    $image_name = addslashes($_FILES['image']['name']);
                    $image_size = getimagesize($_FILES['image']['tmp_name']);

                    $this->load->model('dashboardModel');
                    $this->dashboardModel->insert($nama, $nip, $tgl_lahir, $jenis_kelamin, $email, $username, $password);
                    $this->dashboardModel->upload_photo($image, $image_name);
                    
                    //$this->LoginModel->increment_reg();
                    
                    /*if(isset($akunparent)){
                        $this->load->model('LoginModel');
                        $this->LoginModel->updateparent($akunparent);
                    }*/
                    $this->teacher();
                }            
            }
        }
    }

    public function students() {
        redirect('murid/index');        
    }

    public function teacher() {  
        redirect('kelas/index');        
    }
    
    public function logout(){
        $this->load->library('session');
        $this->load->view('logout');
        $this->index();
    }

}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */