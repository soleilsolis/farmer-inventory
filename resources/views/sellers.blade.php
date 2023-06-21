<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight ">
          {{ __('Sellers') }}
      </h2>


  @if (\App\Models\User::find(\Illuminate\Support\Facades\Auth::id())->admin)
  <div class="mt-4">
      <x-button class="mt-1" onclick="location.href='/sellers/new'">New</x-button>

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

                      @foreach ($sellers as $seller)
                          <x-tr link="/seller/{{ $seller->id }}">
                              <x-td>{{ $seller->id }}</x-td>
                              <x-td>{{ $seller->name }}</x-td>
                          </x-tr>
                      @endforeach
                  </x-slot>
              </x-table>
          </div>
      </div>
  </div>
</x-app-layout>
