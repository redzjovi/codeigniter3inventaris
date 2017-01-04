

<div class="main-content">
 <div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
   <ul class="breadcrumb">
    <li>
     <i class="ace-icon fa fa-home home-icon"></i>
     <a href="<?php echo base_url();?>">Home</a>
    </li>
    <li class="active">Blank Page</li>
   </ul><!-- /.breadcrumb -->
 
   </div><!-- /.nav-search -->
  </div>
  <div class="page-content">
   <div class="page-header">
    <h1>
     ICT INVENTORY
     <small>
      <i class="ace-icon fa fa-angle-double-right"></i>
      Form Barang
     </small>
    </h1>
<div>
<?php echo $this->session->flashdata('pesan');?>
 <!-- Main component for a primary marketing message or call to action -->
  <div class="panel panel-default">
  <div class="panel-heading"><b>Form Barang</b></div>
  <div class="panel-body">
			
	 <form action="<?=base_url()?>index.php/c_barang/action_add "method='post'>

<table calss="table table-stiped">
	<tr>
		<td style="width:40%;">Kode Barang</td>
		<td>
			<div class="col-sm-10">
				
				 <input type='text' name='kode_barang' class="form-control">
				 	</div></td></tr>

	<tr>
		<td> Nama Barang </td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='nama_barang' class="form-control">
			</div></td>
		</tr>
		<tr>
			<td> Jumlah Barang </td>
			<td>
					<div class="col-sm-10">
						<input type='text' name='jumlah_barang' class="form-control">
					</div>
			</td>
		</tr>
	<tr>
		<td> Kode Detail </td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='kode_detail' class="form-control">
			</div></td>
		</tr>
	<tr>
		<td> Kode Kategori</td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='kode_kategori' class="form-control">
			</div></td>
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
			<td><div class="form-group col-sm-15 ">
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

