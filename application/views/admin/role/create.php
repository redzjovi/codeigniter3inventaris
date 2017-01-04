<form action="" class="form-horizontal" method="post">
    <div class="form-group">
        <div class="col-md-3">Nama Role (*)</div>
        <div class="col-md-9">
            <input type='text' name='nama_role' class="form-control">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">
            <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/role'); ?>">Batal</a>
        </div>
        <div class="col-md-9">
            <input type="submit" class="btn btn-sm btn-success" value="Tambah">
        </div>
    </div>
</form>