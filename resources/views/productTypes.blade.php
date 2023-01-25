<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight ">
            {{ __('Product Types') }}
        </h2>


    @if (\App\Models\User::find(\Illuminate\Support\Facades\Auth::id())->admin)
    <div class="mt-4">
        <x-button class="mt-1" onclick="location.href='/productTypes/new'">New</x-button>

    </div>
    @endif
       
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-table>
                    <x-slot:thead>
                        <x-th key="1">ID</x-th>
                        <x-th>Name</x-th>
                    </x-slot>
                    <x-slot:tbody>

                        @foreach ($productTypes as $productType)
                            <x-tr link="/productType/{{ $productType->id }}">
                                <x-td>{{ $productType->id }}</x-td>
                                <x-td>{{ $productType->name }}</x-td>
                            </x-tr>
                        @endforeach
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
