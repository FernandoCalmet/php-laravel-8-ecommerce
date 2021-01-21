<?php

use App\Http\Livewire\AboutUsComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactUsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\PrivacyPolicyComponent;
use App\Http\Livewire\ReturnPolicyComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\TermsConditionsComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class);

Route::get('/cart', CartComponent::class);

Route::get('/checkout', CheckoutComponent::class);

Route::get('/contact-us', ContactUsComponent::class);

Route::get('/about-us', AboutUsComponent::class);

Route::get('/privacy-policy', PrivacyPolicyComponent::class);

Route::get('/return-policy', ReturnPolicyComponent::class);

Route::get('/terms-conditions', TermsConditionsComponent::class);
