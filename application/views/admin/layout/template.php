<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?php echo (isset($title) ? $title : ''); ?></title>
    <meta name="description" content="<?php echo (isset($description) ? $description : ''); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css" />

    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
</head>
<body class="skin-2">
    <?php $this->load->view('admin/layout/header'); ?>
    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">try{ace.settings.loadState('main-container')}catch(e){}</script>
        <?php $this->load->view('admin/layout/sidebar'); ?>

        <div class="main-content">
            <div class="main-content-inner">
                <?php if (isset($breadcrumb)) : ?>
                    <div class="breadcrumbs ace-save-state">
                        <ul class="breadcrumb">
                            <?php foreach ((array) $breadcrumb  as $value) : ?>
                                <li>
                                    <i class="ace-icon fa <?php echo (isset($value['icon']) ? $value['icon'] : ''); ?>"></i>
                                    <?php if (isset($value['link'])) : ?>
                                        <a href="<?php echo (isset($value['link']) ? $value['link'] : ''); ?>"><?php echo $value['text']; ?></a>
                                    <?php else : ?>
                                        <?php echo $value['text']; ?>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul><!-- /.breadcrumb -->
                    </div>
                <?php endif; ?>
                <div class="page-content">
                    <?php $this->load->view('admin/layout/message'); ?>
                    <?php $this->load->view('admin/'.$view); ?>
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->
        <?php $this->load->view('admin/layout/footer'); ?>
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"><i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i></a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->
    <script type="text/javascript">if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");</script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
    <!-- ace scripts -->
    <script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ace-extra.min.js"></script>
</body>
</html>