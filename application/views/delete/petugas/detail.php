

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<title> Data detail </title>

<div class="panel panel-default">
<div class="panel-panel heading"><b>Detail Data Petugas </b></div>
<div class="panel-body">
<style>
.body={margin-top :50px;}
</style>
	<table class="table table-striped">
	<tr>
		<td style="width:40%;">Kode Petugas</td>
		<td>
			<div class="col-sm-10">
				 <?php echo $qser->kode_petugas;?>
			<div>
		</td>
	</tr>
	<tr>
		<td> Kode Role </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qser->kode_role;?>
			</div>
		</td>
	</tr>
	<tr>
		<td> Nama </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qser->nama;?>
			</div>
		</td>
	</tr>
	<tr>
		<td> Jenis Kelamin </td>
		<td>
			<div class="col-sm-10">
				<?php echo $qser->jk;?>
			</div>
		</td>
	</tr>
 	<tr>
 		<td> Alamat</td>
		<td>
			<div class="col-sm-10">
				<?php echo $qser->alamat;?>
			</div>
		</td>
	</tr>
 

 
	</table>
	<p><a href="<?=base_url()?>index.php/c_petugas" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i>Kembali</a>
		
</div>
</div> <!--/panel-->
</div><!--/container-->
