<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
use HasFactory;

class Item extends Model
{

    protected $fillable = ['name', 'inventory_location', 'brand', 'category', 'supplier_id', 'stock_unit', 'unit_price', 'item_images', 'status'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
   
}
