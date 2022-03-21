<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryProduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'library_id'];

    public function library()
    {
        return $this->belongsTo('App\Models\Library');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
