<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant - Reservation Confirmed</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <livewire:navbar />
    </header>

    <main class="reservation-validation-page">
        <div class="validation-card">
            <div class="success-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            
            <h1>Reservation Confirmed!</h1>
            
            <p class="validation-message">
                Thank you for choosing our restaurant. Your table has been successfully reserved.
            </p>
            
            <div class="reservation-details">
                <p><strong>Date:</strong> {{ session('reservation_data.date') ?? 'March 15, 2026' }}</p>
                <p><strong>Time:</strong> {{ session('reservation_data.time') ?? '7:30 PM' }}</p>
                <p><strong>Guests:</strong> {{ session('reservation_data.guests') ?? '4' }}</p>
                <p><strong>Name:</strong> {{ session('reservation_data.name') ?? 'John Doe' }}</p>
            </div>
            
            <div class="validation-actions">
                <a href="/" class="btn-return-home">Return Home</a>
                <a href="/#menu" class="btn-browse-menu">Browse Menu</a>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="newsletter">
            <h3 class="h3-newsletter">Newsletter</h3>
            <div class="form-newsletter">
                <input class="input-footer" type="email" placeholder="example@example.com">
                <button class="btn-footer" type="submit">Send</button>
            </div>
        </div>
        <div class="social-media">
            <div class="social">
                <img class="poza-social" src="{{ asset('imagini/Icoana-Facebook-Desktop.svg') }}" alt="facebook">
                <img class="poza-social" src="{{ asset('imagini/Icoana-Instagram-Desktop.svg') }}" alt="instagram">
                <img class="poza-social" src="{{ asset('imagini/Icoana-Youtube-Desktop.svg') }}" alt="youtube">
                <img class="poza-social" src="{{ asset('imagini/Icoana-X-Desktop.svg') }}" alt="x">
            </div>
        </div>
    </footer>

    <script src="{{ asset('index.js') }}"></script>
</body>
</html>