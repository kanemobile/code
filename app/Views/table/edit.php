<?= $this->extend('template') ?>

<?= $this->section('styles') ?>
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url('plugins/summernote/summernote-bs4.min.css') ?>">
<!-- date picker -->
<link rel="stylesheet" href="<?= base_url('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row py-3">
    <!-- left column -->
    <div class="offset-1 col-10">
        <!-- general form elements -->
        <div class="card card">
            <div class="card-header">
                <h3 class="card-title">EDITION LIEN</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= url_to('tables.update'); ?>" method="post">
                <div class="card-body">

                    <?= csrf_field() ?>

                    <?= form_hidden('id', $table->id) ?>

                    <div class="form-group row">
                        <label for="menu" class="col-sm-3 col-form-label">MENU</label>
                        <div class="col-sm-9">
                            <?= form_dropdown('menu', $tableau, '', ['class' => 'form-control']); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nom" class="col-sm-3 col-form-label">NOM URL</label>
                        <div class="col-sm-9">
                            <input type="text" name="nom" value="<?= $table->nom ?>" class="form-control" id="nom">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="url" class="col-sm-3 col-form-label">URL</label>
                        <div class="col-sm-9">
                            <input type="text" name="url" value="<?= $table->url ?>" class="form-control" id="url">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="icon" class="col-sm-3 col-form-label">ICON</label>
                        <div class="col-sm-9">
                            <input type="text" name="icon" value="<?= $table->icon ?>" class="form-control" id="icon">
                        </div>
                    </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
        <!-- /.card -->



    </div>


</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Summernote -->
<script src="<?= base_url('plugins/summernote/summernote-bs4.min.js') ?>"></script>

<script src="<?= base_url('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('plugins/bootstrap-datepicker/locales/bootstrap-datepicker.fr.min.js') ?>"></script>

<?= $this->endSection() ?>