<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class QuoteService extends Pivot
{
    protected $table = 'quote_service';
    public $timestamps = false;
}
