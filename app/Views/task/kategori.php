<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <h3 class="mb-4">Tugas Kategori: <span class="text-primary"><?= esc(ucfirst($kategori)); ?></span></h3>

    <?php if (empty($tasks)) : ?>
        <div class="alert alert-info">Belum ada tugas untuk kategori ini.</div>
    <?php endif; ?>

    <?php foreach ($tasks as $task) : ?>
        <div class="card mb-3 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="card-title mb-1 <?= $task['status'] == 'Selesai' ? 'text-decoration-line-through text-muted' : '' ?>">
                        <?= esc($task['judul']); ?>
                        <span class="badge bg-<?= $task['prioritas'] == 'tinggi' ? 'danger' : ($task['prioritas'] == 'sedang' ? 'warning text-dark' : 'secondary') ?>">
                            <?= esc($task['prioritas']); ?>
                        </span>
                        <?php if ($task['status'] == 'selesai') : ?>
                            <small class="text-success"><i class="fas fa-check-circle"> Selesai</i></small>
                        <?php endif; ?>
                    </h5>
                    <p class="card-text mb-1"><?= esc($task['deskripsi']); ?></p>
                    <small class="text-muted">Deadline: <?= date('d M Y, H:i', strtotime($task['deadline'])); ?></small>
                </div>
                <div class="buttons">
                    <?php if ($task['status'] == 'belum_selesai') : ?>
                        <a href="/task/complete/<?= $task['id']; ?>" class="btn btn-success me-2"><i class="fas fa-check"></i></a>
                    <?php endif; ?>
                    <a href="/task/edit/<?= $task['id']; ?>" class="btn btn-warning me-2"><i class="fas fa-edit"></i></a>
                    <a href="/task/delete/<?= $task['id']; ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-trash"></i></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>
