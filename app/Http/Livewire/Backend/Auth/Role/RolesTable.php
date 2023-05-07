<?php

namespace App\Http\Livewire\Backend\Auth\Role;

use App\Models\Role;
use Livewire\Component;

class RolesTable extends Component
{
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 15;
    public $search = '';

    public function render()
    {
        $roles = Role::with('permissions')->with('users')
            ->where('type', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.backend.auth.role.roles-table')->with('roles', $roles);
    }
}
