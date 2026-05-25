<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<div class="flex items-center justify-between mb-8">
    <div>
        <!-- <h2 class="font-headline-lg text-headline-lg text-primary">Manajemen Data Rumah Sakit</h2>
        <p class="text-on-surface-variant font-body-lg">Pantau dan kelola infrastruktur kesehatan wilayah secara real-time.</p> -->
    </div>
    <a href="<?= base_url('admin/create') ?>" class="bg-primary hover:bg-primary-container text-white px-6 py-2.5 rounded-lg flex items-center gap-2 shadow-sm active:scale-95 transition-all font-semibold">
        <span class="material-symbols-outlined">add</span>
        Tambah Rumah Sakit
    </a>
</div>

<!-- Stats Row -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-surface border border-outline-variant p-6 rounded-xl flex items-start justify-between">
        <div>
            <p class="text-on-surface-variant font-label-caps uppercase mb-2">Total Rumah Sakit</p>
            <h3 class="text-4xl font-bold text-primary"><?= count($hospitals) ?></h3>
        </div>
        <div class="bg-primary/5 p-3 rounded-lg text-primary">
            <span class="material-symbols-outlined text-3xl">domain</span>
        </div>
    </div>
    <div class="bg-surface border border-outline-variant p-6 rounded-xl flex items-start justify-between">
        <div>
            <p class="text-on-surface-variant font-label-caps uppercase mb-2">Menerima BPJS</p>
            <?php $bpjsCount = 0; foreach($hospitals as $h) { if($h['status_bpjs']) $bpjsCount++; } ?>
            <h3 class="text-4xl font-bold text-primary"><?= $bpjsCount ?></h3>
        </div>
        <div class="bg-secondary/5 p-3 rounded-lg text-secondary">
            <span class="material-symbols-outlined text-3xl">verified</span>
        </div>
    </div>
    <div class="bg-surface border border-outline-variant p-6 rounded-xl flex items-start justify-between">
        <div>
            <p class="text-on-surface-variant font-label-caps uppercase mb-2">RS Status Aktif</p>
            <h3 class="text-4xl font-bold text-primary"><?= count($hospitals) ?></h3>
        </div>
        <div class="bg-on-secondary-container/5 p-3 rounded-lg text-on-secondary-container">
            <span class="material-symbols-outlined text-3xl">check_circle</span>
        </div>
    </div>
</div>

<!-- Main Table -->
<div class="bg-surface border border-outline-variant rounded-xl overflow-hidden shadow-sm">
    <div class="px-6 py-4 border-b border-outline-variant bg-surface-container-lowest flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <h4 class="font-bold text-on-surface">Daftar Rumah Sakit</h4>
        <form action="<?= base_url('admin') ?>" method="get" class="flex w-full md:w-auto shadow-sm">
            <input type="text" name="search" value="<?= htmlspecialchars($search ?? '') ?>" placeholder="Cari nama rumah sakit..." class="w-full md:w-64 px-4 py-2 bg-white rounded-l-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm outline-none">
            <button type="submit" class="bg-primary text-white px-4 py-2 rounded-r-lg font-bold hover:bg-primary-container transition-colors flex items-center justify-center">
                <span class="material-symbols-outlined text-[18px]">search</span>
            </button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-surface-container-low border-b border-outline-variant">
                    <th class="px-6 py-4 font-label-caps text-on-surface-variant">Rumah Sakit</th>

                    <th class="px-6 py-4 font-label-caps text-on-surface-variant">Kecamatan</th>
                    <th class="px-6 py-4 font-label-caps text-on-surface-variant">Telepon</th>
                    <th class="px-6 py-4 font-label-caps text-on-surface-variant">BPJS</th>
                    <th class="px-6 py-4 font-label-caps text-on-surface-variant text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant">
                <?php foreach($hospitals as $hospital): ?>
                <tr class="hover:bg-surface-container-low transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <?php if($hospital['foto']): ?>
                                <img src="<?= base_url('uploads/hospitals/' . $hospital['foto']) ?>" alt="" class="w-10 h-10 rounded object-cover border border-outline-variant">
                            <?php else: ?>
                                <div class="w-10 h-10 rounded bg-primary/10 flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined">local_hospital</span>
                                </div>
                            <?php endif; ?>
                            <div>
                                <p class="font-bold text-on-surface"><?= htmlspecialchars($hospital['nama']) ?></p>
                                <p class="text-xs text-on-surface-variant truncate max-w-[200px]"><?= htmlspecialchars($hospital['alamat']) ?></p>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 text-sm text-on-surface-variant"><?= htmlspecialchars($hospital['kecamatan'] ?: '-') ?></td>
                    <td class="px-6 py-4 text-sm font-mono text-on-surface"><?= htmlspecialchars($hospital['telepon'] ?: '-') ?></td>
                    <td class="px-6 py-4">
                        <?php if($hospital['status_bpjs']): ?>
                            <span class="flex items-center gap-1 text-secondary font-semibold text-sm">
                                <span class="w-2 h-2 rounded-full bg-secondary"></span> Ya
                            </span>
                        <?php else: ?>
                            <span class="flex items-center gap-1 text-on-surface-variant text-sm">
                                <span class="w-2 h-2 rounded-full bg-outline"></span> Tidak
                            </span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-right space-x-1">
                        <a href="<?= base_url('admin/edit/'.$hospital['id']) ?>" class="inline-block p-2 text-on-surface-variant hover:text-primary hover:bg-primary/5 rounded-lg transition-all" title="Edit">
                            <span class="material-symbols-outlined">edit</span>
                        </a>
                        <a href="<?= base_url('admin/delete/'.$hospital['id']) ?>" class="inline-block p-2 text-on-surface-variant hover:text-error hover:bg-error/5 rounded-lg transition-all" title="Delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                            <span class="material-symbols-outlined">delete</span>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($hospitals)): ?>
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-on-surface-variant">Belum ada data rumah sakit.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
