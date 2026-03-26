<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
class MenuItemShow extends Component
{
    public array $item;

    public function mount(int $id): void
    {
        $item = $this->menuItems()->firstWhere('id', $id);
        abort_if(!$item, 404);
        $this->item = $item;
    }


protected function menuItems(): Collection
{
    return collect([
        // PIZZA ITEMS (6 items)
        [
            'id' => 1,
            'name' => 'Margherita',
            'category' => 'pizza',
            'image' => 'imagini/menu/pizza1.svg',
            'description' => 'Classic Neapolitan pizza with San Marzano tomato sauce, fresh buffalo mozzarella, and aromatic basil leaves. Cooked in a wood-fired oven for authentic flavor.',
        ],
        [
            'id' => 2,
            'name' => 'Pepperoni Pizza',
            'category' => 'pizza',
            'image' => 'imagini/menu/pizza2.svg',
            'description' => 'Spicy pepperoni slices, premium mozzarella, and rich tomato sauce on a hand-tossed crust. Perfectly baked until golden and crispy.',
        ],
        [
            'id' => 3,
            'name' => 'Quattro Stagioni',
            'category' => 'pizza',
            'image' => 'imagini/menu/pizza3.svg',
            'description' => 'Four seasons pizza divided into sections: artichokes, mushrooms, ham, and olives. Each quarter represents a different season of the year.',
        ],
        [
            'id' => 4,
            'name' => 'Hawaiian Pizza',
            'category' => 'pizza',
            'image' => 'imagini/menu/pizza4.svg',
            'description' => 'Sweet pineapple chunks, premium ham, and mozzarella cheese on tomato sauce. A tropical twist on classic pizza.',
        ],
        [
            'id' => 5,
            'name' => 'Vegetarian Pizza',
            'category' => 'pizza',
            'image' => 'imagini/menu/pizza5.svg',
            'description' => 'Loaded with fresh bell peppers, mushrooms, onions, black olives, and tomatoes. A garden-fresh vegetarian delight.',
        ],
        [
            'id' => 6,
            'name' => 'Four Cheese',
            'category' => 'pizza',
            'image' => 'imagini/menu/pizza6.svg',
            'description' => 'A rich blend of mozzarella, gorgonzola, parmesan, and fontina cheeses on a creamy white sauce. Cheese lover\'s dream.',
        ],
        
        // PASTA ITEMS (6 items)
        [
            'id' => 7,
            'name' => 'Carbonara',
            'category' => 'pasta',
            'image' => 'imagini/menu/pasta1.svg',
            'description' => 'Traditional Roman pasta with eggs, pecorino cheese, pancetta, and black pepper. Creamy without cream.',
        ],
        [
            'id' => 8,
            'name' => 'Bolognese',
            'category' => 'pasta',
            'image' => 'imagini/menu/pasta2.svg',
            'description' => 'Slow-cooked meat sauce with ground beef, tomatoes, carrots, celery, and red wine. Served with tagliatelle pasta.',
        ],
        [
            'id' => 9,
            'name' => 'Alfredo',
            'category' => 'pasta',
            'image' => 'imagini/menu/pasta3.svg',
            'description' => 'Creamy parmesan sauce with butter, garlic, and fettuccine pasta. Garnished with fresh parsley.',
        ],
        [
            'id' => 10,
            'name' => 'Pesto Pasta',
            'category' => 'pasta',
            'image' => 'imagini/menu/pasta4.svg',
            'description' => 'Fresh basil pesto with pine nuts, garlic, parmesan, and olive oil. Served with spaghetti or linguine.',
        ],
        [
            'id' => 11,
            'name' => 'Lasagna',
            'category' => 'pasta',
            'image' => 'imagini/menu/pasta5.svg',
            'description' => 'Layered pasta sheets with beef ragu, béchamel sauce, and mozzarella. Baked until golden and bubbly.',
        ],
        [
            'id' => 12,
            'name' => 'Seafood Pasta',
            'category' => 'pasta',
            'image' => 'imagini/menu/pasta6.svg',
            'description' => 'Mixed seafood (shrimp, mussels, clams) in a garlic white wine sauce with spaghetti. Fresh from the sea.',
        ],
        
        // DESSERT ITEMS (6 items)
        [
            'id' => 13,
            'name' => 'Tiramisu',
            'category' => 'dessert',
            'image' => 'imagini/menu/desert1.svg',
            'description' => 'Layers of coffee-soaked ladyfingers and mascarpone cream, dusted with cocoa powder. Classic Italian dessert.',
        ],
        [
            'id' => 14,
            'name' => 'Cheesecake',
            'category' => 'dessert',
            'image' => 'imagini/menu/desert2.svg',
            'description' => 'New York-style cheesecake with graham cracker crust and strawberry topping. Rich and creamy.',
        ],
        [
            'id' => 15,
            'name' => 'Chocolate Cake',
            'category' => 'dessert',
            'image' => 'imagini/menu/desert3.svg',
            'description' => 'Triple-layer chocolate cake with chocolate ganache and buttercream frosting. Decadent and moist.',
        ],
        [
            'id' => 16,
            'name' => 'Ice Cream Sundae',
            'category' => 'dessert',
            'image' => 'imagini/menu/desert4.svg',
            'description' => 'Vanilla ice cream with chocolate sauce, whipped cream, nuts, and a cherry on top. Classic sundae.',
        ],
        [
            'id' => 17,
            'name' => 'Fruit Tart',
            'category' => 'dessert',
            'image' => 'imagini/menu/desert5.svg',
            'description' => 'Buttery tart shell filled with pastry cream and topped with fresh seasonal fruits. Light and refreshing.',
        ],
        [
            'id' => 18,
            'name' => 'Profiteroles',
            'category' => 'dessert',
            'image' => 'imagini/menu/desert6.svg',
            'description' => 'Choux pastry balls filled with vanilla cream, topped with chocolate sauce. French classic.',
        ],
        
        // GRILL ITEMS (6 items)
        [
            'id' => 19,
            'name' => 'Classic Burger',
            'category' => 'grill',
            'image' => 'imagini/menu/grill1.svg',
            'description' => '200g beef patty with lettuce, tomato, onion, pickles, and special sauce on a brioche bun.',
        ],
        [
            'id' => 20,
            'name' => 'Grilled Chicken',
            'category' => 'grill',
            'image' => 'imagini/menu/grill2.svg',
            'description' => 'Marinated chicken breast grilled to perfection, served with roasted vegetables and herb butter.',
        ],
        [
            'id' => 21,
            'name' => 'BBQ Ribs',
            'category' => 'grill',
            'image' => 'imagini/menu/grill3.svg',
            'description' => 'Slow-cooked pork ribs with homemade BBQ sauce, coleslaw, and cornbread. Fall-off-the-bone tender.',
        ],
        [
            'id' => 22,
            'name' => 'Steak',
            'category' => 'grill',
            'image' => 'imagini/menu/grill4.svg',
            'description' => '250g ribeye steak cooked to your preference, served with garlic butter and potato gratin.',
        ],
        [
            'id' => 23,
            'name' => 'Grilled Salmon',
            'category' => 'grill',
            'image' => 'imagini/menu/grill5.svg',
            'description' => 'Atlantic salmon fillet with lemon dill sauce, asparagus, and quinoa. Healthy and flavorful.',
        ],
        [
            'id' => 24,
            'name' => 'Vegetable Skewers',
            'category' => 'grill',
            'image' => 'imagini/menu/grill6.svg',
            'description' => 'Grilled seasonal vegetables on skewers with herb marinade. Served with tahini yogurt dip.',
        ],
        
        // DRINK ITEMS (6 items)
        [
            'id' => 25,
            'name' => 'Coca Cola',
            'category' => 'drinks',
            'image' => 'imagini/menu/drink1.svg',
            'description' => 'Classic cola served ice cold. 330ml can. Refreshing and crisp.',
        ],
        [
            'id' => 26,
            'name' => 'Orange Juice',
            'category' => 'drinks',
            'image' => 'imagini/menu/drink2.svg',
            'description' => 'Freshly squeezed orange juice, served chilled. Rich in vitamin C.',
        ],
        [
            'id' => 27,
            'name' => 'Iced Tea',
            'category' => 'drinks',
            'image' => 'imagini/menu/drink3.svg',
            'description' => 'Brewed black tea with lemon slices and mint. Sweetened to perfection.',
        ],
        [
            'id' => 28,
            'name' => 'Coffee',
            'category' => 'drinks',
            'image' => 'imagini/menu/drink4.svg',
            'description' => 'Freshly brewed Arabica coffee. Served black or with milk and sugar on the side.',
        ],
        [
            'id' => 29,
            'name' => 'Beer',
            'category' => 'drinks',
            'image' => 'imagini/menu/drink5.svg',
            'description' => 'Local craft lager, 500ml. Crisp, refreshing, with subtle hop notes.',
        ],
        [
            'id' => 30,
            'name' => 'Wine',
            'category' => 'drinks',
            'image' => 'imagini/menu/drink6.svg',
            'description' => 'House red or white wine, 175ml glass. Selected from local vineyards.',
        ],
        
        // ASIAN ITEMS (6 items)
        [
            'id' => 31,
            'name' => 'Sushi Platter',
            'category' => 'asian',
            'image' => 'imagini/menu/asian1.svg',
            'description' => 'Assorted nigiri and maki rolls with fresh tuna, salmon, avocado, and cucumber. Served with soy sauce and wasabi.',
        ],
        [
            'id' => 32,
            'name' => 'Ramen',
            'category' => 'asian',
            'image' => 'imagini/menu/asian2.svg',
            'description' => 'Rich pork broth ramen with chashu pork, soft-boiled egg, nori, and bamboo shoots. Authentic Japanese comfort food.',
        ],
        [
            'id' => 33,
            'name' => 'Spring Rolls',
            'category' => 'asian',
            'image' => 'imagini/menu/asian3.svg',
            'description' => 'Crispy vegetarian spring rolls with cabbage, carrots, and glass noodles. Served with sweet chili sauce.',
        ],
        [
            'id' => 34,
            'name' => 'Pad Thai',
            'category' => 'asian',
            'image' => 'imagini/menu/asian4.svg',
            'description' => 'Stir-fried rice noodles with shrimp, tofu, bean sprouts, peanuts, and tamarind sauce. Thai street food classic.',
        ],
        [
            'id' => 35,
            'name' => 'Dumplings',
            'category' => 'asian',
            'image' => 'imagini/menu/asian5.svg',
            'description' => 'Pan-fried pork and vegetable dumplings with soy-ginger dipping sauce. 8 pieces per serving.',
        ],
        [
            'id' => 36,
            'name' => 'Fried Rice',
            'category' => 'asian',
            'image' => 'imagini/menu/asian6.svg',
            'description' => 'Wok-fried jasmine rice with egg, peas, carrots, and your choice of chicken, beef, or shrimp.',
        ],
    ]);
}

     public function render()
    {
        // Return view without any layout
        return view('livewire.menu-item-show'); 
    }
}