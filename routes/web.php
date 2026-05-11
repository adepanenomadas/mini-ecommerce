<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');

    Route::get('/cart', function () {
        return view('cart', [
            'carts' => \App\Models\Cart::where('user_id', auth()->id())->get()
        ]);
    })->name('cart.index');
});

require __DIR__.'/settings.php';
