<form action="" class="form-horizontal" method="post">
    <div class="form-group">
        <div class="col-md-3">Nama Kategori (*)</div>
        <div class="col-md-9">
            <input type='text' name='nama_kategori' value="<?php echo set_value('nama_kategori', $kategori_barang->nama_kategori); ?>" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">
            <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/kategori_barang'); ?>">Batal</a>
        </div>
        <div class="col-md-9">
            <input name="id_kategori" type="hidden" value="<?php echo $kategori_barang->id_kategori; ?>" />
            <input type="submit" class="btn btn-sm btn-success" value="Ubah">
        </div>
    </div>
</form>