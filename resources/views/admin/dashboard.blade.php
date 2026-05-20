@extends('admin.layouts.admin')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-500 text-sm mt-1">Welcome back to Soma Eatery Admin Panel</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Menus</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalMenus }}</p>
                </div>
                <span class="text-4xl">🍜</span>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Categories</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalCategories }}</p>
                </div>
                <span class="text-4xl">📂</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h2>
        <div class="flex gap-4">
            <a href="{{ route('admin.menus.create') }}"
                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                + Add New Menu
            </a>
            <a href="{{ route('admin.categories.create') }}"
                class="bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 px-4 py-2 rounded-lg text-sm font-medium transition">
                + Add Category
            </a>
        </div>
    </div>
@endsection
