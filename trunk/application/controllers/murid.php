<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Murid extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mmurid');
        $this->load->helper(array('url','form'));
    }

	public function index()
	{
        $data['murid'] = $this->mmurid->get_allmurid(); 
		$this->load->view('header');
        $this->load->view('vmuridlist',$data);
        $this->load->view('footer');
     }
   

    // fungsi hapus
    public function hapus($gid){

        $this->mmurid->del_murid($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Murid berhasil dihapus dari daftar</div>");
        redirect('murid');
	}
    
    public function form(){
    	//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		
        //print $mau_ke;

		//ambil variabel
		$nomor_induk				= addslashes($this->input->post('nomor_induk'));
		$nama_murid					= addslashes($this->input->post('nama_murid'));
		$username					= addslashes($this->input->post('username_murid'));
		$password				= addslashes($this->input->post('password_murid'));
		$tanggal_lahir				    = addslashes($this->input->post('tanggal_lahir_murid'));
		$jenis_kelamin				    = addslashes($this->input->post('jenis_kelamin_murid'));
		

		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah Murid';
		    $data['aksi'] = 'aksi_add';
            $this->load->view('header');
            $this->load->view('vformmurid', $data);
		} else if ($mau_ke == "edit") {
            $idu				= $this->uri->segment(4);
			$data['qdata']	= $this->mmurid->get_murid_byid($idu);
            //echo var_dump($idu);
			$data['title'] = 'Edit Murid';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('header');
            $this->load->view('vformmurid', $data);
		} else if ($mau_ke == "aksi_add") {
			$data = array(
                'nomor_induk'   => $nomor_induk,
                'nama_murid'    => $nama_murid,
                'username'      => $username,
                'password'      => $password,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin
            );
            $this->mmurid->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
			redirect('murid');
        } else if ($mau_ke == "aksi_edit") {
          $id= $this->input->post('id_murid');      
          $data = array(
                'nomor_induk'   => $nomor_induk,
                'nama_murid'    => $nama_murid,
                'username'      => $username,
                'password'      => $password,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin
            );
            $this->mmurid->get_update($id,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
			redirect('murid');
		}

    }
}