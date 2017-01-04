

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
		<td style="width:40%;">Kode Detail</td>
		<td>
			<div class="col-sm-10">
				 <?php echo $qsis->kode_detail;?>
			<div>
		</td>
	</tr>
	<tr>
		<td> Merk Barang </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qsis->merk_barang;?>
			</div>
		</td>
	</tr>
	<tr>
		<td> Made in </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qsis->madein_barang;?>
			</div>
		</td>
	</tr>
	<tr>
		<td> Asal Dana </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qsis->asal_dana;?>
			</div>
		</td>
	</tr>
 	<tr>
 		<td> Tahun Pengadaan </td>
		<td>	
			<div class="col-sm-10">	
				<?php echo $qsis->tahun_pengadaan;?>
			</div>
		</td>
	</tr>
	<tr>
 		<td> Keterangan </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qsis->keterangan;?>
			</div>
		</td>
	</tr>
 
	</table>
	<p><a href="<?=base_url()?>index.php/c_detail" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i>Kembali</a>
		
</div>
</div> <!--/panel-->
</div><!--/container-->
