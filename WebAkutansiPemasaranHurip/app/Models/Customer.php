<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $fillable = [
        'namacustomer', 'namaperusahaan', 'alamat', 'notelp', 'alamat_gudang', 'kota', 'email',
    ];
    
    public function salesOrders()
    {
        return $this->hasMany(SalesOrder::class, 'id_Customer');
    }
}
