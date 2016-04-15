<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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


    public function checkLoginStudents() {
        $this->form_validation->set_rules('username_murid','Username','required');
        $this->form_validation->set_rules('password_murid','Password','required|callback_verifyStudents');
        
        if($this->form_validation->run() == false){
            redirect('dashboard');
        }
        else{
            redirect('dashboard/students');
        }
    }

    public function checkLoginTeacher() {
        $this->form_validation->set_rules('username_guru','Username','required');
        $this->form_validation->set_rules('password_guru','Password','required|callback_verifyTeacher');
        
        if($this->form_validation->run() == false){
            redirect('dashboard');
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
        $this->form_validation->set_rules('nama','Fullname','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email|callback_email_sudah_terpakai');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[32]|regex_match[/^[a-zA-Z0-9_-~!@#$%^&*()+=]{6,32}$/]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]|regex_match[/^[a-zA-Z0-9_-~!@#$%^&*()+=]{6,32}$/]');
        
        if($this->form_validation->run() == false){
            $this->form_validation->set_message('Incorrect Email.');
            $this->index();
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
        $this->load->view('indexMurid.php');
    }

    public function teacher() {  
        redirect('kelas/index');        
    }
    
    public function email_sudah_terpakai(){
        $this->load->model('dashboardModel');
        $email=$this->input->post('email');
        $result=$this->dashboardModel->check_email_exist($email);
        if($result){
			$this->form_validation->set_message('email_sudah_terpakai', 'Email already exist.');
			return false;
		}else{
			return true;
		}
    }
    
    public function logout(){
        $this->load->library('session');
        $this->load->view('logout');
        redirect('dashboard');
    }

}