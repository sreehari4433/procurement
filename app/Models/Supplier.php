<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Supplier extends Model
{

    protected $fillable = ['name', 'address', 'tax_no', 'country', 'mobile_no', 'email', 'status'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
