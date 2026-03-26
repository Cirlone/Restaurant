<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Auth;

class NewsletterForm extends Component
{
    public string $mail = '';
    public bool $alreadySubscribed = false;

    public function mount()
    {
        if (Auth::check()) {
            $this->alreadySubscribed = Newsletter::where('mail', Auth::user()->email)->exists();
        }
    }

    public function subscribe()
    {
        $this->validate([
            'mail' => 'required|email|unique:newsletters,mail',
        ]);

        Newsletter::create([
            'mail' => $this->mail,
        ]);

        return redirect()->to('/Newsletter-Validation');
    }

    public function render()
    {
        return view('livewire.newsletter-form');
    }
}