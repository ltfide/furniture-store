<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the Carts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::id())->get();
        return CartResource::collection($user);
    }

    /**
     * Add item to cart
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'id_product' => 'required' 
        ]);

        $userId = Auth::id();

        $checkDuplicate = DB::table('product_user')
                            ->where('user_id', $userId)
                            ->where('product_id', $validated['id_product'])
                            ->first();

        if ($checkDuplicate) {
            return response()
                    ->json([
                        'message' => 'Item cart sudah ada'
                    ]);
        }

        DB::table('product_user')->insert([
            'user_id' => $userId,
            'product_id' => $validated['id_product']
        ]);

        return response()
                ->json([
                    'message' => 'Item cart berhasil di tambahkan'
                ]);
    }

    /**
     * Delete item from cart
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteCart(Request $request)
    {
        $validated = $request->validate([
            'id_product' => 'required' 
        ]);

        $userId = Auth::id();

        $checkDuplicate = DB::table('product_user')->where('user_id', $userId)->where('product_id', $validated['id_product']);
        if (!$checkDuplicate) return response()->json(['message' => 'Item cart gagal di hapus']);
        $checkDuplicate->delete();

        return response()->json([
            'message' => 'Item cart berhasil di hapus'
        ]);
    }
}
