<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Cart;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\DeliveryType;
use App\Models\DeliveryMethod;
use App\Models\GuestOrder;
use App\Models\GuestOrderProduct;
use Auth;
use App;

class ShopController extends Controller
{

    public function card($id, Request $request){
        if(session()->has('locale')) {
            $locale = session('locale');
            App::setLocale($locale);
        }
        else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        $subcategory = Subcategory::find($id)->translate(session('locale'));
        $products = Product::where('available', 1)->where('subcategory_id', $subcategory->id)->orderBy('price_kz', 'asc')->get()->translate(session('locale'));
        if($request->has('sort')) {
            $sort = $request->sort;
            if($sort == 'down')
                $products = Product::where('available', 1)->where('subcategory_id', $subcategory->id)->orderBy('price_kz', 'desc')->get()->translate(session('locale'));
            if($sort == 'up')
                $products = Product::where('available', 1)->where('subcategory_id', $subcategory->id)->orderBy('price_kz', 'asc')->get()->translate(session('locale'));

            return view('card', compact('subcategory', 'products', 'sort'));
        }
        $sort = 'up';
        return view('card', compact('subcategory', 'products', 'sort'));
    }

    public function category_show($id, Request $request){
        if(session()->has('locale')) {
            $locale = session('locale');
            App::setLocale($locale);
        }
        else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        $category = Category::find($id);
        $products = Product::where('available', 1)->where('category_id', $category->id)->orderBy('price_kz', 'asc')->get()->translate(session('locale'));
        if($request->has('sort')) {
            $sort = $request->sort;
            if($sort == 'down')
                $products = Product::where('available', 1)->where('category_id', $category->id)->orderBy('price_kz', 'desc')->get()->translate(session('locale'));
            if($sort == 'up')
                $products = Product::where('available', 1)->where('category_id', $category->id)->orderBy('price_kz', 'asc')->get()->translate(session('locale'));

                return view('category', compact('category', 'products', 'sort'));
        }
        $sort = 'up';
        return view('category', compact('category', 'products', 'sort'));
    }


    public function card_detail($id){
        if(session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        }
        else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        $product = Product::find($id)->translate(session('locale'));
        $products = Product::where('available', 1)->where('id', '!=', $id)->inRandomOrder()->take(3)->get()->translate(session('locale'));
        return view('carddetail', compact('product', 'products'));
    }

    public function cart_add(Request $request) {
        
        if(session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        }
        else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        if(!Auth::check()){
            if(!session('cart_items')){
                session(['cart_items' => []]);
            }
            $cart_items = session('cart_items');
            $answer = false;
            for($i = 0; $i < count($cart_items); $i++){
                if($cart_items[$i]['product_id'] == $request->product_id){
                    $cart_items[$i]['quantity'] = $cart_items[$i]['quantity']+$request->quantity;
                    $answer = true;
                }
            }
            // dd($cart_items);
            if($answer != true){
                array_push($cart_items, ['product_id' => $request->product_id, 'quantity' => $request->quantity]);
            }
            session(['cart_items' => $cart_items]);
            // dd(session('cart'));
        }
        else{
            $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->get();
            if($cart->isEmpty() == false){
                $cart[0]->update(['quantity' => $cart[0]->quantity + $request->quantity]);
            }
            else{
                Cart::create([
                    'user_id'=>Auth::user()->id,
                    'product_id'=>$request->product_id,
                    'quantity'=>$request->quantity,
                ]);
            }
        }
        // dd(session('cart'));
        // return redirect()->back();
        return redirect()->back()->with('cart', 'cart');
    }

    public function cart_remove(Request $request) {
        if(session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        }
        else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->first()->delete();
        return redirect()->back();
    }

    public function cart(Request $request){
        if(session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        }
        else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        $deliveries = DeliveryType::all();
        foreach($deliveries as $delivery){
            $delivery->methods = $delivery->DeliveryMethods;
        }
        
        if(!Auth::check()){
            if(!session('cart_items')){
                session(['cart_items' => []]);
            }
            $cart_items = session('cart_items');

        }
        else{
            $cart_items = Cart::where('user_id', Auth::user()->id)->get();
        }
        $sum = 0;
        $discount = 0;
        $discountSum = 0;
        foreach($cart_items as $item) {
            if(!Auth::check()){
                $product = Product::find($item['product_id']);
            } else{
                $product = Product::find($item->product_id);
            }
            if(session('currency') == 'USD'){
                $price = $product->price_uah;
            }else if(session('currency') == 'RUB'){
                $price = $product->price_ru;
            }else{
                $price = $product->price_kz;
            }
            if(!Auth::check()){
                $sum+= $price * $item['quantity'];
            } else{
                $sum+= $price * $item->quantity;
            }
            $discount += $product->sale;
            $discountSum += $product->price_kz - ( $product->price_kz * ($product->sale / 100));
        }

        $popular = Product::where('available', 1)->inRandomOrder()->take(3)->get()->translate(session('locale'));
        return view('cart', compact('cart_items', 'sum', 'popular', 'discount', 'discountSum', 'deliveries'));
    }
    public function add_order(Request $request){
        if(session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        }
        else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        $order = Order::Create([
            'user_id'=> Auth::user()->id,
            'sum'=>$request->sum,
            'status' => 'В обработке'
        ]);
        $products = $request->products;
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        for($i = 0; $i <= count($products)-1; $i++){
            OrderProduct::Create([
                'product_id'=>$products[$i],
                'order_id'=>$order->id,
                'quantity'=>$carts[$i]->quantity,
            ]);
        }
        foreach($carts as $cart){
            $cart->delete();
        }
        return redirect('/office');
    }

    public function add_guest_order(Request $request){
        if(session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        }
        else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }
        // dd($request->all());
        $order = GuestOrder::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'telephone' => $request->telephone,
            'mail' => $request->mail,
            'city' => $request->delivery_0,
            'branch' => $request->delivery_1,
            'department' => $request->delivery_2,
            'payment' => $request->payment,
            'comment' => $request->comment,
            'sum'=>$request->sum,
            'status' => 'В обработке',
        ]);
        $products = $request->products;
        $quantities = $request->quantities;
        for($i = 0; $i <= count($products)-1; $i++){
            GuestOrderProduct::Create([
                'product_id'=>$products[$i],
                'order_id'=>$order->id,
                'quantity'=>$quantities[$i],
            ]);
        }

        session(['cart_items' => []]);
        return redirect('/cart');
    }

    public function office(){
        if(session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        }
        else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get()->translate(session('locale'));
        $popular = Product::where('available', 1)->inRandomOrder()->take(3)->get()->translate(session('locale'));

        return view('office', compact('orders', 'popular'));
    }

    public function currency_change($currency, Request $request){
        if(session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        }
        else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        session(['currency' => $currency]);
        return redirect()->back();
    }

}
