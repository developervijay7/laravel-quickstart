@props(['dismissible' => true, 'type' => 'success', 'ariaLabel' => __('Close')])

@if($type === 'success')
    <div x-data="{ showAlert: true }" x-show="showAlert" role="alert" {{ $attributes->merge(['class' => 'px-5 py-2 rounded relative mb-2 bg-green-500']) }}>
        <span class="text-xl inline-block align-middle">
            <x-icons.check-circle />
        </span>
        <span class="inline-block align-middle mr-8">
            <b class="capitalize">success!</b> {{ $slot }}
        </span>
        @if ($dismissible)
            <button type="button" @click="showAlert = false" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none" aria-label="{{ $ariaLabel }}">
                <x-icons.x />
            </button>
        @endif
    </div>
@elseif($type === 'error')
    <div x-data="{ showAlert: true }" x-show="showAlert" role="alert" {{ $attributes->merge(['class' => 'px-5 py-2 rounded relative mb-2 bg-red-500']) }}>
        <span class="text-xl inline-block align-middle">
           <x-icons.x-circle />
        </span>
        <span class="inline-block align-middle mr-8">
            <b class="capitalize">error!</b> {{ $slot }}
        </span>
        @if ($dismissible)
            <button type="button" @click="showAlert = false" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none" aria-label="{{ $ariaLabel }}">
                <x-icons.x />
            </button>
        @endif
    </div>
@elseif($type === 'info')
    <div x-data="{ showAlert: true }" x-show="showAlert" role="alert" {{ $attributes->merge(['class' => 'px-5 py-2 rounded relative mb-2 bg-blue-200']) }}>
        <span class="text-xl inline-block align-middle">
           <x-icons.exclamation-circle />
        </span>
        <span class="inline-block align-middle mr-8">
            <b class="capitalize">info!</b> {{ $slot }}
        </span>
        @if ($dismissible)
            <button type="button" @click="showAlert = false" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none" aria-label="{{ $ariaLabel }}">
                <x-icons.x />
            </button>
        @endif
    </div>
@elseif($type === 'warning')
    <div x-data="{ showAlert: true }" x-show="showAlert" role="alert" {{ $attributes->merge(['class' => 'px-5 py-2 rounded relative mb-2 bg-yellow-500']) }}>
        <span class="text-xl inline-block align-middle">
            <x-icons.exclamation />
        </span>
        <span class="inline-block align-middle mr-8">
            <b class="capitalize">warning!</b> {{ $slot }}
        </span>
        @if ($dismissible)
            <button type="button" @click="showAlert = false" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none" aria-label="{{ $ariaLabel }}">
                <x-icons.x />
            </button>
        @endif
    </div>
@else
    <div x-data="{ showAlert: true }" x-show="showAlert" role="alert" {{ $attributes->merge(['class' => 'px-5 py-2 rounded relative mb-2 bg-pink-500']) }}>
        <span class="inline-block align-middle mr-8">
            {{ $slot }}
        </span>
        @if ($dismissible)
            <button type="button" @click="showAlert = false" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none" aria-label="{{ $ariaLabel }}">
                <x-icons.x />
            </button>
        @endif
    </div>
@endif
