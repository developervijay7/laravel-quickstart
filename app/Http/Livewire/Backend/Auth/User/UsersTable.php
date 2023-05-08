<?php

namespace App\Http\Livewire\Backend\Auth\User;

use App\Exports\UsersExport;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    /**
     * @var
     */
    public $status;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 15;
    public $search = '';
    public $export;

    /**
     * @param  string  $status
     */
    public function mount($status = 'active'): void
    {
        $this->status = $status;
    }

    public function render()
    {
        $users = User::with('roles')->with('permissions')->search($this->search);
        if ($this->status === 'deleted') {
            $users = $users->onlyTrashed();
        } elseif ($this->status === 'deactivated') {
            $users = $users->onlyDeactivated();
        } else {
            $users = $users->onlyActive();
        }
        $this->export = $users->pluck('id');
        $users = $users->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.backend.auth.user.users-table')->with('users', $users);
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function toPdf()
    {
        $this->dispatchBrowserEvent('toast-alert', ['type' => 'info',  'message' => 'Going Well!']);

        return (new UsersExport($this->export))->download('users.pdf');
    }

    public function toExcel()
    {
        $this->dispatchBrowserEvent('toast-alert', ['type' => 'info',  'message' => 'Going Well!']);
        return (new UsersExport($this->export))->store(public_path('users.xlsx'));
    }

    public function toHtml()
    {
        $this->dispatchBrowserEvent('toast-alert', ['type' => 'info',  'message' => 'Going Well!']);
        return (new UsersExport($this->export))->store(public_path('users.html'));
    }
}
