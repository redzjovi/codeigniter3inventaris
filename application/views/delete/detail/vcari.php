<title> Hasil Pencarian</title>

<?php $this->load->view('header');?>

<div class="container">
		<!--Main component for aprimary marketing message or callto activon-->

<div class="panel panel-default">
	<div class="panel-heading"><b><label>Data yang anda cari : </label></b></div>
	<div class="panel-body">

	<table class="table table-striped">
		
      	<thead>
      		<tr>
      				<th>No</th>
              <th>Kode Detail</th>
      				<th>Merk Barang</th>
      				<th>Made in</th>
      				<th>Asal Dana</th>
              <th>Tahun Pengadaan</th>
              <th>Keterangan</th>
              <th></th>
      		</tr>
           	</thead>
      <tbody>
      	
      	<?php 
           $no=0;
        		foreach($result as $tes):
        		$no++;
        ?>
      	<tr>
      			<td><?php echo $no;?></td>
      			<td><?php echo($tes->kode_detail); ?></td>
      			<td><?php echo($tes->merk_barang); ?></td>
            <td><?php echo($tes->madein_barang); ?></td>
            <td><?php echo($tes->asal_dana); ?></td>
            <td><?php echo($tes->tahun_pengadaan); ?></td>
            <td><?php echo($tes->Keterangan); ?></td>
      			<td>
      				<a href="<?php echo base_url();?>index.php/c_detail/update/<?php echo $tes->kode_detail;?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
      				<a href="<?php echo base_url();?>index.php/c_detail/detail/<?php echo $tes->kode_detail;?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></a>
      				<a href="<?php echo base_url();?>index.php/c_detail/hapus/<?php echo $tes->kode_detail;?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
				    </td>
		      <?php endforeach;?>
        </tr>      	
      	</tbody>
     
 
	</table>

	<p><a href="<?=base_url()?>index.php/c_detail" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i>Kembali</a>
		</tbody>


</div>
</div>
</div><!--/container-->

<?php $this->load->view('footer');?>

