<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
      'id','product_name','short_description','sale_price','quantity','images',
        'product_id'
    ];
    public function product()
    {
        return $this->belongsTo(Customer::class);
        return $this->hasMany(SaleInvoice::class);
    }
}
