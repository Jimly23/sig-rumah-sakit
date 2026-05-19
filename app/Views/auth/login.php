<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login - MediGIS Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fb;
        }
        .technical-grid {
            background-image: radial-gradient(#d1d5db 0.5px, transparent 0.5px);
            background-size: 16px 16px;
        }
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
              }
            }
          }
        }
    </script>
</head>
<body class="bg-surface-bright technical-grid min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-md">
    <div class="bg-surface-container-lowest rounded-2xl shadow-xl border border-outline-variant overflow-hidden">
        <div class="bg-primary p-8 text-center">
            <h1 class="text-3xl font-bold text-white mb-2">MediGIS Admin</h1>
            <p class="text-on-primary-container text-sm">Masuk untuk mengelola data rumah sakit</p>
        </div>
        <div class="p-8">
            <?php if(session()->getFlashdata('error')): ?>
                <div class="bg-error/10 border border-error text-error px-4 py-3 rounded-lg mb-6 flex items-center gap-3 text-sm">
                    <span class="material-symbols-outlined">error</span>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/process') ?>" method="post" class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-2">Username</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">person</span>
                        <input type="text" name="username" class="w-full pl-10 pr-4 py-3 bg-surface-container rounded-xl border-none focus:ring-2 focus:ring-primary text-sm transition-shadow" placeholder="Masukkan username admin" required autofocus>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-2">Password</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">lock</span>
                        <input type="password" name="password" class="w-full pl-10 pr-4 py-3 bg-surface-container rounded-xl border-none focus:ring-2 focus:ring-primary text-sm transition-shadow" placeholder="Masukkan password" required>
                    </div>
                </div>
                <button type="submit" class="w-full bg-primary hover:bg-primary-container text-white font-bold py-3 px-4 rounded-xl active:scale-95 transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">login</span>
                    Login
                </button>
            </form>
            <div class="mt-8 text-center">
                <a href="<?= base_url() ?>" class="text-sm text-secondary hover:underline flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
    <div class="text-center mt-6 text-on-surface-variant text-xs">
        &copy; 2024 MediGIS &bull; Dinas Kesehatan
    </div>
</div>

</body>
</html>
