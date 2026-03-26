<div class="container-reviews">
    @forelse($reviews as $index => $review)
        @if($index % 2 == 0)
            <div class="review-stanga">
                <div class="mesaj-stanga">
                    <img class="stele-stanga" src="{{ asset('imagini/Stele.svg') }}" alt="rating">
                    <p class="p-stanga">{{ Str::limit($review['text'], 100) }}</p>
                    <h3 class="h3-reviews-stanga">{{ $review['author_name'] }}</h3>
                </div>
                <div class="img-stanga">
                    @if(isset($review['profile_photo_url']))
                        <img class="poza-fata" src="{{ $review['profile_photo_url'] }}" alt="{{ $review['author_name'] }}">
                    @else
                        <img class="poza-fata" src="{{ asset('imagini/poza-fata.svg') }}" alt="reviewer">
                    @endif
                </div>
            </div>
        @else
            <div class="review-dreapta">
                <div class="mesaj-dreapta">
                    <img class="stele-dreapta" src="{{ asset('imagini/Stele.svg') }}" alt="rating">
                    <p class="p-dreapta">{{ Str::limit($review['text'], 100) }}</p>
                    <h3 class="h3-reviews-dreapta">{{ $review['author_name'] }}</h3>
                </div>
                <div>
                    @if(isset($review['profile_photo_url']))
                        <img class="poza-barbat" src="{{ $review['profile_photo_url'] }}" alt="{{ $review['author_name'] }}">
                    @else
                        <img class="poza-barbat" src="{{ asset('imagini/poza-barbat.svg') }}" alt="reviewer">
                    @endif
                </div>
            </div>
        @endif
    @empty
        <!-- Fallback static reviews -->
        <div class="review-stanga">
            <div class="mesaj-stanga">
                <img class="stele-stanga" src="{{ asset('imagini/Stele.svg') }}" alt="poza stele">
                <p class="p-stanga">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <h3 class="h3-reviews-stanga">Jessica Blue</h3>
            </div>
            <div class="img-stanga">
                <img class="poza-fata" src="{{ asset('imagini/poza-fata.svg') }}" alt="poza fata">
            </div>
        </div>
        <div class="review-dreapta">
            <div class="mesaj-dreapta">
                <img class="stele-dreapta" src="{{ asset('imagini/Stele.svg') }}" alt="poza stele">
                <p class="p-dreapta">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <h3 class="h3-reviews-dreapta">Michael Towers</h3>
            </div>
            <div>
                <img class="poza-barbat" src="{{ asset('imagini/poza-barbat.svg') }}" alt="poza fata">
            </div>
        </div>
    @endforelse
</div>