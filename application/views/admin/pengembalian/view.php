<form action="" class="form-horizontal" method="post">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-3">Nama user</div>
            <div class="col-md-9">
                <input class="form-control" disabled="disabled" type="text" value="<?php echo $pengembalian->nama_user; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Nama barang</div>
            <div class="col-md-9">
                <input class="form-control" disabled="disabled" type="text" value="<?php echo $pengembalian->nama_barang; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Jumlah barang</div>
            <div class="col-md-9">
                <input class="form-control" disabled="disabled" type="number" value="<?php echo $pengembalian->jumlah_barang; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Tanggal kembali</div>
            <div class="col-md-9">
                <input class="form-control" disabled="disabled" type="text" value="<?php echo $pengembalian->tanggal_kembali; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Tanggal dikembalikan</div>
            <div class="col-md-9">
                <input class="form-control" disabled="disabled" type="text" value="<?php echo $pengembalian->tanggal_dikembalikan; ?>">
            </div>
        </div>

    </div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-3">
                <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/pengembalian'); ?>">Batal</a>
            </div>
        </div>
    </div>
</form>