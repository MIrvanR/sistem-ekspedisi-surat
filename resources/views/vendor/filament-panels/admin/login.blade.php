@extends('filament-panels::layout')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-white via-slate-100 to-slate-200 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950 flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md space-y-8">
        <!-- Header -->
        <div class="text-center">
            <div class="inline-flex items-center gap-3 rounded-full bg-white px-4 py-3 text-sm font-medium text-slate-700 shadow-sm dark:bg-slate-800 dark:text-slate-200 mb-6">
                <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-amber-600 text-white">A</span>
                <span>E-DISPOS KPU PROVINSI BENGKULU - ADMIN</span>
            </div>
            <h2 class="text-3xl font-semibold text-slate-950 dark:text-white">Masuk sebagai Admin</h2>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Kelola sistem disposisi surat</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-lg p-8">
            <form method="POST" action="{{ route('filament.admin.auth.login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        required
                        value="{{ old('email') }}"
                        class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500 dark:border-slate-600 dark:bg-slate-800 dark:text-white"
                        placeholder="Masukkan email Anda"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500 dark:border-slate-600 dark:bg-slate-800 dark:text-white"
                        placeholder="Masukkan password Anda"
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input
                        id="remember"
                        name="remember"
                        type="checkbox"
                        class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-slate-300 rounded dark:border-slate-600"
                    >
                    <label for="remember" class="ml-2 block text-sm text-slate-700 dark:text-slate-300">Ingat saya</label>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition"
                >
                    Masuk
                </button>
            </form>

            <!-- Back to Home -->
            <div class="mt-6 text-center">
                <a href="/" class="text-sm text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-200">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection