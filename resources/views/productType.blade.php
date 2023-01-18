<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __($productType->name) }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
            <form class="md:w-[50%] submit-form"
                data-method="POST"
                data-action="/productType/{{ $productType->id }}"
                data-callback="show"
            >
                <x-field id="name" name="name" type="text" label="Name" value="{{ __($productType->name) }}"></x-field>   
                <x-button type="submit">Save</x-button>
            </form>

            <div class="overflow-hidden px-4">
                <section
                    class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">

                    @foreach ($productType->products as $product)
                        <!--   ✅ Product card 1 - Starts Here 👇 -->
                        <div class="w-72 bg-white shadow-md rounded-xl duration-500  hover:shadow-xl">
                            <a href="/product/{{ $product->id }}">
                                <img src="https://images.unsplash.com/photo-1646753522408-077ef9839300?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NjZ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                                <div class="px-4 py-3 w-72">
                                    <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product->productType->name }}</span>
                                    <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
                                    <div class="flex items-center">
                                        <p class="text-lg font-semibold text-black cursor-auto my-3">₱{{ $product->price }}</p>
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

           
                <div id="toast-success" class="hidden flex items-center w-full max-w-xs mt-5 p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 transition-opacity duration-300 ease-out opacity-0 hidden" role="alert">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ml-3 text-sm font-normal">Saved successfully.</div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
        
        </div>
    </div>

     <script>
        function show(result)
        {
            document.getElementById("toast-success").classList.remove("hidden", "opacity-0");
        }
    </script>
</x-app-layout>

