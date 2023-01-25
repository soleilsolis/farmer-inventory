<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight ">
            {{ __($product->name . ' - New Variant') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
            <form class=" submit-form grid md:grid-cols-2 md:gap-10 grid-cols-1 gap-y-5" data-method="POST"
                data-action="/variants" data-callback="show" data-callback="show">
                <div class="md:order-first order-last">

                    <x-field id="product_id" name="product_id" type="hidden" value="{{ $product->id }}"></x-field>
                    <x-field id="name" name="name" type="text" label="Name"></x-field>
                    <x-field id="price" name="price" type="number" label="Price"></x-field>
                    <x-field id="image" name="image" type="file" label="Image"></x-field>

                    <x-button type="submit">Save</x-button>
                </div>
            </form>


        </div>
    </div>

    <script>
        function show(result) {

            location.href = `/product/${result.data.product_id}/edit`;
        }
    </script>
</x-app-layout>
