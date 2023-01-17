<div class="mb-8">
    <label for="{{ $attributes->get('id') }}" class="label block mb-1 text-sm font-semibold text-gray-900  ">
		{{ $attributes->get('label') }}
	</label>

	@if ($attributes->get('type') === 'select')
		<select class="field bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded focus:ring-[0.2px] focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 px-3.5 "
			{{ $attributes }}
		>
		{{ $slot }}
	  </select>
    @else
    	<input class="field bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded focus:ring-[0.2px] focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 px-3.5 "
    		{{ $attributes }}
    	>
    @endif

    <div id="error_{{ $attributes->get('id') }}" for="" class="mt-1 text-red-600 h-[24px]"></div>

</div>
