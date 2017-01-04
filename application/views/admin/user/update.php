<form action="" class="form-horizontal" method="post">
    <div class="form-group">
        <div class="col-md-3">Username (*)</div>
        <div class="col-md-9">
            <input class="form-control" name="username" type="text" value="<?php echo set_value('username', $user->username); ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">Password (*)</div>
        <div class="col-md-9">
            <input class="form-control" name="password" type="password" value="<?php echo set_value('password', $user->password); ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">Nama User (*)</div>
        <div class="col-md-9">
            <input class="form-control" name="nama_user" type="text" value="<?php echo set_value('nama_user', $user->nama_user); ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">Alamat</div>
        <div class="col-md-9">
            <textarea class="form-control" name="alamat"><?php echo set_value('alamat', $user->alamat); ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">Jenis Kelamin (*)</div>
        <div class="col-md-9">
            <select class="form-control" name="jenis_kelamin">
                <option <?php echo set_select('jenis_kelamin', 'L', ($user->jenis_kelamin == 'L' ? TRUE : FALSE)); ?> value="L">Laki-laki</option>
                <option <?php echo set_select('jenis_kelamin', 'P', ($user->jenis_kelamin == 'P' ? TRUE : FALSE)); ?>value="P">Perempuan</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">Jurusan (*)</div>
        <div class="col-md-9">
            <select class="form-control" name="jurusan">
                <option value="">- Pilih jurusan -</option>
                <option <?php echo set_select('jurusan', 'MM', ($user->jenis_kelamin == 'MM' ? TRUE : FALSE)); ?> value="MM">MM</option>
                <option <?php echo set_select('jurusan', 'TKI', ($user->jenis_kelamin == 'TKI' ? TRUE : FALSE)); ?> value="TKI">TKI</option>
                <option <?php echo set_select('jurusan', 'TKJ', ($user->jenis_kelamin == 'TKJ' ? TRUE : FALSE)); ?> value="TKJ">TKJ</option>
                <option <?php echo set_select('jurusan', 'RPL', ($user->jenis_kelamin == 'RPL' ? TRUE : FALSE)); ?> value="RPL">RPL</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">Role (*)</div>
        <div class="col-md-9">
            <select class="form-control" name="id_role">
                <option value="">- Pilih role -</option>
                <?php foreach ((array) $role->result() as $row) : ?>
                    <option <?php echo set_select('id_role', $row->id_role, ($row->id_role == $user->id_role ? TRUE : FALSE)); ?>
                        value="<?php echo $row->id_role; ?>"
                    ><?php echo $row->nama_role; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">
            <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/user'); ?>">Batal</a>
        </div>
        <div class="col-md-9">
            <input name="id_user" type="hidden" value="<?php echo $user->id_user; ?>" />
            <input type="submit" class="btn btn-sm btn-success" value="Ubah">
        </div>
    </div>
</form>