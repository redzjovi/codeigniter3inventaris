<form action="" class="form-horizontal" method="post">
    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-3">Kode Barang (*)</div>
            <div class="col-md-9">
                <input class="form-control" name="kode_barang" type="text" value="<?php echo set_value('kode_barang', $barang->kode_barang); ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Nama Barang (*)</div>
            <div class="col-md-9">
                <input class="form-control" name="nama_barang" type="text" value="<?php echo set_value('nama_barang', $barang->nama_barang); ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Jumlah Barang (*)</div>
            <div class="col-md-9">
                <input class="form-control" name="jumlah_barang" type="number" value="<?php echo set_value('jumlah_barang', $barang->jumlah_barang); ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Status (*)</div>
            <div class="col-md-9">
                <select class="form-control" name="status">
                    <option <?php echo set_select('status', 'Baik', ($barang->status == 'Baik' ? TRUE : FALSE)); ?> value="Baik">Baik</option>
                    <option <?php echo set_select('status', 'Rusak', ($barang->status == 'Rusak' ? TRUE : FALSE)); ?> value="Rusak">Rusak</option>
                    <option <?php echo set_select('status', 'Rusak Berat', ($barang->status == 'Rusak Berat' ? TRUE : FALSE)); ?> value="Rusak Berat">Rusak Berat</option>
                    <option <?php echo set_select('status', 'Hilang', ($barang->status == 'Hilang' ? TRUE : FALSE)); ?> value="Hilang">Hilang</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Kategori Barang</div>
            <div class="col-md-9">
                <select class="form-control" name="id_kategori">
                    <option value="">- Pilih kategori -</option>
                    <?php foreach ((array) $kategori_barang->result() as $row) : ?>
                        <option
                            <?php echo set_select('id_kategori', $row->id_kategori, ($barang->id_kategori == $row->id_kategori ? TRUE : FALSE)); ?>
                            value="<?php echo $row->id_kategori; ?>"
                        ><?php echo $row->nama_kategori; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-3">Made In</div>
            <div class="col-md-9">
                <input class="form-control" name="madein_barang" type="text" value="<?php echo set_value('madein_barang', $detail_barang->madein_barang); ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Merk Barang</div>
            <div class="col-md-9">
                <input class="form-control" name="merk_barang" type="text" value="<?php echo set_value('merk_barang', $detail_barang->merk_barang); ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Asal Dana</div>
            <div class="col-md-9">
                <input class="form-control" name="asal_dana" type="text" value="<?php echo set_value('asal_dana', $detail_barang->asal_dana); ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Tahun Pengadaan</div>
            <div class="col-md-9">
                <input class="form-control" name="tahun_pengadaan" type="text" value="<?php echo set_value('tahun_pengadaan', $detail_barang->tahun_pengadaan); ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Keterangan</div>
            <div class="col-md-9">
                <textarea class="form-control" name="keterangan" style="resize: none;"><?php echo set_value('keterangan', $detail_barang->keterangan); ?></textarea>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-3">
                <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/barang'); ?>">Batal</a>
            </div>
            <div class="col-md-9">
                <input name="id_barang" type="hidden" value="<?php echo $barang->id_barang; ?>" />
                <input type="submit" class="btn btn-success btn-sm" value="Ubah">
            </div>
        </div>
    </div>
</form>