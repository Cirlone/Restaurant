<div>
    <form wire:submit="submit" class="form-contact">
        <div class="row1">
            <input class="input-short" type="text" placeholder="Name"  wire:model.live="name">
            <input class="input-short" type="text"  placeholder="Phone" wire:model.live="phone">
        </div>
        <div class="row2">
            <input class="input-date" type="date" placeholder="Date" wire:model.live="date" min="{{ now()->format('Y-m-d') }}">
            <input class="input-time" type="time" placeholder="Time" wire:model.live="time">
        </div>
        <div class="row3">
            <input class="input-number" type="number" placeholder="Nr. of guests" wire:model.live="guests" min="1">
        </div>
        <div class="row4">
            <textarea class="textarea-form" placeholder="Message" wire:model.live="notes"></textarea>
        </div>
        <button class="btn-contact" type="submit">Reserve</button>
        @error('name') <div style="color:red">{{ $message }}</div> @enderror
        @error('phone') <div style="color:red">{{ $message }}</div> @enderror
        @error('date') <div style="color:red">{{ $message }}</div> @enderror
        @error('time') <div style="color:red">{{ $message }}</div> @enderror
        @error('guests') <div style="color:red">{{ $message }}</div> @enderror
    </form>
</div>