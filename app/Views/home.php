<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4">Tambah Tugas</h4>
                    <form action="/task/insert" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="judul" class="form-label"><strong>Judul Tugas</strong></label>
                                <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" name="judul" id="judul" placeholder="Masukkan Judul..">
                                <div class="invalid-feedback"><?= $validation->getError('judul'); ?></div>
                            </div>
                            <div class="col-md-3">
                                <label for="deadline" class="form-label"><strong>Deadline</strong></label>
                                <input type="datetime-local" class="form-control <?= ($validation->hasError('deadline')) ? 'is-invalid' : '' ?>" name="deadline" id="deadline">
                                <div class="invalid-feedback"><?= $validation->getError('deadline') ?></div>
                            </div>
                            <div class="col-md-3">
                                <label for="kategori" class="form-label"><strong>Kategori</strong></label>
                                <select class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : '' ?>" name="kategori" id="kategori">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="hiburan">📚 Hiburan</option>
                                    <option value="pekerjaan">💼 Pekerjaan</option>
                                    <option value="pribadi">🏠 Pribadi</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('kategori') ?></div>
                            </div>
                            <div class="col-md-2">
                                <label for="prioritas" class="form-label"><strong>Prioritas</strong></label>
                                <select class="form-control <?= ($validation->hasError('prioritas')) ? 'is-invalid' : '' ?>" name="prioritas" id="prioritas">
                                    <option value="" disabled selected>Pilih Prioritas</option>
                                    <option value="rendah">Rendah</option>
                                    <option value="sedang">Sedang</option>
                                    <option value="tinggi">tinggi</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('prioritas') ?></div>
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="deskripsi" class="form-label"><strong>Deskripsi</strong></label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : '' ?>" placeholder="Masukan Deskripsi..."></textarea>
                                <div class="invalid-feedback"><?= $validation->getError('deskripsi') ?></div>
                            </div>
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <form method="get" action="/task" class="form-inline mb-3">
        <div class="form-group">
            <label for="status" class="mr-2 font-weight-bold">Sortir Tugas</label>
            <select class="form-control selectric" name="status" id="status" onchange="this.form.submit()">
                <option value="all" <?= ($selectedStatus == 'all') ? 'selected' : '' ?>>Semua</option>
                <option value="belum_selesai" <?= ($selectedStatus == 'belum_selesai') ? 'selected' : '' ?>>Belum Selesai</option>
                <option value="selesai" <?= ($selectedStatus == 'selesai') ? 'selected' : '' ?>>Selesai</option>
            </select>
        </div>
    </form>

    <?php foreach ($tasks as $task) : ?>
        <div class="card card-primary mb-3 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="card-title mb-1 <?= $task['status'] == 'Selesai' ? 'task-selesai' : '' ?>">
                        <?= $task['judul']; ?>
                        <span class="badge badge-<?= $task['prioritas'] == 'tinggi' ? 'danger' : ($task['prioritas'] == 'sedang' ? 'warning' : 'secondary') ?>">
                            <?= $task['prioritas']; ?>
                        </span>
                        <?php if ($task['status'] == 'selesai') : ?>
                            <small class="text-success"><i class="fas fa-check-circle"> Selesai</i></small>
                        <?php endif; ?>
                    </h5>

                    <p class="card-text mb-1"><?= $task['deskripsi']; ?></p>
                    <small class="text-muted">Deadline: <?= date('d M Y, H:i', strtotime($task['deadline'])); ?></small>
                </div>
                <div class="buttons">
                    <?php if ($task['status'] == 'belum_selesai') : ?>
                        <a href="/task/complete/<?= $task['id']; ?>" class="btn btn-success me-2" title="Selesaikan">
                            <i class="fas fa-check"></i>
                        </a>
                    <?php endif; ?>
                    <a href="/task/edit/<?= $task['id']; ?>" class="btn btn-warning ms-2" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="/task/delete/<?= $task['id']; ?>" class="btn btn-danger tombol-hapus" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>