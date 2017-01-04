<form action="" class="form-horizontal" method="post">
    <div class="form-group">
        <div class="col-md-3">
            Nama Kategori (*)
        </div>
        <div class="col-md-9">
            <input type='text' name='nama_kategori' class="form-control">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">
            <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/kategori_barang'); ?>">Batal</a>
        </div>
        <div class="col-md-9">
            <input type="submit" class="btn btn-success" value="Simpan">
        </div>
    </div>
</form>