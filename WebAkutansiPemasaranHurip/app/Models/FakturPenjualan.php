<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakturPenjualan extends Model
{
    use HasFactory;
    protected $table = 'fakturpenjualan';
    protected $fillable = [
        'id_SO',
        'id_Form',
        'id_produk',
        'no_inv',
        'tgl_inv',
        'payment',
        'namakios',
        'pemilik',
        'nofpb',
        'catatan',
        'namasales',
    ];

    protected $guarded = [];

    public function salesOrders()
    {
        return $this->belongsTo(SalesOrder::class, 'id_SO');
    }
    
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function form()
    {
        return $this->belongsTo(Form::class, 'id_Form');
    }
}
