<?php
$method = $this->router->fetch_method();
$class = strtolower($this->router->fetch_class());
?>
</div>
</div>
<!--END CONTENT -->
</div>
<!--END CONTAINER -->
<!--BEGIN FOOTER -->
<div class = "footer">
    <div class = "footer-inner">
        2013 &copy;
        Rocket Singh by AB7.
    </div>
    <div class = "footer-tools">
        <span class = "go-top">
            <i class = "fa fa-angle-up"></i>
        </span>
    </div>
</div>
<!--END FOOTER -->
<!--BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!--BEGIN CORE PLUGINS -->
<script src = "<?php echo asset_url('plugins/jquery-1.11.0.min.js'); ?>" type = "text/javascript"></script>
<script src="<?php echo asset_url('plugins/jquery-migrate-1.2.1.min.js'); ?>" type="text/javascript"></script>
<script>
    var ROOT = '<?php echo base_url(); ?>';
</script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo asset_url('plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset_url('plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset_url('plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset_url('plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset_url('plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo asset_url('plugins/uniform/jquery.uniform.min.js'); ?>" type="text/javascript"></script>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<?php
if (isset($js)) {
    echo $js;
    echo "<br/>";
}
?>


<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        App.init(); // initlayout and core plugins
<?php if ($class == "dashboard") {
    ?>

            Index.init();
            Index.initJQVMAP(); // init index page's custom scripts
            Index.initCalendar(); // init index page's custom scripts
            Index.initCharts(); // init index page's custom scripts
            Index.initChat();
            Index.initMiniCharts();
            Index.initPeityElements();
            Index.initKnowElements();
            Index.initDashboardDaterange();
            Tasks.initDashboardWidget();
<?php }
?>
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>