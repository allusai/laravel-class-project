<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItems extends Model
{
    protected $primaryKey = 'InvoiceLineId';
    public $timestamps = false;

    //Gets the Invoice associated with this invoice item, sets up the relationship
    public function invoice()
    {
        return $this->belongsTo('App\Invoice', 'InvoiceId', 'InvoiceId');
    }
}
