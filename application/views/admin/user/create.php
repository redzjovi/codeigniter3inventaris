<form action="" class="form-horizontal" method="post">
    <div class="form-group">
        <div class="col-md-3">Username (*)</div>
        <div class="col-md-9">
            <input class="form-control" name="username" type="text" value="<?php echo set_value('username'); ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">Password (*)</div>
        <div class="col-md-9">
            <input class="form-control" name="password" type="password" value="<?php echo set_value('password'); ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">Nama User (*)</div>
        <div class="col-md-9">
            <input class="form-control" name="nama_user" type="text" value="<?php echo set_value('nama_user'); ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">Alamat</div>
        <div class="col-md-9">
            <textarea class="form-control" name="alamat"><?php echo set_value('alamat'); ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">Jenis Kelamin (*)</div>
        <div class="col-md-9">
            <select class="form-control" name="jenis_kelamin">
                <option <?php echo set_select('jenis_kelamin', 'L'); ?> value="L">Laki-laki</option>
                <option <?php echo set_select('jenis_kelamin', 'P'); ?> value="P">Perempuan</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">Jurusan (*)</div>
        <div class="col-md-9">
            <select class="form-control" name="jurusan">
                <option value="">- Pilih jurusan -</option>
                <option <?php echo set_select('jurusan', 'MM'); ?> value="MM">MM</option>
                <option <?php echo set_select('jurusan', 'TKI'); ?> value="TKI">TKI</option>
                <option <?php echo set_select('jurusan', 'TKJ'); ?> value="TKJ">TKJ</option>
                <option <?php echo set_select('jurusan', 'RPL'); ?> value="RPL">RPL</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">Role (*)</div>
        <div class="col-md-9">
            <select class="form-control" name="id_role">
                <option value="">- Pilih role -</option>
                <?php foreach ((array) $role->result() as $row) : ?>
                    <option <?php echo set_select('id_role', $row->id_role); ?> value="<?php echo $row->id_role; ?>"><?php echo $row->nama_role; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">
            <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/user'); ?>">Batal</a>
        </div>
        <div class="col-md-9">
            <input type="submit" class="btn btn-sm btn-success" value="Tambah">
        </div>
    </div>
</form>