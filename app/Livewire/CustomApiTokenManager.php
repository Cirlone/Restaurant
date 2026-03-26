<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CustomApiTokenManager extends Component
{
    public $user;
    public $plainTextToken;
    public $displayingToken = false;

    public $createApiTokenForm = [
        'name' => '',
        'permissions' => [],
    ];

    protected $rules = [
        'createApiTokenForm.name' => 'required|string|max:255',
        'createApiTokenForm.permissions' => 'array',
    ];




    // Extra forms for editing/deleting tokens
    public $updateApiTokenForm = [
        'permissions' => [],
    ];

    public $managingApiTokenPermissions = false;
    public $confirmingApiTokenDeletion = false;
    public $apiTokenIdBeingManaged;
    public $apiTokenIdBeingDeleted;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function createApiToken()
    {
        // Create the token (demo version — if using Sanctum)
        $token = $this->user->createToken(
            $this->createApiTokenForm['name'] ?: 'Untitled Token',
            $this->createApiTokenForm['permissions']
        );

        $this->plainTextToken = $token->plainTextToken;
        $this->displayingToken = true;

        // Reset form
        $this->createApiTokenForm = ['name' => '', 'permissions' => []];
        $this->dispatch('created');
    }

    public function manageApiTokenPermissions($tokenId)
    {
        $this->apiTokenIdBeingManaged = $tokenId;
        $token = $this->user->tokens->find($tokenId);

        $this->updateApiTokenForm['permissions'] = $token->abilities ?? [];
        $this->managingApiTokenPermissions = true;
    }

    public function updateApiToken()
    {
        $token = $this->user->tokens->find($this->apiTokenIdBeingManaged);

        if ($token) {
            $token->update([
                'abilities' => $this->updateApiTokenForm['permissions'],
            ]);
        }

        $this->managingApiTokenPermissions = false;
    }

    public function confirmApiTokenDeletion($tokenId)
    {
        $this->apiTokenIdBeingDeleted = $tokenId;
        $this->confirmingApiTokenDeletion = true;
    }

    public function deleteApiToken()
    {
        $token = $this->user->tokens->find($this->apiTokenIdBeingDeleted);

        if ($token) {
            $token->delete();
        }

        $this->confirmingApiTokenDeletion = false;
    }

    public function render()
    {
        return view('api.api-token-manager', [
            'user' => $this->user,
        ]);
    }
}