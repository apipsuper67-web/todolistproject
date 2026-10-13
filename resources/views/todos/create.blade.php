@extends('layouts.app')

@section('title', 'Tambah Tugas')

@section('content')

<!-- Header Form -->
<div class="border-b border-slate-800/80 pb-6 mb-6">
    <div class="flex items-center gap-4">
        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-500/10 border border-indigo-500/20 text-2xl font-semibold text-indigo-400 shrink-0">
            +
        </div>

        <div>
            <p class="text-xs font-semibold tracking-wider text-indigo-400 uppercase">WORKSPACE / TASKS</p>
            <h1 class="mt-0.5 text-2xl font-bold tracking-tight text-white">
                Tambah Tugas
            </h1>
            <p class="mt-1 text-sm text-slate-400">
                Buat tugas baru dan atur aktivitasmu dengan lebih mudah.
            </p>
        </div>
    </div>
</div>

<!-- Form Container -->
<div class="max-w-3xl">

    <form action="{{ route('todos.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Judul -->
        <div>
            <label for="title" class="mb-2 block text-sm font-semibold text-slate-200">
                Judul Tugas
                <span class="text-rose-400">*</span>
            </label>

            <input
                id="title"
                name="title"
                type="text"
                maxlength="255"
                value="{{ old('title') }}"
                placeholder="Contoh: Belajar Laravel"
                required
                class="w-full rounded-xl border border-slate-700/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-100 outline-none transition placeholder:text-slate-600 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
            >

            @error('title')
                <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror

            <p class="mt-2 text-xs text-slate-500">
                Masukkan judul tugas yang singkat dan jelas.
            </p>
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="description" class="mb-2 block text-sm font-semibold text-slate-200">
                Deskripsi
                <span class="font-normal text-slate-500">(Opsional)</span>
            </label>

            <textarea
                id="description"
                name="description"
                rows="5"
                maxlength="5000"
                placeholder="Jelaskan detail tugas yang ingin kamu kerjakan..."
                class="w-full resize-y rounded-xl border border-slate-700/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-100 outline-none transition placeholder:text-slate-600 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
            >{{ old('description') }}</textarea>

            @error('description')
                <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror

            <p class="mt-2 text-xs text-slate-500">
                Maksimal 5.000 karakter.
            </p>
        </div>

        <!-- Status Checkbox Card -->
        <div class="rounded-xl border border-slate-800 bg-slate-950/40 p-4 transition hover:border-slate-700/80">
            <label for="is_completed" class="flex cursor-pointer items-start gap-3">
                <input
                    id="is_completed"
                    type="checkbox"
                    name="is_completed"
                    value="1"
                    @checked(old('is_completed', false))
                    class="mt-1 h-4 w-4 rounded border-slate-700 bg-slate-900 text-indigo-500 focus:ring-2 focus:ring-indigo-500/30 focus:ring-offset-0"
                >

                <span>
                    <span class="block text-sm font-semibold text-slate-200">
                        Tandai sebagai selesai
                    </span>
                    <span class="mt-0.5 block text-xs text-slate-400">
                        Centang jika tugas ini sebenarnya sudah diselesaikan.
                    </span>
                </span>
            </label>
        </div>

        <!-- Buttons Action -->
        <div class="flex flex-col-reverse gap-3 border-t border-slate-800/80 pt-6 sm:flex-row sm:justify-end">

            <a
                href="{{ route('todos.index') }}"
                class="inline-flex items-center justify-center rounded-xl border border-slate-700/80 bg-slate-800/50 px-5 py-2.5 text-sm font-semibold text-slate-300 transition hover:bg-slate-800 hover:text-white"
            >
                Batal
            </a>

            <button
                type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500 hover:shadow-indigo-500/30 focus:outline-none focus:ring-2 focus:ring-indigo-500/40"
            >
                <span>✓</span>
                Simpan Tugas
            </button>

        </div>
    </form>

</div>

@endsection
