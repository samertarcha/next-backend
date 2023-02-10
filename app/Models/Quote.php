<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{

    protected $table = 'quotes';
    protected $fillable = [
        'deal_id', 'project_id', 'title', 'project_deliverables', 'date',
        'quote_status', 'term_id', 'creator_id', 'currency', 'amount',
        'tax_status', 'delete'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'quote_service');
    }
}
