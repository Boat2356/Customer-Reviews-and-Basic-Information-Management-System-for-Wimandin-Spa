<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $table = 'post';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function postType()
    {
        return $this->belongsTo(PostType::class, 'post_type_id');
    }

    #public function users()
    #{
     #   return $this->belongsTo(User::class, 'users_id');
    #}

}
