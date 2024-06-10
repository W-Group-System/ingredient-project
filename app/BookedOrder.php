<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookedOrder extends Model
{
    protected $fillable = ['name', 'type'];

    public function bookedOrder()
    {
        return $this->belongsTo(BookedOrder::class, 'booked_order_id');
    }
}
