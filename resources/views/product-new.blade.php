<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight ">
            {{ __("New Product") }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
            <form class="md:w-[50%] submit-form"
                data-method="POST"
                data-action="/products"
                data-callback="show"
            >
                <x-field id="name" name="name" type="text" label="Name" ></x-field>   
                <x-field id="price" name="price" type="number" label="Price" ></x-field>  
                <x-field id="image" name="image" type="file" label="Image" ></x-field>   

                <x-field id="product_type_id" name="product_type_id" type="select" label="Product Type" >
                    @foreach ($productTypes as $productType)
                        <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                    @endforeach
                </x-field>   

                <x-field id="description" name="description" type="text" label="Description" ></x-field>   
                <x-button type="submit">Save</x-button>
            </form>
        </div>
    </div>

     <script>
        function show(result){
            location.href= `/product/${result.data.id}`;
        }
    </script>
</x-app-layout>

