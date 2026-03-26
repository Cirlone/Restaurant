<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <meta name="description" content="Proiect Restaurant">
    <meta name="googlebot" content="index,follow">
    <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <meta name="googlebot" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    @livewireStyles
</head>
<body class="body-dashboard">

   <livewire:nav-dashboard />

    <section class="dashboard1">
        <div class="flex-sectiune-dashboard">
            <div class="left-bar">
                <a href="{{ route('dashboard') }}">
                    <div class="flex-dashboard">
                        <img class="dashboard-icon" src="{{ asset('imagini/dashboard-layout_svgrepo.com.svg') }}" alt="dashboard-icon">
                        <p class="p-dashboard">Dashboard</p>
                    </div>
                </a>
                <div class="users-dropdown">
                    <a href="{{ route('users.index') }}">
                        <div class="flex-dashboard users-dropdown-trigger">
                            <img class="dashboard-icon" src="{{ asset('imagini/usersicon.svg') }}" alt="dashboard-icon">
                            <p class="p-dashboard">Users</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- RIGHT SIDE: CREATE USER FORM -->
            <div class="right-createuser">
                <h2 class="h2-dashboard" id="h2-createuser">Create New User</h2>

                <div>
                    <form class="form-create-users" method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="create-users-elements">
                            <!-- First Name -->
                            <div class="form-group">
                                <input type="text" id="first_name" name="first_name" class="input-sign-name" placeholder="First Name" value="{{ old('first_name') }}" required>
                            </div>
                            
                            <!-- Last Name -->
                            <div class="form-group">
                                <input type="text" id="last_name" name="last_name" class="input-sign-name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                            </div>
                            
                            <!-- Email -->
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="input-sign-email" placeholder="Email" value="{{ old('email') }}" required>
                            </div>
                            
                            <!-- Password -->
                            <div class="form-group password-field">
                                <input type="password" id="password" name="password" class="input-sign-password" placeholder="Password" required>
                                <span class="toggle-password-createuser" onclick="togglePasswordVisibility('password')">
                                    <img src="{{ asset('imagini/Iconita-Ochi.svg') }}" class="eye-icon-createuser">
                                </span>
                            </div>
                            
                            <!-- Role Dropdown -->
                            <div class="custom-dropdown">
                                <div class="dropdown-selected" id="selectedRole">
                                    @if(auth()->user()->role === 'manager')
                                        User
                                    @elseif(auth()->user()->role === 'admin')
                                        Select Role
                                    @else
                                        Role
                                    @endif
                                </div>

                                <ul class="dropdown-roles" id="roleList">
                                    @if(auth()->user()->role === 'manager')
                                        <li data-value="user">User</li>
                                    @elseif(auth()->user()->role === 'admin')
                                        @foreach(config('roles') as $role)
                                            @if($role !== 'client')
                                                <li data-value="{{ $role }}">{{ ucfirst($role) }}</li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                                <input type="hidden" name="role" id="role" value="{{ auth()->user()->role === 'manager' ? 'user' : old('role') }}">
                            </div>

                            <button type="submit" class="btn-cancel2">Create User</button>
                            <button type="button" class="btn-cancel" onclick="window.location.href='{{ route('users.index') }}'">Cancel</button>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-error">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
@livewireScripts
</body>
<script src="{{ asset('index.js') }}"></script>
</html>