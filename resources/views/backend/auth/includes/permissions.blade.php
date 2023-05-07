<div class="">
    <label for="permissions">@lang('Additional Permissions')</label>
    <div class="bg-gray-200 dark:bg-gray-800 rounded p-5">
        @include('backend.auth.role.includes.no-permissions-message')

        <div x-show="userType === '{{ $model::TYPE_ADMIN }}'">
            @include('backend.auth.includes.partials.permission-type', ['type' => $model::TYPE_ADMIN])
        </div>

        <div x-show="userType === '{{ $model::TYPE_USER}}'">
            @include('backend.auth.includes.partials.permission-type', ['type' => $model::TYPE_USER])
        </div>
    </div>
</div>
