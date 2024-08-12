<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $table = 'salesorder';
    
    protected $fillable = [
        'No_SO',
        'tglSO',
        'id_Produk', 
        'id_Customer',
        'tonase',
        'satuan',
        'diskon',
        'pajak',
        'ton',
        'kg',
        'zak',
        'jumlah',
        'total',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_Produk');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_Customer');
    }

    public function spmans()
    {
        return $this->hasOne(SPMANS::class, 'id_SO');
    }

    public function deliveryOrder()
    {
        return $this->hasOne(DeliveryOrder::class, 'id_SalesOrder');
    }

    public function spaind()
    {
        return $this->hasOne(SPAIND::class, 'id_SO');
    }
    public function spansub()
    {
        return $this->hasOne(SPANSUB::class, 'id_SO');
    }
    public function invoice()
    {
        return $this->hasOne(FakturPenjualan::class, 'id_SO');
    }
}
