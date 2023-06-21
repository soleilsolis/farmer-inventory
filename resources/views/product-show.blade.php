@php
    use App\Models\User;
    $admin = \App\Models\User::find(\Illuminate\Support\Facades\Auth::id())->admin;
@endphp

<x-app-layout>
    <x-slot name="header">
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
              <li class="inline-flex items-center">
                <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                  <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                  Dashboard
                </a>
              </li>
              <li>
                <div class="flex items-center">
                  <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                  <a href="/products" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Products</a>
                </div>
              </li>
              <li aria-current="page">
                <div class="flex items-center">
                  <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                  <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ __($product->name) }}</span>
                </div>
              </li>
            </ol>
          </nav>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
            <div class="rounded-xl bg-gray-50 py-10 shadow-lg">
                <div class="grid md:grid-cols-2 grid-cols-1 md:gap-5 gap-y-10">
                    <div>
                        <img class="aspect-square rounded-xl md:w-[70%] mx-auto object-cover"
                            src="{{ $variant ? "/storage".$variant->image->path : '/storage' . $product->image->path }}" alt="">
                    </div>
                    <div class="px-4">
                        <h1 class="font-medium text-3xl text-gray-800 leading-tight ">
                            {{ __($product->name) }} 
    
                            @if ($variant)
                                - {{ __($variant->name) }} 
                            @endif
                        </h1>
    
                        <div class="my-5 text-4xl font-bold">₱{{  number_format($variant ? $variant->price : $product->price, 2) }}</div>
                        <div class="my-5 font-medium">
                            Category: 
                            <a href="/productType/{{ $product->productType->id }}" class="text-blue-400">{{ $product->productType->name }}</a>
                        </div>
    
                        @if (!$variant)
                            <div class="flex flex-row flex-wrap mt-10">
                                @foreach ($product->variants as $variant)
                                    <a href="/product/{{ $product->id }}/variant/{{ $variant->id }}">
                                        <img class="w-16 aspect-square object-cover" src="/{{ "storage".$variant->image->path }}" alt="">
                                    </a>
                                @endforeach
                            </div>
                        @endif
    
                        <div class="my-5 font-medium">
                            Description: 
                        </div>
                        <p>
                            {{ $product->description }}
                        </p>

                        <div class="my-5 font-medium">
                            Advice: 
                        </div>
                        <p>
                            {{ $product->advice }}
                        </p>
    
                        @if (\App\Models\User::find(\Illuminate\Support\Facades\Auth::id())->admin)
                            <div class="mt-4">
                               <x-button class="mt-1" onclick="location.href='/product/{{ $product->id }}/edit'">Edit</x-button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <h2 class="font-medium text-xl text-gray-800 leading-tight mb-5 mt-10 ">Other Products</h2>
            <div class="overflow-hidden px-4">
                <section class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center md:gap-y-20 gap-y-10 md:gap-x-14 mb-5">

                    @foreach ($productsRandom as $product)
                        <!--   ✅ Product card 1 - Starts Here 👇 -->
                        <div class="md:w-72 w-full bg-white shadow-md rounded-xl duration-500  hover:shadow-xl">
                            <a href="/product/{{ $product->id }}">
                                <img src="/{{ 'storage' . $product->image->path }}" alt="Product"
                                    class="md:h-80 md:w-72 aspect-square object-cover rounded-t-xl" />
                                <div class="px-4 py-3 w-72">
                                    <span
                                        class="text-gray-400 mr-3 uppercase text-xs">{{ $product->productType->name }}</span>
                                    <p class="text-lg font-bold text-black truncate block capitalize">
                                        {{ $product->name }}</p>
                                    <div class="flex items-center">
                                        <p class="text-lg font-semibold text-black cursor-auto my-3">
                                            ₱{{ $product->price }}</p>
                                      
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </section>
            </div>
        </div>
    </div>

    <script>
        function show(result) {
            document.getElementById("toast-success").classList.remove("hidden", "opacity-0");
        }

        function destroy(result) {
            location.href = "/products";
        }
    </script>
</x-app-layout>
