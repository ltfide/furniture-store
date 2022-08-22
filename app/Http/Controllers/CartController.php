<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->get();
        return CartResource::collection($user);
    }

    public function getAllCart()
    {
        $allCartData = Cart::where('user_id', Auth::id())->get();
        return CartResource::collection($allCartData);
    }

    public function cartNotification()
    {
        $allCart = Cart::where('user_id', Auth::id())->count();
        return $allCart;
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
            'product_id' => 'required' 
        ]);

        $userId = Auth::id();

        $checkDuplicate = Cart::where('user_id', $userId)
                            ->where('product_id', $request->product_id)
                            ->first();

        if ($checkDuplicate) {
            Cart::where('user_id', $userId)
                    ->where('product_id', $request->product_id)
                    ->update(['quantity' => $checkDuplicate->quantity + $request->quantity]);
            return response()
                    ->json([
                        'message' => 'Item cart berhasil di tambahkan'
                    ]);
        }

        Cart::insert([
            'quantity' => $request->quantity,
            'product_id' => $request->product_id,
            'user_id' => $userId,
        ]);

        return response()
                ->json([
                    'message' => 'Item cart berhasil di tambahkan'
                ]);
    }

    public function deleteCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required' 
        ]);

        $userId = Auth::id();

        $checkDuplicate = Cart::where('user_id', $userId)->where('product_id', $validated['product_id']);
        if (!$checkDuplicate) return response()->json(['message' => 'Item cart gagal di hapus']);
        $checkDuplicate->delete();

        return response()->json([
            'message' => 'Item cart berhasil di hapus'
        ]);
    }
}
