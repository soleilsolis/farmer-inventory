<div class="h-screen sm:justify-center pt-6 sm:pt-0 relative">
    <img src="{{ Vite::asset("resources/image/DA-Logo-Header-Banner-1.png") }}" alt="" class=" w-full px-5 lg:w-[45%] lg:pt-5 lg:pl-5">
    <div class="grid lg:grid-cols-2 grid-cols-1 w-full">
        <div class="flex items-center"></div>
        <div>
            <div class="mt-5 md:mt-0">
                {{ $logo }}
            </div>
        
            <div class="flex items-center">
                <div class="mx-auto w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
