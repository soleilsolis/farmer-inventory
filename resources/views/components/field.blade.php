@if ($attributes->get('type') === 'hidden')
    <input {{ $attributes }}>
	<div id="error_{{ $attributes->get('id') }}" for="" class="hidden text-sm mt-1 text-red-500 h-[24px]"></div>
@else
    <div class="mb-4">
        <label for="{{ $attributes->get('id') }}" class="label block mb-1 font-semibold text-gray-900  ">
            {{ $attributes->get('label') }}
        </label>

        @if ($attributes->get('type') === 'select')
            <select
                class="field bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded focus:ring-[0.2px] focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 px-3.5 "
                {{ $attributes }}>
                {{ $slot }}
            </select>
		@elseif ($attributes->get('type') === 'textarea')	
			<textarea {{ $attributes }} class="field bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded focus:ring-[0.2px] focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 px-3.5 ">{{ $slot }}</textarea>
        @else
            <input
                class="field bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded focus:ring-[0.2px] focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 px-3.5 "
                {{ $attributes }}>
        @endif

        <div id="error_{{ $attributes->get('id') }}" for="" class="text-sm mt-1 text-red-500 h-[24px]"></div>

    </div>

@endif
