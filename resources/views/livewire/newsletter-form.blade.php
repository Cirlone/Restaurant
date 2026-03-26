<div>
        <form wire:submit="subscribe">
            <div class="form-newsletter">
                <input class="input-footer" type="email" wire:model.live="mail" placeholder="example@example.com">
                <button class="btn-footer" type="submit">Send</button>
                @error('mail') <span style="color: red">{{ $message }}</span> @enderror
            </div>
        </form>
</div>