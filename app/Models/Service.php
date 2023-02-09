<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $table = 'services';

    public function quotes()
    {
        return $this->belongsToMany(Quote::class, 'quote_service');
    }
}
