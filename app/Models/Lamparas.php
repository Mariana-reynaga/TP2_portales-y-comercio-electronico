<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Marca;
use App\Models\Color;
use App\Models\Material;

class Lamparas extends Model
{
    protected $table = 'lamparas';

    protected $primaryKey = 'lamp_id';

    protected $fillable = [
            'lamp_name',
            'lamp_price',
            'lamp_height',
            'lamp_stock',
            'lamp_image',
            'lamp_image_alt',
            'brand_fk',
            'color_fk',
            'material_fk'
    ];

    public function brand(){
        return $this->belongsTo(Marca::class, 'brand_fk', 'brand_id');
    }
    public function color(){
        return $this->belongsTo(Color::class, 'color_fk', 'color_id');
    }
    public function material(){
        return $this->belongsTo(Material::class, 'material_fk', 'material_id');
    }

    
}
