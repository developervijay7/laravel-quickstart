<div class="py-2">
    <label for="roles">@lang('Roles')</label>
    <div x-show="userType === '{{ $model::TYPE_ADMIN }}'">
        @include('backend.auth.includes.partials.role-type', ['type' => $model::TYPE_ADMIN])
    </div>
    <div x-show="userType === '{{ $model::TYPE_USER }}'">
        @include('backend.auth.includes.partials.role-type', ['type' => $model::TYPE_USER])
    </div>
</div>
