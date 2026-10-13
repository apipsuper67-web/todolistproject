@extends('layouts.app')

@section('title', 'Daftar Tugas')

@section('content')

    <!-- Header & Action Button -->
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-white sm:text-3xl">
                Daftar Tugas
            </h1>
            <p class="mt-2 text-sm text-slate-400">
                Kelola aktivitas dan selesaikan tugasmu satu per satu.
            </p>
        </div>

        <a href="{{ route('todos.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500 hover:shadow-indigo-500/30">
            <span class="text-lg leading-none">+</span>
            Tambah Tugas
        </a>
    </div>

    <!-- Table Container -->
    <div class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-900/40 backdrop-blur-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-slate-800 bg-slate-900/80 text-xs uppercase tracking-wider text-slate-400">
                    <tr>
                        <th class="px-5 py-4">No.</th>
                        <th class="px-5 py-4">Nama Tugas</th>
                        <th class="px-5 py-4">Status</th>
                        <th class="px-5 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-800/60">
                    @forelse ($todos as $todo)
                        <tr class="transition hover:bg-slate-800/40">
                            <td class="px-5 py-4 text-slate-400">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4 font-medium text-slate-200">
                                {{ $todo->title }}
                            </td>

                            <td class="px-5 py-4">
                                @if (isset($todo->is_completed) && $todo->is_completed)
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-950/60 border border-emerald-800/60 px-3 py-1 text-xs font-semibold text-emerald-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        Selesai
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-950/60 border border-amber-800/60 px-3 py-1 text-xs font-semibold text-amber-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                        Belum selesai
                                    </span>
                                @endif
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('todos.edit', $todo) }}"
                                       class="rounded-lg px-2.5 py-1 text-xs font-semibold text-indigo-400 hover:bg-indigo-950/50 hover:text-indigo-300 transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('todos.destroy', $todo) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="rounded-lg px-2.5 py-1 text-xs font-semibold text-rose-400 hover:bg-rose-950/50 hover:text-rose-300 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center">
                                <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-slate-800/60 text-2xl border border-slate-700/50 mb-3">
                                    📝
                                </div>
                                <p class="font-semibold text-slate-300">
                                    Belum ada tugas
                                </p>
                                <p class="mt-1 text-sm text-slate-500">
                                    Tambahkan tugas pertamamu untuk mulai menggunakan aplikasi.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
