<form action="" class="form-horizontal" method="post">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-3">User (*)</div>
            <div class="col-md-9">
                <select class="form-control" id="id_user" name="id_user" style="width: 100%;">
                    <<option value=""></option>
                    <?php foreach ((array) $user->result() as $row) : ?>
                        <option <?php echo set_select('id_user', $row->id_user); ?> value="<?php echo $row->id_user; ?>"><?php echo $row->nama_user; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Nama barang (*)</div>
            <div class="col-md-9">
                <select class="form-control" id="id_barang" name="id_barang" style="width: 100%;">
                    <<option value=""></option>
                    <?php foreach ((array) $barang->result() as $row) : ?>
                        <option <?php echo set_select('id_barang', $row->id_barang); ?> value="<?php echo $row->id_barang; ?>"><?php echo $row->kode_barang.' - '.$row->nama_barang; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Stok</div>
            <div class="col-md-9">
                <input class="form-control" disabled="disabled" id="stok" type="number">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Jumlah barang (*)</div>
            <div class="col-md-9">
                <input class="form-control" name="jumlah_barang" type="number" value="<?php echo set_value('jumlah_barang'); ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Tanggal pinjam (*)</div>
            <div class="col-md-9">
                <div class="input-group">
                    <input class="date-picker form-control" id="tanggal_pinjam" name="tanggal_pinjam" type="text" value="<?php echo set_value('tanggal_pinjam'); ?>">
                    <span class="input-group-addon">
    					<i class="fa fa-calendar bigger-110"></i>
    				</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">Lama pinjam (*)</div>
            <div class="col-md-9">
                <input class="form-control" name="lama_pinjam" type="number" value="<?php echo set_value('lama_pinjam'); ?>">
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-3">
                <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/barang'); ?>">Batal</a>
            </div>
            <div class="col-md-9">
                <input type="submit" class="btn btn-success btn-sm" value="Tambah">
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $('#id_user').select2({
        allowClear: true,
        placeholder: '- Pilih user - ',
    });
    $('#id_barang').select2({
        allowClear: true,
        placeholder: '- Pilih barang - ',
    }).trigger('change').on('select2:select', function (e) {
        barang_get( $(this).val() );
    });
    barang_get(<?php echo set_value('id_barang'); ?>);
    $('#tanggal_pinjam').datepicker({
		autoclose: true,
        format: 'dd-mm-yyyy',
		todayHighlight: true,
	});
});

function barang_get(id)
{
    $.ajax({
        url: '<?php echo site_url('admin/barang/get') ;?>',
        data: { id: id },
        success: function(result) {
            var result = $.parseJSON(result);
            $('#stok').val(result.jumlah_barang);
        }
    });
}
</script>