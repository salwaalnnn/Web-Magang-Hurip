<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPAIND extends Model
{
    use HasFactory;

    protected $table = 'spaind';
    protected $guarded =[];
    protected $fillable = [
        'id_SO',
        'id_Form',
        'id_DO',
        'no_inv',
        'tgl_inv',
        'nopolisi',
        'party',
        'nm_pengirim',
    ];

    public function salesOrders()
    {
        return $this->belongsTo(SalesOrder::class, 'id_SO');
    }
    
    public function deliveryOrders()
    {
        return $this->belongsTo(DeliveryOrder::class, 'id_DO');
    }

    public function form()
    {
        return $this->belongsTo(Form::class, 'id_Form');
    }
}
