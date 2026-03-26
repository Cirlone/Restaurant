<?php

namespace App\Livewire;

use Livewire\Component;
use SKAgarwal\GoogleApi\PlacesApi;

class GoogleReviews extends Component
{
    public $reviews = [];
    
    public function mount()
    {
        $this->fetchReviews();
    }
    
    public function fetchReviews()
    {
        try {
            \Log::info('Attempting to fetch Google reviews...');
            
            $googlePlaces = new PlacesApi(env('GOOGLE_PLACES_API_KEY'));
            $response = $googlePlaces->placeDetails(env('GOOGLE_PLACE_ID'));
            
            \Log::info('API Response:', ['response' => $response]);
            
            if (isset($response['result']['reviews']) && count($response['result']['reviews']) > 0) {
                $this->reviews = array_slice($response['result']['reviews'], 0, 5);
                \Log::info('Reviews found:', ['count' => count($this->reviews)]);
            } else {
                \Log::info('No reviews in response');
                $this->reviews = [];
            }
        } catch (\Exception $e) {
            \Log::error('Google API Error: ' . $e->getMessage());
            $this->reviews = [];
        }
    }
    
    public function render()
    {
        return view('livewire.google-reviews');
    }
}