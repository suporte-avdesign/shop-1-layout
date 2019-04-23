<?php

namespace AVD\Http\Controllers\Web;

use Illuminate\Http\Request;
use AVD\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $json = $request['wc-ajax'];
        $list = 1;
        $quantity = 2;
        $total = '159,00';

        $fragments = view('carts.cart-1-fragments', compact('list','quantity','total', 'json'))->render();
        $cart_quantity = view('carts.cart-1-quantity', compact('quantity'))->render();
        $cart_total = view('carts.cart-1-total', compact('total'))->render();

        $out = array(
            "fragments" => array (
                "div.widget_shopping_cart_content" => $fragments,
                "span.basel-cart-number" => $cart_quantity,
                "span.basel-cart-subtotal" => $cart_total
            ),
            "cart_hash" => "0befc4f1367d4bf7341fb19d577d37a1"
        );

        return response()->json($out);


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function undo($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $json = $request['wc-ajax'];
        $list = 1;
        $quantity = 0;
        $total = '0,00';

        $fragments = view('carts.cart-1-fragments', compact('list', 'quantity', 'total','json'))->render();
        $cart_quantity = view('carts.cart-1-quantity', compact('quantity'))->render();
        $cart_total = view('carts.cart-1-total', compact('total'))->render();

        $out = array(
            "fragments" => array (
                "div.widget_shopping_cart_content" => $fragments,
                "span.basel-cart-number" => $cart_quantity,
                "span.basel-cart-subtotal" => $cart_total
            ),
            "cart_hash" => ""
        );

        return response()->json($out);

    }


    public function product(Request $request)
    {
        sleep(2);
        $action = $request->input('action');
        $attribute_pa_color = $request->input('attribute_pa_color');
        $attribute_pa_size = $request->input('attribute_pa_size');
        $quantity = $request->input('quantity');
        $add_to_cart = $request->input('add-to-cart');
        $product_id = $request->input('product_id');
        $variation_id = $request->input('variation_id');

        if ($action == 'basel_ajax_add_to_cart') {
            $product = 'Produto 2';
            $list = 1;
            $quantity = 3;
            $total = '259,00';

            $notices = view('carts.cart-1-notices', compact('product','quantity'))->render();
            $fragments = view('carts.cart-1-fragments', compact('list','quantity','total'))->render();
            $cart_quantity = view('carts.cart-1-quantity', compact('quantity'))->render();
            $cart_total = view('carts.cart-1-total', compact('total'))->render();

            $out = array(
                "notices" => $notices,
                "fragments" => array(
                "div.widget_shopping_cart_content" => $fragments,
                    "span.basel-cart-number" => $cart_quantity,
                    "span.basel-cart-subtotal" => $cart_total
                ),
                "cart_hash" => "0befc4f1367d4bf7341fb19d577d37a1"
            );
        }



        return response()->json($out);


    }


    public function fragments(Request $request)
    {
        $action = $request->input('wc-ajax');

        $list = 1;
        $quantity = 2;
        $total = '159,00';

        $fragments = view('carts.cart-1-fragments', compact('list','quantity','total'))->render();
        $cart_quantity = view('carts.cart-1-quantity', compact('quantity'))->render();
        $cart_total = view('carts.cart-1-total', compact('total'))->render();

        $out = array(
            "fragments" => array (
                "div.widget_shopping_cart_content" => $fragments,
                "span.basel-cart-number" => $cart_quantity,
                "span.basel-cart-subtotal" => $cart_total
            ),
            "cart_hash" => "0befc4f1367d4bf7341fb19d577d37a1"
        );

        return response()->json($out);


    }

}
