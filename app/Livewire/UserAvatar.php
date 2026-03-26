<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    /**
     * Filters
     */
    public ?string $selectedRole = null;
    public string $search = '';

    /**
     * Available roles (client removed)
     */
    public array $availableRoles = ['bartender', 'chef', 'manager', 'operator', 'marketing', 'admin', 'cook', 'waiter'];

    /**
     * Authorization check on mount
     */
    public function mount(): void
    {
        // Check if user is authenticated and has admin/manager role
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'manager'])) {
            abort(403, 'Unauthorized access to users management.');
        }
    }

    /**
     * Sync state with URL (optional)
     */
    protected $queryString = [
        'selectedRole' => ['except' => null],
        'search'       => ['except' => ''],
    ];

    public function toggleRole(string $role): void
    {
        $this->selectedRole = $this->selectedRole === $role
            ? null
            : $role;

        $this->resetPage();
    }
    public function updatedSearch(): void
    {
        $this->resetPage();
    }
    public function clearFilters(): void
    {
        $this->selectedRole = null;
        $this->search = '';
        $this->resetPage();
    }
            public function updateUserRole(int $userId, string $role): void 
            {
                if ($userId === auth()->id()) {
            $this->dispatch('role-error', userId: $userId, message: 'You cannot change your own role.');
            return;
        }
        // Prevent assigning client role
        if ($role === 'client') {
            $this->dispatch('role-error', userId: $userId, message: 'Client role cannot be assigned.');
            return;
        }

        if (! in_array($role, $this->availableRoles, true)) {
            return;
        }

        $targetUser = User::findOrFail($userId);
        $currentUser = auth()->user();

        // Prevent self-role change
        if ($targetUser->id === $currentUser->id) {
            $this->dispatch('role-error', userId: $userId, message: 'You cannot change your own role.');
            return;
        }

        if ($currentUser->role === 'manager') {
            if ($targetUser->role === 'admin') {
                $this->dispatch('role-error', userId: $userId, message: 'Managers cannot modify admin users.');
                return;
            }

            if ($role === 'admin') {
                $this->dispatch('role-error', userId: $userId, message: 'Managers cannot assign admin role.');
                return;
            }
        }

        $targetUser->update(['role' => $role]);

        $this->dispatch(
            'role-updated',
            userId: $userId,
            role: ucfirst($role)
        );
    }

    //Render users table
    public function render()
    {  
        $currentUser = auth()->user();

        $users = User::query()

            //ROLE VISIBILITY
            ->when(
                $currentUser->role === 'manager',
                fn ($q) => $q->whereNotIn('role', ['admin'])
            )

            ->when(
                $currentUser->role === 'operator',
                fn ($q) => $q->whereNotIn('role', ['admin', 'manager'])
            )

            //SEARCH
           ->when($this->search !== '', function ($query) {
            $query->where(function ($q) {
                $q->where('first_name', 'like', "%{$this->search}%")
                  ->orWhere('last_name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%");
            });
        })

            //ROLE FILTER
            ->when($this->selectedRole, function ($query) {
                $query->where('role', $this->selectedRole);
            })

            ->orderBy('id')
            ->paginate(10);

        return view('livewire.users-table', [
            'users' => $users,
        ]);
    }
}