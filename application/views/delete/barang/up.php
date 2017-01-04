<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<?php $this->load->view('header');?>
	
<div class="container">
	  <!-- Main component for a primary marketing message or call to action -->

	 <div class="panel panel-default">
	 	<div class="panel-heading"><label> Form Update Barang</label></div>
	 	<div class="panel-body">
	 		
	 <form action="<?=base_url()?>index.php/c_barang/action_update "method='post'>
	 	<input type='hidden' name='id_hidden' value="<?php echo $qsis->kode_barang ;?>"> 
<table calss="table table-stiped">
	<tr>
		<td style="width:40%;">Kode Barang</td>
		<td>
			<div class="col-sm-10">
				 <input type='text' name='kode_barang' class="form-control" value="<?php echo $qsis->kode_barang; ?>">
			<div>
		</td>
	</tr>
	<tr>
		<td> Nama Barang </td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='nama_barang' class="form-control" value="<?php echo $qsis->nama_barang;?>">
			</div>
		</td>
	</tr>
	<tr>
		<td> Jumlah Barang </td>
		<td>
			<div class="col-sm-10">
					<input type='text' name='jumlah_barang' class="form-control" value="<?php echo $qsis->jumlah_barang;?>">
			</div>
		</td>
	</tr>
	<tr>
		<td>Kode Detail</td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='kode_detail' class="form-control" value="<?php echo $qsis->kode_detail;?>">
			</div>
		</td>
	</tr>
	<tr>
		<td>Kode Kategori</td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='kode_kategori' class="form-control" value="<?php echo $qsis->kode_kategori;?>">
			</div>
		</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='status' class="form-control" value="<?php echo $qsis->status;?>">
			</div>
		</td>
	</tr>
	<tr>
		
		<td>
			<td><div class="form-group col-sm-10 ">
				<input type="submit" class="btn btn-success" value="Simpan">
				<a href="<?php echo base_url() ?>index.php/c_barang/" class="btn btn-danger col-md-6" >Batal </a>
				</div>
			</td>
		</td>
	</tr>
</table>

</form>
	</div> <!--/panel-->
</div> <!--/container-->

<?php $this->load->view('footer');?>
