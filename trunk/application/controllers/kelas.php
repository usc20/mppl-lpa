<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller {

	/*****
     | CRUD barang
     | controller barang view, create, update, delete
     | by g2tech
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('mkelas');
        $this->load->model('mmurid');
        $this->load->model('mrelasi');
        //$this->load->helper('form','url');
        $this->load->helper(array('url','form'));
    }

	
    public function index()
	{
        $data['kelas'] = $this->mkelas->get_allkelas(); 
		$this->load->view('header');
        $this->load->view('vkelas', $data);
        $this->load->view('footer');
    }

    public function form(){
    	//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
        //print $mau_ke;

		//ambil variabel
		$nk	 = addslashes($this->input->post('nama_kelas'));
        $tp1 = addslashes($this->input->post('tahun_ajaran1'));
        $tp2 = addslashes($this->input->post('tahun_ajaran2'));
        $ns  = addslashes($this->input->post('nama_sekolah'));


		if ($mau_ke == "add") {
		    $data['title'] = 'Tambah Kelas Baru';
		    $data['aksi'] = 'aksi_add';
            $this->load->view('header');
            $this->load->view('vformkelas', $data);
		} else if ($mau_ke == "edit") {
            $idu					= $this->uri->segment(4);
            //echo var_dump($idu);
            //echo "<br>";
			$data['qdata']	= $this->mkelas->get_kelas_byid($idu);
            //echo var_dump($data);
			$data['title'] = 'Edit Kelas';
		    $data['aksi'] = 'aksi_edit';
            $this->load->view('header');
            $this->load->view('vformkelas', $data);
		} else if ($mau_ke == "aksi_add") {
            $id_guru = $this->input->post('idguru');
			$data = array(
                'nama_kelas'    => $nk,
                'tahun_ajaran1' => $tp1,
                'tahun_ajaran2' => $tp2,
                'nama_sekolah'  => $ns,
                'id_guru'       => $id_guru
            );
            $this->mkelas->get_insert($data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di insert</div>");
			redirect('kelas');
        } else if ($mau_ke == "aksi_edit") {
            $id= $this->input->post('idkelas');
            //echo var_dump($id);
          $data = array(
                'nama_kelas'    => $nk,
                'tahun_ajaran1' => $tp1,
                'tahun_ajaran2' => $tp2,
                'nama_sekolah'  => $ns
            );
            //echo var_dump($data);
            $this->mkelas->get_update($id,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil diupdate</div>");
			redirect('kelas');
		}

    }
    // fungsi hapus kelas
    public function hapus($gid){
        $this->mkelas->del_kelas($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Kelas berhasil dihapus</div>");
        redirect('kelas');
    }
    // fungsi detail
    public function detail_kelas($id){
        $idu = $this->uri->segment(3);
        $data_m['murid'] = $this->mmurid->get_allmurid();
        $data_k['kelas'] = $this->mkelas->get_kelas_byid($id);
        $data_m['rkm'] = $this->mrelasi->get_all_rkm($idu); 
        $data_m['idk'] = $idu; 
        $this->load->view('header');
		$this->load->view('vdetkelas',$data_k);
        $this->load->view('vmurid',$data_m);
    }
    public function riwayat(){
        $this->load->view('header');
		$this->load->view('vhistori');
    }
    public function profil(){   //profil guru
        $id = $_SESSION['userid'];
        $data['qdata']	= $this->mkelas->get_profil($id);      //angka 1 nanti diganti dengan id_guru yang login sesuai session
        $data['title'] = 'Profil Guru';
        $this->load->view('header');
		$this->load->view('vprofile',$data);
    }
    public function prof_update(){  //profil guru
        $id= $this->input->post('id');
            //echo var_dump($id);
          $data = array(
                'nip'           => $this->input->post('nip'),
                'nama_guru'     => $this->input->post('nama_guru'),
                'username'      => $this->input->post('username'),
                'password'      => $this->input->post('password'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin_guru'),
                'email'         => $this->input->post('email')
            );
            //echo var_dump($data);
            $this->mkelas->get_update_profil($id,$data);
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Perubahan berhasil disimpan</div>");
			redirect('kelas/profil');
    }
    
    public function add_to_class($id){
        
        $data = array(
            'id_kelas' => $id,
            'id_murid' => $this->input->post('idmurid'));
        echo var_dump($data);
        $this->mrelasi->get_insert_rkm($data);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Murid berhasil dimasukan ke kelas</div>");
		redirect("kelas/detail_kelas/$id");
    }
    // fungsi hapus relasi kelas-murid
    public function hapus_relasi($gid){
        $this->mrelasi->del_relasi($gid);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Murid berhasil dihapus dari kelas</div>");
        redirect('kelas/detail_kelas/4');
    }
}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */