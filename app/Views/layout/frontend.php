<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Brebes MedGIS - Sistem Informasi Geografis Rumah Sakit</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-secondary-fixed-variant": "#005048", "on-primary": "#ffffff", "on-tertiary-container": "#ffa781",
                        "on-surface-variant": "#434652", "on-tertiary-fixed": "#360f00", "secondary-container": "#8df5e4",
                        "on-tertiary-fixed-variant": "#7d2d00", "error": "#ba1a1a", "surface": "#f7f9fb",
                        "tertiary-container": "#853100", "error-container": "#ffdad6", "surface-container-high": "#e6e8ea",
                        "secondary": "#006b5f", "on-surface": "#191c1e", "tertiary-fixed-dim": "#ffb596",
                        "surface-container-lowest": "#ffffff", "tertiary-fixed": "#ffdbcd", "inverse-primary": "#b0c6ff",
                        "inverse-on-surface": "#eff1f3", "secondary-fixed-dim": "#70d8c8", "surface-dim": "#d8dadc",
                        "secondary-fixed": "#8df5e4", "primary": "#003178", "on-background": "#191c1e",
                        "surface-container-highest": "#e0e3e5", "background": "#f7f9fb", "surface-variant": "#e0e3e5",
                        "on-secondary": "#ffffff", "primary-container": "#0d47a1", "on-primary-container": "#a1bbff",
                        "surface-tint": "#2b5bb5", "on-primary-fixed": "#001945", "on-error-container": "#93000a",
                        "on-secondary-fixed": "#00201c", "on-primary-fixed-variant": "#00429c", "surface-container": "#eceef0",
                        "outline-variant": "#c3c6d4", "surface-container-low": "#f2f4f6", "primary-fixed": "#d9e2ff",
                        "inverse-surface": "#2d3133", "on-secondary-container": "#007165", "surface-bright": "#f7f9fb",
                        "on-tertiary": "#ffffff", "primary-fixed-dim": "#b0c6ff", "on-error": "#ffffff", "outline": "#737783",
                        "tertiary": "#602100"
                    },
                    spacing: {
                        "sidebar-width": "320px", "gutter": "16px", "map-control-gap": "12px",
                        "unit": "8px", "container-margin": "24px"
                    },
                    fontFamily: {
                        "display-lg": ["Inter"], "data-mono": ["monospace"], "title-md": ["Inter"],
                        "headline-lg": ["Inter"], "headline-lg-mobile": ["Inter"], "body-lg": ["Inter"],
                        "label-caps": ["Inter"], "body-sm": ["Inter"]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        .fill-icon { font-variation-settings: 'FILL' 1; }
        
        .map-bg-pattern {
            background-image: radial-gradient(circle, #e2e8f0 1px, transparent 1px);
            background-size: 24px 24px;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(247,249,251,0.8) 100%);
        }

        .hover-scale { transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1); }
        .hover-scale:hover { transform: translateY(-4px); }
        
        #map { z-index: 10; }
        .leaflet-top, .leaflet-bottom { z-index: 10 !important; }
    </style>
    <?= $this->renderSection('head') ?>
</head>
<body class="bg-background text-on-surface font-body-lg text-body-lg selection:bg-primary-fixed selection:text-on-primary-fixed flex flex-col min-h-screen">

<!-- Top Navigation Bar -->
<header class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm shadow-md border-b border-outline-variant" id="navbar">
    <nav class="flex justify-between items-center w-full px-container-margin max-w-[1440px] mx-auto h-20">
        <a href="<?= base_url() ?>" class="font-headline-lg text-headline-lg font-bold text-primary">Brebes MedGIS</a>
        <div class="hidden md:flex items-center gap-8">
            <a class="font-title-md text-title-md text-on-surface-variant hover:text-secondary transition-colors duration-200" href="<?= base_url('#hero') ?>">Beranda</a>
            <a class="font-title-md text-title-md text-on-surface-variant hover:text-secondary transition-colors duration-200" href="<?= base_url('#about') ?>">Tentang</a>
            <a class="font-title-md text-title-md text-on-surface-variant hover:text-secondary transition-colors duration-200" href="<?= base_url('#map') ?>">Peta Lokasi</a>
            <a class="font-title-md text-title-md text-on-surface-variant hover:text-secondary transition-colors duration-200" href="<?= base_url('hospitals') ?>">Daftar RS</a>
        </div>
        <div class="hidden md:block">
            <?php if(session()->get('logged_in')): ?>
                <a href="<?= base_url('admin') ?>" class="bg-primary text-white px-6 py-3 rounded-xl font-semibold hover:bg-primary-container active:scale-95 transition-all shadow-sm">
                    Dashboard Admin
                </a>
            <?php else: ?>
                <a href="<?= base_url('auth/login') ?>" class="bg-primary text-white px-6 py-3 rounded-xl font-semibold hover:bg-primary-container active:scale-95 transition-all shadow-sm">
                    Login Admin
                </a>
            <?php endif; ?>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="md:hidden text-primary p-2">
            <span class="material-symbols-outlined text-3xl">menu</span>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-outline-variant px-container-margin py-4 space-y-4 shadow-lg absolute w-full left-0">
        <a class="block font-title-md text-title-md text-on-surface-variant hover:text-secondary transition-colors duration-200 py-2 border-b border-outline-variant/30" href="<?= base_url('#hero') ?>">Beranda</a>
        <a class="block font-title-md text-title-md text-on-surface-variant hover:text-secondary transition-colors duration-200 py-2 border-b border-outline-variant/30" href="<?= base_url('#about') ?>">Tentang</a>
        <a class="block font-title-md text-title-md text-on-surface-variant hover:text-secondary transition-colors duration-200 py-2 border-b border-outline-variant/30" href="<?= base_url('#map') ?>">Peta Lokasi</a>
        <a class="block font-title-md text-title-md text-on-surface-variant hover:text-secondary transition-colors duration-200 py-2 border-b border-outline-variant/30" href="<?= base_url('hospitals') ?>">Daftar RS</a>
        <div class="pt-2">
            <?php if(session()->get('logged_in')): ?>
                <a href="<?= base_url('admin') ?>" class="block w-full text-center bg-primary text-white px-6 py-3 rounded-xl font-semibold active:scale-95 transition-all shadow-sm">
                    Dashboard Admin
                </a>
            <?php else: ?>
                <a href="<?= base_url('auth/login') ?>" class="block w-full text-center bg-primary text-white px-6 py-3 rounded-xl font-semibold active:scale-95 transition-all shadow-sm">
                    Login Admin
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>

<main class="pt-24 flex-grow">
    <?= $this->renderSection('content') ?>
</main>

<!-- Footer -->
<footer class="bg-surface-container-highest border-t border-outline-variant mt-12">
    <div class="w-full py-12 px-container-margin max-w-[1440px] mx-auto flex flex-col md:flex-row justify-between gap-8">
        <div class="max-w-sm">
            <div class="font-title-md text-title-md font-bold text-primary mb-4">Brebes MedGIS</div>
            <p class="text-on-surface-variant text-body-sm leading-relaxed">
                Integrasi data kesehatan dan teknologi informasi geografis untuk kemudahan akses pelayanan medis di Kabupaten Brebes.
            </p>
        </div>
        <div class="grid grid-cols-2 gap-12">
            <div class="flex flex-col gap-4">
                <div class="font-title-md text-title-md text-on-surface font-semibold mb-2">Tautan Penting</div>
                <a class="text-on-surface-variant hover:text-secondary hover:underline transition-all duration-200" href="#">Portal Brebes</a>
                <a class="text-on-surface-variant hover:text-secondary hover:underline transition-all duration-200" href="#">Kemenkes RI</a>
            </div>
            <div class="flex flex-col gap-4">
                <div class="font-title-md text-title-md text-on-surface font-semibold mb-2">Layanan</div>
                <a class="text-on-surface-variant hover:text-secondary hover:underline transition-all duration-200 font-semibold" href="#">Kontak Darurat</a>
            </div>
        </div>
    </div>
    <div class="max-w-[1440px] mx-auto px-container-margin border-t border-outline-variant/30 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-on-surface-variant font-body-sm">
            <div class="flex items-center gap-4">
                <span>© 2026 Dinas Kesehatan Kabupaten Brebes. Seluruh Hak Cipta Dilindungi.</span>
            </div>
            <div class="flex gap-6">
                <a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined">face_nod</span></a>
                <a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined">share</span></a>
            </div>
        </div>
    </div>
</footer>

<script>
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
</script>
<?= $this->renderSection('scripts') ?>
</body>
</html>
