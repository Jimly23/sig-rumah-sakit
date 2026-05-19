<?= $this->extend('layout/frontend') ?>

<?= $this->section('content') ?>

<!-- 1. Hero Section -->
<section id="hero" class="relative bg-surface overflow-hidden hero-gradient min-h-[85vh] flex items-center -mt-24 pt-24">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-secondary/5 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4"></div>
    
    <div class="max-w-[1440px] mx-auto px-container-margin relative z-10 w-full grid lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-8 max-w-2xl">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-secondary/10 text-secondary rounded-full font-label-caps text-xs font-bold tracking-widest border border-secondary/20 shadow-sm">
                <span class="material-symbols-outlined text-[16px] fill-icon animate-pulse">my_location</span>
                REAL-TIME GIS UPDATE
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold text-primary leading-tight tracking-tight">
                Akses Kesehatan <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Terdekat & Tercepat</span><br>
                di Kabupaten Brebes
            </h1>
            <p class="text-lg text-on-surface-variant leading-relaxed max-w-xl">
                Sistem Informasi Geografis modern untuk memudahkan Anda menemukan fasilitas medis dan rute tercepat dalam satu platform yang terintegrasi.
            </p>
            <div class="flex flex-wrap gap-4 pt-4">
                <a href="#map" class="bg-primary px-8 py-4 text-white rounded-xl font-bold flex items-center gap-2 hover:bg-primary-container transition-all hover:-translate-y-1 shadow-lg shadow-primary/30">
                    <span class="material-symbols-outlined">map</span>
                    Lihat Peta
                </a>
                <a href="<?= base_url('hospitals') ?>" class="bg-secondary px-8 py-4 text-white rounded-xl font-bold flex items-center gap-2 hover:bg-opacity-90 transition-all hover:-translate-y-1 shadow-lg shadow-secondary/30">
                    <span class="material-symbols-outlined">list_alt</span>
                    Daftar Rumah Sakit
                </a>
                <a href="#about" class="bg-white border-2 border-outline-variant text-on-surface-variant px-8 py-4 rounded-xl font-bold hover:border-primary hover:text-primary transition-all hover:-translate-y-1 shadow-sm">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
        
        <div class="hidden lg:block relative">
            <div class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-transparent rounded-[3rem] transform rotate-3 scale-105 blur-xl"></div>
            <div class="relative bg-white p-4 rounded-[3rem] shadow-2xl border border-white/50">
                <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2053&auto=format&fit=crop" alt="Hospital Building" class="rounded-[2.5rem] w-full h-[500px] object-cover shadow-inner">
                
                <div class="absolute -left-8 top-32 bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-white/50 flex items-center gap-4 hover-scale">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <span class="material-symbols-outlined fill-icon">check_circle</span>
                    </div>
                    <div>
                        <p class="text-xs text-on-surface-variant font-semibold uppercase">Sistem Status</p>
                        <p class="text-sm font-bold text-on-surface">Online & Aktif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. About Section -->
<section id="about" class="py-24 bg-white px-container-margin">
    <div class="max-w-[1440px] mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative hidden lg:block">
                <div class="absolute inset-0 bg-gradient-to-br from-secondary/20 to-transparent rounded-[3rem] transform -rotate-3 scale-105 blur-xl"></div>
                <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=1760&auto=format&fit=crop" alt="Medical Map Concept" class="rounded-[3rem] shadow-2xl border border-outline-variant/30 relative z-10 w-full object-cover h-[500px]">
            </div>
            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Tentang Brebes MedGIS</h2>
                    <div class="w-20 h-1.5 bg-secondary rounded-full"></div>
                </div>
                <p class="text-lg text-on-surface-variant leading-relaxed">
                    Brebes MedGIS hadir sebagai solusi pemetaan kesehatan digital untuk masyarakat Kabupaten Brebes. Kami mengintegrasikan data geografis dengan informasi layanan medis secara real-time untuk memberikan akurasi tinggi.
                </p>
                <p class="text-on-surface-variant leading-relaxed">
                    Tujuan utama sistem ini adalah mempercepat respons penanganan medis dengan menyajikan rute tercepat menuju rumah sakit yang tersedia dan menginformasikan ketersediaan fasilitas secara transparan kepada masyarakat.
                </p>
                
                <div class="grid grid-cols-2 gap-6 pt-4">
                    <div class="bg-surface p-6 rounded-2xl border border-outline-variant">
                        <span class="material-symbols-outlined text-4xl text-primary mb-3">speed</span>
                        <h4 class="font-bold text-on-surface mb-1">Akses Cepat</h4>
                        <p class="text-sm text-on-surface-variant">Navigasi langsung terintegrasi dengan Google Maps.</p>
                    </div>
                    <div class="bg-surface p-6 rounded-2xl border border-outline-variant">
                        <span class="material-symbols-outlined text-4xl text-secondary mb-3">update</span>
                        <h4 class="font-bold text-on-surface mb-1">Data Terkini</h4>
                        <p class="text-sm text-on-surface-variant">Update informasi fasilitas secara real-time.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Map Section -->
<section id="map" class="py-24 bg-surface px-container-margin border-t border-outline-variant/30">
    <div class="max-w-[1440px] mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Peta Sebaran Rumah Sakit</h2>
            <p class="text-on-surface-variant">Jelajahi lokasi rumah sakit di wilayah Kabupaten Brebes menggunakan sistem informasi geografis interaktif kami.</p>
        </div>
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">

            <!-- Map Container -->
            <div class="relative">
                <div id="map-container" class="w-full aspect-square md:aspect-[21/9]"></div>

                <!-- Detail Rumah Sakit button — overlay pojok kanan bawah -->
                <div class="absolute bottom-4 right-4 z-[999]">
                    <a href="<?= base_url('hospitals') ?>" id="btn-detail-rs"
                       class="inline-flex items-center gap-2 px-5 py-2.5 bg-white text-primary font-bold text-sm rounded-lg shadow-lg border border-gray-200 hover:bg-primary hover:text-white hover:border-primary transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Detail Rumah Sakit
                    </a>
                </div>
            </div>

            <!-- Stats Bar bawah peta -->
            <div class="flex flex-col sm:flex-row items-stretch divide-y sm:divide-y-0 sm:divide-x divide-gray-100 bg-gray-50 border-t border-gray-100">

                <!-- Stat 1 — Jangkauan Peta -->
                <div class="flex-1 flex items-center gap-4 px-8 py-5">
                    <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Jangkauan Peta</p>
                        <p class="text-lg font-black text-gray-900">Kabupaten <span class="text-primary">Brebes</span></p>
                        <p class="text-xs text-gray-400">Jawa Tengah, Indonesia</p>
                    </div>
                </div>

                <!-- Stat 2 — Jumlah Rumah Sakit -->
                <div class="flex-1 flex items-center gap-4 px-8 py-5">
                    <div class="w-11 h-11 rounded-xl bg-yellow-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Jumlah Rumah Sakit</p>
                        <p class="text-lg font-black text-gray-900">
                            <span id="rs-count" class="stat-number">0</span>
                            <span class="text-secondary"> Rumah Sakit</span>
                        </p>
                        <p class="text-xs text-gray-400">Tersebar di Kab. Brebes</p>
                    </div>
                </div>

                <!-- Stat 3 — Kecamatan -->
                <div class="flex-1 flex items-center gap-4 px-8 py-5">
                    <div class="w-11 h-11 rounded-xl bg-green-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Kecamatan</p>
                        <p class="text-lg font-black text-gray-900">
                            <span id="kec-count" class="stat-number">0</span>
                            <span class="text-green-600"> Wilayah</span>
                        </p>
                        <p class="text-xs text-gray-400">Kecamatan di Kab. Brebes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    var map = L.map('map-container').setView([-6.8694, 109.0436], 12); // Default Brebes

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var hospitals = <?= json_encode($hospitals) ?>;
    
    var customIcon = L.divIcon({
        className: 'custom-map-icon',
        html: `<div class="relative flex items-center justify-center group cursor-pointer">
                    <div class="absolute w-10 h-10 bg-primary/30 rounded-full animate-ping"></div>
                    <span class="material-symbols-outlined text-primary text-4xl fill-icon relative z-10" style="text-shadow:0 2px 4px rgba(0,0,0,0.3);">location_on</span>
               </div>`,
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -40]
    });

    hospitals.forEach(function(hospital) {
        if(hospital.latitude && hospital.longitude) {
            var marker = L.marker([hospital.latitude, hospital.longitude], {icon: customIcon}).addTo(map);
            var popupContent = `
                <div class="text-center p-2 min-w-[200px]">
                    <h6 class="font-bold text-primary mb-1">${hospital.nama}</h6>
                    <p class="text-xs text-slate-500 mb-3 truncate max-w-[200px]">${hospital.alamat}</p>
                    <a href="<?= base_url('hospitals/detail/') ?>${hospital.id}" class="inline-block bg-primary text-white text-xs font-bold px-4 py-2 rounded-lg hover:bg-primary-container transition-colors">Lihat Detail</a>
                </div>
            `;
            marker.bindPopup(popupContent, {
                className: 'modern-popup'
            });
        }
    });

    // Kecamatan color mapping
    var kecamatanColors = {
        'Bantarkawung': { color: '#991b1b', fillColor: '#dc2626' },
        'Paguyangan':   { color: '#854d0e', fillColor: '#ca8a04' },
        'Tonjong':      { color: '#c2410c', fillColor: '#f97316' },
        'Sirampog':     { color: '#4c1d95', fillColor: '#7c3aed' },
        'Salem':        { color: '#075985', fillColor: '#0284c7' },
        'Bumiayu':      { color: '#065f46', fillColor: '#059669' }
    };

    var activeKecamatan = null;
    var geoJsonLayer = null;

    // Animated counter
    function animateCounter(el, target) {
        var current = 0;
        var step = Math.max(1, Math.floor(target / 30));
        var interval = setInterval(function() {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(interval);
            }
            el.textContent = current;
        }, 30);
    }

    // Update stats
    var rsCountEl = document.getElementById('rs-count');
    if (rsCountEl) animateCounter(rsCountEl, hospitals.length);

    // Load GeoJSON layer
    fetch('<?= base_url('data/map.geojson') ?>')
        .then(response => response.json())
        .then(data => {
            // Normalize nama
            if (data.features) {
                data.features.forEach(function(f) {
                    var rawName = f.properties.nama || f.properties.Nama || '';
                    f.properties.nama = rawName.charAt(0).toUpperCase() + rawName.slice(1).toLowerCase();
                });
            }

            // Update kecamatan count
            var kecCountEl = document.getElementById('kec-count');
            if (kecCountEl) animateCounter(kecCountEl, data.features.length);

            geoJsonLayer = L.geoJSON(data, {
                style: function(feature) {
                    var kecName = feature.properties.nama;
                    var colorSet = kecamatanColors[kecName] || { color: '#6b7280', fillColor: '#9ca3af' };
                    return {
                        color: colorSet.color,
                        fillColor: colorSet.fillColor,
                        fillOpacity: 0.15,
                        weight: 2,
                        opacity: 0.8,
                        dashArray: '5, 5'
                    };
                },
                onEachFeature: function(feature, layer) {
                    var kecName = feature.properties.nama;
                    var colorSet = kecamatanColors[kecName] || { color: '#6b7280' };

                    // Tooltip nama kecamatan
                    layer.bindTooltip(
                        '<div style="font-family:Inter,sans-serif;font-weight:800;font-size:12px;color:' + colorSet.color + '">\ud83d\udccd Kec. ' + kecName + '</div>',
                        { sticky: true, direction: 'top', offset: [0, -10] }
                    );

                    // Hover effect
                    layer.on('mouseover', function() {
                        if (activeKecamatan !== kecName) {
                            this.setStyle({ fillOpacity: 0.30, weight: 3, dashArray: '' });
                        }
                    });
                    layer.on('mouseout', function() {
                        if (activeKecamatan !== kecName) {
                            this.setStyle({ fillOpacity: 0.15, weight: 2, dashArray: '5, 5' });
                        }
                    });
                }
            }).addTo(map);
        })
        .catch(function(err) { console.warn('GeoJSON load error:', err); });

    // Custom popup & tooltip styling
    var style = document.createElement('style');
    style.innerHTML = `
        .leaflet-popup-content-wrapper {
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            padding: 0;
            border: 1px solid #e2e8f0;
        }
        .leaflet-popup-content {
            margin: 8px;
        }
        .leaflet-popup-tip {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .leaflet-tooltip {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(4px);
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 6px 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }
    `;
    document.head.appendChild(style);
</script>
<?= $this->endSection() ?>
