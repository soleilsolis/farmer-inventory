<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight ">
            {{ __('All Users') }}
        </h2>
        @if (\App\Models\User::find(\Illuminate\Support\Facades\Auth::id())->admin)
            <div class="mt-4">
                <x-button class="mt-1" onclick="location.href='/users/new'">New</x-button>

            </div>
        @endif
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden px-4">
                <section
                    class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center md:gap-y-20 gap-y-10 md:gap-x-14 mb-5">

                    @foreach ($users as $user)
                        <!--   ✅ User card 1 - Starts Here 👇 -->
                        <div class="md:w-72 w-full bg-white shadow-md rounded-xl duration-500  hover:shadow-xl">
                            <a >
                                <img src="{{ '/storage/' . $user->profile_photo_path }}" alt="User"
                                    class="md:h-80 md:w-72 aspect-square object-cover rounded-t-xl" />
                                <div class="px-4 py-3 w-72">
                                    <span
                                        class="text-gray-400 mr-3 uppercase text-xs"> {{ $user->admin == 0 ? 'Farmer' : 'Admin' }}</span>
                                    <p class="text-lg font-bold text-black truncate block capitalize">
                                        {{ $user->name }}</p>
                    
                                </div>
                            </a>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
