

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
		<td style="width:40%;">Kode Barang</td>
		<td>
			<div class="col-sm-10">
				 <?php echo $qsis->kode_barang;?>
			<div>
		</td>
	</tr>
	<tr>
		<td> Nama Barang </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qsis->nama_barang;?>
			</div>
		</td>
	</tr>
	<tr>
		<td> Jumlah Barang </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qsis->jumlah_barang;?>
			</div>
		</td>
	</tr>
	<tr>
		<td> Kode Detail </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qsis->kode_detail;?>
			</div>
		</td>
	</tr>
 	<tr>
 		<td> Kode Kategori </td>
		<td>	
			<div class="col-sm-10">	
				<?php echo $qsis->kode_kategori;?>
			</div>
		</td>
	</tr>
	<tr>
 		<td> Status </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qsis->status;?>
			</div>
		</td>
	</tr>
 
	</table>
	<p><a href="<?=base_url()?>index.php/c_barang" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i>Kembali</a>
		
</div>
</div> <!--/panel-->
</div><!--/container-->
