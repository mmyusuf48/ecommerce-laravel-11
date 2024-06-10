<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.product.store') }}" class=" px-8 pt-6 pb-8 mb-4">
                        @csrf
                        <div class="mb-4">
                          <label class="block text-gray-700 text-sm font-bold mb-2" >
                            Product Name
                          </label>
                          <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="product name">
                        </div>
                        <div class="mb-4">
                          <label class="block text-gray-700 text-sm font-bold mb-2" >
                            Product Price
                          </label>
                          <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" name="price" type="text" placeholder="product price">
                        </div>
                        <div class="mb-4">
                          <label class="block text-gray-700 text-sm font-bold mb-2" >
                            Stock
                          </label>
                          <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="stock" name="stock" type="text" placeholder="stock">
                        </div>
                        <div class="flex items-center justify-end">
                          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Save
                          </button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
