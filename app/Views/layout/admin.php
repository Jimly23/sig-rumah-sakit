<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <link rel="icon" type="image/png" href="<?= base_url('images/logo-brebes.png') ?>">
    <title>MediGIS Admin - Hospital Management System</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        .fill-icon {
            font-variation-settings: 'FILL' 1;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fb;
        }
        .technical-grid {
            background-image: radial-gradient(#d1d5db 0.5px, transparent 0.5px);
            background-size: 16px 16px;
        }
        /* Leaflet Fix */
        #map { z-index: 10; }
        .leaflet-top, .leaflet-bottom { z-index: 10 !important; }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "surface-bright": "#f7f9fb", "on-secondary-container": "#007165", "surface-tint": "#2b5bb5",
                      "surface": "#f7f9fb", "on-error-container": "#93000a", "surface-container-highest": "#e0e3e5",
                      "inverse-surface": "#2d3133", "primary": "#003178", "inverse-on-surface": "#eff1f3",
                      "on-surface-variant": "#434652", "on-error": "#ffffff", "surface-container-lowest": "#ffffff",
                      "primary-fixed-dim": "#b0c6ff", "on-surface": "#191c1e", "on-primary-container": "#a1bbff",
                      "tertiary": "#602100", "primary-fixed": "#d9e2ff", "outline-variant": "#c3c6d4",
                      "on-tertiary-fixed-variant": "#7d2d00", "surface-dim": "#d8dadc", "on-primary-fixed": "#001945",
                      "secondary": "#006b5f", "on-tertiary": "#ffffff", "secondary-fixed-dim": "#70d8c8",
                      "on-primary": "#ffffff", "background": "#f7f9fb", "tertiary-fixed-dim": "#ffb596",
                      "surface-variant": "#e0e3e5", "surface-container": "#eceef0", "secondary-fixed": "#8df5e4",
                      "on-secondary-fixed": "#00201c", "surface-container-low": "#f2f4f6", "on-primary-fixed-variant": "#00429c",
                      "on-tertiary-container": "#ffa781", "primary-container": "#0d47a1", "on-secondary": "#ffffff",
                      "outline": "#737783", "surface-container-high": "#e6e8ea", "on-tertiary-fixed": "#360f00",
                      "error-container": "#ffdad6", "tertiary-container": "#853100", "inverse-primary": "#b0c6ff",
                      "on-secondary-fixed-variant": "#005048", "error": "#ba1a1a", "secondary-container": "#8df5e4",
                      "on-background": "#191c1e"
              },
              "borderRadius": {
                      "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem"
              },
              "spacing": {
                      "unit": "8px", "map-control-gap": "12px", "gutter": "16px", "sidebar-width": "320px", "container-margin": "24px"
              },
              "fontFamily": {
                      "headline-lg": ["Inter"], "display-lg": ["Inter"], "title-md": ["Inter"],
                      "body-sm": ["Inter"], "body-lg": ["Inter"], "data-mono": ["monospace"], "label-caps": ["Inter"]
              }
            }
          }
        }
    </script>
    <?= $this->renderSection('head') ?>
</head>
<body class="bg-surface-bright technical-grid min-h-screen">
<!-- SideNavBar Shell -->
<aside id="sidebar-admin" class="transform -translate-x-full md:translate-x-0 transition-transform duration-300 fixed left-0 top-0 h-full w-[320px] bg-surface-container-low border-r border-outline-variant flex flex-col p-4 z-50">
    <div class="mb-8 px-4 py-2 flex items-center gap-3">
        <img src="<?= base_url('images/logo-brebes.png') ?>" alt="Logo Brebes" class="w-10 h-10 object-contain">
        <div>
            <h1 class="font-title-md text-title-md font-bold text-primary">MediGIS Admin</h1>
            <p class="text-on-surface-variant text-sm">Hospital Management</p>
        </div>
    </div>
    <nav class="flex-grow space-y-2">
        <a class="flex items-center gap-3 px-4 py-3 bg-secondary-container text-on-secondary-container font-bold rounded-lg" href="<?= base_url('admin') ?>">
            <span class="material-symbols-outlined fill-icon">dashboard</span>
            <span class="font-body-lg text-body-lg">Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-colors duration-200 rounded-lg" href="<?= base_url() ?>">
            <span class="material-symbols-outlined">map</span>
            <span class="font-body-lg text-body-lg">Lihat Website</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-colors duration-200 rounded-lg" href="<?= base_url('auth/logout') ?>">
            <span class="material-symbols-outlined">logout</span>
            <span class="font-body-lg text-body-lg">Logout</span>
        </a>
    </nav>
    <div class="mt-auto p-4 flex items-center gap-3 border-t border-outline-variant">
        <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white">
            <span class="material-symbols-outlined">person</span>
        </div>
        <div>
            <p class="font-bold text-on-surface text-sm"><?= session()->get('username') ?></p>
            <p class="text-on-surface-variant text-xs">Administrator</p>
        </div>
    </div>
</aside>

<!-- Main Content Canvas -->
<main class="ml-0 md:ml-[320px] min-h-screen flex flex-col">
    <!-- TopAppBar -->
    <header class="h-16 bg-surface border-b border-outline-variant flex items-center justify-between px-4 md:px-8 sticky top-0 z-40">
        <div class="flex items-center gap-2 md:gap-4 flex-1">
            <button id="mobile-sidebar-btn" class="md:hidden hover:bg-surface-container-high rounded-full p-2 text-on-surface-variant active:scale-90 transition-transform">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="relative w-full md:w-96">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                <input class="w-full pl-10 pr-4 py-2 bg-surface-container rounded-full border-none focus:ring-2 focus:ring-secondary text-sm" placeholder="Cari data rumah sakit..." type="text"/>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button class="hover:bg-surface-container-high rounded-full p-2 text-on-surface-variant active:scale-90 transition-transform">
                <span class="material-symbols-outlined">notifications</span>
            </button>
        </div>
    </header>

    <!-- Content Body -->
    <div class="p-8 flex-1">
        <?php if(session()->getFlashdata('success')): ?>
            <div class="bg-secondary/10 border border-secondary text-on-secondary-container px-4 py-3 rounded-lg mb-6 flex items-center gap-3">
                <span class="material-symbols-outlined text-secondary">check_circle</span>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-error/10 border border-error text-error px-4 py-3 rounded-lg mb-6 flex items-center gap-3">
                <span class="material-symbols-outlined">error</span>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </div>

    <!-- Footer Info -->
    <footer class="p-8 text-center mt-auto">
        <p class="text-on-surface-variant text-xs font-label-caps">© 2024 MediGIS • Geographic Information System for Medical Infrastructure</p>
    </footer>
</main>

<?= $this->renderSection('scripts') ?>
<script>
    const searchInput = document.querySelector('input[type="text"]');
    if (searchInput) {
        searchInput.addEventListener('focus', () => {
            searchInput.parentElement.classList.add('ring-2', 'ring-primary/20');
        });
        searchInput.addEventListener('blur', () => {
            searchInput.parentElement.classList.remove('ring-2', 'ring-primary/20');
        });
    }

    // Sidebar Mobile Toggle
    const mobileSidebarBtn = document.getElementById('mobile-sidebar-btn');
    const sidebarAdmin = document.getElementById('sidebar-admin');
    
    if (mobileSidebarBtn && sidebarAdmin) {
        mobileSidebarBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            sidebarAdmin.classList.toggle('-translate-x-full');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 768) {
                if (!sidebarAdmin.classList.contains('-translate-x-full') && !sidebarAdmin.contains(e.target) && !mobileSidebarBtn.contains(e.target)) {
                    sidebarAdmin.classList.add('-translate-x-full');
                }
            }
        });
    }
</script>
</body>
</html>
