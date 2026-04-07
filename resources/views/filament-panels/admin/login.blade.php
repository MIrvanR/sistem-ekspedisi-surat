@extends('filament-panels::layout')

@section('content')
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900" rel="stylesheet" />

<style>
    .font-inter { font-family: 'Inter', sans-serif; }
    
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

    /* Efek Kaca (Glassmorphism) */
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
    
    /* Animasi Melayang Halus */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    .animate-float { animation: float 6s ease-in-out infinite; }
</style>

<div class="relative min-h-screen flex items-center justify-center px-4 py-12 font-inter overflow-hidden bg-slate-50 dark:bg-slate-950">
    
    <div class="absolute inset-0 z-[1] bg-grid mask-image:linear-gradient(to_bottom,transparent,black)"></div>
    <div class="absolute inset-0 z-[2] pointer-events-none overflow-hidden flex items-center justify-center">
        <div class="absolute w-[40rem] h-[40rem] bg-red-600/15 rounded-full blur-[100px] dark:bg-red-600/20"></div>
    </div>

    <div class="absolute bottom-0 left-0 w-full overflow-hidden z-[2] pointer-events-none opacity-30 dark:opacity-[0.15] flex justify-center">
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

    <div class="w-full max-w-md relative z-10 animate-float">
        <div class="glass-card rounded-[2.5rem] shadow-2xl shadow-slate-300/50 dark:shadow-slate-950/80 p-8 sm:p-10 border border-slate-200/80 dark:border-slate-700/80">
            
            <div class="text-center mb-8">
                <div class="relative inline-block mb-4">
                    <div class="absolute -inset-2 rounded-full bg-red-500 blur-md opacity-20"></div>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/KPU_Logo.svg" alt="Logo KPU" class="relative h-16 w-16 mx-auto drop-shadow-md">
                </div>
                <div class="inline-flex items-center justify-center gap-2 mb-2">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-red-600"></span>
                    </span>
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Panel Administrator</p>
                </div>
                <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">
                    Login <span class="text-red-600">Admin</span>
                </h2>
                <p class="mt-1 text-sm font-medium text-slate-600 dark:text-slate-400">E-DISPOS KPU Provinsi Bengkulu</p>
            </div>

            <form method="POST" action="{{ route('filament.admin.auth.login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Alamat Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        required
                        value="{{ old('email') }}"
                        class="block w-full rounded-xl border border-slate-300/80 bg-white/50 px-4 py-3 text-sm shadow-sm backdrop-blur-sm transition-all focus:border-red-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-500/20 dark:border-slate-700/80 dark:bg-slate-900/50 dark:text-white dark:focus:border-red-500 dark:focus:bg-slate-900 placeholder:text-slate-400"
                        placeholder="admin@kpu.bengkulu.go.id"
                    >
                    @error('email')
                        <p class="mt-2 text-xs font-semibold text-red-600 flex items-center gap-1">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">Kata Sandi</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="block w-full rounded-xl border border-slate-300/80 bg-white/50 px-4 py-3 text-sm shadow-sm backdrop-blur-sm transition-all focus:border-red-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-red-500/20 dark:border-slate-700/80 dark:bg-slate-900/50 dark:text-white dark:focus:border-red-500 dark:focus:bg-slate-900 placeholder:text-slate-400"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <p class="mt-2 text-xs font-semibold text-red-600 flex items-center gap-1">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            id="remember"
                            name="remember"
                            type="checkbox"
                            class="h-4 w-4 rounded border-slate-300 text-red-600 focus:ring-red-500 dark:border-slate-600 dark:bg-slate-900 dark:ring-offset-slate-900"
                        >
                        <label for="remember" class="ml-2 block text-sm font-medium text-slate-600 dark:text-slate-400">Ingat saya</label>
                    </div>
                </div>

                <button
                    type="submit"
                    class="group relative w-full flex justify-center items-center gap-2 py-3 px-4 rounded-xl text-sm font-bold text-white bg-gradient-to-br from-[#cc1a1e] to-[#991316] hover:from-[#e61d22] hover:to-[#b3171a] shadow-lg shadow-red-600/30 hover:shadow-red-600/40 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all hover:-translate-y-0.5 overflow-hidden"
                >
                    <div class="absolute inset-0 w-full h-full bg-white/20 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-300 ease-out"></div>
                    <span class="relative z-10">Otorisasi Masuk</span>
                    <svg class="h-4 w-4 relative z-10 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </form>

            <div class="mt-8 text-center border-t border-slate-200/60 dark:border-slate-700/60 pt-6">
                <a href="/" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-red-600 dark:text-slate-400 dark:hover:text-red-400 transition-colors">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda Utama
                </a>
            </div>
        </div>
        
        <p class="text-center text-[10px] font-semibold text-slate-400 dark:text-slate-500 mt-6 tracking-wide uppercase">
            Sistem Informasi Terintegrasi &copy; {{ date('Y') }}
        </p>
    </div>
</div>
@endsection