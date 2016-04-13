<?php
    if($aksi == "aksi_edit"){
        foreach ($qdata as $k){
            $id = $k->id_kelas;
            $nk = $k->nama_kelas;
            $tp1 = $k->tahun_ajaran1;
            $tp2 = $k->tahun_ajaran2;
            $ns = $k->nama_sekolah;
        }
    }
    else{
        $id = "";
        $nk = "";
        $tp1 = "";
        $tp2 = "";
        $ns = "";
    }
    $id_guru = $_SESSION['userid'];
?>
<div class="container">
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <div class="panel-heading"><b><?php echo $title; ?></b></div>
  <div class="panel-body">
  
     <form action="<?php echo base_url()?>kelas/form/<?php echo $aksi; ?>" method="post">
       <table class="table table-striped">
         <tr>
          <td>Nama Kelas</td>
          <td>
            <div class="col-sm-6">
                <input type="hidden" name="idguru" class="form-control" required value="<?php echo $id_guru; ?>">
                <input type="hidden" name="idkelas" class="form-control" required value="<?php echo $id; ?>">
                <input type="text" name="nama_kelas" class="form-control" required value="<?php echo $nk; ?>">
            </div>
            </td>
         </tr>
           <tr>
          <td>Tahun Ajaran</td>
          <td>
            <div class="col-sm-3">
                <input type="text" name="tahun_ajaran1" class="form-control" required value="<?php echo $tp1;?>">
            </div>
            <div class="col-sm-3">
                <input type="text" name="tahun_ajaran2" class="form-control" required value="<?php echo $tp2;?>">
            </div>
            </td>
         </tr>
         
          <td>Nama Sekolah</td>
          <td>
          <div class="col-sm-6">
            <input type="text" name="nama_sekolah" class="form-control" required value="<?php echo $ns;?>">
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