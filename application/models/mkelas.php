<?php
class Mkelas extends CI_Model {

    var $tabel = 'kelas';
    var $tabel_guru = 'guru';

    function __construct() {
        parent::__construct();
    }
	function get_allkelas() {
        $this->db->from($this->tabel);
		$query = $this->db->get();

        //cek apakah ada ba
        if ($query->num_rows() > 0) {
            return $hasil = $query->result();
        }
        
	}

    function get_kelas_byid($id) {
        $this->db->from($this->tabel);
        $this->db->where('id_kelas', $id);


        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }
    
    function get_profil($id) {
        $this->db->from($this->tabel_guru);
        $this->db->where('id_guru', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }
    function get_update_profil($id,$data) {
        $this->db->where('id_guru', $id);
        $this->db->update($this->tabel_guru, $data);

        return TRUE;
    }

    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

    function get_update($id,$data) {

        $this->db->where('id_kelas', $id);
        $this->db->update($this->tabel, $data);

        return TRUE;
    }
    function del_kelas($id) {
        $this->db->where('id_kelas', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }
}
?>
