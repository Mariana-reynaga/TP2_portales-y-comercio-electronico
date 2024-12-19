<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;

class Orders extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    protected $fillable = ['reciever_name', 'order_adress', 'order_postal_code', 'order_notes', 'price_total', 'user_id_fk'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id_fk', 'user_id');
    }
}
