<?= $this->extend('template') ?>

<?= $this->section('styles') ?>
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url('plugins/summernote/summernote-bs4.min.css') ?>">
<!-- date picker -->
<link rel="stylesheet" href="<?= base_url('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row p-5">
    <!-- left column -->
    <div class="offset-1 col-10">
        <!-- general form elements -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">NOUVEAU GROUPE</h3>


            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= url_to('storegroupe') ?>" method="post">
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
                        <label for="name" class="col-sm-3 col-form-label">NOM DU GROUPE</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="<?= old("name") ?>" class="form-control" id="name" placeholder="NOM DU GROUPE" />
                            <span class="text-danger"> <?= validation_show_error("name") ?></span>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">DESCRIPTION</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control" id="description"><?= old("description") ?></textarea>
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

<script>
    $(function () {

        $('#description').summernote({

            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
            ]
        });

    });

</script>



<?= $this->endSection() ?>