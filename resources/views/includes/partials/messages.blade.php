@if(isset($errors) && $errors->any())
    @foreach($errors->all() as $error)
        <x-utils.alert type="danger" class="status-message">
            {{ $error }}
        </x-utils.alert>
    @endforeach
@endif

@if(session()->get('flash_success'))
    <x-utils.alert type="success" class="status-message">
        {{ session()->get('flash_success') }}
    </x-utils.alert>
@endif

@if(session()->get('flash_warning'))
    <x-utils.alert type="warning" class="status-message">
        {{ session()->get('flash_warning') }}
    </x-utils.alert>
@endif

@if(session()->get('flash_info') || session()->get('flash_message'))
    <x-utils.alert type="info" class="status-message">
        {{ session()->get('flash_info') }}
    </x-utils.alert>
@endif

@if(session()->get('flash_error'))
    <x-utils.alert type="danger" class="status-message">
        {{ session()->get('flash_error') }}
    </x-utils.alert>
@endif

@if(session()->get('status'))
    <x-utils.alert type="success" class="status-message">
        {{ session()->get('status') }}
    </x-utils.alert>
@endif

@if(session()->get('resent'))
    <x-utils.alert type="success" class="status-message">
        @lang('A fresh verification link has been sent to your email address.')
    </x-utils.alert>
@endif

@if(session()->get('verified'))
    <x-utils.alert type="success" class="status-message">
        @lang('Thank you for verifying your e-mail address.')
    </x-utils.alert>
@endif
