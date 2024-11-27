<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $primaryKey = 'blog_id';

    protected $fillable = ['blog_title', 'blog_author', 'blog_article'];

    public function casts(){
        return [
            'created_at' => 'date'
        ];
    }

}
