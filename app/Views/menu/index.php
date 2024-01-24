<?= $this->extend('template') ?>

<?php $this->section('styles') ?>

<link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row p-5">

    <div class="offset-1 col-10">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="card-title">MENUS</h3>
                <a href="<?= site_url('menu/ajouter') ?>" class="btn btn-outline-light float-right">Ajouter</a>
            </div>
            <div class="card-body">

                <table class="table table-bordered" id="dataTable" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOM</th>
                            <th>PARENT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>

<?php $this->section('scripts') ?>

<script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>

<script>
    $(document).ready(function () {

        var csrfHash = '<?= csrf_hash(); ?>';
        var csrfToken = '<?= csrf_token() ?>';

        $('#dataTable').DataTable({
            language: {
                url: '<?= base_url('plugins/datatables/fr-FR.json') ?>',
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= url_to('getmenus'); ?>',
                method: 'POST',
                data: {[csrfToken]: csrfHash}
            },
            columnDefs: [
                {targets: [3], orderable: false, searchable: false},
            ],
            'responsive': true
        });


    });
</script>
<?php
$this->endSection()?>