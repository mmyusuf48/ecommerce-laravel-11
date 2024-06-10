<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cart list') }}
        </h2>
    </x-slot>

    <div class="mx-6 mt-4 ">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 5.652a.5.5 0 00-.705-.705L10 8.59 6.357 4.947a.5.5 0 10-.705.705L9.29 10l-3.638 3.642a.5.5 0 00.705.705L10 11.41l3.643 3.638a.5.5 0 00.705-.705L10.707 10l3.641-3.641z"/></svg>
                </span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 5.652a.5.5 0 00-.705-.705L10 8.59 6.357 4.947a.5.5 0 10-.705.705L9.29 10l-3.638 3.642a.5.5 0 00.705.705L10 11.41l3.643 3.638a.5.5 0 00.705-.705L10.707 10l3.641-3.641z"/></svg>
                </span>
            </div>
        @endif

    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-8">
                @if (count($cartItems) > 0)
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex">
                        <div class="w-3/4 pr-4">
                            @foreach ($cartItems as $cartItem)
                                <div class="mb-4 border border-gray-200 rounded-md p-4 grid grid-cols-2">
                                    <div class="flex gap-8">
                                        <img src="https://img.ws.mms.shopee.co.id/ccf509eab1949567f49068a34d1f5481" class="w-24" alt="">
                                        <div class="">
                                            <h2 class="text-lg font-semibold">{{ $cartItem['product']['name'] }}</h2>
                                            <p class="text-gray-600 mt-1">Price : Rp. {{ $cartItem['product']['price'] }}</p>
                                            <p class="text-gray-600 mt-1">Quantity: {{ $cartItem['quantity'] }}</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <form action="{{ route('cart.remove', $cartItem['product']['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-2">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="w-1/4 border  border-gray-200 rounded-md p-4 flex flex-col justify-between" >
                            Total price : Rp. {{ $totalPrice }}
                            <x-nav-link :href="route('cart.finish')" class="cursor-pointer bg-green-600 hover:bg-green-700 py-3 px-4 text-white rounded-sm flex items-center justify-center">
                                Finish transaction
                            </x-nav-link>
                        </div>
                    </div>
                @else
                    <div class="m-24 flex justify-center">
                        Oops, looks like your carts is empty
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
