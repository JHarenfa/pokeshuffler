<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Country;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;




class Cart_Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function addToCart(Request $request)
    {
        // Validate input
        if (!$request->has('product_id')) {
            return response()->json([
                'status' => false,
                'message' => 'Product ID is required'
            ]);
        }

        // Find the product
        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Record Not Found'
            ]);
        }

        // Initialize default response
        $status = false;
        $message = '';

        // Check if product is already in the cart
        $cartContent = Cart::content();
        $productAlreadyExist = false;

        foreach ($cartContent as $item) {
            if ($item->id == $product->product_id) {  // Ensure you compare the correct field (id or product_id)
                $productAlreadyExist = true;
                break; // Exit the loop once the product is found
            }
        }

        if ($productAlreadyExist) {
            $status = false;
            $message = $product->name . ' is already in the cart';
        } else {
            Cart::add($product->product_id, $product->name, 1, $product->price, [
                'productImage' => $product->image_url ?? ''
            ]);
            $status = true;
            $message = $product->name . ' added to the cart';
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }


    public function cart()
    {
        $cartContent = Cart::content();
        $data['cartContent'] = $cartContent;
        //dd(Cart::content());
        return view('cart_panel.cart', $data);
    }

    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;

        $itemInfo = Cart::get($rowId);

        // Check if the product exists
        $product = Product::find($itemInfo->id);



        if ($qty <= $product->stock) {
            Cart::update($rowId, $qty);
            $message = 'cart updated successfully';
            $status = true;
            session()->flash('success', $message);
        } else {
            $message = 'Requested qty(' . $qty . ') not available';
            $status = false;
            session()->flash('error', $message);
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }


    public function deleteItem(Request $request)
    {
        $itemInfo = Cart::get($request->rowId);


        if ($itemInfo == null) {
            $errorMsg = 'item not found';
            session()->flash('error', $errorMsg);
            return response()->json([
                'status' => false,
                'message' => $errorMsg
            ]);
        }
        Cart::remove($request->rowId);

        $successMsg = 'item removed successfully';
        session()->flash('success', $successMsg);
        return response()->json([
            'status' => true,
            'message' => $successMsg
        ]);

    }

    public function checkout()
    {
        if (Cart::count() == 0) {
            return redirect()->route('cart');
        }

        if (Auth::check() == false) {
            return redirect()->route('login');
        }

        $customerAddress = CustomerAddress::where('user_id', Auth::user()->id)->first();



        $countries = Country::orderBy('name', 'ASC')->get();
        return view('checkout_panel.checkout', [
            'countries' => $countries,
            'customerAddress' => $customerAddress
        ]);
    }

    public function processCheckout(Request $request)
    {
        //Apply validation
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'address' => 'required|min:20',
                'country' => 'required',
                'email' => 'required|email',
                'state' => 'required',
                'zip' => 'required',

            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Fix the errors',
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }


        // save data to customer address
        $user = Auth::user();

        CustomerAddress::updateOrCreate([
            'user_id' => $user->id
        ], [
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'country_id' => $request->country,
            'email' => $request->email,
            'state' => $request->state,
            'zip' => $request->zip,
        ]);

        //store data in orders
        if ($request->payment_method == 'cod' || $request->payment_method == 'credit') {
            $shipping = 0;
            $discount = 0;
            $subTotal = Cart::subtotal(2, '.', '');
            $grandTotal = $subTotal + $shipping;

            $order = new Order;
            $order->subtotal = $subTotal;
            $order->shipping = $shipping;
            $order->grand_total = $grandTotal;


            $order->user_id = $user->id;
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->phone_number = $request->phone_number;
            $order->address = $request->address;
            $order->country_id = $request->country;
            $order->email = $request->email;
            $order->state = $request->state;
            $order->zip = $request->zip;

            $order->save();

            //store order items in order items table
            foreach (Cart::content() as $key => $item) {
                $orderItem = new OrderItem;
                $orderItem->product_id = $item->id;
                $orderItem->order_id = $order->id;
                $orderItem->name = $item->name;
                $orderItem->qty = $item->qty;
                $orderItem->price = $item->price;
                $orderItem->total = $item->price * $item->qty;
                $orderItem->save();

                // Subtract stock from product
                $product = Product::find($item->id);
                if ($product && $product->stock >= $item->qty) {
                    $product->stock -= $item->qty;
                    $product->save();
                } else {
                    // Handle insufficient stock
                    return response()->json([
                        'message' => 'Insufficient stock for ' . $product->name,
                        'status' => false,
                    ]);
                }
            }

            session()->flash('success', 'You have successfully placed your order');

            Cart::destroy();

            return response()->json([
                'message' => 'Order Saved',
                'orderId' => $order->id,
                'status' => true,
            ]);


        } else {
            //
        }

    }

    public function thankYou($id)
    {
        return view('checkout_panel.thankyou', [
            'id' => $id
        ]);
    }

}