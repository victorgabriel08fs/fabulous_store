<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['reg', 'activated', 'order_id', 'paid_by', 'received_by'];

    public function receiver()
    {
        return $this->belongsTo('App\Models\User', 'received_by');
    }
    public function paying()
    {
        return $this->belongsTo('App\Models\User', 'paid_by');
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
