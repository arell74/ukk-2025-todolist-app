<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4">Edit Tugas</h4>
                    <form action="/task/update/<?= $task['id']; ?>" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="judul" class="form-label"><strong>Judul Tugas</strong></label>
                                <input type="text" name="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" value="<?= old('judul', $task['judul']) ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('judul') ?>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="deadline" class="form-label"><strong>Deadline</strong></label>
                                <input type="datetime-local" class="form-control <?= ($validation->hasError('deadline')) ? 'is-invalid' : '' ?>" value="<?= old('deadline', $task['deadline']) ?>" id="deadline" name="deadline" value="<?= date('Y-m-d\TH:i', strtotime($task['deadline'])); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('deadline') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="kategori" class="form-label"><strong>Kategori</strong></label>
                                <select class="form-control" name="kategori" id="kategori">
                                    <option value="hiburan" <?= $task['kategori'] == 'hiburan' ? 'selected' : '' ?>>📚 Hiburan</option>
                                    <option value="pekerjaan" <?= $task['kategori'] == 'pekerjaan' ? 'selected' : '' ?>>💼 Kerja</option>
                                    <option value="pribadi" <?= $task['kategori'] == 'pribadi' ? 'selected' : '' ?>>🏠 Pribadi</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="prioritas" class="form-label"><strong>Prioritas</strong></label>
                                <select class="form-control" name="prioritas" id="prioritas">
                                    <option value="rendah" <?= $task['prioritas'] == 'rendah' ? 'selected' : '' ?>>Rendah</option>
                                    <option value="sedang" <?= $task['prioritas'] == 'sedang' ? 'selected' : '' ?>>Sedang</option>
                                    <option value="tinggi" <?= $task['prioritas'] == 'tinggi' ? 'selected' : '' ?>>Tinggi</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="deskripsi" class="form-label"><strong>Deskripsi Tugas</strong></label>
                                <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : '' ?>" name="deskripsi" id="deskripsi" rows="5"><?= $task['deskripsi']; ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('deadline') ?>
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <a href="/home" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?= $this->endSection(); ?>