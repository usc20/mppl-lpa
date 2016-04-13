    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Detail Kelas</b></div>
  <div class="panel-body">

     <p> <a href="<?=base_url()?>/kelas" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a></p>
      <?php foreach ($kelas as $k){ ?>
       <table class="table table-striped">
         <tr>
          <td>Kelas</td>
          <td><?php echo $k->nama_kelas; ?></td>
         </tr>
         <tr>
          <td>Tahun Ajaran</td>
          <td><?php echo $k->tahun_ajaran1; ?>/<?php echo $k->tahun_ajaran2; ?></td>
          </tr>
         <tr>
          <td>Jumlah Murid</td>
          <td>1</td>
          </tr>
       </table>
      <?php } ?>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->
