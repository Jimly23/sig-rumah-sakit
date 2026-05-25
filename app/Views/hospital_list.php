<?= $this->extend('layout/frontend') ?>

<?= $this->section('content') ?>

<section class="py-12 bg-surface px-container-margin min-h-[70vh]">
    <div class="max-w-[1080px] mx-auto">
        <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-primary">Daftar Rumah Sakit</h2>
                <p class="text-on-surface-variant mt-2">Fasilitas kesehatan yang terdaftar di wilayah Kabupaten Brebes.</p>
            </div>
            
            <form action="<?= base_url('hospitals') ?>" method="get" class="w-full md:w-96 flex shadow-sm">
                <input type="text" name="search" value="<?= htmlspecialchars($search ?? '') ?>" placeholder="Cari nama rumah sakit..." class="w-full px-4 py-3 bg-white rounded-l-xl border border-outline-variant focus:ring-2 focus:ring-primary focus:border-primary text-sm outline-none">
                <button type="submit" class="bg-primary text-white px-6 py-3 rounded-r-xl font-bold hover:bg-primary-container transition-colors flex items-center justify-center">
                    <span class="material-symbols-outlined">search</span>
                </button>
            </form>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($hospitals as $hospital): ?>
            <div class="bg-white rounded-2xl border border-outline-variant overflow-hidden hover:shadow-2xl transition-all hover:-translate-y-2 group flex flex-col">
                <!-- Foto -->
                <div class="h-48 overflow-hidden relative">
                    <?php if($hospital['foto']): ?>
                        <img src="<?= base_url('uploads/hospitals/' . $hospital['foto']) ?>" alt="<?= htmlspecialchars($hospital['nama']) ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <?php else: ?>
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center transition-transform duration-500 group-hover:scale-110">
                            <span class="material-symbols-outlined text-6xl text-slate-300">local_hospital</span>
                        </div>
                    <?php endif; ?>
                    <?php if($hospital['jenis']): ?>
                        <div class="absolute top-3 left-3 bg-primary text-white px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide"><?= htmlspecialchars($hospital['jenis']) ?></div>
                    <?php endif; ?>
                    <?php if($hospital['status_bpjs']): ?>
                        <div class="absolute top-3 right-3 bg-secondary text-white px-3 py-1 rounded-full text-[10px] font-bold">BPJS</div>
                    <?php endif; ?>
                </div>

                <!-- Content -->
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-lg font-bold text-primary mb-1 line-clamp-1"><?= htmlspecialchars($hospital['nama']) ?></h3>
                    
                    <?php if($hospital['kecamatan']): ?>
                        <div class="flex items-center gap-1 text-on-surface-variant text-sm mb-3">
                            <span class="material-symbols-outlined text-[16px]">location_on</span>
                            Kec. <?= htmlspecialchars($hospital['kecamatan']) ?>
                        </div>
                    <?php endif; ?>

                    <div class="space-y-2 mb-4">
                        <?php if($hospital['kelas']): ?>
                            <div class="flex items-center gap-2">
                                <span class="bg-primary/10 text-primary px-2 py-0.5 rounded text-xs font-bold">Kelas <?= htmlspecialchars($hospital['kelas']) ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if($hospital['telepon']): ?>
                            <div class="flex items-center gap-2 text-sm text-on-surface-variant">
                                <span class="material-symbols-outlined text-[16px]">call</span>
                                <?= htmlspecialchars($hospital['telepon']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-auto pt-4 border-t border-outline-variant/50 grid grid-cols-2 gap-3">
                        <a href="<?= base_url('hospitals/detail/' . $hospital['id']) ?>" class="bg-primary hover:bg-primary-container text-white py-2.5 rounded-xl font-bold transition-all flex items-center justify-center gap-1 text-sm active:scale-95">
                            <span class="material-symbols-outlined text-[18px]">visibility</span>
                            Detail
                        </a>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=<?= $hospital['latitude'] ?>,<?= $hospital['longitude'] ?>" target="_blank" class="bg-secondary/10 hover:bg-secondary hover:text-white text-secondary py-2.5 rounded-xl font-bold transition-all flex items-center justify-center gap-1 text-sm active:scale-95">
                            <span class="material-symbols-outlined text-[18px]">map</span>
                            Lokasi
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php if(empty($hospitals)): ?>
                <div class="col-span-1 md:col-span-3 text-center py-16 bg-white rounded-2xl border border-outline-variant">
                    <span class="material-symbols-outlined text-6xl text-outline mb-4">search_off</span>
                    <p class="text-on-surface-variant text-lg">Belum ada data rumah sakit.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
