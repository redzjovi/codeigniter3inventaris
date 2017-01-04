<?php $this->load->view('layout/header');?>
<?php echo $this->session->flashdata('pesan');?>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <div class="container">

     <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Data Peminjaman</b></div>
  <div class="panel-body">
    
 <form action="<?php echo $action ;?>" method="post" class="navbar-form navbar-left" role="search">
     <select name='jeniscari' class="form-control">
          <option value='kode_pinjam'>Kode Peminjaman</option>
          <option value='kode_petugas'>Kode Petugas</option>
          <option value='kode_barang'>Kode Barang</option>
          <option value='tanggal_pinjam'>Tanggal Peminjaman</option>
          <option value='lama_pinjam'>Lama Pinjam</option>
          <option value='tanggal_kembali'>Tanggal Kembali</option>
        </select>
        <input type='text' name='textcari' class="form-control" placeholder="Search" aria-describedby="basic-addon2"> 
        <button type="submit" class="btn btn-info"><span class='glyphicon glyphicon-search' aria-hidden='true'> Cari</span></button>
      </form>
      <br>
    <a href="<?php echo base_url()?>index.php/c_peminjaman/tambah" class="btn btn-sm btn-primary"><i class="glyphipcon glyphicon-plus">
    </i> Tambah </a>

    <table class="table table-striped">

      <thead>
        <tr>
          <th>No</th>
          <th>Kode Peminjaman</th>
          <th>Kode Petugas</th>
          <th>Username</th>
          <th>Kode Barang</th>
          <th>Tanggal Peminjaman</th>
           <th>Lama Pinjam</th>
          <th>Tanggal Kembali</th>
          <th></th>
        </tr>
      </thead>
    <tbody>

      <?php
        $no=0;
        foreach($data->result() as $row):
        $no++;
        ?>

      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo ($row->kode_pinjam); ?></td>
        <td><?php echo ($row->kode_petugas); ?></td>
        <td><?php echo ($row->username);?></td>
        <td><?php echo ($row->kode_barang); ?></td>
        <td><?php echo ($row->tanggal_pinjam); ?></td>
        <td><?php echo ($row->lama_pinjam); ?></td>
        <td><?php echo ($row->tanggal_kembali); ?></td>
        <td>
          <a href="<?php echo base_url();?>index.php/c_peminjaman/update/<?php echo $row->kode_pinjam;?>" class="btn btn-info btn-sm">
            <i class="glyphicon glyphicon-pencil"></i></a>
          <a href="<?php echo base_url();?>index.php/c_peminjaman/det/<?php echo $row->kode_pinjam;?>" class="btn btn-warning btn-sm">
            <i class="glyphicon glyphicon-search"></i></a>
            <a href="<?php echo base_url();?>index.php/c_peminjaman/hapus/<?php echo $row->kode_pinjam;?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')">
            <i class="glyphicon glyphicon-trash"></i></a>
            </td>
      <?php endforeach;?>
    </tr>

  </tbody>
</table>

<nav class="paging";>
  <?php
    if($data->num_rows() > 0)
    {
      echo "$paging";
    }
?>
</nav>
</div>
</div>

</div>

<?php $this->load->view('footer');?>