<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{

    protected $table = 'quotes';

    public function services()
    {
        return $this->belongsToMany(Service::class, 'quote_service');
    }
}
