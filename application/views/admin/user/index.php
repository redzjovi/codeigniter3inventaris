<a class="btn btn-primary btn-sm" href="<?php echo site_url('admin/user/create'); ?>">
    <i class="glyphipcon glyphicon-plus"> </i> Tambah
</a>
<table class="table table-bordered table-hover table-striped" id="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama User</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Jurusan</th>
            <th>Role</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ((array) $user->result() as $row) : ?>
            <tr>
                <td></td>
                <td><?php echo ($row->username); ?></td>
                <td><?php echo ($row->nama_user); ?></td>
                <td><?php echo ($row->alamat); ?></td>
                <td><?php echo ($row->jenis_kelamin); ?></td>
                <td><?php echo ($row->jurusan); ?></td>
                <td><?php echo ($row->nama_role); ?></td>
                <td>
                    <a class="btn btn-info btn-sm" href="<?php echo site_url('admin/user/update/'.$row->id_user); ?>">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/user/delete/'.$row->id_user); ?>" onclick="return confirm('Anda yakin menghapus data ini?')">
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