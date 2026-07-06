<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<div class="flex items-center justify-between mb-8">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-primary">Tambah Rumah Sakit</h2>
        <p class="text-on-surface-variant font-body-lg">Masukkan seluruh informasi rumah sakit secara lengkap.</p>
    </div>
    <a href="<?= base_url('admin') ?>" class="border border-outline-variant text-on-surface hover:bg-surface-container-high px-6 py-2.5 rounded-lg flex items-center gap-2 shadow-sm active:scale-95 transition-all font-semibold">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-3">
        <?php if(session()->has('errors')): ?>
            <div class="bg-error/10 border border-error text-error rounded-xl p-4 mb-6">
                <ul class="list-disc list-inside">
                    <?php foreach(session('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/store') ?>" method="post" enctype="multipart/form-data">
            <!-- Informasi Utama -->
            <div class="bg-surface border border-outline-variant rounded-xl overflow-hidden shadow-sm p-6 mb-6">
                <h3 class="font-bold text-on-surface text-lg mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">info</span>
                    Informasi Utama
                </h3>
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Nama Rumah Sakit <span class="text-error">*</span></label>
                        <input type="text" name="nama" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary focus:border-primary text-sm" placeholder="Contoh: RSUD Brebes" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Foto Rumah Sakit</label>
                        <input type="file" name="foto" accept="image/*" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm file:mr-4 file:py-1 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="3" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Penjelasan singkat mengenai rumah sakit..."></textarea>
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
                        <textarea name="alamat" rows="2" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Jl. ..." required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Kecamatan</label>
                        <input type="text" name="kecamatan" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Contoh: Bumiayu">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Latitude <span class="text-error">*</span></label>
                            <input type="text" name="latitude" id="latitude" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm font-mono" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Longitude <span class="text-error">*</span></label>
                            <input type="text" name="longitude" id="longitude" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm font-mono" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Link Google Maps Embed</label>
                        <input type="url" name="link_gmaps" id="link_gmaps" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="https://www.google.com/maps/embed?pb=...">
                        <p class="text-xs text-on-surface-variant mt-2">Masukkan link embed Google Maps untuk menampilkan peta interaktif.</p>
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
                            <input type="text" name="telepon" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="(0283) 671003" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">WhatsApp</label>
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-outline-variant bg-surface-container text-on-surface-variant text-sm h-[46px] font-semibold">+62</span>
                                <input type="text" name="whatsapp" class="flex-1 w-full px-4 py-3 bg-surface-container-lowest rounded-r-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="8xxxxxxxxxx" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Email</label>
                            <input type="email" name="email" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="info@rumahsakit.com">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Website</label>
                            <input type="url" name="website" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="https://...">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Jam Operasional</label>
                            <input type="text" name="jam_operasional" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="24 Jam">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Rating</label>
                            <input type="number" name="rating" step="0.1" min="0" max="5" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="4.5">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Status BPJS</label>
                            <label class="flex items-center gap-3 px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant cursor-pointer hover:bg-surface-container transition-colors">
                                <input type="checkbox" name="status_bpjs" value="1" class="w-5 h-5 rounded text-primary focus:ring-primary">
                                <span class="text-sm text-on-surface">Menerima BPJS</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fasilitas & Layanan -->
            <div class="bg-surface border border-outline-variant rounded-xl overflow-hidden shadow-sm p-6 mb-6">
                <h3 class="font-bold text-on-surface text-lg mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">medical_services</span>
                    Fasilitas & Layanan
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Fasilitas Rumah Sakit</label>
                        <div id="fasilitas-container" class="space-y-2">
                            <div class="flex gap-2">
                                <input type="text" name="fasilitas[]" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Contoh: UGD 24 Jam">
                                <button type="button" class="bg-primary/10 text-primary px-3 rounded-xl hover:bg-primary/20 transition-colors" onclick="addFasilitas()">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Layanan Spesialis</label>
                        <div id="layanan-container" class="space-y-2">
                            <div class="flex gap-2">
                                <input type="text" name="layanan[]" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Contoh: Spesialis Jantung">
                                <button type="button" class="bg-primary/10 text-primary px-3 rounded-xl hover:bg-primary/20 transition-colors" onclick="addLayanan()">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
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
                            <tr class="border-b border-outline-variant">
                                <td class="p-2"><input type="text" name="jadwal_dokter[0][hari]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Senin - Jumat" oninput="this.value = this.value.replace(/[0-9]/g, '')"></td>
                                <td class="p-2"><input type="text" name="jadwal_dokter[0][jam]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="08:00 - 14:00" oninput="this.value = this.value.replace(/[a-zA-Z]/g, '')"></td>
                                <td class="p-2"><input type="text" name="jadwal_dokter[0][nama_dokter]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="dr. Budi, Sp.PD" oninput="this.value = this.value.replace(/[0-9]/g, '')"></td>
                                <td class="p-2"><input type="text" name="jadwal_dokter[0][spesialisasi]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Penyakit Dalam" oninput="this.value = this.value.replace(/[0-9]/g, '')"></td>
                                <td class="p-2 text-center">
                                    <button type="button" class="text-error hover:bg-error/10 p-1 rounded transition-colors" onclick="this.closest('tr').remove()"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-primary hover:bg-primary-container text-white px-8 py-3 rounded-xl flex items-center justify-center gap-2 shadow-sm active:scale-95 transition-all font-bold">
                    <span class="material-symbols-outlined">save</span>
                    Simpan Data
                </button>
            </div>
        </form>
    </div>

    <!-- Map Picker Sidebar -->
    <!-- <div class="lg:col-span-1 space-y-6">
        <div class="bg-white rounded-2xl border border-outline-variant p-6 shadow-sm sticky top-24">
            <h3 class="font-bold text-on-surface mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">map</span>
                Peta Lokasi
            </h3>

            <div id="gmaps-preview" class="w-full aspect-square rounded-xl border border-outline-variant z-0 mb-4 overflow-hidden" style="display:none;">
                <iframe id="gmaps-iframe" src="" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <p class="text-sm text-on-surface-variant mb-4">Klik pada peta untuk menentukan koordinat lokasi rumah sakit.</p>
            <div id="map" class="w-full aspect-square rounded-xl border border-outline-variant z-0 mb-4 overflow-hidden"></div>
        </div>
    </div> -->
</div>

<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    if (document.getElementById('map')) {
        var map = L.map('map').setView([-6.8694, 109.0436], 12);
        L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://opentopomap.org">OpenTopoMap</a>',
            maxZoom: 17
        }).addTo(map);

        var marker;
        var customIcon = L.divIcon({
            className: 'custom-map-icon',
            html: `<span class="material-symbols-outlined text-4xl" style="color:#003178; text-shadow:1px 1px 2px rgba(0,0,0,0.3);">location_on</span>`,
            iconSize: [40, 40],
            iconAnchor: [20, 40],
        });

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
    }

    // Google Maps Embed Preview
    var gmapsInput = document.getElementById('link_gmaps');
    var gmapsPreview = document.getElementById('gmaps-preview');
    var gmapsIframe = document.getElementById('gmaps-iframe');

    if (gmapsInput && gmapsPreview && gmapsIframe) {
        gmapsInput.addEventListener('input', function() {
            var url = this.value.trim();
            if (url) {
                gmapsIframe.src = url;
                gmapsPreview.style.display = 'block';
            } else {
                gmapsIframe.src = '';
                gmapsPreview.style.display = 'none';
            }
        });
    }

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

    let jadwalIndex = 1;
    function addJadwal() {
        const container = document.getElementById('jadwal-container');
        const tr = document.createElement('tr');
        tr.className = 'border-b border-outline-variant';
        tr.innerHTML = `
            <td class="p-2"><input type="text" name="jadwal_dokter[${jadwalIndex}][hari]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Senin - Jumat" oninput="this.value = this.value.replace(/[0-9]/g, '')"></td>
            <td class="p-2"><input type="text" name="jadwal_dokter[${jadwalIndex}][jam]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="08:00 - 14:00" oninput="this.value = this.value.replace(/[a-zA-Z]/g, '')"></td>
            <td class="p-2"><input type="text" name="jadwal_dokter[${jadwalIndex}][nama_dokter]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="dr. Budi, Sp.PD" oninput="this.value = this.value.replace(/[0-9]/g, '')"></td>
            <td class="p-2"><input type="text" name="jadwal_dokter[${jadwalIndex}][spesialisasi]" class="w-full px-3 py-2 bg-surface-container-lowest rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Penyakit Dalam" oninput="this.value = this.value.replace(/[0-9]/g, '')"></td>
            <td class="p-2 text-center">
                <button type="button" class="text-error hover:bg-error/10 p-1 rounded transition-colors" onclick="this.closest('tr').remove()"><span class="material-symbols-outlined text-[20px]">delete</span></button>
            </td>
        `;
        container.appendChild(tr);
        jadwalIndex++;
    }
</script>
<?= $this->endSection() ?>

