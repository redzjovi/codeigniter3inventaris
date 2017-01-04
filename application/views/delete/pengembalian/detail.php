

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<title> Data detail </title>

<div class="panel panel-default">
<div class="panel-panel heading"><b>Detail Data </b></div>
<div class="panel-body">
<style>
.body={margin-top :50px;}
</style>
	<table class="table table-striped">
	<tr>
		<td style="width:40%;">Kode Pengembalian</td>
		<td>
			<div class="col-sm-10">
				 <?php echo $qkem->kode_pengembalian;?>
			<div>
		</td>
	</tr>
	<tr>
		<td> Kode Pinjam </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qkem->kode_pinjam;?>
			</div>
		</td>
	</tr>
	<tr>
		<td> Kode Petugas </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qkem->kode_petugas;?>
			</div>
		</td>
	</tr>
	<tr>
		<td> Username </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qkem->username;?>
			</div>
		</td>
	</tr>
	<tr>
		<td> Kode Barang </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qkem->kode_barang;?>
			</div>
		</td>
	</tr>
 	<tr>
 		<td> Tanggal Kembali</td>
		<td>
			<div class="col-sm-10">
				<?php echo $qkem->tanggal_kembali;?>
			</div>
		</td>
	</tr>
	<tr>
 		<td> Dikembalikan </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qkem->tanggal_dikembalikan;?>
			</div>
		</td>
	</tr>
	<tr>
 		<td> Status </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qkem->status;?>
			</div>
		</td>
	</tr>
 

 
	</table>
	<p><a href="<?=base_url()?>index.php/c_pengembalian" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i>Kembali</a>
		
</div>
</div> <!--/panel-->
</div><!--/container-->
