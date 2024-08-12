<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;

    protected $table = 'deliveryorder';

    protected $fillable = [
        'id_SalesOrder',
        'no_DO',
        'tgl_DO',
    ];
    
    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class, 'id_SalesOrder');
    }
}
