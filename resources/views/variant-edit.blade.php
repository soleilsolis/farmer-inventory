<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight ">
            {{ __($variant->product->name . " - {$variant->name}") }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
            <form class=" submit-form grid md:grid-cols-2 md:gap-10 grid-cols-1 gap-y-5" data-method="POST"
                data-action="/variant/{{ $variant->id }}" data-callback="show">
                <div>
                    <img class="aspect-square rounded-xl md:w-[70%] mx-auto object-cover"
                        src="{{ '/storage' . $variant->image->path }}" alt="">
                </div>

                <div class="md:order-first">
                    <x-field id="name" name="name" type="text" label="Name" value="{{ $variant->name }}" />
                    <x-field id="price" name="price" type="number" label="Price"
                        value="{{ $variant->price }}" />
                    <x-field id="image" name="image" type="file" label="Image" value="" />

                    <x-button type="submit">Save</x-button>
                    
                    <form id="dropdown"
                        data-method="DELETE"
                        data-action="/variant/{{ $variant->id }}" data-callback="show"
                        class="submit-form">
                        
                                <x-button-danger type="submit">Delete</x-button-danger>
                      
                    </form>
                </div>
            </form>


       
            <!-- Dropdown menu -->
           
        </div> 
    </div>



    <script>
        function show(result) {
            location.href = "/product/{{ $variant->product->id }}/edit";
        }
    </script>
</x-app-layout>
