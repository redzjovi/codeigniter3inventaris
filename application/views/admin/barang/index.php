<a class="btn btn-primary btn-sm" href="<?php echo site_url('admin/barang/create'); ?>">
    <i class="glyphipcon glyphicon-plus"> </i> Tambah
</a>
<table class="table table-bordered table-hover table-striped" id="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Status</th>
            <th>Kategori Barang</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ((array) $barang->result() as $row) : ?>
            <tr>
                <td></td>
                <td><?php echo ($row->kode_barang); ?></td>
                <td><?php echo ($row->nama_barang); ?></td>
                <td><?php echo ($row->jumlah_barang); ?></td>
                <td><?php echo ($row->status); ?></td>
                <td><?php echo ($row->nama_kategori); ?></td>
                <td>
                    <a class="btn btn-info btn-sm" href="<?php echo site_url('admin/barang/update/'.$row->id_barang); ?>">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/barang/delete/'.$row->id_barang); ?>" onclick="return confirm('Anda yakin menghapus data ini?')">
                        <i class="glyphicon glyphicon-trash"></i>
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