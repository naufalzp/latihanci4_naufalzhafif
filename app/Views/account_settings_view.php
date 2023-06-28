<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?>

<section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?= base_url()?>public/NiceAdmin/assets/img/profile.png" alt="Profile" class="rounded-circle">
              <h2><?= session()->get('username')?></h2>
              <h3><?= session()->get('role')?></h3>
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit-email">Edit email</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <!-- <div class="tab-pane fade show active profile-overview pt-3" id="profile-edit-email">
                  <table class="table">
                    <tr>
                        <th>#</th>
                        <th></th>
                    </tr>
                  </table>
                </div> -->
                <div class="tab-pane fade show active profile-overview pt-3" id="profile-edit-email">
                  

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

                        <?= form_open('/update-email', 'class="row g-3 "') ?>

                        <div class="col-12">
                            <label for="current_email" class="form-label">Current Email</label>
                            <input type="email" class="form-control" id="current_email" name="current_email" value="<?= $accounts['email']?>" disabled required>
                        </div>

                        <div class="col-12">
                            <label for="new_email" class="form-label">New Email</label>
                            <input type="email" class="form-control" id="new_email" name="new_email" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Change Email</button>
                        </div>
                        <?= form_close() ?><!-- End Change Password Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->

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

                        <?= form_open('/update-password', 'class="row g-3"') ?>
                        <?= form_hidden('')?>
                        <div class="col-12">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                        </div>
                        <div class="col-12">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="col-12">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                        <?= form_close() ?>
<!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>


<?= $this->endSection() ?>