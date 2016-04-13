<?php
    //$aksi					= $this->uri->segment(3);
    //$post					= $this->uri->segment(4);
    //$data['qdata']	= $this->mmurid->get_murid_byid($post);
    if($aksi == "aksi_add"){
      //  $post = "aksi_add";
        $id = "";
        $no = "";
        $nm = "";
        $un = "";
        $ps = "";
        $jk = "";
    }
    else{
        //$post = "aksi_edit";
        foreach ($qdata as $m){
            $id = $m->id_murid;
            $no = $m->nomor_induk;
            $nm = $m->nama_murid;
            $un = $m->username;
            $ps = $m->password;
            $jk = $m->jenis_kelamin;
        }
    }
?>
<div class="container">
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <div class="panel-heading"><b><?php echo $title; ?></b></div>
  <div class="panel-body">
  <p><?=$this->session->flashdata('pesan')?> </p>
     <form action="<?php echo base_url()?>murid/form/<?php echo $aksi; ?>" method="post">
       <table class="table table-striped">

         <tr>
          <td style="width:15%;">Nomor Induk</td>
          <td>
            <div class="col-sm-6">
                <input type="hidden" name="id_murid" class="form-control" value="<?php echo $id; ?>">
                <input type="text" name="nomor_induk" class="form-control" required value="<?php echo $no; ?>">
            </div>
            </td>
         </tr>
         <tr>
          <td>Nama Murid</td>
          <td>
            <div class="col-sm-6">
                <input type="text" name="nama_murid" class="form-control" required value="<?php echo $nm; ?>">
            </div>
            </td>
         </tr>
           <tr>
          <td>Username</td>
          <td>
            <div class="col-sm-6">
                <input type="text" name="username_murid" class="form-control" required value="<?php echo $un; ?>">
            </div>
            </td>
         </tr>
           <tr>
          <td>Password</td>
          <td>
            <div class="col-sm-6">
                <input type="text" name="password_murid" class="form-control" required value="<?php echo $ps; ?>">
            </div>
            </td>
         </tr>
         <tr>
          <td>Jenis Kelamin</td>
          <td> <div class="col-sm-6">
          <select name="jenis_kelamin_murid" required="requreid" class="form-control">
           <option></option>
           <option value="L">Laki - laki</option>
           <option value="P">Perempuan</option>
          </select>
          </div>
          </td>
         </tr>
         <tr>
          <td>Foto</td>
          <td>
          <div class="col-sm-6">
            <input type="file" name="satuan" class="form-control">
          </div>
          </td>
         </tr>
       
         <tr>
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="Simpan">
            <button type="reset" class="btn btn-default">Batal</button>
          </td>
         </tr>
       </table>
     </form>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->