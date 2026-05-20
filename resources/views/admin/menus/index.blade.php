@extends('admin.layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Menus</h1>
        <a href="{{ route('admin.menus.create') }}"
            class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
            + Add Menu
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="text-left px-6 py-3 text-gray-500 font-medium">Image</th>
                    <th class="text-left px-6 py-3 text-gray-500 font-medium">Name</th>
                    <th class="text-left px-6 py-3 text-gray-500 font-medium">Category</th>
                    <th class="text-left px-6 py-3 text-gray-500 font-medium">Price</th>
                    <th class="text-left px-6 py-3 text-gray-500 font-medium">Status</th>
                    <th class="text-left px-6 py-3 text-gray-500 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($menus as $menu)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            @if ($menu->image)
                                <img src="{{ Storage::url($menu->image) }}" class="w-12 h-12 object-cover rounded-lg">
                            @else
                                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-xl">🍽
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $menu->name }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $menu->category->name }}</td>
                        <td class="px-6 py-4 text-gray-800">Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            @if ($menu->is_available)
                                <span
                                    class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Available</span>
                            @else
                                <span
                                    class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-medium">Unavailable</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.menus.edit', $menu) }}"
                                    class="text-blue-500 hover:text-blue-700 font-medium">Edit</a>
                                <form method="POST" action="{{ route('admin.menus.destroy', $menu) }}"
                                    onsubmit="return confirm('Delete this menu?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-400">No menus yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
