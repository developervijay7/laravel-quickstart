@impersonating
<div class="bg-red-700 px-5">
    @lang('You are currently logged in as :name.', ['name' => $logged_in_user->full_name]) <a href="{{ route('impersonate.leave') }}" class="text-purple-300">@lang('Return to your account')</a>.
</div>
@endImpersonating
