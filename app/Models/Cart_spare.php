<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_spare extends Model
{
    use HasFactory;
    protected $table = 'cart_spare';

    protected $fillable = [
        'user_id',
        'sparepart_id',
        'quantity',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the spare part associated with the cart.
     */
    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }
}
