@php
    use Carbon\Carbon;
@endphp
<div class="grid lg:grid-cols-2 grid-cols-1 mb-20 gap-10">

	<!-- Component Start -->
	<div class="w-full max-w-screen-sm bg-white p-10 rounded-xl ring-8 ring-gray-300 ring-opacity-40">
		<div class="flex justify-between">
			<div class="flex flex-col">
				<span class="text-6xl font-bold">
                    {{ $weather->current->temp_c }}°C
				</span>
				<span class="font-semibold mt-1 text-gray-500">
                    {{ $weather->location->name }}, 
                    {{ $weather->location->region }}
                </span>
			</div>

            <img src="{{ $weather->current->condition->icon }}" alt="" class="h-24 w-24">
		</div>
		<div class="flex justify-between mt-12">
            @for ($i = 0; $i < 24; $i+=4)
                <div class="flex flex-col items-center">
		        	<span class="font-semibold text-lg">
                        {{ $weather->forecast->forecastday[0]->hour[$i]->temp_c }}°C
                    </span>
		        	<img src="{{ $weather->forecast->forecastday[0]->hour[$i]->condition->icon }}" alt="" class="h-10 w-10">
		        	<span class="font-semibold mt-1 text-sm">{{ Carbon::parse($weather->forecast->forecastday[0]->hour[$i]->time)->format("g:i") }}</span>
		        	<span class="text-xs font-semibold text-gray-400">{{ Carbon::parse($weather->forecast->forecastday[0]->hour[$i]->time)->format("A") }}</span>
		        </div>
            @endfor

		</div>
	</div>
	<div class="flex flex-col space-y-6 w-full max-w-screen-sm bg-white p-10  rounded-xl ring-8 ring-gray-300 ring-opacity-40">
		
        @foreach ($weather->forecast->forecastday as $forecastday)
            <div class="flex justify-between items-center">
            	<span class="font-semibold text-lg w-1/4">{{ Carbon::parse($forecastday->date)->format('D, M d') }}</span>
            	<div class="flex items-center justify-end w-1/4 pr-10">
            		<span class="font-semibold">{{ $forecastday->day->daily_chance_of_rain }}%</span>
            		<svg class="w-6 h-6 fill-current ml-1" viewBox="0 0 16 20" version="1.1" xmlns="http://www.w3.org/2000/svg" >
            			<g transform="matrix(1,0,0,1,-4,-2)">
            				<path d="M17.66,8L12.71,3.06C12.32,2.67 11.69,2.67 11.3,3.06L6.34,8C4.78,9.56 4,11.64 4,13.64C4,15.64 4.78,17.75 6.34,19.31C7.9,20.87 9.95,21.66 12,21.66C14.05,21.66 16.1,20.87 17.66,19.31C19.22,17.75 20,15.64 20,13.64C20,11.64 19.22,9.56 17.66,8ZM6,14C6.01,12 6.62,10.73 7.76,9.6L12,5.27L16.24,9.65C17.38,10.77 17.99,12 18,14C18.016,17.296 14.96,19.809 12,19.74C9.069,19.672 5.982,17.655 6,14Z" style="fill-rule:nonzero;"/>
            			</g>
            		</svg>
            	</div>
                <img src="{{ $forecastday->day->condition->icon }}" alt="" class="h-8 w-8">

            	<span class="font-semibold text-lg w-1/4 text-right">{{ $forecastday->day->mintemp_c }}° / {{ $forecastday->day->maxtemp_c }}°</span>
            </div>
        @endforeach
	</div>
	<!-- Component End  -->

</div>