@if ($user->isAdmin())
    <img class="rounded-full h-12 w-12 p-1 hover:bg-green-900  transition duration-100 bg-green-300" src="{{ asset($user->avatar) }}" alt="{{ $user->email ?? '' }}" title="Administrator">
@elseif ($user->isUser())
    <img class="rounded-full h-12 w-12 p-1 hover:bg-yellow-900  transition duration-100 bg-yellow-300" src="{{ asset($user->avatar) }}" alt="{{ $user->email ?? '' }}" title="User">
@else
    <img class="rounded-full h-12 w-12 p-1 hover:bg-purple-900  transition duration-100 bg-purple-300" src="{{ asset($user->avatar) }}" alt="{{ $user->email ?? '' }}" title="Not Applicable">
@endif
