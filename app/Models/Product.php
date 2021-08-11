<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Customer::class);
        return $this->hasMany(SaleInvoice::class);
    }
}
