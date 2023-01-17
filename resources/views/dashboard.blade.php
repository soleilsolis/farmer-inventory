<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Latest Products') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden px-4">
                <section
                    class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">

                    @foreach ($products as $product)
                        <!--   ✅ Product card 1 - Starts Here 👇 -->
                        <div class="w-72 bg-white shadow-md rounded-xl duration-500  hover:shadow-xl">
                            <a href="/product/{{ $product->id }}">
                                <img src="https://images.unsplash.com/photo-1646753522408-077ef9839300?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NjZ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                                <div class="px-4 py-3 w-72">
                                    <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product->productType->name }}</span>
                                    <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
                                    <div class="flex items-center">
                                        <p class="text-lg font-semibold text-black cursor-auto my-3">₱149</p>
                                        <del>
                                            <p class="text-sm text-gray-600 cursor-auto ml-2">₱199</p>
                                        </del>
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
    
