<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTypes extends Model
{
    use HasFactory;
    protected $table = 'service_types';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function services()
    {
        return $this->hasMany(Services::class);
    }
}
