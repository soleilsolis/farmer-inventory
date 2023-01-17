<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Product Types') }}
        </h2>

        <div class="mt-4">
            <x-button class="mt-1" onclick="location.href='/products/new'">New</x-button>

        </div>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-table>
                    <x-slot:thead>
                        <x-th key="1">ID</x-th>
                        <x-th>Name</x-th>
                        <x-th>Type</x-th>
                    </x-slot>
                    <x-slot:tbody>

                        @foreach ($products as $product)
                            <x-tr link="/product/{{ $product->id }}">
                                <x-td>{{ $product->id }}</x-td>
                                <x-td>{{ $product->name }}</x-td>
                                <x-td>{{ $product->productType->name }}</x-td>
                            </x-tr>
                        @endforeach
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
