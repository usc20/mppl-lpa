

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Riwayat Permainan <?php foreach ($histori as $h){ echo $h->nama_murid; } ?></b></div>
  <div class="panel-body">
      <a href="<?=base_url()?>kelas/detail_kelas/4" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
       <table class="table table-striped">
        <thead>
         <tr>
         <th>No</th>
         <th>Kategori / Level</th>    
         <th>Pertanyaan</th>
         <th>Jawaban Benar</th>
         <th>Jawaban Murid</th>
         <th>Mulai Pengerjaan</th>
         <th>Selesai Pengerjaan</th>
         <th>Hasil</th>
         </tr>
        </thead>
        <tbody>
        
         <!--<tr>
          <td colspan="6">Data tidak ditemukan</td>
         </tr>-->
        
         <tr>
             <?php $numb=1; foreach($histori as $h){ ?>
          <td><?php echo $numb; ?></td>
          <td><?php ?></td>
          <td>1 + 1</td>
          <td>1</td>
          <td>1</td>
          <td>07:00:00</td>
          <td>07:00:02</td>
          <td>*****</td>
             <?php $numb++; } ?>
         </tr>
        </tbody>
       </table>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->
