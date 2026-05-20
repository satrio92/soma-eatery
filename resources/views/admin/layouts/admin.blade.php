<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma Eatery - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-6">
                    <span class="text-xl font-bold text-orange-500">🍽 Soma Eatery</span>
                    <a href="{{ route('admin.dashboard') }}"
                        class="text-sm text-gray-600 hover:text-orange-500">Dashboard</a>
                    <a href="{{ route('admin.categories.index') }}"
                        class="text-sm text-gray-600 hover:text-orange-500">Categories</a>
                    <a href="{{ route('admin.menus.index') }}"
                        class="text-sm text-gray-600 hover:text-orange-500">Menus</a>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-500 hover:text-red-700">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>

</body>

</html>
