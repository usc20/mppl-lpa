<?php
class Mrelasi extends CI_Model {

    var $tabel_rkm = 'relation_kelas_murid';
    var $tabel_rgm = 'relation_guru_murid';

    function __construct() {
        parent::__construct();
    }
	
    function get_insert_rkm($data){
       $this->db->insert($this->tabel_rkm, $data);
       return TRUE;
    }
    
    function get_all_rkm($id) {
        $this->db->distinct('m.nomor_induk, m.nama_murid');
        $this->db->from('relation_kelas_murid rkm, murid m');
        $this->db->where('rkm.id_kelas',$id);
        $this->db->where('m.id_murid = rkm.id_murid');
        //$this->db->from($this->tabel_rkm);
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
	}
    function del_relasi($id) {
        $this->db->where('id_murid', $id);
        $this->db->delete($this->tabel_rkm);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

}
?>
