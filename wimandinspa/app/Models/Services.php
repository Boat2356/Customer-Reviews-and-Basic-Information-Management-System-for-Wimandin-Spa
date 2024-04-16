<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function service_types()
    {
        return $this->belongsTo(ServiceTypes::class, 'service_type_id');
    }
}
