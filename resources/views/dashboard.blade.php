<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight ">
            {{ __('New Products') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden md:px-4">
                <section
                    class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center md:gap-y-20 gap-x-14 mb-5">

                    @foreach ($products as $product)
                        <!--   ✅ Product card 1 - Starts Here 👇 -->
                        <div class="md:w-72 w-full bg-white shadow-md rounded-xl duration-500  hover:shadow-xl">
                            <a href="/product/{{ $product->id }}">
                                <img src="{{ "storage".$product->image->path }}"
                                    alt="Product" class="md:h-80 md:w-72 aspect-square object-cover rounded-t-xl" />
                                <div class="px-4 py-3 w-72">
                                    <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product->productType->name }}</span>
                                    <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
                                    <div class="flex items-center">
                                        <p class="text-lg font-semibold text-black cursor-auto my-3">₱{{ $product->price }}</p>
                         
                                        <div class="ml-auto"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
   

                </section>
            </div>
        </div>
    </div>
</x-app-layout>

@section('title', "Dashboard")
    
