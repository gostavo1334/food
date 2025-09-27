<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Menu;

class CartController extends Controller
{
   public function addToCart($id, Request $request)
{
    $menu = Menu::find($id);
    if (!$menu) {
        return redirect()->back()->with('error', 'Menu item not found!');
    }

    $cart = session('cart', []);

    if (isset($cart[$id])) {
        // If the item already exists in the cart, increment the quantity
        $cart[$id]['quantity'] += 1;
    } else {
        // If the item is new, set the quantity to 1
        $cart[$id] = [
            "name" => $menu->name,
            "description" => $menu->description,
            "quantity" => 1, // Initialize quantity to 1
            "price" => $menu->price,
        ];
    }

    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Item added to cart successfully!');
}

    public function index()
    {
        $cartItems = session('cart', []);
        return view('menus.cart', compact('cartItems'));
    }

    public function calculateTotal(): float
    {
    $cart = session('cart', []);
    $total = 0.0;

    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    return $total;
    }

}
