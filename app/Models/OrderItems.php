<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Orders;
use App\Models\Lamparas;

class OrderItems extends Model
{
    protected $table = 'order_items';

    protected $primaryKey = 'order_items_id';

    protected $fillable = ['order_items_price', 'order_items_qnty', 'order_id_fk', 'product_id_fk'];

    public function order(){
        return $this->belongsTo(Orders::class, 'order_id_fk', 'order_id');
    }

    public function product(){
        return $this->belongsTo(Lamparas::class, 'product_id_fk', 'lamp_id');
    }
}
