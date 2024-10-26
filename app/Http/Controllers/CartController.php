<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the cart items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère les items du panier
        $cartItems = Cart::content();

        // On retourne la vue 'cart' avec les items du panier
        return view('cart', ['cart' => $cartItems]);
    }

    /**
     * Store a newly created item in the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Ajouter l'article au panier avec des options supplémentaires comme l'image
    Cart::add($request->id, $request->name, 1, $request->price, ['image' => $request->image])
        ->associate('App\Models\Produit');

    return redirect()->route('cart')->with('success', 'The product has been successfully added.');
}

    /**
     * Update the quantity of the cart item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $rowId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        // Mettre à jour la quantité de l'item dans le panier
        Cart::update($rowId, $request->quantity);

        return redirect()->route('cart')->with('success', 'The cart has been updated.');
    }

    /**
     * Remove the specified item from the cart.
     *
     * @param  string  $rowId
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        // Retirer l'article du panier
        Cart::remove($rowId);

        return redirect()->route('cart')->with('success', 'The product has been removed.');
    }
}
