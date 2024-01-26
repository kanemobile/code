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
                    <h3 class="card-title">EDITION MENU</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= url_to('menus.update'); ?>" method="post">
                    <div class="card-body">

                        <?= csrf_field() ?>

                        <?= form_hidden('id', $menu->id) ?>

                        <div class="form-group row">
                            <label for="nom" class="col-sm-3 col-form-label">NOM</label>
                            <div class="col-sm-9">
                                <input type="text" name="nom" value="<?= is_null($menu) ? old("nom"): $menu->nom ?>" class="form-control" id="nom" placeholder="NOM DU MENU" />
                                <span class="text-danger"> <?= validation_show_error("nom") ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="typeoffre" class="col-sm-3 col-form-label">PARENT</label>
                            <div class="col-sm-9">
                                <?= form_dropdown('parent', $tableau, '', ['class' => 'form-control']); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="icon" class="col-sm-3 col-form-label">ICON</label>
                            <div class="col-sm-9">
                                <input type="text" name="icon" value="<?= $menu->icon ?>" class="form-control" id="icon" placeholder="Ex : fa-users">
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