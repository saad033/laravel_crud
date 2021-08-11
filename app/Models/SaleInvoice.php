<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    use HasFactory;

    public function saleInvoice()
    {
        return $this->belongsTo(Customer::class);
        return $this->belongsTo(Product::class);
    }

}
