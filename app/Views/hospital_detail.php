<?= $this->extend('layout/frontend') ?>

<?= $this->section('content') ?>

<section class="py-12 bg-surface px-container-margin min-h-[70vh]">
    <div class="max-w-[1440px] mx-auto">
        <a href="<?= base_url('hospitals') ?>" class="inline-flex items-center gap-2 text-on-surface-variant hover:text-primary mb-8 transition-colors">
            <span class="material-symbols-outlined">arrow_back</span>
            Kembali ke Daftar Rumah Sakit
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Header Card -->
                <div class="bg-white rounded-2xl border border-outline-variant overflow-hidden shadow-sm">
                    <?php if($hospital['foto']): ?>
                        <img src="<?= base_url('uploads/hospitals/' . $hospital['foto']) ?>" alt="<?= htmlspecialchars($hospital['nama']) ?>" class="w-full h-64 object-cover">
                    <?php else: ?>
                        <div class="w-full h-64 bg-slate-100 flex items-center justify-center">
                            <span class="material-symbols-outlined text-8xl text-slate-300">local_hospital</span>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-8">
                        <div class="flex flex-wrap items-center gap-2 mb-4">
                            <?php if($hospital['jenis']): ?>
                                <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase"><?= htmlspecialchars($hospital['jenis']) ?></span>
                            <?php endif; ?>
                            <?php if($hospital['kelas']): ?>
                                <span class="bg-surface-container-highest text-on-surface-variant px-3 py-1 rounded-full text-xs font-bold">Kelas <?= htmlspecialchars($hospital['kelas']) ?></span>
                            <?php endif; ?>
                            <?php if($hospital['status_bpjs']): ?>
                                <span class="bg-secondary/10 text-secondary px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">verified</span> BPJS
                                </span>
                            <?php else: ?>
                                <span class="bg-error/10 text-error px-3 py-1 rounded-full text-xs font-bold">Non-BPJS</span>
                            <?php endif; ?>
                        </div>

                        <h1 class="text-3xl md:text-4xl font-extrabold text-primary mb-2"><?= htmlspecialchars($hospital['nama']) ?></h1>
                        
                        <?php if($hospital['kecamatan']): ?>
                            <p class="text-on-surface-variant flex items-center gap-1 mb-4">
                                <span class="material-symbols-outlined text-[18px]">location_on</span>
                                Kecamatan <?= htmlspecialchars($hospital['kecamatan']) ?>
                            </p>
                        <?php endif; ?>

                        <?php if($hospital['rating']): ?>
                            <div class="flex items-center gap-2 mb-4">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <span class="material-symbols-outlined text-[20px] <?= $i <= round($hospital['rating']) ? 'fill-icon text-amber-400' : 'text-slate-300' ?>">star</span>
                                <?php endfor; ?>
                                <span class="text-sm font-bold text-on-surface"><?= $hospital['rating'] ?>/5</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Detail Info Card -->
                <div class="bg-white rounded-2xl border border-outline-variant p-8 shadow-sm">
                    <h3 class="text-lg font-bold text-on-surface mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">info</span>
                        Informasi Lengkap
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-5 gap-x-8">
                        <div>
                            <p class="text-xs uppercase text-on-surface-variant font-bold tracking-wider mb-1">Alamat Lengkap</p>
                            <p class="text-on-surface"><?= htmlspecialchars($hospital['alamat'] ?: '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs uppercase text-on-surface-variant font-bold tracking-wider mb-1">Jam Operasional</p>
                            <p class="text-on-surface flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-secondary">schedule</span>
                                <?= htmlspecialchars($hospital['jam_operasional'] ?: '-') ?>
                            </p>
                        </div>
                        <div>
                            <p class="text-xs uppercase text-on-surface-variant font-bold tracking-wider mb-1">Nomor Telepon</p>
                            <p class="text-on-surface"><?= htmlspecialchars($hospital['telepon'] ?: '-') ?></p>
                        </div>
                        <div>
                            <p class="text-xs uppercase text-on-surface-variant font-bold tracking-wider mb-1">WhatsApp</p>
                            <?php if($hospital['whatsapp']): ?>
                                <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $hospital['whatsapp']) ?>" target="_blank" class="text-secondary hover:underline flex items-center gap-1">
                                    <?= htmlspecialchars($hospital['whatsapp']) ?>
                                    <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                                </a>
                            <?php else: ?>
                                <p class="text-on-surface">-</p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <p class="text-xs uppercase text-on-surface-variant font-bold tracking-wider mb-1">Email</p>
                            <?php if($hospital['email']): ?>
                                <a href="mailto:<?= $hospital['email'] ?>" class="text-primary hover:underline"><?= htmlspecialchars($hospital['email']) ?></a>
                            <?php else: ?>
                                <p class="text-on-surface">-</p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <p class="text-xs uppercase text-on-surface-variant font-bold tracking-wider mb-1">Website</p>
                            <?php if($hospital['website']): ?>
                                <a href="<?= $hospital['website'] ?>" target="_blank" class="text-primary hover:underline flex items-center gap-1">
                                    Kunjungi Website
                                    <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                                </a>
                            <?php else: ?>
                                <p class="text-on-surface">-</p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <p class="text-xs uppercase text-on-surface-variant font-bold tracking-wider mb-1">Latitude</p>
                            <p class="text-on-surface font-mono text-sm"><?= $hospital['latitude'] ?></p>
                        </div>
                        <div>
                            <p class="text-xs uppercase text-on-surface-variant font-bold tracking-wider mb-1">Longitude</p>
                            <p class="text-on-surface font-mono text-sm"><?= $hospital['longitude'] ?></p>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <?php if($hospital['deskripsi']): ?>
                <div class="bg-white rounded-2xl border border-outline-variant p-8 shadow-sm">
                    <h3 class="text-lg font-bold text-on-surface mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">description</span>
                        Deskripsi
                    </h3>
                    <p class="text-on-surface-variant leading-relaxed whitespace-pre-line"><?= htmlspecialchars($hospital['deskripsi']) ?></p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar: Map + Actions -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-2xl border border-outline-variant p-6 shadow-sm sticky top-24">
                    <h3 class="font-bold text-on-surface mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">map</span>
                        Peta Lokasi
                    </h3>
                    
                    <?php if (!empty($hospital['link_gmaps'])): ?>
                        <div class="w-full aspect-square rounded-xl border border-outline-variant z-0 mb-4 overflow-hidden">
                            <iframe src="<?= htmlspecialchars($hospital['link_gmaps']) ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    <?php else: ?>
                        <div id="map" class="w-full aspect-square rounded-xl border border-outline-variant z-0 mb-4"></div>
                    <?php endif; ?>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=<?= $hospital['latitude'] ?>,<?= $hospital['longitude'] ?>" target="_blank" class="w-full bg-primary hover:bg-primary-container text-white py-3 rounded-xl font-bold flex items-center justify-center gap-2 transition-all active:scale-95 shadow-sm mb-3">
                        <span class="material-symbols-outlined">directions_car</span>
                        Rute Perjalanan
                    </a>
                    <?php if($hospital['whatsapp']): ?>
                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $hospital['whatsapp']) ?>" target="_blank" class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-bold flex items-center justify-center gap-2 transition-all active:scale-95 shadow-sm">
                            <span class="material-symbols-outlined">chat</span>
                            Hubungi via WhatsApp
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    var lat = <?= $hospital['latitude'] ?: '-6.8694' ?>;
    var lng = <?= $hospital['longitude'] ?: '109.0436' ?>;
    var map = L.map('map').setView([lat, lng], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var customIcon = L.divIcon({
        className: 'custom-map-icon',
        html: `<span class="material-symbols-outlined text-4xl" style="color:#003178; text-shadow:1px 1px 2px rgba(0,0,0,0.3);">location_on</span>`,
        iconSize: [40, 40],
        iconAnchor: [20, 40],
    });
    L.marker([lat, lng], {icon: customIcon}).addTo(map)
        .bindPopup("<b><?= htmlspecialchars($hospital['nama']) ?></b>")
        .openPopup();
</script>
<?= $this->endSection() ?>
