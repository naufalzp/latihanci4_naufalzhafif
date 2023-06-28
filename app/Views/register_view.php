<?= $this->extend('components/layout_clear') ?>
<?= $this->section('content') ?>
<?php
$username = [
    'name' => 'username',
    'id' => 'username',
    'class' => 'form-control',
    'required' => 'required'
];

$password = [
    'name' => 'password',
    'id' => 'password',
    'class' => 'form-control',
    'required' => 'required'
];

$email = [
    'name' => 'email',
    'id' => 'email',
    'class' => 'form-control',
    'required' => 'required',
    'type' => 'email'
];

?>
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url() ?>assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Toko Keren</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>
                  <?php if (session()->getFlashdata('failed')) : ?>
                    <div class="col-12 alert alert-danger" role="alert">
                                    <p class="mb-0">
                                        <?= session()->getFlashdata('failed') ?>
                                    </p>
                                </div>
                   <?php endif; ?>

    <?php if (session()->getFlashdata('success')) : ?>
                <div class="col-12 alert alert-success" role="alert">
                                    <p class="mb-0">
                                        <?= session()->getFlashdata('success') ?>
                                    </p>
                                </div>
    <?php endif; ?>
                  <form method="post" action="<?php echo base_url('/register')?>" class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <?= form_input($username)?>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>
                    
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <?= form_password($password)?>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <?= form_input($email)?>
                      <div class="invalid-feedback">Please enter your email!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="<?= base_url('/login')?>">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">Toko Keren</a>
              </div>

            </div>
          </div>
        </div>

      </section>
      <?= $this->endSection() ?>