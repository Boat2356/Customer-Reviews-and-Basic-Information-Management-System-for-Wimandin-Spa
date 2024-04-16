<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Review extends Model
{
    use HasFactory;    
    
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $casts = [
        "image_path" => "array"
    ];
    

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
