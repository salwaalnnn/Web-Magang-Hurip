<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'namaproduk',
        'qtyunit',
        'qtysatuan',
        'hargaunit',
        'jenisproduk',
    ];

    protected $guarded = [];

    public function salesOrders()
    {
        return $this->hasMany(SalesOrder::class, 'id_Produk');
    }
    
}
