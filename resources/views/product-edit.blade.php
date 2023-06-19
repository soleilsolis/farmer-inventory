<x-app-layout>
    <x-slot name="header">
        <h2 id="product-name" class="font-semibold text-2xl text-gray-800 leading-tight ">
            {{ __($product->name) }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
            <form class=" submit-form grid md:grid-cols-2 md:gap-10 grid-cols-1 gap-y-5" data-method="POST"
                data-action="/product/{{ $product->id }}" data-callback="show">
                <div class="md:order-first order-last">
                    <x-field id="name" name="name" type="text" label="Name" value="{{ __($product->name) }}">
                    </x-field>
                    <x-field id="price" name="price" type="number" label="Price"
                        value="{{ __($product->price) }}"></x-field>
                    <x-field id="product_type_id" name="product_type_id" type="select" label="Product Type"
                        value="{{ __($product->productType->id) }}">
                        @foreach ($productTypes as $productType)
                            <option value="{{ $productType->id }}" @if ($product->productType->id == $productType->id) selected @endif>
                                {{ $productType->name }}</option>
                        @endforeach
                    </x-field>

                    <x-field id="image" name="image" type="file" label="Image" value=""></x-field>

                    <x-field id="description" name="description" type="text" label="Description"
                        value="{{ __($product->description) }}"></x-field>
                    <x-button type="submit">Save</x-button>
                </div>

                <div>
                    <img class="aspect-square rounded-xl md:w-[70%] mx-auto object-cover"
                        src="{{ '/storage' . $product->image->path }}" alt="">
                </div>
            </form>

            <form id="dropdown" data-method="DELETE" data-action="/product/{{ $product->id }}"
                data-callback="destroy" class="submit-form inline">

                <x-button-danger type="submit">Delete</x-button-danger>
            </form>

            <div id="toast-success"
                class="hidden flex items-center w-full max-w-xs mt-5 p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 transition-opacity duration-300 ease-out opacity-0 hidden"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">Saved successfully.</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            
            <div class="mt-10 mb-5">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight ">
                    {{ __("Variants") }}
                </h2>
    
                <div class="mt-4">
                    <x-button class="mt-1" onclick="location.href='/product/{{ $product->id }}/variant/new'">+</x-button>
        
                </div>
            </div>
            
            <x-table>
                <x-slot:thead>
                    <x-th key="1">ID</x-th>
                    <x-th>Name</x-th>
                    <x-th>Type</x-th>
                    <x-th>Price</x-th>
                </x-slot>
                <x-slot:tbody>
    
                    @foreach ($product->variants as $variant)
                        <x-tr link="/variant/{{ $variant->id }}/edit">
                            <x-td>{{ $variant->id }}</x-td>
                            <x-td>
                                {{ $variant->name }}
                            </x-td>
                            <x-td>{{ $product->productType->name }}</x-td>
                            <x-td>₱{{ $variant->price }}</x-td>
                        </x-tr>
                    @endforeach
                </x-slot>
            </x-table>

        </div>
    </div>

    <script>
        function show (result) {
            document.getElementById("product-name").innerHTML = result.name;
            document.getElementById("toast-success").classList.remove("hidden", "opacity-0");
        }

        function destroy() {
            location.href = "/products";
        }
    </script>
</x-app-layout>
