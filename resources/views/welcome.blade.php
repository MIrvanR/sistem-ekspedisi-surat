<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-DISPOS | KPU Provinsi Bengkulu</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif

        <style>
            body { font-family: 'Inter', sans-serif; }
            
            /* Background Grid Kekinian */
            .bg-grid {
                background-size: 40px 40px;
                background-image: 
                    linear-gradient(to right, rgba(203, 213, 225, 0.3) 1px, transparent 1px),
                    linear-gradient(to bottom, rgba(203, 213, 225, 0.3) 1px, transparent 1px);
            }
            .dark .bg-grid {
                background-image: 
                    linear-gradient(to right, rgba(51, 65, 85, 0.3) 1px, transparent 1px),
                    linear-gradient(to bottom, rgba(51, 65, 85, 0.3) 1px, transparent 1px);
            }

            /* Animasi Kustom */
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }
            @keyframes float-delayed {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-15px); }
            }
            @keyframes marquee {
                0% { transform: translateX(100%); }
                100% { transform: translateX(-100%); }
            }
            
            .animate-float { animation: float 6s ease-in-out infinite; }
            .animate-float-delayed { animation: float-delayed 8s ease-in-out infinite 1s; }
            .animate-marquee { animation: marquee 25s linear infinite; }
            
            /* Efek Kaca (Glassmorphism) Khusus */
            .glass-card {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.5);
            }
            .dark .glass-card {
                background: rgba(15, 23, 42, 0.7);
                border: 1px solid rgba(255, 255, 255, 0.05);
            }
        </style>
    </head>
    <body class="bg-slate-50 text-slate-900 antialiased dark:bg-slate-950 dark:text-slate-100 selection:bg-red-600 selection:text-white flex flex-col min-h-screen">
        
        <div class="w-full bg-[#a11116] border-b border-[#820d11] text-white py-2 overflow-hidden z-[60] relative shadow-md">
            <div class="whitespace-nowrap flex items-center text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] animate-marquee">
                <span class="mx-4 text-red-200"> SISTEM INFORMASI DISPOSISI SURAT KPU PROVINSI BENGKULU</span>
                <span class="mx-4 text-white">•</span>
                <span class="mx-4 text-red-200">STATUS: AKTIF & TERENKRIPSI</span>
                <span class="mx-4 text-white">•</span>
                <span class="mx-4 text-red-200">PUSAT DATA TERHUBUNG</span>
                <span class="mx-4 text-white">•</span>
                <span class="mx-4 text-red-200"> SISTEM INFORMASI DISPOSISI SURAT KPU PROVINSI BENGKULU</span>
            </div>
        </div>

        <div class="fixed inset-0 z-[-2] bg-grid mask-image:linear-gradient(to_bottom,transparent,black)"></div>
        <div class="fixed inset-0 z-[-1] pointer-events-none overflow-hidden flex items-center justify-center">
            <div class="absolute top-[-10%] left-[-5%] w-[50rem] h-[50rem] bg-red-600/10 rounded-full blur-[120px] dark:bg-red-600/15"></div>
            <div class="absolute bottom-[5%] right-[-10%] w-[45rem] h-[45rem] bg-red-500/10 rounded-full blur-[100px] dark:bg-red-500/15"></div>
        </div>

        <div class="fixed bottom-0 left-0 w-full overflow-hidden z-[-1] pointer-events-none opacity-30 dark:opacity-[0.15] flex justify-center">
            <svg viewBox="0 0 1440 320" class="w-full max-w-[1920px] h-auto fill-slate-400 dark:fill-slate-600" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMax slice">
                <rect x="100" y="200" width="250" height="120" />
                <rect x="120" y="220" width="30" height="40" class="fill-white dark:fill-slate-900" />
                <rect x="170" y="220" width="30" height="40" class="fill-white dark:fill-slate-900" />
                <rect x="220" y="220" width="30" height="40" class="fill-white dark:fill-slate-900" />
                <rect x="270" y="220" width="30" height="40" class="fill-white dark:fill-slate-900" />
                <rect x="450" y="120" width="540" height="200" />
                <polygon points="720,20 420,120 1020,120" class="fill-slate-400 dark:fill-slate-600" />
                <rect x="480" y="120" width="40" height="200" class="fill-slate-300 dark:fill-slate-800" />
                <rect x="560" y="120" width="40" height="200" class="fill-slate-300 dark:fill-slate-800" />
                <rect x="640" y="120" width="40" height="200" class="fill-slate-300 dark:fill-slate-800" />
                <rect x="760" y="120" width="40" height="200" class="fill-slate-300 dark:fill-slate-800" />
                <rect x="840" y="120" width="40" height="200" class="fill-slate-300 dark:fill-slate-800" />
                <rect x="920" y="120" width="40" height="200" class="fill-slate-300 dark:fill-slate-800" />
                <path d="M680,240 h80 v80 h-80 z" class="fill-slate-500 dark:fill-slate-900" />
                <path d="M680,240 a40,40 0 0,1 80,0" class="fill-slate-500 dark:fill-slate-900" />
                <rect x="0" y="310" width="1440" height="10" class="fill-slate-500 dark:fill-slate-950" />
            </svg>
        </div>

        <header class="w-full px-6 py-4 lg:px-12 glass-card sticky top-0 z-50 shadow-sm border-b border-white/20">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <div class="absolute -inset-1 rounded-full bg-red-500 blur opacity-20"></div>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/KPU_Logo.svg" alt="Logo KPU" class="relative h-12 w-12 object-contain drop-shadow-md">
                    </div>
                    <div>
                        <h1 class="text-2xl font-black tracking-tighter text-slate-900 dark:text-white">
                            E-<span class="text-red-600 dark:text-red-500">DISPOS</span>
                        </h1>
                        <p class="text-[9px] font-bold uppercase tracking-[0.25em] text-slate-500 dark:text-slate-400">
                            KPU PROVINSI BENGKULU
                        </p>
                    </div>
                </div>
                <div class="hidden md:flex items-center gap-8">
                    <a href="#" class="text-sm font-bold text-slate-600 hover:text-red-600 transition dark:text-slate-300 dark:hover:text-red-500">Beranda</a>
                    <a href="/user" class="text-sm font-bold text-slate-600 hover:text-red-600 transition dark:text-slate-300 dark:hover:text-red-500">Portal User</a>
                    <a href="/admin" class="group relative inline-flex items-center justify-center gap-2 rounded-full bg-slate-900 px-6 py-2.5 text-sm font-bold text-white transition hover:bg-slate-800 dark:bg-white dark:text-slate-900 dark:hover:bg-slate-100 shadow-xl shadow-slate-900/20">
                        Admin Panel
                        <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </header>

        <main class="flex-1 w-full px-6 py-12 lg:px-12 lg:py-16 flex items-center relative z-10">
            <div class="mx-auto grid max-w-7xl gap-16 lg:grid-cols-2 lg:items-center w-full">
                
                <section class="space-y-8 z-20">
                    <div class="space-y-6">
                        <div class="inline-flex items-center gap-2 rounded-full border border-red-200 bg-red-50/50 backdrop-blur-md px-4 py-1.5 text-xs font-bold text-red-700 dark:border-red-900/50 dark:bg-red-900/20 dark:text-red-400 shadow-sm">
                            <span class="relative flex h-2 w-2">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-2 w-2 bg-red-600"></span>
                            </span>
                            Infrastruktur Digital E-Government
                        </div>
                        <h2 class="text-5xl sm:text-6xl lg:text-7xl font-black leading-[1.05] tracking-tight text-slate-900 dark:text-white">
                            Modernisasi <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-red-500 to-orange-500 drop-shadow-sm">
                                Disposisi Surat.
                            </span>
                        </h2>
                        <p class="max-w-xl text-lg leading-relaxed text-slate-600 dark:text-slate-300 font-medium">
                            Kelola administrasi, pelacakan dokumen, dan disposisi surat secara *real-time* di lingkungan <strong>KPU Provinsi Bengkulu</strong> dengan sistem cerdas dan terenkripsi.
                        </p>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2 max-w-xl z-30">
                        <a href="/admin" class="group relative flex flex-col items-start gap-4 rounded-3xl bg-gradient-to-br from-[#cc1a1e] to-[#991316] p-6 shadow-2xl shadow-red-600/30 transition-all hover:-translate-y-1.5 hover:shadow-red-600/40 overflow-hidden border border-red-500/30">
                            <div class="absolute right-[-10%] top-[-10%] h-32 w-32 rounded-full bg-white/20 blur-2xl transition-all group-hover:scale-150"></div>
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/20 text-white backdrop-blur-sm shadow-inner">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-black text-white">Administrator</h3>
                                <p class="mt-1 text-sm text-red-100/80 font-medium">Manajemen Sistem & Ekspedisi</p>
                            </div>
                        </a>

                        <a href="/user" class="group relative flex flex-col items-start gap-4 rounded-3xl glass-card p-6 shadow-xl transition-all hover:-translate-y-1.5 hover:border-slate-300 dark:hover:border-slate-600 hover:shadow-slate-300/40 dark:hover:shadow-slate-900/50">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-slate-800 dark:bg-slate-800 dark:text-slate-200 transition-colors group-hover:bg-red-100 group-hover:text-red-600 shadow-sm border border-slate-200 dark:border-slate-700">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-black text-slate-900 dark:text-white group-hover:text-red-600 transition-colors">Bagian / Divisi</h3>
                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400 font-medium">Penerimaan & Unduh Surat</p>
                            </div>
                        </a>
                    </div>

                    <div class="pt-8 mt-8 border-t border-slate-200 dark:border-slate-800 flex items-center gap-8">
                        <div>
                            <h4 class="text-3xl font-black text-slate-900 dark:text-white">100<span class="text-red-600">%</span></h4>
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mt-1">Digitalisasi</p>
                        </div>
                        <div class="h-10 w-px bg-slate-200 dark:bg-slate-800"></div>
                        <div>
                            <h4 class="text-3xl font-black text-slate-900 dark:text-white">24<span class="text-red-600">/7</span></h4>
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mt-1">Akses Real-time</p>
                        </div>
                        <div class="h-10 w-px bg-slate-200 dark:bg-slate-800"></div>
                    
                    </div>
                </section>

                <section class="relative hidden lg:block z-20 h-[500px]">
                    
                    <div class="absolute right-0 top-0 w-72 h-64 glass-card rounded-[2rem] p-6 animate-float-delayed opacity-70 scale-90 translate-x-12 translate-y-[-20px] -z-10">
                        <div class="h-4 w-1/2 rounded bg-slate-200 dark:bg-slate-700 mb-6"></div>
                        <div class="flex items-end gap-3 h-32">
                            <div class="w-1/4 bg-red-100 dark:bg-red-900/50 rounded-t-lg h-1/2"></div>
                            <div class="w-1/4 bg-red-300 dark:bg-red-800/60 rounded-t-lg h-3/4"></div>
                            <div class="w-1/4 bg-red-500 dark:bg-red-600 rounded-t-lg h-full"></div>
                            <div class="w-1/4 bg-red-200 dark:bg-red-900/40 rounded-t-lg h-2/3"></div>
                        </div>
                    </div>

                    <div class="absolute left-0 top-10 w-[420px] rounded-[2.5rem] bg-white/95 dark:bg-slate-900/95 border border-slate-200 dark:border-slate-700/80 p-8 shadow-2xl shadow-slate-300/60 dark:shadow-slate-950/80 backdrop-blur-2xl z-10 animate-float">
                        <div class="mb-8 flex items-center justify-between border-b border-slate-100 pb-5 dark:border-slate-800">
                            <div class="flex items-center gap-4">
                                <div class="h-12 w-12 rounded-xl bg-gradient-to-tr from-slate-800 to-slate-900 text-white flex items-center justify-center font-black text-sm shadow-lg shadow-slate-900/20">RPS</div>
                                <div>
                                    <div class="h-3.5 w-28 rounded-full bg-slate-800 dark:bg-slate-200"></div>
                                    <div class="mt-2 h-2.5 w-16 rounded-full bg-slate-300 dark:bg-slate-600"></div>
                                </div>
                            </div>
                            <div class="h-8 w-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                                <div class="h-2 w-2 bg-red-500 rounded-full animate-pulse"></div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="rounded-2xl border border-slate-100 bg-slate-50/50 p-5 shadow-sm dark:border-slate-800 dark:bg-slate-800/50 group hover:border-red-200 transition-colors">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="h-4 w-3/4 rounded-full bg-slate-300 dark:bg-slate-600 group-hover:bg-red-300 transition-colors"></div>
                                    <div class="h-6 w-20 rounded-lg bg-green-100 dark:bg-green-900/30"></div>
                                </div>
                                <div class="h-2.5 w-full rounded-full bg-slate-200 mb-2.5 dark:bg-slate-700"></div>
                                <div class="h-2.5 w-1/2 rounded-full bg-slate-200 dark:bg-slate-700"></div>
                            </div>
                            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-800/50 opacity-60">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="h-4 w-1/2 rounded-full bg-slate-300 dark:bg-slate-600"></div>
                                    <div class="h-6 w-20 rounded-lg bg-orange-100 dark:bg-orange-900/30"></div>
                                </div>
                                <div class="h-2.5 w-full rounded-full bg-slate-200 mb-2.5 dark:bg-slate-700"></div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -right-4 bottom-20 z-30 animate-float-delayed" style="animation-duration: 5s;">
                        <div class="rounded-2xl border border-white/50 bg-white/90 backdrop-blur-lg p-5 shadow-2xl shadow-red-600/10 dark:border-slate-600/50 dark:bg-slate-800/90 flex items-center gap-4">
                            <div class="relative flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-green-400 to-green-600 text-white shadow-lg shadow-green-500/30">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="absolute top-0 right-0 flex h-3 w-3">
                                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                  <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
                                </span>
                            </div>
                            <div>
                                <p class="text-sm font-black text-slate-900 dark:text-white">Surat Diterima</p>
                                <p class="text-[11px] font-bold text-slate-500 dark:text-slate-400">Verifikasi Sukses</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -left-12 top-20 z-30 animate-float" style="animation-duration: 7s;">
                        <div class="rounded-2xl border border-white/50 bg-white/90 backdrop-blur-lg px-4 py-3 shadow-xl shadow-slate-900/5 dark:border-slate-600/50 dark:bg-slate-800/90 flex items-center gap-3">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <p class="text-[11px] font-black text-slate-800 dark:text-white uppercase tracking-wide">Akses Aman</p>
                        </div>
                    </div>

                </section>
            </div>
        </main>

        <footer class="w-full py-6 mt-auto border-t border-slate-200/60 dark:border-slate-800/60 bg-white/40 dark:bg-slate-950/40 backdrop-blur-md relative z-20">
            <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-xs font-bold text-slate-500 dark:text-slate-400 tracking-wide">
                    &copy; {{ date('Y') }} KOMISI PEMILIHAN UMUM PROVINSI BENGKULU.
                </p>
                <div class="flex gap-4">
                    <span class="text-xs font-semibold text-slate-400">E-DISPOS </span>
                    <span class="text-xs font-semibold text-slate-400">|</span>
                    <span class="text-xs font-semibold text-slate-400 flex items-center gap-1">
                        <span class="h-2 w-2 rounded-full bg-green-500"></span> Sistem Online
                    </span>
                </div>
            </div>
        </footer>

    </body>
</html>