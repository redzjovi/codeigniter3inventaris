<a class="btn btn-primary btn-sm" href="<?php echo site_url('admin/peminjaman/create'); ?>">
    <i class="glyphipcon glyphicon-plus"> </i> Tambah
</a>
<table class="table table-bordered table-hover table-striped" id="table">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Nama barang</th>
            <th>Jumlah barang</th>
            <th>Tanggal pinjam</th>
            <th>Lama pinjam</th>
            <th>Tanggal kembali</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ((array) $peminjaman->result() as $row) : ?>
            <tr>
                <td></td>
                <td><?php echo ($row->nama_user); ?></td>
                <td><?php echo ($row->nama_barang); ?></td>
                <td><?php echo ($row->jumlah_barang); ?></td>
                <td><?php echo ($row->tanggal_pinjam); ?></td>
                <td><?php echo ($row->lama_pinjam); ?></td>
                <td><?php echo ($row->tanggal_kembali); ?></td>
                <td>
                    <a class="btn btn-info btn-sm" href="<?php echo site_url('admin/peminjaman/returned/'.$row->id_peminjaman); ?>" onclick="return confirm('Anda yakin sudah dikembalikan?')">
                        <i class="fa fa-reply"></i> Dikembalikan
                    </a>
                </td>
            <?php endforeach; ?>
        </tr>
    </tbody>
</table>

<script>
$(function(){
    var t = $('#table').DataTable();
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
});
</script>