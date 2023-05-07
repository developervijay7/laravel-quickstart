@forelse($roles->where('type', $type) as $role)
    <div class="mb-2">
        <div>
            <input name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}" type="checkbox"
                {{ (old('rules') && in_array($role->id, old('rules'), true)) || (isset($user) && in_array($role->id, $user->roles->modelKeys(), true)) ? 'checked' : '' }} />

            <label for="role_{{ $role->id }}">
                {{ $role->name }}
            </label>
        </div>
    </div>

    @if ($role->isAdmin())
        <blockquote class="ml-5 my-2">
            <div class="flex">
                <x-icons.check-circle />
                @lang('All Permissions')
            </div>
        </blockquote>
    @else
        @if ($role->permissions->count())
            <blockquote class="ml-5 my-2">
                @foreach ($role->permissions as $permission)
                    <div class="flex">
                        <x-icons.check-circle />
                        {{ $permission->description }}<br/>
                    </div>
                @endforeach
            </blockquote>
        @else
            <blockquote class="ml-5 my-2">
                <div class="flex">
                    <x-icons.minus-circle />
                    @lang('No Permissions')
                </div>
            </blockquote>
        @endif
    @endif
@empty
    <p class="mb-0"><em>@lang('There are no roles to choose from for this type.')</em></p>
@endforelse
