<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($invoice) {
            $invoice->invoice_id = $invoice->invoiceNumber();
            $invoice->save();
        });
    }

    private function invoiceNumber()
    {
        $number = time();

        return $number;
    }
}
