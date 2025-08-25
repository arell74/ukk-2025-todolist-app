<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="section">
    <div class="section-header">
        <h1>Kelola Profil</h1>
    </div>

    <div class="section-body">

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <?php
                        $foto = session()->get('foto_profile');
                        $src = $foto ? base_url('uploads/profile/' . $foto) : base_url('assets/img/avatar/avatar-1.png');
                        ?>
                        <img alt="image" src="<?= $src ?>" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Posts</div>
                                <div class="profile-widget-item-value">187</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Followers</div>
                                <div class="profile-widget-item-value">6,8K</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Following</div>
                                <div class="profile-widget-item-value">2,1K</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name"><?= session()->get('username') ?> <div class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div> <?= session()->get('email') ?>
                            </div>
                        </div>
                        <?= session()->get('bio') ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Profil</h4>
                    </div>
                    <div class="card-body">
                        <form action="/user/update" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>" name="username" value="<?= old('username', $user['username']) ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" name="email" value="<?= old('email', $user['email']) ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea class="form-control" name="bio" id="bio"><?= $user['bio'] ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="foto_profile">Foto Profil</label><br>
                                <?php if ($user['foto_profile']) : ?>
                                    <img src="/uploads/profile/<?= $user['foto_profile'] ?>" width="100" class="img-thumbnail mb-2">
                                <?php endif; ?>
                                <input type="file" class="form-control-file" name="foto_profile">
                            </div>

                            <div class="form-group text-right">
                                <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?= $this->endSection(); ?>