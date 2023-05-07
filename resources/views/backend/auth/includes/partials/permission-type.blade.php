@if ($general->where('type', $type)->count())
    <h5 class="text-xl">@lang('General Permissions')</h5>
    <div class="">
        @foreach($general->where('type', $type) as $permission)
            <span class="">
                <input type="checkbox" name="permissions[]" {{ in_array($permission->id, $usedPermissions ?? [], true) ? 'checked' : '' }} value="{{ $permission->id }}" id="{{ $permission->id }}" />
                <label for="{{ $permission->id }}">{{ $permission->description ?? $permission->name }}</label>
            </span>
        @endforeach
    </div>
@endif

@if ($general->where('type', $type)->count() && $categories->where('type', $type)->count())
    <hr/>
@endif

@if ($categories->where('type', $type)->count())
    <h5 class="text-xl">@lang('Permission Categories')</h5>
    <ul class="permission-tree">
        @foreach($categories->where('type', $type) as $permission)
            <li class="my-5">
                <input type="checkbox" name="permissions[]" {{ in_array($permission->id, $usedPermissions ?? [], true) ? 'checked' : '' }} value="{{ $permission->id }}" id="{{ $permission->id }}" />
                <label for="{{ $permission->id }}">{{ $permission->description ?? $permission->name }}</label>
                @if($permission->children->count())
                    @include('backend.auth.role.includes.children', ['children' => $permission->children])
                @endif
            </li>
        @endforeach
    </ul>
@endif
@if (!$general->where('type', $type)->count() && !$categories->where('type', $type)->count())
    <p class=""><em>@lang('There are no additional permissions to choose from for this type.')</em></p>
@endif
