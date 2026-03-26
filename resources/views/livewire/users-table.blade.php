<div>
    @php
        $current = $users->currentPage();
        $last = $users->lastPage();
        $start = max(1, $current - 2);
        $end = min($last, $current + 2);
        $currentUser = auth()->user();
        $isManager = $currentUser->role === 'manager';
    @endphp

    {{-- SEARCH --}}
    <input
        type="text"
        class="input-usersearch"
        placeholder="Search users..."
        wire:model.live.debounce.300ms="search"
    >

    {{-- FILTERS --}}
    <div class="filter-tab">
        <p class="filter-tag">Filters:</p>
            <div class="tabs">
        @foreach (config('roles') as $role)
            {{-- Hide 'admin' and 'manager' filter buttons for managers --}}
            @if(!($isManager && in_array($role, ['admin', 'manager'])))
                <button type="button" wire:click="toggleRole('{{ $role }}')" class="btn-sign role-filter {{ $selectedRole === $role ? 'highlight active' : '' }}" id="user-btn-tabs">
                    {{ ucfirst(str_replace('_', ' ', $role)) }}
                </button>
            @endif
        @endforeach
    </div>
    </div>

    {{-- TABLE --}}
    <div class="table-scroll" x-data="{ isDown: false, startX: 0, scrollLeft: 0 }"
        @mousedown="isDown = true; startX = $event.pageX; scrollLeft = $el.scrollLeft"
        @mouseup="isDown = false"
        @mouseleave="isDown = false"
        @mousemove="
        if (!isDown) return;
        $el.scrollLeft = scrollLeft - ($event.pageX - startX);">
        <table class="down">
            <tbody class="users-table-tbody">
                @forelse($users as $user)
                    <tr class="users-table-tr" wire:key="user-{{ $user->id }}">
                        <td class="users-table-td" data-label="ID">#{{ $user->id }}</td>
                        <td class="users-table-td" data-label="First Name">{{ $user->first_name }}</td>
                        <td class="users-table-td" data-label="Last Name">{{ $user->last_name }}</td>
                        <td class="users-table-td" data-label="Email">{{ $user->email }}</td>
                        <td class="users-table-td" data-label="Updated">{{ $user->updated_at->format('d.m.Y') }}</td>

                        {{-- ROLE DROPDOWN (ALPINE) --}}
                        <td data-label="Actions" class="make-delete">
                        <div class="users-parent">
                            <div x-data="{ 
                                        open: false, 
                                        isLastRow: {{ $loop->last ? 'true' : 'false' }},
                                        showAlert: false,
                                        alertText: ''
                                    }" 
                                    @role-updated.window="
                                        if ($event.detail.userId === {{ $user->id }}) {
                                            alertText = 'Role updated';
                                            showAlert = true;
                                            setTimeout(() => showAlert = false, 4000);
                                        }
                                    "
                                    @role-error.window="
                                        if ($event.detail.userId === {{ $user->id }}) {
                                            alertText = $event.detail.message;
                                            showAlert = true;
                                            setTimeout(() => showAlert = false, 4000);
                                        }
                                    "
                                    class="dropdown-wrapper">
                                <div class="dropdown-selected-users" @click="open = !open">
                                    {{ ucfirst(str_replace('_', ' ', $user->role ?? 'Select role')) }}
                                </div>
                                <ul x-show="open" 
                                    x-transition 
                                    :class="{ 'dropdown-up': isLastRow }"
                                    @click.outside="open = false">
                                    @foreach(config('roles') as $role)
                                        {{-- Hide 'admin' and 'manager' options for managers --}}
                                        @if(!($isManager && in_array($role, ['admin', 'manager'])))
                                            <li
                                                wire:key="role-{{ $user->id }}-{{ $role }}"
                                                class="role-item {{ $user->role === $role ? 'active' : '' }}"
                                                x-on:click.stop.prevent="
                                                    Livewire.find($el.closest('[wire\\:id]').getAttribute('wire:id'))
                                                        .call('updateUserRole', {{ $user->id }}, '{{ $role }}');
                                                    open = false;">
                                                {{ ucfirst(str_replace('_', ' ', $role)) }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul> 
                                <span>
                                    <div
                                        x-show="showAlert"
                                        x-transition
                                        class="role-alert"
                                        x-text="alertText"
                                    ></div>
                            </span>
                            </div>

                            {{-- DELETE --}}
                            <form
                                class="form-users"
                                method="POST"
                                action="{{ route('users.destroy', $user) }}"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn-delete"
                                    type="submit"
                                    onclick="return confirm('Delete user {{ $user->first_name }}{{ $user->last_name }}?')">
                                
                                    Delete
                                </button>
                            </form>
                        </div>
                        </td>
                    </tr>
                @empty
                    <tr class="users-table-tr">
                        <td colspan="5">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="pagination-wrapper">
        {{-- Previous --}}
        @if ($users->onFirstPage())
            <span class="page disabled">«</span>
        @else
            <button wire:click="previousPage" class="page">«</button>
        @endif

        {{-- Pages --}}
        @for ($page = $start; $page <= $end; $page++)
            @if ($page === $current)
                <span class="page active">{{ $page }}</span>
            @else
                <button wire:click="gotoPage({{ $page }})" class="page">
                    {{ $page }}
                </button>
            @endif
        @endfor

        {{-- Next --}}
        @if ($users->hasMorePages())
            <button wire:click="nextPage" class="page">»</button>
        @else
            <span class="page disabled">»</span>
        @endif
    </div>

</div>