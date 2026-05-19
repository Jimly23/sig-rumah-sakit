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
    <div class="lg:col-span-2">
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

            <!-- Galeri Fasilitas -->
            <div class="bg-surface border border-outline-variant rounded-xl overflow-hidden shadow-sm p-6 mb-6">
                <h3 class="font-bold text-on-surface text-lg mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">photo_library</span>
                    Galeri Fasilitas
                </h3>
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Upload Gambar (Maksimal 10 foto)</label>
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
                        <textarea name="alamat" rows="2" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Jl. ..." required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Kecamatan</label>
                        <input type="text" name="kecamatan" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="Contoh: Bumiayu">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Link Google Maps (Embed URL)</label>
                        <input type="text" name="link_gmaps" id="link_gmaps" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="https://www.google.com/maps/embed?pb=...">
                        <p class="text-xs text-on-surface-variant mt-2">Buka Google Maps > Bagikan > Sematkan Peta > Salin URL pada atribut src="...". Latitude dan Longitude akan terisi otomatis.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Latitude <span class="text-error">*</span></label>
                            <input type="text" name="latitude" id="latitude" class="w-full px-4 py-3 bg-surface-container rounded-xl border-none focus:ring-2 focus:ring-primary text-sm font-mono" required readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">Longitude <span class="text-error">*</span></label>
                            <input type="text" name="longitude" id="longitude" class="w-full px-4 py-3 bg-surface-container rounded-xl border-none focus:ring-2 focus:ring-primary text-sm font-mono" required readonly>
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
                            <input type="text" name="telepon" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="(0283) 671003">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-on-surface mb-2">WhatsApp</label>
                            <input type="text" name="whatsapp" class="w-full px-4 py-3 bg-surface-container-lowest rounded-xl border border-outline-variant focus:ring-2 focus:ring-primary text-sm" placeholder="08xxxxxxxxxx">
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

            <div class="flex justify-end">
                <button type="submit" class="bg-primary hover:bg-primary-container text-white px-8 py-3 rounded-xl flex items-center justify-center gap-2 shadow-sm active:scale-95 transition-all font-bold">
                    <span class="material-symbols-outlined">save</span>
                    Simpan Data
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
                <p class="text-sm text-on-surface-variant mb-4">Klik pada peta untuk menentukan koordinat lokasi rumah sakit.</p>
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
    var map = L.map('map').setView([-6.8694, 109.0436], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
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

    document.getElementById('link_gmaps').addEventListener('input', function(e) {
        let url = e.target.value;
        let lat = null;
        let lng = null;

        // Prioritas 1: Mencari koordinat dari Embed Link (!2dLng!3dLat)
        let embedMatch = url.match(/!2d(-?\d+\.\d+)!3d(-?\d+\.\d+)/);
        if (embedMatch) {
            lng = parseFloat(embedMatch[1]);
            lat = parseFloat(embedMatch[2]);
        } 
        // Prioritas 2: Mencari koordinat pasti lokasi link biasa (!3d dan !4d)
        else {
            let exactMatch = url.match(/!3d(-?\d+\.\d+)!4d(-?\d+\.\d+)/);
            if (exactMatch) {
                lat = parseFloat(exactMatch[1]);
                lng = parseFloat(exactMatch[2]);
            } else {
                // Prioritas 3: Mencari koordinat tengah layar (@ atau q= atau ll=)
                let viewportMatch = url.match(/@(-?\d+\.\d+),(-?\d+\.\d+)/) || 
                                    url.match(/[?&]q=(-?\d+\.\d+),(-?\d+\.\d+)/) ||
                                    url.match(/[?&]ll=(-?\d+\.\d+),(-?\d+\.\d+)/);
                if (viewportMatch) {
                    lat = parseFloat(viewportMatch[1]);
                    lng = parseFloat(viewportMatch[2]);
                }
            }
        }
        
        if (lat !== null && lng !== null) {
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
            
            let newLatLng = new L.LatLng(lat, lng);
            map.setView(newLatLng, 15);
            if (marker) map.removeLayer(marker);
            marker = L.marker(newLatLng, {icon: customIcon}).addTo(map);
        }
    });
</script>
<?= $this->endSection() ?>
