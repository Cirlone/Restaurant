<div>
    <ul class="dropdown-options">
        <li><span>👤 {{ Auth::user()->name }}</span></li>
        <li><button type="button" onclick="window.location.href='{{ route('profile.show') }}'" class="dropdown-link">My Profile</button></li>
        <li><button type="button" onclick="window.location.href='{{ route('api-tokens.show') }}'" class="dropdown-link">API</button></li>
        <li>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
        </form>
        </li>
    </ul>
</div>
