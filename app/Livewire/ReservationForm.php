<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class ReservationForm extends Component
{
    public $name = '';
    public $phone = '';
    public $date = '';
    public $time = '';
    public $guests = null;
    public $notes = '';

    public function submit()
    {
        Log::info('ReservationForm submit() called', [
            'name' => $this->name,
            'phone' => $this->phone,
            'date' => $this->date,
            'time' => $this->time,
            'guests' => $this->guests,
        ]);

        $this->validate([
            'name'   => 'required|string|max:255',
            'phone'  => 'required|string|max:50',
            'date'   => 'required|date',
            'time'   => 'required',
            'guests' => 'required|integer|min:1',
            'notes'  => 'nullable|string',
        ]);

        $reservation = Reservation::create([
            'name'   => $this->name,
            'phone'  => $this->phone,
            'date'   => $this->date,
            'time'   => $this->time,
            'guests' => $this->guests,
            'notes'  => $this->notes,
        ]);

        session()->flash('reservation_data', [
            'name' => $this->name,
            'date' => $this->date,
            'time' => $this->time,
            'guests' => $this->guests,
        ]);

        return redirect()->to('/Restaurant-Validation');
    }

    public function render()
    {
        return view('livewire.reservation-form');
    }
}