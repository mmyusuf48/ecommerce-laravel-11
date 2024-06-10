<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.product.update', $product['id']) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4" >
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full" value="{{ old('name', $product['name']) }}">
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Price</label>
                            <input type="text" name="price" id="price" class="mt-1 block w-full" value="{{ old('price', $product['price']) }}">
                        </div>
                        <div class="mb-4">
                            <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Stock</label>
                            <input type="text" name="stock" id="stock" class="mt-1 block w-full" value="{{ old('stock', $product['stock']) }}">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="py-2 px-4 bg-teal-500 hover:bg-teal-700 rounded-sm text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
