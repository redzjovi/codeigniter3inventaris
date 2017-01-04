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
              <th>Kode Petugas</th>
      				<th>Kode Role</th>
      				<th>Nama</th>
      				<th>Jenis Kelamin</th>
              <th>Alamat</th>
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
      			<td><?php echo($tes->kode_petugas); ?></td>
      			<td><?php echo($tes->kode_role); ?></td>
            <td><?php echo($tes->nama); ?></td>
            <td><?php echo($tes->jk); ?></td>
            <td><?php echo($tes->alamat); ?></td>
      			<td>
      				<a href="<?php echo base_url();?>index.php/c_petugas/update/<?php echo $tes->kode_petugas;?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
      				<a href="<?php echo base_url();?>index.php/c_petugas/detail/<?php echo $tes->kode_petugas;?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></a>
      				<a href="<?php echo base_url();?>index.php/c_petugas/hapus/<?php echo $tes->kode_petugas;?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
				    </td>
		      <?php endforeach;?>
        </tr>      	
      	</tbody>
     
 
	</table>

	<p><a href="<?=base_url()?>index.php/c_petugas" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i>Kembali</a>
		</tbody>


</div>
</div>
</div><!--/container-->

<?php $this->load->view('footer');?>

