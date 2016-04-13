<div class="container">
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <div class="panel-heading"><b><?php echo $title;?></b></div>
  <div class="panel-body">
  <p><?=$this->session->flashdata('pesan')?> </p>
     <form action="<?php echo base_url();?>kelas/prof_update" method="post">
         <?php foreach($qdata as $guru){ ?>
       <table class="table table-striped">

         <tr>
          <td style="width:15%;">NIP</td>
          <td>
            <div class="col-sm-6">
                <input type="hidden" name="id" class="form-control"  value="<?php echo $guru->id_guru; ?>" required>
                <input type="text" name="nip" class="form-control"  value="<?php echo $guru->nip; ?>" required>
            </div>
            </td>
         </tr>
         <tr>
          <td>Nama Guru</td>
          <td>
            <div class="col-sm-6">
                <input type="text" name="nama_guru" class="form-control" value="<?php echo $guru->nama_guru; ?>" required>
            </div>
            </td>
         </tr>
           <tr>
          <td>Username</td>
          <td>
            <div class="col-sm-6">
                <input type="text" name="username" class="form-control" value="<?php echo $guru->username; ?>" required>
            </div>
            </td>
         </tr>
           <tr>
          <td>Password</td>
          <td>
            <div class="col-sm-6">
                <input type="text" name="password" class="form-control" value="<?php echo $guru->password; ?>" required>
            </div>
            </td>
         </tr>
         <tr>
          <td>Jenis Kelamin</td>
          <td> <div class="col-sm-6">
          <select name="jenis_kelamin_guru" required="requreid" class="form-control">
              <?php if($guru->jenis_kelamin == 'L'){?>
            <option value="L">Laki - laki</option>
            <option value="P">Perempuan</option>
              <?php }else {?>
            <option value="P">Perempuan</option>
            <option value="L">Laki - laki</option>
              <?php }?>
          </select>
          </div>
          </td>
         </tr>
        <tr>
          <td>Email</td>
          <td>
            <div class="col-sm-6">
                <input type="email" name="email" class="form-control" value="<?php echo $guru->email; ?>" required>
            </div>
            </td>
         </tr>
         
       
         <tr>
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="Simpan Perubahan">
          </td>
         </tr>
       </table>
         <?php }?>
     </form>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->