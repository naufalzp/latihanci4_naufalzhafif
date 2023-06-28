<?= $this->extend('components/layout_clear') ?>
<?= $this->section('content') ?>
<style>
    .border-bold {
    border-width: 2px;
}

</style>
<section class="section validate min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <img src="<?php echo base_url() ?>public/NiceAdmin/assets/img/logo.png" alt="">
                        <span class="d-none d-lg-block">Toko Keren</span>
                    </a>
                </div><!-- End Logo -->

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Account Validation</h5>
                            <p class="text-center small">Enter the validation code sent to your email</p>
                        </div>

                        <?php if (session()->getFlashData('success')) : ?>
                            <div class="col-12 alert alert-success" role="alert">
                                <p class="mb-0">
                                    <?= session()->getFlashData('success') ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashData('failed')) : ?>
                            <div class="col-12 alert alert-danger" role="alert">
                                <p class="mb-0">
                                    <?= session()->getFlashData('failed') ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <?= form_open('/validate-code', 'class="row g-3 needs-validation"') ?>
                        <div class="col-12">
                            <label for="code" class="form-label">Validation Code</label>
                            <div class="input-group">
                                <?php
                                for ($i = 1; $i <= 6; $i++) {
                                    echo form_input('code[]', '', 'class="form-control validation-code text-center border-bold font-weight-bold rounded-lg" maxlength="1" style="font-size: 24px;" required');
                                }
                                ?>
                            </div>
                            <div class="invalid-feedback">Please enter the validation code.</div>
                        </div>

                        <div class="col-12">
                            <?= form_submit('submit', 'Validate', ['class' => 'btn btn-primary w-100']) ?>
                        </div>
                        <?= form_close() ?>

                    </div>
                </div>

                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">Toko Keren</a>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Get all the input fields with the "validation-code" class
    var inputs = $('.validation-code');

    inputs.on('input', function() {
        // Get the current input field index
        var currentIndex = inputs.index(this);

        // Get the value of the current input
        var inputValue = $(this).val();

        // Check if the input value is not empty and if it's a single character
        if (inputValue.length === 1 && currentIndex < inputs.length - 1) {
            // Automatically switch to the next input field
            inputs.eq(currentIndex + 1).focus();
        }
    });
});
</script>


<?= $this->endSection()?>