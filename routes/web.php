<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;





Route::get('/', function () {
    return view('welcome');
})->name('product');


Route::get('/product/{catid?}', function ($catid = null) {


    if ($catid == null) {
        $result = DB::table('produits')->get();
        return view('product', ['produits' => $result]);
    } else {
        $result = DB::table('produits')->where('category_id', $catid)->get();
        return view('product', ['produits' => $result]);
    }

    // dd($catid) ; // hdi ktbynli dkchi f chacha oktwqf dkchi li lthf



})->name('product');








Route::get('/category/{catid?}', function ($catid = null) {
    if ($catid == null) {
        $result = DB::table('catégories')->get();
        return view('category', ['catégories' => $result]);
    } else {
        $result = DB::table('catégories')->where('category_id', $catid)->get();
        return view('category', ['catégories' => $result]);
    }

    
 // dd($catid) ; // hdi ktbynli dkchi f chacha oktwqf dkchi li lthf

    
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/Shop/{catid?}', function ($catid = null) {

    $result = DB::table('produits')->when($catid, function($query) use ($catid) {
        $query->where('category_id', $catid);
    })->get();
    $items = DB::table('catégories')->get();

    $catid = DB::table('catégories')->where('id', $catid)->first();

    return view('Shop' , ['produits'=> $result, 'items' => $items, 'cat' => $catid]); 

})->name('product');




Route::get('/cart', function () {

    $result = DB::table('cart')->get();


    return view('cart' , ['cart'=> $result]);
})->name('cart');


Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/Contact', function () {
    return view('contact');
});



Route::get('/singleproduct/{catid?}', function ($catid = null) {

    $result = DB::table('produits')->when($catid, function($query) use ($catid) {
        $query->where('category_id', $catid);
    })->get();
    $items = DB::table('catégories')->get();

    $catid = DB::table('catégories')->where('id', $catid)->first();

    return view('singleproduct' , ['produits'=> $result, 'items' => $items, 'cat' => $catid]); 

})->name('product');


//Cart rout 
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add'); 


// Afficher le panier
Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Ajouter un produit au panier
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');

// Mettre à jour la quantité d'un produit dans le panier
Route::put('/cart/update/{rowId}', [CartController::class, 'update'])->name('cart.update');

// Supprimer un produit du panier
Route::delete('/cart/destroy/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');

