@if($user->isActive())
    <span class='bg-green-400 rounded-full px-1 py-0.25 text-sm'>@lang('Active')</span>
@else
    <span class='bg-red-400 rounded-full px-1 py-0.25 text-sm'>@lang('Inactive')</span>
@endif
