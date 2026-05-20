<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma Eatery</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-stone-50 text-gray-800">

    {{-- Navbar --}}
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <span class="text-2xl font-bold text-orange-500">🍽 Soma Eatery</span>
            <div class="flex gap-4 items-center">
                <a href="#menu" class="text-sm text-gray-600 hover:text-orange-500 transition">Menu</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}"
                        class="text-sm bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition">
                        Admin Panel
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-sm bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-orange-50 to-stone-100 py-20">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold text-gray-800 mb-4">Welcome to <span class="text-orange-500">Soma
                    Eatery</span></h1>
            <p class="text-gray-500 text-lg mb-8">Fresh ingredients, bold flavors, unforgettable experience.</p>
            <a href="#menu"
                class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-full text-sm font-medium transition shadow-lg">
                Explore Our Menu
            </a>
        </div>
    </section>

    {{-- Category Filter --}}
    <section id="menu" class="max-w-6xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Menu</h2>

        <div class="flex gap-3 flex-wrap justify-center mb-10">
            <button onclick="filterCategory('all')"
                class="category-btn active px-5 py-2 rounded-full text-sm font-medium border border-orange-500 bg-orange-500 text-white transition">
                All
            </button>
            @foreach ($categories as $category)
                <button onclick="filterCategory('{{ $category->slug }}')"
                    class="category-btn px-5 py-2 rounded-full text-sm font-medium border border-gray-200 text-gray-600 hover:border-orange-500 hover:text-orange-500 transition">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        {{-- Menu Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($menus as $menu)
                <div class="menu-card bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-md transition"
                    data-category="{{ $menu->category->slug }}">
                    @if ($menu->image)
                        <img src="{{ url($menu->image) }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-orange-50 flex items-center justify-center text-5xl">🍽</div>
                    @endif
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-gray-800">{{ $menu->name }}</h3>
                            <span class="text-orange-500 font-bold text-sm">Rp
                                {{ number_format($menu->price, 0, ',', '.') }}</span>
                        </div>
                        <p class="text-gray-400 text-sm mb-3">{{ $menu->description ?? '' }}</p>
                        <span
                            class="text-xs bg-orange-50 text-orange-500 px-3 py-1 rounded-full">{{ $menu->category->name }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16 text-gray-400">
                    <p class="text-4xl mb-3">🍽</p>
                    <p>No menu available yet.</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-white border-t border-gray-100 py-8 mt-12">
        <div class="max-w-6xl mx-auto px-6 text-center text-gray-400 text-sm">
            © 2025 Soma Eatery. All rights reserved.
        </div>
    </footer>

    <script>
        function filterCategory(slug) {
            const cards = document.querySelectorAll('.menu-card');
            const buttons = document.querySelectorAll('.category-btn');

            buttons.forEach(btn => {
                btn.classList.remove('bg-orange-500', 'text-white', 'border-orange-500');
                btn.classList.add('border-gray-200', 'text-gray-600');
            });

            event.target.classList.add('bg-orange-500', 'text-white', 'border-orange-500');
            event.target.classList.remove('border-gray-200', 'text-gray-600');

            cards.forEach(card => {
                if (slug === 'all' || card.dataset.category === slug) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>

</body>

</html>
