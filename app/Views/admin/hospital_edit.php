<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<div class="flex items-center justify-between mb-8">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-primary">Edit Data Rumah Sakit</h2>
        <p class="text-on-surface-variant font-body-lg">Perbarui informasi rumah sakit berikut ini.</p>
    </div>
    <a href="<?= base_url('admin') ?>" class="border border-outline-variant text-on-surface hover:bg-surface-container-high px-6 py-2.5 rounded-lg flex items-center gap-2 shadow-sm active:scale-95 transition-all font-semibold">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
        <form action="<?= base_url('admin/update/'.$hospital['id']) ?>" method="post" enctype="multipart/form-data">
            <!-- Informasi Utama -->
            <div class="bg-surface border border-outline-variant rounded-xl overflow-hidden shadow-sm p-6 mb-6">
                <h3 class="font-bold text-on-surface text-lg mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">info</span>
                    Informasi Utama
                </h3>
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Nama Rumah Sakit <span class="text-error">*</span></label>
                        <input type="text" name="nama" value="<?= htmlspecialchars($hospital['nama']) ?>" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Foto Rumah Sakit</label>
                        <?php if($hospital['foto']): ?>
                            <div class="mb-3 flex items-center gap-4">
                                <img src="<?= base_url('uploads/hospitals/' . $hospital['foto']) ?>" alt="Foto" class="w-24 h-24 object-cover rounded-xl border border-outline-variant">
                                <p class="text-xs text-on-surface-variant">Foto saat ini. Upload baru untuk mengganti.</p>
                            </div>
                        <?php endif; ?>
                        <input type="file" name="foto" accept="image/*" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm file:mr-4 file:py-1 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="3" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm"><?= htmlspecialchars($hospital['deskripsi']) ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Galeri Fasilitas -->
            <div class="bg-surface border border-outline-variant rounded-xl overflow-hidden shadow-sm p-6 mb-6">
                <h3 class="font-bold text-on-surface text-lg mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">photo_library</span>
                    Galeri Fasilitas
                </h3>
                <div class="space-y-5">
                    <?php if (!empty($hospital['galeri'])): ?>
                        <?php $galeriArr = json_decode($hospital['galeri'], true) ?: []; ?>
                        <?php if (count($galeriArr) > 0): ?>
                            <div>
                                <label class="block text-sm font-semibold text-on-surface mb-2">Galeri Saat Ini</label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                                    <?php foreach ($galeriArr as $gImg): ?>
                                        <div class="relative group">
                                            <img src="<?= base_url('uploads/hospitals/galeri/' . $gImg) ?>" alt="Galeri" class="w-full h-24 object-cover rounded-xl border border-outline-variant">
                                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity rounded-xl flex items-center justify-center">
                                                <label class="flex items-center gap-2 text-white cursor-pointer text-xs font-semibold bg-error/90 px-2 py-1 rounded">
                                                    <input type="checkbox" name="delete_galeri[]" value="<?= $gImg ?>" class="rounded focus:ring-error text-error border-none">
                                                    Hapus
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <p class="text-xs text-error mt-2 font-semibold">Centang gambar yang ingin dihapus, lalu klik Simpan Perubahan.</p>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Upload Gambar Tambahan (Maksimal 10 foto total)</label>
                        <input type="file" name="galeri[]" accept="image/*" multiple max="10" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm file:mr-4 file:py-1 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                        <p class="text-xs text-on-surface-variant mt-2">Anda bisa memilih lebih dari satu file sekaligus.</p>
                    </div>
                </div>
            </div>

            <!-- Lokasi -->
            <div class="bg-surface border border-outline-variant rounded-xl overflow-hidden shadow-sm p-6 mb-6">
                <h3 class="font-bold text-on-surface text-lg mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">location_on</span>
                    Lokasi
                </h3>
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Alamat Lengkap <span class="text-error">*</span></label>
                        <textarea name="alamat" rows="2" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" required><?= htmlspecialchars($hospital['alamat']) ?></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Kecamatan</label>
                        <input type="text" name="kecamatan" value="<?= htmlspecialchars($hospital['kecamatan']) ?>" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Latitude <span class="text-error">*</span></label>
                            <input type="text" name="latitude" id="latitude" value="<?= $hospital['latitude'] ?>" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm font-mono" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Longitude <span class="text-error">*</span></label>
                            <input type="text" name="longitude" id="longitude" value="<?= $hospital['longitude'] ?>" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm font-mono" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kontak & Informasi Lainnya -->
            <div class="bg-surface border border-outline-variant rounded-xl overflow-hidden shadow-sm p-6 mb-6">
                <h3 class="font-bold text-on-surface text-lg mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">contact_phone</span>
                    Kontak & Informasi Lainnya
                </h3>
                <div class="space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Nomor Telepon</label>
                            <input type="text" name="telepon" value="<?= htmlspecialchars($hospital['telepon']) ?>" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">WhatsApp</label>
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-outline-variant bg-surface-container text-on-surface-variant text-sm h-[46px] font-semibold">+62</span>
                                <?php
                                    $waValue = htmlspecialchars($hospital['whatsapp']);
                                    if (strpos($waValue, '+62') === 0) {
                                        $waValue = substr($waValue, 3);
                                    } elseif (strpos($waValue, '62') === 0) {
                                        $waValue = substr($waValue, 2);
                                    } elseif (strpos($waValue, '0') === 0) {
                                        $waValue = substr($waValue, 1);
                                    }
                                ?>
                                <input type="text" name="whatsapp" value="<?= $waValue ?>" class="flex-1 w-full px-4 py-3 bg-surface-container-lowest rounded-r-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="8xxxxxxxxxx">
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Email</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($hospital['email']) ?>" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Website</label>
                            <input type="url" name="website" value="<?= htmlspecialchars($hospital['website']) ?>" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Jam Operasional</label>
                            <input type="text" name="jam_operasional" value="<?= htmlspecialchars($hospital['jam_operasional']) ?>" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Rating</label>
                            <input type="number" name="rating" step="0.1" min="0" max="5" value="<?= $hospital['rating'] ?>" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Status BPJS</label>
                            <label class="flex items-center gap-3 px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant cursor-pointer hover:bg-surface-container transition-colors">
                                <input type="checkbox" name="status_bpjs" value="1" <?= $hospital['status_bpjs'] ? 'checked' : '' ?> class="w-5 h-5 rounded text-primary focus:ring-primary">
                                <span class="text-sm text-on-surface">Menerima BPJS</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fasilitas & Layanan -->
            <?php
            $fasilitasArr = !empty($hospital['fasilitas']) ? json_decode($hospital['fasilitas'], true) : [];
            $layananArr = !empty($hospital['layanan']) ? json_decode($hospital['layanan'], true) : [];
            $jadwalArr = !empty($hospital['jadwal_dokter']) ? json_decode($hospital['jadwal_dokter'], true) : [];
            ?>
            <div class="bg-surface border border-outline-variant rounded-xl overflow-hidden shadow-sm p-6 mb-6">
                <h3 class="font-bold text-on-surface text-lg mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">medical_services</span>
                    Fasilitas & Layanan
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Fasilitas Rumah Sakit</label>
                        <div id="fasilitas-container" class="space-y-2">
                            <?php if(!empty($fasilitasArr)): ?>
                                <?php foreach($fasilitasArr as $f): ?>
                                    <div class="flex gap-2">
                                        <input type="text" name="fasilitas[]" value="<?= htmlspecialchars($f) ?>" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm">
                                        <button type="button" class="bg-error/10 text-error px-3 rounded-xl hover:bg-error/20 transition-colors" onclick="this.parentElement.remove()">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="flex gap-2">
                                    <input type="text" name="fasilitas[]" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Contoh: UGD 24 Jam">
                                    <button type="button" class="bg-primary/10 text-primary px-3 rounded-xl hover:bg-primary/20 transition-colors" onclick="addFasilitas()">
                                        <span class="material-symbols-outlined">add</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($fasilitasArr)): ?>
                        <button type="button" class="mt-2 text-sm bg-primary/10 text-primary px-4 py-2 rounded-lg font-bold hover:bg-primary/20 transition-colors flex items-center gap-1" onclick="addFasilitas()">
                            <span class="material-symbols-outlined text-[18px]">add</span> Tambah Fasilitas
                        </button>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Layanan Spesialis</label>
                        <div id="layanan-container" class="space-y-2">
                            <?php if(!empty($layananArr)): ?>
                                <?php foreach($layananArr as $l): ?>
                                    <div class="flex gap-2">
                                        <input type="text" name="layanan[]" value="<?= htmlspecialchars($l) ?>" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm">
                                        <button type="button" class="bg-error/10 text-error px-3 rounded-xl hover:bg-error/20 transition-colors" onclick="this.parentElement.remove()">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="flex gap-2">
                                    <input type="text" name="layanan[]" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Contoh: Spesialis Jantung">
                                    <button type="button" class="bg-primary/10 text-primary px-3 rounded-xl hover:bg-primary/20 transition-colors" onclick="addLayanan()">
                                        <span class="material-symbols-outlined">add</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($layananArr)): ?>
                        <button type="button" class="mt-2 text-sm bg-primary/10 text-primary px-4 py-2 rounded-lg font-bold hover:bg-primary/20 transition-colors flex items-center gap-1" onclick="addLayanan()">
                            <span class="material-symbols-outlined text-[18px]">add</span> Tambah Layanan
                        </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Jadwal Dokter -->
            <div class="bg-surface border border-outline-variant rounded-xl overflow-hidden shadow-sm p-6 mb-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-bold text-on-surface text-lg flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">event_note</span>
                        Jadwal Dokter
                    </h3>
                    <button type="button" class="text-sm bg-primary/10 text-primary px-4 py-2 rounded-lg font-bold hover:bg-primary/20 transition-colors flex items-center gap-1" onclick="addJadwal()">
                        <span class="material-symbols-outlined text-[18px]">add</span> Tambah Jadwal
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left" id="jadwal-table">
                        <thead>
                            <tr class="bg-surface-container border-b border-outline-variant">
                                <th class="px-4 py-3 font-semibold text-sm text-on-surface-variant w-1/4">Hari</th>
                                <th class="px-4 py-3 font-semibold text-sm text-on-surface-variant w-1/4">Jam Praktek</th>
                                <th class="px-4 py-3 font-semibold text-sm text-on-surface-variant w-1/4">Nama Dokter</th>
                                <th class="px-4 py-3 font-semibold text-sm text-on-surface-variant w-1/4">Spesialisasi</th>
                                <th class="px-4 py-3 font-semibold text-sm text-on-surface-variant w-16 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="jadwal-container">
                            <?php if(!empty($jadwalArr)): ?>
                                <?php foreach($jadwalArr as $idx => $j): ?>
                                    <tr class="border-b border-outline-variant">
                                        <td class="p-2"><input type="text" name="jadwal_dokter[<?= $idx ?>][hari]" value="<?= htmlspecialchars($j['hari'] ?? '') ?>" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm"></td>
                                        <td class="p-2"><input type="text" name="jadwal_dokter[<?= $idx ?>][jam]" value="<?= htmlspecialchars($j['jam'] ?? '') ?>" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm"></td>
                                        <td class="p-2"><input type="text" name="jadwal_dokter[<?= $idx ?>][nama_dokter]" value="<?= htmlspecialchars($j['nama_dokter'] ?? '') ?>" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm"></td>
                                        <td class="p-2"><input type="text" name="jadwal_dokter[<?= $idx ?>][spesialisasi]" value="<?= htmlspecialchars($j['spesialisasi'] ?? '') ?>" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm"></td>
                                        <td class="p-2 text-center">
                                            <button type="button" class="text-error hover:bg-error/10 p-1 rounded transition-colors" onclick="this.closest('tr').remove()"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr class="border-b border-outline-variant">
                                    <td class="p-2"><input type="text" name="jadwal_dokter[0][hari]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Senin - Jumat"></td>
                                    <td class="p-2"><input type="text" name="jadwal_dokter[0][jam]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="08:00 - 14:00"></td>
                                    <td class="p-2"><input type="text" name="jadwal_dokter[0][nama_dokter]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="dr. Budi, Sp.PD"></td>
                                    <td class="p-2"><input type="text" name="jadwal_dokter[0][spesialisasi]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Penyakit Dalam"></td>
                                    <td class="p-2 text-center">
                                        <button type="button" class="text-error hover:bg-error/10 p-1 rounded transition-colors" onclick="this.closest('tr').remove()"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-primary hover:bg-primary-container text-white px-8 py-3 rounded-xl flex items-center justify-center gap-2 shadow-sm active:scale-95 transition-all font-bold">
                    <span class="material-symbols-outlined">save</span>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <!-- Map Picker Sidebar -->
    <div class="lg:col-span-1">
        <div class="bg-surface border border-outline-variant rounded-xl overflow-hidden shadow-sm sticky top-24">
            <div class="px-6 py-4 border-b border-outline-variant bg-surface-container-lowest flex items-center justify-between">
                <h4 class="font-bold text-on-surface">Penentuan Lokasi</h4>
                <span class="material-symbols-outlined text-secondary">location_on</span>
            </div>
            <div class="p-4">
                <p class="text-sm text-on-surface-variant mb-4">Klik pada peta untuk mengubah titik koordinat lokasi.</p>
                <div id="map" class="w-full aspect-square rounded-xl border border-outline-variant z-0"></div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    var lat = <?= $hospital['latitude'] ?: '-6.8694' ?>;
    var lng = <?= $hospital['longitude'] ?: '109.0436' ?>;
    var map = L.map('map').setView([lat, lng], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    var customIcon = L.divIcon({
        className: 'custom-map-icon',
        html: `<span class="material-symbols-outlined text-4xl" style="color:#003178; text-shadow:1px 1px 2px rgba(0,0,0,0.3);">location_on</span>`,
        iconSize: [40, 40],
        iconAnchor: [20, 40],
    });

    var marker = L.marker([lat, lng], {icon: customIcon}).addTo(map);
    map.on('click', function(e) {
        if (marker) map.removeLayer(marker);
        marker = L.marker(e.latlng, {icon: customIcon}).addTo(map);
        document.getElementById('latitude').value = e.latlng.lat;
        document.getElementById('longitude').value = e.latlng.lng;
    });

    function updateMapFromInput() {
        let lat = parseFloat(document.getElementById('latitude').value);
        let lng = parseFloat(document.getElementById('longitude').value);
        
        if (!isNaN(lat) && !isNaN(lng)) {
            let newLatLng = new L.LatLng(lat, lng);
            map.setView(newLatLng, 15);
            if (marker) map.removeLayer(marker);
            marker = L.marker(newLatLng, {icon: customIcon}).addTo(map);
        }
    }

    document.getElementById('latitude').addEventListener('input', updateMapFromInput);
    document.getElementById('longitude').addEventListener('input', updateMapFromInput);

    function addFasilitas() {
        const container = document.getElementById('fasilitas-container');
        const div = document.createElement('div');
        div.className = 'flex gap-2 mt-2';
        div.innerHTML = `
            <input type="text" name="fasilitas[]" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Tambahan fasilitas...">
            <button type="button" class="bg-error/10 text-error px-3 rounded-xl hover:bg-error/20 transition-colors" onclick="this.parentElement.remove()">
                <span class="material-symbols-outlined">delete</span>
            </button>
        `;
        container.appendChild(div);
    }

    function addLayanan() {
        const container = document.getElementById('layanan-container');
        const div = document.createElement('div');
        div.className = 'flex gap-2 mt-2';
        div.innerHTML = `
            <input type="text" name="layanan[]" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Tambahan layanan...">
            <button type="button" class="bg-error/10 text-error px-3 rounded-xl hover:bg-error/20 transition-colors" onclick="this.parentElement.remove()">
                <span class="material-symbols-outlined">delete</span>
            </button>
        `;
        container.appendChild(div);
    }

    let jadwalIndex = <?= !empty($jadwalArr) ? count($jadwalArr) : 1 ?>;
    function addJadwal() {
        const container = document.getElementById('jadwal-container');
        const tr = document.createElement('tr');
        tr.className = 'border-b border-outline-variant';
        tr.innerHTML = `
            <td class="p-2"><input type="text" name="jadwal_dokter[${jadwalIndex}][hari]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Senin - Jumat"></td>
            <td class="p-2"><input type="text" name="jadwal_dokter[${jadwalIndex}][jam]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="08:00 - 14:00"></td>
            <td class="p-2"><input type="text" name="jadwal_dokter[${jadwalIndex}][nama_dokter]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="dr. Budi, Sp.PD"></td>
            <td class="p-2"><input type="text" name="jadwal_dokter[${jadwalIndex}][spesialisasi]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Penyakit Dalam"></td>
            <td class="p-2 text-center">
                <button type="button" class="text-error hover:bg-error/10 p-1 rounded transition-colors" onclick="this.closest('tr').remove()"><span class="material-symbols-outlined text-[20px]">delete</span></button>
            </td>
        `;
        container.appendChild(tr);
        jadwalIndex++;
    }
</script>
<?= $this->endSection() ?>
