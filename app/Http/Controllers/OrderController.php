<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->paginate(10);
        return view('order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product, Request $request)
    {

        // if ($request->discount) {
        //     $discount = $request->discount;
        // } else {
        $discount = 0;
        // }
        return view('order.create', ['product' => $product, 'discount' => $discount]);
    }

    public function validateCoupon(Request $request)
    {
        // $product = Product::find($request->product);
        // if ($request->coupon) {
        //     $coupon = Coupon::where('code', $request->coupon)->get()->first();
        //     if ($coupon && $coupon->usage_times < $coupon->max_usage_times) {
        //         $discount = $coupon->discount;
        //         $coupon->usage_times = $coupon->usage_times + 1;
        //         $coupon->save();
        //         return redirect()->route('order.create-page', ['product' => $product, 'discount' => $discount])->withErrors(['success' => 'Cupom resgatado']);
        //     } else
        //         return redirect()->route('order.create-page', ['product' => $product])->withErrors(['error' => 'Cupom inválido']);
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reg = (string)rand(1, 100000);
        while (Order::where('reg', $reg)->get()->first()) {
            $reg = (string)rand(1, 100000);
        }
        Order::create(['reg' => $reg, 'product_id' => $request->product_id, 'total' => $request->total, 'subtotal' => $request->subtotal, 'user_id' => auth()->user()->id]);
        return redirect()->route('order.index')->withErrors(['success' => 'Pedido confirmado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->status = $request->status;
        if ($order->status == 2) {
            if ($order->ticket->activated == 1) {
                return redirect()->back()->withErrors(['error' => 'Este pedido não pode mais ser cancelado']);
            } else {
                $order->save();
                return redirect()->back()->withErrors(['success' => 'Pedido cancelado']);
            }
        }
        if ($order->status == 1) {
            $order->save();
            return redirect()->back()->withErrors(['success' => 'Pagamento recebido']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
