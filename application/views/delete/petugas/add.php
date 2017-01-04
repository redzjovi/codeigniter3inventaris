
 
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
		<div class="panel-heading"><b> Tambah Data Petugas </b></div>
	 	<div class="panel-body"> 		
	 <form action="<?=base_url()?>index.php/c_petugas/action_add "method='post'>

<table calss="table table-stiped">
	<tr>
		<td style="width:40%;">Kode Petugas</td>
		<td>
			<div class="col-sm-10">
				
				 <input type='text' name='kode_petugas' class="form-control">
				 	</div></td></tr>

	<tr>
		<td> Kode Role </td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='kode_role' class="form-control">
			</div>
		</td>
	</tr>
	<tr>
		<td> Nama </td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='nama' class="form-control">
			</div>
		</td>
	</tr>
	<tr>
		<td> <p>Jenis Kelamin </p> </td>
		<td>
   				<label class="radio-inline"><input type="radio" name="jk" value="L">L</label>
   				<label class="radio-inline"><input type="radio" name="jk" value="P">P</label>
   		</td>
	</tr>
	<tr>
		<td> Alamat </td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='alamat' class="form-control">
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<td><div class="form-group col-sm-10 ">
				<input type="submit" class="btn btn-success" value="Simpan">
				<a href="<?php echo base_url() ?>index.php/c_petugas/" class="btn btn-danger col-md-6" >Batal </a>
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
