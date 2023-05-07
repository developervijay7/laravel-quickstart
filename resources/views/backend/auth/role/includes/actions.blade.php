<div class="flex items-center gap-x-3">
    <x-utils.edit-button :href="route('admin.auth.role.edit', $role)" title="Edit Role" class="rounded p-1 text-sm bg-green-500" />
    <x-utils.delete-button :action="route('admin.auth.role.destroy', $role)" title="Delete Role" class="rounded p-1 text-sm" />
</div>

