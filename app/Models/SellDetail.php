<?php

namespace App\Models;

use App\Models\Sell;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SellDetail extends Model
{
    use HasFactory;

    protected $fillable =[
        'quant',
        'total',
        'sell_id',
        'product_id',
    ];

    /**
     * Get the product associated with the SellDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * Get the sell that owns the SellDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sell()
    {
        return $this->belongsTo(Sell::class, 'sell_id', 'id');
    }
}
