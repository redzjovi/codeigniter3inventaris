<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<?php $this->load->view('header');?>
	
<div class="container">
	  <!-- Main component for a primary marketing message or call to action -->

	 <div class="panel panel-default">
	 	<div class="panel-heading"><label> Form Update User</label></div>
	 	<div class="panel-body">
	 		
	 <form action="<?=base_url()?>index.php/c_user/action_update "method='post'>
	 	<input type='hidden' name='id_hidden' value="<?php echo $quser->username ;?>"> 
<table calss="table table-stiped">
	<tr>
		<td style="width:40%;">Username</td>
		<td>
			<div class="col-sm-10">
				 <input type='text' name='username' class="form-control" value="<?php echo $quser->username; ?>">
			<div>
		</td>
	</tr>
	<tr>
		<td> Password </td>
		<td>
			<div class="col-sm-10">
				<input type='text' name='password' class="form-control" value="<?php echo $quser->password;?>">
			</div>
		</td>
	</tr>
	<tr>
		<td> Nama </td>
		<td>
			<div class="col-sm-10">
					<input type='text' name='nama_user' class="form-control" value="<?php echo $quser->nama_user;?>">
			</div>
		</td>
	</tr>
	<tr>
	 <td><p>Jenis Kelamin </p></td>
	 	<td>
		
			<label class="radio-inline"><input type="radio" name="jk" value="L"
			 <?php echo set_checkbox('jk', 'L', ($quser->jk == 'L' ? true : false)) ?> >L </label>
			<label class="radio-inline"> <input type="radio" name="jk" value="P" 
				<?php echo set_checkbox('jk', 'P', ($quser->jk == 'P' ? true : false)) ?> >P </label>
		</td> 
	</tr>
	<tr>
		<td>Jurusan </td>
			<td>
			<div class="col-sm-10">
				<select class="form-control" name="jurusan">
				<option value="RPL">RPL</option>
				<?php echo set_checkbox('jurusan', 'RPL', ($quser->jurusan == 'RPL' ? true : false)) ?> >RPL</label>
				<option value="MM">MM</option>
				<?php echo set_checkbox('jurusan', 'MM', ($quser->jurusan == 'MM' ? true : false)) ?> >MM</label>
				<option value="TKJ">TKJ</option>
				<?php echo set_checkbox('jurusan', 'TKJ', ($quser->jurusan == 'TKJ' ? true : false)) ?> >TKJ</label>
				<option value="TKI">TKI</option>
				<?php echo set_checkbox('jurusan', 'TKI', ($quser->jurusan == 'TKI' ? true : false)) ?> >TKI </label>
				
				</select>
			</div>
		</td>
	</tr>
	<tr>
		
		<td>
			<td><div class="form-group col-sm-10 ">
				<input type="submit" class="btn btn-success" value="Simpan">
				<a href="<?php echo base_url() ?>index.php/c_user/" class="btn btn-danger col-md-6" >Batal </a>
				</div>
			</td>
		</td>
	</tr>
</table>

</form>
	</div> <!--/panel-->
</div> <!--/container-->

<?php $this->load->view('footer');?>
