<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
            <small class="small text-center text-muted">
                CI Version: <strong><?php echo CI_VERSION; ?></strong>,
                Elapsed Time: <strong>{elapsed_time}</strong> seconds,
                Memory Usage: <strong>{memory_usage}</strong>
            </div>
            <span class="bigger-120">
                <span class="blue bolder"><?php echo (isset($title) ? $title : ''); ?></span>
                &copy; 2016-<?php echo date('Y'); ?>
            </span>
            <span class="action-buttons">
                <a href="#">
                    <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                </a>
                <a href="#">
                    <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                </a>
            </span>
        </div>
    </div>
</div>