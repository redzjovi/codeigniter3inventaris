
  

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
      Daftar Barang
     </small>
    </h1>
<div>
<?php echo $this->session->flashdata('pesan');?>
 <!-- Main component for a primary marketing message or call to action -->
 
  <div class="panel-heading"><b>Data Barang</b></div>
  <div class="panel-body">
    
 <form action="<?php echo $action ;?>" method="post" class="navbar-form navbar-left" role="search">
     <select name='jeniscari' class="form-control">
          <option value='kode_barang'>Kode Barang</option>
          <option value='nama_barang'>Nama Barang</option>
          <option value='jumlah_barang'>Jumlah Barang</option>
          <option value='kode_detail'>Kode Detail</option>
          <option value='kode_kategori'>Kode Kategori</option>
          <option value='status'>Status</option>
        </select>
    <input type='text' name='textcari' class="form-control" placeholder="Search" aria-describedby="basic-addon2"> 
        <button type="submit" class="btn btn-info"><span class='glyphicon glyphicon-search' aria-hidden='true'> Cari</span></button>
      </form>
       
      <br>
    <a href="<?php echo base_url()?>index.php/c_barang/tambah" class="btn btn-success btn-sm"> <i class="ace-icon fa fa-plus">Tambah</i> </a>

    <table class="table table-striped">

      <thead>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Jumlah Barang</th>
          <th>Kode Detail</th>
          <th>Kode Kategori</th>
          <th>Status</th>
          
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
        <td><?php echo ($row->kode_barang); ?></td>
        <td><?php echo ($row->nama_barang); ?></td>
        <td><?php echo ($row->jumlah_barang);?></td>
        <td><?php echo ($row->kode_detail); ?></td>
        <td><?php echo ($row->kode_kategori); ?></td>
        <td><?php echo ($row->status); ?></td>
        <td><a href="<?php echo base_url();?>index.php/c_peminjaman/tambah/<?php echo $row->kode_barang;?>" class="btn btn-danger btn-sm">
           Pinjam</a>
        </td>
        <?php endforeach;?>
    </tr>

  </tbody>
</table>
      </div>
</div>

</div>