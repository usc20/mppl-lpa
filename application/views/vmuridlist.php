

    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>List Murid </b></div>
  <div class="panel-body">
    <p><?=$this->session->flashdata('pesan')?> </p>
          <a href="<?=base_url()?>murid/form/add" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
      <table class="table table-striped">
        <thead>
         <tr>
         <th>No</th>
         <th>No Induk</th>
         <th>Nama</th>
         <th>Tanggal Lahir</th>
         <th>Jenis Kelamin</th>
         <th></th>
         </tr>
        </thead>
        <tbody>
        <?php $numb = 1; foreach ($murid as $m){ ?>
         <tr>
          <td><?php echo $numb; ?></td>
          <td><?php echo $m->nomor_induk; ?></td>
          <td><?php echo $m->nama_murid; ?></td>
          <td><?php echo $m->tanggal_lahir; ?></td>
          <td><?php echo $m->jenis_kelamin; ?></td>
          <td>
           <a href="<?=base_url()?>murid/form/edit/<?php echo $m->id_murid; ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"> Edit</i></a>
           <a href="<?php echo base_url();?>murid/hapus/<?php echo $m->id_murid; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"> Hapus</i></a>
          </td>
         </tr>
        <?php $numb++; } ?>
        </tbody>
       </table>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->
