<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $table = 'services';
    protected $fillable = [
        'name', 'description', 'department_id'
    ];

    public function quotes()
    {
        return $this->belongsToMany(Quote::class, 'quote_service');
    }
}
