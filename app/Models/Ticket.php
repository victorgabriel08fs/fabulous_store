<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'activated', 'order_id', 'paid_by', 'received_by'];

    public static function generateCode()
    {
        $alpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'X', 'Y', 'W', 'Z'];

        $code = '';

        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 4; $j++) {
                if (rand(0, 2) == 0) {
                    $code = $code . rand(0, 9);
                } else {
                    $code = $code . $alpha[rand(0, 25)];
                }
            }
            if ($i != 4) {
                $code =  $code . '-';
            }
        };
        if (isset(Ticket::where('code', $code)->get()->first()->id)) {
            Ticket::generateCode();
        } else {
            return $code;
        }
    }


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
