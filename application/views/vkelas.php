    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Daftar Kelas</b></div>
  <div class="panel-body">
    <p><?=$this->session->flashdata('pesan')?> </p>
      <a href="<?=base_url()?>kelas/form/add" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>

       <table class="table table-striped">
        <thead>
         <tr>
         <th>No</th>
         <th>Nama Kelas</th>
         <th>Tahun Ajaran</th>
         <th>Jumlah Murid</th>
         
         <th></th>
         </tr>
        </thead>
        <tbody>
        
         <!--<tr>
          <td colspan="6">Data tidak ditemukan</td>
         </tr>-->
        <?php /*if (empty($query->result)) {
                 echo " <div class=\"alert alert-warning\" id=\"alert\"> Belum ada kelas</div><?php";
                }
                else{*/ $numb = 1;
               foreach ($kelas as $k){ ?>
         <tr>
             <td><?php echo $numb; ?></td>
             <td><?php echo $k->nama_kelas; ?></td>
             <td><?php echo $k->tahun_ajaran1; echo "/"; echo $k->tahun_ajaran2; ?></td>
             <td><?php echo $numb;?></td>
          
          
          <td>
           <a href="<?php echo base_url();?>kelas/form/edit/<?php echo $k->id_kelas; ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"> Edit</i></a>
           <a href="<?php echo base_url(); ?>index.php/kelas/detail_kelas/<?php echo $k->id_kelas; ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"> Detail</i></a>
           <a href="<?php echo base_url(); ?>index.php/kelas/hapus/<?php echo $k->id_kelas; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"> Hapus</i></a>
          </td>
         </tr>
        <?php $numb++;}?>
        </tbody>
       </table>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->