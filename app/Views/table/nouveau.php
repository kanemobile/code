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
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title">NOUVEAU GROUPE</h3>


            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= site_url('table/store') ?>" method="post">
                <div class="card-body">
                    <?php if (!empty($errors)) : ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $field => $error) : ?>
                                <p><?= $error ?></p>
                            <?php endforeach ?>
                        </div>
                    <?php endif; ?>
                    <?= csrf_field() ?>

                    <div class="form-group row">
                        <label for="menu" class="col-sm-3 col-form-label">MENU</label>
                        <div class="col-sm-9">
                            <?= form_dropdown('menu', $tableau, '', ['class' => 'form-control']); ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="nom" class="col-sm-3 col-form-label">NOM URL</label>
                        <div class="col-sm-9">
                            <input type="text" name="nom" value="<?= old("nom") ?>" class="form-control" id="nom" placeholder="NOM URL" />
                            <span class="text-danger"> <?= validation_show_error("nom") ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="url" class="col-sm-3 col-form-label">URL</label>
                        <div class="col-sm-9">
                            <input type="text" name="url" value="<?= old("url") ?>" class="form-control" id="url" placeholder="URL" />
                            <span class="text-danger"> <?= validation_show_error("url") ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="icon" class="col-sm-3 col-form-label">ICON</label>
                        <div class="col-sm-9">
                            <input type="text" name="icon" value="" class="form-control" id="icon" placeholder="Ex : fa-users">
                            <span class="text-danger"> <?= validation_show_error("icon") ?></span>
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