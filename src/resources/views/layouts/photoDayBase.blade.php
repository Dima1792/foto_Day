<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Проектие для Толище')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com" rel="stylesheet">
    <style>
body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col">

    <nav class="bg-white shadow-sm border-b border-slate-200">
        <div class="max-w-5xl mx-auto px-4 h-16 flex items-center justify-between">
            <span class="text-xl font-bold tracking-tight text-indigo-600">Ave  Толику</span>
            <div class="flex items-center gap-6">
                <a href="/" class="text-slate-600 hover:text-indigo-600 transition">Главная</a>
                @stack('actions')
            </div>
        </div>
    </nav>


    <main class="flex-grow py-10">
        <div class="max-w-5xl mx-auto px-4">
@yield('content')
    </div>
    </main>


    <footer class="bg-white border-t border-slate-200 py-6 text-center text-slate-500 text-sm">
        &copy; {{ date('Y') }} Управленческая система управления мероприятиями и контроля их управления
</footer>

</body>
</html>
