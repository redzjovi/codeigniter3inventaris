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
              <th>Kode Peminjaman</th>
      				<th>Kode Petugas</th>
      				<th>Kode Barang</th>
      				<th>Tanggal Peminjaman</th>
              <th>Lama Pinjam</th>
              <th>Tanggal Kembali</th>
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
      			<td><?php echo($tes->kode_pinjam); ?></td>
      			<td><?php echo($tes->kode_petugas); ?></td>
            <td><?php echo($tes->kode_barang); ?></td>
            <td><?php echo($tes->tanggal_pinjam); ?></td>
            <td><?php echo($tes->lama_pinjam); ?></td>
            <td><?php echo($tes->tanggal_kembali); ?></td>
      			<td>
      				<a href="<?php echo base_url();?>index.php/c_peminjaman/update/<?php echo $tes->kode_pinjam;?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
      				<a href="<?php echo base_url();?>index.php/c_peminjaman/detail/<?php echo $tes->kode_pinjam;?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></a>
      				<a href="<?php echo base_url();?>index.php/c_peminjaman/hapus/<?php echo $tes->kode_pinjam;?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
				    </td>
		      <?php endforeach;?>
        </tr>      	
      	</tbody>
     
 
	</table>

	<p><a href="<?=base_url()?>index.php/c_peminjaman" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i>Kembali</a>
		</tbody>


</div>
</div>
</div><!--/container-->

<?php $this->load->view('footer');?>

