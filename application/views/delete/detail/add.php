
 
<?php $this->load->view('header');?>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<title> Tambah Data </title>

<div class="container">
	  <!-- Main component for a primary marketing message or call to action -->

	 <div class="panel panel-default">
		<div class="panel-heading"><b> Tambah Detail Barang </b></div>
	 	<div class="panel-body"> 		
	 <form action="<?=base_url()?>index.php/c_detail/action_add "method='post'>

<table calss="table table-stiped">
	<tr>
		<td style="width:40%;">Kode Detail</td>
		<td>
			<div class="col-sm-10">
				
				 <input type='text' name='kode_detail' class="form-control">
				 	</div></td></tr>

	<tr>
		<td> Merk Barang </td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='merk_barang' class="form-control">
			</div></td>
		</tr>
		<tr>
			<td> Made in </td>
			<td>
					<div class="col-sm-10">
						<input type='text' name='madein_barang' class="form-control">
					</div>
			</td>
		</tr>
	<tr>
		<td> Asal Dana </td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='asal_dana' class="form-control">
			</div></td>
		</tr>
	<tr>
		<td> Tahun Pengadaan</td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='tahun_pengadaan' class="form-control">
			</div></td>
		</tr>
	<tr>
		<td> Keterangan</td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='keterangan' class="form-control">
			</div>
    		</td>
		</tr>
	<tr>
		
		<td>
			<td><div class="form-group col-sm-10 ">
				<input type="submit" class="btn btn-success" value="Simpan">
				<a href="<?php echo base_url() ?>index.php/c_detail/" class="btn btn-danger col-md-6" >Batal </a>
				</div>
			</td>

		</td>
	
	</tr>
</table>
</center>
</form>
	</div> <!--/panel-->
</div> <!--/container-->

<?php $this->load->view('footer');?>
