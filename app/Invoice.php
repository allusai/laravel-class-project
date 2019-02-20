<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey = 'InvoiceId';
    public $timestamps = false;

    //Gets the Invoice items associated with this Invoice, sets up the relationship
    public function items()
    {
        return $this->hasMany('App\InvoiceItems', 'InvoiceId', 'InvoiceId');
    }
}
