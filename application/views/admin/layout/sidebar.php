<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
    try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
    <ul class="nav nav-list">
        <li class="">
            <a href="<?php echo site_url('admin/home'); ?>">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="">
            <a href="<?php echo site_url('admin/kategori_barang'); ?>">
                <i class="menu-icon fa fa-laptop"></i>
                <span class="menu-text"> Kategori Barang</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="">
            <a href="<?php echo site_url('admin/barang'); ?>">
                <i class="menu-icon fa fa-laptop"></i>
                <span class="menu-text"> Barang</span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Transaksi</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo site_url('admin/peminjaman'); ?>">
                        <i class="menu-icon fa fa-list"></i>
                        Peminjaman
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo site_url('admin/pengembalian'); ?>">
                        <i class="menu-icon fa fa-check-square-o"></i>
                        Pengembalian
                    </a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="<?php echo site_url('admin/user'); ?>">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> User</span>
            </a>
            <b class="arrow"></b>
        </li>
    </ul><!-- /.nav-list -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>