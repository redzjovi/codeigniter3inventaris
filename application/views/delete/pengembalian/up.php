<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<?php $this->load->view('header');?>
	
<div class="container">
	  <!-- Main component for a primary marketing message or call to action -->

	 <div class="panel panel-default">
	 	<div class="panel-heading"><label> Form Update Pengembalian</label></div>
	 	<div class="panel-body">
	 		<center>
	 <form action="<?=base_url()?>index.php/c_pengembalian/action_update "method='post'>
	 	<input type='hidden' name='id_hidden' value="<?php echo $qkem->kode_pengembalian ;?>"> 
<table calss="table table-stiped">
	<tr>
		<td style="width:40%;">Kode Pengembalian</td>
		<td>
			<div class="col-sm-10">
				 <input type='text' name='kode_pengembalian' class="form-control" value="<?php echo $qkem->kode_pengembalian; ?>">
			<div>
		</td>
	</tr>
	<tr>
		<td> Kode Pinjam </td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='kode_pinjam' class="form-control" value="<?php echo $qkem->kode_pinjam;?>">
			</div>
		</td>
	</tr>
	<tr>
		<td> Kode Petugas </td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='kode_petugas' class="form-control" value="<?php echo $qkem->kode_petugas;?>">
			</div>
		</td>
	</tr>
	<tr>
		<td> Username </td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='username' class="form-control" value="<?php echo $qkem->kode_petugas;?>">
			</div>
		</td>
	</tr>
	<tr>
		<td>Kode Barang</td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='kode_barang' class="form-control" value="<?php echo $qkem->kode_barang;?>">
			</div>
		</td>
	</tr>
	<tr>
		<td>Tanggal Kembali </td>
		<td>
			<div class="col-sm-10">
				<label><?php echo date('d-m-Y',strtotime($qkem->tanggal_kembali))?></label>
			</div>
		</td>
	</tr>
	<tr>
		<td>Dikembalikan </td>
		<td>
			<div class="col-sm-10">
				<label><?php echo date('d-m-Y H:i',strtotime($qkem->tanggal_dikembalikan))?></label>
			</div>
		</td>
	</tr>
	<tr>
		<td> Status </td>
		<td>
			<div class="col-sm-10">
				<select class="form-control" name="status">
				<option value="baik">Baik</option>
				<option value="rusak">Rusak</option>
				<option value="rusak_berat">Rusak Berat</option>
				<option value="hilang">Hilang</option>
				
				</select>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<td><div class="form-group col-sm-10 ">
				<input type="submit" class="btn btn-success" value="Simpan">
				<a href="<?php echo base_url() ?>index.php/c_pengembalian/" class="btn btn-danger col-md-6" > Batal </a>
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
