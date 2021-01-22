<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }
    
    use WithPagination;    
    public function render()
    {
        if($this->sorting == 'date'){
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price'){
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price-desc'){
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::paginate($this->pagesize);
        }
        
        $popular_products = Product::inRandomOrder()->limit(4)->get();

        return view('livewire.shop-component', [
            'products' => $products,
            'popular_products' => $popular_products
        ])->layout('layouts.base');
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');

        return redirect()->route('product.cart');
    }    
}
