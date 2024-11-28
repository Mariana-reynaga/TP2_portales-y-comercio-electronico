<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Lamparas;

class Ventas extends Model
{
    protected $table = 'ventas';

    protected $primaryKey = 'sales_id';

    protected $fillable = [
        'user_fk',
        'product_fk'
    ];

    public function userDetail(){
        return $this->belongsTo(User::class, 'user_fk', 'user_id');
    }

    public function product(){
        return $this->belongsTo(Lamparas::class, 'product_fk', 'lamp_id');
    }
}
