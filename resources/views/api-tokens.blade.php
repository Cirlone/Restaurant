<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Tokens - Restaurant</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body class="body-dashboard">
    <nav class="nav-dashboard">
        <div class="poza-logo-dashboard">
            <a href="/"><img src="{{ asset('imagini/Logo-Restaurant.svg') }}" alt="poza logo"></a>
        </div>
        <div class="nav-container">
            <ul class="nav-items">
                <li><a class="nav-element" href="/">HOME</a></li>
                <li><a class="nav-element" href="{{ url('/') }}#about">ABOUT US</a></li>
                <li><a class="nav-element" href="{{ url('/') }}#menu">MENU</a></li>
                <li><a class="nav-element" href="{{ url('/') }}#contact">CONTACT</a></li>
                <li><a class="nav-element" href="#">BLOG</a></li>
                <li><a class="nav-element" href="#">DELIVERY</a></li>
            </ul>
            <div class="order-container-dashboard">
                <input class="input-nav2" type="text" placeholder="search">
                <div class="logout-dropdown">
                    <div class="user-log">
                        @if(auth()->user()->profile_photo_path)
                            <img class="user" src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}?v={{ time() }}" alt="{{ auth()->user()->name }}">
                        @else
                            <img class="user" src="{{ asset('imagini/default-avatar.svg') }}" alt="user">
                        @endif
                        <img class="arrow" src="{{ asset('imagini/Vector.svg') }}" alt="arrow">
                    </div>
                    <ul class="dropdown-options">
                        <li><span class="user-name">👤 Welcome, {{ Auth::user()->name }}</span></li>
                        <li><a href="{{ route('profile.show') }}" class="dropdown-link">My Profile</a></li>
                        @if(auth()->user()->isAdmin())
                            <li><a href="{{ route('api-tokens.index') }}" class="dropdown-link">API Tokens</a></li>
                        @endif
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="logout-button">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <img class="hamburger" id="hamburger-dashboard" src="{{ asset('imagini/Hamburgermenu.svg') }}" alt="poza hamburger">
                <img class="close" id="close-dashboard" src="{{ asset('imagini/hamburger-x.svg') }}" alt="poza x">
            </div>
        </div>
    </nav>

    <div class="profile-page">
        <div class="profile-container api-tokens-container">
            
            <h1 class="profile-title">API Tokens</h1>
            
            <!-- SUCCESS MESSAGE -->
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- ERROR MESSAGE -->
            @if(session('error'))
                <div class="alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <!-- TOKEN CREATED MESSAGE WITH TOKEN VALUE -->
            @if(session('plainTextToken'))
                <div class="token-created-modal" id="tokenModal">
                    <div class="modal-content token-modal-content">
                        <h3 class="modal-title token-created-title">API Token Created</h3>
                        <p class="modal-text">Please copy your new API token. For your security, it won't be shown again.</p>
                        <div class="token-code-block">
                            <code class="token-code">{{ session('plainTextToken') }}</code>
                        </div>
                        <div class="modal-actions">
                            <button onclick="document.getElementById('tokenModal').style.display='none'" class="btn-modal-confirm">Close</button>
                        </div>
                    </div>
                </div>
            @endif

            <!-- CREATE API TOKEN SECTION -->
            <div class="profile-section">
                <h2 class="profile-section-title">Create API Token</h2>
                <p class="profile-section-desc">API tokens allow third-party services to authenticate with our application on your behalf.</p>
                
                <form method="POST" action="{{ route('api-tokens.store') }}" class="profile-form">
                    @csrf
                    
                    <!-- Token Name -->
                    <div class="profile-field">
                        <label for="name" class="profile-label">Token Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="profile-input" placeholder="e.g., Mobile App, Postman, etc.">
                        @error('name')<div class="error-message">{{ $message }}</div>@enderror
                    </div>

                    <!-- Token Permissions -->
                    <div class="profile-field">
                        <label class="profile-label">Permissions</label>
                        <p class="field-hint">Select which actions this token can perform</p>
                        
                        <div class="permissions-grid">
                            @php
                                $permissions = [
                                    'create' => 'Create',
                                    'read' => 'Read',
                                    'update' => 'Update',
                                    'delete' => 'Delete',
                                ];
                            @endphp
                            
                            @foreach($permissions as $value => $label)
                                <label class="checkbox-label">
                                    <input type="checkbox" name="permissions[]" value="{{ $value }}" class="permission-checkbox">
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                        
                        @error('permissions')<div class="error-message">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="profile-actions">
                        <button type="submit" class="btn-save">Create Token</button>
                    </div>
                </form>
            </div>

            <!-- MANAGE API TOKENS SECTION -->
            @if(count($tokens) > 0)
                <div class="profile-section">
                    <h2 class="profile-section-title">Manage API Tokens</h2>
                    <p class="profile-section-desc">You may delete any of your existing tokens if they are no longer needed.</p>
                    
                    <div class="tokens-list">
                        @foreach($tokens as $token)
                            <div class="token-item">
                                <div class="token-info">
                                    <strong class="token-name">{{ $token->name }}</strong>
                                    @if($token->last_used_at)
                                        <div class="token-last-used">
                                            Last used: {{ $token->last_used_at->diffForHumans() }}
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="token-actions">
                                    <button onclick="showPermissionsModal('{{ $token->id }}', '{{ $token->name }}', {{ json_encode($token->abilities) }})" class="btn-permissions">Permissions</button>
                                    <button onclick="confirmDelete('{{ $token->id }}', '{{ $token->name }}')" class="btn-delete-token">Delete</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- PERMISSIONS MODAL -->
    <div id="permissionsModal" class="modal">
        <div class="modal-content permissions-modal-content">
            <h3 class="modal-title" id="permissionsModalTitle">Edit Permissions</h3>
            <form id="permissionsForm" method="POST">
                @csrf
                @method('PATCH')

                
                <div class="modal-field">
                    <p class="modal-text" id="permissionsTokenName"></p>
                    
                    <div class="permissions-grid modal-permissions-grid">
                        @php
                            $permissions = [
                                'create' => 'Create',
                                'read' => 'Read',
                                'update' => 'Update',
                                'delete' => 'Delete',
                            ];
                        @endphp
                        
                        @foreach($permissions as $value => $label)
                            <label class="checkbox-label">
                                <input type="checkbox" name="permissions[]" value="{{ $value }}" class="modal-permission-checkbox">
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                
                <div class="modal-actions">
                    <button type="button" onclick="closePermissionsModal()" class="btn-modal-cancel">Cancel</button>
                    <button type="submit" class="btn-modal-confirm">Save Permissions</button>
                </div>
            </form>
        </div>
    </div>

    <!-- DELETE CONFIRMATION MODAL -->
    <div id="deleteModal" class="modal">
        <div class="modal-content delete-modal-content">
            <h3 class="modal-title delete-modal-title">Delete API Token</h3>
            <p class="modal-text" id="deleteModalText">Are you sure you want to delete this API token?</p>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-actions">
                    <button type="button" onclick="closeDeleteModal()" class="btn-modal-cancel">Cancel</button>
                    <button type="submit" class="btn-modal-delete">Delete</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="footer1">
        <div class="social-media">
            <div class="social">
                <img class="poza-social" src="{{ asset('imagini/Icoana-Facebook-Desktop.svg') }}" alt="facebook">
                <img class="poza-social" src="{{ asset('imagini/Icoana-Instagram-Desktop.svg') }}" alt="instagram">
                <img class="poza-social" src="{{ asset('imagini/Icoana-Youtube-Desktop.svg') }}" alt="youtube">
                <img class="poza-social" src="{{ asset('imagini/Icoana-X-Desktop.svg') }}" alt="x">
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('index.js') }}"></script>
    <script>
        // Show permissions modal
        function showPermissionsModal(tokenId, tokenName, abilities) {
            document.getElementById('permissionsModal').style.display = 'flex';
            document.getElementById('permissionsForm').action = '{{ url("api-tokens") }}/' + tokenId;
            document.getElementById('permissionsTokenName').textContent = 'Editing permissions for: ' + tokenName;
            
            // Check the current permissions
            const checkboxes = document.querySelectorAll('.modal-permission-checkbox');
            checkboxes.forEach(cb => {
                cb.checked = abilities.includes(cb.value) || abilities.includes('*');
            });
        }

        function closePermissionsModal() {
            document.getElementById('permissionsModal').style.display = 'none';
        }

        // Show delete confirmation modal
        function confirmDelete(tokenId, tokenName) {
            document.getElementById('deleteModal').style.display = 'flex';
            document.getElementById('deleteForm').action = '{{ url("api-tokens") }}/' + tokenId;
            document.getElementById('deleteModalText').textContent = 'Are you sure you want to delete "' + tokenName + '"?';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            const permissionsModal = document.getElementById('permissionsModal');
            const deleteModal = document.getElementById('deleteModal');
            const tokenModal = document.getElementById('tokenModal');
            
            if (event.target == permissionsModal) {
                permissionsModal.style.display = 'none';
            }
            if (event.target == deleteModal) {
                deleteModal.style.display = 'none';
            }
            if (event.target == tokenModal) {
                tokenModal.style.display = 'none';
            }
        }
    </script>
</body>
</html>