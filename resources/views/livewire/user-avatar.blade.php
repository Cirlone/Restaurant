<div>
    <div class="user-log">
        <img class="user" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}">
        <img class="arrow" src="{{ asset('imagini/Vector.svg') }}" alt="arrow">
    </div>
    
    {{-- DROPDOWN MENU - THIS WAS MISSING --}}
    <ul class="dropdown-options">
        <li class="px-4 py-3 border-b border-gray-100">
            <span class="user-name text-sm font-medium text-gray-700">👤 Welcome, {{ auth()->user()->name }}</span>
        </li>
        <li>
            <button type="button" 
                    onclick="window.location.href='{{ route('dashboard') }}'" 
                    class="dropdown-link w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                Dashboard
            </button>
        </li>
        <li>
            <button type="button" 
                    onclick="window.location.href='{{ route('profile.show') }}'" 
                    class="dropdown-link w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                My Profile
            </button>
        </li>
        <li class="border-t border-gray-100">
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" 
                        class="logout-button w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-50">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div>