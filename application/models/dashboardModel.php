<?php

class dashboardModel extends CI_Model {
    public function insert($nama, $nip, $tgl_lahir, $jenis_kelamin, $email, $username, $password){
        date_default_timezone_set("Asia/Jakarta"); 
        $data = array (
            'nama_guru' => $nama,
            'nip' => $nip,
            'tanggal_lahir' => $tgl_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'email' => $email,
            'username' => $username,
            'password' => $password
            //'user_register'=>date("Y-m-d h:i:sa"),
            //'user_last_login'=>date("Y-m-d h:i:sa")
            //'user_jumlah_post'=>0,
            //'validasi'=>0            


        );
        $this->db->insert('guru', $data);
    }
    public function upload_photo($image, $image_name){

        $this->db->select_max('id_guru');
        $this->db->from('guru');
        $query = $this->db->get();
        //echo $query->row()->id;
        $id = $query->row()->id_guru;
        $this->db->query("UPDATE guru SET foto = '$image', nama_foto = '$image_name' WHERE id_guru='$id'");
    }

	public function check_email_exist($email)
    {
        $this->db->where("email",$email);
        $query=$this->db->get("guru");
        if($query->num_rows()>0){
            return true;
        }else{
			return false;
        }
    }
	public function check_username_exist($username)
    {
        $this->db->where("username",$username);
        $query=$this->db->get("users");
        if($query->num_rows()>0){
            return true;
        }else{
			return false;
        }
    }

    public function loginStudents($username, $pass){
        date_default_timezone_set("Asia/Jakarta");
        $this->db->select('username, password, id_murid, nama_murid');
        $this->db->from('murid');
        $this->db->where('username', $username);
        $this->db->where('password', $pass);
        $waktu=date("Y-m-d H:i:s");
        //$this->db->query("UPDATE users SET user_last_login='$waktu' where email='$name'");

        $query = $this->db->get();
        $idid = $query->result();

        if($query->num_rows() == 1){
            $data = array();

            $newdata = array(
            'username'  => $username,
            'userid' => $idid[0]->id_murid,
            'name' => $idid[0]->nama_murid
            );
            $this->session->set_userdata($newdata);

            return true;
        }else {
            return false;
        }
    }

    public function loginTeacher($username, $pass){
        date_default_timezone_set("Asia/Jakarta"); 
        $this->db->select('username, password, id_guru, nama_guru');
        $this->db->from('guru');
        $this->db->where('username', $username);
        $this->db->where('password', $pass);
        $waktu=date("Y-m-d H:i:s");
        //$this->db->query("UPDATE users SET user_last_login='$waktu' where email='$name'");

        $query = $this->db->get();
        $idid = $query->result();

        if($query->num_rows() == 1){

            $newdata = array(
            'username'  => $username,
            'userid' => $idid[0]->id_guru,
            'name' => $idid[0]->nama_guru, 
            'logged_in' => true
            );
            $this->session->set_userdata($newdata);
            return true;
            //echo var_dump($newdata);
        }else {
            return false;
        }
    }
}

?>