<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight ">
            {{ __('New Seller') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
            <form class="md:w-[50%] submit-form"
                data-method="POST"
                data-action="/sellers"
                data-callback="show"
            >
                <x-field id="name" name="name" type="text" label="Name"></x-field>   
                <x-button type="submit">Save</x-button>
            </form>
        </div>
    </div>
    <script>
        function show(result){
            location.href= `/seller/${result.data.id}`;
        }
    </script>
</x-app-layout>
