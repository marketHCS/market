<?php

namespace App\Models;

use App\Models\Market;
use App\Models\RoleOnMarkets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MarketUser extends Model
{
    use HasFactory;

    protected $fillable =[
        'uuid',
        'market_id',
        'user_id',
        'role_id',
        'is_main'
    ];

    protected $table = 'market_users';

    /**
     * Get the user associated with the MarketUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get the market associated with the MarketUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function market()
    {
        return $this->hasOne(Market::class, 'id', 'market_id');
    }

    /**
     * Get the role associated with the MarketUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne(RoleOnMarkets::class, 'id', 'role_id');
    }
}
