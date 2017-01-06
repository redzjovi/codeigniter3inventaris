<table class="table table-bordered table-hover table-striped" id="table">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Nama barang</th>
            <th>Jumlah barang</th>
            <th>Tanggal kembali</th>
            <th>Tanggal dikembalikan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ((array) $pengembalian->result() as $row) : ?>
            <tr>
                <td></td>
                <td><?php echo ($row->nama_user); ?></td>
                <td><?php echo ($row->nama_barang); ?></td>
                <td><?php echo ($row->jumlah_pengembalian); ?></td>
                <td><?php echo ($row->tanggal_kembali); ?></td>
                <td><?php echo ($row->tanggal_dikembalikan); ?></td>
                <td>
                    <a class="btn btn-info btn-sm" href="<?php echo site_url('admin/pengembalian/view/'.$row->id_pengembalian); ?>">
                        <i class="fa fa-eye"></i> Lihat
                    </a>
                    <?php echo  ($row->status_pengembalian == 1 ?
                        '<button class="btn btn-success btn-sm">Sudah dikembalikan</button>' :
                        '<button class="btn btn-danger btn-sm">Belum dikembalikan</button>');
                    ?>
                </td>
                fa fa-eye
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