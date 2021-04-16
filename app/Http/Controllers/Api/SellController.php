<?php

namespace App\Http\Controllers\Api;

use App\Models\Sell;
use App\Models\Product;
use App\Models\MarketUser;
use App\Models\SellDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiSellResource;

class SellController extends Controller
{
    public function __construct()
    {
        $this->middleware('consults');
    }

    public function sell(Request $request)
    {
        $relation = MarketUser::find($request->relation_id);

        $sell = Sell::create([
            'market_id' => $relation->market_id,
            'user_id' => $relation->user_id,
            'is_active' => true
        ]);

        $test = [];

        foreach ($request->sells as $det) {
            $product = Product::find($det['product_id']);

            $detail = SellDetail::create([
                'quant' => $det['quant'],
                'total' => $det['quant'] * $product->price,
                'sell_id' => $sell->id,
                'product_id' => $product->id,
            ]);
        }

        return response()->json(new ApiSellResource($sell), 200);
    }
}
