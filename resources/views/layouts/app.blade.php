<!DOCTYPE html>
<html lang="id" class="h-full dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Daftar Tugas') — Todo App</title>

    <!-- Font Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>

<body class="h-full flex flex-col font-sans bg-slate-950 text-slate-100 antialiased selection:bg-indigo-500 selection:text-white">

    <!-- Top Navigation Header -->
    <header class="bg-slate-900/80 border-b border-slate-800/80 sticky top-0 z-30 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Brand / Logo -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('todos.index') }}" class="flex items-center gap-3 group">
                        <div class="w-9 h-9 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-semibold shadow-lg shadow-indigo-500/20 group-hover:bg-indigo-500 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-white text-base tracking-tight leading-tight group-hover:text-indigo-400 transition-colors">Todo Workspace</span>
                            <span class="text-[11px] text-slate-400 font-medium">Laravel 13 · SQLite</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('todos.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-300 hover:text-white px-3.5 py-2 rounded-xl bg-slate-800/50 hover:bg-slate-800 border border-slate-700/50 transition">
                        <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        Semua Tugas
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Flash Message: Success -->
        @if (session('success'))
        <div role="status" class="mb-6 p-4 rounded-xl bg-emerald-950/40 border border-emerald-800/60 text-emerald-300 flex items-start gap-3 shadow-lg shadow-emerald-950/20 backdrop-blur-sm">
            <div class="p-1 bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 rounded-lg shrink-0 mt-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div class="text-sm">
                <p class="font-semibold text-emerald-200">Berhasil</p>
                <p class="text-emerald-400/90 mt-0.5">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        <!-- Flash Message: Validation Errors -->
        @if ($errors->any())
        <div role="alert" class="mb-6 p-4 rounded-xl bg-rose-950/40 border border-rose-800/60 text-rose-300 shadow-lg shadow-rose-950/20 backdrop-blur-sm">
            <div class="flex items-center gap-2 mb-2">
                <div class="p-1 bg-rose-500/20 text-rose-400 border border-rose-500/30 rounded-lg shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <strong class="font-semibold text-sm text-rose-200">Periksa kembali isianmu:</strong>
            </div>
            <ul class="list-disc list-inside text-sm text-rose-400/90 space-y-1 pl-7">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Main Workspace Card -->
        <div class="bg-slate-900/60 rounded-2xl border border-slate-800/80 shadow-xl p-6 sm:p-8 backdrop-blur-sm">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900/40 border-t border-slate-800/80 py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400">
            <div class="flex items-center space-x-2">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="font-medium text-slate-300">Latihan CRUD Laravel 13</span>
            </div>
            <div>
                Teknologi: <span class="font-semibold text-slate-300">Blade Engine · SQLite Database</span>
            </div>
        </div>
    </footer>

</body>

</html>
