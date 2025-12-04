<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Invoice Settings
    |--------------------------------------------------------------------------
    */

    'invoice_prefix' => env('INVOICE_PREFIX', 'INV'),

    'currency' => env('INVOICE_CURRENCY', 'USD'),

    'default_tax_rate' => env('INVOICE_TAX_RATE', 0),

    'payment_terms_days' => env('INVOICE_PAYMENT_TERMS', 30),

];