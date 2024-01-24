</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url("plugins/jquery/jquery.min.js") ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url("plugins/jquery-ui/jquery-ui.min.js") ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url("plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url("dist/js/adminlte.js") ?>"></script>
<?= $this->renderSection('scripts') ?>
</body>
</html>