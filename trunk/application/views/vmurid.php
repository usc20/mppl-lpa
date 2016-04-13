    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Daftar Siswa di Kelas</b></div>
  <div class="panel-body">
    <p><?=$this->session->flashdata('pesan')?> </p>
      <?php $idkelas = $this->uri->segment(3); ?>
      <form class="form-inline" method="post" action="<?php echo base_url(); ?>kelas/add_to_class/<?php echo $idkelas; ?>">
          <div class="form-group">
              <label for="sel1"><p>Tambahkan Murid ke Kelas: </p></label>
              <select class="form-control" id="sel1" name="idmurid">
                  <?php foreach($murid as $m){ ?>
                <option value="<?php echo $m->id_murid; ?>"><?php echo $m->nomor_induk; echo " - "; echo $m->nama_murid;?></option>
                  <?php } ?>
              </select>
            </div>
          <button type="submit" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
      </form>
       <table class="table table-striped">
        <thead>
         <tr>
         <th>No</th>
         <th>No Induk</th>
         <th>Nama</th>
         <th>Riwayat Permainan</th>
         <th></th>
         </tr>
        </thead>
        <tbody>
        <?php $numb=1; foreach($rkm as $k){ ?>
         <!--<tr>
          <td colspan="6">Data tidak ditemukan</td>
         </tr>-->
         <tr>
          <td><?php echo $numb; $numb+=1; ?></td>
          <td><?php echo $k->nomor_induk; ?></td>
          <td><?php echo $k->nama_murid; ?></td>
          <td><a href="<?php echo base_url();?>index.php/kelas/riwayat/<?php echo $k->id_murid; ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-share"> Lihat Riwayat</i></a></td>
          <td>
           <a href="<?php echo base_url();?>index.php/kelas/hapus_relasi/<?php echo $k->id_murid; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"> Hapus</i></a>
          </td>
         </tr>
        <?php }?>
        </tbody>
       </table>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->